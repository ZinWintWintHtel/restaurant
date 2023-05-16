@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-orange p-5 m-5 rounded rounded-3 shadow">
            <h1 class="text-center text-white pb-5 " style="font-family: 'Lobster', cursive;">Reset Password</h1>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white fw-bold fs-4">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0 justify-content-center">

                        <button type="submit" class="btn btn-warning bg-white text-warning fw-bold " style="width:40%;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                
                            </div>
                        </div>
                    </form>            
        </div>
    </div>
</div>




@endsection
