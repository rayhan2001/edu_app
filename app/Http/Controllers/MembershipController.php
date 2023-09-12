<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.membership.index',compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.membership.create');
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
            'name' => 'required',
            'full_name' => 'required',
            'ssc_passing_year' => 'required|numeric|digits:4',
            'professor_designation' => 'required',
            'place_work' => 'required',
            'mobile_no' => 'required|numeric|digits:11',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'birthday' => 'required|date',
            'nid' => 'required|numeric|digits:8',
            'transaction_id' => 'required',
            'transaction_number' => 'required',
            'blood_group' => 'required',
            'account_number' => 'required|numeric|digits:11',
            'email' => 'required|email',
        ]);

        $membership = new Membership();
        $membership->name = $request->name;
        $membership->full_name = $request->full_name;
        $membership->ssc_passing_year = $request->ssc_passing_year;
        $membership->professor_designation = $request->professor_designation;
        $membership->place_work = $request->place_work;
        $membership->mobile_no = $request->mobile_no;
        $membership->present_address = $request->present_address;
        $membership->permanent_address = $request->permanent_address;
        $membership->birthday = $request->birthday;
        $membership->nid = $request->nid;
        $membership->transaction_id = $request->transaction_id;
        $membership->transaction_number = $request->transaction_number;
        $membership->blood_group = $request->blood_group;
        $membership->account_number = $request->account_number;
        $membership->email = $request->email;
        $membership->save();

        return response()->json(['status'=>200]);
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
        $membership = Membership::find($id);
        $membership->delete();

        return response()->json([
            'status'=>200
        ]);
    }

    public function membershipAction(Request $request){
        $id = $request->input('id');
        $action = $request->input('action');

        if ($action === 'approve') {
            $membership = Membership::where('id',$id)->first();
            $membership->status = 1;
        } elseif ($action === 'deny') {
            $membership = Membership::where('id',$id)->first();
            $membership->status = 2;
        }
        $membership->save();

        return response()->json(['status' => 200, 'action' => $action]);
    }
}
