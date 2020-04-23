@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','وثائق المندوب')
@section('content')

    <div class="box-feedback clearfix">
        <div class="feedback_title">
            <button href="#" class="  btn_title"> قائمة المناديب </button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="breadcome-heading">
                <form role="search" class="sr-input-func">
                    <input type="text" placeholder="بحث ..." class="search-int form-control">
                    <button><i class="fa fa-search search_icon"></i></button>
                </form>
            </div>
        </div>
        <div>
            <div class="input-group">
                <input type="search" id="searchBox" placeholder="فلترة بواسطة الرقم..." >
            </div>
        </div>
        <table class=" myTable saleserson_table  hover  table-striped ">
            <tbody>
            <tr>
                <th class="table_header">الصورة</th>
                <th class="table_header">اسم المندوب</th>
                <th class="table_header">فواتير ERP</th>
                <th class="table_header">مهام المندوب</th>
                <th class="table_header"> فواتير المبيعات </th>
                <th class="table_header"> فواتير المرتجعات  </th>
            </tr>
            <tr>
                <td class="single-review-st-text">
                    <img src="{{asset('BackOffice-Assets/dist/img/user.png')}}" alt="">
                </td>
                <td class="review-ctn-hf">
                    <h3> خالد علي</h3>

                </td>
                <td >
                    <a href="{{route('SPERBBills.create')}}" target="_blank"><small class="badge badge-info small">فواتير ERP  </small> </a>
                </td>
                <td >
                    <a href=" {{route('sp_tasks')}}" target="_blank"><small class="badge badge-info4 small">مهام المندوب </small> </a>
                </td>
                <td >
                    <a href="{{route('sp_sales_bills')}}" target="_blank"><small class="badge badge-info2 small">فواتير المبيعات </small> </a>
                </td>
                <td >
                    <a href="{{route('sp_return_bills')}}" target="_blank"><small class="badge badge-info3 small">فواتير المرتجعات </small> </a>
                </td>
            </tr>
        </table>



    </div>

@endsection
