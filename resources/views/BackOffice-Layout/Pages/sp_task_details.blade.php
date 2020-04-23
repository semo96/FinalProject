@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تفاصيل مهمة المندوب')
@section('content')
 
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="feedback_card">
              <div class="SP-card-header">
                <h5 class="FB_title">مهمة المندوب</h5>
              </div>
              <div class="card-body">
                <form>
                    <div class="row first-section">
                      <div class="col-md-4 pr-1">
                            <div class="form-group">
                              <label>شركة شهاب للمواد الغذائية</label>
                              <img src="{{asset('BackOffice-Assets/dist/img/favicon.ico')}}">
                             </div>
                      </div>
                      <div class="col-md-4 pl-1">
                          <div class="form-group">
                          <label for="exampleInputEmail1">شركة وكالات شهاب للتأمين والتجارة (اليمن)المحدودة</label>
                        
                        </div>
                       </div> 
                       <div class="col-md-2 px-1">
                          <div class="form-group">
                            <label>محافظة صنعاء<br></label>  
                          </div>
                       </div> 
                        <div class="col-md-2 px-1 no-print">
                           <div class="form-group">
                             <a href="#print_page" target="_blank" onclick="window.print();" id="print_page">
                                <small class="badge task-view small"><i class="fa fa-print"></i> طباعة  </small> 
                             </a> 
                                        
                            </div>
                        </div> 
                   </div>
                  <div class="row second-section2 ">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>رقم المهمة</label>
                             <input type="text" class="form-control2"  value="رقم المهمة" readonly>
                        </div>
                    </div> 
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label> رقم فاتورة ERP</label>
                             <input type="number" class="form-control2"  placeholder="ERP رقم فاتورة" readonly >
                        </div>
                      </div>  
                      <div class="col-md-6 pr-1">
                          <div class="form-group">
                              <label>من تاريخ</label>
                               <input type="text" class="form-control2"  value="من تاريخ" readonly>
                          </div>
                       </div> 
                       <div class="col-md-6 pr-1">
                          <div class="form-group">
                              <label> الى تاريخ</label>
                               <input type="text" class="form-control2"  value=" الى تاريخ" readonly>
                          </div>
                   </div>              
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>اسم المندوب</label>
                        <input type="text" class="form-control2"  value=" اسم المندوب" readonly>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>اسم المنطقة</label>
                             <input type="text" class="form-control2"  value="اسم المنطقة" readonly>
                        </div>
                 </div>
                     <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>عدد الطلبات</label>
                                 <input type="text" class="form-control2"  value="عدد الطلبات" readonly>
                            </div>
                     </div>
                  </div>
                 <div class="row second-section">
                     <div class="col-md-12 form-group">
                        <a href="#" ><label >عرض المهمة على الخريطة</label></a>
                        <div class="form-group  view_task_on_map" >
                              
                        </div>
                       </div>
                   </div>
                </form>
              </div>
            </div>
         </div>
        </div>
    </div> 

@endsection    