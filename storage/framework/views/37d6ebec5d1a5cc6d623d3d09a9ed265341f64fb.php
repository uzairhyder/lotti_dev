<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Cart'); ?>


<style>
    button#checkout-button {
        width: 100%;
        padding: 10px 10px;
        border-radius: 5px;
        border: none;
        text-transform: uppercase;
        background-color: #635bff;
        color: #ffffff;
        font-family: montserratRegular;
    }

    .vipRegisterYourself {
        text-align: center;
    }

    .vipRegisterYourself span {
        font-size: 12px;
        color: #000000;
        font-family: montserratRegular;
        font-style: italic;
    }

    .vipRegisterYourself strong {
        color: #635bff;
    }




    button#pillsOneTab,
    button#pillsTwoTab,
    button#pillsThreeTab,
    button#pillsFourTab {
        width: 90% !important;
        font-family: montserratMedium;
        background-color: transparent;
        font-size: 14px;
        padding: 0px;
    }

    .nav-pills button.navLink.active,
    .nav-pills .show>.navLink {
        background-color: transparent !important;
        color: #ffffff !important;
    }

    button.navLink {
        color: #ffffff !important;
    }

    .confirmBtn {
        background-color: #ff2446;
        font-family: montserratRegular;
        color: #ffffff;
        padding: 8px 10px;
        border: none;
        font-size: 14px;
        border-radius: 6px;
        width: 150px;
    }

    .cashDetail p {
        font-family: montserratLight;
        color: #000000;
    }

    .cashDetail {
        margin: 20px 0px;
    }

    .debitForm {
        margin: 20px 0px;
    }


    .debitForm label {
        font-family: montserratBold;
        color: #000000;
        font-size: 16px;
        margin-top: 6px;
    }

    label.saveCard {
        font-family: montserratMedium;
        color: #000000;
        margin-top: 0px;
    }


    label.saveCard a {
        color: #000000;

    }

    .formCheck {
        margin: 10px 0px;

    }

    .formCheck p {
        font-family: montserratLight;
        color: #000000;
        font-size: 14px;
    }

    .paymentCategory {
        padding: 30px 20px;
        box-shadow: 0px 0px 19px -4px #a0a8ee;
        border-radius: 10px;
        margin: 0px 0px 100px 0px;
    }

    .paymentIcon {
        width: 100px;
        height: 60px;
        overflow: hidden;
        margin: auto;
        border-radius: 8px;
        box-shadow: 0 0px 10px rgb(0 0 0 / 25%);
    }

    .paymentIcon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>




<?php
    require_once __DIR__ . '/../../../vendor/autoload.php';
    $coupon_discounted_price = null;
    $total = 0;
    $total = $total_amount;

    \Stripe\Stripe::setApiKey('sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl');

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Product Amount',
                    ],
                    'unit_amount' => $total * 100,
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',

        'success_url' => 'https://lotti.com.my/lotti_dev/stripe-success',
        'cancel_url' => 'https://lotti.com.my/lotti_dev/stripe-fail',
    ]);
    session()->put('firstpayment', $session);

?>

<div class="top-nav-height"></div>



