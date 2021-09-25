<div class="sidebar text-center font-bold" data-color="purple" data-background-color="white" data-image="">
    <div class="logo">
        <a class="simple-text logo-normal">
            <img src="{{ asset('assets/img/Logo.png') }}" width="170px">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons"></i>
                    <p>الرئيسية</p>
                </a>
            </li>
            @can('role-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="material-icons"></i>
                    <p>صلاحيات المشرفين</p>
                </a>
            </li>
            @endcan
            @can('admin-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('admins.index') }}">
                    <i class="material-icons"></i>
                    <p>المشرفين</p>
                </a>
            </li>
            @endcan
            @can('job-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('jobs.index') }}">
                    <i class="material-icons"></i>
                    <p>الوظائف</p>
                </a>
            </li>
            @endcan
            @can('nationality-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('nationalities.index') }}">
                    <i class="material-icons"></i>
                    <p>الجنسيات</p>
                </a>
            </li>
            @endcan
            @can('city-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('cities.index') }}">
                    <i class="material-icons"></i>
                    <p>المحافظات</p>
                </a>
            </li>
            @endcan
            @can('user-list')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons"></i>
                    <p>المتقدمين</p>
                </a>
            </li>
            @endcan
            @can('settings')
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('settings.edit', 1) }}">
                    <i class="material-icons"></i>
                    <p>الاعدادات</p>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
