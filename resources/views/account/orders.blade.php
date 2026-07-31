@extends('account.layouts.app')

@section('account-content')

    <main class="max-w-none w-full">

        <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
        <div class="flex flex-col ">


            <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
               <span class="flex items-center justify-between">
                 <span class="flex items-center gap-x-2">
                    <img src="{{asset('assets/images/svg/status-delivered.svg')}}" class="w-10" alt="">
                    <h2 class="font-DanaMedium text-lg">سفارش های من :</h2>
                </span>

               </span>
                <div class="relative mt-5 overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700  bg-gray-100 dark:bg-gray-900 dark:text-gray-200">
                        <tr>

                            <th scope="col" class="px-6 py-3.5">
                                شماره پیگیری
                            </th>
                            <th scope="col" class="px-6 py-3.5">
                                تعداد محصول
                            </th>
                            <th scope="col" class="px-6 py-3.5">
                                تاریخ
                            </th>
                            <th scope="col" class="px-6 py-3.5">
                                قیمت
                            </th>
                            <th scope="col" class="px-6 py-3.5">
                                وضعیت
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($userOrders as $order)
                            <tr class="bg-white border-b cursor-pointer dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">

                                <td class="px-6 py-5">
                                    {{ $order->tracking_code }}
                                </td>
                                <td class="px-6 py-5">
                                    {{ $order->total_products }}
                                </td>
                                <td class="px-6 py-5">
                                    {{ verta($order->created_at)->format('Y/m/d') }}
                                </td>
                                <td class="px-6 py-5">
                                    {{ number_format($order->final_price) }}
                                    تومان
                                </td>
                                <td class="px-6 py-5 text-red-500 font-DanaDemiBold">
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
