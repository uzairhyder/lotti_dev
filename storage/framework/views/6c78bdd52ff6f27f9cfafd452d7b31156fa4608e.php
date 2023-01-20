

<?php if(count($products) > 0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

    
    <?php if($value->product_type == 2 && count($value->product_variations) == 0): ?>
    <?php continue; ?>
    <?php endif; ?>
    

    
    <?php if($rating != null): ?>
        
        <?php if($rating > (int) $value->get_ratings_avg_reviews): ?>
            <?php continue; ?>
        <?php endif; ?>    
        <?php if($value->get_ratings_avg_reviews == null): ?>
            <?php continue; ?>
        <?php endif; ?>  
    <?php endif; ?>


        

    

    <?php if($key % 2 == 0): ?>
        <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
            <div class="productsBox">
                <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                    <div class="productTwo">
                        <div class="productOneImage">
                            <img src="<?php echo e(url('public/products/' . $value->image)); ?>" alt="Product Image">
                        </div>

                        <div class="hoverCart">
                            <div class="hoverImageCart">
                                <a href="<?php echo e(route('product', $value->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                            </div>

                            
                                
                                <div class="hoverImageHeart">

                                    <a href="<?php echo e(route('addwishlist', $value->slug)); ?>">
                                        <i class="fa fa-heart"
                                        aria-hidden="true"></i>
                                    </a>
                                </div>
                            

                        </div>
                    </div>
                    <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                        <div class="productDetails">
                            <div class="productDetail">
                                <div class="productName">
                                    <h4><?php echo e($value->product_name); ?></h4>
                                    <p><?php echo Str::limit($value->short_description, 80); ?></p>
                                </div>
                            </div>
                            <div class="productDetail pBottom">
                                <div class="productPrice">
                                    <h5>
                                    

                                    <?php if($value->product_type == 1): ?>
                                        <?php if($value->discount_status == null): ?>
                                            <span id="orignal_price">$<?php echo e(number_format($value->price,2)); ?></span>
                                        <?php endif; ?>

                                        <?php if($value->discount_status != null): ?>
                                        
                                            <span id="orignal_price" class="discount_orignal_price">$<?php echo e(number_format($value->price,2)); ?></span>
                                            <span id="discounted_price">$<?php echo e(number_format($value->discounted_price,2)); ?></span></h4>
                                        <?php endif; ?>
                                    <?php else: ?>

                                            
                                        <?php if(!empty($value->product_variations)): ?>
                                            <?php
                                                $first_price = 0;
                                                $last_price = 0;
                                                $all_prices = array();
                                            ?>
                                            <?php $__currentLoopData = $value->product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php if($variation->product_id == $value->id ): ?>
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
                                <div class="">
                                    <?php
                                        $num = 5 - $value->get_ratings_avg_reviews;
                                    ?>
                                    <?php for($x = 1; $x <= ceil($value->get_ratings_avg_reviews); $x++): ?>
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
        <div class="col-lg-3 col-md-4 col-sm-12 cTop wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

            <div class="productsBox">
                <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                    <div class="productThree">
                        <div class="productOneImage">
                            <img src="<?php echo e(url('public/products/' . $value->image)); ?>" alt="Product Image">
                        </div>
                        <div class="hoverCart">
                            <div class="hoverImageCart">
                                <a href="<?php echo e(route('product', $value->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                            </div>

                            <div class="hoverImageHeart">
                                <a href="<?php echo e(route('addwishlist', $value->slug)); ?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                        <div class="productDetails">
                            <div class="productDetail">
                                <div class="productName">
                                    <h4><?php echo e($value->product_name); ?></h4>
                                    <p><?php echo Str::limit($value->short_description, 80); ?></p>
                                </div>

                            </div>
                            <div class="productDetail pBottom">
                                <div class="productPrice">
                                    <h5>
                                        <?php if($value->product_type == 1): ?>
                                        <?php if($value->discount_status == null): ?>
                                            <span id="orignal_price">$<?php echo e(number_format($value->price,2)); ?></span>
                                        <?php endif; ?>

                                        <?php if($value->discount_status != null): ?>
                                        
                                            <span id="orignal_price" class="discount_orignal_price">$<?php echo e(number_format($value->price,2)); ?></span>
                                            <span id="discounted_price">$<?php echo e(number_format($value->discounted_price,2)); ?></span></h4>
                                        <?php endif; ?>
                                    <?php else: ?>

                                            
                                        <?php if(!empty($value->product_variations)): ?>
                                            <?php
                                                $first_price = 0;
                                                $last_price = 0;
                                                $all_prices = array();
                                            ?>
                                            <?php $__currentLoopData = $value->product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php if($variation->product_id == $value->id ): ?>
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
                                <div class="">
                                    <?php
                                        $num = 5 - $value->get_ratings_avg_reviews;
                                    ?>
                                    <?php for($x = 1; $x <= ceil($value->get_ratings_avg_reviews); $x++): ?>
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


<?php else: ?>

<div class="col-lg-12 col-md-12 col-sm-12 cTop " data-wow-duration="1.2s">
    <h3>
        Sorry!, No Product Found!
    </h3>
</div>

<?php endif; ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/partials/shop-component.blade.php ENDPATH**/ ?>