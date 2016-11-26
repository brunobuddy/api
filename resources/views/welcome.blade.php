<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
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
            font-size: 96px;
            margin-top: 300px;
        }

        .btn {
            background: #d93434;
            background-image: -webkit-linear-gradient(top, #d93434, #b82b2b);
            background-image: -moz-linear-gradient(top, #d93434, #b82b2b);
            background-image: -ms-linear-gradient(top, #d93434, #b82b2b);
            background-image: -o-linear-gradient(top, #d93434, #b82b2b);
            background-image: linear-gradient(to bottom, #d93434, #b82b2b);
            -webkit-border-radius: 28;
            -moz-border-radius: 28;
            border-radius: 28px;
            font-family: Arial;
            color: #ffffff;
            font-size: 60px;
            padding: 40px;
            text-decoration: none;
        }
        .btn:hover {
            background: #f51869;
            background-image: -webkit-linear-gradient(top, #f51869, #f00000);
            background-image: -moz-linear-gradient(top, #f51869, #f00000);
            background-image: -ms-linear-gradient(top, #f51869, #f00000);
            background-image: -o-linear-gradient(top, #f51869, #f00000);
            background-image: linear-gradient(to bottom, #f51869, #f00000);
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <form method="post" action="{{ url('delay-flight') }}">
            <div class="title">
                <button type="submit" class="btn">Delay flight</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
