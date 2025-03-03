@extends('layouts.app')

@section('content')
<div id="before-application-form">
    <div id="consnt-inner-div" class="top-0 start-0 w-100 vh-100 d-flex flex-column justify-content-center align-items-center bg-light">
        <div class="consent-heading">
            Our Application is simple process
        </div>
        <div class="consent-cards-div d-flex flex-row">
            <div class="card text-black mb-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h2 class="card-title">1</h2>
                    <p class="card-text card-text-font">Complete <br>Application</p>
                    <a class="btn consent-card-btn mt-3">Learn More</a>
                </div>
            </div>
            <div class="card text-black mb-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h2 class="card-title">2</h2>
                    <p class="card-text card-text-font">Upload <br>Documnet</p>
                    <a class="btn consent-card-btn mt-3">Learn More</a>
                </div>
            </div>
            <div class="card text-black mb-3">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h2 class="card-title">3</h2>
                    <p class="card-text card-text-font">Credit <br>Report</p>
                    <a class="btn consent-card-btn mt-3">Learn More</a>
                </div>
            </div>
        </div>
        <button onclick="showApplicationForm()" class="btn accept-consent-btn mt-5 w-25">I AM READY TO BEGIN</button>
    </div>
</div>
<div id="after-application-form">
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible my-4">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                @if (isset($errors) && count($errors))
                    <div class="alert alert-danger alert-dismissible my-4">
                        <ul>Following errors occured,
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action="{{route('applications.store')}}" method="POST">
                                @csrf
                                <!-- progressbar -->
                                {{-- <ul id="progressbar">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    <li id="payment"><strong>Payment</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>  --}}
                                <!-- fieldsets -->
                                <fieldset>
                                    
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Personal Information</h2>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <select name="apartment_name" class="form-control selectpicker" data-style="btn-info" data-live-search="true" data-header="Select apartment" required>
                                                        <option value="" disabled>Select apartment</option>
                                                        @foreach ($properties as $property)
                                                            <option value="{{$property->address}}"
                                                                @if (request()->get('property_id') != null && request()->get('property_id') == $property->property_id)
                                                                    selected
                                                                @endif>
                                                                {{$property->address}}
                                                            </option>
                                                        @endforeach
                                                        <option value="Other">
                                                            Other
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="apartment" placeholder="Other apartment">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="full_name" placeholder="Enter full name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter e-mail">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="have_kids" class="control-label">{{ __('Do you have kids?') }}</label>
                                                    <div>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="have_kids" value="No" checked> No
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="have_kids" value="Yes"> Yes
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kids_under18" class="control-label">{{ __('How many kids under 18?') }}</label>
                                                    <select id="kids_under18" name="kids_under18" class="form-control selectpicker" data-style="btn-info" title="Kids under 18">
                                                        <option value="0">Select</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kid-form-items">
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kid1" class="control-label">{{ __('Kid 1') }}</label>
                                                    <input type="text" class="form-control" name="kid1" placeholder="Enter kid's full name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kid1_age" class="control-label">{{ __('Age') }}</label>
                                                    <input type="numeric" class="form-control" name="kid1_age" placeholder="Enter kid's age">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kid2" class="control-label">{{ __('Kid 2') }}</label>
                                                    <input type="text" class="form-control" name="kid2" placeholder="Enter kid's full name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="kid2_age" class="control-label">{{ __('Age') }}</label>
                                                    <input type="numeric" class="form-control" name="kid2_age" placeholder="Enter kid's age">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="have_pet" class="control-label">{{ __('Do you have pet?') }}</label>
                                                    <div>
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="have_pet" value="No" checked onchange="togglePetFields()"> No
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="have_pet" value="Yes" onchange="togglePetFields()"> Yes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="pet-options" style="display: none;">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="number_of_pets" class="control-label">{{ __('How many pets?') }}</label>
                                                        <select class="form-control" id="number_of_pets" onchange="generatePetFields()">
                                                            <option value="">Select number of pets</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="pet-fields"></div>
                                        </div>
                                    </div> 
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Current address</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="current_address" placeholder="Enter address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="current_address_type" class="control-label">{{ __('Do you rent or own?') }}</label>
                                                    <div>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="current_address_type" value="Rent" checked> I rent
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="current_address_type" value="Own"> I own
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="current_address_cost" class="control-label">{{ __('Monthly rent/mortgage') }}</label>
                                                    <input type="numeric" class="form-control" name="current_address_cost" placeholder="Rent/Mortgage">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="current_address_landlord_name" placeholder="Enter landlord name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="current_address_landlord_phone" placeholder="Enter landlord phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label">{{ __('Enter occupancy dates') }}</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="current_address_from" placeholder="Enter landlord name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="current_address_to" placeholder="Enter landlord phone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">School Information</h2>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="is_student" class="control-label">{{ __('Are you a student?') }}</label>
                                                    <div>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="is_student" value="Yes"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_student" value="No"> No
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="school" placeholder="Enter school">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="school_major" placeholder="Enter major">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ __('Enter enrollment date') }}</label>
                                                    <input type="date" class="form-control" name="school_enrollemnt_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ __('Enter graduation date') }}</label>
                                                    <input type="date" class="form-control" name="school_graduation_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="numeric" class="form-control" name="school_stipend" placeholder="Enter stipend amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Current/Future employer</h2>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="employer" placeholder="Enter employer">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="employer_job_description" placeholder="Enter job description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="employer_address" placeholder="Enter employer address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="employer_phone" placeholder="Employer phone">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="annual_salary" placeholder="Anual salary">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="supervisor_name" placeholder="Supervisor/HR name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="supervisor_phone" placeholder="Supervisor/HR phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label">{{ __('Enter employment dates') }}</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="employment_from" placeholder="Enter landlord name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="employment_to" placeholder="Enter landlord phone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Past employer</h2>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_employer" placeholder="Enter employer">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_employer_job_description" placeholder="Enter job description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_employer_address" placeholder="Enter employer address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_employer_phone" placeholder="Employer phone">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_annual_salary" placeholder="Anual salary">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_supervisor_name" placeholder="Supervisor/HR name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="past_supervisor_phone" placeholder="Supervisor/HR phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label">{{ __('Enter employment dates') }}</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="past_employment_from">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="past_employment_to">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Other Information</h2>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ __('Number of income sources') }}</label>
                                                    <select class="form-control" id="income-sources" onchange="generateIncomeFields()">
                                                        <option value="">Select number of sources</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="income-fields"></div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{ __('Emergency contact') }}</label>
                                                    <input type="text" class="form-control" name="emergency_contact_name" placeholder="Enter name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="emergency_contact_relationship" placeholder="Relationship">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="emergency_contact_phone" placeholder="Phone number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label">{{ __('Desired occupancy dates') }}</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="desired_occupancy_from">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" name="desired_occupancy_to">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="reason_for_moving" placeholder="Reason for moving"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Legal</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="legal_agreed" class="control-label">{{ __('Have any litigations such as evictions, suit, judgments, pending charges for criminal offence, bankruptices, foreclosures been leaned upon you?') }}</label>
                                                    <div>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="legal_question" value="Yes"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="legal_question" value="No"> No
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="legal_explanation" placeholder="Explain"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title mx-auto my-4">Application / Deposit Agreement</h2>
                                        <div class="row">
                                            {!! $agreement ? $agreement->content : '' !!}
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Signature</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group text-center">
                                                    <canvas id="canvas" class="border" required></canvas>
                                                </div>
                                                <input type="hidden" id="signature" name="signature" required/>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <div class="form-group text-center">
                                                    <button id="clear">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <button id="form-submit" class="action-button"> Submit </button>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
