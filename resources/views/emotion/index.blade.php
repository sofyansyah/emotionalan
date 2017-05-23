@extends('layouts.master')

<style type="text/css">
	.container{
		min-height: 100%;	
	}
	.panel-body
	{
		padding: 10px!important;
	}
</style>

@section('content')

<style type="text/css">
	.cd-timeline-block:nth-child(even) .cd-timeline-content{
		float: right!important;
	}
	.panel-body
	{
		padding: 15px!important;
	}
	.emotdate{
		color: #777;
		font-size: 12px;
	}
	.fitures > li{
		display: inline-block;
		padding-right: 15px;
	}
	.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
</style>

<div class="container">     
	
	<div class="col-md-12 nopadding">

		<div class="panel panel-default" style="padding-bottom: 0">
			
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
		</div>


		@forelse( $emotions as $feels )
		{{-- @if ($emotion->user_id ==Auth::id()) --}}

		<section class="feeds">
			<div class="panel panel-body list-feeds">
				<div class="col-md-12" style="padding: 0 0 15px 0;">
					<div class="col-md-1 nopadding">
						<img src="{{asset('img/avatar/'.$feels->avatar)}}" class="img-rounded" height="50px" width="50px;" alt="" style="float: left;">
					</div>
					<div class="col-md-9">
						<a href="{{url('profile/'.$feels->username)}}">
							<h4 style="float: left;padding-right: 5px;">{{'@'. $feels->username }}</h4>
						</a>
						<p class="emotdate"> {{$feels->created_at->diffForHumans()}}</p><br>
						<p style="font-size: 25px;">{{$feels->text}}</p>

					</div>
					<div class="col-md-2 nopadding">
						<img src="{{asset('img/emot/'.$feels->emot)}}" height="60px" width="60px;" alt="">			
					</div>
				</div>
				<div class="col-md-12 nopadding">
					<ul class="fitures" style="margin-bottom: 15px;">
						<li><span style="color:#bbb; font-size: 14px;">Like</span></li>
						<li><span style="color:#bbb; font-size: 14px;">Share</span></li>
						<!-- <li><a href={{url('emotion/'.$feels->id)}}><span style="color:#bbb; font-size: 14px;">Comment</span></a></li> -->
						<li></li>
					</ul>
					<hr/>
					
					<form action="{{url('emotion')}}" method="POST" class>
						{{ csrf_field()}}
						<!-- <span class="more"> -->
						<textarea style="width: 100%; min-height: 50px; border: none;" placeholder="Add a comment ..." name="reply" id="reply"></textarea>
						<!-- </span> -->
						<input type="hidden" name="id" value="{{$feels->id}}">
						<input type="hidden" name="status" value="1">
						<!-- <input type="submit" name="submit" class="btn btn-success pull-right" value="send"  style="margin-top:10px;"> -->
					</form>
					
				</div>
			</div> <!-- cd-timeline-block -->
			
			
		</section> <!-- cd-timeline -->

		{{-- @endif --}}
		@empty
		No Emot

		@endforelse
	</div>
</div>

<script>
	
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '' + ellipsestext+ '&nbsp;' + h + '&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});

</script>

@endsection