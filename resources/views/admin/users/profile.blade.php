@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <div class="container-fluid  dashboard-content">
         <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Edit Profile </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/admin/users" class="breadcrumb-link">All Users</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Your Profile</h5>
                                <div class="card-body">
                                    <form method="POST" action="/admin/profiles/update" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                        <div class="form-group">
                                            <label for="inputfirstname">First Name</label>
                                            <input id="inputfirstname" type="text" class="form-control form-control-lg @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname', $user->fname) }}" autocomplete="name" autofocus placeholder="First Name">
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputlastname">Last Name</label>
                                            <input id="inputlastname" type="text" class="form-control form-control-lg @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname', $user->lname) }}" autocomplete="name" autofocus placeholder="Last Name">
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputemail">Email</label>
                                            <input id="inputemail" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email" placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputpassword">New Password</label>
                                            <input id="inputpassword" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputpassword">Confirm Password</label>
                                            <input id="inputpassword" type="password" class="form-control form-control-lg" name="password_confirmation" autocomplete="new-password" placeholder="Comfirm Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputemail">Profile Image</label>
                                            <input id="inputemail" type="file" class="form-control form-control-lg @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputemail">Facebook Profile</label>
                                            <input id="inputemail" type="text" class="form-control form-control-lg @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', @$user->profile->facebook) }}" autocomplete="facebook">
                                            @error('facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputemailg">Instagram Profile</label>
                                            <input id="inputemailg" type="text" class="form-control form-control-lg @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram', @$user->profile->instagram) }}" autocomplete="instagram">
                                            @error('instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputemailt">Twitter Profile</label>
                                            <input id="inputemailt" type="text" class="form-control form-control-lg @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter', @$user->profile->twitter) }}" autocomplete="twitter">
                                            @error('twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputemaily">About You</label>
                                            <textarea class="form-control form-control-lg @error('about') is-invalid @enderror" name="about" value="{{ old('about') }}" autocomplete="about">{{ @$user->profile->about }}</textarea>
                                            @error('about')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Update Profile</button>   
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form -->
                        <!-- =================================================
                        ============= -->
                        <!-- ============================================================== -->
                        <!-- horizontal form -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- end horizontal form -->
                        <!-- ============================================================== -->
                    </div>
            </div>
    </div>
@endsection


