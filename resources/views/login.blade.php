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
<a href="{{route('registerPage')}}">Зарегистрироваться</a>
<form action="{{route('login')}}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" name="email">
    @error('email')
    <div>{{$message}}</div>
    @enderror

    <label for="password">Пароль</label>
    <input type="password" name="password">
    @error('password')
    <div>{{$message}}</div>
    @enderror

    <button>Войти</button>
</form>

@if(session('error'))
    <div>{{session('error')}}</div>
@endif
</body>
</html>
