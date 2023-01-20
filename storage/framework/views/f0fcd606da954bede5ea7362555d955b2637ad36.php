<style>

/* Automatic Serial Number Row */
/* .css-serial {
 counter-reset: serial-number; Set the serial number counter to 0
}
.css-serial td:first-child:before {
 counter-increment: serial-number; Increment the serial number counter
 content: counter(serial-number); Display the counter
} */
</style>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Cancellation Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Cancellation Policy</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" >
                                                <td>
                                                    <?php echo e($value->id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($value->reason); ?>

                                                </td>
                                                <td>
                                                    <?php echo Str::limit($value->cancellation_policy,40) ?? ''; ?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('cancellation-status', $value->id)); ?>">
                                                        <?php if($value->status == 1): ?>
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        <?php else: ?>
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        <?php endif; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    

                                                    <a href="<?php echo e(route('cancellation-policy.edit', $value->id)); ?>"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">Edit</button></a>
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

                $(".deletecontent").on("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        url: "<?php echo e(route('page-content.destroy',"id")); ?>",
                        data: {
                            "id": id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        type: 'DELETE',
                        success: function(result) {
                            toastr.success('Page Content Deleted Sucessfully');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                });
            })
        </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/cancellationpolicy/index.blade.php ENDPATH**/ ?>