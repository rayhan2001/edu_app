<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
        return view('admin.home.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.create');
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
            'sub_title' => 'required',
        ]);

        $home = new Home();
        $home->title = $request->title;
        $home->sub_title = $request->sub_title;
        $home->image = $this->saveImage($request);
        $home->save();

        return response()->json(['status'=>200]);
    }

    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/home-slider/';
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
        $home = Home::find($id);
        return view('admin.home.edit',compact('home'));
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
            'sub_title' => 'required',
        ]);

        $home = Home::find($id);
        $home->title = $request->title;
        $home->sub_title = $request->sub_title;
        $home->image = $this->saveImage($request);
        $home->save();

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
        $home = Home::find($id);
        if ($home->image){
            unlink($home->image);
        }
        $home->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
