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
        <div class="title"><br>
            403! You do not have sufficient permission to access this route.<br>
            <small><a href="{{ url('/') }}">Go home</a></small>
        </div>
    </div>
</div>
</body>
</html>
