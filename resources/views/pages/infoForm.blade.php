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


                                <form action="{{route('InfoForm.create')}}" method="POST">
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
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input class="form-control @if ($errors->has('Age')) is-invalid @endif" id="Age" name="Age" type="number"  value="{{ old('Age') }}" placeholder="* العمر">
                                            @if ($errors->has('Age'))
                                            <span class="text-danger">{{ $errors->first('Age') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select name="type" class="browser-default form-control @if ($errors->has('type')) is-invalid @endif">
                                                <option value="" disabled selected>* قطاع الوظيفة</option>
                                                <option value="1">قطاع عسكري</option>
                                                <option value="2">قطاع مدني</option>
                                                <option value="3">قطاع خاص</option>
                                            </select>
                                            @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                            @endif
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
                                            <input id="commitments" value="{{ old('commitments') }}" placeholder="* الإلتزامات الشهرية" name="commitments" type="text" class="form-control @if ($errors->has('commitments')) is-invalid @endif">
                                            @if ($errors->has('commitments'))
                                            <span class="text-danger">{{ $errors->first('commitments') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input id="bank" placeholder="* البنك" value="{{ old('bank') }}" name="bank" type="text" class="form-control @if ($errors->has('bank')) is-invalid @endif">
                                            @if ($errors->has('bank'))
                                            <span class="text-danger">{{ $errors->first('bank') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input id="salary" placeholder="* الراتب" value="{{ old('salary') }}" name="salary" type="text" class="form-control @if ($errors->has('salary')) is-invalid @endif">
                                            @if ($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <select name="supported" class="browser-default form-control @if ($errors->has('supported')) is-invalid @endif">
                                                <option value="" disabled selected>* مدعوم من سكني؟</option>
                                                <option value="1">لا</option>
                                                <option value="2">نعم</option>
            
                                            </select>
                                            @if ($errors->has('supported'))
                                            <span class="text-danger">{{ $errors->first('supported') }}</span>
                                            @endif
                                                    </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea placeholder="الملاحظات" id="notes" name="notes" class="form-control @if ($errors->has('notes')) is-invalid @endif">{{ old('notes') }}</textarea>
                                            @if ($errors->has('notes'))
                                            <span class="text-danger">{{ $errors->first('notes') }}</span>
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
