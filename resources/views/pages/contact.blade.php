@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
       <!--Page Title-->
       <section class="page-title-two bg-color-1 centred">
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
            <h1>تواصل معنا</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">الرئيسية</a></li>
            </ul>
        </div>
    </div>
</section>
<hr>
<section class="contact-section bg-color-1">
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title" style="text-align: center">
                        <h5>التواصل</h5>
                        <h2>تواصل معنا</h2>
                    </div>
                    <div class="form-inner">
                        <form id="contact-us" action="" method="POST">
                            @csrf
                            @auth
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endauth

                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    
                                    <input type="text" id="name" name="name" placeholder="الإسم" @auth value="{{ auth()->user()->name }}" readonly @endauth required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" id="email" name="email" placeholder="البريد الإلكتروني"  @auth value="{{ auth()->user()->email }}" readonly @endauth required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" id="phone" name="phone" placeholder="رقم الهاتف" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea id="message" name="message" placeholder="الرسالة"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn btn-one" type="submit" id="msgsubmitbtn" name="submit-form">إرسال</button>
                                </div>
                                <h1 class="text-center" id="result"></h1>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">
                    <div class="contact-content">
                        <h4 style="text-align: center;" class="contact-title">تواصل معنا</h4>

                        <form id="contact-us" action="" method="POST">
                            @csrf
                            <input type="hidden" name="mailto" value="{{ $contactsettings[0]['email'] ?? 'p4alam@gmail.com' }}">

                            @auth
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endauth

                            @auth
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name" name="name" type="text" class="validate" value="{{ auth()->user()->name }}" readonly>
                                    <label for="name">الإسم</label>
                                </div>
                            @endauth
                            @guest
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name" name="name" type="text" class="validate">
                                    <label for="name">الإسم</label>
                                </div>
                            @endguest

                            @auth
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" class="validate" value="{{ auth()->user()->email }}" readonly>
                                    <label for="email">البريد الإلكتروني</label>
                                </div>
                            @endauth
                            @guest
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">البريد الإلكتروني</label>
                                </div>
                            @endguest

                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone" name="phone" type="number" class="validate">
                                <label for="phone">رقم الهاتف</label>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                                <label for="message">الرسالة</label>
                            </div>
                            
                            <button id="msgsubmitbtn" class="btn waves-effect waves-light indigo darken-4 btn-large" type="submit">
                                <span>إرسال</span>
                                <i class="material-icons right">send</i>
                            </button>

                        </form>

                    </div>
                </div> <!-- /.col -->

                <div class="col s12 m4">
                    <div class="contact-sidebar">
                        <div class="m-t-30">
                            <i class="material-icons left">call</i>
                            <h6 class="uppercase">إتصل بنا</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['phone'])
                                <h6 class="bold m-l-40">{{ $contactsettings[0]['phone'] }}</h6>
                            @endif
                        </div>
                        <div class="m-t-30">
                            <i class="material-icons left">mail</i>
                            <h6 class="uppercase">بريدنا الإلكتروني</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['email'])
                                <h6 class="bold m-l-40">{{ $contactsettings[0]['email'] }}</h6>
                            @endif
                        </div>
                        <div class="m-t-30">
                            <i class="material-icons left">map</i>
                            <h6 class="uppercase">العنوان</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['address'])
                                <h6 class="bold m-l-40">{!! $contactsettings[0]['address'] !!}</h6>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

@endsection

@section('scripts')
    <script>

        $(function(){
            $(document).on('submit','#contact-us',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('contact.message') }}";
                var btn = $('#msgsubmitbtn');
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('جاري الإرسال');
                    },
                    success: function(data) {
                        if (data.message) {
                            $('#result').empty().append(data.message);
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form#contact-us')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إرسال');
                    },
                    dataType: 'json'
                });

            })
        })

    </script>
@endsection