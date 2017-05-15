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


  @media screen and (max-width: 767px){
    .col-md-12, .panel-body{
      padding: 0px!important;
    }
    .panel-body{
      text-align: center;
    }

  }
</style>

<div class="container">
  <div class="col-md-10 col-md-offset-1 nopadding">
    <div class="panel panel-default" style="padding: 10px 20px;">
      <div class="panel-body text-left">
        <div class="col-md-3 nopadding">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="120px" width="120px;" style="top:10;">
        </div>
        <div class="col-md-7 nopadding">
          <h2>{{$user->fullname}}</h2>
          <p style="color: #aaa;">@ {{$user->username}}</p>
          <p>{{$user->bio}}</p>
          <ul class="counter">
          <li><h4 style="color: #777">200 friends</h4></li>
          <li><h4 style="color: #777">20 feels</h4></li>
          </ul>
        </div>
        <div class="col-md-2 nopadding"  style="top:10px;">
          <ul class="button-edit"">
            <li><a class="btn btn-info" style="margin-bottom: 5px; width: 100%;">+ Add</a></li>
            <li><a href="{{url('profile/'.$user->username.'/edit')}}" class="btn btn-warning" style="width: 100%;">Edit</a></li>
          </ul>
        </div>
      </div>
    </div>

     <hr>

    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-body">
          <textarea style="width: 100%; min-height: 100px;" placeholder="What do you feel..."></textarea>
          <button class="btn btn-primary" style="float: right;">Share</button>
        </div>
      </div>
    </div>

    <div class="col-md-10 col-md-offset-1 pull-right">
    <section id="cd-timeline" class="cd-container">
      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-movie">

        </div> <!-- cd-timeline-img -->
        <div class="cd-timeline-content">
          <p>aaaa</p>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->
      </section> <!-- cd-timeline -->
    </div>
  </div>

</div>
@endsection