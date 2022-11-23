@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

<section class="page-title centred" style="background-image: url(frontend/images/shape/shape-9.png);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>منشورات المدونة</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">الرئيسية</a></li>
            </ul>
        </div>
    </div>
</section>
          

                            <!-- sidebar-page-container -->
        <section class="blog-list sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach($posts as $post)
                    <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                        <div class="news-block-two wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box align-items-center">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('blog.show',$post->slug) }}"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></a></figure>
                                    <a href="{{ route('blog.show',$post->slug) }}" class="feature">تدوينة حديثه</a>
                                </div>
                                <div class="content-box">
                                    <h4><a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                            <h5><a href="{{ route('blog.show',$post->slug) }}">Eva Green</a></h5>
                                        </li>
                                        <li>{{$post->created_at}}</li>
                                    </ul>
                                    <p>{!! str_limit($post->body,120) !!}</p>
                                    <div class="btn-box">
                                        <a href="{{ route('blog.show',$post->slug) }}" class="theme-btn btn-two">تفاصيل أكثر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>


@endsection

@section('scripts')

@endsection