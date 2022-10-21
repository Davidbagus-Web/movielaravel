@extends('layouts.main')

<html lang="en">

@section('container')
<!-- show blade -->
@foreach ($movieList as $data)
<div class="row">
<div class="card my-4 col-6 col-sm-1 col-md-3 mb-3" style="max-height: 1200px; overflow:hidden;">
		<img src="{{ $data->image }}" class="row justify-content-center mb-1" style="width: 22rem;">
        <div class="card-body">
            <h5><a href="/movie/show/{{ $data->id}}">{{ $data->title }}</a></h5>
			<div class="text-danger">
                @for ($i = 1; $i <= $data->rating_star; $i++)
                <i class="fas fa-star"></i>
                @endfor
			</div>
            <strong>{{ $data->genre->name }}</strong>
			<p>{{Str::limit($data->description, 100) }}</p>
  </div>
</div>
</div>
@endforeach
@endsection