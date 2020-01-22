@section('footer')

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor-edit');

</script>

<form method="post" action="{{url('admin/companies').'/'.$company->id}}">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH" />
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>اسم الشركه </label>
                <input type="text" name="name" id='' placeholder="اسم الشركه" class="form-control" value="{{ $company->name }}" required>
            </div>
            <div class="form-group">
                <label>العنوان </label>
                <input type="text" name="address" id='' placeholder="العنوان" class="form-control" value="{{ $company->address }}" required>
            </div>

            <div class="form-group">
                <label>رقم الجوال </label>
                <input type="number" name="phone" id='' placeholder="رقم الجوال" class="form-control" value="{{ $company->phone }}" required>
            </div>

            <div class="form-group">
                <label>البريد الالكترونى </label>
                <input type="email" name="email" id='' placeholder="البريد الالكترونى" class="form-control" value="{{ $company->email }}" required>
            </div>

            <div class="form-group">
                <label>ملاحظات </label>
                <textarea class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" id="summary-ckeditor-edit" name="notes">{{ $company->notes }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
        <button type="submit" class="btn btn-primary pull-left">تعديل الشركه</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
