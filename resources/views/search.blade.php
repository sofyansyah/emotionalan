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
  .search-title h1{
    font-size: 20px;
    color: #fafafa;
    text-align: center;
    margin-bottom: 20px;

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
<style type="text/css">
  .nopadding{
    padding: 0px!important;
  }
</style>
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
          <!--  <div class="form-group">

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
    @if($results->count())
    <div class="search-title">
    <h1>Result {{$results->count()}} user for {{$query}}</h1>
    </div>
    @foreach($results as $user)
    <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
        <div class="panel-body" style="padding: 10px!important; border-radius: 5px;">
        <div class="col-md-5 nopadding">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="100px" width="100px;" alt="" style="float: left; margin-right: 10px;">
          </div>
          <div class=" col-md-7 details">
            <a href="{{url('profile/'.$user->username)}}">
              <!-- <h1>{{$user->fullname}}</h1> -->
              <p style="margin-bottom: 10px;">@ {{$user->username}}</p></a>
              <!-- <p>{{$user->bio}}</p> -->
              <button class="btn btn-info">add a friend</button>
            </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="search-title" style="">
        <h1> User Not Found</h1>
      </div>
      @endif
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