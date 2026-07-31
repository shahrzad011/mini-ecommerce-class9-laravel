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
                            مشاهده کاربر
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        ویرایش وضعیت سفارش
                    </li>

                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('content')

    <div class="container-fluid pt-4">


        <!-- Edit Form -->
        <div class="card custom-card">
            <div class="card-body">

                <form action="{{route('admin.orders.update', $order->id)}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">وضعیت سفارش</label>

                        <select name="status" id="status" class="form-select ">
                            <option value="0" {{$order->status == 0 ? 'selected' : ''}}>
                                در انتظار ثبت
                            </option>
                            <option value="1" {{$order->status == 1 ? 'selected' : ''}}>
                                در حال پردازش
                            </option>
                            <option value="2" {{$order->status == 2 ? 'selected' : ''}}>
                                ارسال شده
                            </option>
                            <option value="3" {{$order->status == 3 ? 'selected' : ''}}>
                                تحویل داده
                            </option>
                            <option value="4"{{$order->status == 4 ? 'selected' : ''}}>
                                لغو شده
                            </option>
                            <option value="5" {{$order->status == 5 ? 'selected' : ''}}>
                                مرجوع شده
                            </option>
                        </select>
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-wave">
                        ذخیره تغییرات
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
