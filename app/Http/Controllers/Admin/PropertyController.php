<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyTag;
use App\Models\Term;
use App\Models\Feature;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:manage-properties');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('id', 'desc')->paginate(15);
        return view('admin.properties.index')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = Term::all();
        $features = Feature::all();
        return view('admin.properties.create')->with('terms', $terms)->with('features', $features);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'type' => 'required',
            'cost' => 'required',
            'state' => 'required',
            'available_from' => 'required',
        ]);

        $image_data = [];
        if($request->hasfile('images')){
            foreach ($request->file('images') as $key => $file) {
                $image_name = time().'-'.$key.'.'.$file->extension();
                $file->move(public_path().'/uploads/', $image_name);    
                array_push($image_data, $image_name);
            }
        }

        $id = uniqid(Auth::user()->id);

        $state_full_name = config('constants.states')[$request->state];
        
        $tags = $state_full_name.", ".$request['address'].", ".$request['bed_rooms']." beds, ".$request['bath_rooms']." bathrooms, ".$request['type'].", ".json_encode($request->terms).", ".json_encode($request->features);
        
        $property = Property::create([
            'property_id' => $id,
            'type' => $request['type'],
            'address' => $request['address'],
            'state' => $request['state'],
            'cost' => $request['cost'],
            'bed_rooms' => $request['bed_rooms'],
            'bath_rooms' => $request['bath_rooms'],
            'area' => $request['area'],
            'available_from' => $request['available_from'],
            'first_month' => $request['first_month'],
            'last_month' => $request['last_month'],
            'security_deposit' => $request['security_deposit'],
            'broker_fee' => $request['broker_fee'],
            'cleaning_fee' => $request['cleaning_fee'],
            'contact_person' => $request['contact_person'],
            'contact_number' => $request['contact_number'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'description' => $request['description'],
            'is_featured' => $request->is_featured,
            'image_urls' => json_encode($image_data),
            'video_link' => $request['video_link'],
            'status' => $request['type'],
            'search_tags' => $tags,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        $property->terms()->sync($request->terms);
        $property->features()->sync($request->features);

        return redirect()->back()->with('success', 'Property has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        $total_cost = $property->first_month+$property->security_deposit+$property->broker_fee;
        return view('admin.properties.show')->with('property', $property)->with('total_cost', $total_cost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $terms = Term::all();
        $features = Feature::all();
        return view('admin.properties.edit')->with('property', $property)->with('terms', $terms)->with('features', $features);
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
        $this->validate($request, [
            'address' => 'required',
            'type' => 'required',
            'state' => 'required',
            'cost' => 'required',
        ]);

        $image_data = [];
        if($request->hasfile('images')){
            foreach ($request->file('images') as $key => $file) {
                $image_name = time().'-'.$key.'.'.$file->extension();
                $file->move(public_path().'/uploads/', $image_name);    
                array_push($image_data, $image_name);
            }
        }

        $state_full_name = config('constants.states')[$request->state];

        $tags = $state_full_name.", ".$request['address'].", ".$request['bed_rooms']." beds, ".$request['bath_rooms']." bathrooms, ".$request['type'].", ".json_encode($request->terms).", ".json_encode($request->features);

        $property = Property::find($id);
        $property->type = $request['type'];
        $property->address = $request['address'];
        $property->state = $request['state'];
        $property->bed_rooms = $request['bed_rooms'];
        $property->bath_rooms = $request['bath_rooms'];
        $property->available_from = $request['available_from'];
        $property->first_month = $request['first_month'];
        $property->last_month = $request['last_month'];
        $property->security_deposit = $request['security_deposit'];
        $property->broker_fee = $request['broker_fee'];
        $property->cleaning_fee = $request['cleaning_fee'];
        $property->contact_person = $request['contact_person'];
        $property->contact_number = $request['contact_number'];
        $property->latitude = $request['latitude'];
        $property->longitude = $request['longitude'];
        $property->description = $request['description'];
        $property->is_featured = $request->is_featured;
        if(count($image_data)){
            $property->image_urls = json_encode($image_data);
        }
        $property->video_link = $request['video_link'];
        $property->search_tags = $tags;
        $property->updated_by = Auth::user()->id;
        $property->save();

        $property->terms()->sync($request->terms);
        $property->features()->sync($request->features);

        return redirect()->back()->with('success', 'Property has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect()->back()->with('success', 'Property has been deleted!');
    }
}
