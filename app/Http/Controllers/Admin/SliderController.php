<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort')->paginate(20)
            ->withQueryString();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderStoreRequest $request)
    {

        $image = $request->file('image');

        $fileName = time() . '_' . rand(1111, 9999) . '.' . $image->extension();

        $path = $image->storeAs(
            'sliders',
            $fileName,
            'public'

        );

//        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'image' => $path,
            'url' => $request->url,
            'sort' => $request->sort,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'اسلایدر با موفقیت ایجاد شد.');
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {

        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'sort' => $request->sort,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {

            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }


            $image = $request->file('image');

            $fileName = time().'_'.rand(1111,9999).'.'.$image->extension();


            $path = $image->storeAs(
                'sliders',
                $fileName,
                'public'
            );


            $data['image'] = $path;
        }

        $slider->update($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success','اسلایدر با موفقیت ویرایش شد.');


    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success','اسلایدر حذف شد.');
    }

}
