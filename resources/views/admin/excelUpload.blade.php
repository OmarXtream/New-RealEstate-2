@extends('backend.layouts.app')

@section('title', 'رفع عقارات')

@push('styles')

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2 class="text-center">رفع عقارات - اكسل</h2>
                </div>
                <div class="body">
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
        
                    <form action="{{route('admin.import.excel.upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                     
                        <div class="form-group">
                            <input type="file" name="uploaded_file">
                            <label class="form-label">ملف الاكسل</label>

                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>إرسال</span>
                        </button>
                        <h5 style="color: red">تنويه: <br> 
                        
                        <ul style="color: red">
                            <li>يمنع تكرار البيانات المدخله</li>
                            <li>فضلاً التقيد بكتابة الانواع بشكل دقيق </li>
                            <li>الغرض: [ايجار , بيع] </li>
                            <li>نوع العقار: [شقة , ملحق , عمارة , بيت] </li>
                            @if(isset($lastFile) && !empty($lastFile))
                            <li><h3><a href="{{Storage::url('excels/'.$lastFile->file)}}"><b>اضغط هنا لتحميل اخر نسخة تم رفعها</b></a></h3></li>
                            @endif
                        </ul>

                        
                        </h5>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

@endsection


@push('scripts')


@endpush
