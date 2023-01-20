@extends('frontend.layout')
@section('content')
@section('title', 'Terms and Conditions')

<div class="top-nav-height"></div>

    <!-- top-height end-->

    <!-- dashboard start -->
    <div class="privacy-policy-page">
        <div class="container">
            <div class="privacy-policy-content mt2">
                <h1>
                    {{$terms->title ?? ''}}
                </h1>
                <p class="mt0">
                    {!!$terms->description ?? '' !!}
                </p>
            </div>
        </div>
    </div>



@endsection
