@extends('layouts.app')

@section('content')

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 p-0 mt-3 mb-2">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-0">
                        @if (\Session::has('success'))
                            <div class="alert alert-success alert-dismissible my-4">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <div class="application_modifier">
                            <p>
                                Thank you for submitting an application however we are not don't yet.
                                We are going to need you to upload the following documents.
                            </p>
                            <ol>
                                <li>
                                    Government photo I.D.
                                </li>
                                <li>
                                    Proof of Income (ex: most recent paystubs).
                                </li>
                                <li>
                                    We will be ordering a credit check via a third party.
                                </li>
                            </ol>

                            <form action="{{route('applications.upload-images', $application)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="images" class="control-label dropzone-label">{{ __('Upload attachments') }}</label>
                                            <div class="dropzone" id="myDropzone"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button id="btn-submit" type="submit" class="btn btn-primary btn-block">
                                            {{ __('Upload') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="d-flex  justify-content-center">
                                <a class="action-button m-2" href="{{ route('applications.show', $application)}}">View application</a>
                                <a class="action-button m-2" href="{{ url('/') }}">Go back!</a>
                            </div>
                        </div>
                        <!-- /.application_modifier -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.footer')

<script>
    Dropzone.options.myDropzone= {
        url: '{{route('applications.upload-images', $application)}}',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 50,
        maxFiles: 50,
        maxFilesize: 3000,
        acceptedFiles: 'image/*,application/pdf',
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, response){
            alert(response);
        },
        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
    
            // for Dropzone to process the queue (instead of default form behavior):
            document.getElementById("btn-submit").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dzClosure.processQueue();
            });
    
            //send all the form data along with the files:
            // this.on("sendingmultiple", function(data, xhr, formData) {
            //     // formData.append("subject", $("#subject").val());
            //     // formData.append("message", $("#message").val());
            //     // formData.append("email", $("#email").val());
            //     // formData.append("email_from", $("#email_from").val());
            // });
        }
    }
</script>

@endsection