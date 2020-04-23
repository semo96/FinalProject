@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تعديل بيانات عميل')
@section('content')

<!--___________________________________edit customer_____________________________________________________-->
@include('BackOffice-Layout.Messages.alerts')
 <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="product-payment-inner-st">
         <h4 id="form_title">تعديل بيانات عميل</h4>
         <div id="myTabContent" class="tab-content custom-order-edit">
          <div class="product-tab-list tab-pane fade active in" id="description">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="review-content-section">
          <div  class="pro-ad">
      @if(count($EditCus_Data)>0)
      @foreach ($EditCus_Data as $Cus_Data)
          <form action="{{route('customer.update',$Cus_Data->Customer_ID)}}" method="POST"  class=" needsclick add-professors"
                id="demo1-upload"  enctype="multipart/form-data">
            <input type="hidden" value="PUT" name="_method"/>
            @csrf
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label>الاسم الاول </label>
                      <input name="cus_fname" type="text" class="form-control" placeholder="الاسم الاول"
                             value="{{$Cus_Data->Cust_first_name}}">
                    </div>
                     <div class="form-group">
                      <label>الاسم الثاني </label>
                        <input name="cus_lname" type="text" class="form-control" placeholder="الاسم الثاني"
                               value="{{$Cus_Data->Cust_last_name}}">
                      </div>
                      <div class="form-group">
                        <label>المدينة </label>
                        <input type="text" class="form-control" name="cus_city" value="صنعاء">
                    </div>
          <!--  Start the Address section      -->
               @if(count($EditCus_address)>0)
                    <div class="form-group">
                      <label>المنطقة </label>
                    </div>
              <ol type="1">
                  @foreach ($EditCus_address as $Cus_address)
                  <div class="form-group">
                  <input name="cus_id[]" value="{{$Cus_address->Customerid}}" type="hidden"/>
                      <li> <input name="cus_area[]" type="text" class="form-control" placeholder="المنطقة "
                                   value="{{$Cus_address->Area}}" ></li>
                      </div>
                  @endforeach
              </ol>

                <div class="form-group">
                      <label>العنوان</label>
                  <ol type="1">
                    @foreach ($EditCus_address as $Cus_address)
                       <div class="form-group">
                        <input name="cus_id[]" value="{{$Cus_address->Customerid}}" type="hidden"/>
                          <li><input name="cus_address[]" type="text" class="form-control" placeholder="العنوان"
                                 value="{{$Cus_address->location_name}}"></li>
                       </div>
                  </ol>
                     @endforeach
                 </div>
                  </ol>
                  @else
                  <div class="form-group">
                    <label>المنطقة </label>
                    <input type="text" class="form-control" placeholder="المنطقة" name="cus_area[]" >
                </div>
                <div class="form-group">
                  <label>العنوان</label>
                  <input name="cus_address[]" type="text" class="form-control" placeholder="العنوان" >
                </div>
                  @endif
          <!--  end the address section      -->
                      <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="cus_img"
                                     value="{{$Cus_Data->Customer_photo}}">
                              <label class="custom-file-label" for="exampleInputFile">اختار صورة</label>
                            </div>
                          </div>
                        </div>
                  </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group">
                    <label>المديونية </label>
                      <input name="cus_maximum_credit" type="number" class="form-control" placeholder="المديونية "
                             value="{{$Cus_Data->Maximum_credit}}">
                    </div>
      <!--  Start the Salesperson section      -->
                    <div class="form-group">
                      <label>اسم المندوب</label>
                        <select name=" salesperson_name" class="form-control"  placeholder="اسم المندوب" required>
                          <option selected="{{$Cus_Data->SP_first_name}} {{$Cus_Data->SP_last_name}}  " disabled="" value="{{$Cus_Data->SP_first_name}} {{$Cus_Data->SP_last_name}}">{{$Cus_Data->SP_first_name}} {{$Cus_Data->SP_last_name}} </option>
                          @if(count($salespersons)>0 )
                            @foreach($salespersons as $salesperson)
                            <option value="{{$salesperson->SP_ID}}">
                               {{$salesperson->SP_first_name}} {{$salesperson->SP_last_name}}</option>
                            @endforeach
                            @else
                            <option value="none" selected="" >{{'لايوجد'}} </option>
                          @endif
                        </select>
                      </div>
        <!--  End the salesperson section      -->

        <!--  Start the contact section      -->
                  @if(count($EditCus_contact)>0)
                  <div class="form-group">
                    <label>الايميل</label>
                    <ol type="1">
                        @foreach ($EditCus_contact as $Cus_contact)
                          <div class="form-group">
                            <li><input name="cus_email[]" type="email" class="form-control" placeholder=" الايميل"
                                  value="{{$Cus_contact->email_address}}"></li>
                          </div>
                        @endforeach
                    </ol>
                    </div>
                    <div class="form-group">
                        <label>رقم الهاتف</label>
                      <ol type="1">
                        @foreach ($EditCus_contact as $Cus_contact)
                      <div class="form-group">
                       <li> <input name="cus_phone[]" type="number" class="form-control" placeholder="رقم الهاتف"
                              value="{{$Cus_contact->phone_number}}"></li>
                      </div>
                      @endforeach
                      </ol>
                    </div>
                    @else
                    <div class="form-group">
                      <label>الايميل</label>
                      <input name="cus_email[]" type="email" class="form-control" placeholder=" الايميل">
                    </div>
                   <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input name="cus_phone[]" type="number" class="form-control" placeholder="رقم الهاتف" >
                   </div>
                  @endif
             <!--  End the contact section      -->
                 <div class="form-group">
                  <label>نوع العميل</label>
                    <select name="cus_type" class="form-control" required>
                      <option value="{{$Cus_Data->Cust_category}}" selected="{{$Cus_Data->Cust_category}}" disabled="">{{$Cus_Data->Cust_category}} </option>
                      <option value="سوبر ماركت (جملة)"> سوبر ماركت (جملة)</option>
                      <option value="سوبر ماركت (تجزئة)">سوبر ماركت (تجزئة)</option>
                      <option value=" بقالة (جملة)"> بقالة (جملة)</option>
                      <option value=" بقالة (تجزئة)"> بقالة (تجزئة)</option>
                      <option value="عميل (جملة)">عميل (جملة)</option>
                      <option value="عميل (تجزئة)">عميل (تجزئة)</option>
                    </select>
                   </div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="fm-checkbox">
                          <a href="#"><label><input type="checkbox" checked="true" class="i-checks" id="check_box" name="cus_loc_in_map">
                             تعديل عنوان العميل عللى الخريطة</label></a>
                      </div>
                  </div>
               </div>
             </div>
             <div class="row">
                <div class="col-lg-12 btn_sub_main">
                    <div class=" btn-submit">
                       <button type="submit" class="  btn-info waves-effect waves-light" id="sa-succes">تعديل </button>
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
</div>

@endsection
