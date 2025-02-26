@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="d-flex mb-2">
                <h3 class="mr-auto text-dark">Applications</h3>
            </div>

            @if(isset($message))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
                        
                
            @if(count($applications)>0)
                <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover dataTable" id="application-table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Apartment</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($applications as $application)
                        <tr class="hover_info">
                            <th scope="row">
                                {{$application->id}}
                            </th>
                            <td>{{$application->full_name}}</td>
                            <td>{{$application->apartment}}</td>
                            <td>{{$application->phone, 'N/A'}}</td>
                            <td>
                                {{-- <a class="btn btn-primary" href="{{ route('applications.edit', $application)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> --}}
                                <a class="btn btn-secondary" href="{{ route('applications.show', $application)}}">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a class="btn btn-info text-light" href="{{ route('applications.message', $application)}}">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <button onclick="deleteApplication({{$application['id']}})" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                {!! $applications->render() !!}
            @else
            <div class="alert alert-primary">
                No application records found
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
        function deleteApplication(id){
                if(confirm('Are you sure you want to delete?')){
                    window.location = '/applications/'+id+'/delete';
                }
            }
        </script>
    

@endsection