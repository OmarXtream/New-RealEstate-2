@extends('frontend.layouts.app')

@section('content')
        <!-- feature-style-two -->
        <section class="feature-style-two sec-pad">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>العقارات</h5>
                    <h2>العقارات المميزه</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
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
                                    <div class="author pull-left">
                                        <figure class="author-thumb"><img src="{{Storage::url('users/'.$property->user->image)}}" alt=""></figure>
                                        <h6>{{ $property->user->name }}</h6>
                                    </div>
                                    <div class="buy-btn pull-right"><a href="{{ route('property.show',$property->slug) }}">{{ ucfirst($property->type) }} - {{ $property->purpose }}</a></div>
                                </div>
                                <div class="title-text"><h4><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h4></div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>تبدأ من</h6>
                                        <h4>{{ $property->price }}</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href="{{ route('property.show',$property->slug) }}"><i class="icon-12"></i></a></li>
                                        <li><a href="{{ route('property.show',$property->slug) }}"><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                <p>{{ str_limit( $property->title, 18 ) }}</p>
                                <ul class="more-details clearfix">
                                    <li><i class="icon-14"></i>غرف النوم: {{ $property->bedroom}}</li>
                                    <li><i class="icon-15"></i>دورات المياه: {{ $property->bathroom}}</li>
                                    <li><i class="icon-16"></i>المساحة الارضية: {{ $property->area}}</li>
                                </ul>
                                <div class="btn-box"><a href="{{ route('property.show',$property->slug) }}" class="theme-btn btn-two">تفاصيل أكثر</a></div>
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
                                <h5>خدماتنا</h5>
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
        {{-- <section class="testimonial-style-two" style="background-image: url({{asset('frontend/images/shape/shape-1.png')}});">
            <div class="auto-container">
                <div class="sec-title" style="text-align: center">
                    <h5>الشهائد والتوصيات</h5>
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
                                        <h4>{{$testimonial->name}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- testimonial-style-two end -->


        <!-- clients-section -->
        <section class="clients-section bg-color-1">
            <div class="pattern-layer" style="background-image: url(frontend/images/shape/shape-1.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h5>شركائنا</h5>
                            <h2>في الروابي نفتخر بشركاء النجاح الذين يقدمون الدعم لنا في المشروعات العقارية والتجارية المختلفة </h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="clients-logo">
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
<script>
    $(function(){
        var js_properties = <?php echo json_encode($properties);?>;
        js_properties.forEach(element => {
            if(element.rating){
                var elmt = element.rating;
                var sum = 0;
                for( var i = 0; i < elmt.length; i++ ){
                    sum += parseFloat( elmt[i].rating ); 
                }
                var avg = sum/elmt.length;
                if(isNaN(avg) == false){
                    $("#propertyrating-"+element.id).rateYo({
                        rating: avg,
                        starWidth: "20px",
                        readOnly: true
                    });
                }else{
                    $("#propertyrating-"+element.id).rateYo({
                        rating: 0,
                        starWidth: "20px",
                        readOnly: true
                    });
                }
            }
        });
    })
</script>
@endsection