<section class="banner-style-three rtl">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none owl-dots-none">
        <div class="slide-item rtl">
            <div class="pattern-box">
                <div class="pattern-1"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-8.png);"></div>
                <div class="pattern-3" style="background-image: url(assets/images/shape/shape-6.png);"></div>
                <div class="pattern-4" style="background-image: url(assets/images/shape/shape-7.png);"></div>
            </div>
            <div class="auto-container">
                <div class="inner-box">
                    <div class="content-box">
                        <h2>البحث عن عقارات للبيع والإيجار</h2>
                        <p>مع الروابي يمكنك ان تشتري او تبيع عقاراتك بكل سهولة.</p>
                        <div class="button-box">
                            <a href="{{route('property')}}" class="theme-btn btn-one">البحث عن عقار</a>
                        </div>
                    </div>
                    <figure class="image-box"><img src="https://k.top4top.io/p_246729yd21.jpg" alt=""></figure>
                </div> 
            </div>
        </div>

        <div class="slide-item rtl">
            <div class="pattern-box">
                <div class="pattern-1"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-8.png);"></div>
                <div class="pattern-3" style="background-image: url(assets/images/shape/shape-6.png);"></div>
                <div class="pattern-4" style="background-image: url(assets/images/shape/shape-7.png);"></div>
            </div>
            <div class="auto-container">
                <div class="inner-box">
                    <div class="content-box">
                        <h2>أفضل خيار للعقار !</h2>
                        <p>مع الروابي يمكنك ان تشتري او تبيع عقاراتك بكل سهولة.</p>
                        <div class="button-box">
                            <a href="{{route('property')}}" class="theme-btn btn-one">البحث عن عقار</a>
                        </div>
                    </div>
                    <figure class="image-box"><img src="https://k.top4top.io/p_2467os9iq1.jpg" alt=""></figure>
                </div> 
            </div>
        </div>

    </div>
</section>

{{--         
        <!-- banner-style-two -->
        <section class="banner-style-two centred">
            <div class="banner-carousel owl-theme owl-carousel owl-nav-none">

                @if($sliders)
                @foreach($sliders as $slider)

                <div class="slide-item">
                    <div class="image-layer" style="background-image:url({{Storage::url('slider/'.$slider->image)}})"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>{{ $slider->title }}</h2>
                            <p>{{ $slider->description }}</p>
                        </div>  
                    </div>
                </div>
    
                @endforeach
            @else 

            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{ asset('frontend/images/real_estate.jpg') }})"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h2>Slider Title Here</h2>
                        <p>Slider description Here.</p>
                    </div>  
                </div>
            </div>
            @endif
        
            </div>
        </section>
        <!-- banner-style-two end --> --}}
