<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- Logo -->
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('home')}}">
            <img class="margin-l-20" style="width: 40px; height: 40px;" src="/images/doccloud.png">
            <!-- Logo icon -->
            <b><h4>DCLD</h4></b>

            <!--End Logo icon -->
            <!-- Logo text -->

        </a>
    </div>
    <!-- End Logo -->
    <div class="navbar-collapse">
        <!-- toggle and nav items -->
        <ul class="navbar-nav mr-auto mt-md-0">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <!-- Messages -->
            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                <div class="dropdown-menu animated zoomIn">
                    <ul class="mega-dropdown-menu row">




                    </ul>
                </div>
            </li>
            <!-- End Messages -->
        </ul>
        <!-- User profile and search -->
        <ul class="navbar-nav my-lg-0">

            <!-- Search -->
            <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="{{route('indexsearch')}}"><i class="ti-search"></i></a>
                <form class="app-search">

                    <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted  " href="#" id="clicka" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                    <div id="alert" class="notify" style="display: none"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                    <ul>
                        <li>
                            <div id="textinfo" class="drop-title"></div>
                        </li>
                        <li>
                            <div id="messages" class="message-center">
                                <!-- Message -->

                            </div>
                        </li>
                        <li id="viewall">

                        </li>
                    </ul>
                </div>
            </li>

            <!-- End Messages -->
            <!-- Profile -->
            <li class="nav-item dropdown">

                <a  id="profilee" class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                    <ul class="dropdown-user">

                        <li><a  href="#" onclick="document.getElementById('formlogout').submit()" ><form id="formlogout" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}

                            </form><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul>
            <li>{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->lastname}}</li>
        </ul>
    </div>
</nav>

@push('scripts')

@endpush