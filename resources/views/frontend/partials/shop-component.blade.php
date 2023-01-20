
{{-- {{ dd($products) }} --}}
@if (count($products) > 0)
    @foreach ($products as $key => $value)
    

    {{-- variable product not show if there variants not created --}}
    @if ($value->product_type == 2 && count($value->product_variations) == 0)
    @continue
    @endif
    {{-- variable product not show if there variants not created --}}

    {{-- rating control --}}
    @if ($rating != null)
        {{-- @if ($rating != (int) $value->get_ratings_avg_reviews) --}}
        @if ($rating > (int) $value->get_ratings_avg_reviews)
            @continue
        @endif    
        @if ($value->get_ratings_avg_reviews == null)
            @continue
        @endif  
    @endif


        

    

    @if ($key % 2 == 0)
        <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
            <div class="productsBox">
                <a href="{{ route('product', ['slug' => $value->slug]) }}">
                    <div class="productTwo">
                        <div class="productOneImage">
                            <img src="{{ url('public/products/' . $value->image) }}" alt="Product Image">
                        </div>

                        <div class="hoverCart">
                            <div class="hoverImageCart">
                                <a href="{{ route('product', $value->slug) }}"><i class="fa fa-shopping-cart"></i></a>
                            </div>

                            {{-- @foreach($getwishlist as $val) --}}
                                {{-- return $val->product_id; --}}
                                <div class="hoverImageHeart">

                                    <a href="{{ route('addwishlist', $value->slug) }}">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>
                            {{-- @endforeach --}}

                        </div>
                    </div>
                    <a href="{{ route('product', ['slug' => $value->slug]) }}">
                        <div class="productDetails">
                            <div class="productDetail">
                                <div class="productName">
                                    <h4>{{ $value->product_name }}</h4>
                                    <p>{!! Str::limit($value->short_description, 80) !!}</p>
                                </div>
                            </div>
                            <div class="productDetail pBottom">
                                <div class="productPrice">
                                    <h5>
                                    

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
                                <div class="">
                                    @php
                                        $num = 5 - $value->get_ratings_avg_reviews;
                                    @endphp
                                    @for ($x = 1; $x <= ceil($value->get_ratings_avg_reviews); $x++)
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
        <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

            <div class="productsBox">
                <a href="{{ route('product', ['slug' => $value->slug]) }}">
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
                                    <p>{!! Str::limit($value->short_description, 80) !!}</p>
                                </div>

                            </div>
                            <div class="productDetail pBottom">
                                <div class="productPrice">
                                    <h5>
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
                                <div class="">
                                    @php
                                        $num = 5 - $value->get_ratings_avg_reviews;
                                    @endphp
                                    @for ($x = 1; $x <= ceil($value->get_ratings_avg_reviews); $x++)
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


@else

<div class="col-lg-12 col-md-12 col-sm-12 cTop " data-wow-duration="1.2s">
    <h3>
        Sorry!, No Product Found!
    </h3>
</div>

@endif