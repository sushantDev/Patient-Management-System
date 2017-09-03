<!DOCTYPE html>
<html>
<head>
    <title>404</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #fff;
            background: #000;
            display: table;
            font-weight: 100;
            font-family: 'Lato', serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .title small {
            font-size: 32px;
        }

        a {
            color: #0c7cd5;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            <img src="http://68.media.tumblr.com/e7cfe0074ae5fd4bd2f47735e9f53206/tumblr_mkwpqrtiJN1rsdpaso1_500.gif"><br>
            404! Page not found<br>
            <small><a href="{{ url('/') }}">Go home</a></small>
        </div>
    </div>
</div>
</body>
</html>