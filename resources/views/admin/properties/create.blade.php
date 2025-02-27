@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto mb-3 text-dark">New Property</h3>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form action="{{route('admin.properties.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="type" class="control-label">{{ __('Property for') }}</label>
                            <div class="btn-group d-flex" data-toggle="buttons">
                                <label class="btn btn-info active flex-fill">
                                  <input type="radio" name="type" value="For sale" autocomplete="off" checked> For sale
                                </label>
                                <label class="btn btn-info flex-fill">
                                  <input type="radio" name="type" value="For rent" autocomplete="off"> For rent
                                </label>
                                <label class="btn btn-info flex-fill">
                                    <input type="radio" name="type" value="Furnished" autocomplete="off"> Furnished
                                  </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="is_featured" class="control-label">{{ __('Featured') }}</label>
                            <div class="btn-group d-flex" data-toggle="buttons">
                                <label class="btn btn-info active flex-fill">
                                  <input type="radio" name="is_featured" value="Yes" autocomplete="off"> Yes
                                </label>
                                <label class="btn btn-info flex-fill">
                                  <input type="radio" name="is_featured" value="No" autocomplete="off" checked> No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="title" class="control-label">{{ __('Property title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="address" class="control-label">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required placeholder="Address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="state" class="control-label">{{ __('State') }}</label>
                            <select name="state" class="form-control selectpicker bed_rooms  @error('bed_rooms') is-invalid @enderror" data-style="btn-info" required>
                                <option value="" disabled>Select</option>
                                @foreach (config('constants.states') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('bed_rooms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cost" class="control-label">{{ __('Cost/Monthly rent') }}</label>
                            <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" placeholder="Cost" required>

                            @error('cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bed_rooms" class="control-label">{{ __('Bed rooms') }}</label>
                            <select name="bed_rooms" class="form-control selectpicker bed_rooms  @error('bed_rooms') is-invalid @enderror" data-style="btn-info" required>
                                <option value="" disabled>Bed room</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            @error('bed_rooms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bath_rooms" class="control-label">{{ __('Bath rooms') }}</label>
                            <select name="bath_rooms" class="form-control selectpicker bath_rooms  @error('bath_rooms') is-invalid @enderror" data-style="btn-info" required>
                                <option value="" disabled>Bath room</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            @error('bath_rooms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="area" class="control-label">{{ __('Area') }}</label>
                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" placeholder="Area in Sq feet" required>

                            @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="available_from" class="control-label">{{ __('Available from') }}</label>
                            <input id="available_from" type="date" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Select date" required>

                            @error('available_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="first_month" class="control-label">{{ __('First month') }}</label>
                            <input id="first_month" type="number" class="form-control @error('first_month') is-invalid @enderror" name="first_month" placeholder="First month" required>

                            @error('first_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="last_month" class="control-label">{{ __('Last month') }}</label>
                            <input id="last_month" type="number" class="form-control @error('last_month') is-invalid @enderror" name="last_month" placeholder="Last month" required>

                            @error('last_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="security_deposit" class="control-label">{{ __('Security deposit') }}</label>
                            <input id="security_deposit" type="number" class="form-control @error('security_deposit') is-invalid @enderror" name="security_deposit" placeholder="Security deposit" required>

                            @error('security_deposit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="cleaning_fee" class="control-label">{{ __('Cleaning fee') }}</label>
                            <input id="cleaning_fee" type="number" class="form-control @error('cleaning_fee') is-invalid @enderror" name="cleaning_fee" placeholder="Cleaning fee">

                            @error('cleaning_fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="broker_fee" class="control-label">{{ __('Broker fee') }}</label>
                            <input id="broker_fee" type="number" class="form-control @error('broker_fee') is-invalid @enderror" name="broker_fee" placeholder="Broker fee" required>

                            @error('broker_fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="contact_person" class="control-label">{{ __('Contact person') }}</label>
                            <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" required placeholder="Contact person name">

                            @error('contact_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="contact_number" class="control-label">{{ __('Contact number') }}</label>
                            <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" required placeholder="Contact number">

                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="latitude" class="control-label">{{ __('Latitude') }}</label>
                            <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" required placeholder="Latitude">

                            @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="longitude" class="control-label">{{ __('Longitude') }}</label>
                            <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" required placeholder="Longitude">

                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description" class="control-label">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Short description"></textarea>
        
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="terms" class="control-label">{{ __('Rules and Terms') }}</label>
                            @foreach ($terms as $term)
                                <div class="checkbox"><label><input type="checkbox" name="terms[]" value="{{$term->id}}"> {{$term->term}}</label></div>
                            @endforeach
                            {{-- <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Pets"> No Pets</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Smoking"> No Smoking</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Parking"> No Parking</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="12 Month LEA"> 12 Month LEA</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="Shared Outdoor Duties"> Shared Outdoor Duties</label></div> --}}
                            {{-- @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="features" class="control-label">{{ __('Apartment features') }}</label>
                            @foreach ($features as $feature)
                                <div class="checkbox"><label><input type="checkbox" name="features[]" value="{{$feature->id}}"> {{$feature->feature}}</label></div>
                            @endforeach
                            {{-- <div class="checkbox"><label><input type="checkbox" name="features[]" value="Washer/Dryer - In Unit"> Washer/Dryer - In Unit</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Dishwasher"> Dishwasher</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Hardwood Floors"> Hardwood Floors</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Granite Countertops"> Granite Countertops</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Heating"> Heating</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Eat-in Kitchen"> Eat-in Kitchen</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Kitchen"> Kitchen</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Microwave"> Microwave</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Hardwood Floors"> Hardwood Floors</label></div> --}}
                            {{-- @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="images" class="control-label">{{ __('Upload images') }}</label>
                            <input type="file" id="images" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
        
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="video_link" class="control-label">{{ __('Video link') }}</label>
                            <input id="video_link" type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" placeholder="Video link from internet">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
            
        </div>

@endsection