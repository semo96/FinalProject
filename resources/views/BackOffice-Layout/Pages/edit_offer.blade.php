@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تعديل عرض')
@section('content')
    <script>
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var customOffer = $('.customOffer');
            var wrapper2 = $('.customOffer_Section');




            var x = 1; //Initial field counter is 1
            //add new address
            $(customOffer).click(function(){
                if(x < maxField){
                    var Custom_Offerfield =' <table class=" myTable saleserson_table  hover  table-striped ">\n' +
                        '                                <tbody>\n' +
                        '                                  <tr>\n' +
                        '                                      <td>\n' +
                        '                                          <div class="form-group">\n' +
                        '\n' +
                        '                                              <select name="offer_category[]" class="form-control dynamics1" id="CategoryID"\n' +
                        '                                                      data-dependent="Product_name">\n' +
                        '                                                  <option  value="0" selected >الصنف</option>\n' +
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
                        '                                              <select name="offer_product[]" class="form-control  dynamics1" id="Product_IDs1">\n'+
                        '                                                  <option value="0"  selected> المنتج</option>\n' +
                        '                                              </select>\n' +
                        '                                          </div>\n' +
                        '                                      </td>\n' +
                        '                                      <td>\n' +
                        '                                    <td>\n' +
                        '                                      <div class="form-group"  >\n' +
                        '                                        <input name="offer_qty[]" type="number" min="1" class="form-control" placeholder="الكمية " required id="offer_qty">\n' +
                        '                                      </div>\n' +
                        '                                    </td>\n' +
                        '                                    <td>\n' +
                        '                                      <div class="form-group">\n' +
                        '                                        <select name="unit_of_measure[]" class="form-control unite_of_measure0 " id="unite_of_measures1">\n' +
                        '                                          <option value="none" selected="" ="">العبوة</option>\n' +
                        '\n' +
                        '                                        </select>\n' +
                        '                                      </div>\n' +
                        '                                    </td>\n' +
                        '                                    <td>\n' +
                        '                                      <div class="form-group">\n' +
                        '                                        <input name="offer_discount[]" type="number"  min="0" max="1"  step="0.01"  class="form-control" placeholder=" مقدار الخصم"  id="offer_discount" >\n' +
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
            var i=1;

            $(document).on('change','.dynamic1',function()
            {
                var value = $(this).val();
                var text=$(this).attr("name");
                console.log(i);
                console.log(text);
                var _token = $('input[name="_token"]').val();
                console.log(_token);
                var op=" ";


                if (text == "offer_category[]"){

                    $.ajax({

                        url: '{{ route('fetch_product') }}',
                        type: 'POST',
                        data: {'value': value, '_token': _token},
                        success: function (data) {
                            console.log("success");
                            console.log(data);
                            $("#Product_ID1").html(" ");
                            op += '<option value="0" selected >المنتج</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                            }
                            $("#Product_ID1" ).append(op);

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
                            $("#unite_of_measure1").html(" ");
                            op += '<option value="0" selected >العبوة</option>';
                            for (var i = 0; i < data.length; i++) {

                                op += '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                                op += '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                                op += '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                            }
                            $("#unite_of_measure1").append(op);
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
            $(document).on('change','.dynamic2',function()
            {
                var value = $(this).val();
                var text=$(this).attr("name");
                console.log(i);
                console.log(text);
                var _token = $('input[name="_token"]').val();
                console.log(_token);
                var op=" ";


                if (text == "offer_category[]"){

                    $.ajax({

                        url: '{{ route('fetch_product') }}',
                        type: 'POST',
                        data: {'value': value, '_token': _token},
                        success: function (data) {
                            console.log("success");
                            console.log(data);
                            $("#Product_ID2").html(" ");
                            op += '<option value="0" selected >المنتج</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                            }
                            $("#Product_ID2" ).append(op);

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
                            $("#unite_of_measure2").html(" ");
                            op += '<option value="0" selected >العبوة</option>';
                            for (var i = 0; i < data.length; i++) {

                                op += '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                                op += '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                                op += '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                            }
                            $("#unite_of_measure2").append(op);
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
            $(document).on('change','.dynamics1',function(){
                var value = $(this).val();
                var text=$(this).attr("name");
                console.log(i);
                console.log(text);
                var _token = $('input[name="_token"]').val();
                console.log(_token);
                var op=" ";


                if (text == "offer_category[]"){

                    $.ajax({

                        url: '{{ route('fetch_product') }}',
                        type: 'POST',
                        data: {'value': value, '_token': _token},
                        success: function (data) {
                            console.log("success");
                            console.log(data);
                            $("#Product_IDs1").html(" ");
                            op += '<option value="0" selected >المنتج</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].Product_ID + '" >' + data[i].Product_name + '</option>';
                            }
                            $("#Product_IDs1" ).append(op);

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
                            $("#unite_of_measures1").html(" ");
                            op += '<option value="0" selected >العبوة</option>';
                            for (var i = 0; i < data.length; i++) {

                                op += '<option value="' + data[i].Primary_unite + '" >' + data[i].Primary_unite + '</option>';
                                op += '<option value="' + data[i].Secondary_unite + '" >' + data[i].Secondary_unite + '</option>';
                                op += '<option value="' + data[i].Mid_unite + '" >' + data[i].Mid_unite + '</option>';
                            }
                            $("#unite_of_measures1").append(op);
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
        (function($) {
            $(function() {
                $('.test').fSelect();
        // $(document).ready(function () {
            $(document).on('click','input[type=radio][name=offer_type]',function() {

                if (this.value == 'false') {
                    var op1=" ";
                    varop2="";
                    var ctrl = $(this).find('#salesPeople');
                    $('#salesPeople').replaceWith('<input name="SP_Name" type="text" id="salesPeople" value="كل المناديب" class="form-control" placeholder="اسم المندوب" readonly  autocomplete="on" >\n');
                    $('#cus_type').html(" ");
                    $('#cus_type').attr('name','cus_type');
                    // op1 += '<option value="0" selected >نوع العميل</option>';

                    op1 += '<option value="سوبر ماركت (جملة)"> سوبر ماركت (جملة)</option>';
                    op1 +='<option value="سوبر ماركت (تجزئة)">سوبر ماركت (تجزئة)</option>';
                    op1 +='<option value=" بقالة (جملة)"> بقالة (جملة)</option>';
                    op1 +='<option value=" بقالة (تجزئة)"> بقالة (تجزئة)</option>';
                    op1 +='<option value="عميل (جملة)">عميل (جملة)</option>';
                    op1 +=' <option value="عميل (تجزئة)">عميل (تجزئة)</option>';
                    $('#cus_type').append(op1);
                    $('.test').fSelect('reload');

                }
                else if (this.value == 'true') {
                    var op1='';
                    var op2='';
                    var ctrl = $(this).find('#salesPeople');
                    if( ctrl.is('input') ) {
                        $('#salesPeople').replaceWith('<select name="SP_Name" class="form-control salesPeople " id="salesPeople">');
                        op2 += '<option value="0" selected >اسم المندوب</option>';
                        $('#salesPeople').append(op2);
                    }
                    $('#cus_type').html(" ");
                    $('#cus_type').attr('name','cus_name[]');
                    op1 += '<option value="0" selected >اسم العميل</option>';
                    $('#cus_type').append(op1);
                    $('#salesPeople').replaceWith('<select name="salesPeople" class="form-control salesPeople" id="salesPeople">');
                    $('#salesPeople').append(op2);

                    console.log("ok sir");
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: '{{ route('fetch_salsepepoles') }}',
                        type: 'POST',
                        data: {'_token': _token},
                        success: function (data) {
                            console.log("success");
                            console.log(data);
                            $("#salesPeople").html(" ");
                            op2 += '<option value="0" selected >اسم المندوب</option>';
                            for (var i = 0; i < data.length; i++) {
                                op2 += '<option value="' + data[i].SP_ID + '" >' + data[i].SP_first_name +'  '+data[i].SP_last_name + '</option>';
                            }
                            $("#salesPeople").append(op2);

                        },
                        error: function () {
                            console.log("error");
                        }


                    })

                }
            });
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
                        $('#cus_type').html(" ");
                        // op += '<option value="0" selected >اسم العميل</option>';
                        for (var i =0; i< data.length;i++){
                            op += '<option value="' + data[i].Customer_ID + '" >' + data[i].Cust_first_name +'  '+data[i].Cust_last_name + '</option>';
                        }
                        $("#cus_type").append(op);
                        $('.test').fSelect('reload');

                    },
                    error: function () {
                        console.log("error");
                    }


                })
            })
        });
            })(jQuery);


    </script>
    <!-- Single pro tab review Start-->
    @include('BackOffice-Layout.Messages.alerts')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <h4 id="form_title"> تعديل عرض </h4>
                        <div id="myTabContent" class="tab-content custom-order-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div  class="pro-ad">
                                                @if(count($offers)>0)
                                                    @foreach($offers as $offer)
                                                        <form action="{{route('offer.update',$offer->Offer_ID)}}" method="post" class="needs-validation" id="demo1-upload"   enctype="multipart/form-data" novalidate>
                                                            @csrf
                                                            <div class="row">
                                                                <div class="input-group">
                                                                    <input type="hidden" value="put" name="_method"/>
                                                                </div>
                                                                <div class="col-md-4 pr-1">
                                                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                                                        <div class="input-group date nk-int-st">
                                                                            <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
                                                                            <input type="text" class="form-control"  value="{{$offer->start_date}}" name="offer_start_date" placeholder="يبدأ العرض من"   id="order_start_date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 pr-1">
                                                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                                                        <div class="input-group date nk-int-st">
                                      <span class="input-group-addon"><i class="fa  fa-calendar"></i>
                                      </span>
                                                                            <input type="text" class="form-control" name="offer_end_date" value="{{$offer->finish_date}}" placeholder="ينتهي العرض في" id="offer_end_date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 pr-1">
                                                                    <div class="form-group">
                                                                        <label>نوع العرض</label>
                                                                        <input type="radio" class="form-check" name="offer_type" value="true" {{ ($offer->Offer_Type=="عملا محددين")? "checked" : "" }}  >لعميل محدد
                                                                        <input type="radio" class="form-check" name="offer_type" value="false" {{ ($offer->Offer_Type=="كل العملا")? "checked" : "" }} >كل العملا
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                @if($offer->Offer_Type=="عملا محددين")

                                                                        <div class="col-md-4 pr-1">
                                                                            <div class="form-group">

                                                                                <select name="cus_name[]" class="form-control test" id="cus_type" multiple="multiple">
                                                                                    @foreach($offer->customers as $Cus_off)
                                                                                    <option value="{{$Cus_off->Customer_ID}}" selected="" >{{$Cus_off->Cust_first_name}}{{' '}} {{$Cus_off->Cust_last_name}}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>



                                                                        <div class="col-md-4 pr-1">
                                                                            <div class="form-group">
                                                                                <select name="SP_Name" class="form-control salesPeople" id="salesPeople">
                                                                                    @foreach($Salespeoples as $Salespeople)
                                                                                        @if($Salespeople->SP_ID==$Cus_off->Cust_group_ID)
                                                                                            <option value="{{$Salespeople->SP_ID}} "selected="" >{{$Salespeople->SP_first_name}}{{' '}}{{$Salespeople->SP_last_name}}</option>
                                                                                        @endif
                                                                                        <option value="{{$Salespeople->SP_ID}}">{{$Salespeople->SP_first_name}}{{' '}}{{$Salespeople->SP_last_name}}</option>

                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>





                                                                @else

                                                                    @foreach($offer->customers as $Cus_off)
                                                                        <div class="col-md-4 pr-1">
                                                                            <div class="form-group">
                                                                                <select name="cus_type" class="form-control test " id="cus_type" multiple="multiple">

                                                                                    <option value="{{$Cus_off->Cust_category}}" selected="" >{{$Cus_off->Cust_category}} </option>
                                                                                    <option value="سوبر ماركت (جملة)"> سوبر ماركت (جملة)</option>
                                                                                    <option value="سوبر ماركت (تجزئة)">سوبر ماركت (تجزئة)</option>
                                                                                    <option value=" بقالة (جملة)"> بقالة (جملة)</option>
                                                                                    <option value=" بقالة (تجزئة)"> بقالة (تجزئة)</option>
                                                                                    <option value="عميل (جملة)">عميل (جملة)</option>
                                                                                    <option value="عميل (تجزئة)">عميل (تجزئة)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4 pr-1">
                                                                            <div class="form-group">
                                                                                <input name="SP_Name" type="text" id="salesPeople" value=" {{'كل المناديب '}}" class="form-control" placeholder="اسم المندوب" readonly  autocomplete="on" >
                                                                            </div>
                                                                        </div>
                                                                        @break
                                                                    @endforeach


                                                                @endif

                                                                <div class="col-md-4 pr-1">
                                                                    <div class="form-group">
                                                                        <label>حالة العرض</label>
                                                                        <input type="radio" class="form-check" name="offer_status" value="true" {{ ($offer->Offer_status=="1")? "checked" : "" }}  >ساري
                                                                        <input type="radio" class="form-check" name="offer_status"   value="false" {{ ($offer->Offer_status=="0")? "checked" : "" }} >موقف
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if(count($Offer_Details)>0)
                                                                @foreach($Offer_Details as $key =>$Offer_Detail)

                                                                    <div class="row">
                                                                        <div class=" text-center" style="color:#fc6006"><h4>تفاصيل العرض</h4></div>
                                                                        <div class="input-group">
                                                                            <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
                                                                        </div>
                                                                        <table class=" myTable saleserson_table  hover  table-striped ">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    @if(count($productCategories)>0)

                                                                                        <div class="form-group">
                                                                                            <select name="offer_category[]" class="form-control dynamic{{ $loop->iteration }}" id="CategoryID"
                                                                                                    data-dependent="Product_name">
                                                                                                @foreach($productCategories as $productCategorie )
                                                                                                    @if($productCategorie->Category_ID==$Offer_Detail->CategoryID)
                                                                                                        <option  value="{{$productCategorie->Category_ID}}" selected >{{$productCategorie->Category_name}}</option>
                                                                                                    @else
                                                                                                        <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                {{--                                                            <option value="{{$productCategorie->Category_ID}}">{{$productCategorie->Category_name}}</option>--}}

                                                                                            </select>
                                                                                        </div>

                                                                                    @endif
                                                                                </td>

                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <select name="offer_product[]" class="form-control  dynamic{{ $loop->iteration }}" id="Product_ID{{ $loop->iteration }}"
                                                                                                data-dependent="Product_ID">
                                                                                            <option value="{{$Offer_Detail->ProductID}}" selected> {{$Offer_Detail->products->Product_name}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                <td>
                                                                                    <div class="form-group"  >
                                                                                        <input name="offer_qty[]" type="number" min="1" class="form-control" value="{{$Offer_Detail->Quantity}}" placeholder="الكمية " required id="offer_qty">
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <select name="unit_of_measure[]" class="form-control unite_of_measure " id="unite_of_measure{{ $loop->iteration }}">
                                                                                            <option value="{{$Offer_Detail->product_unite_of_measure}}" selected="">{{$Offer_Detail->product_unite_of_measure}}</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <input name="offer_discount[]" type="number"  min="0" max="1"  step="0.01" class="form-control" value="{{$Offer_Detail->discount}}" placeholder=" مقدار الخصم"  id="offer_discount" >
                                                                                    </div>
                                                                                </td>
                                                                                <td >

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-group" style="width:100%">
                                                <textarea name="offer_description[]" placeholder="وصف العرض" style=" height:60px ;">
                                                    {{$Offer_Detail->Offer_desc}}
                                                </textarea>
                                                                                    </div>
                                                                                </td>

                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        @endforeach
                                                                        @endif
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiple-checkboxes').multiselect();
        });
    </script>

@endsection
