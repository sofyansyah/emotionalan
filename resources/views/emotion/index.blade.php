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


		<div class="panel panel-default">
			
			<div class="panel-body" style="padding:10px!important; ">
				<form action="{{url('emotion')}}" method="POST" enctype="multipart/form-data">

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
					</div>
					</div>


		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-rounded" height="100px" width="100px;" alt="">
				</div> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">

					<a href={{url('emotion/'.$feels->id)}}>
						<div class="col-md-2">
							<img src="{{asset('img/emot/'.$feels->emot)}}" class="img-circle" height="24px" width="24px;" alt=""></div>
							<div class="col-md-10">
								<h4>@ {{ $feels->username }}</h4>
							</div>
							<div class="col-md-12">
								<p>{{$feels->text}}</p></div></a>
							</div> <!-- cd-timeline-content -->

							<p class="emotdate"> {{$feels->created_at->diffForHumans()}}</p>
						</div> <!-- cd-timeline-block -->


					</section> <!-- cd-timeline -->

					{{-- @endif --}}
					@empty
					No Emot

					@endforelse
				</div>
			</div>



	@forelse( $emotions as $feels )
	{{-- @if ($emotion->user_id ==Auth::id()) --}}
	<section id="cd-timeline" class="container">
		<div class="cd-timeline-block">
			
			<!-- cd-timeline-img -->

			<div class="cd-timeline-content">

				<div class="col-md-12 nopadding">
				<div class="col-md-1">
				<div class="cd-timeline-img cd-movie">
				<a href="{{url('profile/'.$feels->username)}}"><img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-rounded" alt=""></a>
			</div> 
			</div>
			<div class="col-md-10 nopadding">
					<a href="{{url('profile/'.$feels->username)}}"><h3>{{$feels->username}}</h3></a>
					<p class="date nomargin">{{$feels->created_at->diffForHumans()}}</p>
					</div>
			<div class="col-md-1 nopadding">
			more
			</div>
				</div>

				<div class="col-md-12 nopadding">
				<div class="col-md-1 nopadding">
					<img src="{{asset('img/emot/'.$feels->emot)}}" height="50" width="50"; style="float: right;">
				</div>
				<div class="col-md-7 nopadding">
					<a href={{url('emotion/'.$feels->id)}}><h4>{{$feels->text}}</h4></a>
				</div>
				</div>
				<div class="col-md-12">
<div class="like">
100 Likes
</div>
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