@extends('layouts.app')
@section('css')
    <style>
        .chat-history {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
            height: 400px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 15px;
        }

        .message-header {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .timestamp {
            font-size: 0.9em;
            color: #999;
        }

        .message-body {
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
        <div class="container">
            <h3 class="mr-auto mb-3 text-dark">New message for {{ $application->apartment }}</h3>
            <h5 class="mr-auto mb-3 text-dark">To: {{ $application->full_name }}, {{ $application->email }}</h5>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form id="messageForm" action="{{route('applications.send-message', $application)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $application->email }}" placeholder="E-mail address" hidden>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="subject" class="control-label">{{ __('Subject') }}</label>
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Message subject" required autofocus>

                            @error('subject')
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
                            {{ __('Send message') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="row mt-4">
                <h5>Messages</h5>
                <div class="chat-history col-sm-12">
                    @foreach($application->messages as $message)
                        <div class="message">
                            <div class="message-header d-flex justify-content-between">
                                <strong>{{$message->message_from}}</strong> 
                                <span class="timestamp">{{$message->created_at}}</span>
                            </div>
                            <div class="message-body">
                                <span style="font-weight : 600">Subject : </span>{{$message->subject}}<br>
                                <span style="font-weight : 600">Message : </span>{{$message->message}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            Dropzone.options.myDropzone= {
                url: '{{route('applications.send-message', $application)}}',
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
                    dzClosure = this;
            
                    document.getElementById("btn-submit").addEventListener("click", function(e) {
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
                    });
                }
            }
        </script>

@endsection