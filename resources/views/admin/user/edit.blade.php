<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
        @include('admin.partials.update')
        <form method="post" action="{{url('admin/users').'/'.$user->id}}" >
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH" />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>اسم العضو</label>
                        <input type="text" name="name" placeholder="اسم العضو" class="form-control" value="{{$user->name}}" required>
                    </div>

                    <div class="form-group">
                        <label>البريد الالكترونى </label>
                        <input type="text" name="email" id='art_name' placeholder="البريد الالكترونى" class="form-control" value="{{$user->email}}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>رقم الجوال </label>
                        <input type="number" name="phone" id='' placeholder="رقم الجوال" class="form-control" value="{{ $user->phone }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>الصلاحيه *</label>
                        <select name="permission" class="select form-control" id='art_name' required>
                            <option value="">...</option>
                            @foreach(permissions() as $key => $val)
                            <option value="{{$key}}" {{$user->permission == $key ? 'selected' : ''}}>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>المدينه *</label>
                        <select name="city" class="select form-control" id='art_name'  required>
                            <option value="">...</option>
                            @foreach(ksaCities() as $key => $val)
                            <option value="{{$key}}" {{$user->city ==  $key ? 'selected' : ''}}>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>الرقم السري </label>
                        <input type="password" name="password" id='art_name' placeholder="الرقم السري" class="form-control" autocomplete="new-password" >
                    </div>
                    <div class="form-group">
                        <label>تأكيد الرقم السري </label>
                        <input type="password" name="password_confirmation" id='art_name' placeholder="تأكيد الرقم السري" class="form-control" autocomplete="new-password" >
                    </div>
                </div>
            </div>
            <div class="modal-footer edit-modal">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary pull-left">تعديل العضو</button>
            </div>
        </form>
<!--    </div>-->
<!--</div>-->
