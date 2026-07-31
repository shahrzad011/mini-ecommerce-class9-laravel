<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $title = 'صفحه اصلی';
        $productCategories = ProductCategory::query()
            ->limit(5)
            ->get();

        $newestProducts = Product::query()
            ->with('defaultImage.file')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();



        $bestSellingProducts = Product::query()
            ->with([
                'defaultImage.file'
            ])
            ->withSum('orderItems', 'qty')
            ->orderByDesc('order_items_sum_qty')
            ->limit(5)
            ->get();



        $sliders = Slider::query()
            ->where('status', 1)
            ->orderBy('sort')
            ->get();

        return view('index',
            compact(
                'title', 'productCategories',
                'newestProducts', 'bestSellingProducts', 'sliders'
            ));
    }
}
