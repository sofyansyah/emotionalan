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
		border: 1px solid #eee;
	}
	p{
		padding: 5px;
	}
	text-area{


	}
</style>

@section('content')


<div class="container">   



	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<form action="{{url('/home')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field()}}
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<!-- 	<div class="form-group">

							<input type="text" class="form-control" rows="5" id="title" placeholder="Title" name="title">
						</div> -->
						<!-- <div class="form-group">
							<textarea class="form-control" rows="5" id="text" placeholder="Text" name="text"></textarea>
						</div> -->
				<!-- 		<div class="form-group">
							<input type="file" id="emot" placeholder="Image" name="emot">
							<input type="hidden" value="{{ 'csrf_token' }}" name="token"><br>
							<input type="text" class="form-control" id="emot_text" name="emot_text" placeholder="emotion text" style="max-width: 50%;">
						</div> -->
						<div class="col-md-12" style="padding-bottom: 20px;">
							
							<div class="form-group">
								<label for="sel1">Select list:</label>
								<select class="form-control" id="sel1">
									@forelse($emoticons as $emoticon)
									<option><img src="{{asset('img/emot/'. $emoticon->emoticons)}}" width="45px;"></option>

									@empty
									no
									@endforelse
								</select>
							</div>

							

						</div>
						<input type="submit" name="submit" value="Choose" class="btn btn-info pull-right">
					</form>
					<button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
				</div>
			</div>   
		</div>
	</div>
	
	<div class="col-md-9 nopadding">




		@include('include.alert')
		<div class="panel panel-default" style="padding-bottom: 0">
			
			<div class="panel-body" style="padding:15px!important; border-radius: 5px;background: linear-gradient(#fff,#f9f9f9;">
				<form action="{{url('emotion')}}" method="POST" enctype="multipart/form-data">

					{{ csrf_field()}}
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="text" placeholder="Your Feel" name="text"></textarea>
					</div>
					<div class="col-md-12 nopadding" style="padding-bottom: 20px;">
						<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo" style="border: 1px solid #e5e5e5!important;"><img src="{{asset('img/icon/smile.svg')}}" width="20"></button>
						<div id="demo" class="collapse">
							@forelse($emoticons as $emoticon)
							<label class="radio-inline" style="padding: 2px;"><img src="{{asset('img/emot/'. $emoticon->emoticons)}}" width="30" style="cursor: pointer;"><input type="radio" name="emot" style="visibility: hidden;"></label>

							@empty
							no
							@endforelse

						</div>


						<input type="submit" name="submit" class="btn btn-warning pull-right" value="Send" style="background: #0FA3B1; border: none;">

					</div>

			<!-- 		<div class="form-group" style="margin-bottom: 0;">
						<input type="file" id="emot" placeholder="Emot" name="emot">
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
					</div> -->
					
				</form>
			</div>
		</div>


		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section id="cd-timeline">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="image-rounded" height="60" width="60" alt="Picture">
					<p style=" text-align:center;margin-top:18px;padding: 2px; font-size: 10px; color: #666;">{{$feels->created_at->diffForHumans()}}</p>
				</div>
				<!-- cd-timeline-img -->

				<div class="cd-timeline-content"  style="background: linear-gradient(#fff,#f9f9f9);border: 1px solid #ddd;">
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

	<div class="col-md-3" style="padding-right: 0;">
		<div class="panel panel-body" style="padding: 15px 15px!important; background: linear-gradient(#fff,#f9f9f9);border: 1px solid #ddd;">
			<h4>Top Emoji</h4>
			<ul class="tags">
				<?php
				use App\Emotion;
				$emotions = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
        // ->join('emoticons', 'emotions.user_id', '=', 'emoticons.id')
				->select('emotions.*','users.username', 'users.avatar', 'users.fullname')
				->limit(5)
				->latest()
				->get();
				?>
				@forelse($emotions as $user)
				<li>
					<img src="{{asset('img/emot/'.$user->emot)}}" height="40" width="40">
					<p>{{$user->text}}</p>
					@empty
					no
					@endforelse

				</ul>
			</div>
			<div class="panel panel-body" style="padding: 15px 15px!important;background: linear-gradient(#fff,#f9f9f9); border: 1px solid #ddd;">
				<h4>Get a new friend</h4>
				<ul class="tags">


					@forelse($users as $friend)
					<li>
						<img src="{{asset('img/avatar/'.$friend->avatar)}}" class="img-circle" height="45" width="45" style="float: left; margin-right: 8px; ">
						{{$friend->username}}<br>
						<button class="btn btn-primary" style="padding:3px 5px; font-size: 12px; margin-top: 5px;background: linear-gradient(#3498db, #2980b9);">Follow</button>
						@empty
						no
						@endforelse

					</ul>
				</div>

			</div>



		</div>


		@endsection