
<!--  -->
<!--  -->
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/jquery.validate.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Data Tables JS -->
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<!-- feather icon js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<!-- scrollbar js-->
<script src="<?php echo e(asset('assets/js/scrollbar/simplebar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollbar/custom.js')); ?>"></script>
<!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
<!-- Plugins JS start-->
<script id="menu" src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

<?php if(Route::current()->getName() != 'popover'): ?>
<script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
<?php endif; ?>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme-customizer/customizer.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone-script.js')); ?>"></script>


<script>
    ClassicEditor
                    .create( document.querySelector( '.editor' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            // console.error( error );
                    } );
    </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    //    $('.ckeditor').ckeditor();
    // });

		$(function(){
			$(document).on('click','#delete',function(e){
				 e.preventDefault();
				 var link = $(this).attr("href");
                //  alert(link);
				Swal.fire({
				title: 'Are you sure?',
				text: "To Delete this Data?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = link
					Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					)
				}
				});
			});
		});
</script>
<script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type','info')); ?>"
    switch(type){
       case 'info':
       toastr.info(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'success':
       toastr.success(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'warning':
       toastr.warning(" <?php echo e(Session::get('message')); ?> ");
       break;
       case 'error':
       toastr.error(" <?php echo e(Session::get('message')); ?> ");
       break;
    }
    <?php endif; ?>
    </script>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            toastr.error('<?php echo e($error); ?>');
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <script>
        function orderNotification(orderNotificationId){
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('order_notification')); ?>",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    orderNotificationId:orderNotificationId
                },
                success: function (response) {
                    if(response.status == 200){
                        window.location.href = response.redirectTo;
                    }else{
                        toastr.error('Sorry!, Something went wrong, try again!');
                    }
                }
            });
        }
       $("#viewAllOrderNotification").on("click", function(){
        
        $.ajax({
                type: "POST",
                url: "<?php echo e(route('view_all_order_notification')); ?>",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (response) {
                    if(response.status == 200){
                        window.location.href = response.redirectTo;
                    }else{
                        toastr.error('Sorry!, Something went wrong, try again!');
                    }
                }
            });
        })
    </script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/layouts/script.blade.php ENDPATH**/ ?>