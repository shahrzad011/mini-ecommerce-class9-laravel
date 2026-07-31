@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">

                <form action="{{ route('admin.productCategories.update',$productCategory) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="card custom-card mb-4">

                        <div class="card-header">
                            <div class="card-title">
                                ویرایش دسته‌بندی
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row gy-3">

                                {{-- نام --}}
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        نام دسته‌بندی
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{ old('name',$productCategory->name) }}"
                                        placeholder="نام دسته بندی">

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- اسلاگ --}}
                                <div class="col-xl-6">
                                    <label class="form-label">
                                        نامک (Slug)
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="slug"
                                        value="{{ old('slug',$productCategory->slug) }}"
                                        placeholder="Slug">

                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- توضیحات --}}
                                <div class="col-xl-12">
                                    <label class="form-label">
                                        توضیحات
                                    </label>

                                    <textarea
                                        class="form-control"
                                        rows="4"
                                        name="description"
                                        placeholder="توضیحات">{{ old('description',$productCategory->description) }}</textarea>

                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
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
