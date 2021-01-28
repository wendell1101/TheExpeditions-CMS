<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/admin.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><img src="{{ asset('img/logo-light.png') }}" alt="The Expeditions" style="height:60px"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Gravatar::get(auth()->user()->email) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('users.show', auth()->user()->slug) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin" class="nav-link @if(Request::is('admin')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('users.index') }}" class="nav-link @if(Request::is('users')) active   @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('categories.index') }}" class="nav-link @if(Request::is('categories')) active   @endif">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('posts.index') }}" class="nav-link @if(Request::is('posts')) active   @endif">
                        <i class="nav-icon fas fa-newspaper" aria-hidden="true"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('tags.index') }}" class="nav-link @if(Request::is('tags')) active   @endif">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                
                <li class="nav-item menu-open mt-5">
                    <a href="{{ route('recycled-post.index') }}" class="nav-link @if(Request::is('recycled/*')) active   @endif">
                        <i class="nav-icon fas fa-newspaper" aria-hidden="true"></i>
                        <p>
                            Recycled Posts
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>