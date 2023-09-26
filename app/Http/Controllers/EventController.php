<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventFrontendView(){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $events = Event::all();
        return view('frontend.pages.event.event',compact('galleries','setting','events'));
    }
    public function eventDetails($id){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $event = Event::find($id);
        return view('frontend.pages.event.event_details',compact('galleries','setting','event'));
    }

    public function upEventFrontendView(){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $events = Event::where('upcoming_event',1)->get();
        return view('frontend.pages.event.upcoming_event',compact('galleries','setting','events'));
    }

    public function previousEventFrontendView(){
        $galleries = Gallery::all();
        $setting = Setting::orderBy('id', 'desc')->first();
        $events = Event::where('date', '<=', now()->subDays(3))->get();
        return view('frontend.pages.event.previous_event',compact('galleries','setting','events'));
    }


    public function index()
    {
        $events = Event::all();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            'event_venue' => 'required',
            'contract_number' => 'required|numeric|digits:11',
            'description' => 'required',
        ]);

        $event = new Event();
        $event->image = $this->saveImage($request);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->event_venue = $request->event_venue;
        $event->contract_number = $request->contract_number;
        $event->description = $request->description;
        $event->upcoming_event = $request->upcoming_event;
        $event->save();

        return response()->json(['status'=>200]);
    }

    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $path ='upload/event/';
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
        $event = Event::find($id);
        return view('admin.event.edit',compact('event'));
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
            'event_venue' => 'required',
            'contract_number' => 'required|numeric|digits:11',
            'description' => 'required',
        ]);

        $event = Event::find($id);
        $event->image = $this->saveImage($request);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->event_venue = $request->event_venue;
        $event->contract_number = $request->contract_number;
        $event->description = $request->description;
        $event->upcoming_event = $request->upcoming_event;
        $event->save();

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
        $event = Event::find($id);
        if ($event->image){
            unlink($event->image);
        }
        $event->delete();

        return response()->json([
            'status'=>200
        ]);
    }
}
