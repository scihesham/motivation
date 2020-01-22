@section('footer')

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor-edit');

</script>

        @include('admin.partials.update')
        <form method="post" action="{{url('admin/categories').'/'.$cat->id}}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH" />
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="form-group">
                        <label>اسم القسم </label>
                        <input type="text" name="name" id='' placeholder="اسم القسم" class="form-control" value="{{ $cat->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>الوصف * </label>
                        <textarea class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="summary-ckeditor-edit" name="desc" required>{{ $cat->desc }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>الرتبه *</label>
                        <input type="number" name="ordering" id='ordering' placeholder="الرتبه" class="form-control" value="{{ $cat->ordering }}" required>
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
