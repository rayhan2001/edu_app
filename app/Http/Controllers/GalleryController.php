<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galleryFrontendView()
    {
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        return view('frontend.pages.gallery.gallery',compact('galleries','setting'));
    }


    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'video_link' => 'required|url',
            'title' => 'required',
        ]);
        $gallery = new Gallery();
        $gallery->image = $this->saveImage($request);
        $gallery->video_link = $request->video_link;
        $gallery->title = $request->title;
        $gallery->save();

        return redirect(route('gallery.index'));
    }
    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/gallery/';
        $imageUrl = $path.$imageName;
        $image->move($path,$imageName);
        return $imageUrl;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'video_link' => 'required|url',
            'title' => 'required',
        ]);
        $gallery = Gallery::find($id);
        $gallery->image = $this->saveImage($request);
        $gallery->video_link = $request->video_link;
        $gallery->title = $request->title;
        $gallery->save();

        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery->image){
            unlink($gallery->image);
        }
        $gallery->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
