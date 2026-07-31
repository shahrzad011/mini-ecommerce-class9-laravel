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


                <li class="breadcrumb-item">
                    <a href="{{route('admin.products.index')}}">
                        مدیریت محصولات
                    </a>
                </li>


                <li class="breadcrumb-item active">
                    ویرایش محصول
                </li>


            </ol>

        </nav>

    </div>

@endsection



@section('content')

    <div class="container-fluid pt-4">


        <div class="row">

            <div class="col-xl-12">


                <form action="{{route('admin.products.update',$product->id)}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    @method('PUT')


                    <div class="card custom-card">


                        <div class="card-header">

                            <div class="card-title">
                                ویرایش محصول
                            </div>

                        </div>


                        <div class="card-body pt-0">


                            <div class="row gy-3">


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        نام فارسی
                                    </label>


                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           value="{{$product->name}}">

                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        نام انگلیسی
                                    </label>


                                    <input type="text"
                                           class="form-control"
                                           name="en_name"
                                           value="{{$product->en_name}}">

                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        دسته بندی
                                    </label>


                                    <select class="form-control"
                                            name="product_category_id">


                                        <option value="">
                                            انتخاب دسته بندی
                                        </option>


                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}"

                                                @selected($product->product_category_id == $category->id)

                                            >

                                                {{$category->name}}

                                            </option>

                                        @endforeach


                                    </select>


                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        قیمت
                                    </label>


                                    <input type="number"
                                           class="form-control"
                                           name="price"
                                           value="{{$product->price}}">


                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        تخفیف
                                    </label>


                                    <input type="number"
                                           class="form-control"
                                           name="discount"
                                           value="{{$product->discount}}">


                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        موجودی
                                    </label>


                                    <input type="number"
                                           class="form-control"
                                           name="qty"
                                           value="{{$product->qty}}">


                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">
                                        وضعیت
                                    </label>


                                    <select class="form-control"
                                            name="status">


                                        @foreach(\App\Enums\ProductStatus::cases() as $status)

                                            <option value="{{$status->value}}"

                                                @selected($product->status == $status)

                                            >

                                                {{$status->label()}}

                                            </option>

                                        @endforeach


                                    </select>


                                </div>


                                <div class="col-xl-12">


                                    <label class="form-label">
                                        توضیحات
                                    </label>


                                    <textarea class="form-control"
                                              name="description"
                                              rows="4">{{$product->description}}</textarea>


                                </div>


                            </div>


                            <div
                                class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mt-3"
                                id="imagePreviewContainer"
                                style="border-radius:8px;padding:10px;"
                            >

                                @foreach($product->productImages as $image)

                                    <div class="position-relative"
                                         style="width:150px;height:150px;">

                                        <img
                                            src="{{ asset('storage/'.$image->file->path) }}"
                                            class="img-fluid rounded"
                                            style="width:100%;height:100%;object-fit:cover;"
                                            alt=""
                                        >

                                        <button
                                            type="button"
                                            class="remove-btn btn btn-sm btn-danger position-absolute top-0 end-0"
                                            onclick="if(confirm('حذف این تصویر؟')) document.getElementById('delete-image-{{ $image->id }}').submit()"
                                        >
                                            ×
                                        </button>

                                    </div>

                                @endforeach

                                <label
                                    id="uploadPlaceholder"
                                    class="upload-placeholder"
                                    for="imageInput"
                                    style="
                                        cursor:pointer;
                                        width:150px;
                                        height:150px;
                                        display:flex;
                                        flex-direction:column;
                                        justify-content:center;
                                        align-items:center;
                                        border:2px dashed #ccc;
                                        border-radius:8px;
                                        padding:20px;
                                        text-align:center;
                                        background:#fff;
                                    "
                                >

                                    <div style="font-size:30px;">
                                        📷
                                    </div>

                                    <strong>
                                        آپلود تصویر
                                    </strong>

                                    <small style="color:#999;">
                                        JPG / PNG / JPEG / WEBP
                                    </small>

                                </label>

                                <input
                                    id="imageInput"
                                    name="images[]"
                                    type="file"
                                    accept=".jpg,.png,.jpeg,.webp"
                                    multiple
                                    style="display:none;"
                                >

                            </div>

                            <div class="card-footer text-end">

                                <a
                                    href="{{ route('admin.products.index') }}"
                                    class="btn btn-secondary"
                                >
                                    بازگشت
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    ذخیره تغییرات
                                </button>

                            </div>

                        </div>
                    </div>

                </form>


                @foreach($product->productImages as $image)
                    <form
                        id="delete-image-{{ $image->id }}"
                        action="{{ route('admin.products.removeImage', [$product->id, $image->id]) }}"
                        method="POST"
                        style="display:none;"
                    >
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach

            </div>


        </div>


    </div>

@endsection
