@extends('admin.layouts.app')


@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت اسلایدرها
        </h1>


        <nav>

            <ol class="breadcrumb mb-0">


                <li class="breadcrumb-item">

                    <a href="{{route('admin.dashboard.index')}}">
                        داشبورد
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a href="{{route('admin.sliders.index')}}">
                        اسلایدرها
                    </a>

                </li>


                <li class="breadcrumb-item active">

                    نمایش اسلایدر

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


                    <div class="card-header d-flex justify-content-between align-items-center">


                        <div class="card-title">

                            اطلاعات اسلایدر

                        </div>


                        <div>


                            <a href="{{route('admin.sliders.edit',$slider)}}"
                               class="btn btn-secondary-light btn-sm">


                                <i class="ti ti-pencil"></i>

                                ویرایش


                            </a>


                        </div>


                    </div>


                    <div class="card-body">


                        <div class="row gy-4">


                            <div class="col-md-8">


                                <h2 class="fw-bold mb-3">

                                    {{$slider->title}}

                                </h2>


                                <dl class="row mb-4">


                                    <dt class="col-sm-4 fw-semibold">

                                        عنوان اسلایدر:

                                    </dt>


                                    <dd class="col-sm-8">

                                        {{$slider->title}}

                                    </dd>


                                    <dt class="col-sm-4 fw-semibold">

                                        لینک:

                                    </dt>


                                    <dd class="col-sm-8">


                                        @if($slider->url)

                                            <a href="{{$slider->url}}" target="_blank">

                                                {{$slider->url}}

                                            </a>

                                        @else

                                            -

                                        @endif


                                    </dd>


                                    <dt class="col-sm-4 fw-semibold">

                                        ترتیب نمایش:

                                    </dt>


                                    <dd class="col-sm-8">

                                        {{$slider->sort}}

                                    </dd>


                                    <dt class="col-sm-4 fw-semibold">

                                        وضعیت:

                                    </dt>


                                    <dd class="col-sm-8">


                                        @if($slider->status == 1)

                                            <span class="text-success">

                                            فعال

                                        </span>

                                        @else

                                            <span class="text-danger">

                                            غیرفعال

                                        </span>

                                        @endif


                                    </dd>


                                    <dt class="col-sm-4 fw-semibold">

                                        تاریخ ایجاد:

                                    </dt>


                                    <dd class="col-sm-8">

                                        {{$slider->created_at?->format('Y-m-d H:i')}}

                                    </dd>


                                </dl>


                            </div>


                            <div class="col-md-4">


                                <div class="text-center">



                                <span class="avatar avatar-xxl avatar-square bg-light">


                                    <img
                                        src="{{asset('storage/'.$slider->image)}}"
                                        class="w-100 h-100"
                                        alt="{{$slider->title}}"
                                    >


                                </span>


                                </div>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>

@endsection
