@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' عرض طلب')
@section('content')

<div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="product-payment-inner-st">
               <h4 id="form_title">عرض طلب لعميل غير مسجل</h4>
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
                          <input name="cus_name" type="text" class="form-control2" placeholder="اسم العميل" readonly>
                        </div>
                        <div class="form-group">
                          <input name="cus_address" type="text" class="form-control2" placeholder="العنوان" readonly>
                        </div>
                        <div class="form-group">
                          <input name="cus_phone" type="number" class="form-control2" placeholder="رقم الهاتف" readonly>
                         </div>
                         <div class="form-group">
                          <input name="cus_email" type="email" class="form-control2" placeholder="الايميل" readonly>
                         </div>
                         <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                          <input type="text" class="form-control2" name="order_date" placeholder="تاريخ الطلب" readonly>
                       </div>
                       <div class="form-group res-mg-t-15">
                           <textarea name="description" placeholder="الوصف" readonly></textarea>
                       </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input name="product_name" type="text" class="form-control2" placeholder="اسم المنتج" readonly>
                        </div>
                        <div class="form-group">
                            <input name="product_type" type="text" class="form-control2" placeholder="اسم الصنف" readonly>
                        </div>
                        <div class="form-group">
                          <input name="order_qty" type="number" class="form-control2" placeholder="الكمية" readonly>
                        </div>
                        <div class="form-group">
                            <input name="order_unit_of_measure" type="text" class="form-control2" placeholder="العبوة" readonly>
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