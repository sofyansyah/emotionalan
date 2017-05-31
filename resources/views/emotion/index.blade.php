@extends('layouts.master')

<style type="text/css">
	body { padding-top: 50px; }
	.menu li{
		padding: 10px 0;

	}
	.menu li a{
		color:#fafafa!important;
	}
	.tags li{
		padding: 8px;
		color: #777;
		font-size: 14px;
	}
	.like li{
		padding: 5px 3px;
		color: #bbb;
		font-size: 12px;
		display: inline-block;
	}
	.like{
		

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
			<li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="width: 100%; background-color: #8CD790; border-color: none;">Posting</button>
			</li>
			<li> <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" class="img-circle" height="20px" width="20" style="float: left; margin: -4 5px 0 0;">
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
							<input type="hidden" value="{{ 'csrf_token' }}" name="token"><br>
							<input type="text" class="form-control" id="emot_text" name="emot_text" placeholder="emotion text" style="max-width: 50%;">
						</div>
						<input type="submit" name="submit" value="Post" class="btn btn-info pull-right">
					</form>
					<button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
				</div>
			</div>   
		</div>
	</div>
	
	<div class="col-md-7 nopadding">
		@include('include.alert')
<!-- 		<div class="panel panel-default" style="padding-bottom: 0">
			
			<div class="panel-body" style="padding:20px!important; ">
				<form action="{{url('emotion')}}" method="POST" enctype="multipart/form-data">

					{{ csrf_field()}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="text" placeholder="Your Feel" name="text"></textarea>
					</div>
					<div class="form-group" style="margin-bottom: 0;">
						<input type="file" id="emot" placeholder="Emot" name="emot">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div>
					<input type="submit" name="submit" class="btn btn-success pull-right" value="Send">
				</form>
			</div>
		</div> -->


		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="image-rounded" height="60" width="60" alt="Picture">
					<p style=" text-align:center;margin-top:20px;padding: 5px; font-size: 10px; color: #fafafa; background-color: #ED6A5A; border-radius:5px;">{{$feels->created_at->diffForHumans()}}</p>
				</div>
				<!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<div class="col-md-12">
						<a href="{{url('profile/'.$feels->username)}}"><h4 style="font-size: 16px;margin-top: 2px;">{{'@'. $feels->username }}</h4></a>
					</div>
					<div class="col-md-7">
						<p style="padding: 5px 0; text-align: left; color:#777; font-size:20px;">{{'"'. $feels->text .'"'}}</p>
					</div>
					<div class="col-md-5 text-center">
						<img src="{{asset('img/emot/'.$feels->emot)}}" width="auto" alt="">
						<!-- <p>{{$feels->emot_text}}</p> -->
						
					</div>
					<div class="col-md-12 text-left">
						<ul class="like text-left">
							<li><!-- img src="{{asset('img/icon/love.svg')}}" height="14" style="margin-right: -2px;"> --><span class="count">20</span> Like </li>
							<li><a href={{url('emotion/'.$feels->id)}}><!-- <img src="{{asset('img/icon/comment.svg')}}" height="14"> --><span class="count" style="color:#bbb;">21</span> Comment</a></li>
						</ul>
					</div>
					
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

		</section> <!-- cd-timeline -->


		{{-- @endif --}}
		@empty
		No Emot

		@endforelse
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