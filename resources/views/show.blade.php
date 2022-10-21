@extends('layouts.main')

<html lang="en">

@section('container')
<!-- show blade -->
@foreach ($movie as $data)
<div class="card my-4 col-12 col-sm-1 col-md-5 mb-3" style="max-height: 1200px; overflow:hidden;">
		<img src="{{ $data->image }}" class="row justify-content-center mb-1" style="width: 15rem;">
        <div class="card-body">
            <h5>{{ $data->title }}</h5>
			<div class="text-danger">
                @for ($i = 1; $i <= $data->rating_star; $i++)
                <i class="fas fa-star"></i>
                @endfor
            <br>
			</div>
            <strong>{{ $data->genre->name }}</strong>
			<p>{{ $data->description }}</p>
        </div>
</div>
@endforeach
@endsection