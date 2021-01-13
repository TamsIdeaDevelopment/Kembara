@extends('layouts.login.layout')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="https://www.lovlin.com/wp-content/uploads/2020/09/logo_lovlin_web_3.png" class="max-h-75px" alt="" />
                        </a>
                    </div>
                    <div class="">
                        <div class="mb-20">
                            <h3>Sign Up</h3>
                            <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                        </div>
                        <form class="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-5">
                                <input class="form-control  @error('name') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="text" placeholder="Fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input id="nric" type="text" class="form-control @error('nric') is-invalid @enderror  h-auto form-control-solid py-4 px-8"
                                       name="nric" value="{{ old('nric') }}" required autocomplete="nric" autofocus placeholder="NRIC">
                                @error('nric')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input id="phone_no" type="phone_no"
                                       class="form-control @error('phone_no') is-invalid @enderror   h-auto form-control-solid py-4 px-8" name="phone_no"
                                       value="{{ old('phone_no') }}" required autocomplete="phone" placeholder="Phone No">

                                @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control  @error('email') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                       name="facebook" value="{{ old('facebook') }}" autocomplete="facebook" placeholder="Facebook URL(Optional)">

                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror h-auto form-control-solid py-4 px-8"
                                       name="instagram" value="{{ old('instagram') }}" autocomplete="instagram"  placeholder="Instagram URL(Optional)">

                                @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input id="company_name" type="company_name"
                                       class="form-control @error('company_name') is-invalid @enderror  h-auto form-control-solid py-4 px-8" name="company_name"
                                       value="{{ old('company_name') }}" autocomplete="company_name" placeholder="Company Name(Optional)">

                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group  mb-5">
                                <input id="ssm" type="ssm" class="form-control @error('ssm') is-invalid @enderror   h-auto form-control-solid py-4 px-8" name="ssm"
                                       value="{{ old('ssm') }}" autocomplete="ssm"  placeholder="SSM(Optional)">

                                @error('ssm')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group  mb-5">
                                <input id="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                       name="address_1" value="{{ old('address_1') }}" required autocomplete="address" autofocus  placeholder="Address">

                                @error('address_1')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group  mb-5">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                       name="city" value="{{ old('city') }}" required autocomplete="city" autofocus  placeholder="City">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group  mb-5">
                                <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                       name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus  placeholder="Postcode">

                                @error('postcode')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control  @error('password') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="password" placeholder="Password"  name="password" required autocomplete="new-password" />
                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
                            </div>
                            <div class="form-group mb-5 text-left">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0">
                                        <input type="checkbox" name="agree" />
                                        <span></span>I Agree the
                                        <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
                                </div>
                                <div class="form-text text-muted text-center"></div>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
                                <button href="{{route('/')}}" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('register') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                                {{--@error('name')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
