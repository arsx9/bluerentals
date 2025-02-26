@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto mb-3 text-dark">Edit Property</h3>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form action="{{route('admin.properties.update', $property)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT')}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="type" class="control-label">{{ __('Property for') }}</label>
                            <div class="btn-group d-flex" data-toggle="buttons">
                                <label class="btn btn-info active flex-fill">
                                  <input type="radio" name="type" value="For sale" @if ($property->type=="For sale") checked @endif> For sale
                                </label>
                                <label class="btn btn-info flex-fill">
                                  <input type="radio" name="type" value="For rent" @if ($property->type=="For rent") checked @endif> For rent
                                </label>
                                <label class="btn btn-info flex-fill">
                                    <input type="radio" name="type" value="Furnished" @if ($property->type=="Furnished") checked @endif> Furnished
                                  </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="is_featured" class="control-label">{{ __('Featured') }}</label>
                            <div class="btn-group d-flex" data-toggle="buttons">
                                <label class="btn btn-info active flex-fill">
                                  <input type="radio" name="is_featured" value="Yes" @if ($property->is_featured=="Yes") checked @endif> Yes
                                </label>
                                <label class="btn btn-info flex-fill">
                                  <input type="radio" name="is_featured" value="No" @if ($property->is_featured=="No") checked @endif> No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="title" class="control-label">{{ __('Property title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Title" value="{{$property->title}}" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address" class="control-label">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required placeholder="Address" value="{{$property->address}}">

                            @error('address')
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
                            <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" placeholder="Cost" value="{{$property->cost}}" required>

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
                                <option value="1" @if ($property->bed_rooms=="1") selected @endif>1</option>
                                <option value="2" @if ($property->bed_rooms=="2") selected @endif>2</option>
                                <option value="3" @if ($property->bed_rooms=="3") selected @endif>3</option>
                                <option value="4" @if ($property->bed_rooms=="4") selected @endif>4</option>
                                <option value="5" @if ($property->bed_rooms=="5") selected @endif>5</option>
                                <option value="6" @if ($property->bed_rooms=="6") selected @endif>6</option>
                                <option value="7" @if ($property->bed_rooms=="7") selected @endif>7</option>
                                <option value="8" @if ($property->bed_rooms=="8") selected @endif>8</option>
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
                                <option value="1" @if ($property->bath_rooms=="1") selected @endif>1</option>
                                <option value="2" @if ($property->bath_rooms=="2") selected @endif>2</option>
                                <option value="3" @if ($property->bath_rooms=="3") selected @endif>3</option>
                                <option value="4" @if ($property->bath_rooms=="4") selected @endif>4</option>
                                <option value="5" @if ($property->bath_rooms=="5") selected @endif>5</option>
                                <option value="6" @if ($property->bath_rooms=="6") selected @endif>6</option>
                                <option value="7" @if ($property->bath_rooms=="7") selected @endif>7</option>
                                <option value="8" @if ($property->bath_rooms=="8") selected @endif>8</option>
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
                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" placeholder="Area in Sq feet" value="{{$property->area}}" required>

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
                            <input id="available_from" type="date" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Select date" value="{{$property->available_from}}">

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
                            <input id="first_month" type="number" class="form-control @error('first_month') is-invalid @enderror" name="first_month" placeholder="First month" value="{{$property->first_month}}" required>

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
                            <input id="last_month" type="number" class="form-control @error('last_month') is-invalid @enderror" name="last_month" placeholder="Last month" value="{{$property->last_month}}" required>

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
                            <input id="security_deposit" type="number" class="form-control @error('security_deposit') is-invalid @enderror" name="security_deposit" placeholder="Security deposit" value="{{$property->security_deposit}}">

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
                            <input id="cleaning_fee" type="number" class="form-control @error('cleaning_fee') is-invalid @enderror" name="cleaning_fee" placeholder="Cleaning fee" value="{{$property->cleaning_fee}}">

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
                            <input id="broker_fee" type="number" class="form-control @error('broker_fee') is-invalid @enderror" name="broker_fee" placeholder="Broker fee" value="{{$property->broker_fee}}">

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
                            <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" required placeholder="Contact person name" value="{{$property->contact_person}}">

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
                            <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" required placeholder="Contact number" value="{{$property->contact_number}}">

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
                            <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" required placeholder="Latitude" value="{{$property->latitude}}">

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
                            <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" required placeholder="Longitude" value="{{$property->longitude}}">

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
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Short description">{{$property->description}}</textarea>
        
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
                                <div class="checkbox"><label><input type="checkbox" name="terms[]" value="{{$term->id}}"
                                    @if ($property->hasTerm($term->term))
                                        checked
                                    @endif> {{$term->term}}</label></div>
                            @endforeach
                            {{-- <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Pets" @if (in_array("No Pets", json_decode($property->terms))) checked @endif> No Pets</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Smoking" @if (in_array("No Smoking", json_decode($property->terms))) checked @endif> No Smoking</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="No Parking" @if (in_array("No Parking", json_decode($property->terms))) checked @endif> No Parking</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="12 Month LEA" @if (in_array("12 Month LEA", json_decode($property->terms))) checked @endif> 12 Month LEA</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="terms[]" value="Shared Outdoor Duties" @if (in_array("Shared Outdoor Duties", json_decode($property->terms))) checked @endif> Shared Outdoor Duties</label></div> --}}
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
                                <div class="checkbox"><label><input type="checkbox" name="features[]" value="{{$feature->id}}"
                                    @if ($property->hasFeature($feature->feature))
                                        checked
                                    @endif> {{$feature->feature}}</label></div>
                            @endforeach
                            {{-- <div class="checkbox"><label><input type="checkbox" name="features[]" value="Washer/Dryer - In Unit" @if (in_array("Washer/Dryer - In Unit", json_decode($property->features))) checked @endif> Washer/Dryer - In Unit</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Dishwasher" @if (in_array("Dishwasher", json_decode($property->features))) checked @endif> Dishwasher</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Hardwood Floors" @if (in_array("Hardwood Floors", json_decode($property->features))) checked @endif> Hardwood Floors</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Granite Countertops" @if (in_array("Granite Countertops", json_decode($property->features))) checked @endif> Granite Countertops</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Heating" @if (in_array("Heating", json_decode($property->features))) checked @endif> Heating</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Eat-in Kitchen" @if (in_array("Eat-in Kitchen", json_decode($property->features))) checked @endif> Eat-in Kitchen</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Kitchen" @if (in_array("Kitchen", json_decode($property->features))) checked @endif> Kitchen</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Microwave" @if (in_array("Microwave", json_decode($property->features))) checked @endif> Microwave</label></div>
                            <div class="checkbox"><label><input type="checkbox" name="features[]" value="Hardwood Floors" @if (in_array("Hardwood Floors", json_decode($property->features))) checked @endif> Hardwood Floors</label></div> --}}
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
                            <label for="video_link" class="control-label">{{ __('Video link') }}</label>
                            <input id="video_link" type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" placeholder="Video link from internet" value="{{$property->video_link}}">
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
                        @if (count(json_decode($property->image_urls))>0)
                            <div class="d-flex flex-wrap">
                                @foreach (json_decode($property->image_urls) as $image)
                                <div class="image-item" style="position: relative">
                                    <img class="img-thumbnail m-1 hover-shadow cursor" src="../../../uploads/{{$image}}" style="width: 200px; height:200px;" onclick="openModal();currentSlide({{$loop->index+1}})">
                                    {{-- <form class="delete-img-form" style="position: absolute; bottom:0; right:0;" action="#" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                    </form> --}}
                                    {{-- <a class="text-danger" href="#" style="position: absolute; bottom:0; right:0;"><i class="far fa-times-circle fa-lg"></i></a> --}}
                                </div>
                                @endforeach
                            </div>  
                            @else
                            No attachment was found. 
                        @endif
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