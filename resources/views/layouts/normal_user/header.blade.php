<header id="header" class="header-layout-six unveiled-navigation">
    <!-- Header Top -->
    <div class="top-bar bg-white" id="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="bar-left">
                        <div class="dropdown pr-3 d-inline-block">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English <img src="{{ asset('be_home_template/Upload/img/flag/1.png') }}" alt="Behome">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"> <img
                                        src="{{ asset('be_home_template/Upload/img/flag/2.png') }}" alt="Behome">
                                    Bangla</a>
                                <a class="dropdown-item" href="#"> <img
                                        src="{{ asset('be_home_template/Upload/img/flag/3.png') }}" alt="Behome">
                                    Japanise</a>
                                <a class="dropdown-item" href="#"> <img
                                        src="{{ asset('be_home_template/Upload/img/flag/4.png') }}" alt="Behome">
                                    Tamil</a>
                            </div>
                        </div>
                        <ul class="list-inline d-inline-block">
                            <li class="list-inline-item mr-4"><i class="fas fa-phone-alt mr-1"></i>
                                +1-2345-2345-54</li>
                            <li class="list-inline-item"><i class="far fa-envelope-open mr-1"></i>
                                support@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><span><i class="fab fa-facebook-f"></i> -
                                </span>Facebook</a></li>
                        <li class="list-inline-item"><a href="#"><span><i class="fab fa-instagram"></i> -
                                </span>Instagram</a></li>
                        <li class="list-inline-item"><a href="#"><span><i class="fab fa-twitter"></i> -
                                </span>Twitter</a></li>
                        @if (Auth::guard('customer')->check())
                            <li class="list-inline-item"> <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <span> {{ Auth::guard('customer')->user()->fname }}
                                        {{ Auth::guard('customer')->user()->lname }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif



                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="header-bottom">
        <div class="container-fluid">
            <div class="menuzord main-navigation" id="menuzord">
                <a href="index.html" class="menuzord-brand"><img
                        src="{{ asset('be_home_template/Upload/img/logo-red.png') }}" alt="Behome" data-rjs="3"></a>
                <div class="view-mobile mobile-offcanvas">
                    <a href="#" class="open-canvas off-canvas-btn"><img
                            src="{{ asset('be_home_template/Upload/img/off-canvas.png') }}" alt="Behome"></a>
                </div>
                <div class="menu-middle">
                    <form>
                        <input type="text" name="q" placeholder="Enter Your Keyword">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <ul class="menuzord-menu menuzord-right">
                    <li class="active"><a href="#">Home</a>
                        <ul class="dropdown">
                            <li><a href="index.html">Default</a></li>
                            <li><a href="home-2.html">Home Two</a></li>
                            <li><a href="home-3.html">Home Three</a></li>
                            <li><a href="home-4.html">Home Four</a></li>
                            <li><a href="home-5.html">Home Five</a></li>
                            <li><a href="home-6.html">Home Six</a></li>
                            <li><a href="home-7.html">Home Seven</a></li>
                            <li><a href="home-8.html">Home Eight</a></li>
                            <li><a href="home-9.html">Home Nine</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Property</a>
                        <ul class="dropdown">
                            <li><a href="#">Property Grid</a>
                                <ul class="dropdown">
                                    <li><a href="property.html">Grid One</a></li>
                                    <li><a href="property-2.html">Grid Two</a></li>
                                    <li><a href="property-3.html">Grid Three</a></li>
                                    <li><a href="property-4.html">Grid Four</a></li>
                                    <li><a href="property-6.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Property List</a>
                                <ul class="dropdown">
                                    <li><a href="property-5.html">List One</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Property Map</a>
                                <ul class="dropdown">
                                    <li><a href="property-halfmap.html">Half Map</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Detail Property</a>
                                <ul class="dropdown">
                                    <li><a href="property-single.html">Version One</a></li>
                                    <li><a href="property-single-2.html">Version Two</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Property Agent</a>
                                <ul class="dropdown">
                                    <li><a href="team.html">Team One</a></li>
                                    <li><a href="team-2.html">Team Two</a></li>
                                    <li><a href="team-single.html">Team Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="about-us.html">About us</a></li>
                            <li><a href="#">Service</a>
                                <ul class="dropdown">
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="service-single.html">Service Single</a></li>
                                </ul>
                            </li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="404.html">404 Page</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a>
                        <ul class="dropdown">
                            <li><a href="blog.html">Blog </a></li>
                            <li><a href="blog-2.html">Blog Classic</a></li>
                            <li><a href="blog-single.html">Blog Single </a></li>
                        </ul>
                    </li>
                    <li><a href="contact-us.html">Contact</a></li>
                    <li><a href="#"><i class="far fa-heart"></i> Collection</a></li>
                    @if (Auth::guard('customer')->check())
                        <li><a href="#">แจ้งโอน</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('customer.transfer_notice') }}">แจ้งโอนเงิน</a></li>
                                <li><a href="{{route('customer.transfer_notice.view.history')}}">ประวัติ</a></li>
                            </ul>
                        </li>

                    @endif
                    @if (!Auth::guard('customer')->check())
                        <li><a href="{{ route('login') }}" class="border-0"><i class="far fa-user"></i> Sign In</a>
                        </li>
                    @endif
                    <li class="hide-mobile"><a href="#" class="open-canvas off-canvas-btn"><img
                                src="{{ asset('be_home_template/Upload/img/off-canvas.png') }}" alt="Behome"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
