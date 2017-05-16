@extends('layouts.master')

<style type="text/css">
	.container{
		min-height: 100%;	
	}
	form{
		margin-bottom: 5px;
	}
	h2{
		margin: 0px!important;
	}
	.like-comment > li{
		display: inline-block;
	}
	.comment{
		padding:0px 65px!important;
	}
</style>

@section('content')
<div class="container">
	<div class="col-md-12 nopadding">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					@if ($emotion->user_id ==Auth::id())
					<ul class="edit-delete text-right">
						<li><form action="/emotion/{{$emotion->id}}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger">Delete</button>
						</form></li>
						<li><a href="/emotion/{{$emotion->id}}/edit" class="btn btn-warning">Edit</a></li>
						@endif
					</ul>
				</div>
				<div class="col-md-12 text-center">
					<img src="{{asset('img/emot/'.$emotion->emot)}}" width="auto;" height="auto;">
					<h2 style="font-size:30px;margin-top: 20px!important;">{{$emotion->text}}</h2>
					<p>{{$emotion->created_at->diffForHumans()}}</p>
				</div>
			</div>
			<div class="panel-footer" style="padding-bottom: 30px;">
				<ul class="like-comment">
					<li>20  like</li>
					<li>5  comment</li>
				</ul>
				<form action="/comment" method="POST">
					{{ csrf_field()}}
					<textarea style="width: 100%; min-height: 50px;" placeholder="respons..." name="reply" id="reply"></textarea>
					<input type="submit" name="submit" class="btn btn-success pull-right"  style="margin-top:10px;">
				</form>
			</div>
		</div>

		<section id="cd-timeline" class="cd-container">
		@foreach($comment as $data)
		@php 
			$usernya = \App\User::where('id',$data->user_id)->first();
		@endphp
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<a href="{{url('profile/'.$usernya->username)}}">
						<img src="{{asset('img/avatar/'.$usernya->avatar)}}" class="img-circle" height="100px" width:100px; alt="">
					</a>
				</div> <!-- cd-timeline-img -->
				<div class="cd-timeline-content">
					<h5 style="font-weight: bold;">{{$usernya->username}}</h5>
					<p>{{$data->reply}}</p>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->
		@endforeach
		</section> <!-- cd-timeline -->
	</div>
</div>



@endsection