<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex.1 - Create</title>
    <style>
        .border_red{
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <form action="{{route('login.valdiate')}}" method="POST">
        @csrf
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" id="username" class="@error('username') border_red @enderror">
        @error('username')
           <small>{{ $message }}</small>
        @enderror
        <br><br>
        <label for="password">Password</label>
        <br>
        <input type="text" name="password" id="password">
        @error('password')
           <small>{{ $message }}</small>
        @enderror
        <br><br>
        <label for="date">Date</label>
        <br>
        <input type="date" name="date" id="date">
        <br><br>
        <label for="email">Email</label>
        <br>
        <input type="text" name="email" id="email">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>