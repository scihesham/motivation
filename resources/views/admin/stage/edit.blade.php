@section('footer')


@include('admin.partials.update')
<form method="post" action="{{url('admin/stages').'/'.$stage->id}}">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH" />
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="form-group">
                <label>عنوان المرحله </label>
                <input type="text" name="title" id='' placeholder="عنوان المرحله" class="form-control" value="{{ $stage->title }}" required>
            </div>
            <div class="form-group">
                <label>بدايه الكوينز </label>
                <input type="number" name="starts" id='' placeholder="عدد الكوينز" class="form-control" value="{{ $stage->starts }}" required>
            </div>

            <div class="form-group">
                <label>الرتبه *</label>
                <input type="number" name="ordering" id='ordering' placeholder="الرتبه" class="form-control" value="{{ $stage->ordering }}" required>
            </div>



        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
        <button type="submit" class="btn btn-primary pull-left">تعديل </button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
