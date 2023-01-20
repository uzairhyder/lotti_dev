@extends('frontend.layout')
@section('content')
    <style>
        .emailSendBox {
            position: relative;
        }

        button.emailSendButton {
            position: absolute;
            background-color: #ff2446;
            padding: 4px 6px;
            font-size: 14px;
            color: #ffffff;
            border-radius: 6px;
            right: 2%;
            bottom: 8%;
            font-family: montserratLight;
        }

        .login-sec-box input,
        .input-label-felids input {
            width: 100%;
        }

        .remove-a-tag:hover {
            color: #ffffff;
        }
    </style>
    <div class="top-nav-height"></div>

    <!-- top-height end-->

    <!-- dashboard start -->

    <!-- top-height end-->

    <!-- dashboard start -->
    <div class="login-page email-verification-page">
        <div class="container">
            <div class="login-sec">
                <div class="login-first-line">
                    <div class="login-welcome-heading">
                        <h1>Email Verification</h1>
                    </div>
                </div>
                <div class="login-sec-box forget-section email-verification">
                    <div class="email_icon d-flex align-items-center">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <h1>We will send a one time code to your Email</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" id="email-verify">
                                @csrf
                                <div class="d-flex flex-column">
                                    <input type="email" class="mt2" id="email" name="email"
                                        value="{{ $user_email->email }}" readonly>
                                    <div class="emailSendBox">
                                        <input type="text" class="mt2" id="verify_code" name="verify_code"
                                            placeholder="Email Verification Code">
                                        <button type="button" class="emailSendButton">Send</button>
                                    </div>

                                </div>
                                <div class="pink-login-btn login-button small-device-width mt2">
                                    <button class="remove-a-tag" type="submit">
                                        Verify Code
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('front_assets/js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>
        jQuery(document).ready(function() {
            $('.emailSendButton').on('click', function() {
                var email = $("#email").val();
                console.log(email);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('verify-mobile') }}",
                    data: $('#email-verify').serialize(),

                    beforeSend: function() {
                        $(".loader-bg").removeClass('loader-active');
                    },
                    success: function(response) {
                        $(".loader-bg").addClass('loader-active');
                        if (response.status == 501) {
                            toastr.error('Invalid Email !');
                        }
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                        if (response.status == 200) {
                            toastr.success('Please Check email to verify otp');
                        }
                    },


                });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            $("#email-verify").on('submit', function(e) {
                e.preventDefault();
                var form = $("#email-verify");
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('verify-mobile-otp') }}",
                    data: form.serialize(),
                    beforeSend: function() {
                        $(".loader-bg").removeClass('loader-active');
                    },
                    success: function(response) {
                        $(".loader-bg").addClass('loader-active');
                        if (response.status == 502) {
                            toastr.error('Incorrect OTP !');
                        }
                        if (response.status == 319) {
                            toastr.error('Incorrect Email or OTP !');
                        }
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                toastr.error(val[0]);
                            });
                        }
                        if (response.status == 200) {
                            window.location.href = "{{ route('change-email') }}";
                            toastr.success('Email verified Successfully');

                        }
                    },
                });
            });
        });
    </script>
@endsection
