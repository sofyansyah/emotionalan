
<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                <!-- Branding Image -->
                <a class="navbar-brand" style="font-family: 'madita';" href="{{ url('/') }}">
                    <img src="{{asset('img/logo.svg')}}" height="24px;" ;>
                </a>
                @else
                <a class="navbar-brand" style="font-family: 'madita';" href="{{ url('/emotion') }}">
                    <img src="{{asset('img/logo.svg')}}" height="24px;" ;>
                </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                        <!-- <li><a href="#">Explore</a></li>
                        <li><a href="#">Event</a></li> -->
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">


                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li> -->
                            @else
                            <li>
                                <div class="form-group" style="margin-top: 10px;">
                                    <input type="text" id="searching_for" class="form-control">
                                </div>
                            </li>
                            <li><a href="{{url('emotion/create')}}"><img src="{{asset('/img/img/post.svg')}}" height="18px"></a></li>
                            <li><a href="#"><img src="{{asset('/img/img/notif.svg')}}" height="25px"></a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" class="img-circle" height="28px" width="28px">
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/profile')}}/{{Auth::user()->username}}">Profile</a></li>
                                   <!--  <li><a href="{{url('communitys/create')}}">Create</a></li>
                                   <li><a href="{{url('communitys')}}">Feeds</a></li> -->
                                   <li>
                                    <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('js')
    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        var search_bar = $('#searching_for');
        search_bar.on('keypress', function(e){
            if(e.which==13)
            {
                if(search_bar.val() != "")
                    window.location = "/search/"+encodeURIComponent(search_bar.val());
            }
        });
    </script>

