<div class="sidebar" data-image="{{asset('assets/images/logo/ama.png')}}">
  <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
  <div class="sidebar-wrapper">
      <div class="logo">
          <a href="/" class="simple-text">
             {{$settings->name}}
          </a>
      </div>
      <ul class="nav">
          <li class="nav-item {{Request::is('dashboard') ? 'active' : '';}}">
              <a class="nav-link" href="{{url('dashboard')}}">
                  <i class="nc-icon nc-chart-pie-35"></i>
                  <p>Dashboard
                    
                  </p>
              </a>
          </li>
          <li class="nav-item {{Request::is('categorys') ? 'active' : '';}}">
              <a class="nav-link" href="{{url('categorys')}}">
                  <i class="nc-icon nc-circle-09"></i>
                  <p>Categorys</p>
              </a>
          </li>
            <li class="nav-item {{Request::is('brands') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('brands')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Brands</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('coupons') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('coupons')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Coupons</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('products') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('products')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('d-orders') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('d-orders')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('profits') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('profits')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Sales</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('Settings') ? 'active' : '';}}">
                <a class="nav-link" href="{{url('settings')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Settings</p>
                </a>
            </li>
      </ul>
  </div>
</div>
