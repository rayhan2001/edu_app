<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
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
        $single_galley = Gallery::where('id','desc')->first();
        return view('frontend.pages.gallery.gallery',compact('galleries'));
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
            'video' => 'required|mimes:mp4',
            'title' => 'required',
            'status' => 'required',
            'choose_us' => 'required',
            'mission' => 'required',
            'vission' => 'required',
            'company_velu' => 'required',
        ]);
        $gallery = new Gallery();
        $gallery->image = $this->saveImage($request);
        $gallery->video = $this->saveVideo($request);
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        $gallery->choose_us = $request->choose_us;
        $gallery->mission = $request->mission;
        $gallery->vission = $request->vission;
        $gallery->company_velu = $request->company_velu;
        $gallery->save();

        return redirect(route('gallery.index'));
    }
    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/gallery/image/';
        $imageUrl = $path.$imageName;
        $image->move($path,$imageName);
        return $imageUrl;
    }
    public function saveVideo(Request $request){
        $image =$request->file('video');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/gallery/video/';
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
        //
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
        //
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
        if ($gallery->video){
            unlink($gallery->video);
        }
        $gallery->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
