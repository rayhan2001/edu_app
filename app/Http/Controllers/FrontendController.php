<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use App\Models\Home;
use App\Models\Membership;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $setting = Setting::orderBy('id', 'desc')->first();
        $home = Home::orderBy('id', 'desc')->first();
        $galleries = Gallery::all();
        $members = Membership::all();
        $about = About::orderBy('id', 'desc')->first();
        return view('frontend.pages.home',compact('home', 'about','setting','galleries','members'));
    }
}
