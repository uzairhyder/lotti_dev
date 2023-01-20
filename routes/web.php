<?php

use Carbon\Carbon;
use App\Models\BillingInfo;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\BackendModels\Product;
use App\Models\FrontendModels\Review;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Models\ProductAdditionalAttribute;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\BillingInfoController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\VariantController;
use App\Http\Controllers\LoginApi\GoogleController;
use App\Http\Controllers\OrderManagementController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LoginApi\FacebookController;
use App\Http\Controllers\OrderNotificationController;
use App\Http\Controllers\Backend\PageContentController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\CancellationController;
use App\Http\Controllers\Backend\MainCategoryController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\AttributeValueControler;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\ParentCategoryController;
use App\Http\Controllers\Backend\ShippingMethodController;
use App\Http\Controllers\Backend\TermsConditionController;
use App\Http\Controllers\Frontend\UserDashboardController;

// Auth::routes();
//
Route::get('admin', function () {
    return view('auth.login');
})->name('/');

Route::get('filter', function(){

    $variableProductQeury = Product::where('product_type',2);

    $start = 5;
    $end = 500;
    $variableProductQeury->with('product_variations_filter', function($q) use ($start, $end){
        $q->whereBetween('regular_price',[(int) $start, (int) $end]);
    });

    $queries = $variableProductQeury->get();

    $array = array();
    foreach($queries as $q){

        if(count($q->product_variations_filter) > 0){
            array_push($array , $q);
        }
    }
    $collection = collect($array);

    return $collection;


});


Route::get('session',function(){
    session()->forget('var_product_id');
    return 'session cleared';
});

Route::post('/login',[AdminController::class,'login'])->name('login');

