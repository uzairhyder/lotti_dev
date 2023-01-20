<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Dashboard'); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<style>
    .content-input.option-no-00,
    .content-input.option-no-05 {
        display: block;
    }

    .content-input {
        margin-top: 1rem;
        display: none;
    }

    /* .payment-return{
width: 30%;
    } */
    .payment-return input {
        width: 100%;
        border: 1px solid #cbcbcb;
        margin-top: 0px;

    }

    .payment-return select {
        width: 100%;
        font-size: 16px;
        padding: 7px 30px 7px 8px;
        border: none;
        box-shadow: 0px 0px 10px silver;
        background-color: #fff;
        color: #b2b2b2;
        outline: none;
    }
</style>
<style>
    .goldenstar {
        color: #ffc700;
    }


    .tableHead tr th {
        font-family: montserratSemiBold;
        text-align: center !important;
    }

    .tableBody tr {
        font-family: montserratLight;
        text-align: center;
    }

    .dataTables_info,
    .dataTables_paginate {
        font-family: montserratLight;
    }

    .productImg {
        width: 40px;
        height: 40px;
        overflow: hidden;
        margin: auto;
    }

    .productImg img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .dataTables_wrapper {
        overflow: scroll;
    }
</style>
<style>
    .tabel-line {
        border-bottom: 2px solid #989898;
        min-width: 60%;
        max-width: 100%;
        /* min-height: 24px;
        max-height: 100%; */
        padding: 1px;
        margin: 0px;
        margin-left: 1rem;
    }

    .background-color-total {
        background-color: #fff;
        color: #646364;
    }

    .cstm-invoice-tabel {
        width: 100%;
        overflow: scroll;
    }


    .cstm-invoice-tabel .tabel,
    th {
        border: 2px solid #dae1e7 !important;
    }

    td {
        font-family: montserratRegular !important;
        color: #646364 !important;
        font-size: 15px !important;
        border: 2px solid #dae1e7 !important;
    }


    .invoice-email {
        display: flex;
        align-items: baseline;
        margin-left: 20px;
    }

    .login-sec-box h1.invoice-no-heading {
        font-size: 30px;
        font-family: montserratBold;
        color: #646364;

    }

    .print-btn-css {
        left: auto;
        right: 10px;
        color: #ff2446;
    }

    .print-btn-css i {
        font-size: 30px;
    }

    @media  print {
        .noPrint {
            display: none;
        }

        @page  {
            margin-top: 0;
            margin-bottom: 0;
        }

        .tabel-line {
            border-bottom: 2px solid #989898;
            min-width: 26%;
            max-width: 100%;
            /* min-height: 24px;
    max-height: 100%; */
            padding: 1px;
            margin: 0px;
            margin-left: 1rem;
        }

        .print-btn-css {
            left: auto;
            right: 10px;
            color: #ff2446;
        }

        .print-btn-css i {
            font-size: 30px;
        }

        .background-color-total {
            background-color: #fff;
            color: #646364;
        }

        .cstm-invoice-tabel {
            width: 100%;
            overflow: unset;
        }


        .cstm-invoice-tabel .tabel,
        th {
            border: 2px solid #dae1e7 !important;
        }

        td {
            font-family: montserratRegular !important;
            color: #646364 !important;
            font-size: 15px !important;
            border: 2px solid #dae1e7 !important;
        }


        .invoice-email {
            display: flex;
            align-items: baseline;
            margin-left: 20px;
        }

        .login-sec-box h1.invoice-no-heading {
            font-size: 30px;
            font-family: montserratBold;
            color: #646364;

        }

        .main-dashboard {
            width: 100%;
        }
    }

    .save-button {
        border-radius: 4px;
    }

    .add-address .save-button {
        width: 100%;
        padding: 12px 1rem;
        text-align: center;
        margin: 8px 0px;
    }

    .select-reason.cstm-select-width {
        width: 50%;
        margin: 1rem 0px;
    }

    .margin-top-zer0 {
        margin-top: 0px !important;
    }

    .phone-img-on-tabel {
        width: 60px;
        margin: auto;
        height: 52px;
    }

    .phone-img-on-tabel img {
        width: 100%;
        height: 100%;
        object-fit: contain
    }

    .gold {
        color: #ffc700 !important;
    }

    
    .cancelation-reason{
        padding: 8px 0px;
    }
    .cancelation-reason .lotti-retail-review p{
        border-bottom: 2px solid #b5b5b5;
        font-size: 16px;
        padding-bottom: 5px;
    }
    .cancelation-reason .lotti-retail-review h4{
        font-size: 15px;
        margin-top: 5px;
        color: #ff2446;
        margin-bottom: 0px;
        font-family: montserratSemiBold;
    }
    .tracking-class{
        font-family: montserratSemiBold;
        font-size: 20px;
    }
    .tracking-style-dot .processing{
        text-align: center;
    }
    .tracking-style-dot .dark-grey-span span{
        font-size: 14px;
        color: #4d4d4d;
        font-family: montserratSemiBold;
        margin: 0px 6px;
    }
    .tracking-style-dot span{
        font-size: 14px;
        color: #4d4d4d;
        font-family: montserratMedium;
    }
    .tracking-style-dot .dark-grey-span{
        width: fit-content;
        margin: auto;
    }
    .for-box-shadow{
        box-shadow: 0px 0px 10px 0px #81818191;
        padding: 4px 10px ;
        border-radius: 4px;
    }
</style>
<div class="top-nav-height noPrint"></div>

<!-- top-height end-->

<!-- dashboard start -->

