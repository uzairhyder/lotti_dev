<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>

    <style>
        @font-face {
            font-family: Poppins-SemiBold;
            src: url(./assets/font/Poppins-SemiBold.ttf);
        }

        @font-face {
            font-family: Cinzel-Medium;
            src: url(./assets/font/Cinzel-Medium.ttf);
        }
    </style>

</head>

<body>

    <table
        style="height:100%;width:80%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: 100% 100%; background-image: url({{ $message->embed(asset('front_assets/images/lotti-email-background.png')) }});">
        <tr>
            <th style="text-align: left;">
                <img src="{{ $message->embed(asset('front_assets/images/logo.png')) }}" alt=""
                    style="width: 18%;margin-top: 20px;object-fit: cover; margin-left: 2rem;">
            </th>
        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p
                    style="
              width: 80%;
              font-family: system-ui;
              font-size: 28px;
              color: #fff;
              margin: 0px auto;
              justify-content: center;
              ">
                    Invoice No :
                    <span for="" style="margin-left: 2rem; text-align: center;">{{ $order['id'] }}</span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 20px;">
                <p
                    style="
              width: 40%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: baseline;
              justify-content: space-between;
              ">
                    <span for="" style="width: 50%;text-align: center;"> Date :</span>
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;">{{ date('Y-m-d', strtotime($order['created_at'])) }}</span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px; border-bottom: 2px solid #ffffff57;">
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px; display: flex; justify-content: space-between;">
                <p
                    style="
              width: 40%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: baseline;
              justify-content: space-between;
              ">
                    <span for="" style="width: 50%;text-align: center;">Bill To :</span>
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;">{{ $billing_address->name ?? '' }}
                    </span>
                </p>
                <p
                    style="
                width: 40%;
                font-family: system-ui;
                font-size: 24px;
                color: #fff;
                margin: auto;
                text-align: left;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                ">
                    <span for="" style="width: 50%;text-align: center;"> Ship To :</span>
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;">{{ $shipping_address->name ?? '' }}
                    </span>
                </p>
            </th>
        </tr>
        <tr style="
        width: 100%;
    ">
            <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
                <p
                    style="
                  width: 48%;
                  font-family: system-ui;
                  font-size: 15px;
                  font-weight: 200;
margin:0px;
                  color: #fff;
                  text-align: left;
                  display: flex;
                  align-items: baseline;
                  ">
                    <span for="" style="width: 40%;text-align: left;">Contact Name :</span>
                    <span for="" style="width: 60%;text-align: left;">{{ $billing_address->name ?? '' }}</span>
                </p>
                <p
                    style="
                    width: 48%;
                    font-family: system-ui;
                    font-size: 15px;
                    font-weight: 200;
