@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('user.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">
                    <div class="agent-content">
                        <h4 class="agent-title bg-color-1">PROFILE</h4>

                        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="name" name="name" type="text" value="{{ $profile->name }}" class="form-control">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="username" name="username" type="text" value="{{ $profile->username or null }}" class="form-control">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="email" name="email" type="email" value="{{ $profile->email }}" class="form-control">
                                    <label for="username">Email</label>
                                </div>
                                <div class="file-field input-field col s6">
                                    <div class="btn indigo">
                                        <span>Image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="about" name="about" class="form-control">{{ $profile->about or null }}</textarea>
                                    <label for="about">About</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <button class="form-control btn waves-effect waves-light btn-large indigo darken-4" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('textarea#about').characterCounter();
    });

</script>
@endsection