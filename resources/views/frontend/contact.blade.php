@extends('frontend.layout')
@section('content')
@section('title', 'Contact')

<div id="loader"></div>
<header class="contactImage" style="background-image: url('{{ url('public/banner/' . $contact->banner_image) }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <div class="contactHeaderHeading">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Category Header -->

<!-- Start Jobs -->

<section class="jobs">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 offset-lg-1 wow animate__animated animate__fadeInLeft" data-wow-duration="1.2s">
                <div class="contactUsDetail">
                    <div class="connectHeading">
                        <h4>Contact Info</h4>
                        <p>{!!$config->short_description!!}</p>
                    </div>
                    <div class="contactDetail mt3">
                        <div class="contactLink d-flex">
                            <div class="phoneIcon">
                               <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="locationText">
                                <a href="tel:{{$config->contact ?? ''}}">
                                    <p>{{$config->contact ?? ''}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="contactDetail">
                        <div class="contactLink d-flex">
                            <div class="envelopeIcon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="locationText">
                                <a href="mailto:{{$config->email ?? ''}}">
                                    <p>{{$config->email ?? ''}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="contactDetail">
                        <div class="contactLink">
                            <div class="locationIcon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="locationText">
                                <a href="{{$config->map_link ?? ''}}" target="_blank">
                                    <p>{{$config->address ?? ''}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="socialLinks">
                        <a href="{{$social->facebook ?? ''}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{$social->instagram ?? ''}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="{{$social->twitter ?? ''}}" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow animate__animated animate__fadeInRight" data-wow-duration="1.2s">
                <div class="contactUsBox mt">
                    <div class="contactUsHeading">
                        <h2>Get In Touch</h2>
                    </div>
                    <div class="contactUsForm">
                        <form id="contactform" method="POST">
                            @csrf
                            <label>Your Name</label>
                            <input type="text" class="inputName" placeholder="Name" name="name" id="name" value="{{old('name')}}">
                            <label>Email</label>
                            <input type="email" class="inputEmail" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                            <label>Contact No</label>
                            <input type="tel" class="inputEmail" placeholder="Contact No" name="contact" id="contact" value="{{old('contact')}}">
                            <label>Message</label>
                            <textarea type="text" class="inputMessage" placeholder="Message" name="message" id="message">{{old('message')}}</textarea>
                            <div class="send">
                                <a href="#"><button class="shopButton" type="submit">Submit</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('front_assets/js/main.js')}}"></script>
<script src="script.js"></script>
@endsection
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#contactform").on('submit',function(e){
            e.preventDefault();
            var form= $("#contactform");
            $.ajax({
                url: 'inquiry',
                type: 'POST',
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
                   }else {
                    toastr.success('Your Inquiry has been sent successfully');
                    $('#contactform')[0].reset();
                   }
                }

            });

        });
   });
</script>
