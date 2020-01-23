@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة الاعضاء
@endsection

@section('active_title')
قائمة الاعضاء
@endsection


<!-- Main content -->
<section class="content">

<div style="width:99%; text-align:left; margin-top:10px">
    <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_user_modal"><i class="fa fa-plus"></i> إضافة عضو جديد</a>
</div>
<div class="row dattable">
    <div class="col-xs-12">
                    <div class="panel panel-primary">
                <div class="panel-heading">قائمة الاعضاء</div>
                <div class="panel-body"> 
                    
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body fit" >
                <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>رقم الجوال</th>
                            <th>المدينه</th>
                            @if(!$admin)
                            <th>الكوينز</th>
                            <th>الكود</th>
                            @endif
                            <th>الصلاحيه</th>
                            <th class="text-center">تعديل</th>
                            <th class="text-center">حذف</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                       @foreach ($users as $key => $user)
                        <tr class="">
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{ksaCities()[$user->city]}}</td>
                            @if(!$admin)
                            <td>{{$user->coins}}</td>
                            <td>{{$user->code}}</td>
                            @endif
                            <td>{{permissions()[$user->permission]}}</td>
                            @if($user->id != Auth::user()->id)
                            <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$user->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-danger btn-sm" href="{{url('admin/users').'/'.$user->id.'/delete'}}" onclick='return myfunc()'><i class="fa fa-trash-o"></i></a>
                            </td>
                            @else
                            <td></td>
                            <td></td>
                            @endif
                        </tr>
                        @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>رقم الجوال</th>
                            <th>المدينه</th>
                            @if(!$admin)
                            <th>الكوينز</th>
                            <th>الكود</th>
                            @endif
                            <th>الصلاحيه</th>
                            <th class="text-center">تعديل</th>
                            <th class="text-center">حذف</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
                        </div>
        </div>
        

    </div>
    <!-- /.col -->
</div>
</section>
<!-- /.content -->




@endsection

@section('footer')
<script src="{{url('public/design/adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('public/design/adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,                                   
            
        });
    });
</script>
@endsection



<div class="modal fade create_user_modal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{url('admin/users')}}">

            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">إضافة عضو</h4>
            </div>
            <div class="modal-body">
<!--
                <div class="panel panel-default">
                    <div class="panel-body">
-->
                        @include('admin.partials.create')
                        
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="panel panel-default">
                                    <div class="panel-body" >
                                        <div class="form-group">
                                            <label>اسم العضو </label>
                                            <input type="text" name="name" id='' placeholder="اسم العضو" class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>البريد الالكترونى </label>
                                            <input type="email" name="email" id='' placeholder="البريد الالكترونى" class="form-control" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>رقم الجوال </label>
                                            <input type="number" name="phone" id='' placeholder="رقم الجوال" class="form-control" value="{{ old('phone') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>الصلاحيه *</label>
                                            <select name="permission" class="select" id='art_name'  required>
                                                <option value="">...</option>
                                                @foreach(permissions() as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>المدينه *</label>
                                            <select name="city" class="select" id='art_name'  required>
                                                <option value="">...</option>
                                                @foreach(ksaCities() as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>الرقم السري </label>
                                            <input type="password" name="password" id='art_name' placeholder="الرقم السري" class="form-control" autocomplete="new-password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>تأكيد الرقم السري </label>
                                            <input type="password" name="password_confirmation" id='art_name' placeholder="تأكيد الرقم السري" class="form-control" autocomplete="new-password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
<!--
                    </div>
                </div>
-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
<!--                <button type="button" class="btn btn-primary create_application_button pull-left">إضافة عضو</button>-->
                <button type="submit" class="btn btn-primary pull-left">إضافة عضو</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_user_modal" id="update_user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل العضو</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
