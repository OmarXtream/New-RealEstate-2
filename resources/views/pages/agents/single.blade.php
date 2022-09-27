@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8 mt-5">

                    <div class="card horizontal card-no-shadow m-b-60">
                        <div class="card-image agent-image">
                            <img src="{{Storage::url('users/'.$agent->image)}}" alt="{{ $agent->username }}" class="imgresponsive">
                        </div>
                        <div class="card-stacked p-l-15">
                            <div class="">
                                <h5 class="">{{ $agent->name }}</h5>
                                <strong>{{ $agent->email }}</strong>
                            </div>
                            <div class="">
                                <p>{{ $agent->about }}</p>
                            </div>
                        </div>
                    </div>

                    <h5 class="uppercase">قائمة عقارات الوسيط: {{ $agent->name }}</h5>

                    {{-- AGENT PROPERTIES --}}
                    @foreach($properties as $property)

                        <div class="card horizontal card-no-shadow border1">
                            <div class="card-image horizontal-bg-image">
                                <span class="card-image-bg" style="background-image:url({{Storage::url('property/'.$property->image)}});"></span>
                            </div>
                            <div class="card-stacked">
                                <div class="p-20 property-content">
                                    <span class="card-title search-title" title="{{$property->title}}">
                                        <a href="{{ route('property.show',$property->slug) }}">{{ str_limit($property->title,25) }}</a>
                                    </span>
                                    <h5>
                                        &dollar;{{ $property->price }}
                                        <small class="right p-r-10">{{ $property->type }} for {{ $property->purpose }}</small>
                                    </h5>
                                </div>

                                <div class="card-action property-action">
                                    <span class="btn-flat">
                                        أسره: <strong>{{ $property->bedroom}}</strong> 
                                    </span>
                                    <span class="btn-flat">
                                        دورات مياه: <strong>{{ $property->bathroom}}</strong> 
                                    </span>
                                    <span class="btn-flat">
                                        منطقة: <strong>{{ $property->area}}</strong> Sq Ft
                                    </span>
                                    
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div class="m-t-30 m-b-60 center">
                        {{ $properties->links() }}
                    </div>

                </div>

                <div class="col s12 m4">
                    <div class="clearfix">

                        <div>
                            <ul class="collection with-header m-t-0">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0 mt-5 mb-5 text-right ">التواصل مع الوسيط</h5>
                                </li>
                                <li class="collection agent-message">
                                    <form class="agent-message-box" action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                            
                                        <div class="box">
                                            <input class="form-control" type="text" name="name" placeholder="الإسم">
                                        </div>
                                        <div class="box">
                                            <input class="form-control" type="email" name="email" placeholder="البريد الإلكتروني">
                                        </div>
                                        <div class="box">
                                            <input class="form-control" type="number" name="phone" placeholder="رقم الهاتف">
                                        </div>
                                        <div class="box">
                                            <textarea class="form-control" name="message" placeholder="الرسالة"></textarea>
                                        </div>
                                        <div class="box mb-5">
                                            <button class="form-control" id="msgsubmitbtn" class="btn waves-effect waves-light w100 indigo" type="submit">
                                                إرسال
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(function(){
            $(document).on('submit','.agent-message-box',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('property.message') }}";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('LOADING...<i class="material-icons left">rotate_right</i>');
                    },
                    success: function(data) {
                        if (data.message) {
                            M.toast({html: data.message, classes:'green darken-4'})
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: xhr.statusText, classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('SEND<i class="material-icons left">send</i>');
                    },
                    dataType: 'json'
                });

            })
        })
    </script>
@endsection