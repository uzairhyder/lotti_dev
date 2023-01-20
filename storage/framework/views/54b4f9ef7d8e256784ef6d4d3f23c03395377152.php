<?php $__env->startSection('content'); ?>
<div class="top-nav-height"></div>

    <!-- top-height end-->

    <!-- dashboard start -->

    <!-- top-height end-->

    <!-- dashboard start -->
    <div class="login-page email-verification-page">
        <div class="container">
            <div class="login-sec">
                <div class="login-first-line">
                    <div class="login-welcome-heading">
                        <h1>Change Your Email</h1>
                    </div>
                </div>
                <div class="login-sec-box forget-section email-verification">
                    <div class="email_icon d-flex align-items-center">
                        
                        <h1>Enter New Email</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?php echo e(route('store-mobile')); ?>" id="email-verify" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="d-flex flex-column">
                                    
                                    <input type="text" class="mt2" id="contact" name="email" placeholder="Enter New Emial">
                                </div>
                                <div class="pink-login-btn login-button small-device-width mt2">
                                    <button class="remove-a-tag" type="submit">
                                    Change
                                    </button>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/user-dashboard/phone.blade.php ENDPATH**/ ?>