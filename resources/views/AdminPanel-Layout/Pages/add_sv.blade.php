@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title','الصفحة الرئيسية')
@include('AdminPanel-Layout.Messages.alerts')
@section('content')
<script>

</script>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" >اضافة مشرف</div>
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="needs-validation" action="{{route('supervisors.store')}}" method="post" role="form" novalidate>
					
					{{csrf_field()}}
					
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">الاسم الاول</label>
                            <input type="text" class="form-control" name="sup_first_name" id="validationCustom01" value="{{ old('sup_first_name') }}" required>
                            <div class="invalid-feedback">
                                ادخل الاسم الاول
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">الاسم الثاني</label>
                            <input type="text" class="form-control" name="sup_second_name" id="validationCustom01" value="{{ old('sup_second_name') }}" required>
                            <div class="invalid-feedback">
                                ادخل الاسم الثاني
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">الايميل</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="email" class="form-control" name="sup_email_address" id="validationCustomUsername"  aria-describedby="inputGroupPrepend" required value="{{ old('sup_email_address') }}">
                                <div class="invalid-feedback">
                                    ادخل الايميل
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                                <label for="validationCustom03">العنوان</label>
                                <input type="text" class="form-control" name="sup_address" id="validationCustom03"  required value="{{ old('sup_address') }}">
                                <div class="invalid-feedback">
                                    ادخل العنوان
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">اسم المستخدم</label>
                            <input type="text" class="form-control" name="sup_user_name" id="validationCustom04"  required value={{ old('sup_user_name') }}>
                            <div class="invalid-feedback">
                                ادخل اسم المستخدم
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">رقم الهاتف</label>
                            <input type="number" class="form-control textPhone"  name="sup_phone_number" id="validationCustom04"  required value="{{ old('sup_phone_number') }}">
                            <div class="invalid-feedback">
                                ادخل رقم الهاتف
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05">كلمة المرور</label>
                            <input type="password" class="form-control" name="sup_password" id="validationCustom05"  required value="{{ old('sup_password') }}">
                            <div class="invalid-feedback">
                                ادخل كلمة المرور
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom05"> تحديد الصلاحية</label><br>
                           <select class="test form-control" name="cus_type" multiple="multiple">
                                <optgroup label=" تحديد الصلاحية">
                                @foreach($roles as $role)
                                    <option value="{{ $role->Role_name }}">{{ $role->Role_name }}</option>
                                @endforeach
                                  

                                </optgroup>
                            </select>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05"> تأكيد كلمة المرور </label>
                            <input type="password" class="form-control" id="validationCustom05" name="confirm_pass" required value="{{ old('confirm_pass') }}">
                            <div class="invalid-feedback">
                                تأكيد كلمة المرور
                            </div>
                        </div>
               
                    </div>
                    <button class="btn btn-primary" type="submit" style="float:left">اضافة</button>
                </form>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>
        </div>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                  <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link"> جميع الحقوق محفوظة لدى                     
                            <span class="logo-lg"><b style="color:rgb(94, 92, 91)">
                                 Performance</b><span style="color:rgb(252, 96, 6)">Booster</span></span>
                           </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
 </div>

 <script type="text/javascript">
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect();
    });
</script>

@endsection