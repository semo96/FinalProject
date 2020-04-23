@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' بيانات المناديب')
@section('content')

    <div class="box clearfix">
        <h3 class="cus_order_list_title">بيانات مناديب المبيعات</h3>
        <div class="search_table" >
            <form class="form-header" action="{{route('searchSP')}}" method="get" role="searchSP">
                @csrf
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
        <table class="myTable table hover table table-striped ">
            <thead>
            <tr >
                <th class="table_header">الرقم</th>
                <th class="table_header">الاسم الاول</th>
                <th class="table_header">الاسم الثاني </th>
                <th class="table_header">النوع</th>
                <th class="table_header"> سقف المندوب</th>
                <th class="table_header">الحالة </th>
                <th class="table_header">العنوان</th>
                <th class="table_header">اسم المشرف</th>
                <th class="table_header">اسم المستخدم</th>
                <th class="table_header">كلمة المرور </th>
                <th class="table_header" >رقم الهاتف</th>
                <th class="table_header" >الايميل</th>
                <th class="table_header" >رقم مجموعة العملاء</th>

            </tr>
            </thead>
            <tbody>
            @if(count($s_datas)>0)
            @foreach($s_datas as $s_data)
                <tr>
                    <td>{{$s_data->SP_ID}}</td>
                    <td>{{$s_data->SP_first_name}}</td>
                    <td>{{$s_data->SP_last_name}}</td>
                    <td>{{$s_data->SP_Type}}</td>
                    <td>{{$s_data->SP_max_indebtedness}}</td>
                    <td>{{$s_data->SP_status}}</td>
                    @if(count($s_data->SalespersonAddress)>0)
                    <td>
                        @foreach($s_data->SalespersonAddress as $Salesperson_addres)

                        {{$Salesperson_addres->SP_Add_name}}

                            @endforeach
                    </td>
                        @else
                        <td>لا يوجد</td>
                    @endif
                    <td>{{$Supdervisore->sup_first_name}}{{' '}}{{$Supdervisore->sup_last_name}}</td>
                    <td>{{$s_data->SP_username}}</td>
                    <td>{{$s_data->SP_Password}}
                    @if(count($s_data->salespersonContact)>0)
                    <td>
                        <ol>
                        @foreach($s_data->salespersonContact as $Salesperson_contact)


                           <li>{{$Salesperson_contact->phone_number}}</li>


                        @endforeach
                        </ol>
                     </td>
                    <td>
                        <ol>
                        @foreach($s_data->salespersonContact as $Salesperson_contact)

                              <li> {{$Salesperson_contact->email_address}}</li>

                            @endforeach
                        </ol>
                    </td>
                        @else
                        <td>لا يوجد</td>
                        <td>لا يوجد</td>
                    @endif
                    <td>{{$s_data->SP_ID}}</td>
                </tr>
            @endforeach
                     @endif

            </tbody>
        </table>
    </div>


@endsection
