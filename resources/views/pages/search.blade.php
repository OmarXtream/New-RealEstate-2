@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(frontend/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url(frontend/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>البحث عن عقار</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">الرئيسية</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar property-sidebar">
                    <div class="filter-widget sidebar-widget">
                        <div class="widget-title">
                            <h5 class="text-center font-weight-bold">معلومات العقار</h5>
                        </div>
                        <form class="sidebar-search" action="{{ route('search')}}" method="GET">

                        <div class="widget-content">
                            <div class="form-group" style="text-align: right;">
                                <label>الموقع</label>
                                <div class="field-input">
                                    <input class="form-control" type="text" name="city" placeholder="مدينة-منطقة" required="">
                                </div>
                            </div>

                            <div class="select-box" style="text-align: right;">
                                <select name="type" class="wide" >
                                    <option value="" data-display="اختر النوع" disabled selected>اختر النوع</option>
                                    <option value="شقة">شقة</option>
                                    <option value="بيت">بيت</option>
                                    <option value="ملحق">ملحق</option>
                                    <option value="عمارة">عمارة</option>
                                </select>
                            </div>
                            <div class="select-box" style="text-align: right;">
                                <select name="purpose" class="wide" >
                                    <option value="" data-display="اختر الغرض" disabled selected>اختر الغرض</option>
                                    <option value="rent">إيجار</option>
                                    <option value="sale">بيع</option>
                                </select>
                            </div>

                            <div class="select-box" style="text-align: right;">
                                <select name="bedroom" class="wide" >
                                    <option value="" disabled selected>اختر غرف</option>
                                    @foreach($bedroomdistinct as $bedroom)
                                        <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                    @endforeach
                                    </select>
                            </div>

                            <div class="select-box" style="text-align: right;">
                                <select name="bathroom" class="wide" >
                                    <option value="" disabled selected>اختر دورات المياة</option>
                                    @foreach($bathroomdistinct as $bathroom)
                                    <option value="{{$bathroom->bathroom}}">{{$bathroom->bathroom}}</option>
                                @endforeach
                                    </select>
                            </div>

                            <div class="form-group" style="text-align: right;">
                                <div class="field-input">
                                    <input class="form-control" type="number" name="minprice" placeholder="أقل سعر" required="">
                                </div>
                            </div>

                            <div class="form-group" style="text-align: right;">
                                <div class="field-input">
                                    <input class="form-control" type="number" name="maxprice" placeholder="أعلى سعر" required="">
                                </div>
                            </div>

                            <div class="form-group" style="text-align: right;">
                                <div class="field-input">
                                    <input class="form-control" type="number" name="minarea" placeholder="أقل مساحة أرضية" required="">
                                </div>
                            </div>

                            
                            <div class="form-group" style="text-align: right;">
                                <div class="field-input">
                                    <input class="form-control" type="number" name="maxarea" placeholder="أعلى مساحة أرضية" required="">
                                </div>
                            </div>

                            <div class="form-group" style="text-align: right;">
                                <div class="field-input">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>
                                        مميز
                                    </label>
                                    </div>
                            </div>
                            <div class="filter-btn">
                                <button type="submit" class="theme-btn btn-one"><i class="fas fa-filter"></i>&nbsp;بحث</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">
                            @foreach($properties as $property)
                            <div class="deals-block-one">
                                <div class="inner-box">

                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                    <div class="image-box">
                                        <figure class="image"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                    </div>
                                    @else
                                    <div class="image-box">
                                        <figure class="image"><img src="frontend/images/resource/deals-3.jpg" alt=""></figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                    </div>

                                    @endif


                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="{{ route('property.show',$property->slug) }}">{{$property->title}}</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>{{ $property->type }} - {{ $property->purpose }}</h6>
                                                <h4>${{ $property->price }}</h4>
                                            </div>
                                            <div class="author-box pull-right">
                                                    <span>{{ ucfirst($property->city) }} - {{ ucfirst($property->address) }}</span>
                                            </div>
                                        </div>
                                        <ul class="more-details clearfix">
                                            <li><i class="icon-14"></i>غرف نوم: <strong>{{ $property->bedroom}}</strong></li>
                                            <li><i class="icon-15"></i>دورات مياه: <strong>{{ $property->bathroom}}</strong></li>
                                            <li><i class="icon-16"></i>مساحة أرضية: <strong>{{ $property->area}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')

@endsection