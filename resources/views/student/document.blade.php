@include('student.header')

         <span id="message_container_display"></span>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">

                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="application_manager_stepper">
                    <!--begin::Aside-->
                    <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                        <!--begin::Wrapper-->
                        <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                            <!--begin::Nav-->
                            <div class="stepper-nav">
                                <!--begin::Step 1-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Personal Information</h3>
                                        <div class="stepper-desc fw-bold">Setup Your Personal Details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Address</h3>
                                        <div class="stepper-desc fw-bold">Add your correspondence info</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Language Score</h3>
                                        <div class="stepper-desc fw-bold">Your TOEFL, IELTS etc info</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">GPA Score</h3>
                                        <div class="stepper-desc fw-bold">Set Your GPA scale and score</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Academic Information</h3>
                                        <div class="stepper-desc fw-bold">Provide Your Education History</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->



                                <!--begin::Step 6-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">6</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Emergency Contact</h3>
                                        <div class="stepper-desc fw-bold">Your emergency contact person name</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 6-->

                                <!--begin::Step 7-->
                                <div class="stepper-item current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">7</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Upload Documents</h3>
                                        <div class="stepper-desc fw-bold">Your CV/Resume/Work Experience</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 7-->

                                <!--begin::Step 8-->
                                <div class="stepper-item " data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">8</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Consent and Signature</h3>
                                        <div class="stepper-desc fw-bold"></div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 8-->

                                <!--begin::Step 9-->

















                                <!--end::Step 9-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="card d-flex flex-row-fluid flex-center">
                        <!--begin::Form-->
                        

                                <!--begin::Step 1-->
                       
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        
                        <!--end::Step 6-->
                        <!--begin::Step 7 - professional Information-->
                       <div class="current" id="documents_info" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('/student/upload-documents')}}"  class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework form-image-passporter" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                            @csrf
                            <input type="hidden" name="tab" value="professional_info">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Professional Information
                                    </h2>
                                    <div class="text-muted fw-bold fs-6">Add all your Professional Information
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <label class="form-label required">Passport (PNG,JPG,PDF) (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                         <div class="dropzone" id="dropzone_passport">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here to click upload</h3>
                     <input type="file" name="passport[]" multiple >
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                @if(count($passportimage) != '0')
                                                 @foreach($passportimage as $passportimages)
                            <img src="{{asset('public/StudentPassportImage/'.$passportimages->image)}}" width="100" height="100">
                            <a href="{{url('student/delete-passport/'.$passportimages->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </div>
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <label class="form-label required">English Language Proficiency Certificate</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">

                                                <div class="dropzone" id="dropzone_language">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload</h3>
                                                        <input type="file" name="english_certificate" >
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <img src="{{asset('public/StudentEnglishCertificate/'.$student->english_certificate)}}" width="100" height="100">


                                        </div>
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <label class="form-label required">Marksheets (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                                <div class="dropzone" id="dropzone_marksheet">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                         <input type="file" name="marksheet[]" multiple >
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                @if(count($marksheet) != '0')
                                                  @foreach($marksheet as $marksheets)
                            <img src="{{asset('public/StudentMarksheetImage/'.$marksheets->marksheet)}}" width="100" height="100">
                            <a href="{{url('student/delete-marksheet/'.$marksheets->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">CV/ Resume</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                            <div class="dropzone" id="dropzone_cv">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload</h3>
                                                        <input type ="file" name="resume" >
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <img src="{{asset('public/StudentResume/'.$student->resume)}}" width="100" height="100">

                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">Recommendations (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                                                                            <div class="dropzone" id="dropzone_recommendation">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                         <input type="file" name="recommendation[]" multiple >
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                @if(count($recommendation) != '0')
                                                 @foreach($recommendation as $recommendations)
                            <img src="{{asset('public/StudentRecommandation/'.$recommendations->recommand)}}" width="100" height="100">
                            <a href="{{url('student/delete-recommendations/'.$recommendations->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">Financial Documents (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                                                                            <div class="dropzone" id="dropzone_finance">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                   <input type="file" name="financialDoc[]" multiple >                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                @if(count($financial) != '0')
                                                @foreach($financial as $financials)
                            <img src="{{asset('public/StudentFinanicalImage/'.$financials->financial_images )}}" width="100" height="100">
                            <a href="{{url('student/delete-financials/'.$financials->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                        </div>
                                      
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">Other attachment (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                                    <div class="dropzone" id="dropzone_other">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                              <input type="file" name="other[]" multiple >                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                @if(count($other) != '0')
                                @foreach($other as $others)
                            <img src="{{asset('public/StudentOther/'.$others->other_image)}}" width="100" height="100">
                            <a href="{{url('student/delete-other/'.$others->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                        </div>
                                       
                                    </div>
                                </div>




                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div id="errors" style="color: red;">

                                </div>
                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="mr-2">
                                    <!-- <a href="#" class="btn btn-lg btn-light-primary me-3">Back</a> -->
                                    
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <!-- <button type="submit" id="docUpload" class="btn btn-lg btn-primary">Continue</button> -->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            </form>
                            <!--end::Input group-->
                        </div>
                        <!--end::Step 7-->
                     <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Stepper-->


            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
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
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i class="icon-check"></i>
                        Ok
                    </button>
                </div>
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
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->






<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                </svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->

<!--end::Page Custom Javascript-->

<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
   