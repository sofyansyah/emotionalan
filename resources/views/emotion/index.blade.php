@extends('layouts.master')

<style type="text/css">
	.container{
		min-height: 100%;	
	}

	.cd-timeline-block:nth-child(even) .cd-timeline-content{
		float: right!important;
	}

</style>

@section('content')

<style type="text/css">
	.cd-timeline-block:nth-child(even) .cd-timeline-content{
		float: right!important;
	}
	.emotdate{
		color: #999;
		font-size: 10px; 
		padding: 5px; 
	}
</style>

<div class="container">     
	<div class="col-md-12 nopadding">
		<form action="/emotionalan/public/home" method="POST" enctype="multipart/form-data" style="margin-bottom: 100px;">
					{{ csrf_field()}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						
						<textarea class="form-control" rows="5" id="text" placeholder="Your Feel" name="text"></textarea>
					</div>
					<div class="form-group">
						
						<input type="file" id="emot" placeholder="Emot" name="emot">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div>
					<input type="submit" name="submit" class="btn btn-success pull-right">
					</form>

		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block"> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">
				<div class="col-md-1 col-xs-3 nopadding">
					<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-rounded" height="47px" width="47px;" alt="">
							<img src="{{asset('img/emot/'.$feels->emot)}}" class="feelmotion img-circle" height="24px" width="24px;" alt="">
				</div>
				<div class="col-md-10 nopadding">
					<a href={{url('emotion/'.$feels->id)}}>
							<div class="col-md-9">
								<h6>{{ $feels->fullname }}</h6>
								<p>{{ $feels->username }}</p>
							</div><!-- cd-timeline-content -->
						</div> <!-- cd-timeline-block -->

							<div class="col-md-12 nopadding">
								<p class="status">{{$feels->text}}</p>
								</div>
								</a>
							</div> 
							<hr style="margin: 10px -15px;">
							<div class="col-md-12 nopadding">
							<p class="emotdate"> {{$feels->created_at->diffForHumans()}}</p>
							</div>
						</div>

					</section> <!-- cd-timeline -->

					{{-- @endif --}}
					@empty
					No Emot

					@endforelse

				</div>


			</div>

			@endsection

