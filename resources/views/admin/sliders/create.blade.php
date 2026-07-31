@extends('admin.layouts.app')

@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            ایجاد اسلایدر
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a href="{{ route('admin.dashboard.index') }}">
                        داشبورد
                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a href="{{ route('admin.sliders.index') }}">
                        مدیریت اسلایدرها
                    </a>

                </li>

                <li class="breadcrumb-item active">

                    ایجاد اسلایدر

                </li>

            </ol>

        </nav>

    </div>

@endsection



@section('content')

    <div class="container-fluid pt-4">

        <div class="row">

            <div class="col-xl-12">

                <form action="{{ route('admin.sliders.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="card custom-card mb-4">

                        <div class="card-header">

                            <div class="card-title">

                                ایجاد اسلایدر

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row gy-3">

                                <div class="col-xl-6">

                                    <label class="form-label">

                                        عنوان اسلایدر

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        name="title"
                                        value="{{ old('title') }}"
                                        placeholder="عنوان اسلایدر">

                                    @error('title')

                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>

                                    @enderror

                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">

                                        لینک

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control @error('url') is-invalid @enderror"
                                        name="url"
                                        value="{{ old('url','#') }}"
                                        placeholder="https://example.com">

                                    @error('url')

                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>

                                    @enderror

                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">

                                        ترتیب نمایش

                                    </label>

                                    <input
                                        type="number"
                                        class="form-control @error('sort') is-invalid @enderror"
                                        name="sort"
                                        value="{{ old('sort',1) }}">

                                    @error('sort')

                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>

                                    @enderror

                                </div>


                                <div class="col-xl-6">

                                    <label class="form-label">

                                        وضعیت

                                    </label>

                                    <select
                                        name="status"
                                        class="form-select">

                                        <option value="1"
                                            {{ old('status',1)==1 ? 'selected' : '' }}>
                                            فعال
                                        </option>

                                        <option value="0"
                                            {{ old('status')==='0' ? 'selected' : '' }}>
                                            غیرفعال
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <div class="card-avatar mt-4"
                                 style="min-height:unset">

                                <div class="text-center">

                                    <label class="form-label d-block mb-2 fw-semibold">

                                        تصویر اسلایدر

                                    </label>

                                    <label
                                        class="avatar-picker"
                                        id="avatarPreview"
                                        style="background-image:url('{{ asset('assets/admin/images/faces/DefaultAvatar.jpg') }}')">

                                        <input
                                            type="file"
                                            name="image"
                                            accept="image/*"
                                            onchange="previewAvatar(this)">

                                    </label>

                                    @error('image')

                                    <br>

                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        <div class="card-footer text-end">

                            <button
                                type="submit"
                                class="btn btn-primary">

                                ایجاد اسلایدر

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
