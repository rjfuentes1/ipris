<?php

namespace App\Http\Controllers;

use App\Person;
use App\Ethnicity;
use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();
        $regions = DB::table('region')->get();
        $provinces = DB::table('province')->get();

        return view('people.index', compact('people', 'regions', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relhhs = DB::table('relhh')->get();
        $educations = DB::table('education')->get();
        $regions = DB::table('region')->get();
        $ethnicities = Ethnicity::all();
        $communities = Community::all();

        return view('people.create', compact('relhhs', 'educations', 'regions', 'ethnicities', 'communities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Person $person)
    {
        $data = request()->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'extension' => 'nullable',
            'sex' => 'required',
            'birthdate' => 'required',
            'birthreg' => 'required',
            'relhh' => 'required',
            'education' => 'required',
            'philhealth' => 'required',
            'dswd_household' => 'required',
            'community' => 'required',
            'isIP' => 'required',
            'head' => 'nullable',
        ]);

        $community = Community::where('id', $data['community'])->first();
        
        // IP id number
        if(!Person::first()){
            $ipId = $community->barangay . str_pad(1, 6, 0, STR_PAD_LEFT);
        }else{
            $start_increment = Person::orderBy('id', 'DESC')->first();

            $ipId = $community->barangay . str_pad($start_increment->id + 1, 6, 0, STR_PAD_LEFT);
        }

        // Validate if data already exist in DB
        if(Person::where('lastname', $data['lastname'])->where('firstname', $data['firstname'])->where('middlename', $data['middlename'])
        ->where('extension', $data['extension'])->count() > 0){

            $notification = array(
                'message' => 'Record already exists!',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);

        }else{
            $person = new Person([
                'ipId' => $ipId,
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'extension' => $data['extension'],
                'sex' => $data['sex'],
                'birthdate' => \Carbon\Carbon::parse($data['birthdate'])->format('Y-m-d'),
                'birthreg' => $data['birthreg'],
                'relhh' => $data['relhh'],
                'education' => $data['education'],
                'philhealth' => $data['philhealth'],
                'dswd_household' => $data['dswd_household'],
                'community' => $data['community'],
                'isIP' => $data['isIP'],
                'head' => $data['head'],
                'region' => $community->region,
                'province' => $community->province,
                'municipality' => $community->municipality,
                'barangay' => $community->barangay,
                'sitio' => $community->sitio,
                'ethnicity' => $community->ethnicity,
            ]);

            $person->save();

            $notification = array(
                'message' => 'Record successfully added!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        $relhhs = DB::table('relhh')->get();
        $educations = DB::table('education')->get();
        $regions = DB::table('region')->get();
        $ethnicities = Ethnicity::all();
        $communities = Community::all();

        return view('people.show', compact('person', 'relhhs', 'educations', 'regions', 'ethnicities', 'communities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $data = request()->validate([
            'id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'extension' => 'nullable',
            'sex' => 'required',
            'birthdate' => 'required',
            'birthreg' => 'required',
            'relhh' => 'required',
            'education' => 'required',
            'philhealth' => 'required',
            'dswd_household' => 'required',
            'community' => 'required',
            'isIP' => 'required',
            'head' => 'nullable',
            'ethnicity' => 'required',
        ]);

        $community = Community::where('id', $data['community'])->first();
        
        $person->find($data['id'])->update([
            'id' => $data['id'],
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'extension' => $data['extension'],
            'sex' => $data['sex'],
            'birthdate' => \Carbon\Carbon::parse($data['birthdate'])->format('Y-m-d'),
            'birthreg' => $data['birthreg'],
            'relhh' => $data['relhh'],
            'education' => $data['education'],
            'philhealth' => $data['philhealth'],
            'dswd_household' => $data['dswd_household'],
            'community' => $data['community'],
            'isIP' => $data['isIP'],
            'head' => $data['head'],
            'ethnicity' => $data['ethnicity'],
            'region' => $community->region,
            'province' => $community->province,
            'municipality' => $community->municipality,
            'barangay' => $community->barangay,
            'sitio' => $community->sitio,
        ]);

        $notification = array(
            'message' => 'Record successfully updated!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
