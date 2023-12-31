<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item mb-4">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comment-alt"></i>
                    <p>Posts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-solid fa-list"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-solid fa-tags"></i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>Roles</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
