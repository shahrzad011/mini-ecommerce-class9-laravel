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

                    ویرایش اسلایدر

                </li>


            </ol>


        </nav>


    </div>

@endsection





@section('content')

    <div class="container-fluid pt-4">


        <div class="row">


            <div class="col-xl-12">


                <form action="{{route('admin.sliders.update',$slider)}}"
                      method="POST"
                      enctype="multipart/form-data">


                    @csrf
                    @method('PUT')


                    <div class="card custom-card mb-4">


                        <div class="card-header">


                            <div class="card-title">

                                ویرایش اسلایدر

                            </div>


                        </div>


                        <div class="card-body">


                            <div class="row gy-3">


                                {{-- عنوان --}}

                                <div class="col-xl-6">


                                    <label class="form-label">

                                        عنوان اسلایدر

                                    </label>


                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        value="{{old('title',$slider->title)}}"
                                        placeholder="عنوان اسلایدر">


                                    @error('title')

                                    <span class="text-danger">

                                    {{$message}}

                                </span>

                                    @enderror


                                </div>


                                {{-- لینک --}}

                                <div class="col-xl-6">


                                    <label class="form-label">

                                        لینک اسلایدر

                                    </label>


                                    <input
                                        type="text"
                                        class="form-control"
                                        name="url"
                                        value="{{old('url',$slider->url)}}"
                                        placeholder="https://example.com">


                                    @error('url')

                                    <span class="text-danger">

                                    {{$message}}

                                </span>

                                    @enderror


                                </div>


                                {{-- ترتیب --}}

                                <div class="col-xl-6">


                                    <label class="form-label">

                                        ترتیب نمایش

                                    </label>


                                    <input
                                        type="number"
                                        class="form-control"
                                        name="sort"
                                        value="{{old('sort',$slider->sort)}}"
                                        placeholder="ترتیب">


                                    @error('sort')

                                    <span class="text-danger">

                                    {{$message}}

                                </span>

                                    @enderror


                                </div>


                                {{-- وضعیت --}}

                                <div class="col-xl-6">


                                    <label class="form-label">

                                        وضعیت

                                    </label>


                                    <select name="status"
                                            class="form-control">


                                        <option value="1"
                                            {{old('status',$slider->status) == 1 ? 'selected' : ''}}>

                                            فعال

                                        </option>


                                        <option value="0"
                                            {{old('status',$slider->status) == 0 ? 'selected' : ''}}>

                                            غیرفعال

                                        </option>


                                    </select>


                                    @error('status')

                                    <span class="text-danger">

                                    {{$message}}

                                    </span>

                                    @enderror


                                </div>


                            </div>


                            {{-- تصویر --}}


                            <div class="card-avatar mt-4">


                                <div class="text-center">


                                    <label class="form-label fw-semibold d-block mb-3">

                                        تصویر اسلایدر

                                    </label>


                                    <label
                                        class="avatar-picker"
                                        id="avatarPreview"
                                        style="
                                        background-image:url('{{asset('storage/'.$slider->image)}}');
                                        background-size:cover;
                                        background-position:center;
                                        "
                                    >


                                        <input
                                            type="file"
                                            name="image"
                                            accept="image/*"
                                            onchange="previewAvatar(this)">


                                    </label>


                                    @error('image')

                                    <br>

                                    <span class="text-danger">

                                    {{$message}}

                                </span>


                                    @enderror


                                </div>


                            </div>


                        </div>


                        <div class="card-footer text-end">


                            <button
                                type="submit"
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
