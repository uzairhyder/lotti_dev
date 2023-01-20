<?php if(count($orders) > 0): ?>



    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($order->order_status == null && count($order->carts) == 0): ?>
            <?php continue; ?>
        <?php endif; ?>

        
        
        
            <div class="profile-box review-box-padding box-full-height ==">
                <div class="mt0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="lotti-retail-div">

                        </div>
                    </div>
                    <div class="d-flex justify-content-between for-background-color-review align-items-baseline">
                        <div class="d-flex align-items-center <?php echo e($order->order_status != null ? 'for-pay-btn for-pay-btn-cursor' : ''); ?>"
                            <?php if($order->order_status != null): ?> onclick="orderDetails('<?php echo e($order->id); ?>')" <?php endif; ?>>
                            <div class="product-review-img">
                                <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                            </div>
                            <div class="lotti-retail-review">
                                
                                
                                <p>Order# <?php echo e($order->id); ?> </p>
                                <span>Placed On
                                    <?php echo e(date('d/M/Y', strtotime($order->created_at))); ?></span>
                            </div>
                        </div>
                        <div class="lotti-review">


                            <?php if($order->order_status == null): ?>
                                <a href="<?php echo e(route('cart')); ?>">
                                    <button class="order-tracking-btn status_pay_to">
                                        <span>
                                            Pay Now
                                        </span>
                                    </button>
                                </a>
                            <?php endif; ?>

                            <?php if($order->order_status == 1): ?>
                                <button class="order-tracking-btn status_pending">
                                    <span>
                                        Processing
                                    </span>
                                </button>
                            <?php endif; ?>
                            <?php if($order->order_status == 2): ?>
                                <button class="order-tracking-btn status_dispatched">
                                    <span>
                                        Dispatched
                                    </span>
                                </button>
                            <?php endif; ?>
                            <?php if($order->order_status == 3): ?>
                                <?php if($order->order_verification == null): ?>
                                    <span class="verify-html-<?php echo e($order->id); ?>">
                                        <button class="order-tracking-btn unverify" id="verify-<?php echo e($order->id); ?>"
                                            onclick="orderVerify('<?php echo e($order->id); ?>')">
                                            <span>
                                                Unreceived
                                            </span>
                                        </button>
                                    </span>
                                <?php else: ?>
                                    <button class="order-tracking-btn status_verification">
                                        <img src="<?php echo e(asset('icons/verified.png')); ?>" alt="verified" width="16px">
                                        <span>
                                            Received
                                        </span>
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($order->order_status != null): ?>
                                <button class="for-ship-btn order-tracking-btn order_tracking_status"
                                    onclick="orderTracking('<?php echo e($order->id); ?>')">
                                    <span>
                                        Track Order
                                    </span>
                                </button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
              
            


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="for-margin-payment-box order-placed-btn">
        <div class="span-user font-size text-center">
            <span>There are no orders placed yet.</span>
        </div>
        <div class="activate-btn-center">
            <a href="<?php echo e(route('home')); ?>">
                <div class="pink-login-btn activate-btn mt1">
                    CONTINUE SHOPPING
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/user-dashboard/partials/filters.blade.php ENDPATH**/ ?>