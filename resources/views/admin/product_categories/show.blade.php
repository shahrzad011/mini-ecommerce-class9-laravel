@extends('admin.layouts.app')


@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت دسته‌بندی‌ها
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>
                </li>


                <li class="breadcrumb-item">
                    <a href="{{route('admin.productCategories.index')}}">
                        دسته‌بندی‌ها
                    </a>
                </li>


                <li class="breadcrumb-item active">
                    نمایش دسته‌بندی
                </li>

            </ol>

        </nav>

    </div>

@endsection

@section('content')

    <div class="container-fluid pt-4">


        <div class="row">

            <div class="col-xl-12">


                <div class="card custom-card mb-4">


                    <div class="card-header">

                        <div class="card-title">
                            اطلاعات دسته‌بندی
                        </div>

                    </div>


                    <div class="card-body">


                        <div class="row gy-4">


                            <div class="col-md-8">


                                <h2 class="fw-bold mb-3">
                                    {{$productCategory->name}}
                                </h2>


                                <dl class="row mb-4">


                                    <dt class="col-sm-4 fw-semibold">
                                        نام دسته‌بندی:
                                    </dt>

                                    <dd class="col-sm-8">
                                        {{$productCategory->name}}
                                    </dd>


                                    <dt class="col-sm-4 fw-semibold">
                                        توضیحات:
                                    </dt>

                                    <dd class="col-sm-8">

                                        {{$productCategory->description ?? 'توضیحاتی ثبت نشده است'}}

                                    </dd>


                                </dl>


                                <div class="row text-center text-md-start">


                                    <div class="col-6 col-md-4 mb-3">


                                        <div class="p-3 border rounded bg-light">


                                            <div class="fs-4 fw-bold">

                                                {{$productCategory->products_count}}

                                            </div>


                                            <div class="text-muted">

                                                تعداد محصولات

                                            </div>


                                        </div>


                                    </div>


                                    <div class="col-6 col-md-4 mb-3">


                                        <div class="p-3 border rounded bg-light">


                                            <div class="fs-5 fw-bold">


                                                @if($productCategory->is_active)

                                                    <span class="text-success">
                                                    فعال
                                                </span>

                                                @else

                                                    <span class="text-danger">
                                                    غیرفعال
                                                </span>

                                                @endif


                                            </div>


                                            <div class="text-muted">

                                                وضعیت دسته‌بندی

                                            </div>


                                        </div>


                                    </div>


                                </div>


                            </div>


                        </div>


                    </div>


                </div>


                {{-- Products --}}


                <div class="card custom-card">


                    <div class="card-header">

                        <div class="card-title">
                            محصولات دسته‌بندی
                        </div>

                    </div>


                    <div class="table-responsive">


                        <table class="table text-nowrap table-bordered">


                            <thead>

                            <tr>

                                <th>
                                    محصول
                                </th>

                                <th>
                                    قیمت
                                </th>

                                <th>
                                    تخفیف
                                </th>

                                <th>
                                    موجودی
                                </th>

                                <th>
                                    عملیات
                                </th>


                            </tr>

                            </thead>


                            <tbody>


                            @forelse($productCategory->products as $product)

                                <tr>


                                    <td>


                                        <div class="d-flex align-items-center">

                        <span class="avatar avatar-md avatar-square bg-light">

                              @if($product->productImages->first()?->file)

                                      <img
                                        src="{{asset('storage/'.$product->productImages->first()->file->path)}}"
                                        class="w-100 h-100"
                                        alt="{{$product->name}}"
                                    >

                                     @else

                                <img
                                    src="{{asset('assets/admin/images/product-default-image.png')}}"
                                    class="w-100 h-100"
                                    alt="{{$product->name}}"
                                >

                            @endif

                                </span>
                                            <div class="ms-2">

                                                <p class="fw-semibold mb-0">

                                                    {{$product->name}}
                                                </p>


                                                <small class="text-muted">

                                                    {{$product->description}}

                                                </small>


                                            </div>


                                        </div>


                                    </td>


                                    <td>

                                        {{number_format($product->price)}}
                                        تومان

                                    </td>


                                    <td>


                                        @if($product->discount)

                                            <span class="text-success">

                                            {{number_format($product->discount)}}
                                            تومان

                                        </span>

                                        @else

                                            -

                                        @endif


                                    </td>


                                    <td>

                                        {{$product->qty}}

                                    </td>


                                    <td>


                                        <div class="hstack gap-2">


                                            <a href="{{route('admin.products.show',$product)}}"

                                               class="btn btn-primary-light btn-icon btn-sm">


                                                <i class="ri-eye-line"></i>


                                            </a>


                                            <a href="{{route('admin.products.edit',$product)}}"

                                               class="btn btn-secondary-light btn-icon btn-sm">


                                                <i class="ti ti-pencil"></i>


                                            </a>


                                        </div>


                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        محصولی در این دسته‌بندی وجود ندارد.

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

@endsection
