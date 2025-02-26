@extends('layouts.app')

@section('content')
<style>
     @media print {
        .no-print {
            display: none;
        }
    }
</style>
    <div class="container">
        <a class="btn btn-info text-light float-right" id="printBtn">
            <i class="fas fa-print"></i> Print
        </a>
        <div id="report-view" class="table-responsive">
            <table class="table table-borderless" id="pres-table">
                <thead>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center">
                                <img class="img-responsive p-2" src="{{ asset('/img/app-logo.png')}}" width="200px" alt="Logo">
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="report-content">
                        <td>
                            <div class="application-body">
                                <div class="d-flex justify-content-center mt-3">
                                    (Subject to Owner's Approval)
                                </div>
                                <div class="border border-dark bg-grey p-2 mb-2 font-weight-bold">
                                    PERSONAL INFORMATION 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->full_name}}</span>
                                            <span>(Name) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->email}}</span>
                                            <span>(Email)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->phone}}</span>
                                            <span>(Phone Number)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->have_kids}}</span>
                                            <span>Do you have kids? {{$application->have_kids == "Yes" ? "☑ Yes or ☐ No" : "☐ Yes or ☑ No"}}</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($application->kids_under18>0)
                                    @foreach ($application->kids as $kid)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$kid->kid_name}}, {{$kid->kid_age}} Years</span>
                                                    <span>(Kids names and ages)</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->have_pet}}</span>
                                            <span>Do you have pets? {{$application->have_pet == "Yes" ? "☑ Yes or ☐ No" : "☐ Yes or ☑ No"}}</span>
                                            @php
                                                $pets = json_decode($application->pets,true);
                                            @endphp
                                            @if($pets)
                                                <ol>
                                                    @foreach($pets as $pet)
                                                        <li>{{$pet}}</li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->kid1}}, {{$application->kid1_age}}</span>
                                            <span>(Kids names and ages)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->kid2}}, {{$application->kid2_age}}</span>
                                            <span>(Kids names and ages)</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    CURRENT ADDRESS 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->current_address}}</span>
                                            <span>(Address) {{$application->current_address_type == "Rent" ? "☑ Rent or ☐ Own" : "☐ Rent or ☑ Own"}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->current_address_cost}}</span>
                                            <span>(Current monthly mortgage or rent payment)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->current_address_landlord_name}}</span>
                                            <span>(Landlord) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->current_address_landlord_phone}}</span>
                                            <span>(Landlord phone)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->current_address_from}} to {{$application->current_address_to}}</span>
                                            <span>(Occupancy Dates)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    SCHOOL INFORMATION
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span>(Are you a student?) {{$application->is_student == "Yes" ? "☑ Yes or ☐ No" : "☐ Yes or ☑ No"}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->school}}</span>
                                            <span>(School)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->school_major}}</span>
                                            <span>(Major) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->school_enrollemnt_date}}</span>
                                            <span>(Enrollment Date)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->school_graduation_date}}</span>
                                            <span>(Graduation Date)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->school_stipend}}</span>
                                            <span>(Stipend Amount)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    CURRENT/FUTURE EMPLOYER
                                </div>
            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->employer}}</span>
                                            <span>(Employer)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->employer_job_description}}</span>
                                            <span>(Job Description)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->employer_address}}</span>
                                            <span>(Address) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->employer_phone}}</span>
                                            <span>(Phone Number)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->annual_salary}}</span>
                                            <span>(Annual Salary)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->employment_from}} to {{$application->employment_to}}</span>
                                            <span>(Employment Dates)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->supervisor_name}}</span>
                                            <span>(Supervisor Name/HR)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->supervisor_phone}}</span>
                                            <span>(Supervisor phone number)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @if ($application->is_student == "No")
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    PREVIOUS EMPLOYER 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_employer}}</span>
                                            <span>(Employer) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_employer_job_description}}</span>
                                            <span>(Job Description)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_employer_address}}</span>
                                            <span>(Address) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_employer_phone}}</span>
                                            <span>(Phone Number)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_annual_salary}}</span>
                                            <span>(Annual Salary)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_employment_from}} to {{$application->past_employment_to}}</span>
                                            <span>(Employment Dates)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_supervisor_name}}</span>
                                            <span>(Supervisor Name/HR) </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->past_supervisor_phone}}</span>
                                            <span>(Supervisor phone number)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    @endif
                    
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    OTHER INCOME
                                </div>
                                @php
                                    $income_sources = json_decode($application->income_sources,true);
                                @endphp

                                @if($income_sources)
                                    
                                    @foreach($income_sources as $source)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$source['source']}}</span>
                                                    <span>(Source)</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$source['amount']}}</span>
                                                    <span>(Amount)</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    EMERGENCY CONTACT
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->emergency_contact_name}}</span>
                                            <span>(Name)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->emergency_contact_relationship}}</span>
                                            <span>(Relationship)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->emergency_contact_phone}}</span>
                                            <span>(Phone)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    REASON FOR MOVING
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->reason_for_moving}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <p class="border border-dark bg-grey p-2 mt-2 font-weight-bold">
                                    LEGAL
                                </p>
                                <p>
                                    Have any litigations such as evictions, suit, judgements, pending charges for criminal offense, bankruptcies, foreclosures been leaned upon you?
                                    <br>
                                    {{$application->legal_question == "Yes" ? "☑ Yes or ☐ No" : "☐ Yes or ☑ No"}}
                                    <br>
                                    <br>
                                    If yes, please provide details and dates 
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->legal_explanation}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="application-body">
                                <p class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                    Occupancy Dates
                                </p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->desired_occupancy_from}}</span>
                                            <span>(Move in Date)</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->desired_occupancy_from}} - {{$application->desired_occupancy_to}}</span>
                                            <span>(Occupancy dates, mm/yr - mm/yr)</span>
                                        </div>
                                    </div>
                                </div>
                            
                                <h6>Application/Deposit Agreement: </h6>
                                <ul class="numbered">
                                    <li>The Landlord does not discriminate on the basis of race, religious creed, color, national origin, sexual orientation, age (except if a minor), ancestry, 
                                        marital status, handicap, or status as a veteran or member of the armed forces. </li>
                                    <li>AirBnB, other room sharing services, and short term sublets are strictly prohibited and may result in immediate termination. </li>
                                    <li>To reserve this apartment I have completed this rental application and have presented a deposit in the amount of one month’s rent. I understand and 
                                        agree that this deposit is non-refundable unless the Landlord does not approve my application. I also understand and agree that this deposit is 
                                        non-refundable if this apartment is held off the market at my request for more than seven (7) business days while my application is pending. </li>
                                    <li>The undersigned hereby applies to the Owner for a Lease of the premises described above and represents that all statements herein are true and 
                                        authorizes the Landlord to check criminal history, credit, bank, landlord and employment references, and authorizes credit agencies, banks, landlords 
                                        and employers to provide relevant information to the Landlord.  </li>
                                    <li>Blue Real Estate LLC charges a one time fee of $30 for processing your application including a credit check as needed. </li>
                                    <li>For leases scheduled to start within thirty days, all deposit payments must be paid in good and clear funds (e.g. bank check, money order). </li>
                                    <li>Tenant shall be responsible for all costs associated with payments that do not clear in the bank. This may include reimbursement to the Landlord or 
                                        Broker for actual bank costs it incurs as a result of a payment that does not clear in the bank. If a payment does not clear, then the Landlord or Broker 
                                        may choose to reject the application or may require all future deposit payments to be made in good and clear funds (e.g. bank check or money order).  </li>
                                </ul>
                            
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->full_name}}</span>
                                            <span>Applicant’s Name</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">
                                                @if (isset($application->signature_img) && !empty($application->signature_img))
                                                    <img src="{{ asset('storage/app/' . $application->signature_img) }}" alt="Signature Image">
                                                @endif
                                            </span>
                                            <span>Signature</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="d-flex border border-top-0 border-left-0 border-right-0">{{$application->created_at}}</span>
                                            <span>Date</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="no-print">
                        <td>
                            <div class="application-body">
                                <div class="border border-dark bg-grey p-2 mt-2 mb-2 font-weight-bold">
                                   Files
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row">
                                            @if (!empty($images))
                                                @foreach($images as $image)
                                                    <div class="col-sm-12 text-center mb-4">
                                                        @if(pathinfo($image->image_path, PATHINFO_EXTENSION) === 'pdf')
                                                            <a href="{{ route('download.image', $image->id) }}" class="btn btn-primary mt-2">Download File</a>
                                                            <iframe src="{{ asset('public/'.$image->image_path) }}" frameborder="0" scrolling="no" width="80%" height="1000px"></iframe>
                                                        @else
                                                            <img src="{{ asset('public/'.$image->image_path) }}" alt="Application Image" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                                                            <a href="{{ route('download.image', $image->id) }}" class="btn btn-primary mt-2">Download Image</a>
                                                        @endif
                                                        <hr class="my-4" style="border-top: 2px solid #ccc;">
                                                    </div>
                                                @endforeach   
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                           ...
                        </td>
                    </tr></tfoot>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function printData(){
            var divToPrint=document.getElementById("report-view");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        jQuery(document).ready(function(){
            $("#printBtn").click(function(){
                window.print();
                //printData();
            });
        });
    </script>
@endsection