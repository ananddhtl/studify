@include('agent.header')

<div class="container">
<div class="row">
<div class="box">
<div class="col-sm-6" id="sms">
   <h1 style="font-size: 18px; padding: 10px;">Role Info</h1>

   @if($editRole !='')
 <form method="POST" action="{{url('agent/update-role-features')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
   @csrf

       <input type="hidden" name="id" value="{{$editRole->id}}">

                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$editRole->name}}" placeholder="Name">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Phone Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$editRole->phone}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid" value="{{$editRole->email}}" placeholder="Email">
                                     </div>
                                      
                                
                               </div>
                               <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Role</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="role" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$editRole->role}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Country</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="country" class="form-select" aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->name}}"  {{$countries->name == $editRole->country ? "selected" : "" }}>{{$countries->name}}</option>
                                       @endforeach
                                      </select>                                                                                <!--end::Input-->
                                    </div>
                                    
                                </div>
                                <br>
                               
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
                           
                           
</div>
<div class="col-sm-6" id="sms1">
 <h2 class="fw-bolder text-dark">Roles & Premission</h2>
  <br>
  <div class="fv-row mb-10" id="mang">
                                    <!--begin::Label-->
 <div class="fv-row mb-5">
 @php 
 $array = (explode(",",$editRole->rolefeatures));
 
 $strreplace = preg_replace('/[^A-Za-z0-9\-]/', '',  $array);

 @endphp
 

@if(array_search("managesms",$strreplace)!='')
<label class="chek">SMS
  <input name="rolefeatures[]" value="managesms" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">SMS
  <input name="rolefeatures[]" value="managesms" type="checkbox">
  <span class="checkmark"></span>
</label>
@endif
@if(array_search("managedocument",$strreplace)!='')
<label class="chek">Manage Documents
  <input name="rolefeatures[]" value="managedocument" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Manage Documents
  <input name="rolefeatures[]" value="managedocument" type="checkbox">
  <span class="checkmark"></span>
</label>
@endif
@if(array_search("manageemail",$strreplace)!='')
<label class="chek">Email Integration
  <input name="rolefeatures[]" value="manageemail" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Email Integration
  <input name="rolefeatures[]" value="manageemail" type="checkbox">
  <span class="checkmark"></span>
</label>
@endif

@if(array_search("managecalender",$strreplace)!='')
 <label class="chek">Calendar
  <input name="rolefeatures[]" value="managecalender"  type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Calendar
  <input name="rolefeatures[]" value="managecalender"  type="checkbox">
  <span class="checkmark"></span>
</label>
@endif
</div>

  <div class="fv-row mb-5">
  @if(array_search("managetask",$strreplace)!='')
<label class="chek">Tasks
  <input name="rolefeatures[]" value="managetask" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Tasks
  <input name="rolefeatures[]" value="managetask" type="checkbox">
  <span class="checkmark"></span>
</label>
@endif

@if(array_search("managelead",$strreplace)!='')
<label class="chek">Lead Manager
  <input name="rolefeatures[]" value="managelead" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Lead Manager
  <input name="rolefeatures[]" value="managelead" type="checkbox">
  <span class="checkmark"></span>
</label>
@endif

@if(array_search("managesupport",$strreplace)!='')
<label class="chek">Support
  <input name="rolefeatures[]" value="managesupport" type="checkbox" checked>
  <span class="checkmark"></span>
</label>
@else
<label class="chek">Support
  <input name="rolefeatures[]" value="managesupport" type="checkbox">
  <span class="checkmark"></span>
</label>

@endif
</div>
                               
</div>
</div>


</div>

<div class="col-lg-12">
 <button type="submit" class="Package1">Submit</button>
 <br>
 <br>
</div>
 </form>
@else
<form method="POST" action="{{url('agent/add-role-features')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
   @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="name" id="first_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Name">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Phone Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="">
                                                                                <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid" value="" placeholder="Email">
                                     </div>
                                      <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Password</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <input type="password" id="pwd" name="password" minlength="8" class="form-control form-control-lg form-control-solid" value="" placeholder="Password">
                                     </div>
                                
                               </div>
                               <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Role</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="role" id="first_name" class="form-control form-control-lg form-control-solid" value="e.g.:Manage">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Country</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" id="country" name="country" aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->name}}">{{$countries->name}}</option>
                                       @endforeach
                                      </select>                                                                                <!--end::Input-->
                                    </div>
                                    
                                </div>
                                <br>
                               
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
                           
                           
</div>
<div class="col-sm-6" id="sms1">
 <h2 class="fw-bolder text-dark">Roles & Premission</h2>
  <br>
  <div class="fv-row mb-10" id="mang">
                                    <!--begin::Label-->
 <div class="fv-row mb-5">
 
<label class="chek">SMS
  <input name="rolefeatures[]" value="managesms" type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="chek">Manage Documents
  <input name="rolefeatures[]" value="managedocument" type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="chek">Email Integration
  <input name="rolefeatures[]" value="manageemail" type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="chek">Calendar
  <input name="rolefeatures[]" value="managecalender"  type="checkbox">
  <span class="checkmark"></span>
</label>
</div>

  <div class="fv-row mb-5">

<label class="chek">Tasks
  <input name="rolefeatures[]" value="managetask" type="checkbox">
  <span class="checkmark"></span>
</label>

<label class="chek">Lead Manager
  <input name="rolefeatures[]" value="managelead" type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="chek">Support
  <input name="rolefeatures[]" value="managesupport" type="checkbox">
  <span class="checkmark"></span>
</label>
</div>

                                    <!--end::Label-->
                                    <!--begin::Input-->
 




                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                   
                                    <!--end::Notice-->
                               
</div>
</div>


</div>

<div class="col-lg-12">
 <button type="submit" class="Package1">Submit</button>
 <br>
 <br>
</div>
 </form>
 @endif
</div>
</div>
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/main.js')}}"></script>


    <script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>


</body>

</html>
<script>
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
          
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/status/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>
<script>
  var expanded = false;
  function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}</script>


<script>
  var expanded = false;
  function showCheckboxes1() {
  var checkboxes1 = document.getElementById("checkboxes1");
  if (!expanded) {
    checkboxes1.style.display = "block";
    expanded = true;
  } else {
    checkboxes1.style.display = "none";
    expanded = false;
  }
}</script>
<script>
  var expanded = false;
  function showCheckboxes2() {
  var checkboxes2 = document.getElementById("checkboxes2");
  if (!expanded) {
    checkboxes2.style.display = "block";
    expanded = true;
  } else {
    checkboxes2.style.display = "none";
    expanded = false;
  }
}</script>
<script type="text/javascript">
$(document).ready(function () {
  $("#Second").hide();
    $("#firstbutton").click(function () {
        $("#First").show();
         $("#Second").hide();
    });
});

$(document).ready(function () {
 $("#secondbutton").click(function () {
  $("#Second").show();
        $("#First").hide();
         
    });
});
</script>

