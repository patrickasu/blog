@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Post Categories </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                                       
                                        <li class="breadcrumb-item active" aria-current="page">Post Categories</li>
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
                        <!-- basic table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">All Post Categories</h5>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         @if ($categories->count() > 0)
                                            @foreach ($categories as $category)
                                                <tr>
                                                <th scope="row">{{$category->id}}</th>
                                                <td>{{$category->name}}</td>
                                                <td>{{date('m/d/y', strtotime($category->updated_at))}}</td>
                                                <td><a href="/admin/post-category/{{$category->id}}/edit"><i class="far fa-edit"></i></a></td>
                                                <td><a href="/admin/post-category/{{$category->id}}/delete" onclick="if(! confirm ('Are you sure you want to delete this category?')) { return false; } "><i class="far fa-trash-alt"></i></a></td>
                                            </tr>
                                              @endforeach  
                                            @else
                                                <tr>
                                                    <th colspan="5" class="text-center">No Categories Created.</th>
                                                </tr> 
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection


