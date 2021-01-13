@extends('layouts.login.layout')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="">
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                    <div class="login-form p-7 position-relative overflow-hidden">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-center mb-10">
                                    <a href="#">
                                        <img src="{{ asset('assets/img/kembaraLogo1.png') }}" class="max-h-100px" alt=""  style="height:150px; width:250px"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <div class="d-flex flex-center mb-10">
                                    <div class="text-center mt-5 mb-5">
                                        <div class="symbol symbol-150 symbol-xl-150">
                                            @if($user->avatar)
                                                <div class="symbol-label" style="background-image:url('storage/ProfilePicture/{{$user->avatar}}')"></div>
                                            @endif
                                            @if(!$user->avatar)
                                                    <div class="symbol-label  w-150px h-150px"> <i style="font-size: 100px" class="flaticon2-user"></i></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8  mt-5 mb-50">
                                <div class="d-flex">
                                    <div class=" mt-5 mb-50">
                                        {{--<h6 class="font-weight-bold my-2"> Leader : <span class="text-primary"> {{json_encode($leader->id)}}</span></h6>--}}
                                        <h6 class="font-weight-bold my-2"> Leader : <span class="text-primary">{{$user->name}} </span></h6>
                                        <h6 class="font-weight-bold my-2"> Level : <span class="text-primary">{{$agent_levels->name}}</span></h6>
                                        <h6 class="font-weight-bold my-2"> Membership : <span class="text-primary">KM{{str_pad($leader->member_no, 5, '0', STR_PAD_LEFT)}}</span></h6>
                                        <h6 class="font-weight-bold my-2"> Phone : <span class="text-primary">{{$user->phone_no}} </span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-5 text-center">
                                    <h3>Sign Up</h3>
                                    <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                                </div>
                                <form class="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Agent Level<span class="text-danger"> *</span></label>
                                        <select class="form-control   @error('name') is-invalid @enderror h-auto form-control-solid py-4 px-8" name="level" required>
                                            @foreach($list_levels as $list_level)
                                                <option value="{{$list_level->id}}">{{$list_level->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Full Name<span class="text-danger"> *</span></label>
                                        <input class="form-control  @error('name') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="text" placeholder="Fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">NRIC<span class="text-danger"> *</span></label>
                                        <input id="nric" type="text" class="form-control @error('nric') is-invalid @enderror  h-auto form-control-solid py-4 px-8"
                                               name="nric" value="{{ old('nric') }}" required autocomplete="nric" autofocus placeholder="NRIC">
                                        @error('nric')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Phone No<span class="text-danger"> *</span></label>
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
                                        <label class="font-weight-bold">Email<span class="text-danger"> *</span></label>
                                        <input class="form-control  @error('email') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Facebook URL(Optional)</label>
                                        <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                               name="facebook" value="{{ old('facebook') }}" autocomplete="facebook" placeholder="Facebook URL(Optional)">

                                        @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Instagram URL(Optional)</label>
                                        <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror h-auto form-control-solid py-4 px-8"
                                               name="instagram" value="{{ old('instagram') }}" autocomplete="instagram"  placeholder="Instagram URL(Optional)">

                                        @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Shopee URL(Optional)</label>
                                        <input id="shopee" type="text" class="form-control @error('shopee') is-invalid @enderror h-auto form-control-solid py-4 px-8"
                                               name="shopee" value="{{ old('shopee') }}" autocomplete="shopee"  placeholder="Shopee URL(Optional)">

                                        @error('shopee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Lazada URL(Optional)</label>
                                        <input id="lazada" type="text" class="form-control @error('lazada') is-invalid @enderror h-auto form-control-solid py-4 px-8"
                                               name="lazada" value="{{ old('lazada') }}" autocomplete="lazada"  placeholder="Lazada URL(Optional)">

                                        @error('lazada')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Company Name(Optional)</label>
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
                                        <label class="font-weight-bold">SSM(Optional)</label>
                                        <input id="ssm" type="ssm" class="form-control @error('ssm') is-invalid @enderror   h-auto form-control-solid py-4 px-8" name="ssm"
                                               value="{{ old('ssm') }}" autocomplete="ssm"  placeholder="SSM(Optional)">

                                        @error('ssm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group  mb-5">
                                        <label class="font-weight-bold">Address</label>
                                        <input id="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                               name="address_1" value="{{ old('address_1') }}" required autocomplete="address" autofocus  placeholder="Address">

                                        @error('address_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group  mb-5">
                                        <label class="font-weight-bold">City</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                               name="city" value="{{ old('city') }}" required autocomplete="city" autofocus  placeholder="City">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group  mb-5">
                                        <label class="font-weight-bold">Postcode</label>
                                        <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror   h-auto form-control-solid py-4 px-8"
                                               name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus  placeholder="Postcode">

                                        @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Password</label>
                                        <input class="form-control  @error('password') is-invalid @enderror h-auto form-control-solid py-4 px-8" type="password" placeholder="Password"  name="password" required autocomplete="new-password" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="font-weight-bold">Confirm Password</label>
                                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
                                        <input type="hidden" name="leader" value="{{$user->id}}">
                                        <input type="hidden" name="leader_level" value="{{$agent_levels->id}}">
                                        <input type="hidden" name="territory" value="{{$leader->territory_id}}">
                                        <input type="hidden" name="state" value="{{$leader->state_id}}">

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
                                        <a href="{{route('/')}}" type="button" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</a>
                                    </div>
                                </form>

                                {{--<form class="form" method="POST" action="{{ route('register') }}">--}}
                                    {{--@csrf--}}
                                    {{--<!--<input type="hidden" name="_token" v-bind:value="$parent.csrf">-->--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Full Name<span class="text-danger"> *</span></label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Full Name" autocomplete="name" autofocus name="name"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">NRIC<span class="text-danger"> *</span></label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="NRIC" autocomplete="name" autofocus name="nric"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Phone No<span class="text-danger"> *</span></label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Phone No" autocomplete="name" autofocus name="phone_no"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Email<span class="text-danger"> *</span></label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Email" autocomplete="name" autofocus name="email"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Facebook</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Facebook URL(Optional)" autocomplete="name" autofocus name="facebook"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Instagram</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Instagram URL(Optional)" autocomplete="name" autofocus name="instagram"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5">--}}
                                        {{--<label class="font-weight-bold">Company Name</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Company Name(Optional)" autocomplete="name" autofocus name="company_name"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">SSM</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="SSM (Optional)" autocomplete="name" autofocus name="ssm"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">Address</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Address" autocomplete="name" autofocus name="address_1"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">City</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="City" autocomplete="name" autofocus name="city"/>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">Postcode</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="text" placeholder="Postcode" autocomplete="name" autofocus name="postcode"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">Password</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="password" placeholder="Password" autocomplete="name" autofocus name="password"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group  mb-5">--}}
                                        {{--<label class="font-weight-bold">Confirm Password</label>--}}
                                        {{--<input class="form-control h-auto form-control-solid" type="password" placeholder="Confirm Password" autocomplete="name" autofocus name="confirm_password"/>--}}
                                        {{--<input type="hidden" name="leader_id" value="{{$leader->id}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group mb-5 text-left">--}}
                                        {{--<div class="checkbox-inline">--}}
                                            {{--<label class="checkbox m-0">--}}
                                                {{--<input type="checkbox" name="agree" />--}}
                                                {{--<span></span>I Agree the--}}
                                                {{--<a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-text text-muted text-center"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group d-flex flex-wrap flex-center mt-10">--}}
                                        {{--<button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>--}}
                                        {{--<a href="/" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</a>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
