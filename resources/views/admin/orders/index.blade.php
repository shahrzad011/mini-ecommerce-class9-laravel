@extends('admin.layouts.app')
@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت سفارشات
        </h1>


        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>

                </li>


                <li class="breadcrumb-item active">
                    مدیریت سفارشات
                </li>

            </ol>

        </nav>

    </div>

@endsection
@section('content')

    <div class="container-fluid pt-4">

        <!-- Filters -->
        <div class="row">
            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body p-3">


                        <form method="GET" action="{{ route('admin.orders.index') }}">


                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">


                                <!-- Sort -->
                                <div class="d-flex align-items-center gap-2">


                                    <select
                                        id="choices-single-default"
                                        class="form-control"
                                        name="sort"
                                        onchange="this.form.submit()">


                                        <option value="">
                                            مرتب‌سازی بر اساس
                                        </option>


                                        <option value="created_at_desc"
                                            {{request('sort') == 'created_at_desc' ? 'selected':''}}>
                                            جدیدترین
                                        </option>


                                        <option value="created_at_asc"
                                            {{request('sort') == 'created_at_asc' ? 'selected':''}}>
                                            قدیمی‌ترین
                                        </option>


                                        <option value="price_high"
                                            {{request('sort') == 'price_high' ? 'selected':''}}>
                                            مبلغ زیاد به کم
                                        </option>


                                        <option value="price_low"
                                            {{request('sort') == 'price_low' ? 'selected':''}}>
                                            مبلغ کم به زیاد
                                        </option>


                                        <option value="status"
                                            {{request('sort') == 'status' ? 'selected':''}}>
                                            وضعیت سفارش
                                        </option>


                                    </select>


                                </div>


                                <!-- Search -->

                                <div class="d-flex gap-2">


                                    <input
                                        class="form-control"
                                        type="search"
                                        name="search"
                                        value="{{request('search')}}"
                                        placeholder="جستجو شناسه یا موبایل مشتری">


                                    <button
                                        class="btn btn-primary"
                                        type="submit">


                                        جستجو


                                    </button>

                                </div>


                            </div>


                        </form>


                    </div>

                </div>


            </div>
        </div>

        <!-- Orders Table -->
        <div class="row">

            <div class="col-xl-12">


                <div class="card custom-card">


                    <div class="card-header">

                        <div class="card-title">
                            لیست سفارشات
                        </div>

                    </div>


                    <div class="table-responsive">


                        <table class="table text-nowrap table-hover">


                            <thead>

                            <tr>

                                <th>
                                    شناسه
                                </th>

                                <th>
                                    مشتری
                                </th>

                                <th>
                                    موبایل
                                </th>

                                <th>
                                    تعداد کالا
                                </th>

                                <th>
                                    مبلغ
                                </th>

                                <th>
                                    وضعیت
                                </th>

                                <th>
                                    تاریخ ثبت
                                </th>

                                <th>
                                    عملیات
                                </th>


                            </tr>

                            </thead>


                            <tbody>


                            @forelse($orders as $order)

                                <tr>


                                    <td>

                                        <span class="fw-semibold">

                                                #{{$order->id}}

                                        </span>

                                    </td>


                                    <td>

                                        {{getUserFullName($order->user)}}

                                    </td>


                                    <td>

                                        {{$order->user_mobile}}

                                    </td>


                                    <td>

                                        {{$order->total_products}}

                                    </td>

                                    <td>

                                        {{number_format($order->final_price)}}

                                        تومان

                                    </td>


                                    <td>

                                        @switch($order->status)

                                            @case(0)

                                                <span class="badge bg-warning-transparent">

                                                    در انتظار پرداخت

                                                </span>

                                                @break



                                            @case(1)

                                                <span class="badge bg-info-transparent">
                                                    در حال پردازش

                                                </span>

                                                @break

                                            @case(2)

                                                <span class="badge bg-primary-transparent">

                                                    ارسال شده

                                                </span>

                                                @break

                                            @case(3)

                                                <span class="badge bg-success-transparent">

                                                تحویل شده

                                                </span>

                                                @break



                                            @case(4)

                                                <span class="badge bg-danger-transparent">

                                                    لغو شده

                                                </span>

                                                @break

                                            @case(5)

                                                <span class="badge bg-secondary-transparent">

                                                مرجوع شده

                                                </span>

                                                @break

                                        @endswitch

                                    </td>


                                    <td>

                                        {{$order->created_at->toJalali()->format('Y/m/d H:i')}}

                                    </td>


                                    <td>

                                        <div class="hstack gap-2 fs-15">


                                            <a href="{{route('admin.orders.show',$order)}}"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               title="مشاهده">

                                                <i class="ri-eye-line"></i>

                                            </a>

                                            <a href="{{route('admin.orders.edit',$order)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               title="ویرایش">

                                                <i class="ti ti-pencil"></i>

                                            </a>

                                            <form action="{{route('admin.orders.destroy',$order)}}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این سفارش مطمئن هستید؟')">

                                                @csrf

                                                @method('DELETE')


                                                <button type="submit"
                                                        class="btn btn-danger-light btn-icon btn-sm">

                                                    <i class="ri-delete-bin-line"></i>

                                                </button>


                                            </form>


                                        </div>


                                    </td>

                                </tr>
                            @empty

                                <tr>
                                    <td colspan="8" class="text-center">

                                        سفارشی یافت نشد

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="mt-3">

        {{$orders->links()}}

    </div>

@endsection
