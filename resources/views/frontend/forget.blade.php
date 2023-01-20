@extends('frontend.layout')
@section('content')
@section('title', 'Forget Password')

<div class="top-nav-height"></div>

<!-- top-height end-->

<!-- dashboard start -->
<div class="login-page">
    <div class="container">
        <div class="login-sec">
            <div class="login-first-line">
                <div class="login-welcome-heading">
                    <h1>Forgot your password?</h1>
                </div>
            </div>
            <div class="login-sec-box forget-section">
                <h1>Enter your email address below and we’ll send you a link to reset your password</h1>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="" id="forgetpassword">
                            @csrf
                            <div class="d-flex flex-column">
                                <label for="">Phone Number Or Email</label>
                                <input type="text" id="email" name="email"
                                    placeholder="Please Enter Your Email">
                            </div>
                            <div class="display-flex-cstm flex-column mt1 padding-zero" id="locklabel">
                                <label for="" class="slide-btn">Slide To Get Verification Code</label>
                                <!-- <h1>Slide to Unlock</h1> -->
                                <span class="slide-effect"></span>
                                <input type="range" id="verification_code" name="verification" value="0"
                                    placeholder="Email Verification Code" class="pullee" id="remove" />

                            </div>
                            <div id="myDIV">
                                <div class="display-flex-cstm flex-column mt1">
                                    <label for="">Verification Code</label>
                                    <input type="number" id="verify_code" name="verify_code"
                                        placeholder="Enter Verification Code">
                                </div>
                            </div>
                            <div class="pink-continue-btn"><button type="submit">Continue</button></div>
                        </form>
                        <a href="{{ route('login') }}">Go Back</a>
                    </div>

                    <!-- <div class="col-lg-4">
                            <div class="login-btn">
                                <div class="pink-login-btn login-button">
                                    <a href="">
                                        <div>
                                            Login
                                        </div>
                                    </a>
                                </div>
                                <span>Or, Login With</span>
                                <div class="facebook-btn login-button">
                                    <a href="">
                                        <div>
                                            <i class="fa fa-facebook" aria-hidden="true"></i> Facebook
                                        </div>
                                    </a>
                                </div>
                                <div class="google-btn login-button">
                                    <a href="">
                                        <div>
                                            <i class="fa fa-google-plus" aria-hidden="true"></i> Google
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div> -->
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

{{-- <script>
    jQuery(document).ready(function() {
        $('#forget').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('forget') }}",
                data: $('#forget').serialize(),
                success: function(response) {
                    if (response.status == 404) {
                        toastr.error('User Does not exist');
                    }
                    if (response.status == 400) {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error(val[0]);
                        });
                    }
                    if (response.status == 419) {
                        toastr.error('You are alredy Logged In !');
                    }
                    if (response.status == 200) {
                        toastr.success('We have sent you a password reset email');
                        $('#forget')[0].reset();
                    }
                },
            });
        });
    });
</script> --}}

<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('.pullee').on('change',function(e){
            // alert('test');
            e.preventDefault();
            var form= $("#forgetpassword");
            $.ajax({
                url: 'verifiy-reset',
                type: 'POST',
                data: form.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                     $(".loader-bg").removeClass('loader-active');
                },
                success: function (response,data) {
                    $(".loader-bg").addClass('loader-active');
                    if(response.status == 404){
                        animateHandler();
                        toastr.error('User does not exist !');
                    }
                   if(response.status ==  400){
                    animateHandler();
                    $.each(response.errors, function(prefix, val){
                     toastr.error(val[0]);
                    });
                   }if(response.status == 200) {
                    toastr.success('Please check email for verification code !');
                    $('#verification_code')[0].reset();
                   }
                }
            });
        });
   });
</script>
<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#forgetpassword").on('submit',function(e){
            // alert('test');
            e.preventDefault();
            var form= $("#forgetpassword");
            $.ajax({
                url: 'otp-verify',
                type: 'GET',
                data: form.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                     $(".loader-bg").removeClass('loader-active');
                },
                success: function (response,data) {
                    $(".loader-bg").addClass('loader-active');
                   if(response.status ==  400){
                    $.each(response.errors, function(prefix, val){
                     toastr.error(val[0]);
                    });
                   }
                   if(response.status == 502){
                    toastr.error('Invalid OTP !');
                   }
                   if(response.status == 200){
                    toastr.success('Email Verified');
                    window.location.href = "{{ route('update-password')}}";
                   }
                }
            });
        });
   });
</script>
<script>
    var x = document.getElementById("myDIV");
    var e = document.getElementById("remove")
    var u = document.getElementById("locklabel")
    var inputRange = document.getElementsByClassName('pullee')[0],
        maxValue = 150, // the higher the smoother when dragging
        speed = 12, // thanks to @pixelass for this
        currValue, rafID;

    // set min/max value
    inputRange.min = 0;
    inputRange.max = maxValue;

    // listen for unlock
    function unlockStartHandler() {
        // clear raf if trying again
        window.cancelAnimationFrame(rafID);

        // set to desired value
        currValue = +this.value;
    }

    function unlockEndHandler() {

        // store current value
        currValue = +this.value;

        // determine if we have reached success or not
        if (currValue >= maxValue) {
            successHandler();
        } else {
            rafID = window.requestAnimationFrame(animateHandler);
        }
    }

    // handle range animation
    function animateHandler() {

        // update input range
        inputRange.value = currValue;

        // determine if we need to continue
        if (currValue > -1) {
            window.requestAnimationFrame(animateHandler);
        }

        // decrement value
        currValue = currValue - speed;
    }

    // handle successful unlock
    function successHandler() {
        x.style.display = "block"
        e.style.display = "none"
        u.style.display = "none"

    };

    // bind events
    inputRange.addEventListener('mousedown', unlockStartHandler, false);
    inputRange.addEventListener('mousestart', unlockStartHandler, false);
    inputRange.addEventListener('mouseup', unlockEndHandler, false);
    inputRange.addEventListener('touchend', unlockEndHandler, false);
</script>
@endsection
