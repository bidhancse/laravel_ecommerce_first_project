@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="border: none;">
                <div class="card-header" style="background: #ff8a00;">
                    <center>
                        <span>
                            <strong style="font-size: 30px; font-family: MS;">{{ __('Admin') }}</strong>
                            <strong style="font-size: 30px; color: white; font-family: Lucida Sans ;">{{ __('Login') }}</strong>
                        </span>
                        
                    </center>
                </div>

                <div class="card-body" style="background: #000000;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-center" style="color: white;">{{ __('E-Mail') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control form-control-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="box-shadow: none; width: 99%; border-radius: 0px;">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-center" style="color: white;">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control form-control-md @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="box-shadow: none; border-radius: 0px;">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: white;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success " style="width:50%; border-radius: 0px;">
                                    {{ __('Sign In') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
