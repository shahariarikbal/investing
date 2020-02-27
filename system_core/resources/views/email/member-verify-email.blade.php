<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Hello raq</h2><br>
        <p>Welcome to Our Community. This is a Membership Verification email. Please Click below link</p>
        <a href="{{ url('verify', $token) }}">
            {{ $token }}
        </a>
    </body>
</html>
