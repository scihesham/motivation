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
                    <li><a href="{{url('admin/users')}}?user=owner"><i class="fa fa-circle-o"></i> اصحاب المشاريع</a></li>
                    <li><a href="{{url('admin/users')}}?user=company"><i class="fa fa-circle-o"></i> الشركات</a></li>
                    <li><a href="{{url('admin/users')}}?user=manager"><i class="fa fa-circle-o"></i> المدراء</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building" aria-hidden="true"></i> <span>المشروعات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/projects')}}?project=non"><i class="fa fa-circle-o"></i> غير منفذه</a></li>
                    <li><a href="{{url('admin/projects')}}?project=under"><i class="fa fa-circle-o"></i> تحت التنفيذ</a></li>
                    <li><a href="{{url('admin/projects')}}?project=done"><i class="fa fa-circle-o"></i> منفذه</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                   <i class="fa fa-gavel" aria-hidden="true"></i> <span>المنازعات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/project/offer/disputes')}}?status=open"><i class="fa fa-circle-o"></i> مفتوحه</a></li>
                    <li><a href="{{url('admin/project/offer/disputes')}}?status=solved"><i class="fa fa-circle-o"></i> تم حلها</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>