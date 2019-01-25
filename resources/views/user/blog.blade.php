
@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'My blog')
@section('sub-heading', 'Lets learn')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="-align-right">
                <form action="{{ route('search') }}" method="get">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search post">
                    </div>
                </form>
                </div>
                @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('post', $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        @foreach($admins as $admin)
                        @if($post->posted_by == $admin->id)
                                <a href="#">{{ $admin->name }}</a>
                            @endif
                        @endforeach
                        {{ $post->created_at->diffForHumans() }}</p>
                    @endforeach
                    <hr>
                </div>
                    <ul class="pagination">
                        <li class="page-item">
                            {{ $posts->links() }}
                        </li>
                    </ul>
            </div>
        </div>
    </div>

@endsection

{{--<!-- Main Content -->
--}}
