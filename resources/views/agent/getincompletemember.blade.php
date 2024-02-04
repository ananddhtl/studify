@include('agent.header')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="height: 77vh;">


                <!--begin::Table-->
                <div class="card card-flush mt-6 mt-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header mt-5">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h3 class="fw-bolder mb-1">Complete Students</h3>
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->

                        <div class="card-toolbar my-1">
                            <!--begin::Select-->
                            <div class="me-6 my-1" style="display: none;">
                                <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible" data-select2-id="select2-data-kt_filter_year" tabindex="-1" aria-hidden="true">
                                    <option value="All" selected="selected" data-select2-id="select2-data-2-6dql">All time</option>
                                    <option value="thisyear">This year</option>
                                    <option value="thismonth">This month</option>
                                    <option value="lastmonth">Last month</option>
                                    <option value="last90days">Last 90 days</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-1-xkvm" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-kt_filter_year-container" aria-controls="select2-kt_filter_year-container"><span class="select2-selection__rendered" id="select2-kt_filter_year-container" role="textbox" aria-readonly="true" title="All time">All time</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!--end::Select-->
                            <!--begin::Select-->
                            <div class="me-4 my-1" style="display: none;">
                                <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible" data-select2-id="select2-data-kt_filter_orders" tabindex="-1" aria-hidden="true">
                                    <option value="All" selected="selected" data-select2-id="select2-data-4-ppiw">All Status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Declined">Declined</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="In Transit">In Transit</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-3-vz6m" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-kt_filter_orders-container" aria-controls="select2-kt_filter_orders-container"><span class="select2-selection__rendered" id="select2-kt_filter_orders-container" role="textbox" aria-readonly="true" title="All Status">All Status</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!--end::Select-->
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-3 position-absolute ms-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" id="kt_filter_search" class="form-control form-control-solid form-select-sm w-150px ps-9" placeholder="Search Order">
                            </div>
                            <!--end::Search-->
                        </div>

                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                <!--begin::Head-->
                                <thead class="fs-7 text-gray-400 text-uppercase">
                                <tr>
                                    <th class="150px">Student</th>
                                    <th class="250px ">Universities</th>
                                    <th class="150px">Applied Programs</th>
                                    <th class="50px ">Fees</th>
                                    <th class="100px">Description</th>
                                    <th class="50px">Status</th>
                                    <th class="50px text-end ">Action</th>
                                </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6 ">
                                                                </tbody>
                                <!--end::Body-->
                                
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->



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