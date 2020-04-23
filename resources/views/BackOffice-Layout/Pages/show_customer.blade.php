@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' عرض بيانات عميل ')
@section('content')

<div class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h5 class="cus_order_list_title">عرض بيانات عميل</h5>
            </div>
            <div class="card-body">
            @if(count($showCus_Data)>0 ) 
              @foreach($showCus_Data as $Cus_data) 
              <form>

                <div class="row">
                  <div class="col-md-5 pr-1">
                    <div class="form-group">
                      <label>الاسم </label>
                      <input type="text" class="form-control2" placeholder="الاسم " 
                             value="{{$Cus_data->Cust_first_name}}{{' '}}{{$Cus_data->Cust_last_name}}  " readonly>
                    </div>
                  </div>
                  <div class="col-md-3 pr-1">
                    <div class="form-group">
                      <label>المدينة</label>
                      <input type="text" class="form-control2"  value="صنعاء" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">المديونية</label>
                      <input type="text" class="form-control2" placeholder="المديونية" readonly
                        value="{{$Cus_data->Maximum_credit}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>اسم المندوب</label>
                      <input type="text" class="form-control2" placeholder="اسم المندوب" 
                             value="{{$Cus_data->SP_first_name}}{{' '}}{{$Cus_data->SP_last_name}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>نوع العميل</label>
                      <input name="cus_type" type="text" class="form-control2" placeholder="نوع العميل" readonly
                        value="{{$Cus_data->Cust_category}}">
                  </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-1">
                    <div class="form-group">
                      <label>المنطقة</label>
                      @if(count($showCus_address)>0 ) 
                        <ol type="1">
                          @foreach($showCus_address as $showCus_add )
                           <li> <input type="text" class="form-control2"  value="{{$showCus_add->Area }}" readonly></li>
                          @endforeach
                        </ol>
                      @else
                      <input type="text" class="form-control2"  value="{{'لايوجد'}}" readonly>
                     @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-1">
                    <div class="form-group">
                      <label>العنوان</label>
                      @if(count($showCus_address)>0 ) 
                      <ol type="1">
                          @foreach($showCus_address as $showCus_add )
                           <li> <input type="text" class="form-control2"  value="{{$showCus_add->location_name }}" readonly></li>
                          @endforeach
                      </ol>
                      @else
                      <input type="text" class="form-control2"  value="{{'لايوجد'}}" readonly>
                     @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pl-1">
                    <div class="form-group">
                      <label>رقم الهاتف</label>
                      @if(count($showCus_contact)>0 ) 
                      <ol type="1">
                        @foreach($showCus_contact as $Cus_contact )
                          <li><input type="text" class="form-control2"  value="{{$Cus_contact->phone_number }}" readonly></li>
                        @endforeach
                      </ol>
                      @else
                         <input type="text" class="form-control2"  value="{{'لايوجد'}}" readonly>
                     @endif
                    </div>
                  </div>
                  <div class="col-md-12 px-1">
                    <div class="form-group">
                      <label>الايميل</label>
                      @if(count($showCus_contact)>0 ) 
                      <ol type="1">
                        @foreach($showCus_contact as $Cus_contact )
                         <li> <input type="text" class="form-control2"  value="{{$Cus_contact->email_address }}" readonly></li>
                        @endforeach
                      </ol>
                      @else
                        <input type="text" class="form-control2"  value="{{'لايوجد'}}" readonly>
                      @endif
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
        <div class="col-md-4">
          <div class="card card-user">
            <div class="image">
              <img src="{{asset('BackOffice-Assets/dist/img/bg5.jpg')}}" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                  @if($Cus_data->Customer_photo != null)     
                     <img src={{asset('storage/Users_img/'.$Cus_data->Customer_photo)}} class="avatar border-gray"  alt="User Image" >
                  @else
                    <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="avatar border-gray"  alt="User Image" >
                  @endif   
                  <h5 class="title">{{$Cus_data->Cust_first_name}}{{' '}}{{$Cus_data->Cust_last_name}}</h5>
                </a>
              </div>
              <p class="description text-center">
                 <strong>عميل</strong>
                <br> تاريخ الانظمام
                <br> {{$Cus_data->Cus_Created_At}}
              </p>
            </div>
            <hr>
  
          </div>
        </div>
      </div>
    </div>


 <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h4 id="location_title">عنوان العميل على الخريطة</h4>
       <div class="cus_location_on_map">
     

       </div>
  </div>
 </div>
</div>
</div>

@endsection    