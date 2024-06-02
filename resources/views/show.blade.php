<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex.1 - Show</title>
</head>
<body>
    <ul>
        <li>Title: {{$data['title']}}</li>
        <li>Description: {{$data['description']}}</li>
        <li>Photo: {{$data['photo']}}</li>
        <li>Post: {{$data['post']}}</li>
        <li>Author: {{$data['author']}}</li>
        <li>Date: {{ $date }}</li>
    </ul>
</body>
</html>