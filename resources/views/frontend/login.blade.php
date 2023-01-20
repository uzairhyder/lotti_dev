@extends('frontend.layout')
@section('content')
@section('title', 'Login')

<div class="top-nav-height"></div>
<div class="login-page mac-responsive">
    <div class="container">
        <div class="login-sec">
            <div class="login-first-line">
                <div class="login-welcome-heading">
                    <h1>Welcome To Electronics Shop! Please Login.</h1>
                </div>
                <div class="login-register-heading">
                    <h4>New member? <a href="{{route('register')}}">Register</a> here.</h4>
                </div>
            </div>
            <div class="login-sec-box">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('user-login')}}" method="POST" id="login_form">
                            @csrf
                            <div class="d-flex flex-column">
                                <label for="">Phone Number Or Email*</label>
                                <input type="text" id="email" name="email" placeholder="Please Enter Your Email">
                            </div>
                            <div class="password-container d-flex flex-column mt1">
                                <label for="">Password*</label>
                                <input type="password" name="password" placeholder="Please Enter Your Password"
                                    id="password">
                                <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                            </div>
                            <div class="forget-line">
                                <div class="login-register-heading">
                                  <a href="{{route('forget-password')}}">Forgot Password?</a>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="login-btn">
                            <button class="remove-tag" type="submit">
                            <div class="pink-login-btn login-button" >
                                {{-- <a href="#"  onclick="document.getElementById('login_form').submit(); return false;"> --}}
                                        {{-- <div> --}}
                                            Login
                                        {{-- </div> --}}
                                {{-- </a> --}}
                            </div>
                        </button>
                        </form>
                            <span>Or, Login With</span>
                            <div class="ipad-screen-btn">
                                <div class="facebook-btn login-button">
                                    <a href="{{route('login.facebook')}}">
                                        <div>
                                            <i class="fa fa-facebook" aria-hidden="true"></i> Facebook
                                        </div>
                                    </a>
                                </div>
                                <div class="google-btn login-button">
                                    <a href="{{route('login.google')}}">
                                        <div>
                                            <i class="fa fa-google-plus" aria-hidden="true"></i> Google
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $( ".remove-tag" ).on('click',function() {
            $(".loader-bg").removeClass('loader-active');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('front_assets/js/dashboard.js')}}"></script>

@endsection
