<section class="banner-style-two centred">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none owl-dots-none">

        <div class="slide-item">
            <div class="image-layer" style="background-image:url(https://k.top4top.io/p_246729yd21.jpg)"></div>

            <div class="auto-container">
                <div class="inner-box">
     
                    <div class="content-box">
                        <h2>البحث عن عقارات للبيع</h2>
                        <br>
                        <p>مع الروابي يمكنك ان تشتري او تبيع عقاراتك بكل سهولة.</p>
                        <br>

                        <div class="button-box">
                            <br>
                            <a href="{{route('property')}}" class="theme-btn btn-one">البحث عن عقار</a>
                        </div>
                    </div>
                    <figure class="image-box">
                        <img src="https://k.top4top.io/p_246729yd21.jpg" alt="" style="width:1920PX;100%;"></figure>
                </div> 
            </div>
        </div>

        @if($sliders)
        @foreach($sliders as $slider)

        <div class="slide-item">
            <div class="image-layer" style="background-image:url({{Storage::url('slider/'.$slider->image)}})"></div>
            <div class="auto-container">
                <div class="inner-box">
                <br>

                <br>

                <br>

                    <div class="content-box">
                        <h2>{{ $slider->title }} </h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                    <figure class="image-box"><img src="{{Storage::url('slider/'.$slider->image)}}" alt="" style="width:1920PX;height:100%;"></figure>
                </div> 
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>

      
        <!-- search-field-section -->
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <div class="tabs-box">
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons centred clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1">هدفنا</li>
                                    <li class="tab-btn" data-tab="#tab-2">رسالتنا</li>
                                    <li class="tab-btn" data-tab="#tab-3">رؤيتنا</li>
                                </ul>
                            </div>


                            <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">

                                        <div class="top-search">
                                        <div class="text">
                                            <br>
                                            <center>
                                    <p>                 أن نكون الأكثر جدارة في مجال التطوير العقاري مميزة ذات تصاميم عصرية،
                                         وبشكل يحقق له الحياة التي يتمناها، تحقيقاً لشعارنا الذي نتبناه “نبني الحياة         </p>
                               <br>
</center>

                                </div>
                                        </div>

                                        <div class="switch_btn_one ">
                                        ...
                                        </div>

                                    </div>

                                </div>

                                <div class="tab" id="tab-2">
                                    <div class="inner-box">

                                        <div class="top-search">
                                        <div class="text">
                                            <br>
                                            <center>
                                    <p>  العمل على انجاز أفضل مشاريع التطوير العقاري التي تتمتع بأعلى درجات الجودة مع الالتزام بتطبيق أرفع المعايير والمواصفات وتقديم وحدات سكنية متميزة
                                                  </p>
                               <br>
</center>

                                </div>
                                        </div>

                                        <div class="switch_btn_one ">
                                        ...
                                        </div>

                                    </div>

                                </div>


                                <div class="tab" id="tab-3">
                                <div class="inner-box">

<div class="top-search">
<div class="text">
                                            <br>
                                            <center>
                                            <p class="grey-text text-lighten-4">أن نكون الشركة الرائدة في مجال التطوير والاستثمار العقاري من 
                                                خلال تقديم منتجات هي خيار عملائنا الأول والأمثل</p>

</center>

                                </div>
</div>

<div class="switch_btn_one ">
...
</div>

</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- search-field-section end -->
