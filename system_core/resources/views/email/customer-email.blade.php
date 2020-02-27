<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .container{
        height: 960px;
        width: 1024px;
        border: 1px solid #000000;
        margin: 0 auto;
    }
    .header{
        height: 50px;
        width: 100%;
        background-color: darkred;
    }
    .header h2{
        text-align: center;
        color: aliceblue;
    }
    .body{
        font-size: 18px;
        color: #000000;
        margin-left: 50px;
    }
</style>
<body>
<div class="container">
    <div class="header">
        <h2>Investing Partner</h2>
    </div>
    <div class="body">
        <h3>Welcome Email</h3>
        <p>
            Dear {{ $customerEmail['name'] }} <br/> Thank you for conatact us. <br/> Your Phone Number is : {{ $customerEmail['phone'] }} <br/>
            Your email address is : {{ $customerEmail['email'] }}<br/>
            <h1>Thank You</h1>
        </p>
    </div>
</div>
</body>
</html>
