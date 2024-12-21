@extends('layouts.master')
@section('content')
<div class="container-fluid ">
    
    <div class="row">
        <div class="col-lg-8">
          <h1 class="mb-4">{{$post->title}} <span class="fs-6">({{$post->category->name}})</span></h1>
          <p class="text-muted">Posted on {{$post->created_at->format('M d,Y')}}</p>
          <img src="{{$post->img_url}}" class="img-fluid mb-4" alt="Blog Image">
          <p>{{$post->content}}</p>
        </div>
        <div class="col-lg-4">
          <div class="card mt-3">
            <div class="card-body">
              <h5 class="card-title">Related Posts</h5>
              <ul class="list-unstyled">
                @foreach ($related_posts as $post)
                  <li><a href="{{route('post.detail', ['slug' => $post->slug])}}">{{$post->title}}</a></li>
                @endforeach
            
              </ul>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
    