@extends('frontend.layout')
@section('content')
    <style>
        .rating-box {
            display: inline-block;
        }

        .rating-container {
            display: flex;
            direction: rtl !important;
            gap: 12px;
        }

        .label {
            display: inline-block;
            color: #d4d4d4;
            cursor: pointer;
            font-size: 32px;
            transition: color 0.2s;
            margin: 0px !important;
        }

        .input {
            display: none;
        }

        .label:hover,
        .label:hover~.label,
        .input:checked~.label {
            color: #ffb200;
        }
    </style>
    <header class="shopImage" style="background-image: url('{{ url('public/banner/' . $shop->banner_image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                    <div class="contactHeaderHeading">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End Shop Header -->

    <!-- Start Products -->
    {{-- update work --}}
    <section class="products">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="NavSideBar">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filterOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#filterOneTab" aria-expanded="true" aria-controls="filterOneTab">
                                        Product Categories
                                    </button>
                                </h2>

                                <div id="filterOneTab" class="accordion-collapse collapse show" aria-labelledby="filterOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="side_menu" id="subCategories">
                                            @include('frontend.partials.sub-categories-component')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="filterTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#filterTwoTap" aria-expanded="false"
                                        aria-controls="filterTwoTap">
                                        Product Status
                                    </button>
                                </h2>
                                <div id="filterTwoTap" class="accordion-collapse collapse " aria-labelledby="filterTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body ">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            <a href="#">In Stock</a>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            <a href="#">On Sale</a>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#units_tab" aria-expanded="false" aria-controls="units_tab">
                                        Colors
                                    </button>
                                </h2>
                                <div id="units_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    
                                    <div class="accordion-body ">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            Red
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            Yellow
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            Green
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label">
                                                            Blue
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#customers_tab" aria-expanded="false"
                                        aria-controls="customers_tab">
                                        Sizes
                                    </button>
                                </h2>
                                <div id="customers_tab" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <div class="form-check d-flex justify-content-between radioButton">
                                                        <label class="form-check-label">
                                                            <a href="#">S</a>
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex justify-content-between radioButton">
                                                        <label class="form-check-label">
                                                            <a href="#">M</a>
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex justify-content-between radioButton">
                                                        <label class="form-check-label">
                                                            <a href="#">L</a>
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex justify-content-between radioButton">
                                                        <label class="form-check-label">
                                                            <a href="#">XL</a>
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check d-flex justify-content-between radioButton">
                                                        <label class="form-check-label">
                                                            <a href="#">XS</a>
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#reports_tab" aria-expanded="false" aria-controls="reports_tab">
                                        Filter By Price
                                    </button>
                                </h2>
                                <div id="reports_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <fieldset class="filter-price">
                                                        <div class="price-field">
                                                            <input type="range" min="100" max="700"
                                                                value="100" id="lower">
                                                            <input type="range" min="100" max="700"
                                                                value="700" id="upper">
                                                        </div>
                                                        <div class="price-wrap">
                                                            <a href="#"><span class="price-title">Filter</span></a>
                                                            <div class="price-container">
                                                                <div class="price-wrap-1">
                                                                    Price :
                                                                    <label for="one">$</label>
                                                                    <input id="one">
                                                                </div>
                                                                <div class="price-wrap_line">-</div>
                                                                <div class="price-wrap-2">
                                                                    <label for="two">$</label>
                                                                    <input id="two">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#email_txt_tab" aria-expanded="false"
                                        aria-controls="email_txt_tab">
                                        Average Rating
                                    </button>
                                </h2>
                                <div id="email_txt_tab" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <div class="averageRating">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating" value="1"
                                                                    id="star-1" class="input"> <label for="star-1"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating" value="2"
                                                                    id="star-2" class="input"> <label for="star-2"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating" value="3"
                                                                    id="star-3" class="input"> <label for="star-3"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating" value="4"
                                                                    id="star-4" class="input"> <label for="star-4"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating" value="5"
                                                                    id="star-5" class="input"> <label for="star-5"
                                                                    class="label">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span>(5)</span>
                                                        </div>
                                                    </div>
                                                    <div class="averageRating">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating1" value="1"
                                                                    id="star-11" class="input"> <label for="star-11"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating1" value="2"
                                                                    id="star-21" class="input"> <label for="star-21"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating1" value="3"
                                                                    id="star-31" class="input"> <label for="star-31"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating1" value="4"
                                                                    id="star-41" class="input"> <label for="star-41"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating1" value="5"
                                                                    id="star-51" class="input"> <label for="star-51"
                                                                    class="label">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span>(4)</span>
                                                        </div>
                                                    </div>
                                                    <div class="averageRating">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating2" value="12"
                                                                    id="star-12" class="input"> <label for="star-12"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating2" value="2"
                                                                    id="star-22" class="input"> <label for="star-22"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating2" value="3"
                                                                    id="star-32" class="input"> <label for="star-32"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating2" value="4"
                                                                    id="star-42" class="input"> <label for="star-42"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating2" value="5"
                                                                    id="star-52" class="input"> <label for="star-52"
                                                                    class="label">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span>(3)</span>
                                                        </div>
                                                    </div>
                                                    <div class="averageRating">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating3" value="1"
                                                                    id="star-13" class="input"> <label for="star-13"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating3" value="2"
                                                                    id="star-23" class="input"> <label for="star-23"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating3" value="3"
                                                                    id="star-33" class="input"> <label for="star-33"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating3" value="4"
                                                                    id="star-43" class="input"> <label for="star-43"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating3" value="5"
                                                                    id="star-53" class="input"> <label for="star-53"
                                                                    class="label">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span>(2)</span>
                                                        </div>
                                                    </div>
                                                    <div class="averageRating">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating4" value="1"
                                                                    id="star-14" class="input"> <label for="star-14"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating4" value="2"
                                                                    id="star-24" class="input"> <label for="star-24"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating4" value="3"
                                                                    id="star-34" class="input"> <label for="star-34"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating4" value="4"
                                                                    id="star-44" class="input"> <label for="star-44"
                                                                    class="label">&#9733;</label>
                                                                <input type="radio" name="rating4" value="5"
                                                                    id="star-54" class="input"> <label for="star-54"
                                                                    class="label">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span>(1)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#website_tab" aria-expanded="false" aria-controls="website_tab">
                                        Product Tags
                                    </button>
                                </h2>
                                <div id="website_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="side_menu">
                                            <ul>
                                                <li>
                                                    <div class="filterTags">
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="filterTags">
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="filterTags">
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="filterTags">
                                                        <a href="#"><span class="filterTag">Filter</span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    @if ($products_category_count == 0)
                    <h2 style="text-align: center">Product(s) not found</h2>

                    @endif
                    <div class="row">
                        @foreach ($products_category as $key => $value)
                            @if ($key % 2 == 0)
                                <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">

                                    <div class="productsBox">
                                        <a href="{{ route('product', ['slug' => $value->slug]) }}">
                                            <div class="productWhite">
                                                <div class="productOneImage">
                                                    <img src="{{ url('public/products/' . $value->image) }}"
                                                        alt="No Image Found">
                                                </div>
                                                <div class="hoverCart">
                                                    <div class="hoverImageCart">
                                                        {{-- update work --}}
                                                        <a href="{{ route('product', $value->slug) }}"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                        {{-- update work --}}
                                                    </div>


                                                    <div class="hoverImageHeart">


                                                        <a href="{{ route('addwishlist', $value->slug) }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                            <a href="{{ route('product', ['slug' => $value->slug]) }}">
                                                <div class="productDetails">
                                                    <div class="productDetail">
                                                        <div class="productName">
                                                            <h4>{{ $value->product_name }}</h4>
                                                            <p>{!! Str::limit($value->description, 80) !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="productDetail pBottom">
                                                        <div class="productPrice">
                                                            <h5>${{ number_format($value->total_price, 2) }}</h5>
                                                        </div>
                                                        {{-- update work --}}
                                                        <div class="">

                                                            {{-- <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i> --}}

                                                            @php
                                                                $num = 5 - $value->get_ratings_avg_reviews;
                                                            @endphp
                                                            @for ($x = 1; $x <= $value->get_ratings_avg_reviews; $x++)
                                                                <i class="fa fa-star goldenstar "></i>
                                                            @endfor

                                                            @for ($x = 1; $x <= $num; $x++)
                                                                <i class="fa fa-star blackstar"></i>
                                                            @endfor
                                                            {{-- update work --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">

                                    <div class="productsBox">
                                        <a href="{{ route('product', ['slug' => $value->slug]) }}">
                                            <div class="productThree">
                                                <div class="productOneImage">
                                                    <img src="{{ url('public/products/' . $value->image) }}"
                                                        alt="Product Image">
                                                </div>
                                                <div class="hoverCart">
                                                    <div class="hoverImageCart">
                                                        {{-- update work --}}
                                                        <a href="{{ route('product', $value->slug) }}"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                        {{-- update work --}}
                                                    </div>

                                                    <div class="hoverImageHeart">
                                                        <a href="{{ route('addwishlist', $value->slug) }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <a href="{{ route('product', ['slug' => $value->slug]) }}">
                                                <div class="productDetails">
                                                    <div class="productDetail">
                                                        <div class="productName">
                                                            <h4>{{ $value->product_name }}</h4>
                                                            <p>{!! Str::limit($value->description, 80) !!}</p>
                                                        </div>

                                                    </div>
                                                    <div class="productDetail pBottom">
                                                        <div class="productPrice">
                                                            <h5>${{ number_format($value->total_price, 2) }}</h5>
                                                        </div>
                                                        <div class="">
                                                            {{-- update work --}}
                                                            @php
                                                                $num = 5 - $value->get_ratings_avg_reviews;
                                                            @endphp
                                                            @for ($x = 1; $x <= $value->get_ratings_avg_reviews; $x++)
                                                                <i class="fa fa-star goldenstar "></i>
                                                            @endfor

                                                            @for ($x = 1; $x <= $num; $x++)
                                                                <i class="fa fa-star blackstar"></i>
                                                            @endfor
                                                            {{-- update work --}}
                                                            {{-- <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productTwo">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/CategoryImageEight.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productThree">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/CategoryImageTwo.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productTwo">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/productCardImageTwo.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productThree">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/CategoryImageThree.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productTwo">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/CategoryImageEight.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productThree">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/productCardImageFour.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
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
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productTwo">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/productCardImageFive.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4>Product 09</h4>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productThree">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/productCardImageFive.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4>Product 10</h4>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productTwo">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/productCardImageThree.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4>Product 11</h4>
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
                    <div class="col-lg-4 col-md-6 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

                        <div class="productsBox">
                            <a href="{{route('product')}}">
                                <div class="productThree">
                                    <div class="productOneImage">
                                        <img src="{{asset('front_assets/images/CategoryImageThree.webp')}}" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('product')}}">
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4>Product 12</h4>
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
                </div>
            </div>
        </div>
    </section>
    {{-- update work --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    <script src="script.js"></script>

    <script>
        $(".product_sub_categories").on("change", function() {
            console.log($(this).attr('data-id'))

            // $("#sub-category-"+$(this).attr('data-id')).click();
// alert("here");
            // window.location.href = '{{ env('APP_URL') }}/categories/'.$(this).attr('data-slug');
            // alert("here");
            // localStorage.setItem('sub_category_slug', $(this).val());
            // $.ajax({
            //     type: 'GET',
            //     url: '{{ env('APP_URL') }}/categories/'+$(this).val(),
            //     data: {
            //         'sub_category_slug': localStorage.getItem("sub_category_slug") ? localStorage.getItem("sub_category_slug") : '',
            //     },
            //     beforeSend: function() {
            //         $(".loader-bg").removeClass('loader-active');
            //     },
            //     success: function (response) {
            //         $(".loader-bg").addClass('loader-active');

            //         // $("#subCategories").html("");
            //         // $("#subCategories").html(response);
                    

            //     }

            // });

        });

    </script>
@endsection