<script>
    document.getElementById("before-application-form").style.display = "block";
    document.getElementById("after-application-form").style.display = "none";
    function showApplicationForm() {
        document.getElementById("before-application-form").style.display = "none";
        document.getElementById("after-application-form").style.display = "block";
    }
    const canvas = document.querySelector("canvas");
    const signaturePad = new SignaturePad(canvas);
    document.getElementById('clear').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
    });
    document.getElementById('form-submit').addEventListener('click', function(event) {
        event.preventDefault(); // Prevents the default form submission
        if (signaturePad.isEmpty()) {
            return alert("Please provide a signature first.");
        }
        var data = signaturePad.toDataURL('image/png');
        document.getElementById('signature').value = data;
        document.getElementById('msform').submit();
    });
    function generateIncomeFields() {
        const incomeSources = document.getElementById('income-sources').value;
        const incomeFieldsContainer = document.getElementById('income-fields');

        incomeFieldsContainer.innerHTML = '';

        for (let i = 0; i < incomeSources; i++) {
            const row = document.createElement('div');
            row.className = 'row';
            row.innerHTML = `
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Income source') }} ${i + 1}</label>
                        <input type="text" class="form-control" name="income_sources[${i}][source]" placeholder="Enter the source">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Income amount') }} ${i + 1}</label>
                        <input type="text" class="form-control" name="income_sources[${i}][amount]" placeholder="Enter the amount">
                    </div>
                </div>
            `;
            incomeFieldsContainer.appendChild(row);
        }
    } 
    function togglePetFields() {
        const havePet = document.querySelector('input[name="have_pet"]:checked').value;
        const petOptions = document.getElementById('pet-options');
        
        if (havePet === 'Yes') {
            petOptions.style.display = 'block';
        } else {
            petOptions.style.display = 'none';
            document.getElementById('pet-fields').innerHTML = '';
        }
    }

    function generatePetFields() {
        const numberOfPets = document.getElementById('number_of_pets').value;
        const petFieldsContainer = document.getElementById('pet-fields');

        // Clear existing fields
        petFieldsContainer.innerHTML = '';

        for (let i = 0; i < numberOfPets; i++) {
            const row = document.createElement('div');
            row.className = 'row';
            row.innerHTML = `
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Type of pet') }} ${i + 1}</label>
                        <input type="text" class="form-control" name="pet_types[${i}]" placeholder="Enter type of pet">
                    </div>
                </div>
            `;
            petFieldsContainer.appendChild(row);
        }
    }
</script>
@endsection