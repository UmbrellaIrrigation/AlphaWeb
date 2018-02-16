<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Umbrella Irrigation: Verify Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            body {
                text-align: center;
                font-family: Georgia, Times, "Times New Roman", serif;
            }
            
            #title {
                color: darkblue;
                font-size: 30px;
                font-style: normal;
                font-variant: normal;
                font-weight: 500;
                line-height: 26px;
            }
            u {
                color:DodgerBlue;
            }
            #copyright {
                color:gray;
                font-size: 10px;
                font-style: normal;
                font-variant: normal;
                font-weight: 500;
                line-height: 26px;
            }
        </style>
    </head>
    <body>
        <p id="title">Welcome to Umbrella Irrigation, {{$user->name}}</p>
        <img src="http://1.bp.blogspot.com/-1_CtQLx1P6A/TdWibQ6qAYI/AAAAAAAAAF4/6PA9FdXjYBw/s1600/umbrella.jpg" height="300">
        <div>Your registered email is <u><i class="text-alert">{{$user->email}}</i></u>.</div>
        <div>Please click on the link below in order to verify.</div>
        
        <p><a href="{{url('user/verify',$user->verifyUser->token)}}">Verify Email Address</a></p>
        
        <p>Thank you for choosing Umbrella Irrigation!</p>
        <p id="copyright">&#9400; 2018 UmbrellaIrrigation Inc. All rights reserved.</p>
    </body>
</html>
