@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','ERP  عرض فواتير')
@section('content')

    <div class="box-feedback clearfix">
        <div class="feedback_title">
            <button href="#" class="  btn_title">فواتير  ERP </button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="breadcome-heading">
                <form role="search" class="sr-input-func">
                    <input type="text" placeholder="بحث ..." class="search-int form-control">
                    <button><i class="fa fa-search search_icon"></i></button>
                </form>
            </div>
        </div>
        <div class="input-group">
            <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
        </div>

        <table class=" myTable saleserson_table  hover  table-striped ">
            <tbody>
            <tr>
                <th class="review-item-rating "> <i class="fa  fa-file-text-o"></i>  </th>
                <th>فاتورة </th>
                <th>الرقم</th>
                <th>التاريخ</th>
                <th >الحالة</th>
                <th style="padding-right:70px">الاجراء</th>
            </tr>
            @if(count($s_bills)>0 )
                @foreach ($s_bills as $s_bill)
                    <tr>

                        <td class="review-item-rating ">
                            <i class="fa  fa-file-text-o"></i>
                        </td>
                        <td class="review-ctn-hf">
                            <h3>فاتورة</h3>
                        </td>
                        <td class="review-ctn-hf">
                            <h5>{{$s_bill->Bill_ID}}</h5>
                        </td>
                        <td>
                            <h5>{{$s_bill->Bill_Issuing_Date}}</h5>
                        </td>
                        <td >
                            <a href="#"><small class="badge small-approve small">    تم فتحها </small> </a>
                        </td>
                        <td class="  btn-view ">
                            <a href="{{route('sp_erp_bills_details')}}" target="_blank"><button class="btn-view-p  ">   عرض</button> </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>



    </div>

@endsection
