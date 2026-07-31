@extends('admin.layouts.app')


@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            نمایش محصول
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
                    {{$product->name}}
                </li>


            </ol>
        </nav>

    </div>

@endsection



@section('content')

    <div class="container-fluid pt-4">


        <div class="card custom-card">


            <div class="card-header">

                <div class="card-title">
                    اطلاعات محصول
                </div>

            </div>


            <div class="card-body">


                <div class="row">


                    <div class="col-md-4">


                        @if($product->productImages->count())

                            @foreach($product->productImages as $image)

                                <img src="{{asset('storage/'.$image->file->path)}}"
                                     class="img-fluid rounded mb-2"
                                     style="width:150px;height:150px;object-fit:cover;">

                            @endforeach

                        @else

                            <img src="{{asset('assets/admin/images/faces/DefaultAvatar.jpg')}}"
                                 class="img-fluid rounded">

                        @endif


                    </div>


                    <div class="col-md-8">


                        <h3>
                            {{$product->name}}
                        </h3>


                        <p>
                            <strong>نام انگلیسی:</strong>

                            {{$product->en_name}}
                        </p>


                        <p>
                            <strong>دسته بندی:</strong>

                            {{$product->productCategory->name ?? '-'}}
                        </p>


                        <p>
                            <strong>قیمت:</strong>

                            {{number_format($product->price)}}
                            تومان

                        </p>


                        <p>
                            <strong>تخفیف:</strong>

                            {{number_format($product->discount)}}
                            تومان

                        </p>


                        <p>
                            <strong>موجودی:</strong>

                            {{$product->qty}}

                        </p>


                        <p>
                            <strong>وضعیت:</strong>

                            @if($product->status->value == 1)

                                <span class="badge bg-success">
                                     فعال
                                </span>

                            @else

                                <span class="badge bg-danger">
                                     غیرفعال
                                </span>

                            @endif


                        </p>


                        <p>
                            <strong>توضیحات:</strong>

                            {{$product->description ?? '-'}}

                        </p>


                    </div>


                </div>


            </div>


            <div class="card-footer text-end">


                <a href="{{route('admin.products.edit',$product)}}"
                   class="btn btn-primary">

                    ویرایش

                </a>


                <a href="{{route('admin.products.index')}}"
                   class="btn btn-secondary">

                    بازگشت

                </a>


            </div>


        </div>


    </div>

@endsection