<!-- dashboard start -->
<div class="dashboard mac-responsive mt0">

    <!-- responsive dashboard start -->
    <div class="side-responsive-bar noPrint">
        <a class="for-small-device collapsed" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
            aria-expanded="false" aria-controls="multiCollapseExample1">
            <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
            <span> </span>
            <span> </span>
            <span> </span>
        </a>
        <div class="collapse multi-collapse for-custom-height" id="multiCollapseExample1">
            <ul class="nav nav-pills mt0 flex-column" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css remove-li-active-class  font-bold-style active removecanceled" id="home-tabs" data-bs-toggle="pill"
                        data-bs-target="#my-account" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Manage My Account</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css removecanceled" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">My Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css removecanceled add-li-active-class" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#address-book" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Address Book</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css removecanceled" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#my-payment" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">My Payment Options</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                        <button class="remove-btn-css removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#my-wallet" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">My Wallet</button>
                    </li> -->
                <!-- <li class="nav-item" role="presentation">
                        <button class="remove-btn-css removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#vouches" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Vouchers</button>
                    </li> -->
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css font-bold-style mt1 removecanceled" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#my-order" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">My Orders</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css returnprocess" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#my-return" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">My Return</button>
                </li>
                <li class="nav-item" role="presentation" >
                    <button class="remove-btn-css mycancel" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#my-cancel" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">My Cancellations</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css font-bold-style mt1 removecanceled" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#my-reviews" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">My Reviews</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="remove-btn-css font-bold-style mt0 removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#my-wishlist" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">My Wishlist</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                        <button class="remove-btn-css font-bold-style mt0 removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#sell-on-shop" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Sell On Shop</button>
                    </li> -->

            </ul>
        </div>
    </div>
    <!-- responsive dashboard end -->

    <div class="container">
        <div class="dashboard-div d-flex justify-content-between">
            <div class="side-dashboard noPrint">
                <div class="side-dashboard-content">
                    <h1 class="user-name">Hello, <?php echo e(Auth::user()->name); ?></h1>
                    <ul class="nav nav-pills mt0 flex-column" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css remove-li-active-class font-bold-style active removecanceled" id="home-tabs" data-bs-toggle="pill"
                                data-bs-target="#my-account" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Manage My Account</button>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css " id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile " type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">My Profile </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css add-li-active-class removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#address-book" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Address Book</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css removecanceled" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#my-payment" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">My Payment Options</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                                <button class="remove-btn-css removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#my-wallet" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">My Wallet</button>
                            </li> -->
                        <!-- <li class="nav-item" role="presentation">
                                <button class="remove-btn-css removecanceled" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#vouches" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">Vouchers</button>
                            </li> -->
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css font-bold-style mt1 removecanceled" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#my-order" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">My Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css returnprocess" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#my-return" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">My Return</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css cancelprocess" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#my-cancel" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">My Cancellations</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css font-bold-style mt1 removecanceled" id="pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#my-reviews" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">My Reviews</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="remove-btn-css font-bold-style mt0 removecanceled" id="pills-contact-tab"
                                data-bs-toggle="pill" data-bs-target="#my-wishlist" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">My Wishlist </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <form method="POST" action="<?php echo e(route('user-logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button class="remove-btn-css font-bold-style mt0" type="submit"><i
                                        class="fa fa-sign-out" aria-hidden="true"></i>Logout</button>
                            </form>
                        </li>
                    </ul>


                </div>

            </div>
            <div class="main-dashboard">
                <div class="tab-content custom-tabss active noPrint" id="pills-tabContent">
                    <div class="tab-pane remove-active fade show active" id="my-account" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <h1 class="tab-main-heading">Manage My Account</h1>
                        <div class="top-margin">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="profile-box short-box">
                                        <div class="d-flex align-items-center">
                                            <h3>Personal Profile</h3>
                                            <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                                                <h4>
                                                    EDIT
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="span-user">
                                            <span><?php echo e(Auth::user()->name); ?></span>
                                        </div>
                                        <div class="span-user">
                                            <span><?php echo e(Auth::user()->email); ?></span>
                                        </div>
                                        <div class="Subscribe-a mt2">
                                            <!-- <a href="">
                                                    Subscribe To Our Newsletter
                                                </a> -->
                                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                data-bs-dismiss="modal">
                                                <?php if(@$subscription_list->status == 1): ?>
                                                Unsubscribe from our Newsletter
                                                <?php else: ?>
                                                Subscribe To Our Newsletter
                                                <?php endif; ?>
                                            </a>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-lg-8">
                                    <div class="profile-box">
                                        <div class="d-flex align-items-center">
                                            <h3>Address Book</h3>
                                            <?php if($shipping_condtion === null): ?>
                                            <a class="" data-bs-toggle="modal" href="#exampleModalToggle2"
                                                role="button">
                                                <h4>
                                                    Add
                                                </h4>
                                            </a>
                                        <?php else: ?>
                                            <a class="edit_address">
                                                <h4>
                                                    Edit
                                                </h4>
                                            </a>

                                        <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="div-line box-inner-width">
                                                <div class="span-user">
                                                    <span>Default shipping address</span><br><br>
                                                    <h3><?php echo e($shipping->name ?? ''); ?></h3>
                                                    <span><?php echo e($shipping->get_city->city ?? ''); ?>

                                                        ,<?php echo e($shipping->address ?? ''); ?></span><br>
                                                    <span><?php echo e($shipping->contact ?? ''); ?></span>
                                                </div>
                                                
                                            </div>
                                            <div class="span-user box-inner-width padding-right">
                                                <span>Default billing address</span><br><br>
                                                <h3><?php echo e($billing->name ?? ''); ?></h3>
                                                <span><?php echo e($billing->get_city->city ?? ''); ?>

                                                    ,<?php echo e($billing->address ?? ''); ?></span><br>
                                                <span><?php echo e($billing->contact ?? ''); ?></span>
                                            </div>
                                        </div>

                                        <!-- <div class="Subscribe-a mt2">
                                                <a href="">
                                                    Subscribe To Our Newsletter
                                                </a>
                                            </div> -->


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h1 class="tab-main-heading">My Profile </h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height">
                                <div class="row">
                                    <div class="col-lg-4 mt1">
                                        <div class="profile-data">
                                            <label>Full Name</label>
                                            <span><?php echo e(Auth::user()->name); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt1">
                                        <div class="profile-data">
                                            <label class="d-flex align-items-baseline">Email Address
                                                
                                                <a href="<?php echo e(route('security')); ?>">
                                                    <h4>
                                                        Add
                                                    </h4>
                                                </a>

                                            </label>
                                            <span><?php echo e(Auth::user()->email); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt1">
                                        <div class="profile-data">
                                            <label class="d-flex align-items-baseline">Mobile
                                                
                                            </label>
                                            
                                            <span><?php echo e(Auth::user()->contact ?? ''); ?></span>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt1">
                                        <div class="profile-data">
                                            <label>Birthday</label>
                                            <span><?php echo e(Auth::user()->month); ?>/<?php echo e(Auth::user()->day); ?>/<?php echo e(Auth::user()->year); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt1">
                                        <div class="profile-data">
                                            <label>Gender</label>
                                            <span><?php echo e(ucfirst(Auth::user()->gender)); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="Subscribe-a mt3">
                                    <!-- <a href="">
                                            Subscribe To Our Newsletter
                                        </a> -->
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-dismiss="modal">
                                        <?php if(@$subscription_list->status == 1): ?>
                                        Unsubscribe from our Newsletter
                                        <?php else: ?>
                                        Subscribe To Our Newsletter
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="d-flex half-btn">
                                    <div class="pink-login-btn login-button mt1">
                                        <a data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                                            <div>
                                                Edit Profile
                                            </div>
                                        </a>
                                    </div>
                                    <div class="pink-login-btn login-button">
                                        <!-- <a href="">
                                                <div>
                                                    Change
                                                </div>
                                            </a> -->
                                        <a class="for-forget-btn">
                                            <div>
                                                Change Password
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="myModalEditInner">
                        <div class="modal-dialog modalDialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title modalTile">Edit Address</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                            class="fa fa-times" aria-hidden="true"></i></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body modalBody">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="edit-sec-box margin-top-zero ">
                                                <form id="edit_address_form" action="<?php echo e(route('update_address')); ?>"
                                                    method="POST" class="block">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="address_id" id="addressId">
                                                    <div class="input-border-cstm">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="d-flex flex-column input-label-felids">
                                                                    <label for="" class="font-famil-change">First
                                                                        Name</label>
                                                                    <input type="text" name="name"
                                                                        placeholder="First Name" id="name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="d-flex flex-column input-label-felids">
                                                                    <label for=""
                                                                        class="font-famil-change">Address</label>
                                                                    <input type="text" name="address" id="address"
                                                                        placeholder="Address">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="d-flex flex-column input-label-felids">
                                                                    <label for="" class="font-famil-change">Mobile
                                                                        Number</label>
                                                                    <input type="text" name="contact" id="contact"
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
                                                                    <label for=""
                                                                        class="font-famil-change">Province</label>
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
                                                                    <label for="" class="font-famil-change">Select a
                                                                        label for
                                                                        effective
                                                                        delivery</label>
                                                                    <div class="d-flex justify-content-between">
                                                                        <input type="hidden" name="delivery_lable"
                                                                            id="edit_delivery">
                                                                        <button type="button" id="edit_home"
                                                                            class="choose_button" value="1" id="home"><i
                                                                                class="fa fa-check-square"
                                                                                aria-hidden="true"></i>Home</button>
                                                                        <button type="button" id="edit_office"
                                                                            class="choose_button" value="2"
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
                                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($city->id); ?>">
                                                                            <?php echo e($city->city); ?>

                                                                        </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>

                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="d-flex flex-column input-label-felids">
                                                                    <label for="" class="font-famil-change">Select a
                                                                        label for
                                                                        effective
                                                                        delivery</label>
                                                                    <div class="confirming-address">
                                                                        <div class="d-flex">
                                                                            <div class="form-group">
                                                                                <input type="checkbox"
                                                                                    id="edit_shipping_checkbox"
                                                                                    name="default_shipping" value="1">
                                                                                <label for="edit_shipping_checkbox"
                                                                                    class="d-flex align-items-start">Default
                                                                                    shipping
                                                                                    address</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex mt0">
                                                                            <div class="form-group">
                                                                                
                                                                                <input type="checkbox"
                                                                                    id="edit_billing_checkbox"
                                                                                    name="default_billing" value="2">
                                                                                <label for="edit_billing_checkbox"
                                                                                    class="d-flex align-items-start">Default
                                                                                    billing
                                                                                    address</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex address-decription">
                                                                            <p>Your existing default address setting
                                                                                will be
                                                                                replaced if you make some changes here.
                                                                            </p>
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

                    <div class="tab-pane addcstm-open fade" id="address-book" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h1 class="tab-main-heading">Address Book</h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height">
                                <form action="<?php echo e(route('change_address')); ?>" method="POST" class="block">
                                    <?php echo csrf_field(); ?>
                                    <!-- Modal body -->
                                    <div class="modal-body modalBody">
                                        <div class="row">
                                            <input type="hidden" name="shipping" value="1" class="card-input-element" />
                                            <?php if(!empty($shipping_addresses)): ?>
                                            <?php $__currentLoopData = $shipping_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping_addresse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div class="col-lg-6">
                                                <label class="label">
                                                    <input type="radio" name="address_id"
                                                        value="<?php echo e($shipping_addresse->id); ?>" class="card-input-element"
                                                        <?php echo e($shipping_addresse->shipping_active_address == 1 ? 'checked'
                                                    : ''); ?> />
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

                                                                <?php if($shipping_addresse->billing_active_address == 2): ?>
                                                                <span>Default Billing Address</span>
                                                                <?php endif; ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    
                                    
                                </form>
                                <div class="d-flex add-address justify-content-end">
                                    <div class="pink-login-btn login-button mt6">
                                        <a data-bs-toggle="modal" href="#exampleModalToggle2" role="button">
                                            <div>
                                                + ADD NEW ADDRESS
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="address-book" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h1 class="tab-main-heading">Address Book</h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height">
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
                                                        <?php echo e($shipping_addresse->billing_active_address == 2 ? 'checked' :
                                                    ''); ?> />
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

                                    
                                    
                                </form>
                                <div class="d-flex add-address justify-content-end">
                                    <div class="pink-login-btn login-button mt6">
                                        <a data-bs-toggle="modal" href="#exampleModalToggle2" role="button">
                                            <div>
                                                + ADD NEW ADDRESS
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="my-payment" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h1 class="tab-main-heading">My Payment Options</h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height">
                                <div class="for-margin-payment-box">
                                    <div class="payment-recipt">
                                        <img src="<?php echo e(asset('front_assets/images/payment-recipt.webp')); ?>" alt="">
                                    </div>
                                    <div class="span-user font-size text-center">
                                        <span>No payment options</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="my-wallet" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h1 class="tab-main-heading">My Payment Options</h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height box-back-img">
                                <div class="active-wallet-box">
                                    <div class="active-wallet-heading">
                                        <div class="wallet-icon">
                                            <img src="<?php echo e(asset('front_assets/images/wallet-icon.webp')); ?>" alt="">
                                        </div>
                                        <div class="active-content-heading text-center">
                                            <h1>Activate Our Wallet</h1>
                                            <div class="span-user font-size">
                                                <span>Start your easy shopping journey</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-center">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="icon-box-padding">
                                                    <div class="mobile-icon">
                                                        <img src="<?php echo e(asset('front_assets/images/mobile-icon.webp')); ?>"
                                                            alt="">
                                                    </div>
                                                    <p class="text-center">Make convenient one-click
                                                        payments</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="icon-box-padding">
                                                    <div class="mobile-icon">
                                                        <img src="<?php echo e(asset('front_assets/images/gift-icon.webp')); ?>"
                                                            alt="">
                                                    </div>
                                                    <p class="text-center">Earn bonus on your
                                                        purchases</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="icon-box-padding">
                                                    <div class="mobile-icon">
                                                        <img src="<?php echo e(asset('front_assets/images/coin-icon.webp')); ?>"
                                                            alt="">
                                                    </div>
                                                    <p class="text-center">Get bonus from our
                                                        Store</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activate-btn-center">
                                            <a href="">
                                                <div class="pink-login-btn activate-btn mt1">
                                                    ACTIVATE MY WALLET

                                                </div>
                                            </a>
                                        </div>
                                        <div class="para-policy-link">
                                            <p>
                                                By clicking ACTIVATE THE WALLET for the Store wallet service(s), I
                                                agree
                                                to be bound by the <a href="<?php echo e(route('terms-conditions')); ?>">Terms and
                                                    Conditions</a> and <a href="<?php echo e(route('privacy-policy')); ?>">Privacy
                                                    Policy</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="vouches" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h1 class="tab-main-heading">Vouchers</h1>
                        <div class="top-margin">
                            <div class="profile-box box-full-height">
                                <table id="table" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Extn.</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger</td>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011-04-25</td>
                                            <td>$320,800</td>
                                            <td>5421</td>
                                            <td>t.nixon@datatables.net</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="my-order" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h1 class="tab-main-heading">My Orders</h1>
                        <div class="top-margin">
                            <div class="reviews-feilds profile-box box-full-height">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-all" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-topay" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">To Pay
                                            <span>(<?php echo e($to_pay_count ?? 0); ?>)</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-toslip" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">To
                                            Ship<span>(<?php echo e($shipping_count); ?>)</span></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-toreceive" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">To Receive</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="order-feilds">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-all" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">All</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-topay" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">To Pay</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-toslip" type="button" role="tab"
                                                aria-controls="pills-contact" aria-selected="false">To Slip</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-toreceive" type="button" role="tab"
                                                aria-controls="pills-contact" aria-selected="false">To Receive</button>
                                        </li>
                                    </ul>
                                </div> -->
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="profile-box box-full-height">
                                    <div class="order-status-selector">
                                        <label for="">Show :</label>
                                        <select name="filter" id="filter">
                                            <option value="" selected disabled>-- Filter Records --</option>
                                            <option value="1">Last 5 orders</option>
                                            <option value="2">Last 15 days</option>
                                            <option value="3">Last 30 days</option>
                                            <option value="4">Last 6 months</option>
                                            <option value="5">Orders placed in 2022</option>
                                            <option value="6">All Orders</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="profile-box box-full-height mt1">
                                    <div id="filter_html">
                                        <?php echo $__env->make('user-dashboard.partials.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-topay" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="profile-box review-box-padding box-full-height mt1">
                                    <?php if($to_pay_count > 0): ?>

                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($order->order_status == null && count($order->carts) > 0): ?>
                                    <div class="profile-box review-box-padding box-full-height">
                                        <div class="mt0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="lotti-retail-div">
                                                    
                                                </div>
                                                
                                            </div>
                                            <div
                                                class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                                <div
                                                    class="d-flex align-items-center <?php echo e($order->order_status != null ? 'for-pay-btn for-pay-btn-cursor' : ''); ?>">
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                                    </div>
                                                    <div class="lotti-retail-review">
                                                        
                                                        
                                                        <p>Order#<?php echo e($order->id); ?></p>
                                                        <span>Placed On
                                                            <?php echo e(date('d/M/Y', strtotime($order->created_at))); ?></span>
                                                    </div>
                                                </div>
                                                <div class="lotti-review">
                                                    <a href="<?php echo e(route('cart')); ?>">
                                                        <button class="order-tracking-btn status_pay_to">
                                                            <span>
                                                                Pay Now
                                                            </span>
                                                        </button>
                                                    </a>
                                                    <?php if($order->order_status != null): ?>
                                                    <button
                                                        class="for-ship-btn order-tracking-btn order_tracking_status"
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
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="for-margin-payment-box order-placed-btn">
                                        <div class="span-user font-size text-center">
                                            <span>There are no orders in the cart yet.</span>
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
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-toslip" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="profile-box review-box-padding box-full-height mt1">
                                    <?php if($shipping_count > 0): ?>

                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($order->order_status == 2): ?>
                                    <div class="profile-box review-box-padding box-full-height ==">
                                        <div class="mt0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="lotti-retail-div">

                                                </div>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                                <div class="d-flex align-items-center for-pay-btn for-pay-btn-cursor"
                                                    onclick="orderDetails('<?php echo e($order->id); ?>','cancellation')">
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                                    </div>
                                                    <div class="lotti-retail-review">
                                                        
                                                        
                                                        <p>Order#<?php echo e($order->id); ?></p>
                                                        <span>Placed On
                                                            <?php echo e(date('d/M/Y', strtotime($order->created_at))); ?></span>
                                                    </div>
                                                </div>
                                                <div class="lotti-review">
                                                    <button
                                                        class="for-ship-btn order-tracking-btn order_tracking_status"
                                                        onclick="orderTracking('<?php echo e($order->id); ?>')">
                                                        <span>
                                                            Track Order
                                                        </span></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="for-margin-payment-box order-placed-btn">
                                        <div class="span-user font-size text-center">
                                            <span>There are no orders shipped yet.</span>
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


                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-toreceive" role="tabpanel"
                                aria-labelledby="pills-contact-tab">

                                <?php if($delivered > 0): ?>

                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($order->order_status == 3): ?>
                                <div class="profile-box review-box-padding box-full-height ==">
                                    <div class="mt0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="lotti-retail-div">
                                                
                                            </div>
                                            
                                        </div>
                                        <div
                                            class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                            <div class="d-flex align-items-center for-pay-btn for-pay-btn-cursor"
                                                onclick="orderDetails('<?php echo e($order->id); ?>','')">
                                                <div class="product-review-img">
                                                    <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                                </div>
                                                <div class="lotti-retail-review">
                                                    
                                                    
                                                    <p>Order#<?php echo e($order->id); ?></p>
                                                    <span>Placed On
                                                        <?php echo e(date('d/M/Y', strtotime($order->created_at))); ?></span>
                                                </div>
                                            </div>
                                            <div class="lotti-review">
                                                <?php if($order->order_verification == null): ?>
                                                <span class="verify-html-<?php echo e($order->id); ?>">
                                                    <button class="order-tracking-btn unverify"
                                                        id="verify-<?php echo e($order->id); ?>"
                                                        onclick="orderVerify('<?php echo e($order->id); ?>')">
                                                        <span>
                                                            Unreceived
                                                        </span>
                                                    </button>
                                                </span>
                                                <?php else: ?>
                                                <button class="order-tracking-btn status_verification">
                                                    <img src="<?php echo e(asset('icons/verified.png')); ?>" alt="verified"
                                                        width="16px">
                                                    <span>
                                                        Received
                                                    </span>
                                                </button>
                                                <?php endif; ?>

                                                <button class="for-ship-btn order-tracking-btn order_tracking_status"
                                                    onclick="orderTracking('<?php echo e($order->id); ?>')">
                                                    <span>
                                                        Track Order
                                                    </span></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <div class="profile-box review-box-padding box-full-height mt1">
                                    <div class="for-margin-payment-box order-placed-btn">
                                        <div class="span-user font-size text-center">
                                            <span>There are no completed orders yet.</span>
                                        </div>
                                        <div class="activate-btn-center">
                                            <a href="<?php echo e(route('home')); ?>">
                                                <div class="pink-login-btn activate-btn mt1">
                                                    CONTINUE SHOPPING
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade test" id="my-cancel" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h1 class="tab-main-heading mycancel">My Cancellations</h1>

                        


                        <div class="top-margin">
                            <!-- <div class="order-placed-btn">
                                    <div class="span-user font-size text-center">
                                        <span>There are no cancellations yet.</span>
                                    </div>
                                    <div class="activate-btn-center">
                                        <a href="../../lotti_html/index.php">
                                            <div class="pink-login-btn activate-btn mt1">
                                                CONTINUE SHOPPING
                                            </div>
                                        </a>
                                    </div>
                                </div> -->
                            <div class="profile-box review-box-padding box-full-height mt1">
                                <div id="testcancel"></div>
                                <?php if(count($orders) > 0): ?>
                                
                                 <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <?php else: ?>
                                <div class="for-margin-payment-box order-placed-btn">
                                    <div class="span-user font-size text-center">
                                        <span>There are no cancellation  yet.</span>
                                    </div>
                                    
                                    

                                </div>
                                <?php endif; ?>


                            </div>
                        </div>

                    </div>

                    
                      <div class="tab-pane fade" id="my-return" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <h1 class="tab-main-heading">My Return</h1>
                            <div class="top-margin">

                                <div class="profile-box review-box-padding box-full-height mt1">
                                     <div id="refunddata"></div>

                                </div>

                            </div>

                        </div>

                    

                    <div class="tab-pane fade" id="my-reviews" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h1 class="tab-main-heading">My Reviews</h1>
                        <div class="top-margin">
                            <div class="reviews-feilds profile-box box-full-height">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-To-Be-reviewed" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">To Be Reviewed</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-History" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">History</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="pills-tabContent">

                            
                            <div class="tab-pane fade show active" id="pills-To-Be-reviewed" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <?php if(!empty($not_reviewed)): ?>
                                <?php
                                $reviews_ids = [];
                                ?>

                                <?php $__currentLoopData = $not_reviewed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $product_review->reviews_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                // $data = array();
                                // $data['order_id'] = $item->order_id;
                                // $data['product_id'] = $item->product_id;
                                // $data['product_variation_id'] = $item->product_variation_id;
                                array_push($reviews_ids, $item->order_id . ',' . $item->product_id . ',' .
                                $item->product_variation_id);
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                <div class="profile-box review-box-padding box-full-height mt1">
                                    <?php $__currentLoopData = $product_review->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php
                                    $with_rev_item = $val->order_id . ',' . $val->product_id . ',' .
                                    $val->product_variantion_id;
                                    ?>

                                    <?php if(in_array($with_rev_item, $reviews_ids)): ?>
                                    <?php continue; ?>
                                    <?php endif; ?>

                                    

                                    <div class="mt0">
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="lotti-retail-div">
                                                <p>Lotti Retail Seller</p>
                                                <span>Purchased On
                                                    <?php echo e($val->created_at->format('m-d-Y')); ?></span>
                                            </div>
                                            
                                            <a class="for-review-hover hide-div" onclick="reviewproduct('<?php echo e($val->id); ?>')">
                                                <div class="lotti-review">
                                                    <span>
                                                        Review
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="for-review-hover hide-div" onclick="reviewproduct('<?php echo e($val->id); ?>')">
                                            <div
                                                class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                                <div class="d-flex align-items-center product_review">
                                                    <?php if(!empty($val->product->image) || $val->variations->image): ?>
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(asset(!empty($val->product_variantion_id) ? 'variations/' . $val->variations->image : 'products/' . $val->product->image) ?? ''); ?>"
                                                            alt="Image">

                                                    </div>
                                                    <?php endif; ?>

                                                    <div class="lotti-retail-review">
                                                        <p><?php echo e($val->product->product_name ?? ''); ?>

                                                            
                                                        </p>

                                                        <?php echo e($val->attribute_values); ?>

                                                    </div>
                                                </div>
                                                <div class="lotti-review">
                                                    <span>
                                                        <?php if($product_review->order_status == null): ?>
                                                        <a href="<?php echo e(route('cart')); ?>">
                                                            <button class="order-tracking-btn status_pay_to">
                                                                <span>
                                                                    Pay Now
                                                                </span>
                                                            </button>
                                                        </a>
                                                        <?php endif; ?>
                                                        <?php if($product_review->order_status == 1): ?>
                                                        <button class="order-tracking-btn status_pending">
                                                            <span>
                                                                Processing
                                                            </span>
                                                        </button>
                                                        <?php endif; ?>
                                                        <?php if($product_review->order_status == 2): ?>
                                                        <button class="order-tracking-btn status_dispatched">
                                                            <span>
                                                                Dispatched
                                                            </span>
                                                        </button>
                                                        <?php endif; ?>
                                                        <?php if($product_review->order_status == 3): ?>
                                                        <button class="order-tracking-btn status_dispatched">
                                                            <span>
                                                                Delivered
                                                            </span>
                                                        </button>
                                                        <?php endif; ?>
                                                        <?php if($product_review->order_status == 4): ?>
                                                        <button class="order-tracking-btn status_dispatched">
                                                            <span>
                                                                Cancelled
                                                            </span>
                                                        </button>
                                                        <?php endif; ?>
                                                        <?php if($product_review->order_status == 5): ?>
                                                        <button class="order-tracking-btn status_dispatched">
                                                            <span>
                                                                On Hold
                                                            </span>
                                                        </button>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php else: ?>
                                <div class="profile-box box-full-height mt1">
                                    <div class="payment-recipt sad-icon">
                                        <img src="<?php echo e(asset('front_assets/images/sad-icon.webp')); ?>" alt="">
                                    </div>
                                    <div class="span-user font-size text-center">
                                        <span>You haven't purchased any product</span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="pills-History" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="profile-box box-full-height mt1">
                                    <div class="">
                                        <?php if(!empty($reviews)): ?>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="for-review-hover hide-div"
                                            onclick="editreviewproduct('<?php echo e($values->id); ?>')">

                                            <div
                                                class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                                <div class="d-flex align-items-center">
                                                    

                                                    <?php if(!empty($values->variations->image)): ?>
                                                    <?php endif; ?>

                                                    <?php if(!empty($values->variations)): ?>
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(url('public/variations/' . $values->variations->image)); ?>"
                                                            alt="">
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(url('public/products/' . $values->get_product->image)); ?>"
                                                            alt="">
                                                    </div>
                                                    <?php endif; ?>

                                                    <div class="lotti-retail-review">
                                                        <p><?php echo e($values->get_product->product_name ?? ''); ?></p>
                                                        <small><?php echo e($values->variations->attribute ?? ''); ?></small>
                                                        <span><?php echo Str::limit($values->comments, 100); ?></span>
                                                    </div>
                                                </div>
                                                <div class="lotti-review">
                                                    <span>
                                                        <?php
                                                        $num = 5 - $values->reviews;
                                                        ?>
                                                        <?php for($x = 1; $x <= $values->reviews; $x++): ?>
                                                            <i class="fa fa-star goldenstar "></i>
                                                            <?php endfor; ?>

                                                            <?php for($x = 1; $x <= $num; $x++): ?> <i class="fa fa-star"></i>
                                                                <?php endfor; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <div class="payment-recipt sad-icon">
                                            <img src="<?php echo e(asset('front_assets/images/sad-icon.webp')); ?>" alt="">
                                        </div>
                                        <div class="span-user font-size text-center">
                                            <span>You haven't written any review</span>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="my-wishlist" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h1 class="tab-main-heading">My Wishlist</h1>
                        <div class="top-margin">
                            <!-- <div class="order-feilds">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-MyWishlist" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">My Wishlist</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-PastPurchases" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Past
                                                Purchases</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-FollowedStores" type="button" role="tab"
                                                aria-controls="pills-contact" aria-selected="false">Followed
                                                Stores</button>
                                        </li>
                                    </ul>
                                </div> -->
                            <div class="reviews-feilds profile-box box-full-height">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-MyWishlist" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">My Wishlist</button>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-MyWishlist" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                
                                <div class="profile-box review-box-padding box-full-height mt1">
                                    <div class="mt0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="lotti-retail-div">
                                                <p>Lotti Retail Seller</p>
                                                <!-- <span>Placed On 06/Oct/2022</span> -->
                                            </div>
                                            <div class="lotti-review">
                                                <span>
                                                    Wishlist
                                                </span>
                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $getwishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="for-review-hover">

                                            <div
                                                class="d-flex justify-content-between for-background-color-review align-items-baseline">
                                                <div class="d-flex align-items-center">
                                                    <div class="product-review-img">
                                                        <img src="<?php echo e(url('public/products/' . $products->get_product_name->image ?? '')); ?>"
                                                            alt="">
                                                    </div>
                                                    <div class="lotti-retail-review">
                                                        <p><?php echo e($products->get_product_name->product_name ?? ''); ?>

                                                        </p>
                                                        <span><?php echo Str::limit($products->get_product_name->description,
                                                            30) ?? ''; ?></span>
                                                    </div>
                                                </div>
                                                <a href="<?php echo e(route('product', $products->get_product_name->slug)); ?>">
                                                    <div class="lotti-review add-cart-icons">
                                                        <span>
                                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </a>

                                            </div>

                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <!-- <div class="order-placed-btn">
                                        <div class="heart-icon">
                                            <img src="./../assets/images/heart-icon.webp" alt="">
                                        </div>
                                        <div class="span-user font-size text-center">
                                            <span>There are no favorites yet. <br>
                                                Add your favorites to wishlist and they will show here.</span>
                                        </div>
                                        <div class="activate-btn-center">
                                            <a href="../../lotti_html/index.php">
                                                <div class="pink-login-btn activate-btn mt1">
                                                    CONTINUE SHOPPING
                                                </div>
                                            </a>
                                        </div>
                                    </div> -->
                            </div>
                            <div class="tab-pane fade" id="pills-PastPurchases" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="order-placed-btn">
                                    <div class="heart-icon">
                                        <img src="<?php echo e(asset('front_assets/images/heart-icon.webp')); ?>" alt="">
                                    </div>
                                    <div class="span-user font-size text-center">
                                        <span>There are no favorites yet. <br>
                                            Add your favorites to wishlist and they will show here.</span>
                                    </div>
                                    <div class="activate-btn-center">
                                        <a href="<?php echo e(route('home')); ?>">
                                            <div class="pink-login-btn activate-btn mt1">
                                                CONTINUE SHOPPING
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-FollowedStores" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="order-placed-btn">
                                    <div class="heart-icon">
                                        <img src="<?php echo e(asset('front_assets/images/heart-icon.webp')); ?>" alt="">
                                    </div>
                                    <div class="span-user font-size text-center">
                                        <span>There are no favorites yet. <br>
                                            Add your favorites to wishlist and they will show here.</span>
                                    </div>
                                    <div class="activate-btn-center">
                                        <a href="<?php echo e(route('home')); ?>">
                                            <div class="pink-login-btn activate-btn mt1">
                                                CONTINUE SHOPPING
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="sell-on-shop" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            sell on shop
                        </div> -->

                </div>
                <!-- <div class="login-page mac-responsive"> -->
                <div class="removespan noPrint">
                    <h1 class="tab-main-heading">Write Review</h1>
                    <div class="top-margin" id="review_append">

                    </div>
                    <div class="top-margin" id="new_review">

                    </div>
                </div>
                <div class="payspan">
                    <!-- <h1 class="tab-main-heading">Select Payment Method</h1> -->
                    <h1 class="tab-main-heading noPrint">Order Invoice</h1>
                    <div class="top-margin">
                        <div class="login-sec-box position-relative">
                            <button class="remove-btn-css noPrint">
                                <div class="red-back-btn">
                                    <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="order-image">
                                </div>
                            </button>
                            <button class="remove-btn-css noPrint" onclick="window.print();">
                                <div class="red-back-btn print-btn-css">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </div>
                            </button>
                            <div class="invoice-tabel-sec mt1">
                                <h1 class="invoice-no-heading text-center">Order ID : <span
                                        id="orderIdInvoice">77520</span></h1>
                                <div class="row mt2">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-email">
                                            <label for="">Date :</label>
                                            <p class="tabel-line" id="orderDateInvoice"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12  mt1">
                                                <div class="invoice-email">
                                                    <label for="" class="fw-bold"> Bill To :</label>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12  mt0">
                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Contact Name :</label>
                                                    <label for="" id="billingContactName"></label>
                                                </div>

                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Address for :</label>
                                                    <label for="" id="billingAddressFor"></label>
                                                </div>

                                                
                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Address :</label>
                                                    <label for="" id="billingAddress"></label>
                                                </div>
                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Phone :</label>
                                                    <label for="" id="billingPhone"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 mt1">
                                                <div class="invoice-email">
                                                    <label for="" class="fw-bold"> Ship To :</label>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mt0">
                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Contact Name :</label>
                                                    <label for="" id="shippingContactName"></label>
                                                </div>


                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Address for :</label>
                                                    <label for="" id="shippingAddressFor"></label>
                                                </div>

                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Address :</label>
                                                    <label for="" id="shippingAddress"></label>
                                                </div>
                                                <div class="invoice-email justify-content-between">
                                                    <label for="">Phone :</label>
                                                    <label for="" id="shippingPhone"></label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="cstm-invoice-tabel mt4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                S.No</th>
                                            
                                            <th scope="col"
                                                style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                Products</th>
                                            
                                            <th scope="col"
                                                style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                QTY</th>
                                            <th scope="col"
                                                style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                Unit Price</th>
                                            <th scope="col"
                                                style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                Total</th>
                                            <th scope="col"
                                                style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoiceTbody">


                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt2">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4 col-md-6" id="summary_amount"></div>
                            </div>

                            <!-- <div class="col-lg-7">
                                    <div class="d-flex">
                                        <a class="for-review-hover for-margin-right-paypal">
                                            <div class="for-background-color-payment">
                                                <div class="paypal-img">
                                                    <img src="../assets/images/paypal.webp" alt="">
                                                </div>

                                            </div>
                                        </a>
                                        <a class="for-review-hover">
                                            <div class="for-background-color-payment">
                                                <div class="paypal-img">
                                                    <img src="../assets/images/stripe.webp" alt="">
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="order-summary">
                                        <h2>Order Summary</h2>
                                        <div class="d-flex justify-content-between mt1">
                                            <label>Subtotal (1 items shipping fee included)</label>
                                            <span>$300.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt1 align-items-center">
                                            <span>Total Amount</span>
                                            <p>$300.00</p>
                                        </div>
                                    </div>
                                </div> -->
                        </div>

                    </div>
                </div>
                <div class="shipspan noPrint cancelprint">
                    <h1 class="tab-main-heading hideorderdetail">Order Details</h1>
                    <div class="top-margin">
                        <div id="orderDetailsHTML"></div>
                    </div>
                </div>

                
                <div class="shipspan noPrint">
                    <h1 class="tab-main-heading hidecancel">Cancellation Details</h1>
                    <div id="cancelall"></div>

                </div>


                <div class="cancelspan noPrint" id="hidecanceldiv">
                    <h1 class="tab-main-heading">Request Cancellation</h1>

                    <form id="requestCancellation">
                        <input type="hidden" name="orderIdHidden" id="orderIdHidden">
                        <div class="top-margin">
                            <div class="login-sec-box position-relative">
                                <button class="remove-btn-css" type="button">
                                    <div class="red-back-btn">
                                        <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                    </div>
                                </button>
                                <div
                                    class="d-flex justify-content-between mt0 for-background-color-review align-items-baseline for-break-div">
                                    <div class="d-flex align-items-center">
                                        <div class="product-review-img">
                                            <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                        </div>
                                        <div class="lotti-retail-review marginright2">
                                            <p id="orderId"></p>
                                            <span class="text-start" id="orderDate"></span>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <div>
                                        <p id="order_details"> </p>
                                    </div>
                                    <h2>Customer Comments and Packaging Information (mandatory)</h2>
                                    <div class="cstm-invoice-tabel mt4" id="cancelprocess">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        <div class="d-flex">
                                                            <div class="form-group">

                                                                <input type="hidden" name="cancel_product_id"
                                                                    id="cancel_product_id" value>
                                                                <input type="hidden" name="cancel_order_id"
                                                                    id="cancel_order_id" value>
                                                                    
                                                                    <input type="checkbox" name="cancellation_policy"
                                                                    id="cancellation_policy">
                                                                <label for="cancellation_policy"
                                                                    class="d-flex align-items-start margin-top-zer0 flex-column">
                                                                    Select All
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        S.No</th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        Image</th>

                                                    <th scope="col"
                                                        style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                        Products</th>

                                                    <th scope="col"
                                                        style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                        QTY</th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        Unit Price</th>

                                                </tr>
                                            </thead>
                                            <tbody id="cancelorderbody">

                                            </tbody>


                                        </table>

                                    </div>

                                </div>


                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <div>
                                        <p id="order_details"> </p>
                                    </div>
                                    <h2>Customer Comments and Packaging Information (mandatory)</h2>
                                    <div class="select-reason cstm-select-width">
                                        <select name="reason" class="form-select" aria-label="Default select example">
                                            <option value="" selected disabled>Select a Reason</option>
                                            <option value="Change/combine order">Change/combine order</option>
                                            <?php $__currentLoopData = $cancellation_policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->reason); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="cancel-comments">
                                        <textarea name="comment" id="" cols="30" rows="10"
                                            placeholder="e.g. My phone has missing headphones Package seal was opened/not opened Packaging condition was Damaged/Not Damaged"></textarea>
                                    </div>
                                </div>
                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <h2>Cancellation Policy</h2>
                                    <?php echo $policy->cancellation_policy ?? ''; ?>

                                </div>
                                
                                
                                <div class="d-flex">
                                    <div class="form-group">
                                        <input type="checkbox" name="policy" value="1" id="cancel_policy">
                                        <label for="cancel_policy" class="d-flex align-items-start"> I
                                            have
                                            read and
                                            accepted
                                            the Cancellation Policy of Lotti.
                                        </label>
                                    </div>
                                </div>
                                <div class="share-reveiw-btn">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                  

                  <div class="shipspan noPrint">
                    <h1 class="tab-main-heading" id="hiderefundtext">Refund Details</h1>
                    <div id="refunddetails"></div>

                </div>

            <div class="cancelspan noPrint" id="refundorderrequest">
                    <h1 class="tab-main-heading">Refund Request</h1>
                    <form id="requestRefund" action="<?php echo e(route('order_refund')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="refundorderIdHidden" id="refundorderIdHidden">
                        
                        <div class="top-margin">
                            <div class="login-sec-box position-relative">
                              <div class="">
                                <button class="remove-btn-css">
                                    
                                </button>
                            </div>
                            

                                <button class="remove-btn-css" type="button">
                                    <div class="red-back-btn">
                                        <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                    </div>
                                </button>
                                <div
                                    class="d-flex justify-content-between mt0 for-background-color-review align-items-baseline for-break-div">
                                    <div class="d-flex align-items-center">
                                        <div class="product-review-img">
                                            <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                        </div>
                                        <div class="lotti-retail-review marginright2">
                                            <p id="refundorderId"></p>
                                            <span class="text-start" id="refundorderDate"></span>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <div>
                                        <p id="order_details"> </p>
                                    </div>
                                    <h2>Customer Comments and Packaging Information (mandatory)</h2>
                                    <div class="cstm-invoice-tabel mt4" id="cancelprocess">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        <div class="d-flex">
                                                            <div class="form-group">

                                                                <input type="hidden" name="refund_product_id"
                                                                    id="refund_product_id" value>
                                                                <input type="hidden" name="refund_order_id"
                                                                    id="refund_order_id" value>
                                                                    
                                                                    <input type="checkbox" name="refund_policy"
                                                                    id="refund_policy">
                                                                <label for="refund_policy"
                                                                    class="d-flex align-items-start margin-top-zer0 flex-column">
                                                                    Select All
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        S.No</th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        Image</th>

                                                    <th scope="col"
                                                        style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                        Products</th>

                                                    <th scope="col"
                                                        style="font-size:15px !important;font-family: montserratBold !important; color: #646364 !important;">
                                                        QTY</th>
                                                    <th scope="col"
                                                        style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                        Unit Price</th>

                                                </tr>
                                            </thead>
                                            <tbody id="refundorderbody">

                                            </tbody>


                                        </table>

                                    </div>

                                </div>


                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <div>
                                        <p id="order_details"> </p>
                                    </div>
                                    <h2>Customer Comments and Packaging Information (mandatory)</h2>
                                    <div class="select-reason cstm-select-width">
                                        <select name="reason" class="form-select" aria-label="Default select example">
                                            <option value="" selected disabled>Select a Reason</option>
                                            <option value="Change/combine order">Change/combine order</option>
                                            <?php $__currentLoopData = $cancellation_policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->reason); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="cancel-comments">
                                        <textarea name="comment" id="" cols="30" rows="10"
                                            placeholder="e.g. My phone has missing headphones Package seal was opened/not opened Packaging condition was Damaged/Not Damaged"></textarea>
                                    </div>
                                     <div class="cancel-comments">
                                        <label>Upload Image</label>
                                        <input type="file" id="cancellation_image" name="cancellation_image[]" multiple>
                                    </div>
                                </div>
                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <h2>Refund Policy</h2>
                                    <?php echo $policy->cancellation_policy ?? ''; ?>

                                </div>
                                <div class="mt1 cancel-comments-box for-background-color-review">
                                    <h2>Company Refund Address</h2>
                                    <?php echo e($config->address ?? ''); ?>

                                </div>

                                
                                
                                <div class="d-flex">
                                    <div class="form-group">
                                        <input type="checkbox" name="refunded_policy" value="2" id="refunded_policy">
                                        <label for="refunded_policy" class="d-flex align-items-start"> I
                                            have
                                            read and
                                            accepted
                                            the Refund Policy of Lotti.
                                        </label>
                                    </div>
                                </div>
                                <div class="share-reveiw-btn">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                  
                <div class="forget-password noPrint">
                    <h1 class="tab-main-heading">Change Password</h1>
                    <div class="top-margin">
                        <div class="login-sec-box position-relative">
                            <button class="remove-btn-css">
                                <div class="red-back-btn">
                                    <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                </div>
                            </button>
                            <div class="row">
                                <div class="col-lg-7">
                                    <form action="<?php echo e(route('update-password')); ?>" method="POST" id="password_form">
                                        <?php echo csrf_field(); ?>
                                        <div class="password-container d-flex flex-column mt1">
                                            <label for="">Current Password*</label>
                                            <input type="password" name="current_password"
                                                placeholder="Please retype your current password" id="password">
                                            <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
                                        </div>
                                        <div class="password-container d-flex flex-column mt1">
                                            <label for="">New Password*</label>
                                            <input type="password" name="password"
                                                placeholder="Please type your new password" id="id_password">
                                            <i class="fa fa-eye" aria-hidden="true" id="togglePassword"></i>
                                        </div>
                                        <div class="password-container d-flex flex-column mt1">
                                            <label for="">Retype Password*</label>
                                            <input type="password" name="confirm_password"
                                                placeholder="Please retype your new password" id="id_confirm">
                                            <i class="fa fa-eye" aria-hidden="true" id="eyeConfirm"></i>
                                        </div>
                                    </form>
                                    <div class="forget-done-btn mt2">
                                        <a href=""
                                            onclick="document.getElementById('password_form').submit(); return false;">
                                            <button type="submit">Save Changes</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Start Modal -->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header modal-cstm-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="edit-sec-box margin-top-zero ">
                            <div class="">
                                <form method="POST" action="<?php echo e(route('user-profile')); ?>" id="user_form">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Full
                                                    Name</label>
                                                <input type="text" placeholder="Full Name" id="myInput" name="name"
                                                    value="<?php echo e(Auth::user()->name); ?>">
                                                <!-- <button onclick="document.getElementById('myInput').value = ''">Clear input
                                            field</button> value="Full Name"-->

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <!-- <div class="email-change input-label-felids input-transparent">
                                            <div class="d-flex align-items-center">
                                                <h3>Email Address </h3>
                                                <a class="" data-bs-toggle="modal" href="./security.php" role="button">
                                                    <h4>
                                                        Change
                                                    </h4>
                                                </a>
                                            </div>
                                            <input type="text" placeholder="Emailaddress@gmail.com">
                                        </div> -->
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Email Address
                                                </label>
                                                <input type="text" placeholder="emailaddress@gmail.com" name="email"
                                                    value="<?php echo e(Auth::user()->email); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <!-- <div class="email-change input-label-felids input-transparent">
                                            <div class="d-flex align-items-center">
                                                <h3>Mobile </h3>
                                                <a class="" data-bs-toggle="modal" href="./security.php" role="button">
                                                    <h4>
                                                        Change
                                                    </h4>
                                                </a>
                                            </div>
                                            <input type="text" placeholder="Enter Your Mobile Number">
                                        </div> -->
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Phone
                                                    No.</label>
                                                <input type="number" name="contact"
                                                    placeholder="Enter Your Mobile Number"
                                                    value="<?php echo e(Auth::user()->contact ?? ''); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt2 edit-selector">
                                        <div class="col-lg-6">
                                            <label for="" class="font-famil-change">Birthday</label>
                                            <div class="d-flex justify-content-between">
                                                <div class="custom-select selector-width mt0">
                                                    <select name="month" id="Month">
                                                        <option value="none">Month</option>
                                                        <option value="01" <?php echo e(Auth::user()->month == 1 ? 'selected' : ''); ?>>
                                                            January
                                                        </option>
                                                        <option value="02" <?php echo e(Auth::user()->month == 2 ? 'selected' : ''); ?>>
                                                            February
                                                        </option>
                                                        <option value="03" <?php echo e(Auth::user()->month == 3 ? 'selected' : ''); ?>>March
                                                        </option>
                                                        <option value="04" <?php echo e(Auth::user()->month == 4 ? 'selected' : ''); ?>>April
                                                        </option>
                                                        <option value="05" <?php echo e(Auth::user()->month == 5 ? 'selected' : ''); ?>>May
                                                        </option>
                                                        <option value="06" <?php echo e(Auth::user()->month == 6 ? 'selected' : ''); ?>>June
                                                        </option>
                                                        <option value="07" <?php echo e(Auth::user()->month == 7 ? 'selected' : ''); ?>>July
                                                        </option>
                                                        <option value="08" <?php echo e(Auth::user()->month == 8 ? 'selected' : ''); ?>>August
                                                        </option>
                                                        <option value="09" <?php echo e(Auth::user()->month == 9 ? 'selected' : ''); ?>>
                                                            September
                                                        </option>
                                                        <option value="10" <?php echo e(Auth::user()->month == 10 ? 'selected' :
                                                            ''); ?>>
                                                            October
                                                        </option>
                                                        <option value="11" <?php echo e(Auth::user()->month == 11 ? 'selected' :
                                                            ''); ?>>
                                                            November
                                                        </option>
                                                        <option value="12" <?php echo e(Auth::user()->month == 12 ? 'selected' :
                                                            ''); ?>>
                                                            December
                                                        </option>
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                                <div class="custom-select selector-width mt0">
                                                    <select name="day" id="Day">
                                                        <option value="none">Day</option>
                                                        <option value="01" <?php echo e(Auth::user()->day == 1 ? 'selected' : ''); ?>>01
                                                        </option>
                                                        <option value="02" <?php echo e(Auth::user()->day == 2 ? 'selected' : ''); ?>>02
                                                        </option>
                                                        <option value="03" <?php echo e(Auth::user()->day == 3 ? 'selected' : ''); ?>>03
                                                        </option>
                                                        <option value="04" <?php echo e(Auth::user()->day == 4 ? 'selected' : ''); ?>>04
                                                        </option>
                                                        <option value="05" <?php echo e(Auth::user()->day == 5 ? 'selected' : ''); ?>>05
                                                        </option>
                                                        <option value="06" <?php echo e(Auth::user()->day == 6 ? 'selected' : ''); ?>>06
                                                        </option>
                                                        <option value="07" <?php echo e(Auth::user()->day == 7 ? 'selected' : ''); ?>>07
                                                        </option>
                                                        <option value="08" <?php echo e(Auth::user()->day == 8 ? 'selected' : ''); ?>>08
                                                        </option>
                                                        <option value="09" <?php echo e(Auth::user()->day == 9 ? 'selected' : ''); ?>>09
                                                        </option>
                                                        <option value="10" <?php echo e(Auth::user()->day == 10 ? 'selected' : ''); ?>>10
                                                        </option>
                                                        <option value="11" <?php echo e(Auth::user()->day == 11 ? 'selected' : ''); ?>>11
                                                        </option>
                                                        <option value="12" <?php echo e(Auth::user()->day == 12 ? 'selected' : ''); ?>>12
                                                        </option>
                                                        <option value="13" <?php echo e(Auth::user()->day == 13 ? 'selected' : ''); ?>>13
                                                        </option>
                                                        <option value="14" <?php echo e(Auth::user()->day == 14 ? 'selected' : ''); ?>>14
                                                        </option>
                                                        <option value="15" <?php echo e(Auth::user()->day == 15 ? 'selected' : ''); ?>>15
                                                        </option>
                                                        <option value="16" <?php echo e(Auth::user()->day == 16 ? 'selected' : ''); ?>>16
                                                        </option>
                                                        <option value="17" <?php echo e(Auth::user()->day == 17 ? 'selected' : ''); ?>>17
                                                        </option>
                                                        <option value="18" <?php echo e(Auth::user()->day == 18 ? 'selected' : ''); ?>>18
                                                        </option>
                                                        <option value="19" <?php echo e(Auth::user()->day == 19 ? 'selected' : ''); ?>>19
                                                        </option>
                                                        <option value="20" <?php echo e(Auth::user()->day == 20 ? 'selected' : ''); ?>>20
                                                        </option>
                                                        <option value="21" <?php echo e(Auth::user()->day == 21 ? 'selected' : ''); ?>>21
                                                        </option>
                                                        <option value="22" <?php echo e(Auth::user()->day == 22 ? 'selected' : ''); ?>>22
                                                        </option>
                                                        <option value="23" <?php echo e(Auth::user()->day == 23 ? 'selected' : ''); ?>>23
                                                        </option>
                                                        <option value="24" <?php echo e(Auth::user()->day == 24 ? 'selected' : ''); ?>>24
                                                        </option>
                                                        <option value="25" <?php echo e(Auth::user()->day == 25 ? 'selected' : ''); ?>>
                                                            25</option>
                                                        <option value="26" <?php echo e(Auth::user()->day == 26 ? 'selected' : ''); ?>>26
                                                        </option>
                                                        <option value="27" <?php echo e(Auth::user()->day == 27 ? 'selected' : ''); ?>>27
                                                        </option>
                                                        <option value="28" <?php echo e(Auth::user()->day == 28 ? 'selected' : ''); ?>>28
                                                        </option>
                                                        <option value="29" <?php echo e(Auth::user()->day == 29 ? 'selected' : ''); ?>>29
                                                        </option>
                                                        <option value="30" <?php echo e(Auth::user()->day == 30 ? 'selected' : ''); ?>>30
                                                        </option>
                                                        <option value="31" <?php echo e(Auth::user()->day == 31 ? 'selected' : ''); ?>>31
                                                        </option>
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                                <div class="custom-select selector-width mt0">
                                                    <select name="year" id="Year">
                                                        <option>Year</option>
                                                        <option value="2030" <?php echo e(Auth::user()->year == 2030 ? 'selected'
                                                            : ''); ?>>
                                                            2030
                                                        </option>
                                                        <option value="2029" <?php echo e(Auth::user()->year == 2029 ? 'selected'
                                                            : ''); ?>>
                                                            2029
                                                        </option>
                                                        <option value="2028" <?php echo e(Auth::user()->year == 2028 ? 'selected'
                                                            : ''); ?>>
                                                            2028
                                                        </option>
                                                        <option value="2027" <?php echo e(Auth::user()->year == 2027 ? 'selected'
                                                            : ''); ?>>
                                                            2027
                                                        </option>
                                                        <option value="2026" <?php echo e(Auth::user()->year == 2026 ? 'selected'
                                                            : ''); ?>>
                                                            2026
                                                        </option>
                                                        <option value="2025" <?php echo e(Auth::user()->year == 2025 ? 'selected'
                                                            : ''); ?>>
                                                            2025
                                                        </option>
                                                        <option value="2024" <?php echo e(Auth::user()->year == 2024 ? 'selected'
                                                            : ''); ?>>
                                                            2024
                                                        </option>
                                                        <option value="2023" <?php echo e(Auth::user()->year == 2023 ? 'selected'
                                                            : ''); ?>>
                                                            2023
                                                        </option>
                                                        <option value="2022" <?php echo e(Auth::user()->year == 2022 ? 'selected'
                                                            : ''); ?>>
                                                            2022
                                                        </option>
                                                        <option value="2021" <?php echo e(Auth::user()->year == 2021 ? 'selected'
                                                            : ''); ?>>
                                                            2021
                                                        </option>
                                                        <option value="2020" <?php echo e(Auth::user()->year == 2020 ? 'selected'
                                                            : ''); ?>>
                                                            2020
                                                        </option>
                                                        <option value="2019" <?php echo e(Auth::user()->year == 2019 ? 'selected'
                                                            : ''); ?>>
                                                            2019
                                                        </option>
                                                        <option value="2018" <?php echo e(Auth::user()->year == 2018 ? 'selected'
                                                            : ''); ?>>
                                                            2018
                                                        </option>
                                                        <option value="2017" <?php echo e(Auth::user()->year == 2017 ? 'selected'
                                                            : ''); ?>>
                                                            2017
                                                        </option>
                                                        <option value="2016" <?php echo e(Auth::user()->year == 2030 ? 'selected'
                                                            : ''); ?>>
                                                            2016
                                                        </option>
                                                        <option value="2015" <?php echo e(Auth::user()->year == 2015 ? 'selected'
                                                            : ''); ?>>
                                                            2015
                                                        </option>
                                                        <option value="2014" <?php echo e(Auth::user()->year == 2014 ? 'selected'
                                                            : ''); ?>>
                                                            2014
                                                        </option>
                                                        <option value="2013" <?php echo e(Auth::user()->year == 2013 ? 'selected'
                                                            : ''); ?>>
                                                            2013
                                                        </option>
                                                        <option value="2012" <?php echo e(Auth::user()->year == 2012 ? 'selected'
                                                            : ''); ?>>
                                                            2012
                                                        </option>
                                                        <option value="2011" <?php echo e(Auth::user()->year == 2011 ? 'selected'
                                                            : ''); ?>>
                                                            2011
                                                        </option>
                                                        <option value="2010" <?php echo e(Auth::user()->year == 2010 ? 'selected'
                                                            : ''); ?>>
                                                            2010
                                                        </option>
                                                        <option value="2009" <?php echo e(Auth::user()->year == 2009 ? 'selected'
                                                            : ''); ?>>
                                                            2009
                                                        </option>
                                                        <option value="2008" <?php echo e(Auth::user()->year == 2008 ? 'selected'
                                                            : ''); ?>>
                                                            2008
                                                        </option>
                                                        <option value="2007" <?php echo e(Auth::user()->year == 2007 ? 'selected'
                                                            : ''); ?>>
                                                            2007
                                                        </option>
                                                        <option value="2006" <?php echo e(Auth::user()->year == 2006 ? 'selected'
                                                            : ''); ?>>
                                                            2006
                                                        </option>
                                                        <option value="2005" <?php echo e(Auth::user()->year == 2005 ? 'selected'
                                                            : ''); ?>>
                                                            2005
                                                        </option>
                                                        <option value="2004" <?php echo e(Auth::user()->year == 2004 ? 'selected'
                                                            : ''); ?>>
                                                            2004
                                                        </option>
                                                        <option value="2003" <?php echo e(Auth::user()->year == 2003 ? 'selected'
                                                            : ''); ?>>
                                                            2003
                                                        </option>
                                                        <option value="2002" <?php echo e(Auth::user()->year == 2002 ? 'selected'
                                                            : ''); ?>>
                                                            2002
                                                        </option>
                                                        <option value="2001" <?php echo e(Auth::user()->year == 2001 ? 'selected'
                                                            : ''); ?>>
                                                            2001
                                                        </option>
                                                        <option value="2000" <?php echo e(Auth::user()->year == 2000 ? 'selected'
                                                            : ''); ?>>
                                                            2000
                                                        </option>
                                                        <option value="1999" <?php echo e(Auth::user()->year == 1999 ? 'selected'
                                                            : ''); ?>>
                                                            1999
                                                        </option>
                                                        <option value="1998" <?php echo e(Auth::user()->year == 1998 ? 'selected'
                                                            : ''); ?>>
                                                            1998
                                                        </option>
                                                        <option value="1997" <?php echo e(Auth::user()->year == 1997 ? 'selected'
                                                            : ''); ?>>
                                                            1997
                                                        </option>
                                                        <option value="1996" <?php echo e(Auth::user()->year == 1996 ? 'selected'
                                                            : ''); ?>>
                                                            1996
                                                        </option>
                                                        <option value="1995" <?php echo e(Auth::user()->year == 1995 ? 'selected'
                                                            : ''); ?>>
                                                            1995
                                                        </option>
                                                        <option value="1994" <?php echo e(Auth::user()->year == 1994 ? 'selected'
                                                            : ''); ?>>
                                                            1994
                                                        </option>
                                                        <option value="1993" <?php echo e(Auth::user()->year == 1993 ? 'selected'
                                                            : ''); ?>>
                                                            1993
                                                        </option>
                                                        <option value="1992" <?php echo e(Auth::user()->year == 1992 ? 'selected'
                                                            : ''); ?>>
                                                            1992
                                                        </option>
                                                        <option value="1991" <?php echo e(Auth::user()->year == 1991 ? 'selected'
                                                            : ''); ?>>
                                                            1991
                                                        </option>
                                                        <option value="1990" <?php echo e(Auth::user()->year == 1990 ? 'selected'
                                                            : ''); ?>>
                                                            1990
                                                        </option>
                                                        <option value="1989" <?php echo e(Auth::user()->year == 1989 ? 'selected'
                                                            : ''); ?>>
                                                            1989
                                                        </option>
                                                        <option value="1988" <?php echo e(Auth::user()->year == 1988 ? 'selected'
                                                            : ''); ?>>
                                                            1988
                                                        </option>
                                                        <option value="1987" <?php echo e(Auth::user()->year == 1987 ? 'selected'
                                                            : ''); ?>>
                                                            1987
                                                        </option>
                                                        <option value="1986" <?php echo e(Auth::user()->year == 1986 ? 'selected'
                                                            : ''); ?>>
                                                            1986
                                                        </option>
                                                        <option value="1985" <?php echo e(Auth::user()->year == 1985 ? 'selected'
                                                            : ''); ?>>
                                                            1985
                                                        </option>
                                                        <option value="1984" <?php echo e(Auth::user()->year == 1984 ? 'selected'
                                                            : ''); ?>>
                                                            1984
                                                        </option>
                                                        <option value="1983" <?php echo e(Auth::user()->year == 1983 ? 'selected'
                                                            : ''); ?>>
                                                            1983
                                                        </option>
                                                        <option value="1982" <?php echo e(Auth::user()->year == 1982 ? 'selected'
                                                            : ''); ?>>
                                                            1982
                                                        </option>
                                                        <option value="1981" <?php echo e(Auth::user()->year == 1981 ? 'selected'
                                                            : ''); ?>>
                                                            1981
                                                        </option>
                                                        <option value="1980" <?php echo e(Auth::user()->year == 1980 ? 'selected'
                                                            : ''); ?>>
                                                            1980
                                                        </option>
                                                        <option value="1979" <?php echo e(Auth::user()->year == 1979 ? 'selected'
                                                            : ''); ?>>
                                                            1979
                                                        </option>
                                                        <option value="1978" <?php echo e(Auth::user()->year == 1978 ? 'selected'
                                                            : ''); ?>>
                                                            1978
                                                        </option>
                                                        <option value="1977" <?php echo e(Auth::user()->year == 1977 ? 'selected'
                                                            : ''); ?>>
                                                            1977
                                                        </option>
                                                        <option value="1976" <?php echo e(Auth::user()->year == 1976 ? 'selected'
                                                            : ''); ?>>
                                                            1976
                                                        </option>
                                                        <option value="1975" <?php echo e(Auth::user()->year == 1975 ? 'selected'
                                                            : ''); ?>>
                                                            1975
                                                        </option>
                                                        <option value="1974" <?php echo e(Auth::user()->year == 1974 ? 'selected'
                                                            : ''); ?>>
                                                            1974
                                                        </option>
                                                        <option value="1973" <?php echo e(Auth::user()->year == 1973 ? 'selected'
                                                            : ''); ?>>
                                                            1973
                                                        </option>
                                                        <option value="1972" <?php echo e(Auth::user()->year == 1972 ? 'selected'
                                                            : ''); ?>>
                                                            1972
                                                        </option>
                                                        <option value="1971" <?php echo e(Auth::user()->year == 1971 ? 'selected'
                                                            : ''); ?>>
                                                            1971
                                                        </option>
                                                        <option value="1970" <?php echo e(Auth::user()->year == 1970 ? 'selected'
                                                            : ''); ?>>
                                                            1970
                                                        </option>
                                                    </select>
                                                    <span class="custom-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="" class="font-famil-change">Gender</label>
                                            <div class="custom-select mt0">
                                                <select name="gender" id="gender">
                                                    <option value="none">Select</option>
                                                    <option value="male" <?php echo e(Auth::user()->gender == 'male' ? 'selected'
                                                        : ''); ?>>
                                                        Male
                                                    </option>
                                                    <option value="female" <?php echo e(Auth::user()->gender == 'female' ?
                                                        'selected' : ''); ?>>
                                                        Female
                                                    </option>
                                                    <option value="other" <?php echo e(Auth::user()->gender == 'other' ?
                                                        'selected' : ''); ?>>
                                                        other
                                                    </option>
                                                </select>
                                                <span class="custom-arrow"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="save-btn mt5">
                                        <div class="Subscribe-a">
                                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                data-bs-dismiss="modal">
                                                Subscribe To Our Newsletter
                                            </a>
                                        </div>
                                        <div class="d-flex add-address">
                                            <div class="pink-login-btn login-button">
                                                <a href=""
                                                    onclick="document.getElementById('user_form').submit(); return false;">
                                                    <div>
                                                        Save Changes
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">
                        <button class="btn btn-primary" >Open second modal</button>
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">
                        <div class="modal-header modal-cstm-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Newsletter Subscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-cstm-body">
                            <p> I have read and understood <a href="<?php echo e(route('privacy-policy')); ?>">Privacy
                                    Policy</a>
                            </p>
                        </div>
                        <?php if(@$subscription_list->status == 1): ?>
                        <form action="<?php echo e(route('cancel-subscription')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-footer modal-cstm-footer">
                                <input  type="hidden" name="id" value="<?php echo e($subscription_list->id); ?>">
                                <button type="button" id="forcancel" class="subcribe-btn"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="subcribe-btn">UNSUBSCRIBE</button>
                            </div>
                        </form>
                        <?php else: ?>
                        <form action="<?php echo e(route('user-subscription')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-footer modal-cstm-footer">
                                <button type="button" id="forcancel" class="subcribe-btn"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="subcribe-btn">SUBSCRIBE</button>
                            </div>
                        </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header modal-cstm-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Delivery Address</h5>
                            <!-- <button type="button" class="btn-close" data-bs-toggle="modal" href="#exampleModalToggle4"
                                role="button">
                            </button> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="edit-sec-box margin-top-zero ">
                            <div class="input-border-cstm">
                                <form method="POST" action="<?php echo e(route('update-user')); ?>" id="my_form">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Full
                                                    Name</label>
                                                <input type="text" name="name" placeholder="First Name" id="myInput"
                                                    value="<?php echo e(Auth::user()->name); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Address</label>
                                                <input type="text" name="address" placeholder="Address"
                                                    value="<?php echo e(Auth::user()->address); ?>" id="myInput">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Mobile
                                                    Number</label>
                                                <input type="tel" name="contact" placeholder="Mobile Number"
                                                    id="myInput" value="<?php echo e(Auth::user()->contact); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Landmark
                                                    (Optional)</label>
                                                <input type="text" name="landmark" placeholder="Landmark (Optional)"
                                                    id="myInput" value="<?php echo e(Auth::user()->landmark); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Province</label>
                                                <select name="province" id="province">
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
                                                <label for="" class="font-famil-change">Select a label
                                                    for
                                                    effective
                                                    delivery</label>
                                                <div class="d-flex justify-content-between">
                                                    <input type="hidden" name="delivery_lable" id="delivery">
                                                    <button type="button" class="choose_button" value="1" id="home"><i
                                                            class="fa fa-check-square"
                                                            aria-hidden="false"></i>Home</button>
                                                    <button type="button" class="choose_button" value="2" id="office"><i
                                                            class="fa fa-check-square"
                                                            aria-hidden="false"></i>Office</button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">City/Municipality</label>
                                                <select name="city" id="state-dd">

                                                </select>

                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column input-label-felids">
                                                <label for="" class="font-famil-change">Select a label
                                                    for
                                                    effective
                                                    delivery</label>
                                                <div class="confirming-address">
                                                    <div class="d-flex">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="offers" name="default_shipping"
                                                                value="1">
                                                            <label for="offers" class="d-flex align-items-start">Default
                                                                shipping
                                                                address</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt0">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="html2" name="default_billing"
                                                                value="2">
                                                            <label for="html2" class="d-flex align-items-start">Default
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
                                            <button class="remove-a-tag">
                                                <div class="pink-login-btn save-button">
                                                     
                                                        <div>
                                                            Save
                                                        </div>
                                                        
                                            
                                        </div>
                                        </button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-cstm-header">
                        <h5 class="modal-title" id="exampleModalToggle3">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="edit-sec-box margin-top-zero ">
                        <form>
                            <div class="input-border-cstm">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-flex flex-column input-label-felids">
                                            <label for="" class="font-famil-change">Current
                                                password</label>
                                            <input type="password" placeholder="Please Enter Your Current Password"
                                                id="myInput">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex flex-column input-label-felids">
                                            <label for="" class="font-famil-change">New
                                                password</label>
                                            <input type="password"
                                                placeholder="Minimum 6 character with a number and a letter"
                                                id="myInput">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex flex-column input-label-felids">
                                            <label for="" class="font-famil-change">Retype
                                                password</label>
                                            <input type="password" placeholder="Please ReType Your Password"
                                                id="myInput">
                                        </div>
                                    </div>
                                </div>
                                <div class="save-changes-btn mt0">
                                    <div class="d-flex add-address justify-content-center">
                                        <div class="pink-login-btn login-button">
                                            <a href=""
                                                onclick="document.getElementById('password_form').submit(); return false;">
                                                <div>
                                                    Save Chnges
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                        <button class="btn btn-primary" >Open second modal</button>
                    </div> -->
            </div>
        </div>
    </div>
    <div class="modal fade for-cstm-modal-show" id="exampleModalToggle4" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-cstm-header">
                    <h5 class="modal-title" id="exampleModalToggle4">Discard your address card?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-cstm-body">
                    <p> You haven’t finished your address card yet.
                        Are you sure you want to leave and discard
                        your inputs?</p>
                </div>
                <div class="modal-footer modal-cstm-footer">
                    <button type="button" class="subcribe-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="subcribe-btn">SUBSCRIBE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>
</div>
</div>

<!-- dashboard end -->

<!-- Start Footer -->


<!-- End Footer -->



<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('assets/js/jquery.number.js')); ?>"></script>

