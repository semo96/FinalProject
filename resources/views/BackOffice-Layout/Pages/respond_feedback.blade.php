@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' FeedBack الرد على ')
@section('content')

        <div class="row">
          <div class="col-md-3">
             <a href="#" class="btn   feedbackresponse2" disable style="  width: 100%; background: #009efb;color: white;">الرد على FeedBack </a>
  
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">القوائم</h3>
  
                <div class="box-tools" style="margin-top:10px;">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="{{route('feedback.index')}}" target="_blank"><i class="fa fa-envelope-o"></i>قائمة  FeedBack</a></li>
                  <li><a href="{{route('customer.index')}}" target="_blank"><i class="fa fa-group"></i> قائمة العملاء</a></li>
                </ul>
              </div>
              <!-- /.box-body -->
            </div>
  
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">ارسال رسالة</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <input class="form-control" placeholder="الى:" readonly>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="العنوان">
                </div>
                <div class="form-group">
                      <textarea class="form-control" style="height: 300px;  text-align:right;" placeholder="نص الرسالة">
       
                      </textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right btn_area">
                  <button type="submit" class="btn btn-primary btn_send"><i class="fa fa-envelope-o"></i>ارسال </button>
                </div>
                <button type="reset" class="btn  btn_delete"><i class="fa fa-times"></i> حذف</button>
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
@endsection    