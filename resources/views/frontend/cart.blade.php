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

        <div class="container">
            <div class="productNotFound">
                {{-- <i class="fa fa-frown-o" aria-hidden="true"></i> --}}
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                <h3>Item(s) Not Found</h3>
                <h6>Your shopping cart is empty, go and add it.</h6>
            </div>
        </div>
    @else

        <div class="container cartSection">
            <form method="POST" action="{{route('checkout')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cartShopping">
                            <div class="sideCartHeading d-flex justify-content-between">
                                {{-- <h3>Shopping Cart</h3>
                                <h3><span>{{$cart_count}}</span> Items</h3> --}}
                                <div class="form-check">
                                    <input class="form-check-input" id="select-all" name="cart_id_checkbox[]" type="checkbox" {{ $totalCheckboxesAuthUserTotalCalculation == $checkedAuthUserTotalCalculation ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        <a href="javascript:void(0)">Select All <span>({{ $checkedAuthUserTotalCalculation }} Items)</span></a>
                                    </label>
                                </div>
                                <div class="allRemove">
                                    <button type="button" id="deteleCheckedItems"><span><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></button>
                                </div>

                            </div>
                            <div class="sideCartDetailBox">
                                {{-- <div class="sideCartProductHeading d-flex justify-content-between">
                                    <h6 class="wOne">Product</h6>
                                    <h6 class="wTwo">Quantity</h6>
                                    <h6 class="wThree">Price</h6>
                                    <h6>Action</h6>
                                </div> --}}
                                @php
                                    $total = 0;
                                @endphp

                                @foreach ($products as $product )

                                    @if ($product->product->product_type == 1)
                                        {{-- simple product --}}

                                        <div class="sideCartBox">
                                            <div class="sideCartImageDetail cartCancel">
                                                {{-- <a href="{{ route('product', ['slug' => $product->get_product_variations->slug ?? '']) }}"> --}}
                                                <div class="form-check">
                                                    <input class="form-check-input cart_id_checkbox" type="checkbox" name="cart_id_checkbox[]" value="{{ $product->id }}" {{ $product->id == $product->cart_id_checkbox ? 'checked' : '' }}  onclick="single_checkbox({{ $product->id }})">
                                                </div>

                                                <div class="sideCartImage">
                                                    <img src="{{ url('public/products/' . $product->product->image) }}" alt="">
                                                </div>
                                                {{-- </a> --}}
                                                <div class="sideCartDetail">
                                                    <div class="sideCartName">
                                                        <h6>{{$product->product->product_name ?? ''}}</h6>
                                                    </div>
                                                    <div class="sideCartPrice">
                                                        <small>
                                                            {{-- @if (!empty(json_decode( $product->product->attribute_value)))
                                                                @for ($x = 0; $x < count(json_decode( $product->product->attribute_value)); $x++)
                                                                    {{ json_decode( $product->product->attribute_value)[$x] }},
                                                                @endfor
                                                            @endif --}}

                                                            {{-- {{$product->product->attribute}} --}}
                                                        </small>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="sideCartPriceDetail">
                                                <div class="sideCartName">
                                                    <h6 id="item_cost">
                                                        @if ($product->product->discount_status == null || $product->product->discount_status == 0)
                                                            <span id="orignal_price">${{ number_format($product->product->price,2) }}</span>
                                                        @endif

                                                        @if ($product->product->discount_status == 1)
                                                            <span id="orignal_price" class="discount_orignal_price">${{ number_format($product->product->price,2) }}</span>
                                                            <span id="discounted_price">${{ number_format($product->product->sale_price,2) }}</span></h4>
                                                        @endif

                                                        {{-- ${{ number_format($product->get_product->total_price, 2) }} --}}
                                                    </h6>
                                                    <div class="removeAndWishlist">
                                                        {{-- <span><i class="fa fa-heart-o" aria-hidden="true"></i></span> --}}

                                                        <a href="{{route('removecart', $product->id)}}">
                                                            <span><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sideCartQuantityDetail">
                                                <div class="qty-container">
                                                    <input type="hidden" id="quantity" name="quantity" value="1">
                                                    <button class="qty-btn-minus btn-light incrementMinus-{{ $product->id }}" onclick="incrementMinus({{ $product->id }},{{ $product->product_id }},null)" type="button" {{ $product->quantity == 1 ? 'disabled' : ''}}><i class="fa fa-minus"></i></button>
                                                    <input type="text" name="qty" value="{{ $product->quantity }}" class="input-qty input-qty-{{ $product->id }}" readonly />
                                                    <button class="qty-btn-plus btn-light" onclick="incrementPlus({{ $product->id }},{{ $product->product_id }},null)" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            {{-- <div class="sideCartPriceDetail">
                                                <div class="sideCartName">
                                                    <div class="sideCartRemove" onclick="delete_Item()">
                                                        <!-- <h6>Remove</h6> -->
                                                        <a href="{{route('removecart', $product->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    @else
                                        {{-- product variations --}}

                                        <div class="sideCartBox">
                                            <div class="sideCartImageDetail cartCancel">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="cart_id_checkbox[]" value="{{ $product->id }}" {{ $product->id == $product->cart_id_checkbox ? 'checked' : '' }}  onclick="single_checkbox({{ $product->id }})">
                                                </div>
                                                {{-- <a href="{{ route('product', ['slug' => $product->get_product_variations->slug ?? '']) }}"> --}}

                                                <div class="sideCartImage">
                                                    <img src="{{ url('public/variations/' . $product->variations->image) }}" alt="">
                                                </div>
                                                {{-- </a> --}}
                                                <div class="sideCartDetail">
                                                    <div class="sideCartName">
                                                        <h6>{{$product->variations->products->product_name ?? ''}}</h6>
                                                    </div>
                                                    <div class="sideCartPrice">

                                                        <small>
                                                            {{-- @if (!empty(json_decode( $product->variations->attribute_value)))
                                                                @for ($x = 0; $x < count(json_decode( $product->variations->attribute_value)); $x++)
                                                                    {{ json_decode( $product->variations->attribute_value)[$x] }},
                                                                @endfor
                                                            @endif --}}

                                                            {{$product->variations->attribute}}
                                                        </small>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="sideCartPriceDetail">
                                                <div class="sideCartName">
                                                    <h6 id="item_cost">
                                                        @if ($product->variations->discount_status == null || $product->variations->discount_status == 0)
                                                            <span id="orignal_price">${{ number_format($product->variations->regular_price,2) }}</span>
                                                        @endif

                                                        @if ($product->variations->discount_status == 1)
                                                            <span id="orignal_price" class="discount_orignal_price">${{ number_format($product->variations->regular_price,2) }}</span>
                                                            <span id="discounted_price">${{ number_format($product->variations->sale_price,2) }}</span></h4>
                                                        @endif

                                                        {{-- ${{ number_format($product->get_product->total_price, 2) }} --}}
                                                    </h6>

                                                    <div class="removeAndWishlist">
                                                        {{-- <span><i class="fa fa-heart-o" aria-hidden="true"></i></span> --}}

                                                        <a href="{{route('removecart', $product->id)}}">
                                                            <span><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sideCartQuantityDetail">
                                                <div class="qty-container">
                                                    <input type="hidden" id="quantity" name="quantity" value="1">
                                                    <button class="qty-btn-minus btn-light incrementMinus-{{ $product->id }}" onclick="incrementMinus({{ $product->id }},{{ $product->product_id }},{{ $product->product_variantion_id }})" type="button" {{ $product->quantity == 1 ? 'disabled' : ''}}><i class="fa fa-minus"></i></button>
                                                    <input type="text" name="qty" value="{{ $product->quantity }}" class="input-qty input-qty-{{ $product->id }}" readonly />
                                                    <button class="qty-btn-plus btn-light" onclick="incrementPlus({{ $product->id }},{{ $product->product_id }},{{ $product->product_variantion_id }})" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            {{-- <div class="sideCartPriceDetail">
                                                <div class="sideCartName">
                                                    <div class="sideCartRemove" onclick="delete_Item()">
                                                        <!-- <h6>Remove</h6> -->
                                                        <a href="{{route('removecart', $product->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                    @endif



                                    @php
                                        $total += $product->total;
                                    @endphp

                                @endforeach
                                <div id="total_amount" style="display: none">{{ $total }}</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cartShopping">
                            <div class="cartDetail">
                                <div class="sideCartHeading">
                                    <h3>Order Summery</h3>
                                </div>
                                <div class="couponBox" id="">
                                    <div class="promoCodeTitle">
                                        <a href="#" id="promo_hide_field">You have a promo code?</a>
                                    </div>
                                    <div class="promoCodeInput">
                                        <input type="text" class="inputPromo" id="coupon_code" placeholder="Promo Code">
                                        <div class="cartButton">
                                            <button type="button" id="coupondiscount">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="couponDetails" style="display: none">
                                    <span ><strong>Promo Code:</strong><span id="promo_delete" >N/A </span></span><span><i class="fa fa-trash-o" aria-hidden="true" id="delete_promo"></i></span></span>
                                    <p>You are getting the best price we have got.</p>
                                </div>
                                @if ($checkedAuthUserTotalCalculation > 0)
                                    <div class="sideCartProductHeading d-flex justify-content-between">
                                        <div class="sideCartName">
                                            <h5>Total Cost</h5>
                                        </div>
                                        <div class="sideCartName">
                                            <h5 id="final_price_pro">${{number_format($amount,2)}}</h5>
                                            <input id="final_price_hidden" type="hidden" name="total_price" id="total_price" value="{{$total}}">
                                            <input id="checkout_final_price_hidden" type="hidden" name="total_price"
                                                   value={{ $amount }}>
                                        </div>
                                    </div>
                                    <div class="cartButton">
                                        <a href="{{route('shipping')}}"><button type="button" id="checkoutButton">Checkout</button></a>
                                    </div>
                                @else
                                    <div class="cartButton">
                                        <button type="button" id="checkoutButtonValidation">Checkout</button>
                                    </div>
                                @endif
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
    $("#checkoutButtonValidation").on("click", function(){
        toastr.error("Please check at least one product !")
    });



    $("#deteleCheckedItems").on("click",function(){
        let array = [];
        $('input[type=checkbox]').each(function () {
            if (this.checked) {
                if($(this).val() != 'on'){
                    array.push($(this).val());
                }
            }
        });

        console.log(array);
        if(array.length > 0){
            $.ajax({
                type: "GET",
                url: "{{ route('cart_items_remove') }}",
                data: {
                    'ids': array
                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {

                    // $(".loader-bg").addClass('loader-active');
                    setTimeout(() => {
                        location.reload();
                    }, 500);

                    $("#final_price").text('$'+response.total);
                    $("#final_price_pro").text('$'+response.total);
                    $("#final_price_hidden").val(response.total);


                }
            });
        }else{
            toastr.info('Please check the product, Which you want to delete!')
        }

    });


    // ----------------------- single checkbox calculation -----------------------------
    function single_checkbox(cart_id){
        // cart_id == cart_id_checkbox
        $.ajax({
            type: "GET",
            url: "{{ route('single_cart_checkbox') }}",
            data: {
                'cart_id': cart_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {

                // $(".loader-bg").addClass('loader-active');
                setTimeout(() => {
                    location.reload();
                }, 500);

                $("#final_price").text('$'+response.total);
                $("#final_price_pro").text('$'+response.total);
                $("#final_price_hidden").val(response.total);


            }
        });
    }
    // ----------------------- End. single checkbox calculation -----------------------------

    // ----------------------- bulk checkboxex calculation -----------------------------
    var selectAllItems = "#select-all";
    var checkboxItem = ":checkbox";

    $(selectAllItems).click(function() {

        if (this.checked) {
            $(checkboxItem).each(function(index,val) {
                this.checked = true;
            });
        } else {
            $(checkboxItem).each(function(index,val) {
                this.checked = false;
            });
        }

        let bulkCheckboxAll = null;
        this.checked ? bulkCheckboxAll = 1 : bulkCheckboxAll = 0;


        $.ajax({
            type: "GET",
            url: "{{ route('cart_bulk_checkbox_all') }}",
            data: {
                'bulkAll': bulkCheckboxAll
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {
                // $(".loader-bg").addClass('loader-active');
                setTimeout(() => {
                    location.reload();
                }, 500);

                $("#final_price").text('$'+response.total);
                $("#final_price_pro").text('$'+response.total);
                $("#final_price_hidden").val(response.total);


            }
        });

    });
    // ----------------------- End. bulk checkboxex calculation -----------------------------


    $('.promoCodeInput').hide()
    jQuery('.promoCodeTitle').on('click',function(){
        jQuery('.promoCodeInput').toggle(400);
    })
</script>
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

{{-- <script>
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
</script> --}}
<script>
    if(localStorage.getItem("coupon_code_store")){
        $('.couponDetails').show();
        $('.couponBox').hide()
        actual=localStorage.getItem("actual_total");
        whole_amount=localStorage.getItem("whole_coupon_amount");
        var test_amount="$".concat(actual-whole_amount)
        $('#final_price_pro').text(test_amount)
        $('#promo_delete').text(localStorage.getItem("coupon_code_store"));
    }else{
        $('.couponDetails').hide();
        $('#couponDetails').show()
        $('#coupon_code').val(localStorage.getItem("coupon_code_store2"))
    }
    $("#delete_promo").click(function(e) {
        console.log(localStorage.removeItem("coupon_code_store"))
        $('#coupon_code').val(localStorage.getItem("coupon_code_store2"))
        $('.couponDetails').hide();
        $('.couponBox').show()
        $('#promo_delete').text('N/A');
        promo_delete=document.querySelector("#promo_delete");
        actual_total= localStorage.getItem("actual_total");
        whole_coupon_amount= localStorage.getItem("whole_coupon_amount");
        $('#coupon_code').val(localStorage.getItem("coupon_code_store2"))
        var amount="$".concat(actual_total-whole_coupon_amount)
        $('#final_price_pro').text("$".concat(localStorage.getItem("actual_total")))
        console.log(promo_delete)
    });
    $("#coupondiscount").click(function(e) {
        e.preventDefault();
        console.log(localStorage.getItem("coupon_code_store"))
        var checkout_final_price_hidden = $("#checkout_final_price_hidden").val();
        var coupon_code = $("#coupon_code").val();
        console.log(localStorage.setItem("coupon_code_store2",coupon_code))
        if (coupon_code == '') {
            toastr.error("Please Enter coupon code !");
            return false;
        }

        $.ajax({
            type: "GET",
            url: "{{ route('coupon_code') }}",
            data: {
                'coupon_code': coupon_code,
                'final_price_hidden': checkout_final_price_hidden,
            },
            success: function(response) {
                if (response.status != 200) {
                    swal({
                        title: "Coupon Mismatched!",
                        text: response.message,
                        type: "fail",
                        icon: "error",
                    }).then(function() {
                        // window.location.href = "{{ route('cart') }}";
                    });
                }
                if (response.status == 200) {
                    coupon_amount=response.coupon_amount
                    actual_total=response.final_price_hidden
                    whole_coupon_amount=response.whole_coupon_amount
                    localStorage.setItem("actual_total", actual_total);
                    localStorage.setItem("whole_coupon_amount", whole_coupon_amount);
                    var amount="$".concat(actual_total-whole_coupon_amount)
                    console.log(actual_total,whole_coupon_amount)
                    $('#final_price_pro').text(amount)
                    localStorage.setItem("coupon_code_store", coupon_code);
                    $('.promoCodeTitle').click()
                    $('#promo_delete').text(coupon_code);
                    //    $('#promo_delete').attr('disabled',true);
                    promo_delete=document.querySelector("#promo_delete");
                    $('.couponDetails').show();
                    $('.couponBox').hide()

                }

            }
        });
    });
</script>
<script>
    // var buttonPlus = $(".qty-btn-plus");
    var buttonMinus = $(".qty-btn-minus");

    function incrementPlus(cart_id, product_id, variation_id = null){


        var $n = $(".input-qty-"+cart_id);
        $n.val(Number($n.val()) + 1);

        let quantity = $n.val();


        // console.log('cart_id: '+cart_id+' , product_id: '+product_id+' variation_id: '+variation_id);
        // alert(quantity);
        // return false;
        $.ajax({
            url: "{{ route('item_inc_calculation') }}",
            type: "GET",
            data: {
                'cart_id': cart_id,
                'product_id': product_id,
                'variation_id': variation_id,
                'quantity': quantity,
                'total': $("#total_amount").text(),
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {
                $(".loader-bg").addClass('loader-active');
                if (response.status == 200) {

                    // $("#final_price").text('$'+response.total);
                    // $("#final_price_pro").text('$'+response.total);
                    // $("#final_price_hidden").val(response.total);
                    toastr.success(response.message);
                    $(".loader-bg").removeClass('loader-active');
                    setTimeout(() => {
                        location.reload();
                    }, 200);

                } else {
                    toastr.error(response.message);
                    $(".input-qty-"+cart_id).val(response.quantity);

                }


            }
        });

        var total = Number($n.val());
        //  $("#quantity").val(total);
        //  $("#total_price").val(126*total);
        //  $("#item_cost").html(126*total);
        if(quantity > 1){
            $(".incrementMinus-"+cart_id).attr("disabled",false)
        }

    };

    function incrementMinus(cart_id, product_id,variation_id = null){

        // console.log('cart_id: '+cart_id+' , product_id: '+product_id+' variation_id'+variation_id);
        // alert("here");
        // return false;

        var $n = $(".input-qty-"+cart_id);
        $n.val(Number($n.val()) - 1);

        let quantity = $n.val();

        $.ajax({
            url: "{{ route('item_dec_calculation') }}",
            type: "GET",
            data: {
                'cart_id': cart_id,
                'product_id': product_id,
                'variation_id': variation_id,
                'quantity': quantity,
                'total': $("#total_amount").text(),
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function (response) {
                $(".loader-bg").addClass('loader-active');
                if (response.status == 200) {

                    // $("#final_price").text('$'+response.total);
                    // $("#final_price_pro").text('$'+response.total);
                    // $("#final_price_hidden").val(response.total);

                    toastr.success(response.message);
                    $(".loader-bg").removeClass('loader-active');
                    setTimeout(() => {
                        location.reload();
                    }, 200);

                } else {
                    toastr.error(response.message);
                    $(".input-qty-"+cart_id).val(response.quantity);

                }


            }
        });
        var total = Number($n.val());

        if(quantity == 1){
            $(".incrementMinus-"+cart_id).attr("disabled",true)
        }
        // $("#quantity").val(amount);
        // $("#final_price").html(126*amount);
        // $("#final_price_pro").html(126*amount);
        // $("#item_cost").html(126*amount);
    };

</script>
{{-- <script>
    $("#coupondiscount").click(function(e) {
        e.preventDefault();
        var checkout_final_price_hidden = $("#checkout_final_price_hidden").val();
        var coupon_code = $("#coupon_code").val();
        if (coupon_code == '') {
            toastr.error("Please Enter coupon code !");
            return false;
        }
        alert(checkout_final_price_hidden)

        $.ajax({
            type: "GET",
            url: "{{ route('coupon_code') }}",
            data: {
                'coupon_code': coupon_code,
                'final_price_hidden': checkout_final_price_hidden,
            },
            success: function(response) {
                if (response.status != 200) {
                    swal({
                        title: "Coupon Mismatched!",
                        text: response.message,
                        type: "fail",
                        icon: "error",
                    }).then(function() {
                        // window.location.href = "{{ route('cart') }}";
                    });
                }
                if (response.status == 200) {
                    coupon_amount=response.coupon_amount
                    actual_total=response.final_price_hidden
                    whole_coupon_amount=response.whole_coupon_amount
                    $.each(response.cart, function(index, value) {
                        return $("#coupon_apply").prepend(`
                        <div class="orderSummaryTotal">
                            <span>Name-${value.variations.attribute}</span>
                            <span>Actual Price-$${value.variations.sale_price} <br>
                                Coupon Discount-$${coupon_amount}
                                <br>
                                Discount Price-$${value.variations.sale_price-coupon_amount}</span></div>`)
                        //
                    });
                    $.each(response.cart_regular_price, function(index, value) {
                        return $("#coupon_apply").prepend(`
                        <div class="orderSummaryTotal">
                            <span>Name-${value.variations.attribute}</span>
                            <span>Actual Price-$${value.variations.regular_price} <br>
                                Coupon Discount-$${coupon_amount}
                                <br>
                                Discount Price-$${value.variations.regular_price-coupon_amount}</span></div>`)
                        //
                    });
                    $("#coupon_total").prepend(`<span>Total-${actual_total}<br>
    Whole Discount- ${whole_coupon_amount}<br>
    Grand Total-${actual_total-whole_coupon_amount}
    </span>
                            `);
                }

            }
        });
    });
</script> --}}
@endsection
