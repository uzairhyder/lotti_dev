<?php $__env->startSection('content'); ?>
    <style>
        .customer_records,
        .remove {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #ff2446;
        }

        .nav-link {
            border: none;
            margin-right: 10px;
        }

        .billingInformation p {
            margin-bottom: 0px;
        }

        .sale-container .summary-comment-container .comment-container {
            margin-top: 20px;
            float: left;
        }

        .control-group,
        .control-group label {
            display: block;
            color: #3a3a3a;
        }


        .control-group textarea.control {
            height: 100px;
            padding: 10px;
            resize: none;
        }

        .control-group .control {
            background: #fff;
            border: 2px solid #c7c7c7;
            border-radius: 3px;
            width: 70%;
            height: 36px;
            display: inline-block;
            vertical-align: middle;
            transition: .2s cubic-bezier(.4, 0, .2, 1);
            padding: 0 10px;
            font-size: 15px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .checkbox input {
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            height: 24px;
            width: 24px;
            z-index: 100;
        }

        .btn.btn-primary {
            background: #0041ff;
            color: #fff;
        }

        .btn.btn-lg {
            padding: 10px 20px;
        }

        .sale-container .summary-comment-container .comment-container .comment-list {
            margin-top: 40px;
        }

        .sale-container .sale-summary {
            margin-top: 20px;
            height: 130px;
            float: right;
        }

        .summary-comment-container {
            display: flex;
        }

        .sale-container .sale-summary tr td {
            padding: 5px 8px;
            vertical-align: text-bottom;
        }

        .comment-container {
            width: 70%;
            margin-top: 20px;
        }

        table.sale-summary {
            width: 30%;
            margin-top: 20px;
        }

        .border {
            border: 0px solid #dee2e6 !important;
        }

        .checkbox {
            position: relative;
            display: block;
        }

        .checkbox .checkbox-view {
            height: 24px;
            display: inline-block !important;
            vertical-align: middle;
            margin: 10px 0px 10px 20px;

        }

        .checkbox label::before {
            border: 2px solid #bbbbbb;
        }

        .btn {
            margin-top: 20px;
            box-shadow: 0 1px 4px 0 rgb(0 0 0 / 20%), 0 0 8px 0 rgb(0 0 0 / 10%);
            border-radius: 3px;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: .2s cubic-bezier(.4, 0, .2, 1);
            font: inherit;
            display: inline-block;
        }

        .btn-primary {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .table th {
            width: 200px;
        }

        .table th,
        .table td {
            padding: 8px 4px;
            text-align: center;
        }

        .accordion-button:not(.collapsed) {
            color: #ff2446;
            background-color: #f0f0f0;
            border-radius: 0.25rem;
        }

        .accordion-button:focus {
            border-color: #d7d7d7 !important;
            box-shadow: 0 0 0 0 rgb(13 110 253 / 25%) !important;
        }

        :focus {
            outline-color: #ff2446;
        }

        .accordion-header {
            margin-bottom: 12px;
        }

        .accordion-button.collapsed {
            border-bottom-width: 1px;
            border-radius: 0.25rem;
        }

        .accordion-body {
            padding: 1rem 1.25rem;
            border-top: 1px solid #80808040;
            margin-bottom: 12px;
            border-bottom: 1px solid #80808040;
        }

        .accordion-item:first-of-type .accordion-button {
            border-radius: 0.25rem;
        }
    </style>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <h3>Invoice</h3>
                            <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pillsInformationTab" data-bs-toggle="pill"
                                        data-bs-target="#pillsInformation" type="button" role="tab"
                                        aria-controls="pillsInformationTab" aria-selected="true">Information
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade active show" id="pillsInformation" role="tabpanel"
                                    aria-labelledby="pillsInformationTab">

                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Order and Account
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Order Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order ID</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p><a
                                                                                href="<?php echo e(route('orderManagement.show', $order->id)); ?>">#<?php echo e($order->id); ?></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order Date</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p><?php echo e($order->created_at); ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order Status</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>
                                                                            <?php if($order->order_status == 1): ?>
                                                                                Pending
                                                                            <?php endif; ?>
                                                                            <?php if($order->order_status == 2): ?>
                                                                                Dispatched
                                                                            <?php endif; ?>
                                                                            <?php if($order->order_status == 3): ?>
                                                                                Delivered
                                                                            <?php endif; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Account Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Customer Name</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p><?php echo e($order->user->name); ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Email</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p><?php echo e($order->user->email); ?></p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    Address
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">



                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Shipping Address </h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="billingInformation">
                                                                            
                                                                            <?php if(!empty($shipping->contact)): ?>
                                                                                <p>Phone no: <?php echo e($shipping->contact); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Phone no: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($shipping->landmark)): ?>
                                                                                <p>Landmark: <?php echo e($shipping->landmark); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Landmark: N/A</p>
                                                                            <?php endif; ?>


                                                                            <?php if(!empty($shipping->address)): ?>
                                                                                <p>Address: <?php echo e($shipping->address); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Address: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($shipping->city)): ?>
                                                                                <p>City: <?php echo e($shipping->city); ?></p>
                                                                            <?php else: ?>
                                                                                <p>City: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($shipping->province)): ?>
                                                                                <p>Province: <?php echo e($shipping->province); ?></p>
                                                                            <?php else: ?>
                                                                                <p>Province: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($shipping->country)): ?>
                                                                                <p>Country: <?php echo e($shipping->country); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Country: N/A
                                                                                </p>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Billing Address</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="billingInformation">
                                                                            <?php if(!empty($billing->contact)): ?>
                                                                                <p>Phone no: <?php echo e($billing->contact); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Phone no: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($billing->landmark)): ?>
                                                                                <p>Landmark: <?php echo e($billing->landmark); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Landmark: N/A</p>
                                                                            <?php endif; ?>


                                                                            <?php if(!empty($billing->address)): ?>
                                                                                <p>Address: <?php echo e($billing->address); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Address: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($billing->city)): ?>
                                                                                <p>City: <?php echo e($billing->city); ?></p>
                                                                            <?php else: ?>
                                                                                <p>City: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($billing->province)): ?>
                                                                                <p>Province: <?php echo e($billing->province); ?></p>
                                                                            <?php else: ?>
                                                                                <p>Province: N/A</p>
                                                                            <?php endif; ?>

                                                                            <?php if(!empty($billing->country)): ?>
                                                                                <p>Country: <?php echo e($billing->country); ?>

                                                                                </p>
                                                                            <?php else: ?>
                                                                                <p>Country: N/A
                                                                                </p>
                                                                            <?php endif; ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    Payment and Shipping
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Payment Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Payment Method</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>
                                                                            <?php if($order->payment_method == 1): ?>
                                                                                Cash On Delivery
                                                                            <?php endif; ?>
                                                                            <?php if($order->payment_method == 2): ?>
                                                                                Paypal
                                                                            <?php endif; ?>
                                                                            <?php if($order->payment_method == 3): ?>
                                                                                Stripe
                                                                            <?php endif; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Payment Status</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>
                                                                            <?php if($order->payment_method == 1): ?>
                                                                                N/A
                                                                            <?php endif; ?>
                                                                            <?php if($order->payment_method == 2): ?>
                                                                                Recieved
                                                                            <?php endif; ?>
                                                                            <?php if($order->payment_method == 3): ?>
                                                                                Recieved
                                                                            <?php endif; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    Products Ordered
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="table">
                                                        <div class="table-responsive">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>s.no</th>
                                                                        <th>Product Name</th>
                                                                        <th>Image</th>
                                                                        <th>Quantity</th>
                                                                        <th>Unit Cost</th>
                                                                        <th>Subtotal</th>
                                                                        <th>Status</th>
                                                                        
                                                                        
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $total = 0;
                                                                    ?>

                                                                    <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                        
                                                                        <?php
                                                                            $total += $product->total;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo e($product->id ?? ''); ?>

                                                                            </td>
                                                                            <td>
                                                                            
                                                                            <?php if($product->product_type  == 1): ?>
                                                                                    <?php echo e($product->product->product_name); ?>


                                                                                    <?php else: ?>
                                                                                         <?php echo e($product->product->product_name); ?>  <?php echo e($product->attribute_values); ?>

                                                                                    <br>
                                                                             <?php endif; ?>

                                                                            </td>
                                                                            <td>
                                                                                <img src="<?php echo e(asset($product->product_variantion_id ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? ''); ?>" alt="Image" width="40px">
                                                                            </td>
                                                                            <td>
                                                                                <?php echo e($product->quantity ?? ''); ?>


                                                                            </td>

                                                                            <td>$<?php echo e($product->price ?? ''); ?></td>

                                                                            <td>$<?php echo e($product->total ?? ''); ?></td>
                                                                                
                                                                             <td>
                                                                             <?php if($product->order_status == 2 ): ?>
                                                                                Cancelled

                                                                             <?php elseif($product->order_status == 3): ?>
                                                                             Refund
                                                                             <?php else: ?>
                                                                             Active
                                                                             <?php endif; ?>
                                                                            </td>

                                                                            
                                                                            
                                                                            
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="summary-comment-container">
                                                        <div class="comment-container">
                                                            
                                                            <ul class="comment-list"></ul>
                                                        </div>
                                                        <table class="sale-summary">
                                                        <?php
                                                            $cancel_total  = 0;
                                                        ?>
                                                          

                                                        
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td>Shipping &amp; Handling</td>
                                                                    <td>-</td>
                                                                    <td>$<?php echo e($order->delivery_fee); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>-</td>
                                                                    
                                                                    <td>
                                                                    
                                                                      <?php if($product->order_status == 2 || $product->order_status == 3): ?>
                                                                      $<?php echo e($total - $cancel_data); ?>

                                                                     <?php else: ?>
                                                                     $<?php echo e($total); ?>

                                                                     <?php endif; ?>
                                                                      </td>
                                                                </tr>

                                                                

                                                                
                                                                <tr class="bold">
                                                                    <td>Grand Total</td>
                                                                    <td>-</td>
                                            
                                                                    <td>
                                                                    <?php if($product->order_status == 2 || $product->order_status == 3): ?>
                                                                    $<?php echo e($total + $order->delivery_fee - $cancel_data); ?>

                                                                    <?php else: ?>
                                                                     $<?php echo e($total + $order->delivery_fee); ?>

                                                                     <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                     <td>
                                                                        <?php if($product->cancellation_status == 2): ?>
                                                                              <span class="span badge rounded-pill pill-badge-danger">Refunded</span>
                                                                         <?php endif; ?>
                                                                          <?php if($product->cancellation_status == 1): ?>
                                                                                <span class="span badge rounded-pill pill-badge-danger">Cancelled</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                </tr>
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if(Session::has('order_status')): ?>
        <script>
            toastr.success("<?php echo e(Session::get('order_status')); ?>")
        </script>
    <?php endif; ?>
    <?php if(Session::has('order_status_error')): ?>
        <script>
            toastr.error("<?php echo e(Session::get('order_status_error')); ?>")
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/orderManagement/invoice.blade.php ENDPATH**/ ?>