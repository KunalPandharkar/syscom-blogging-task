<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;


class UserController extends Controller
{

    public function profile($id)
    {

        if ($id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $data['user'] = Auth::user();
        return view('user.profile', $data);
    }

    public function update(Request $request, $id)
    {

        if ($id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $user = Auth::user();


        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);

        $user->name = $validated['fullname'];
        $user->phone = $validated['phone'];
        $user->bio = $validated['bio'];

        $user->save();



        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateProfilePicture(Request $request, $id)
    {
        if ($id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        if ($request->hasFile('profile_picture')) {
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            ]);

            $user = Auth::user();

            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Store new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();

        }

        return back()->with('success', 'Profile picture updated successfully.');


    }

    public function getUserPosts(Request $request, $id)
    {
        if ($id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $data['posts'] = Post::where('user_id', $id)->get();


        return view('user.posts', $data);

    }


}
