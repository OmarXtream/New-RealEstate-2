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
        <!-- banner-style-two end -->
