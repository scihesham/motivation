@extends('admin.layout.master')

@section('header')
<style>

</style>
@endsection

@section('content')

@section('page_title')
قائمة المراحل
@endsection

@section('active_title')
قائمة المراحل
@endsection


<!-- Main content -->
<section class="content">

    <div style="width:99%; text-align:left; margin-top:10px">
        <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_stage_modal"><i class="fa fa-plus"></i> إضافة مرحله جديده</a>
    </div>
    <div class="row dattable">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">قائمة المراحل</div>
                <div class="panel-body fit" style="overflow-x:auto">

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="users-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>بدايه الكوينز</th>
                                        <th>الرتبه</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                </thead>
                                <tbody class="alluser">
                                    @foreach ($stages as $key => $stage)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td class="text-center center-vc">{{$stage->title}}</td>
                                        <td class="text-center center-vc">{{$stage->starts}}</td>
                                        <td class="text-center center-vc">{{$stage->ordering}}</td>

                                        <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_stage_link" data-toggle="modal" data-target=".update_stage_modal" data-href="{{url('admin/stages').'/'.$stage->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a class="btn btn-danger btn-sm" href="{{url('admin/stages').'/'.$stage->id.'/delete'}}" onclick='return myfuncAr()'><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>بدايه الكوينز</th>
                                        <th>الرتبه</th>
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



<div class="modal fade create_stage_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <form method="post" action="{{url('admin/stages')}}">

                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">إضافة مرحله</h4>
                </div>
                <div class="modal-body">
                    <!--
                <div class="panel panel-default">
                    <div class="panel-body">
-->
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>عنوان المرحله </label>
                                    <input type="text" name="title" id='' placeholder="عنوان المرحله" class="form-control" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>بدايه الكوينز  </label>
                                    <input type="number" name="starts" id='' placeholder="عدد الكوينز" class="form-control" value="{{ old('starts') }}" required>
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
                    <button type="submit" class="btn btn-primary pull-left">إضافة مرحله</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_stage_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">


            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل المرحله</h4>
            </div>
            <div class="modal-body body-edit"></div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
