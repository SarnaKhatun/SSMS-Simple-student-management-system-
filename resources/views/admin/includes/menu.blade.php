<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboards</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.html">Default</a></li>
                        <li><a href="dashboard-saas.html">Saas</a></li>
                        <li><a href="dashboard-crypto.html">Crypto</a></li>
                    </ul>
                </li>

                @if(Auth()->user()->access_label == 2)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>User Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('users.create')}}">Add User</a></li>
                        <li><a href="{{route('users.index')}}">Manage User</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth()->user()->access_label == 1)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-task"></i>
                        <span>Teacher Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('edit.profile')}}">Update Profile</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth()->user()->access_label == 1 || Auth()->user()->access_label == 2)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Course Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('courses.create')}}">Add Course</a></li>
                        <li><a href="{{route('courses.index')}}">Manage Course</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth()->user()->access_label == 0)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-edit"></i>
                        <span>Student Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('edit.profile')}}">Update Profile</a></li>
                    </ul>
                </li>
                @endif


                @if(Auth()->user()->access_label == 2)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Enroll Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('manage.enroll')}}">Manage Enroll</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
