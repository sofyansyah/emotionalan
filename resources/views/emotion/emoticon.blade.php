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
			
			<div class="panel-body" style="padding-top: 40px!important;">
				<form action="/emoticon" method="POST" enctype="multipart/form-data">
					{{ csrf_field()}}
					
					<div class="form-group">
						
						<textarea class="form-control" rows="5" id="details" placeholder="Your Feel" name="details"></textarea>
					</div>
					<div class="form-group">
						
						<input type="file" id="emoticon" placeholder="Emot" name="emoticon">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div>
					<input type="submit" name="submit" class="btn btn-success pull-right">
					</form>
				</div>
			</div>
		</div>
	</div>

	@endsection