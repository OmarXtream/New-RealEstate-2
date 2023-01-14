@extends('frontend.layouts.app')

@section('styles')
<style>
 .btn-share {
	 --btn-color: #f2b241;
	 position: relative;
	 padding: 16px 32px;
	 font-family: Roboto, sans-serif;
	 font-weight: 500;
	 font-size: 16px;
	 line-height: 1;
	 color: white;
	 background: none;
	 border: none;
	 outline: none;
	 overflow: hidden;
	 cursor: pointer;
	 filter: drop-shadow(0 2px 8px rgba(39, 94, 254, 0.32));
	 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}
 .btn-share::before {
	 position: absolute;
	 content: "";
	 top: 0;
	 left: 0;
	 z-index: -1;
	 width: 100%;
	 height: 100%;
	 background: var(--btn-color);
	 border-radius: 24px;
	 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}
 .btn-share .btn-text, .btn-share .btn-icon {
	 display: inline-flex;
	 vertical-align: middle;
	 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}
 .btn-share .btn-text {
	 transition-delay: 0.05s;
}
 .btn-share .btn-icon {
	 margin-left: 8px;
	 transition-delay: 0.1s;
}
 .btn-share .social-icons {
	 position: absolute;
	 top: 50%;
	 left: 0;
	 right: 0;
	 display: flex;
	 margin: 0;
	 padding: 0;
	 list-style-type: none;
	 transform: translateY(-50%);
}
 .btn-share .social-icons li {
	 flex: 1;
}
 .btn-share .social-icons li a {
	 display: inline-flex;
	 vertical-align: middle;
	 transform: translateY(55px);
	 transition: 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
}
 .btn-share .social-icons li a:hover {
	 opacity: 0.5;
}
 .btn-share:hover::before {
	 transform: scale(1.2);
}
 .btn-share:hover .btn-text, .btn-share:hover .btn-icon {
	 transform: translateY(-55px);
}
 .btn-share:hover .social-icons li a {
	 transform: translateY(0);
}
 .btn-share:hover .social-icons li:nth-child(1) a {
	 transition-delay: 0.15s;
}
 .btn-share:hover .social-icons li:nth-child(2) a {
	 transition-delay: 0.2s;
}
 .btn-share:hover .social-icons li:nth-child(3) a {
	 transition-delay: 0.25s;
}
 


    p,h2,h3,h4,h5,h6 {
    color: black !important;
    font-weight: bold;   
    }
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
<section class="page-title-two bg-color-1 centred mt-5">
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
                <div class="left-column text-center clearfix">
                    <h3>{{ $property->title }}</h3>
                    <div class="author-info clearfix">
                        <div class="author-box pull-left">
                            <h6>{{ $property->address }} <i class="fa fa-location"></i></h6>
                        </div>
                        @if($property->featured == 1)
                        <ul class="rating clearfix pull-left">
                            <li><i class="icon-39"></i></li>
                        </ul>
                        @endif

                    </div>
                </div>
                <div class="right-column pull-right clearfix pl-5" dir="rtl">
                    <div class="price-inner clearfix">

                        <ul class="category clearfix pull-left px-auto">
                            <li class="float-right"><a href="#">{{ $property->purpose }}</a></li>
                            <li class="float-right"><span class="btn btn-small disabled b-r-20">التعليقات: {{ $property->comments_count }}</span></li>
                            <li class="float-right"><span class="btn btn-small disabled b-r-20">غرف نوم: {{ $property->bedroom}}</span></li>
                            <li class="float-right"><span class="btn btn-small disabled b-r-20">دورات مياه: {{ $property->bathroom}}</span></li>
                            <li class="float-right"><span class="btn btn-small disabled b-r-20">المساحة: {{ $property->area}}</span></li>
                            <li class="float-right"><span class="btn btn-small disabled b-r-20">المدينة: {{ $property->city}}</span></li>


                        </ul>
                        <div class="price-box pull-right pr-2">
                            <h3>{{ $property->price }} ريال</h3>
                        </div>
                    </div>
                </div>

                <div class="right-column pull-right clearfix mr-3 pr-3">
                    <ul class="other-option pull-right clearfix">
                        <li><a href="#" onclick="CopyURL()"><i class="fa fa-link" title="مشاركة"></i></a></li>
                        <button class="btn-share mr-3 ml-3" style="padding-right:3rem!important;padding-left:3rem!important; ">
                            <span class="btn-text"> مشاركة </span
                            ><span class="btn-icon">
                              <svg
                                t="1580465783605"
                                class="icon"
                                viewBox="0 0 1024 1024"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                                p-id="9773"
                                width="18"
                                height="18"
                              >
                                <path
                                  d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"
                                  p-id="9774"
                                  fill="#ffffff"
                                ></path>
                              </svg>
                            </span>
                            <ul class="social-icons">
                              <li>
                                <a href="https://twitter.com/intent/tweet?text= مشاركة العقار {{Request::url()}}" target="_blank"
                                  ><svg
                                    t="1580195676506"
                                    class="icon"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    p-id="2099"
                                    width="18"
                                    height="18"
                                  >
                                    <path
                                      d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"
                                      p-id="2100"
                                      fill="white"
                                    ></path></svg
                                ></a>
                              </li>
                              <li>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="share-button">
                                    <i class="fab fa-facebook-f" style="color: #fff;"></i>
                                   </a>
                              </li>
                              <li>
                                <a target="_blank" href="whatsapp://send?text={{Request::url()}}" class="share-button">
                                    <i class="fab fa-whatsapp" style="color: #fff;"></i>
                                   </a>
                              </li>
                            </ul>
                          </button>
                          
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

            
                                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">

                                @if(!$property->gallery->isEmpty())

                                @foreach($property->gallery as $gallery)

                                <div class="gallery-block-two">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{Storage::url('property/gallery/'.$gallery->name)}}" class="lightbox-image" data-fancybox="gallery"><img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt=""></a>
                                        </figure>
                                    </div>
                                </div>
                                @endforeach

                            @else
                                <div class="single-image">
                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                    <figure class="image-box"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></figure>
                                    @else
                                    <figure class="image-box"><img src="{{$property->image}}" alt="{{$property->title}}"></figure>
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
                                <center>
                                @foreach($property->features as $feature)
                                <p>{{$feature->name}}</p>
                                @endforeach
                            </center>
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
                                <center>
                                {!! $videoembed !!}
                            </center>
                            </div>
                        </div>
                        @endif

                        <div class="discription-box content-widget">
                            @if(Session::has('errors'))
                            <div class="text-center alert alert-light">
                              <h5 style="font-weight: bold;">فضلاً قم بملىء كل الحقول</h5>
                            </div>
                            @endif
                            @if (session()->has('message'))
                            <div class="text-center alert alert-light">
                                <h3 style="font-weight: bold;">{{ session('message') }}</h3>
                            </div>
                            @endif
                
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
                                           
                                           @if(Auth::user()->role_id == 1)
                                            <span><form method="post" action="{{route('property.RemoveComment')}}">@csrf<input type="hidden" name="id" value="{{$comment->id}}"><button type="submit" class="btn btn-danger">حذف</button></form></span>
                                            @endif
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
                                <div class="inner">
                                    <h3 style="color:black" class="font-weight-bold">طلب العقار</h3>
                                </div>
                            </div>
                            <div class="form-inner">
                                <p class="text-center mx-auto mb-2" dir="rtl">فضلاً قم بكتابة تفاصيل طلبك للعقار </p>

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
                                        <textarea name="message" placeholder=" (اسم العقار وتفاصيل طلبه) "></textarea>
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