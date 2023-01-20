<?php $__env->startSection('content'); ?>
<style>
    .badge-success{
        color: #55b054 !important;
        background-color: #ffffff !important;
    }
</style>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Management </h5>
                        <div class="my-4"></div>

                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table  data-order='[[ 0, "desc" ]]'  class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                ORDER ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">First Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Last Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                               aria-label="Details: activate to sort column ascending">Order Date</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Order Status</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">User Status</th>
                                                
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td>
                                                    <?php echo e($order->id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($order->user->first_name ?? 'N/A'); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($order->user->last_name ?? 'N/A'); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($order->created_at); ?>

                                                </td>
                                                
                                                <td>
                                                    <?php if($order->order_status == 1): ?>
                                                    <span class="span badge rounded-pill pill-badge-warning">Pending</span>
                                                    <?php endif; ?>
                                                    <?php if($order->order_status == 2): ?>
                                                    <span class="span badge rounded-pill pill-badge-primary">Dispatched</span>
                                                    <?php endif; ?>
                                                    <?php if($order->order_status == 3): ?>
                                                    <span class="span badge rounded-pill pill-badge-success">Delivered</span>
                                                    <?php endif; ?>
                                                    <?php if($order->order_status == 4): ?>
                                                    <span class="span badge rounded-pill pill-badge-danger">Cancelled</span>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($order->order_status == 5): ?>
                                                    <span class="span badge rounded-pill pill-badge-info">On Hold</span>
                                                    <?php endif; ?>
                                                        
                                                    <?php if(($order->order_status != 1 && $order->order_status != 2) && $order->order_status != 3 && $order->order_status != 4
                                                     && $order->order_status != 5 && $order->order_status != 6 && $order->order_status != 7 && $order->order_status != 8 && $order->order_status != 9 && $order->order_status != 10): ?>
                                                     N/A
                                                    <?php endif; ?>

                                                    <?php if($order->order_status == 6): ?>
                                                        <span class="span badge rounded-pill pill-badge-warning">Pending</span>
                                                    <?php endif; ?>
                                                    <?php if($order->order_status == 7): ?>
                                                    <span class="span badge rounded-pill pill-badge-info">Requested for cancellation</span>
                                                    <?php endif; ?>
                                                     <?php if($order->order_status == 8): ?>
                                                    <span class="span badge rounded-pill pill-badge-danger">Requested for Refund</span>
                                                    <?php endif; ?>
                                                    
                                                      <?php if($order->order_status == 9): ?>
                                                        <span class="span badge rounded-pill pill-badge-success">Refunded</span>
                                                     <?php endif; ?>

                                                     <?php if($order->order_status == 10): ?>
                                                        <span class="span badge rounded-pill pill-badge-success">Cancelled</span>
                                                    <?php endif; ?>

                                                    <?php if(($order->order_status != 1 && $order->order_status != 2) &&
                                                    $order->order_status != 3 && $order->order_status != 4 &&
                                                    $order->order_status != 5 && $order->order_status != 6 && $order->order_status != 7 && $order->order_status != 8 && $order->order_status != 9 && $order->order_status != 10): ?>
                                                    N/A
                                                    <?php endif; ?>

                                                </td>
                                                <td>
                                                    <?php if($order->order_verification == 1): ?>
                                                    <span class="span badge rounded-pill pill-badge-success badge-success"><img src="<?php echo e(asset('icons/verified.png')); ?>" alt="verified" width="16px"> Received</span>
                                                    <?php else: ?>
                                                    <span class="span badge rounded-pill pill-badge-danger">Unreceived</span>
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td>
                                                    <a href="<?php echo e(route('orderManagement.show',$order->id)); ?>"><i class="icon-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>.


        <script>
            $(document).ready(function() {

                toastr.options = {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': false,
                    'positionClass': 'toast-top-right',
                    'preventDuplicates': false,
                    'showDuration': '1000',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut',
                }

                $(".deleteproduct").on("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        url: "<?php echo e(route('product.destroy',"id")); ?>",
                        data: {
                            "id": id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        type: 'DELETE',
                        success: function(result) {
                            toastr.success('Product Deleted Sucessfully');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                });
            })
        </script>





    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/orderManagement/index.blade.php ENDPATH**/ ?>