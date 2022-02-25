        <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">
          <!-- Search Box-->
          <div class="search-box shadow-sm">
            <button class="dismiss d-flex align-items-center">
              <svg class="svg-icon svg-icon-heavy">
                <use xlink:href="#close-1"> </use>
              </svg>
            </button>
            <form id="searchForm" action="#" role="search">
              <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
            </form>
          </div>
          <div class="container-fluid w-100">
            <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a class="navbar-brand d-none d-sm-inline-block" href="{{ route('home') }}">
                  <div class="brand-text d-none d-lg-inline-block"><span>RAMA 5 </span><strong> RIVERSIDE NOODLE SHOP</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a class="menu-btn active" id="toggle-btn" href="#"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>


                <!-- Logout    -->
                <li class="nav-item"><a class="nav-link text-white" href=" href="{{ route('logout') }}
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"> <span class="d-none d-sm-inline">Logout</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar z-index-40">
          <!-- Sidebar Header-->
          <ul class="list-unstyled py-4">
            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('home') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#real-estate-1"> </use>
                </svg>Home </a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('index.product') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#cart-1"> </use>
                </svg>Product</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('user.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#man-1"> </use>
                </svg>User</a></li>




        </nav>
