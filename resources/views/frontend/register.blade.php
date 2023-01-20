@extends('frontend.layout')
@section('content')
@section('title', 'Register')

<div class="top-nav-height"></div>
<div class="login-page mac-responsive">
    <div class="container">
        <div class="login-sec">
            <div class="login-first-line">
                <div class="login-welcome-heading">
                    <h1>Create your Account</h1>
                </div>
                <div class="login-register-heading">
                    <h4>Already member? <a href="{{route('login')}}">Login</a> here.</h4>
                </div>
            </div>
            <div class="login-sec-box">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="" id="verify">
                            @csrf
                            <div class="d-flex flex-column">
                                <label for="">Email Address</label>
                                <input type="text" placeholder="Please Enter Your Email Address" id="email" name="email">
                            </div>
                            <!-- <div class="pink-continue-btn"><button>Continue</button></div> -->
                            <div class="display-flex-cstm flex-column mt1 padding-zero" id="locklabel">
                                <label for="" class="slide-btn">Slide To Get Verification Code</label>
                                <!-- <h1>Slide to Unlock</h1> -->
                                <span class="slide-effect"></span>
                                <input type="range" id="verification_code" name="verification" value="0" placeholder="Email Verification Code" class="pullee" id="remove" />

                            </div>
                            <div id="myDIV">
                                <div class="display-flex-cstm flex-column mt1">
                                    <label for="">Verification Code</label>
                                    <input type="number" id="verify_code" name="verify_code" placeholder="Enter Verification Code">
                                </div>
                            </div>


                            <div class="password-container d-flex flex-column mt1">
                                <label for="">Password*</label>
                                <input type="password" name="password" placeholder="Minimum 8 characters with a number and a letter"
                                    id="password">
                                <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                            </div>
                            <div class="row mt1">
                                <div class="col-lg-9">
                                    <label for=""class="for-margin-on-small-device margin-top-zero">Birthday</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="custom-select selector-width">
                                            <select name="month" id="Month">
                                                <option value="none" selected>Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <span class="custom-arrow"></span>
                                        </div>
                                        <div class="custom-select selector-width">
                                            <select name="day" id="Day">
                                                <option value="none">Day</option>
                                                <option value="01" selected>01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                 <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <span class="custom-arrow"></span>
                                        </div>
                                        <div class="custom-select selector-width">
                                            <select name="year" id="Year">
                                                <option value="none" selected>Year</option>
                                                <option value="2030">2030</option>
                                                <option value="2029">2029</option>
                                                <option value="2028">2028</option>
                                                <option value="2027">2027</option>
                                                <option value="2026">2026</option>
                                                <option value="2025">2025</option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                            </select>
                                            <span class="custom-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for=""class="for-margin-on-small-device">Gender</label>
                                    <div class="custom-select">
                                        <select name="gender" id="gender">
                                            <option value="none" selected>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">other</option>
                                        </select>
                                        <span class="custom-arrow"></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-4">
                            <div class="d-flex flex-column">
                                <label for=""class="for-margin-on-small-device">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Enter Your first Name">
                            </div>
                            <div class="d-flex flex-column">
                                <label for=""class="for-margin-on-small-device">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Enter Your  last Name">
                            </div>
                            <div class="d-flex">
                                <div class="form-group">
                                    <input type="checkbox" id="offers" name="offers" value="1">
                                    <label for="offers">I'd like to receive exclusive offers and promotions via
                                        SMS</label>
                                </div>
                            </div>
                            <div class="login-btn">
                                <button class="remove-a-tag" type="submit">
                                <div class="pink-login-btn login-button remobe-bottom-margin">
                                    {{-- <a href="#"> --}}
                                            Sign Up
                                    {{-- </a> --}}
                                </div>
                            </button>
                        </form>
                            <div class="terms-link-p">
                                <p>By clicking “SIGN UP”, I agree to Lotti's <a href="{{route('terms-conditions')}}">Terms
                                        of Use</a>
                                    and <a href="{{route('privacy-policy')}}">Privacy Policy</a></p>
                            </div>
                            <span>Or, sign up with</span>
                            <!-- <div class="pink-login-btn login-button remobe-bottom-margin">
                                <a href="../lotti-dashboard/dashboard.php">
                                    <div>
                                        Sign Up With Email
                                    </div>
                                </a>
                            </div> -->
                            <div class="d-flex justify-content-between for-btn-width">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('front_assets/js/dashboard.js')}}"></script>
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
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('.pullee').on('change',function(e){
            // alert('test');
            // if(form == null){
            //    alert('do something');
            // }
            e.preventDefault();
            var form= $("#verify");

            $.ajax({
                url: 'verifiy-email',
                type: 'POST',
                data: form.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                     $(".loader-bg").removeClass('loader-active');
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function (response,data) {
                    $(".loader-bg").addClass('loader-active');
                   if(response.status ==  400){
                    animateHandler()
                    $.each(response.errors, function(prefix, val){
                     toastr.error(val[0]);
                    });
                   }else {
                    toastr.success('Please check email for verification code');
                    // $('#verification_code')[0].reset();
                   }
                }
            });
        });
   });
</script>

<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#verify").on('submit',function(e){
            // alert('test');
            e.preventDefault();
            var form= $("#verify");
            $.ajax({
                url: 'user-save',
                type: 'POST',
                data: form.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                     $(".loader-bg").removeClass('loader-active');
                },
                /* remind that 'data' is the response of the AjaxController */
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
                       toastr.success('User Registered Successfully');
                       setTimeout(() => {
                        window.location.href = "{{ route('login')}}";
                       }, 2000);
                    $('#verify')[0].reset();
                   }
                }
            });
        });
   });
</script>
