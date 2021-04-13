<?php

namespace App\Http\Controllers;

use App\Community;
use App\Ethnicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all();

        return view('communities.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ethnicities = Ethnicity::all();
        $regions = DB::table('region')->get();

        return view('communities.create', compact('ethnicities', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Community $community)
    {
        $data = request()->validate([
            'name' => 'required',
            'leader' => 'nullable',
            'ethnicity' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'sitio' => 'required',
            'livelihood' => 'nullable',
            'skills' => 'nullable',
            'created_at' => 'required'
        ]);

        $community->insert([$data]);

        $notification = array(
            'message' => 'Community successfully Added!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $community = Community::find($id);
        $ethnicities = Ethnicity::all();
        $regions = DB::table('region')->get();

        return view('communities.show', compact('community', 'ethnicities', 'regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        $data = request()->validate([
            'name' => 'required',
            'leader' => 'nullable',
            'ethnicity' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'sitio' => 'required',
            'livelihood' => 'nullable',
            'skills' => 'nullable',
            'updated_at' => 'required'
        ]);

        $community->find($community->id)->update($data);

        $notification = array(
            'message' => 'Community successfully updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
