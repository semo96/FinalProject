@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('content')
@section('page_title','اضافة طلب')


<script type="text/javascript">
  $(document).ready(function(){
  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  //var fieldHTML = '<div><a href="javascript:void(0);" class="remove_button"><img src="{{asset('BackOffice-Assets/dist/img/remove-icon.png')}}" width="30px" height="30px"/></a><input type="text" name="field_name[]" value=""/></div>'; //New input field html 
var fieldHTML = '<div class="form-group"> <select name="order_product" class="form-control" ><option value="none" selected="" disabled="">اسم المنتج</option> @if(count($product_names)>0 )@foreach($product_names as $product_name)<option value="{{$product_name->Product_ID}}"> {{$product_name->Product_name}} </option> @endforeach @else<option value="none" selected="" >{{'لايوجد'}} </option> @endif</select> </div><div class="form-group"> <select name="order_cat" class="form-control" ><option value="none" selected="" disabled="">اسم الصنف</option>@if(count($product_categries)>0 )@foreach($product_categries as $product_categry)<option value="{{$product_categry->Category_name}}">{{$product_categry->Category_name}} </option>@endforeach @else<option value="none" selected="" >{{'لايوجد'}} </option> @endif</select></div><div class="form-group"><input name="order_qty" type="number" class="form-control" placeholder="الكمية" required></div><div class="form-group"> <select name="unit_of_measure" class="form-control" ><option value="none" selected="" disabled="">العبوة</option> @if(count($Unit_Of_Measures)>0 ) @foreach($Unit_Of_Measures as $Unit_Of_Measure)<option value="{{$Unit_Of_Measure->Primary_unite}}">{{$Unit_Of_Measure->Primary_unite}} </option><option value="{{$Unit_Of_Measure->Secondary_unite}}">{{$Unit_Of_Measure->Secondary_unite}} </option> <option value="{{$Unit_Of_Measure->Mid_unite}}">{{$Unit_Of_Measure->Mid_unite}} </option>@endforeach @endif</select>  </div>';
//str1.concat(str2)
 
  var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
        });
 </script>
<!--___________________________________add order_____________________________________________________-->

      <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="product-payment-inner-st">
         <h4 id="form_title">اضافة طلب لعميل مسجل</h4>
            <div id="myTabContent" class="tab-content custom-order-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="review-content-section">
            <div  class="pro-ad">
            <form action="#" class=" needsclick add-professors" id="demo1-upload">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <span id="add_more_order">
                  <div class="form-group">
                      <select name="order_product" class="form-control" >
                        <option value="none" selected="" disabled="">اسم المنتج</option>
                          @if(count($product_names)>0 )
                            @foreach($product_names as $product_name)
                              <option value="{{$product_name->Product_ID}}">
                                 {{$product_name->Product_name}} </option>
                            @endforeach
                            @else
                            <option value="none" selected="" >{{'لايوجد'}} </option> 
                          @endif
                      </select> 
                    </div>
                  <div class="form-group">
                    <select name="order_cat" class="form-control" >
                      <option value="none" selected="" disabled="">اسم الصنف</option>
                        @if(count($product_categries)>0 )
                          @foreach($product_categries as $product_categry)
                            <option value="{{$product_categry->Category_name}}">
                               {{$product_categry->Category_name}} </option>
                          @endforeach
                          @else
                          <option value="none" selected="" >{{'لايوجد'}} </option> 
                        @endif
                    </select>
                    </div>
                  <div class="form-group">
                    <input name="order_qty" type="number" class="form-control" placeholder="الكمية" required>
                  </div>
                  <div class="form-group">
                      <select name="unit_of_measure" class="form-control" >
                        <option value="none" selected="" disabled="">العبوة</option>
                       @if(count($Unit_Of_Measures)>0 )
                            @foreach($Unit_Of_Measures as $Unit_Of_Measure)
                              <option value="{{$Unit_Of_Measure->Primary_unite}}">
                                {{$Unit_Of_Measure->Primary_unite}} </option>
                              <option value="{{$Unit_Of_Measure->Secondary_unite}}">
                                  {{$Unit_Of_Measure->Secondary_unite}} </option>
                              <option value="{{$Unit_Of_Measure->Mid_unite}}">
                                  {{$Unit_Of_Measure->Mid_unite}} </option>
                            @endforeach
                            @else
                            <option value="none" selected="" >{{'لايوجد'}} </option> 
                          @endif
                      </select> 
                    </div>
                  </span>
                  <div class="field_wrapper form-group">
                    <div>
                        <a href="javascript:void(0);" class="add_button">
                          <div class="add_order" >
                            <button  class="btn btn-info waves-effect " >اضافة منتج </button>
                         </div>
                        </a>  
                    </div>
                </div>

                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                            <input type="text" class="form-control" name="order_date" placeholder="تاريخ الطلب" required>
                        </div>
                   </div>
                  <div class="form-group">
                    <select name="cus_name" class="form-control" required >
                      <option value="none" selected="" disabled="">اسم العميل</option>
                        @if(count($CustomerNames)>0 )
                            @foreach($CustomerNames as $CustomerName)
                              <option value="{{$CustomerName->Customer_ID}}">
                                 {{$CustomerName->Cust_first_name}}  {{$CustomerName->Cust_last_name}}</option>
                            @endforeach
                            @else
                            <option value="none" selected="" >{{'لايوجد'}} </option> 
                        @endif
                    </select> 
                  </div>
                  <div class="form-group">
                    <input name="cus_address" type="text" class="form-control" placeholder="العنوان" required>
                  </div>
                   <div class="form-group">
                    <input name="cus_order_phone" type="number" class="form-control" placeholder="رقم الهاتف" required>
                   </div>

                   <div class="form-group res-mg-t-15">
                     <textarea name="description" placeholder="الوصف"></textarea>
                   </div>     
                 </div>
               </div>
              
               <div class="row">
              <div class="col-lg-12 btn_sub_main">
                  <div class=" btn-add btn-submit">
                      <button type="reset" class="btn btn-info waves-effect waves-light btn_add_in"><i class="fa fa-plus"></i> اضافة طلب جديد </button>
                   </div> 
                  <div class=" btn-submit">
                      <button type="submit" class="btn btn-info waves-effect waves-light" >حفظ </button>
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
  </div>
 </div>
</div>
</div>

@endsection    