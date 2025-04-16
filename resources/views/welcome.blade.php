@extends('layouts.main')

@section('content')
    <!-- Header -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="mb-0 fs-4">Welcome To Syscom LLC</h1>
            <p class="mb-0 fs-6">Insights, stories, and updates.</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-4 my-xl-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">

                @isset($featured_post)
                    <!-- Featured Post -->
                    <div class="mb-5">
                        <h3 class="mb-4">Featured Post</h3>
                        <div class="featured-post position-relative text-white rounded overflow-hidden" style="height: 300px;">
                            @if ($featured_post->image)
                                <img src="{{ asset('storage/' . $featured_post->image) }}"
                                    class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover"
                                    alt="{{ $featured_post->title }}">
                            @endif

                            <div class="overlay position-absolute top-0 start-0 w-100 h-100"
                                style="background: rgba(0, 0, 0, 0.5);"></div>
                            <div class="position-absolute p-4 bottom-0 start-0 z-2">
                                <a href="{{ route('show.post', ['id' => $featured_post->id]) }}"
                                    class="text-decoration-none text-white">
                                    <h2 class="fw-bold">{{ $featured_post->title }}</h2>
                                </a>
                                <p class="mb-1 text-light small">
                                    {{ \Carbon\Carbon::parse($featured_post->created_at)->format('F d, Y') }} ·
                                    {{ $featured_post->author }}</p>
                                <p class="d-none d-md-block">{{ $featured_post->description }}</p>
                                <a href="{{ route('show.post', ['id' => $featured_post->id]) }}"
                                    class="btn btn-primary btn-sm mt-2">Read More</a>
                            </div>
                        </div>
                    </div>
                @endisset


                <!-- Recent Posts Grid -->
                <h4 class="mb-4">Recent Posts</h4>
                <div class="row g-4">

                    @isset($recent_posts)
                        @forelse ($recent_posts as $post)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card shadow-sm h-100 border-0 rounded-4 overflow-hidden">
                                    @if ($post->image)
                                        <div class="position-relative" style="height: 200px;">

                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>
                                    @endif
                                    <!-- Image Section -->

                                    <!-- Card Body Section -->
                                    <div class="card-body d-flex flex-column">
                                        <!-- Post Title -->
                                        <h5 class="card-title fw-semibold mb-1">
                                            <a href="{{ route('show.post', $post->id) }}"
                                                class="text-decoration-none text-dark">{{ $post->title }}</a>
                                        </h5>

                                        <!-- Post Meta Information (Date, Category, and Author) -->
                                        <p class="text-muted small mb-2">
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }} ·
                                            {{ $post->author }}
                                        </p>


                                        <!-- Post Excerpt -->
                                        <p class="card-text mb-3 flex-grow-1">
                                            {{ Str::limit($post->description) }}
                                        </p>

                                        <!-- Read More Button -->
                                        <a href="{{ route('show.post', ['id' => $post->id]) }}"
                                            class="btn btn-outline-primary btn-sm align-self-start">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>No Posts Yet</h1>
                        @endisset
                    @endforelse





                    <!-- Add more posts in similar blocks -->
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0">


                @isset($popular_posts)
                    <div class="mb-5">
                        <h5 class="mb-3">Popular Posts</h5>

                        @foreach ($popular_posts as $post)
                        <div class="d-flex mb-3">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    class="popular-post-thumb me-3" alt="{{ $post->title }}">
                            @endif

                            <div>
                                <a href="{{route('show.post',['id'=>$post->id])}}" class="text-dark fw-semibold d-block">{{$post->title}}</a>
                                <small class="text-muted"> {{ \Carbon\Carbon::parse($featured_post->created_at)->format('F d, Y') }}</small>
                            </div>
                        </div>
                        @endforeach


                    </div>
                @endisset
                <!-- Popular Posts with Images -->


                @isset($tags)
                    <div>
                        <h5 class="mb-3">Tags</h5>
                        <div>
                            @foreach ($tags as $tag)
                                <span class="tag-badge">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endisset

                <!-- Tags -->

            </div>
        </div>
    </div>
@endsection
