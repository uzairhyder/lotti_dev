@if (count($orders) > 0)

{{-- {{dd($orders)}} --}}

    @foreach ($orders as $order)
        @if ($order->order_status == null && count($order->carts) == 0)
            @continue
        @endif

        {{-- @if ($order->order_status != 4 && $order->order_status != 6) --}}
        {{-- @foreach ($order->purchased_items as $val) --}}
        {{-- @if($order->order_status != 3 && $val->order_status !=2) --}}
            <div class="profile-box review-box-padding box-full-height ==">
                <div class="mt0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="lotti-retail-div">

                        </div>
                    </div>
                    <div class="d-flex justify-content-between for-background-color-review align-items-baseline">
                        <div class="d-flex align-items-center {{ $order->order_status != null ? 'for-pay-btn for-pay-btn-cursor' : '' }}"
                            @if ($order->order_status != null) onclick="orderDetails('{{ $order->id }}')" @endif>
                            <div class="product-review-img">
                                <img src="{{ asset('order/order-pack.webp') }}" alt="">
                            </div>
                            <div class="lotti-retail-review">
                                {{-- <p>{{ $product->product_name }}</p> --}}
                                {{-- <span>Storage Capacity:128GB, Color:Green,
                                                                    Quantity:01</span> --}}
                                <p>Order# {{$order->id}} </p>
                                <span>Placed On
                                    {{ date('d/M/Y', strtotime($order->created_at)) }}</span>
                            </div>
                        </div>
                        <div class="lotti-review">


                            @if ($order->order_status == null)
                                <a href="{{ route('cart') }}">
                                    <button class="order-tracking-btn status_pay_to">
                                        <span>
                                            Pay Now
                                        </span>
                                    </button>
                                </a>
                            @endif

                            @if ($order->order_status == 1)
                                <button class="order-tracking-btn status_pending">
                                    <span>
                                        Processing
                                    </span>
                                </button>
                            @endif
                            @if ($order->order_status == 2)
                                <button class="order-tracking-btn status_dispatched">
                                    <span>
                                        Dispatched
                                    </span>
                                </button>
                            @endif
                            @if ($order->order_status == 3)
                                @if ($order->order_verification == null)
                                    <span class="verify-html-{{ $order->id }}">
                                        <button class="order-tracking-btn unverify" id="verify-{{ $order->id }}"
                                            onclick="orderVerify('{{ $order->id }}')">
                                            <span>
                                                Unreceived
                                            </span>
                                        </button>
                                    </span>
                                @else
                                    <button class="order-tracking-btn status_verification">
                                        <img src="{{ asset('icons/verified.png') }}" alt="verified" width="16px">
                                        <span>
                                            Received
                                        </span>
                                    </button>
                                @endif
                            @endif

                            @if ($order->order_status != null)
                                <button class="for-ship-btn order-tracking-btn order_tracking_status"
                                    onclick="orderTracking('{{ $order->id }}')">
                                    <span>
                                        Track Order
                                    </span>
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
              {{-- @endif --}}
            {{-- @endforeach --}}


    @endforeach
@else
    <div class="for-margin-payment-box order-placed-btn">
        <div class="span-user font-size text-center">
            <span>There are no orders placed yet.</span>
        </div>
        <div class="activate-btn-center">
            <a href="{{ route('home') }}">
                <div class="pink-login-btn activate-btn mt1">
                    CONTINUE SHOPPING
                </div>
            </a>
        </div>
    </div>
@endif
