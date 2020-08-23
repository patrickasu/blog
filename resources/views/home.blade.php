@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Admin Dashboard</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                    Welcome Admin Dashboard
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">All Posts</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">15</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.8%</span>
                                        </div>
                                    </div>
                                    {{-- <div id="sparkline-revenue"></div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Trashed Posts</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">65</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    {{-- <div id="sparkline-revenue2"></div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Users</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">127</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    {{-- <div id="sparkline-revenue3"></div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Employees</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">3</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>-2.00%</span>
                                        </div>
                                    </div>
                                    {{-- <div id="sparkline-revenue4"></div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">Recent Posts Last 30 Days</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">All Post Categories</h5>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Trash</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @if ($posts->count() > 0)
                                            @foreach ($posts as $post)
                                                <tr>
                                                <td><img src="{{ URL::to('/images/'.$post->featured_image) }}" alt="{{ $post->title }}" width=70px; height=80px;></td>
                                                <td>{{$post->title}}</td>
                                                <td><a href="/admin/posts/{{$post->id}}/edit"><i class="far fa-edit"></i></a></td>
                                                <td><a href="/admin/posts/{{$post->id}}/delete" onclick="if(! confirm ('Are you sure you want to delete this Post?')) { return false; } "><i class="far fa-trash-alt"></i> Trash</a></td>
                                            </tr>
                                             @endforeach  
                                            @else
                                                <tr>
                                                    <th colspan="5" class="text-center">No Published Posts</th>
                                                </tr> 
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
@endsection


