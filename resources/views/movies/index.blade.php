
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<div class="container">
    <div class="row">
        <h1>Welcome</h1>
        <a href="{{route('movies.create')}}">Add a new movie</a>
        <table class="table mx-auto">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Movie</th>
                <th scope="col">Date start</th>
                <th scope="col">Date end</th>
                <th scope="col">Length</th>
                <th scope="col">Year</th>
                <th scope="col">Description</th>
                <th scope="col">Rated</th>
                <th scope="col">Type</th>
                <th scope="col">Actors</th>
                <th scope="col">Directors</th>
                <th scope="col">Genres</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <th scope="row"></th>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->start_date}}</td>
                    <td>{{$movie->end_date}}</td>
                    <td>{{$movie->length}}</td>
                    <td>{{$movie->year}}</td>
                    <td>{{$movie->description}}</td>
                    <td>{{$movie->type->name}}</td>
                    <td>{{$movie->rating->name}}</td>
                    <td>
                        @foreach($movie->actors as $actor)
                            <span>{{$actor->name}}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($movie->directors as $director)
                            <span>{{$director->name}}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($movie->genres as $genre)
                            <span>{{$genre->name}}</span><br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
