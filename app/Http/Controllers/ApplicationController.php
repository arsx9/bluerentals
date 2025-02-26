<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationKid;
use App\Models\ApplicationImage;
use App\Models\ApplicationMessage;
use App\Models\Property;
use App\Models\MessageImage;
use App\Mail\ApplicationMail;
use App\Http\Controllers\Controller;
use App\Models\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Gate;
use Mail;
use PDF;
use Config;

use App\Mail\NewApplicationMail;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'report', 'message', 'sendMessage']);
        $this->middleware('can:is_admin')->only(['index', 'message', 'sendMessage','agreement']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::orderBy('id', 'desc')->paginate(20);
        return view('admin.applications.index')->with('applications', $applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = Property::all();
        $agreement = Agreement::where('name','Application/Deposit')->first();
        return view('application.create',compact('properties', 'agreement'));
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
            'apartment_name' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            // 'signature' => 'required',
        ]);

        //return $request;
        $apartment = $request->apartment_name;
        if($apartment=="Other"){
            $apartment = $request->apartment;
        }

        $application = new Application;
        $application->application_id = uniqid();
        $application->apartment = $apartment;
        $application->full_name = $request->full_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->have_kids = $request->have_kids;
        $application->kids_under18 = $request->kids_under18;
        // $application->kid1 = $request->kid1;
        // $application->kid1_age = $request->kid1_age;
        // $application->kid2 = $request->kid2;
        // $application->kid2_age = $request->kid2_age;
        $application->have_pet = $request->have_pet;
        $application->pet_type = $request->pet_type;
        $application->current_address = $request->current_address;
        $application->current_address_type = $request->current_address_type;
        $application->current_address_cost = $request->current_address_cost;
        $application->current_address_landlord_name = $request->current_address_landlord_name;
        $application->current_address_landlord_phone = $request->current_address_landlord_phone;
        $application->current_address_from = $request->current_address_from;
        $application->current_address_to = $request->current_address_to;
        $application->is_student = $request->is_student;
        $application->employer = $request->employer;
        $application->employer_job_description = $request->employer_job_description;
        $application->employer_address = $request->employer_address;
        $application->employer_phone = $request->employer_phone;
        $application->annual_salary = $request->annual_salary;
        $application->supervisor_name = $request->supervisor_name;
        $application->supervisor_phone = $request->supervisor_phone;
        $application->employment_from = $request->employment_from;
        $application->employment_to = $request->employment_to;
        $application->past_employer = $request->past_employer;
        $application->past_employer_job_description = $request->past_employer_job_description;
        $application->past_employer_address = $request->past_employer_address;
        $application->past_employer_phone = $request->past_employer_phone;
        $application->past_annual_salary = $request->past_annual_salary;
        $application->past_supervisor_name = $request->past_supervisor_name;
        $application->past_supervisor_phone = $request->past_supervisor_phone;
        $application->past_employment_from = $request->past_employment_from;
        $application->past_employment_to = $request->past_employment_to;
        $application->school = $request->school;
        $application->school_major = $request->school_major;
        $application->school_enrollemnt_date = $request->school_enrollemnt_date;
        $application->school_graduation_date = $request->school_graduation_date;
        $application->school_stipend = $request->school_stipend;
        $application->other_income_from = $request->other_income_from;
        $application->other_income_amount = $request->other_income_amount;
        $application->income_sources = json_encode($request->income_sources);
        $application->pets = json_encode($request->pet_types);
        $application->emergency_contact_name = $request->emergency_contact_name;
        $application->emergency_contact_relationship = $request->emergency_contact_relationship;
        $application->emergency_contact_phone = $request->emergency_contact_phone;
        $application->desired_occupancy_from = $request->desired_occupancy_from;
        $application->desired_occupancy_to = $request->desired_occupancy_to;
        $application->reason_for_moving = $request->reason_for_moving;
        $application->legal_question = $request->legal_question;
        $application->legal_explanation = $request->legal_explanation;
        // if ($request->has('signature')) {
        //     // Get the base64 string from the request
        //     $base64Image = $request->input('signature');

        //     // Remove the data:image/png;base64, part
        //     $imageParts = explode(";base64,", $base64Image);
        //     $imageTypeAux = explode("image/", $imageParts[0]);
        //     $imageType = $imageTypeAux[1]; // e.g., png, jpg
        //     $imageBase64 = base64_decode($imageParts[1]);

        //     // Generate a unique filename
        //     $fileName = $application->application_id . '.' . $imageType;
        //     $filePath = 'application-signatures/' . $fileName; // Save it in a private directory
        //     // Save the image to the storage/app/private/uploads folder
        //     Storage::put($filePath, $imageBase64);
        //     $application->signature_img = $filePath;
        // }
        $application->save();

        for($i=0; $i<$application->kids_under18; $i++){
            $application_kid = new ApplicationKid;
            $application_kid->application_id = $application->application_id;
            $application_kid->kid_name = $request->kid_name[$i];
            $application_kid->kid_age = $request->kid_age[$i];
            $application_kid->save();
        }
        Mail::to(config('mail.system_mail'))->send(new NewApplicationMail(route('applications.show',$application['id']))); 
        \Session::flash('success','Thank you, we have successfully received your application, next steps are to upload the necessary documents. Please contact the agent if you have any questions or concerns');
        return view('application.submit')->with('application', $application);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $application->load('images');
        $agreement = Agreement::where('name','Application/Deposit')->first();
        return view('admin.applications.show')->with([
            'application' => $application,
            'images' => $application->images,  // Passing the images to the view
            'agreement' => $agreement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->back();
    }

    public function create_application(Property $property)
    {
        $properties = Property::all();
        return view('application.create')->with('properties', $properties)->with('selected_property', $property);
    }

    public function report(Application $application)
    {
        return view('application.show')->with('application', $application);
    }

    public function application_attach(Request $request, Application $application)
    {
        if($request->hasfile('file')){
            foreach ($request->file('file') as $key => $file) {
                $fileName = uniqid().'.'.$file->extension();
                $file->move(public_path().'/uploads/applications/', $fileName);
                $path = 'uploads/applications/'.$fileName;

                $uploads = new ApplicationImage();
                $uploads->application_id = $application->application_id;
                $uploads->image_path = $path;
                $uploads->save();
            }
        }

        $response = "The files have been uploaded successfully!";
        return response($response);
    }

    public function message(Application $application)
    {
        return view('admin.applications.message')->with('application', $application);
    }

    public function sendMessage(Request $request, Application $application)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message = new ApplicationMessage;
        $message->message_id = uniqid();
        $message->application_id = $application->application_id;
        $message->message_from = config('mail.system_mail');
        $message->reply_to = config('mail.system_mail');
        $message->email = $application->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();

        $files = [];
        if($request->hasfile('file')){
            foreach ($request->file('file') as $key => $file) {
                $fileName = uniqid(Auth::user()->user_id).'.'.$file->extension();
                $file->move(public_path().'/uploads/messages/', $fileName);
                $path = URL::asset('public/uploads/messages/'.$fileName);

                $uploads = new MessageImage();
                $uploads->message_id = $message->message_id ;
                $uploads->image = $path;
                $uploads->save();

                array_push($files, public_path('uploads/messages/'.$fileName));
            }
        }

        $request->attachments = $files;

        //  Send mail to admin

        $reply_url = route('message.reply', ['message' => $message]);

        $message->reply_url = $reply_url;
        $message->save();

        Mail::to($message->email)->send(new ApplicationMail($message));     

        return redirect()->back()->with('success', 'Message has been sent successfully!');
    }

    public function reply(ApplicationMessage $message)
    {
        return view('application.reply')->with('message', $message);
    }

    public function sendReply(Request $request, ApplicationMessage $message)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
        ]);

        $reply_message = new ApplicationMessage;
        $reply_message->message_id = uniqid();
        $reply_message->application_id = $message->application_id;
        $reply_message->message_from = $message->email;
        $reply_message->reply_to = $message->message_from;
        $reply_message->email = $request->email;
        $reply_message->subject = $request->subject;
        $reply_message->message = $request->message;

        $reply_message->save();

        //  Send mail to admin

        $reply_url = route('message.reply', ['message' => $reply_message]);

        $files = [];
        if($request->hasfile('file')){
            foreach ($request->file('file') as $key => $file) {
                $fileName = uniqid(Auth::user()->user_id).'.'.$file->extension();
                $file->move(public_path().'/uploads/messages/', $fileName);
                $path = URL::asset('public/uploads/messages/'.$fileName);

                $uploads = new MessageImage();
                $uploads->message_id = $reply_message->message_id ;
                $uploads->image = $path;
                $uploads->save();

                array_push($files, public_path('uploads/messages/'.$fileName));
            }
        }

        $request->attachments = $files;

        //  Send mail to admin

        $reply_message->reply_url = $reply_url;
        $reply_message->save();

        Mail::to($reply_message->email)->send(new ApplicationMail($reply_message));     

        return redirect()->back()->with('success', 'Message has been sent successfully!');
    }

    public function generatePdf(Application $application)
    {
        $data = [
            'application' => $application
        ];
        $pdf = PDF::loadView('application.application', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('application.pdf');

    }

    public function agreement(){
        $agreement = Agreement::where('name','Application/Deposit')->first();
        return view('admin.agreement',compact('agreement'));
    }

    public function storeAgreement(Request $request){

        $request->validate([
            'content' => 'required'
        ]);
        Agreement::updateOrCreate([
            'name' => 'Application/Deposit',
        ],[
            'content' => $request->content
        ]);
        return redirect()->back()->with('success', 'Agreement saved successfully!');
    }
}
