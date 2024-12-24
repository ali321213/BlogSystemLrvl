<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey. H</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#catalog" aria-expanded="false" aria-controls="catalog">
                <span class="menu-title">Catalog</span>
                <i class="mdi mdi-arrow-right menu-icon"></i>
            </a>
            <div class="collapse" id="catalog">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('product/index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('category/index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('units/index') }}">Units</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('product/index') }}">Brands</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="customers">
                <span class="menu-title">Customers</span>
                <i class="mdi mdi-arrow-right menu-icon"></i>
            </a>
            <div class="collapse" id="customers">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('product/index') }}">All Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('category/index') }}">Reviews</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#reporting" aria-expanded="false" aria-controls="reporting">
                <span class="menu-title">Reporting</span>
                <i class="mdi mdi-arrow-right menu-icon"></i>
            </a>
            <div class="collapse" id="reporting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('product/index') }}">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('category/index') }}">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('units/index') }}">Products</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>