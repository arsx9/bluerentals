@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto text-dark">New User Form</h3>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form method="POST" action="{{route('admin.users.store')}}">
                @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="User full name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email" class="control-label">{{ __('Email') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="roles" class="control-label">{{ __('Roles') }}</label>
                        <select name="roles[]" class="form-control selectpicker roles  @error('roles[]') is-invalid @enderror" data-style="btn-info" multiple required>
                            <option value="" disabled>Select roles</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">
                                    {{$role->name}}
                                </option>
                            @endforeach
                          </select>
                        @error('roles[]')
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
                        <label for="password" class="control-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter a password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="password-confirm" class="control-label">{{ __('Confirm password') }}</label>
                        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" placeholder="Confirm password" required>

                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
            </form>
            
        </div>

@endsection