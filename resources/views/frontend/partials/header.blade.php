    <div class="main-content" id="home">
        <!-- header -->
        <header class="header">
            <div class="container">
                <!-- nav -->
                <nav class="py-3">
                    <div id="logo">
                        <h1> <a class="navbar-brand" href="#">Bluebearbali</a>
                        </h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        @if (Auth::guest())
                        <li class="active"><a href="#">Home</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle"><span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Skateboarding<span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                                <li><a href="#">Music</a>
                                </li>
                                <li><a href="#">Tech</a>
                                </li>
                                <li><a href="#">Art</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ url('login') }}">Login</a></li>
                        <li><a href="{{ url('register') }}">Register</a></li>
                         @else
                            <li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-2" class="toggle"><span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                                <a href="#">{{ Auth::user()->name }}<span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
                                    <li><a href="#">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}" class="dropdown-item logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span> Logout</a>
                                       <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                         </form>
                                    </li>
                                </ul>
                            </li>
                         @endif
                      
                    </ul>


                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        <!-- banner -->
        <section class="banner">
            <div class="container">
                <div class="row banner-grids">
                    <div class="col-lg-6 banner-info-w3ls">
                        <h2>Enjoy Your Holiday Trip
                        </h2>
                        <h3 class="mb-3">Plan Your Holiday Trip Now Exceptional Adventure</h3>
                        <p class="mb-4"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus turpis sodales quis. </p>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- //banner -->
    </div>