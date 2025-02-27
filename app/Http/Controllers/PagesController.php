<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Message;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\CaptureMail;
use App\Mail\ShowingRequestMail;
use Config;

class PagesController extends Controller
{
    public function index(){
        $properties = Property::where('is_featured', 'yes')->orderBy('id', 'desc')->take(10)->get();
        return view('pages.index')->with('properties', $properties);
    }

    public function listing(){
        $properties = Property::orderBy('id', 'desc')->paginate(12);
        return view('pages.listing')->with('properties', $properties);
    }

    public function search(Request $request){
        $key_words = $request->input('key_words');

        $search_pattern = implode("|",$request->key_words);
        $search_states = implode("|",$request->key_states);
        // return response()->json($request);
        //         die();

        $properties = Property::orderBy('id', 'desc')
                    ->where('search_tags', 'REGEXP', $search_pattern)
                    ->paginate(12);

        $query = 'Search results for properties with '.implode(", ",$request->key_words).' and states including'.implode(",",$request->key_states);
        return view('pages.listing')->with('properties', $properties)->with('message', $query);
    }

    public function filter(Request $request){
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');
        $beds_min = $request->input('beds_min');
        $beds_max = $request->input('beds_max');
        $bath_min = $request->input('bath_min');
        $bath_max = $request->input('bath_max');
        $type = $request->input('type');

        $sq_min = $request->input('sq_min');
        $sq_max = $request->input('sq_max');
        $key_words = $request->input('key_words');

        // return response()->json($request);
        //         die();

        $properties = Property::orderBy('id', 'desc')
                    ->where('cost', '>=', $price_min)
                    ->where('cost', '<=', $price_max)
                    ->where('bed_rooms', '>=', $beds_min)
                    ->where('bed_rooms', '<=', $beds_max)
                    ->where('bath_rooms', '>=', $bath_min)
                    ->where('bath_rooms', '<=', $bath_max)
                    ->where('type', '=', $type)
                    ->where('search_tags', 'LIKE', '%'.$key_words.'%')
                    // ->where('area', '>=', $sq_min)
                    // ->where('area', '<=', $sq_max)
                    ->paginate(12);
        


        // $properties = Property::orderBy('id', 'desc')
        //         ->where(function($q) use ($search){
        //         $q->where('name', 'LIKE', '%'.$search.'%')
        //         ->orWhere('phone', 'LIKE', '%'.$search.'%')
        //         ->orWhere('email', 'LIKE', '%'.$search.'%')
        //         ->orWhere('referby', 'LIKE', '%'.$search.'%');
        //     })->paginate(12);
        $query = 'Filter results for properties';
        return view('pages.listing')->with('properties', $properties)->with('message', $query);
    }

    public function show($id)
    {
        $property = Property::find($id);
        $total_cost = $property->first_month+$property->last_month+$property->security_deposit+$property->cleaning_fee+$property->broker_fee;
        // return response()->json($property->terms);
        //         die();
        return view('pages.show')->with('property', $property)->with('total_cost', $total_cost);
    }

    public function message(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $property = Property::find($request['property_id']);
        $message = Message::create([
            'property_id' => $request['property_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'date' => date('Y-m-d'),
            'request_for' => $property ? $property['address'] : 'NA'
        ]);

        $data = array(
            'msg'     => 'You have a new showing request:',
            'first_name'     => $message->first_name,
            'last_name'     => $message->last_name,
            'phone'     => $request->phone,
            'email'     => $message->email,
            'date'     => date('Y-m-d'),
            'request_for'     => $property ? $property['address'] : 'NA',
           );
        Mail::to(config('mail.system_mail'))->send(new ShowingRequestMail($data));

        return redirect()->back()->with('success', 'Request has been posted! Our team will contact you for next procedure.');
    }

    public function display_image($filename)
    {
        //$path = storage_path('uploads/' . $filename);
        $path = Storage::path('uploads/'.$filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        return $file;
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function listToday(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc',
        ]);

        //  Send mail to admin
        $data = array(
            'msg'     => 'You have a new request:',
            'name'     => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
           );
        Mail::to(config('mail.system_mail'))->send(new CaptureMail($data));

        return redirect()->back()->with('success', 'E-mail has been sent successfully!');
    }
}
