@extends('layouts.main')

@section('content')
    <!-- Header -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/" class="text-white-50 text-decoration-none">Home</a></li>

                    <li class="breadcrumb-item active text-white" aria-current="page">My Posts</li>


                </ol>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Page Title and Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Your Blog Posts</h1>
            <p class="lead text-muted">Manage your blog posts, edit them, or remove posts you no longer need.</p>
        </div>

        <!-- List of Blog Posts -->
        <div class="row">

            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border-0 rounded-4 overflow-hidden">
                        <div class="position-relative" style="height: 200px;">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold mb-1">
                                <a href="{{ route('show.post', $post->id) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>

                            <p class="text-muted small mb-2">
                                {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}
                                · {{$post->author}}</p>
                            <p class="card-text mb-3 flex-grow-1">{{$post->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-sm btn-primary">View Post</a>
                                <div>
                                    <a href="{{route('get.update.post',['id'=>$post->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('delete.post', $post->id) }}" method="POST" style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

                <h4>Sorry, No Posts Found ! <a href="{{route('create.post')}}">Create Post</a></h4>

            @endforelse


        </div>


    </div>
@endsection
