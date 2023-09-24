<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Setting;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noticeFrontendView(){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $notices = Notice::all();
        return view('frontend.pages.notice.notice',compact('galleries','setting','notices'));
    }

    public function download(Notice $notice)
    {
        $filePath = public_path($notice->file_url);

        if (file_exists($filePath)) {
            return response()->file($filePath, ['Content-Type' => 'application/pdf']);
        } else {
            return "Not Found!";
        }
    }

    public function index()
    {
        $notices = Notice::all();
        return view('admin.notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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
            'image' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'title' => 'required',
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $fileUrl = $this->saveFile($request);
        $notice->file_url = $fileUrl;
        $notice->save();

        return response()->json(['status' => 200]);
    }

    public function saveFile(Request $request){
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = $request->title . '_' . time() . '.' . $fileExtension;
        $path = $fileExtension === 'pdf' ? 'upload/notice/pdfs/' : 'upload/notice/images/';
        $file->move($path, $fileName);

        return $path . $fileName;
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
        $notice = Notice::find($id);
        return view('admin.notice.edit',compact('notice'));
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
            'image' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'title' => 'required',
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $fileUrl = $this->saveFile($request);
        $notice->file_url = $fileUrl;
        $notice->status = $request->status;
        $notice->save();

        return response()->json(['status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        if ($notice->image){
            unlink($notice->image);
        }
        $notice->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
