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
        style="height:100%;width:80%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: 100% 100%; background-image: url(<?php echo e($message->embed(asset('front_assets/images/lotti-email-background.png'))); ?>);">
        <tr>
            <th style="text-align: left;">
                <img src="<?php echo e($message->embed(asset('front_assets/images/logo.png'))); ?>" alt=""
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
                    <span for="" style="margin-left: 2rem; text-align: center;"><?php echo e($order['id']); ?></span>
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
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;"><?php echo e(date('Y-m-d', strtotime($order['created_at']))); ?></span>
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
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;"><?php echo e($billing_address->name ?? ''); ?>

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
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;"><?php echo e($shipping_address->name ?? ''); ?>

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
                    <span for="" style="width: 60%;text-align: left;"><?php echo e($billing_address->name ?? ''); ?></span>
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
                    <span for="" style="width: 60%;text-align: left;"><?php echo e($shipping_address->name ?? ''); ?></span>
                </p>
            </th>
        </tr>
        
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
                <span for="" style="width: 60%;text-align: left;"><?php echo e($billing_address->get_state->state ?? ''); ?>

                    <?php echo e($billing_address->get_city->city ?? ''); ?></span>
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
                    <?php echo e($shipping_address->get_state->state ?? ''); ?>

                    <?php echo e($shipping_address->get_city->city ?? ''); ?></span>
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
                        style="width: 60%;text-align: left;"><?php echo e($billing_address->contact ?? ''); ?></span>
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
                        style="width: 60%;text-align: left;"><?php echo e($shipping_address->contact ?? ''); ?></span>
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
                            style="color: #fff; text-decoration: none;"><?php echo e($order->user->email ?? ''); ?></a></span>
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
                            style="color: #fff; text-decoration: none;"> <?php echo e($order->user->email ?? ''); ?></a></span>
                </p>
            </th>
        </tr>
        




        <tr>
            <th style="padding-top: 40px;">
                <p style="
                width: 90%;border: 1px solid #808080;
                margin: auto; ">
                    <span
                        style="    display: flex;
                    justify-content: space-between; background-color: #cccccc;">
                        
                        
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
                    <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span style="display: flex;
                    justify-content: space-between;">
                            
                            

                            <label
                                style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;"><?php echo e($val->product->product_name ?? ''); ?>,<?php echo e($val->variations->attribute ?? ''); ?></label>

                            <label
                                style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;"><?php echo e($val->quantity ?? ''); ?></label>

                            <?php if($val->product->product_type == 1): ?>
                                
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    <?php echo e(number_format($val->product->price, 2) ?? ''); ?> </label>
                                
                                
                            <?php else: ?>
                                
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    <?php echo e(number_format($val->variations->regular_price ?? 0 ?? 0, 2)); ?> </label>
                                
                                
                            <?php endif; ?>

                            <?php if($val->product->product_type == 1): ?>
                                
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    <?php echo e(number_format($val->product->price * $val->quantity, 2)); ?>

                                </label>
                                
                                
                            <?php else: ?>
                                
                                <label
                                    style="width: 25%; border: 1px solid #808080; padding: 4px 0px ;font-family: system-ui;font-weight: 400; font-size: 14px; color: #fff;">
                                    <?php echo e(number_format($val->variations->regular_price ?? 0 * $val->quantity, 2)); ?>

                                </label>
                                
                                
                            <?php endif; ?>
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



                    <?php
                        $final = 0;
                    ?>
                    <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($val->product->product_type == 1): ?>
                            <?php
                                $subtotal = 0;
                            ?>
                            <span for="" style="width: 50%;text-align: left;"> Sub Total : </span>
                            
                            
                            <?php $subtotal =   $val->product->price * $val->quantity  ?>
                            
                            
                            
                            
                            

                            <?php
                                $final += $subtotal;
                            ?>
                        <?php else: ?>
                            <?php
                                $subtotal = 0;
                            ?>
                            
                            
                            <?php $subtotal  = $val->variations->regular_price ?? 0 * $val->quantity  ?>
                            
                            
                            
                            
                            
                            <?php
                                $final += $subtotal;
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;">
                        <?php echo e(number_format($final, 2) ?? ''); ?> </span>


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
                    <?php
                        $total_discount = 0;
                    ?>
           
                    <span for="" style="width: 50%;text-align: left;">Discount :</span>
                    <?php $__currentLoopData = $order->purchased_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sub_discount = 0;
                        ?>

                        <?php if($val->product->product_type == 1): ?>
                            <?php if($val->product->discount_status == 1): ?>
                                <?php $sub_discount = $val->product->discount ?>

                                <?php
                                    $total_discount += $sub_discount;
                                ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php
                                $sub_discount = 0;
                            ?>
                            <?php if($val->variations->discount_status == 1): ?>
                                <?php $sub_discount =    $val->variations->discount ?>

                                <?php
                                    $total_discount += $sub_discount;
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span for=""
                        style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300;">
                        <?php echo e(number_format($total_discount, 2) ?? '-'); ?></span>



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
                    <?php if(!empty($total_discount)): ?>
                        <span for=""
                            style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300; color: #999999; background-color: #fff; "><?php echo e($final - $total_discount); ?>

                        </span>
                    <?php else: ?>
                        <span for=""
                            style="width: 50%;text-align: center; border-bottom: 1px solid #fff;font-weight: 300; color: #999999; background-color: #fff; "><?php echo e(number_format($final, 2)); ?>

                        </span>
                    <?php endif; ?>
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

        
    </table>

</body>

</html>
<?php /**PATH D:\xampp2\htdocs\lotti\resources\views/frontend/emails/invoice_mail.blade.php ENDPATH**/ ?>