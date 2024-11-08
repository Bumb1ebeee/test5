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
<a href="/register">рег</a>
@if (\Illuminate\Support\Facades\Auth::check())
<form action="{{route('storeMessage')}}" method="post">
    @csrf
    <label for="text">Введите текст сообщения</label>
    <input type="text" name="text" required>
    <button>Отправить сообщение</button>
</form>
@endif

<table>
    <tr>
        <th>id</th>
        <th>user_name</th>
        <th>text</th>
        <th>time</th>
        <th>button</th>
    </tr>
@foreach($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>
                <form action="{{route('profile')}}" method="post">
                    @csrf
                    <input type="text" value="{{$message->user->id}}" name="user_id" hidden>
                    <button>{{$message->user->name}}</button>
                </form>

            </td>
            <td>{{$message->text}}</td>
            <td>{{$message->created_at}}</td>
            <td>
                <form action="{{route('insult')}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$message->id}}" hidden>
                    <button>оскорбительно</button>
                </form>
            </td>
        </tr>
@endforeach
</table>
</body>
</html>
