@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto mb-3 text-dark">New reply message for {{ $message->subject }}</h3>
            <h5 class="mr-auto mb-3 text-dark">From: {{ $message->email }}</h5>
            <h5 class="mr-auto mb-3 text-dark">To: {{ $message->message_from }}</h5>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form id="messageForm" action="{{route('message.send-reply', $message)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $message->message_from }}" placeholder="E-mail address" hidden>
                <input id="email_from" type="email" class="form-control @error('email') is-invalid @enderror" name="email_from" value="{{ $message->email }}" placeholder="E-mail address" hidden>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="subject" class="control-label">{{ __('Subject') }}</label>
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Message subject" required autofocus>

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $subject }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="message" class="control-label">{{ __('Message') }}</label>
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Message text here" rows="6" required></textarea>
        
                            @error('message')
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
                            <label for="images" class="control-label">{{ __('Upload images') }}</label>
                            <div class="dropzone" id="myDropzone"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <button id="btn-submit" type="submit" class="btn btn-primary btn-block">
                            {{ __('Send reply') }}
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
        <script>
            Dropzone.options.myDropzone= {
                url: '{{route('message.send-reply', $message)}}',
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 50,
                maxFiles: 50,
                maxFilesize: 1,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response){
                    alert("Message was sent successfully!");
                },
                init: function() {
                    dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
            
                    // for Dropzone to process the queue (instead of default form behavior):
                    document.getElementById("btn-submit").addEventListener("click", function(e) {
                        // Make sure that the form isn't actually being sent.
                        e.preventDefault();
                        if (dzClosure.getQueuedFiles().length > 0) {
                            dzClosure.processQueue();
                        } else {
                            document.getElementById("messageForm").submit();
                        }
                        // e.stopPropagation();
                        // dzClosure.processQueue();
                    });
            
                    //send all the form data along with the files:
                    this.on("sendingmultiple", function(data, xhr, formData) {
                        formData.append("subject", $("#subject").val());
                        formData.append("message", $("#message").val());
                        formData.append("email", $("#email").val());
                        formData.append("email_from", $("#email_from").val());
                    });
                }
            }
        </script>

@endsection