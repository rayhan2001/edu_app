<?php

namespace App\Http\Controllers;

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
        return view('frontend.pages.home',compact('home','setting','galleries','members'));
    }
}
