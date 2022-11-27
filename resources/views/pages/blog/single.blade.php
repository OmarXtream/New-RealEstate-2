@extends('frontend.layouts.app')

@section('styles')
<style>
    p,h1,h2,h3,h4,h5 {
    color: black !important;
    font-weight: bold;   
    }


    
.frame{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  height: 80px;
  width: 350px;
  position: relative;
   box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
   border-radius: 10px;
}

.share-button{
  height: 35px;
  width: 35px;
  border-radius: 3px;
  background: #e0e5ec;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-tap-highlight-color: transparent;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
  font-size: 16px;
  color: rgba(42, 52, 84, 1);
  text-decoration: none;
}
.share-button:active{
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
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
                            <div class="group-title">
                                <h4 class="text-right">مشاركة المنشور</h4>
                            </div>

                                <div class ="frame mb-5 mx-auto">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="share-button">
                                 <i class="fab fa-facebook-f" style="color: #3b5998;"></i>
                                </a>
                                    <a target="_blank" href="https://twitter.com/intent/tweet?text=لا تفوتك هذي التدوينة الرهيبه ! {{Request::url()}}" class="share-button">
                                  <i class="fab fa-twitter" style="color: #00acee;"></i>
                                </a>
                                    <a target="_blank" href="whatsapp://send?text={{Request::url()}}" class="share-button">
                                 <i class="fab fa-whatsapp" style="color: #ea4c89;"></i>
                                </a>
                                    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{Request::url()}}" class="share-button">
                                 <i class="fab fa-linkedin-in" style="color:#0e76a8;"></i>
                                </a>
                                </div>
                            </div>

                </div>
            
            </div>
        </div>

    </section>

@endsection

@section('scripts')

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