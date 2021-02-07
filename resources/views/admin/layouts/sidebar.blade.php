<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/auth/dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('admin/img/logo/xobotronix.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">E-commerce-bd</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/auth/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapCategory"
           aria-expanded="true" aria-controls="collapseBootstrapCategory">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Category</span>
        </a>
        <div id="collapseBootstrapCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category</h6>
                <a class="collapse-item" href="{{route('category.index')}}">View</a>
                <a class="collapse-item" href="{{route('category.create')}}">Create</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapSubcategory"
           aria-expanded="true" aria-controls="collapseBootstrapSubcategory">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Subcategory</span>
        </a>
        <div id="collapseBootstrapSubcategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subcategory</h6>
                <a class="collapse-item" href="{{route('subcategory.index')}}">View</a>
                <a class="collapse-item" href="{{route('subcategory.create')}}">Create</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"  data-target="#collapseBootstrapProduct"
           aria-expanded="true"  aria-controls="collapseBootstrapProduct">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Product</span>
        </a>
        <div  id="collapseBootstrapProduct" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product</h6>
                <a class="collapse-item" href="{{route('product.index')}}">View</a>
                <a class="collapse-item" href="{{route('product.create')}}">Create</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"  data-target="#collapseBootstrapSlider"
           aria-expanded="true"  aria-controls="collapseBootstrapSlider">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Slider</span>
        </a>
        <div  id="collapseBootstrapSlider" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Slider</h6>
                <a class="collapse-item" href="{{route('slider.index')}}">View</a>
                <a class="collapse-item" href="{{route('slider.create')}}">Create</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"  data-target="#collapseBootstrapOrder"
           aria-expanded="true"  aria-controls="collapseBootstrapOrder">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>User Order</span>
        </a>
        <div  id="collapseBootstrapOrder" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order</h6>
                <a class="collapse-item" href="{{route('order.index')}}">View</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"  data-target="#collapseBootstrapUser"
           aria-expanded="true"  aria-controls="collapseBootstrapUser">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Show All Users</span>
        </a>
        <div  id="collapseBootstrapUser" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customers</h6>
                <a class="collapse-item" href="{{route('user.index')}}">View</a>
            </div>
        </div>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"--}}
{{--           aria-controls="collapseForm">--}}
{{--            <i class="fab fa-fw fa-wpforms"></i>--}}
{{--            <span>Forms</span>--}}
{{--        </a>--}}
{{--        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Forms</h6>--}}
{{--                <a class="collapse-item" href="form_basics.html">Form Basics</a>--}}
{{--                <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"--}}
{{--           aria-controls="collapseTable">--}}
{{--            <i class="fas fa-fw fa-table"></i>--}}
{{--            <span>Tables</span>--}}
{{--        </a>--}}
{{--        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Tables</h6>--}}
{{--                <a class="collapse-item" href="simple-tables.html">Simple Tables</a>--}}
{{--                <a class="collapse-item" href="datatables.html">DataTables</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="ui-colors.html">--}}
{{--            <i class="fas fa-fw fa-palette"></i>--}}
{{--            <span>UI Colors</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <hr class="sidebar-divider">--}}
{{--    <div class="sidebar-heading">--}}
{{--        Examples--}}
{{--    </div>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"--}}
{{--           aria-controls="collapsePage">--}}
{{--            <i class="fas fa-fw fa-columns"></i>--}}
{{--            <span>Pages</span>--}}
{{--        </a>--}}
{{--        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Example Pages</h6>--}}
{{--                <a class="collapse-item" href="login.html">Login</a>--}}
{{--                <a class="collapse-item" href="register.html">Register</a>--}}
{{--                <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                <a class="collapse-item" href="blank.html">Blank Page</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="far fa-fw fa-window-maximize"></i>
            <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    <br>
    <li class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ ('Logout') }}</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
