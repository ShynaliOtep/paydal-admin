<?php
/**
 * @var array|\App\Models\Violation[] $violations
 */
//dd($violations)
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="violations">
        @foreach($violations as $violation)
            <a href="/police/violation/{{$violation->id}}">
                <div class="violation">
                    <div class="violation-texts">
                        <p>Обращение: {{$violation->id}}</p>
                        <p>Город: {{$violation->city->title}}</p>
                        <p>От: {{$violation->volunteer->user->fio}}</p>
                    </div>
                    <div class="violation-right">
                        <img src="./images/v.png" alt="">
                    </div>
                    <div style="clear: both"></div>
                </div>
            </a>
        @endforeach
    </div>
</div>
</body>
</html>

