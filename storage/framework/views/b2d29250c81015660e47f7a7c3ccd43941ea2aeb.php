
<?php if(!empty($product_variation)): ?>
    

<div class="sizesBox add-box-weidth">
    

    <div class="variant_sku label-space top-margin-label">
        <span><label for="">Sku: </label><?php echo e($product_variation->sku); ?></span>
    </div>
    
    

    <?php if($product_variation->discount_status == null || $product_variation->discount_status == 0): ?>
    
    <div class="variant_discount variantDiscount label-space">
        <span> <label for="">Price: </label>$<?php echo e(number_format($product_variation->regular_price,2)); ?></span>
    </div>
    <?php endif; ?>

    <?php if($product_variation->discount_status != null || $product_variation->discount_status == 1): ?>
    

    <div class="variant_discount variantDiscount label-space">
        <span style="text-decoration: line-through"> <label for="">Price: </label>$<?php echo e(number_format($product_variation->regular_price,2)); ?></span>
    </div>
    <div class="variant_price variantPrice label-space">
        <span> <label for="">Discounted Price:</label>$<?php echo e(number_format($product_variation->sale_price,2)); ?></span>
    </div>

    <?php endif; ?>



    

    

    <div class="variant_price inStock">
        <?php if($product_variation->stock == 1): ?>
        <p>In Stock</p>
        <?php else: ?>
        <p class="outOfStock">Out of stock</p>
        <?php endif; ?>
    </div>
</div>



<input type="hidden" name="variation_stock" id="variation_stock" value="<?php echo e($product_variation->stock); ?>">
<?php endif; ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/partials/get-variant-details.blade.php ENDPATH**/ ?>