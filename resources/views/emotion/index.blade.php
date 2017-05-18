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
		<textarea style="width: 100%; height:100px; border:none;" placeholder="What do you feel?"></textarea>
		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block"> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">
				<div class="col-md-1 nopadding">
					<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-rounded" height="47px" width="47px;" alt="">
							<img src="{{asset('img/emot/'.$feels->emot)}}" class="feelmotion img-circle" height="24px" width="24px;" alt="">
				</div>
				<div class="col-md-10 nopadding">
					<a href={{url('emotion/'.$feels->id)}}>
							<div class="col-md-9">
								<h6>{{ $feels->username }}</h6>
							</div><!-- cd-timeline-content -->
						</div> <!-- cd-timeline-block -->

							<div class="col-md-12 nopadding">
								<p>{{$feels->text}}</p></div></a>
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

