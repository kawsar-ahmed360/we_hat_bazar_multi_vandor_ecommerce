<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vandor Apporve Mail</title>
</head>
<body>


<h3 style="color:green">!!Congratulations Your information successfully reviewed && Approved </h3>

<p>Hi,<strong>{{ @$data['fname'] }}</strong></p>
<p>Mail, <strong>{{ @$data['Email'] }}</strong></p>
<p>Shop Id: <strong>{{ @$data['shopId'] }}.</strong></p>

<p>Login Url: <strong><a href="http://127.0.0.1:8000/login/vandor">Click Url</a></strong> </p>


</body>
</html>