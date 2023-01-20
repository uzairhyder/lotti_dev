@php
    $logo = App\Models\BackendModels\Logo::where('type', 'Logo')->first();
@endphp
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

    @media only screen and (max-width: 768px) {
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
                {{-- <li class="navLink"><a href="#" class="navLink">Save More On App</a></li>
                <li class="navLink"><a href="#" class="navLink">Affiliate Program</a></li>
                <li class="navLink"><a href="#" class="navLink">Sell On Shop</a></li> --}}

                <li class="navLink"><a href="#" class="navLink">Customer Care</a></li>
                <li class="navLink"><a href="#" class="navLink">Track My Order</a></li>
                <div class="loginButtons d-flex">
                {{-- @if (Auth::check() && Auth::user()->role == 2)
                    <div class="dropdownAccount">
                        <button class="dropdownAccountName">{{ Auth::user()->name }}&apos;s Account</button>
                        <div class="dropdownContentAccount">
                            <li > <button class="remove-btn-css removecanceled" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">My Profile</button></li>
                            <li>My Orders</li>
                            <li>My Wishlist</li>
                            <li>My Reviews</li>
                            <li>My Returns</li>
                            <li>Logout</li>
                            <a href="#">Test</a>
                        </div>
                    </div>
                @endif --}}

                    @if (Auth::check() && Auth::user()->role == 2)
                        <li class="navLink"><a href="{{ route('dashboard') }}"
                                class="navLink userName">{{ Auth::user()->name }}</a></li>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 1)
                        <li class="navLink"><a href="{{ route('login') }}" class="navLink">Sign In</a></li>
                        <li class="navLink"><a href="{{ route('register') }}" class="navLink">Sign Up</a></li>
                    @endif
                    @if (!Auth::check())
                        <li class="navLink"><a href="{{ route('login') }}" class="navLink">Sign In</a></li>
                        <li class="navLink"><a href="{{ route('register') }}" class="navLink">Sign Up</a></li>
                    @endif
                </div>

            </ul>
        </div>
    </div>
    <div class="container-fluid subNavbar">
        <div class="container d-flex centerNavbar">
            <div class="logoImage">
                <a href="{{ route('home') }}">
                    <img src="{{ url('public/logos/' . $logo->image) }}" alt="logo">
                </a>
            </div>
            <form method="GET" action="{{ route('shop') }}" class="formBox">
                <div class="searchBox">

                    <div class="autocomplete" id="autocomplete-search">

                        {{--
                        <input type="search" name="search" id="search_product" placeholder="Search Themes"
                            autocomplete="off"> --}}

                        <div class="searchBox">
                            <input class="search" type="search" name="search" id="search_product"
                                placeholder="Search..." autocomplete="off" required>
                            <button class="searchButton fa fa-search" type="submit"></button>
                        </div>

                    </div>
                    {{-- <input type="text" name="theme_category" id="theme_category" placeholder="Search Themes"

                        hidden=""> --}}

                    <input type="submit" id="index_filter_submit" name="" hidden>

                </div>

                {{-- <div class="searchBox">
                    <input class="search" type="search" placeholder="Search..." autofocus required>
                    <button class="searchButton fa fa-search" type="submit"></button>
                </div> --}}
            </form>
            <div class="navMenu  d-flex align-items-center gap-4">
                <a href="{{ route('wishlist') }}">
                    <div class="wishlist">
                        <div class="wishlistIcon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="wishlistName">
                            <p>Wishlist</p>
                            @if (Auth::id())
                                <div class="badgeWishlist"><span>{{ $wishlist }}</span></div>
                            @else
                                <div class="badgeWishlist"><span>0</span></div>
                            @endif
                        </div>
                    </div>
                </a>
                <a href="{{ route('cart') }}">
                    <div class="cart">
                        <div class="cartIcon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="cartName">
                            <p>Cart</p>
                            @if (Auth::id())
                                <div class="badgeCart"><span id="cartItemCount">{{ $cart_count }}</span></div>
                            @else
                                <div class="badgeCart"><span id="cartItemCount">0</span></div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="container navItemBottom">
        @foreach ($main as $value)
            <div class="dropdown">
                <li class="navLink"><a href="shop?category={{ $value->slug }}"" class="navLink">{{ $value->parent_category_name }} <i
                            class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                @foreach ($value->get_main_cat as $maincats)
                    <div class="dropdownContent">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="dropdownLinkHeading">
                                        <a href="shop?category={{ $maincats->slug }}">
                                            <h5>{{ $maincats->main_category_name }}</h5>
                                        </a>
                                    </div>
                                    @foreach ($value->get_sub_cat as $subcat)
                                        <div class="dropdownLinks">
                                            <a href="shop?category={{ $subcat->slug }}">{{ $subcat->sub_category_name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div> --}}

    {{-- <nav id="topBar">
        <div class="container">
            @foreach ( $main as $value )
            <ul>
                <li>
                    <a href="#">Home Appliances <i class="fa fa-angle-down"></i></a>
                    <ul class="subMenu">
                        <li>
                            <a href="#"><span class="nameAndArrow">All Small Appliances <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="nameAndArrow">Air Fryer <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="nameAndArrow">Water Heater <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="nameAndArrow">Choppers <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Water Heater</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Rice Cookers</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#">Computing & Mobile <i class="fa fa-angle-down"></i></a>
                    <ul class="subMenu">
                        <li>
                            <a href="#">

                                <span class="nameAndArrow">All Small Appliances

                                    <i class="fa fa-angle-right"></i></span>

                            </a>
                            <ul class="subMenu">
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="nameAndArrow">Air Fryer <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="nameAndArrow">Water Heater <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Rice Cookers</a></li>
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Sandwich Makers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="nameAndArrow">Choppers <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                <li><a href="#">Air Fryer</a></li>
                                <li><a href="#">Water Heater</a></li>
                                <li><a href="#">Stand Mixer</a></li>
                                <li><a href="#">Rice Cookers</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            @endforeach
        </div>
    </nav> --}}

    <nav id="topBar">
        <div class="container">
            <ul>
                @foreach ($main as $value)
                <li>
                    <a href="{{ env('APP_URL') }}/shop?category={{ $value->slug }}">{{ $value->parent_category_name }} <i class="fa fa-angle-down"></i></a>
                    <ul class="subMenu">
                        @foreach ( $value->get_main_cat as $maincats )
                        <li>

                            <a href="{{ env('APP_URL') }}/shop?category={{ $maincats->slug }}"><span class="nameAndArrow">{{ $maincats->main_category_name}} <i
                                        class="fa fa-angle-right"></i></span></a>
                            <ul class="subMenu">
                                @foreach ($maincats->get_sub_cat as $subcat )
                                <li><a href="{{ env('APP_URL') }}/shop?category={{ $subcat->slug }}">{{$subcat->sub_category_name}}</a></li>
                                @endforeach
                            </ul>

                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
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
        <a href="{{ route('home') }}">
            <img src="{{ url('public/logos/' . $logo->image) }}" alt="logo">
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
