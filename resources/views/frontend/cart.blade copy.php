@extends('frontend.layout')
@section('content')
@section('title', 'Cart')

{{-- @php
  $coupon_code =  (session()->get('coupon_code'))
@endphp --}}

<style>
    .qty-container .input-qty {
    max-width: 40px;
}

h6.wOne {
    width: 35%;
}
/* h6.wTwo {
    width: 15%;
} */
h6.wTwo {
    width: 25%;
}
h6.wThree {
    width: 0%;
}
.sideCartProductHeading h6 {
    text-align: center;
    margin-left: 65px;
}


/* update work 27 */
.inputName.inputPromo {
    width: 65%;
    padding: 6px 10px;
}

.promoButton button {
    background-color: #ff2446;
    font-family: montserratRegular;
    color: #ffffff;
    padding: 6px 10px;
    text-align: center;
    border: none;
    font-size: 14px;
    width: 80px;
    border-radius: 6px;
}

.promoBox {
    display: flex;
    align-items: center;
    gap: 10px;
}
</style>
{{-- {{dd(session()->get('product_id'))}} --}}
<section class="cartDetailBox">
    @if(empty($cart_count))
            <h1 style="text-align: center">You have no items in your cart</h1>
        @else

    <div class="container cartSection">
        <form method="POST" action="{{route('checkout')}}">
            @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="sideCartHeading d-flex justify-content-between">
                    <h3>Shopping Cart</h3>
                    <h3><span>{{$cart_count}}</span> Items</h3>
                </div>
                <div class="sideCartDetailBox">
                    <div class="sideCartProductHeading d-flex justify-content-between">
                        <h6 class="wOne">Product</h6>
                        <h6 class="wTwo">Quantity</h6>
                        <h6 class="wThree">Price</h6>
                        <h6>Action</h6>
                    </div>
                    @php
                        $total = 0;
                    @endphp

                    @foreach ($products as $product )

                    @foreach ($product->attrs as $val)
                    @if ($val->attribute_id == $product->attribute)
                    
                    @else
                    @continue
                    @endif

                    <div class="sideCartBox">
                        <div class="sideCartImageDetail cartCancel">
                        {{-- <a href="{{ route('product', ['slug' => $product->get_product_variations->slug ?? '']) }}"> --}}

                            <div class="sideCartImage">
                                <img src="{{ url('public/variations/' . $val->image) }}" alt="">
                            </div>
                        {{-- </a> --}}
                            <div class="sideCartDetail">
                                <div class="sideCartName">
                                    <h6>{{$val->products->product_name ?? ''}}</h6>
                                </div>
                                <div class="sideCartPrice">
                                    <small>
                                    {{-- @if (!empty(json_decode( $val->attribute_value)))
                                        @for ($x = 0; $x < count(json_decode( $val->attribute_value)); $x++)
                                            {{ json_decode( $val->attribute_value)[$x] }},
                                        @endfor
                                    @endif --}}

                                    {{$val->attribute}}
                                    </small>
                                </div>

                            </div>
                        </div>

                        <div class="sideCartQuantityDetail">
                            <div class="qty-container">
                                <input type="hidden" id="quantity" name="quantity" value="1">
                                <button class="qty-btn-minus btn-light incrementMinus-{{ $product->product_id }}" onclick="incrementMinus({{ $product->id }},{{ $product->product_id }})" type="button" {{ $product->quantity == 1 ? 'disabled' : ''}}><i class="fa fa-minus"></i></button>
                                <input type="text" name="qty" value="{{ $product->quantity }}" class="input-qty input-qty-{{ $product->product_id }}" readonly />
                                <button class="qty-btn-plus btn-light" onclick="incrementPlus({{ $product->id }},{{ $product->attribute }})" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="sideCartPriceDetail">
                            <div class="sideCartName">
                                <h6 id="item_cost">
                                    @if ($val->discount == null)
                                    <span id="orignal_price">${{ number_format($val->regular_price,2) }}</span>
                                    @endif

                                    @if ($val->discount != null)
                                    <span id="orignal_price" class="discount_orignal_price">${{ number_format($val->regular_price,2) }}</span>
                                    <span id="discounted_price"> - ${{ number_format($val->discounted_price,2) }}</span></h4>
                                    @endif

                                    {{-- ${{ number_format($product->get_product->total_price, 2) }} --}}
                                </h6>
                            </div>
                        </div>
                        <div class="sideCartPriceDetail">
                            <div class="sideCartName">
                                <div class="sideCartRemove" onclick="delete_Item()">
                                    <!-- <h6>Remove</h6> -->
                                    <a href="{{route('removecart', $product->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $total += $product->total;
                    @endphp
                    @endforeach
                    @endforeach
                    <div id="total_amount" style="display: none">{{ $total }}</div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="cartDetail">
                    <div class="sideCartHeading">
                        <h3>Order Summery</h3>
                    </div>
                    <div class="sideCartProductHeading d-flex justify-content-between">
                        <div class="sideCartName">
                            <h5>Item {{$cart_count}}</h5>
                        </div>
                        <div class="sideCartName">
                            <h5 id="final_price">${{number_format($total,2)}}</h5>
                        </div>
                    </div>

                    <div class="sideCartName mt-4">
                        <h6>Promo Code</h6>
                        <div class="promoBox">
                        <input type="text" id="coupon_code" name="coupon_code" class="inputName inputPromo" placeholder="Enter Your Code" maxlength="20">
                        <div class="promoButton">
                            <a href="#"><button type="button" id="coupondiscount">Apply</button></a>
                        </div>
                        </div>
                    </div>
                    <div class="sideCartProductHeading d-flex justify-content-between">
                        <div class="sideCartName">
                            <h5>Total Cost</h5>
                        </div>
                        <div class="sideCartName">
                            <h5 id="final_price_pro">${{number_format($total,2)}}</h5>
                            <input id="final_price_hidden" type="hidden" name="total_price" id="total_price" value="{{$total}}">
                        </div>
                    </div>
                    <div class="cartButton">
                        <a href="{{route('shipping')}}"><button type="button" id="checkoutButton">Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endif
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('front_assets/js/main.js')}}"></script>
<script src="script.js"></script>
<script>
    $("#checkoutButton").click(function(e){
        if(session()->get('coupon_code') != ''){
         e.preventDefault();
        }
        var final_price_hidden = $("#final_price_hidden").val();
        if(session()->get('coupon_code') != ''){
            $.ajax({
                type: "GET",
                url: "{{ route('coupon_code') }}",
                data: {
                    'coupon_code' : $("#coupon_code").val(),'final_price_hidden' : final_price_hidden,
                },
                success: function (response) {
                    // if(response.status == 404){
                    //     swal({
                    //         title: "Coupon Mismatched!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }if(response.status == 405){
                    //     swal({
                    //         title: "Coupon Expired!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }
                    // if(response.status == 406){
                    //     swal({
                    //         title: "Price!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }
                    // if(response.status == 407){
                    //     swal({
                    //         title: "Coupons!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }
                    // if(response.status == 408){
                    //     swal({
                    //         title: "Invalid!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }
                    // if(response.status == 205){
                    //     swal({
                    //         title: "Coupon Limit!",
                    //         text: response.message,
                    //         type: "fail",
                    //         icon: "error",
                    //     }).then(function() {
                    //         window.location.href = "{{ route('cart') }}";
                    //     });
                    // }
                    // if(response.status == 202){
                    //     window.location.href = "{{ route('shipping') }}";
                    // }
                    // if(response.status == 200){
                    //     window.location.href = "{{ route('shipping') }}";
                    // }
                }
            });
        }
    });
