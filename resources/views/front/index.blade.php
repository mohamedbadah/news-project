@extends('front/layout/master')
@section('content')
  <header class="masthead" style="background-image: url('{{asset('frontend/assets/img/sport.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>اخبار الرياضة</h1>
                            <span class="subheading">تصفح وعرف اخبار العالم</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                   @foreach ($posts as $post)
                     <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('index.slug', $post->slug)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{$post->subtitle}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{$post->user->name}}</a> on
                            {{$post->created_at->format('D M Y')}}
                        </p>
                    </div>
                   @endforeach
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4">{{$posts->links()}}</div>
                </div>
            </div>
        </div>
@endsection
