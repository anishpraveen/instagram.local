<nav class="navbar navbar-default navbar-fixed-top " style="background-color: black; border-bottom: none;">
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
                    <a class="navbar-brand" href="{{ url('/home') }}" title="Home">
                        <img src="/icons/instagram_logo_inner.svg" alt="" height="25px">
                        
                       <!-- {{ config('app.name', 'Laravel') }}-->
                    </a>
                    <a class="navbar-brand" href="{{ url('/home') }}" title="Home">
                    <img src="/Instagram_Logo_Text.png" alt="" style="float:left;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav " title="Press enter to search">
                        @for($i=0;$i<9;$i++)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endfor
                         <!--<input id="inputSearch"  class="input-group-addon loseFocus" type="text" placeholder="Search user" name="" value="">-->
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
                                            <a href="/favourites"><img src="/icons/fav.svg" alt="Heart"></a>
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