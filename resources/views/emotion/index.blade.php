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
		text-align: center;
	font-size: 10px; 
	padding: 5px; 
	background-color: #f1c40f; 
	margin-top: 10px; 
	margin-right: -18px;
	border-radius: 5px;"
	}
</style>

<div class="container">     
	
	
	<div class="col-md-12 nopadding">
		<textarea style="width: 100%; height:100px; border:none;"></textarea>
		@forelse( $emotions as $emotion )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="{{asset('img/emot/'.$emotion->emot)}}" class="img-circle" height="100px" width:100px; alt="">
					<p class="emotdate"> {{$emotion->created_at->diffForHumans()}}</p>
				</div> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">
					<p><a href={{url('emotion/'.$emotion->id)}}>
						{{-- $user->avatar --}}{{-- $user->username --}}
						<h4 style="padding:0px; margin:0px;">{{$emotion->text}}</h4></a></p>
						
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->


			</section> <!-- cd-timeline -->

			{{-- @endif --}}
			@empty
			No Emot

			@endforelse

		</div>


	</div>

	@endsection

