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
                    <h1>حلول تمويلية</h1>
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
              <h5 style="font-weight: bold;color:black;">فضلاً قم بملىء كل الحقول</h5>
            </div>
            @endif
            @if (session()->has('message'))
            <div class="text-center alert alert-light">
                <h3 style="font-weight: bold;color:black;">{{ session('message') }}</h3>
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


                                <form action="{{route('InfoForm.create')}}" method="POST">
                                    @csrf
                                            <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="الإسم">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="رقم الهاتف">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control" id="Age" name="Age" type="number"  value="{{ old('Age') }}" placeholder="العمر">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select name="type" class="browser-default form-control">
                                                <option value="" disabled selected>قطاع الوظيفة</option>
                                                <option value="1">قطاع عسكري</option>
                                                <option value="2">قطاع مدني</option>
                                                <option value="3">قطاع خاص</option>
                                            </select>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="content-box">
                            <div class="sec-title" style="text-align: right">
                                <h5>المعلومات المالية</h5>
                            </div>
                            <div class="form-inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input id="commitments" value="{{ old('commitments') }}" placeholder="الإلتزامات الشهرية" name="commitments" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input id="bank" placeholder="البنك" value="{{ old('bank') }}" name="bank" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input id="salary" placeholder="الراتب" value="{{ old('salary') }}" name="salary" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select name="supported" class="browser-default form-control">
                                                <option value="" disabled selected>مدعوم من سكني؟</option>
                                                <option value="1">لا</option>
                                                <option value="2">نعم</option>
            
                                            </select>
                                                    </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea placeholder="الملاحظات" id="notes" name="notes" class="form-control">{{ old('notes') }}</textarea>
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
