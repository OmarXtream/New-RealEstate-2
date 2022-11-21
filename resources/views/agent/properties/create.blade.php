@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section class="section" dir="rtl" style="text-align: right">
        <div class="container">
            <div class="row" dir="rtl">


                <div class="col s12 m9 mt-2 mb-5">
                    <h4 class="agent-title text-center mt-5 mb-5">إنشاء عقار</h4>

                    <div class="agent-content">

                        <form action="{{route('agent.properties.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="form-control" data-length="200">
                                    <label for="title">إسم العقار</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="price" name="price" type="number" class="form-control">
                                    <label for="price">السعر</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="area" name="area" type="number" class="form-control">
                                    <label for="area">المساحة الارضية</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="bedroom" name="bedroom" type="number" class="form-control">
                                    <label for="bedroom">غرف</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="bathroom" name="bathroom" type="number" class="form-control">
                                    <label for="bathroom">دورات المياه</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="city" name="city" type="text" class="form-control">
                                    <label for="city">المدينة</label>
                                </div>
                                <div class="input-field col s8">
                                    <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                    <label for="address">عنوان العقار</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <p>
                                        <label>
                                            <input type="checkbox" name="featured" class="filled-in" checked="checked" />
                                            <span>مميز؟</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s9">
                                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                                    <label for="description">الوصف</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s3">
                                    <label class="label-custom" for="type">الغرض</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="type" value="house" type="radio"  />
                                            <span>بيع</span>
                                        </label>
                                    <p>
                                    </p>
                                        <label>
                                            <input class="with-gap" name="type" value="apartment" type="radio"  />
                                            <span>تأجير</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col s3">
                                    <label class="label-custom" for="purpose">النوع</label>
                                    <p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="sale" type="radio"  />
                                            <span>بيت</span>
                                        </label>
                                    <p>
                                    </p>
                                        <label>
                                            <input class="with-gap" name="purpose" value="rent" type="radio"  />
                                            <span>شقة</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="input-field col s6">
                                    <select multiple name="features[]">
                                        <option value="" disabled selected>اختيار خصائص</option>
                                        @foreach($features as $feature)
                                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>صورة مميزه</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input style="display:none" class="file-path form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="input-field col s6">
                                    <input id="location_latitude" name="location_latitude" type="text" class="form-control">
                                    <label for="location_latitude">Latitude</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="location_longitude" name="location_longitude" type="text" class="form-control">
                                    <label for="location_longitude">Longitude</label>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="video" name="video" type="text" class="form-control">
                                    <label for="video">رابط مقطع يوتيوب</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>المساحة الارضية</span>
                                        <input type="file" name="floor_plan">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="nearby" name="nearby" class="materialize-textarea"></textarea>
                                    <label for="nearby">Nearby</label>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn indigo">
                                        <span>رفع صور للعقار</span>
                                        <input type="file" name="gallaryimage[]" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input style="display:none" class="file-path form-control" type="text" placeholder="Upload one or more images">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m-t-30">
                                    <button class="btn btn-success waves-effect waves-light btn-large indigo darken-4" type="submit">
                                        رفع
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('input#title, textarea#nearby').characterCounter();
        $('select').formSelect();
    });

</script>
@endsection