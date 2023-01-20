@extends('frontend.layout')
@section('content')
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
                        <h1>Change Your Email</h1>
                    </div>
                </div>
                <div class="login-sec-box forget-section email-verification">
                    <div class="email_icon d-flex align-items-center">
                        {{-- <i class="fa fa-phone-square" aria-hidden="true"></i> --}}
                        <h1>Enter New Email</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{route('store-mobile')}}" id="email-verify" method="POST">
                                @csrf
                                <div class="d-flex flex-column">
                                    {{-- <input type="number" class="mt2" id="current_contact" name="current_contact" placeholder="Enter Current Mobile Number"> --}}
                                    <input type="text" class="mt2" id="contact" name="email" placeholder="Enter New Emial">
                                </div>
                                <div class="pink-login-btn login-button small-device-width mt2">
                                    <button class="remove-a-tag" type="submit">
                                    Change
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
    {{-- <script src="{{asset('front_assets/js/dashboard.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
@endsection