<!-- Payment Tabs -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="paymentCategory">
                <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link navLink active" id="pillsOneTab" data-bs-toggle="pill"
                            data-bs-target="#pillsOne" type="button" role="tab" aria-controls="pillsOneTab"
                            aria-selected="true">
                            <div class="paymentIcon">
                                <img src="<?php echo e(asset('front_assets/images/grabIcon.jpg')); ?>" alt="">
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link navLink" id="pillsTwoTab" data-bs-toggle="pill"
                            data-bs-target="#pillsTwo" type="button" role="tab" aria-controls="pillsTwoTab"
                            aria-selected="false">
                            <div class="paymentIcon">
                                <img src="<?php echo e(asset('front_assets/images/touchIcon.jpg')); ?>" alt="">
                            </div>
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link navLink" id="pillsThreeTab" data-bs-toggle="pill"
                            data-bs-target="#pillsThree" type="button" role="tab" aria-controls="pillsThreeTab"
                            aria-selected="true">
                            <div class="paymentIcon">
                                <img src="<?php echo e(asset('front_assets/images/fpxIcon.jpg')); ?>" alt="">
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link navLink" id="pillsFourTab" data-bs-toggle="pill"
                            data-bs-target="#pillsFour" type="button" role="tab" aria-controls="pillsFourTab"
                            aria-selected="false">
                            <div class="paymentIcon">
                                <img src="<?php echo e(asset('front_assets/images/cashIcon.jpg')); ?>" alt="">
                            </div>
                        </button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade active show" id="pillsOne" role="tabpanel" aria-labelledby="pillsOneTab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cashDetail">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <button class="confirmBtn mt-4">Confirm Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pillsTwo" role="tabpanel" aria-labelledby="pillsTwoTab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cashDetail">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <button class="confirmBtn mt-4">Confirm Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pillsThree" role="tabpanel" aria-labelledby="pillsThreeTab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="debitForm">
                                    <label>Card Number</label>
                                    <input type="text" class="inputName" placeholder="Card Number">
                                    <label>Name On Card</label>
                                    <input type="text" class="inputEmail" placeholder="Name On Card">
                                    <label>Expiration Date</label>
                                    <input type="date" class="inputEmail" placeholder="MM/YY">
                                    <label>CVV</label>
                                    <input type="text" class="inputEmail" placeholder="CVV">
                                    <div class="form-check formCheck">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <label class="form-check-label saveCard">
                                            Save Card
                                        </label>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <button class="confirmBtn mt-4">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pillsFour" role="tabpanel" aria-labelledby="pillsFourTab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cashDetail">
                                    <p>You can pay in cash to our courier when you receive the goods at your doorstep.
                                    </p>
                                    <a href="<?php echo e(route('cash_on_delivery')); ?>">
                                        <button class="confirmBtn mt-4">Confirm Order</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cartShopping">
                <div class="cartDetail">
                    <div class="sideCartHeading">
                        <h3>Order Summary</h3>
                    </div>
                    <div class="cashDetail">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>


                    <div class="sideCartProductHeading d-flex justify-content-between">
                        <div class="sideCartName">
                            <h5>Total Amount</h5>
                        </div>
                        <div class="sideCartName">
                            <!--for tempory close-->
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Payment Tabs -->





<script
    src="https://www.paypal.com/sdk/js?client-id=AWtg3NxDT9ABDC2Hb_XU3NcVuxMiGybS4fBqSuJhRDmJrAD5-1qT2QP1MQ3PdhOKT00vLZRoUPi9lnYz&components=buttons&vault=true"
    data-sdk-integration-source="button-factory"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<input type="hidden" name="product_id" value="1">


<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: (data, actions) => {
                const createOrderPayload = {
                    purchase_units: [{
                        amount: {
                            value: <?php echo e($total); ?>

                        }


                    }]
                };

                return actions.order.create(createOrderPayload);
            },

            onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                    const payerName = details.payer.name.given_name;

                    $.ajax({
                        method: "GET",
                        url: "<?php echo e(route('billing')); ?>",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        //   data: {data: details},
                        data: {
                            paypal_response: details,
                        },
                        beforeSend: function() {
                            $(".loader-bg").removeClass('loader-active');
                        },
                        success: function(data) {
                            // $(".loader-bg").addClass('loader-active');
                            console.log(data.status);
                            if (data.status == 200) {
                                $(".loader-bg").addClass('loader-active');
                                toastr.success(
                                    "Transaction Completed Thank you we have received your order"
                                    )
                                console.log(data);
                                setTimeout(function() {
                                    window.location.href = "<?php echo e(route('home')); ?>";
                                }, 1500);
                            };
                        }
                    });
                    // console.log('Transaction completed');
                };

                return actions.order.capture().then(captureOrderHandler);

                // success: function(data)
                // {
                // alert(data);
                // }

            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>




<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe(
        'pk_test_51LGnnGEzIQiMqj2YasCnBdu2mFCKgz8Xr2rtPdOUQoDtv0iNLu4SqMOFUVWrM9xyfV1qjPHTe7lCW2YOkq99KQ5900MQYeIBfc'
        );
    const btn = document.getElementById('checkout-button')
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        stripe.redirectToCheckout({
            sessionId: "<?php echo $session->id; ?>"
        })
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/payment-checkout.blade.php ENDPATH**/ ?>