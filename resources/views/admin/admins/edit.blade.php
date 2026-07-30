@extends('admin.layouts.app')

@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت مدیران
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">


                <li class="breadcrumb-item">

                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a href="{{route('admin.admins.index')}}">
                        مدیریت مدیران
                    </a>

                </li>


                <li class="breadcrumb-item active">

                    ویرایش مدیر

                </li>


            </ol>

        </nav>


    </div>

@endsection




@section('content')

    <div class="container-fluid pt-4">


        <div class="row">

            <div class="col-xl-12">


                <form action="{{route('admin.admins.update',$admin)}}"
                      method="POST">


                    @csrf

                    @method('PUT')


                    <div class="card custom-card">


                        <div class="card-header">

                            <div class="card-title">

                                ویرایش مدیر

                            </div>


                        </div>


                        <div class="card-body">


                            <div class="row gy-3">


                                <!-- Full Name -->

                                <div class="col-xl-6">


                                    <label class="form-label">
                                        نام کامل
                                    </label>


                                    <input
                                        type="text"
                                        class="form-control"
                                        name="full_name"
                                        value="{{old('full_name',$admin->full_name)}}"
                                        placeholder="نام کامل را وارد کنید"
                                    >


                                </div>


                                <!-- Username -->

                                <div class="col-xl-6">


                                    <label class="form-label">
                                        نام کاربری
                                    </label>


                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        value="{{old('username',$admin->username)}}"
                                        placeholder="نام کاربری را وارد کنید"
                                    >


                                </div>


                                <!-- Password -->

                                <div class="col-xl-6">


                                    <label class="form-label">
                                        رمز عبور
                                    </label>


                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="در صورت تغییر وارد کنید"
                                    >


                                </div>


                                <!-- Status -->

                                <div class="col-xl-6">


                                    <label class="form-label">
                                        وضعیت
                                    </label>


                                    <select name="status"
                                            class="form-control">


                                        <option value="1"
                                            @selected(old('status',$admin->status)==1)>
                                            فعال
                                        </option>


                                        <option value="0"
                                            @selected(old('status',$admin->status)==0)>
                                            غیرفعال
                                        </option>


                                    </select>


                                </div>


                            </div>


                        </div>


                        <div class="card-footer text-end">


                            <a href="{{route('admin.admins.index')}}"
                               class="btn btn-secondary">

                                بازگشت

                            </a>


                            <button type="submit"
                                    class="btn btn-primary">


                                ذخیره تغییرات


                            </button>


                        </div>


                    </div>


                </form>


            </div>


        </div>


    </div>

@endsection
