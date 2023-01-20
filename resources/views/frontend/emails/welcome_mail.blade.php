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
        style="height:100%;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: 100% 100%; background-image: url({{$message->embed(asset('front_assets/images/lotti-email-background.png'))}})">
        <tr>
            <th style="text-align: left;">
                <img src="{{$message->embed(asset('front_assets/images/logo.png'))}}" alt=""
                    style="width: 16%;margin-top: 20px;object-fit: cover; margin-left: 2rem;">
            </th>
        </tr>
        <tr>

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('front_assets/images/welcome-img.png'))}}" alt=""
                    style="width:28%;border-radius: 20%;height: 100%;object-fit: contain;"></th>
        </tr>
        <tr>
            <th>
                <h1 style="

    font-family: system-ui;

             color: #fff;font-weight: 700; text-transform: capitalize;
    font-size: 34px; margin-bottom: 0px;
">
Welcome To Lotti ! <br>
The Best Electronics Shop</h1>
            </th>
        </tr>
        {{-- <tr>
            <th>
                <p style=" width: 84%; margin: auto; padding-bottom: 100px;

    font-family: system-ui;

             color: #fff;font-weight: 200;
    font-size: 17px;
">
Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi </p>
            </th>
        </tr> --}}

    </table>

</body>

</html>
