<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>

<body>
    <h3>Hi {{ $user->fullname }}</h3>
    <p>This is your OTP: {{ $otp }}</p>
    <p>Expired time OTP: {{ $expired_time }}</p>
</body>

</html>
