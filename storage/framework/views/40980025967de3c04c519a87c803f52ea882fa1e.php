<?php $__env->startSection('content'); ?>
<div class="top-nav-height"></div>

<!-- top-height end-->


<!-- top-height end-->

<!-- dashboard start -->
<div class="login-page security-page">
    <div class="container">
        <div class="login-sec">
            <div class="login-first-line">
                <div class="login-welcome-heading">
                    <h1>Security Verification</h1>
                </div>
            </div>
            <!-- <div class="login-sec-box forget-section">
                <h1>Enter your email address below and we’ll send you a link to reset your password</h1>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="">
                            <div class="d-flex flex-column">
                                <label for="">Phone Number Or Email</label>
                                <input type="text" placeholder="Please Enter Your Phone Number">
                            </div>
                        </form>
                        <div class="pink-continue-btn"><button>Continue</button></div>
                        <a href="./login.php">Go Back</a>
                    </div>
                </div>
            </div> -->
            <div class="login-sec-box security-sec">
                <div class="securtiy-img">
                    <img src="<?php echo e(asset('front_assets/images/security-sheild.webp')); ?>" alt="">
                </div>
                <div class="address-decription text-center">
                    <p>To protect your account security, we need to verify your identity</p>
                    <p>Please choose a way to verify:</p>
                </div>
                <div class="d-flex add-address justify-content-center">
                    <div class="pink-login-btn login-button mt0">
                        <a href="<?php echo e(route('email-verification')); ?>">
                            <div><i class="fa fa-envelope" aria-hidden="true"></i>
                                Verify Through Email
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('front_assets/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/user-dashboard/security.blade.php ENDPATH**/ ?>