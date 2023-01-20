<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Product'); ?>

<style>
    html,
    body {
        position: relative;
    }



    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .nav-pills .nav-link,
    .nav-pills .show>.nav-link {
        width: 100% !important;
        background-color: transparent !important;

    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        width: 100% !important;
        background-color: #ff2446cc !important;
    }
    button.reviewButton {
    background-color: #ffffff !important;
}
.select-dropdown,
.select-dropdown * {
	margin: 0;
	padding: 0;
	position: relative;
	box-sizing: border-box;
    
}
.select-dropdown {
	position: relative;
	/* background-color: #E6E6E6; */
	border-radius: 4px;
}
option {
    background-color: #E6E6E6;
    border: none !important;
}

.select-dropdown select {
	font-size: 1rem;
	font-weight: normal;
	max-width: 100%;
	padding: 8px 24px 8px 10px;
	border: none;
	background-color: #E6E6E6;
		-webkit-appearance: none;
		-moz-appearance: none;
	appearance: none;
    font-family: montserratLight;
    font-size: 14px;
	border-radius: 4px;

}
.select-dropdown select:active, .select-dropdown select:focus {
	outline: none;
	box-shadow: none;
}
.select-dropdown:after {
	content: "";
	position: absolute;
	top: 50%;
	right: 8px;
	width: 0;
	height: 0;
	margin-top: -2px;
	border-top: 5px solid #aaa;
	/* border-right: 5px solid transparent;
	border-left: 5px solid transparent; */
}
.select-dropdown i {
    margin-left: 12px;
}

.addCartIconred i {
    color: #ffff;
    font-size: 20px;
    margin-right: 10px;
    border: 1px solid #ff2446;
    padding: 7px;
    border-radius: 50%;
    background: #ff2446;
}

.sizesBox label,
.sizesBox p{
    font-family: montserratBold;
}
.sizesBox p{
    font-family: montserratBold;
}
.sizesBox .variant_sku p{
    font-family: montserratMedium;
    margin-top: 10px;
}
.addCartForm .productBrand span{
    font-family: montserratLight;
}
#addCartForm .productBrand span label{
    font-family: montserratMedium;
}
.productDescription p{
    font-family: montserratMedium;
}
.label-space label{
    margin-right:2px;
}
.sizesBox.add-box-weidth .label-space label{
    margin-right:5px;
}
.sizesBox.add-box-weidth{
    width: 80%;
}
/* #addCartForm i.fa-star,
.relatedProduct.h4-height i.fa-star{
color:#666;
} */
.relatedProduct.h4-height .productsBox h4{
    height:50px;
}
.top-margin-label{
    margin-top: 10px;
}

</style>

<!-- Start Navbar -->


<!-- End Navbar -->

<!-- Start Sidebar -->


<!-- End Sidebar -->

<!-- Start cart -->

