@include('layout.admin.header')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Packages</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
<div class="row">
<div class="box">
<div class="col-sm-6" id="sms">
   <h1 style="font-size: 18px; padding: 10px;"> Package Info</h1>
   @if($package)
<form method="POST" action="{{url('admin/add-package-features')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                               @csrf

                               <input type="hidden" name="id" value="{{$package->id}}">
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Package Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="package_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$package->package_name}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Package Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_title" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$package->package_title}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-6">
                                     <label class="form-label required">Package Subtitle</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_subtitle" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$package->package_subtitle}}">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                       <div class="col-6">
                                     <label class="form-label required">Package monthly Price</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_monthly" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$package->package_monthly}}">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                
                               </div>
                               <div class="row fv-row mb-10">

                                    <div class="col-6">
                                     <label class="form-label required">Package yearly Price</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_yearly" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$package->package_yearly}}">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                    <!--end::Label-->
                                   
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                      
                                                                       
                                    <!--end::Input-->
                                    
                                </div>
                                <br>
                               
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
          @php 
          $packagefeature = App\Models\addPackage::where(['package_id' => $id])->get();
          $feature = array();
          @endphp
      
          <?php  
           foreach($packagefeature as $packagefeature){
          array_push($feature,$packagefeature->package_feature);
           }
          
          ?>
        
        @php
        $strreplace = preg_replace('/[^A-Za-z0-9\-]/', '',  $feature);
        @endphp  

      
</div>
<div class="col-sm-6" id="sms1">

 <h2 class="fw-bolder text-dark">Package & Permission</h2>
  <br>
  <div class="fv-row mb-10" id="mang">
                                    <!--begin::Label-->
 <div class="fv-row mb-5">
 @if(array_search("sms",$strreplace)!='')
  <input id="checkbox" value="sms" name="features[]" type="checkbox" checked/>
  <label for="checkbox"> SMS Integration</label>
  <br>
  @else
  <input id="checkbox" value="sms" name="features[]" type="checkbox" />
  <label for="checkbox"> SMS Integration</label>
  <br>
  @endif
  @if(array_search("email",$strreplace)!='')
  <input id="checkbox" value="email" name="features[]"type="checkbox" checked />
  <label for="checkbox"> Email Integration</label>
  <br>
  @else
  <input id="checkbox" value="email" name="features[]"type="checkbox" />
  <label for="checkbox"> Email Integration</label>
  <br>
  @endif
  @if(array_search("calender",$strreplace)!='')
  <input id="checkbox" value="calender" name="features[]" type="checkbox" checked/>
  <label for="checkbox"> Calendar</label>
  <br>
@else
<input id="checkbox" value="calender" name="features[]" type="checkbox" />
  <label for="checkbox"> Calendar</label>
  <br>
@endif

  @if(array_search("task",$strreplace)!='')
  <input id="checkbox" value="task" name="features[]" type="checkbox" checked/>
  <label for="checkbox"> Tasks</label>
  <br>
@else
<input id="checkbox" value="task" name="features[]" type="checkbox" />
  <label for="checkbox"> Tasks</label>
  <br>
@endif
  @if(array_search("rolePermission",$strreplace)!='')
  <input id="checkbox" value="rolePermission" name="features[]" type="checkbox" checked/>
  <label for="checkbox"> Role & Permission</label>
  <br>
  @else
  <input id="checkbox" value="rolePermission" name="features[]" type="checkbox" />
  <label for="checkbox"> Role & Permission</label>
  <br>
  @endif

  @if(array_search("leadManage",$strreplace)!='')
  <input id="checkbox" value="leadManage" name="features[]" type="checkbox" checked />
  <label for="checkbox"> Lead manager</label>
  <br>
  @else
  <input id="checkbox" value="leadManage" name="features[]" type="checkbox" />
  <label for="checkbox"> Lead manager</label>
  <br>
  @endif

  @if(array_search("documentManage",$strreplace)!='')
  <input id="checkbox" value="documentManage" name="features[]" type="checkbox" checked />
  <label for="checkbox"> Document-Management</label>
  <br>
  @else
  <input id="checkbox" value="documentManage" name="features[]" type="checkbox" />
  <label for="checkbox"> Document-Management</label>
  <br>
  @endif
  

  @if(array_search("application",$strreplace)!='')
    <input id="checkbox" value="application" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  Applications</label>
  <br>
  @else
  <input id="checkbox" value="application" name="features[]" type="checkbox" />
  <label for="checkbox">  Applications</label>
  <br>
  @endif

  @if(array_search("account",$strreplace)!='')
  <input id="checkbox" value="account" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  Account</label>
  <br>
  @else
  <input id="checkbox" value="account" name="features[]" type="checkbox" />
  <label for="checkbox">  Account</label>
  <br>
  @endif
  
  @if(array_search("workflow",$strreplace)!='')
    <input id="checkbox" value="workflow" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  Workflow</label>
  <br>
  @else
  <input id="checkbox" value="workflow" name="features[]" type="checkbox" />
  <label for="checkbox">  Workflow</label>
  <br>
  @endif

  @if(array_search("news",$strreplace)!='')
    <input id="checkbox" value="news" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  News</label>
  <br>
  @else
  <input id="checkbox" value="news" name="features[]" type="checkbox" />
  <label for="checkbox">  News</label>
  <br>
  @endif

  @if(array_search("support",$strreplace)!='')
  <input id="checkbox" value="support" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  Support</label>
 @else
 <input id="checkbox" value="support" name="features[]" type="checkbox" />
  <label for="checkbox">  Support</label>
  <br>
 @endif

 @if(array_search("sampledocument",$strreplace)!='')
  <input id="checkbox" value="sampledocument" name="features[]" type="checkbox" checked/>
  <label for="checkbox">  Sample Document</label>
 @else
 <input id="checkbox" value="sampledocument" name="features[]" type="checkbox" />
  <label for="checkbox">  Sample Document</label>
 @endif
