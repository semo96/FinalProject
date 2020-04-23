@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title','تعديل الملف الشخصي')
@section('content')

    <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="cus_order_list_title">تعديل الملف الشخصي</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">اسم المستخدم</label>
                        <input type="text" class="form-control" placeholder="اسم المستخدم">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                    <div class="form-group">
                        <label> كلمة السر</label>
                        <input type="password" class="form-control" placeholder="كلمة السر" value="">
                      </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>  تأكيد كلمة السر</label>
                        <input type="password" class="form-control" placeholder="تأكيد كلمة السر" value="">
                      </div>
                   </div>
                   <div class="col-md-6 pr-1">
                      <div class="fm-checkbox">
                          <label><input type="checkbox" checked="true" class="i-checks" id="check_box"> <i></i>تذكر كلمة السر</label>
                      </div>
                    </div>  
                   </div>
                   <div class="row">
                    <div class="col-lg-12 btn_sub_main">
                        <div class=" btn-submit">
                          <button type="submit" class="btn btn-info waves-effect waves-light" >حفظ </button>
                        </div>
                        <div class=" btn-submit">
                            <button type="submit" class="btn btn-info waves-effect waves-light" >الغاء </button>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image"> <!-- Main content -->

                <img src="{{asset('BackOffice-Assets/dist/img/bg5.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{asset('BackOffice-Assets/dist/img/user.png')}}" alt="...">
                    <h5 class="title">علي محمد</h5>
                  </a>
                </div>
                <p class="description text-center">
                   <strong>مشرف مناديب</strong>
                  <br> تاريخ الانظمام للشركة  
                  <br> 14/7/2015  
                </p>
              </div>
              <hr>
    
            </div>
          </div>
        </div>
      </div> 

@endsection    