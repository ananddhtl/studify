@include('layout.admin.header')



<div id="personal_info" class="current" data-kt-stepper-element="content" style="display: block;">                              
    <h1 style="font-size: 18px; padding: 10px;">Admin Profile</h1>
                                                      <!--begin::Wrapper-->
       <form  action="{{url('admin/admin-profile-update')}}" method="POST" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                                <div class="row fv-row mb-10">
                   <input type="hidden" name="id"  value="{{$adminprofile[0]->id}}">                                 <!--end::Input-->


 <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="name" id="name" class="form-control form-control-lg form-control-solid" value="{{$adminprofile[0]->admin_name}}">
                                                                                <!--end::Input-->
                                    </div>


                                     <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid" value="{{$adminprofile[0]->email}}">
                                     </div>
                                   
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                 
                             
                                  
                                <div class="col-6">  
                                <label class="d-flex align-items-center form-label">
                                        <span class="required">Phone Number</span>
                                    </label>
                                    <!--end::Label-->
                                    
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$adminprofile[0]->admin_phone}}">                                 <!--end::Input-->

                                </div>
                                <div class="col-6">
                                
                                </div>
                            </div>
                             <div class="row fv-row mb-10">
                             	<div class="col-6">
                                <label class="fs-6 fw-bold form-label">Upload Profile Image</label><br>  
                                <input type="file" id="myFile" name="admin_img"><br>
 <img src="{{asset('public/AdminImage/'.$adminprofile[0]->admin_image)}}" alt="" width="200" height="80">
                                            
                                              <!--end::Input-->

                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                                <br>
                                 <button type="submit" class="btn btn-primary">Submit</button>

                            
                            
                
                                
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