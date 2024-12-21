@extends('layouts.master')
@section('content')
<div class="container-fluid ">
    <div class="row my-2">
        <div class="col">
            <h2 >Latest Posts</h2>
        </div>
        <div class="col-3">
            <form method="GET" action="{{route('post.index')}}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-light btn-primary " type="submit" id="button-search">
                        <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row m-3">
        @if ($posts)
            @foreach ($posts as $post) 
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$post->img_url}}" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{Str::limit($post->content, 80)}}</p>
                                    <div class="d-flex justify-content-between">
                                            <a href="{{route('post.detail', ['slug' => $post->slug])}}">Read More</a>
                                        <a class="text-decoration-none text-dark fw-bold" href="#">{{$post->category->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        @else
            <p>Posts Not Available</p>
        @endif
        <div class="col-12 my-3">
            <nav aria-label="Page navigation">
                <!-- Pagination Links -->
                 {{ $posts->links('pagination::bootstrap-5') }}
            </nav>
            
        </div>
    </div>
    <div class="row">
        
    </div>
    
</div>
@endsection
   