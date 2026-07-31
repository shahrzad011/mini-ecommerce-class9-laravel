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
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}">
                            مدیریت کاربران
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        ویرایش کاربر
                    </li>

                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('content')

    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">

                <form action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">ویرایش کاربر</div>
                        </div>

                        <div class="card-body">


                            <!-- User Fields -->
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{$user->first_name}}" placeholder="نام را وارد کنید">
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{$user->last_name}}" placeholder="نام خانوادگی را وارد کنید">
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}"
                                           placeholder="ایمیل را وارد کنید">
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">شماره موبایل</label>
                                    <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}"
                                           placeholder="شماره موبایل را وارد کنید">
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">رمز عبور (در صورت تغییر)</label>
                                    <input type="text" class="form-control" name="password"
                                           placeholder="رمز عبور را وارد کنید">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
