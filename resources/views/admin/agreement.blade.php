@extends('layouts.app')

@section('content')
        <div class="container">
            <h3 class="mr-auto text-dark">Application / Deposit Agreement</h3>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            
            <form method="POST" action="{{route('agreement.store')}}">
                @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="10" cols="80">{{$agreement && $agreement->content ? $agreement->content : ''}}</textarea>

                        @error('content')
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

@section('scripts')

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection