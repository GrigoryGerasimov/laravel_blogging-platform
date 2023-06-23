<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item mb-4">
                <a href="{{ route('profile.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comment-alt"></i>
                    <p>Favourite Posts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.post.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment-alt"></i>
                    <p>My Posts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>My Comments</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
