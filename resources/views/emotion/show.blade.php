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
	.panel-body{
		padding:10px!important;
	}
	.edit-delete li{
		padding: 0 0 5px;
	}
</style>

@section('content')
<style type="text/css">
	.panel-body{
		padding:20px!important;
	}
</style>
<div class="container">
	<div class="panel-body">

		<div class="col-md-12 nopadding">
			<civ class="col-md-8 text-left nopadding">
				<img src="{{asset('img/avatar/'.$emotion->avatar)}}" class="img-circle" width="50;" height="50;" style=" float:left; margin-right: 5px;">
				<div class="users" style="padding: 5px;">
					<p>{{$emotion->fullname}}</p>
					<p style="font-size: 14px; color:#aaa;">{{'@'. $emotion->username}}</p>
				</div>
			</civ>
			<div class="col-md-4">
				@if ($emotion->user_id ==Auth::id())
				<ul class="edit-delete text-right">
					<li><form action="{{url('/emotion/'.$emotion->id) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form></li>
					<li><a href="{{url('/emotion/'. $emotion->id. '/edit')}}" class="btn btn-warning">Edit</a></li>	
				</ul>
				@endif
			</div>
			<div class="col-md-12 text-center" style="padding:10px 0 30px;">
				<img src="{{asset('img/emot/'.$emotion->emot)}}" width="300px;" height="300px;">
				<h2 style="font-size:30px;padding: 10px 0;">{{$emotion->text}}</h2>
				<p>{{$emotion->created_at->diffForHumans()}}</p>
			</div>
		</div>
		<div class="panel-footer" style="padding:10px 0 30px; border: none">
			<form action="{{url('comment')}}" method="POST">
				{{ csrf_field()}}
				<textarea style="width: 100%; min-height: 50px;" placeholder="respons..." name="reply" id="reply"></textarea>
				<input type="hidden" name="id" value="{{$emotion->id}}">
				<input type="hidden" name="status" value="1">
				<input type="submit" name="submit" class="btn btn-success pull-right"  style="margin-top:10px;">
			</form>
		</div>
	</div>


	@foreach($comment as $data)
	@php 
	$usernya = \App\User::where('id',$data->user_id)->first();
	@endphp
	<section id="comments">

		<div class="panel panel-body">
			<div class="col-md-12" style="padding: 0 0 15px 0;">
				<div class="col-md-1 nopadding">
					<img src="{{asset('img/avatar/'.$usernya->avatar)}}" class="img-rounded" height="50px" width="50px;" alt="" style="float: left;">
				</div>
				<div class="col-md-9">
					<a href="{{url('profile/'.$data->username)}}">
						<h4 style="padding: 0 0 5px;">{{$usernya->username}}</h4>
					</a>
					<p class="emotdate"> {{--$data->created_at->diffForHumans()--}}</p>
					<p style="font-size: 25px;">{{$data->reply}}</p>
				</div>
				<div class="col-md-2 nopadding">
					@if ($data->user_id ==Auth::id())
					<ul class="edit-delete text-right">
						<li><form action="{{url('/comment/'. $data->comments_id)}}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger" style="background-color: #f9f9f9; border:none; color:#666;padding: 0px;font-size: 16px;">Delete</button>
						</form></li>
						<li><a href="{{url('/comment/'. $data->comments_id. '/edit')}}">Edit</a></li></ul>
						@endif			
					</div>
				</div>		
			</div> <!-- cd-timeline-block -->
		</section> <!-- cd-timeline -->
		@endforeach
	</div>





	@endsection