@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','FeedBack')
@section('content')

<!--___________________________________data table_____________________________________________________-->

<div class="box-feedback clearfix">
  <div class="feedback_title">
          <button href="#" class="  btn_title"> FeedBack </button>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="breadcome-heading">
             <form class="form-header sr-input-func" action="{{route('search')}}" method="get" role="search" style="width:200px auto">
                @csrf
                 <input type="text" placeholder="بحث ..." class="search-int form-control " name="search">
                 <button style="float:left;"><i class="fa fa-search search_icon" ></i></button>
              </form>
          </div>
      </div>
  <div>
       <div class="input-group">
          <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
       </div>
 </div>
 <table class=" myTable saleserson_table  hover  table-striped ">
    <tbody>
      <tr >
         <th class="text-center">الصورة</th>
         <th class="text-center">اسم العميل</th>
         <th class="text-center">التاريخ</th>
         <th class="text-center">الرسالة</th>
         <th class="text-center">الاجراء</th>
      </tr>
      @if (count($customer_FeedBacks)>0)
         @foreach ($customer_FeedBacks as $customer_FeedBack)
         <tr>  
            <td class="text-center">
                @if($customer_FeedBack->Customer_photo != null)     
                  <img src={{asset('storage/Users_img/'.$customer_FeedBack->Customer_photo)}} class="img-circle" alt="User Image"  width="30px">
                @else
                  <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="img-circle" alt="User Image"  width="30px">
                @endif   
            </td>
            <td class="text-center">
                {{$customer_FeedBack->Cust_first_name}}{{' '}}{{$customer_FeedBack->Cust_last_name}}
            </td>
            <td class="text-center">
                <h5>{{$customer_FeedBack->Feedback_Date}}</h5>
            </td>
            <td class="review-item-rating text-center">  
                <i class="fa fa-envelope"></i>          
            </td>
            <td class="  btn-view text-center">  
               <div class="action_btn">
                  <a href="{{route('feedback.show',$customer_FeedBack->Feedback_ID)}}" target="_blank"><button type="submit" class="btn btn-primary btn-sm botao-controle  ">
                      <i class="fa fa-file-text" ></i> عرض
                  </button></a> 
                <form action="{{route('feedback.index')}}" method="get">
                   @csrf     
                       <a  href="">       
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_ID" value="{{$customer_FeedBack->Feedback_ID}}">
                         <i class="fa fa-trash-o"></i> حذف
                       </button> </a> 
                       </form>
               </div> 
            </td>
            </tr>
         @endforeach 
      @endif
    </tbody>
 </table>
</div>

@endsection    