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
  .counter li{
    display: inline-block;


  }
  .sosmed li{
    padding: 5px;
    display: inline-block;

  }
  .sosmed{
    text-align: center;
    padding: 10px 0;
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
              <input type="hidden" value="{{ 'csrf_token' }}" name="token">
            </div>
            <input type="submit" name="submit" value="Post" class="btn btn-info pull-right">
          </form>
          <button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
        </div>
      </div>   
    </div>
  </div>



  <div class="col-md-12 nopadding">
    @include('include.alert')
    <div class="panel panel-default" style="padding: 25px 20px;">
      <div class="panel-body text-left">
        <div class="col-md-3 text-center nopadding">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="100px" width="100px;">
          <ul class="sosmed">
          <li> <a href={{'$user->facebook'}}><i class="fa fa-facebook"></i></a></li>
          <li><a href={{'$user->twitter'}}><i class="fa fa-twitter"></i></a></li>
          <li><a href={{'$user->instagran'}}><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-md-6" style="padding: 10px 0;">
          <h2>{{$user->fullname}}</h2>
          <p style="color: #aaa;">@ {{$user->username}}</p>
          <br/>
          <p>{{$user->bio}}</p>

         
          <br>
          <ul class="counter" style="top:20px;">
            <li><h4 style="color: #777">{{--$follow->count()--}} 12 followers</h4></li>
            <li><h4 style="color: #777">{{$post->count()}} feels</h4></li>
          </ul>
        </div>
        <div class="col-md-3 nopadding"  style="top:10px;">
          <ul class="button-edit"">


            @if ($user->id == Auth::id())
            <li><button type="button" class="btn btn-success" style="width: 100%; margin-bottom: 5px;">Inbox</button></li>
            @else
            <li>
              {{--@if(count($follow) > 0)
              <a href="{{url('unfollow/'.$follow->id)}}" class="btn btn-success" style="margin-bottom: 5px; width: 100%;"> Followed </a>
              @else
              <a href="{{url('follow/'.$user->username)}}" class="btn btn-info" style="margin-bottom: 5px; width: 100%;"> Follow</a>
              @endif--}}
              @endif
            </li>
            @if ($user->id == Auth::id())
            <li><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#myModal1" style="margin-bottom: 5px; width: 100%;">
              Edit Profile</button></li>
              @else
              <li><button type="button" class="btn btn-primary" style="width: 100%; margin-bottom: 5px;">Message</button></li>
              @endif

              <!-- <li><a href="{{url('profile/'.$user->username.'/edit')}}" class="btn btn-warning" style="width: 100%;">Edit</a></li> -->
            </ul>
          </div>
        </div>
      </div>


      <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body text-center" style="padding-bottom: 50px;">
             <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-circle" height="150px" width="150px;" style="top:10; margin-bottom: 10px;">
             <h1>{{$user->fullname}}</h1>
             <form action="{{url('profile/'.$user->id.'/edit')}}" method="POST" style="text-align: left!important;" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label>Full Name </label>
                <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{$user->fullname}}">
              </div>
              <div class="form-group">
                <label>Email </label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
              </div>
              <div class="form-group">
                <label>Username </label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{$user->username}}" required>
              </div>
              <div class="form-group">
                <label>Password </label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{$user->password}}" required>
              </div>
              <div class="form-group">
                <label>Bio </label>
                <input type="text" name="bio" class="form-control" placeholder="Bio" value="{{$user->bio}}">
              </div>
            <!--   <div class="form-group">
                <label>Location </label>
                <textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Location">{{$user->alamat}}</textarea>
              </div> -->
              <div class="form-group">
                <label>Facebook </label>
                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{$user->facebook}}">
              </div>
              <div class="form-group">
                <label>Twitter </label>
                <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{$user->twitter}}">
              </div>
              <div class="form-group">
                <label>Instagram </label>
                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{$user->instagram}}">
              </div>
              <div class="form-group">
                <label>Avatar </label>
                <input type="file" name="foto" class="form-control">
              </div> 
              <button class="btn btn-warning pull-right">Edit</button>
            </form>
            <button type="button" class="btn btn-warning pull-right" data-dismiss="modal" style="margin-right: 5px;">Close</button>
          </div>
        </div>   
      </div>
    </div>

    <hr>

    @foreach($post as $data)

    <section id="cd-timeline">
      <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="image-rounded" height="60" width="60" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
          <a href="{{url('profile/'.$user->username)}}"><h4 style="font-size: 14px; padding: 5px 10px; margin-bottom: 10px;">{{'@'. $user->username }}</h4></a>
          <!--  -->
          <div class="col-md-12 text-center">
            <img src="{{asset('img/emot/'.$data->emot)}}" width="auto" alt="">
            <p style="padding: 5px 0; text-align: left; color:#777; font-size: 15px;">{{'"'. $data->text .'"'}}</p>
          </div>
          <ul class="like">
            <li><img src="{{asset('img/icon/love.svg')}}" height="18" style="margin-right: -2px;"> <span class="count">20</span></li>
            <li><a href={{url('emotion/'.$data->id)}}><img src="{{asset('img/icon/comment.svg')}}" height="18"> <span class="count" style="color:#bbb;">21</span></a></li>
          </ul>
        </div> <!-- cd-timeline-content -->
      </div> <!-- cd-timeline-block -->

    </section> <!-- cd-timeline -->
    @endforeach

  </div>

<!--   <div class="col-md-3">
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
  </div> -->

</div>
@endsection