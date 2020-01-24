@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة الشركات
@endsection

@section('active_title')
قائمة الشركات
@endsection


<!-- Main content -->
<section class="content">

    <div style="width:99%; text-align:left; margin-top:10px">
        <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_company_modal"><i class="fa fa-plus"></i> إضافة شركه جديده</a>
    </div>
    <div class="row dattable">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">قائمة الشركات</div>
                <div class="panel-body">

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body fit" >
                            <table id="users-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>العنوان</th>
                                        <th>رقم الجوال</th>
                                        <th>البريد الالكتروني</th>
                                        <th>ملاحظات</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                </thead>
                                <tbody class="alluser">
                                    @foreach ($companies as $key => $company)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>{{$company->name}}</td>
                                        <td>
                                            <div class="content-table-cont" style="width:210px">
                                                <div class="content-table" style="width:200px">
                                                    {{$company->address}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$company->phone}}</td>
                                        <td>{{$company->email}}</td>
                                        <td class="text-center">
                                            <div class="content-table-cont">
                                                <div class="content-table">
                                                    {!! $company->notes !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_company_link" data-toggle="modal" data-target=".update_company_modal" data-href="{{url('admin/companies').'/'.$company->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a class="btn btn-danger btn-sm" href="{{url('admin/companies').'/'.$company->id.'/delete'}}" onclick='return myfuncAr()'><i class="fa fa-trash-o"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>العنوان</th>
                                        <th>رقم الجوال</th>
                                        <th>البريد الالكتروني</th>
                                        <th>ملاحظات</th>
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



<div class="modal fade create_company_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <form method="post" action="{{url('admin/companies')}}">

                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">إضافة شركه</h4>
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
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>اسم الشركه </label>
                                    <input type="text" name="name" id='' placeholder="اسم الشركه" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>العنوان </label>
                                    <input type="text" name="address" id='' placeholder="العنوان" class="form-control" value="{{ old('address') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>رقم الجوال </label>
                                    <input type="number" name="phone" id='' placeholder="رقم الجوال" class="form-control" value="{{ old('phone') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>البريد الالكترونى </label>
                                    <input type="email" name="email" id='' placeholder="البريد الالكترونى" class="form-control" value="{{ old('email') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>ملاحظات </label>
                                    <textarea class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" id="summary-ckeditor" name="notes">{{ old('notes') }}</textarea>
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
                    <button type="submit" class="btn btn-primary pull-left">إضافة شركه</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_company_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">


            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل الشركه</h4>
            </div>
            <div class="modal-body body-edit"></div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