<script>
    $(document).ready(function() {

        $(document).ready(function() {
            $('#orderDetails').DataTable();
        });

        //   var table = $('#orderDetails').DataTable({
        //         select: false,
        //         "columnDefs": [{
        //             className: "Name",
        //             "targets":[0],
        //             "visible": false,
        //             "searchable":false
        //         }]
        //     });//End of create main table


        //   $('#orderDetails tbody').on( 'click', 'tr', function () {

        //     alert(table.row( this ).data()[0]);

        // } );
    });
</script>
<script>
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
</script>
<script>
    $(document).ready(function(more) {
        $('#table').DataTable({
            scrollY: '50vh',
            scrollX: true,
        });

    });

    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
    var selector = '.hide-div';
    var tabsdiv = '.custom-tabss';
    var logodiv = '.removespan';
    var paydiv = '.payspan';
    var activeaddclass = '.add-li-active-class';
    var activearemoveclass = '.remove-li-active-class';
    var paydiv = '.payspan';

    var canceldiv = '.cancelspan';
    var forgetpassword = '.forget-password'
    var edit_address = '.edit_address'
    var hatuo = '.remove-active'
    var laguo = '.addcstm-open'
    var shipdiv = '.shipspan';
    var removediv = '.remove-btn-css';
    var paybutton = '.for-pay-btn';
    var cancelbutton = '.for-cancel-btn';
    var forgetbutton = '.for-forget-btn';
    var shipbutton = '.for-ship-btn';
    $(selector).on('click', function() {
        $(tabsdiv).removeClass('active');
        $(logodiv).addClass('actives');
    });
    $(edit_address).on('click', function() {
        $(hatuo).removeClass('active');
        $(laguo).addClass('active show');
    });
    $(edit_address).on('click', function() {
        $(activearemoveclass).removeClass('active');
        $(activeaddclass).addClass('active');
    });
    $(removediv).on('click', function() {
        $(logodiv).removeClass('actives');
        $(paydiv).removeClass('actives');
        $(canceldiv).removeClass('actives');
        $(forgetpassword).removeClass('actives');
        $(forgetpassword).removeClass('actives');
        $(shipdiv).removeClass('actives');
        $(tabsdiv).addClass('active');
    });
    $(paybutton).on('click', function() {
        $(tabsdiv).removeClass('active');
        $(paydiv).addClass('actives');
    });
    $(shipbutton).on('click', function() {
        $(tabsdiv).removeClass('active');
        $(shipdiv).addClass('actives');
    });
    $(cancelbutton).on('click', function() {
        $(shipdiv).removeClass('actives');
        $(canceldiv).addClass('actives');
    });
    $(forgetbutton).on('click', function() {
        $(tabsdiv).removeClass('active');
        $(forgetpassword).addClass('actives');
    });

    $(forgetbutton).on('click', function() {
        $(tabsdiv).removeClass('active');
        $(forgetpassword).addClass('actives');
    });





    document.getElementById('btnh').addEventListener('click', function() {
        document.getElementById('upload_file').click()
    })
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#upload_file").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("#next").append("<div class=\"review-img-box\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<span class=\"remove\"><i class=\"fa fa-trash\"></i></span>" +
                            "</div>");
                        $(".remove").click(function() {
                            $(this).parent(".review-img-box").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
<script src="<?php echo e(asset('front_assets/js/dashboard.js')); ?>"></script>
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




    function cancelOrder(order_id, created_at) {
        // alert(order_id);
        $(".shipspan").removeClass("actives");
        $(".cancelspan").addClass("actives");

        $("#orderDate").html("");
        $("#orderDate").html(created_at);
        $("#orderId").html("");
        $("#orderId").html(`Order#` + order_id);
        $("#orderIdHidden").val(order_id);

        $.ajax({
            url: "<?php echo e('cancel_order'); ?>",
            type: "GET",
            data: {
                order_id: order_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },

            success: function(response) {
                // console.log(response)
                $(".loader-bg").addClass('loader-active');
                $("#cancelorderbody").html("");
                // update workk 13
                $("#refundorderrequest").hide();
                $("#cancel_order_id").val(response.cancellation.id);

                console.log(response.cancellation.id);
                var html = "";
                $.each(response.cancellation.purchased_items,function(value,index){
                    
                    $("#cancellation_policy").val(response.cancellation.id);
                    $("#allorders").val(response.cancellation.id);
                    $("#cancel_product_id").val(index.product.id);

                    // $("#product_id").val()
                    html += `<tr>
                                               <th scope="row"
                                                   style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                   <div class="d-flex">
                                                       <div class="form-group">
                                                           <input type="checkbox" name="cancelproduct[]" value="${index.id}" id="cancelproduct${value}">
                                                           <label for="cancelproduct${value}"
                                                               class="d-flex align-items-start margin-top-zer0">
                                                           </label>
                                                       </div>
                                                   </div>
                                               </th>
                                               <td>${index.id}</td>

                                               <input type="hidden" name="allorders" id="allorders" value>




                                                       <td><div class="phone-img-on-tabel">

                                                        ${index.product.product_type == 1 ? `<img  src="<?php echo e(asset('products')); ?>/${index.product.image}" alt="">` :
                                            `<img src="<?php echo e(asset('variations')); ?>/${index.variations.image}" alt="">` }
                                                           </div></td>
                                                   ${index.product.product_type == 1 ?  `<td> ${index.product.product_name}  </td>` : `<td> ${index.product.product_name} ${index.attribute_values} </td>` }

                                                   <td>${index.quantity}</td>
                                                   <td>$ ${index.price}</td>


                                           </tr>`;
                });
                $("#cancelorderbody").append(html);


            }
        });


    }


    // update work 13 refund order

    //update work 13


        function refundOrder(order_id, created_at){

             $(".shipspan").removeClass("actives");
            $(".cancelspan").addClass("actives");

            $("#refundorderDate").html("");
            $("#refundorderDate").html(created_at);
            $("#refundorderId").html("");
            $("#refundorderId").html(`Order#` + order_id);
            $("#refundorderIdHidden").val(order_id);

            $.ajax({
            url: "<?php echo e('refund_order_request'); ?>",
            type: "GET",
            data: {
                order_id: order_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },

            success: function(response) {
                // console.log(response)
                $(".loader-bg").addClass('loader-active');
                $("#refundorderbody").html("");
                $("#refund_order_id").val(response.refund.id);
                $("#hidecanceldiv").hide();
                console.log(response.refund.id);
                var html = "";
                $.each(response.refund.purchased_items,function(value,index){

                    $("#refund_policy").val(response.refund.id);
                    $("#refundallorders").val(response.refund.id);
                    $("#refund_product_id").val(index.product.id);

                    // $("#product_id").val()
                    html += `<tr>   <th scope="row"
                                                   style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                                                   <div class="d-flex">
                                                       <div class="form-group">
                                                           <input type="checkbox" name="refundproduct[]" id="refundproduct${value}" value="${index.id}">

                                                           <label for="refundproduct${value}"
                                                               class="d-flex align-items-start margin-top-zer0">
                                                           </label>
                                                       </div>
                                                   </div>
                                               </th>
                                               <td>${index.id}</td>

                                               <input type="hidden" name="refundallorders" id="refundallorders" value>



                                                       <td><div class="phone-img-on-tabel">

                                                        ${index.product.product_type == 1 ? `<img  src="<?php echo e(asset('products')); ?>/${index.product.image}" alt="">` :
                                            `<img src="<?php echo e(asset('variations')); ?>/${index.variations.image}" alt="">` }
                                                           </div></td>
                                                   ${index.product.product_type == 1 ?  `<td> ${index.product.product_name}  </td>` : `<td> ${index.product.product_name} ${index.attribute_values} </td>` }

                                                   <td>${index.quantity}</td>
                                                   <td>$ ${index.price}</td>


                                           </tr>`;
                });
                $("#refundorderbody").append(html);


            }
        });
        }



    // order cancellation



    // order tracking
    function orderTracking(order_id) {
        // alert(order_id);

        $.ajax({
            url: "<?php echo e(route('order_tracking')); ?>",
            type: "GET",
            data: {
                order_id: order_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');
                // console.log(response);
                 $("#cancelall").html("");
                 // update work 16
                $("#refunddetails").html("");
                 $("#refunddata").html("");
                 $("#hiderefundtext").hide();
                 $('.hidecancel').hide();
                $("#orderDetailsHTML").html("");
                $("#orderDetailsHTML").html(`
                <div class="login-sec-box position-relative">
                            <button class="remove-btn-css" onclick="order_tracking_arrow()">
                                <div class="red-back-btn" >
                                    <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>"
                                        alt="order-image">
                                </div>
                            </button>
                            <div
                                class="d-flex justify-content-between mt0 for-background-color-review align-items-baseline">
                                <div class="d-flex align-items-center">
                                    <div class="product-review-img">
                                        <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                                    </div>
                                    <div class="lotti-retail-review">
                                        <p>Order#${response.order.id}</p>
                                        <span class="text-start">Place On ${response.created_at}</span>
                                    </div>
                                </div>
                                ${ response.order.order_status == 1 ? `
                                    <div id="orderCancelAppend">
                                    <a class="for-cancel-btn" onclick="cancelOrder(${response.order.id},'Place On ${response.created_at}')">
                                        <span>
                                            Cancel Order
                                        </span>
                                    </a>
                                </div>` : `` }

                                  ${response.order.order_status == 3 ? `
                                    <div id="orderCancelAppend">
                                    <a class="for-cancel-btn" onclick="refundOrder(${response.order.id},'Place On ${response.created_at}')">
                                        <span>
                                            Refund Order
                                        </span>
                                    </a>
                                </div>` : `` }

                                ${ response.order.order_status == 4 ? `
                                    <div class="">
                                    <a class="for-cancel-btn">
                                        <span>
                                            Order cancelled
                                        </span>
                                    </a>
                                </div>
                                ` : `` }


                            </div>
                            <div class="showing-status mt2">
                                <div class="status-line">
                                    <div class="status-line-span ${ response.order.order_status == 2 || response.order.order_status == 3 ? 'pink-active-line' : '' }"></div>
                                    <div class="status-line-span ${ response.order.order_status == 3 ? 'pink-active-line' : '' }"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="processing">
                                        <div class="round-dots ${ response.order.order_status == 1 || response.order.order_status == 2 || response.order.order_status == 3 ? 'active' : '' }"></div>
                                        <p>
                                            Processing
                                        </p>
                                    </div>
                                    <div class="processing">
                                        <div class="round-dots ${ response.order.order_status == 2 || response.order.order_status == 3 ? 'active' : '' }"></div>
                                        <p>
                                            Shipped
                                        </p>
                                    </div>
                                    <div class="processing">
                                        <div class="round-dots ${ response.order.order_status == 3 ? 'active' : '' }"></div>
                                        <p>
                                            Delivered
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="view-more-box">
                                <p>
                                    ${ response.order.order_status == 1 || response.order.order_status == 2 || response.order.order_status == 3 ? `<label>${response.processing_at} </label> Your order has been successfully placed.<br><label>${response.processing_at} </label> Your order has been pending.<br>` : `` }
                                    ${ response.order.order_status == 4 ? `<label>${response.cancelled_at} </label> Your order has been cancelled successfully.<br><label>` : `` }

                                    <span id="dots"></span>

                                    <span  id="more">
                                    ${ response.order.order_status == 2 || response.order.order_status == 3 ? `<label>${response.shipped_at} </label> Thank you for shopping at Lotti!<br><label>${response.shipped_at} </label> Your order has been dispatched.<br>` : `` }
                                    ${ response.order.order_status == 3 ? `<label>${response.delivered_at} </label> Your order has been delivered.<br><label>${response.delivered_at} </label> Thank you for shopping at Lotti!<br>` : `` }
                                    ${ response.order.ordre_verification == 1 ? `<label>${response.verified_at} </label> Your order is being verified.<br>` : `` }
                                    </span>
                                </p>
                                <button onclick="myFunction(more)" id="myBtn">${ response.order.order_status == 2 || response.order.order_status == 3 ? 'Read more' : ''}</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="shipping-address-box">
                                        <h2>Shipping Address</h2>
                                        <h6>${response.user.name}</h6>
                                        <p> <span>${response.shipping_address.delivery_label == 1 && response.shipping_address.delivery_label != null ? 'Home' : 'Office'}</span>${response.shipping_address.province}, ${response.shipping_address.city} - ${response.shipping_address.landmark}, ${response.shipping_address.address}
                                            </p>
                                        <label>${response.shipping_address.contact}</label>
                                    </div>
                                    <div class="shipping-address-box">
                                        <h2>Billing Address</h2>
                                        <h6>${response.user.name}</h6>
                                        <p> <span>${response.billing_address.delivery_label == 1 && response.billing_address.delivery_label != null ? 'Home' : 'Office'}</span>${response.billing_address.province}, ${response.billing_address.city} - ${response.billing_address.landmark}, ${response.billing_address.address}
                                            </p>
                                        <label>${response.billing_address.contact}</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="order-summary mt16">
                                        <h2>Total Summary</h2>
                                        <div class="d-flex justify-content-between mt1">
                                            <label>Item total</label>
                                            <span>$${response.purchased_items_sum_price}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt0">
                                            <label>Delivery Fee</label>
                                            <span>$${response.delivery_fee}</span>
                                        </div>

                                        <!--
                                        <div class="d-flex justify-content-between mt0">
                                            <label>Total</label>
                                            <span>$${response.purchased_items_sum_price + response.delivery_fee}</span>
                                        </div>

                                        <!-- <div class="d-flex justify-content-between mt1">
                                               <label>Cash Payment Fee</label>
                                               <span>$10.00</span>
                                           </div> -->
                                        <div
                                            class="d-flex justify-content-between mt1 top-border-padding align-items-center">
                                            <span>Total Amount</span>
                                            <p>$${ response.total }</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt0">
                                            <span>Payment Method</span>
                                            <label>${response.payment_method}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                `);



                $(".tab-content").removeClass("active");
                $(".payspan").removeClass("actives");
                $(".shipspan").addClass("actives");

            }
        });

    }



    $("#my_form").on("submit", function(e) {
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
                    $.each(response.errors, function(indexInArray, valueOfElement) {
                        // console.log(valueOfElement);
                        toastr.error(valueOfElement);
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


    function order_tracking_arrow() {
        $(".shipspan").removeClass("actives");
        $("#pills-tabContent").addClass("active");
    }

    function orderVerify(orderId) {
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('order_verification')); ?>",
            data: {
                orderId: orderId
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');

                if (response.status == 200) {
                    toastr.success(response.message);
                    $(".verify-html-" + orderId).html("");
                    $(".verify-html-" + orderId).html(`
                <button class="order-tracking-btn status_verification">
                    <img src="<?php echo e(asset('icons/verified.png')); ?>" alt="verified" width="16px">
                    <span>
                        Received
                    </span>
                </button>
                `);
                } else {
                    toastr.error(response.message)
                }
            }
        });
    }



    $("#requestCancellation").on("submit", function(e) {

        e.preventDefault();


        $.ajax({
            type: "GET",
            url: "<?php echo e(route('order_cancel')); ?>",
            data: $(this).serialize(),
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');

                if (response.status == 400) {
                    $.each(response.errors, function(indexInArray, valueOfElement) {
                        toastr.error(valueOfElement);
                    });
                }

                if (response.status == 200) {

                    toastr.success('Done', response.message, {
                        timeOut: 1000,
                        preventDuplicates: true,
                        onHidden: function() {
                            window.location.reload();
                        }
                    });


                }


            }
        });

    });


    $(".no_formate").number(true, 2);


    function orderDetails(orderId,order_status=null) {



        $.ajax({
            type: "GET",
            url: "<?php echo e(route('order_details')); ?>",
            data: {
                orderId: orderId
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {

                $(".loader-bg").addClass('loader-active');

                $("#orderIdInvoice").html("");
                $("#orderIdInvoice").html("#" + response.order.id);

                $("#orderDateInvoice").html("");
                $("#orderDateInvoice").html(response.created_at);


                // billing address
                $("#billingContactName").html("");
                $("#billingContactName").html(response.billing_address.name);
                $("#billingAddressFor").html("");
                $("#billingAddressFor").html(
                    `${response.billing_address.delivery_label == 1 && response.billing_address.delivery_label != null ? 'Home' : 'Office'}`
                );
                $("#billingAddress").html("");
                $("#billingAddress").html(
                    `${response.billing_address.province}, ${response.billing_address.city} - ${response.billing_address.landmark}, ${response.billing_address.address}`
                );
                $("#billingPhone").html("");
                $("#billingPhone").html(`${response.billing_address.contact}`);

                // shipping address
                $("#shippingContactName").html("");
                $("#shippingContactName").html(response.shipping_address.name);
                $("#shippingAddressFor").html("");
                $("#shippingAddressFor").html(
                    `${response.shipping_address.delivery_label == 1 && response.shipping_address.delivery_label != null ? 'Home' : 'Office'}`
                );
                $("#shippingAddress").html("");
                $("#shippingAddress").html(
                    `${response.shipping_address.province}, ${response.shipping_address.city} - ${response.shipping_address.landmark}, ${response.shipping_address.address}`
                );
                $("#shippingPhone").html("");
                $("#shippingPhone").html(`${response.shipping_address.contact}`);


                $("#invoiceTbody").html("");
                let tbody = '';
                for (let x = 0; x < response.purchased_items.length; x++) {
                console.log(response.order.purchased_items[x].product.product_type);


                    tbody += `

                   <tr>

                    <th scope="row"
                            style="font-size:15px !important; font-family: montserratBold !important; color: #646364 !important;">
                        ${x + 1}</th>

                         ${response.order.purchased_items[x].product.product_type == 1 ?
                       `<td>
                       ${response.purchased_items[x].product_name}</td>` : `<td>
                       ${response.purchased_items[x].product_name} ${response.order.purchased_items[x].attribute_values}</td>` }
                        <td>${response.purchased_items[x].qty}</td>
                         <td>$${response.purchased_items[x].price}</td>
                        <td>$${response.purchased_items[x].total}</td>
                        ${response.order.purchased_items[x].order_status == 2 ?
                        `<td>${response.order.purchased_items[x].order_status == 2 ?  `Cancelled` : `Purchased` }
                         </td>` : `<td>${response.order.purchased_items[x].order_status == 3 ?  `Refund` : `Purchased` }
                         </td>` }
                         </tr>
                    `;


                }


                $("#invoiceTbody").html(tbody);
                    for (let x = 0; x < response.purchased_items.length; x++) {
                        if(response.order.purchased_items[x].order_status == 2 || response.order.purchased_items[x].order_status == 3){
                            var unitprice  = response.purchased_items[x].total * response.purchased_items[x].qty;
                            var finalprice  = response.purchased_items_sum_price  - unitprice;
                            console.log(finalprice);
                        }


                    
                $("#summary_amount").html(`

                        <div class="invoice-email justify-content-end">
                            <label for="">Sub Total :</label>
                            ${response.order.purchased_items[x].order_status == 2 || response.order.purchased_items[x].order_status == 3 ?
                           ` <p class="tabel-line text-end">$${response.cancel_item_sum_price}  </p>` : `<p class="tabel-line text-end">$${response.purchased_items_sum_price}</p>`}
                        </div>
                        <div class="invoice-email justify-content-end">
                            <label for="">Delivery Fee :</label>
                            <p class="tabel-line text-end">$${response.delivery_fee}</p>
                        </div>
                        <div class="invoice-email justify-content-end">
                            <label for="">Total Save Amount :</label>
                            <p class="tabel-line text-end">$${response.total_discount}</p>
                        </div>
                        <div class="invoice-email justify-content-end">
                            <label for="">Total :</label>
                            ${response.order.purchased_items[x].order_status == 2 || response.order.purchased_items[x].order_status == 3 ?
                            `<p class="tabel-line text-end">$${response.canceltotal}</p>` : `<p class="tabel-line text-end">$${response.total}</p>` }
                        </div>
                `);
             }



                $("#pills-tabContent").removeClass("active");
                $(".payspan").addClass("actives");



            }
        });

    }


    $("#filter").on("change", function() {

        $.ajax({
            type: "GET",
            url: "<?php echo e(route('orders_filter')); ?>",
            data: {
                filter: $(this).val()
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');

                $("#filter_html").html();

                if (response.status == 404) {
                    $("#filter_html").html(`
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
                    `);

                } else {
                    $("#filter_html").html(response);
                }

            }
        });

    });
</script>



<script>
    //     $(function() {
    //     $("#btnPrint").click(function() {
    //         var contents = $("#dvContents").html();
    //         var frame1 = $('<iframe />');
    //         frame1[0].name = "frame1";
    //         frame1.css({
    //             "position": "absolute",
    //             "top": "-1000000px"
    //         });
    //         $("body").append(frame1);
    //         var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument
    //             .document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    //         frameDoc.document.open();
    //         //Create a new HTML document.
    //         frameDoc.document.write('<html><head><title>DIV Contents</title>');
    //         frameDoc.document.write('</head><body>');
    //         //Append the external CSS file.
    //         frameDoc.document.write(
    //             '<link href="../assets/css/dashboard.css" rel="stylesheet" type="text/css" />');
    //         // frameDoc.document.write('<link href="../assets/css/dashboard.css" rel="stylesheet" type="text/css" />');
    //         //Append the DIV contents.
    //         frameDoc.document.write(contents);
    //         frameDoc.document.write('</body></html>');
    //         frameDoc.document.close();
    //         setTimeout(function() {
    //             window.frames["frame1"].focus();
    //             window.frames["frame1"].print();
    //             frame1.remove();
    //         }, 500);
    //     });
    // });
</script>

<script>
    function review_back_bt() {
        $(".removespan").removeClass("actives");
        $("#pills-tabContent").addClass("active");
    }
</script>
<script>
    function reviewproduct(review_id) {
        // alert(review_id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('review_products')); ?>",
            data: {
                review_id: review_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');
                // console.log(response);
                $("#review_append").html("");
                $("#new_review").html("");
                if (response.status == 200) {
                    // alert(response.status)
                    // console.log(response.info);
                    // return false;
                    $("#new_review").html(`<div class="login-sec-box position-relative">
                                <button class="remove-btn-css" onclick="review_back_bt()">
                                    <div class="red-back-btn">
                                        <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                    </div>
                                </button>
                                <div
                                    class="d-flex justify-content-between mt0 for-background-color-review align-items-baseline">
                                    <div class="d-flex align-items-center">
                                        <div class="product-review-img">
                                            ${response.info.product.product_type == 1 ? `<img  src="<?php echo e(asset('products')); ?>/${response.info.product.image}" alt="">` :
                                            `<img src="<?php echo e(asset('variations')); ?>/${response.info.variations.image}" alt="">` }
                                        </div>
                                        <div class="lotti-retail-review">
                                            <p>${response.info.product.product_name}</p>
                                                ${response.info.attribute_values ? `<span class="text-start">${response.info.attribute_values}</span>` : ''}
                                        </div>
                                    </div>


                                </div>
                                <form method="POST" action="<?php echo e(route('store-reviews')); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="order_id" value="${response.info.order_id}">
                                    <input type="hidden" name="product_id" value="${response.info.product_id}">
                                    ${response.info.variations != null  ?
                                        `<input type="hidden" name="product_variation_id" value="${response.info.variations.id}" >` : '' }
                                    <div class="for-review-comment">
                                        <div class="cstm-star-rate">
                                            <input type="radio" id="star5" name="reviews" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="reviews" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="reviews" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="reviews" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="reviews" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                        <span>(5)</span>
                                    </div>
                                    <div class="field d-flex flex-column upload-button">
                                        <input  type="file" id="upload_file" name="image[]" multiple capture />

                                    </div>
                                    <div class="" id="next">
                                    </div>
                                    <div class="input-textarea">
                                        <textarea name="comments" id="comments" placeholder="Don't be shy, tell us more!"></textarea>
                                    </div>
                                    <div class="share-reveiw-btn" >
                                        <a href="#">
                                            <button type="submit" class="reviewload">Share Review</button>
                                        </a>
                                    </div>
                                </form>

                            </div>`);


                    $("#pills-tabContent").removeClass("active");
                    $(".payspan").addClass("active");
                    // $("#new_review").html("");


                }
            }

        });
    }
</script>

<script>
    function editreviewproduct(edit_review) {
        // alert(review_id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('edit_review')); ?>",
            data: {
                edit_review: edit_review
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },
            success: function(response) {
                $(".loader-bg").addClass('loader-active');
                // console.log(response);
                $("#review_append").html("");
                
                $("#new_review").html("");
                if (response.status == 200) {
                    // alert(response.status)
                    console.log(response.edit_review.get_product.image);
                    // return false;
                    $("#review_append").html(`<div class="login-sec-box position-relative">
                                <button class="remove-btn-css" onclick="review_back_bt()">
                                    <div class="red-back-btn">
                                        <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                    </div>
                                </button>
                                <div
                                    class="d-flex justify-content-between mt0 for-background-color-review align-items-baseline">
                                    <div class="d-flex align-items-center">
                                        <div class="product-review-img">
                                            ${response.edit_review.get_product.product_type == 1 ? `<img  src="<?php echo e(asset('products')); ?>/${response.edit_review.get_product.image}" alt="">` :
                                            `<img src="<?php echo e(asset('variations')); ?>/${response.edit_review.variations.image}" alt="">` }
                                        </div>
                                        <div class="lotti-retail-review">
                                            <p>${response.edit_review.get_product.product_name}</p>
                                                 ${response.edit_review.variations != null  ?
                                                `${response.edit_review.variations.attribute ? `<span class="text-start">${response.edit_review.variations.attribute}</span>` : ''}` : `${response.edit_review.get_product.product_name}` }
                                        </div>
                                    </div>


                                </div>
                                <form method="POST" action="<?php echo e(route('update-reviews')); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="rating_id" value="${response.edit_review.id}">
                                    <input type="hidden" name="product_id" value="${response.edit_review.get_product.id}">
                                    ${response.edit_review.variations != null  ?
                                        `<input type="hidden" name="product_variation_id" value="${response.edit_review.variations.id}" >` : '' }
                                    <div class="for-review-comment">
                                        <div class="cstm-star-rate">
                                            ${response.ratings == 5  ?
                                            ` <input type="radio" id="star5" class="gold" name="reviews" value="5" checked />
                                            <label for="star5" title="text" >5 stars</label>`  :
                                           ` <input type="radio" id="star5" class="gold" name="reviews" value="5" />
                                            <label for="star5" title="text">5 stars</label>` }
                                            ${response.ratings == 4  ?
                                            ` <input type="radio" id="star4" class="gold" name="reviews" value="4" checked />
                                            <label for="star5" title="text" >5 stars</label>`  :
                                           ` <input type="radio" id="star4" class="gold" name="reviews" value="4" />
                                            <label for="star4" title="text">5 stars</label>` }
                                            ${response.ratings == 3  ?
                                            ` <input type="radio" id="star3" class="gold" name="reviews" value="3" checked />
                                            <label for="star3" title="text" checked>5 stars</label>`  :
                                           ` <input type="radio" id="star3" class="gold" name="reviews" value="3" />
                                            <label for="star3" title="text">5 stars</label>` }
                                            ${response.ratings == 2  ?
                                            ` <input type="radio" id="star2" class="gold" name="reviews" value="2" checked />
                                            <label for="star2" title="text" checked>5 stars</label>`  :
                                           ` <input type="radio" id="star2" class="gold" name="reviews" value="2" />
                                            <label for="star2" title="text">5 stars</label>` }
                                            ${response.ratings == 1  ?
                                            ` <input type="radio" id="star3" class="gold" name="reviews" value="1" checked />
                                            <label for="star1" title="text" checked>5 stars</label>`  :
                                           ` <input type="radio" id="star1" class="gold" name="reviews" value="1" />
                                            <label for="star1" title="text">5 stars</label>` }

                                        </div>
                                        <span>(5)</span>
                                    </div>
                                    <div class="field d-flex flex-column upload-button">
                                        <input  type="file" id="upload_file" name="image[]" multiple capture />

                                    </div>

                                    <div class="" id="next">
                                    </div>
                                    <div class="input-textarea">
                                        <textarea name="comments" id="comments" placeholder="Don't be shy, tell us more!">${response.edit_review.comments}</textarea>
                                    </div>
                                    <div class="share-reveiw-btn" >
                                        <a href="#">
                                            <button type="submit" class="reviewload">Share Review</button>
                                        </a>
                                    </div>
                                </form>

                            </div>`);

                    $("#pills-tabContent").removeClass("active");
                    $(".payspan").addClass("active");


                }
            }

        });
    }
