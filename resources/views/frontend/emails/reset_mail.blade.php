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
        style="height:99vh;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size:100% 100%; background-image: url({{$message->embed(asset('front_assets/images/lotti-email-background.png'))}});">
        <tr>
            <th style="text-align: left;">
                <img src="{{$message->embed(asset('front_assets/images/logo.png'))}}" alt=""
                    style="width: 18%;margin-top: 20px;object-fit: cover; margin-left: 2rem;">
            </th>
        </tr>

        <tr>

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('front_assets/images/forget-img.png'))}}" alt=""
                    style="width:25%;border-radius: 20%;height: 100%;object-fit: cover;"></th>
        </tr>
        <tr>
            <th>
                <h1 style="

    font-family: system-ui;

             color: #fff;font-weight: 700; text-transform: capitalize;
    font-size: 46px;
">
                    Forgot Your Password?</h1>
            </th>
        </tr>

        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 50%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 36%;text-align: left;"> Full Name :</span>
                    <span for="" style="width: 60%;font-weight: 300;">John
                        Mickel</span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 0px;">
                <p style="
              width: 50%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 36%;text-align: left;"> Email :</span>
                    <span for="" style="width: 60%;font-weight: 300;">JohnMickel123@gmail.com</span>
                </p>
            </th>


        </tr>
        <tr>
            <th style="padding-bottom: 100px;">
                <p style="
              width: 50%;
              font-family: system-ui;
              font-size: 24px;
              color: #fff;
              margin: 10px auto;
              text-align: left;
              display: flex;
              justify-content: space-between;
              ">
                    <span for="" style="width: 36%;text-align: left;">OTP :</span>
                    <span for="" style="width: 60%;font-weight: 300;">0 2 9 7 5 0</span>
                </p>
            </th>


        </tr>
        <!-- <tr>
            <th style="padding-top: 40px;padding-bottom: 40px;">
                <a href=""><button style="background-color:#EC0169;text-decoration: none;color: #fff;padding:15px 15px ;border-top-width: 0px;


    padding: 10px 35px 10px 35px;
    margin-left: 10px;
    font-family: sans-serif;
    font-weight: 900;
    font-size: 13px;
    text-decoration: none;
    border: none;
    ">RESET PASSWORD</button></a>
            </th>
        </tr>
        <tr>
            <th>
                <img src="./assets/images/logo.svg" alt=""
                    style="width: 10%;margin-top: 20px;height: 100%;object-fit: cover;margin-bottom: 10px;">
            </th>
        </tr> -->

    </table>

</body>

</html>
