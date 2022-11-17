@extends('frontend.layouts.app')

@section('styles')
<style>
    #map {
        height: 320px;
    }

    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .jssora106 {display:block;position:absolute;cursor:pointer;}
    .jssora106 .c {fill:#fff;opacity:.3;}
    .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
    .jssora106:hover .c {opacity:.5;}
    .jssora106:hover .a {opacity:.8;}
    .jssora106.jssora106dn .c {opacity:.2;}
    .jssora106.jssora106dn .a {opacity:1;}
    .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

    .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
    .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;box-sizing:border-box;z-index:1;}
    .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
    .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
    .jssort101 .p:hover{padding:2px;}
    .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
    .jssort101 .p:hover.pdn{padding:0;}
    .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
    .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
    .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
    .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
    .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
</style>
@endsection

@section('content')
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(frontend/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url(frontend/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $property->title }}</h1>
        </div>
    </div>
</section>

    <!-- SINGLE PROPERTY SECTION -->
    <section class="property-details property-details-one">
        @if (session()->has('message'))
        <div class="text-center alert alert-light">
            <h3 style="font-weight: bold; color:#000">{{ session('message') }}</h3>
        </div>
        @endif
        <div class="auto-container">
            <div class="top-details clearfix">
                <div class="left-column pull-left clearfix">
                    <h3>{{ $property->title }}</h3>
                    <div class="author-info clearfix">
                        <div class="author-box pull-left">
                            <figure class="author-thumb"><img src="{{asset('frontend/images/feature/author-1.jpg')}}" alt=""></figure>
                            <h6>{{ $property->address }} <i class="fa fa-location"></i></h6>
                        </div>
                        @if($property->featured == 1)
                        <ul class="rating clearfix pull-left">
                            <li><i class="icon-39"></i></li>
                        </ul>
                        @endif

                    </div>
                </div>
                <div class="right-column pull-right clearfix">
                    <div class="price-inner clearfix">
                        <ul class="category clearfix pull-left px-auto">
                            <li><a href="#">{{ $property->purpose }}</a></li>
                            <li><span class="btn btn-small disabled b-r-20">غرف نوم: {{ $property->bedroom}} </span></li>
                            <li><span class="btn btn-small disabled b-r-20">دورات مياه: {{ $property->bathroom}} </span></li>
                            <li><span class="btn btn-small disabled b-r-20">المساحة الارضية: {{ $property->area}} متر مربع</span></li>
                            <li><span class="btn btn-small disabled b-r-20">المدينة: {{ $property->city}}</span></li>


                        </ul>
                        <div class="price-box pull-right pr-2">
                            <h3>{{ $property->price }} ريال</h3>
                        </div>
                    </div>
                </div>

                <div class="right-column pull-right clearfix mr-3">
                    <ul class="other-option pull-right clearfix">
                        <li><a href="#" onclick="CopyURL()"><i class="icon-37" title="مشاركة"></i></a></li>
                        @if(!$fav)
                        <li><a href="{{route('favorite.create',$property->id)}}"><i class="icon-13" title="المفضلة"></i></a></li>
                        @else
                        <li><a href="{{route('favorite.delete',$property->id)}}"><i class="icon-13" title="الغاء من المفضلة"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-details-content">
                        <div class="carousel-inner">
                            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">

                                @if(!$property->gallery->isEmpty())

                                @foreach($property->gallery as $gallery)

                                <div class="single-slider">

                                    <a class="lightbox" href="{{Storage::url('property/gallery/'.$gallery->name)}}">
                                    <figure class="image-box"><img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt=""></figure>
                                    </a>

                                </div>
                                @endforeach

                            @else
                                <div class="single-image">
                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                    <figure class="image-box"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></figure>
                                    @endif
                                </div>
                            @endif
                            </div>
                        </div>


                        <div class="discription-box content-widget">
                            <div class="title-box text-center">
                                <h4>وصف العقار</h4>
                            </div>
                            <div class="text text-right">
                                {!! $property->description !!}
                            </div>
                        </div>

                        @if($property->features)
                        <div class="discription-box content-widget">
                            <div class="title-box text-center">
                                <h4>مميزات العقار</h4>
                            </div>
                            <div class="text">
                                @foreach($property->features as $feature)
                                <p>{{$feature->name}}</p>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="discription-box content-widget">
                            <div class="title-box text-center">
                                <h4>تخطيط الارض</h4>
                            </div>
                            <div class="text">
                                @if(Storage::disk('public')->exists('property/'.$property->floor_plan) && $property->floor_plan)
                                <img src="{{Storage::url('property/'.$property->floor_plan)}}" alt="{{$property->title}}" class="image-box">
                            @endif
                            </div>
                        </div>



                        @if($videoembed)
                        <div class="discription-box content-widget">
                            <div class="title-box text-center">
                                <h4>مقطع فيديو للعقار</h4>
                            </div>
                            <div class="text">
                                {!! $videoembed !!}
                            </div>
                        </div>
                        @endif

                        <div class="discription-box content-widget">
                            <div class="title-box text-center">
                                <h4>{{ $property->comments_count }} تعليقات </h4>
                            </div>
                            <div class="text">
                                @foreach($property->comments as $comment)

                                @if($comment->parent_id == NULL)
                                    <div class="comment text-center">
                                        <div class="author-image">
                                            <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                        </div>
                                        <div class="content">
                                            <div class="author-name">
                                                <strong style="color:#0f172b;">{{ $comment->users->name }} -</strong>
                                                <span class="time">{{ $comment->created_at->diffForHumans() }}</span>

                                            </div>
                                            <div class="author-comment">
                                                {{ $comment->body }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div id="procomment-{{$comment->id}}"></div>
                                    </div>
                                @endif

                                @foreach($comment->children as $commentchildren)
                                    <div class="comment children">
                                        <div class="author-image">
                                            <span style="background-image:url({{ Storage::url('users/'.$commentchildren->users->image) }});"></span>
                                        </div>
                                        <div class="content">
                                            <div class="author-name">
                                                <strong>{{ $commentchildren->users->name }}</strong>
                                                <span class="time">{{ $commentchildren->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="author-comment">
                                                {{ $commentchildren->body }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @endforeach

                            </div>
                        </div>
                        @auth

                        <div class="form-inner">
                            <form class="default-form" action="{{ route('property.comment',$property->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="parent" value="0">


                                <div class="form-group">
                                    <textarea name="body" placeholder="التعليق"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">إرسال</button>
                                </div>
                            </form>
                        </div>
                        @endauth

                        @guest 
                        <div class="text-center">
                            <a href="{{ route('login') }}">
                            <h6 class="text-bold" style="color:#000">سجل الدخول لترك تعليق</h6>
                            </a>
                        </div>
                    @endguest

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="author-box">
                                <figure class="author-thumb"><img src="{{Storage::url('users/'.$property->user->image)}}" alt=""></figure>
                                <div class="inner">
                                    <h4>{{ $property->user->name }}</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $property->user->email }}</li>
                                        <li><a href="{{ route('agents.show',$property->agent_id) }}">التواصل مع الوسيط</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-inner">
                                <form class="default-form agent-message-box" action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="agent_id" value="{{ $property->user->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                <div class="form-group">
                                        <input type="text" name="name" placeholder="الإسم" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="البريد الإلكتروني" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="phone" placeholder="رقم الهاتف" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="الرسالة"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button id="msgsubmitbtn" type="submit" class="theme-btn btn-one">إرسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                
            </div>
        </div>
    </section>

    {{-- RATING --}}
    @php
        $rating = ($rating == null) ? 0 : $rating;
    @endphp

@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
    function CopyURL(){
        navigator.clipboard.writeText(window.location.href);
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.options.rtl = true;
    
        toastr.success('تم النسخ بنجاح','للمشاركة',{
                            closeButtor: true,
                            progressBar: true 
                        });}
    </script>
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // RATING
            $("#rateYo").rateYo({
                rating: <?php echo json_encode($rating); ?>,
                halfStar: true,
                starWidth: "26px"
            })
            .on("rateyo.set", function (e, data) {

                var rating = data.rating;
                var property_id = <?php echo json_encode($property->id); ?>;
                var user_id = <?php echo json_encode( auth()->id() ); ?>;
                
                $.post( "{{ route('property.rating') }}", { rating: rating, property_id: property_id, user_id: user_id }, function( data ) {
                    if(data.rating.rating){
                        M.toast({html: 'Rating: '+ data.rating.rating + ' added successfully.', classes:'green darken-4'})
                    }
                });
            });
            

            // // COMMENT
            // $(document).on('click','#commentreplay',function(e){
            //     e.preventDefault();
                
            //     var commentid = $(this).data('commentid');

            //     $('#procomment-'+commentid).empty().append(
            //         `<div class="comment-box">
            //             <form action="{{ route('property.comment',$property->id) }}" method="POST">
            //                 @csrf
            //                 <input type="hidden" name="parent" value="1">
            //                 <input type="hidden" name="parent_id" value="`+commentid+`">
                            
            //                 <textarea name="body" class="box" placeholder="Leave a comment"></textarea>
            //                 <input type="submit" class="btn indigo" value="Comment">
            //             </form>
            //         </div>`
            //     );
            // });

            // MESSAGE
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
                        $(btn).empty().append('جاري الإرسال..');
                    },
                    success: function(data) {
                        if (data.message) {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('تم الإرسال');
                        }
                    },
                    error: function(xhr) {
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إعادة الإرسال');
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                    },
                    dataType: 'json'
                });

            })
        })
    </script>
@endsection