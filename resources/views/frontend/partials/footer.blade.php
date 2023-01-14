        <!-- main-footer -->
        <footer class="main-footer">
            @if(!Request::is('blog*'))
            <div class="footer-top bg-color-2">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml-70">
                                <div class="widget-title">
                                    <h3>القائمة</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list class">
                                        <li class="uppercase {{ Request::is('property*') ? 'underline' : '' }}">
                                            <a href="{{ route('property') }}" class="grey-text text-lighten-3">العقارات</a>
                                        </li>
                    
                                        <li class="uppercase {{ Request::is('agents*') ? 'underline' : '' }}">
                                            <a href="{{ route('agents') }}" class="grey-text text-lighten-3">الوكلاء</a>
                                        </li>
                    
                                        {{-- <li class="uppercase {{ Request::is('gallery*') ? 'underline' : '' }}">
                                            <a href="{{ route('gallery') }}" class="grey-text text-lighten-3">المعرض</a>
                                        </li> --}}
                    
                                        <li class="uppercase {{ Request::is('blog*') ? 'underline' : '' }}">
                                            <a href="{{ route('blog') }}" class="grey-text text-lighten-3">المدونة</a>
                                        </li>
                    
                                        <li class="uppercase {{ Request::is('contact') ? 'underline' : '' }}">
                                            <a href="{{ route('contact') }}" class="grey-text text-lighten-3">تواصل معنا</a>
                                        </li>

                                                        </ul>
                                </div>

                           

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget">
                                <div class="widget-title">
                                    <h3>العقارات الأخيرة</h3>
                                </div>
                                <div class="post-inner">
                                    @foreach($footerproperties as $property)
                                    <div class="post">
                                        <figure class="post-thumb"><a href="{{ route('property.show',$property->slug) }}"><img src="{{Storage::url('property/'.$property->image)}}" alt=""></a></figure>
                                        <h5><a href="{{ route('property.show',$property->slug) }}">{{ str_limit($property->title,40) }}</a></h5>
                                        <p>: غرف  {{ $property->bedroom }} دورات المياه: {{ $property->bathroom }} </p>
                                    </div>
                                    @endforeach
                
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column mt-5">
                            <div class="footer-widget links-widget ml-70">
                                <div class="widget-content">
                                    
                                    <div class="team-block-one">
                                        <div class="inner-box" >
                                            <figure class="image-box"><img src="assets/images/team/team-3.jpg" alt=""></figure>
                                            <div class="lower-content">
                                                <div class="inner" dir="ltr" style="background-color:#1b1d21 !important;">
                                                    <h3 class="mb-4" style="color:#fff">التواصل الاجتماعي</h3>
                                                    <ul class="social-links clearfix">
                                                        <center>
                                                        <li><a href="https://www.instagram.com/rawabireal/" target="_blank"><i class="fab fa-instagram" dir="rtl"></i> </a></li>
                                                        <li><a href="https://www.twitter.com/rawabireal/" target="_blank"><i class="fab fa-twitter" dir="rtl"></i> </a></li>
                                                        <li><a href="https://www.snapchat.com/add/rawabireal" target="_blank"><i class="fab fa-snapchat" dir="rtl"></i></a></li>            
                                                    </center>
                                                    </ul>
                                                    <hr>
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>      

                                     </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
            @endif
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-box clearfix">
                        <figure class="footer-logo"><a href="{{route('home')}}"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a></figure>
                        <div class="copyright pull-left">
                            @if(isset($footersettings[0]) && $footersettings[0]['footer'])
                            {{ $footersettings[0]['footer'] }}
                        @else
                            © 2022 Developer puzzle.
                        @endif
                            </div>
                            <ul class="footer-nav pull-right clearfix">
                                <li><a href="{{ route('policy') }}">سياسة الخصوصية</a></li>
                            </ul>
                                    </div>
                </div>
            </div>
        </footer>


        <!-- main-footer end -->

    </div>


    <!-- jequery plugins -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.js')}}"></script>
    <script src="{{asset('frontend/js/wow.js')}}"></script>
    <script src="{{asset('frontend/js/validation.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('frontend/js/appear.js')}}"></script>
    <script src="{{asset('frontend/js/scrollbar.js')}}"></script>
    <script src="{{asset('frontend/js/isotope.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/js/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('frontend/js/nav-tool.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('frontend/js/script.js')}}"></script>
