<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            تیم خلاق
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>الرئيسية</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">user</i>
                    <p>المتقدمين</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('jobs.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>الوظائف</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('cities.index') }}">
                    <i class="material-icons">world</i>
                    <p>المحافظات</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('nationalities.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>الجنسيات</p>
                </a>
            </li>
        </ul>
    </div>
</div>
