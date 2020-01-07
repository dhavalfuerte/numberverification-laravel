@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please Verify Code') }}</div>

                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-danger">
                    {{Session::get('message')}}</div>
                    @endif
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf

                  
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="current-code">

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}{{session()->get( 'phone' )}}
                                </button>

                            </div>
                        </div>
                        

                        

                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('reverify',$phone)}}">Resend Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
