<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::query()->with([
            'actors',
           'directors',
           'genres',
           'rating',
           'type',
           'images'
        ])->get();

        // dd($movies);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $ratings = Rating::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();
        return view('movies.create', compact('types', 'ratings', 'genres', 'actors', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd();
        $movie = new Movie();

        $movie->title = $request->title;
        $movie->start_date = $request->start_date;
        $movie->end_date = $request->end_date;
        $movie->length = $request->length;
        $movie->year = $request->year;
        $movie->description = $request->description;
        $movie->rating_id = $request->rating_id;
        $movie->type_id = $request->type_id;

        $movie->save();

        $movie->actors()->attach($request->actors);
        $movie->genres()->attach($request->genres);
        $movie->directors()->attach($request->directors);

        dd('Movie saved!!');

    }
}
