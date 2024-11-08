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
<a href="/">Главная</a>
<table>
    <tr>
        <th>id</th>
        <th>user_name</th>
        <th>text</th>
        <th>time</th>
        <th>button</th>
        <th>button</th>
    </tr>
    @foreach($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->user->name}}</td>
            <td>{{$message->text}}</td>
            <td>{{$message->created_at}}</td>
            <td>
                <form action="{{route('notInsult')}}" method="post">
                    @csrf
                    <input type="text" value="{{$message->id}}" name="id" hidden>
                    <button>не оскорбительно</button>
                </form>
            </td>

        </tr>
    @endforeach
</table>
</body>
</html>
