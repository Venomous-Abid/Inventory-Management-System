<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="{{Request::is('home') || Request::is('home/*') ? 'active-item': ''}}"><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                    <!--UI ELEMENTENTS-->
                    <li class="has-child-item close-item {{Request::is('manager') || Request::is('manager/*') ? 'active-item': ''}}">
                        <a><i class="fa fa-user-secret" aria-hidden="true"></i><span>Manager</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('manager.create')}}">Create Manager</a></li>
                            <li><a href="{{route('manager.all_managers')}}">All Managers</a></li>
                        </ul>
                    </li>
                    <!--CHARTS-->
                    <li class="has-child-item close-item {{Request::is('staff') || Request::is('staff/*') ? 'active-item': ''}}">
                        <a><i class="fa fa-user-plus" aria-hidden="true"></i><span>Staff</span> </a>
                        <ul class="nav child-nav level-1">
                          <li><a href="{{route('staff.create')}}">Create Staff</a></li>
                          <li><a href="{{route('staff.all_staffs')}}">All Staffs</a></li>
                          <li><a href="{{route('staff.all_markets')}}">Marketing Only</a></li>
                          <li><a href="{{route('staff.all_accounts')}}">Accounts Only</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item {{Request::is('category') || Request::is('category/*') ? 'active-item': ''}}">
                        <a><i class="fa fa-glass" aria-hidden="true"></i><span>Category</span> </a>
                        <ul class="nav child-nav level-1">
                          <li><a href="{{route('category.create')}}">Create Category</a></li>
                          <li><a href="{{route('category.all_categories')}}">All Categories</a></li>
                        </ul>
                    </li>

                    <!--FORMS-->
                    <li class="has-child-item close-item {{Request::is('product') || Request::is('product/*') ? 'active-item': ''}}">
                        <a><i class="fa fa-columns" aria-hidden="true"></i><span>Products </span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('product.create')}}">Create  Products</a></li>
                            <li><a href="{{route('product.all_product')}}">All Products</a></li>
                        </ul>
                    </li>
                    <!--TABLES-->
                    <li class="has-child-item close-item {{Request::is('stock') || Request::is('stock/*') ? 'active-item': ''}}">
                        <a><i class="fa fa-bell" aria-hidden="true"></i><span>Stock</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('stock.create')}}">Create</a></li>
                            <li><a href="{{route('stock.all_stock')}}">Stock History</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
