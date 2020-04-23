@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تعديل طلب')
@section('content')

<div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="product-payment-inner-st">
               <h4 id="form_title">تعديل طلب</h4>
                  <div id="myTabContent" class="tab-content custom-order-edit">
                  <div class="product-tab-list tab-pane fade active in" id="description">
                  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                  <div  class="pro-ad">
                  <form action="#" class=" needsclick add-professors" id="demo1-upload">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <input name="cus_name" type="text" class="form-control" placeholder="اسم العميل" required>
                        </div>
                        <div class="form-group">
                          <input name="cus_address" type="text" class="form-control" placeholder="العنوان" required>
                        </div>
                        <div class="form-group">
                            <input name="product_type" type="text" class="form-control" placeholder="اسم الصنف" required>
                          </div>
                        <div class="form-group">
                          <input name="order_qty" type="number" class="form-control" placeholder="الكمية" required>
                        </div>
                        <div class="form-group">
                            <select name="unit_of_measure" class="form-control" >
                              <option value="none" selected="" disabled="">العبوة</option>
                              <option value="0">باكيت</option>
                              <option value="1">حبة</option>
                              <option value="2">كرتون</option>
                              <option value="3">كيلو</option>
                              <option value="4">مل</option>
                            </select>
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
                        <div class="form-group">
                            <input name="product_name" type="text" class="form-control" placeholder="اسم المنتج" required>
                          </div>
                          <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                              <div class="input-group date nk-int-st">
                                  <span class="input-group-addon" ><i class="fa  fa-calendar"></i></span>
                                  <input type="text" class="form-control" name="order_date" placeholder="تاريخ الطلب" required>
                              </div>
                             </div>
                         <div class="form-group">
                          <input name="cus_phone" type="number" class="form-control" placeholder="رقم الهاتف" required>
                         </div>
    
                         <div class="form-group res-mg-t-15">
                           <textarea name="description" placeholder="الوصف"></textarea>
                         </div>
                         
                       </div>
                     </div>
                    
                     <div class="row">
                    <div class="col-lg-12 btn_sub_main">
                        <div class=" btn-submit">
                            <button type="submit" class="btn btn-info waves-effect waves-light">حفظ </button>
                         </div>
                         <div class=" btn-submit">
                             <button type="submit" class="btn btn-info waves-effect waves-light" >حذف </button>
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
>
 
@endsection    