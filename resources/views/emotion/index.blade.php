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
		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="{{asset('img/emot/'.$feels->emot)}}" class="img-circle" height="100px" width="100px;" alt="">
					<p class="emotdate"> {{$feels->created_at->diffForHumans()}}</p>
				</div> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">
					<a href={{url('emotion/'.$feels->id)}}>
						<div class="col-md-2">
							<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-circle" height="40px" width="40px;" alt=""></div>
							<div class="col-md-10">
								<h4>@ {{ $feels->username }}</h4>
							</div>
							<div class="col-md-12">
								<p>{{$feels->text}}</p></div></a>
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

