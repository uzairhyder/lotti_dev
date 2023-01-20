<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Product'); ?>


<style>
    .itemMargin p {
        margin-left: 110px
    }

    .quantityMargin p {
        margin-left: 50px
    }
</style>


<!-- Start Checkout -->

<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="checkoutBox">
                    <div class="deliveryTo">
                        <span>Deliver to: <?php echo e(Auth::user()->name); ?></span>
                    </div>

                    <?php if(!empty($defaul_billing)): ?>
                        <div class="deliveryAddress">
                            <span>Shipping Address, </span>
                            <span><?php echo e($defaul_shipping->contact ?? ''); ?></span>
                            <span> - </span>
                            <span><?php echo e($defaul_shipping->get_province->state ?? ''); ?>,<?php echo e($defaul_shipping->get_city->city ?? ''); ?>

                                -
                                <?php echo e($defaul_shipping->landmark ?? ''); ?>,<?php echo e($defaul_shipping->address ?? ''); ?></span>


                            
                            
                            <span class="change" data-bs-toggle="modal" data-bs-target="#myModal">Change</span>
                        </div>
                    <?php else: ?>
                        <div class="cartButton">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#add-address"
                                class="add_address"><i class="fa fa-plus" aria-hidden="true"></i> Add Address</button>
                        </div>
                    <?php endif; ?>



                    <?php if(!empty($defaul_billing)): ?>

                        <?php if(empty($defaul_billing->address_identifire)): ?>

                            <div class="deliveryAddress">
                                <span>Bill to the same address</span>

                                <?php if($billing_address_count > 0): ?>
                                    <span class="change" data-bs-toggle="modal"
                                        data-bs-target="#myModalEdit">Edit</span>
                                <?php else: ?>
                                    <span class="change" data-bs-toggle="modal"
                                        data-bs-target="#add-address">Edit</span>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="deliveryAddress">
                                <span>Bill Address, </span>
                                <span><?php echo e($defaul_billing->contact ?? ''); ?></span>
                                <span> - </span>
                                <span><?php echo e($defaul_billing->get_province->state ?? ''); ?>,<?php echo e($defaul_billing->get_city->city ?? ''); ?>

                                    -
                                    <?php echo e($defaul_billing->landmark ?? ''); ?>,<?php echo e($defaul_billing->address ?? ''); ?></span>
                                <span class="change" data-bs-toggle="modal" data-bs-target="#myModalEdit">Change</span>
                            </div>

                        <?php endif; ?>
                    <?php endif; ?>


                    
                </div>
                <div class="checkoutBox mt-4">
                    


                    <div class="productListingBox">
                        <div class="productListing">
                            <div class="productListingDetail itemMargin">
                                <p>Item</p>
                            </div>
                        </div>
                        <div class="productQuantity quantityMargin">
                            <p>Quantity</p>
                        </div>
                        <div class="productQuantity">
                            <p>Unit Price</p>
                        </div>
                        <div class="productPrice">
                            <span class="currentPrice">Subtotal</span>
                        </div>
                    </div>

                    <?php
                        $total = 0;
                    ?>
                    <?php if(!empty($carts)): ?>
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cart->product->product_type == 1): ?>
                                <?php
                                    $subtotal = 0;
                                ?>
                                
                                <div class="productListingBox">
                                    <div class="productListing">
                                        <div class="productListingImage">
                                            <img src="<?php echo e(asset('products/' . $cart->product->image)); ?>"
                                                alt="<?php echo e($cart->product->product_name); ?>">

                                        </div>

                                        <div class="productListingDetail">
                                            
                                            <p><?php echo e($cart->product->product_name); ?></p>
                                            
                                            <small>
                                                
                                                
                                                
                                            </small><br>
                                            
                                        </div>


                                    </div>
                                    <div class="productQuantity">
                                        <p><?php echo e($cart->quantity); ?></p>
                                    </div>
                                    <div class="productQuantity">
                                        <p>
                                            <?php if($cart->product->discount_status == null || $cart->product->discount_status == 0): ?>
                                                <span
                                                    id="orignal_price">$.<?php echo e(number_format($cart->product->price, 2)); ?></span>

                                                
                                                <?php
                                                    $subtotal = $cart->product->price * $cart->quantity;
                                                ?>
                                            <?php endif; ?>

                                            <?php if($cart->product->discount_status == 1): ?>
                                                <span id="orignal_price"
                                                    class="discount_orignal_price">$<?php echo e(number_format($cart->product->price, 2)); ?></span>
                                                <span
                                                    id="discounted_price">$.<?php echo e(number_format($cart->product->discounted_price, 2)); ?></span>
                                                </h4>

                                                
                                                <?php
                                                    $subtotal = $cart->product->sale_price * $cart->quantity;
                                                ?>
                                            <?php endif; ?>
                                            
                                    </div>
                                    <div class="productPrice">
                                        <span class="currentPrice">$. <?php echo e(number_format($subtotal, 2)); ?></span>
                                    </div>
                                </div>

                                <?php
                                    $total += $subtotal;
                                ?>
                            <?php else: ?>
                                <?php
                                    $subtotal = 0;
                                ?>
                                
                                <div class="productListingBox">
                                    <div class="productListing">
                                        <div class="productListingImage">
                                            <img src="<?php echo e(asset('variations/' . $cart->variations->image)); ?>"
                                                alt="<?php echo e($cart->product->product_name); ?>">

                                        </div>

                                        <div class="productListingDetail">
                                            
                                            <p><?php echo e($cart->product->product_name); ?></p>
                                            
                                            <small>
                                                
                                                
                                                <?php echo e($cart->variations->attribute); ?>

                                            </small><br>
                                            
                                        </div>


                                    </div>
                                    <div class="productQuantity">
                                        <p><?php echo e($cart->quantity); ?></p>
                                    </div>
                                    <div class="productQuantity">
                                        <p>
                                            <?php if($cart->variations->discount_status == null || $cart->variations->discount_status == 0): ?>
                                                <span
                                                    id="orignal_price">$.<?php echo e(number_format($cart->variations->regular_price, 2)); ?></span>

                                                
                                                <?php
                                                    $subtotal = $cart->variations->regular_price * $cart->quantity;
                                                ?>
                                            <?php endif; ?>

                                            <?php if($cart->variations->discount_status == 1): ?>
                                                <span id="orignal_price"
                                                    class="discount_orignal_price">$<?php echo e(number_format($cart->variations->regular_price, 2)); ?></span>
                                                <span
                                                    id="discounted_price">$.<?php echo e(number_format($cart->variations->sale_price, 2)); ?></span>
                                                </h4>

                                                
                                                <?php
                                                    $subtotal = $cart->variations->sale_price * $cart->quantity;
                                                ?>
                                            <?php endif; ?>
                                            
                                    </div>
                                    <div class="productPrice">
                                        <span class="currentPrice">$. <?php echo e(number_format($subtotal, 2)); ?></span>
                                    </div>
                                </div>

                                <?php
                                    $total += $subtotal;
                                ?>
                            <?php endif; ?>



                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <hr>
                    <div class="productSubTotal">
                        <div class="productPrice">
                            <span class="currentPrice"><?php echo e(count($carts)); ?> Item(s).</span>
                            <span class="currentPrice">Subtotal:</span>

                            <span class="currentPrice rsRed">$. <?php echo e(number_format($total, 2)); ?></span><br>
                            <input id="checkout_final_price_hidden" type="hidden" name="total_price" id="total_price"
                                value=<?php echo e($total); ?>>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 checkoutTop">
                <div class="checkoutBox">
                    <div class="deliveryTo">
                        <span>Discount and Payment</span>
                    </div>
                    
                    <hr>
                    <div class="orderSummary">
                        <div class="orderSummaryTitle">
                            <span>Order Summary</span>
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
                        <div class="orderSummaryTotal">
                            <span>Items Total</span>
                            <span>$. <?php echo e(number_format($total, 2)); ?></span>
                        </div>
                        <div class="orderSummaryTotal">
                            <span>Delivery Fee</span>
                            <?php if(count($user_shippings) > 0): ?>
                                <?php
                                    session()->put('delivery_fee', $user_shippings[0]->shipping_fee);
                                ?>
                                <?php if($user_shippings[0]->shipping_fee != 0): ?>
                                    <span>$. <?php echo e(number_format($user_shippings[0]->shipping_fee, 2)); ?></span>
                                <?php else: ?>
                                    <span>Free Shipping</span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>Free Shipping</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="orderSummaryTotal">
                            <span>Total:</span><span id="final_price_pro">
                            <?php if(count($user_shippings) > 0): ?>
                                <span>$. <?php echo e(number_format($total + $user_shippings[0]->shipping_fee, 2)); ?></span>
                                <?php
                                    session()->put('products_total_amount', $total + $user_shippings[0]->shipping_fee);
                                ?>
                            <?php else: ?>
                                <span>$. <?php echo e(number_format($total + 0, 2)); ?></span>
                                <?php
                                    session()->put('products_total_amount', $total + 0);
                                ?>
                            <?php endif; ?>
                            </span>
                        </div>

                        <?php if($cart->get_product->id = session()->get('product_id')): ?>
                            <?php if(session()->has('coupon_code') && session()->get('discount_type') == 2): ?>
                                <div class="orderSummaryTotal">
                                    <span>Amount after coupon code applied:</span>
                                    <?php if(!empty($delivery_fee->get_shipping_city->shipping_fee)): ?>
                                        <span>$.
                                            <?php echo e(number_format($total * (($total * session()->get('coupon_amount')) / 100) + $delivery_fee->get_shipping_city->shipping_fee, 2)); ?></span>
                                    <?php else: ?>
                                        <span>$.
                                            <?php echo e(number_format($total - ($total * session()->get('coupon_amount')) / 100, 2)); ?><span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(session()->has('coupon_code') && session()->get('discount_type') == 1): ?>
                            <div class="orderSummaryTotal">
                                <span>Amount after coupon code applied:</span>
                                <?php if(!empty($delivery_fee->get_shipping_city->shipping_fee)): ?>
                                    <span>$.
                                        <?php echo e(number_format($total - ($total * session()->get('coupon_amount')) / 100 + $delivery_fee->get_shipping_city->shipping_fee, 2)); ?></span>
                                <?php else: ?>
                                    <span>$.
                                        <?php echo e(number_format($total - ($total * session()->get('coupon_amount')) / 100, 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="orderSummaryVat">
                            
                            <span> </span>
                        </div>
                    </div>


             
                    <div class="cartButton orderPlace">
                        <a href="<?php echo e(route('payment')); ?>" class="payment_btn"><button>Payment</button></a>

                        <div id="payment-buttons"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Checkout -->

<!-- The Modal Change-->
<div class="modal" id="myModal">
    <div class="modal-dialog modalDialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modalTile">My Shipping Address</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
            </div>

            <form action="<?php echo e(route('change_address')); ?>" method="POST" class="block">
                <?php echo csrf_field(); ?>
                <!-- Modal body -->
                <div class="modal-body modalBody">
                    <div class="row">
                        <input type="hidden" name="shipping" value="1" class="card-input-element" />

                        <?php if(!empty($shipping_addresses)): ?>
                            <?php $__currentLoopData = $shipping_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping_addresse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($shipping_addresse->address_identifire == 1): ?>
                                    <div class="col-lg-6">
                                        <label class="label">
                                            <input type="radio" name="address_id"
                                                value="<?php echo e($shipping_addresse->id); ?>" class="card-input-element"
                                                <?php echo e($shipping_addresse->shipping_active_address == 1 ? 'checked' : ''); ?> />
                                            <div class="panel panel-default card-input">
                                                <div class="deliveryAddressDetail">
                                                    <div class="deliveryAddressName">
                                                        <p><?php echo e($shipping_addresse->name); ?></p>
                                                        <a href="javascript::void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#myModalEditInner"
                                                            onclick="edit_address('<?php echo e($shipping_addresse->id); ?>')">
                                                            <p>Edit</p>
                                                        </a>
                                                    </div>
                                                    <div class="deliveryPhoneAddress">
                                                        <p><?php echo e($shipping_addresse->contact); ?></p>
                                                        <p><?php echo e($shipping_addresse->get_state->state ?? ''); ?>,<?php echo e($shipping_addresse->get_city->city ?? ''); ?>

                                                            -
                                                            <?php echo e($shipping_addresse->landmark); ?>,<?php echo e($shipping_addresse->address); ?>

                                                        </p>
                                                        <?php if($shipping_addresse->shipping_active_address == 1): ?>
                                                            <span>Default Shipping Address</span>
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer modalFooter">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-address">
                        <p><i class="fa fa-plus" aria-hidden="true"></i> Add New Address</p>
                    </a>
                    <button type="submit" class="confirmButton" data-bs-dismiss="modal">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Modal Edit-->
<div class="modal" id="myModalEdit">
    <div class="modal-dialog modalDialog">
        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modalTile">My Billing Address</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
            </div>

            <!-- Modal body -->
            <form action="<?php echo e(route('change_address')); ?>" method="POST" class="block">
                <?php echo csrf_field(); ?>
                <div class="modal-body modalBody">
                    <div class="row">
                        <input type="hidden" name="billing" value="2" class="card-input-element" />
                        <?php if(!empty($shipping_addresses)): ?>
                            <?php $__currentLoopData = $shipping_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping_addresse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($shipping_addresse->address_identifire == 2): ?>
                                    <div class="col-lg-6">
                                        <label class="label">

                                            <input type="radio" name="address_id"
                                                value="<?php echo e($shipping_addresse->id); ?>" class="card-input-element"
                                                <?php echo e($shipping_addresse->billing_active_address == 2 ? 'checked' : ''); ?> />
                                            <div class="panel panel-default card-input">
                                                <div class="deliveryAddressDetail">
                                                    <div class="deliveryAddressName">
                                                        <p>Tofique Ahmed</p>
                                                        <a href="javascript::void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#myModalEditInner"
                                                            onclick="edit_address('<?php echo e($shipping_addresse->id); ?>')">
                                                            <p>Edit</p>
                                                        </a>
                                                    </div>
                                                    <div class="deliveryPhoneAddress">
                                                        <p><?php echo e($shipping_addresse->contact); ?></p>
                                                        <p><?php echo e($shipping_addresse->province); ?>,<?php echo e($shipping_addresse->city); ?>

                                                            -
                                                            <?php echo e($shipping_addresse->landmark); ?>,<?php echo e($shipping_addresse->address); ?>

                                                        </p>
                                                        <?php if($shipping_addresse->billing_active_address == 2): ?>
                                                            <span>Default Billing Address</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer modalFooter">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-address">
                        <p><i class="fa fa-plus" aria-hidden="true"></i> Add New Address</p>
                    </a>
                    <button type="submit" class="confirmButton" data-bs-dismiss="modal">Confirm</button>
                </div>
            </form>


        </div>
    </div>
</div>


<!-- Add Address Modal -->
<div class="modal" id="add-address">
    <div class="modal-dialog modalDialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modalTile">Add Address</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
            </div>


            <!-- Modal body -->
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="edit-sec-box margin-top-zero ">
                            <form id="add_address_form" action="<?php echo e(route('update-user')); ?>" method="POST"
                                class="block">
                                <?php echo csrf_field(); ?>
                                <div class="input-border-cstm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">First Name</label>
                                                <input type="text" name="name" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Address</label>
                                                <input type="text" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Mobile Number</label>
                                                <input type="number" name="contact" placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Landmark
                                                    (Optional)</label>
                                                <input type="text" name="landmark"
                                                    placeholder="Landmark (Optional)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Province</label>
                                                <select name="province" id="editprovince">
                                                    <option selected="">Select</option>
                                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>">
                                                            <?php echo e($data->state); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Select a label for
                                                    effective
                                                    delivery</label>
                                                <div class="d-flex justify-content-between">
                                                    <input type="hidden" name="delivery_lable" id="delivery">
                                                    <button type="button" class="choose_button" value="1"
                                                        id="home"><i class="fa fa-check-square"
                                                            aria-hidden="true"></i>Home</button>
                                                    <button type="button" class="choose_button" value="2"
                                                        id="office"><i class="fa fa-check-square"
                                                            aria-hidden="true"></i>Office</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for=""
                                                    class="font-famil-change">City/Municipality</label>
                                                <select name="city" id="allcities">

                                                </select>

                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Select a label for
                                                    effective
                                                    delivery</label>
                                                <div class="confirming-address">
                                                    <div class="d-flex">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="offers"
                                                                name="default_shipping" value="1">
                                                            <label for="offers"
                                                                class="d-flex align-items-start">Default
                                                                shipping
                                                                address</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt0">
                                                        <div class="form-group">
                                                            
                                                            <input type="checkbox" id="html2"
                                                                name="default_billing" value="2">
                                                            <label for="html2"
                                                                class="d-flex align-items-start">Default
                                                                billing
                                                                address</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex address-decription">
                                                        <p>Your existing default address setting will be
                                                            replaced if you make some changes here.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="save-btn mt2">
                                        <div class="d-flex add-address justify-content-end">
                                            <div class="pink-login-btn login-button">
                                                <button type="submit" id="save_address"
                                                    class="confirmButton">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- End. Add Address Modal -->

<!-- The Modal New Address -->
<div class="modal" id="myModalEditInner">
    <div class="modal-dialog modalDialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modalTile">Edit Address</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="edit-sec-box margin-top-zero ">
                            <form id="edit_address_form" action="<?php echo e(route('update_address')); ?>" method="POST"
                                class="block">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="address_id" id="addressId">
                                <div class="input-border-cstm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">First Name</label>
                                                <input type="text" name="name" placeholder="First Name"
                                                    id="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Address</label>
                                                <input type="text" name="address" id="address"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Mobile Number</label>
                                                <input type="number" name="contact" id="contact"
                                                    placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Landmark
                                                    (Optional)</label>
                                                <input type="text" name="landmark" id="landmark"
                                                    placeholder="Landmark (Optional)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Province</label>
                                                <select name="province" id="editprovincestate">
                                                    <option selected="">Select</option>
                                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>">
                                                            <?php echo e($data->state); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Select a label for
                                                    effective
                                                    delivery</label>
                                                <div class="d-flex justify-content-between">
                                                    <input type="hidden" name="delivery_lable" id="edit_delivery">
                                                    <button type="button" id="edit_home" class="choose_button"
                                                        value="1" id="home"><i class="fa fa-check-square"
                                                            aria-hidden="true"></i>Home</button>
                                                    <button type="button" id="edit_office" class="choose_button"
                                                        value="2" id="office"><i class="fa fa-check-square"
                                                            aria-hidden="true"></i>Office</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for=""
                                                    class="font-famil-change">City/Municipality</label>
                                                <select name="city" id="allcitiesofstates">
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Select a label for
                                                    effective
                                                    delivery</label>
                                                <div class="confirming-address">
                                                    <div class="d-flex">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="edit_shipping_checkbox"
                                                                name="default_shipping" value="1">
                                                            <label for="edit_shipping_checkbox"
                                                                class="d-flex align-items-start">Default
                                                                shipping
                                                                address</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt0">
                                                        <div class="form-group">
                                                            
                                                            <input type="checkbox" id="edit_billing_checkbox"
                                                                name="default_billing" value="2">
                                                            <label for="edit_billing_checkbox"
                                                                class="d-flex align-items-start">Default
                                                                billing
                                                                address</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex address-decription">
                                                        <p>Your existing default address setting will be
                                                            replaced if you make some changes here.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="save-btn mt2">
                                        <div class="d-flex add-address justify-content-end">
                                            <div class="pink-login-btn login-button">
                                                <button type="submit" id="save_address"
                                                    class="confirmButton">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<!-- The Modal Email Edit-->
<div class="modal" id="myModalEmailEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modalTile">Email</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" class="inputName" placeholder="Email">
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="confirmButton" data-bs-dismiss="modal">Confirm</button>
            </div>

        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./assets/js/main.js"></script>
<script>
    $('form').hide();
    $("#show").on("click", function() {
        $('form ').slideToggle(300);
    });

    $("#js-apply-promo").on("click", function() {
        $("#js-promo-box").fadeToggle();
    })

    $(".choose_button").click(function() {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });


    $(document).ready(function() {
        $("#home").click(function() {
            // alert('test');
            var home = $("#home").val();
            $("#delivery").val(home);
        });
        $("#office").click(function() {
            var office = $("#office").val();
            $("#delivery").val(office);
        });
    });

    $("#add_address_form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?php echo e(route('update-user')); ?>",
            data: $(this).serialize(),
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {

                $(".loader-bg").addClass('loader-active');
                if (response.status == 400) {
                    $.each(response.errors, function(prefix, val) {
                        toastr.error(val[0]);
                    });
                }

                if (response.status == 200) {
                    // $('#add-address').modal('hide');
                    // window.location.reload();
                    // toastr.success(response.message);


                    toastr.success('Done', response.message, {
                        timeOut: 1000,
                        preventDuplicates: true,
                        // positionClass: 'toast-top-center',
                        // Redirect
                        onHidden: function() {
                            // $(".loader-bg").removeClass('loader-active');
                            window.location.reload();
                        }
                    });

                    // setTimeout(() => {
                    //     window.location.reload();
                    // }, 1000);
                }


            }
        });
    });


    function edit_address(address_id) {
        $("#addressId").val(address_id);
        $.ajax({
            type: "GET",
            url: "user-address/" + address_id,
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $("#name").val(response.user_address.name);
                $("#address").val(response.user_address.address);
                $("#contact").val(response.user_address.contact);
                $("#landmark").val(response.user_address.landmark);
                $("#edit_delivery").val(response.user_address.delivery_label);
                // alert(response.user_address.delivery_label);
                if (response.user_address.delivery_label == 1) {
                    $("#edit_office").removeClass("active");
                    $("#edit_home").addClass("active");
                }
                if (response.user_address.delivery_label == 2) {
                    $("#edit_home").removeClass("active");
                    $("#edit_office").addClass("active");
                }

                $("#edit_shipping_checkbox").removeAttr("checked");
                $("#edit_billing_checkbox").removeAttr("checked");
                if (response.user_address.default_shipping == 1) {
                    $("#edit_shipping_checkbox").attr("checked", true);
                }
                if (response.user_address.default_billing == 2) {
                    $("#edit_billing_checkbox").attr("checked", true);
                }

                $.each($("#editprovincestate > option"), function(indexInArray, valueOfElement) {
                    // console.log()
                    if ($(this).val() == response.user_address.province) {
                        $(this).attr('selected', true);
                    }
                });

                $.each($("#allcitiesofstates > option"), function(indexInArray, valueOfElement) {
                    if ($(this).val() == response.user_address.city) {
                        $(this).attr('selected', true);
                    }
                });

                $.each($("#edit_village > option"), function(indexInArray, valueOfElement) {
                    if ($(this).val() == response.user_address.village) {
                        $(this).attr('selected', true);
                    }
                });

                $(".loader-bg").addClass('loader-active');
                // console.log(response.user_address);
            }
        });
    }


    $("#edit_address_form").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?php echo e(route('update_address')); ?>",
            data: $(this).serialize(),
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {

                $(".loader-bg").addClass('loader-active');
                if (response.status == 400) {
                    $.each(response.errors, function(prefix, val) {
                        toastr.error(val[0]);
                    });
                }

                if (response.status == 200) {
                    // $('#add-address').modal('hide');
                    // window.location.reload();
                    // toastr.success(response.message);


                    toastr.success('Done', response.message, {
                        timeOut: 1000,
                        preventDuplicates: true,
                        // positionClass: 'toast-top-center',
                        // Redirect
                        onHidden: function() {
                            // $(".loader-bg").removeClass('loader-active');
                            window.location.reload();
                        }
                    });

                    // setTimeout(() => {
                    //     window.location.reload();
                    // }, 1000);
                }


            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#province').on('change', function() {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "<?php echo e(url('api/fetch-states')); ?>",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(result) {
                    $(".loader-bg").addClass('loader-active');
                    $('#state-dd').html('<option value="">Select City</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.city + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#editprovince').on('change', function() {
            // alert('test');
            var idCountry = this.value;
            $("#allcities").html('');
            $.ajax({
                url: "<?php echo e(url('api/fetch-cities')); ?>",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(result) {
                    $(".loader-bg").addClass('loader-active');
                    $('#allcities').html('<option value="">Select City</option>');
                    $.each(result.states, function(key, value) {
                        $("#allcities").append('<option value="' + value
                            .id + '">' + value.city + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });

    });
</script>
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
        var amount="$".concat(actual_total-whole_coupon_amount)
        $('#final_price_pro').text("$".concat(localStorage.getItem("actual_total")))

    });
    $("#coupondiscount").click(function(e) {
        e.preventDefault();

        var checkout_final_price_hidden = $("#checkout_final_price_hidden").val();
        var coupon_code = $("#coupon_code").val();
        console.log(localStorage.setItem("coupon_code_store2",coupon_code))
        if (coupon_code == '') {
            toastr.error("Please Enter coupon code !");
            return false;
        }

        $.ajax({
            type: "GET",
            url: "<?php echo e(route('coupon_code')); ?>",
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
                        // window.location.href = "<?php echo e(route('cart')); ?>";
                    });
                }
                if (response.status == 200) {
                    coupon_amount=response.coupon_amount
                    actual_total=response.final_price_hidden
                    whole_coupon_amount=response.whole_coupon_amount
                    localStorage.setItem("actual_total", actual_total);
                    localStorage.setItem("whole_coupon_amount", whole_coupon_amount);
                    var amount="$".concat(actual_total-whole_coupon_amount)
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
    $(document).ready(function() {
        $('#editprovincestate').on('change', function() {

            var idCountry = this.value;
            $("#allcities").html('');
            $.ajax({
                url: "<?php echo e(url('api/fetch-cities')); ?>",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(result) {
                    $(".loader-bg").addClass('loader-active');
                    $('#allcitiesofstates').html('<option value="">Select City</option>');
                    $.each(result.states, function(key, value) {
                        $("#allcitiesofstates").append('<option value="' + value
                            .id + '">' + value.city + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
    });



    // payment buttons
    // $(".payment-buttons").on("click", function(){
    //     var shipping_address_count = '<?php echo e(count($shipping_addresses)); ?>';

    //     $("#payment-buttons").html("");
    //     var html = '';
    //     if(shipping_address_count > 0){
    //         let paymentButtons = $(this).val();

    //         // 1) cash on delivery
    //         if(paymentButtons == 1){
    //             html = `<a href="<?php echo e(route('cash_on_delivery')); ?>"><button>Place Order</button></a>`;
    //         }else{
    //             // 2) pay with cards
    //             html = `<a href="<?php echo e(route('payment')); ?>"><button>Payment</button></a>`;
    //         }
    //     }else{
    //         html = `<button data-bs-toggle="modal" data-bs-target="#add-address">Payment</button>`;
    //     }
    //     $("#payment-buttons").html(html);

    // });

    var shipping_address_count = '<?php echo e(count($shipping_addresses)); ?>';
    if(shipping_address_count > 0){
        $(".payment_btn").addClass("remove_none");
    }else{
        $(".payment_btn").addClass("display_none");
        $("#payment-buttons").html(`<button data-bs-toggle="modal" data-bs-target="#add-address" id="address_btn">Payment</button>`);
    }

</script>

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
        var amount="$".concat(actual_total-whole_coupon_amount)
        $('#final_price_pro').text("$".concat(localStorage.getItem("actual_total")))

    });
    $("#coupondiscount").click(function(e) {
        e.preventDefault();

        var checkout_final_price_hidden = $("#checkout_final_price_hidden").val();
        var coupon_code = $("#coupon_code").val();
        console.log(localStorage.setItem("coupon_code_store2",coupon_code))
        if (coupon_code == '') {
            toastr.error("Please Enter coupon code !");
            return false;
        }

        $.ajax({
            type: "GET",
            url: "<?php echo e(route('coupon_code')); ?>",
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
                        // window.location.href = "<?php echo e(route('cart')); ?>";
                    });
                }
                if (response.status == 200) {
                    coupon_amount=response.coupon_amount
                    actual_total=response.final_price_hidden
                    whole_coupon_amount=response.whole_coupon_amount
                    localStorage.setItem("actual_total", actual_total);
                    localStorage.setItem("whole_coupon_amount", whole_coupon_amount);
                    var amount="$".concat(actual_total-whole_coupon_amount)
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>