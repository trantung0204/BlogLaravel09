@extends('blog/layouts/master')
@section('content')
	@foreach ($posts as $post)
		<article>
            <div class="post-image">
                <a href="{!! asset('blog/post/') !!}{!!'/'.$post->slug!!}" title=""><img src="{{ $post->thumbnail }}" alt="post image 1"></a>
                <div class="category"><a href="#">{{$post->category->name}}</a></div>
            </div>
            <div class="post-text">
                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                <h2><a href="{{ asset('blog/post/') }}{{'/'.$post->slug}}">{{ $post->title }}</a></h2>
                <p class="text">{{ $post->description }}
                                <a href="#"><i class="icon-arrow-right2"></i></a></p>                                 
            </div>
            <div class="post-info">
                <div class="post-by">Post By <a href="#">{{$post->user->name}}</a></div>
                <div class="extra-info">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <span class="comments">25 <i class="icon-bubble2"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>
	@endforeach
@endsection
@section('newest_posts')
    @foreach($new_posts as $new_post)
        <div class="item">
            <a href="{{ asset('blog/post/') }}{{'/'.$new_post->slug}}" title=""><img style="width: 100px;" src="{{ $new_post->thumbnail }}" alt="post 1" class="post-image"></a>
            <div class="info-post">
                <h5><a href="{{ asset('blog/post/') }}{{'/'.$new_post->slug}}">{{ $new_post->title }}</a></h5>
                <span class="date">{{ $new_post->created_at->diffForHumans() }}</span>  
            </div> 
            <div class="clearfix"></div>   
        </div>
    @endforeach
@endsection
@section('js')

@endsection
