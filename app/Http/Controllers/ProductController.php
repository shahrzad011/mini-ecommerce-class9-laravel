<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'فروشگاه';

        $products = Product::query()
            ->with('defaultImage.file')
            ->applySort()
            ->applyFilter()
            ->applySearch()
            ->where('status', '=', ProductStatus::ENABLE)
            ->paginate(2)
            ->withQueryString();



        $productCategories = ProductCategory::all();
        return view('products.index', compact('products', 'productCategories', 'title'));


    }

    public function show(Product $product)
    {
        $product->load([
            'productCategory',
            'productImages.file'
        ]);

        $relatedProducts = Product::query()
            ->where('product_category_id', '=', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->limit(6)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function removeFilters(Request $request)
    {
        $inputs = $request->all();

        unset($inputs['exists']);
        unset($inputs['category_id']);

        return redirect()->route('products.index', $inputs);

    }

    public function searchSuggestion(Request $request)
    {
        $keyword = $request->keyword;


        $products = Product::query()
            ->where('status',1)
            ->where(function ($query) use ($keyword){

                $query->where('name','like',"%{$keyword}%")
                    ->orWhere('en_name','like',"%{$keyword}%");

            })
            ->select([
                'id',
                'name',
                'en_name',
                'price',
                'discount'
            ])
            ->limit(5)
            ->get();


        return response()->json($products);
    }

}
