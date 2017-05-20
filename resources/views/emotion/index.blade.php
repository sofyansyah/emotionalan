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
	
	<div class="col-md-12 nopadding">
	@forelse( $emotions as $feels )
	{{-- @if ($emotion->user_id ==Auth::id()) --}}
<section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<a href="{{url('profile/'.$feels->username)}}"><img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-circle" height="100" width="100" alt=""></a>
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
			<div class="col-md-8 nopadding">
			<a href="{{url('profile/'.$feels->username)}}"><h3>@ {{$feels->username}}</h3></a>
			<br/>
				<a href={{url('emotion/'.$feels->id)}}><h4>{{$feels->text}}</h4></a>
				<p>{{$feels->created_at->diffForHumans()}}</p>
			</div>
			<div class="col-md-4 nopadding">
				<img src="{{asset('img/emot/'.$feels->emot)}}" height="100" width="100"; style="float: right;">
				</div>
				<div class="col-md-12">
				
				</div>
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