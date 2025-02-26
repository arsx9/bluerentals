@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto text-dark">User Profile</h3>
            <div class="card bg-light">
                <div class="header">
                    <div class="clearfix">
                        <div class="float-left">
                            <h3>{{$user->name}}</h3>
                            <small><kbd class="bg-primary text-white">{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</kbd></small>
                        </div>
                        @can('manage-users')
                        <a href="{{route('admin.users.edit', $user)}}" class="btn btn-outline-danger float-right edit-icon">
                            <i class="fas fa-pen"></i>
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="body">
                    <div class="row">
                        <strong>E-mail:</strong> @if($user->email != null){{$user->email}} @else <kbd class="bg-secondary">N/A </kbd> @endif
                    </div>
                </div>
            </div> 
        </div>
@endsection