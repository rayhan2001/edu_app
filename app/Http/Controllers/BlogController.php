<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogFrontendView(){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $blog = Blog::orderBy('id', 'desc')->first();
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('frontend.pages.blog.blog',compact('setting','galleries','blog','blogs'));
    }

    public function blogDetails($id){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $blog = Blog::find($id);
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('frontend.pages.blog.blog_details',compact('setting','galleries','blog','blogs'));
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);
        $blog = new Blog();
        $blog->image = $this->saveImage($request);
        $blog->title = $request->title;
        $blog->date = $request->date;
        $blog->description = $request->description;
        $blog->save();

        return response()->json(['status'=>200]);
    }
    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/blog/';
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
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);
        $blog = Blog::find($id);
        $blog->image = $this->saveImage($request);
        $blog->title = $request->title;
        $blog->date = $request->date;
        $blog->description = $request->description;
        $blog->save();

        return response()->json(['status'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if ($blog->image){
            unlink($blog->image);
        }
        $blog->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
