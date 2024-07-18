<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Eternity Page Created</title>
</head>
<body>
    <p>Dear {{ $name }},</p>
    
    <p>New post has been created check this <a href="{{$url}}">{{$url}}</a></p>
    <p>You are receiving this email because you subscribed to our newsletter. If you wish to unsubscribe, click the link below:
    </p>
    <p>To unsubscribe, click <a href="{{$unsubscribe_token}}">here</a>.</p>

    <p>Best Regards,<br>{{config('app.name')}}</p>
</body>
</html>