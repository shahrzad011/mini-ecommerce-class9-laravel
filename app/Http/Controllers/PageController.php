<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function about()
    {
        $title = 'درباره ما';

        return view('about', compact('title'));

    }

    public function contact()
    {
        $title = 'تماس با ما';

        return view('contact', compact('title'));
    }

    public function faq()
    {
        $title = 'سوالات متداول';

        return view('faq', compact('title'));
    }
}
