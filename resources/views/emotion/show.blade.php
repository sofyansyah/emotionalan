@extends('layouts.master')

<style type="text/css">
	body { padding-top: 50px; }
	.menu li{
		padding: 10px 0;

	}
	.menu li a{
		color:#333!important;
	}
	.tags li{
		padding: 8px;
		color: #aaa;
		font-size: 14px;
	}
	.like li{
		padding: 10px 5px;
		color: #bbb;
		font-size: 14px;
		display: inline-block;
	}
	.like{
		padding: 10px 10px 0;

	}
	.like img{
		margin-bottom: -5px;
	}
	.count{
		padding: 0 3px;
		margin-top: -2px;
	}
	.panel-body{
		padding: 15px 0!important;
	}
	p{
		padding: 5px;
	}
	text-area{


	}
</style>

@section('content')

<div class="container">

	<div class="col-md-2">
		<ul class="menu">
			@if (Auth::guest())
			<li><a href="{{ url('/login') }}">Login</a></li>
			<!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
			@else
			<li><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" style="width: 100%;">Posting</button>
			</li>
			<li> <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" class="img-circle" height="24px" width="24px" style="float: left; margin: -4 5px 0 0;">
				<a href="{{url('/profile')}}/{{Auth::user()->username}}">{{Auth::user()->username}}</a></li>

				<li><a href="#"><img src="{{asset('img/icon/envelope.svg')}}" height="18"> Inbox</a></li>
				<li><a href="#"><img src="{{asset('img/icon/notifications.svg')}}" height="18"> Notification</a></li>
				<li>
					<a href="{{ url('/logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<img src="{{asset('img/icon/exit.svg')}}" height="18"> Logout
				</a>

				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>
			@endif
		</ul>
	</div>

	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body" style="height: 280px;">
					<form action="{{url('/home')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field()}}
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<!-- 	<div class="form-group">

							<input type="text" class="form-control" rows="5" id="title" placeholder="Title" name="title">
						</div> -->
						<div class="form-group">

							<textarea class="form-control" rows="5" id="text" placeholder="Text" name="text"></textarea>
						</div>
						<div class="form-group">

							<input type="file" id="emot" placeholder="Image" name="emot">
							<input type="hidden" value="{{ 'csrf_token' }}" name="token">
						</div>
						<input type="submit" name="submit" value="Post" class="btn btn-info pull-right">
					</form>
					<button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
				</div>
			</div>   
		</div>
	</div>



	<div class="col-md-7">
		<div class="panel panel-body" style="margin-bottom: 20px;">
			<div class="col-md-12">

				<img src="{{asset('img/avatar/'.$emotion->avatar)}}" class="img-circle" width="50;" height="50;" style=" float:left; margin-right: 5px;">
				<p style="float:right; font-size: 14px; color: #aaa;">{{$emotion->created_at->diffForHumans()}}</p>
				<div class="users" style="padding: 5px;">
					<p>{{$emotion->fullname}}</p>
					<a href="{{url('profile/'.$emotion->username)}}"><p style="font-size: 14px; color:#aaa;">{{'@'. $emotion->username}}</p></a>
					
				</div>
			</div>

			<div class="col-md-12 text-center">
				<img src="{{asset('img/emot/'.$emotion->emot)}}" width="auto" style="margin-bottom: 20px;">
				@if ($emotion->user_id ==Auth::id())
				<div class="dropdown pull-right">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border: none;">...
					</button>
					<ul class="dropdown-menu">
						<li><form action="{{url('/emotion/'.$emotion->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-default" style="border: none; background-color: #fff;">Delete</button>
						</form></li>
						<li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1" style="border: none; background-color: #fff;">edit</button></li>
						
					</ul>
				</div>
				@endif

				<h2 style="padding: 10px;">{{$emotion->title}}</h2>
				<p style="padding: 5px; font-size: 14px;">{{$emotion->text}}</p>

			</div>



			<div class="col-md-12">
				<div class="panel-body">
					<form action="{{url('comment')}}" method="POST">
						{{ csrf_field()}}
						<textarea style="width: 100%; min-height: 40px; border: none;" placeholder="comment" name="reply" id="reply"></textarea>
						<input type="hidden" name="id" value="{{$emotion->id}}">
						<input type="hidden" name="status" value="1">
						<input type="submit" name="submit" class="btn-xs btn-primary pull-right" value="Send" style="margin-top:10px;">
					</form>
				</div>
			</div>
		</div>


		@foreach($comment as $data)
		@php 
		$usernya = \App\User::where('id',$data->user_id)->first();
		@endphp
		<section id="cd-timeline">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="{{asset('img/avatar/'.$usernya->avatar)}}" class="image-rounded" height="60" width="60" alt="Picture">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<div class=" col-md-2">
						<!-- <h4 style="font-size: 16px; padding: 5px;">{{$usernya->fullname }}</h4> -->
						<a href="{{url('profile/'.$usernya->username)}}"><h4 style="font-size: 14px; margin-bottom: 10px;">{{'@'. $usernya->username }}</h4></a>
					</div>
					<!--  -->
					<div class="col-md-12 text-center">
						<p style="padding: 5px 0; text-align: left; color:#777; font-size: 15px;">{{'"'. $data->reply .'"'}}</p>
					</div>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

		</section> <!-- cd-timeline -->

		@endforeach

	</div>

	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body" style="height: 42%;padding: 20px 0;">
					<div class="col-md-4">
						<img src="{{asset('img/image/'. $emotion->image)}}" width="100%">
					</div>
					<div class="col-md-8" style="background-color: #fff;">
						<form action="{{url('/emotion/' .$emotion->id) }}" method="POST">

							{{ method_field('PUT')}}
							{{ csrf_field()}}

							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<div class="form-group">
								<label for="description">Text</label>
								<textarea class="form-control" rows="5" id="text" placeholder="{{$emotion->text}}" name="text" value="{{$emotion->text}}"></textarea>
							</div>
					<!-- <div class="form-group">
					<button>upload</button> max 5mb
				</div> -->
				<input type="submit" class="btn btn-success pull-right">
				<button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
			</form>
		</div>
	</div>
</div>   
</div>
</div>

<div class="col-md-3">
	<div class="panel panel-body" style="padding: 15px 20px!important;">
		<h4>#Trending Tags</h4>
		<ul class="tags">
			<li>KZL</li>
			<li>mantap jiwa</li>
			<li>ngabuburit</li>
			<li>bukber</li>
			<li>kolak</li>
			<li>macet</li>

		</ul>
	</div>
</div>
</div>


@endsection