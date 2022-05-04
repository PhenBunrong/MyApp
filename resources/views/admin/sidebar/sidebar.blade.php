<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
    <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
    <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div>

    <div class="form-inline">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('class.index')}}" class="nav-link @yield('class.index')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Class
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.index')}}" class="nav-link @yield('teacher.index')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Teacher
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subject.index')}}" class="nav-link @yield('subject.index')">
                        <i class="nav-icon fa fa-wallet"></i>
                        <p>
                            Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.index')}}" class="nav-link @yield('student.index')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>