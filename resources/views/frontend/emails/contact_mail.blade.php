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
                <h1 style=" padding-top: 40px;

    font-family: system-ui;

             color: #fff;font-weight: 700; text-transform: capitalize;
    font-size: 40px;
">
                    Contact Us</h1>
            </th>
        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 22px;
              color: #fff;
              margin: 6px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;"> Full Name :</span>
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
              font-size: 22px;
              color: #fff;
              margin: 6px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;"> Email :</span>
                    <span for="" style="width: 64%;font-weight: 300;"><a href="" style="color: #fff; text-decoration: none;">{{$data['email']}}</a></span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 22px;
              color: #fff;
              margin: 6px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;">Contact No :</span>
                    <span for="" style="width: 64%;font-weight: 300;">{{$data['contact']}}</span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 80%;
              font-family: system-ui;
              font-size: 22px;
              color: #fff;
              margin: 6px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 34%;text-align: right;">Message :</span>
                    <span for="" style="width: 64%;font-weight: 300; font-size: 17px;">
                       {{$data['message']}}</span>
                </p>
            </th>


        </tr>



        <tr>
            <th>
                <p style=" width: 70%; margin: auto; padding-bottom: 140px;

    font-family: system-ui;

             color: #fff;font-weight: 200;
    font-size: 17px;
"> </p>
            </th>
        </tr>

    </table>

</body>

</html>
