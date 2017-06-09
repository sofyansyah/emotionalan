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
		color: #777;
		font-size: 20px;
	}
	text-area{


	}
</style>

@section('content')

<div class="container">
	

	<div class="col-md-9 nopadding">
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
				<p>{{'"'. $emotion->text .'"'}}</p>
			</div>

			<div class="col-md-12">
				<div class="panel-body">
					<form action="{{url('comment')}}" method="POST">
						{{ csrf_field()}}
						<textarea style="width: 100%; min-height: 40px; border: none;" placeholder="Comment in here" name="reply" id="reply"></textarea>
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
					<!-- <h4 style="font-size: 16px; padding: 5px;">{{$usernya->fullname }}</h4> -->
					<div class="col-md-12" style="margin-bottom: 10px;">
						<a href="{{url('profile/'.$usernya->username)}}"><h4 style="font-size: 14px; margin-bottom: 10px; float: left;">{{'@'. $usernya->username }}</h4></a>
						<p style="float: right; font-size: 12px;">{{$data->created_at->diffForHumans()}}</p>
					</div>

					<div class="col-md-12 text-left">
						<p>{{'"'. $data->reply .'"'}}</p>
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
				<div class="modal-body" style="height: 100%;padding: 20px 0;">
					<div class="col-md-4">
						<img src="{{asset('img/emot/'.$emotion->emot)}}" width="auto" style="margin-bottom: 20px;">
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

<div class="col-md-3" style="padding-right: 0;">
	<div class="panel panel-body" style="padding: 15px 15px!important; background: linear-gradient(#fff,#f9f9f9);border: 1px solid #ddd;">
		<h4>Top Emoji</h4>
		<ul class="tags">
			<?php
			use App\Emotion;
			$emotions = Emotion::join('users', 'emotions.user_id', '=', 'users.id')
        // ->join('emoticons', 'emotions.user_id', '=', 'emoticons.id')
			->select('emotions.*','users.username', 'users.avatar', 'users.fullname')
			->limit(6)
			->latest()
			->get();
			?>
			@forelse($emotions as $user)
			<div class="col-md-6" style="padding: 0;">
				<li>
					<img src="{{asset('img/emot/'.$user->emot)}}" height="50" width="50">
					<p>{{--$user->text--}}</p></li>
				</div>
				@empty
				no
				@endforelse

			</ul>
		</div>
	</div>

</div>


@endsection