margin:0px;
                    color: #fff;
                    /* margin: auto; */
                    text-align: left;
                    display: flex;
                    align-items: baseline;
                    ">
                    <span for="" style="width: 40%;text-align: left;">Contact Name :</span>
                    <span for="" style="width: 60%;text-align: left;">{{ $shipping_address->name ?? '' }}</span>
                </p>
            </th>
        </tr>
        {{-- <tr style="
    width: 100%;
">
            <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
                <p style="
              width: 48%;
              font-family: system-ui;
              font-size: 15px;
              font-weight: 200;
margin:0px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: baseline;
              ">
                    <span for="" style="width: 40%;text-align: left;">Client Company Name :</span>
                    <span for="" style="width: 60%;text-align: left;">82 Solutions</span>
                </p>
                <p style="
                width: 48%;
                font-family: system-ui;
                font-size: 15px;
                font-weight: 200;
margin:0px;
                color: #fff;
                /* margin: auto; */
                text-align: left;
                display: flex;
                align-items: baseline;
                ">
                    <span for="" style="width: 40%;text-align: left;">Client Company Name :</span>
                    <span for="" style="width: 60%;text-align: left;">82 Solutions</span>
                </p>
            </th>
        </tr>
        <tr style="
        width: 100%;
    "> --}}
        <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
            <p
                style="
                  width: 48%;
                  font-family: system-ui;
                  font-size: 15px;
                  font-weight: 200;
margin:0px;
                  color: #fff;
                  text-align: left;
                  display: flex;
                  align-items: baseline;
                  ">
                <span for="" style="width: 40%;text-align: left;">Address :</span>
                <span for="" style="width: 60%;text-align: left;">{{ $billing_address->get_state->state ?? '' }}
                    {{ $billing_address->get_city->city ?? '' }}</span>
            </p>
            <p
                style="
                width: 48%;
                font-family: system-ui;
                font-size: 15px;
                font-weight: 200;
margin:0px;
                color: #fff;
                /* margin: auto; */
                text-align: left;
                display: flex;
                align-items: baseline;
                ">
                <span for="" style="width: 40%;text-align: left;">Address :</span>
                <span for="" style="width: 60%;text-align: left;">
                    {{ $shipping_address->get_state->state ?? '' }}
                    {{ $shipping_address->get_city->city ?? '' }}</span>
            </p>
        </th>
        </tr>
        <tr style="
    width: 100%;
">
            <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
                <p
                    style="
              width: 48%;
              font-family: system-ui;
              font-size: 15px;
              font-weight: 200;
margin:0px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: baseline;
              ">
                    <span for="" style="width: 40%;text-align: left;">Phone :</span>
                    <span for=""
                        style="width: 60%;text-align: left;">{{ $billing_address->contact ?? '' }}</span>
                </p>
                <p
                    style="
                width: 48%;
                font-family: system-ui;
                font-size: 15px;
                font-weight: 200;
margin:0px;
                color: #fff;
                /* margin: auto; */
                text-align: left;
                display: flex;
                align-items: baseline;
                ">
                    <span for="" style="width: 40%;text-align: left;">Phone :</span>
                    <span for=""
                        style="width: 60%;text-align: left;">{{ $shipping_address->contact ?? '' }}</span>
                </p>
            </th>
        </tr>
        <tr style="
        width: 100%;
    ">
            <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
                <p
                    style="
                  width: 48%;
                  font-family: system-ui;
                  font-size: 15px;
                  font-weight: 200;
margin:0px;
                  color: #fff;
                  text-align: left;
                  display: flex;
                  align-items: baseline;
                  ">
                    <span for="" style="width: 40%;text-align: left;">Email :</span>
                    <span for="" style="width: 60%;text-align: left;"><a href=""
                            style="color: #fff; text-decoration: none;">{{ $order->user->email ?? '' }}</a></span>
                </p>
                <p
                    style="
                    width: 48%;
                    font-family: system-ui;
                    font-size: 15px;
                    font-weight: 200;
margin:0px;
                    color: #fff;
                    /* margin: auto; */
                    text-align: left;
                    display: flex;
                    align-items: baseline;
                    ">
                    <span for="" style="width: 40%;text-align: left;">Email :</span>
                    <span for="" style="width: 60%;text-align: left;"><a href=""
                            style="color: #fff; text-decoration: none;"> {{ $order->user->email ?? '' }}</a></span>
                </p>
            </th>
        </tr>
        {{-- <tr style="
    width: 100%;
">
            <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 90%;margin: auto;">
                <p style="
              width: 48%;
              font-family: system-ui;
              font-size: 15px;
              font-weight: 200;
margin:0px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: baseline;
              ">
                    <span for="" style="width: 40%;text-align: left;">Client Company Name :</span>
                    <span for="" style="width: 60%;text-align: left;">82 Solutions</span>
                </p>
                <p style="
                width: 48%;
                font-family: system-ui;
                font-size: 15px;
                font-weight: 200;
margin:0px;
                color: #fff;
                /* margin: auto; */
                text-align: left;
                display: flex;
                align-items: baseline;
                ">
                    <span for="" style="width: 40%;text-align: left;">Client Company Name :</span>
                    <span for="" style="width: 60%;text-align: left;">82 Solutions</span>
                </p>
            </th>
        </tr> --}}




        <tr>
            <th style="padding-top: 40px;">
                <p style="
                width: 90%;border: 1px solid #808080;
                margin: auto; ">
                    <span
                        style="    display: flex;
                    justify-content: space-between; background-color: #cccccc;">
                        {{-- <label style="width: 8%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">S.no</label> --}}
                        {{-- <label style="width: 25%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">Size</label> --}}
                        <label
                            style="width: 25%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">Products</label>
                        <label
                            style="width: 25%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">QTY</label>
                        <label
                            style="width: 25%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">Unit
                            Price</label>
                        <label
                            style="width: 25%; border: 1px solid #808080; padding: 4px 0px ; color: #fff; font-weight: 600; font-size: 16px;   font-family: system-ui;">Total</label>
                    </span>
                    @foreach ($order->purchased_items as $val)
                        <span style="display: flex;
                    justify-content: space-between;">
                            {{-- <label style="width: 8%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">01</label> --}}
                            {{-- <label style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;"></label> --}}

                            <label
                                style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">{{ $val->product->product_name ?? '' }},{{ $val->variations->attribute ?? '' }}</label>

                            <label
                                style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">{{ $val->quantity ?? '' }}</label>

                            @if (@$val->product->product_type == 1)
                                {{-- @if ($val->product->discount_status == null) --}}
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    {{ number_format($val->product->price, 2) ?? '' }} </label>
                                {{-- @endif --}}
                                {{-- @if ($val->product->discount_status != null)
                                    <label
                                        style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                        {{ $val->product->discounted_price ?? '' }} </label>
                                @endif --}}
                            @else
                                {{-- @if ($val->variations->discount_status == null) --}}
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    {{ number_format($val->variations->regular_price ?? 0 ?? 0, 2)}} </label>
                                {{-- @endif --}}
                                {{-- @if ($val->variations->discount_status != null)
                                    <label
                                        style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                        {{ $val->variations->sale_price ?? ''}} </label>
                                @endif --}}
                            @endif

                            @if (@$val->product->product_type == 1)
                                {{-- @if ($val->product->discount_status == null) --}}
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    {{ number_format($val->product->price * $val->quantity, 2) }}
                                </label>
                                {{-- @endif --}}
                                {{-- @if ($val->product->discount_status != null)
                                    <label
                                        style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                        {{ $val->product->discounted_price * $val->quantity }}
                                    </label>
                                @endif --}}
                            @else
                                {{-- @if ($val->variations->discount_status == null) --}}
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    {{ number_format($val->variations->regular_price ?? 0 * $val->quantity, 2) }}
                                </label>
                                {{-- @endif --}}
                                {{-- @if ($val->variations->discount_status != null)
                                    <label
                                        style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                        {{ $val->variations->sale_price * $val->quantity }}
                                    </label>
                                @endif --}}
                            @endif
                        </span>
                    @endforeach
                </p>
            </th>
        </tr>






        <tr>
            <th
                style="
            padding-top: 40px;
            display: flex;
            justify-content: end;
            width: 94%;
        ">
                <p
                    style="
              width: 30%;
              margin: 0;
              margin-left: auto !important;
              font-family: system-ui;
              font-size: 16px;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: end;
              justify-content: space-between;
              ">



                    @php
                        $final = 0;
                    @endphp
                    @foreach ($order->purchased_items as $val)
                        @if (@$val->product->product_type == 1)
                            @php
                                $subtotal = 0;
                            @endphp
                            <span for="" style="width: 50%;text-align: left;"> Sub Total : </span>
                            {{-- @if ($val->product->discount_status == null) --}}
                            {{-- <span for=""
                                style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;"> --}}
                            @php $subtotal =   $val->product->price * $val->quantity  @endphp
                            {{-- @endif --}}
                            {{-- @if ($val->product->discount_status != null) --}}
                            {{-- <span for=""
                                style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;"> --}}
                            {{-- @php  $subtotal  = $val->product->discounted_price * $val->quantity @endphp --}}
                            {{-- @endif --}}

                            @php
                                $final += $subtotal;
                            @endphp
                        @else
                            @php
                                $subtotal = 0;
                            @endphp
                            {{-- @if ($val->variations->discount_status == null) --}}
                            {{-- <span for=""
                                style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;"> --}}
                            @php $subtotal  = $val->variations->regular_price ?? 0 * $val->quantity  @endphp
                            {{-- @endif --}}
                            {{-- @if ($val->variations->discount_status != null) --}}
                            {{-- <span for=""
                                style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;"> --}}
                            {{-- @php $subtotal =  $val->variations->sale_price * $val->quantity @endphp --}}
                            {{-- @endif --}}
                            @php
                                $final += $subtotal;
                            @endphp
                        @endif
                    @endforeach

                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;">
                        {{ number_format($final, 2) ?? '' }} </span>


                </p>
            </th>


        </tr>



        <tr>
            <th
                style="
            padding-top: 4px;
            display: flex;
            justify-content: end;
            width: 94%;
        ">
                <p
                    style="
              width: 30%;
              font-family: system-ui;
              font-size: 16px;
              margin-left: auto !important;
              color: #fff;
              margin: 0;
              text-align: left;
              display: flex;
              align-items: end;
              justify-content: space-between;
              ">
                    @php
                        $total_discount = 0;
                    @endphp
           
                    <span for="" style="width: 50%;text-align: left;">Discount :</span>
                    @foreach ($order->purchased_items as $val)
                        @php
                            $sub_discount = 0;
                        @endphp

                        @if (@$val->product->product_type == 1)
                            @if ($val->product->discount_status == 1)
                                @php $sub_discount = $val->product->discount @endphp

                                @php
                                    $total_discount += $sub_discount;
                                @endphp
                            @endif
                        @else
                            @php
                                $sub_discount = 0;
                            @endphp
                            @if ($val->variations->discount_status == 1)
                                @php $sub_discount =    $val->variations->discount @endphp

                                @php
                                    $total_discount += $sub_discount;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;">
                        {{ number_format($total_discount, 2) ?? '-' }}</span>



                </p>
            </th>


        </tr>


        <tr>
            <th
                style="
            padding-top: 4px;
            display: flex;
            justify-content: end;
            width: 94%;
        ">
                <p
                    style="
              width: 30%;
              margin-left: auto !important;
              font-family: system-ui;
              font-size: 16px;
              margin: 0;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: end;
              justify-content: space-between;
              ">
                    <span for="" style="width: 50%;text-align: left;">Balance Due :</span>
                    @if (!empty($total_discount))
                        <span for=""
                            style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300; color: #999999; background-color: #fff; ">{{ $final - $total_discount }}
                        </span>
                    @else
                        <span for=""
                            style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300; color: #999999; background-color: #fff; ">{{ number_format($final, 2) }}
                        </span>
                    @endif
                </p>
            </th>


        </tr>



        <tr>
            <th>
                <p
                    style=" width: 70%; margin: auto; padding-bottom: 60px;

    font-family: system-ui;

             color: #fff;font-weight: 200;
    font-size: 17px;
">
                </p>
            </th>
        </tr>

        {{-- <tr>
            <th
                style="
            padding-top: 4px;
            display: flex;
            justify-content: end;
            width: 94%;
        ">
                <p
                    style="
              width: 30%;
              margin-left: auto !important;
              font-family: system-ui;
              font-size: 16px;
              margin: 0;
              color: #fff;
              text-align: left;
              display: flex;
              align-items: end;
              justify-content: space-between;
              ">
                    <span for="" style="width: 50%;text-align: left;">Total Tax :</span>
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;">0.00</span>
                </p>
            </th>


        </tr> --}}
    </table>

</body>

</html>
