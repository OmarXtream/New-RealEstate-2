@extends('frontend.layouts.app')

@section('content')
        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(frontend/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(frontend/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>تم الإرسال بنجاح</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->



        <!-- ragister-section -->
        <section class="contact-section">
           

            <div class="auto-container mb-5">
                <div class="row align-items-center clearfix text-center">
    
                   
                    
                    <h1 class="mx-auto">شكرا لكم , سيتم التواصل معكم</h1>

                </div>
            </div>
        </section>

@endsection
