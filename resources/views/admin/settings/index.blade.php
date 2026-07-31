@extends('admin.layouts.app')

@section('breadcrumb')

    <div>

        <h1 class="page-title fw-medium fs-18 mb-2">
            تنظیمات سایت
        </h1>

        <nav>

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard.index') }}">
                        داشبورد
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    تنظیمات سایت
                </li>

            </ol>

        </nav>

    </div>

@endsection


@section('content')

    <div class="container-fluid pt-4">

        <div class="row">

            <div class="col-xl-12">

                <form action="{{ route('admin.settings.update') }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="card custom-card mb-4">

                        <div class="card-header">

                            <div class="card-title">
                                تنظیمات سایت
                            </div>

                        </div>


                        <div class="card-body">

                            <div class="row gy-3">

                                {{-- عنوان فروشگاه --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        عنوان فروشگاه
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="settings[footer_title]"
                                        value="{{ old('settings.footer_title',$settings['footer_title'] ?? '') }}"
                                        placeholder="عنوان فروشگاه">

                                    @error('settings.footer_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- شماره تماس --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        شماره تماس
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="settings[footer_phone]"
                                        value="{{ old('settings.footer_phone',$settings['footer_phone'] ?? '') }}"
                                        placeholder="02191013171">

                                    @error('settings.footer_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- ایمیل --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        ایمیل
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control"
                                        name="settings[footer_email]"
                                        value="{{ old('settings.footer_email',$settings['footer_email'] ?? '') }}"
                                        placeholder="info@example.com">

                                    @error('settings.footer_email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- اینستاگرام --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        لینک اینستاگرام
                                    </label>

                                    <input
                                        type="url"
                                        class="form-control"
                                        name="settings[footer_instagram]"
                                        value="{{ old('settings.footer_instagram',$settings['footer_instagram'] ?? '') }}"
                                        placeholder="https://instagram.com/...">

                                    @error('settings.footer_instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- لینکدین --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        لینک لینکدین
                                    </label>

                                    <input
                                        type="url"
                                        class="form-control"
                                        name="settings[footer_linkedin]"
                                        value="{{ old('settings.footer_linkedin',$settings['footer_linkedin'] ?? '') }}"
                                        placeholder="https://linkedin.com/company/...">

                                    @error('settings.footer_linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- آدرس --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        آدرس
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="settings[footer_address]"
                                        value="{{ old('settings.footer_address',$settings['footer_address'] ?? '') }}"
                                        placeholder="آدرس فروشگاه">

                                    @error('settings.footer_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- درباره فروشگاه --}}
                                <div class="col-xl-12">

                                    <label class="form-label">
                                        درباره فروشگاه
                                    </label>

                                    <textarea
                                        class="form-control"
                                        rows="5"
                                        name="settings[footer_about]"
                                        placeholder="درباره فروشگاه">{{ old('settings.footer_about',$settings['footer_about'] ?? '') }}</textarea>

                                    @error('settings.footer_about')
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
