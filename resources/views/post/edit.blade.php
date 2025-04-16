@extends('layouts.main')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <header class="bg-dark text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-white-50 text-decoration-none">Home</a></li>

                            <li class="breadcrumb-item"><a href="{{ route('user.posts',['id'=>Auth::id()]) }}"
                                class="text-white-50 text-decoration-none">My Posts</a></li>

                    <li class="breadcrumb-item active text-white" aria-current="page">Edit Post</li>


                </ol>
            </nav>
        </div>
    </header>

    <div class="container py-5">
        <!-- Page Title and Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Edit Post</h1>
            <p class="lead text-muted">{{ $post->title }}</p>
        </div>

        <!-- Blog Creation Form -->
        <form action="{{ route('update.post',['id'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">


                <!-- Blog Title -->
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                        placeholder="Enter the title of your blog post" required>
                </div>

                <!-- Blog Image -->
                <div class="mb-4">
                    <label for="image" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                </div>

                @if ($post->image)
                    <div class="mb-4">
                        <label class="form-label d-block">Current Image:</label>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Image" class="img-fluid rounded"
                            style="max-width: 200px; height: auto;">
                    </div>
                @endif

                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Write your blog post description here..." required>{{ $post->description }}</textarea>
                </div>

                <!-- Blog Content -->
                <div class="col-md-12 mb-3">
                    <label for="blog_content" class="form-label">Blog Content :</label>
                    <textarea id="editor" name="blog_content" class="form-control">{{ $post->content }}</textarea>

                </div>


                <div class="col-md-6 mb-3">
                    <label for="author" class="form-label">Author Name</label>
                    <input type="text" placeholder="Enter the author name" name="author" id="author"
                        class="form-control" value="{{ $post->author }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="author_title" class="form-label">Author Title</label>
                    <input type="text" placeholder="Enter the author title" name="author_title" id="author_title"
                        class="form-control" value="{{ $post->author_title }}" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="author_title" class="form-label">Reading Time</label>
                    <input type="text" placeholder="Enter the reading time" name="reading_time" id="reading_time"
                        class="form-control" value="{{ $post->reading_time }}" required>
                </div>



                <!-- Tags -->
                <div class="mb-4">
                    <label for="tags" class="form-label">Tags (comma separated)</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{ $post->tags }}"
                        placeholder="e.g., Bootstrap, Web Development, Design">
                </div>

                <div class="col-md-2 form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                        {{  $post->is_published ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Online</label>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Save</button>
                </div>

        </form>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
