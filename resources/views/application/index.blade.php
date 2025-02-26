@extends('layouts.app')

@section('content')

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible my-4">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-12 mx-0">
                        
                            <!-- progressbar -->
                            {{-- <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li>
                                <li id="personal"><strong>Personal</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>  --}}
                            <!-- fieldsets -->
                            
                            <section class="app_pros">
                                <div class="container">
                        
                                    <h2>Our Application Is Simple Process</h2>
                        
                                    <div class="row justify-content-center">
                        
                                        <div class="col-lg-3 col-md-6 align-items-center">
                                            <div class="learn_more">
                                                <div class="content_area">
                                                    <h3>1</h3>
                                                    <p>
                                                        Compleat <br> Application
                                                    </p>
                                                    <button class="" href="#">Learn More</button>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-lg-3 col-md-6">
                                            <div class="learn_more">
                                                <div class="content_area">
                                                    <h3>2</h3>
                                                    <p>
                                                        Upload <br> Documents
                                                    </p>
                                                    <button class="" href="#">Learn More</button>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-lg-3 col-md-6">
                                            <div class="learn_more">
                                                <div class="content_area">
                                                    <h3>3</h3>
                                                    <p>
                                                        Credit <br> Report
                                                    </p>
                                                    <button class="" href="#">Learn More</button>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                        
                                </div>
                        
                                <div class="container text-center">
                                    <button type="submit" class="ready">I AM READY TO BEGIN</button>
                                </div>
                            </section>

                        <form id="msform" action="{{route('application.store')}}" method="POST">
                            @csrf
                        
                            <section class="step_1">
                                <div class="container">
                                    <div class="step_heading">
                                        Personal Information
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 1 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <select class="select form-control-lg form-control">
                                                                <option value="1" selected>Enter Apartment</option>
                                                                <option value="2">Subject 1</option>
                                                                <option value="3">Subject 2</option>
                                                                <option value="4">Subject 3</option>
                                                            </select>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                    
                                                            <div class="form-outline">
                                                                <input type="text" id="firstName" placeholder="Enter Full Name*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                            </div>
                                                            <div class="col-md-6 mb-4 ">
                                            
                                                            <div class="form-outline">
                                                                <input type="email" id="emailAddress" placeholder="Enter Email*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="tel" id="phoneNumber" placeholder="Enter Phone*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <h6 class="mb-2 pb-1">Do You Have Kids? </h6>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="kidyes" value="option1" checked/>
                                                                <label class="form-check-label" for="">Yes</label>
                                                            </div>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="kidno" value="option2"/>
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                        
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            
                                                            <label for="">How many kids under 18 Year old?</label>
                                                            <select class="select form-control-lg form-control">
                                                                <option value="1" selected>0</option>
                                                                <option value="2">1</option>
                                                                <option value="3">2</option>
                                                                <option value="4">3</option>
                                                            </select>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Kid 1:</label>
                                                                <input type="text" id="kid1" placeholder="Enter Kids Full Name*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            
                                                            <label for="">Age:</label>
                                                            <select class="select form-control-lg form-control">
                                                                <option value="1" selected>0</option>
                                                                <option value="2">1</option>
                                                                <option value="3">2</option>
                                                                <option value="4">3</option>
                                                            </select>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Kid 2:</label>
                                                                <input type="text" id="kid1" placeholder="Enter Kids Full Name*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            
                                                            <label for="">Age:</label>
                                                            <select class="select form-control-lg form-control">
                                                                <option value="1" selected>0</option>
                                                                <option value="2">1</option>
                                                                <option value="3">2</option>
                                                                <option value="4">3</option>
                                                            </select>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <h6 class="mb-2 pb-1">Do You Have Pet?</h6>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="petyes" value="option1" checked/>
                                                                <label class="form-check-label" for="">Yes</label>
                                                            </div>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="petno" value="option2"/>
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                        
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="pettyp" placeholder="Enter Type*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                                
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_1">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_1">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_2">
                                <div class="container">
                                    <div class="step_heading">
                                        Current Address
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 2 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-12 mb-4">
                                    
                                                            <div class="form-outline">
                                                                <input type="email" id="email" placeholder="Enter Address*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <h6 class="mb-2 pb-1">Do You Rent or Own?</h6>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="" value="option1" checked/>
                                                                <label class="form-check-label" for="">I Rent</label>
                                                            </div>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="" value="option2"/>
                                                                <label class="form-check-label" for="">I Own</label>
                                                            </div>
                                        
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            
                                                            <label for="">Enter Month Rental/Mortgage</label>
                                                            <input type="text" id="rental" class="form-control form-control-lg"/>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Landlord Name*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Landlord Phone*" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Enter Occupancy Dates : </label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for=""></label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                                
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_2">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_2">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_3">
                                <div class="container">
                                    <div class="step_heading">
                                        Current/Future Employer
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 3 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-12 mb-4">
                                        
                                                            <h6 class="mb-2 pb-1">Are You A Student?</h6>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="" value="option1" checked/>
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="" value="option2"/>
                                                                <label class="form-check-label" for="">Yes</label>
                                                            </div>
                                        
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                    
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            <input type="text" id="" placeholder="Enter Job Description" class="form-control form-control-lg"/>
                                                        </div>
                                    
                                                        <div class="col-md-12 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer Address" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer Phone" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Annual Salary" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Supervisor/HR Name" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Supervisor/HR Phone" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                                            
                                                            <div class="form-outline">
                                                                <label for="">Enter Employment Dates : </label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for=""></label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                            
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_3">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_3">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_4">
                                <div class="container">
                                    <div class="step_heading">
                                        Past Employer
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 4 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-6 mb-4 ">
                                    
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            <input type="text" id="" placeholder="Enter Job Description" class="form-control form-control-lg"/>
                                                        </div>
                                    
                                                        <div class="col-md-12 mb-4">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer Address" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Employer Phone" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Annual Salary" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Supervisor/HR Name" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter Supervisor/HR Phone" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                                            
                                                            <div class="form-outline">
                                                                <label for="">Enter Employment Dates : </label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for=""></label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                            
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_4">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_4">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_5">
                                <div class="container">
                                    <div class="step_heading">
                                        School Information
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 5 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-6 mb-4 ">
                                    
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Enter School" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            <input type="text" id="" placeholder="Enter Major" class="form-control form-control-lg"/>
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                                            
                                                            <div class="form-outline">
                                                                <label for="">Enter Enrollment Date : </label>
                                                                <input type="date" id=""  class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Graduation Date :</label>
                                                                <input type="date" id=""  class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Other Income</label>
                                                                <input type="text" id="" placeholder="School" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Stipend Amount</label>
                                                                <input type="text" id="" placeholder="$10,000" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Other Income</label>
                                                                <input type="" id="" placeholder="Investment" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for=""></label>
                                                                <input type="text" id="" placeholder="$10,000" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                            
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_5">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_5">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_6">
                                <div class="container">
                                    <div class="step_heading">
                                        Other Information
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 6 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-6 mb-4 ">
                                    
                                                            <div class="form-outline">
                                                                <label for="">Other Income</label>
                                                                <input type="text" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4">
                                                            <label for="">Income Amount</label>
                                                            <input type="text" id="" placeholder="" class="form-control form-control-lg"/>
                                                        </div>
                                    
                                                        <div class="col-md-12 mb-4">
                                        
                                                            <div class="form-outline">
                                                                <label for="">Emergency Contact</label>
                                                                <input type="text" id="" placeholder="Enter Name" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Relationship" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <input type="text" id="" placeholder="Phone Number" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                                            
                                                            <div class="form-outline">
                                                                <label for="">Desired Occupancy Dates :  </label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-6 mb-4 ">
                                        
                                                            <div class="form-outline">
                                                                <label for=""></label>
                                                                <input type="date" id="" placeholder="" class="form-control form-control-lg"/>
                                                            </div>
                                            
                                                        </div>
                                    
                                                        <div class="col-md-12 mb-4 ">
                                        
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Reason For Moving</label>
                                                                <textarea class="form-control" placeholder="Investment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                            
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_6">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_6">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_7">
                                <div class="container">
                                    <div class="step_heading">
                                        Legal
                                    </div>
                                    <div class="pop_up_reg">
                                        <!-- step 7 -->
                                
                                        <div class="popup_reg_form">
                                            <form action="">
                                                
                                                <div class="form_table">
                                                    <div class="row">
                                
                                                        <div class="col-md-12 mb-4 ">
                                        
                                                            <h6 class="mb-2 pb-1">Have Any Litigations Such as Evictions, Suit, Judgements, Pending changes for criminal offense, Bankruptices,  Foreclosures been leaned upon you?</h6>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="femaleGender" value="option1" checked/>
                                                                <label class="form-check-label" for="">Yes</label>
                                                            </div>
                                            
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="checkbox" id="maleGender" value="option2"/>
                                                                <label class="form-check-label" for="">No</label>
                                                            </div>
                                        
                                                        </div>
                                                        <div class="col-md-12 mb-4 ">
                                        
                                                            <div class="form-group">
                                                                <textarea class="form-control" placeholder="Explain:" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>
                                            
                                                        </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                  
                                            
                                                <div class="form_btn">
                                                    <button type="submit" class="go_back_btn go_back_7">
                                                        <span>
                                                            Go Back
                                                        </span>
                                                    </button>
                                    
                                                    <button type="submit" class="continew_btn continue_7">
                                                        <span>
                                                            Continue
                                                        </span>
                                                    </button>
                                                </div>
                                  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        
                            <section class="step_8">
                                <div class="container">
                                    <div class="pop_up_reg">
                                        <div class="step_heading">
                                            Appucation/Deposit Agreement
                                        </div>
                            
                                        <div class="form_table">
                                            <div class="row justify-content-center">
                            
                                                <div class="col-md-8 mb-4 ">
                                                    
                                                    <ol>
                                                        <li>
                                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                                        </li>
                                                        <li>
                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or rando mised words which don't look even slightly believable.
                                                        </li>
                                                        <li>
                                                            Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.
                                                        </li>
                                                        <li>
                                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                                        </li>
                                                        <li>
                                                            Passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or rando mised words which don't look even slightly believable.
                                                        </li>
                                                        <li>
                                                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                                                        </li>
                                                        <li>
                                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.
                                                        </li>
                                                    </ol>
                                                    
                                                </div>
                            
                                                <div class="col-md-6 mb-4 ">
                                
                                                    <div class="form-group">
                                                        <label for="">Print Your Signature</label>
                                                        <input class="form-control" type="file" placeholder="signature" id="">
                                                    </div>
                                    
                                                </div>
                                                    
                                                    
                                            </div>
                                        </div>
                            
                                        <div class="form_btn">
                                            <button type="submit" class="go_back_btn go_back_8">
                                                <span>
                                                    Go Back
                                                </span>
                                            </button>
                            
                                            <button type="submit" class="continew_btn continue_8">
                                                <span>
                                                    Continue
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.footer')

@endsection