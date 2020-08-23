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
                            <h2 class="pageheader-title">New Post </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/admin/food-items" class="breadcrumb-link">All Posts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">New Post</li>
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
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Create a New Post</h5>
                                <div class="card-body">
                                    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                                            @csrf 
                                        <div class="form-group">
                                            <label for="inputtitle">Post Title</label>
                                            <input id="inputtitle" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus placeholder="Post Title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputprice">Post Image</label>
                                            <input id="inputprice" type="file" class="form-control form-control-lg @error('featured_image') is-invalid @enderror" name="featured_image" value="{{ old('featured_image') }}" autocomplete="featured_image" autofocus>
                                            @error('featured_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputcategory">Select a Category</label>
                                            <select name="category_id" class="form-control" id="inputcategory">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags">Select Tags</label>
                                             @foreach ($tags as $tag)
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{$tag->name}}</label>
                                            </div>
                                            @endforeach 
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputingredient">Content</label>
                                            <textarea type="text" class="form-control form-control-lg @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus placeholder="Post Content"></textarea>
                                            @error('content')
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
                                                    <button type="submit" class="btn btn-space btn-primary">Create Post</button>   
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

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
