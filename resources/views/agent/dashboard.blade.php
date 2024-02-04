@include('agent.header');
 <span id="message_container_display"></span>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="height: 80vh;">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
    <div class="pb-10 pb-lg-12" id="dasbb" style="margin-bottom: -6%;">
    <h2 class="sem">Upgrade your current package plans.<a href="{{url('agent/select-package')}}" style="color: blue"> Get More Features?</a></h2>
</div>    <br><br>  
<div class="pb-10 pb-lg-12" id="dasbb" style="margin-bottom: -6%;">     <!--begin::Table-->
<h2 class="sem">{{$message}}</h2>
</div>   

            <div class="card card-flush mt-6 mt-xl-9" style="background: transparent !important;">
                <!--begin::Card header-->
              

              
                       <div class="row"> 
                       @if($package)
                   <div class="col-md-8 col-xl-8 mt-lg-5 d-flex justify-content-center">
                        <div class="package-dasbord">
                            <a href="">
                          
                            </a><div class="col-12 pr-0" style="margin-left: -6px;
    margin-top: 8px;
    margin-bottom: 8px;">
      <div class="divied">
                                <div class="fixdurn">
                                  <p style="margin: 0px; font-size: 20px;
    color: #a7c952; text-align: center;margin-bottom: 30px;"><b>Package Info</b></p><h5 class="coupon_name" style="font-size:18px; margin:5px 0px 0px 0px;" readonly>{{$package->package_name}}</h5>
                            
                              <p style="font-size:16px; margin:0px; color:#838181;" readonly>{{$package->package_title}}</p>

                                <p style="font-size:14px; margin:0px; color: #838181;
    font-weight: 500;">
                               <i style="font-size:16px; color: red
                               "class="fa fa-clock-o" aria-hidden="true"></i>
                                    Package Duration                                </p>
                               <div class="timeuse">
                                <div class="used"><label for="start">Start date:</label>

<input type="text" id="start" name="trip-start"
       value="{{$member->package_start_date}}"
       min="2018-01-01" max="2018-12-31" readonly></div>
       <div class="used1">
   <label for="start">End date:</label>

<input type="text" id="End" name="trip-start"
       value="{{$member->package_end_date}}"
       min="2018-01-01" max="2018-12-31" readonly></div></div>
     </div>
     <div class="hr"></div>
 <div class="features"><p style="margin: 0px; font-size: 20px;
    color: #a7c952; text-align: center; margin-bottom: 30px;"><b>Package features</b></p>

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


                                 <ul class="check-element">
                                 @if(array_search("sms",$strreplace)!='')
      <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">SMS</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">SMS</span></li>
        @endif
        
        
        @if(array_search("email",$strreplace)!='')
         <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Email</span></li>
                   @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Email</span></li>            
                   @endif
        
          @if(array_search("calender",$strreplace)!='')
          <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Calender</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Calender</span></li>
        @endif
        
        
        @if(array_search("rolePermission",$strreplace)!='')              
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Role Permission</span></li>
       @else
       <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Role Permission</span></li>
       @endif
        
       @if(array_search("leadManage",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Lead Manage</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Lead Manage</span></li>
        @endif
        @if(array_search("documentManage",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Document Manage</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Document Manage</span></li>
        @endif
        @if(array_search("application",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Application</span></li>
          @else
          <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Application</span></li>
          @endif
                                                    
          @if(array_search("account",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Account</span></li>
          @else
          <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Account</span></li>
          @endif
          @if(array_search("workflow",$strreplace)!='')                                           
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Workflow</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Workflow</span></li>
        @endif
        @if(array_search("news",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">News</span></li>
        @else
        <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">News</span></li>
        @endif
        @if(array_search("support",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Support</span></li>
         @else
         <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Support</span></li>
         @endif

         @if(array_search("sampledocument",$strreplace)!='')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Sample Document</span></li>
         @else
         <li><i class="fa fa-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Sample Document</span></li>
         @endif
         
        
        
                        
              </ul>
                              </div>

                                </a>
                            </div>
                        
                        </div>
                  
               </div>
           </div>
       
@endif
            </div>
          
          </div>
          
            <!--end::Card-->
</div>
</div>

</div>

<!-- <div class="dasbord"></div> -->
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Copyright © Studify</a>
            </li>

        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>

