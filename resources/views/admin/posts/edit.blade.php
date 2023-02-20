@extends('backend.layouts.app')

@section('title', 'Edit Post')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.posts.update',$post->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>تعديل منشور</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                            <label class="form-label">عنوان المنشور</label>
                        </div>
                    </div>

                    <div class="form-group">
                        @if($post->status)
                            @php 
                                $checked = 'checked'; 
                            @endphp
                        @else
                            @php 
                                $checked = ''; 
                            @endphp
                        @endif
                        <input type="checkbox" id="published" name="status" class="filled-in" value="1" {{$checked}}/>
                        <label for="published">نشر</label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">المحتوى</label>
                        <textarea name="body" id="summary-ckeditor">{{$post->body}}</textarea>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>النوع</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float" dir="rtl">
                        <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                            <label for="categories">اختيار النوع</label>
                            <select name="categories[]" class="form-control show-tick" id="categories" multiple data-live-search="true">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float" dir="rtl">
                        <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                            <label for="tags">اختر الموضوع</label>
                            <select name="tags[]" class="form-control show-tick" id="tags" multiple data-live-search="true">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="form-label">صورة مميزه للمنشور</label>
                        <input type="file" name="image">
                    </div>


                    <a href="{{route('admin.posts.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>رجوع</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>تحديث</span>
                    </button>

                </div>
            </div>
        </div>
        </form>
    </div>

    {{-- SELECTED CATEGORIES --}}
    @php
        $categories = [];
    @endphp
    @foreach($post->categories as $category)
        @php 
            $categories[] = $category->id;
        @endphp
    @endforeach

@endsection


@push('scripts')

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script>
        @php
            $selectedcategory = json_encode($categories);
            $selectedtags = json_encode($selectedtag);
        @endphp

        $('#categories').selectpicker();
        $('#categories').selectpicker('val',{{$selectedcategory}});

        $('#tags').selectpicker();
        $('#tags').selectpicker('val',{{$selectedtags}});
        
    </script>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('admin.posts.upload.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>    
  
@endpush
