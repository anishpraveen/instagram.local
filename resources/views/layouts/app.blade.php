<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="Instagram_Logo.png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  @yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top gradiantleft" >
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="/icons/instagram_logo_inner.svg" alt="" height="25px">
                       <!-- {{ config('app.name', 'Laravel') }}-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else                <a href="/profile" class="white" style="padding:0;">.</a>                  
                            <li class="dropdown " >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background: transparent; color:white;">                                    
                                    {{ Auth::user()->name }}
                                    <img src="{{ Auth::user()->profilePic }}" width="25" height="25" class="img-circle" >                               
                                    <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu gradiantdown" role="menu" id="ulMenu"> 
                                    <div >
                                       
                                        <li class="lispace">
                                            <a href="/settings"><img src="/icons/settings_select.svg" alt="Settings"></a>
                                        </li>
                                        <li class="lispace">
                                            <a href="/favourites"><img src="/icons/heart_select.svg" alt="Heart"></a>
                                        </li>
                                        <li class="lispace">
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" >
                                            <img src="/icons/logout_select.svg" alt=" Logout ">
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>                                        
                                    </div>
                                </ul>                                
                            </li>                     
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    @yield('footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
