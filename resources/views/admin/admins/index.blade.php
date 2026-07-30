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


                <li class="breadcrumb-item active">
                    مدیریت مدیران
                </li>

            </ol>

        </nav>

    </div>

@endsection


@section('content')

    <div class="container-fluid pt-4">


        <!-- Search + Filter -->

        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body p-3">


                        <form method="GET" action="{{route('admin.admins.index')}}">


                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">


                                <div class="d-flex flex-wrap gap-2 align-items-center">


                                    <div class="d-flex">

                                        <input
                                            class="form-control me-2"
                                            type="search"
                                            name="search"
                                            placeholder="جستجو مدیر"
                                            value="{{request('search')}}"
                                        >


                                        <button class="btn btn-light">
                                            جستجو
                                        </button>

                                    </div>


                                    <select class="form-control" name="sort">


                                        <option value="">
                                            مرتب سازی
                                        </option>


                                        <option value="name_asc"
                                            @selected(request('sort') == 'name_asc')>
                                            نام (الف - ی)
                                        </option>


                                        <option value="name_desc"
                                            @selected(request('sort') == 'name_desc')>
                                            نام (ی - الف)
                                        </option>


                                        <option value="newest"
                                            @selected(request('sort') == 'newest')>
                                            جدیدترین
                                        </option>


                                    </select>


                                </div>


                                <div>

                                    <a href="{{route('admin.admins.create')}}"
                                       class="btn btn-primary">

                                        <i class="ri-add-line me-1"></i>

                                        ایجاد مدیر

                                    </a>


                                </div>


                            </div>


                        </form>


                    </div>

                </div>

            </div>

        </div>


        <!-- Table -->

        <div class="row">

            <div class="col-xl-12">


                <div class="card custom-card">


                    <div class="table-responsive">


                        <table class="table text-nowrap table-bordered">


                            <thead>

                            <tr>

                                <th>
                                    #
                                </th>


                                <th>
                                    نام کامل
                                </th>


                                <th>
                                    نام کاربری
                                </th>


                                <th>
                                    وضعیت
                                </th>


                                <th>
                                    تاریخ ایجاد
                                </th>


                                <th>
                                    عملیات
                                </th>


                            </tr>

                            </thead>


                            <tbody>


                            @forelse($admins as $admin)

                                <tr>


                                    <td>
                                        {{$admin->id}}
                                    </td>


                                    <td>

                                        {{$admin->full_name}}

                                    </td>


                                    <td>

                                        {{$admin->username}}

                                    </td>


                                    <td>


                                        @if($admin->status)

                                            <span class="badge bg-success-transparent">
                                            فعال
                                        </span>

                                        @else

                                            <span class="badge bg-danger-transparent">
                                            غیرفعال
                                        </span>

                                        @endif


                                    </td>


                                    <td>

                                        {{$admin->created_at->format('Y/m/d H:i')}}

                                    </td>


                                    <td>


                                        <div class="hstack gap-2 fs-15">


                                            <a href="{{route('admin.admins.edit',$admin)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm">

                                                <i class="ti ti-pencil"></i>

                                            </a>


                                            <form action="{{route('admin.admins.destroy',$admin)}}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این مدیر مطمئن هستید؟')">


                                                @csrf

                                                @method('DELETE')


                                                <button class="btn btn-danger-light btn-icon btn-sm">

                                                    <i class="ri-delete-bin-line"></i>

                                                </button>


                                            </form>


                                        </div>


                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        مدیری وجود ندارد

                                    </td>

                                </tr>

                            @endforelse


                            </tbody>


                        </table>


                    </div>


                </div>


            </div>


        </div>


        <div class="mt-3">

            {{$admins->links()}}

        </div>

    </div>

@endsection
