@extends('admin.layouts.app')

@section('breadcrumb')

    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت محصولات
        </h1>

        <nav>
            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    مدیریت محصولات
                </li>

            </ol>
        </nav>
    </div>

@endsection


@section('content')

    <div class="container-fluid pt-4">


        <!-- Filter -->
        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body p-3">

                        <form method="GET" action="{{route('admin.products.index')}}">

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">


                                <div class="d-flex flex-wrap gap-1 align-items-center">


                                    <div class="d-flex me-2">

                                        <input
                                            class="form-control me-2"
                                            type="search"
                                            name="search"
                                            placeholder="جستجو محصول"
                                            value="{{request('search')}}"
                                        >


                                        <button class="btn btn-light">
                                            جستجو
                                        </button>


                                    </div>


                                    <select
                                        id="choices-single-default"
                                        class="form-control"
                                        name="sort"
                                    >

                                        <option value="">
                                            مرتب‌سازی بر اساس
                                        </option>


                                        <option value="newest"
                                            {{request('sort')=='newest'?'selected':''}}>
                                            جدیدترین
                                        </option>


                                        <option value="name_asc"
                                            {{request('sort')=='name_asc'?'selected':''}}>
                                            نام (صعودی)
                                        </option>


                                        <option value="name_desc"
                                            {{request('sort')=='name_desc'?'selected':''}}>
                                            نام (نزولی)
                                        </option>


                                        <option value="price_asc"
                                            {{request('sort')=='price_asc'?'selected':''}}>
                                            قیمت کم به زیاد
                                        </option>


                                        <option value="price_desc"
                                            {{request('sort')=='price_desc'?'selected':''}}>
                                            قیمت زیاد به کم
                                        </option>


                                    </select>


                                </div>


                                <div>

                                    <a href="{{route('admin.products.create')}}"
                                       class="btn btn-primary">

                                        <i class="ri-add-line me-1"></i>

                                        ایجاد محصول

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


                        <table class="table table-bordered table-hover text-nowrap">


                            <thead>

                            <tr>

                                <th>نام</th>
                                <th>دسته بندی</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                                <th>موجودی</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>

                            </tr>

                            </thead>


                            <tbody>


                            @forelse($products as $product)

                                <tr>


                                    <td>


                                        <div class="d-flex">


                                        <span class="avatar avatar-md avatar-square bg-light">

                                             @if($product->productImages->first()?->file)

                                                <img
                                                    src="{{asset('storage/'.$product->productImages->first()->file->path)}}"
                                                    class="w-100 h-100"
                                                    alt="{{$product->name}}"
                                                >

                                            @else

                                                <img
                                                    src="{{asset('assets/admin/images/faces/DefaultAvatar.jpg')}}"
                                                    class="w-100 h-100"
                                                    alt="default"
                                                >
                                            @endif

                                        </span>


                                            <div class="ms-2">

                                                <p class="fw-semibold mb-0 name-limit">


                                                    <a href="{{route('admin.products.show',$product)}}">


                                                        {{$product->name}}
                                                        |
                                                        {{$product->en_name}}

                                                    </a>


                                                </p>


                                            </div>


                                        </div>


                                    </td>


                                    <td>

                                        {{$product->productCategory->name?? '-'}}

                                    </td>


                                    <td>

                                        {{number_format($product->price)}}

                                        تومان

                                    </td>


                                    <td>

                                        {{number_format($product->discount)}}

                                        تومان

                                    </td>


                                    <td>

                                        {{$product->qty}}

                                    </td>


                                    <td>

                                        {{$product->created_at->toJalali()->format('H:i Y/m/d')}}

                                    </td>


                                    <td>


                                        <div class="hstack gap-2 fs-15">


                                            <a href="{{route('admin.products.show',$product)}}"
                                               class="btn btn-primary-light btn-icon btn-sm">

                                                <i class="ri-eye-line"></i>

                                            </a>


                                            <a href="{{route('admin.products.edit',$product)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm">

                                                <i class="ti ti-pencil"></i>

                                            </a>


                                            <form action="{{route('admin.products.destroy',$product)}}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">


                                                @csrf

                                                @method('DELETE')


                                                <button class="btn btn-icon btn-sm btn-danger-light">

                                                    <i class="ri-delete-bin-line"></i>

                                                </button>


                                            </form>


                                        </div>


                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center">

                                        محصولی یافت نشد

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

            {{$products->links()}}

        </div>


    </div>

@endsection
