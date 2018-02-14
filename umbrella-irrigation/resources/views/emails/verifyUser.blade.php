<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome Email</title>
    </head>
    <body>
        <h2>Welcome to Umbrella Irrigation, {{$user->name}}</h2>
        Your registered email is {{$user->email}}.
        Please click on the link below in order to verify.
        <a href="{{url('user/verify',$user->verifyUser->token)}}">Verify Email</a>
    </body>
</html>
