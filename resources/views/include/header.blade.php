<style type="text/css">

    .container{
        min-height: auto!important;
    }
    .menu{
        margin:5px 0 10px;
    }
    .menu li{
        display: inline-block;
        padding:5px 8px;
    }
    .menu li a{
        font-size: 14px;
    }
    .form-group input{width: 100%;}
</style>



<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <div class="nav navbar-default" style="max-width: 100%; background: #4CB944; margin: 0 0 50px 0;">
        <div class="col-md-10 col-md-offset-1 header">
            <ul class="menu">
               @if (Auth::guest())

               @else
               <li style="padding-left: 0;"><a  style="font-family: 'madita';" href="{{ url('/emotion') }}">
                   <h1 style="font-family: 'madita'; font-size: 28px; color: #fafafa; ">Staggler</h1>
               </a></li>

               <li> <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" class="img-circle" height="22px" width="22" style="float: left; margin: -4 5px 0 0;">
                   <a href="{{url('/profile')}}/{{Auth::user()->username}}">{{Auth::user()->username}}</a></li>
                   <li><a href="#"><!-- <img src="{{asset('img/icon/envelope.svg')}}" height="18"> --> Inbox</a></li>
                   <li><a href="#"><!-- <img src="{{asset('img/icon/notifications.svg')}}" height="18"> --> Notification</a></li>
                   <li>
                    <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <!-- <img src="{{asset('img/icon/exit.svg')}}" height="18"> --> Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li style="float: right; padding-right: 0;">
                <input type="text" id="searching_for" class="form-control" placeholder="search...">

            </li>


            @endif
        </ul>
    </div>
</div>

@yield('js')
<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    var search_bar = $('#searching_for');
    search_bar.on('keypress', function(e){
        if(e.which==13)
        {
            if(search_bar.val() != "")
                window.location = "{{url('/search/')}}/" +encodeURIComponent(search_bar.val());
        }
    });
</script>



