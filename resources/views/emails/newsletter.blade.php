<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscription</title>
</head>
<body>
    <p>Dear {{ $name }},</p>
    
    <p>Thank you for subscribing to our newsletter. Stay tuned for exciting updates!</p>

    <p>Best Regards,<br>{{config('app.name')}}</p>
</body>
</html>