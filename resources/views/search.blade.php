@extends('layouts.master')

<style type="text/css">
  .container{
    min-height: 100%; 
  }

</style>

@section('content')
<style type="text/css">
  .nopadding{
    padding: 0px!important;
  }
</style>
<div class="container">
  <div class="col-md-12 nopadding">
    @if($results->count())
    <div class="jumbotron text-center"><h1 style="font-size: 30px; margin-bottom: :20px;">Result {{$results->count()}} user for {{$query}}</h1></div>
    @foreach($results as $user)
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="panel panel-default nopadding">
        <div class="panel-body" style="padding: 10px!important;">
          <img src="{{asset('img/avatar/'.$user->avatar)}}" class="img-rounded" height="100px" width="100px;" alt="" style="float: left; margin-right: 10px;">
          <div class="details" style="padding: 0 0 5px;">
          <a href="{{url('profile/'.$user->username)}}">
            <h1>{{$user->fullname}}</h1>
            <p>@ {{$user->username}}</p></a>
            <p>{{$user->bio}}</p>
            </div>
            <button class="btn btn-info">add a friend</button>
          </div>
        </div>
       
        
      </div>
       @endforeach
        @else
        <div class="jumbotron">
          <h1> User Not Found</h1>
        </div>
        @endif
    </div>
  </div>


  @endsection