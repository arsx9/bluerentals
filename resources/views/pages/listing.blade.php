@extends('layouts.app')

@section('content')

<section class="listing">
    <!-- Filters list Commented  -->
    {{--
    <div class="filter-bar bg-info py-4">
        <div class="container">
            <form action="{{route('filter')}}" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="price_min">
                                <option value="-1" selected>No Min Price</option>
                                <option value="0">0</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="10000">10000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="price_max">
                                <option value="99999" selected>No Max Price</option>
                                <option value="0">0</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="10000">10000</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="beds_min">
                                <option value="0" selected>No Min Beds</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="beds_max">
                                <option value="99" selected>No Max Beds</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="bath_min">
                                <option value="0" selected>No Min Bath</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="bath_max">
                                <option value="99" selected>No Max Bath</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="type">
                                <option value="99" selected>No Type</option>
                                <option value="For sale">For sale</option>
                                <option value="For rent">For rent</option>
                                <option value="Furnished">Furnished</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Filter') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="sq_min">
                                <option value="0" selected>Area(sq) min</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="1500">1500</option>
                                <option value="2000">2000</option>
                                <option value="2500">2500</option>
                                <option value="3000">3000</option>
                                <option value="3500">3500</option>
                                <option value="4000">4000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" name="sq_max">
                                <option value="9999" selected>Area(sq) max</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="1500">1500</option>
                                <option value="2000">2000</option>
                                <option value="2500">2500</option>
                                <option value="3000">3000</option>
                                <option value="3500">3500</option>
                                <option value="4000">4000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="key_words" placeholder="Try Waterfronts, gym, or renovate">
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-secondary btn-block">
                            {{ __('Filter') }}
                        </button>
                    </div> -->
                </div>
            </form>
        </div> 
    </div>
    --}}

    <div class="container"> 
        <div class="row listing_search">
          <div class="search">
              <input type="search" class="search_input" placeholder="Search" aria-label="Search"/>
              <button type="button" class="search_button">
                  <img src="./img/search.png" alt="Search Icon">
              </button>
          </div>

          <button type="button" class="filter" data-toggle="modal" data-target="#filterModal">
              <span>
                  Filter
              </span>
          </button>  
        </div>
        <div class="row d-flex justify-content-between mb-2">
            <div>
                Showing {{number_format($properties->total())}} Appartments
            </div>
            <div class="toogle_btn">
                <button id="gridViewBtn" class="custom-toggle-btn custom-toggle-btn-left shadow-sm custom-toggle-btn-active">
                    <i class="fas fa-th"></i> Grid
                </button>
                <button id="listViewBtn" class="custom-toggle-btn custom-toggle-btn-right shadow-sm custom-toggle-btn-non-active">
                    <i class="fas fa-list"></i> List
                </button>
            </div>
        </div>

      @if(isset($message))
        <div class="alert alert-success my-2">
            {{$message}}
        </div>
        @endif

      <div class="row d-none mt-4" id="listViewContainer">
        @if(count($properties)>0)
            @foreach ($properties as $property)
            <!-- List View -->
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 position-relative">
                        <!-- Tag -->
                        <div @if($property->type=='For rent')
                            class="product_catagory blue_for_rent_button for_rent"
                            @else
                                class="product_catagory blue_comming_soon_button Coming_soon"
                            @endif>
                            {{$property->type, 'N/A'}}
                        </div>
                        <img 
                            @if (count(json_decode($property->image_urls)) > 0)
                                src="{{ asset('uploads/' . json_decode($property->image_urls)[0]) }}" style="height: 100%; object-fit: cover;"
                            @else
                                src="{{ url('img/logo.png') }}" style="height: 250px; object-fit: cover;"
                            @endif 
                            class="img-fluid rounded-start w-100" alt="Property Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${{$property->cost ?? 'N/A'}}</h5>
                            <p class="card-text">
                                {{$property->bed_rooms ?? 'N/A'}} Bed | {{$property->bath_rooms ?? 'N/A'}} Bath | {{$property->area ?? 'N/A'}} Sq. Ft.
                            </p>
                            <p class="card-text"><small class="text-muted">{{$property->address ?? 'N/A'}}</small></p>
                            <a href="/show/{{$property->id}}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-primary my-4">
                No property records found
            </div>
        @endif
      </div>
      <div class="row" id="gridViewContainer">
        @if(count($properties)>0)
            @foreach ($properties as $property)
            <!-- Grid View -->
                <div class="col-lg-4 single_property">
                    <div class="single_property_content">
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
                        {{-- <div @if ($property->type=='For rent')
                                class="product_catagory blue_for_rent_button for_rent"
                            @else
                                class="product_catagory blue_for_rent_button for_rent Coming_soon"
                            @endif>
                                {{$property->type, 'N/A'}}
                        </div> --}}
                        <img class="product_image" 
                            @if (count(json_decode($property->image_urls))>0)
                                src="{{ asset('uploads/' . json_decode($property->image_urls)[0]) }}"
                            @else
                                src="{{ url('img/logo.png') }}"
                            @endif alt="Image">
                        <div class="list_item_content border shadow-sm">
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
                </div>
            @endforeach
        @else
            <div class="alert alert-primary my-4">
                No property records found
            </div>
        @endif
      </div>
      <div class="row d-flex justify-content-center">
        {!! $properties->render() !!}
      </div>
  </div>
