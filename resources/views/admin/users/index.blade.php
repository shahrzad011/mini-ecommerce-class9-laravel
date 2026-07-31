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
                        مدیریت کاربران
                    </li>

                </ol>
            </nav>
        </div>
    </div>

@endsection
@section('content')

    <div class="page">
        <!-- Start::main-header -->
        <header class="app-header sticky" id="header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element mx-lg-0 me-2 d-lg-none">
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link" data-bs-toggle="sidebar"
                           href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M4 5h12M4 12h16M4 19h8" color="currentColor"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn-close" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="m18 6l-6 6m0 0l-6 6m6-6l6 6m-6-6L6 6" color="currentColor">

                                </path>
                            </svg>
                        </a>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="{{route('admin.dashboard.index')}}" class="header-logo">
                                <span class="text-primary fs-6 fw-bold">پنل مدیریت</span>
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-search d-md-block d-none my-auto">
                        @yield('breadcrumb')

                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <ul class="header-content-right">

                    <!-- Start::header-element -->
                    <li class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">
								<span class="light-layout">
									<!-- Start::header-link-icon -->
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="1em"
                                         height="1em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"
                                              d="M21.5 14.078A8.557 8.557 0 0 1 9.922 2.5C5.668 3.497 2.5 7.315 2.5 11.873a9.627 9.627 0 0 0 9.627 9.627c4.558 0 8.376-3.168 9.373-7.422"
                                              color="currentColor"></path>
                                    </svg>
                                    <!-- End::header-link-icon -->
								</span>
                            <span class="dark-layout">
									<!-- Start::header-link-icon -->
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="1em"
                                         height="1em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"
                                              d="M17 12a5 5 0 1 1-10 0a5 5 0 0 1 10 0M12 2v1.5m0 17V22m7.07-2.929l-1.06-1.06M5.99 5.989L4.928 4.93M22 12h-1.5m-17 0H2m17.071-7.071l-1.06 1.06M5.99 18.011l-1.06 1.06"
                                              color="currentColor"></path>
                                    </svg>
                                <!-- End::header-link-icon -->
								</span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </li>
                    <!-- End::header-element -->


                    <!-- Start::header-element -->
                    <li class="header-element dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                           data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="
                                    {{asset('assets/admin/images/faces/DefaultAvatar.jpg')}}" alt="img"
                                         class="avatar avatar-sm avatar-rounded">
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li class="p-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 fw-semibold lh-1">Admin Admin</p>
                                        <span class="fs-11 text-muted">admin@gmail.com</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center text-danger px-3"
                                   href="http://127.0.0.1:8000/admin/auth/logout">
                                    <i class="ri-logout-circle-line fs-15 me-2 text-danger fw-normal"
                                       style="position: relative; top: -2px"></i>
                                    خروج
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->


                </ul>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

            <!-- Start::app-content -->

            <div class="container-fluid pt-4">

                <!-- Page Header Close -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body p-3">
                                <form method="GET">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                        <!-- Left: Add User + Sort Dropdown -->
                                        <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                            <div class="d-flex me-2">
                                                <input class="form-control me-2" type="search" name="search"
                                                       placeholder="جستجوی کاربر" value="{{request()->input('search')}}"
                                                       aria-label="جستجوی کاربر">
                                                <button class="btn btn-light" type="submit">جستجو</button>
                                            </div>

                                            <select id="choices-single-default" class="form-control" name="sort">
                                                <option value="">مرتب‌سازی بر اساس</option>
                                                <option
                                                    value="newest" @selected(request()->missing('sort') || request()->input('sort') == 'newest')>
                                                    جدیدترین
                                                </option>
                                                <option
                                                    value="name_asc" @selected(request()->input('sort')== 'name_asc')>
                                                    الفبا (الف - ی)
                                                </option>
                                                <option
                                                    value="name_desc" @selected(request()->input('sort') == 'name_desc')>
                                                    الفبا (ی - الف)
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start::row-2 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card ">
                            <div class="table-responsive">
                                <!-- Removed .table-responsive -->
                                <table class="table text-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">نام و نام خانوادگی</th>
                                        <th scope="col">ایمیل</th>
                                        <th scope="col">شماره موبایل</th>
                                        <th scope="col">تاریخ ثبت نام</th>
                                        <th scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-fill">
                                                        <a href="javascript:void(0);"
                                                           class="fw-medium fs-14 d-block text-truncate">
                                                            {{getUserFullName($user)}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->created_at->toJalali()->format('H:i Y-m-d')}}</td>
                                            <td>
                                                <div class="btn-list">
                                                    <a href="{{route('admin.users.show', $user->id)}}"
                                                       class="btn btn-primary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="مشاهده">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{route('admin.users.edit', $user->id)}}"
                                                       class="btn btn-secondary-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="ویرایش">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                       onclick="if(confirm('آیا از حذف این کاربر مطمئن هستید؟')) { document.getElementById('delete-form-3').submit(); }"
                                                       class="btn btn-pink-light btn-icon btn-sm"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="حذف">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                    <form id="delete-form-3"
                                                          action="http://127.0.0.1:8000/admin/users/3/delete"
                                                          method="POST" style="display:none;">
                                                        <input type="hidden" name="_token"
                                                               value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL"
                                                               autocomplete="off"> <input type="hidden" name="_method"
                                                                                          value="delete"></form>
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        {{$users->links()}}

                    </div>
                </div>
                <!-- End::row-2 -->

            </div>

@endsection
