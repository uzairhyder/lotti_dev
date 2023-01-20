<?php $__env->startSection('content'); ?>
<style>
    td.editDelete {
    display: flex;
    gap: 10px;
}
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Attribute List </h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="<?php echo e(route('variants.create')); ?>">Add</a></div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table data-order='[[ 0, "desc" ]]' class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Attribute Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Attribute Value</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key == 0): ?>
                                            <?php continue; ?>
                                        <?php endif; ?>

                                            <tr role="row" class="odd">
                                                <td>
                                                    <?php echo e($value->id ?? null); ?>

                                                </td>

                                                <td>
                                                    <?php echo e($value->variant  ?? null); ?>


                                                    
                                                    <td>
                                                        <?php $__currentLoopData = $value->get_attr;; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($attr->attribute_value ?? ''); ?>,
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <br>
                                                        <a href="<?php echo e(route('attribute-value',$value->id)); ?>">
                                                                <span>Attribute Value</span>
                                                        </a>
                                                    </td>

                                                    
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('variants-status', $value->id)); ?>">
                                                        <?php if($value->status == 1): ?>
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        <?php else: ?>
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        <?php endif; ?>
                                                    </a>
                                                </td>

                                                <td class="editDelete">
                                                    <form action="<?php echo e(route("variants.destroy",$value->id)); ?>" method="post">

                                                        <?php echo method_field("DELETE"); ?>

                                                        <?php echo csrf_field(); ?>
                                                        <a href="#">
                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            data-original-title="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete attribute ?');" >Delete</button></a>
                                                    </form>

                                                    <a href="<?php echo e(route('variants.edit',$value->id)); ?>"> <button
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

                $(".deletebrand").on("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        url: "<?php echo e(route('brand.destroy',"id")); ?>",
                        data: {
                            "id": id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        type: 'DELETE',
                        success: function(result) {
                            toastr.success('Brand Deleted Sucessfully');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    });
                });
            })
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/variants/index.blade.php ENDPATH**/ ?>