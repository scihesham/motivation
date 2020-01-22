<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('public/design/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>الاعضاء</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i> الاعضاء</a></li>
                    <li><a href="{{url('admin/users')}}?user=manager"><i class="fa fa-circle-o"></i> المدراء</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o" aria-hidden="true"></i> <span>الشركات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/companies')}}"><i class="fa fa-circle-o"></i> الشركات</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tag" aria-hidden="true"></i> <span>الاقسام</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/categories')}}"><i class="fa fa-circle-o"></i> الاقسام</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>الانشطه</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/activities')}}"><i class="fa fa-circle-o"></i> الانشطه</a></li>
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>