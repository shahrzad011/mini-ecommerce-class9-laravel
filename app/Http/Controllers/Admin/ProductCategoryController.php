<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\File;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::withCount('products')
            ->paginate(20)->withQueryString();

        return view('admin.product_categories.index', compact('productCategories'));
    }


    public function create()
    {
        return view('admin.product_categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        DB::beginTransaction();

        try {

            $category = ProductCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'is_active' => 1,
            ]);

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $fileName =
                    time() .
                    '.category.' .
                    rand(11111, 99999) .
                    '.' . $image->extension();

                $path = $image->storeAs(
                    'category-images',
                    $fileName,
                    'public'
                );

                $file = File::create([
                    'name' => $fileName,
                    'extension' => $image->extension(),
                    'size' => $image->getSize(),
                    'original_name' => $image->getClientOriginalName(),
                    'path' => $path
                ]);

                $category->update([
                    'file_id' => $file->id
                ]);
            }

            DB::commit();

            return redirect()
                ->route('admin.productCategories.index');

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error($e);

            return back()
                ->withErrors([
                    'general' => 'خطایی رخ داده است.'
                ])
                ->withInput();
        }

    }

    public function show(ProductCategory $productCategory)
    {
        $productCategory->load([
            'products.productImages.file'
        ]);


        return view('admin.product_categories.show', compact('productCategory'));
    }


    public function edit(ProductCategory $productCategory)
    {
//        $productCategory->load('file');

        return view(
            'admin.product_categories.edit',
            compact('productCategory')
        );
    }


    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        DB::beginTransaction();

        try {

            $productCategory->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);


            DB::commit();

            return redirect()
                ->route('admin.productCategories.index');

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error($e);

            return back()->withErrors([
                'general' => 'خطا در ویرایش'
            ]);
        }
    }


    public function destroy(ProductCategory $productCategory)
    {
        DB::beginTransaction();

        try {

            if ($productCategory->products()->count() > 0) {

                return back()->withErrors([
                    'general' => 'ابتدا محصولات این دسته را حذف کنید.'
                ]);
            }

            if ($productCategory->file) {

                if (Storage::disk('public')->exists($productCategory->file->path)) {
                    Storage::disk('public')->delete($productCategory->file->path);
                }

                $productCategory->file->delete();
            }

            $productCategory->delete();

            DB::commit();

            return redirect()
                ->route('admin.productCategories.index');

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error($e);

            return back()->withErrors([
                'general' => 'خطا در حذف'
            ]);
        }
    }
}
