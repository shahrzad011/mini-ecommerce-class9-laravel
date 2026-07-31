@extends('admin.layouts.app')

@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت دسته بندی ها
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>

                </li>


                <li class="breadcrumb-item active">
                    مدیریت دسته بندی ها
                </li>

            </ol>

        </nav>

    </div>

@endsection


@section('content')

    <div class="container-fluid pt-4">


        <!-- Top Section -->
        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body p-3">


                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">


                            <div>

                                <h5 class="mb-0">
                                    لیست دسته بندی ها
                                </h5>

                            </div>


                            <div>

                                <a href="{{route('admin.productCategories.create')}}"
                                   class="btn btn-primary">

                                    <i class="ri-add-line me-1"></i>

                                    ایجاد دسته بندی

                                </a>

                            </div>


                        </div>


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
                                    دسته بندی
                                </th>


                                <th>
                                    توضیحات
                                </th>


                                <th>
                                    تعداد محصولات
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


                            @forelse($productCategories as $category)

                                <tr>

                                    <td>

                                        <div class="d-flex">

                                        <span class="avatar avatar-md avatar-square bg-light">


                                            <img src="{{asset('assets/admin/images/product-default-image.png')}}"
                                                 class="w-100 h-100"
                                                 alt="{{$category->name}}">

                                        </span>

                                            <div class="ms-2">

                                                <p class="fw-semibold mb-0 name-limit">

                                                    <a href="{{route('admin.productCategories.show',$category->id)}}">

                                                        {{$category->name}}

                                                    </a>

                                                </p>

                                                <p class="fs-12 text-muted mb-0">

                                                    #{{$category->id}}

                                                </p>


                                            </div>

                                        </div>

                                    </td>


                                    <td class="description-limit">

                                        {{$category->description ?? '-'}}

                                    </td>

                                    <td>

                                        {{$category->products_count ?? 0}}

                                    </td>

                                    <td>

                                        @if($category->is_active)

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

                                        {{$category->created_at->format('Y/m/d')}}

                                    </td>

                                    <td>

                                        <div class="hstack gap-2 fs-15">


                                            <a href="{{route('admin.productCategories.show',$category->id)}}"
                                               class="btn btn-primary-light btn-icon btn-sm">

                                                <i class="ri-eye-line"></i>

                                            </a>


                                            <a href="{{route('admin.productCategories.edit',$category)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm">

                                                <i class="ti ti-pencil"></i>

                                            </a>


                                            <form action="{{route('admin.productCategories.destroy',$category)}}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟')">

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

                                    <td colspan="6" class="text-center">

                                        دسته بندی وجود ندارد

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>


                    </div>

                    <div class="card-footer">

                        {{$productCategories->links()}}

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
