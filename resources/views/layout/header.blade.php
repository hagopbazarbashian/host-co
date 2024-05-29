<header class="header-light transparent has-topbar">
    {{-- <div id="topbar">
        <div class="container">
            <div class="topbar-left xs-hide">
                <span class="topbar-widget">
                    <a href="#">Get Free Shared Hosting!</a>
                </span>
            </div>

            <div class="topbar-right">
                <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a></div>
                <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>support@hostco.com</a></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="{{route('home')}}">
                                    <img class="logo-main" src="{{asset('asset/images/logo.png')}}" alt="" >
                                    <img class="logo-mobile" src="{{asset('asset/images/logo-mobile.png')}}" alt="" >
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="website-builder.html">Transfer</a></li>
                            <li><a class="menu-item" href="website-builder.html">Pricing</a></li>
                            <li><a class="menu-item" href="help-center.html">Contact Us</a></li>
                        </ul>
                    </div>
                    @guest
                    <div class="de-flex-col">
                    <div class="menu_side_area">
                        <a href="{{route('free_trial')}}" class="btn-main">Login / Register</a>
                        <span id="menu-btn"></span>
                    </div>
                    </div>
                    @else
                    <div class="de-flex-col">
                    <div class="menu_side_area">
                        <a href="{{route('free_trial')}}" class="btn-main">Welcome {{auth()->user()->name}}</a>
                        <span id="menu-btn"></span>
                    </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
