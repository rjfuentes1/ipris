<?php

namespace App\Http\Controllers;

use App\Person;
use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function getProvince(Request $request){
        
        $provinces = DB::table('province')->where('regcode', $request->region)->orderBy('provname', 'ASC')->get();

        $output = "<option disabled selected>SELECT PROVINCE</option>";
        foreach($provinces as $province){
            $output .="<option value='$province->provcode'> $province->provname </option>";
        }

        return $output;
        exit;
    }

    public function getMunicipality(Request $request){
        
        $municipalities = DB::table('municipality')->where('provcode', $request->province)->get();

        $output = "<option disabled selected>SELECT MUNICIPALITY</option>";
        foreach($municipalities as $municipality){
            $output .="<option value='$municipality->muncode'> $municipality->munname </option>";
        }

        return $output;
        exit;
    }

    public function getBarangay(Request $request){
        
        $barangays = DB::table('barangay')->where('muncode', $request->municipality)->get();

        $output = "<option disabled selected>SELECT BARANGAY</option>";
        foreach($barangays as $barangay){
            $output .="<option value='$barangay->brgycode'> $barangay->brgyname </option>";
        }

        return $output;
        exit;
    }

    public function getLeader(Request $request){
        
        $people = Person::where('barangay', $request->barangay)->get();
        
        $output = "<option disabled selected>SELECT LEADER</option>";
        $output .= "<option value=''>NONE</option>";
        foreach($people as $person){
            $output .="<option value='$person->id'> $person->lastname , $person->firstname  $person->middlename  $person->extension </option>";
        }

        return $output;
        exit;
    }

    public function getHead(Request $request){
        
        $heads = Person::where('community', $request->community)->where('relhh', '1')->get();

        $output = "<option disabled>SELECT HEAD</option>";
        $output .= "<option value=''>NONE</option>";
        foreach($heads as $head){
            $output .="<option value='$head->id'> $head->lastname  , $head->firstname $head->middlename $head->extension </option>";
        }

        return $output;
        exit;
    }

    public function filter(Request $request){
        
        $addquery = "WHERE province = $request->province ";
        $from = \Carbon\Carbon::now()->subYears($request->maxage)->startOfYear()->format('Y-m-d');
        $to = \Carbon\Carbon::now()->addYears($request->minage)->endOfYear()->format('Y-m-d');

        if(($request->minage != null) && ($request->maxage != null)){
            $addquery .= "AND birthdate BETWEEN '$from' AND '$to'";
        }

        if(!empty($request->municipality)){
            $addquery .= "AND municipality = $request->municipality ";
        }
        
        if(!empty($request->barangay)){
            $addquery .= "AND barangay = $request->barangay ";
        }

        if(!empty($request->sex)){
            $addquery .= "AND sex = $request->sex ";
        }

        $query = "select * from people $addquery";

        // dd($query);

        $people = DB::select(DB::raw($query));
        $regions = DB::table('region')->get();
        // dd($people);

        return view('people.index', compact('people', 'regions'));
    }
}
