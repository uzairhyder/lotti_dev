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
        style="height:100%;width:70%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: 100% 100%; background-image: url({{$message->embed(asset('front_assets/images/lotti-email-background.png'))}});">
        <tr>
            <th style="text-align: left;">
                <img src="{{$message->embed(asset('front_assets/images/logo.png'))}}" alt=""
                    style="width: 16%;margin-top: 20px;object-fit: cover; margin-left: 2rem;">
            </th>
        </tr>
        <tr>
            <th>
                <h1 style=" padding-top: 20px;

    font-family: system-ui;

             color: #fff;font-weight: 700; text-transform: capitalize;
    font-size: 40px;
">
Order Status</h1>
            </th>
        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;">Name :</span>
                    <span for="" style="width: 64%;font-weight: 300;">{{$data['name']}}
                       </span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;"> Email :</span>
                    <span for="" style="width: 64%;font-weight: 300;"><a href="" style="color: #fff; text-decoration: none;">{{$data['email']}}</a></span>
                </p>
            </th>


        </tr>
        {{-- update wok 19 --}}
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;">Order :</span>
                    @if($order['order_status'] == 1)
                        <span for="" style="width: 64%;font-weight: 300;">Pending</span>
                    @endif
                    @if($order['order_status'] == 2)
                        <span for="" style="width: 64%;font-weight: 300;">Dispatched</span>
                    @endif
                    @if($order['order_status'] == 3)
                        <span for="" style="width: 64%;font-weight: 300;">Delivered</span>
                    @endif
                    @if($order['order_status'] == 4)
                    <span for="" style="width: 64%;font-weight: 300;">Cancelled</span>
                    @endif
                    @if($order['order_status'] == 5)
                    <span for="" style="width: 64%;font-weight: 300;">On Hold</span>
                    @endif
                </p>
            </th>


        </tr>
        {{-- update work 19 --}}
        @if(!empty($comment))

        <tr>
            <th>
                <p style=" width: 80%; margin: auto; padding-bottom: 140px;

    font-family: system-ui;

             color: #fff;font-weight: 200;
    font-size: 17px;
">
                {{$comment}}</p>
            </th>
        </tr>
        @endif

    </table>

</body>

</html>
