@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title','اضافة صلاحية ')
@include('AdminPanel-Layout.Messages.alerts')
@section('content')
@include('AdminPanel-Layout.Messages.alerts')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" >اضافة صلاحية </div>
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{route('SV-Role.store')}}" method="POST"   enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">اسم الصلاحية</label>
                            <input type="text" class="form-control" id="validationCustom01" required name="role_name">
                            <div class="invalid-feedback">
                                ادخل اسم الصلاحية
                            </div>
                        </div>
                    <div class="col-md-6 mb-6">
                            <label for="validationCustom01">الوصف</label>
                            <textarea class="form-control" id="validationCustom01"  required name="role_description"></textarea><br><br>
                            <div class="invalid-feedback">
                                 اضف وصف للصلاحية 
                            </div>
                    </div>
                    <div class="col-md-12 mb-12">
                            <button class="btn btn-primary" type="submit">حفظ</button>
                    </div>
            </form>

<div>
    <div class="input-group">
    <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
    </div>
</div>
    <table class="myTable table hover table table-striped ">
    <thead>
    <tr >
    <th class="table_header">الرقم</th>
    <th class="table_header">اسم الصلاحية</th>
    <th class="table_header">الوصف </th>
    <th class="table_header">الحالة</th>
    <th class="table_header">تاريخ الانشاء</th>
    <th class="table_header" >الاجراء</th>
            
    </tr>
    </thead>
    <tbody>
        @if(count($roles)>0)
    <tr>
    @foreach ($roles as $role)
        
        <td>{{$role->Role_ID}}</td>
        <td>{{$role->Role_name}}</td>
        <td>{{$role->Role_description}}</td>
        <td>{{$role->Role_status}}</td>
        <td>{{$role->created_date}}</td>  
        <td>  
            <div class="action_btn">  
                <a href="{{route('SV-Role.edit',$role->Role_ID)}}" target="_blank">  <button type="submit" class="btn btn-primary btn-sm botao-controle">
                        تعديل
                    </button>
                </a>
                <a href="{{route('SV-Role.destroy',$role->Role_ID)}}"><button type="submit" class="btn btn-danger btn-sm" >
                        حذف
                    </button>
                </a> 
            </div>
        </td>
        
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>




















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