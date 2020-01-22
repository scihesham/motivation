@extends('admin.layout.master')

@section('header')
<style>

</style>
@endsection

@section('content')

@section('page_title')
قائمة الاقسام
@endsection

@section('active_title')
قائمة الاقسام
@endsection


<!-- Main content -->
<section class="content">

    <div style="width:99%; text-align:left; margin-top:10px">
        <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_cats_modal"><i class="fa fa-plus"></i> إضافة قسم جديد</a>
    </div>
    <div class="row dattable">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">قائمة الاقسام</div>
                <div class="panel-body fit" style="overflow-x:auto">

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="users-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الوصف</th>
                                        <th>الرتبه</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                </thead>
                                <tbody class="alluser">
                                    @foreach ($cats as $key => $cat)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td class="text-center center-vc">{{$cat->name}}</td>
                                        <td class="text-center center-vc" style="width:230px">
                                            <div class="content-table-cont" style="">
                                                <div class="content-table" style="">
                                                    {!! $cat->desc !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center center-vc">{{$cat->ordering}}</td>

                                        <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_cats_link" data-toggle="modal" data-target=".update_cats_modal" data-href="{{url('admin/categories').'/'.$cat->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a class="btn btn-danger btn-sm" href="{{url('admin/categories').'/'.$cat->id.'/delete'}}" onclick='return myfuncAr()'><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الوصف</th>
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

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor');

</script>
@endsection



<div class="modal fade create_cats_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <form method="post" action="{{url('admin/categories')}}">

                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">إضافة قسم</h4>
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
                                    <label>اسم القسم </label>
                                    <input type="text" name="name" id='' placeholder="اسم القسم" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>الوصف * </label>
                                    <textarea class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="summary-ckeditor" name="desc" required>{{ old('desc') }}</textarea>
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
                    <button type="submit" class="btn btn-primary pull-left">إضافة قسم</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_cats_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">


            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل القسم</h4>
            </div>
            <div class="modal-body body-edit"></div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
