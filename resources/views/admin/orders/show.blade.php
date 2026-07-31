@extends('admin.layouts.app')
@section('breadcrumb')

    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">
            لیست کاربران
        </h1>

        <div>
            <nav>
                <ol class="breadcrumb mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard.index') }}">
                            داشبورد
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <a href="{{ route('admin.users.index') }}">
                            مدیریت کاربران
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('admin.users.show', $order->id) }}">
                            مشاهده اطلاعات کاربر
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        نمایش سفارشات
                    </li>

                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('content')

    <div class="container-fluid pt-4">

        <!-- Main Row -->
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Summary -->
                        <div class="card custom-card overflow-hidden" style="padding-bottom: 6px !important;">
                            <div class="card-header justify-content-between">
                                <div class="card-title">خلاصه سفارش</div>
                                <div>شناسه: <span class="text-primary fw-semibold">{{$order->id}}</span></div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">تعداد کالا:</div>
                                        </td>
                                        <td>{{$order->total_products}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">وضعیت سفارش:</div>
                                        </td>
                                        <td>
                                            @switch($order->status)
                                                @case(0)
                                                    <span class="text-warning">در انتظار پرداخت</span>
                                                    @break

                                                @case(1)
                                                    <span class="text-info">در حال پردازش</span>
                                                    @break

                                                @case(2)
                                                    <span class="text-primary">ارسال شده</span>
                                                    @break

                                                @case(3)
                                                    <span class="text-success">تحویل شده</span>
                                                    @break

                                                @case(4)
                                                    <span class="text-danger">لغو شده</span>
                                                    @break

                                                @case(5)
                                                    <span class="text-secondary">مرجوع شده</span>
                                                    @break

                                                @default
                                                    <span class="text-muted">نامشخص</span>
                                            @endswitch
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">مبلغ کل:</div>
                                        </td>
                                        <td>
                                                <span class="fw-medium">
                                                   {{ number_format($order->final_price) }}
                                                    تومان
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 0;">
                                            <div class="fw-semibold">توضیحات:</div>
                                        </td>
                                        <td style="border-bottom: 0;">{{$order->description ??'بدون توضیحات'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Address Info -->
                    <div class="col-md-6">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">آدرس تحویل</div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>آدرس:</strong>
                                    {{$order->user_address}}
                                </p>
                                <p>
                                    <strong>شماره تماس:</strong>
                                    {{$order->user_mobile}}
                                </p>
                                <p>
                                    <strong>کد پستی:</strong>
                                    {{$order->user_postal_code}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4">

                <!-- User Info -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">مشخصات کاربر</div>
                    </div>
                    <div class="card-body">
                        <p><strong>نام:</strong> {{getUserFullName($order->user)}}</p>
                        <p><strong>ایمیل:</strong> {{$order->user->email}}</p>
                        <p><strong>موبایل:</strong>{{$order->user_mobile}}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div>
                <!-- Order Card -->
                <div class="card custom-card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">
                            محصولات سفارش
                        </div>
                        <div>
                            <span class="badge bg-primary-transparent">
                                تاریخ سفارش:
                                {{$order->created_at->toJalali()->format('H:i Y/m/d')}}

                            </span>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">محصول</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">تخفیف</th>
                                    <th scope="col">مبلغ نهایی</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderItems as $item)

                                    <tr>

                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div>
                                                    <div class="mb-1 fs-14 fw-medium">

                                                        {{ $item->product->name }}

                                                        |

                                                        {{ $item->product->en_name }}

                                                    </div>
                                                </div>

                                            </div>
                                        </td>


                                        <td>
                                            {{ number_format($item->unit_price) }}
                                            تومان
                                        </td>


                                        <td>
                                            {{ $item->qty }}
                                        </td>


                                        <td>

                                            @if($item->total_discount > 0)

                                                <span class="text-danger">
                                             {{ number_format($item->total_discount) }}
                                                    تومان
                                             </span>

                                            @else

                                                <span class="text-muted">
                                                  بدون تخفیف
                                                </span>

                                            @endif

                                        </td>
                                        <td>

                                           <span class="fw-semibold">

                                          {{ number_format($item->total_price - $item->total_discount) }}
                                              تومان
                                              </span>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
