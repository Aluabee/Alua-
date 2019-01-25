@extends('user/app')

@section('bg-img', Storage::disk('local')->url($post->image))
@section('title', $post->title)
@section('sub-heading', $post->slug)

@section('main-content')

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Created at {{$post->created_at->diffForHumans() }}</small>
                    @foreach($post->categories as $category)
                    <span class="float-right" style="margin-right: 10px;">
                            <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                    </span>
                    @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}
                    <h3>Tags</h3>
                    @foreach($post->tags as $tag)
                        <small class="float-left" style="margin-right: 10px;">
                            <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                        </small>
                    @endforeach
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection