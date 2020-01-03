<!DOCTYPE html>
<!--//"StAuth10065: I Andrew Panko, 000394436 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else."-->
<html>
<head>
    <title>Verification for Brampton's Ukraine Account</title>
</head>

<body>
<h2>Welcome to Brampton's Ukraine! {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
</body>

</html>
