@extends('frontend.layouts.app')

@section('styles')

<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">قائمة الوسطاء</h4>
            </div>
            <div class="row">

                @foreach($agents as $agent)
                    <div class="col s12 m4">
                        <div class="card-panel center card-agent">
                            <span class="card-image-bg" style="background-image:url({{Storage::url('users/'.$agent->image)}});"></span>
                            <h5 class="m-b-0">
                                <a href="{{ route('agents.show',$agent->id) }}" class="truncate">{{ $agent->name }}</a>
                            </h5>
                            <h6 class="email">{{ $agent->email }}</h6>
                            <p class="about">{{ str_limit($agent->about,50) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="m-t-30 m-b-60 center">
                {{ $agents->links() }}
            </div>

        </div>
    </section>

@endsection

@section('scripts')

@endsection