</div>
  <div class="fv-row mb-5">
    
</div>
                               
</div>
</div>


</div>
<div class="col-lg-12">
 <button type="submit" class="Package1">Submit</button>
</div>
 </form>


   @else
 <form method="POST" action="{{url('admin/add-package-features')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                               @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Package Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="package_name" id="first_name" class="form-control form-control-lg form-control-solid" value="">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Package Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_title" id="first_name" class="form-control form-control-lg form-control-solid" value="">
                                                                                <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-6">
                                     <label class="form-label required">Package Subtitle</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_subtitle" id="first_name" class="form-control form-control-lg form-control-solid" value="">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                       <div class="col-6">
                                     <label class="form-label required">Package monthly Price</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_monthly" id="first_name" class="form-control form-control-lg form-control-solid" value="">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                
                               </div>
                               <div class="row fv-row mb-10">

                                    <div class="col-6">
                                     <label class="form-label required">Package yearly Price</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                       <input name="package_yearly" id="first_name" class="form-control form-control-lg form-control-solid" value="">
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    
                                     </div>
                                    <!--end::Label-->
                                   
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                      
                                                                       
                                    <!--end::Input-->
                                    
                                </div>
                                <br>
                               
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
                           
                           
</div>
<div class="col-sm-6" id="sms1">

 <h2 class="fw-bolder text-dark">Package & Premission</h2>
  <br>
  <div class="fv-row mb-10" id="mang">
                                    <!--begin::Label-->
 <div class="fv-row mb-5">
  <input id="checkbox" value="sms" name="features[]" type="checkbox" />
  <label for="checkbox"> SMS Integration</label>
  <br>
  <input id="checkbox" value="email" name="features[]"type="checkbox" />
  <label for="checkbox"> Email Integration</label>
  <br>
  <input id="checkbox" value="calender" name="features[]" type="checkbox" />
  <label for="checkbox"> Calendar</label>
  <br>
  <input id="checkbox" value="task" name="features[]" type="checkbox" />
  <label for="checkbox"> Tasks</label>
  <br>
  <input id="checkbox" value="rolePermission" name="features[]" type="checkbox" />
  <label for="checkbox"> Role & Permission</label>
  <br>
  <input id="checkbox" value="leadManage" name="features[]" type="checkbox" />
  <label for="checkbox"> Lead Manger</label>
  <br>
  <input id="checkbox" value="documentManage" name="features[]" type="checkbox" />
  <label for="checkbox"> Document-Management</label>
  <br>
  
    <input id="checkbox" value="application" name="features[]" type="checkbox" />
  <label for="checkbox">  Applications</label>
  <br>

  <input id="checkbox" value="account" name="features[]" type="checkbox" />
  <label for="checkbox">  Account</label>
  <br>
  
    <input id="checkbox" value="workflow" name="features[]" type="checkbox" />
  <label for="checkbox">  Workflow</label>
  <br>

  
    <input id="checkbox" value="news" name="features[]" type="checkbox" />
  <label for="checkbox">  News</label>
  <br>
  <input id="checkbox" value="support" name="features[]" type="checkbox" />
  <label for="checkbox">  Support</label>
 <br>
  <input id="checkbox" value="sampledocument" name="features[]" type="checkbox" />
  <label for="checkbox">  Sample Document</label>
</div>
  <div class="fv-row mb-5">
    
</div>
                               
</div>
</div>


</div>
<div class="col-lg-12">
 <button type="submit" class="Package1">Submit</button>
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

