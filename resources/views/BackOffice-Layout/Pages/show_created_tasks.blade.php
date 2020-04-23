@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' عرض المهام المنشأه ')
@section('content')
 @include('BackOffice-Layout.Messages.alerts')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="feedback_card">
        <div class="SP-card-header">
          <h5 class="FB_title">مهمة المندوب</h5>
    @if(count($showTasks)>0 ) 
      @foreach($showTasks as $showTask) 
          <div >
              <div class="form-group">
               
                   <button class="badge task-view small " id="modal-btn"> <i class="fa fa-edit" ></i> تعديل المهمة </button> 
                   
               </div>
           </div>
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
            </div>
            <div class="row second-section2 ">
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label>رقم المهمة</label>
                       <input type="text" class="form-control2"  value="{{$showTask->Task_ID}}" readonly>
                  </div>
              </div> 
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label> رقم فاتورة ERP</label>
                       @if(count($ERP_bills)>0 )
                      @foreach($ERP_bills as $ERP_bill)
                        @if($ERP_bill->SalespersonID==$showTask->SalespersonID)
                         <input type="number" class="form-control2"  value="{{$ERP_bill->Bill_ID}}" readonly >
                        @endif
                      @endforeach
                    @endif
                       
                  </div>
                </div>  
                <div class="col-md-6 pr-1">
                    <div class="form-group">
                        <label>من تاريخ</label>
                         <input type="text" class="form-control2"  value="{{$showTask->Task_Start_date}}" readonly>
                    </div>
                 </div> 
                 <div class="col-md-6 pr-1">
                    <div class="form-group">
                        <label> الى تاريخ</label>
                         <input type="text" class="form-control2"  value="{{$showTask->Task_End_date}}" readonly>
                    </div>
             </div>              
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>اسم المندوب</label>
                  <input type="text" class="form-control2"  value="{{$showTask->SP_first_name}} {{$showTask->SP_last_name}}" readonly>
                </div>
              </div>
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label>اسم المنطقة</label>
                       <input type="text" class="form-control2"  value="{{$showTask->AreaName_Ar}}" readonly>
                  </div>
           </div>
               <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>هدف المبيعات</label>
                       <input type="number" class="form-control2"  placeholder="هدف المبيعات" name="salesTarget" value="{{$showTask->Task_sales_target}}" readonly>
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
        @endforeach
    @else
      <input type="text" class="form-control2"  value="{{'لايوجد'}}" readonly>
@endif
        </div>
      </div>
   </div>
  </div>
</div>
<!--___________________________________show task modal_____________________________________________________-->



<div id="my-modal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
 <div class="single-pro-review-area mt-t-30 mg-b-15">
 <div class="container-fluid">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
    <div id="myTabContent" class="tab-content custom-order-edit">
      <div class="product-tab-list tab-pane fade active in" id="description">

    @if(count($showTasks)>0 ) 
      @foreach($showTasks as $showTask) 
       <form action="{{route('task.update',$showTask->Task_ID)}}" method="POST"  class=" needsclick add-professors" 
                id="demo1-upload"  enctype="multipart/form-data">
                  <input type="hidden" value="PUT" name="_method"/>
            @csrf
            <div class="row second-section2 " style="text-align:right;">
               <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label>رقم المهمة</label>
                       <input type="text" class="form-control2"  value="{{$showTask->Task_ID}}" readonly>
                  </div>
              </div> 
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label> رقم فاتورة ERP</label>
                    @if(count($ERP_bills)>0 )
                      @foreach($ERP_bills as $ERP_bill)
                        @if($ERP_bill->SalespersonID==$showTask->SalespersonID)
                         <input type="number" class="form-control2"  value="{{$ERP_bill->Bill_ID}}" readonly >
                        @endif
                      @endforeach
                    @endif
                  </div>
                </div>  
                <div class="col-md-6 pr-1">
                    <div class="form-group">
                        <label>من تاريخ</label>
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                                <input type="text" class="form-control2" name="task_start_date" placeholder="من تاريخ" required value="{{$showTask->Task_Start_date}}">
                            </div>
                        </div>
                    </div>
                 </div> 
                 <div class="col-md-6 pr-1">
                    <div class="form-group">
                        <label> الى تاريخ</label>
                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                                    <input type="text" class="form-control2" name="task_end_date" placeholder="الى تاريخ" required value="{{$showTask->Task_End_date}}">
                                </div>
                           </div>
                    </div>
             </div>              
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>اسم المندوب</label>
                        <select name="salesperson_name" class="form-control2"  placeholder="اسم المندوب"  >
                          <option value="" selected="" disabled="">اسم المندوب </option>
                            @if(count($Salespeoples)>0 )
                              @foreach($Salespeoples as $salesperson)
                                <option value="{{$salesperson->SP_ID}}" required
                                   @if($salesperson->SP_ID==$showTask->SalespersonID)
                                      selected
                                    @endif 
                                >
                                   {{$salesperson->SP_first_name}} {{$salesperson->SP_last_name}}</option>
                              @endforeach
                              @else
                              <option value="none" selected="" >{{'لايوجد'}} </option> 
                            @endif
                        </select>
                 
                </div>
              </div>
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                      <label>اسم المنطقة</label>
                        <select name="areaName" class="form-control2"  placeholder="اسم المنطقة"  value="{{old('areaName')}}">
                          <option value="" selected="" disabled="">اسم المنطقة </option>
                            @if(count($area_names)>0 )
                              @foreach($area_names as $area_name)
                                <option value="{{$area_name->Area_ID}}" required 
                                 @if($area_name->Area_ID==$showTask->Task_Area_ID)
                                     selected
                                  @endif
                                 >
                                   {{$area_name->AreaName_Ar}}</option>
                                   
                              @endforeach
                              @else
                              <option value="none" selected="" >{{'لايوجد'}} </option> 
                            @endif
                        </select>
                  </div>
           </div>
               <div class="col-md-6 pr-1">
                <div class="form-group">
                        <label>هدف المبيعات</label>
                        <input type="number" class="form-control2"  placeholder="هدف المبيعات" name="salesTarget" value="{{$showTask->Task_sales_target}}" >
                    </div>
                </div>
            </div>
            </div>
            <div class="row second-section" style="text-align:right;">
        
                     <div class="col-lg-12 btn_task_main">
                          <div class=" btn-task">
                              <button type="submit" class="btn btn-info waves-effect waves-light">حفظ </button>
                           </div>
                           <div class=" btn-task">
                               <button type="submit" class="btn btn-info waves-effect waves-light" >الغاء </button>
                            </div>     
                     </div>
             </div>
          </form>
           @endforeach
      @endif
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
    </div>
  </div>
</div>

<script>
    // Get DOM Elements
  const modal = document.querySelector('#my-modal');
  const modalBtn = document.querySelector('#modal-btn');
  const closeBtn = document.querySelector('.close');
  
  // Events
  modalBtn.addEventListener('click', openModal);
  closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', outsideClick);
  
  // Open
  function openModal() {
    modal.style.display = 'block';
  }
  
  // Close
  function closeModal() {
    modal.style.display = 'none';
  }
  
  // Close If Outside Click
  function outsideClick(e) {
    if (e.target == modal) {
      modal.style.display = 'none';
    }
  }   
    </script>

@endsection    