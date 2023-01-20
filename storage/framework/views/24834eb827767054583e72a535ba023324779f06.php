<?php $__env->startSection('content'); ?>
<style>

</style>
<?php $__env->startSection('title', 'Home'); ?>
 <!-- End Sidebar -->

    <!-- Start Header -->
    
    <Header class="headerImage">
        <div class="slider">
            <div class="slide_viewer">
                <div class="slide_group">
                    <?php $__currentLoopData = json_decode($banners->banner_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide" style="background-image: url('<?php echo e(url('public/banner/' . $image)); ?>')">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn"
                                    data-wow-duration="1.2s">
                                    <div class="headerHeading">
                                        <h2><?php echo e($banners->title1); ?><br> <span><?php echo e($banners->title2); ?></span><br>
                                            <p><?php echo e($banners->title3); ?></p>
                                        </h2>
                                        <a href="<?php echo e(route('shop')); ?>"><button class="shopButton">Shop Now</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide_buttons">
                    </div>

                    
                </div>
            </div>

        </div>
    </Header>

    <!-- End Header -->

    <!-- Start Product Item -->
    
    <section class="product">
        <div class="container">
            <div class="row wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="shop?category=<?php echo e($value->slug); ?>">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4><?php echo e($value->sub_category_name); ?></h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <?php if(empty($value->image)): ?>
                                        <img src="<?php echo e(asset('assets/No-image.jpg')); ?>"   alt="" height="100px" width="100px"> <br><br><br>
                                    <?php else: ?>
                                        <img src="<?php echo e(url('public/sub-category/' . $value->image)); ?>"   alt="Product image">
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
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
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="productCardLong">
                            <div class="productCardHeading"
                                style="display: flex; flex-direction: column; align-items: flex-start; width: 85%;">
                                <h4><?php echo e($iphone_sect->title1 ?? ''); ?><br><?php echo e($iphone_sect->title2 ?? ''); ?></h4>
                                <h5><span><?php echo e($iphone_sect->title3 ?? ''); ?>%</span> <?php echo e($iphone_sect->title4 ?? ''); ?></h5>
                            </div>
                            <div class="productCardImageLong">
                                <img src="<?php echo e(url('public/content/' . $iphone_sect->image)); ?>"   alt="Product  Card Image">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 mTop">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="<?php echo e(route('shop')); ?>">
                                <div class="productCardTwo">
                                    <div class="productCardHeading">
                                        <h4><?php echo e($power_bank->title1 ?? ''); ?></h4>
                                        <h5><span><?php echo e($power_bank->title2 ?? ''); ?> %</span> <?php echo e($power_bank->title3 ?? ''); ?></h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="<?php echo e(url('public/content/' . $power_bank->image)); ?>"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="<?php echo e(route('shop')); ?>">
                                <div class="productCardOne">
                                    <div class="productCardHeading">
                                        <h4><?php echo e($android_sect->title1 ?? ''); ?></h4>
                                        <h5><span><?php echo e($android_sect->title2 ?? ''); ?> %</span> <?php echo e($android_sect->title3 ?? ''); ?></h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="<?php echo e(url('public/content/' . $android_sect->image)); ?>"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="<?php echo e(route('shop')); ?>">
                                <div class="productCardOne mt-4">
                                    <div class="productCardHeading">
                                        <h4><?php echo e($watch->title1 ?? ''); ?></h4>
                                        <h5><span><?php echo e($watch->title2 ?? ''); ?>%</span><?php echo e($watch->title3 ?? ''); ?></h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="<?php echo e(url('public/content/' . $watch->image)); ?>"   alt="Product  Card Image">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 sTop wow animate__animated animate__bounceIn"
                            data-wow-duration="1.2s">
                            <a href="<?php echo e(route('shop')); ?>">
                                <div class="productCardTwo mt-4">
                                    <div class="productCardHeading">
                                        <h4><?php echo e($pc->title1 ?? ''); ?></h4>
                                        <h5><span><?php echo e($pc->title2 ?? ''); ?>%</span> <?php echo e($pc->title3 ?? ''); ?></h5>
                                    </div>
                                    <div class="productCardImage">
                                        <img src="<?php echo e(url('public/content/' . $pc->image)); ?>"   alt="Product  Card Image">
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
            <a href="<?php echo e(route('shop')); ?>"><img src="<?php echo e(url('public/offers/' . $sale->image1)); ?>" alt="Offer Image"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="offerImageBox">
                            <div class="offerImageOne  wow animate__animated animate__bounceIn">
                                <img src="<?php echo e(asset('front_assets/images/saleImageOne.webp')); ?>" alt="Offer Image">
                                <div class="offerImageText">
                                    <h4><?php echo e($sale->title1); ?></h4>
                                    <h2><?php echo e($sale->title2); ?></h2>
                                    <h2><span><?php echo e($sale->title3); ?></span></h2>
                                </div>
                                <div class="offerImageUpto">
                                    <h2><?php echo e($sale->title4); ?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="offerImageTwo">
                            <img src="<?php echo e(url('public/offers/' . $sale->image2)); ?>" alt="Offer Image">
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
                                <img src="<?php echo e(asset('front_assets/images/productOne.webp')); ?>" alt="Product Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">

                    <div class="row mTop">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        
                        <?php if($value->product_type == 2 && count($value->product_variations) == 0): ?>
                        <?php continue; ?>
                        <?php endif; ?>
                        

                        <?php if($key % 2 == 0 ): ?>
                        <div class="col-lg-3 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">

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
                                                <div class="ratingStars">
                                                    

                                                    
                                                    


                                                    <?php
                                                        $num = 5 - $value->get_ratings_avg_reviews;
                                                    ?>
                                                    <?php for($x = 1; $x <=  ceil($value->get_ratings_avg_reviews); $x++): ?>
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
                        <div class="col-lg-3 col-md-4 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
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

                                                <div class="ratingStars">
                                                    
                                                    
                                                    

                                                    <?php
                                                    // dd($rat);
                                                        // dd($value->get_ratings->reviews);
                                                        $num = 5 -  $value->get_ratings_avg_reviews;
                                                    ?>
                                                    <?php for($x = 1; $x <=  ceil($value->get_ratings_avg_reviews); $x++): ?>
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
                </div>

            </div>
            <?php if(count($products) > 0): ?>
            <div class="shopNowButton wow animate__animated animate__bounceIn mt-4" data-wow-duration="1.2s">
                <a href="<?php echo e(route('shop')); ?>"><button class="shopButton">Shop Now</button></a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- End Shop -->

    <!-- Start Product Item -->

    <section class="product">
        <div class="container">
            <div class="row wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo e(route('categories',$value->slug )); ?>">
                        <div class="productItem">
                            <div class="productItemHeading">
                                <h4><?php echo e($value->sub_category_name); ?></h4>
                                <h5>All Features</h5>
                            </div>
                            <div class="productItemImage">
                                <?php if(empty($value->image)): ?>
                                        <img src="<?php echo e(asset('assets/No-image.jpg')); ?>"   alt="" height="100px" width="100px"> <br><br><br>
                                    <?php else: ?>
                                        <img src="<?php echo e(url('public/sub-category/' . $value->image)); ?>"   alt="Product image">
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </section>

    <!-- End Product Item -->

    <!-- Start Buy -->

    <section class="buy">
        <div class="offerImage">
            <a href="<?php echo e(route('shop')); ?>"><img src="<?php echo e(url('public/offers/' . $buy_one->image1)); ?>" alt="Offer Image"></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="buyImageBox">
                            <div class="buyImageOne wow animate__animated animate__bounceIn">
                                <img src="<?php echo e(asset('front_assets/images/buyImageOne.webp')); ?>" alt="Buy Image">
                                <div class="buyImageText">
                                    <h2><?php echo e($buy_one->title1); ?></h2>
                                    <h2><span><?php echo e($buy_one->title2); ?></span></h2>
                                </div>
                                <div class="buyImageFree">
                                    <h2><?php echo e($buy_one->title3); ?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="buyImageTwo">
                            <img src="<?php echo e(url('public/offers/' . $buy_one->image2)); ?>" alt="Offer Image">
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
    <script src="<?php echo e(asset('front_assets/js/main.js')); ?>"></script>
    <script src="script.js"></script>


    <?php echo $__env->yieldPushContent('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/index.blade.php ENDPATH**/ ?>