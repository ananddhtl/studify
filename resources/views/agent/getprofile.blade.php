@include('agent.header')
<div class="container-fluid">
    <!-- /.row -->

    <span id="message_container_display"></span>

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">


                <!--begin::Navbar-->
                <div class="card mb-5 mb-xxl-8 pr-bg">
                    <div class="card-body pt-5 pb-5">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">

                                    <img src="{{ asset('public/AgentImage/' . $agentprofile->agent_image) }}"
                                        class="thumb-lg img-circle" alt="">

                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="javascript:void(0);"
                                                class="text-gray-900 text-hover-primary fs-2x fw-bolder me-1">{{ $agentprofile->company_name }}</a>
                                            <a href="javascript:void(0);">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24">
                                                        <path
                                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                            fill="#00A3FF"></path>
                                                        <path class="permanent"
                                                            d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a href="javascript:void(0);"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $agentprofile->first_name }}</a>
                                            <a href="javascript:void(0);"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $agentprofile->agent_address }}</a>
                                            <a href="javascript:void(0);"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $agentprofile->email }}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="bg-white border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">

                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                                        data-kt-countup-value="1" data-kt-countup-prefix="">
                                                        {{ $countstudent }}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Total Students</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div
                                                class="bg-white border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">

                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                                        data-kt-countup-value="0">{{ $incomplete }}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Incomplete</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div
                                                class="bg-white border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">

                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                                        data-kt-countup-value="0" data-kt-countup-prefix="">
                                                        {{ $completeStudent }}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Complete</div>
                                                <!--end::Label-->
                                            </div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Progress-->

                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->

                    </div>
                </div>
                <!--end::Navbar-->

                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Edit Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->

                        <form method="POST" action="{{ url('agent/profle-update') }}" accept-charset="UTF-8"
                            id="kt_account_profile_details_form" class="form" enctype="multipart/form-data"><input
                                name="_token" type="hidden" value="lI6eiEjV6IDjSV59mHL62H5ONp1uLGplpBdOWq19">
                            <!--begin::Card body-->
                            @csrf
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Profile Image</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('#')">
                                            <!--begin::Preview existing avatar-->
                                            <img data-toggle="modal" data-target="#exampleModalCenter"
                                                onclick="onClick(this)"
                                                src="{{ asset('public/AgentImage/' . $agentprofile->agent_image) }}"
                                                width="100" height="100" class="thumb-lg img-circle"
                                                alt="" style="padding-bottom:10px; ">

                                            <br>

                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->

                                            <!--begin::Inputs-->
                                            <input type="file" name="agent_image" accept=".png, .jpg, .jpeg">

                                            <input type="hidden" name="id" value="{{ $agentprofile->id }}">
                                            <!--end::Inputs-->
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span> -->
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span> -->
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <!-- <div class="form-text">Allowed file types: png, jpg, jpeg.</div> -->
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Company Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="company_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Company Name" value="{{ $agentprofile->company_name }}">
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>

                                    <!--end::Col-->
                                </div>
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Address</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="agent_address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Address" value="{{ $agentprofile->agent_address }}">
                                        @if ($errors->has('agent_address'))
                                            <span class="text-danger">{{ $errors->first('agent_address') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Year of
                                        Established</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="established"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Year of Established"
                                            value="{{ $agentprofile->established }}">
                                        @if ($errors->has('established'))
                                            <span class="text-danger">{{ $errors->first('established') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Owner Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="first_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Owner Name" value="{{ $agentprofile->first_name }}">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Email" value="{{ $agentprofile->email }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Country</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($country as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $agentprofile->country == $value->country_name ? 'selected' : '' }}>
                                                    {{ $value->country_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Select state</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input id="statessss" name="states" value="{{ $agentprofile->state }}"
                                            class="form-control">
                                        <select id="state-dd" name="state" class="form-control">
                                        </select>
                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>

                                    <!--end::Col-->
                                </div>




                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Select city</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input id="citiess" name="citys" value="{{ $agentprofile->city }}"
                                            class="form-control">
                                        <select name="city" class="form-control" id="city-dd">
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>



                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone No</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="phone"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Phone No" value="{{ $agentprofile->phone }}">
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <!-- <div class="row mb-6"> -->
                                <!--begin::Label-->
                                <!-- <label class="col-lg-4 col-form-label required fw-bold fs-6">Mobile</label> -->
                                <!--end::Label-->
                                <!--begin::Col-->
                                <!-- <div class="col-lg-8 fv-row"> -->
                                <!-- <input type="text" name="mobile" class="form-control form-control-lg form-control-solid" placeholder="Mobile" value=""> -->
                                <!-- </div> -->
                                <!--end::Col-->
                                <!-- </div> -->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Contact Person</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="contact_person"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Contact Person" value="{{ $agentprofile->contact_person }}">
                                        @if ($errors->has('contact_person'))
                                            <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Contact Email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="contact_email"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Contact Email" value="{{ $agentprofile->contact_email }}">
                                        @if ($errors->has('contact_email'))
                                            <span class="text-danger">{{ $errors->first('contact_email') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Contact Phone</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="contact_phone"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Contact Phone" value="{{ $agentprofile->contact_phone }}">
                                        @if ($errors->has('contact_phone'))
                                            <span class="text-danger">{{ $errors->first('contact_phone') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Bank Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="bank_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Bank Name" value="{{ $agentprofile->bank_name }}">
                                        @if ($errors->has('bank_name'))
                                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Bank Account#</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="bank_account"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Bank Account#" value="{{ $agentprofile->bank_account }}">
                                        @if ($errors->has('bank_account'))
                                            <span class="text-danger">{{ $errors->first('bank_account') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Account Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="account_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Account Name" value="{{ $agentprofile->account_name }}">
                                        @if ($errors->has('account_name'))
                                            <span class="text-danger">{{ $errors->first('account_name') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Bank Address</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="bank_address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Bank Address" value="{{ $agentprofile->bank_address }}">
                                        @if ($errors->has('bank_address'))
                                            <span class="text-danger">{{ $errors->first('bank_address') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Routing#</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="routing"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Routing#" value="{{ $agentprofile->routing }}">
                                        @if ($errors->has('routing'))
                                            <span class="text-danger">{{ $errors->first('routing') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Swift Code</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="swift_code"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Swift Code" value="{{ $agentprofile->swift_code }}">
                                        @if ($errors->has('swift_code'))
                                            <span class="text-danger">{{ $errors->first('swift_code') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"><a
                                        href="{{ url('agent/profile') }}">Discard</a></button>
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Save Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
                <!--begin::Sign-in Method-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Sign-in Method Settings</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bolder mb-1">Email Address</div>
                                    <div class="fw-bold text-gray-600">{{ $agentprofile->email }}</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->

                                    <form method="POST" action="#" accept-charset="UTF-8"
                                        id="kt_signin_change_email"
                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                        novalidate="novalidate"><input name="_token" type="hidden"
                                            value="lI6eiEjV6IDjSV59mHL62H5ONp1uLGplpBdOWq19">
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress"
                                                        class="form-label fs-6 fw-bolder mb-3">Enter New Email
                                                        Address</label>
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="emailaddress" placeholder="Email Address" name="email"
                                                        value="{{ $agentprofile->email }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <button id="kt_signin_submit" type="submit"
                                                class="btn btn-primary me-2 px-6">Update Email</button>
                                            <button id="kt_signin_cancel" type="reset"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                        <div></div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Email Address-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->
                            <!--begin::Password-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Label-->
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bolder mb-1">Password</div>
                                    <div class="fw-bold text-gray-600">************</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->

                                    <form method="POST" action="#" accept-charset="UTF-8"
                                        id="kt_signin_change_password"
                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                        novalidate="novalidate"><input name="_token" type="hidden"
                                            value="lI6eiEjV6IDjSV59mHL62H5ONp1uLGplpBdOWq19">
                                        <div class="row mb-1">

                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="password" id="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">Confirm New
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="confirm_password" id="confirm_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">Password must be at least 8 character and contain
                                            symbols</div>
                                        <div class="d-flex">
                                            <button id="kt_password_submit" type="submit"
                                                class="btn btn-primary me-2 px-6">Update Password</button>
                                            <button id="kt_password_cancel" type="reset"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                        </div>
                                        <div></div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Password-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Sign-in Method-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

    <!-- /.modal-content -->
    <div class="modal fade bs-modal-sm" id="warning_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-info-circle" style="color: #F9E491;"></i> <span
                            class="warning_title"></span>
                    </h4>
                </div>
                <div class="modal-body"><span class="warning_desc"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i
                            class="icon-check"></i>
                        Ok
                    </button>
                </div>
            </div>
        </div>

        <!-- /.modal-dialog -->



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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 50%;height: 200px;">





                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="cress">&times;</span>
                    </button>
                    <img id="img01">

                </div>


            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#state-dd').hide();
            $('#city-dd').hide();

            $('#country').on('change', function() {
                $('#state-dd').show();

                $('#statessss').hide();
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('agent/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });


            $('#state-dd').on('change', function() {
                var idState = this.value;
                $('#citiess').hide();
                $('#city-dd').show();

                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('agent/get-cities-by-state') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {

                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

        function onClick(element) {

            document.getElementById("img01").src = element.src;

            document.getElementById("exampleModalCenter").style.display = "block";
        }
    </script>
