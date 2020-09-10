<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

  <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{url('images/admin_images/admin_photos/' . Auth::guard('admin')->user()->image )}}"   alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>{{Auth::guard('admin')->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->


              <div class="menu_section">
                <ul class="nav nav-pills nav-side-menu flex-column has-treeview menu-open" data-widget="treeview" role="menu" >
                  <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link">
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li> 

                  <li class="nav-item">
                    <a href="#">
                      <p>
                        Settings 
                      </p>
                    </a>
                    <ul>
                      <li>
                        <a href="{{url('admin/update-admin-details')}}" class="nav-link">
                          <p>
                            Update Admin Details
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('admin/settings')}}" class="nav-link">
                          <p>
                            Update Admin Password 
                          </p>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a href="#">
                      <p>
                        Catalogue 
                      </p>
                    </a>
                    <ul>
                      <li>
                        <a href="{{url('admin/sections')}}" class="nav-link">
                          <p>
                            Section
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('admin/brands')}}" class="nav-link">
                          <p>
                            Brands 
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('admin/categories')}}" class="nav-link">
                          <p>
                            Categories 
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('admin/products')}}" class="nav-link">
                          <p>
                            Products
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="{{url('admin/banners')}}" class="nav-link">
                          <p>
                            Banners
                          </p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
</div>

