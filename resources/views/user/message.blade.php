@extends('layouts.master')

<style type="text/css">
    .container{
    min-height: 100%;   
    }
</style>

@section('content')
<div class="container">
    <div class="coml-md-12">        
        <br style="clear:both">
            <div class="form-group col-md-4 ">                                
                <label id="messageLabel" for="message">Message </label>
                <textarea class="form-control input-sm " type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
            </div>
        <br style="clear:both">
        <div class="form-group col-md-2">
        <button class="form-control input-sm btn btn-success disabled" id="btnSubmit" name="btnSubmit" type="button" style="height:35px"> Send</button>    
    </div>
</div>
</div>
@endsection