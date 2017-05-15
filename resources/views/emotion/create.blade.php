@extends('layouts.master')

<style type="text/css">
	.container{
	min-height: 100%;	
	}
</style>

@section('content')
<div class="container">
	<div class="col-md-8W col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Create Your Feel</div>
			<div class="panel-body">
				<form action="/emotion" method="POST" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<label for="text">Your feel</label>
						<textarea class="form-control" rows="5" id="text" placeholder="Your Feel" name="text"></textarea>
					</div>
					<div class="form-group">
						<label for="image">Emot</label>
						<input type="file" id="emot" placeholder="Emot" name="emot">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div>
					<input type="submit" name="submit" class="btn btn-success pull-right">
					</form>
				</div>
			</div>
		</div>
	</div>

	@endsection