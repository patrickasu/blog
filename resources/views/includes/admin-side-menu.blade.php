<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="/home">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                    Menu
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="/home" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                </li>
                    <li class="nav-item">
                         <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2-1" aria-controls="submenu-2-1">Food Items</a>
                                    <div id="submenu-2-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="/admin/food-items">All Food Items <span class="badge badge-secondary">New</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/admin/food-items/create">Create Food Item <span class="badge badge-secondary">New</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>  --}}
                            </ul>
                        </div>   
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-5"><i class="fa fa-fw fa-rocket"></i>Categories</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/post-category/create">Create New Category <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/post-category">All Categories <span class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-rocket"></i>Tags</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/tag/create">Create Tag <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/tag">All Tags <span class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="fa fa-fw fa-rocket"></i>Posts</a>
                        <div id="submenu-11" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/posts/create"> Create Post <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/posts"> All Posts <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/posts/trashed">Trashed Posts <span class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>



                {{-- <li class="nav-item">
                    <a class="nav-link" href="/admin/posts/create"> Create New Post <span class="badge badge-secondary">New</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts"> All Posts <span class="badge badge-secondary">New</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts/trashed"> All Trashed Posts <span class="badge badge-secondary">New</span></a>
                </li> --}}
                @if (Auth::user()->admin)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-rocket"></i>Users</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/users">All Users <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/users/create">Create Users <span class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> 
            </ul>
        </div>
    </nav>
</div>