@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title','تعديل بيانات مشرف')
@include('AdminPanel-Layout.Messages.alerts')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" >تعديل بيانات مشرف</div>
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
            <div class="card-body">

			@if(count($edit_supervisors)>0)
				@foreach($edit_supervisors as $edit_supervisor)

                <form class="needs-validation" novalidate action="{{route('supervisors.update',$edit_supervisor->id)}}" method="post"
                class=" needsclick add-professors" 
                id="demo1-upload"  enctype="multipart/form-data">
                <input type="hidden" value="PUT" name="_method"/>
            @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">الاسم الاول</label>
                            <input type="text" class="form-control" id="validationCustom01" name="sup_first_name" value="{{$edit_supervisor->sup_first_name}}" required >
                            <div class="invalid-feedback">
                                ادخل الاسم الاول
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">الاسم الثاني</label>
                            <input type="text" class="form-control" id="validationCustom01" name="sup_second_name" value="{{$edit_supervisor->sup_last_name}}" required>
                            <div class="invalid-feedback">
                                ادخل الاسم الثاني
                            </div>
                        </div>
                        @if(count($edit_supervisorsContacts )>0)
                        @foreach($edit_supervisorsContacts as $edit_supervisorsContact)
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">الايميل</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                              
                                
                                <input type="email" class="form-control" id="validationCustomUsername" name="sup_email_address" value="{{$edit_supervisorsContact->email_address}}"  aria-describedby="inputGroupPrepend" required>
                                
                                <div class="invalid-feedback">
                                    ادخل الايميل
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="col-md-6 mb-3">
                                <label for="validationCustom03">العنوان</label>
                                <input type="text" class="form-control" name="sup_address" value="{{$edit_supervisor->address}}" id="validationCustom03"  required>
                                <div class="invalid-feedback">
                                    ادخل العنوان
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">اسم المستخدم</label>
                            <input type="text" class="form-control" name="sup_user_name" value="{{$edit_supervisor->username}}" id="validationCustom04"  required>
                            <div class="invalid-feedback">
                                ادخل اسم المستخدم
                            </div>
                        </div>
                        @if(count($edit_supervisorsContacts)>0)
                        @foreach($edit_supervisorsContacts as $edit_supervisorsContact)
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">رقم الهاتف</label>
                            <input type="number" class="form-control" name="sup_phone_number" value="{{$edit_supervisorsContact->phone_number}}"  id="validationCustom04"  required>
                            <div class="invalid-feedback">
                                ادخل رقم الهاتف
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05">ادخل كلمة المرور السابقة</label>
                            <input type="password" class="form-control" name="old_password" value=" " id="validationCustom05"  required>
                            <div class="invalid-feedback">
                                ادخل كلمة المرور
                            </div>
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05"> كلمة المرور الجديدة </label>
                            <input type="password" class="form-control" name="NewPassord" value="" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                 كلمة المرور الجديدة
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
 @endforeach
@endif 

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
@endsection