// ADMIN PANEL ROUTES---------------------------------------
Route::group(['middleware' =>  ['preventBackHistory','adminmiddleware'],'prefix' => 'admin'],function () {
    // DASHBOARD
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-home');
    Route::post('logout',[AdminController::class,'adminlogout'])->name('logout');
    // api resources
    // Route::apiResources(['logo' => 'App\Http\Controllers\Backend\LogoController']);
    Route::apiResources(['homecontent' => 'App\Http\Controllers\Backend\HomeController']);
    Route::apiResources(['gallery' => 'App\Http\Controllers\Backend\GalleryController']);


    // gallery  routes
    Route::get('create-gallery', [GalleryController::class, 'create'])->name('create-gallery');
    Route::get('edit-gallery/{id}', [GalleryController::class, 'edit'])->name('edit-gallery');
    Route::Post('update-gallery/{id}', [GalleryController::class, 'update'])->name('update-gallery');
    Route::post('gallery-delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
    Route::get('gallery-status/{id}',[GalleryController::class,'status'])->name('gallery-status');

    // tesimonial route
    Route::get('testimonial-index', [TestimonialController::class, 'index'])->name('testimonial-index');
    Route::get('testimonial-create', [TestimonialController::class, 'create'])->name('testimonial-create');
    Route::post('testimonial-store', [TestimonialController::class, 'store'])->name('testimonial-store');
    Route::get('edit-testimonial/{id}', [TestimonialController::class, 'edit'])->name('edit-testimonial');
    Route::post('update-testimonial/{id}', [TestimonialController::class, 'update'])->name('update-testimonial');
    Route::post('testimonial-delete', [TestimonialController::class, 'destroy'])->name('testimonial-delte');
    Route::get('testimonial-status/{id}', [TestimonialController::class, 'status'])->name('testimonial-status');

    // faqs route
    Route::resource('faqs', FaqController::class);
    Route::get('faqs-status/{id}', [FaqController::class, 'status'])->name('faqs-status');

    // portfolio route
    Route::resource('portfolio', PortfolioController::class);
    Route::get('portfolio-status/{id}', [PortfolioController::class, 'status'])->name('portfolio-status');

    // Inquiry route
    Route::get('contact-index', [InquiryController::class, 'index'])->name('contact-index');
    Route::post('delete-contact/{id}', [InquiryController::class, 'deletecontact'])->name('delete-contact');
    Route::get('view-inquiry/{id}', [InquiryController::class, 'showcontact'])->name('view-inquiry');

    // Package Management Routes
    Route::resource('package', PackageController::class);
    Route::get('package-status/{id}', [PackageController::class, 'status'])->name('package-status');

    Route::resource('shipping',ShippingController::class);
    Route::get('shipping-status/{id}',[ShippingController::class,'status'])->name('shipping-status');

    Route::resource('shipping-method',ShippingMethodController::class);
    Route::get('shipping-method-status/{id}',[ShippingMethodController::class,'status'])->name('shipping-method-status');

    // Configurations
    Route::group(['prefix' => 'configuration'],function(){
        Route::resource('configuration', ConfigurationController::class);
        // Route::get('shipping-status/{id}',[ConfigurationController::class,'status'])->name('shipping-status');
        Route::resource('social', SocialController::class);



    });

    // Service
    Route::resource('service', ServiceController::class);

    // Page Content routes
     Route::group(['prefix' => 'cms'] ,function() {
        Route::resource('logo',LogoController::class);
        Route::resource('page-content',PageContentController::class);
        Route::resource('terms-conditions', TermsConditionController::class);
        Route::resource('privacy-policy', PrivacyPolicyController::class);
        Route::resource('banner',BannerController::class);
        Route::resource('page',PageController::class);
        Route::resource('offers',OfferController::class);
    });


    // category routes
    Route::group(['prefix' => 'category'],function(){
        // Parent category routes
        Route::resource('parent-category',ParentCategoryController::class);
        Route::get('parent-category-status/{id}',[ParentCategoryController::class,'status'])->name('parent-category-status');

        // Main category routes
        Route::resource('main-category',MainCategoryController::class);
        Route::get('main-category-status/{id}',[MainCategoryController::class,'status'])->name('main-category-status');

        // Sub category routes
        Route::resource('sub-category',SubCategoryController::class);
        Route::get('get_main_category',[SubCategoryController::class,'maincategory'])->name('get_main_category');
        Route::get('sub-category-status/{id}',[SubCategoryController::class,'status'])->name('sub-category-status');
        Route::post('feature',[SubCategoryController::class,'featurecategory'])->name('feature');




    });

    // order notification
    Route::post('order-notification', [OrderNotificationController::class,'order_notification'])->name('order_notification');
    Route::post('view-all-order-notification', [OrderNotificationController::class,'view_all_order_notification'])->name('view_all_order_notification');


    // OrderManagement
    Route::group(['prefix' => 'orders'],function(){
        Route::resource('orderManagement', OrderManagementController::class);
        Route::post('order-status/{id}', [OrderManagementController::class,'order_status'])->name('order.status');
        Route::get('invoice/{id}', [OrderManagementController::class,'invoice_index'])->name('invoice.index');
        Route::resource('cancellation-policy',CancellationController::class);
        Route::get('cancellation-status/{id}',[CancellationController::class,'status'])->name('cancellation-status');
    });

    Route::get('cancel-status/{id}',[OrderManagementController::class,'cancelstatus'])->name('cancel-status');
    Route::get('refund-status/{id}',[OrderManagementController::class,'refundstatus'])->name('refund-status');



    //  Product Routes

     Route::resource('product',ProductController::class);
     Route::get('get_products',[ProductController::class,'getproduct'])->name('get_products');
     Route::get('save_tags/{id}',[ProductController::class,'savetags'])->name('save_tags');
     Route::post('multiple_image',[ProductController::class,'multipleimage'])->name('multiple_image');
     Route::post('single_image',[ProductController::class,'singleimage'])->name('single_image');
     Route::get('save_quantity/{id}',[ProductController::class,'savestock'])->name('save_quantity');
     Route::get('get_main_category',[ProductController::class,'maincategory'])->name('get_main_category');
     Route::get('get_sub_category',[ProductController::class,'subcategory'])->name('get_sub_category');
     Route::get('product-status/{id}',[ProductController::class,'status'])->name('product-status');
     Route::get('get_brand_name',[ProductController::class,'brand'])->name('get_brand_name');
     Route::get('get_product',[ProductController::class,'getproduct'])->name('get_product');
     Route::get('updateproduct',[ProductController::class,'updateproduct'])->name('updateproduct');
     Route::get('get_last_attr',[ProductController::class,'last_att'])->name('get_last_attr');
     Route::get('save_qty',[ProductController::class,'saveqty'])->name('save_qty');
     Route::get('get_attr',[ProductController::class,'getattr'])->name('get_attr');


     Route::post('product_variants',[ProductController::class,'product_variants'])->name('add.product_variants');
     Route::get('remove_product_variants',[ProductController::class,'remove_product_variants'])->name('remove.product_variants');
     Route::get('variant_attributes',[ProductController::class,'variant_attributes'])->name('load.variant_attributes');
     Route::get('product-attributes',[ProductController::class,'add_attribute'])->name('show.product_attributes');
     Route::post('define_product_variant',[ProductController::class,'define_product_variant'])->name('add.define_product_variant');
     Route::post('define_product_variant_edit/{id}',[ProductController::class,'define_product_variant_edit'])->name('edit.define_product_variant');


    //  edit tabs
     Route::post('product/{id}',[ProductController::class,'updateproductdata'])->name('update-prevdata');
     Route::get('product/edit/{id}',[ProductController::class,'edit_attribute'])->name('edit.product');
     Route::get('product-variation',[ProductController::class,'product_variation'])->name('add.product_variation');
     Route::post('product-variation',[ProductController::class,'store_product_variation'])->name('add.product_variation');
     Route::get('edit-product-variation/{id}',[ProductController::class,'edit_product_variation'])->name('edit.product_variation');
     Route::get('delete-variation/{id}',[ProductController::class,'delete_variation'])->name('delete-variation');
     Route::get('remove-variation-session/{id}',[ProductController::class,'remove_session'])->name('remove-variation-session');

     Route::get('product-attributes/edit/{id}',[ProductController::class,'edit_product_attr'])->name('edit.product_attributes');



    // Coupon routes

    Route::resource('coupon',CouponController::class);
    Route::get('coupon-status/{id}',[CouponController::class,'status'])->name('coupon-status');
    Route::get('get_attributes_all',[CouponController::class,'getdata'])->name('get_attributes_all');
    Route::get('search_products_attr', [CouponController::class,'selectSearch'])->name('search_products_attr');
    Route::get('products_attr_variation', [CouponController::class,'variationSearch'])->name('products_attr_variation');
    //  Product Variants
    Route::resource('variants',VariantController::class);
    Route::get('variants-status/{id}',[VariantController::class,'status'])->name('variants-status');
    Route::get('attribute-value/{id}',[AttributeValueControler::class,'attributevalue'])->name('attribute-value');
    Route::resource('attribute-value',AttributeValueControler::class);
    Route::get('attribute-status/{id}',[AttributeValueControler::class,'status'])->name('attribute-status');
    //  Brand Routes
    Route::resource('brand',BrandController::class);
    Route::get('get_main_category',[BrandController::class,'maincategory'])->name('get_main_category');
    Route::get('brand-status/{id}',[BrandController::class,'status'])->name('brand-status');
    Route::get('get_brand_name',[BrandController::class,'brand'])->name('get_brand_name');


    // Location routes
    Route::resource('location',LocationController::class);
    Route::get('location-status/{id}',[BrandController::class,'status'])->name('location-status');


    // Blog routes

        Route::get('blog-index',[BlogController::class,'index'])->name('blog-index');
        Route::get('blog-create',[BlogController::class,'create'])->name('blog-create');
        Route::post('blog-store',[BlogController::class,'store'])->name('blog-store');
        Route::get('blog-edit/{id}',[BlogController::class,'edit'])->name('blog-edit');
        Route::post('blog-update/{id}',[BlogController::class,'update'])->name('blog-update');
        Route::get('blog-delete/{id}',[BlogController::class,'delete'])->name('blog-delete');
        Route::get('blog-status/{id}',[BlogController::class,'status'])->name('blog-status');

    // Pages route
    Route::get('page-status/{id}', [PageController::class, 'status'])->name('page-status');

    // Review Routes
    Route::get('reviews',[ReviewController::class,'index'])->name('reviews');
    Route::get('reviews-detail/{id}',[ReviewController::class,'details'])->name('reviews-detail');
    Route::get('reviews-status/{id}',[ReviewController::class,'status'])->name('reviews-status');
    Route::post('review-toggle',[ReviewController::class,'reviewtoggle'])->name('review-toggle');
    Route::post('review-delete/{id}',[ReviewController::class,'deletereview'])->name('review-delete');

    // User Management
    Route::get('user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::post('user-delete/{id}', [UserController::class, 'delete'])->name('user-delete');
    Route::get('user-status/{id}', [UserController::class, 'status'])->name('user-status');


    // Subscription
    Route::get('subscription',[SubscriptionController::class,'index'])->name('subscription');
    Route::post('subscription-delete/{id}',[SubscriptionController::class,'delete'])->name('subscription-delete');
    // simple route
    Route::get('/create_content', [App\Http\Controllers\Backend\HomeController::class, 'create_view'])->name('create_content');
});

    // Frontend Routes
    Route::group(['middleware' => ['Public_check']], function () {
        Route::get('/',[FrontendController::class,'index'])->name('home');
        Route::get('register',[FrontendController::class,'register'])->name('register');
        Route::get('login',[FrontendController::class,'login'])->name('login');
        Route::get('forget-password',[FrontendController::class,'forget'])->name('forget-password');
        Route::get('terms-conditions',[FrontendController::class,'terms'])->name('terms-conditions');
        Route::get('privacy-policy',[FrontendController::class,'privacy'])->name('privacy-policy');
        Route::get('category',[FrontendController::class,'category'])->name('category');
        Route::get('shop',[FrontendController::class,'shop'])->name('shop');
        Route::get('shop-filter',[FrontendController::class,'shop_filter'])->name('shop_filter');
        Route::get('product/{slug}',[FrontendController::class,'product'])->name('product');
        Route::get('get_detail_variable_product',[ProductController::class,'get_detail_variable_product'])->name('get_detail_variable_product');
        Route::get('rating-filters',[ProductController::class,'rating_filters'])->name('rating_filters');
        Route::get('close-rating-filters',[ProductController::class,'close_rating_filters'])->name('close_rating_filters');

        Route::get('cart',[FrontendController::class,'cart'])->name('cart');
        Route::get('add-cart/{slug}',[CartController::class,'addcart'])->name('addcart');
        Route::get('add-to-cart',[CartController::class,'add_to_cart'])->name('add_to_cart');
        Route::get('cart-bulk-checkbox-all',[CartController::class,'cart_bulk_checkbox_all'])->name('cart_bulk_checkbox_all');
        Route::get('single-cart-checkbox',[CartController::class,'single_cart_checkbox'])->name('single_cart_checkbox');
        Route::get('item-inc-calculation',[CartController::class,'item_inc_calculation'])->name('item_inc_calculation');
        Route::get('item-dec-calculation',[CartController::class,'item_dec_calculation'])->name('item_dec_calculation');
        Route::get('cart-items-remove',[CartController::class,'cart_items_remove'])->name('cart_items_remove');

        Route::get('wishlist',[FrontendController::class,'wishlist'])->name('wishlist');
        Route::get('contact',[FrontendController::class,'contact'])->name('contact');
        Route::post('inquiry',[FrontendController::class,'inquiry'])->name('inquiry');
        Route::get('security',[FrontendController::class,'security'])->name('security');
        Route::post('verifiy-email',[FrontendController::class,'verifyemail'])->name('verifiy-email');
        Route::post('verifiy-reset',[FrontendController::class,'verifyreset'])->name('verifiy-reset');
        Route::post('user-save',[FrontendController::class,'usersave'])->name('user-save');
        Route::get('otp-verify',[FrontendController::class,'otpverify'])->name('otp-verify');
        Route::post('user-login',[FrontendController::class,'userlogin'])->name('user-login');
        Route::post('forget',[FrontendController::class,'forgetemail'])->name('forget');
        Route::get('add-wishlist/{slug}',[FrontendController::class,'addwishlist'])->name('addwishlist');
        Route::get('remove-wishlist/{slug}',[FrontendController::class,'removewishlist'])->name('removewishlist');
        Route::get('remove-cart/{id}',[CartController::class,'removecart'])->name('removecart');
        Route::get('category-data/{slug}',[FrontendController::class,'categorydata'])->name('category-data');
        Route::get('update-password',[FrontendController::class,'updatePassword'])->name('update-password');
        Route::post('update-password-process',[FrontendController::class,'updatePasswordProcess'])->name('update-password-process');
        Route::post('checkout',[FrontendController::class,'checkout'])->name('checkout');
        Route::get('coupon-code',[FrontendController::class,'coupon_code'])->name('coupon_code');
        Route::get('shipping',[FrontendController::class,'shipping'])->name('shipping');
        Route::get('cash-on-delivery',[FrontendController::class,'cash_on_delivery'])->name('cash_on_delivery');
        Route::get('payment',[FrontendController::class,'paypal'])->name('payment');
        Route::get('stripe-success',[FrontendController::class,'stripe'])->name('stripe.success');
        Route::get('stripe-fail',[FrontendController::class,'stripe_fail'])->name('stripe.fail');
        Route::get('billing',[BillingInfoController::class,'index'])->name('billing');

        Route::post('change_address',[FrontendController::class,'change_address'])->name('change_address');
        Route::post('api/fetch-cities', [FrontendController::class, 'fetchcities']);
        // social login
        Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
        Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);

        Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
        Route::get('login/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

        Route::get('categories/{slug}',[FrontendController::class,'categoryproducts'])->name('categories');
        Route::get('get_nav_cat',[FrontendController::class,'sidebarcategories'])->name('get_nav_cat');
    });


// User Dashboard Routes
Route::middleware(['preventBackHistory','usermiddleware'])->group(function () {
    Route::get('dashboard',[UserDashboardController::class,'userdashboard'])->name('dashboard');
    Route::post('update-user',[UserDashboardController::class,'updatedauser'])->name('update-user');
    Route::get('user-address/{id}',[UserDashboardController::class,'user_address'])->name('user-address');
    Route::post('update-address',[UserDashboardController::class,'update_address'])->name('update_address');
    Route::get('security',[UserDashboardController::class,'security'])->name('security');
    Route::get('email-verification',[UserDashboardController::class,'emailverify'])->name('email-verification');
    Route::post('user-profile',[UserDashboardController::class,'userprofile'])->name('user-profile');
    Route::post('user-subscription',[UserDashboardController::class,'usersubscription'])->name('user-subscription');
    Route::post('cancel-subscription',[UserDashboardController::class,'cancelsubscription'])->name('cancel-subscription');
    Route::post('update-password',[UserDashboardController::class,'updatepassword'])->name('update-password');
    Route::post('user-logout',[UserDashboardController::class,'userlogout'])->name('user-logout');
    Route::post('verify-mobile',[UserDashboardController::class,'verifymobile'])->name('verify-mobile');
    Route::post('verify-email',[UserDashboardController::class,'verifyemail'])->name('verify-email');
    Route::post('verify-mobile-otp',[UserDashboardController::class,'verifymobileotp'])->name('verify-mobile-otp');
    Route::get('change-email',[UserDashboardController::class,'changeemail'])->name('change-email');
    Route::post('store-mobile',[UserDashboardController::class,'storemobile'])->name('store-mobile');
    Route::post('store-reviews',[UserDashboardController::class,'storereviews'])->name('store-reviews');
    Route::post('api/fetch-states', [UserDashboardController::class, 'fetchState']);
    Route::get('order-cancel', [UserDashboardController::class, 'order_cancel'])->name('order_cancel');
    Route::get('order-tracking', [UserDashboardController::class, 'order_tracking'])->name('order_tracking');
    Route::get('order-verification', [UserDashboardController::class, 'order_verification'])->name('order_verification');
    Route::get('order-details', [UserDashboardController::class, 'order_details'])->name('order_details');
    Route::get('orders-filter', [UserDashboardController::class, 'orders_filter'])->name('orders_filter');
    Route::get('review_products',[UserDashboardController::class,'getreviewproduct'])->name('review_products');


    Route::get('edit_review',[UserDashboardController::class,'editreview'])->name('edit_review');
    Route::post('update-reviews',[UserDashboardController::class,'updatereview'])->name('update-reviews');
    Route::get('cancel_order',[UserDashboardController::class,'ordercancellation'])->name('cancel_order');

    Route::get('refund_order_request',[UserDashboardController::class,'refundorderrequest'])->name('refund_order_request');
    Route::post('order_refund',[UserDashboardController::class,'refundorder'])->name('order_refund');
    Route::get('order_refund_data',[UserDashboardController::class,'refunddata'])->name('order_refund_data');
    Route::get('get_refunded_all',[UserDashboardController::class,'getrefundall'])->name('get_refunded_all');

    Route::get('order_cancel_data',[UserDashboardController::class,'ordercanceldata'])->name('order_cancel_data');
    Route::get('get_cancelled_all',[UserDashboardController::class,'getcancelledall'])->name('get_cancelled_all');
});

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache has been cleared";
})->name('clear.cache');

Route::any('{url}', function () {
    return view('frontend.404');
})->where('url', '.*');
