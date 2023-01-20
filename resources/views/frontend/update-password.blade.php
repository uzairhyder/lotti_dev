@extends('frontend.layout')
@section('content')
@section('title', 'Update Password')

<div class="top-nav-height"></div>

    <!-- top-height end-->

    <!-- dashboard start -->
    <div class="login-page">
        <div class="container">
            <div class="login-sec">
                <div class="login-first-line">
                    <div class="login-welcome-heading">
                        <h1>Update Password</h1>
                    </div>
                </div>
                <div class="login-sec-box forget-section">
                <h1>Enter your email address below and new password</h1>
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="" id="update">
                                @csrf
                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                                <div class="d-flex flex-column">
                                    <label for="">Phone Number Or Email</label>
                                    <input type="text" id="email"  name="email" placeholder="Please Enter Your Email">
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">New Password</label>
                                    <input type="password" id="password"  name="password" placeholder="Please Enter Your New Password">
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="">Phone Number Or Email</label>
                                    <input type="password" id="confirm_password"  name="confirm_password" placeholder="Please Confirm Password">
                                </div>
                            <div class="pink-continue-btn"><button type="submit">Continue</button></div>
                            </form>
                            {{-- <a href="{{route('login')}}">Go Back</a> --}}
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

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
    jQuery(document).ready(function() {
        $('#update').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('update-password-process') }}",
                data:$('#update').serialize(),
                success: function(response) {
                    if(response.status == 404){
                        toastr.error('Invalid Token !');
                    }
                    if (response.status == 400) {
                        $.each(response.errors, function(prefix, val) {
                            toastr.error(val[0]);
                        });
                    } if(response.status == 200) {
                        setTimeout(() => {
                        window.location.href = "{{ route('login')}}";
                        toastr.success('Password Updated Successfully');
                        }, 1000);
                        $('#update')[0].reset();
                    }
                },


            });
        });
    });
</script>