</section>

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
        const gridViewBtn = document.getElementById("gridViewBtn");
        const listViewBtn = document.getElementById("listViewBtn");
        const listViewContainer = document.getElementById("listViewContainer");
        const gridViewContainer = document.getElementById("gridViewContainer");

        // Function to update view
        function updateView(view) {
            if (view === "grid") {
                gridViewBtn.classList.add("custom-toggle-btn-active");
                gridViewBtn.classList.remove("custom-toggle-btn-non-active");

                listViewBtn.classList.add("custom-toggle-btn-non-active");
                listViewBtn.classList.remove("custom-toggle-btn-active");

                gridViewContainer.classList.remove("d-none");
                listViewContainer.classList.add("d-none");
            } else {
                listViewBtn.classList.add("custom-toggle-btn-active");
                listViewBtn.classList.remove("custom-toggle-btn-non-active");

                gridViewBtn.classList.add("custom-toggle-btn-non-active");
                gridViewBtn.classList.remove("custom-toggle-btn-active");

                listViewContainer.classList.remove("d-none");
                gridViewContainer.classList.add("d-none");
            }
        }

        // Check localStorage for saved view preference
        let savedView = localStorage.getItem("propertyView") || "grid";
        updateView(savedView);

        gridViewBtn.addEventListener("click", function () {
            localStorage.setItem("propertyView", "grid");
            updateView("grid");
        });

        listViewBtn.addEventListener("click", function () {
            localStorage.setItem("propertyView", "list");
            updateView("list");
        });
    });
</script>

