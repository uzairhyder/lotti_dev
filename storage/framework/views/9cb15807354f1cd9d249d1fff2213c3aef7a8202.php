<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="text-align: center">Welcome To Admin Dashboard</h1>
        </div>
    </div>
</div>
<br><br>

<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		
		

		

        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="shopping-cart"></i></div>
                      <div class="media-body"><span class="m-0">Orders</span>
                        <?php if($order_count > 0): ?>
                            <h4 class="mb-0 counter"><?php echo e($order_count ?? ''); ?></h4><i class="icon-bg" data-feather="shopping-cart"></i>
                        <?php else: ?>
                            <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="shopping-cart"></i>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                      <div class="media-body"><span class="m-0">Products</span>
                        <?php if($product_count > 0): ?>
                            <h4 class="mb-0 counter"><?php echo e($product_count ?? ''); ?></h4><i class="icon-bg" data-feather="shopping-bag"></i>
                        <?php else: ?>
                            <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                      <div class="media-body"><span class="m-0">Messages</span>
                        <?php if($inquiry_count > 0): ?>
                            <h4 class="mb-0 counter"><?php echo e($inquiry_count ?? ''); ?></h4><i class="icon-bg" data-feather="message-circle"></i>
                        <?php else: ?>
                            <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="message-circle"></i>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                      <div class="media-body"><span class="m-0">Users</span>
                        <?php if($user_count > 0): ?>
                            <h4 class="mb-0 counter"><?php echo e($user_count ?? ''); ?></h4><i class="icon-bg" data-feather="user-plus"></i>
                        <?php else: ?>
                             <h4 class="mb-0 counter">0</h4><i class="icon-bg" data-feather="user-plus"></i>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 xl-100 box-col-12">
                <div class="widget-joins card widget-arrow">
                  <div class="row">
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3 text-start"><span class="mb-1">Sale</span>
                          <h5 class="mb-0">Today</h5>
                        </div>
                        
                        <div class="media-body ammountRight">
                          <h5 class="mb-0">$<span class="counter"><?php echo e(round($today_sale,2) ?? '0'); ?></span></h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3 text-start"><span class="mb-1">Sale</span>
                          <h5 class="mb-0">Month</h5>
                        </div>
                        
                        <div class="media-body ammountRight ps-2">
                          <h5 class="mb-0">$<span class="counter"><?php echo e(round($month_sale,2) ?? '0'); ?></span></h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3 text-start"><span class="mb-1">Sale</span>
                          <h5 class="mb-0">Week</h5>
                        </div>
                        
                        <div class="media-body ammountRight">
                          <h5 class="mb-0">$<span class="counter"><?php echo e(round($week_sale,2) ?? '0'); ?></span></h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3 text-start"><span class="mb-1">Sale</span>
                          <h5 class="mb-0">Year</h5>
                        </div>
                        
                        <div class="media-body ammountRight ps-2">
                          <h5 class="mb-0">$<span class="counter"><?php echo e(round($year_sale,2) ?? '0'); ?></span></h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 xl-100 box-col-12">
                <div class="widget-joins card">
                  <div class="row">
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3"><?php echo e(round($pending_percentage ?? 0,2) ?? '0'); ?>%</div>
                        <div class="media-body details ps-3"><a href="<?php echo e(route('orderManagement.index')); ?>"><span class="mb-1">Pending</span></a>
                          <h5 class="mb-0 counter"><?php echo e($pending ?? ''); ?></h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-bag"></i></div>
                      </div>
                    </div>
                    
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3"><?php echo e(round($delivered_percentage ?? 0,2) ?? '0'); ?>%</div>
                        <div class="media-body details ps-3 pt-0"><a href="<?php echo e(route('orderManagement.index')); ?>"><span class="mb-1">Done</span></a>
                          <h5 class="mb-0 counter"><?php echo e($delivered ?? 0); ?></h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-cart"></i></div>
                      </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                      <div class="media">
                        <div class="align-self-center me-3"><?php echo e(round(@$cancel_percentage ?? 0,2) ?? '0'); ?>%</div>
                        <div class="media-body details ps-3 pt-0"><a href="<?php echo e(route('orderManagement.index')); ?>"><span class="mb-1">Cancel</span></a>
                          <h5 class="mb-0 counter"><?php echo e($cancelled ?? 0); ?></h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="dollar-sign"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>


		
		
		
		
	

</div>


<script type="text/javascript">
	var session_layout = '<?php echo e(session()->get('layout')); ?>';
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/home.blade.php ENDPATH**/ ?>