@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','انشاء مهمة')
@section('content')
@include('BackOffice-Layout.Messages.alerts')
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12 col12-p">
        <div class="box2 box-primary2" >
          <div class="box-header with-border" style="text-align:center; color:rgb(250, 244, 244);
                       background-color:#03a9f4; ">
            <h3 class="box-title">خريطة صنعاء</h3>
            <button onclick="printMap()" style="float:left" class="printMapBtn "> <i class="fa fa-print"></i> طباعة الخريطة </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <div class="google-map-single" style="border: 1px solid blue;margin-top:18px">
              <div id="map" style="border: 1px solid #03a9f4; margin-top:18px"></div>
          </div>
              
              <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>    
              <script src="{{asset('leaflet/src/indexScript.js')}}"></script>

             <!-- <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>-->
	            <script src="{{asset('leaflet/print/dist/bundle.js')}}"></script>
              	<script>


              function printMap(){
                
                map.removeControl(mapControl);
                var printPlugin = L.easyPrint({
                      hidden: false,
                      exportOnly:true,
                      tileLayer:osm,
                      sizeModes: [ 'A4Landscape'],
                      position: 'topright',
                    }).addTo(map); 
                    printPlugin.printMap('A4Portrait', 'MyFileName');
                
                }
                  
      	</script>



              <script src="{{asset('leaflet/search/src/leaflet-search.js')}}"></script>
              <script src="{{asset('leaflet/search/mapSearch.js')}}"></script>


  <!-- End of Main script of map -->

           </div>
          </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

        <div class="col-md-4 pr-1">
                      <div class="form-group">
                          <label>تحديد المنطقة على الخريطة </label>
                        <span onclick="setAreaColor()" class="btn btn-info">تحديد المنطقة ولونها</span>
                      </div>
                   
               </div>





   <div class="row">
     <div class="col-md-12">
        <div class="card-body" style="width:100%; margin-top:0px;background-color:#fafbfc;">
         <table class=" myTable saleserson_list_table  hover  legend " style="text-align: right;" >
           <tbody><h4 class="text-center">اسماء المناطق</h4>
             <tr>
               <td><i style="background: #FFD700"></i><span>الوحدة</span><br>
                   <i style="background: #20B2AA"></i><span>التحرير</span><br>
                   <i style="background: #00FFFF"></i><span>معين</span><br> 
                </td>
                <td>
                   <i style="background: #FF69B4"></i><span>الثورة</span><br> 
                   <i style="background: #DC143C"></i><span>بني الحارث</span><br> 
                   <i style="background: #DA70D6"></i><span>ازال</span><br>         
               </td>
               <td><i style="background: #FFC0CB"></i><span>ارحب</span><br>
                   <i style="background: #A52A2A"></i><span>همدان</span><br>
                   <i style="background: #008000"></i><span>نهم</span><br>       
               </td>
               <td><i style="background: #483D8B"></i><span>بني حشيش</span><br>
                   <i style="background: #0000FF"></i><span>سنحان وبني بهلول</span><br>
                   <i style="background: #8e9088"></i><span>بلاد الروس</span><br>
                </td>
                <td>
                   <i style="background: #2f4a7b"></i><span>الطيال</span><br>
                   <i style="background: #FF8C00"></i><span>بني مطر</span><br>
                   <i style="background: rosybrown"></i><span>الحيمة الداخلية</span><br>
               </td>
               <td><i style="background: #ADFF2F"></i><span>صعفان</span><br>
                   <i style="background: #00FF00"></i><span>الحيمة الخارجية</span><br>
                   <i style="background: #9ACD32"></i><span>خولان</span><br>
                </td>
                <td>
                   <i style="background: #8B008B"></i><span>مناخة</span><br>
                   <i style="background: #d34646"></i><span>بني ضبيان </span><br>
                   <i style="background: #00688B"></i><span>الحصن</span><br>
                   <i style="background: #8B1C62"></i><span>جحانة</span><br>
               </td>
           

             </tr>
           </tbody>
           </table>
        </div>
     </div>
   </div>
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <div class=" box-moniter">
            <div  class="moniter-section">
  <div class="row">

    <div class="col-md-12">
        <div class="card-body">
          <form action="{{route('task.store')}}" method="POST"  class=" needsclick add-professors" enctype="multipart/form-data" >
          @csrf
            <div class="row second-section2 ">    
              <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>اسم المندوب</label>
                        <select name="salesperson_name" class="form-control2"  placeholder="اسم المندوب"  >
                          <option value="" selected="" disabled="">اسم المندوب </option>
                            @if(count($Salespeoples)>0 )
                              @foreach($Salespeoples as $salesperson)
                                <option value="{{$salesperson->SP_ID}}" required >
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
                      <label>هدف المبيعات</label>
                       <input type="number" class="form-control2"  placeholder="هدف المبيعات" name="salesTarget" value="{{old('salesTarget')}}">
                  </div>
              </div>              
               <div class="col-md-6 pr-1">
                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                  <div class="input-group date nk-int-st">
                      <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                      <input type="text" class="form-control2" name="task_start_date" placeholder="من تاريخ"  value="{{old('task_start_date')}}">
                  </div>
                 </div>
               </div>
               <div class="col-md-6 pr-1">
                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                  <div class="input-group date nk-int-st">
                      <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                      <input type="text" class="form-control2" name="task_end_date" placeholder="الى تاريخ"  value="{{old('task_end_date')}}">
                  </div>
                 </div>
               </div>
              <div class="col-md-4 pr-1">
                      <div class="form-group">
                          <label>اسم المدينة</label>
                        <input type="text" class="form-control2" name="cityName" value="صنعاء" readonly>
                      </div>
                   
               </div>
               <div class="col-md-4 pr-1">
                      <div class="form-group">
                          <label>اسم المنطقة</label>
                          <select name="areaName" class="form-control2"  placeholder="اسم المنطقة"  value="{{old('areaName')}}">
                          <option value="" selected="" disabled="">اسم المنطقة </option>
                            @if(count($area_names)>0 )
                              @foreach($area_names as $area_name)
                              
                                <option value="{{$area_name->Area_ID}}" required >
                                   {{$area_name->AreaName_Ar}}</option>
                              @endforeach
                              @else
                              <option value="none" selected="" >{{'لايوجد'}} </option> 
                            @endif
                        </select>
                      </div>
               </div>
          
               <div class="col-lg-12 btn_task_main2">
                      <div class=" btn-task2">
                          <button type="submit" class="btn btn-info waves-effect waves-light">حفظ </button>
                       </div>    
                 </div>
            </div>
           </form>
          </div>
         </div>
        </div>
       </div>
      </div>
    </div>
</div>


@endsection    