@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="d-flex mb-2">
                <h3 class="mr-auto text-dark">Properties</h3>
                <a class="btn btn-outline-primary text-primary" role="button" href="{{route('admin.properties.create')}}"><i class="fas fa-plus"></i></a>
            </div>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
                        
                
            @if(count($properties)>0)
                <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover dataTable" id="users-table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Address</th>
                        <th scope="col">Type</th>
                        <th scope="col">Available from</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($properties as $property)
                        <tr class="hover_info">
                            <th scope="row">
                                {{$property->id}}
                            </th>
                            <td>{{$property->address}}</td>
                            <td>{{$property->type, 'N/A'}}</td>
                            <td>{{$property->available_from, 'N/A'}}</td>
                            <td class="d-flex">
                                <a class="btn btn-primary mx-1" href="{{ route('admin.properties.edit', $property)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-secondary mx-1" href="{{ route('admin.properties.show', $property)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                                <form class="mx-1" action="{{ route('admin.properties.destroy', $property)}}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                {!! $properties->render() !!}
            @else
            <div class="alert alert-primary">
                No property records found
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