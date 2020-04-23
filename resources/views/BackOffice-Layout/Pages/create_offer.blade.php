@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','انشاء عرض')
@section('content')
   <!-- Main content -->

   <script >


       $(document).ready(function(){
           var maxField = 10; //Input fields increment limitation
           var customOffer = $('.customOffer');
           var wrapper2 = $('.customOffer_Section');
           var forAll_Offer = $('.forAll_Offer');
           var wrapper3 = $('.forAll_Offer_section');
           var All_Offerfield =' <table class=" myTable saleserson_table  hover  table-striped ">\n' +
               '                                <tbody>\n' +
               '                                  <tr>\n' +
               '                                      <td>\n' +
               '                                          <div class="form-group">\n' +
               '                                              <select name="offer_category[]" class="form-control dynamics0" id="CategoryID"\n' +
               '                                                      data-dependent="Product_name">\n' +
               '                                                  <option  value="0" selected disabled>الصنف</option>\n' +
               '                                                  @if(count($productCategories)>0)\n' +
               '                                                       @foreach($productCategories as $productCategorie )\n' +
               '                                                         <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>\n' +
               '                                                       @endforeach\n' +
               '                                                   @endif\n' +
               '                                              </select>\n' +
               '                                          </div>\n' +
               '\n' +
               '                                      </td>\n' +
               '\n' +
               '                                      <td>\n' +
               '                                          <div class="form-group">\n' +
               '                                              <select name="offer_product[]" class="form-control  dynamics0" id="Products_ID0"\n' +
               '                                                      data-dependent="Product_ID">\n' +
               '                                                  <option value="0" disabled selected> المنتج</option>\n' +
               '                                              </select>\n' +
               '                                          </div>\n' +
               '                                      </td>\n' +
               '                                      <td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group"  >\n' +
               '                                        <input name="offer_qty[]" type="number" min="1" class="form-control" placeholder="الكمية "  id="offer_qty">\n' +
               '                                      </div>\n' +
               '                                    </td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group">\n' +
               '                                        <select name="unit_of_measure[]" class="form-control unite_of_measure " id="unite_of_measures0">\n' +
               '                                          <option value="none" selected="" disabled="">العبوة</option>\n' +
               '\n' +
               '                                        </select>\n' +
               '                                      </div>\n' +
               '                                    </td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group">\n' +
               '                                        <input name="offer_discount[]" type="number"  class="form-control" placeholder=" مقدار الخصم"  id="offer_discount" >\n' +
               '                                    </div>\n' +
               '                                    </td>\n' +
               '                                    <td >\n' +
               '\n' +
               '                                    </td>\n' +
               '                                  </tr>\n' +
               '                                <tr>\n' +
               '                                    <td>\n' +
               '                                        <div class="form-group" style="width:100%">\n' +
               '                                            <textarea name="offer_description[]" placeholder="وصف العرض" style=" height:60px ;"></textarea>\n' +
               '                                        </div>\n' +
               '                                    </td>\n' +
               '\n' +
               '                                </tr>\n' +
               '                                </tbody>\n' +
               '                            </table>';
           var Custom_Offerfield =' <table class=" myTable saleserson_table  hover  table-striped ">\n' +
               '                                <tbody>\n' +
               '                                  <tr>\n' +
               '                                      <td>\n' +
               '                                          <div class="form-group">\n' +
               '\n' +
               '                                              <select name="offer_category[]" class="form-control dynamic0" id="CategoryID"\n' +
               '                                                      data-dependent="Product_name">\n' +
               '                                                  <option  value="0" selected disabled>الصنف</option>\n' +
               '                                                  @if(count($productCategories)>0)\n' +
               '                                                       @foreach($productCategories as $productCategorie )\n' +
               '                                                         <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>\n' +
               '                                                       @endforeach\n' +
               '                                                   @endif\n' +
               '                                              </select>\n' +
               '                                          </div>\n' +
               '\n' +
               '                                      </td>\n' +
               '\n' +
               '                                      <td>\n' +
               '                                          <div class="form-group">\n' +
               '                                              <select name="offer_product[]" class="form-control  dynamic0" id="Product_ID0">\n'+
               '                                                  <option value="0" disabled selected> المنتج</option>\n' +
               '                                              </select>\n' +
               '                                          </div>\n' +
               '                                      </td>\n' +
               '                                      <td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group"  >\n' +
               '                                        <input name="offer_qty[]" type="number" min="1" class="form-control" placeholder="الكمية "  id="offer_qty">\n' +
               '                                      </div>\n' +
               '                                    </td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group">\n' +
               '                                        <select name="unit_of_measure[]" class="form-control unite_of_measure " id="unite_of_measure0">\n' +
               '                                          <option value="none" selected="" disabled="">العبوة</option>\n' +
               '\n' +
               '                                        </select>\n' +
               '                                      </div>\n' +
               '                                    </td>\n' +
               '                                    <td>\n' +
               '                                      <div class="form-group">\n' +
               '                                        <input name="offer_discount[]" type="number"  class="form-control" placeholder=" مقدار الخصم"  id="offer_discount" >\n' +
               '                                    </div>\n' +
               '                                    </td>\n' +
               '                                    <td >\n' +
               '\n' +
               '                                    </td>\n' +
               '                                  </tr>\n' +
               '                                <tr>\n' +
               '                                    <td>\n' +
               '                                        <div class="form-group" style="width:100%">\n' +
               '                                            <textarea name="offer_description[]" placeholder="وصف العرض" style=" height:60px ;"></textarea>\n' +
               '                                        </div>\n' +
               '                                    </td>\n' +
               '\n' +
               '                                </tr>\n' +
               '                                </tbody>\n' +
               '                            </table>';

           var x = 0; //Initial field counter is 1
           //add new address
           $(customOffer).click(function(){
               if(x < maxField){

                   x++;
                   $(wrapper2).append(Custom_Offerfield);
               }
           });

           $(forAll_Offer).click(function(){

               if(x < maxField){
                   x++;
                   $(wrapper3).append(All_Offerfield);
               }
           });
       });

       $(document).ready(function(){
           var i=0;

           $(document).on('change','.dynamic',function(){
               var value = $(this).val();
               var text=$(this).attr("name");
               console.log(value);
               console.log(text);
               var _token = $('input[name="_token"]').val();
               console.log(_token);
               var op="";


               if (text =="offer_category[]"){

                   $.ajax({
                       url: '{{ route('fetch_product') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#Product_ID").html(" ");
                           op += '<option value="0" selected disabled>المنتج</option>';
                           for (var i = 0; i < data.length; i++) {
                               op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                           }
                           $("#Product_ID" ).append(op);

                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error no return");
                       }

                   })
               } else {

                   $.ajax({

                       url: '{{ route('fetch_Unite_of_measure') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#unite_of_measure").html(" ");
                           op += '<option value="0" selected disabled>العبوة</option>';
                           for (var i = 0; i < data.length; i++) {

                               op += '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                               op += '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                               op += '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                           }
                           $("#unite_of_measure").append(op);
                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error");
                       }

                   })

               }

           });

       });
       $(document).ready(function(){
           var i=0;

           $(document).on('change','.dynamic0',function(){
               var value = $(this).val();
               var text=$(this).attr("name");
               console.log(i);
               console.log(text);
               var _token = $('input[name="_token"]').val();
               console.log(_token);
               var op=" ";


               if (text == "offer_category[]"){
                   console.log(text);
                   $.ajax({

                       url: '{{ route('fetch_product') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#Product_ID0").html(" ");
                           op += '<option value="0" selected disabled>المنتج</option>';
                           for (var i = 0; i < data.length; i++) {
                               op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                           }
                           $("#Product_ID0" ).append(op);

                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error");
                       }

                   })
               } else {
                   $.ajax({

                       url: '{{ route('fetch_Unite_of_measure') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#unite_of_measure0").html(" ");
                           op+= '<option value="0" selected disabled>العبوة</option>';
                           for (var i = 0; i < data.length; i++) {

                               op+= '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                               op+= '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                               op+= '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                           }
                           $("#unite_of_measure0").append(op);
                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error");
                       }

                   })

               }

           });

       });
       $(document).ready(function(){
           var i=0;

           $(document).on('change','.dynamics0',function(){
               var value = $(this).val();
               var text=$(this).attr("name");
               console.log(i);
               console.log(text);
               var _token = $('input[name="_token"]').val();
               console.log(_token);
               var op=" ";


               if (text == "offer_category[]"){
                   console.log(text);
                   $.ajax({

                       url: '{{ route('fetch_product') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#Products_ID0").html(" ");
                           op += '<option value="0" selected disabled>المنتج</option>';
                           for (var i = 0; i < data.length; i++) {
                               op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                           }
                           $("#Product_IDs0" ).append(op);

                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error");
                       }

                   })
               } else {
                   $.ajax({

                       url: '{{ route('fetch_Unite_of_measure') }}',
                       type: 'POST',
                       data: {'value': value, '_token': _token},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $("#unite_of_measures0").html(" ");
                           op+= '<option value="0" selected disabled>العبوة</option>';
                           for (var i = 0; i < data.length; i++) {

                               op+= '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                               op+= '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                               op+= '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                           }
                           $("#unite_of_measures0").append(op);
                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error: function () {
                           console.log("error");
                       }

                   })

               }

           });

       });
       {{--        $(document).ready(function(){--}}

       {{--            $(document).on('change','.dynamic',function(){--}}
       {{--                var value = $(this).val();--}}
       {{--                var text=$(this).attr("name");--}}
       {{--                console.log(text);--}}
       {{--                var _token = $('input[name="_token"]').val();--}}
       {{--                console.log(value);--}}
       {{--                var op=" ";--}}
       {{--        $.ajax({--}}

       {{--            url:'{{ route('fetch_Unite_of_measure') }}',--}}
       {{--            type:'POST',--}}
       {{--            data:{ 'value':value, '_token':_token },--}}
       {{--            success:function (data) {--}}
       {{--                console.log("success");--}}
       {{--                console.log(data);--}}
       {{--                $("#unite_of_measure").html(" ");--}}
       {{--                op+='<option value="0" selected disabled>العبوة</option>';--}}
       {{--                for(var i=0;i<data.length;i++)--}}
       {{--                {--}}

       {{--                    op+='<option value="'+data[i].Primary_unite+'" >'+data[i].Primary_unite+'</option>';--}}
       {{--                     op+='<option value="'+data[i].Secondary_unite+'" >'+data[i].Secondary_unite+'</option>';--}}
       {{--                    op+='<option value="'+data[i].Mid_unite+'" >'+data[i].Mid_unite+'</option>';--}}
       {{--                 }--}}
       {{--                $("#unite_of_measure").append(op);--}}
       {{--                // $('#Product_name').html().empty();--}}

       {{--                //    $('#Product_name').append(op);--}}
       {{--                // dev.find('.productName').append(op);--}}


       {{--            },--}}
       {{--            error:function () {--}}
       {{--                console.log("error");--}}
       {{--            }--}}

       {{--        })--}}

       {{--    });--}}


       {{--});--}}
       $(document).ready(function(){

           $(document).on('change','.dynamics',function(){
               var value = $(this).val();
               var text=$(this).attr("name");
               var _token = $('input[name="_token"]').val();
               console.log(_token);
               var op=" ";
               var ops=" ";
               if(text=="offer_category[]") {
                   $.ajax({

                       url:'{{ route('fetch_product') }}',
                       type:'POST',
                       data:{ 'value':value, '_token':_token },
                       success:function (data) {
                           console.log("successand success");
                           console.log(data);
                           $("#products_ID").html(" ");
                           op+='<option value="0" selected disabled>المنتج</option>';

                           for(var i=0;i<data.length;i++)
                           {
                               op+='<option value="'+data[i].Product_ID+'" >'+data[i].Product_name+'</option>';
                           }
                           $("#products_ID").append(op);

                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error:function () {
                           console.log("error");
                       }

                   })
               }
               else
               {
                   $.ajax({

                       url:'{{ route('fetch_Unite_of_measure') }}',
                       type:'POST',
                       data:{ 'value':value, '_token':_token },
                       success:function (data) {
                           console.log("success");
                           console.log(data);
                           $("#unite_of_measures").html(" ");
                           op+='<option value="0" selected disabled>العبوة</option>';
                           for(var i=0;i<data.length;i++)
                           {

                               op+='<option value="'+data[i].Primary_unite +'" >'+data[i].Primary_unite+'</option>';
                               op+='<option value="'+data[i].Secondary_unite +'" >'+data[i].Secondary_unite+'</option>';
                               op+='<option value="'+data[i].Mid_unite +'" >'+data[i].Mid_unite+'</option>';
                           }
                           $("#unite_of_measures").append(op);
                           // $('#Product_name').html().empty();

                           //    $('#Product_name').append(op);
                           // dev.find('.productName').append(op);


                       },
                       error:function () {
                           console.log("error");
                       }

                   })
               }
           });


       });
       {{--$(document).ready(function(){--}}

       {{--    $(document).on('change','.products',function(){--}}
       {{--        var value = $(this).val();--}}
       {{--        var _token = $('input[name="_token"]').val();--}}
       {{--        console.log(value);--}}
       {{--        var op=" ";--}}
       {{--        $.ajax({--}}

       {{--            url:'{{ route('fetch_Unite_of_measure') }}',--}}
       {{--            type:'POST',--}}
       {{--            data:{ 'value':value, '_token':_token },--}}
       {{--            success:function (data) {--}}
       {{--                console.log("success");--}}
       {{--                console.log(data);--}}
       {{--                $("#unite_of_measures").html(" ");--}}
       {{--                op+='<option value="0" selected disabled>العبوة</option>';--}}
       {{--                for(var i=0;i<data.length;i++)--}}
       {{--                {--}}

       {{--                    op+='<option value="'+data[i].Primary_unite +'" >'+data[i].Primary_unite+'</option>';--}}
       {{--                    op+='<option value="'+data[i].Secondary_unite +'" >'+data[i].Secondary_unite+'</option>';--}}
       {{--                    op+='<option value="'+data[i].Mid_unite +'" >'+data[i].Mid_unite+'</option>';--}}
       {{--                }--}}
       {{--                $("#unite_of_measures").append(op);--}}
       {{--                // $('#Product_name').html().empty();--}}

       {{--                //    $('#Product_name').append(op);--}}
       {{--                // dev.find('.productName').append(op);--}}


       {{--            },--}}
       {{--            error:function () {--}}
       {{--                console.log("error");--}}
       {{--            }--}}

       {{--        })--}}

       {{--    });--}}

       {{--});--}}
       (function($) {
           $(function() {
               $('.test').fSelect();
               $(document).on('change','.salesPeople',function () {
                   var value =$(this).val();
                   console.log(value);
                   var op='';
                   var _token = $('input[name="_token"]').val();

                   $.ajax({
                       url: '{{ route('fetch_customers') }}',
                       type: 'POST',
                       data: {'_token': _token,'value':value},
                       success: function (data) {
                           console.log("success");
                           console.log(data);
                           $('#c_name').html(" ");
                           // op += '<option value="0" selected >اسم العميل</option>';
                           for (var i = 0; i < data.length; i++) {
                               op += '<option value="' + data[i].Customer_ID + '" >' + data[i].Cust_first_name +'  '+data[i].Cust_last_name + '</option>';
                           }
                           $("#c_name").append(op);
                           $('.test').fSelect('reload');

                       },
                       error: function () {
                           console.log("error");
                       }


                   })
               })

           });

       })(jQuery);
           // $(document).ready(function(){
           // });
   </script>


<!--___________________________________create offers_____________________________________________________-->
   @include('BackOffice-Layout.Messages.alerts')
      <!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="product-payment-inner-st">
          <div id="myTabContent" class="tab-content custom-order-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
              <h4 id="form_title"> انشاء عرض </h4>
              <div class="form-group btn-offer" >
                  <button name="offer_type"  onclick="choose_offer_type(0)"class="choose_offer_type  " >عملاء محددين</button>
                  <button  name="offer_type"   onclick="choose_offer_type(1)" class="choose_offer_type  ">لكل العملاء</button>
                </div>
                    <div class="review-content-section" id="product_offer">
                          <form action="{{route('offer.store')}}" method="POST" class="needs-validation" id="demo1-upload"  novalidate>
                              @csrf
                            <div class="row">
                                <div class="input-group">
                                    <input type="hidden" name="cname" value="cname">
                                </div>
                              <div class="col-md-6 pr-1">
                                  <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                      <div class="input-group date nk-int-st">
                                          <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
                                          <input type="text" class="form-control" name="offer_start_date"  placeholder="يبدأ العرض من"   id="order_start_date">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 pr-1">
                                  <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"><i class="fa  fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" name="offer_end_date" placeholder="ينتهي العرض في" id="offer_end_date">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <select name="SP_Name" class="form-control salesPeople" id="salesPeople">
                                            <option value="none" selected="" disabled="">اسم المندوب</option>
                                            @if(count( $Salespeoples)>0 )
                                                @foreach( $Salespeoples as  $Salespeople)
                                                    <option value="{{ $Salespeople->SP_ID}}">
                                                        {{$Salespeople->SP_first_name}} {{$Salespeople->SP_last_name}}</option>
                                                @endforeach

                                            @endif

                                        </select>
                                    </div>
                                </div>
                              <div class="col-md-4 pr-1">
                                  <div class="form-group">
                                    <select  class=" form-control test " name="cus_name[]" id="c_name" multiple="multiple">


                                    </select>
                                  </div>
                              </div>

                             <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label>حالة العرض</label>
                                  <input type="radio" class="form-check" name="offer_status" value='true' >ساري
                                  <input type="radio" class="form-check" name="offer_status" value='false' >موقف
                              </div>
                         </div>
                            </div>
                        <div class="row">
                                  <div class=" text-center" style="color:#fc6006"><h4>تفاصيل العرض</h4></div>
                                  <div class="input-group">
                                      <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
                                  </div>
                                  <table class=" myTable saleserson_table  hover  table-striped ">
                                      <tbody>
                                      <tr>
                                          <td>
                                              <div class="form-group">

                                                  <select name="offer_category[]" class="form-control dynamic" id="CategoryID"
                                                          data-dependent="Product_name">
                                                      <option  value="0" selected disabled>الصنف</option>
                                                      @if(count($productCategories)>0)
                                                          @foreach($productCategories as $productCategorie )
                                                              <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>
                                                          @endforeach
                                                      @endif
                                                  </select>
                                              </div>

                                          </td>

                                          <td>
                                              <div class="form-group">
                                                  <select name="offer_product[]" class="form-control  dynamic" id="Product_ID"
                                                          data-dependent="Product_ID">
                                                      <option value="0" disabled selected> المنتج</option>
                                                  </select>
                                              </div>
                                          </td>
                                          <td>
                                          <td>
                                              <div class="form-group"  >
                                                  <input name="offer_qty[]" type="number" min="1"  class="form-control" placeholder="الكمية "  id="offer_qty">
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <select name="unit_of_measure[]" class="form-control unite_of_measure " id="unite_of_measure">
                                                      <option value="none" selected="" disabled="">العبوة</option>

                                                  </select>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="form-group">
                                                  <input name="offer_discount[]" type="number" min="0" max="1"  step="0.01"class="form-control" placeholder=" مقدار الخصم"  id="offer_discount" >
                                              </div>
                                          </td>
                                          <td >

                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <div class="form-group" style="width:100%">
                                                  <textarea name="offer_description[]" placeholder="وصف العرض" style=" height:60px ;"></textarea>
                                              </div>
                                          </td>

                                      </tr>
                                      </tbody>
                                  </table>
                                  <div class="forAll_Offer_Section text-center"style=" margin-bottom:20px;" >
                                      <div>
                                          <a href="javascript:void(0);" class="forAll_Offer" >
                                              <div  style=" margin-top:10px; margin-bottom:10px;">
                                                  <h5>  اضافة عرض
                                                      <img src="{{asset('BackOffice-Assets/dist/img/add-icon.png')}}" width="25px" height="25px"/></h5>
                                              </div>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                      <div class="row">
                        <div class="col-md-12 pr-1">
                          <div class="form-group" style="margin-right:37%">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name ="offer_pict" id="offer_pict" autocomplete="on" >
                                <label class="custom-file-label" for="exampleInputFile">اختار صورة</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-lg-12 btn_sub_main">
                                <div class=" btn-submit">
                                    <button type="reset" class="btn btn-info waves-effect waves-light btn_add_in">اضافة عرض جديد </button>
                                  </div>
                                <div class=" btn-submit">
                                  <button type="submit" class="btn btn-info waves-effect waves-light" id="sa-succe">حفظ </button>
                                </div>
                            </div>
                          </div>
                      </form>
                    </div>
                   <!-- _________________________second choice__________________________-->

                   <div class="review-content-section" id="discount_offer">
                    <form action="{{route('offer.store')}}" method="post" class="needs-validation" id="demo1-upload"  novalidate>
                        @csrf
                      <div class="row">
                          <div class="input-group">
                              <input type="hidden" name="cname" value="ctype">
                          </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="offer_start_date" placeholder="يبدأ العرض من"   id="order_start_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                              <div class="input-group date nk-int-st">
                                  <span class="input-group-addon"><i class="fa  fa-calendar"></i>
                                  </span>
                                  <input type="text" class="form-control" name="offer_end_date" placeholder="ينتهي العرض في" id="offer_end_date">
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">

                          <div class="col-md-4 pr-1">
                              <div class="form-group">
                                  <input name="SP_Name" type="text" id="salesPeople" value=" {{'كل المناديب '}}" class="form-control" placeholder="اسم المندوب" readonly  autocomplete="on" >

                              </div>
                          </div>
                       <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <select class=" form-control" name="cus_type" >
                                <optgroup label="نوع العميل">
                                  <option value="سوبر ماركت (جملة)"> سوبر ماركت (جملة)</option>
                                  <option value="سوبر ماركت (تجزئة)">سوبر ماركت (تجزئة)</option>
                                  <option value=" بقالة (جملة)"> بقالة (جملة)</option>
                                  <option value=" بقالة (تجزئة)"> بقالة (تجزئة)</option>
                                  <option value="عميل (جملة)">عميل (جملة)</option>
                                  <option value="عميل (تجزئة)">عميل (تجزئة)</option>
                                </optgroup>
                            </select>
                         </div>
                         </div>
                         <div class="col-md-4 pr-1">
                          <div class="form-group">
                            <label>حالة العرض</label>
                              <input type="radio" class="form-check" name="offer_status" value='true' >ساري
                              <input type="radio" class="form-check" name="offer_status" value='false' >موقف
                          </div>
                         </div>
                      </div>
                  <div class="row">
                            <div class=" text-center" style="color:#fc6006"><h4>تفاصيل العرض</h4></div>
                            <div class="input-group">
                                <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
                            </div>
                            <table class=" myTable saleserson_table  hover  table-striped ">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">

                                            <select name="offer_category[]" class="form-control dynamics" id="CategoryID"
                                                    data-dependent="Product_name">
                                                <option  value="0" selected disabled>الصنف</option>
                                                @if(count($productCategories)>0)
                                                    @foreach($productCategories as $productCategorie )
                                                        <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <select name="offer_product[]" class="form-control  dynamics" id="products_ID"
                                                    data-dependent="Product_ID">
                                                <option value="0" disabled selected> المنتج</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                    <td>
                                        <div class="form-group"  >
                                            <input name="offer_qty[]" type="number" min="1"  class="form-control" placeholder="الكمية "  id="offer_qty">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="unit_of_measure[]" class="form-control unite_of_measure " id="unite_of_measures">
                                                <option value="none" selected="" disabled="">العبوة</option>

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="offer_discount[]" type="number" min="0" max="1"  step="0.01"class="form-control" placeholder=" مقدار الخصم"  id="offer_discount" >
                                        </div>
                                    </td>
                                    <td >

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="width:100%">
                                            <textarea name="offer_description[]" placeholder="وصف العرض" style=" height:60px ;"></textarea>
                                        </div>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <div class="customOffer_Section text-center"style=" margin-bottom:20px;" >
                                <div>
                                    <a href="javascript:void(0);" class="customOffer" >
                                        <div  style=" margin-top:10px; margin-bottom:10px;">
                                            <h5>  اضافة عرض
                                                <img src="{{asset('BackOffice-Assets/dist/img/add-icon.png')}}" width="25px" height="25px"/></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                <div class="row">
                  <div class="col-md-12 pr-1">
                    <div class="form-group" style="margin-right:37%">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name ="offer_pict" id="offer_pict" autocomplete="on" >
                          <label class="custom-file-label" for="exampleInputFile">اختار صورة</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="row">
                      <div class="col-lg-12 btn_sub_main">
                          <div class=" btn-submit">
                              <button type="reset" class="btn btn-info waves-effect waves-light btn_add_in">اضافة عرض جديد </button>
                            </div>
                          <div class=" btn-submit">
                            <button type="submit" class="btn btn-info waves-effect waves-light" id="sa-succe">حفظ </button>
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

<script type="text/javascript">
       $(document).ready(function() {
           $('#multiple-checkboxes').multiselect();
       });
   </script>

@endsection
