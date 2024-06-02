<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Add a new movie</h1>
                <a href="{{route('movies.index')}}">back</a>
            
                <form action="{{route('movies.store')}}" method="POST" class="py-5">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start date</label>
                        <input type="date" name="start_date" class="form-control" id="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End date</label>
                        <input type="date" name="end_date" class="form-control" id="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="length" class="form-label">Movie length</label>
                        <input type="number" name="length" class="form-control" id="length">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Movie year</label>
                        <input type="number" name="year" class="form-control" id="year">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description">
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating_id" class="form-control" id="rating">
                            <option selected disabled>Please choose a rating</option>
                            @foreach($ratings as $rating)
                                <option value="{{$rating->id}}">{{$rating->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type_id" class="form-control" id="type">
                            <option selected disabled>Please choose a type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image-1" class="form-label">Image 1</label>
                        {{-- <input type="url" name="images[]" class="form-control" id="image-1"> --}}
                        <input type="text" name="images[]" class="form-control" id="image-1">
                    </div>
                    <div class="mb-3">
                        <label for="image-2" class="form-label">Image 2</label>
                        {{-- <input type="url" name="images[]" class="form-control" id="image-2"> --}}
                        <input type="text" name="images[]" class="form-control" id="image-2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genres</label>
                        <div>
                            @foreach($genres as $genre)
                                <label for="genre_{{$genre->id}}">{{$genre->name}}</label>
                                <input class="form-check-input" name="genres[]" type="checkbox" id="genre_{{$genre->id}}" value="{{$genre->id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Actors</label>
                        <div>
                            @foreach($actors as $actor)
                                <label for="actor_{{$actor->id}}">{{$actor->name . ' ' . $actor->surname}}</label>
                                <input class="form-check-input" name="actors[]" type="checkbox" id="actor_{{$actor->id}}" value="{{$actor->id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Directors</label>
                        <div>
                            @foreach($directors as $director)
                                <label for="director_{{$director->id}}">{{$director->name . ' ' . $director->surname}}</label>
                                <input class="form-check-input" name="directors[]" type="checkbox" id="director_{{$director->id}}" value="{{$director->id}}">
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
</html>