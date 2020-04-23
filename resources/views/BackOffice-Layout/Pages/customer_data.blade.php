@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','بيانات العملاء')
@section('content')

    <!-- Main row -->

<!--___________________________________data table_____________________________________________________-->

<div class="box clearfix">
  <h3 class="cus_order_list_title">بيانات العملاء</h3> 
  <div class="search_table" >
     <form class="form-header" action="{{route('search')}}" method="get" role="search">
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
 

  <table class="myTable  hover table table-striped ">
    <thead>
      <tr >
        <!-- <th class="table_header">الرقم</th>-->
         <th class="table_header">الصورة </th>
         <th class="table_header">الاسم </th>
         <th class="table_header">تاريخ الانشاء</th>
         <th class="table_header">نوع العميل </th>
         <th class="table_header">المديونية</th>
         <th class="table_header">اسم المندوب</th>
         <th class="table_header">المنطقة </th>
         <th class="table_header">العنوان </th>
         <th class="table_header">رقم الهاتف</th>
         <th class="table_header">الايميل </th>
         <th class="table_header" >الاجراء</th>                            
      </tr>
     </thead>
      <tbody>
      
   @if(count($customers)>0 ) 
      @foreach($customers as $customer) 
           <tr>
               <!--<td>{{$customer->Customer_ID}}</td>-->
               <td>
                   @if($customer->Customer_photo != null)     
                     <img src={{asset('storage/Users_img/'.$customer->Customer_photo)}} class="img-circle" alt="User Image"  width="30px">
                   @else
                     <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="img-circle" alt="User Image"  width="30px">
                   @endif   
               </td>     
               <td>{{$customer->Cust_first_name}}{{' '}}{{$customer->Cust_last_name}} </td>
               <td>{{$customer->Cus_Created_At}}</td>
               <td>{{$customer->Cust_category}}</td>
               <td>{{$customer->Maximum_credit}}</td>
               <td>{{$customer->SP_first_name}}{{' '}}{{$customer->SP_last_name}} </td>
     
             @if(count($customer_address)>0 ) 
              <td>
                <ul type="none" >
                  @foreach($customer_address as $customer_add  )
                      @if($customer_add->Customerid == $customer->Customer_ID)
                      <li>{{$customer_add->Area}}</li>   
                      @endif               
                  @endforeach
              </ul>        
              </td>
            <td>
              <ul type="none">
                @foreach($customer_address as $cus_add  )
                    @if($cus_add->Customerid == $customer->Customer_ID)
                    <li>{{$cus_add->location_name}}</li>     
                    @endif               
                @endforeach
            </ul>        
          </td>
            @else
                 <td> {{'لايوجد'}}</td>
                 <td> {{'لا يوجد'}}</td>     
             @endif
     
             @if(count($customer_contacts)>0  )
             <td>
              <ul type="none">
                 @foreach($customer_contacts as $customer_contact)
                    @if($customer_contact->Customerid == $customer->Customer_ID)
                      <li>{{$customer_contact->phone_number}}</li>   
                      @endif
                 @endforeach 
                </ul>        
              </td>
                 <td>
                  <ul type="none">
                 @foreach($customer_contacts as $cus_contact)
                 @if($cus_contact->Customerid == $customer->Customer_ID)
                   <li>{{$cus_contact->email_address}}</li>    
                   @endif
                 @endforeach 
                </ul>        
              </td>
              @else
                 <td> {{'لايوجد'}}</td>
                 <td> {{'لا يوجد'}}</td>  
              @endif
             <td >
                 <div class="action_btn">
                   <a href="{{route('customer.edit',$customer->Customer_ID)}}" target="_blank"> <button type="submit" class="btn btn-primary btn-sm botao-controle" name="edit_ID">
                     <i class="fa fa-pencil"></i> تعديل
                   </button></a>
                   <a href="{{route('customer.show',$customer->Customer_ID)}}" target="_blank"><button type="submit" class="btn btn-success btn-sm botao-controle">
                     <i class="fa fa-file-text" ></i> عرض
                   </button></a>  
                   <form action="{{route('customer.index')}}" method="get">
                   @csrf     
                       <a  href="">       
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_ID" value="{{$customer->Customer_ID}}">
                         <i class="fa fa-trash-o"></i> حذف
                       </button> </a> 
                       </form>
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