  @include('institution.header')
          
    <!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9" id="bo-color">
                <!--begin::Card header-->
                
                <div class="card-header mt-5">
                 <div id="right-panel" class="right-panel">

            <div class="state-overview">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="info-box bg-b-green">
                                    <span class="info-box-icon push-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Students</span>
                                        <span class="info-box-number">{{$countstudent}}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 45%"></div>
                                        </div>
                                        <span class="progress-description">
                                            45% Increase in 28 Days
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="info-box bg-b-yellow">
                                    <span class="info-box-icon push-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Agents</span>
                                        <span class="info-box-number">{{$countagent}}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 40%"></div>
                                        </div>
                                        <span class="progress-description">
                                            40% Increase in 28 Days
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="info-box bg-b-blue">
                                    <span class="info-box-icon push-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Course</span>
                                        <span class="info-box-number">{{$countcourse}}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 85%"></div>
                                        </div>
                                        <span class="progress-description">
                                            85% Increase in 28 Days
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                          
                            <!-- /.col -->
                        </div>
                    </div>
            <!--/.col-->
             <div class="col-sm-6 col-lg-4" id="blank1">
                
             </div>


              <div class="col-sm-6 col-lg-4" id="blank1">

              
              </div>
              <div class="col-sm-6 col-lg-4" id="blank1">

              
              </div>
             

            
         
            <!--/.col-->
       </div> <!-- .content -->
    </div><!-- /#right-panel -->
</div>
</div>
</div>
</div>
<div class="modal fade bs-modal-sm" id="warning_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-info-circle" style="color: #F9E491;"></i> <span class="warning_title"></span>
                    </h4>
                </div>
                <div class="modal-body"><span class="warning_desc"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i class="icon-check"></i>
                        Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
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

<!--end::Root-->
</div>
</div>
</div>


<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->

<script src="{{asset('assets/js/toggle.js')}}"></script>




    
<!--end::Page Custom Javascript-->

<!--end::Javascript-->
</body>
<!--end::Body-->

</html>