</script>

<script>
    $(document).on('click', ".reviewload", function() {
        $(".loader-bg").removeClass('loader-active');
    });
</script>
<script>
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

                $.each($("#editprovince > option"), function(indexInArray, valueOfElement) {
                    if ($(this).val() == response.user_address.province) {
                        $(this).attr('selected', true);
                    }
                });

                $.each($("#allcities > option"), function(indexInArray, valueOfElement) {
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
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
<script>
    const eyeConfirm = document.querySelector('#eyeConfirm');
    const c_password = document.querySelector('#id_confirm');

    eyeConfirm.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = c_password.getAttribute('type') === 'password' ? 'text' : 'password';
        c_password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });



    $('.subcribe-btn').on('click', function() {
        $(".loader-bg").removeClass('loader-active');
    })

    $("#forcancel").on('click', function() {
        $(".loader-bg").addClass('loader-active');
        $(this).attr('style', 'display: none');
        $(this).attr('style', 'display: block');
    })
</script>




<script>
    var selectAllItems = "#cancellation_policy";
    var checkboxItem = ":checkbox";

$(selectAllItems).click(function() {

    if (this.checked) {
        $(checkboxItem).each(function(index,val) {
            this.checked = true;
        });
    } else {
        $(checkboxItem).each(function(index,val) {
            this.checked = false;
        });
    }

    let bulkCheckboxAll = null;
    this.checked ? bulkCheckboxAll = 1 : bulkCheckboxAll = 0;




});
</script>


