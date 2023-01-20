<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .login-card {
    background-repeat: no-repeat !important;
    background-size: cover !important;
    /* background: url('https://bigvalley.co/wp-content/uploads/2020/10/Ecommerce-2000x1500-1-e1603836627139.jpg') !important; */
}
.login-card {
    width: 100% !important;
    height: 100% !important;
    background-size: cover !important;
    background-position: center !important;
}
.btn-primary {
    background-color: #ffffff !important;
    border-color: #ff2446 !important;
    color: #ff2446 !important;
    margin-top: 12px;
}
.login-card .login-main {
    background-color: #ff2446c7 !important;
}
.login-card .login-main .theme-form h4 {
    color: white !important;
}
.login-card .login-main .theme-form p {
    color: #ffffff !important;
    margin-bottom: 20px !important;
}
.login-card .login-main .theme-form label {
    color: white !important;
}

</style>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                
                                <h4 class="align-center">Lotti Admin Dashboard</h4>
                                
                                <p>Enter your email & password to login</p>
                                <!-- Email Address -->

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Test@gmail.com">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="*********">
                                </div>

                                <!-- Remember Me -->
                                <div class="form-group mb-0">

                                    <?php if(Route::has('register')): ?>
                                        
                                    <?php endif; ?>
                                    <button class="btn btn-primary btn-block" type="submit">Log in</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/auth/login.blade.php ENDPATH**/ ?>