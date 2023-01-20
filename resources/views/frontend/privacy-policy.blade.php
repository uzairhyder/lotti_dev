@extends('frontend.layout')
@section('content')
@section('title', 'Privacy Policy')

<div class="top-nav-height"></div>

    <!-- top-height end-->

    <!-- dashboard start -->
    <div class="privacy-policy-page">
        <div class="container">
            <div class="privacy-policy-content mt2">
                <h1>
                    {{$privacy->title ?? ''}}
                </h1>
                <p>  {!!$privacy->description ?? ''!!}

                </p>
            </div>
        </div>
    </div>


@endsection
