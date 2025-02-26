<!DOCTYPE html>
<html>
<head>
    <title>{{$application->full_name}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        .pdf-container {
            min-height: 1px;
            overflow: hidden;
            line-height: 30px;
        }
        .pdf-col-6 {
            float: left;
            width: 45%;
        }
        .pdf-col-6:first-child{
            margin-right: 5%;
        }
        .pdf-col-6:last-child{
            margin-right: 5%;
        }
        .bottom_border {
            border-bottom: 1px solid;
            padding: 5px;
        }
        .bordered-title {
            border-style: solid;
            padding: 10px;
            font-weight: 700;
            background-color: #bbb;
            margin: 20px 0;
        }
        .pdf-col-4 {
            float: left;
            width: 31.33%;
            margin-right: 3%;
        }
        .pdf-col-4:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="">
        <img src="bluerentals.test/public/img/logo.png" alt="Logo" style="display:block; margin-left:auto; margin-right:auto;">
    </div>
    <div style="text-align: center;padding: 10px 0 0;">
        (Subject to Owner's Approval)
    </div>
    
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->full_name}}</div>
            <span>(Name) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->email}}</div>
            <span>(Email)</span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->phone}}</div>
            <span>(Phone Number)</span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->have_kids}}</div>
            <span>Do you have pets? ☐Yes or ☐ No</span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-12" style="">
            <div class="bottom_border">{{$application->kid1}}, {{$application->kid1_age}}</div>
            <span>(Kids names and ages)</span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-12" style="">
            <div class="bottom_border">{{$application->kid2}}, {{$application->kid2_age}}</div>
            <span>(Kids names and ages)) </span>
        </div>
    </div>

    <div class="bordered-title">
        CURRENT ADDRESS 
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->current_address_type}}</div>
            <span>Address) ☐ Rent or ☐ Own</span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->current_address_cost}}</div>
            <span>(Current monthly mortgage or rent payment) </span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->current_address_landlord_name}}</div>
            <span>(Landlord) </span>
        </div>
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->current_address_landlord_phone}}</div>
            <span>(Landlord phone) </span>
        </div>
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->current_address_from}} to {{$application->current_address_to}}</div>
            <span>(Occupancy Dates) </span>
        </div>
    </div>

    <div class="bordered-title">
        CURRENT/FUTURE EMPLOYER
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->employer}}</div>
            <span>(Employer) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->employer_job_description}}</div>
            <span>(Job Description))</span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->employer_address}}</div>
            <span>(Address) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->employer_phone}}</div>
            <span>(Phone Number)</span>
        </div>
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->annual_salary}}</div>
            <span>(Annual Salary)) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->employment_from}} to {{$application->employment_to}}</div>
            <span>(Employment Dates))</span>
        </div>
    </div>
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->supervisor_name}}</div>
            <span>(Supervisor Name/HR) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->supervisor_phone}}</div>
            <span>(Supervisor phone number)</span>
        </div>
    </div>

    <div class="bordered-title">
        PREVIOUS EMPLOYER 
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_employer}}</div>
            <span>(Employer) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_employer_job_description}}</div>
            <span>(Job Description))</span>
        </div>
    </div>
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_employer_address}}</div>
            <span>(Address) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_employer_phone}}</div>
            <span>(Phone Number)</span>
        </div>
    </div>
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_annual_salary}}</div>
            <span>(Annual Salary)) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_employment_from}} to {{$application->past_employment_to}}</div>
            <span>(Employment Dates))</span>
        </div>
    </div>
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_supervisor_name}}</div>
            <span>(Supervisor Name/HR) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->past_supervisor_phone}}</div>
            <span>(Supervisor phone number)</span>
        </div>
    </div>

    <div class="bordered-title">
        OTHER INCOME
    </div>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">1</div>
            <span>(Source) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">3</div>
            <span>(Amount)</span>
        </div>
    </div>
    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">1</div>
            <span>(Source) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">3</div>
            <span>(Amount)</span>
        </div>
    </div>

    <div class="bordered-title">
        EMERGENCY CONTACT
    </div>

    <div class="pdf-container">
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->emergency_contact_name}}</div>
            <span>(Name) </span>
        </div>
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->emergency_contact_relationship}}</div>
            <span>(Relationship) </span>
        </div>
        <div class="pdf-col-4">
            <div class="bottom_border">{{$application->emergency_contact_phone}}</div>
            <span>(Phone) </span>
        </div>
    </div>

    <div class="bordered-title">
        REASON FOR MOVING
    </div>

    <div class="pdf-container">
        <div class="pdf-col-12" style="">
            <div class="bottom_border">{{$application->reason_for_moving}}</div>
        </div>
    </div>

    <p class="bordered-title">
        LEGAL
    </p>

    <p>
        Have any litigations such as evictions, suit, judgements, pending charges for criminal offense, bankruptcies, foreclosures been leaned upon you?
        <br>
        ☐ Yes or ☐ No
        <br>
        <br>
        If yes, please provide details and dates 
    </p>

    <div class="pdf-container">
        <div class="pdf-col-12" style="">
            <div class="bottom_border">1</div>
        </div>
    </div>

    <p class="bordered-title">
        Occupancy Dates
    </p>

    <div class="pdf-container">
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->desired_occupancy_from}}</div>
            <span>(Move in Date) </span>
        </div>
        <div class="pdf-col-6">
            <div class="bottom_border">{{$application->desired_occupancy_to}}</div>
            <span>(Occupancy dates, mm/yr - mm/yr)</span>
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
    <div class="pdf-container">
        <div class="pdf-col-4" style="">
            <div class="bottom_border">{{$application->full_name}}</div>
            <span>Applicant’s Name </span>
        </div>
        <div class="pdf-col-4" style="">
            <div class="bottom_border">{{$application->full_name}}</div>
            <span>Signature </span>
        </div>
        <div class="pdf-col-4" style="">
            <div class="bottom_border">{{$application->created_at}}</div>
            <span>Date</span>
        </div>
    </div>
</body>
</html>