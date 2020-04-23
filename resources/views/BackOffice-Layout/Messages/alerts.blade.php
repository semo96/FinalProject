<style>
.alert {
    padding: 15px;
    border: 1px solid transparent;
    border-radius: 4px;
    margin:20px auto;
    width:95%;
}

.alert-success {
    background-color: #dff0d8 !important;
    color:green !important ;
    font-size:16px
}
.alert-danger{
    background-color:rgb(253, 169, 169)!important;
    color:red !important;
    font-size:18px
}
.close_msg {
    font-size: 15px;
   float:left;
}
.alert .close_msg {
    color: black;
    opacity: .2;
    filter: alpha(opacity=20);
}
.alert-dismissable .close_msg {
    position: relative;
    top:0px;
    color: inherit;
}

</style>
<script>
    $(document).ready(function(){
        $(document).on('click','#alert',function(){
            alert('clicked')
        });
    setTimeout(function () {
        var timeout=3000;
        $('#alert').fadeOut('fast');

    },3000);
    })
</script>
<!---    Success Message---->
@if (Session::has('Add_msg'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close_msg" data-dismiss="alert" aria-label="close_msg" >
      <i class="fa fa-close"></i>
    </a>
      <strong>{{Session::get('Add_msg')}}</strong>
  </div>
@endif

@if (Session::has('update_msg'))
  <div class="alert alert-warning alert-dismissible">
    <a href="#" class="close_msg" data-dismiss="alert" aria-label="close_msg" >
      <i class="fa fa-close"></i>
    </a>
      <strong>{{Session::get('update_msg')}}</strong>
  </div>
@endif

<!---    Errors Message---->
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible" id="alert">
      <a href="#" class="close_msg" data-dismiss="alert" aria-label="close_msg" >
        <i class="fa fa-close"></i>
      </a>

        @foreach ($errors->all() as $error)
        <ul>
          <li><strong>{{$error}}</strong></li>
        </ul>
        @endforeach
    </div>
@endif
