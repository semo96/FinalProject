@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title',' قائمة المشرفين')
@section('content')


<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" >قائمة المشرفين</div>
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
<!--___________________________________data table_____________________________________________________-->

<div class="box clearfix">
    <div class="search-wrapper">
    <div class="input-holder">
    <form class="form-header" action =" {{route('searchSup')}}" method="get" role="search">
       @csrf
        <input type="search" class="search-input" name ="search" placeholder="مربع البحث">
        <button class="search-icon"><span></span>
        
        </button>
        </form>
    </div>
    <button class="close"></button>
    </div>
    <div>
    <div class="input-group">
    
    <table class="myTable table hover table table-striped ">
    <thead>
    <tr >
    <th class="table_header">الرقم</th>
    <th class="table_header">الاسم الاول</th>
    <th class="table_header">الاسم الثاني </th>
    <th class="table_header">العنوان</th>
    <th class="table_header">اسم المستخدم</th>
    <th class="table_header" >الصلاحية</th>
    <th class="table_header" >رقم الهاتف</th>
    <th class="table_header" >الايميل</th>
    <th class="table_header" >الاجراء</th>
            
    </tr>
    </thead>
    <tbody>
        @if(count($supervisors)>0)
    <tr>
    @foreach ($supervisors as $supervisor)
        
        <td>{{$supervisor->id}}</td>
        <td>{{$supervisor->sup_first_name}}</td>
        <td>{{$supervisor->sup_last_name}}</td>
        <td>{{$supervisor->address}}</td>
        <td>{{$supervisor->username}}</td>
        <td>
        <ul type="none" class="dataList">
            @foreach($supervisorRoles as $supervisorRole)
                @if($supervisorRole->SupervisorID==$supervisor->id)
                <li>{{ $supervisorRole->Role_name }}</li>
                {{-- {{!empty($supervisorRole) ? $supervisorRole->Role_name:'لايوجد'}} --}}
            {{--{{$supervisorRole->Role_name}}--}} 
            @endif
            @endforeach 
        </ul> 
        </td>
        
        

                {{----}}
    {{--@foreach($supervisorTypes as $supervisorType)--}}
    {{--@if($supervisors->usertype_ID == $supervisorType->user_type_ID)--}}
        {{--<td>{{$supervisorType->user_type_name}}</td>--}}
    {{--@endif--}}
    {{--@endforeach--}}
        <td>
            @foreach($supervisorsContacts as $supervisorsContact)
                @if($supervisor->id == $supervisorsContact->supervisorID)

                    {{$supervisorsContact->phone_number}}
                @endif
            @endforeach 
        </td>
            @foreach($supervisorsContacts as $supervisorsContact)
                @if($supervisor->id == $supervisorsContact->supervisorID)

                    <td>{{$supervisorsContact->email_address}}</td>
                @endif
            @endforeach

    
        <td>
         
            <div class="action_btn">

        
        <a href="{{route('supervisors.edit',$supervisor->id)}}" target="_blank">  <button type="submit" class="btn btn-primary btn-sm botao-controle">
                تعديل
            </button></a>
            <a href="{{route('supervisors.destroy',$supervisor->id)}}"><button type="submit" class="btn btn-danger btn-sm" >
                حذف
            </button></a> 
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

