
<?php $__env->startSection('content'); ?>
    <?php
        $data_attributes = App\Models\BackendModels\Attribute::latest()->get();
        foreach ($data_attributes as $key => $value) {
            $data = App\Models\BackendModels\Attribute::where(['product_id' => $value->id])
                ->latest()
                ->get();
        }
        
    ?>
    <style>
        .customer_records,
        .remove {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .tabsBox {
            padding: 20px;
        }

        div.tabsContent {
            margin-top: 20px;
        }

        button#pillsProductTab,
        button#pillsVariationTab,
        button#pillsStockTab,
        button#pillsTagsTab,
        button#pillsImageTab,
        button.cstm_buttons{
            border: none;
            padding: 10px 30px;
            color: #000000;
            font-size: 14px;
            background-color: #c1c1c194;
            margin-right: 10px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #ff2446 !important;
            color: #fff !important;
        }
        .active_btn {
            background-color: #ff2446 !important;
            color: #fff !important;
        }

        .upload__btn p {
            margin-bottom: 0px;
        }

        .upload__btn {
            display: inline-block;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .uploadImage {
            width: 65px;
            height: 45px;
            border-radius: 6px;
            margin-right: 16px;
            overflow: hidden;
        }

        .uploadImage img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .upload__img-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 65%;
            margin: 16px 0px;
        }

        button.startUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.cancelUploadButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #7e7e7e8f;
            border-color: #c1c1c194;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        button.imageDeleteButton {
            color: #fff;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 4px;
            line-height: 26px;
            font-size: 14px;
        }

        .smallButton {
            min-width: 75px !important;
            font-size: 12px !important;
            line-height: 20px !important;
        }

        .form-select {
            background-image: unset !important;
        }

        form.quantityBox {
            display: flex !important;
            align-items: center !important;
            gap: 20px !important;
            margin: 24px 0px;
        }

        #next {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            width: 100%;
        }

        .review-img-box .remove {
            display: block;
            color: #ff2446;
            text-align: center !important;
            font-size: 20px;
        }

        /* updated Work */

        .uploadImageSave {
            display: flex;
            align-items: center;
            justify-content: end;
            width: 65%;
            margin: 16px 0px;
        }

        .editImages {
            width: 50%;
            height: 50%;
            overflow: hidden;
        }

        .editImages img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .editImagesBox {
            display: flex;
            gap: 20px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {

            position: unset !important;
            border-right: unset !important
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
            background-color: #7366ff;
            color: #fff;
        }

        /* update work 8 */
        .select-dropdown,
        .select-dropdown * {
            position: relative;
        }

        .select-dropdown {
            position: relative;
            color: grey;

        }

        .select-dropdown select {
            background-color: transparent;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            color: grey;
        }

        .select-dropdown select:active,
        .select-dropdown select:focus {
            outline: none;
            box-shadow: none;
            color: grey;
        }

        .select-dropdown:after {
            content: "";
            position: absolute;
            top: 50%;
            right: 8px;
            width: 0;
            height: 0;
            margin-top: -2px;
            border-top: 5px solid #aaa;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;

        }

        .plusButton {
            padding: 6px 16px !important;
        }

        .addForm {
            padding: 1rem;
            background-color: #f3f3f3;
            box-shadow: 0px 0px 19px -4px #a0a8ee;
            margin-bottom: 24px;
        }

        /* update work */

        .addForm h6 {
            margin-bottom: 16px;
        }

        .form-check-input[type=checkbox] {
            border-radius: 0px !important;
        }

        .form-check-input:checked {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .form-check-input:focus {
            box-shadow: unset !important;
        }

        .form-check-label a {
            color: #000000;
        }

        .selectButtons {
            display: flex;
            justify-content: space-between;
        }

        .saveRedBtn {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .accordion-button:focus {
            border-color: 1px solid #ffffff !important;
            box-shadow: unset !important;
        }

        .accordion-button:not(.collapsed) {
            color: #000000 !important;
            background-color: #ffffff !important;
            border: 1px solid #c1c1c194 !important;
        }

        .accordion-button {
            border: 1px solid #c1c1c194 !important;
            padding: 10px !important;
        }

        .form-group a span {
            color: #000000;
        }


        .removeBtn{
            color: red;
            font-size: 14px !important;
        }

        .accordion-item:first-of-type .accordion-button {
            border-radius: 0px !important;
        }

        .accordion-header button {
            border: 1px solid #c1c1c194 !important;
        }

        button.removeBtn {
            display: flex;
            padding: 11.7px 1.25rem;
            border: 1px solid #c1c1c194 !important;

        }

        .accordion-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .selectDropdown select {
            padding: 9.5px 1.25rem;
            width: 120px;
            border-radius: 0px !important;
            font-size: 14px;
        }

        .uploadImage {
            width: 60px;
            height: 60px;
            overflow: hidden;
            border-radius: 10px;
        }

        .uploadImage img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .select-dropdown.selectDropdown {
            margin-right: 6px !important;
        }

        .saveAndCancel {
            display: flex;
            gap: 10px;
        }



        .imageWrapper {
            width: 65px;
            height: 65px;
            overflow: hidden;
            border-radius: 10px;
        }

        .imageWrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        button.file-upload {
            border: none;
            margin: 20px 0px;
            padding: 0px;
        }

        input.file-input {
            background-color: #6860612e !important;
            color: #fff !important;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            width: 120px;
            font-size: 12px;
            cursor: pointer;
        }

        .schedule {
            color: #ff2446;
            text-decoration: underline;
            cursor: pointer;
        }

        ::-webkit-file-upload-button {
            display: none;
        }
    </style>
    <style>
            textarea.textAreaValue {
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    border: 1px solid #ced4da;
    resize: none;
    border-radius: 0.25rem;
    min-height: 150px;
    max-height: 150px;
}
textarea.textAreaValue:focus {
    outline-color: none !important;
    border-color: #86b7fe;
    outline: 0;
    -webkit-box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);

}
    </style>
    <?php if(session()->has('session')): ?>
        <script>
            toastr.error(session()->get('session'));
        </script>
    <?php endif; ?>
    <?php if(session()->has('define_attr_error')): ?>
        <script>
            toastr.error('<?php echo e(session()->get('define_attr_error')); ?>');
        </script>
    <?php endif; ?>
    <?php if(session()->has('create_product')): ?>
    <script>
        toastr.error('<?php echo e(session()->get('create_product')); ?>')
    </script>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card tabsBox" id="tabs_id">

                      
                    <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a href="<?php echo e(route('edit.product', $id)); ?>">
                                <button class="nav-link cstm_buttons">Product</button>
                            </a>

                            
                            

                            
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active button cstm_buttons">Attribute</button>
                        </li>

                        
                        <li class="nav-item" role="presentation">
                            
                            

                                
                                
                                
                                <?php if($product->product_type == 2): ?>
                                    
                                    <?php if(session()->has('collections')): ?>
                                    
                                    <a href="<?php echo e(route('add.product_variation')); ?>" class="variation_condition_active">
                                        <button class="nav-link cstm_buttons">Variations</button>
                                    </a>
                                    
                                    
                                    <button class="nav-link cstm_buttons attribute_validation variation_condition_disable">Variations</button>
                                    

                                    <?php elseif(count($product_variations_counter) > 0): ?>
                                    <a href="<?php echo e(route('edit.product_variation', ['id' => $id])); ?>">
                                        <button class="nav-link cstm_buttons">Variations</button>
                                    </a>
                                    <?php else: ?>
                                    <button class="nav-link cstm_buttons attribute_validation">Variations</button>
                                    <?php endif; ?>
                                    
                                <?php endif; ?>
                            
                            
                        </li>
                    </ul>



                    <div class="row mb-2">
                        <div class="col-lg-4 col-md-6">
                            <label for="">Product Attribute.*</label>
                            <div class="select-dropdown">
                                
                                <select id="variants" class="form-control">
                                    
                                    <?php if(count($variants) > 0): ?>
                                        <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($variant->id); ?>"
                                                <?php if(!empty($product->product_variants)): ?> <?php $__currentLoopData = $product->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr_variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php if($variant->id == $attr_variant->variant_id): ?>
                                                <?php if($variant->id != 1): ?>
                                                disabled="disabled" <?php endif; ?>
                                                <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                                    <?php endif; ?>> <?php echo e($variant->variant); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 30px; padding-bottom: 14px;">
                            <div class="form-group">
                                <button type="button" class="buttonAdd btn btn-success plusButton" onclick="addVariant()">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="variant_accordion_html">
                        <form id="saveAttributeFrom" method="POST" action="<?php echo e(route('edit.define_product_variant', ['id' => $product->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('admin_dashboard.partial.edit_variant_accordion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!--  -->

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script>
            
            $('#saveAttributeFrom').on('submit', function(e) {
                var $select2 = $('.js-select2', $(this));
                
                // Reset
                $select2.parents('.form-group').removeClass('is-invalid');
                
                if ($select2.val() === '') {
                    
                    // Add is-invalid class when select2 element is required
                    $select2.parents('.form-group').addClass('is-invalid');
                    
                    // Stop submiting
                    e.preventDefault();
                    return false;
                }
        });
            

            // attributes validation
            function attribute_validation() {
                var attrIds = [];
                
               
                    $.each($(".customAttribute"), function (indexInArray, valueOfElement) { 
                        var attr_id = $(this).attr('data-attr-id');
                        if(!$('.selected_'+attr_id).val().length > 0){
                            attrIds.push(false);
                        }
                        if(!$('#visible_product'+attr_id).is(":checked")){
                            attrIds.push(false);
                        }
                        if(!$('#used_for_variation'+attr_id).is(":checked")){
                            attrIds.push(false);
                        }
                    });
                
    

               
                    $.each($(".cstm_attribute_textarea"), function (indexInArray, valueOfElement) { 
                        var attr_id = $(this).attr('data-attr-id');
                        if(!$(this).val()){
                            attrIds.push(false);
                        }
                        if($('.cstm_attribute_name'+attr_id).val() == ''){
                            attrIds.push(false);
                        }
                        if(!$('#visible_product'+attr_id).is(":checked")){
                            attrIds.push(false);
                        }
                        if(!$('#used_for_variation'+attr_id).is(":checked")){
                            attrIds.push(false);
                        }
                    });
              

                return attrIds;
            }

            function buttonReplacement(btn_status){
                if(btn_status == 'success'){
                    // toastr.success('Success');
                    $(".variation_condition_disable").addClass("display_none");
                    $(".variation_condition_active").removeClass("display_none");
                    $(".attribute_save_disable").addClass("display_none");
                    $(".attribute_save_active").removeClass("display_none");
                }else{
                    // toastr.error('All fields are required!')
                    $(".variation_condition_active").addClass("display_none");
                    $(".variation_condition_disable").removeClass("display_none");
                    
                    $(".attribute_save_active").addClass("display_none");
                    $(".attribute_save_disable").removeClass("display_none");
                    
                }
            }

            $(".customAttribute").on("change", function(){
                if(attribute_validation().length == 0){
                    buttonReplacement('success');
                }else{
                    buttonReplacement('fail');
                }
            });
            $(".input_type_checkbox").on("click", function(){
                if(attribute_validation().length == 0){
                    buttonReplacement('success');
                }else{
                    buttonReplacement('fail');
                }
            });

            $(".cstm_attribute_textarea").on("keyup", function(){
                if(attribute_validation().length == 0){
                    buttonReplacement('success');
                }else{
                    buttonReplacement('fail');
                }
            });
            $(".cstm_attribute_name").on("keyup", function(){
                if(attribute_validation().length == 0){
                    buttonReplacement('success');
                }else{
                    buttonReplacement('fail');
                }
            });
            if(attribute_validation().length == 0){
                buttonReplacement('success');
            }else{
                buttonReplacement('fail');
            }

            $(".attribute_save_disable").click(function(){
                toastr.error("All fields are required!");
            });
            // attributes validation




          
            $(".js-example-tokenizer").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
        </script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        

        <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
            rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.data').hide()
                jQuery('.schedule').on('click', function() {
                    jQuery('.data').toggle();
                })
            });
           
            $(function() {
                $('.select').each(function() {
                    $(this).select2({
                        theme: 'bootstrap4',
                        width: 'style',
                        placeholder: $(this).attr('placeholder'),
                        allowClear: Boolean($(this).data('allow-clear')),
                    });
                });
            });
            $('.file-input').change(function() {
                var curElement = $(this).parent().parent().find('.image');
                // console.log(curElement);
                var reader = new FileReader();

                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    curElement.attr('src', e.target.result);
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
    
        </script>

        <script>
            $(document).ready(function() {
               
                $('#parent_category_id').on('change', function() {
                    var id = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: '<?php echo e(route('get_main_category')); ?>',
                        "dataSrc": "",
                        data: {
                            'id': id
                        },
                        beforeSend: function() {
                            $(".loader-bg").removeClass('loader-active');
                        },
                        success: function(response) {
                            $(".loader-bg").addClass('loader-active');
                            $('#main-category_id').html('');
                            if (response != '') {
                                $.each(response.maincategory, function(value, i) {

                                    $('#main-category_id').append(
                                        `<option value ="${i.id}" >${i.main_category_name}</option>`
                                    );
                                });
                            } else {
                                $('#main-category_id').append('<h3>No Category Found</h3>');
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            var id = ($('select[name="parent_category_id"]').val());
            $.ajax({
                type: "GET",
                url: '<?php echo e(route('get_main_category')); ?>',
                data: {
                    'id': id
                },
                beforeSend: function() {
                    $(".loader-bg").removeClass('loader-active');
                },
                success: function(response) {
                    $(".loader-bg").addClass('loader-active');
                    $('#main-category_id').html('');
                    if (response != '') {
                        $.each(response.maincategory, function(value, i) {
                            var select = (i.id == i.main_category_name ? 'selected="selected"' : '');
                            $('#main-category_id').append(
                                `<option  value ="${i.id}" ${select}>${i.main_category_name}</option>`);

                        });
                    } else {
                        $('#main-category_id').append('<h3>No Category Found</h3>');
                    }
                }
            });
        </script>
       
        <script>
            $(document).ready(function() {
                $('#main-category_id').on('click', function() {
                    var id = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: '<?php echo e(route('get_sub_category')); ?>',
                        "dataSrc": "",
                        data: {
                            'id': id
                        },
                        success: function(response) {
                            $('#sub-category_id').html('');
                            if (response != '') {
                                $.each(response.subcategory, function(value, i) {
                                    $('#sub-category_id').append(
                                        `<option  value ="${i.id}" >${i.sub_category_name}</option>`
                                    );
                                });
                            } else {
                                $('#sub-category_id').append('<h3>No Category Found</h3>');
                            }
                        }
                    });
                });
            });
        </script>

        <script>
            $(":input").on("keyup change", function(e) {
                var price = $("#price").val();
                var discount = $("#discount").val();
                var discounted_price = price * discount / 100;
                console.log(discounted_price);

                var final = $("#discounted_price").val(price - discounted_price);

            })
        </script>

        <script>
            function selectRefresh() {
                $('.select_2').select2({
                    tags: true,
                    placeholder: "Select attribute's values",
                    allowClear: true,
                    width: '100%'
                });
            }
            function selectAll(id){
                    $(`.selected_${id} > option`).prop("selected", "selected");
                    $(`.selected_${id}`).trigger("change");
               
            }
            function unselectAll(id){
                $(`.selected_${id}`).val("-1").trigger("change");
            }
         
            
            $(document).ready(function() {
            selectRefresh();
            
            });


            // attribute tab


            // add variant
            function addVariant(){
                selectRefresh();
                var variant = $("#variants").val();
                var product_id = "<?php echo e($id); ?>";
                // alert(variant);
                // return false;

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('add.product_variants')); ?>",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        product_id : product_id,
                        variant : variant,
                    },
                    beforeSend: function() {
                        $(".loader-bg").removeClass('loader-active');
                    },
                    success: function(response) {
                        // $(".loader-bg").addClass('loader-active');
                        $("#variant_accordion_html").html(response.html);
                        window.location.reload();
                        selectRefresh();
                    }
                });
            }
            
            function removeVariant(product_id, variant_id, attribute_id){
                // alert(`product_id: ${product_id} ----- variant_id: ${variant_id} --------- attribute_id: ${attribute_id}`)
                
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('remove.product_variants')); ?>",
                    data: {
                         _token: '<?php echo e(csrf_token()); ?>',
                         product_id:product_id,
                         variant_id:variant_id,
                         attribute_id:attribute_id
                    },
                    beforeSend: function() {
                        $(".loader-bg").removeClass('loader-active');
                    },
                    success: function(response) {
                        // $(".loader-bg").addClass('loader-active');
                        $("#variant_accordion_html").html(response.html);
                        
                        // $('#saveAttribute').trigger('submit');

                        selectRefresh();
                        window.location.reload();
                    }
                });
            }
            
            // attribute tab

          

            $(".attribute_validation").on("click", function(){
                toastr.error("First create attributes.")
            });

            $('#saveAttribute').click(function() {
                $(".loader-bg").removeClass('loader-active');
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/product/attribute-edit.blade.php ENDPATH**/ ?>