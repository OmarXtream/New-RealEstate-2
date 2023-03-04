@extends('frontend.layouts.app')
@section('styles')
<style>
@import 'https://fonts.googleapis.com/css?family=Noto+Sans';

 .floating-chat {
     z-index: 999;
	 cursor: pointer;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 color: white;
	 position: fixed;
	 bottom: 30px;
	 right: 10px;
	 width: 80px;
	 height: 80px;
	 transform: translateY(70px);
	 transition: all 250ms ease-out;
	 border-radius: 50%;
	 opacity: 0;
	 background: -moz-linear-gradient(-45deg, #C98816 0, #C98816 25%, #C98816 50%, #C98816 75%, #C98816 100%);
	 background: -webkit-linear-gradient(-45deg, #C98816 0, #C98816 25%, #C98816 50%, #C98816 75%, #C98816 100%);
	 background-repeat: no-repeat;
	 background-attachment: fixed;
     margin-right: 5px;
}
 .floating-chat.enter:hover {
	 box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
	 opacity: 1;
}
 .floating-chat.enter {
	 transform: translateY(0);
	 opacity: 0.6;
	 box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.14);
}
 .floating-chat.expand {
    background-color:white !important;
     z-index: 999;
	 width: 300px;
	 max-height: 450px;
	 height: 450px;
	 border-radius: 5px;
	 cursor: auto;
	 opacity: 1;
}
 .floating-chat :focus {
	 outline: 0;
	 box-shadow: 0 0 3pt 2pt rgba(14, 200, 121, 0.3);
}
 .floating-chat button {
	 background: transparent;
	 color: white;
	 text-transform: uppercase;
	 border-radius: 3px;
	 cursor: pointer;
}
 .floating-chat .chat {
	 display: flex;
	 flex-direction: column;
	 position: absolute;
	 opacity: 0;
	 width: 1px;
	 height: 1px;
	 border-radius: 50%;
	 transition: all 250ms ease-out;
	 margin: auto;
	 top: 0;
	 left: 0;
	 right: 0;
	 bottom: 0;
}
 .floating-chat .chat.enter {
	 opacity: 1;
	 border-radius: 0;
	 margin: 10px;
	 width: auto;
	 height: auto;
}
 .floating-chat .chat .header {
	 flex-shrink: 0;
	 display: flex;
	 background: transparent;
}
 .floating-chat .chat .header .title {
	 flex-grow: 1;
	 flex-shrink: 1;
	 padding: 0 5px;
}
 .floating-chat .chat .header button {
	 flex-shrink: 0;
}
 .floating-chat .chat .messages {
	 padding: 10px;
	 margin: 0;
	 list-style: none;
	 overflow-y: scroll;
	 overflow-x: hidden;
	 flex-grow: 1;
	 border-radius: 4px;
	 background: transparent;
}
 .floating-chat .chat .messages::-webkit-scrollbar {
	 width: 5px;
}
 .floating-chat .chat .messages::-webkit-scrollbar-track {
	 border-radius: 5px;
	 background-color: rgba(25, 147, 147, 0.1);
}
 .floating-chat .chat .messages::-webkit-scrollbar-thumb {
	 border-radius: 5px;
	 background-color: rgba(25, 147, 147, 0.2);
}
 .floating-chat .chat .messages li {
	 position: relative;
	 clear: both;
	 display: inline-block;
	 padding: 14px;
	 margin: 0 0 20px 0;
	 font: 12px/16px 'Noto Sans', sans-serif;
	 border-radius: 10px;
	 background-color: rgba(25, 147, 147, 0.2);
	 word-wrap: break-word;
	 max-width: 81%;
}
 .floating-chat .chat .messages li:before {
	 position: absolute;
	 top: 0;
	 width: 25px;
	 height: 25px;
	 border-radius: 25px;
	 content: '';
	 background-size: cover;
}
 .floating-chat .chat .messages li:after {
	 position: absolute;
	 top: 10px;
	 content: '';
	 width: 0;
	 height: 0;
	 border-top: 10px solid rgba(25, 147, 147, 0.2);
}
 .floating-chat .chat .messages li.other {
	 animation: show-chat-odd 0.15s 1 ease-in;
	 -moz-animation: show-chat-odd 0.15s 1 ease-in;
	 -webkit-animation: show-chat-odd 0.15s 1 ease-in;
	 float: right;
	 margin-right: 45px;
	 color: #0ad5c1;
}
 .floating-chat .chat .messages li.other:before {
	 right: -45px;
	 background-image: url(https://github.com/Thatkookooguy.png);
}
 .floating-chat .chat .messages li.other:after {
	 border-right: 10px solid transparent;
	 right: -10px;
}
 .floating-chat .chat .messages li.self {
	 animation: show-chat-even 0.15s 1 ease-in;
	 -moz-animation: show-chat-even 0.15s 1 ease-in;
	 -webkit-animation: show-chat-even 0.15s 1 ease-in;
	 float: left;
	 margin-left: 45px;
	 color: #0ec879;
}
 .floating-chat .chat .messages li.self:before {
	 left: -45px;
	 background-image: url(https://github.com/ortichon.png);
}
 .floating-chat .chat .messages li.self:after {
	 border-left: 10px solid transparent;
	 left: -10px;
}
 .floating-chat .chat .footer {
	 flex-shrink: 0;
	 display: flex;
	 padding-top: 10px;
	 max-height: 90px;
	 background: transparent;
}
 .floating-chat .chat .footer .text-box {
	 border-radius: 3px;
	 background: rgba(25, 147, 147, 0.2);
	 min-height: 100%;
	 width: 100%;
	 margin-right: 5px;
	 color: #0ec879;
	 overflow-y: auto;
	 padding: 2px 5px;
}
 .floating-chat .chat .footer .text-box::-webkit-scrollbar {
	 width: 5px;
}
 .floating-chat .chat .footer .text-box::-webkit-scrollbar-track {
	 border-radius: 5px;
	 background-color: rgba(25, 147, 147, 0.1);
}
 .floating-chat .chat .footer .text-box::-webkit-scrollbar-thumb {
	 border-radius: 5px;
	 background-color: rgba(25, 147, 147, 0.2);
}
 @keyframes show-chat-even {
	 0% {
		 margin-left: -480px;
	}
	 100% {
		 margin-left: 0;
	}
}
 @-moz-keyframes show-chat-even {
	 0% {
		 margin-left: -480px;
	}
	 100% {
		 margin-left: 0;
	}
}
 @-webkit-keyframes show-chat-even {
	 0% {
		 margin-left: -480px;
	}
	 100% {
		 margin-left: 0;
	}
}
 @keyframes show-chat-odd {
	 0% {
		 margin-right: -480px;
	}
	 100% {
		 margin-right: 0;
	}
}
 @-moz-keyframes show-chat-odd {
	 0% {
		 margin-right: -480px;
	}
	 100% {
		 margin-right: 0;
	}
}
 @-webkit-keyframes show-chat-odd {
	 0% {
		 margin-right: -480px;
	}
	 100% {
		 margin-right: 0;
	}
}
 
</style>  
@endsection
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
                            <div class="image-box img-fluid">
                                @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                <figure class="image img-fluid" style="width:350px; height:350px;"><img class="img-fluid"  style="height: 100%"src="{{Storage::url('property/'.$property->image)}}" alt="property"></figure>
                                @else
                                <figure class="image img-fluid" style="width:350px; height:350px;"><img class="img-fluid" style="height: 100%" src="{{$property->image}}" alt="{{$property->title}}"></figure>
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
                                        <figure class="author-thumb"><img src="{{Storage::url('testimonial/'.$testimonial->image)}}" alt="user-img"></figure>
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
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/1.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/2.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/3.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/4.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/5.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/6.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/7.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/8.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/9.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/10.png')}}" alt="partner"></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="#"><img src="{{asset('frontend/partners/11.png')}}" alt="partner"></a></figure>

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
var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
    myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
    element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement(){
    window.location.replace("https://wa.me/966533522902");
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}
</script>
@endsection