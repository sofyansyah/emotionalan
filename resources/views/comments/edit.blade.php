@extends('layouts.master')

<style type="text/css">
  .container{
    min-height: 100%; 
  }
</style>

@section('content')
<div class="container">
  <div class="col-md-12 nopadding">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Comment</div>
      <div class="panel-body">
        <form action="{{url('/comment/'.$comment->id)}}" method="POST">

          {{ method_field('PUT')}}
          {{ csrf_field()}}
          
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="form-group">
            <label for="description">Comment</label>
            <textarea class="form-control" rows="5" id="reply" placeholder="{{$comment->reply}}" name="reply" value="{{$comment->reply}}"></textarea>
          </div>
          <!-- <div class="form-group">
          <button>upload</button> max 5mb
        </div> -->
        <input type="submit" class="btn btn-success pull-right">
      </div>
    </div>
  </div>
</div>

@endsection