<div class="accordion mb-3" id="addVariantAccordion">
    <?php if(!empty($product)): ?>
    
        <?php $__currentLoopData = $product->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="dpv_id[]" value="<?php echo e($product_attribute->id); ?>">
        <input type="hidden" name="variant_id<?php echo e($product_attribute->id); ?>" value="<?php echo e($product_attribute->variant_id); ?>">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo e($product_attribute->id); ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collaps<?php echo e($product_attribute->id); ?>" aria-expanded="true"
                        aria-controls="panelsStayOpen-collaps<?php echo e($product_attribute->id); ?>">
                        <?php echo e($product_attribute->variant); ?>

                    </button>
                    <button class="removeBtn" type="button"
                        onclick="removeVariant('<?php echo e($product_attribute->product_id); ?>','<?php echo e($product_attribute->variant_id); ?>','<?php echo e($product_attribute->id); ?>')">Remove</button>
                </h2>
                <div id="panelsStayOpen-collaps<?php echo e($product_attribute->id); ?>" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-heading<?php echo e($product_attribute->id); ?>">
                    <div class="accordion-body">
                        <?php if($product_attribute->variant_id != 1): ?>
                            
                       
                        <div class="row">
                            <div class="col-md-4">
                                <div class="firstBox">
                                    <span>Name</span>
                                    <p><?php echo e($product_attribute->variant); ?></p>
                                    <ul>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input input_type_checkbox" type="checkbox" value="1" name="visible_product<?php echo e($product_attribute->id); ?>" id="visible_product<?php echo e($product_attribute->id); ?>" 
                                                <?php echo e($product_attribute->visible_product == 1 ? 'checked' : ''); ?>

                                                >
                                                <label class="form-check-label" for="visible_product<?php echo e($product_attribute->id); ?>">
                                                    Visible on the product page
                                                </label>
                                            </div>
                                        </li>
                                        <?php if($product->product_type == 2): ?>
                                            
                                        
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input input_type_checkbox" type="checkbox" value="2" name="used_for_variation<?php echo e($product_attribute->id); ?>" id="used_for_variation<?php echo e($product_attribute->id); ?>" <?php echo e($product_attribute->used_for_variation == 2 ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="used_for_variation<?php echo e($product_attribute->id); ?>">
                                                    Used for variations
                                                </label>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="secondBox">
                                    
                                    <div class="form-group">
                                        <label>Values</label>
                                        <select name="attribute<?php echo e($product_attribute->id); ?>[]" class="select_2 selected_<?php echo e($product_attribute->id); ?> customAttribute" multiple
                                            placeholder="Select Terms" data-allow-clear="1" data-attr-id="<?php echo e($product_attribute->id); ?>">
                                            
                                            <?php $__currentLoopData = $attributes_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($product_attribute->variant_id == $items->variant_id): ?>
                                                
                                                <option value="<?php echo e($items->id); ?>"
                                                
                                                    <?php $__currentLoopData = $product_attribute->product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php echo e($items->id == $item->attribute_id ? 'selected' : ''); ?>

                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                >
                                                    <?php echo e($items->attribute_value); ?>

                                                </option>
                                            <?php endif; ?>

                                            
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    
                                    <div class="selectButtons mt-2">
                                        <div>
                                            <button type="button"
                                                class="btn btn-success plusButton selectAll_<?php echo e($product_attribute->id); ?>"
                                                onclick="selectAll('<?php echo e($product_attribute->id); ?>')">Select All</button>
                                            <button type="button"
                                                class="btn btn-success plusButton unSelectAll_<?php echo e($product_attribute->id); ?>"
                                                onclick="unselectAll('<?php echo e($product_attribute->id); ?>')">Select
                                                None</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php else: ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input class="form-control cstm_attribute_name cstm_attribute_name<?php echo e($product_attribute->id); ?>" name="cstm_attribute_name<?php echo e($product_attribute->id); ?>" type="text" placeholder="" 
                                    
                                    <?php if($product_attribute->variant_id == 1): ?>
                                            
                                    value="<?php echo e($product_attribute->variant); ?>"
                                    
                                    <?php endif; ?>>
                                    
                                                
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input input_type_checkbox" type="checkbox" value="1" name="visible_product<?php echo e($product_attribute->id); ?>" id="visible_product<?php echo e($product_attribute->id); ?>" <?php echo e($product_attribute->visible_product == 1 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="visible_product<?php echo e($product_attribute->id); ?>">
                                                Visible on the product
                                                    page
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input input_type_checkbox" type="checkbox" value="2" name="used_for_variation<?php echo e($product_attribute->id); ?>" id="used_for_variation<?php echo e($product_attribute->id); ?>" <?php echo e($product_attribute->used_for_variation == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="used_for_variation<?php echo e($product_attribute->id); ?>">
                                                Used for variations
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="secondBox">
                                    <div class="mb-3">
                                        <label>Value(s)</label>
                                        <?php
                                            $custom_attr_ids = array();
                                            $custom_values = array();
                                        ?>
                                        
                                        <?php if(!empty($product_attribute->product_attributes)): ?>
                                            <?php $__currentLoopData = $product_attribute->product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            
                                                <?php
                                                    
                                                    array_push($custom_attr_ids, $item->attribute_id);
                                                    array_push($custom_values, $item->attribute);
                                                ?>    
                                            
                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        
                                        


                                            <input type="hidden" name="cstm_attribute_ids<?php echo e($product_attribute->id); ?>" value="<?php echo e(json_encode($custom_attr_ids)); ?>">
                                        

                                        <textarea name="cstm_attribute_value<?php echo e($product_attribute->id); ?>" class="textAreaValue cstm_attribute_textarea" data-attr-id="<?php echo e($product_attribute->id); ?>" placeholder='Enter some text, or some attributes by "|" separating values.'><?php echo e(implode("|",$custom_values)); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>


<?php if(count($product->product_variants) > 0): ?>
<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-success saveRedBtn plusButton attribute_save_active" id="saveAttribute">Save Attribute</button>
        <button type="button" class="btn btn-success saveRedBtn plusButton attribute_save_disable">Save Attribute</button>
    </div>
</div>
<?php endif; ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/partial/edit_variant_accordion.blade.php ENDPATH**/ ?>