<script>
    var selectRefundItems = "#refund_policy";
    var checkboxRefundItem = ":checkbox";

$(selectRefundItems).click(function() {

    if (this.checked) {
        $(checkboxRefundItem).each(function(index,val) {
            this.checked = true;
        });
    } else {
        $(checkboxRefundItem).each(function(index,val) {
            this.checked = false;
        });
    }

    let bulkCheckboxRefundAll = null;
    this.checked ? bulkCheckboxRefundAll = 1 : bulkCheckboxRefundAll = 0;




});
</script>


<script>
$('.returnprocess').on('click',function(){

    $.ajax({
                type: "GET",
                url: "<?php echo e(route('order_refund_data')); ?>",
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(response) {
                    $(".loader-bg").addClass('loader-active');
                     $("#hiderefundtext").show();
                    $("#refunddata").html("");

                    var html = '';
                    $.each(response.refund_orders,function(value,index){

                           const today = new Date(index.updated_at);
                       html+=`
                      <div class="d-flex justify-content-between for-background-color-review align-items-baseline cancelorder">
                        <div class="d-flex align-items-center">
                            <div class="product-review-img">
                                <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                            </div>
                              <div class="d-flex justify-content-between align-items-center">
                            <div class="lotti-retail-review">
                                <p>Order # ${index.id}</p>
                                <span>Refund On ${today.toLocaleDateString()}
                                    </span>
                            </div>
                            </div>

                            </div>
                        ${index.order_status != 9 ?
                            `<div class="lotti-review">
                                <button class="order-tracking-btn status_pay_to" onclick="getRefundOrders(${index.id})">
                                    <span>
                                    Requested for Refund
                                    </span>

                                </button>
                            </div>` : `<div class="lotti-review">
                                <button class="order-tracking-btn status_pay_to" onclick="getRefundOrders(${index.id})">
                                    <span>
                                   Refunded
                                    </span>
                                </button>
                            </div>`  }

                        </div>
                                `;
                        $("#refunddata").html(html);
                }
            )}

            });
});

 function getRefundOrders(order_id){
        $.ajax({
            url: "<?php echo e('get_refunded_all'); ?>",
            type: "GET",
            data: {
                order_id: order_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },

            success: function(response) {
                console.log(response);
                $(".loader-bg").addClass('loader-active');
                $("#cancelall").html("");
                 $("#testcancel").html("");
                $("#orderDetailsHTML").html("");
                $('.hidecancel').hide();
                $('.hideorderdetail').hide();
                $('.cancelprintall').addClass('actives');
                    console.log(response.allrefund[0].cancellation_status);
                    $("#refunddetails").html("");
                    const today1 = new Date(response.allrefund[0].updated_at);
                     const today2 = new Date(response.allrefund[0].cancelled_at);
                    html+=
                    `<div class="top-margin">
                        <div class="login-sec-box position-relative">
                            <button class="remove-btn-css" onclick="order_cancel_detail_arrow()">
                                <div class="red-back-btn">
                                    <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                </div>
                            </button>
                            <div class="mt0 for-background-color-review">
                                <div class="cancelation-reason">
                                    <div class="lotti-retail-review">
                                        <p>Refund Reason</p>
                                        <h4 class="text-start">${response.allrefund[0].get_reason.reason}</h4>
                                    </div>
                                </div>
                            </div>
                                  <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Refund Description</h3>

                                        <div class="lotti-retail-review mt1">
                                            <label for="">${response.allrefund[0].cancellation_comments}</label>
                                        </div>

                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Tracking Progress</h3>

                               <div class="showing-status dots2-css mt2">
                                <div class="status-line">
                                    <div class="status-line-span ${ response.allrefund[0].cancellation_status == 2  ? 'pink-active-line' : '' }" ></div>
                                    <div class="status-line-span ${ response.allrefund[0].cancellation_status == 2  ? 'pink-active-line' : '' }"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="processing">
                                        <div class="round-dots  ${ response.allrefund[0].cancellation_status == null || 2 ?  'active' : '' }"></div>
                                        <p>
                                            Refund <br>
                                            in Progress
                                        </p>
                                    </div>

                                    <div class="processing">
                                        <div class="round-dots ${ response.allrefund[0].cancellation_status == null || 2 ? 'active' : '' }" "></div>
                                        <p>
                                            Refunded
                                        </p>
                                    </div>
                                </div>
                            </div>
                                <div class="view-more-box">
                                    <p>${response.allrefund[0].cancelled_at != null ? `<label>${today1.toLocaleDateString()} </label> Your refund request is pending.`: '' } <br>
                                     ${response.allrefund[0].cancellation_status == 2 ? `<label>${today1.toLocaleDateString()} </label> Your refund request has been approved.`  : '' }
                                        <br>

                                    </p>
                                </div>
                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Refunded Items</h3>
                                <div id="appended_refund_form"></div>
                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Refund Information</h3>

                                        <div class="lotti-retail-review mt1">
                                            <label for="">Order Number: ${response.allrefund[0].order_id}</label>
                                        </div>

                            </div>
                             <div class="mt2 for-background-color-review">
                             <h3 class="tracking-class">Company Refund Address</h3>
                            <div class="lotti-retail-review mt1">
                                            <label for=""><?php echo e($config->address); ?></label>
                            </div>
                            </div>

                        </div>
                    </div>`;

                $("#refunddetails").html(html);

                $("#appended_refund_form").html("");
                    var html = '';

                $.each(response.allrefund,function(value,index){

                     html+=`
                            ${index.product.product_type == 2 ?
                           ` <div class="d-flex justify-content-between for-box-shadow align-items-baseline">
                                <div class="d-flex align-items-center">
                                    <div class="product-review-img">
                                        <img src="<?php echo e(asset('variations')); ?>/${index.variations.image}" alt="">
                                    </div>
                                    <div class="lotti-retail-review">
                                        <p>${index.product.product_name}</p>
                                        <span class="text-start">${index.variations.attribute},</span>
                                        <label for="">$ ${index.variations.regular_price}</label>
                                    </div>
                                </div>

                                <div class="for-cancel-btn">
                                    <span>
                                        x ${index.quantity}
                                    </span>
                                </div>

                            </div>` :
                           ` <div class="d-flex justify-content-between for-box-shadow align-items-baseline">
                                <div class="d-flex align-items-center">
                                    <div class="product-review-img">
                                        <img src="<?php echo e(asset('products')); ?>/${index.product.image}" alt="">
                                    </div>
                                    <div class="lotti-retail-review">
                                        <p>${index.product.product_name}</p>
                                        <label for="">$ ${index.product.price}</label>
                                    </div>
                                </div>

                                <div class="for-cancel-btn">
                                    <span>
                                        x ${index.quantity}
                                    </span>
                                </div>

                                    </div>` }
                            </div>
                        </div>
                       `;
                });
                    $("#appended_refund_form").html(html);
                     $(".tab-content").removeClass("active");
                    $(".payspan").removeClass("actives");
                    $(".shipspan").addClass("actives");


            }

        });
    }

