@extends('admin.layouts.app')

@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            مدیریت اسلایدرها
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard.index') }}">
                        داشبورد
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    مدیریت اسلایدرها
                </li>

            </ol>

        </nav>

    </div>

@endsection

@section('content')

    <div class="container-fluid pt-4">

        {{-- Top Card --}}
        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="card-body p-3">

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                            <div>
                                <h5 class="mb-0">
                                    لیست اسلایدرها
                                </h5>
                            </div>

                            <div>

                                <a href="{{ route('admin.sliders.create') }}"
                                   class="btn btn-primary">

                                    <i class="ri-add-line me-1"></i>

                                    ایجاد اسلایدر

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Table --}}

        <div class="row">

            <div class="col-xl-12">

                <div class="card custom-card">

                    <div class="table-responsive">

                        <table class="table table-bordered text-nowrap align-middle">

                            <thead>

                            <tr>

                                <th width="90">
                                    تصویر
                                </th>

                                <th>
                                    عنوان
                                </th>

                                <th>
                                    لینک
                                </th>

                                <th>
                                    ترتیب نمایش
                                </th>

                                <th>
                                    وضعیت
                                </th>

                                <th>
                                    تاریخ ایجاد
                                </th>

                                <th width="180">
                                    عملیات
                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            @forelse($sliders as $slider)

                                <tr>

                                    <td>

                                        <img
                                            src="{{ asset('storage/'.$slider->image) }}"
                                            class="rounded"
                                            style="width:70px;height:45px;object-fit:cover;"
                                            alt="{{ $slider->title }}"
                                        >

                                    </td>

                                    <td>

                                        <strong>

                                            {{ $slider->title }}

                                        </strong>

                                    </td>

                                    <td>

                                        @if($slider->url)

                                            <a href="{{ $slider->url }}"
                                               target="_blank">

                                                {{ $slider->url }}

                                            </a>

                                        @else

                                            -

                                        @endif

                                    </td>

                                    <td>

                                        {{ $slider->sort }}

                                    </td>

                                    <td>

                                        @if($slider->status)

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

                                        {{ optional($slider->created_at)->format('Y/m/d') }}

                                    </td>

                                    <td>

                                        <div class="hstack gap-2">

                                            <a href="{{ route('admin.sliders.show',$slider) }}"
                                               class="btn btn-primary-light btn-sm btn-icon">

                                                <i class="ri-eye-line"></i>

                                            </a>

                                            <a href="{{ route('admin.sliders.edit',$slider) }}"
                                               class="btn btn-secondary-light btn-sm btn-icon">

                                                <i class="ti ti-pencil"></i>

                                            </a>

                                            <form
                                                action="{{ route('admin.sliders.destroy',$slider) }}"
                                                method="POST"
                                                onsubmit="return confirm('آیا از حذف این اسلایدر مطمئن هستید؟')">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="btn btn-danger-light btn-sm btn-icon">

                                                    <i class="ri-delete-bin-line"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="text-center">

                                        اسلایدری ثبت نشده است.

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="card-footer">

                        {{ $sliders->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
