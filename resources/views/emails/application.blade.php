<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{!! $msg->subject !!}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <p>
            Message from {!! $msg->message_from !!}
        </p>
        <p>
            {!! $msg->message !!}
        </p>
        <br><br>
        Please click on the button below to relpy this message<br>
        <a href="{{$msg->reply_url}}" class="btn btn-primary" target="_blank">Click here to reply</a>
        <p>
            Thanks<br>
            BlueRentals team
        </p>
    </div>
</body>
</html>