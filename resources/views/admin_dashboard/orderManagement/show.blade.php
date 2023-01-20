@extends('admin_dashboard.layouts.master')
@section('content')
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

{{-- update work 19 --}}
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
                {{-- <p class="mb-0">Try It Real Time <i class="fa fa-thumbs-o-up txt-primary"></i></p> --}}
            </div>
            <div class="customizer-body custom-scrollbar">
                <div class="tab-pane" id="c-pills-home" role="tabpanel" aria-labelledby="c-pills-home-tab">
                    <div class="notificationBox">
                        <div class="row">
                            @foreach ($order_notes as $key => $notes )
                            @if($key % 2 == 0)
                            <div class="col-sm-12 col-xl-12 col-lg-12">
                                <div class="card o-hidden">
                                    <div class="bg-primary b-r-4 cardBody">
                                        <div class="media static-top-widget">
                                            <div class="media-body">

                                                <div class="notificationDetails mt-3">
                                                    <p> Order Information.</p>

                                                    <p>Status : Order
                                                        @if ($notes->order_notes_status == 1)
                                                        Pending
                                                        @endif
                                                        @if ($notes->order_notes_status == 2)
                                                        Dispatched
                                                        @endif
                                                        @if ($notes->order_notes_status == 3)
                                                        Delivered
                                                        @endif
                                                        @if ($notes->order_notes_status == 4)
                                                        Cancelled
                                                        @endif
                                                        @if ($notes->order_notes_status == 5)
                                                        On Hold
                                                        @endif
                                                    </p>
                                                    @if(!empty($notes->order_comment))
                                                    <p>Comment : {{$notes->order_comment}}.</p>
                                                    @endif
                                                    <p>Time : {{$notes->status_changed_time}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-sm-12 col-xl-12 col-lg-12">
                                <div class="card o-hidden">
                                    <div class="bg-secondary b-r-4 cardBody">
                                        <div class="media static-top-widget">
                                            <div class="media-body">
                                                <div class="notificationDetails mt-3">
                                                    <p> Order Information.</p>

                                                    <p>Status : Order
                                                        @if ($notes->order_notes_status == 1)
                                                        Pending
                                                        @endif
                                                        @if ($notes->order_notes_status == 2)
                                                        Dispatched
                                                        @endif
                                                        @if ($notes->order_notes_status == 3)
                                                        Delivered
                                                        @endif
                                                        @if ($notes->order_notes_status == 4)
                                                        Cancelled
                                                        @endif
                                                        @if ($notes->order_notes_status == 5)
                                                        On Hold
                                                        @endif
                                                    </p>
                                                    @if(!empty($notes->order_comment))
                                                    <p>Comment : {{$notes->order_comment}}.</p>
                                                    @endif
                                                    <p>Time : {{$notes->status_changed_time}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- update work --}}
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

                            {{-- update work 13 --}}
                            @if($check_cancelled_order->order_status == 2)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pillsCancelTab" data-bs-toggle="pill" data-bs-target="#pillsCancel" type="button" role="tab" aria-controls="pillsCancelTab" aria-selected="false">Cancellation Request</button>
                            </li>

                            @endif

                            @if($check_cancelled_order->order_status == 3)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pillsShipmentsTab" data-bs-toggle="pill" data-bs-target="#pillsShipments" type="button" role="tab" aria-controls="pillsShipmentsTab" aria-selected="false">Refund Request</button>
                            </li>
                            @endif

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
                                                                    <p>#{{ $order->id }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Order Date</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>{{ $order->created_at }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Order Status</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>
                                                                        @if ($order->order_status == 1)
                                                                        Pending
                                                                        @endif
                                                                        @if ($order->order_status == 2)
                                                                        Dispatched
                                                                        @endif
                                                                        @if ($order->order_status == 3)
                                                                        Delivered
                                                                        @endif
                                                                        @if ($order->order_status == 4)
                                                                        Cancelled
                                                                        @endif
                                                                        @if ($order->order_status == 5)
                                                                        On Hold
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Channel</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>Default</p>
                                                                    </div>
                                                                </div> --}}
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
                                                                    <p>{{ $order->user->name }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Email</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>{{ $order->user->email }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Phone no</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>{{ $order->user->contact }}</p>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Customer Group</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>General</p>
                                                                    </div>
                                                                </div> --}}
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

                                                                        @if (!empty($shipping->contact))
                                                                        <p>Phone no: {{ $shipping->contact }}
                                                                        </p>
                                                                        @else
                                                                        <p>Phone no: N/A</p>
                                                                        @endif

                                                                        @if (!empty($shipping->landmark))
                                                                        <p>Landmark: {{ $shipping->landmark }}
                                                                        </p>
                                                                        @else
                                                                        <p>Landmark: N/A</p>
                                                                        @endif


                                                                        @if (!empty($shipping->address))
                                                                        <p>Address: {{ $shipping->address }}
                                                                        </p>
                                                                        @else
                                                                        <p>Address: N/A</p>
                                                                        @endif

                                                                        @if (!empty($shipping->city))
                                                                        <p>City: {{ $shipping->get_city->city ?? '' }}</p>
                                                                        @else
                                                                        <p>City: N/A</p>
                                                                        @endif

                                                                        @if (!empty($shipping->province))
                                                                        <p>Province: {{ $shipping->get_state->state ?? '' }}</p>
                                                                        @else
                                                                        <p>Province: N/A</p>
                                                                        @endif

                                                                        @if (!empty($shipping->country))
                                                                        <p>Country: {{ $shipping->country }}
                                                                        </p>
                                                                        @else
                                                                        <p>Country: N/A
                                                                        </p>
                                                                        @endif


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
                                                                        @if (!empty($billing->contact))
                                                                        <p>Phone no: {{ $billing->contact }}
                                                                        </p>
                                                                        @else
                                                                        <p>Phone no: N/A</p>
                                                                        @endif

                                                                        @if (!empty($billing->landmark))
                                                                        <p>Landmark: {{ $billing->landmark }}
                                                                        </p>
                                                                        @else
                                                                        <p>Landmark: N/A</p>
                                                                        @endif


                                                                        @if (!empty($billing->address))
                                                                        <p>Address: {{ $billing->address }}
                                                                        </p>
                                                                        @else
                                                                        <p>Address: N/A</p>
                                                                        @endif

                                                                        @if (!empty($billing->city))
                                                                        <p>City: {{ $billing->get_city->city ?? '' }}</p>
                                                                        @else
                                                                        <p>City: N/A</p>
                                                                        @endif

                                                                        @if (!empty($billing->province))
                                                                        <p>Province: {{ $billing->get_state->state ?? '' }}</p>
                                                                        @else
                                                                        <p>Province: N/A</p>
                                                                        @endif

                                                                        @if (!empty($billing->country))
                                                                        <p>Country: {{ $billing->country }}
                                                                        </p>
                                                                        @else
                                                                        <p>Country: N/A
                                                                        </p>
                                                                        @endif
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
                                                                        @if ($order->payment_method == 1)
                                                                        Cash On Delivery
                                                                        @endif
                                                                        @if ($order->payment_method == 2)
                                                                        Paypal
                                                                        @endif
                                                                        @if ($order->payment_method == 3)
                                                                        Stripe
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Payment Status</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>
                                                                        @if ($order->payment_method == 1)
                                                                        N/A
                                                                        @endif
                                                                        @if ($order->payment_method == 2)
                                                                        Recieved
                                                                        @endif
                                                                        @if ($order->payment_method == 3)
                                                                        Recieved
                                                                        @endif
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
                                                                    {{-- <th>Status</th> --}}
                                                                    {{-- <th>Item Status</th> --}}
                                                                    {{-- <th>Subtotal</th> --}}
                                                                    {{-- <th>Tax Percent</th>
                                                                        <th>Tax Amount</th> --}}
                                                                    {{-- <th>Grand Total</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $total = 0;
                                                                @endphp

                                                                @foreach ($order->purchased_items as $product)

                                                                @if($product->order_status == 2)
                                                                @php
                                                                $total += 0;
                                                                @endphp
                                                                @else
                                                                @php
                                                                $total += $product->total;
                                                                @endphp
                                                                @endif

                                                                {{-- @if ($product->discount == null)
                                                                        @php
                                                                            $total += $product->price;
                                                                        @endphp
                                                                        @endif

                                                                        @if ($product->discount != null)
                                                                        @php

                                                                            $total += $product->discounted_price;
                                                                        @endphp
                                                                        @endif --}}


                                                                <tr>
                                                                    <td>
                                                                        {{ $product->id ?? '' }}
                                                                    </td>


                                                                    <td>
                                                                        {{-- {{ $product->product_variantion_id }} --}}
                                                                        <img src="{{ asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? '' }}" alt="Image" width="40px">
                                                                    </td>

                                                                    <td>
                                                                        {{ $product->product->product_name }}<br>
                                                                        <small style="color: #ff2446">{{ $product->attribute_values }}</small>
                                                                    </td>
                                                                    <td>
                                                                        {{ $product->quantity ?? '' }}

                                                                    </td>
                                                                    <td>
                                                                        @if ($product->discounted_price != null)

                                                                        ${{ number_format($product->discount, 2) }}
                                                                        @else
                                                                        -
                                                                        @endif

                                                                    </td>
                                                                    <td>
                                                                        {{-- ${{ number_format($product->price, 2) ?? '' }} --}}

                                                                        {{-- @if ($product->discount == null)
                                                                                <span id="orignal_price">${{ number_format($product->price,2) }}</span>
                                                                        @endif

                                                                        @if ($product->discount != null)
                                                                        <span id="orignal_price" class="discount_orignal_price">${{ number_format($product->price,2) }}</span>
                                                                        <span id="discounted_price"> - ${{ number_format($product->discounted_price,2) }}</span></h4>
                                                                        @endif --}}

                                                                    </td>
                                                                    <td>

                                                                        @if ($product->discount != null)
                                                                        ${{ number_format($product->discounted_price, 2) }}
                                                                        @else
                                                                        -
                                                                        @endif

                                                                    </td>


                                                                    <td>

                                                                        ${{ number_format($product->total, 2) ?? '' }}

                                                                    </td>
                                                                    {{-- update work 13 --}}
                                                                    {{-- <td>
                                                                                @if($product->order_status == 2)
                                                                                 Cancelled
                                                                                 @else
                                                                                    Active
                                                                                 @endif
                                                                            </td> --}}
                                                                    {{-- <td><span class="qty-row">
                                                                                Ordered (2)
                                                                            </span> <span class="qty-row">
                                                                                Invoiced (2)
                                                                            </span> <span class="qty-row"></span> <span
                                                                                class="qty-row">
                                                                                Refunded (2)
                                                                            </span> <span class="qty-row"></span></td> --}}
                                                                    {{-- <td>$90,400.00</td>
                                                                        <td>0.0000%</td> --}}
                                                                    {{-- <td>$0.00</td>
                                                                        <td>$90,400.00</td> --}}
                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="summary-comment-container">
                                                    <div class="comment-container">
                                                        @if ($order->order_status != 3 && $order->order_status != 4)
                                                        <form method="POST" action="{{ route('order.status', ['id' => $order->id]) }}">
                                                            @csrf
                                                            <div class="control-group">
                                                                <label for="order_status" class="required">Order
                                                                    Status </label>
                                                                <select id="order_status" name="order_status" class="control">
                                                                    <option value="" disabled="disabled">
                                                                        --Choose Order Status--</option>
                                                                    <option value="1" {{ $order->order_status == 1 ? 'selected' : '' }}>
                                                                        Pending</option>
                                                                    <option value="2" {{ $order->order_status == 2 ? 'selected' : '' }}>
                                                                        Dispatched</option>
                                                                    <option value="3" {{ $order->order_status == 3 ? 'selected' : '' }}>
                                                                        Delivered</option>
                                                                    {{-- update work 19 --}}
                                                                    <option value="4" {{ $order->order_status == 4 ? 'selected' : '' }}>
                                                                        Canceled</option>
                                                                    <option value="5" {{ $order->order_status == 5 ? 'selected' : '' }}>
                                                                        On Hold</option>
                                                                    {{-- update work 19 --}}
                                                                </select>

                                                            </div>
                                                            <div class="control-group"><label for="comment" class="required">Comment</label>
                                                                <textarea id="comment" name="comment" data-vv-as="&quot;Comment&quot;" class="control" aria-required="true" aria-invalid="false"></textarea>

                                                            </div>
                                                            {{-- <div class="control-group"><span class="checkbox"><input
                                                                            type="checkbox" name="customer_notified"
                                                                            id="customer-notified"> <label
                                                                            for="customer-notified"
                                                                            class="checkbox-view"></label>
                                                                        Notify Customer
                                                                    </span></div> --}}
                                                            <button type="submit" class="btn btn-lg btn-primary loader-bt">
                                                                Submit
                                                            </button>
                                                        </form>
                                                        @endif

                                                        @if ($order->order_status == 4)
                                                        <div class="control-group">
                                                            <label for="order_status" class="required">Order
                                                                status : <span class="span badge rounded-pill pill-badge-danger">Cancelled</span></label>
                                                        </div>
                                                        @endif
                                                        <ul class="comment-list"></ul>
                                                    </div>
                                                    <table class="sale-summary">
                                                        <tbody>
                                                            {{-- <tr>
                                                                    <td>Subtotal</td>
                                                                    <td>-</td>
                                                                    <td>${{ $total }}</td>
                                                            </tr> --}}
                                                            <tr>
                                                                <td>Shipping &amp; Handling</td>
                                                                <td>-</td>
                                                                <td>${{ $order->delivery_fee }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>-</td>
                                                                <td>${{ $total }}</td>
                                                            </tr>

                                                            {{-- <tr class="border">
                                                                    <td>Tax</td>
                                                                    <td>-</td>
                                                                    <td>$0.00</td>
                                                                </tr> --}}
                                                            <tr class="bold">
                                                                <td>Grand Total</td>
                                                                <td>-</td>
                                                                <td>${{ $total + $order->delivery_fee }}</td>
                                                            </tr>
                                                            {{-- <tr class="bold">
                                                                    <td>Total Paid</td>
                                                                    <td>-</td>
                                                                    <td>$90,400.00</td>
                                                                </tr> --}}
                                                            {{-- <tr class="bold">
                                                                    <td>Total Refunded</td>
                                                                    <td>-</td>
                                                                    <td>$00.00</td>
                                                                </tr>
                                                                <tr class="bold">
                                                                    <td>Total Due</td>
                                                                    <td>-</td>
                                                                    <td>$0.00</td>
                                                                </tr> --}}
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
                                            @foreach ($invoices->purchased_items as $invoice)
                                            <tr>
                                                <td>#{{ $invoice->id }}</td>
                                                <td>{{ $invoice->created_at }}</td>
                                                <td>#{{ $invoices->id }}</td>
                                                <td>{{ $invoices->user->name }}</td>
                                                <td>Paid</td>
                                                <td>${{ $invoice->price }}</td>
                                                <td><a href="{{ route('invoice.index', ['id' => $invoices->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            </tr>
                                            @endforeach
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
                                {{-- <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample"> --}}
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
                                                        {{-- update work 17 --}}
                                                        {{-- <th>Action</th> --}}
                                                        {{-- <th>Item Status</th> --}}
                                                        {{-- <th>Subtotal</th> --}}
                                                        {{-- <th>Tax Percent</th>
                                                                <th>Tax Amount</th> --}}
                                                        {{-- <th>Grand Total</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $total = 0;
                                                    @endphp

                                                    @foreach ($order->purchased_items as $product)
                                                    {{-- update work 13 --}}
                                                    {{-- @if($product->order_status == 2) --}}
                                                    @php
                                                    $total += 0;
                                                    @endphp
                                                    {{-- @else --}}
                                                    @php
                                                    $total += $product->total;
                                                    @endphp



                                                    <tr>
                                                        @if($product->order_status == 3)
                                                        <td>
                                                            {{ $product->id ?? '' }}
                                                        </td>
                                                        @endif

                                                        @if($product->order_status == 3)
                                                        <td>
                                                            {{-- {{ $product->product_variantion_id }} --}}
                                                            <img src="{{ asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? '' }}" alt="Image" width="40px">
                                                        </td>

                                                        <td>
                                                            {{ $product->product->product_name }}<br>
                                                            <small style="color: #ff2446">{{ $product->attribute_values }}</small>
                                                        </td>
                                                        <td>
                                                            {{ $product->quantity ?? '' }}

                                                        </td>
                                                        <td>
                                                            @if ($product->discounted_price != null)

                                                            ${{ number_format($product->discount, 2) }}
                                                            @else
                                                            -
                                                            @endif

                                                        </td>
                                                        <td>

                                                            @if ($product->discount != null)
                                                            ${{ number_format($product->discounted_price, 2) }}
                                                            @else
                                                            -
                                                            @endif

                                                        </td>

                                                        <td>

                                                            ${{ number_format($product->total, 2) ?? '' }}

                                                        </td>


                                                        {{-- <td></td> --}}
                                                        @endif

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="summary-comment-container">
                                        <div class="comment-container">
                                            @if ($order->order_status != 3 && $order->order_status != 4)
                                            <form method="POST" action="{{ route('order.status', ['id' => $order->id]) }}">
                                                @csrf
                                                {{-- @foreach ($order->purchased_items as $product) --}}
                                                    {{-- update work 16 --}}

                                                <div class="control-group">
                                                    <label for="order_status" class="required"><strong>Refund Reason</strong></label>
                                                    {{$product->get_reason->reason ?? ''}}
                                                    <br>
                                                    <label for="order_status" class="required"><strong>Refund Detail</strong></label>
                                                    {{$product->cancellation_comments ?? ''}}
                                                </div>
                                                    <br>
                                                 <div class="control-group">
                                                    <label for="order_status" class="required"><strong>Refund Item Images</strong></label>
                                                    <div class="d-flex">
                                                    @if(!empty($product->cancellation_image))
                                                     @foreach (json_decode($product->cancellation_image) as $key => $image)
                                                            <div class="" style="width:50px; height:50px; margin:0px 6px;">
                                                                <img src="{{ url('public/cancellation_image/' . $image) }}"
                                                                    alt="" height="100%" width="100%"
                                                                    style="object-fit:contain;">
                                                            </div>
                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                {{-- update work 16 --}}

                                            </form>
                                            @endif

                                            <ul class="comment-list"></ul>
                                        </div>
                                        <table class="sale-summary">
                                            <tbody>
                                                {{-- <tr>
                                                            <td>Subtotal</td>
                                                            <td>-</td>
                                                            <td>${{ $total }}</td>
                                                </tr> --}}
                                                <tr>
                                                    <td>Shipping &amp; Handling</td>
                                                    <td>-</td>
                                                    <td>${{ $order->delivery_fee }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>-</td>
                                                    <td>${{ $total }}</td>
                                                </tr>

                                                {{-- <tr class="border">
                                                            <td>Tax</td>
                                                            <td>-</td>
                                                            <td>$0.00</td>
                                                        </tr> --}}
                                                <tr class="bold">
                                                    <td>Grand Total</td>
                                                    <td>-</td>
                                                    <td>${{ $total + $order->delivery_fee }}</td>
                                                </tr>

                                                <tr>
                                                    {{-- update work 13 --}}
                                                    <td>
                                                        @if($product->cancellation_status == null)
                                                        <a href="{{route('refund-status',$order->id)}}"><button type="submit" class="btn  btn-primary loader-bt">
                                                                Approve
                                                            </button></a>
                                                        @endif
                                                        @if($product->cancellation_status == 2)
                                                            <span class="span badge rounded-pill pill-badge-danger">Refunded</span>
                                                        @endif
                                                        @if($product->cancellation_status == 1)
                                                            <span class="span badge rounded-pill pill-badge-danger">Cancelled</span>
                                                        @endif

                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                            {{-- @if($product->order_status == 2) --}}
                            <div class="tab-pane fade" id="pillsCancel" role="tabpanel" aria-labelledby="pillsCancelTab">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Cancellation Request
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        {{-- <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample"> --}}
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
                                                                {{-- update work 17 --}}
                                                                {{-- <th>Action</th> --}}
                                                                {{-- <th>Item Status</th> --}}
                                                                {{-- <th>Subtotal</th> --}}
                                                                {{-- <th>Tax Percent</th>
                                                                <th>Tax Amount</th> --}}
                                                                {{-- <th>Grand Total</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $total = 0;
                                                            @endphp

                                                            @foreach ($order->purchased_items as $product)
                                                            {{-- update work 13 --}}
                                                            {{-- @if($product->order_status == 2) --}}
                                                            @php
                                                            $total += 0;
                                                            @endphp
                                                            {{-- @else --}}
                                                            @php
                                                            $total += $product->total;
                                                            @endphp



                                                            <tr>
                                                                @if($product->order_status == 2)
                                                                <td>
                                                                    {{ $product->id ?? '' }}
                                                                </td>
                                                                @endif

                                                                @if($product->order_status == 2)
                                                                <td>
                                                                    {{-- {{ $product->product_variantion_id }} --}}
                                                                    <img src="{{ asset(!empty($product->product_variantion_id) ? 'variations/'.$product->variations->image : 'products/'.$product->product->image ) ?? '' }}" alt="Image" width="40px">
                                                                </td>

                                                                <td>
                                                                    {{ $product->product->product_name }}<br>
                                                                    <small style="color: #ff2446">{{ $product->attribute_values }}</small>
                                                                </td>
                                                                <td>
                                                                    {{ $product->quantity ?? '' }}

                                                                </td>
                                                                <td>
                                                                    @if ($product->discounted_price != null)

                                                                    ${{ number_format($product->discount, 2) }}
                                                                    @else
                                                                    -
                                                                    @endif

                                                                </td>
                                                                <td>

                                                                    @if ($product->discount != null)
                                                                    ${{ number_format($product->discounted_price, 2) }}
                                                                    @else
                                                                    -
                                                                    @endif

                                                                </td>

                                                                <td>

                                                                    ${{ number_format($product->total, 2) ?? '' }}

                                                                </td>



                                                                <td></td>
                                                                @endif

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="summary-comment-container">
                                                <div class="comment-container">
                                                    @if ($order->order_status != 3 && $order->order_status != 4)
                                                    <form method="POST" action="{{ route('order.status', ['id' => $order->id]) }}">
                                                        @csrf
                                                        {{-- @foreach ($order->purchased_items as $product) --}}
                                                            {{-- {{dd($product->cancellation_reason)}} --}}
                                                        {{-- update work 16 --}}
                                                        <div class="control-group">
                                                            <label for="order_status" class="required"><strong>Cancellation Reason</strong></label>
                                                            {{$product->get_reason->reason ?? ''}} <br>
                                                            <label for="order_status" class="required"><strong>Cancellation Detail</strong></label>
                                                            {{$product->cancellation_comments ?? ''}}

                                                        </div>

                                                    </form>
                                                    @endif

                                                    <ul class="comment-list"></ul>
                                                </div>
                                                <table class="sale-summary">
                                                    <tbody>

                                                        <tr>
                                                            <td>Shipping &amp; Handling</td>
                                                            <td>-</td>
                                                            <td>${{ $order->delivery_fee }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td>-</td>
                                                            <td>${{ $total }}</td>
                                                        </tr>

                                                        {{-- <tr class="border">
                                                            <td>Tax</td>
                                                            <td>-</td>
                                                            <td>$0.00</td>
                                                        </tr> --}}
                                                        <tr class="bold">
                                                            <td>Grand Total</td>
                                                            <td>-</td>
                                                            <td>${{ $total + $order->delivery_fee }}</td>
                                                        </tr>
                                                        {{-- <tr class="bold">
                                                            <td>Total Paid</td>
                                                            <td>-</td>
                                                            <td>$90,400.00</td>
                                                        </tr> --}}
                                                        {{-- <tr class="bold">
                                                            <td>Total Refunded</td>
                                                            <td>-</td>
                                                            <td>$00.00</td>
                                                        </tr>
                                                        <tr class="bold">
                                                            <td>Total Due</td>
                                                            <td>-</td>
                                                            <td>$0.00</td>
                                                        </tr> --}}
                                                        {{-- {{dd($product->id)}} --}}
                                                        <tr>
                                                            {{-- update work 16 --}}
                                                            <td>
                                                                @if($product->cancellation_status == null)
                                                                <a href="{{route('cancel-status',$order->id)}}"><button type="submit" class="btn  btn-primary loader-bt">
                                                                        Approve
                                                                    </button></a>
                                                                    @endif
                                                                     @if($product->cancellation_status == 2)
                                                                <span class="span badge rounded-pill pill-badge-danger">Refunded</span>
                                                                @endif
                                                                @if($product->cancellation_status == 1)
                                                                <span class="span badge rounded-pill pill-badge-danger">Cancelled</span>
                                                                @endif


                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- @endif --}}
                        </div>

                    </div>


                    {{-- update work 13 Refund request --}}


                    {{-- @endif --}}
                </div>

            </div>

        </div>
    </div>

</div>
</div>

</div>
</div>
</div>


@endsection



@push('scripts')

{{-- update work 19 --}}
<script>
    $(document).ready(function() {
        $(".loader-bt").on('click', function() {
            $(".loader-bg").removeClass('loader-active');
        });
    });

</script>
{{-- update work 19 --}}

@if (Session::has('order_status'))
<script>
    toastr.success("{{ Session::get('order_status') }}")

</script>
@endif
@if (Session::has('order_status_error'))
<script>
    toastr.error("{{ Session::get('order_status_error') }}")

</script>
@endif
@endpush

