<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;


class SettingController extends Controller
{
    public function index()
    {
//        $settings = Setting::all();
        $settings = Setting::pluck('value', 'code');

        return view(
            'admin.settings.index',
            compact('settings')
        );
    }


    public function update(SettingUpdateRequest $request)
    {
        foreach ($request->settings as $code => $value) {

            Setting::updateOrCreate(

                [
                    'code' => $code
                ],

                [
                    'value' => $value
                ]

            );

        }

        return redirect()
            ->route('admin.settings.index')
            ->with(
                'success',
                'تنظیمات با موفقیت بروزرسانی شد.'
            );
    }
}
