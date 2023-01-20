<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Shop'); ?>

<header class="shopImage" style="background-image: url('<?php echo e(url('public/banner/' . $shop->banner_image)); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow animate__animated animate__bounceIn" data-wow-duration="1.2s">
                <div class="contactHeaderHeading">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Shop Header -->

<!-- Start Products -->



<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php if($parent_category): ?>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><?php echo e($parent_category->parent_category_name); ?></li>
                        <?php endif; ?>
                        <?php if($main_category): ?>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="shop?category=<?php echo e($main_category->get_parent_category->slug); ?>"><?php echo e($main_category->get_parent_category->parent_category_name); ?></a></li>
                        <li class="breadcrumb-item" aria-current="page"><?php echo e($main_category->main_category_name); ?></li>
                        <?php endif; ?>
                        <?php if($sub_category): ?>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="shop?category=<?php echo e($sub_category->get_parent_category->slug); ?>"><?php echo e($sub_category->get_parent_category->parent_category_name); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="shop?category=<?php echo e($sub_category->get_main_category->slug); ?>"><?php echo e($sub_category->get_main_category->main_category_name); ?></a></li>
                        <li class="breadcrumb-item" aria-current="page"><?php echo e($sub_category->sub_category_name); ?></li>
                        <?php endif; ?>
                        
                        <?php if($all_categories == true): ?>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item">Search Results</li>
                        <?php else: ?>
                        <?php endif; ?>
                    </ol>
                  </nav>
            </div>
        </div>
        <div class="row">
            

            <div class="col-lg-3">
                <div class="NavSideBar">
                    <div id="search-itme"></div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="filterOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#filterOneTab" aria-expanded="true" aria-controls="filterOneTab">
                                    Product Categories
                                </button>
                            </h2>


                            <div id="filterOneTab" class="accordion-collapse collapse" aria-labelledby="filterOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body scrollBox">

                                    <div class="side_menu">
                                        <ul>
                                            <?php if(count($sub_categories) > 0): ?>
                                                <li class="filter-cross">
                                                    <button id="category-filter" class="close-search display_none"
                                                        onclick="filterReset('category-filter')">
                                                        <i class="fa fa-times-circle" aria-hidden="true"></i> clear
                                                    </button>
                                                </li>
                                                <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input product_sub_categories"
                                                                type="radio" name="sub_categories[]"
                                                                value="<?php echo e($sub_category->id); ?>"
                                                                id="sub-category-<?php echo e($sub_category->id); ?>">
                                                            <label class="form-check-label"
                                                                for="sub-category-<?php echo e($sub_category->id); ?>">
                                                                <?php echo e(ucwords($sub_category->sub_category_name)); ?>

                                                            </label>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="filterTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#filterTwoTap" aria-expanded="false" aria-controls="filterTwoTap">
                                    Product Status
                                </button>
                            </h2>
                            <div id="filterTwoTap" class="accordion-collapse collapse " aria-labelledby="filterTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body ">
                                    <div class="side_menu">
                                        <ul>
                                            <li class="filter-cross">
                                                <button id="stock-filter" class="close-search display_none"
                                                    onclick="filterReset('stock-filter')">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> clear
                                                </button>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input stock_filter" type="radio"
                                                        value="1" id="in_stock">
                                                    <label class="form-check-label" for="in_stock">
                                                        In Stock
                                                    </label>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#reports_tab" aria-expanded="false" aria-controls="reports_tab">
                                    Filter By Price
                                </button>
                            </h2>
                            <div id="reports_tab" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="side_menu">
                                        <ul>
                                            

                                            <li>
                                                 <button id="price-filter" class="close-search display_none" onclick="filterReset('price-filter')">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> clear
                                                </button>
                                                <fieldset>
                                                    <div class="priceRange">
                                                        <input type="text" class="minRange" onkeyup="priceRange()" min="0" id="min" placeholder="Min">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                        <input type="text" class="maxRange" onkeyup="priceRange()" min="0" max="" id="max" placeholder="Max">
                                                        <div class="filterBtn">
                                                            <button id="applyRangeFilter"><span
                                                                    class="price-title">Filter</span></button>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#email_txt_tab" aria-expanded="false"
                                    aria-controls="email_txt_tab">
                                    Average Rating
                                </button>
                            </h2>
                            <div id="email_txt_tab" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="side_menu">
                                        <ul class="filterStarLi">
                                            <li class="filter-cross">
                                                <button id="rating-filter" class="close-search display_none"
                                                    onclick="filterReset('rating-filter')">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> clear
                                                </button>
                                            </li>
                                            <li>
                                                
                                                
                                                    <div class="averageRating">
                                                        
                                                        <div class="filterRating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="ratingNumber">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                
                                                
                                                <div class="averageRating">
                                                    <input class="form-check-input rating_checkbox_list" type="radio" name="rating" value="4" id="rating-4" hidden>
                                                    <label class="form-check-label" for="rating-4">
                                                    <div class="filterRating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="ratingNumber">
                                                        <span>And Up</span>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="averageRating">
                                                    <input class="form-check-input rating_checkbox_list" type="radio" name="rating" value="3" id="rating-3" hidden>
                                                    <label class="form-check-label" for="rating-3">
                                                    <div class="filterRating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="ratingNumber">
                                                        <span>And Up</span>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="averageRating">
                                                    <input class="form-check-input rating_checkbox_list" type="radio" name="rating" value="2" id="rating-2" hidden>
                                                    <label class="form-check-label" for="rating-2">
                                                    <div class="filterRating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="ratingNumber">
                                                        <span>And Up</span>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="averageRating">
                                                    <input class="form-check-input rating_checkbox_list" type="radio" name="rating" value="1" id="rating-1" hidden>
                                                    <label class="form-check-label" for="rating-1">
                                                    <div class="filterRating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                        <i class="fa fa-star blackStar" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="ratingNumber">
                                                        <span>And Up</span>
                                                    </div>
                                                </div>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row" id="shopFilters">
                    <?php echo $__env->make('frontend.partials.shop-component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('front_assets/js/main.js')); ?>"></script>
<script src="script.js"></script>



<script>
    $(document).ready(function(){
            priceRangeBtnDisabile();
        });

        function priceRangeBtnDisabile(){
            
            var min = $("#min").val();
            if(min == ''){
                $("#applyRangeFilter").attr("disabled",true);
                $("#max").attr("disabled",true);
                $("#applyRangeFilter").css("cursor","no-drop");
            }
            
        }

            $("#min").keyup(function(e){ 
                var num = this.value.match(/^\d+$/);
                
                if (num === null || num == 0) {
                    this.value = "";
                    return false
                }

                $("#max").attr("disabled",false);
            });

            $("#max").keyup(function(e){ 
                var num = this.value.match(/^\d+$/);
                
                if (num === null || num == 0) {
                    this.value = "";
                }
            });


            function priceRange(){
                let min = $("#min").val();
                let max = $("#max").val();
                
                if(parseInt(max) >= parseInt(min)){
                    
                    $("#applyRangeFilter").attr("disabled",false);
                    $("#applyRangeFilter").css("cursor","pointer");
                
                }
                else{
                    $("#applyRangeFilter").attr("disabled",true);
                    $("#applyRangeFilter").css("cursor","no-drop");
                }
                
                
                
            }



            // ---------------------------------Price Filter validation end--------------------------------------------------

    $(document).ready(function(){
        let queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        let search = urlParams.get('search');
        
        if(search){
            $("#search-itme").html(`
                <p>${search}</p>
                <button id="close-search" class="close-search" onclick="closeSearch()">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> clear
                </button>
            `);
            $("#filterOneTab").addClass("show");
        }else{
            $("#search-itme").addClass("display_none");
        }

        
    });
    
    $(".ratingNumber span").on("click", function(){
            $.each($(".ratingNumber span"), function (indexInArray, valueOfElement) { 
                 $(this).removeClass("active");
            });
            $(this).addClass("active");
    });
  

    $(".product_sub_categories").on("change", function() {
            // this cross button
            $("#category-filter").removeClass("display_none");

            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');

            localStorage.setItem('product_sub_category', $(this).val());
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,
                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });

            
    });


    $("#in_stock").on("change", function() {
            // this cross button
            $("#stock-filter").removeClass("display_none");

            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');

            localStorage.setItem('in_stock', $(this).val());

            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,

                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });

        });



        $("#applyRangeFilter").on("click", function(){
            // this cross button
            $("#price-filter").removeClass("display_none");

            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');

            let min = $("#min").val();
            let  max = $("#max").val();
            
            // if($("#min").val() == null || $("#min").val() == 0){
            //     min = 1;
            // }

            // if($("#min").val() < $("#max").val()){
            //     min = $("#max").val();
            //     max = $("#min").val();
                
            // }else{
            //     min = $("#min").val();
            //     max = $("#max").val();
            // }


            // console.log(typeof(parseInt(min))+'-'+parseInt(min)+"-----------"+typeof(parseInt(max))+'-'+parseInt(max)+'------'+ (min <= max ? 'min < max': 'max > min') );
            
            // let minimum = $(".minRange").val();
            // let maximum = $(".maxRange").val();
            // console.log(minimum+"------"+maximum);

            if(parseInt(max) <= parseInt(min) ){
                
                toastr.error('Sorry, maximum price range must be greater.');
                $("#max").val("");
                $("#min").focus();
                $("#applyRangeFilter").attr("disabled",true);
                $("#applyRangeFilter").css("cursor","no-drop"); 
                return false
            }else{
                $("#applyRangeFilter").attr("disabled",false);
                $("#applyRangeFilter").css("cursor","pointer");  
            }

            // alert('Min: '+min+'--------Max'+max)
            localStorage.setItem('start_range', min);
            localStorage.setItem('end_range', max);

            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,

                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });



        });

       
        
           
     
    
        $(".rating_checkbox_list").on("change", function() {
            // this cross button
            $("#rating-filter").removeClass("display_none");
            
            
            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');

            if(search){
                window.history.pushState("Lotti", "Lotti | Shopping ", "<?php echo e(env('APP_URL')); ?>/shop?search="+search);
            }
            
            localStorage.setItem('rating_star', $(this).val());


            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,

                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });

        });





        function closeSearch(){
        
        $("#search_product").val("");
        $("#search-itme").addClass("display_none");
        window.history.pushState("object or string", "Title", "<?php echo e(env('APP_URL')); ?>/shop");
            
            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');
            
            
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,
                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });
    }



    function filterReset(filtername){
        
        if(filtername == 'category-filter'){
            
            $(".product_sub_categories").each(function(index,val) {
                // $(".product_sub_categories").prop("checked", $(".product_sub_categories").is(":checked"));
                $(this).prop('checked', false);
            });

            localStorage.removeItem("product_sub_category");
            ajaxRequestForFilter();
            $("#"+filtername).addClass("display_none");

        }

        if(filtername == 'stock-filter'){
            // for multipe
            // $(".stock_filter").each(function(index,val) {
            //     $(".stock_filter").prop("checked", $(".stock_filter").is(":checked"));
            // });
            
            // for single
            $(".stock_filter").prop("checked", $(this).is(":checked"));

            localStorage.removeItem("in_stock");
            ajaxRequestForFilter();
            
            $("#"+filtername).addClass("display_none");
        }
        if(filtername == 'price-filter'){
            localStorage.removeItem("start_range");
            localStorage.removeItem("end_range");
            ajaxRequestForFilter();
            $("#"+filtername).addClass("display_none");
        }

        if(filtername == 'rating-filter'){

            // for multipe
            $(".rating_checkbox_list").each(function(index,val) {
                // $(".rating_checkbox_list").prop("checked", $(".rating_checkbox_list").is(":checked"));
                $(this).prop('checked', false);
                
            });
            
            $.each($(".ratingNumber span"), function (indexInArray, valueOfElement) { 
                 $(this).removeClass("active");
            });
            // $(".rating_checkbox_list").prop("checked", $(".rating_checkbox_list").is(":checked"));

            localStorage.removeItem("rating_star");
            ajaxRequestForFilter();
            
            $("#"+filtername).addClass("display_none");

        }
        

        
    }


    function ajaxRequestForFilter(){
        // $("#search_product").val("");
        // $("#search-itme").addClass("display_none");
            
            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let search = urlParams.get('search');
            
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('shop_filter')); ?>',
                data: {
                    'sub_category': localStorage.getItem("product_sub_category") ? localStorage.getItem("product_sub_category") : '',
                    'in_stock': localStorage.getItem("in_stock") ? localStorage.getItem("in_stock") : '',
                    'start_range': localStorage.getItem("start_range") ? localStorage.getItem("start_range") : '',
                    'end_range': localStorage.getItem("end_range") ? localStorage.getItem("end_range") : '',
                    'rating_star': localStorage.getItem("rating_star") ? localStorage.getItem("rating_star") : '',
                    'search': search,
                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function (response) {
                    $(".loader-bg").addClass('loader-active');
                    
                    $("#shopFilters").html("");
                    $("#shopFilters").html(response);
                    console.log(response)

                }

            });
    }
    // $(".accordion-item").mouseover(function () { 
    //     window.history.pushState("object or string", "Title", "<?php echo e(env('APP_URL')); ?>/shop");
    // });

        

            
           


            // $("#sale_end").on("change", function(){
            //     var sale_start = $("#sale_start").val();
            //     var sale_end = $("#sale_end").val();
                
            //     if(sale_start == ''){
            //         toastr.error('Please add sale start date.');
            //         $("#sale_start").focus();
            //         return false
            //     }
            //     if(new Date(sale_start) >= new Date(sale_end)){
            //         $("#sale_end").val("");
            //         $("#sale_end").focus();
            //         toastr.error('Sale end date must be greate than sale start date.');
            //     }
            // });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/shop.blade.php ENDPATH**/ ?>