<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/Instagram_Logo.png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  @yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Proxima+Nova" type="text/css" />
     <link href="/css/pusher-chat-widget.css" rel="stylesheet" />
    
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Google Analytics -->
    {!! Analytics::render() !!}
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div class="span5 " id="pusher_chat_widget">            
    </div>
          
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top gradiantleft" >
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#app-navbar-collapse">
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
                    <ul class="nav navbar-nav ">
                        @for($i=0;$i<10;$i++)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endfor
                         <input id="inputSearch" class="input-group-addon" type="text" name="" value="">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" >                    
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else                                                         
                            <li class="dropdown" >
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background: transparent; color:white; cursor:default;">                                    
                                    <span id="spanUserIcon" style="cursor:pointer; ">
                                        {{ Auth::user()->name }}&nbsp&nbsp
                                        <img src="{{ Auth::user()->profilePic }}" width="25" height="25" class="img-circle" > 
                                    </span>
                                    <span id="spanCaret" style="cursor:pointer;" class="caret "></span>
                                </a>
                                
                                <ul class="dropdown-menu gradiantdown dropdown-content hidden" role="menu" id="ulMenu"> 
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
    <div id="dialog" style="display: none">
        <div id="dvMap" style="height: 333px; width: 590px;">
        </div>
    </div>
    <!-- Scripts
    <script src="/js/app.js"></script> -->

    <script>
        $( "input" ).keyup(function(e) {
            var value = $( this ).val();
            if(e.keyCode == 13){
                window.location.replace("/search/"+value);
            }
        })
        
        var name = {!! json_encode(Auth::user()->name) !!};
        var profilePic = {!! json_encode(Auth::user()->profilePic) !!};
        var userInfo = {
            name: {!! json_encode(Auth::user()->name) !!},
            profilePic : {!! json_encode(Auth::user()->profilePic) !!}
        }
        //console.log(name);
        //console.log(profilePic);
        $(document).ready(function(){            
            $('body').on('click', '.pusher-chat-widget-header', function(){
                $(".pusher-chat-widget").css("background-color", "transparent");
                $('.pusher-chat-widget-header').toggleClass( "hidden" );
                $('.pusher-chat-widget-messages').toggleClass( "hidden" );
                $('.pusher-chat-widget-input').toggleClass( "hidden" );
                $('#openChat').toggleClass( "hidden" );
            });
            $('body').on('click', '#openChat', function(){
                $(".pusher-chat-widget").css("background-color", "whitesmoke");
                $('.pusher-chat-widget-header').fadeToggle("slow");
                $('.pusher-chat-widget-messages').fadeToggle("slow");
                $('.pusher-chat-widget-input').fadeToggle("slow");
                $('.pusher-chat-widget-header').toggleClass( "hidden" );
                $('.pusher-chat-widget-messages').toggleClass( "hidden" );
                $('.pusher-chat-widget-input').toggleClass( "hidden" );
                $('#openChat').toggleClass( "hidden" );
            });
            $('body').on('click', '.caret', function(){
                //$(".dropdown-content").css("display", "block");
                $('.dropdown-content').toggleClass( "hidden" );
            });
            $('body').on('click', '#spanUserIcon', function(){
                window.location.href = "/profile";
            });

            // $('body').on('click',(function() {

            //     if( this.id != 'spanCaret') {
            //         alert(this.id);
            //         $('.dropdown-content').addClass( "hidden" );
            //         //$("#spanCaret").hide();
            //     }

            // });
        });
    </script>
    <script src="http://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="/js/PusherChatWidget.js"></script>    
    <script>
      $(function() {     
        var pusher = new Pusher("7f9c175e9c4a7b2c2710")
        var chatWidget = new PusherChatWidget(pusher, {
          appendTo: "#pusher_chat_widget"
        });
      });
      $(document).ready(function () {
			  $(".navbar-toggle").on("click", function () {                 
				    $('.navbar-toggle').toggleClass("active");
                    $("#app-navbar-collapse").fadeToggle("slow");
                    //$('#app-navbar-collapse').fadeToggle("collapse");
			  });
		});
    </script>

</body>
</html>
