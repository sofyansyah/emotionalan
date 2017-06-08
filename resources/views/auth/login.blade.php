@extends('layouts.master')
<style type="text/css">
    .nav{
        visibility: hidden;
    }
.panel-body{
    background-color: #4CB944!important;
}
.footul{
    visibility: hidden;
}
body{
    background-color: #4CB944!important;
}

</style>
@section('content')
<style type="text/css">
  .panel-body{
    background-color: #4CB944!important;
}  
    label{
        color: #fafafa;
    }
    .btn-link{
        color: #eee;
    }
</style>
<div class="container">
    <div class="row" style="margin-top: 70px;">
        <div class="col-md-6 col-md-offset-3 nopadding">
           <h1 style="font-family: 'madita' ; text-align: center;font-size: 50px;color: #fafafa;">Staggler</h1><br>
           <h1 style="text-align: center;font-size: 20px;color: #fafafa;">Whats your story today?</h1><br>
          
            <!-- <div class="panel-heading text-center">Sign In</div> -->
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                     <div class="col-md-10 col-md-offset-1">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label" style="padding: 5px;">E-Mail Address</label>

                       
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     <div class="col-md-10 col-md-offset-1">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label" style="padding: 5px;">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                                <a class="btn btn-link" href="{{ url('/password/reset') }}" style="padding: 5px 0;">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>

                 <!--    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-warning" style="width: 100%; margin-bottom: 10px;">
                                Sign In
                            </button>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Sign In with Facebook
                            </button>
                                  <a class="btn btn-link" href="{{ url('/register') }}" style="padding: 5px 0; text-align: center;">
                                or Sign Up
                            </a>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
