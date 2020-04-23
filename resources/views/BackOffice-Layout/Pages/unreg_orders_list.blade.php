@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' قائمة الطلبات')
@section('content')

<div class="box clearfix">
  <h3 class="cus_order_list_title text-center">قائمة طلبات العملاء الغير مسجلين</h3>
  <div class="search_table" >
    <form class="form-header" action="#" method="get" role="search">
      @csrf
       <input class="au-input au-input--xl" type="search" name="search" placeholder="بحث ..." />
       <button class="au-btn--submit" type="submit">
       <i class="fa fa-search"></i>
       </button>
     </form>
 </div>
  <div>
     <div class="input-group">
       <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
    </div>
  </div>
  <table class="myTable hover table table-striped   " class="col-lg-12 col-md-6 col-sm-3 col-xs-3">
     <thead>
        <tr >
          <th class="table_header">الرقم</th>
          <th class="table_header">اسم العميل</th>
          <th class="table_header">اسم المنتج</th>
          <th class="table_header">اسم الصنف</th>
          <th class="table_header"> الكمية</th>
          <th class="table_header"> العبوة</th>
          <th class="table_header">تاريخ الطلب</th>
          <th class="table_header">العنوان</th>
          <th class="table_header">رقم الهاتف</th>
          <th class="table_header" >الحدث</th>
        </tr>
     </thead>
     <tbody>
      <td >
        <div class="action_btn">
          <a href="{{route('edit_Unreg_order')}}" target="_blank"> <button type="submit" class="btn btn-primary btn-sm botao-controle">
             <i class="fa fa-pencil"></i> تعديل
           </button></a>
           <a href="{{route('show_Unreg_order')}}" target="_blank"><button type="submit" class="btn btn-success btn-sm botao-controle">
             <i class="fa fa-file-text" ></i> عرض
           </button></a> 
         <a href="#"><button type="submit" class="btn btn-danger btn-sm" >
             <i class="fa fa-trash-o"></i> حذف
           </button></a> 
          </div>
     </td>
     </tbody>
  </table>
</div>

@endsection    