@extends('layouts.main')

@section('content')
    <!-- Header -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-white-50 text-decoration-none">Home</a></li>

                    <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>


                </ol>
            </nav>
        </div>
    </header>

    <!-- Main Content -->



    <div class="container py-5">
        <!-- Profile Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Your Profile</h1>
            <p class="lead text-muted">Manage your account details, update your information and change your profile picture.
            </p>
        </div>

        <div class="row">
            <!-- Profile Image Section -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <!-- Profile Image -->
                        <div class="profile-picture-wrapper mx-auto mb-4">
                            @if ($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                     alt="Profile Picture" class="profile-picture img-fluid rounded-circle">
                            @else
                                <img src="{{ asset('assets/images/user_avatar.png') }}"
                                     alt="Profile Picture" class="profile-picture img-fluid rounded-circle">
                            @endif
                        </div>

                        <!-- Change Profile Picture Button -->
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#changePictureModal">Change Picture</button>
                    </div>
                </div>
            </div>

            <!-- User Information Section -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <!-- Personal Information Form -->
                        <h4 class="mb-3">Personal Information</h4>
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="{{ $user->name }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" disabled name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Short Bio</label>
                                <textarea class="form-control" name="bio" rows="3">{{ $user->bio }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- Save Changes Button -->
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <!-- Reset Button -->
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Changing Profile Picture -->
    <div class="modal fade" id="changePictureModal" tabindex="-1" aria-labelledby="changePictureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePictureModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('profile.picture',['id'=>Auth::id()])}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="newProfilePicture" class="form-label">Upload New Picture</label>
                            <input type="file" class="form-control" id="newProfilePicture" name="profile_picture" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
