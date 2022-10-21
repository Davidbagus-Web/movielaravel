<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::get();
        return view('dashboard.movie.index', ['movieList' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::get();
        return view('dashboard.movie.create', ['movieList' => $movies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'image' => 'required',
            'rating_star' => 'required',
            'description' => 'required'
        ]);

        $movie = Movie::create($request->all());
        return redirect('/dashboard/movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Films  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('dashboard.movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Films  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Films  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Films  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {

    }

}