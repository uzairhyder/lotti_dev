@extends('frontend.layout')
@section('content')
<style>

</style>
@section('title', 'Home')
 <!-- End Sidebar -->

    <!-- Start Header -->
    
    <Header class="headerImage">
        <div class="slider">
            <div class="slide_viewer">
                <div class="slide_group">
                    @foreach (json_decode($banners->banner_image) as $key => $image)
                    <div class="slide" style="background-image: url('{{ url('public/banner/' . $image) }}')">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">
                                    <div class="headerHeading">
                                        <h2>{{$banners->title1}}<br> <span>{{$banners->title2}}</span><br>
                                            <p>{{$banners->title3}}</p>
                                        </h2>
                                        <a href="{{ route('shop') }}"><button class="shopButton">Shop Now</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="slide_buttons">
                    </div>

                    {{-- <div class="slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">
                                    <div class="headerHeading">
                                        <h2>A Store For<br> <span>Electronic</span><br>
                                            <p>Products</p>
                                        </h2>
                                        <a href="{{ route('shop') }}"><button class="shopButton">Shop Now</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">
                                    <div class="headerHeading">
                                        <h2>A Store For<br> <span>Electronic</span><br>
                                            <p>Products</p>
                                        </h2>
                                        <a href="{{ route('shop') }}"><button class="shopButton">Shop Now</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">
                                    <div class="headerHeading">
                                        <h2>A Store For<br> <span>Electronic</span><br>
                                            <p>Products</p>
                                        </h2>
                                        <a href="{{ route('shop') }}"><button class="shopButton">Shop Now</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </Header>

    <!-- End Header -->

    <!-- Start Product Item -->
    
    <section class="product">
        <div class="container">
            <div class="row wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                @foreach ($home_categories as $value )
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="shop?category={{$value->slug }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>{{$value->sub_category_name}}</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                @if(empty($value->image))
                                        <img src="{{ asset('assets/No-image.jpg')}}"   alt="" height="100px" width="100px"> <br><br><br>
                                    @else
                                        <img src="{{ url('public/sub-category/' . $value->image) }}"   alt="Product image">
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Camera</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageTwo.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Headphone</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageThree.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Gaming Consoles</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageFour.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Laptop</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageFive.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Airbirds</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageSix.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Speaker</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageSeven.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Smart LED</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageEight.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- End Product Item -->

    <!-- Start Product Card -->

    <section class="productCard">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 wow animate__animated animate__bounceIn"
                    data-wow-duration="1.2s">
                    <a href="{{ route('shop') }}">
                        <div class="productCardLong">
                            <div class="productCardHeading"
                                style="display: flex; flex-direction: column; align-items: flex-start; width: 85%;">
                                <h4>{{$iphone_sect->title1 ?? ''}}<br>{{$iphone_sect->title2 ?? ''}}</h4>
                                <h5><span>{{$iphone_sect->title3 ?? ''}}%</span> {{$iphone_sect->title4 ?? ''}}</h5>
                            </div>
                            <div class="productCardImageLong">
                                <img src="{{ url('public/content/' . $iphone_sect->image) }}"   alt="Product  Card Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 mTop">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="{{ route('shop') }}">
                                <div class="productCardTwo">
                                    <div class="productCardHeading">
                                        <h4>{{$power_bank->title1 ?? ''}}</h4>
                                        <h5><span>{{$power_bank->title2 ?? ''}} %</span> {{$power_bank->title3 ?? ''}}</h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="{{ url('public/content/' . $power_bank->image) }}"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="{{ route('shop') }}">
                                <div class="productCardOne">
                                    <div class="productCardHeading">
                                        <h4>{{$android_sect->title1 ?? ''}}</h4>
                                        <h5><span>{{$android_sect->title2 ?? ''}} %</span> {{$android_sect->title3 ?? ''}}</h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="{{ url('public/content/' . $android_sect->image) }}"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="{{ route('shop') }}">
                                <div class="productCardOne mt-4">
                                    <div class="productCardHeading">
                                        <h4>{{$watch->title1 ?? ''}}</h4>
                                        <h5><span>{{$watch->title2 ?? ''}}%</span>{{$watch->title3 ?? ''}}</h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="{{ url('public/content/' . $watch->image) }}"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="{{ route('shop') }}">
                                <div class="productCardTwo mt-4">
                                    <div class="productCardHeading">
                                        <h4>{{$pc->title1 ?? ''}}</h4>
                                        <h5><span>{{$pc->title2 ?? ''}}%</span> {{$pc->title3 ?? ''}}</h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="{{ url('public/content/' . $pc->image) }}"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Product Card -->

    <!-- Start Offer -->

    <section class="offer">
        <div class="offerImage pt-4">
            <a href="{{ route('shop') }}"><img src="{{ url('public/offers/' . $sale->image1) }}" alt="Offer Image"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <a href="{{ route('shop') }}">
                        <div class="offerImageBox">
                            <div class="offerImageOne  wow animate__animated animate__bounceIn">
                                <img src="{{asset('front_assets/images/saleImageOne.webp')}}" alt="Offer Image">
                                <div class="offerImageText">
                                    <h4>{{$sale->title1}}</h4>
                                    <h2>{{$sale->title2}}</h2>
                                    <h2><span>{{$sale->title3}}</span></h2>
                                </div>
                                <div class="offerImageUpto">
                                    <h2>{{$sale->title4}}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('shop') }}">
                        <div class="offerImageTwo">
                            <img src="{{ url('public/offers/' . $sale->image2) }}" alt="Offer Image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- End Offer -->

    <!-- Start Shop -->

    <section class="shop">
        <div class="container">
            <div class="shopHeading">
                <h2>Our Shop</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-12 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                    <div class="productsLongBox">
                        <div class="productOne">
                            <div class="productOneImageLong">
                                <img src="{{asset('front_assets/images/productOne.webp')}}" alt="Product Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">

                    <div class="row mTop">
                        @foreach ($products as $key => $value )
                        
                        {{-- variable product not show if there variants not created --}}
                        @if ($value->product_type == 2 && count($value->product_variations) == 0)
                        @continue
                        @endif
                        {{-- variable product not show if there variants not created --}}

                        @if($key % 2 == 0 )
                        <div class="col-lg-3 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                            <div class="productsBox">
                                <a href="{{route('product', ['slug' => $value->slug]) }}">
                                    <div class="productTwo">
                                        <div class="productOneImage">
                                            <img src="{{ url('public/products/' . $value->image) }}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('product', $value->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>


                                            <div class="hoverImageHeart">

                                                <a href="{{ route('addwishlist', $value->slug) }}">
                                                    <i class="fa fa-heart"
                                                    aria-hidden="true"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="{{route('product', ['slug' => $value->slug]) }}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>{{$value->product_name}}</h4>
                                                    <p>{!! Str::limit($value->short_description, 80) !!}</p>
                                                </div>

                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>
                                                        {{-- 1 for simple product and else part for variable product --}}
                                                        @if ($value->product_type == 1)
                                                            @if ($value->discount_status == null)
                                                                <span id="orignal_price">${{ number_format($value->price,2) }}</span>
                                                            @endif
                    
                                                            @if ($value->discount_status != null)
                                                            
                                                                <span id="orignal_price" class="discount_orignal_price">${{ number_format($value->price,2) }}</span>
                                                                <span id="discounted_price">${{ number_format($value->discounted_price,2) }}</span></h4>
                                                            @endif
                                                        @else


                                                            {{-- variable product -> show price by range --}}
                                                            @if (!empty($value->product_variations))
                                                                @php
                                                                    $first_price = 0;
                                                                    $last_price = 0;
                                                                    $all_prices = array();
                                                                @endphp
                                                                @foreach ($value->product_variations as $key => $variation)
                                                                    {{-- take first and last price and set it first & last variable --}}
                                                                    @if ($variation->product_id == $value->id )
                                                                        @php
                                                                            array_push($all_prices, $variation->regular_price ?? 0);
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @php
                                                                    sort($all_prices);
                                                                    
                                                                    if(count($all_prices) > 0){
                                                                        $first_price = $all_prices[0];
                                                                    }
                                                                    
                                                                    if (count($all_prices) > 1) {
                                                                        $last_price = $all_prices[count($all_prices) - 1];
                                                                    }
                                                                @endphp
                                                            @endif
                                                            <span class="product_range">${{ number_format($first_price,2) }} - ${{ number_format($last_price,2) }}</span>


                                                        @endif
                                                    </h5>
                                                </div>
                                                <div class="ratingStars">
                                                    {{-- <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> --}}

                                                    {{-- @foreach ( $value->get_ratings as $rat ) --}}
                                                    {{-- foreach ($ratings as $aRating) {
                                                        $ratingValues[] = $aRating->rating;
                                                    } --}}


                                                    @php
                                                        $num = 5 - $value->get_ratings_avg_reviews;
                                                    @endphp
                                                    @for ($x = 1; $x <=  ceil($value->get_ratings_avg_reviews); $x++)
                                                            <i class="fa fa-star goldenstar "></i>
                                                    @endfor

                                                    @for ($x = 1; $x <= $num; $x++)
                                                        <i class="fa fa-star blackstar"></i>
                                                    @endfor
                                                    {{-- @endforeach --}}
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-3 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="productsBox">
                                <a href="{{route('product', ['slug' => $value->slug]) }}">
                                    <div class="productThree">
                                        <div class="productOneImage">
                                            <img src="{{ url('public/products/' . $value->image) }}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('product', $value->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>


                                            <div class="hoverImageHeart">
                                                <a href="{{ route('addwishlist', $value->slug) }}">
                                                    <i class="fa fa-heart"
                                                    aria-hidden="true"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="{{route('product', ['slug' => $value->slug]) }}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>{{$value->product_name}}</h4>
                                                    <p>{!! Str::limit($value->short_description, 80) !!}</p>
                                                </div>

                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>
                                                        
                                                        {{-- 1 for simple product and else part for variable product --}}
                                                        @if ($value->product_type == 1)
                                                            @if ($value->discount_status == null)
                                                                <span id="orignal_price">${{ number_format($value->price,2) }}</span>
                                                            @endif
                    
                                                            @if ($value->discount_status != null)
                                                                
                                                                <span id="orignal_price" class="discount_orignal_price">${{ number_format($value->price,2) }}</span>
                                                                <span id="discounted_price">${{ number_format($value->discounted_price,2) }}</span></h4>
                                                            @endif
                                                        @else


                                                                {{-- variable product -> show price by range --}}
                                                                @if (!empty($value->product_variations))
                                                                @php
                                                                    $first_price = 0;
                                                                    $last_price = 0;
                                                                    $all_prices = array();
                                                                @endphp
                                                                @foreach ($value->product_variations as $key => $variation)
                                                                    {{-- take first and last price and set it first & last variable --}}
                                                                    @if ($variation->product_id == $value->id )
                                                                        @php
                                                                            array_push($all_prices, $variation->regular_price ?? 0);
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @php
                                                                    sort($all_prices);
                                                                    
                                                                    if(count($all_prices) > 0){
                                                                        $first_price = $all_prices[0];
                                                                    }
                                                                    
                                                                    if (count($all_prices) > 1) {
                                                                        $last_price = $all_prices[count($all_prices) - 1];
                                                                    }
                                                                @endphp
                                                            @endif
                                                            <span class="product_range">${{ number_format($first_price,2) }} - ${{ number_format($last_price,2) }}</span>


                                                        @endif
                                                    
                                                    </h5>
                                                </div>

                                                <div class="ratingStars">
                                                    {{-- <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> --}}
                                                    {{-- @foreach ( $value->get_ratings as $rat ) --}}
                                                    {{-- {{dd($rat)}} --}}

                                                    @php
                                                    // dd($rat);
                                                        // dd($value->get_ratings->reviews);
                                                        $num = 5 -  $value->get_ratings_avg_reviews;
                                                    @endphp
                                                    @for ($x = 1; $x <=  ceil($value->get_ratings_avg_reviews); $x++)
                                                            <i class="fa fa-star goldenstar "></i>
                                                    @endfor

                                                    @for ($x = 1; $x <= $num; $x++)
                                                        <i class="fa fa-star blackstar"></i>
                                                    @endfor
                                                    {{-- @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>

                        {{-- <div class="col-lg-4 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="productsBox">
                                <a href="{{route('product')}}">
                                    <div class="productTwo">
                                        <div class="productOneImage">
                                            <img src="{{asset('front_assets/images/productFour.webp')}}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                            <div class="hoverImageHeart">
                                                <a href="{{ route('wishlist') }}"><i class="fa fa-heart"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('product')}}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>Product 03</h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                </div>

                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>$450.00</h5>
                                                </div>
                                                <div class="productRating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="productsBox">
                                <a href="{{route('product')}}">
                                    <div class="productThree">
                                        <div class="productOneImage">
                                            <img src="{{asset('front_assets/images/productFive.webp')}}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                            <div class="hoverImageHeart">
                                                <a href="{{ route('wishlist') }}"><i class="fa fa-heart"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('product')}}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>Product 04</h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                </div>

                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>$450.00</h5>
                                                </div>
                                                <div class="productRating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="productsBox">
                                <a href="{{route('product')}}">
                                    <div class="productTwo">
                                        <div class="productOneImage">
                                            <img src="{{asset('front_assets/images/productSix.webp')}}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                            <div class="hoverImageHeart">
                                                <a href="{{ route('wishlist') }}"><i class="fa fa-heart"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('product')}}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>Product 05</h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                </div>

                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>$450.00</h5>
                                                </div>
                                                <div class="productRating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                            <div class="productsBox">
                                <a href="{{route('product')}}">
                                    <div class="productThree">
                                        <div class="productOneImage">
                                            <img src="{{asset('front_assets/images/productSeven.webp')}}" alt="Product Image">
                                        </div>

                                        <div class="hoverCart">
                                            <div class="hoverImageCart">
                                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                            <div class="hoverImageHeart">
                                                <a href="{{ route('wishlist') }}"><i class="fa fa-heart"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('product')}}">
                                        <div class="productDetails">
                                            <div class="productDetail">
                                                <div class="productName">
                                                    <h4>Product 06</h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                            <div class="productDetail pBottom">
                                                <div class="productPrice">
                                                    <h5>$450.00</h5>
                                                </div>
                                                <div class="productRating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    @endif

                    @endforeach
                </div>

            </div>
            @if(count($products) > 0)
            <div class="shopNowButton wow animate__animated animate__bounceIn mt-4" data-wow-duration="1.2s">
                <a href="{{ route('shop') }}"><button class="shopButton">Shop Now</button></a>
            </div>
            @endif
        </div>
    </section>

    <!-- End Shop -->

    <!-- Start Product Item -->

    <section class="product">
        <div class="container">
            <div class="row wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                @foreach ($categories as $value )
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{route('categories',$value->slug )}}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>{{$value->sub_category_name}}</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                @if(empty($value->image))
                                        <img src="{{ asset('assets/No-image.jpg')}}"   alt="" height="100px" width="100px"> <br><br><br>
                                    @else
                                        <img src="{{ url('public/sub-category/' . $value->image) }}"   alt="Product image">
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Camera</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageTwo.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Headphone</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageThree.webp')}}"
                                    alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Gaming Consoles</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageFour.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Laptop</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageFive.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Airbirds</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageSix.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Speaker</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageSeven.webp')}}"
                                    alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Smart LED</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageEight.webp')}}"
                                    alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Smart Watch</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageOne.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Camera</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageTwo.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Headphone</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageThree.webp')}}"
                                    alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ route('shop') }}">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4>Gaming Consoles</h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <img src="{{asset('front_assets/images/productItemImageFour.webp')}}" alt="Product Item Image">
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- End Product Item -->

    <!-- Start Buy -->

    <section class="buy">
        <div class="offerImage">
            <a href="{{ route('shop') }}"><img src="{{ url('public/offers/' . $buy_one->image1) }}" alt="Offer Image"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('shop') }}">
                        <div class="buyImageBox">
                            <div class="buyImageOne wow animate__animated animate__bounceIn">
                                <img src="{{asset('front_assets/images/buyImageOne.webp')}}" alt="Buy Image">
                                <div class="buyImageText">
                                    <h2>{{$buy_one->title1}}</h2>
                                    <h2><span>{{$buy_one->title2}}</span></h2>
                                </div>
                                <div class="buyImageFree">
                                    <h2>{{$buy_one->title3}}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('shop') }}">
                        <div class="buyImageTwo">
                            <img src="{{ url('public/offers/' . $buy_one->image2) }}" alt="Offer Image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- End Buy -->


    <!-- Start Footer -->



    <!-- End Footer -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    <script src="script.js"></script>


    @stack('scripts')
@endsection
