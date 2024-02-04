@include('agent.header')
<span id="message_container_display"></span>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">



            <!--begin::activity history card-->
            <div class="card card-flush ">
                <!--begin::Header-->
                
                <!--end::Header-->

                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <!--begin::Body-->
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Your Activities - Activity History</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            <!--begin::Timeline-->
                            <div class="timeline-label">
                                <!--begin::Item-->
                                    @foreach($login as $agentlogin)
                                     <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bolder text-gray-800 fs-6">{{$agentlogin->created_at}}</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-warning fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class="fw-mormal timeline-content text-muted ps-3">Successfully Login</div>
                                    <!--end::Text-->
                                </div>
                                @endforeach
                                        

                                                                
                                    
                                                                
                                                                
                                                                
                                                                     
                                                               
                                                                
                                                                 
                                                                
                                                                
                                                                
                                                                
                                                                          
                            </div>
                            <!--end::Timeline-->
                        </div>
                        <!--end: Card Body-->
                    </div>

                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <!--begin::Body-->
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Your Message - Message History</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            <!--begin::Timeline-->
                            <div class="timeline-label">
                                
                                <!--begin::Item-->
                                                                <!--end::Item-->
                                
                            </div>
                            <!--end::Timeline-->
                        </div>
                        <!--end: Card Body-->
                    </div>


                </div>

            </div>
            <!--end: activity history card-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
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