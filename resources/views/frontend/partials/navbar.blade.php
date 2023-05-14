


<!-- main header -->




        <header class="main-header header-style-two">            
            <!-- header-lower -->
             <div class="header-top">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <ul class="info clearfix">
                            <li><i class="fa fa-map-marker-alt"></i>جدة - الفيصلية</li>
                            <li><i class="fa fa-clock"></i>10 الصباح - 10 المساء</li>
                            <li><i class="fa fa-phone"></i><a href="tel:+966533522988">0533522988</a></li>
                        </ul>
                    </div>
                    
                    <div class="right-column pull-right">
                        <ul class="social-links clearfix">
                            <li><a href="https://www.instagram.com/rawabireal/" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i> </a></li>
                            <li><a href="https://www.twitter.com/rawabireal/" target="_blank"><i class="fa-brands fa-twitter fa-lg"></i> </a></li>
                            <li><a href="https://www.facebook.com/Alrawabireal/" target="_blank"><i class="fa-brands fa-facebook fa-lg"></i> </a></li>
                            <li><a href="https://www.snapchat.com/add/rawabireal?share_id=LQ4Gu_ShYb8&locale=en-GB" target="_blank"><i class="fa-brands fa-snapchat fa-lg"></i> </a></li>
                        </ul>

                        @guest
                            <div class="sign-box">
                                <a href="{{route('login')}}"><i class="fas fa-user-plus"></i> دخول</a>
                            </div>
                            @endguest

                    </div>
                 </div>
             </div>
<br>




            
            <div class="header-lower" style="height: 160px">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box float-left d-none d-md-block d-lg-block" style="width:214px !important; height:170px !important;">
                            <figure class="logo mt-2"><a href="{{ route('home') }}"><img style="width:120px !important; height:115px !important;" src="{{asset('frontend/images/logo.png')}}" alt=""></a></figure>
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

                                        <li class="{{ Request::is('PRequests*') ? 'active' : '' }}">
                                            <a href="{{ route('PropertieRequest') }}"><span>طلب عقار</span></a>
                                        </li>

                                        <li class="{{ Request::is('PMarketing*') ? 'active' : '' }}">
                                            <a href="{{ route('PropertiesMarkating') }}"><span>تسويق عقار</span></a>
                                        </li>
                                        
                                        {{-- <li class="{{ Request::is('agents*') ? 'active' : '' }}">
                                            <a href="{{ route('agents') }}"><span>الوسطاء</span></a>
                                        </li> --}}

                                        {{-- <li class="{{ Request::is('gallery') ? 'active' : '' }}">
                                            <a href="{{ route('gallery') }}"><span>المعرض</span></a>
                                        </li> --}}

                                        <li class="{{ Request::is('blog*') ? 'active' : '' }}">
                                            <a href="{{ route('blog') }}"><span>المدونة</span></a>
                                        </li>

                                        <li class="{{ Request::is('InfoForm*') ? 'active' : '' }}">
                                            <a href="{{ route('InfoForm') }}"><span>حلول تمويلية</span></a>
                                        </li>

                                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                            <a href="{{ route('contact') }}"><span> تواصل معنا </span></span></a>
                                        </li>
                  
                       
                   
                        </div>
                    </div>
                </div>
                <br>
 
            </div>

            <!--sticky Header-->
            <div class="sticky-header" style="color: black !important;">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{route('home')}}"><img src="frontend/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix" style="color: black !important">
                            <nav class="main-menu clearfix" style="color: black !important">
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


