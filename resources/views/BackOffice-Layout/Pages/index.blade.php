
@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' الصفحة الرئيسية ')
@section('content')

            
       <div class="row">
             <div class="col-md-3 col3-p">
               <a href="#" class="btn btn-primary btn-block margin-bottom btn_title2">قائمة المناديب </a>
               <div class="box box-side">
                 <div class="box-header with-border">
                     <div class="breadcome-heading2">
                         <form role="search" class="sr-input-func2">
                             <input type="text" placeholder="      بحث ..." class="search-int2 form-control">
                            <button><i class="fa fa-search search_icon2"></i></button>
                         </form>
                   </div>
                 </div>
                 <div class="box-body no-padding">
                   <ul class="nav nav-pills nav-stacked">
                     <li >
                       <div>
                         <div class="input-group">
                           <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
                         </div>
                       </div>
                       <table class=" myTable saleserson_list_table hover   ">
                         <tbody>
                           <tr>
                             <td>
                               <a href="#" >
                                 <div class="sp-img">
                                   <img src={{asset('BackOffice-Assets/dist/img/user.png')}} alt="">
                                 </div>
                                 <div class="sp-name">
                                   <h3> خالد علي صالح الحميدي</h3>         
                                 </div>
                               </a>
                             </td>
                             <td>
                               <div class="online-status_icon">
                                <i class="fa fa-circle"></i>
                               </div>
                             </td>
                           </tr>
                       </tbody>
                     </table>
                     </li>
                   </ul>
                 </div>
                 <!-- /.box-body -->
               </div>
               <!-- /.box -->
             </div>
             <!-- /.col -->
             <div class="col-md-9 col9-p">
               <div class="box2 box-primary2" >
                 <div class="box-header with-border" style="text-align:center; color:rgb(255, 255, 255);
                              background-color:#03a9f4; ">
                   <h3 class="box-title">خريطة صنعاء</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                    <div class="google-map-single">
                        <div id="map">
                          <img src="{{asset('BackOffice-Assets/dist/img/map.jpg')}}" width="80%" height="90%">
                        </div>
                      </div>
                 </div>
                 <div class="col-md-9 col9-p ">
                   <div class="social-auth-links text-center">
                     <button class="btn btn-block btn-sign btn-flat" type="submit"> ايقاف مندوب</button>
                   </div>
                 </div>
                 <!-- /.box-body -->
               </div>
               <!-- /. box -->
             </div>
             <!-- /.col -->
           </div>
           <!-- /.row -->
          <div class="row">
      
          </div>
          <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                 <div class=" box-moniter">
                   <div  class="moniter-section">
                     <!--______________progress bar___________________________-->
                       <h2 class="storage-right">مبيعات المندوب</h2>
                       <div id="bar1" class="barfiller">
                           <div class="tipWrap">
                               <span class="tip" ></span>
                           </div>
                             <span class="fill" data-percentage="70"></span>
                       </div>
                      <!--______________progress bar___________________________--> 
                      <div class="task_days ">
                     <!-- <p  class="progress_days">1</p><p  class="progress_days"> 7</p><p  class="progress_days">14  </p> <p  class="progress_days">  24 </p> <p  class="progress_days"> 30</p>-->
                     <small class="badge2 small-task-day1 small">1</small> 
                     <small class="badge2 small-task-day2 small">7</small> 
                     <small class="badge2 small-task-day3 small">14</small> 
                     <small class="badge2 small-task-day4 small">24</small> 
                     <small class="badge2 small-task-day5 small">30</small> 
                      </div>
                       <div class="input-group">
                           <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
                         </div>
                       <table class=" myTable saleserson_list_table  hover   " style="text-align: center;">
                         <tbody>
                           <tr>
                             <th>اسم المندوب</th>
                             <th>الفواتير المستلمة</th>
                             <th>الحالة</th>
                             <th>المبيعات</th>
                           </tr>
                           <tr>
                             <td>خالد علي صالح الحميدي</td>
                             <td>
                                10  <a href="sp_sales_bills.html" target="_blank"><small class="badge badge-info small show-icon">   عرض  <i class="fa fa-file-text-o" ></i></small> </a>
                             </td>
                             <td>
                               <div class="online-status_icon">
                                <i class="fa fa-circle"></i>
                               </div>
                             </td>
                             <td>70%</td>
                           </tr>                
                       </tbody>
                     </table>
     
                     </div>
                 </div>
             </div>
          </div>
  

    @endsection    