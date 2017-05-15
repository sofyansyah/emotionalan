@extends('layout.master')
@section('css_styles')
    <link rel="stylesheet" href="{{asset('css/onepage-scroll.css')}}">
    
@endsection
@section('content')

<nav class="navbar" style="margin-bottom:0px !Important;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="color:#fff; font-family: 'Madita'; font-size: 25px;"">Bagidelo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
<form class="navbar-form navbar-left">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
</form>
      <ul class="nav navbar-nav navbar-right">
        <a href="#"><button class="btn btn-danger navbar-btn" style="border:none; background-color:#c0392b;">Sign Up</button></a>
        <a href="{{url('/login')}}"><button class="btn btn-default navbar-btn" style="border:none; color:#c0392b">Sign In</button></a>
      </ul>
    </div>
  </div>
</nav>
    
       	
<div class="wrapper">
	  <div class="main">   
   	    
      <section class="page1" style="background-color:#e74c3c;">
        <div class="container">
            <div class="row">
              <div class="col-md-12" style="margin-top:10%;">
          <h2 style="color:#fff; font-family: 'Gibson';">Bagikan idemu dan temukan rekan <br/>untuk mewujudkannya!</h2>
            <p style="color:#fff;">Bagidelo hadir untuk menyediakan ruang bagi para ideator dalam <br/>menyuarakan ide mereka dan menemukan rekan serta dukungan<br/> untuk mewujudkannya</p>
  	    </div>
            </div>
          </div>
  	    <!--<img src="phones.png" alt="phones">-->
      </section>
	    
	    <section class="page2" style="background-color:#EF9688;">
	      <div class="container">
            <div class="row">
              <div class="col-md-6"style="margin-top:10%;">
                <h2 style="color:#fff;">Suarakan idemu</h2>
            <p style="color:#fff;">Ide kecil mampu membuat perubahan besar,<br/>tapi semua itu tidak akan tercapai jika kamu<br/> diam dan tak berbuat apa-apa, mulai buat<br/>perubahan, posting idemu sekarang!</p>
                </div></div></div>
      </section>
                
          
	   
	    <section class="page3" style="background-color: #F1C40F;">
	      <div class="container">
            <div class="row">
              <div class="col-md-6" style="margin-top:10%;">
                </div>
                <div class="col-md-6" style="margin-top:10%;">
                <h2 style="color:#fff;">Temukan rekan<br/>untuk mewujudkannya</h2>
              <p style="color:#fff;">Bagidelo hadir untuk menyediakan ruang bagi para ideator<br/>dalam menyuarakan ide mereka dan menemukan<br/>rekan serta dukungan untuk mewujudkannya.</p>
  	    </div>
              </div>
            </div>
      </section>
          
         <section class="page2" style="background-color: #3498db;">
            <div class="container">
            <div class="row">
            <div class="col-md-6" style="margin-top:10%;">
                 <h2 style="color:#fff;">Bangun dan kembangkan<br/>ide bersama-sama.</h2>
              <p style="color:#fff;">jadilah inspirator bagi banyak orang dengan<br/> membangun, mengembangkan dan membagikan <br/>proses yang dilakukan</p>
                </div>
              </div> 
	      </div>
      </section>  
            
            <section class="page1" style="background-color: #34495e;">
	      <div class="container">
            <div class="row">
              <div class="col-md-12" style="margin-top:10%;">
          <h2 style="color:#fff;">Inspirasi yang menginspirasi</h2>
              <p style="color:#fff;">Jadilah Ideator dan Inspirator sekarang!</p>
              <a href="#" class="btn btn-default" role="button" style="margin-bottom:10px; padding: 10px 80px;">Get Started</a><br/>
              <a href="#" class="btn btn-default" role="button" style="margin-bottom:10px; padding: 10px 95px;">Sign In</a>
  	    </div>
              </div>
                </div>
      </section>
         
    </div>

    
  </div>
   
  <footer  style="padding-top:40px; background-color:#fff;">
          <div class="container">
        <p style="color:#fff;">footer in here</p>
        </div>
          </footer>
          @section('js')

          <script src="{{asset('js/jquery.onepage-scroll.js')}}"></script>
    
<script>
    $(document).ready(function(){
      $(".main").onepage_scroll({
        sectionContainer: "section",
        responsiveFallback: 600,
        loop: true
      });
    });
    
  </script>

  @endsection
     
@endsection