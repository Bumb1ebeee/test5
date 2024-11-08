<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/logout">Выйти</a>
<a href="/">Главная</a>
<table>
    <tr>
        <th>id</th>
        <th>text</th>
        <th>time</th>
    </tr>
@foreach($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->text}}</td>
            <td>{{$message->created_at}}</td>
        </tr>
@endforeach
</body>
</html>
