<style>

.alert{
  margin-right:70px ;
  margin-left:70px ;
  margin-top:100px;
  text-align:right;
}

.close {
    display:inline-block;
    padding:2px 5px;
    background:#ccc;
    font-size: 15px;
   float:left;
}


.close :focus{
   display:none;
  
}
.close:not(:disabled):not(.disabled) {
    cursor: pointer;
}

</style>


<!---    Success Message---->
@if (Session::has('Add_msg'))
  <div class="alert alert-success  alert-dismissible" role="alert"> 
  <button type="button" class="close" aria-label="Close" onclick='$(this).parent().hide();'><span aria-hidden="true">×</span></button>
  <strong>{{Session::get('Add_msg')}}</strong>
     
  </div>
     
@endif

@if (Session::has('update_msg'))
 
     <div class="alert alert-success  alert-dismissible" role="alert">
     <button type="button" class="close" aria-label="Close" onclick='$(this).parent().hide();'><span aria-hidden="true">×</span></button>
       <strong>{{Session::get('update_msg')}}</strong>
     </div>
@endif  


<!--Confirmation Password  -->
@if (Session::has('pass_alert'))
 
     <div class="alert alert-danger  alert-dismissible" role="alert">
     <button type="button" class="close" aria-label="Close" onclick='$(this).parent().hide();'><span aria-hidden="true">×</span></button>
       <strong>{{Session::get('pass_alert')}}</strong>
     </div>
@endif 


<!--error  -->
@if (Session::has('error'))
 
     <div class="alert alert-danger  alert-dismissible" role="alert">
     <button type="button" class="close" aria-label="Close" onclick='$(this).parent().hide();'><span aria-hidden="true">×</span></button>
       <strong>{{Session::get('error')}}</strong>
     </div>
@endif 


<!---    Errors Message---->
  @if(count($errors)>0)
   
  <div class="alert alert-danger  alert-dismissible" role="alert">
  <button type="button" class="close" aria-label="Close" onclick='$(this).parent().hide();'><span aria-hidden="true">×</span></button>
        @foreach ($errors->all() as $error)
        <ul>
          <li><strong>{{$error}}</strong></li>
        </ul>  
        @endforeach
   </div>
  @endif 