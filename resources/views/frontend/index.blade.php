@extends('frontend.layouts.app')

@section('content')
        <!-- feature-style-two -->
        <section class="feature-style-two sec-pad">
            <div class="auto-container">
                <div class="sec-title">
                    <h4 style="color: #C98816">العقارات</h4>
                    <h2 style="color: black;">العقارات المميزه</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-two">
                    @foreach($properties as $property)

                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                <figure class="image"><img src="{{Storage::url('property/'.$property->image)}}" alt=""></figure>
                                @else
                                <figure class="image"><img src="{{asset('frontend/images/feature/feature-1.jpg')}}" alt=""></figure>
                                @endif

                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">مميز</span>
                            </div>
                            <div class="lower-content">
                                <div class="author-info clearfix">
                                  
                                     <div class="buy-btn pull-right"><a href="{{ route('property.show',$property->slug) }}">{{ ucfirst($property->type) }} - {{ $property->purpose }}</a></div>
                                     <div class="title-text"><h4><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h4></div>

                                </div>
                                 <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>تبدأ من</h6>
                                              <h4 dir="rtl">   {{ $property->price }} ريال </h4> 
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href="{{ route('property.show',$property->slug) }}"><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                 <ul class="more-details clearfix" dir="rtl">
                                 <center>

                                    <i class="icon-14"> غرف: {{ $property->bedroom}}  </i>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;

                                    <i class="icon-15"> دورات المياه : {{ $property->bathroom}}  </i>
                                    <br>
                                      <i class="icon-16"> المساحة الارضية: {{ $property->area}} </i> 
</center>

                                 </ul>
                                 <center>

                                <div class="btn-box"><a href="{{ route('property.show',$property->slug) }}" class="theme-btn btn-two">تفاصيل أكثر</a></div>
                                </center>
    </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="more-btn centred"><a href="{{ route('property') }}" class="theme-btn btn-one"> جميع العقارات</a></div>
            </div>
        </section>
        <!-- feature-style-two end -->


                <!-- chooseus-section -->
                <section class="chooseus-section alternate-2 bg-color-1">
                    <div class="auto-container">
                        <div class="upper-box clearfix">
                            <div class="sec-title">
                                <h4 style="color: #C98816">خدماتنا</h4>
                                <h2>لماذا تختارنا؟</h2>
                            </div>
                        </div>
                        <div class="lower-box">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                                    <div class="chooseus-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-19"></i></div>
                                            <h4>العقار الحديث</h4>
                                            <p>توظـيف وتطـويع التقنيـات الحديثـة لبنـاء بيئـة استثمارية محليـة واعـدة</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                                    <div class="chooseus-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-26"></i></div>
                                            <h4>الإستثمار العقاري الناجح</h4>
                                            <p>طـرح آليـات جديـدة للاستثمار تواكب حاجات المجتمع وتناسب كافة شـرائحه</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                                    <div class="chooseus-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-21"></i></div>
                                            <h4>سعي دائم إلى التفوق</h4>
                                            <p>تأصيـل نمـوذج مثالي للاستثمار العقـاري يمـزج بيـن الأصـالة والمستقبل </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- chooseus-section end -->
        
        <!-- testimonial-style-two -->
        <section class="testimonial-style-two" style="background-image: url(frontend/images/shape/shape-1.png);">
            <div class="auto-container">
                <div class="sec-title" style="text-align: center">
                    <h4 style="color: black">الشهادات والتوصيات</h4>
                    <h2>ماذا يقول عنا عملائنا؟</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 inner-column">
                        <div class="single-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                            @foreach($testimonials as $testimonial)

                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-18"></i></div>
                                    <div class="text">
                                        <h3>{{$testimonial->testimonial}}</h3>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb"><img src="{{Storage::url('testimonial/'.$testimonial->image)}}" alt=""></figure>
                                        <h4 style="color: black">{{$testimonial->name}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!-- testimonial-style-two end -->


        <!-- clients-section -->
        <section class="clients-section bg-color-1">
            <div class="pattern-layer" style="background-image: url(frontend/images/shape/shape-1.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h4 style="color: #C98816">شركائنا</h4>
                            <h2>في الروابي نفتخر بشركاء النجاح الذين يقدمون الدعم لنا في المشروعات العقارية والتجارية المختلفة </h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                             <ul class="logo-list clearfix">
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/1.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/2.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/3.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/4.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/5.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/6.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/7.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/8.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/9.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/10.png')}}" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/11.png')}}" alt=""></a></figure>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- clients-section end -->




@endsection

@section('scripts')

@endsection