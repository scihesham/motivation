@section('footer')

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor-edit');

</script>

<script>
    $(".select").selectBoxIt({
        autoWidth: false
    });

</script>


<form method="post" action="{{url('admin/coupons').'/'.$coupon->id}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH" />
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>عنوان الكوبون </label>
                <input type="text" name="coupon_title" id='' placeholder="عنوان الكوبون" class="form-control" value="{{ $coupon->coupon_title }}" required>
            </div>
            <div class="form-group">
                <label>نسبه الخصم </label>
                <input type="number" name="coupon_percentage" id='' placeholder="نسبه الخصم" class="form-control" value="{{ $coupon->coupon_percentage }}" required>
            </div>

            <div class="form-group">
                <label>التفاصيل </label>
                <textarea class="form-control{{ $errors->has('coupon_details') ? ' is-invalid' : '' }}" id="summary-ckeditor-edit" name="coupon_details" required>{{ $coupon->coupon_details }}</textarea>
            </div>

            <div class="form-group">
                <label>العدد </label>
                <input type="number" name="coupon_count" id='' placeholder="العدد" class="form-control" value="{{ $coupon->coupon_count }}" required>
            </div>

            <div class="form-group">
                <label>صورة الكوبون </label>
                <input type="file" name="attachment" id='' class="form-control">
            </div>

            <div class="form-group">
                <label>اسم الشركه *</label>
                <select name="company_id" class="select" required>
                    <option value="">...</option>
                    @foreach(companies() as $key => $val)
                    <option value="{{$val->id}}" {{$coupon->company->id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>القسم *</label>
                <select name="category_id" class="select" required>
                    <option value="">...</option>
                    @foreach(categories() as $key => $val)
                    <option value="{{$val->id}}" {{$coupon->category->id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>المرحله *</label>
                <select name="stage_id" class="select" required>
                    <option value="">...</option>
                    @foreach(\App\Stage::orderBy('ordering', 'desc')->get() as $key => $val)
                    <option value="{{$val->id}}" {{$coupon->stage->id == $val->id ? 'selected' : ''}}>{{$val->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>عدد الكوينز </label>
                <input type="number" name="coins" id='' placeholder="العدد" class="form-control" value="{{ $coupon->coins }}" required>
            </div>

        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
        <button type="submit" class="btn btn-primary pull-left">تعديل الكوبون</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
