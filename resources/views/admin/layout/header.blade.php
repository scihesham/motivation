<header class="main-header">
    <!-- Logo -->
    <a href="{{url('login')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>تحفيز</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>تحفيز</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('public/design/adminlte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('public/design/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth()->user()->name}}
                                <small>مدير التطبيق</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a data-toggle="modal" data-target="#admin_modal" href="#" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> تغيير بياناتى</a>
                            </div>
                            <div class="pull-right">
                                <a  class="btn btn-primary logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-weight:unset;">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>

<div class="modal fade admin_modal" id="admin_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{url('admin/users').'/'.Auth::user()->id}}">
             {{ csrf_field() }}
             <input type="hidden" name="permission" value="{{Auth::user()->permission}}">
             <input name="_method" type="hidden" value="PATCH" />
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تغيير كلمة المرور</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success hidden admin_success text-center"></div>
                <div class="alert alert-danger hidden admin_error text-center"></div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="الاسم" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="البريد الالكترونى" value="{{Auth::user()->email}}">
                </div>
                <div class="form-group">
                    <input type="number" name="phone" id='' placeholder="رقم الجوال" class="form-control" value="{{ Auth::user()->phone }}" >
                </div>
                <div class="form-group">
                    <select name="city" class="select" id=''  required>
                        <option value="">...</option>
                        @foreach(ksaCities() as $key => $val)
                        <option value="{{$key}}" {{Auth::user()->city ==  $key ? 'selected' : ''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary change_password_button pull-left">حفظ التغييرات</button>
            </div>
             </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->