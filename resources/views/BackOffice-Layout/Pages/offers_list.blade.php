@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' قائمة العروض ')
@section('content')

    <div class="box clearfix">
        <h3 class="cus_order_list_title">قائمة العروض</h3>
        <div class="search_table"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <form class="form-header" action="{{route('search')}}" method="get" >
                <input class="au-input au-input--xl" type="text" name="search" placeholder="بحث ..." />
                <button class="au-btn--submit" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div>
            <div class="input-group">
                <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
            </div>
        </div>
        <table class="myTable hover table table-striped   " class="col-lg-12 col-md-6 col-sm-3 col-xs-3">
            <thead>
            <tr >
                <th class="table_header">الرقم</th>
                <th class="table_header"> نوع العرض</th>
                <th class="table_header">بدء العرض</th>
                <th class="table_header">انتهاء العرض</th>
                <th class="table_header"> اسم العميل</th>
                <th class="table_header">اسم المندوب</th>
                <th class="table_header"> اسم الصنف</th>
                <th class="table_header"> الكمية</th>
                <th class="table_header"> العبوة</th>
                <th class="table_header"> مقدار الخصم</th>
                <th class="table_header">حالة العرض</th>
                <th class="table_header" >الاجراء</th>
            </tr>
            </thead>
            <tbody>
            @if(count($Offers)>0)
                @foreach($Offers as $offer)
                    <tr>
                        <td>{{$offer->Offer_ID}}</td>
                        <td>{{$offer->Offer_Type}}</td>
                        <td>{{$offer->start_date}}</td>
                        <td>{{$offer->finish_date}}</td>


                            <td>
                                @foreach($offer->customers as $Cus_off)
                                @if($offer->Offer_Type=='كل العملا')
                                    {{$Cus_off->Cust_category}}
                                    @break
                                @else
                                    <ul>
                                     <li>
                                         {{$Cus_off->Cust_first_name}}{{' '}} {{$Cus_off->Cust_last_name}}
                                     </li>
                                    </ul>

                                @endif
                                @endforeach
                            </td>
                            <td>



                                @if($offer->Offer_Type=='كل العملا')
                                    كل المناديب

                                @elseif($offer->Offer_Type=='عملا محددين')
                                    @foreach( $offer->customers as $Cus_off)
                                        @if($Cus_off->Salesperson->SP_ID==$Cus_off->Cust_group_ID)
                                            {{$Cus_off->Salesperson->SP_first_name}}{{' '}}{{$Cus_off->Salesperson->SP_last_name}}
                                            @break
                                        @endif
                                    @endforeach
                                @endif


                        </td>





                        <td colspan="4">
                            {{--                    @foreach($Offer_Details as $Offer_Detail)--}}
                            <table class="myTable hover table table-striped"  class="col-lg-12 col-md-6 col-sm-3 col-xs-3">
                                <tbody>
                                @foreach($offer->Offer_details as $Offer_Detail)

                                        <tr>
                                            <td>{{$Offer_Detail->products->Product_name}}</td>
                                            {{--                     @if($Offer_Detail->OfferID==$offer->OfferID)--}}
                                            {{--                     <td>oasq</td>--}}
                                            <td>{{$Offer_Detail->Quantity}}</td>
                                            <td>{{$Offer_Detail->product_unite_of_measure}}</td>
                                            <td>{{$Offer_Detail->discount}}</td>
                                            {{--                  @endif--}}
                                        </tr>

                                @endforeach

                                </tbody>
                            </table>
                            {{--                    @endforeach--}}
                        </td>


                        <td>{{$offer->Offer_status}}</td>

                        <td >
                            <div class="action_btn">
                                <a href="{{route('offer.edit',$offer->Offer_ID)}}" target="_blank"> <button type="submit" class="btn btn-primary btn-sm botao-controle">
                                        <i class="fa fa-pencil"></i> تعديل
                                    </button></a>
                                <a href="{{route('offer.show',$offer->Offer_ID)}}" target="_blank"><button type="submit" class="btn btn-success btn-sm botao-controle">
                                        <i class="fa fa-file-text" ></i> عرض
                                    </button></a>
                                <form action="{{route('offer.index')}}" method="get">
                                    @csrf
                                    <a href=" "><button type="submit" value="{{$offer->Offer_ID}}" name="delete_ID" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash-o"></i> حذف
                                        </button></a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>


@endsection
