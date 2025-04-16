@extends('layouts.main')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <header class="bg-dark text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-white-50 text-decoration-none">Home</a></li>

                    <li class="breadcrumb-item active text-white" aria-current="page">Create Post</li>


                </ol>
            </nav>
        </div>
    </header>

    <div class="container py-5">
        <!-- Page Title and Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Create a New Post</h1>
            <p class="lead text-muted">Fill out the form below to create a new blog post. Add a title, image, and content,
                then publish it!</p>
        </div>

        <!-- Blog Creation Form -->
        <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">


                <!-- Blog Title -->
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label> <small class="text-danger">*</small>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Enter the title of your blog post" required>
                </div>

                <!-- Blog Image -->
                <div class="mb-4">
                    <label for="image" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Description</label> <small class="text-danger">*</small>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Write your blog post description here..." required></textarea>
                </div>

                <!-- Blog Content -->
                <div class="col-md-12 mb-3">
                    <label for="blog_content" class="form-label">Blog Content :</label><small class="text-danger">*</small>
                    <textarea id="editor" name="blog_content" class="form-control">{{ old('blog_content') }}</textarea>
                    @error('blog_content')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label for="author" class="form-label">Author Name</label><small class="text-danger">*</small>
                    <input type="text" placeholder="Enter the author name" name="author" id="author"
                        class="form-control" value="" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="author_title" class="form-label">Author Title</label><small class="text-danger">*</small>
                    <input type="text" placeholder="Enter the author title" name="author_title" id="author_title"
                        class="form-control" value="" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="author_title" class="form-label">Reading Time</label>
                    <input type="text" placeholder="e.g., 10 Mins, 1 Hour" name="reading_time" id="reading_time"
                        class="form-control" value="" required>
                </div>



                <!-- Tags -->
                <div class="mb-4">
                    <label for="tags" class="form-label">Tags (comma separated)</label>
                    <input type="text" class="form-control" id="tags" name="tags"
                        placeholder="e.g., Bootstrap, Web Development, Design">
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Publish Blog Post</button>
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
