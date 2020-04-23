@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('content')
@section('page_title','اظافة عميل')

<script type="text/javascript">

  $(document).ready(function(){
  var maxField = 16; //Input fields increment limitation
  var addAddress = $('.addAddress');
  var addContact = $('.addContact');

  var wrapper1 = $('.Add_address_Section');
  var wrapper2 = $('.Add_contact_Section');

  var Addressfield = '<div class="form-group"><label>منطقة جديدة </label><input name="cus_area[]" type="text" class="form-control" placeholder="منطقة جديدة " > </div><div class="form-group"><label>عنوان جديد</label><input name="cus_address[]" type="text" class="form-control" placeholder="عنوان جديد"> </div>';
  var Contactfield   ='<div class="form-group"><label>ايميل جديد </label><input name="cus_email[]" type="email" class="form-control" placeholder=" ايميل جديد" > </div><div class="form-group"><label>هاتف جديد </label><input name="cus_phone[]" type="number" class="form-control" placeholder="هاتف جديد" ></div>' ;

   var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addAddress).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper1).append(Addressfield); //Add field html
                }
            });

           //add new address
           $(addContact).click(function(){
                if(x < maxField){
                    x++;
                    $(wrapper2).append(Contactfield);
                }
            });


        });


  // Email validation Function
  function validateEmail()
{
    var email;
    email = document.getElementById("textEmail").value;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(textEmail.value) == false) {
        document.getElementById("demo").style.color = "red";
        document.getElementById("demo").innerHTML ="  يرجى تعبئة الحقل وكتابته بشكل صحيح example@companyName.com"+ email;
      //  alert('Invalid Email Address ->'+email);
        return false;
     } else
     return true;
}

//Phone validate
function validatePhone()
{
    var mobile;
    mobile = document.getElementById("textPhone").value;
    var reg =/^[77|73|71]+[0-9]{7}$/;
    if (reg.test(textPhone.value) == false) {
        document.getElementById("phone_alert").style.color = "red";
        document.getElementById("phone_alert").innerHTML ="يرجى تعبئة الحقل وكتابته بشكل صحيح"+ mobile;
        return false;
     } else
       return true;
}

//IS Empty Function
/*function isEmpty(){
  if(document.getElementByClassName("fill_field").value).length==0){
    document.getElementByClassName("fill_alert").style.color = "red";
    document.getElementByClassName("fill_alert").innerHTML ="يرجى تعبئة الحقل ";
    return false;
  }
  else
  return true;
}*/
 </script>

<!--___________________________________add customer_____________________________________________________-->
@include('BackOffice-Layout.Messages.alerts')
 <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="product-payment-inner-st">
         <h4 id="form_title">اظافة عميل</h4>
            <div id="myTabContent" class="tab-content custom-order-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="review-content-section">
            <div  class="pro-ad">
            <form action="{{route('customer.store')}}" method="POST"  class=" needsclick add-professors"
                  id="demo1-upload"  enctype="multipart/form-data" name="Add_Cus_form">
              @csrf
              <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label>الاسم الاول</label>
                        <input name="cus_fname" type="text" class="form-control" placeholder="الاسم الاول" value="{{ old('cus_fname') }}">
                      </div>
                    <div class="form-group">
                        <label>الاسم الثاني</label>
                          <input name="cus_lname" type="text" class="form-control" placeholder="الاسم الثاني" value="{{ old('cus_lname') }}" >
                        </div>
                        <div class="form-group">
                          <label>اسم المحافضة</label>
                            <input type="text" class="form-control"  value="{{'صنعاء'}}" name="cus_city" readonly>
                        </div>
                   <div class="form-group" >
                          <label>المنطقة </label>
                          <input name="cus_area[]" type="text" class="form-control fill_field" placeholder="المنطقة " value="{{ old('cus_area') }}"  required>
                          <!--<p class="fill_alert" style="color: red;"></p> -->
                      </div>
                     <div class="form-group">
                       <label>العنوان</label>
                        <input name="cus_address[]" type="text" class="form-control fill_field" placeholder="العنوان" value="{{ old('cus_address') }}"  required>
                        <!--<p class="fill_alert" style="color: red;"></p> -->
                      </div>
                      <div class="Add_address_Section"style=" margin-bottom:40px;" >
                        <div>
                            <a href="javascript:void(0);" class="addAddress" >
                              <div  style="margin-right:35%; margin-top:10px; margin-bottom:30px;">
                               <h5>  اظافة عنوان جديد
                               <img src="{{asset('BackOffice-Assets/dist/img/add-icon.png')}}" width="25px" height="25px"/></h5>
                             </div>
                            </a>
                        </div>
                    </div>
                       <div class="form-group">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="cus_img" value="{{ old('cus_img') }}">
                            <label class="custom-file-label" for="exampleInputFile">اختار صورة</label>
                          </div>
                        </div>
                      </div>
                 </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group">
                    <h5 style="color:#777474">المديونية</h5>
                    <input name="cus_maximum_credit" type="number" class="form-control" placeholder="المديونية " value="{{ old('cus_maximum_credit') }}">
                  </div>
                      <div class="form-group">
                        <h5 style="color:#777474">اسم المندوب</h5>
                          <select name="salesperson_name" class="form-control"  placeholder="اسم المندوب"  >
                            <option value="" selected="" disabled="">اسم المندوب </option>
                            @if(count($Salespeoples)>0 )
                              @foreach($Salespeoples as $Salespeople)
                                <option value="{{$Salespeople->SP_ID}}">
                                   {{$Salespeople->SP_first_name}} {{$Salespeople->SP_last_name}}</option>
                              @endforeach
                              @else
                              <option value="none" selected="" >{{'لايوجد'}} </option>
                            @endif
                          </select>
                        </div>
                    <div class="form-group">
                      <label>الايميل</label>
                      <input name="cus_email[]" type="email" class="form-control" placeholder=" الايميل" value="{{old('cus_email[]')}}" id="textEmail" required>
                      <p id="demo" style="color: red;"></p>
                    </div>
                   <div class="form-group">
                     <label>رقم الهاتف</label>
                    <input name="cus_phone[]" type="number" class="form-control" placeholder="رقم الهاتف" value="{{ old('cus_phone') }}" id="textPhone" required>
                    <p id="phone_alert" style="color: red;"></p>
                   </div>
                <div class="Add_contact_Section" style=" margin-bottom:10px;" >
                      <div>
                          <a href="javascript:void(0);" class="addContact" >
                            <div  style="margin-right:35%; margin-top:10px; margin-bottom:10px;">
                             <h5>  اظافة وسائل تواصل جديدة
                             <img src="{{asset('BackOffice-Assets/dist/img/add-icon.png')}}" width="25px" height="25px"/></h5>
                           </div>
                          </a>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>نوع العميل</label>
                      <select name="cus_type" class="form-control">
                        <option value="none" selected="" disabled="">نوع العميل </option>
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
                            <a href="#"><label><input type="checkbox" checked="true" class="i-checks" id="check_box" name="cus_loc_in_map"> <i></i> ادراج عنوان العميل في الخريطة</label></a>
                        </div>
                    </div>
                 </div>
               <div class="row">
                  <div class="col-lg-12 btn_sub_main">
                      <div class=" btn-submit">
                          <button type="reset" class="btn btn-info waves-effect waves-light btn_add_in"><i class="fa fa-plus"></i> اضافة عميل جديد </button>
                       </div>
                      <div class=" btn-submit">
                         <button type="submit" class="  btn-info waves-effect waves-light" id="sa-succes" onclick="validateEmail()/*;isEmpty()*/;validatePhone()">حفظ </button>
                      </div>
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
