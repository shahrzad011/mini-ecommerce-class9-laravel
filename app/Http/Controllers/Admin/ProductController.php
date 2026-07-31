<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\File;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::with([
            'productCategory',
            'productImages.file'
        ])
            ->applySearch()
            ->applySort()
            ->paginate(20)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('is_active', 1)->get();

        return view('admin.products.create', compact('categories'));
    }


    public function store(ProductCreateRequest $request)
    {

        DB::beginTransaction();

        try {
            $product = Product::create([

                'name' => $request->name,
                'en_name' => $request->en_name,
                'product_category_id' => $request->product_category_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'qty' => $request->qty,
                'status' => 1,
                'description' => $request->description,

            ]);
//            dd($product);


            if ($request->hasFile('images')) {

                $isDefault = true;

                foreach ($request->file('images') as $image) {

                    $newFileName = time()
                        . '.product-image'
                        . rand(11111, 99999)
                        . '.'
                        . $image->extension();

                    $path = $image->storeAs(
                        'product-images',
                        $newFileName,
                        'public'
                    );


                    $file = File::create([

                        'name' => $newFileName,
                        'extension' => $image->extension(),
                        'size' => $image->getSize(),
                        'original_name' => $image->getClientOriginalName(),
                        'path' => $path

                    ]);

                    ProductImage::create([

                        'product_id' => $product->id,
                        'file_id' => $file->id,
                        'is_default' => $isDefault

                    ]);

                    $isDefault = false;
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.products.index');

        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back()
                ->withErrors([
                    'general' => 'خطایی رخ داده است'
                ])
                ->withInput($request->validated());

        }

    }

    public function show(Product $product)
    {
        $product->load([
            'productCategory',
            'productImages.file'
        ]);

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {

        $product->load([
            'productCategory',
            'productImages.file'
        ]);

        $categories = ProductCategory::where('is_active', 1)->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {

        $product->update([
            'name' => $request->name,
            'en_name' => $request->en_name,
            'product_category_id' => $request->product_category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'description' => $request->description,
        ]);
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {


                $fileName = time()
                    . '.product-image'
                    . rand(11111, 99999)
                    . '.'
                    . $image->extension();


                $path = $image->storeAs(
                    'product-images',
                    $fileName,
                    'public'
                );

                $file = File::create([

                    'name' => $fileName,

                    'extension' => $image->extension(),

                    'size' => $image->getSize(),

                    'original_name' => $image->getClientOriginalName(),

                    'path' => $path,

                ]);

                ProductImage::create([

                    'product_id' => $product->id,

                    'file_id' => $file->id,

                    'is_default' => !$product->productImages()
                        ->where('is_default', true)->exists()


                ]);
            }
        }
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'محصول با موفقیت ویرایش شد');
    }

    public function removeImage(Product $product, ProductImage $image)
    {

        if ($image->product_id != $product->id) {
            abort(403);
        }


        $file = File::find($image->file_id);

        $image->delete();


        if ($file) {

            if ($file->path && Storage::disk('public')->exists($file->path)) {

                Storage::disk('public')->delete($file->path);
            }

            $file->delete();
        }

        return back();

    }

}
