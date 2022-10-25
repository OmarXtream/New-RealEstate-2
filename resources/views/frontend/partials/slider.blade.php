<section class="banner-style-three rtl">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none owl-dots-none">

        <div class="slide-item rtl">
            <div class="pattern-box">
                <div class="pattern-1"></div>
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

        @if($sliders)
        @foreach($sliders as $slider)

        <div class="slide-item rtl">
            <div class="pattern-box">
                <div class="pattern-1"></div>
            </div>
            <div class="auto-container">
                <div class="inner-box">
                    <div class="content-box">
                        <h2>{{ $slider->title }} </h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                    <figure class="image-box"><img src="{{Storage::url('slider/'.$slider->image)}}" alt=""></figure>
                </div> 
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>
