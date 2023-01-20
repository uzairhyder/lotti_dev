@extends('frontend.layout')
@section('content')
@section('title', 'Wishlist')
<style>
    .ddCartIconwhite i {
    color: red;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    overflow: hidden;
    position: absolute;
    top: 21.5%;
    right: 3%;
    border-radius: 50%;
    background-color: #fff;
    border: 2px solid #d31414;
}

.ddCartIconred i {
    color: #ff2446;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    overflow: hidden;
    position: absolute;
    top: 21.5%;
    right: 3%;
    border-radius: 50%;
    background-color: #ffff;
    border: 2px solid #d31414;
}
</style>
<!-- Start Wishlist -->

<section class="wishlists">
    <div class="container">
        <div class="wishlistHeading">
            <h2>Wishlist</h2>
        </div>
        <div class="row">
            @if(empty(count($getwishlist)))
                <div class="container">
                    <div class="productNotFound">
                    {{-- <i class="fa fa-frown-o" aria-hidden="true"></i> --}}
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <h3>Item(s) Not Found</h3>
                    <h6>Your wishlist is empty, go and add it.</h6>
                    </div>
                </div>
            @else
            @foreach ($getwishlist as  $key => $products)
            @if($key % 2 == 0 )
            <div class="col-lg-2 col-md-3 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{route('product', ['slug' =>  $products->slug]) }}">
                        <div class="productTwo">
                            <div class="productOneImage wishlistProductOneImage">
                                <img src="{{ url('public/products/' . $products->get_product_name->image ?? '') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('product', $products->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="ddCartIconwhite">

                                    <a href="{{ route('removewishlist', $products->id) }}">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <a href="{{route('product', ['slug' =>  $products->slug]) }}">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4>{{$products->get_product_name->product_name ?? ''}}</h4>
                                        <p>{!! Str::limit($products->get_product_name->short_description, 80) !!}</p>
                                    </div>

                                </div>
                                <div class="productDetail pBottom">
                                    <div class="productPrice">
                                        <h5>
                                            {{-- 1 for simple product and else part for variable product --}}
                                            @if ($products->product_type == 1)
                                            @if ($products->discount_status == null)
                                                <span id="orignal_price">${{ number_format($value->price,2) }}</span>
                                            @endif
    
                                            @if ($products->discount_status != null)
                                            
                                                <span id="orignal_price" class="discount_orignal_price">${{ number_format($products->price,2) }}</span>
                                                <span id="discounted_price">${{ number_format($products->discounted_price,2) }}</span></h4>
                                            @endif
                                        @else


                                            {{-- variable product -> show price by range --}}
                                            @if (!empty($products->product_variations))
                                                @php
                                                    $first_price = 0;
                                                    $last_price = 0;
                                                    $all_prices = array();
                                                @endphp
                                                @foreach ($products->product_variations as $key => $variation)
                                                
                                                    {{-- take first and last price and set it first & last variable --}}
                                                    @if ($variation->product_id == $products->product_id )
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
                                    <div class="productRating wishlistProductRating">
                                        @php
                                            $num = 5 - $products->get_ratings_avg_reviews ?? '';
                                        @endphp
                                        @for ($x = 1; $x <=  ceil($products->get_ratings_avg_reviews); $x++)
                                        {{-- <i class="fa fa-star blackstar"></i> --}}
                                        <i class="fa fa-star goldenstar "></i>
                                        @endfor

                                        @for ($x = 1; $x <= $num; $x++)
                                            <i class="fa fa-star blackstar"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </a>
                </div>
            </div>
            @else
            <div class="col-lg-2 col-md-3 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{route('product', ['slug' =>  $products->slug]) }}">
                        <div class="productThree">
                            <div class="productOneImage wishlistProductOneImage">
                                <img src="{{ url('public/products/' . $products->get_product_name->image ?? '') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('product', $products->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="ddCartIconwhite">

                                    <a href="{{ route('removewishlist', $products->id) }}">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('product', ['slug' =>  $products->slug]) }}">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4>{{$products->get_product_name->product_name ?? ''}}</h4>
                                        <p>{!! Str::limit($products->get_product_name->short_description, 80) !!}</p>
                                    </div>

                                </div>
                                <div class="productDetail pBottom">
                                    <div class="productPrice">
                                        <h5>${{number_format($products->get_product_name->total_price) ?? ''}}</h5>
                                    </div>
                                    <div class="productRating wishlistProductRating">
                                        @php
                                            $num = 5 - $products->get_ratings_avg_reviews ?? '';
                                        @endphp
                                        @for ($x = 1; $x <=  ceil($products->get_ratings_avg_reviews); $x++)
                                        {{-- <i class="fa fa-star blackstar"></i> --}}
                                        <i class="fa fa-star goldenstar "></i>
                                        @endfor

                                        @for ($x = 1; $x <= $num; $x++)
                                            <i class="fa fa-star blackstar"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            {{-- <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productTwo">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFour.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
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
            <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productThree">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFive.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
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
            <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productThree">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFive.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
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
            <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">

                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productTwo">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFour.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
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
            <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productThree">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFive.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4>Product 07</h4>
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
            <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="{{ route('shop') }}">
                        <div class="productTwo">
                            <div class="productOneImage">
                                <img src="{{ asset('front_assets/images/productFour.webp') }}" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="hoverImageHeart">
                                    <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4>Product 08</h4>
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
            </div> --}}
        </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('front_assets/js/main.js') }}"></script>
<script src="script.js"></script>
@endsection
