<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:87vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white" aria-current="page"><i class="bi bi-me-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Permissions Management</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Users</a>
        </li>
        <li>
        <li class="nav-item">
            <a href="{{ route('student') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Students</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('teacher.index') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Teacher</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('courses.index') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Courses</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permissions.index') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Permissions</a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link text-white" aria-current="page"><i
                    class="bi bi-me-2"></i>Roles</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white" aria-current="page"><i class="bi bi-me-2"></i>Orders</a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
        </ul>
    </div>
</div>
