@extends('layouts.app')

@section('content')

<div id="consent-div">
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
        <button onclick="giveConsent()" class="btn accept-consent-btn mt-5 w-25">Accept</button>
    </div>
</div>
<div id="homepage-content">
    <section class="home_banner">
        <div class="container">
            <div class="banner_area">

                <h3 class="banner_title">
                    Find Your Next Apartment
                </h3>
                <form action="{{route('search')}}" method="GET">
                    <div class="home_search">

                        <select data-placeholder="Enter State..." multiple="multiple" class="home-page-search" name="key_states[]" required>
                        @foreach (config('constants.states') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                        <select data-placeholder="Ex: 2 Beds, 2 Bathrooms..." multiple="multiple" class="home-page-search" name="key_words[]" required>
                            <option value="1 beds">1 Bed</option>
                            <option value="2 beds">2 Beds</option>
                            <option value="3 beds">3 Beds</option>
                            <option value="4 beds">4 Beds</option>
                            <option value="2 bathrooms">2 Bathrooms</option>
                            <option value="3 bathrooms">3 Bathrooms</option>
                            <option value="4 bathrooms">4 Bathrooms</option>
                        </select>
                        
                        <!-- <input type="text" class="home_search_input" name="key_words" maxlength="64" placeholder="Ex: 2 Beds, 2 Kitchen..." /> -->
                        <button type="submit" class="home_search_button">
                            <img src="./img/search.png" alt="Search">
                        </button> 
                    </div>
                </form>

                <h4 class="banner_sub_title">
                    List your apartment today
                </h4>

                <a class="home_banner_button blue_button" href="#">
                    List Today
                </a>

                <div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-center w-100" id="subscriptionModalLabel" style="color: #184399;">List Today</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('listToday') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inlineFormInputName1" name="name" placeholder="Name...">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inlineFormInputName2" name="phone" placeholder="Phone...">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inlineFormInputName3" name="email" placeholder="Email...">
                                </div>
                                <button type="submit" class="btn btn-primary">List My Apartment</button>
                            </form>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger mt-3">
                                <strong>Hmmm!</strong> There were some problems with your action.<br>
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <section class="qustion d-none">
        <div class="containe">
            <div class="qustion_area">
                <h3 class="qustion_title">
                    Thinking of Buying or Selling A Multi-Family Home?
                </h3>
                <a class="blue_button" href="./">
                    Start Today
                </a>
            </div>
        </div>
    </section>

    <section class="home_listing">
        <div class="container">
            @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            <div class="new_slider home_listing_area">

                <div class="listing_text">
                    <h3 class="home_listing_title">
                        Our Listings
                    </h3>
                    <h4 class="home_listing_sub_title">
                        Choose your new home
                    </h4>
                </div>
                <!-- Swiper -->
                <div class="swiper swiper1 mySwiper blue_home_slider">
                    <div class="swiper-wrapper">
                        @if(count($properties)>0)
                            @foreach ($properties as $property)

                            <div class="swiper-slide blue_swiper">
                                <a href="/show/{{$property->id}}">
                                <div class="product_hover_logo">
                                    <img class="product_logo" src="./img/logo.png" alt="">
                                </div>
                                <div @if($property->type=='For rent')
                                        class="product_catagory blue_for_rent_button for_rent"
                                    @else
                                        class="product_catagory blue_comming_soon_button Coming_soon"
                                    @endif>
                                    {{$property->type, 'N/A'}}
                                </div>
                                <img class="product_image" 
                                    @if (count(json_decode($property->image_urls))>0)
                                        src="./public/uploads/{{json_decode($property->image_urls)[0]}}"
                                    @else
                                        src="./img/default_thumb.jpeg"
                                    @endif alt="Image">
                                <div class="list_item_content">
                                    <div class="property_prize">
                                        ${{$property->cost, 'N/A'}}
                                    </div>
                                    <div class="specification">
                                        {{$property->bed_rooms, 'N/A'}} Bed  {{$property->bath_rooms, 'N/A'}} Bath  {{$property->area, 'N/A'}} Sq. Ft.
                                    </div>
                                    <div class="listing_item_adress">
                                        {{$property->address, 'N/A'}}
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                            @endforeach
                        @endif
                        
                    </div>

                    <!-- pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@include('inc.footer')

<script>
    var swiper = new Swiper(".blue_home_slider", {
      slidesPerView: 3,
      spaceBetween: 40,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    document.addEventListener("DOMContentLoaded", function () {
        if (localStorage.getItem("userConsent") === "accepted") {
            document.getElementById("consent-div").style.display = "none";
            document.getElementById("homepage-content").style.display = "block";
        }
        else{
            document.getElementById("consent-div").style.display = "block";
            document.getElementById("homepage-content").style.display = "none";
        }
    });
    function giveConsent() {
        localStorage.setItem("userConsent", "accepted"); // Store consent
        document.getElementById("consent-div").style.display = "none";
        document.getElementById("homepage-content").style.display = "block";
    }
  </script>

@endsection
