@extends('frontend.layouts.app')

@section('styles')
<style>
p,h1,h2,h3,h4,h5 {
color: black !important;
font-weight: bold;   
}

/*  JUST FOR BETTER VIEW */
.content__container{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  width: 100%;
}
.share__btn__container{
  border: 2px solid rgb(75,149,225);
  width: 60%;
  height: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
@endsection

@section('content')

    <section class="section mt-3">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></figure>
                                    <span class="category">تدوينة حديثه</span>
                                </div>
                                <div class="lower-content">
                                    <h3 class="text-center">{{$post->title}}</h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                            <h5><a href="javascript:void(0)">{{$post->user->name}}</a></h5>
                                        </li>
                                        <li class="ltr">{{$post->created_at->diffForHumans()}}</li>
                                    </ul>
                                    <div class="text">
                                        {!! $post->body !!}
                                    </div>
                                    <div class="post-tags">
                                        <ul class="tags-list clearfix">
                                            @foreach($post->categories as $key => $category)
                                                <li><a href="javascript:void(0)">{{$category->name}}</a></li>
                                        @endforeach
                                        @foreach($post->tags as $key => $tag)
                                            <a href="{{ route('blog.tags',$tag->slug) }}" class="btn-flat">
                                                <li><a href="javascript:void(0)">{{$tag->name}}</a></li>
                                            </a>
                                        @endforeach
            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area mt-4">
                            <div class="group-title">
                                <h4 class="text-right">{{ $post->comments_count }} تعليقات</h4>
                            </div>
                            <div class="comment-box">
                                @foreach($post->comments as $comment)
    
                                @if($comment->parent_id == NULL)

                                <div class="comment text-center">
                                    <figure class="thumb-box">
                                        <img src="{{ Storage::url('users/'.$comment->users->image) }}" alt="{{ $comment->users->name }}">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>{{ $comment->users->name }}</h5>
                                            <span class="ltr">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="comments-form-area mb-5">
                            <div class="group-title">
                                <h4 class="text-right">ترك تعليق</h4>
                            </div>
                            @auth

                            <form action="{{ route('blog.comment',$post->id) }}" method="post" class="comment-form default-form">
                                @csrf
                                <input type="hidden" name="parent" value="0">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="body" placeholder="اكتب تعليقك هنا"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">ارسال</button>
                                    </div>
                                </div>
                            </form>

                            @endauth
    
                            @guest 
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                <h6 class="text-bold" style="color:#000">سجل الدخول لترك تعليق</h6>
                                </a>
                            </div>
                        @endguest

                        </div>
                        <div class="comments-area mt-4">
                            <div class="group-title">
                                <h4 class="text-right">مشاركة المنشور</h4>
                            </div>
                            <div class="comment-box text-center">
                                <ul class="social-links clearfix">
                                    <a 
                                                                     class="twitter-share-button"
                                                                     target="_blank"
                                                                              href="https://twitter.com/intent/tweet?text=لا تفوتك هذي التدوينة الرهيبه !"
                                                                    data-size="large"
                                                                    >
                                                                      تويتر
                                                                    </a>  
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank" rel="noopener noreferrer"> <i style="font-size:48px;" class="fa-brands fa-facebook fa-lg"></i></a>                       
                                                                   </ul>
                            </div>
                        </div>
        
                    </div>
                </div>
            
            </div>
        </div>

    </section>

@endsection

@section('scripts')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script>
    
    $(document).on('click','span.right.replay',function(e){
        e.preventDefault();
        
        var commentid = $(this).data('commentid');

        $('#comment-'+commentid).empty().append(
            `<div class="comment-box">
                <form action="{{ route('blog.comment',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="parent" value="1">
                    <input type="hidden" name="parent_id" value="`+commentid+`">
                    
                    <textarea name="body" class="box" placeholder="Leave a comment"></textarea>
                    <input type="submit" class="btn indigo" value="Comment">
                </form>
            </div>`
        );
    });
</script>
@endsection