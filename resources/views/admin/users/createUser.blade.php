@extends('backend.layouts.app')

@section('title', 'مستخدم جديد')

@push('styles')

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2 class="text-center">إنشاء حساب مستخدم</h2>
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
        
                    <form action="{{route('admin.userCreate.send')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                                <label class="form-label">الإسم</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" name="email" class="form-control">
                                <label class="form-label">البريد الإلكتروني</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="password" class="form-control">
                                <label class="form-label">كلمة المرور</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>إنشاء</span>
                        </button>

                    </form>
                    
                </div>
            </div>
        </div>

    </div>

@endsection


@push('scripts')


@endpush
