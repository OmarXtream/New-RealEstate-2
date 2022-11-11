@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section class="section mt-3">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">

                    <div class="card">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('posts/'.$post->image))
                                <img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}">
                            @endif
                        </div>

                    </div>

                    <div class="card mt-5 mb-3" id="comments">
                        <div class="single-narebay p-15">

                            <div class="discription-box content-widget">
                                <div class="title-box text-center">
                                    <h4>{{ $post->comments_count }} تعليقات </h4>
                                </div>
                                <div class="text">
                                    @foreach($post->comments as $comment)
    
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
                                <form class="default-form" action="{{ route('blog.comment',$post->id) }}" method="POST">
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
                    
                </div>

                <div class="col s12 m4">

                    <div class="card mt-5">
                        <div class="card-content">
                            <h3 class="font-18 m-t-0 bold uppercase mt-2 mb-2">{{ $post->title }}</h3>
                            <ul class="collection">
                                    
                                {!! $post->body !!}

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