<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{!! $subject !!}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center m-1">
        <p class="lead">{!! $content !!}<br><br>
            Please click on the button below to relpy this message<br>

            <a href="{{$reply_link}}" class="btn btn-primary" target="_blank">Click here to reply</a>
        </p>

        <p>
            Thanks<br>
            BlueRentals team
        </p>
    </div>
</body>
</html>
