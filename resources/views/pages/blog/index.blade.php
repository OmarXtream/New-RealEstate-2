@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">منشورات المدونة</h4>
            </div>
            <div class="row">

                <div class="container">
                    <div class="row">
                  
                    @foreach($posts as $post)
                    <div class="col-4 s12 m8 mb-2">
                    <div class="card" style="width: 18rem;">
                        @if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image)
                        <img class="card-img-top" src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}">
                        @endif

                        <div class="card-body">
                          <h5 class="card-title">{{ $post->title }}</h5>
                          <p class="card-text">{!! str_limit($post->body,120) !!}</p>
                          <a href="{{ route('blog.show',$post->slug) }}" class="btn btn-primary">تفاصيل أكثر</a>
                        </div>
                      </div>
                    </div>
                    @endforeach


                    <div class="m-t-30 m-b-60 center">
                        {{ $posts->appends(['month' => Request::get('month'), 'year' => Request::get('year')])->links() }}
                    </div>
        
                </div>
            </div>


            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection