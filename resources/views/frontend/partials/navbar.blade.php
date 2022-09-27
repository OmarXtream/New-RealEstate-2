        <!-- main header -->
        <header class="main-header">            
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{ route('home') }}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">

                                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                                            <a href="{{ route('home') }}"><span>الرئيسية</span></a>
                                        </li>


                                        <li class="{{ Request::is('property*') ? 'active' : '' }}">
                                            <a href="{{ route('property') }}"><span>العقارات</span></a>
                                        </li>

                                        <li class="{{ Request::is('agents*') ? 'active' : '' }}">
                                            <a href="{{ route('agents') }}"><span>الوسطاء</span></a>
                                        </li>

                                        {{-- <li class="{{ Request::is('gallery') ? 'active' : '' }}">
                                            <a href="{{ route('gallery') }}"><span>المعرض</span></a>
                                        </li> --}}

                                        {{-- <li class="{{ Request::is('blog*') ? 'active' : '' }}">
                                            <a href="{{ route('blog') }}"><span>المدونة</span></a>
                                        </li> --}}

                                        <li class="{{ Request::is('InfoForm*') ? 'active' : '' }}">
                                            <a href="{{ route('InfoForm') }}"><span>حلول عقارية</span></a>
                                        </li>

                                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                            <a href="{{ route('contact') }}"><span> تواصل معنا </span></span></a>
                                        </li>
                  
                        @auth
                        <li class="dropdown"><a href="#!"><span>{{ ucfirst(Auth::user()->username) }}</span></a>
                            <ul>
                            @if(Auth::user()->role_id == 1)
                                <li><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                            @elseif(Auth::user()->role_id == 2)
                                <li><a href="{{ route('agent.properties.create') }}">إنشاء عقار</a></li>
                                <li><a href="{{ route('agent.properties.index') }}">قائمة عقاراتي</a></li>

                            @elseif(Auth::user()->role_id == 3)
                            @endif
                            <li>
                            <a class="dropdownitem indigo-text" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons"></i>خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            </ul>
                        </li>     

                        @endauth
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content clearfix">
                                    <ul class="navigation clearfix">
                            @guest
                            <div class="sign-box">
                                <a href="{{route('login')}}"><i class="fas fa-user-plus"></i>دخول</a>
                            </div>
                            @endguest
    
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{route('home')}}"><img src="frontend/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img src="frontend/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                {{-- <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div> --}}
                <div class="social-links">
                    <ul class="clearfix">
                    @if(isset($footersettings[0]) && $footersettings[0]['facebook'])
                    <li><a href="{{ $footersettings[0]['facebook'] }}"><span class="fab fa-facebook-square"></span></a></li>
                    @endif
                    @if(isset($footersettings[0]) && $footersettings[0]['twitter'])
                    <li><a href="{{ $footersettings[0]['twitter'] }}"><span class="fab fa-twitter"></span></a></li>
                    @endif
                    @if(isset($footersettings[0]) && $footersettings[0]['linkedin'])
                    <li><a href="{{ $footersettings[0]['linkedin'] }}"><span class="fab fa-linkedin-in"></span></a></li>
                    @endif
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


