@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' المنتجات ')
@section('content')

<div class="box clearfix">
  <h3 class="cus_order_list_title">قائمة المنتجات</h3>
  <div class="search_table" >
          <form class="form-header" action="" method="">
              <input class="au-input au-input--xl" type="text" name="search" placeholder="بحث ..." />
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
  <table class="myTable hover table table-striped ">
          <thead>
                  <tr >
                      <th class="table_header">الرقم</th>
                      <th class="table_header">الرقم التسلسلي</th>
                      <th class="table_header">اسم المنتج</th>
                      <th class="table_header">اسم الصنف</th>
                      <th class="table_header"> الوحدة الاساسية</th>
                      <th class="table_header">الوحدة الثانوية </th>
                      <th class="table_header">سعر الوحدة </th>
                      <th class="table_header">سعر التجزئة </th>
                      <th class="table_header">سعر الجملة</th>
                      <th class="table_header">حالة المنتج </th>
                      <th class="table_header" >الوصف</th>
                          
                  </tr>
                  </thead>
          <tbody>
                  <tr>
                          <td>200</td>
                          <td>janedoe</td>
                          <td>Yane</td>
                          <td>Doe</td>
                          <td>200</td>
                          <td>janedoe</td>
                          <td>Yane</td>
                          <td>Doe</td>
                          <td>Yane</td>
                          <td>Doe</td>
                          <td>Yane Doe DoeDoe Doe</td>
 
                      </tr>                   
          </tbody>
      </table>
</div>

@endsection    