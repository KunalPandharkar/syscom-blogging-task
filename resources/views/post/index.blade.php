@extends('layouts.main')

@section('content')
<header class="bg-dark text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Posts</li>


            </ol>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="container my-4 my-xl-5">
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-12">


            <!-- Recent Posts Grid -->
            <h4 class="mb-4"> Posts</h4>
            <div class="row g-4">

                @isset($posts)
                    @forelse ($posts as $post)
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

    </div>
</div>
@endsection
