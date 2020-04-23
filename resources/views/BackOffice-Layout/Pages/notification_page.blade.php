@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' الاشعارات')
@section('content')

<div class="box-feedback clearfix">
  <div class="feedback_title">
          <button href="#" class="  btn_title">الاشعارات </button>
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
 <table class=" myTable notification_table  hover  table-striped  ">
    <tbody>
        <tr>
            <th> الرقم</th>
            <th> النوع</th>
            <th> المرسل</th>
            <th> التاريخ</th>
            <th> الحالة</th>
            <th> عرض</th>
        </tr>
          <tr> 
              <td class="review-ctn-hf">
                  <h5>1</h5>
              </td> 
              <td class="review-ctn-hf">
                 <h3> فاتورة ERP</h3>     
              </td>
              <td>
                  احمد صالح 
              </td>
              <td>
                  <h5>12/3/2017</h5>
              </td>
               <td >  
                  <a href="#"><small class="badge small-approve small">    تم فتحها </small> </a>     
              </td>
               <td class="  btn-view ">  
                  <a href="sp_erp_bills_details.html" target="_blank"><button class="btn-view-p2">   عرض</button> </a>         
               </td>
           </tr>       
    </tbody>
 </table>
</div>

@endsection    