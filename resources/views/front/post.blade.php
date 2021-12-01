@extends('front.layout.master');
@section('content')
 <header class="masthead" style="background-image: url('{{asset('upload/'.$posts->image)}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$posts->title}}</h1>
                            <h2 class="subheading">{{$posts->subtitle}}</h2>
                           <span class="post-meta">
                            Posted by
                            <a href="#!">{{$posts->user->name}}</a> on
                            {{$posts->created_at->format('D M Y')}}
                           </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  {{$posts->content}}
                </div>
            </div>
        </article>
@endsection
