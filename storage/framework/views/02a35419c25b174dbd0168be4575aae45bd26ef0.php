<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Wishlist'); ?>
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
            <?php if(empty(count($getwishlist))): ?>
                <div class="container">
                    <div class="productNotFound">
                    
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <h3>Item(s) Not Found</h3>
                    <h6>Your wishlist is empty, go and add it.</h6>
                    </div>
                </div>
            <?php else: ?>
            <?php $__currentLoopData = $getwishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key % 2 == 0 ): ?>
            <div class="col-lg-2 col-md-3 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="<?php echo e(route('product', ['slug' =>  $products->slug])); ?>">
                        <div class="productTwo">
                            <div class="productOneImage wishlistProductOneImage">
                                <img src="<?php echo e(url('public/products/' . $products->get_product_name->image ?? '')); ?>" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="<?php echo e(route('product', $products->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="ddCartIconwhite">

                                    <a href="<?php echo e(route('removewishlist', $products->id)); ?>">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <a href="<?php echo e(route('product', ['slug' =>  $products->slug])); ?>">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4><?php echo e($products->get_product_name->product_name ?? ''); ?></h4>
                                        <p><?php echo Str::limit($products->get_product_name->short_description, 80); ?></p>
                                    </div>

                                </div>
                                <div class="productDetail pBottom">
                                    <div class="productPrice">
                                        <h5>
                                            
                                            <?php if($products->product_type == 1): ?>
                                            <?php if($products->discount_status == null): ?>
                                                <span id="orignal_price">$<?php echo e(number_format($value->price,2)); ?></span>
                                            <?php endif; ?>
    
                                            <?php if($products->discount_status != null): ?>
                                            
                                                <span id="orignal_price" class="discount_orignal_price">$<?php echo e(number_format($products->price,2)); ?></span>
                                                <span id="discounted_price">$<?php echo e(number_format($products->discounted_price,2)); ?></span></h4>
                                            <?php endif; ?>
                                        <?php else: ?>


                                            
                                            <?php if(!empty($products->product_variations)): ?>
                                                <?php
                                                    $first_price = 0;
                                                    $last_price = 0;
                                                    $all_prices = array();
                                                ?>
                                                <?php $__currentLoopData = $products->product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                    
                                                    <?php if($variation->product_id == $products->product_id ): ?>
                                                        <?php
                                                            array_push($all_prices, $variation->regular_price ?? 0);
                                                        ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    sort($all_prices);
                                                    
                                                    if(count($all_prices) > 0){
                                                        $first_price = $all_prices[0];
                                                    }
                                                    
                                                    if (count($all_prices) > 1) {
                                                        $last_price = $all_prices[count($all_prices) - 1];
                                                    }
                                                    
                                                ?>
                                            <?php endif; ?>
                                            <span class="product_range">$<?php echo e(number_format($first_price,2)); ?> - $<?php echo e(number_format($last_price,2)); ?></span>


                                        <?php endif; ?>
                                        </h5>
                                    </div>
                                    <div class="productRating wishlistProductRating">
                                        <?php
                                            $num = 5 - $products->get_ratings_avg_reviews ?? '';
                                        ?>
                                        <?php for($x = 1; $x <=  ceil($products->get_ratings_avg_reviews); $x++): ?>
                                        
                                        <i class="fa fa-star goldenstar "></i>
                                        <?php endfor; ?>

                                        <?php for($x = 1; $x <= $num; $x++): ?>
                                            <i class="fa fa-star blackstar"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </a>
                </div>
            </div>
            <?php else: ?>
            <div class="col-lg-2 col-md-3 col-sm-12 cTop wow animate__animated animate__bounceIn"
                data-wow-duration="1.2s">
                <div class="productsBox">
                    <a href="<?php echo e(route('product', ['slug' =>  $products->slug])); ?>">
                        <div class="productThree">
                            <div class="productOneImage wishlistProductOneImage">
                                <img src="<?php echo e(url('public/products/' . $products->get_product_name->image ?? '')); ?>" alt="Product Image">
                            </div>
                            <div class="hoverCart">
                                <div class="hoverImageCart">
                                    <a href="<?php echo e(route('product', $products->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <div class="ddCartIconwhite">

                                    <a href="<?php echo e(route('removewishlist', $products->id)); ?>">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('product', ['slug' =>  $products->slug])); ?>">
                            <div class="productDetails">
                                <div class="productDetail">
                                    <div class="productName">
                                        <h4><?php echo e($products->get_product_name->product_name ?? ''); ?></h4>
                                        <p><?php echo Str::limit($products->get_product_name->short_description, 80); ?></p>
                                    </div>

                                </div>
                                <div class="productDetail pBottom">
                                    <div class="productPrice">
                                        <h5>$<?php echo e(number_format($products->get_product_name->total_price) ?? ''); ?></h5>
                                    </div>
                                    <div class="productRating wishlistProductRating">
                                        <?php
                                            $num = 5 - $products->get_ratings_avg_reviews ?? '';
                                        ?>
                                        <?php for($x = 1; $x <=  ceil($products->get_ratings_avg_reviews); $x++): ?>
                                        
                                        <i class="fa fa-star goldenstar "></i>
                                        <?php endfor; ?>

                                        <?php for($x = 1; $x <= $num; $x++): ?>
                                            <i class="fa fa-star blackstar"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
        </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('front_assets/js/main.js')); ?>"></script>
<script src="script.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/wishlist.blade.php ENDPATH**/ ?>