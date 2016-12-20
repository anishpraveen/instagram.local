<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/Instagram_Logo.png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}  @yield('title')</title>

    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
     <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/user.css" rel="stylesheet">
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/loader.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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

    <div id="wrapper">
        @include('admin._topbar')
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin Panel
                    </a>
                </li>
                <li>
                    <a href="/admin">Dashboard</a>
                </li>
                <li >
                    <a href="/admin/user"  > Users</a>
                </li>
                <li>
                    <a href="/admin/post">Post</a>
                </li>
                <li>
                    <a href="#">Location</a>
                </li>
                <li>
                    <a href="#">Password Resets</a>
                </li>
                <li class="lispace">
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                    <!--<img src="/icons/logout_select.svg" alt=" Logout ">-->
                    Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>   
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <div class="clearfix" style="height: 50px;">
        
        </div>
        
        <a href="#menu-toggle" class="btn" id="menu-toggle" title="Toggle Menu">
            <img id="closeMenu" src="/icons/left-arrow-angle.svg" height="20px" alt="" >
        </a>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @include('loader')
                        @yield('content')
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <!-- Latest compiled and minified JS -->
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/admin.js"></script>
    @yield('scripts')
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $('#closeMenu').toggleClass("rotated");
        });
        $(document).ready(function () {
			  $(".navbar-toggle").on("click", function () {                 
				    $('.navbar-toggle').toggleClass("active");
                    $("#app-navbar-collapse").fadeToggle("slow");
                    //$('#app-navbar-collapse').fadeToggle("collapse");
			  });
              $("#myModal").on("click",function(event){
                  if (event.target !== this)
                    return;
                  modalClose();
              });
            //   $(".modal-content").on("click",function(event){
            //       event.stopPropagation();
            //   });
		});
         $('body').on('click', '.caret', function(){
                //$(".dropdown-content").css("display", "block");
                $('.dropdown-content').toggleClass( "hidden" );
            });
            $('body').on('click', '#spanUserIcon', function(){
                window.location.href = "/profile";
            });
            //  $( "input" ).keyup(function(e) {
            // var value = $( this ).val();
            // if(e.keyCode == 13){
            //     window.location.replace("/search/"+value);
            //     }
            // })
    </script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="http://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/js/signin.js"></script>
</body>

</html>
