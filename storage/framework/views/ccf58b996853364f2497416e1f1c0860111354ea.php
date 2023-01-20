<?php if(count($ratings) > 0): ?>
<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="mb-5">
    <div class="reviewNames">
        <span><?php echo e($values->name ?? ''); ?></span>
    </div>
    <div class="reviewRatingDate mb-3">
        <div class="">
            <?php

                $num = 5 - $values->reviews;
            ?>
            <?php for($x = 1; $x <= $values->reviews; $x++): ?>
                <i class="fa fa-star goldenstar "></i>
            <?php endfor; ?>

            <?php for($x = 1; $x <= $num; $x++): ?>
                <i class="fa fa-star"></i>
            <?php endfor; ?>
        </div>
        <span><?php echo date('m/d/Y', strtotime($values->created_at)); ?></span>
    </div>

    <div class="reviewText">
        <p><?php echo e($values->comments); ?></p>
    </div>

    <div class="reviewImages">
        <?php $__currentLoopData = json_decode($values->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="productReviewImage">
            <a href="<?php echo e(url('public/reviews/' . $image)); ?>" target="_blank">
                <img src="<?php echo e(url('public/reviews/' . $image)); ?>" alt="Product Image" width="80px" height="80px">
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<div class="my-5">
    <h5 class="text-center">
        <i class="fa fa-meh-o" aria-hidden="true"></i> Oops! No reviews found.
    </h5>
</div>
<?php endif; ?>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/partials/rating-filters.blade.php ENDPATH**/ ?>