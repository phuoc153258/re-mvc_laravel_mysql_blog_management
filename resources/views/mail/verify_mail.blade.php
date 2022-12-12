<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>

<body>
    <p>Hi {{ $user->fullname }}</p>
    <p>Your Account is not verify</p>
    <p>Click this button to verify your email</p>
    <p>{{ $token }}</p>
    <a href="http://localhost:8000/users/{{ $user->id }}/mails/token/{{ $token }}">Verify Email</a>
</body>

</html>
