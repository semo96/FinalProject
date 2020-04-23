@extends('AdminPanel-Layout.Main-Layout.Master_Layout')
@section('page_title','تعديل صلاحية')
@include('AdminPanel-Layout.Messages.alerts')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon page_title_p">
                       <img width="42" class="rounded-circle" src="{{asset('Admin-Assets/assets/images/user.png')}}" alt="" >
                    </div>
                    <div class=" page_title_p" > تعديل صلاحية</div>
                </div>  
             </div>
        </div>           
         <div class="main-card mb-3 card">
            <div class="card-body">
            @foreach($Edited_roles as $Edited_role)  
                <form class="needs-validation" action="{{route('SV_Role.update',$Edited_role->Role_ID)}}" method="post" role="form" novalidate>
				{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method"/>
                    <div class="form-row">
                        <div class="col-md-12 mb-6">
                            <label for="validationCustom01">اسم الصلاحية</label>
                            <input type="text" class="form-control" name="role_name" id="validationCustom01" value="{{$Edited_role->Role_name }}" required>
                            <div class="invalid-feedback">
                               ادخل اسم الصلاحية
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">
                            <label for="validationCustom01"> الوصف</label>
                            <input type="text" class="form-control" name="role_desc" id="validationCustom01" value="{{$Edited_role->Role_description}}" required><br>
                            <div class="invalid-feedback">
                             اضف وصفا للصلاحية الممنوحة
                            </div>
                        </div>           
                    </div>

                 <button class="btn btn-primary" type="submit" style="float:left; margin-left:20px;" >تعديل</button>

                </div>
                </form>
           @endforeach
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
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