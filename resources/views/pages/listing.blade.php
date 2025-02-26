@extends('layouts.app')

@section('content')

<section class="listing">
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
  <div class="container"> 

      {{-- <div class="listing_search">

          <div class="search">
              <input type="search" class="search_input" placeholder="Search" aria-label="Search"/>
              
              <button type="button" class="search_button">
                  <img src="./img/search.png" alt="Search Icon">
              </button>

          </div>

          <button type="submit" class="filter">
              <span>
                  Filter
              </span>
          </button>
          
      </div> --}}

      @if(isset($message))
        <div class="alert alert-success my-2">
            {{$message}}
        </div>
        @endif

      <div class="row">

        @if(count($properties)>0)
            @foreach ($properties as $property)
            
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
                </div>
            
            @endforeach
            {!! $properties->render() !!}
        @else
            <div class="alert alert-primary my-4">
                No property records found
            </div>
        @endif
          
      </div>

      <div class="pop_up_area">

        <div class="popup_top">

        </div>

        <div class="pop_up">

            <div class="close_btn filter">
                X
            </div>

            <div class="save_search">


                <div class="sav_src_txt">
                    Filter your search
                </div>

                {{-- <button type="submit" class="save_src_btn filter">
                    <span>
                        save search
                    </span>
                </button> --}}

            </div>

            {{-- <div class="popup_form">
                <form action="{{route('search')}}" method="GET">
                    <div class="popup_form_area">
                        
                        <div class="form-group line_one">
                            <label class="price_range">Price Range</label>
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

                        <div class="form-check listing_check_box line_four">
                            <label class="listing_status">Listing Status</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Coming soon" name="status[]">
                                        <label class="form-check-label blue_check">
                                            Coming Soon
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Active" name="status[]" id="active">
                                        <label class="form-check-label blue_check" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Application Pending/Leases Out" name="status[]" id="application_pending">
                                        <label class="form-check-label blue_check" for="application_pending">
                                            Application Pending/Leases Out
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Rented" name="status[]" id="recent">
                                        <label class="form-check-label blue_check" for="recent">
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

                        <div class="other_amenities line_six">
                            <label class="other_amen">Other Amenities</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Washer / Dryer in Unit" id="must_have_washer" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_washer">
                                            Must Have Washer / Dryer in Unit
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Private outdoor space" id="must_have_privet_space" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_privet_space">
                                            Must Have Private Outdoor Space
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Elevator" id="must_have_elevater" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_elevater">
                                            Must Have Elevator
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Waterfront" id="must_have_waterfont" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_waterfont">
                                            Must Have Waterfront
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Doorman" id="must_have_doorman" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_doorman">
                                            Must Have Doorman
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Pool" id="mist_have_pool" name="amneties[]">
                                        <label class="form-check-label blue_check" for="mist_have_pool">
                                            Must Have Pool
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Garage" id="must_have_garage" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_garage">
                                            Must Have Garage
                                        </label>
                                    </div>
                                    <div class="ch_1">
                                        <input class="form-check-input blue_check_inp" type="checkbox" value="Air conditioning" id="must_have_air" name="amneties[]">
                                        <label class="form-check-label blue_check" for="must_have_air">
                                            Must Have Air Conditioning
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="line_seven">
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
                        
                        <span class="bottom_line"></span>

                        <div class="bottom_button line_eight">
                            <button class="rest_btn filter">
                                <span>
                                    Rest
                                </span>
                            </button>
                            <button type="submit">
                                <span>
                                    Search
                                </span>
                            </button>
                        </div>
                        
                    </div>

                </form>
            </div> --}}

        </div>

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
</script>

        {{-- <div class="container">
          <div class="d-flex mb-2">
            <h3 class="mr-auto text-dark">Properties</h3>
            <a class="btn btn-outline-primary text-primary" role="button" href="{{route('properties.create')}}"><i class="fas fa-plus"></i></a>
          </div>

            @if(isset($message))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
          
            @if(count($properties)>0)
                <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover dataTable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                        <tr class="hover_info">
                            <th scope="row">
                                {{$property->id}}
                                <a class="btn btn-primary d-none open-user-link" href="{{ route('properties.show', $property)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                            <td>{{$property->title}}</td>
                            <td>{{$property->address, 'N/A'}}</td>
                            <td>{{$property->address, 'N/A'}}</td>
                            <td>
                                
                            </td>
                          </tr>
                        @endforeach
                        {!! $properties->render() !!}
                    </tbody>
                  </table>
                </div>
            @else
            <div class="alert alert-primary">
                No property records found
            </div>
            @endif
        </div> --}}

@endsection