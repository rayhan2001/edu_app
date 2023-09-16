<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $setting = Setting::orderBy('id', 'desc')->first();
        $galleries = Gallery::all();
        return view('frontend.pages.home',compact('setting','galleries'));
    }
}
