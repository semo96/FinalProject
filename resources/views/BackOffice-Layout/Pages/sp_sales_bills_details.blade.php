@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تفاصيل فاتورة المبيعات')
@section('content')
 
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="feedback_card">
              <div class="SP-card-header">
                <h5 class="FB_title">فاتورة مبيعات</h5>
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
                             <a href="#print_page" target="_blank"  onclick="window.print();" id="print_page" >
                                <small class="badge task-view small"><i class="fa fa-print"></i> طباعة  </small> 
                             </a> 
                                        
                            </div>
                        </div> 
                   </div>
                  <div class="row second-section2 ">
                      <div class="col-md-12 ">
                        <div class="form-group pay_check_p">
                            <label class="pay_check"> نوع الدفع</label>
                           <label class="pay_check"><input type="checkbox" checked="true" disabled>نقد</label>
                           <label class="pay_check"><input type="checkbox" unchecked="true" disabled> آجل</label>
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
                            <label>رقم الفاتورة</label>
                             <input type="text" class="form-control2"  value="رقم الفاتورة" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>اسم العميل</label>
                                 <input type="text" class="form-control2"  value="اسم العميل" readonly>
                            </div>
                     </div>
                     <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>التاريخ</label>
                                 <input type="text" class="form-control2"  value="التاريخ" readonly>
                            </div>
                     </div>
                     <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>العنوان</label>
                                 <input type="text" class="form-control2"  value="العنوان" readonly>
                            </div>
                     </div>
                     <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                 <input type="text" class="form-control2"  value="رقم الهاتف" readonly>
                            </div>
                     </div>
                  </div>
                  <div class="row second-section">
                    <div class="col-md-12">
                            <table class="myTable  hover details-table table-striped ">
                                    <thead>
                                            <tr >
                                                <th class="table_header">الرقم</th>
                                                <th class="table_header">الصنف</th>
                                                <th class="table_header">العبوة </th>
                                                <th class="table_header">الكمية</th>
                                                <th class="table_header"> سعر الوحدة</th>
                                                <th class="table_header">الضريبة </th>
                                                <th class="table_header">الخصم</th>
                                                <th class="table_header">الاجمالي</th>
                                                    
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
                                                </tr>
                                              <tr>
                                                 <th colspan="3" style="color:white;">الاجمالي</th>
                                                 <td colspan="5">600000</td>
                                              </tr>
                                               
                              </tbody>
                         </table>
                    </div>
                   </div>
                </form>
              </div>
            </div>
         </div>
        </div>
    </div> 

@endsection    