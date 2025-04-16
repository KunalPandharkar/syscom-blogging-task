<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function getPosts(Request $request)
    {
        $posts = Post::where('is_published', true)->orderBy('created_at', 'desc')->get();

        $data['posts'] = $posts;

        return view('post.index', $data);
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        if ($post->is_published == false) {
            abort(403, 'Unauthorized action.');
        }

        $data['post'] = $post;

        return view('post.show', $data);
    }

    public function storePost(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'blog_content' => 'required|string',
            'author' => 'required|string|max:100',
            'author_title' => 'required|string|max:100',
            'tags' => 'nullable|string',
            'image' => 'nullable|image',
            'reading_time' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validatedData['image'] = $imagePath;
        }


        $blog = Post::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'author' => $validatedData['author'],
            'author_title' => $validatedData['author_title'],
            'tags' => $validatedData['tags'],
            'content' => $validatedData['blog_content'],
            'image' => $validatedData['image'] ?? null,
            'reading_time' => $validatedData['reading_time'],
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('user.posts',['id'=>Auth::id()])->with('success', 'Blog created successfully!');
    }

    public function getPostEdit(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id!= Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $data['post'] = $post;

        return view('post.edit', $data);
    }

    public function updatePost(Request $request,$id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'blog_content' => 'required|string',
            'author' => 'required|string|max:100',
            'author_title' => 'required|string|max:100',
            'tags' => 'nullable|string',
            'image' => 'nullable|image',
            'reading_time' => 'nullable',
            'is_published' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validatedData['image'] = $imagePath;
        }


        $post->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'author' => $validatedData['author'],
            'author_title' => $validatedData['author_title'],
            'tags' => $validatedData['tags'],
            'content' => $validatedData['blog_content'],
            'image' => $validatedData['image'] ?? $post->image,
            'reading_time' => $validatedData['reading_time'],
            'user_id' => Auth::id(),
            'is_published' => $request->has('is_published') ? true : false,
        ]);


        return redirect()->back()->with('success', 'Blog updated successfully!');
    }


    public function deletePost($id)
    {
        $post = Post::findOrFail($id);

        // Optional: Check if the user is authorized
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }



}
