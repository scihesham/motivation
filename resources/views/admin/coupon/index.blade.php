@extends('admin.layout.master')

@section('header')
<link rel="stylesheet" href="{{url('public/design/adminlte/colorbox/colorbox.css')}}" />
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة الكوبونات
@endsection

@section('active_title')
قائمة الكوبونات
@endsection


<!-- Main content -->
<section class="content">

    <div style="width:99%; text-align:left; margin-top:10px">
        <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_coupon_modal"><i class="fa fa-plus"></i> إضافة كوبون جديد</a>
    </div>
    <div class="row dattable">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">قائمة الكوبونات</div>
                <div class="panel-body">

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body fit">
                            <table id="users-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان الكوبون</th>
                                        <th>نسبه الخصم</th>
                                        <th>التفاصيل</th>
                                        <th>العدد</th>
                                        <th>صوره الكوبون</th>
                                        <th>اسم الشركه</th>
                                        <th>القسم</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                </thead>
                                <tbody class="alluser">
                                    @foreach ($coupons as $key => $coupon)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td class="center-vc">{{$coupon->coupon_title}}</td>
                                        <td class="center-vc text-center">{{$coupon->coupon_percentage}} %</td>
                                        <td class="text-center">
                                            <div class="content-table-cont">
                                                <div class="content-table">
                                                    {!! $coupon->coupon_details !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="center-vc text-center">{{$coupon->coupon_count}}</td>
                                        <td class="center-vc">
                                            <a class="group1" href="{{url('public/upload'.'/'.$coupon->attach->path)}}" title="{{$coupon->attach->name}}">
                                                <img src="{{url('public/upload'.'/'.$coupon->attach->path)}}" style="max-width:100px">
                                            </a>
                                        </td>
                                        <td class="center-vc">
                                            <a class="update_company_link" data-toggle="modal" data-target=".update_company_modal" data-href="{{url('admin/companies').'/'.$coupon->company->id.'/edit'}}" style="cursor:pointer">
                                                {{$coupon->company->name}}
                                            </a>
                                        </td>
                                        <td class="center-vc">
                                            <a class="update_cats_link" data-toggle="modal" data-target=".update_cats_modal" data-href="{{url('admin/categories').'/'.$coupon->category->id.'/edit'}}" style="cursor:pointer">
                                            {{$coupon->category->name}}
                                            </a>
                                        </td>
                                        <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_coupon_link" data-toggle="modal" data-target=".update_coupon_modal" data-href="{{url('admin/coupons').'/'.$coupon->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a class="btn btn-danger btn-sm" href="{{url('admin/coupons').'/'.$coupon->id.'/delete'}}" onclick='return myfunc()'><i class="fa fa-trash-o"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان الكوبون</th>
                                        <th>نسبه الخصم</th>
                                        <th>التفاصيل</th>
                                        <th>العدد</th>
                                        <th>صوره الكوبون</th>
                                        <th>اسم الشركه</th>
                                        <th>القسم</th>
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

<script src="{{url('public/design/adminlte/colorbox/jquery.colorbox.js')}}"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
//        $(".group1").colorbox({rel:'group1'});
        $(".group1").colorbox({rel:'group1', maxWidth:"800px"});
    });
</script>
@endsection



<div class="modal fade create_coupon_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <form method="post" action="{{url('admin/coupons')}}" enctype="multipart/form-data">

                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">إضافة كوبون</h4>
                </div>
                <div class="modal-body">

                    @include('admin.partials.create')

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>عنوان الكوبون </label>
                                    <input type="text" name="coupon_title" id='' placeholder="عنوان الكوبون" class="form-control" value="{{ old('coupon_title') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>نسبه الخصم </label>
                                    <input type="number" name="coupon_percentage" id='' placeholder="نسبه الخصم" class="form-control" value="{{ old('coupon_percentage') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>التفاصيل </label>
                                    <textarea class="form-control{{ $errors->has('coupon_details') ? ' is-invalid' : '' }}" id="summary-ckeditor" name="coupon_details" required>{{ old('coupon_details') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>العدد </label>
                                    <input type="number" name="coupon_count" id='' placeholder="العدد" class="form-control" value="{{ old('coupon_count') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>صورة الكوبون </label>
                                    <input type="file" name="attachment" id=''  class="form-control"  required>
                                </div>

                                <div class="form-group">
                                    <label>اسم الشركه *</label>
                                    <select name="company_id" class="select" required>
                                        <option value="">...</option>
                                        @foreach(companies() as $key => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>القسم *</label>
                                    <select name="category_id" class="select" required>
                                        <option value="">...</option>
                                        @foreach(categories() as $key => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
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
                    <button type="submit" class="btn btn-primary pull-left">إضافة كوبون</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_coupon_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">


            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل الكوبون</h4>
            </div>
            <div class="modal-body body-edit"></div>


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