</script>

<script>
    $("#coupondiscount").click(function(e){
         e.preventDefault();
        var coupon_code  =    $("#coupon_code").val();
        if(coupon_code == ''){
            toastr.error("Please Enter coupon code !");
            return false;
        }
        var final_price_hidden = $("#final_price_hidden").val();
            $.ajax({
                type: "GET",
                url: "{{ route('coupon_code') }}",
                data: {
                    'coupon_code' : coupon_code,'final_price_hidden' : final_price_hidden,
                },
                success: function (response) {
                    if(response.status == 404){
                        swal({
                            title: "Coupon Mismatched!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }if(response.status == 405){
                        swal({
                            title: "Coupon Expired!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }
                    if(response.status == 406){
                        swal({
                            title: "Price!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }
                    if(response.status == 407){
                        swal({
                            title: "Coupons!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }
                    if(response.status == 408){
                        swal({
                            title: "Invalid!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }
                    if(response.status == 205){
                        swal({
                            title: "Coupon Limit!",
                            text: response.message,
                            type: "fail",
                            icon: "error",
                        }).then(function() {
                            window.location.href = "{{ route('cart') }}";
                        });
                    }
                    if(response.status == 202){
                        window.location.href = "{{ route('cart') }}";
                        toastr.success('Coupon Applied,Please checkout');
                    }
                    if(response.status == 200){
                        window.location.href = "{{ route('cart') }}";
                        toastr.success('Coupon Applied,Please checkout');
                    }
                }
            });
    });
</script>
<script>
    // var buttonPlus = $(".qty-btn-plus");
    var buttonMinus = $(".qty-btn-minus");

    function incrementPlus(cart_id, attribute){
        // alert(product_id)
        var $n = $(".input-qty-"+attribute);
        $n.val(Number($n.val()) + 1);

        let quantity = $n.val();

        $.ajax({
            url: "{{ route('item_inc_calculation') }}",
            type: "GET",
            data: {
                'cart_id': cart_id,
                'attribute': attribute,
                'quantity': quantity,
                'total': $("#total_amount").text(),
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {
                $(".loader-bg").addClass('loader-active');
                if (response.status == 200) {

                    $("#final_price").text('$'+response.total);
                    $("#final_price_pro").text('$'+response.total);
                    $("#final_price_hidden").val(response.total);
                    toastr.success(response.message);

                } else {
                    toastr.error(response.message);
                    $(".input-qty-"+attribute).val(response.quantity);

                }


            }
        });

         var total = Number($n.val());
        //  $("#quantity").val(total);
        //  $("#total_price").val(126*total);
        //  $("#item_cost").html(126*total);
        if(quantity > 1){
            $(".incrementMinus-"+attribute).attr("disabled",false)
        }

    };

    function incrementMinus(cart_id, product_id){
        var $n = $(".input-qty-"+product_id);
        $n.val(Number($n.val()) - 1);

        let quantity = $n.val();

        $.ajax({
            url: "{{ route('item_dec_calculation') }}",
            type: "GET",
            data: {
                'cart_id': cart_id,
                'product_id': product_id,
                'quantity': quantity,
                'total': $("#total_amount").text(),
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {
                $(".loader-bg").addClass('loader-active');
                if (response.status == 200) {

                    $("#final_price").text('$'+response.total);
                    $("#final_price_pro").text('$'+response.total);
                    $("#final_price_hidden").val(response.total);

                    toastr.success(response.message);

                } else {
                    toastr.error(response.message);
                    $(".input-qty-"+product_id).val(response.quantity);

                }


            }
        });
        var total = Number($n.val());

        if(quantity == 1){
            $(".incrementMinus-"+product_id).attr("disabled",true)
        }
        // $("#quantity").val(amount);
        // $("#final_price").html(126*amount);
        // $("#final_price_pro").html(126*amount);
        // $("#item_cost").html(126*amount);
    };

</script>
@endsection
