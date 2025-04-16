@extends('layouts.main')

@section('content')
    <!-- Header -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('show.posts')}}" class="text-white-50 text-decoration-none">Posts</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>
    </header>


    <div class="container py-4">
        <!-- Blog Cover -->
        <!-- Blog Cover Image -->



        <!-- Title & Meta -->
        <div class="mb-3">
            <h1 class="fw-bold">{{ $post->title }}</h1>
            <div class="text-muted small">
                <span>By <strong>{{ $post->author }}</strong></span> ·
                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</span> ·
                <span>{{ $post->reading_time }}</span>

            </div>
        </div>

        <div class="mb-4 blog-cover">

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Cover"
                    class="img-fluid w-100 rounded shadow-sm">
            @endif

        </div>

        <!-- Blog Content -->
        <div class="mb-5">
            <p class="lead">
                {{ $post->description }}
            </p>

            <div class="blog-content">
                {!! $post->content !!}

            </div>
            <p class="text-muted small mt-3">Last updated on
                {{ \Carbon\Carbon::parse($post->updated_at)->format('F d, Y') }}</p>
            <!-- More content here... -->
        </div>

        @if ($post->tags)
            <!-- Tags -->
            <div class="mb-4">
                <h6 class="fw-semibold">Tags:</h6>
                <div>
                    @php
                        $tags = explode(',', $post->tags);
                    @endphp
                    @foreach ($tags as $tag)
                        <a href="#" class="badge bg-secondary text-decoration-none me-1 mb-1">{{ $tag }}</a>
                    @endforeach



                </div>
            </div>
        @endif



        <!-- Comment Section Placeholder -->
        <div class="mt-5">
            <h5 class="fw-semibold mb-3">Leave a Comment</h5>
            <form action="{{ route('comments.store', ['id' => $post->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="comment" rows="4" placeholder="Write your comment..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Comments List -->
        <div class="mt-5">
            <h5 class="fw-semibold mb-4">Comments ({{ $post->comments->count() }})</h5>


            @forelse ($post->comments as $comment)
                <div class="d-flex mb-4 align-items-start">

                    @if ($comment->user->profile_picture)
                        <img src="{{ asset('storage/' . $comment->user->profile_picture) }}"
                            alt="{{ $comment->user->name }}" class="rounded-circle me-3" width="50" height="50">
                    @else
                        <img src="{{ asset('assets/images/user_avatar.png') }}" alt="User Avatar"
                            class="rounded-circle me-3" width="50" height="50">
                    @endif


                    <!-- Comment Content -->
                    <div class="flex-grow-1">
                        <!-- Comment Header (Name and Date) -->
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">{{ $comment->user->name }}</h6>
                            <small
                                class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->format('F d, Y') }}</small>
                        </div>
                        <!-- Comment Body -->
                        <p class="mb-1">{{ $comment->comment }}</p>
                    </div>

                    @if ($comment->user_id == Auth::id())
                        <!-- Action Buttons (Edit & Delete) -->
                        <div class="d-flex flex-column align-items-end">
                            <!-- Delete Button -->
                            <form action="{{ route('comments.delete', $comment->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger mb-1" title="Delete Comment">
                                    <i class="bi bi-trash"></i> <!-- Trash Icon -->
                                </button>
                            </form>

                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-link text-primary" title="Edit Comment" data-bs-toggle="modal"
                                data-bs-target="#editCommentModal" data-comment-id="{{ $comment->id }}"
                                data-comment="{{ $comment->comment }}">
                                <i class="bi bi-pencil"></i> <!-- Edit Icon -->
                            </button>
                        </div>
                    @endif


                </div>
            @empty
            @endforelse

            <!-- Third Comment -->


            <!-- Edit Comment Modal -->
            <!-- Edit Comment Modal -->
            <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editCommentForm" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Update Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>




    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal element
            const modal = document.getElementById("editCommentModal");

            // Add event listener for opening the modal
            modal.addEventListener("show.bs.modal", function(event) {
                // Get the button that triggered the modal
                const button = event.relatedTarget;

                // Get data attributes from the button (comment ID and content)
                const commentId = button.getAttribute("data-comment-id");
                const commentText = button.getAttribute("data-comment");

                // Find the modal's form and set the action URL
                const form = modal.querySelector("form");
                form.setAttribute("action", "/comments/" + commentId);

                // Find the textarea and populate it with the current comment
                const textarea = modal.querySelector("textarea[name='comment']");
                textarea.value = commentText;
            });
        });
    </script>
@endsection
