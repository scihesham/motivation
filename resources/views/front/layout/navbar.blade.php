<nav class="navbar navbar-default" id="second_nav" role="navigation">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav" style="margin-top: 0px;font-size: 15px" id="scl">

                <li><a href="#">
                    <i class="fa fa-whatsapp"></i>
                </a></li>
                <li><a href="#">
                    <i class="fa fa-facebook" ></i>
                </a></li>
                <li><a href="#">
                    <i class="fa fa-twitter" ></i>
                </a></li>
                <li><a href="#">
                    <i class="fa fa-google-plus"></i>
                </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-top: 0px;font-size: 15px">
                <li><a href="#">
                    <i class="fa fa-phone" style="transform: scaleX(-1);"></i>

                    00212661483155
                </a></li>
                <li><a href="#">
                    <i class="fa fa-envelope" style=""></i>
                    dlelcompany@gmail.com
                </a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<!--=============================================================-->
<div class="navbar navbar-default" role="navigation" id="slide-nav">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('public/design/mandoby')}}/images/logo.png" alt=" logo" style="width: 180px;"></a>

        </div>
        <div id="slidemenu" style="">



            <ul class="nav navbar-nav" id="sec">
                <li class=" active" id=""><a href="{{url('/')}}">
                    الرئيسية

                </a>
                </li>
                @if(Auth::user() && (Auth::user()->permission == 2 || Auth::user()->permission == 3) )
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">


                        مشروعاتى

                    <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        @if(Auth::user()->permission == 2 )
                        <li>
                            <a href="{{url('projects')}}?project=non">
                               غير منفذه 
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url('projects')}}?project=under">
                                تحت التنفيذ
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{url('projects')}}?project=done">
                                منفذه
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                
                @if(Auth::user() && Auth::user()->permission == 3)
                <li class="" id="">
                    <a href="{{url('search/projects')}}">
                    بحث<i class="fa fa-search" style="margin-right:5px"></i> 
                    </a>
                </li>
                @endif

                <li class="" ><a href="">


                    من نحن
                </a>


                </li>


                <li class="" ><a href="">

                    خدماتنا


                </a>


                </li>



                <li class="" ><a href="">



                    اتصل بنا

                </a>



                </li>
                
                @if(Auth::user())
<!--
                <li>
                    <a href="#">
                        <i class="fa fa-envelope" style=""></i>
                    </a>
                </li>
-->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                      <i class="fa fa-envelope" style=""></i>

                    </a>
                    <ul class="dropdown-menu msg-menu" style="left:0; right:auto; width:300px; padding: 0 1px">
                        <?php $i = 0?>
                        @foreach(messagesNotification() as $msg)
                        <?php
                            if($i < 4)
                                $i++;
                            else
                                break;
                        ?>
                        <li class="msg" style="position:relative">
                            <!-- project messages -->
                            @if(isset($msg->offer->project->title))
                            <a href="{{url('messages').'/'.$msg->offer->id}}#last-msg" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">{{$msg->offer->project->title}}</center><br>
                            <span style="color:#75787d">{{$msg->content}}</span>
                            @if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0')
                            <small>لم تتم القراءه</small>
                            @endif
                            <hr style="margin-bottom:0">
                            </a>
                             
                            @else
                            <!-- dispute messages -->
                            <a href="#" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">dispute</center><br>
                            <span style="color:#75787d">{{$msg->content}}</span>
                            <small>لم تتم القراءه</small>
                            <hr style="margin-bottom:0">
                            </a> 
                            @endif
                        </li>
                        @endforeach
                        <li>
                            <a href="#" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه الرسائل</a>
                        </li>
                    </ul>
                </li>
                <!-- projects notification -->
                <!-- if user is company or admin or support -->
                @if(Auth::user()->permission == '3' || Auth::user()->permission == '0' || Auth::user()->permission == '1')
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                      <i class="fa fa-bell" style=""></i>

                    </a>
                    <ul class="dropdown-menu project-menu" style="left:0; right:auto; width:300px; padding: 0 1px">
                        @foreach(\App\Project::where('status', '0')->orderBy('id', 'desc')->limit(4)->get() as $project)
                        <li class="msg" style="position:relative">
                            <a href="{{url('offer/project').'/'.$project->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">{{$project->title}}</center><br>
                            <span style="color:#75787d">{{$project->desc}}</span>
                            <small style="color: green">{{$project->created_at->format('Y-m-d')}}</small>
                            <small style="color: green; direction:ltr" class="hours">{{$project->created_at->format('h:i a')}}</small>
                            <hr style="margin-bottom:0; margin-top:30px;">
                            </a> 
                        </li>
                        @endforeach
                        
                        <li>
                            <a href="{{url('search/projects')}}" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه المشاريع</a>
                        </li>
                    </ul>
                </li>
                @endif
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                      {{Auth::user()->name}}
                        <span class="caret"></span>

                    </a>
                    <ul class="dropdown-menu" style=" width:200px; padding: 0 1px">

                        <li>
                            <a href="{{url('myprofile')}}" style="font-size:16px; font-weight:bold; color:green; padding:15px 20px">بياناتى</a>
                        </li><hr style="margin:0">
                        <li>
                            <a style="font-size:16px; font-weight:bold; color:#ff1818; padding:10px 20px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                                خروج
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">


                        اشترك معنا الان

                    <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        <li><a href="{{route('register')}}">
                           تسجيل حساب جديد
                        </a></li>

                        <li><a href="{{route('login')}}">
                            تسجيل الدخول
                        </a></li>

                    </ul>
                </li>
                @endif

            </ul>


        </div>
    </div>
</div>