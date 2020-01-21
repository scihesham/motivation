@extends('front.layout.master')

@section('title')
تسجيل حساب
@endsection

@section('header')

@endsection

@section('content')

<!--====================== start div of order  -==================================================-->
<div class="counters container-fluid" style="padding-bottom: 40px">

    <div class="row six flash animated infinite 2s">
        <div class="col-md-12 order">
            <p class="ordercompany">
سجل معانا الأن  
            </p>
        </div>
    </div>
</div>
<!--====================  end div of order =======================================================-->


<!--==================================================-->
<div class="container" style="margin-top: 80px; margin-bottom:80px">
    <div class="row">

        <div class="col-md-12">

            <div class="">

                <div class="row animate">
                    <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-2">
                        <form role="form" method="post" action="{{route('register')}}">
                            {{ csrf_field() }}
                            <h2>
                                للتسجيل الان
                                <small>
                                    التسجيل مجانى
                                </small></h2>
                            <hr class="colorgraph">
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select type="text" name="permission" id="display_name" class="form-control{{ $errors->has('permission') ? ' is-invalid' : '' }} input-lg" tabindex="3" value="{{ old('permission') }}" required>
                                            <option value="">نوع الحساب</option>
                                            <option value="2">صاحب مشروع</option>
                                            <option value="3">شركه</option>
                                        </select>
                                        @if ($errors->has('permission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('permission') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="display_name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-lg" placeholder="اسم المستخدم " tabindex="3" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-lg" placeholder="البريد الالكترونى " tabindex="4" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password1" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg" placeholder="كلمة المرور" tabindex="5" required autocomplete="new-password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="تأكيد كلمة المرور" tabindex="6" autocomplete="new-password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-3 col-md-3">
                                <span class="button-checkbox">
                                    <button type="button" class="btn" data-color="info" tabindex="7">
                                        أوافق
                                    </button>
                                    <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                                        @if ($errors->has('t_and_c'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('t_and_c') }}</strong>
                                            </span>
                                        @endif
                                </span>
                                </div>
                                <div class="col-xs-8 col-sm-9 col-md-9">
                                    بالضغط على زر
                                    <strong class="label label-primary" style="margin: 0px 10px;background-color: #00a9de;">
                                        تسجيل
                                    </strong>
                                    بالتالى انت توافق على
                                    <a href="#" data-toggle="modal" data-target="#t_and_c_m">
                                        شروط واحكام الموقع
                                    </a>
                                </div>
                            </div>

                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-2"><input type="submit" value="تسجيل" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>


                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    الشروط والاحكام
                                </h4>
                            </div>
                            <div class="modal-body">
                                <p>

                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" المحتوى المقروء المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.).
                                </p>

                                <p>

                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" المحتوى المقروء المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.).
                                </p>

                                <p>

                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" المحتوى المقروء المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.).
                                </p>
                                <p>

                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" المحتوى المقروء المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.).
                                </p>
                                <p>

                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" المحتوى المقروء المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.).
                                </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    نعم اوافق
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>

        </div>
    </div>
</div>

<!--==========================================================-->

@endsection