@extends('layouts.master')

@section('content')
<style type="text/css">
  .container{
    min-height: 100%; 
  }
  .comment{

  }
  .panel-body{
    padding: 0px!important;
  }
  .panel-default, .panel-body{
    background-color: #fafafa!important;
  }
  textarea{
    border: 1px solid #eee;
  }
  h2{
    margin-top:0px;
  }
  .counter li{
    display: inline-block;
    padding-right: 10px;
  }
  .nopadding{
    padding:0px;
  }


  @media screen and (max-width: 1024px){
    .col-md-12, .panel-body{
      padding: 0px!important;
    }
    .panel-body{
      text-align: center;
    }

  }
</style>

<div class="container">
  <div class="col-md-12 nopadding">
    <div class="panel panel-default" style="padding: 25px 20px;">
      <div class="panel-body text-left">
        <div class="col-md-3 nopadding">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="120px" width="120px;" style="top:10;">
        </div>
        <div class="col-md-7" style="padding: 10px 0;">
          <h2>{{$user->fullname}}</h2>
          <p style="color: #aaa;">@ {{$user->username}}</p>
          <br/>
          <p>{{$user->bio}}</p>
          <br>
          <ul class="counter" style="top:20px;">
            <li><h4 style="color: #777">200 friends</h4></li>
            <li><h4 style="color: #777">20 feels</h4></li>
          </ul>
        </div>
        <div class="col-md-2 nopadding"  style="top:10px;">
          <ul class="button-edit"">
            <li><a class="btn btn-info" style="margin-bottom: 5px; width: 100%;">+ Add</a></li>
            @if ($user->id == Auth::id())
            <li><a href="{{url('profile/'.$user->username.'/edit')}}" class="btn btn-warning" style="width: 100%;">Edit</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    <hr>
   
    <div class="col-md-12 nopadding">
    
      @foreach($post as $data)

      <section id="cd-timeline" class="cd-container">
        <div class="cd-timeline-block">
          <div class="cd-timeline-img cd-movie">
            <img src="{{asset('img/emot/'.$data->emot)}}" class="img-circle" height="100px" width:100px; alt="">
          </div> <!-- cd-timeline-img -->
          <div class="cd-timeline-content">
            <p><a href="{{url('emotion/'.$data->id)}}">{{$data->text}}</a></p>
          </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->
      </section> <!-- cd-timeline -->
      @endforeach

      
    </div>
  </div>

</div>
@endsection