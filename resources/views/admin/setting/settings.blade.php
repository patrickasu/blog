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
                            <h2 class="pageheader-title">Blog Settings</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Blog Settings</li>
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
                                <h5 class="card-header">Edit Blog Settings</h5>
                                <div class="card-body">
                                    <form method="POST" action="/admin/settings/update">
                                            @csrf
                                            @method('PUT')
                                        <div class="form-group">
                                            <label for="inputtitle">Site Name</label>
                                            <input id="inputtitle" type="text" class="form-control form-control-lg @error('site_title') is-invalid @enderror" name="site_name" value="{{ old('site_title', $settings->site_name) }}" required autocomplete="title" autofocus placeholder="Add Blog Name">
                                            @error('site_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputaddress1">Contact Number</label>
                                            <input id="inputaddress1" type="text" class="form-control form-control-lg @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number', $settings->contact_number) }}" required autocomplete="contact_number" autofocus placeholder="Contact Number">
                                            @error('contact_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputstate">Email</label>
                                            <input id="inputstate" type="email" class="form-control form-control-lg @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" required autocomplete="contact_email" autofocus placeholder="Email">
                                            @error('contact_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputphone">Address</label>
                                            <input id="inputphone" type="text" class="form-control form-control-lg @error('contact_address') is-invalid @enderror" name="contact_address" value="{{ old('contact_address', $settings->contact_address) }}" required autocomplete="contact_address" autofocus placeholder="Enter Address">
                                            @error('contact_address')
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
                                                    <button type="submit" class="btn btn-space btn-primary">Update Site Settings</button>   
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


