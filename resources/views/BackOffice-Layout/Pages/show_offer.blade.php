@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','عرض ')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->

        <!--___________________________________view offers_____________________________________________________-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <h4 id="form_title"> عرض العرض </h4>
                            <div id="myTabContent" class="tab-content custom-order-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div  class="pro-ad">
                                                    <form action="#" class="needs-validation" id="demo1-upload">
                                                        <div class="row">
                                                            @if(count($offers)>0)
                                                                @foreach($offers as $offer)

                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label>يبدأ العرض من</label>
                                                                            <input type="text" class="form-control2" name="offer_start_date"  value="{{$offer->start_date}}" placeholder="يبدأ العرض من"  readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>ينتهي العرض في</label>
                                                                            <input type="text" class="form-control2" name="offer_end_date" value="{{$offer->finish_date}}" placeholder="ينتهي العرض في"  readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>نوع العرض</label>
                                                                            <input name="offer_type" type="text" class="form-control2" value="{{$offer->Offer_Type}}" placeholder="نوع العرض"  readonly >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>حالة العرض</label>
                                                                            <input name="offer_status" type="text" class="form-control2" value="{{$offer->Offer_status}}" placeholder="حالة العرض"  readonly >
                                                                        </div>
                                                                        @if(count($Offer_Details)>0)
                                                                            @foreach($Offer_Details as $Offer_Detail)

                                                                                <div class="form-group">
                                                                                    <label>اسم الصنف</label>
                                                                                    <input name="offer_category" type="text" class="form-control2" value="{{$Offer_Detail->products->Product_name}}" placeholder="اسم الصنف"  readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>الكمية</label>
                                                                                    <input name="offer_qty" type="number" class="form-control2" placeholder="الكمية " value="{{$Offer_Detail->Quantity}}" id="offer_qty"  readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>العبوة</label>
                                                                                    <input name="offer_unit" type="text" class="form-control2" placeholder="العبوة " value="{{$Offer_Detail->product_unite_of_measure}}"  id="offer_unit"  readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label> مقدار الخص</label>
                                                                                    <input name="offer_discount" type="number"  class="form-control2" placeholder=" مقدار الخصم"  value="{{$Offer_Detail->discount}}"  id="offer_discount"  readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label> وصف العرض</label>
                                                                                    <input name="offer_description" type="text"  class="form-control2" placeholder=" وصف العرض" value="{{$Offer_Detail->Offer_desc}}" id="offer_discount"  readonly>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-group" class="form-group" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:30px">
                                                                            <div class="show_offer_img">
                                                                                <label class="input-group" > صورة العرض</label>
                                                                                @if($offer->Offer_image!= null)
                                                                                    <img src={{asset('storage/Users_img/'.$offer->Offer_image)}} class="avatar"  alt="User Image" >
                                                                                @else
                                                                                    <img src="{{asset('BackOffice-Assets/dist/img/sale.jpg')}}" alt="صورة العرض" width="55%" height="50%" >
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @foreach($offer->customers as $Cus_off)
                                                                            <div class="form-group">
                                                                                <label>اسم العميل</label>
                                                                                <input name="cus_name" type="text" class="form-control2" value=" {{$Cus_off->Cust_first_name}}{{' '}} {{$Cus_off->Cust_last_name}}" placeholder="اسم العميل"  readonly>
                                                                            </div>
                                                                            @foreach($Salespeoples as $Salespeople)
                                                                                @if($Salespeople->SP_ID==$Cus_off->Cust_group_ID)
                                                                                    <div class="form-group">
                                                                                        <label>اسم المندوب</label>
                                                                                        <input name="SP_name" type="text" class="form-control2" placeholder="اسم المندوب"
                                                                                               value=" {{$Salespeople->SP_first_name}}{{$Salespeople->SP_last_name}}" readonly>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            @endif
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
    </section>
@endsection
