@extends('layouts.login.layout')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <div class="d-flex flex-center mb-n10">
                        <a href="#">
                            <img src="{{ asset('assets/img/kembara-logo-depan.png') }}" class="max-h-250px" alt=""  style="height:250px; width:300px"/>
                        </a>
                    </div>
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Reset Password</h3>
                            <div class="text-muted font-weight-bold">Enter your email to reset your account:</div>
                        </div>
                        <form class="form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-5">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                 <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