<!-- Modal for the Filter -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Close Btn -->
        <button type="button" class="close_btn filter" data-dismiss="modal" aria-label="Close" style="margin-top: -30px; margin-right:-30px;">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="row d-flex justify-content-around align-items-center mb-3">
            <div class="" style="font-size: 18px; font-weight:500;">
                Filter your search
            </div>
            <div class="">
                <button type="submit" class="save_src_btn filter">
                    <span>
                        save search
                    </span>
                </button>
            </div>
        </div>
        <div class="row ">
            <div class="col-10 p-3 mx-auto" style="background-color: #ecece7;">
                <div class="form-group line_one">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="price">
                                <select class="min_price" name="price_min">
                                    <option value="0" selected>No Min Price</option>
                                    <option value="0">0</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                    <option value="10000">10000</option>
                                </select>
                                <span class="hig_pen">-</span>            
                                <select class="max_price" name="price_max">
                                    <option value="10000" selected>No Max Price</option>
                                    <option value="0">0</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                    <option value="10000">10000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">            
                        </div>
                    </div>
                </div>
                <div class="form-goup line_two">               
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label>Beds</label>
                            <div class="beds">
                                <select class="no_beds_min" name="beds_min">
                                    <option value="0" selected>No Min</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="hig_pen"> - </span>                
                                <select class="no_beds_max" name="beds_max">
                                    <option value="10" selected>No Max</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <label >Bath</label>
                            <div class="bath_col">
                                <div class="bath_cal">
                                    <button class="minas_but">-</button>
                                    <input class="bath_inp" type="number" value="0" name="bath">
                                    <button class="plus_but">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group line_three">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="move_in_date" >Move-In-Date</label>
                            <div class="date_inp">
                                <input class="date_field" type="date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group line_four">
                    <label class="listing_status">Listing Status</label>
                    <div class="row">
                        <div class="col-12" style="margin-top:-20px; margin-bottom:5px;">
                            Status
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="coming_soon" id="coming_soon">
                                <label class="form-check-label" for="coming_soon">
                                    Coming Soon
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="active" id="active">
                                <label class="form-check-label " for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="pending" id="pending">
                                <label class="form-check-label" for="pending">
                                    Application Pending/Leases Out
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="rented" id="rented">
                                <label class="form-check-label" for="rented">
                                    Rented
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group line_five">
                    <label class="property_fact">Property Facts</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="squar_feet">
                                <label class="squar_f_title">Squar Feet</label>
                                <div class="squar">
                                    <select class="no_min" name="sq_min">
                                        <option value="0" selected>No Min</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="1500">1500</option>
                                        <option value="2000">2000</option>
                                        <option value="2500">2500</option>
                                        <option value="3000">3000</option>
                                        <option value="3500">3500</option>
                                        <option value="4000">4000</option>
                                    </select>
                                    <span class="hig_pen">-</span>                
                                    <select class="no_max" name="sq_max">
                                        <option value="1000000" selected>No Max</option>
                                        <option value="100">100</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="1500">1500</option>
                                        <option value="2000">2000</option>
                                        <option value="2500">2500</option>
                                        <option value="3000">3000</option>
                                        <option value="3500">3500</option>
                                        <option value="4000">4000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group line_six">
                    <label class="other_amen">Other Amenities</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_washer_dryer_in_unit" id="must_have_washer_dryer_in_unit">
                                <label class="form-check-label" for="must_have_washer_dryer_in_unit">
                                    Must Have Washer / Dryer in Unit
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_private_outdoor_space" id="must_have_private_outdoor_space">
                                <label class="form-check-label" for="must_have_private_outdoor_space">
                                    Must Have Private Outdoor Space
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_elevator" id="must_have_elevator">
                                <label class="form-check-label" for="must_have_elevator">
                                    Must Have Elevator
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_waterfront" id="must_have_waterfront">
                                <label class="form-check-label" for="must_have_waterfront">
                                    Must Have Waterfront
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_doorman" id="must_have_doorman">
                                <label class="form-check-label" for="must_have_doorman">
                                    Must Have Doorman
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_pool" id="must_have_pool">
                                <label class="form-check-label" for="must_have_pool">
                                    Must Have Pool
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_garage" id="must_have_garage">
                                <label class="form-check-label" for="must_have_garage">
                                    Must Have Garage
                                </label>
                            </div>
                            <div class="form-check custom_inp">
                                <input class="form-check-input" type="checkbox" value="must_have_air_conditioning" id="must_have_air_conditioning">
                                <label class="form-check-label" for="must_have_air_conditioning">
                                    Must Have Air Conditioning
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group line_seven">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="keywords">
                                <label for="key_words">Keywords</label>
                                <div class="keywords_inp">
                                    <input id="key_words" type="text" placeholder="Try Waterfront, gym, or renovate" name="key_words">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="rest_btn w-25">Reset</button>
        <button type="submit" class="save_src_btn filter w-25">save search</button>
      </div>
    </div>
  </div>
</div>

@endsection