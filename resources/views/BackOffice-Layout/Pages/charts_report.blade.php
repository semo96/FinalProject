@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' تقرير المخططات')
@section('content')


    <!-- income order visit user Start -->
    <div class="income-order-visit-user-area">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="income-dashone-total shadow-reset nt-mg-b-30">
                       <div class="income-title">
                           <div class="main-income-head">
                               <h2>عدد المناديب</h2>
                               <div class="main-income-phara">
                                   <p>اليوم</p>
                               </div>
                           </div>
                       </div>
                       <div class="income-dashone-pro">
                           <div class="income-rate-total">
                               <div class="price-adminpro-rate">
                                   <h3>60888200</h3>
                               </div>
                           </div>
                           <div class="clear"></div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="income-dashone-total shadow-reset nt-mg-b-30">
                       <div class="income-title">
                           <div class="main-income-head">
                               <h2>عدد العملاء</h2>
                               <div class="main-income-phara order-cl">
                                   <p>اليوم</p>
                               </div>
                           </div>
                       </div>
                       <div class="income-dashone-pro">
                           <div class="income-rate-total">
                               <div class="price-adminpro-rate">
                                   <h3>72320</h3>
                               </div>
                           </div>
                           <div class="clear"></div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="income-dashone-total shadow-reset nt-mg-b-30">
                       <div class="income-title">
                           <div class="main-income-head">
                               <h2>الطلبات</h2>
                               <div class="main-income-phara visitor-cl">
                                   <p>اليوم</p>
                               </div>
                           </div>
                       </div>
                       <div class="income-dashone-pro">
                           <div class="income-rate-total">
                               <div class="price-adminpro-rate">
                                   <h3>888200</h3>
                               </div>
                           </div>

                           <div class="clear"></div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="income-dashone-total shadow-reset nt-mg-b-30">
                       <div class="income-title">
                           <div class="main-income-head">
                               <h2>العروض</h2>
                               <div class="main-income-phara low-value-cl">
                                   <p>اليوم</p>
                               </div>
                           </div>
                       </div>
                       <div class="income-dashone-pro">
                           <div class="income-rate-total">
                               <div class="price-adminpro-rate">
                                   <h3><span class="counter">88200</span></h3>
                               </div>
                           </div>
                           <div class="clear"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
<div class="row">
<div class="col-md-6">
 <!-- AREA CHART -->
 <div class="report_box box-danger">
   <div class="box-header with-border">
     <h3 class="box-title">توزيع طلبات العملاء على المناطق</h3>
   </div>
   <div class="box-body">
     <div class="false-For-Bottom-Text chart_p">
       <div class="mypiechart">	
         <canvas id="myCanvas" width="300" height="300"></canvas>
       </div>      
     </div>
   </div>
 </div>
</div>
<div class="col-md-6">
   <!-- AREA CHART -->
   <div class="report_box box-danger">
     <div class="box-header with-border">
       <h3 class="box-title">اسماء المناطق</h3>
     </div>
     <div class="box-body">
       <div class="false-For-Bottom-Text ">
           <table class=" myTable report-chart-table  hover   "  >
               <tbody>
                  <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#ffc107;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#e91e63;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
                 <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#4caf50;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#cafa08;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
                 <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#ffa9c9;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#769409;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
                 <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#00bcd4;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#b5f7b8;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
                 <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#a6d400;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#553943;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
                 <tr> 
                     <td>
                        <i class="fa fa-circle report-area" style="color:#00bcd4;"></i>
                     </td> 
                     <td>
                         janedoe
                     </td>
                    <td >
                       <i class="fa fa-circle report-area" style="color:#9e9e9e;" ></i>
                   </td> 
                   <td >
                       janedoe
                   </td> 
                 </tr>
               </tbody>
              </table>     
       </div>
     </div>
   </div>
 </div>
</div>
<!-- /.row -->


@endsection