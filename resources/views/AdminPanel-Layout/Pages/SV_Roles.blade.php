@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title','صلاحيات المشرفين')
@include('AdminPanel-Layout.Messages.alerts')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة صلاحية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-right:320px;float:right">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form class="needs-validation" action="{{route('SV_Role.store')}}" method="post" role="form" novalidate>
					
					{{csrf_field()}}
					
                    <div class="form-row">
                        <div class="col-md-12 mb-6">
                            <label for="validationCustom01">اسم الصلاحية</label>
                            <input type="text" class="form-control" name="role_name" id="validationCustom01" value="{{ old('role_name') }}" required>
                            <div class="invalid-feedback">
                               ادخل اسم الصلاحية
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">
                            <label for="validationCustom01"> الوصف</label>
                            <input type="text" class="form-control" name="role_desc" id="validationCustom01" value="{{ old('role_desc') }}" required><br>
                            <div class="invalid-feedback">
                             اضف وصفا للصلاحية الممنوحة
                            </div>
                        </div>           
                    </div>
                <div class="modal-footer">
                 <button class="btn btn-primary" type="submit" style="float:left; margin-left:20px;" >اضافة</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
                   
                </form>
            </div>

        </div>
    </div>
</div>
<!--End Modal -->
@section('content')


<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" >اضافة صلاحية</div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#exampleModal" style="width:220px;background-color:#f26722;border:none">
                        <strong>+</strong> اضافة صلاحية
                    </button> 
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
<!--___________________________________data table_____________________________________________________-->

    <div class="box clearfix">
    <div class="search-wrapper">
    <div class="input-holder">
    <form class="form-header" action =" {{route('searchRoles')}}" method="get" role="search">
       @csrf
        <input type="text" name="search" class="search-input" placeholder="مربع البحث">
        <button class="search-icon"><span></span></button>
        </form>
    </div>
    <button class="close"></button>
    </div>
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
        <td>{{$role->created_date}}</td>  
        <td>  
            <div class="action_btn">  
                <a href="{{route('SV_Role.edit',$role->Role_ID)}}" target="_blank">  <button type="submit" class="btn btn-primary btn-sm botao-controle">
                        تعديل
                    </button>
                </a>
            
                <a href="{{route('SV_Role.destroy',$role->Role_ID)}}"><button type="submit" class="btn btn-danger btn-sm" >
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

