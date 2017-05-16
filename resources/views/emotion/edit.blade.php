@extends('layouts.master')

<style type="text/css">
	.container{
	min-height: 100%;	
	}
</style>

@section('content')
<div class="container">
	<div class="col-md-12 nopadding">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Emotion</div>
			<div class="panel-body">
				<form action="/emotion/{{$emotion->id}}" method="POST">

					{{ method_field('PUT')}}
					{{ csrf_field()}}
					
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<label for="title">Emot</label>
						<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$emotion->emot}}" disabled>
					</div>
					<div class="form-group">
						<label for="description">Your Feel</label>
						<textarea class="form-control" rows="5" id="text" placeholder="{{$emotion->text}}" name="text" value="{{$emotion->text}}"></textarea>
					</div>
					<!-- <div class="form-group">
					<button>upload</button> max 5mb
				</div> -->
				<input type="submit" class="btn btn-success pull-right">
			</div>
		</div>
	</div>
</div>

@endsection