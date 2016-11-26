<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
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
