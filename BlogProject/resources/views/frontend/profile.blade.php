@extends('base')

@section('content')
    @include('frontend/header')
    <div class="container mt-4">
        <div class="row">
            <div class="col-11">
                <main id="main" class="main">

                    <section class="section profile">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> 
                                        @if ($user->image)
                                        <img
                                            src="{{ asset('public/Image/'.$user->image) }}" alt="Profile" class="rounded-circle" width="200px" height="200px">    
                                        @else
                                        <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnBFM8UJX8hK5mHqhOs8B7ntumfzVf1N5i_XmeBzE-uQ&usqp=CAU&ec=48600112" alt="Profile" class="rounded-circle">

                                        @endif
                                        <h2>{{ $user->name }}</h2>
                                        <h3>Web Designer</h3>
                                        <div class="social-links mt-2"> <a href="#" class="twitter"><i
                                                    class="bi bi-twitter"></i></a> <a href="#" class="facebook"><i
                                                    class="bi bi-facebook"></i></a> <a href="#" class="instagram"><i
                                                    class="bi bi-instagram"></i></a> <a href="#" class="linkedin"><i
                                                    class="bi bi-linkedin"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body pt-3">
                                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                                            <li class="nav-item" role="presentation"> <button class="nav-link"
                                                    data-bs-toggle="tab" data-bs-target="#profile-overview"
                                                    aria-selected="false" role="tab" tabindex="-1">Overview</button>
                                            </li>
                                            <li class="nav-item" role="presentation"> <button class="nav-link active"
                                                    data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="true"
                                                    role="tab">Edit Profile</button></li>
                                           
                                            <li class="nav-item" role="presentation"> <button class="nav-link"
                                                    data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                                    aria-selected="false" role="tab" tabindex="-1">Change
                                                    Password</button></li>
                                        </ul>
                                        <div class="tab-content pt-2 p-3">
                                            <div class="tab-pane fade profile-overview p-3" id="profile-overview"
                                                role="tabpanel ">
                                                <h5 class="card-title">About</h5>
                                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam
                                                    maiores
                                                    cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut
                                                    sunt iure
                                                    rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea
                                                    saepe at
                                                    unde.</p>
                                                <h5 class="card-title">Profile Details</h5>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                                </div>
                                              
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                                </div>
                                              
                                    
                                            </div>
                                            <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit"
                                                role="tabpanel">
                                                <form action="{{ route('editprofile') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row mb-3"> <label for="fullName"
                                                            class="col-md-4 col-lg-3 col-form-label">Name</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="name"
                                                                type="text" class="form-control" id="fullName"
                                                                value="{{ $user->name }}"></div>
                                                    </div>
                                                    <div class="row mb-3"> <label for="fullName"
                                                            class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="email"
                                                                type="text" class="form-control" id="email"
                                                                value="{{ $user->email }}"></div>
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                    </div>
                                                    <div class="row mb-3"> <label for="image"
                                                            class="col-md-4 col-lg-3 col-form-label">Image</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="image"
                                                                type="file" value="{{ $user->image }}" class="form-control" id="image"
                                                               ></div>
                                                    </div>

                                                    <div class="text-center"> <button type="submit"
                                                            class="btn btn-primary">Save
                                                            Changes</button></div>
                                                </form>
                                            </div>
                                        
                                            <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                                <form action="{{ route('password') }}" method="post">
                                                    @csrf
                                                    <div class="row mb-3"> <label for="currentPassword"
                                                            class="col-md-4 col-lg-3 col-form-label">Current
                                                            Password</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="password"
                                                                type="password"  class="form-control"
                                                                id="currentPassword"></div>
                                                                @error('password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                    </div>
                                                    <div class="row mb-3"> <label for="newPassword"
                                                            class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="newpassword"
                                                                type="password" class="form-control" id="newPassword">
                                                        </div>
                                                        @error('newpassword')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="row mb-3"> <label for="renewPassword"
                                                            class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                                            Password</label>
                                                        <div class="col-md-8 col-lg-9"> <input name="renewpassword"
                                                                type="password" class="form-control" id="renewPassword">
                                                        </div>
                                                        @error('renewpassword')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="text-center"> <button type="submit"
                                                            class="btn btn-primary">Change
                                                            Password</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection
