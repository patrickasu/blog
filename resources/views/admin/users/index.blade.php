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
                                <h5 class="card-header">All Users</h5>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Permissions</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                          @if ($users->count() > 0)
                                            @foreach ($users as $user) 
                                                <tr>
                                                    <td><img src="{{asset(@$user->profile->avatar)}}" width="70px" height="70px" style="border-radius: 50%;"></td>
                                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                                    <td>
                                                        @if ($user->admin)
                                                            <a href="/user/not-admin{{$user->id}}" class="btn btn-xs btn-danger">Remove Permissions</a>
                                                        @else 
                                                            <a href="/user/admin{{$user->id}}" class="btn btn-xs btn-success">Make Admin</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(Auth::id() !== $user->id)
                                                            <a href="/admin/users/{{$user->id}}/delete" class="btn btn-xs btn-danger" onclick="if(! confirm ('Are you sure you want to delete this user?')) { return false; } ">Delete</i></a></td>  
                                                        @endif
                                                    </td>
                                                    
                                                </tr>
                                             @endforeach  
                                            @else
                                                <tr>
                                                    <th colspan="5" class="text-center">No Users</th>
                                                </tr> 
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection


