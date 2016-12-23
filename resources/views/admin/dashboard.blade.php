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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <link href="/css/sweetalert.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/user.css" rel="stylesheet">
        <link href="/css/simple-sidebar.css" rel="stylesheet">
        <link href="/css/admin.css" rel="stylesheet">
        <link href="/css/loader.css" rel="stylesheet">
        <link href="/css/dashboard.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Analytics -->
        {!! Analytics::render() !!}
        <!-- Scripts -->
            <!--<script>
                window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>
            </script>-->
    </head>
    <body>
        
        <div class="container">
            
            <div class="row">
                @include('admin._topbar')
                
                <div class="clearfix" style="height: 50px;">
                
                </div>
                <h1 class="col-xs-offset-1 pink">Admin Dashboard</h1>
                <br>
                <div class="panel panel-default col-sm-3 col-xs-offset-1 pointer " data-href="/admin/user">
                    <div class="panel-body">
                        <span>User List</span>
                        <div class="panel-footer hidden">
                            Block, delete users
                        </div>
                    </div>
                    
                </div>
                
                <!--<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">                    
                </div>-->
                
                <div class="panel panel-default col-sm-3 pointer " data-href="/admin/post">
                    <div class="panel-body">
                       <span>Post List</span>
                        <div class="panel-footer hidden">
                            Delete posts
                        </div>
                    </div>
                </div>

                <div class="panel panel-default col-sm-3 pointer " data-href="/admin/report">
                    <div class="panel-body">
                       <span>Reports</span>
                        <div class="panel-footer hidden">
                            Report of why each user was reported.
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default col-sm-3 pointer " data-href="/logout">
                    <div class="panel-body">
                       <span>Logout</span>
                        <div class="panel-footer hidden">
                            Logout of your account
                        </div>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                
                
            </div>
            
        </div>
        <!-- Latest compiled and minified JS -->
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		});
         $('body').on('click', '.caret', function(){
                $('.dropdown-content').toggleClass( "hidden" );
            });
            $('body').on('click', '#spanUserIcon', function(){
                window.location.href = "/profile";
            });
    </script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="http://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/js/signin.js"></script>
    <script>
        $(document).ready(function(){  
            $('body').on('click', 'div.pointer', function(){
                var href = $(this).data('href');
                $(this).animateCss('flipOutX');
                // $(this).fadeOut(500, function(){ 
                //             });
                if(href == '/logout'){
                    document.getElementById('logout-form').submit();
                }
                else
                    window.location.href = href;
            });
            $('.panel').on( 'mouseenter mouseleave', function( event ) {
                var footer = $(this).find('.panel-footer');
                var heading = $(this).find('span');
                    switch( event.type ) {
		                case 'mouseenter' :
                            footer.show();
                            footer.removeClass('hidden');
                            footer.animateCss('zoomIn');
                             
                            break;
                        case 'mouseleave':
                            footer.fadeOut(500, function(){ 
                            });
                            
                            break;
                    }
                    $(this).removeClass('infinite');
                });
                
        });
        $.fn.extend({
            animateCss: function (animationName) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                });
            }
        });
    </script>
    </body>
</html>