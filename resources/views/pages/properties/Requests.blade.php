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
                    <h1>طلب عقار</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->



        <!-- ragister-section -->
        <section class="contact-section">
            @if(Session::has('errors'))
            <div class="text-center alert alert-light">
                <h5 style="font-weight: bold;color:black">فضلاً قم بملىء كل الحقول</h5>
            @if($errors->any())
            {!! implode('', $errors->all('<p style="color:red">:message</p>')) !!}
            @endif
            </div>
            @endif
            @if (session()->has('message'))
            <div class="text-center alert alert-light">
                <h3 style="font-weight: bold; color:black">{{ session('message') }}</h3>
            </div>
            @endif

            <div class="auto-container">
                <div class="row align-items-center clearfix">
    
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title" style="text-align: right">
                                <h5>المعلومات الشخصية</h5>
                            </div>
                            <div class="form-inner">


                                <form action="{{route('PropertieRequest.create')}}" method="POST">
                                    @csrf
                                            <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="الإسم">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="رقم الهاتف">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="content-box">
                            <div class="sec-title" style="text-align: right">
                                <h5>تفاصيل العقار</h5>
                            </div>
                            <div class="form-inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="type" name="type" type="text" value="{{ old('type') }}" placeholder="نوع العقار">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="city" name="city" type="text" value="{{ old('city') }}" placeholder="مدينة العقار">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="rooms" name="rooms" type="number" value="{{ old('rooms') }}" placeholder="عدد الغرف">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="baths" name="baths" type="number" value="{{ old('baths') }}" placeholder="دورات المياه">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="min_price" name="min_price" type="text" value="{{ old('min_price') }}" placeholder="أقل قيمة للعقار">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="max_price" name="max_price" type="text" value="{{ old('max_price') }}" placeholder="أعلى قيمة للعقار">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 map-column">
                        <div class="content-box">
                            <div class="sec-title" style="text-align: right">
                                <h5>الأحياء</h5>
                            </div>
                            <div class="form-inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="first_district" name="first_district" type="text" value="{{ old('first_district') }}" placeholder="الحي الاول">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="Second_district" name="Second_district" type="text" value="{{ old('Second_district') }}" placeholder="الحي الثاني">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="Third_district" name="Third_district" type="text" value="{{ old('Third_district') }}" placeholder="الحي الثالث">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="Fourth_district" name="Fourth_district" type="text" value="{{ old('Fourth_district') }}" placeholder="الحي الرابع">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea id="details" name="details" class="form-control">{{ old('details') }}</textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                        <button class="theme-btn btn-one" type="submit" name="submit-form">إرسال</button>
                    </form>
                    </div>

                </div>
            </div>
        </section>

@endsection
