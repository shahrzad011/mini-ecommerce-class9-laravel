@extends('account.layouts.app')

@section('account-content')

    <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
        <div class="flex items-center justify-between">
            <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
        </div>
        <form class="mt-5 grid grid-cols-12 gap-5 child:col-span-12 child:lg:col-span-6" action="{{ route('account.edit-profile.post') }}" method="POST">
            @csrf

            <!-- ITEM -->
            <div>
                <label for="input1" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input1"
                        type="text"
                        name="first_name"
                        class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                        value="{{old('first_name', $user->first_name)}}"
                    >
                </div>

                @error('first_name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <!-- ITEM -->
            <div>
                <label for="input2" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام خانوادگی
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input2"
                        type="text"
                        name="last_name"
                        class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                        value="{{old('last_name', $user->last_name)}}"
                    >
                </div>
                @error('last_name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <!-- ITEM -->
            <div>
                <label for="input3" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    شماره موبایل
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input3"
                        name="mobile"
                        type="text"
                        class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                        value="{{old('mobile', $user->mobile)}}"
                    >
                </div>
                @error('mobile')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <!-- ITEM -->
            <div>
                <label for="input4" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    ایمیل
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input4"
                        name="email"
                        type="text"
                        class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                        value="{{old('email', $user->email)}}"
                    >
                </div>
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- ITEM -->
            <div>
                <label for="input5" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    رمز عبور
                </label>
                <div class="mt-3 relative">
                    <input
                        id="input5"
                        name="password"
                        type="text"
                        class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                    >
                    <small> در صورت تغییر کلمه عبور این فیلد را پر کنید. </small>
                </div>
                @error('password')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <br><br><br>


            <button
                type="submit"
                class="mt-5 px-10 py-3 rounded-lg bg-blue-500/10 text-blue-500
           font-DanaMedium border border-blue-500/20
           hover:bg-blue-500 hover:text-white
           transition-all duration-300">
                ذخیره تغییرات
            </button>

        </form>
    </div>

@endsection
