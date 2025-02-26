@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="d-flex">
                <h3 class="mr-auto text-dark">Users</h3>
                <a class="btn btn-outline-primary text-primary" role="button" href="{{route('admin.users.create')}}"><i class="fas fa-user-plus"></i></a>
            </div>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
                        
                
                @if(count($users)>0)
                    <div class="table-responsive">
                    <table class="table table-borderless table-striped table-hover dataTable" id="users-table">
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
                        @foreach ($users as $user)
                            <tr class="hover_info">
                                <th scope="row">
                                    {{$user->id}}
                                </th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email, 'N/A'}}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary open-user-link" href="{{ route('admin.users.edit', $user)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class="mx-1" action="{{ route('admin.users.destroy', $user)}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {!! $users->render() !!}
                        </tbody>
                      </table>
                    </div>
                @else
                <div class="alert alert-primary">
                    No user records found
                </div>
                @endif
        </div>
        <script>
        //  $(function() {
        //    $('#users-table').DataTable( {
        //     "autoWidth": false
        //     } );

        //     $('#users-table').on('click', 'tr', function(){
        //         var href = $(this).find(".open-user-link").attr("href");
        //         if(href) {
        //             window.location = href;
        //         }
        //     });
        //  });
        </script>
    

@endsection