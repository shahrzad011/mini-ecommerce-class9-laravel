@extends('account.layouts.app')

@section('account-content')

    <!-- Header -->
    <header class="header">

        <!-- Mobile -->
        <div class="flex justify-center lg:hidden">
            <!-- Top Navbar -->

            <!-- Search baer -->
            <button class="open-mobile_search-modal">
                <svg class=" size-6">
                    <use href="#search"/>
                </svg>
                <p>جستجو در <span class="font-MorabbaMedium">کارین شاپ</span></p>
            </button>
            <!-- Search Moadal -->
            <div class="mobile_search-modal">
                <!-- TOP -->
                <div class="w-full flex items-center gap-x-2">
                    <button
                        class="w-full flex items-center gap-x-1 bg-gray-200 dark:bg-gray-800 text-gray-500 py-2 px-8 rounded-3xl">
                        <svg class="size-6">
                            <use href="#search"/>
                        </svg>
                        <input type="text" placeholder="جستجو در همه کالاها">
                    </button>
                    <svg class="size-6 close-mobile_search-modal">
                        <use href="#x-mark"/>
                    </svg>
                </div>
                <div class="w-full space-y-4">
                    <!-- Result -->
                    <div>
                    <span class=" flex items-center text-sm gap-x-1 text-gray-600 dark:text-gray-200">
                        <p>نتیجه جستجو : <span class="font-DanaMedium text-blue-400">iphone</span></p>
                        </span>
                        <ul
                            class="pt-4 text-gray-500 dark:text-gray-300 flex flex-col gap-y-4 child:flex-between child:cursor-pointer">
                            <li>
                                <a href="#" class="flex items-center gap-x-2">
                                    <svg class="size-5">
                                        <use href="#search"/>
                                    </svg>
                                    آیفون 14
                                </a>
                                <svg class="size-4">
                                    <use href="#arrow-up-right"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-x-2">
                                    <svg class="size-5">
                                        <use href="#search"/>
                                    </svg>
                                    قاب آیفون
                                </a>
                                <svg class="size-4">
                                    <use href="#arrow-up-right"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-x-2">
                                    <svg class="size-5">
                                        <use href="#search"/>
                                    </svg>
                                    کاور ایفون 16
                                </a>
                                <svg class="size-4">
                                    <use href="#arrow-up-right"/>
                                </svg>
                            </li>
                        </ul>
                    </div>
                    <!-- Trend -->
                    <div class="pt-4">
                        <span class="flex items-center gap-x-1 text-sm text-gray-500 dark:text-gray-200">
                            <svg class="size-4">
                                <use href="#fire"/>
                            </svg>
                            <p>جستجو های پرطرفدار :</p>
                        </span>
                        <ul class="w-full flex items-center gap-1.5 mt-3 child:search-modal-list-item">
                            <li>
                                <a href="#">#آیفون</a>
                            </li>
                            <li>
                                <a href="#">#لپ تاپ</a>
                            </li>
                            <li>
                                <a href="#">#هدفون</a>
                            </li>
                            <li>
                                <a href="#">#هلدر</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- bottom Navbar-->
            <ul class="bottom-navbar">
                <li class="dark:text-sky-400 text-blue-500 font-DanaMedium">
                    <svg class="size-5">
                        <use href="#home"/>
                    </svg>
                    <a href="index.html">خانه</a>
                </li>
                <li>
                    <svg class="size-5">
                        <use href="#squares"/>
                    </svg>
                    <a href="shop.html">فروشگاه</a>
                </li>
                <li>
                    <svg class="size-5">
                        <use href="#shopping-bag"/>
                    </svg>
                    <a href="shopping-cart.html">سبد خرید</a>
                </li>
                <li>
                    <svg class="size-5">
                        <use href="#user"/>
                    </svg>
                    <a href="dashboard.html">حساب من</a>
                </li>
            </ul>
        </div>
    </header>


    <main class="container relative">

        {{--        <div class="flex flex-col lg:flex-row gap-x-8 mt-10">--}}
        {{--            <!-- SIDE MENU -->--}}
        {{--      --}}
        {{--        </div>--}}
        <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
        <div class="lg:w-3/4">
            <div class="flex lg:hidden">
                <button
                    class="open-user-menu mr-2 bg-blue-500 flex items-center gap-x-1 font-DanaMedium text-white p-2 rounded-lg text-sm">
                    <svg class="size-5">
                        <use href="#bars-3"/>
                    </svg>
                    منوی کاربری
                </button>
                <div class="user-menu">
                    <button class="close-user-menu">
                        <svg class="size-6">
                            <use href="#x-mark"/>
                        </svg>
                    </button>
                    <!-- NAME AND AVATAR  -->
{{--                    <div--}}
{{--                        class="w-full flex items-center justify-between border-b border-gray-200 dark:border-white/20 py-3">--}}
{{--                        <div class="flex items-center gap-x-3">--}}
{{--                            <img src="./images/svg/user.png" class="size-10 ring-2 ring-gray-400/20 rounded-full"--}}
{{--                                 alt="AVATAR">--}}
{{--                            <span class="felx flex-col gap-y-2">--}}
{{--                            <p class="font-DanaMedium text-lg">پارسا وصالی</p>--}}
{{--                            <p class="text-gray-400">09100000001</p>--}}
{{--                        </span>--}}
{{--                        </div>--}}
{{--                        <span>--}}
{{--                        <svg class="w-6 h-6 cursor-pointer text-blue-500">--}}
{{--                            <use href="#edit"></use>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
{{--                    </div>--}}
                    <ul
                        class="w-full relative space-y-2 child:duration-300 child:transition-all child:py-3  child:px-2 child:flex child:gap-x-2 text-lg child:cursor-pointer child:rounded-lg">
{{--                        <li class="hover:text-blue-500">--}}
{{--                            <svg class="w-6 h-6 ">--}}
{{--                                <use href="#squares"></use>--}}
{{--                            </svg>--}}
{{--                            <a href="dashboard.html">داشبورد</a>--}}
{{--                        </li>--}}
                        <li class="bg-blue-500/10 text-blue-500">
                            <svg class="w-6 h-6 ">
                                <use href="#shopping-bag"></use>
                            </svg>
                            <a href="dashboard-orders.html">
                                سفارش ها
                            </a>
                        </li>
{{--                        <li class="hover:text-blue-500">--}}
{{--                            <svg class="w-6 h-6 ">--}}
{{--                                <use href="#heart"></use>--}}
{{--                            </svg>--}}
{{--                            <a href="dashboard-favorite.html">علاقه‌مندی ها</a>--}}
{{--                        </li>--}}
{{--                        <li class="hover:text-blue-500">--}}
{{--                            <svg class="w-6 h-6 ">--}}
{{--                                <use href="#map"></use>--}}
{{--                            </svg>--}}
{{--                            <a href="dashboard-address.html">آدرس ها</a>--}}
{{--                        </li>--}}
{{--                        <li class="hover:text-blue-500">--}}
{{--                            <svg class="w-6 h-6 ">--}}
{{--                                <use href="#bell"></use>--}}
{{--                            </svg>--}}
{{--                            <a href="dashboard-messages.html">پیام ها</a>--}}
{{--                        </li>--}}
                        <li class="hover:text-blue-500">
                            <svg class="w-6 h-6 ">
                                <use href="#cog"></use>
                            </svg>
                            <a href="dashboard-account.html">اطلاعات حساب </a>
                        </li>
                        <li class="text-red-400">
                            <svg class="w-6 h-6 ">
                                <use href="#arrow-left-end"></use>
                            </svg>
                            <a href="{{route('index')}}">خروج</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
               <div class="flex items-center justify-between">
                 <span class="flex items-center gap-x-2">
                    <img src="{{asset('assets/images/svg/status-delivered.svg')}}" class="w-10" alt="">
                    <h2 class="font-DanaMedium text-lg">سفارش های من :</h2>
               </span>
               </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">

                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700  bg-gray-100 dark:bg-gray-900 dark:text-gray-200 child:text-center ">
                        <tr>

                            <th scope="col" class="px-10 py-3.5">
                                شماره پیگیری
                            </th>
                            <th scope="col" class="px-10 py-3.5">
                                تعداد محصول
                            </th>
                            <th scope="col" class="px-6 py-3.5">
                                تاریخ
                            </th>
                            <th scope="col" class="px-10 py-3.5">
                                قیمت
                            </th>
                            <th scope="col" class="px-10 py-3.5">
                                وضعیت
                            </th>

                        </tr>
                        </thead>

                        <tbody class="child:text-center">

                        @forelse($userOrders as $order)

                            <tr class="bg-white border-b cursor-pointer dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">


                                <td class="px-10 py-5">
                                    {{ $order->tracking_code }}
                                </td>


                                <td class="py-5 px-10 text-center">
                                    {{ $order->total_products }}
                                </td>

                                <td class="py-5 px-10 text-center">
                                    {{ verta($order->created_at)->format('Y/m/d') }}
                                </td>


                                <td class="px-10 py-5">
                                    {{ number_format($order->final_price) }}
                                    تومان
                                </td>



{{--                                <td class="px-10 py-5">--}}
{{--                                    @switch($order->status)--}}
{{--                                        @case(0)--}}
{{--                                            <span class="text-yellow-500 font-bold"> در انتظار پرداخت </span>--}}
{{--                                            @break--}}

{{--                                        @case(1)--}}
{{--                                            <span class="text-blue-500 font-bold"> در حال پردازش </span>--}}
{{--                                            @break--}}

{{--                                        @case(2)--}}
{{--                                            <span class="text-purple-500 font-bold"> ارسال شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(3)--}}
{{--                                            <span class="text-green-600 font-bold"> تحویل شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(4)--}}
{{--                                            <span class="text-red-500 font-bold"> لغو شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(5)--}}
{{--                                            <span class="text-orange-500 font-bold"> مرجوع شده</span>--}}
{{--                                            @break--}}

{{--                                        @default--}}
{{--                                            <span class="text-gray-500 font-bold"> نامشخص </span>--}}
{{--                                    @endswitch--}}
{{--                                </td>--}}


{{--                                    @switch($order->status)--}}

{{--                                        @case(0)--}}
{{--                                            <span class="text-yellow-500 font-bold"> در انتظار پرداخت </span>--}}
{{--                                            @break--}}

{{--                                        @case(1)--}}
{{--                                            <span class="text-blue-500 font-bold">  در حال پردازش </span>--}}
{{--                                            @break--}}

{{--                                        @case(2)--}}
{{--                                            <span class="text-purple-500 font-bold"> ارسال شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(3)--}}
{{--                                            <span class="text-green-600 font-bold"> تحویل شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(4)--}}
{{--                                            <span class="text-red-500 font-bold"> لغو شده </span>--}}
{{--                                            @break--}}

{{--                                        @case(5)--}}
{{--                                            <span class="text-orange-500 font-bold"> مرجوع شده</span>--}}
{{--                                            @break--}}

{{--                                        @default--}}
{{--                                            <span class="text-gray-500 font-bold"> نامشخص </span>--}}

{{--                                    @endswitch--}}

{{--                                </td>--}}
                                <td class="px-10 py-5">
                                    @switch($order->status)
                                        @case(0)
                                            <span class="text-yellow-500 font-bold"> در انتظار پرداخت </span>
                                            @break

                                        @case(1)
                                            <span class="text-blue-500 font-bold"> در حال پردازش </span>
                                            @break

                                        @case(2)
                                            <span class="text-purple-500 font-bold"> ارسال شده </span>
                                            @break

                                        @case(3)
                                            <span class="text-green-600 font-bold"> تحویل شده </span>
                                            @break

                                        @case(4)
                                            <span class="text-red-500 font-bold"> لغو شده </span>
                                            @break

                                        @case(5)
                                            <span class="text-orange-500 font-bold"> مرجوع شده</span>
                                            @break

                                        @default
                                            <span class="text-gray-500 font-bold"> نامشخص </span>
                                    @endswitch
                                </td>


                            </tr>
                        @empty
                            <tr>

                                <td colspan="5" class="text-center py-8 text-gray-500">
                                    سفارشی ثبت نشده است.
                                </td>

                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
@endsection
