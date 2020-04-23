@extends('BackOffice-Layout.Main-Layout.Master_layout1')
@section('page_title',' FeedBack تفاصيل ')
@section('content')
   
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="feedback_card">
              <div class="feedback-card-header">
                <h5 class="FB_title">FeedBack</h5>
              </div>
              <div class="card-body">
                @if (count($Show_cus_FeedBacks)>0)
                  @foreach ($Show_cus_FeedBacks as $customer_FeedBack)
                    <form>
                      <div class="row first-section">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>نوع التغذية الراجعة</label>
                            <input type="text" class="form-control2"  value="{{$customer_FeedBack->Feedback_Subject}}" readonly>
                          </div>
                        </div>
                        <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">رقم التغذية الراجعة</label>
                            <input type="text" class="form-control2" value="{{$customer_FeedBack->Feedback_ID}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row second-section">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>اسم العميل</label>
                            <input type="text" class="form-control2"  value="{{$customer_FeedBack->Cust_first_name}} {{$customer_FeedBack->Cust_last_name}}" readonly>
                          </div>
                        </div>
                        <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>التاريخ</label>
                                     <input type="text" class="form-control2"  value="{{$customer_FeedBack->Feedback_Date}}" readonly>
                                </div>
                         </div>
                         <div class="col-md-12">
                                <div class="txt-area">
                                    <label>نص الرسالة</label>
                                     <textarea name="description" class="form-control2  "  placeholder="{{$customer_FeedBack->Feedback_Message}}" readonly  ></textarea>
                                </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <a href="{{route('respond_feedback')}}" class="btn  btn-block margin-bottom btn_respond" target="_blank"> 
                                 <i class="fa  fa-reply">  </i>رد</a>       
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

@endsection    