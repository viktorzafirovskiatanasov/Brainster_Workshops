<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex.1 - Create</title>
</head>
<body>
    <form action="{{route('show')}}" method="POST">
        @csrf
        <label for="title">Title</label>
        <br>
        <input type="text" name="title" id="title">
        <br><br>
        <label for="description">Description</label>
        <br>
        <input type="text" name="description" id="description">
        <br><br>
        <label for="photo">Photo</label>
        <br>
        <input type="text" name="photo" id="photo">
        <br><br>
        <label for="post">Post</label>
        <br>
        <textarea type="text" name="post" id="post"></textarea>
        <br><br>
        <label for="author">Author</label>
        <br>
        <input type="text" name="author" id="author">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>