@extends('backend.layouts.app')

@section('title', 'Create Categories')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.categories.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>تراجع</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>انشاء تصنيف</h2>
                </div>
                @if(Session::has('errors'))
                <div class="text-center alert alert-light">
                    <h5 style="font-weight: bold;color:black">* فضلاً قم بملىء كل الحقول</h5>
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
                <div class="body">
                    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                                <label class="form-label">تصنيف</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>حفظ</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')



@endpush
