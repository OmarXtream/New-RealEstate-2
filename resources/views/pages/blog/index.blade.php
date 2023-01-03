@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

       <!--Page Title-->
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
            <h1>منشورات المدونة</h1>
            
            <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">الرئيسية</a></li>

             </ul>
        </div>
    </div>
</section>
          

                            <!-- sidebar-page-container -->
        <section class="blog-list sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    @forelse($posts as $post)
                    <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                        <div class="news-block-two wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box align-items-center img-fluid">
                                <div class="image-box img-fluid" style="height: 100%">
                                    <a href="{{ route('blog.show',$post->slug) }}"><img style="height: 100%" class="img-fluid" src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></a>
                                </div>
                                <div class="content-box">
                                    <h4><a style="color: black !important;" href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            {{-- <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure> --}}
                                            <h5 style="color: black !important;"><a style="color: black !important;" href="{{ route('blog.show',$post->slug) }}">{{$post->user->name}}</a></h5>
                                        </li>
                                        <li>{{$post->created_at}}</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="{{ route('blog.show',$post->slug) }}" class="theme-btn btn-two">تفاصيل أكثر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h1 class="text-center mb-5" style="color: black">لا يوجد اي منشورات حالياً</h1>
                    @endforelse

                </div>
            </div>
        </section>


@endsection

@section('scripts')

@endsection