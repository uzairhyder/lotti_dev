<?php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
?>
<style>
    #topBar ul {
        margin-bottom: 0px;
    }

    #topBar {
        position: fixed;
        width: 100%;
        padding: 0 15px;
        top: 110px;
        left: 0;
        z-index: 1000;
        background: #f1f1f1;
        font-size: 14px;
        box-shadow: 0 0px 10px rgba(0, 0, 0, 0.25);
        font-family: montserratLight;
    }

    #topBar ul li {
        position: relative;
        display: inline-block;
    }

    #topBar>ul>li {
        float: left;
    }

    #topBar a {
        display: inline-block;
        padding: 8px 10px;
        color: #000;
        transition: 0.2s ease-out;
        text-decoration: none;
        font-size: 13px;
    }

    ul.subMenu {
        box-sizing: border-box;
        position: absolute;
        top: 100%;
        left: -30px;
    }

    ul.subMenu li {
        background: #fff;
        color: black !important;
    }

    ul.subMenu li a {
        background: #f1f1f1;
        color: black !important;
    }

    #topBar ul.subMenu li a {
        width: 200px;
        padding: 6px 10px;
    }

    #topBar ul.subMenu li a:hover,
    #topBar ul.subMenu li.active>a {
        background: #a1a19e57;
        color: #ff2446 !important;
    }

    .nameAndArrow {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    ul.subMenu ul.subMenu {
        position: absolute;
        top: 0;
        left: 84%;
    }

    @media  only screen and (max-width: 768px) {
        nav#topBar {
            display: none;
        }
    }

    .dropdownAccountName {
        color: #ff2446 !important;
        font-family: 'montserratSemiBold' !important;
        border: none !important;
        font-size: 14px !important;
        margin-right: 20px;
        background-color: #ffffff;
    }



    .dropdownAccount {
        position: relative;
        display: inline-block;
    }

    .dropdownContentAccount {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 180px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 5;
    }

    .dropdownContentAccount a {
        color: black;
        padding: 8px 14px;
        text-decoration: none;
        display: block;
        font-family: montserratLight;
        font-size: 14px;
    }

    .dropdownContentAccount a:hover {
        background-color: #ddd;
    }

    .dropdownAccount:hover .dropdownContentAccount {
        display: block;
    }
</style>
<nav class="navbar color noPrint" id="navbarHeader">
    <div class="container navItemTop">
        <div class="navMenu">
            <ul class="navItem d-flex align-items-center">
                

                <li class="navLink"><a href="#" class="navLink">Customer Care</a></li>
                <li class="navLink"><a href="#" class="navLink">Track My Order</a></li>
                <div class="loginButtons d-flex">
                

                    <?php if(Auth::check() && Auth::user()->role == 2): ?>
                        <li class="navLink"><a href="<?php echo e(route('dashboard')); ?>"
                                class="navLink userName"><?php echo e(Auth::user()->name); ?></a></li>
                    <?php endif; ?>
                    <?php if(Auth::check() && Auth::user()->role == 1): ?>
                        <li class="navLink"><a href="<?php echo e(route('login')); ?>" class="navLink">Sign In</a></li>
                        <li class="navLink"><a href="<?php echo e(route('register')); ?>" class="navLink">Sign Up</a></li>
                    <?php endif; ?>
                    <?php if(!Auth::check()): ?>
                        <li class="navLink"><a href="<?php echo e(route('login')); ?>" class="navLink">Sign In</a></li>
                        <li class="navLink"><a href="<?php echo e(route('register')); ?>" class="navLink">Sign Up</a></li>
                    <?php endif; ?>
                </div>

            </ul>
        </div>
    </div>
    <div class="container-fluid subNavbar">
        <div class="container d-flex centerNavbar">
            <div class="logoImage">
                <a href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(url('public/logos/' . $logo->image)); ?>" alt="logo">
                </a>
            </div>
            <form method="GET" action="<?php echo e(route('shop')); ?>" class="formBox">
                <div class="searchBox">

                    <div class="autocomplete" id="autocomplete-search">

                        

                        <div class="searchBox">
                            <input class="search" type="search" name="search" id="search_product"
                                placeholder="Search..." autocomplete="off" required>
                            <button class="searchButton fa fa-search" type="submit"></button>
                        </div>

                    </div>
                    

                    <input type="submit" id="index_filter_submit" name="" hidden>

                </div>

                
            </form>
            <div class="navMenu  d-flex align-items-center gap-4">
                <a href="<?php echo e(route('wishlist')); ?>">
                    <div class="wishlist">
                        <div class="wishlistIcon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="wishlistName">
                            <p>Wishlist</p>
                            <?php if(Auth::id()): ?>
                                <div class="badgeWishlist"><span><?php echo e($wishlist); ?></span></div>
                            <?php else: ?>
                                <div class="badgeWishlist"><span>0</span></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <a href="<?php echo e(route('cart')); ?>">
                    <div class="cart">
                        <div class="cartIcon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="cartName">
                            <p>Cart</p>
                            <?php if(Auth::id()): ?>
                                <div class="badgeCart"><span id="cartItemCount"><?php echo e($cart_count); ?></span></div>
                            <?php else: ?>
                                <div class="badgeCart"><span id="cartItemCount">0</span></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    

    

    <nav id="topBar">
        <div class="container">
            <ul>
                <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(env('APP_URL')); ?>/shop?category=<?php echo e($value->slug); ?>"><?php echo e($value->parent_category_name); ?> <i class="fa fa-angle-down"></i></a>
                    <ul class="subMenu">
                        <?php $__currentLoopData = $value->get_main_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maincats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>

                            <a href="<?php echo e(env('APP_URL')); ?>/shop?category=<?php echo e($maincats->slug); ?>"><span class="nameAndArrow"><?php echo e($maincats->main_category_name); ?> <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <?php $__currentLoopData = $maincats->get_sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(env('APP_URL')); ?>/shop?category=<?php echo e($subcat->slug); ?>"><?php echo e($subcat->sub_category_name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </nav>
</nav>

<div class="sideNavbar noPrint" id="navbarHeader">
    <div id="nav-icon1" class="sideBarButton" onclick="openNav()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="sideNavbarImage">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(url('public/logos/' . $logo->image)); ?>" alt="logo">
        </a>
    </div>
</div>
<script>
    // Hide SubMenus.
    $(".subMenu").hide();

    // Shows SubMenu when it's parent is hovered.
    $(".subMenu")
        .parent("li")
        .hover(function() {
            $(this).find(">.subMenu").not(":animated").slideDown(300);
            $(this).toggleClass("active ");
        });

    // Hides SubMenu when mouse leaves the zone.
    $(".subMenu")
        .parent("li")
        .mouseleave(function() {
            $(this).find(">.subMenu").slideUp(150);
        });

    // Prevents scroll to top when clicking on <a href="#">
    $('a[href="#"]').click(function() {
        return false;
    });
</script>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/common/navbar.blade.php ENDPATH**/ ?>