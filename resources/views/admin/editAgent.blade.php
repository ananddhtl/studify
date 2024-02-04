@include('layout.admin.header')



<div id="personal_info" class="current" data-kt-stepper-element="content" style="display: block; background-color: #ccc;">                              
    <h1 style="font-size: 18px; padding: 10px;"> Agent Detail</h1>
                                                      <!--begin::Wrapper-->
       <form  action="{{url('admin/agent-update/'.$agentDetail->id)}}" method="POST" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                               <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">First Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="first_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->first_name}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Last Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="last_name" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->last_name}}">
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
                                
                                    <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->email}}">
                                     </div>
                                <div class="col-6">  
                                <label class="d-flex align-items-center form-label">
                                        <span class="required">Phone Number</span>
                                    </label>
                                    <!--end::Label-->
                                    
                                            <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$agentDetail->phone}}">                                 <!--end::Input-->

                                </div>
                            </div>

                             <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Address</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="agent_address" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->agent_address}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Contact Person</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_person" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->contact_person}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>

                                 <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Contact Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_email" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->contact_email}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Contact Phone</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_phone" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->contact_phone}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>

                                 <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Bank Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="bank_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->bank_name}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Bank Account</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="bank_account" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->bank_account}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>

                                 <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Account Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="account_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->account_name}}">
                                                                                <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Bank Address</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="bank_address" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->bank_address}}">
                                                                                <!--end::Input-->
                                    </div>
                                </div>

                                 <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Routing</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="routing" id="routing" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->routing}}">
                                                                                <!--end::Input-->
                                    </div>

                                     <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Bank Account</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="bank_account" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->bank_account}}">
                                                                                <!--end::Input-->
                                    </div>

                                   
                                </div>

                                 <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Swift Code</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="swift_code" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->swift_code}}">
                                                                                <!--end::Input-->
                                    </div>
                                   
<div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Company Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="company_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->company_name}}">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                </div>

                                 <div class="row fv-row mb-10">
                              <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Estblished</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="established" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$agentDetail->established}}">
                                                                                <!--end::Input-->
                                    </div>


                                     <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Agent Image</label><br>
                                        <input type="file" name="agent_image">
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <img src="{{asset('public/AgentImage/'.$agentDetail->agent_image)}}" alt="Description when image is not found" width="100" height="100">

                                                                                <!--end::Input-->
                                    </div>
                                   

                                    
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    </div>
                             
                                <!--end::Input group-->
                                <!--begin::Input group-->
                               
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                              
                                <!--end::Input group-->



                            

                           <div class="center">
                             <button type="submit" class="btn btn-primary"><a href="{{url('admin/manage-agent')}}">Back </a> </button>
                             <button type="submit" class="btn btn-primary">Update </button>
                         </div>
                            </form>

                                                        <!--end::Wrapper-->
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