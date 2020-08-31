<!DOCTYPE html>
<html lang="en">
@include('layouts.admin_layouts.head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>E-Commerce!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            @include('layouts.admin_layouts.sidebar')
            <!-- /sidebar menu -->

           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li role="presentation" class="nav-item">
                    <a href="{{url('admin/logout')}}" id="navbar"  aria-expanded="false">
                     Logout
                    </a>
                  </li>
                </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
@include('layouts.admin_layouts.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
@include('layouts.admin_layouts.foot')
	
  </body>
</html>
