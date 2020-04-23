@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','فواتير المبيعات')
@section('content')

<div class="box-feedback clearfix">
  <div class="feedback_title">
          <button href="#" class="  btn_title">فواتير المبيعات </button>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="breadcome-heading">
              <form role="search" class="sr-input-func">
                  <input type="text" placeholder="بحث ..." class="search-int form-control">
                 <button><i class="fa fa-search search_icon"></i></button>
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
        <tr>
            <th class="review-item-rating "> <i class="fa  fa-file-text-o"></i>  </th>  
            <th>فاتورة </th> 
            <th>الرقم</th>  
            <th>التاريخ</th> 
            <th>الحالة</th> 
            <th style="padding-right:70px">الاجراء</th>   
         </tr>
        <tr> 
            <td class="review-item-rating ">  
              <i class="fa  fa-file-text-o"></i>          
            </td>
            <td class="review-ctn-hf">
               <h3>فاتورة</h3>     
            </td>
            <td class="review-ctn-hf">
                <h5>1</h5>
            </td> 
             <td>
                <h5>12/3/2017</h5>
             </td>
             <td >  
                 <a href="#"><small class="badge small-approve small">    تم فتحها </small> </a>     
             </td>
             <td class="  btn-view "> 
                <div class="action_btn">
                    <a href="{{route('sp_sales_bills_details')}}" target="_blank"><button type="submit" class="btn btn-primary btn-sm botao-controle  ">
                        <i class="fa fa-file-text" ></i> عرض
                    </button></a> 
                    <a href="#"><button type="submit" class="btn btn-danger btn-sm" >
                        <i class="fa fa-trash-o"></i> حذف
                    </button></a> 
                 </div>  
            </td>
           </tr>
    </tbody>
 </table>
</div>

@endsection   