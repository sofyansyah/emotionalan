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
</style>

<div class="container">     
	
	
	<div class="col-md-10 col-md-offset-1">
	@forelse( $emotions as $emotion )
	{{-- @if ($emotion->user_id ==Auth::id()) --}}
<section id="cd-timeline" class="cd-container">
		<!-- <div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="{{asset('img/emot/'.$emotion->emot)}}">
			</div>

			<div class="cd-timeline-content">
				<p></p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 14</span>
			</div>
		</div> -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="{{asset('img/emot/'.$emotion->emot)}}" class="img-circle" height="100px" width:100px; alt="">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<p><a href={{url('emotion/'.$emotion->id)}}><h4 style="padding:0px; margin:0px;">{{$emotion->text}}</h4></a></p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span> {{$emotion->created_at->diffForHumans()}}</span>
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