</script>

<script>


        $('.cancelprocess').on('click',function(){
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('order_cancel_data')); ?>",
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(response) {
                    $(".loader-bg").addClass('loader-active');
                    $("#testcancel").html("");
                    var html = '';

                    $.each(response.check_orders,function(value,index){
                           const today = new Date(index.updated_at);
                       html+=`
                      <div class="d-flex justify-content-between for-background-color-review align-items-baseline cancelorder">
                        <div class="d-flex align-items-center">
                            <div class="product-review-img">
                                <img src="<?php echo e(asset('order/order-pack.webp')); ?>" alt="">
                            </div>
                              <div class="d-flex justify-content-between align-items-center">
                            <div class="lotti-retail-review">
                                <p>Order # ${index.id}</p>
                                <span>Canceled On ${today.toLocaleDateString()}
                                    </span>
                            </div>
                            </div>

                            </div>
                        ${index.order_status != 10 ?
                            `<div class="lotti-review">
                                <button class="order-tracking-btn status_pay_to" onclick="getCancelledOrders(${index.id})">
                                    <span>
                                    Requested for cancellation
                                    </span>

                                </button>
                            </div>` : `<div class="lotti-review">
                                <button class="order-tracking-btn status_pay_to" onclick="getCancelledOrders(${index.id})">
                                    <span>
                                    Cancelled
                                    </span>
                                </button>
                            </div>`  }




                        </div>
                                `;
                        $("#testcancel").html(html);
                }
            )}

            });
    });


    function getCancelledOrders(order_id){
        $.ajax({
            url: "<?php echo e('get_cancelled_all'); ?>",
            type: "GET",
            data: {
                order_id: order_id
            },
            beforeSend: function() {
                $(".loader-bg").removeClass('loader-active');
            },

            success: function(response) {
                console.log(response);
                $(".loader-bg").addClass('loader-active');
                 $("#appended_refund_form").html("");
                $("#refunddetails").html("");
                $("#orderDetailsHTML").html("");
                $('.hideorderdetail').hide();
                $("#refundorderrequest").hide();
                $("#hiderefundtext").hide();
                $('.hidecancel').show();
                $('.cancelprintall').addClass('actives');
                    console.log(response.allcancelled[0].cancellation_status);
                    $("#cancelall").html("");
                    const today1 = new Date(response.allcancelled[0].updated_at);
                     const today2 = new Date(response.allcancelled[0].cancelled_at);
                    html+=
                    `<div class="top-margin">
                        <div class="login-sec-box position-relative">
                            <button class="remove-btn-css" onclick="order_cancel_detail_arrow()">
                                <div class="red-back-btn">
                                    <img src="<?php echo e(asset('front_assets/images/red-colr-arrow.webp')); ?>" alt="">
                                </div>
                            </button>
                            <div class="mt0 for-background-color-review">
                                <div class="cancelation-reason">
                                    <div class="lotti-retail-review">
                                        <p>Cancellation Reason</p>
                                        <h4 class="text-start">${response.allcancelled[0].get_reason.reason}</h4>
                                    </div>
                                </div>
                            </div>
                                  <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Cancellation Description</h3>

                                        <div class="lotti-retail-review mt1">
                                            <label for="">${response.allcancelled[0].cancellation_comments}</label>
                                        </div>

                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Tracking Progress</h3>

                               <div class="showing-status dots2-css mt2">
                                <div class="status-line">
                                    <div class="status-line-span ${ response.allcancelled[0].cancellation_status == 1  ? 'pink-active-line' : '' }" ></div>
                                    <div class="status-line-span ${ response.allcancelled[0].cancellation_status == 1  ? 'pink-active-line' : '' }"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="processing">
                                        <div class="round-dots  ${ response.allcancelled[0].cancellation_status == null || 1 ?  'active' : '' }"></div>
                                        <p>
                                            Cancellation <br>
                                            in Progress
                                        </p>
                                    </div>

                                    <div class="processing">
                                        <div class="round-dots ${ response.allcancelled[0].cancellation_status == null || 1 ? 'active' : '' }" "></div>
                                        <p>
                                            Cancelled
                                        </p>
                                    </div>
                                </div>
                            </div>
                                <div class="view-more-box">
                                    <p>${response.allcancelled[0].cancelled_at != null ? `<label>${today1.toLocaleDateString()} </label> Your request is pending.`: '' } <br>
                                     ${response.allcancelled[0].cancellation_status == 1 ? `<label>${today1.toLocaleDateString()} </label> Your request has been approved.`  : '' }
                                        <br>

                                    </p>
                                </div>
                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Cancelled Items</h3>
                                <div id="appended_cancel_form"></div>
                            </div>
                            <div class="mt2 for-background-color-review">
                                <h3 class="tracking-class">Cancelled Information</h3>

                                        <div class="lotti-retail-review mt1">
                                            <label for="">Order Number: ${response.allcancelled[0].order_id}</label>
                                        </div>

                            </div>

                        </div>
                    </div>`;

                $("#cancelall").html(html);

                $("#appended_cancel_form").html("");
                    var html = '';

                $.each(response.allcancelled,function(value,index){

                     html+=`
                            ${index.product.product_type == 2 ?
                           ` <div class="d-flex justify-content-between for-box-shadow align-items-baseline">
                                <div class="d-flex align-items-center">
                                    <div class="product-review-img">
                                        <img src="<?php echo e(asset('variations')); ?>/${index.variations.image}" alt="">
                                    </div>
                                    <div class="lotti-retail-review">
                                        <p>${index.product.product_name}</p>
                                        <span class="text-start">${index.variations.attribute},</span>
                                        <label for="">$ ${index.variations.regular_price}</label>
                                    </div>
                                </div>

                                <div class="for-cancel-btn">
                                    <span>
                                        x ${index.quantity}
                                    </span>
                                </div>

                            </div>` :
                           ` <div class="d-flex justify-content-between for-box-shadow align-items-baseline">
                                <div class="d-flex align-items-center">
                                    <div class="product-review-img">
                                        <img src="<?php echo e(asset('products')); ?>/${index.product.image}" alt="">
                                    </div>
                                    <div class="lotti-retail-review">
                                        <p>${index.product.product_name}</p>
                                        <label for="">$ ${index.product.price}</label>
                                    </div>
                                </div>

                                <div class="for-cancel-btn">
                                    <span>
                                        x ${index.quantity}
                                    </span>
                                </div>

                                    </div>` }
                            </div>
                        </div>
                       `;
                });
                    $("#appended_cancel_form").html(html);
                     $(".tab-content").removeClass("active");
                    $(".payspan").removeClass("actives");
                    $(".shipspan").addClass("actives");


            }

        });
    }

     function order_cancel_detail_arrow() {
        $(".shipspan").removeClass("actives");
        $("#pills-tabContent").addClass("active");
    }
    $('.removecanceled').on('click',function(){
        $('.cancelorder').removeClass("canceled");
    });

</script>

  

<script>
    $(".content-input").removeClass().addClass("content-input option-no-" + $('#paragraphSpaceOPtion').find('option:selected').val());
    $("#paragraphSpaceOPtion").on("change", function () {
        var val = $(this).find('option:selected').val();
        $(".content-input").removeClass().addClass("content-input option-no-" + val);
    });
</script>

<script>
    $('.addclassactive').on('click',function(){
        alert('test');
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/user-dashboard/dashboard.blade.php ENDPATH**/ ?>