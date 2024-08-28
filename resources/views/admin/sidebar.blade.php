<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="title">
                <h1 class="h5"><i class="fa-solid fa-user-tie"></i> {{Auth::user()->name}}</h1>
                <p>Administrator</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li><a href="{{url("admin/dashboard")}}"> <i class="icon-home"></i>Home </a></li>
            <li>
                <a href="{{ url('view_category') }}"> <i class="icon-grid   "></i>Category </a>
            </li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                        class="icon-windows"></i>Products </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Product</a></li>
                    <li><a href="{{url('view_product')}}">View Products</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('view_orders') }}"> <i class="icon-paper-and-pencil"></i>Orders </a>
            </li>
            <li>
                <a href="{{ url('view_messages') }}"> <i class="fa-solid fa-message"></i>Messages </a>
            </li>
        </ul>

    </nav>
