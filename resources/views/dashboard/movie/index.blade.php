@extends('dashboard.layouts.main')

<html lang="en">

@section('container')

	<h1>All Movies <a href="/dashboard/movie/create">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i>
        </button></a>
    </h1>
    <p>No Movies</p>

    <div class="row">
    @foreach($movieList as $item)
    <div class="col-md-4">
    <div class="card">
        <img src="{{ $item->image }}" class="card-image-top" style="width: 15rem;">
        <div class="card-body">
                <h5><a href="/dashboard/movie/show/{{ $item->id }} ">{{ $item->title }}</a></h5>
                <div class="text-danger">
                    @for ($i = 1; $i <= $item->rating_star; $i++)
                    <i class='far fa-star'></i>
                    @endfor
                    <br>
	      </div>
            <strong>{{ $item->genre->name }}</strong>
              <p>{{ Str::limit($item->description, 100) }}</p>
        </div>
    </div>
    </div>
    @endforeach
    </div>
@endsection