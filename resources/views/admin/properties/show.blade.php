@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="background_banner">
        @foreach (json_decode($property->image_urls) as $image)
            <a class="venobox" data-gall="gallery01" href="{{ asset('/uploads/'.$image.'')}}">
                <img src="{{ asset('/public/uploads/'.$image.'')}}" alt="">
            </a>
        @endforeach
    </div>
    @if($property->video_link != null)
        <a class="venobox property-play" data-autoplay="true" data-vbtype="video" href="{{$property->video_link}}">
            <img src="{{ asset('img/play-circle-regular.svg') }}" alt="play icon">
        </a>
    @endif
    
</section>


<div class="container"> 

    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible mt-3">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-lg-8 ">

            <div class="property_details">

                <div class="share_pro_details">
                    <div class="adress">
                        <h3 class="Street_name">
                            {{$property->address}}
                        </h3>
                        {{-- <h4 class="state_name">
                            {{$property->address}}
                        </h4> --}}
                    </div>

                    <a class="share_btn">

                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share-alt" class="svg-inline--fa fa-share-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path  fill="currentColor" d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z"></path>
                        </svg>

                        <div>
                            Share
                        </div>

                    </a>

                </div>

                <div  class=" row property_specification">
                    <div class="col-lg-3">
                        <div class="montly_rent">
                            Montly Rent <br>
                            ${{$property->cost}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="bed_room">
                            Bedrooms <br>
                            {{$property->bed_rooms}} bd
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="bath_room">
                            Bathrooms <br>
                            {{$property->bath_rooms}} ba
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="squire_feet">
                            Square Feet <br>
                            {{$property->area}} sq ft
                        </div>
                    </div>
                </div>

                <div class="property_content">

                    <div class="detail_text">
                        {{$property->description}}
                    </div>
                </div>


                <div class="rules_terms">

                    <h3 class="rules_title">
                        Rules and Terms
                    </h3>

                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <ul class="rules_terms_list">
                                @foreach ($property->terms as $term)
                                <li>
                                    {{ $term->term }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="apartment_features">
                    <h3 class="apartment_features_title">
                        Apartment Features
                    </h3>
                    <div class="row fetcher_box_row">
                        @foreach ($property->features as $feature)
                            @if ($feature->icon!="")
                                <div class="col-lg-3">
                                    <div class="image_box">
                                        <img src="../uploads/{{$feature->icon}}" alt="{{$feature->feature}}">
                                        <div class="image_box_text">
                                            {{$feature->feature}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="featcher_list">

                        <div class="row">

                            <div class="col-lg-10 col-md-12">
                                <ul>
                                    @foreach ($property->features as $feature)
                                        @if ($feature->icon=="")
                                            <li>
                                                {{ $feature->feature }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>

                </div>

                <div class="property_contact">
                    <h3 class="property_contact_title">
                        Contact
                    </h3>
                    <div class="property_contact_detail">
                        <div class="con_det_content">
                            <div class="cell_no d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="42" height="42" viewBox="0 0 21 21">
                                    <image id="phone_copy" data-name="phone copy" width="21" height="21" xlink:href="data:img/png;base64,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"/>
                                </svg>
                                
                                <div class="cell_degit">
                                    {{$property->contact_number}}
                                </div>
                            </div>
                            <div class="cell_text d-none">
                                {{$property->contact_name}}
                            </div>
                            Call Charles
                        </div>
                        <div class="proparty_contact_btn blue_button">
                            617.991.0737
                        </div>
                    </div>
                </div>

                <iframe src="https://maps.google.com/maps?q={{$property->latitude}}, {{$property->longitude}}&z=15&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>

        </div>

        <div class="col-lg-4 ">

            <div class="property_contact">

                <div class="movein_req">

                    <div class="movin_contact_no cell_no">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="42" height="42" viewBox="0 0 21 21">
                            <image id="phone" width="21" height="21" xlink:href="data:img/png;base64,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"/>
                          </svg>
                          
                        <div class="cell_degit">
                            1-833-255-8373
                        </div>
                    </div>

                    <form action="{{route('message')}}" method="POST" class="inquery_form">
                        @csrf
                        <input name="property_id" type="text" hidden value="{{$property->id}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="first_name" type="text" class="form_imput" placeholder="First name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="last_name" class="form_imput" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="email" class="form_imput" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="date" name="date" class="form_imput" placeholder="Date">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="phone" class="form_imput" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form_would_like">
                            I would like to...
                        </div>
                        <div class="row form_radio">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="request_for[]" value="Schedule a Tour">
                                    <label class="form-check-label" for="request_for">
                                        Schedule a Tour
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="request_for[]" value="Request Application">
                                    <label class="form-check-label" for="request_for">
                                        Request Application
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form_subbmit">
                            <button type="submit" class="btn btn-primary btn-block subbmit">
                                {{ __('Send Message') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="apartment_avail">
                    <div class="apartment_title">
                        Apartment Availavility
                    </div>
                    <div class="apartment_avail_date">
                        {{$property->available_from}}
                    </div>

                </div>

                <div class="move_in_cost">
                    <div class="move_in_title">
                        MOVE-IN-COST
                    </div>

                    <div class="moving_priccs">
                        <div class="month">
                            <div class="m_title">
                                First Month
                            </div>
                            <div class="m_price">
                                ${{$property->first_month}}
                            </div>
                        </div>
                        <div class="s_dipo">
                            <div class="Dipo_title">
                                Security Deposit
                            </div>
                            <div class="dipo_price">
                                ${{$property->security_deposit}}
                            </div>
                        </div>
                        <div class="broker_fee">
                            <div class="brok_f_title">
                                Broker Fee
                            </div>
                            <div class="brok_f_price">
                                ${{$property->broker_fee}}
                            </div>
                        </div>
                    </div>

                    <div class="total">
                        <div class="total_cost">
                            <div class="cost_title">
                                Total Cost :
                            </div>
                            <div class="cost">
                                ${{$total_cost}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        
    </div>

</div>
@endsection