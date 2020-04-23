@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','قائمة المهام المنشأه')
@section('content')

    <!-- Main row -->

<!--___________________________________data table_____________________________________________________-->

<div class="box-feedback clearfix">
  <div class="feedback_title">
          <button href="#" class="  btn_title">مهام المندوب </button>
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
    <form action="#">
       <div class="input-group">
          <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
       </div>
      </form>
 </div>
 <table class=" myTable saleserson_table  hover  table-striped ">
    <tbody>
        <tr>
            <th class="review-item-rating "> <i class="fa  fa-edit"></i>   </th>
             <th>اسم المندوب </th>
             <th>ERP رقم فاتورة </th>
            <th>تاريخ البدء </th>
            <th>تاريخ الانتهاء </th>
            <th>سير المهمة</th>
            <th style="padding-right:70px">الاجراء</th>
        </tr>
    @if(count($CreatedTasks)>0 ) 
      @foreach($CreatedTasks as $Task) 

            <tr> 
                  <td class="review-item-rating ">  
                       <i class="fa  fa-edit"></i>          
                  </td>
                  <td class="review-ctn-hf">
                    @if(count($Salespeoples)>0 )
                      @foreach($Salespeoples as $salesperson)
                        @if($salesperson->SP_ID==$Task->SalespersonID)
                         <h3>{{$salesperson->SP_first_name}} {{$salesperson->SP_last_name}}</h3> 
                        @endif
                      @endforeach
                    @endif
                          
                  </td>
                   <td class="review-ctn-hf " >
                    @if(count($ERP_bills)>0 )
                      @foreach($ERP_bills as $ERP_bill)
                        @if($ERP_bill->SalespersonID==$Task->SalespersonID)
                        <a href="#"> <h5>{{$ERP_bill->Bill_ID}}</h5> </a>
                        @endif
                      @endforeach
                    @endif
                  </td>
                  <td>
                      <h5>{{$Task->Task_Start_date}}</h5>
                  </td>
                  <td>
                      <h5>{{$Task->Task_End_date}}</h5>
                  </td>


                  @php $num='10%'; @endphp

                  
                  <td class="analysis-progrebar-content">  
                      <h2 class="storage-right"><span class="counter">50</span>%</h2>
                      <div class="progress progress-mini ug-3">
                          <div style="width:@php echo $num;  @endphp  " class="progress-bar progress-bar-danger"></div>
                      </div>    
               </td>
               <td class="  btn-view "> 
                <div class="action_btn">
                    <a href="{{route('task.show',$Task->Task_ID)}}"  target="_blank"><button type="submit" class="btn btn-primary btn-sm botao-controle  " >
                        <i class="fa fa-file-text" ></i> عرض
                    </button></a> 
                <form action="{{route('task.index')}}" method="get">
                   @csrf 
                    <a href="#"><button type="submit" class="btn btn-danger btn-sm" name="delete_ID" value="{{$Task->Task_ID}}" >
                        <i class="fa fa-trash-o"></i> حذف
                    </button></a> 
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