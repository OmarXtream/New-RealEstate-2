@extends('frontend.layouts.app')

@section('content')
            <!--Page Title-->
            <section class="page-title-two bg-color-1 centred mt-5">
            <div class="pattern-layer">
                <div class="pattern" style="background-image: url(frontend/images/shape/shape-9.png);"></div>
             </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                <br>
                    <br>      
                    <br>
                    <br>
                    <br>      
                    <br>
                    <h1>طلب تسويق عقار</h1>
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
                <h5 style="font-weight: bold;">* فضلاً قم بملىء كل الحقول</h5>
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


                                <form action="{{route('PropertiesMarkating.create')}}" method="POST">
                                    @csrf
                                            <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="* الإسم">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif                                    
                                            </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('phone')) is-invalid @endif" id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="*  رقم الهاتف">
                                            @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif                                
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
                                            <input class="form-control @if ($errors->has('type')) is-invalid @endif" id="type" name="type" type="text" value="{{ old('type') }}" placeholder="* نوع العقار">
                                            @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('city')) is-invalid @endif" id="city" name="city" type="text" value="{{ old('city') }}" placeholder="* مدينة العقار">
                                            @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('rooms')) is-invalid @endif" id="rooms" name="rooms" type="number" value="{{ old('rooms') }}" placeholder="* عدد الغرف">
                                            @if ($errors->has('rooms'))
                                            <span class="text-danger">{{ $errors->first('rooms') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('baths')) is-invalid @endif" id="baths" name="baths" type="number" value="{{ old('baths') }}" placeholder="* دورات المياه">
                                            @if ($errors->has('baths'))
                                            <span class="text-danger">{{ $errors->first('baths') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('price')) is-invalid @endif" id="price" name="price" type="number" value="{{ old('price') }}" placeholder="* قيمة العقار">
                                            @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 map-column">
                        <div class="content-box">
                            <div class="sec-title" style="text-align: right">
                                <h5>تفاصيل العقار</h5>
                            </div>
                            <div class="form-inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea id="details" name="details" class="form-control @if ($errors->has('details')) is-invalid @endif" placeholder="تفاصيل إضافيه">{{ old('details') }}</textarea>
                                            @if ($errors->has('details'))
                                            <span class="text-danger">{{ $errors->first('details') }}</span>
                                            @endif
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