<section class="carts">
    <div class="container productBox">
        <div class="row">
            <div class="col-lg-6">
                <div class="cartBox">
                    <div class="tab-content mt-5 mb-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="productImage">
                                <img id="imgPreview" src="<?php echo e(url('public/products/' . $detail->image)); ?>" alt="Product Image">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php if(!empty($variant_image)): ?>
                            <?php $__currentLoopData = $variant_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">
                                        <div class="productSmallImage picselect" >
                                            <img src="<?php echo e(url('public/variations/' . $variants->image)); ?>" alt="Product Image" id="selectmultiple">
                                        </div>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form id="addCartForm">
                    <input type="hidden" id="hidden_attribute" value>
                    
                    <div class="productPageDetail">
                        <div class="productPageName">
                            <h3><?php echo e($detail->product_name ?? ''); ?></h3>
                        </div>
                        <div class="productBrand label-space">
                            <span><label for="brand">Brand:</label> <?php echo e($detail->get_brand_name->brand_name ?? ''); ?></span>
                        </div>
                        
                        
                        <div class="productPagePrice">
                            <h4>
                                

                                
                                <?php if($detail->product_type == 1): ?>
                                    <?php if($detail->discount_status == null): ?>
                                        <span id="orignal_price">$<?php echo e(number_format($detail->price,2)); ?></span>
                                    <?php endif; ?>

                                    <?php if($detail->discount_status != null): ?>
                                        <span id="orignal_price" class="discount_orignal_price">$<?php echo e(number_format($detail->price,2)); ?></span>
                                        <span id="discounted_price">$<?php echo e(number_format($detail->discounted_price,2)); ?></span></h4>
                                    <?php endif; ?>
                                <?php else: ?>


                                        
                                        <?php if(!empty($detail->product_variations)): ?>
                                        <?php
                                            $first_price = 0;
                                            $last_price = 0;
                                            $all_prices = array();
                                        ?>
                                        <?php $__currentLoopData = $detail->product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php if($variation->product_id == $detail->id ): ?>
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
                        </div>
                        <div class="mt-4 mb-4">
                            <?php
                            $num = 5 - $detail->get_ratings_avg_reviews;
                            ?>
                            <?php for($x = 1; $x <= ceil($detail->get_ratings_avg_reviews); $x++): ?>
                                    <i class="fa fa-star goldenstar "></i>
                            <?php endfor; ?>

                            <?php for($x = 1; $x <= $num; $x++): ?>
                                <i class="fa fa-star blackstar"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="productDescription">

                            <p> <?php echo Str::limit($detail->short_description, 150); ?>

                            </p>
                        </div>
                        <div class="productBrand label-space">
                            <span><label for="categories">Categories:</label> <?php echo e($detail->get_parent_category->parent_category_name ?? ''); ?> &
                                    <?php echo e($detail->get_sub_category->sub_category_name ?? ''); ?></span>
                        </div>
                        
                        

                        
                        <div class="sizesBox">
                            <?php if(!empty($detail->product_type == 2)): ?>
                                <?php if(!empty($detail->product_attributes)): ?>
                                    <?php $__currentLoopData = $detail->product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label for=""><?php echo e($attributes->variant); ?></label>
                                        <select name="<?php echo e(strtolower($attributes->variant)); ?>" id="<?php echo e(strtolower($attributes->variant)); ?>" class="form-control attribute_select">
                                            <?php $__currentLoopData = $attributes->product_additional_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child_attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key == 0): ?>
                                                    <option value="" selected disabled>Choose an option</option>
                                                <?php endif; ?>
                                                <option value="<?php echo e($child_attributes->attribute_id); ?>"><?php echo e($child_attributes->attribute); ?></option>    
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="check_validation_of_variations_dropdowns" id="check_validation_of_variations_dropdowns">
                        </div>


                        <div id="variants-details">
                            <?php echo $__env->make('frontend.partials.get-variant-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>


                        <div class="variant_price inStock">
                            <?php if($detail->product_type == 1): ?>
                                <?php if($detail->stock == 1): ?>
                                <p>In Stock</p>
                                <input type="hidden" name="simple_product" id="simple_product" value="<?php echo e($detail->stock); ?>">
                                <?php else: ?>
                                <p class="outOfStock">Out of stock</p>
                                <input type="hidden" name="simple_product" id="simple_product" value="<?php echo e($detail->stock); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>


                        <?php if(!empty($detail->attributes)): ?>

                            <?php
                                $unique_attr = $detail->attributes->unique('attribute');
                                $count = 0;
                            ?>


                                




                            
                        <?php endif; ?>
                        <div class="quatityDetails">
                            <div class="qty-container">
                                <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                                <input type="text" name="qty" value="1" class="input-qty" readonly />
                                <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="addCartButton">
                                

                                    <?php if($detail->product_type == 1 && $detail->quantity == 0): ?>
                                    <span style="color:red">Out Of Stock</span>
                                    <?php else: ?>
                                    <div class="addCartButton">
                                        <button class="shopButton" type="submit" id="add_cart" data-attributes="<?php echo e($count); ?>"><i class="fa fa-shopping-cart"></i> Add To
                                            Cart</button>
                                    </div>
                                    <?php endif; ?>
                            </div>
                            <?php if($getwishlist): ?>
                            <div class="addCartIconred wishlistload">
                                <a href="<?php echo e(route('removewishlist', $getwishlist->id)); ?>"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i></a>
                            </div>
                            <?php else: ?>

                              <div class="addCartIcon wishlistload">
                                <a href="<?php echo e(route('addwishlist', $detail->slug)); ?>"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>


                        

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>

</section>

<!-- End Cart -->

<!-- Start Reviews -->

<section class="reviews">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <ul class="nav nav-pills reviewsButtons" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="reviewButton active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-One" type="button" role="tab" aria-controls="pills-One"
                            aria-selected="false">
                            <h3>Description</h3>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="reviewButton" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Two" type="button" role="tab" aria-controls="pills-Two"
                            aria-selected="false">
                            <?php if(!empty($ratings)): ?>

                                <h3>Reviews <span>(<?php echo e($review_count); ?>)</span></h3>
                            <?php else: ?>
                                <h3>Reviews <span>(0)</span></h3>
                            <?php endif; ?>
                        </button>
                    </li>
                    

                </ul>


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade  active show" id="pills-One" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="descriptionDetail">
                            <h3>Description</h3>
                            <p><?php echo $detail->description; ?> </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-Two" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="reviewDetail">
                            <div class="row">
                                <div class="ratingHeading">
                                    <h4>Ratings & Reviews of  <?php echo e($detail->product_name ?? ''); ?></h4>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="ratingNumberBox">
                                        <div class="ratingNumber">
                                            <?php if(!(empty( $avg))): ?>
                                            <h2><Span><?php echo e(ceil(round($avg, 1))); ?></Span>/5</h2>

                                            <?php else: ?>
                                                <h2><Span>0</Span>/5</h2>
                                            <?php endif; ?>

                                        </div>
                                        <div class="">
                                            
                                                <?php
                                                $num = 5 - $avg;
                                            ?>
                                            <?php for($x = 1; $x <= ceil($avg); $x++): ?>
                                                    <i class="fa fa-star goldenstar "></i>
                                            <?php endfor; ?>

                                            <?php for($x = 1; $x <= $num; $x++): ?>
                                                <i class="fa fa-star blackstar"></i>
                                            <?php endfor; ?>
                                        </div>
                                         <div class="ratingScore">
                                            <?php if(!empty($review_count)): ?>
                                                <h6><?php echo e($review_count ?? ''); ?> Ratings</h6>
                                            <?php else: ?>
                                                <h6>0 Ratings</h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="ratingNumberBox">
                                        <div class="averageRating">
                                            <div class="filterRating starSmall">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="progress reviewProgress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ratingNumber fontSmall">
                                                <?php if(!empty($five_rating_count)): ?>
                                                    <span>(<?php echo e($five_rating_count ?? ''); ?>)</span>
                                                <?php else: ?>
                                                    <span>(0)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="averageRating">
                                            <div class="filterRating starSmall">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                            </div>
                                            <div class="progress reviewProgress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ratingNumber fontSmall">
                                                <?php if(!empty($four_rating_count)): ?>
                                                    <span>(<?php echo e($four_rating_count ?? ''); ?>)</span>
                                                <?php else: ?>
                                                    <span>(0)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="averageRating">
                                            <div class="filterRating starSmall">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                            </div>
                                            <div class="progress reviewProgress">
                                                <div class="progress-bar" role="progressbar" style="width: 55%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ratingNumber fontSmall">
                                                <?php if(!empty($three_rating_count)): ?>
                                                    <span>(<?php echo e($three_rating_count ?? ''); ?>)</span>
                                                 <?php else: ?>
                                                    <span>(0)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="averageRating">
                                            <div class="filterRating starSmall">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>

                                            </div>
                                            <div class="progress reviewProgress">
                                                <div class="progress-bar" role="progressbar" style="width: 35%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ratingNumber fontSmall">
                                                <?php if(!empty($two_rating_count)): ?>
                                                    <span>(<?php echo e($two_rating_count ?? ''); ?>)</span>
                                                <?php else: ?>
                                                    <span>(0)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="averageRating">
                                            <div class="filterRating starSmall">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                                <i class="fa fa-star blackstar" style="color: black"></i>
                                            </div>
                                            <div class="progress reviewProgress">
                                                <div class="progress-bar" role="progressbar" style="width: 15%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ratingNumber fontSmall">
                                                <?php if(!empty($one_rating_count)): ?>
                                                     <span>(<?php echo e($one_rating_count ?? ''); ?>)</span>
                                                <?php else: ?>
                                                    <span>(0)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="reviewHeadingBox">
                                        <div class="reviewHeading">
                                            <h4>Product Reviews</h4>
                                        </div>
                                        <div class="filters">
                                            <div class="dropdown filterBox">
                                                
                                                <div class="select-dropdown">
                                                    <select id="filter">
                                                        <option value="" disabled selected> Filter</option>
                                                        <option value="recent">Recent</option>
                                                        <option value="high-to-low">High To Low</option>
                                                        <option value="low-to-high">Low To High</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="dropdown filterBox">
                                                
                                                <div class="select-dropdown">
                                                    <select id="filterByRating">
                                                        <option value="" disabled selected>By Rating</option>
                                                        <option value="5">5 Star</option>
                                                        <option value="4">4 Star</option>
                                                        <option value="3">3 Star</option>
                                                        <option value="2">2 Star</option>
                                                        <option value="1">1 Star</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="dropdown filterBox">
                                                <div class="select-dropdown">
                                                    <button id="close_filter" class="btn btn-danger display_none">
                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="rating-div display_none">
                                            <img src="<?php echo e(asset('images/loading.gif')); ?>" alt="loading..." id="loading">
                                        </div>

                                        <div id="ratingPartialComponenet" class="ratingComponenet">
                                            <?php echo $__env->make('frontend.partials.rating-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                


                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

<!-- End Reviews -->

<!-- Start Related Product  -->

<section class="relatedProduct h4-height">
    <div class="container">
        <div class="relatedProductHEading">
            <h2>Related Products</h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($value->product_type == 2 && count($value->product_variations) == 0): ?>
            <?php continue; ?>
            <?php endif; ?>
            

                <?php if($key % 2 == 0): ?>
                    <div class="col-lg-2 col-md-4 col-sm-12 wow animate__animated animate__bounceIn"
                        data-wow-duration="1.2s">
                        <div class="productsBox">
                            <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                                <div class="productTwo">
                                    <div class="productOneImage wishlistProductOneImage">
                                        <img src="<?php echo e(url('public/products/' . $value->image)); ?>" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="<?php echo e(route('product', $value->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="<?php echo e(route('addwishlist', $value->slug)); ?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4><?php echo e($value->product_name); ?></h4>
                                                <p><?php echo Str::limit($value->short_description, 80, ' ...'); ?>.</p>
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
                                            <div class="wishlistProductRating">
                                                
                                                <?php
                                                        $num = 5 - $value->get_ratings_avg_reviews;
                                                    ?>
                                                    <?php for($x = 1; $x <=  ceil($value->get_ratings_avg_reviews); $x++): ?>
                                                            
                                                            <i class="fa fa-star goldenstar"></i>
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
                    <div class="col-lg-2 col-md-4 col-sm-12 wow animate__animated animate__bounceIn"
                        data-wow-duration="1.2s">
                        <div class="productsBox">
                            <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                                <div class="productThree">
                                    <div class="productOneImage wishlistProductOneImage">
                                        <img src="<?php echo e(url('public/products/' . $value->image)); ?>" alt="Product Image">
                                    </div>
                                    <div class="hoverCart">
                                        <div class="hoverImageCart">
                                            <a href="<?php echo e(route('product', $value->slug)); ?>"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="hoverImageHeart">
                                            <a href="<?php echo e(route('addwishlist', $value->slug)); ?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('product', ['slug' => $value->slug])); ?>">
                                     
                                    <div class="productDetails">
                                        <div class="productDetail">
                                            <div class="productName">
                                                <h4><?php echo e($value->product_name); ?></h4>
                                                <p><?php echo Str::limit($value->short_description, 80, ' ...'); ?>.</p>
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
                                            <div class="wishlistProductRating">
                                                
                                                <?php
                                                        $num = 5 - $value->get_ratings_avg_reviews ?? '';
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
            
            
</section>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3000,
        }
    });

    $(document).ready(function() {
        $('.picselect').click(function() {
            // alert('test');
                path = $(this).children('img').first().attr('src');
                $("#imgPreview").attr("src",  path);
            $(this).addClass("active");
        });
    });

    $(document).ready(function() {
        $('.swiper-slide .nav-link').click(function() {
            $('.nav-link').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var buttonPlus = $(".qty-btn-plus");
    var buttonMinus = $(".qty-btn-minus");

    var incrementPlus = buttonPlus.click(function() {
        var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
        $n.val(Number($n.val()) + 1);
    });

    var incrementMinus = buttonMinus.click(function() {
        var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
        var amount = Number($n.val());
        if (amount > 1) {
            $n.val(amount - 1);
        }
    });


    $("#addCartForm").on("submit", function(e) {
        e.preventDefault();

        // let total_attr_count = $(this).attr('data-attributes');
        let form = $('#addCartForm').serializeArray();
        let serialize = [];
        $.each(form.slice(0, -1), function (indexInArray, valueOfElement) { 
            serialize.push(valueOfElement.value)
        });
        
        
        // console.log(form);
        // return false;
        
        $("#variants-details").val();
        var product_type = '<?php echo e($detail->product_type); ?>';
        
        if(product_type == 2){
            var variationsDropdowns = $("#check_validation_of_variations_dropdowns").val();
            if(variationsDropdowns == 'out_of_stock'){
                toastr.error('Product is out of stock !');
                return false;
            };
            
            var is_login = '<?php echo e(Auth::check()); ?>';
            if(is_login == false){
                toastr.error('Please Login First !');
                return false;
            }
            
            if(serialize == "" || variationsDropdowns == 'error'){
                toastr.error('Please Select variation !');
                return false;
            }
        }else{
            
            var simpleProduct = $("#simple_product").val();
            if(simpleProduct != 1){
                toastr.error('Product is out of stock !');
                return false;
            }
        }
        
        
        // var attribute_id = $("#attribute_id").val();
        var hidden_attribute = $("#hidden_attribute").val();
        // console.log(hidden_attribute);
        // return false;
        $.ajax({
            url: "<?php echo e(route('add_to_cart')); ?>",
            type: "GET",
            data: {
                'id': '<?php echo e($detail->id); ?>',
                'quantity': $(".input-qty").val(),
                'attribute_ids': serialize,
                // 'attribute_id' : attribute_id,
                'hidden_attribute' : hidden_attribute,
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                



                if (response.status == 200) {

                    
                    $("#cartItemCount").text(Number($("#cartItemCount").text()) + 1);
                    
                    $('#addCartForm')[0].reset();
                    toastr.success(response.message);
                    $(".loader-bg").addClass('loader-active');
                    setTimeout(() => {
                        window.location.href = "<?php echo e(env('APP_URL')); ?>"+"/product/"+"<?php echo e($slug); ?>";
                    }, 800);
                    
                   
                } else {
                    $(".loader-bg").addClass('loader-active');
                    toastr.error(response.message);
                }


            }
        });

    });


    // Rating filters
    $("#filter").on("change", function(){
        
        ratingFilter($(this).val(), $("#filterByRating").val());
    });
    $("#filterByRating").on("change", function(){
        ratingFilter($("#filter").val(), $(this).val());
    });
    $("#close_filter").on("click", function(){
        
        

        $.ajax({
            type: "GET",
            url: "<?php echo e(route('rating_filters')); ?>",
            data: {
                product_id : '<?php echo e($detail->id); ?>',
                filter: null,
                rating: null,
            },
            beforeSend: function(){
                $("#ratingPartialComponenet").addClass('display_none');
                $(".rating-div").removeClass('display_none');
            },
            success: function (response) {
                $("#close_filter").addClass('display_none'); 
                $("#ratingPartialComponenet").removeClass('display_none');
                $(".rating-div").addClass('display_none');

                $("#ratingPartialComponenet").html("");
                $("#ratingPartialComponenet").html(response);    
                
                
                $("#filter").prop("selectedIndex", 0);
                $("#filterByRating").prop("selectedIndex", 0);

            }
        });


    });
    function ratingFilter(filter = null, rating = null){
        
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('rating_filters')); ?>",
            data: {
                product_id : '<?php echo e($detail->id); ?>',
                filter: filter,
                rating: rating,
            },
            beforeSend: function(){
                $("#ratingPartialComponenet").addClass('display_none');
                $(".rating-div").removeClass('display_none');
            },
            success: function (response) {
                
                $("#close_filter").removeClass('display_none');
                $("#ratingPartialComponenet").removeClass('display_none');
                $(".rating-div").addClass('display_none');

                $("#ratingPartialComponenet").html("");
                $("#ratingPartialComponenet").html(response);


            }
        });

    } 



    $(document).ready(function(){
        $('.wishlistload').on('click',function() {
            // alert('test');
               $(".loader-bg").removeClass('loader-active');
        });
    });





    


</script>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // fetch product variant details
    $(".attribute_select").on("change", function(e){
        
        var selectCount = $(".attribute_select").length;
        var select_values = [];

        $.each($(".attribute_select"), function (indexInArray, valueOfElement) { 
            select_values.push(valueOfElement.value == '' ? 0 : parseInt(valueOfElement.value) );
        });
        // $("#attribute_id").val(select_values);
        $("#hidden_attribute").val(select_values);
        console.log(select_values.join(","));
        // console.log("wow");
        // return false
        
        
        const isBelowThreshold = (currentValue) => currentValue >= 1;
        
        if(select_values.every(isBelowThreshold) == true){
            
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('get_detail_variable_product')); ?>",
                data: {
                    'product_id' : '<?php echo e($detail->id); ?>',
                    'attributes_ids' : select_values.join(",")
                },
                
                // beforeSend: function() {
                //     $(".loader-bg").removeClass('loader-active');
                // },
                success: function(response) {
                    // $(".loader-bg").addClass('loader-active');
                    
                   if(response.is_login == 0){
                        toastr.erro('Please Login first !')
                        return false;
                    }
                    
                    if(response.stock == 1){
                        // validation of variations dropdown .Start
                        $("#check_validation_of_variations_dropdowns").val('validated');
                        // validation of variations dropdown .End
                    }else{
                        // validation of variations dropdown .Start
                        $("#check_validation_of_variations_dropdowns").val('out_of_stock');
                        // validation of variations dropdown .End
                    }

                    $("#variants-details").html("");
                    $("#variants-details").html(response.html);
                    
                }
            });
            
        }else{
            // validation of variations dropdown .Start
            $("#check_validation_of_variations_dropdowns").val('error');
            // validation of variations dropdown .End
        }
        
    });
    // fetch product variant details
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/product.blade.php ENDPATH**/ ?>