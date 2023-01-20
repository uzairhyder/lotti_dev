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

    .notificationDetails p {
        line-height: 1.1;
    }

</style>


<div>
    <div class="customizer-links">
        <div class="nav flex-column nac-pills" id="c-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="c-pills-layouts-tab" data-bs-toggle="pill" href="#c-pills-layouts" role="tab" aria-controls="c-pills-layouts" aria-selected="true" data-original-title="" title="" data-bs-original-title="" style="text-decoration: none; !important">
                <div class="settings">
                    <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
                <span>Order Notes</span>
            </a>
        </div>
    </div>
    <div class="customizer-contain">
        <div class="tab-content" id="c-pills-tabContent">
            <div class="customizer-header">
                <i class="icofont-close icon-close"></i>
                <h5>Order Notifications</h5>
                
            </div>
            <div class="customizer-body custom-scrollbar">
                <div class="tab-pane" id="c-pills-home" role="tabpanel" aria-labelledby="c-pills-home-tab">
                    <div class="notificationBox">
                        <div class="row">
                            <?php $__currentLoopData = $order_notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key % 2 == 0): ?>
                            <div class="col-sm-12 col-xl-12 col-lg-12">
                                <div class="card o-hidden">
                                    <div class="bg-primary b-r-4 cardBody">
                                        <div class="media static-top-widget">
                                            <div class="media-body">

                                                <div class="notificationDetails mt-3">
                                                    <p> Order Information.</p>

                                                    <p>Status : Order
                                                        <?php if($notes->order_notes_status == 1): ?>
                                                        Pending
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 2): ?>
                                                        Dispatched
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 3): ?>
                                                        Delivered
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 4): ?>
                                                        Cancelled
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 5): ?>
                                                        On Hold
                                                        <?php endif; ?>
                                                    </p>
                                                    <?php if(!empty($notes->order_comment)): ?>
                                                    <p>Comment : <?php echo e($notes->order_comment); ?>.</p>
                                                    <?php endif; ?>
                                                    <p>Time : <?php echo e($notes->status_changed_time); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-sm-12 col-xl-12 col-lg-12">
                                <div class="card o-hidden">
                                    <div class="bg-secondary b-r-4 cardBody">
                                        <div class="media static-top-widget">
                                            <div class="media-body">
                                                <div class="notificationDetails mt-3">
                                                    <p> Order Information.</p>

                                                    <p>Status : Order
                                                        <?php if($notes->order_notes_status == 1): ?>
                                                        Pending
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 2): ?>
                                                        Dispatched
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 3): ?>
                                                        Delivered
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 4): ?>
                                                        Cancelled
                                                        <?php endif; ?>
                                                        <?php if($notes->order_notes_status == 5): ?>
                                                        On Hold
                                                        <?php endif; ?>
                                                    </p>
                                                    <?php if(!empty($notes->order_comment)): ?>
                                                    <p>Comment : <?php echo e($notes->order_comment); ?>.</p>
                                                    <?php endif; ?>
                                                    <p>Time : <?php echo e($notes->status_changed_time); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>Order Information</h3>

                    <div class="form theme-form">
                        <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pillsInformationTab" data-bs-toggle="pill" data-bs-target="#pillsInformation" type="button" role="tab" aria-controls="pillsInformationTab" aria-selected="true">Information
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pillsInvoicesTab" data-bs-toggle="pill" data-bs-target="#pillsInvoices" type="button" role="tab" aria-controls="pillsInvoicesTab" aria-selected="false">Invoices</button>
                            </li>

                            
                            <?php if($check_cancelled_order->order_status == 2): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pillsCancelTab" data-bs-toggle="pill" data-bs-target="#pillsCancel" type="button" role="tab" aria-controls="pillsCancelTab" aria-selected="false">Cancellation Request</button>
                            </li>

                            <?php endif; ?>

                            <?php if($check_cancelled_order->order_status == 3): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pillsShipmentsTab" data-bs-toggle="pill" data-bs-target="#pillsShipments" type="button" role="tab" aria-controls="pillsShipmentsTab" aria-selected="false">Refund Request</button>
                            </li>
                            <?php endif; ?>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="pillsInformation" role="tabpanel" aria-labelledby="pillsInformationTab">

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order and Account
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="orderInformation">
                                                            <h6>Order Information</h6>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Order no</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>#<?php echo e($order->id); ?></p>
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
                                                                        <?php if($order->order_status == 4): ?>
                                                                        Cancelled
                                                                        <?php endif; ?>
                                                                        <?php if($order->order_status == 5): ?>
                                                                        On Hold
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
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Phone no</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p><?php echo e($order->user->contact); ?></p>
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Address
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="orderInformation">
                                                            <h6>Shipping Address</h6>
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
                                                                        <p>City: <?php echo e($shipping->get_city->city ?? ''); ?></p>
                                                                        <?php else: ?>
                                                                        <p>City: N/A</p>
                                                                        <?php endif; ?>

                                                                        <?php if(!empty($shipping->province)): ?>
                                                                        <p>Province: <?php echo e($shipping->get_state->state ?? ''); ?></p>
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
                                                                        <p>City: <?php echo e($billing->get_city->city ?? ''); ?></p>
                                                                        <?php else: ?>
                                                                        <p>City: N/A</p>
                                                                        <?php endif; ?>

                                                                        <?php if(!empty($billing->province)): ?>
                                                                        <p>Province: <?php echo e($billing->get_state->state ?? ''); ?></p>
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Payment and Shipping
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Products Ordered
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table">
                                                    <div class="table-responsive">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>s.no</th>
                                                                    <th>Image</th>
                                                                    <th>Product Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Save Amount</th>
                                                                    <th>Unit Cost</th>
                                                                    <th>Discounted Price</th>
                                                                    <th>Subtotal</th>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $total = 0;
                                                                ?>

                                                                <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <?php if($product->order_status == 2): ?>
                                                                <?php
                                                                $total += 0;
                                                                ?>
                                                                <?php else: ?>
                                                                <?php
                                                                $total += $product->total;
                                                                ?>
                                                                <?php endif; ?>

                                                                


                                                                <tr>
                                                                    <td>
                                                                        <?php echo e($product->id ?? ''); ?>

                                                                    </td>


                                                                    <td>
                                                                        
                                                                        <img src="<?php echo e(asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? ''); ?>" alt="Image" width="40px">
                                                                    </td>

                                                                    <td>
                                                                        <?php echo e($product->product->product_name); ?><br>
                                                                        <small style="color: #ff2446"><?php echo e($product->attribute_values); ?></small>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($product->quantity ?? ''); ?>


                                                                    </td>
                                                                    <td>
                                                                        <?php if($product->discounted_price != null): ?>

                                                                        $<?php echo e(number_format($product->discount, 2)); ?>

                                                                        <?php else: ?>
                                                                        -
                                                                        <?php endif; ?>

                                                                    </td>
                                                                    <td>
                                                                        

                                                                        

                                                                    </td>
                                                                    <td>

                                                                        <?php if($product->discount != null): ?>
                                                                        $<?php echo e(number_format($product->discounted_price, 2)); ?>

                                                                        <?php else: ?>
                                                                        -
                                                                        <?php endif; ?>

                                                                    </td>


                                                                    <td>

                                                                        $<?php echo e(number_format($product->total, 2) ?? ''); ?>


                                                                    </td>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="summary-comment-container">
                                                    <div class="comment-container">
                                                        <?php if($order->order_status != 3 && $order->order_status != 4): ?>
                                                        <form method="POST" action="<?php echo e(route('order.status', ['id' => $order->id])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="control-group">
                                                                <label for="order_status" class="required">Order
                                                                    Status </label>
                                                                <select id="order_status" name="order_status" class="control">
                                                                    <option value="" disabled="disabled">
                                                                        --Choose Order Status--</option>
                                                                    <option value="1" <?php echo e($order->order_status == 1 ? 'selected' : ''); ?>>
                                                                        Pending</option>
                                                                    <option value="2" <?php echo e($order->order_status == 2 ? 'selected' : ''); ?>>
                                                                        Dispatched</option>
                                                                    <option value="3" <?php echo e($order->order_status == 3 ? 'selected' : ''); ?>>
                                                                        Delivered</option>
                                                                    
                                                                    <option value="4" <?php echo e($order->order_status == 4 ? 'selected' : ''); ?>>
                                                                        Canceled</option>
                                                                    <option value="5" <?php echo e($order->order_status == 5 ? 'selected' : ''); ?>>
                                                                        On Hold</option>
                                                                    
                                                                </select>

                                                            </div>
                                                            <div class="control-group"><label for="comment" class="required">Comment</label>
                                                                <textarea id="comment" name="comment" data-vv-as="&quot;Comment&quot;" class="control" aria-required="true" aria-invalid="false"></textarea>

                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-lg btn-primary loader-bt">
                                                                Submit
                                                            </button>
                                                        </form>
                                                        <?php endif; ?>

                                                        <?php if($order->order_status == 4): ?>
                                                        <div class="control-group">
                                                            <label for="order_status" class="required">Order
                                                                status : <span class="span badge rounded-pill pill-badge-danger">Cancelled</span></label>
                                                        </div>
                                                        <?php endif; ?>
                                                        <ul class="comment-list"></ul>
                                                    </div>
                                                    <table class="sale-summary">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td>Shipping &amp; Handling</td>
                                                                <td>-</td>
                                                                <td>$<?php echo e($order->delivery_fee); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>-</td>
                                                                <td>$<?php echo e($total); ?></td>
                                                            </tr>

                                                            
                                                            <tr class="bold">
                                                                <td>Grand Total</td>
                                                                <td>-</td>
                                                                <td>$<?php echo e($total + $order->delivery_fee); ?></td>
                                                            </tr>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="pillsInvoices" role="tabpanel" aria-labelledby="pillsInvoicesTab">

                                <div class="table" style="padding: 20px 0px;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Invoice Date</th>
                                                <th>Order ID</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $invoices->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>#<?php echo e($invoice->id); ?></td>
                                                <td><?php echo e($invoice->created_at); ?></td>
                                                <td>#<?php echo e($invoices->id); ?></td>
                                                <td><?php echo e($invoices->user->name); ?></td>
                                                <td>Paid</td>
                                                <td>$<?php echo e($invoice->price); ?></td>
                                                <td><a href="<?php echo e(route('invoice.index', ['id' => $invoices->id])); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="pillsShipments" role="tabpanel" aria-labelledby="pillsShipmentsTab">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Refund Request
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapseSeven" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                
                                <div class="accordion-body">
                                    <div class="table">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>s.no</th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Save Amount</th>
                                                        <th>Unit Cost</th>
                                                        <th>Discounted Price</th>
                                                        <th>Subtotal</th>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total = 0;
                                                    ?>

                                                    <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    
                                                    <?php
                                                    $total += 0;
                                                    ?>
                                                    
                                                    <?php
                                                    $total += $product->total;
                                                    ?>



                                                    <tr>
                                                        <?php if($product->order_status == 3): ?>
                                                        <td>
                                                            <?php echo e($product->id ?? ''); ?>

                                                        </td>
                                                        <?php endif; ?>

                                                        <?php if($product->order_status == 3): ?>
                                                        <td>
                                                            
                                                            <img src="<?php echo e(asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? ''); ?>" alt="Image" width="40px">
                                                        </td>

                                                        <td>
                                                            <?php echo e($product->product->product_name); ?><br>
                                                            <small style="color: #ff2446"><?php echo e($product->attribute_values); ?></small>
                                                        </td>
                                                        <td>
                                                            <?php echo e($product->quantity ?? ''); ?>


                                                        </td>
                                                        <td>
                                                            <?php if($product->discounted_price != null): ?>

                                                            $<?php echo e(number_format($product->discount, 2)); ?>

                                                            <?php else: ?>
                                                            -
                                                            <?php endif; ?>

                                                        </td>
                                                        <td>

                                                            <?php if($product->discount != null): ?>
                                                            $<?php echo e(number_format($product->discounted_price, 2)); ?>

                                                            <?php else: ?>
                                                            -
                                                            <?php endif; ?>

                                                        </td>

                                                        <td>

                                                            $<?php echo e(number_format($product->total, 2) ?? ''); ?>


                                                        </td>


                                                        
                                                        <?php endif; ?>

                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="summary-comment-container">
                                        <div class="comment-container">
                                            <?php if($order->order_status != 3 && $order->order_status != 4): ?>
                                            <form method="POST" action="<?php echo e(route('order.status', ['id' => $order->id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                
                                                    

                                                <div class="control-group">
                                                    <label for="order_status" class="required"><strong>Refund Reason</strong></label>
                                                    <?php echo e($product->get_reason->reason ?? ''); ?>

                                                    <br>
                                                    <label for="order_status" class="required"><strong>Refund Detail</strong></label>
                                                    <?php echo e($product->cancellation_comments ?? ''); ?>

                                                </div>
                                                    <br>
                                                 <div class="control-group">
                                                    <label for="order_status" class="required"><strong>Refund Item Images</strong></label>
                                                    <div class="d-flex">
                                                    <?php if(!empty($product->cancellation_image)): ?>
                                                     <?php $__currentLoopData = json_decode($product->cancellation_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="" style="width:50px; height:50px; margin:0px 6px;">
                                                                <img src="<?php echo e(url('public/cancellation_image/' . $image)); ?>"
                                                                    alt="" height="100%" width="100%"
                                                                    style="object-fit:contain;">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                

                                            </form>
                                            <?php endif; ?>

                                            <ul class="comment-list"></ul>
                                        </div>
                                        <table class="sale-summary">
                                            <tbody>
                                                
                                                <tr>
                                                    <td>Shipping &amp; Handling</td>
                                                    <td>-</td>
                                                    <td>$<?php echo e($order->delivery_fee); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>-</td>
                                                    <td>$<?php echo e($total); ?></td>
                                                </tr>

                                                
                                                <tr class="bold">
                                                    <td>Grand Total</td>
                                                    <td>-</td>
                                                    <td>$<?php echo e($total + $order->delivery_fee); ?></td>
                                                </tr>

                                                <tr>
                                                    
                                                    <td>
                                                        <?php if($product->cancellation_status == null): ?>
                                                        <a href="<?php echo e(route('refund-status',$order->id)); ?>"><button type="submit" class="btn  btn-primary loader-bt">
                                                                Approve
                                                            </button></a>
                                                        <?php endif; ?>
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


                            
                            <div class="tab-pane fade" id="pillsCancel" role="tabpanel" aria-labelledby="pillsCancelTab">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Cancellation Request
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        
                                        <div class="accordion-body">
                                            <div class="table">
                                                <div class="table-responsive">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>s.no</th>
                                                                <th>Image</th>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Save Amount</th>
                                                                <th>Unit Cost</th>
                                                                <th>Discounted Price</th>
                                                                <th>Subtotal</th>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $total = 0;
                                                            ?>

                                                            <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            
                                                            <?php
                                                            $total += 0;
                                                            ?>
                                                            
                                                            <?php
                                                            $total += $product->total;
                                                            ?>



                                                            <tr>
                                                                <?php if($product->order_status == 2): ?>
                                                                <td>
                                                                    <?php echo e($product->id ?? ''); ?>

                                                                </td>
                                                                <?php endif; ?>

                                                                <?php if($product->order_status == 2): ?>
                                                                <td>
                                                                    
                                                                    <img src="<?php echo e(asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? ''); ?>" alt="Image" width="40px">
                                                                </td>

                                                                <td>
                                                                    <?php echo e($product->product->product_name); ?><br>
                                                                    <small style="color: #ff2446"><?php echo e($product->attribute_values); ?></small>
                                                                </td>
                                                                <td>
                                                                    <?php echo e($product->quantity ?? ''); ?>


                                                                </td>
                                                                <td>
                                                                    <?php if($product->discounted_price != null): ?>

                                                                    $<?php echo e(number_format($product->discount, 2)); ?>

                                                                    <?php else: ?>
                                                                    -
                                                                    <?php endif; ?>

                                                                </td>
                                                                <td>

                                                                    <?php if($product->discount != null): ?>
                                                                    $<?php echo e(number_format($product->discounted_price, 2)); ?>

                                                                    <?php else: ?>
                                                                    -
                                                                    <?php endif; ?>

                                                                </td>

                                                                <td>

                                                                    $<?php echo e(number_format($product->total, 2) ?? ''); ?>


                                                                </td>



                                                                <td></td>
                                                                <?php endif; ?>

                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="summary-comment-container">
                                                <div class="comment-container">
                                                    <?php if($order->order_status != 3 && $order->order_status != 4): ?>
                                                    <form method="POST" action="<?php echo e(route('order.status', ['id' => $order->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        
                                                            
                                                        
                                                        <div class="control-group">
                                                            <label for="order_status" class="required"><strong>Cancellation Reason</strong></label>
                                                            <?php echo e($product->get_reason->reason ?? ''); ?> <br>
                                                            <label for="order_status" class="required"><strong>Cancellation Detail</strong></label>
                                                            <?php echo e($product->cancellation_comments ?? ''); ?>


                                                        </div>

                                                    </form>
                                                    <?php endif; ?>

                                                    <ul class="comment-list"></ul>
                                                </div>
                                                <table class="sale-summary">
                                                    <tbody>

                                                        <tr>
                                                            <td>Shipping &amp; Handling</td>
                                                            <td>-</td>
                                                            <td>$<?php echo e($order->delivery_fee); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td>-</td>
                                                            <td>$<?php echo e($total); ?></td>
                                                        </tr>

                                                        
                                                        <tr class="bold">
                                                            <td>Grand Total</td>
                                                            <td>-</td>
                                                            <td>$<?php echo e($total + $order->delivery_fee); ?></td>
                                                        </tr>
                                                        
                                                        
                                                        
                                                        <tr>
                                                            
                                                            <td>
                                                                <?php if($product->cancellation_status == null): ?>
                                                                <a href="<?php echo e(route('cancel-status',$order->id)); ?>"><button type="submit" class="btn  btn-primary loader-bt">
                                                                        Approve
                                                                    </button></a>
                                                                    <?php endif; ?>
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

</div>
</div>
</div>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>


<script>
    $(document).ready(function() {
        $(".loader-bt").on('click', function() {
            $(".loader-bg").removeClass('loader-active');
        });
    });

</script>


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


<?php echo $__env->make('admin_dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/admin_dashboard/orderManagement/show.blade.php ENDPATH**/ ?>