@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' قائمة الطلبات')
@section('content')

<div class="box clearfix">
  <h3 class="cus_order_list_title">قائمة طلبات العملاء المسجلين</h3>
  <div class="search_table"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
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
  <table class="myTable hover table table-striped   " class="col-lg-12 col-md-6 col-sm-3 col-xs-3">
     <thead>
  @if(count($customer_order)>0 ) 
      @foreach($customer_order as $cus_order) 
        <tr >
          <th class="table_header">الرقم</th>
          <th class="table_header">اسم العميل</th>
          <th class="table_header">تاريخ الطلب</th>
          <th class="table_header">العنوان</th>
          <th class="table_header">رقم الهاتف</th>
          <th class="table_header">اسم المنتج</th>
          <th class="table_header">اسم الصنف</th>
          <th class="table_header"> الكمية</th>
          <th class="table_header">العبوة</th>
          <th class="table_header" >الاجراء</th>
        </tr>
     </thead>
     <tbody>
        <tr>
           <td>{{$cus_order->SalesOrders_id}}</td>    
           <td>{{$cus_order->Cust_first_name}}{{' '}}{{$cus_order->Cust_last_name}} </td>
           <td>{{$cus_order->Order_Date}}</td>

           @if(count( $customer_address)>0 ) 
           <td>
             <ul type="none">
               @foreach( $customer_address as $cus_add  )
                   @if($cus_add->Customerid == $cus_order->Customerid)
                   <li>{{$cus_add->location_name}}</li>     
                   @endif               
               @endforeach
           </ul>        
          </td>
           @else
                <td> {{'لايوجد'}}</td>  
            @endif
    
         @if(count($customer_contacts)>0  )
            <td>
             <ul type="none">
                @foreach($customer_contacts as $customer_contact)
                   @if($customer_contact->Customerid == $cus_order->Customerid)
                     <li>{{$customer_contact->phone_number}}</li>   
                     @endif
                @endforeach 
               </ul>        
             </td>
             @else
                <td> {{'لايوجد'}}</td>
             @endif

        @if(count($orderDetails)>0 ) 
          @foreach($orderDetails as $orderDetail  )
            @if($orderDetail->OrderID == $cus_order->SalesOrders_id)
            <td>
              <ul type="none">
                @foreach($products as $product)
                    @if($product->Product_ID == $orderDetail->ProductID)
                    <li>{{$product->Product_name}}</li>   
                    @endif               
                @endforeach
            </ul>        
            </td>
            <td>
              <ul type="none">
                @foreach($products as $product )
                    @if($product->Category_ID== $orderDetail->CategoryID)
                    <li>{{$product->Category_name}}</li>     
                    @endif               
                @endforeach
            </ul>      
          </td>

          <td>
            <ul type="none">
              @foreach($orderDetails as $orderDetail)
                  @if($orderDetail->OrderID == $cus_order->SalesOrders_id)
                  <li>{{$orderDetail->Quantity}}</li>   
                  @endif               
              @endforeach
            </ul> 
          </td>
          <td>{{$orderDetail->Unit_of_measure}}</td>  
         @else
              <td> {{'لايوجد'}}</td>
              <td> {{'لا يوجد'}}</td>  
              <td> {{'لا يوجد'}}</td>    
          @endif
        @endforeach
      @endif
           <td >
              <div class="action_btn">  <!-- Set this the right route {{route('RegOrder.edit',$cus_order->SalesOrders_id)}} -->
                <a href="{{route('edit_Reg_order')}}" target="_blank"> <button type="submit" class="btn btn-primary btn-sm botao-controle">
                   <i class="fa fa-pencil"></i> تعديل
                 </button></a>
                 <a href="{{route('show_Reg_order')}}" target="_blank"><button type="submit" class="btn btn-success btn-sm botao-controle">
                   <i class="fa fa-file-text" ></i> عرض
                 </button></a> 
               <a href="#"><button type="submit" class="btn btn-danger btn-sm" >
                   <i class="fa fa-trash-o"></i> حذف
                 </button></a> 
                </div>
           </td>
         </tr>
    @endforeach
  @else 
    <h4 class="text-center">  {{' لا توجد بيانات ليتم عرضها '}}</h4>
  @endif 
        </tbody>
      </table>
</div>

@endsection    