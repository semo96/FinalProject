@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' تقرير طلبات العملاء')
@section('content')

<div class="box-feedback clearfix">
 <div class="feedback_title">
      <button href="#" class="  report_title">تقرير عن طلبات العملاء </button>
 </div>
 <form class="report_critiria">
    <div class="row">
        <div class="col-md-4 pr-1">
          <div class="form-group nk-datapk-ctm form-elet-mg" >
            <label>بحث</label>
            <div class="input-group date nk-int-st">
                <span class="input-group-addon" ><button type="submit" class="btn-search-report"><i class="fa  fa-search" style="color:#fc6006"></i></button>
                </span>
                <input type="text" class="form-control" name="report_stat_date" placeholder="بحث..." >
            </div>      
      </div>
          </div>
          <div class="col-md-4 px-1">
              <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                  <label>من تاريخ</label>
                  <div class="input-group date nk-int-st">
                      <span class="input-group-addon"><i class="fa  fa-calendar" style="color:#fc6006"></i>
                      </span>
                      <input type="text" class="form-control" name="report_stat_date" placeholder="من تاريخ" id="report_start_date">
                  </div>      
            </div>
            </div>
            <div class="col-md-4 pl-1">
                 <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                     <label>الى تاريخ</label>
                      <div class="input-group date nk-int-st">
                          <span class="input-group-addon"><i class="fa  fa-calendar" style="color:#fc6006"></i>
                          </span>
                          <input type="text" class="form-control" name="report_end_date" placeholder="من تاريخ" id="report_end_date">
                      </div>      
                </div>
            </div>
          </div>
 </form>
 <div class="input-group">
       <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
 </div>
 <table class=" myTable saleserson_table  hover  table-striped "  >
  <tbody>
     <tr>
        <th>الرقم </th>
        <th>اسم العميل </th>
        <th>اسم المنطقة</th>
        <th> العنوان</th>
        <th> عدد  الطلبات</th>
        <th>حالة الطلب </th>
        <th >تاريخ الطلب</th>
        
     </tr>
     <tr> 
        <td class="review-ctn-hf">
           1
        </td> 
        <td>
            خالد علي صالح
        </td>
       <td class="review-ctn-hf">
          16
      </td> 
      <td class="review-ctn-hf">
           1
      </td> 
      <td class="review-ctn-hf">
            8
      </td> 
      <td>
     نفذ
     </td>  
      <td class="review-ctn-hf">
            12/6/2019
      </td> 
    </tr>    
  </tbody>
 </table>
</div>

@endsection    