@include('layout.admin.header')

<div id="personal_info" class="current" data-kt-stepper-element="content" style="display: block;">
                                               
                                               <h1 style="font-size: 18px; padding: 10px;"> Student Detail</h1>       <!--begin::Wrapper-->
                                                  


                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="application_manager_stepper">
                    <!--begin::Aside-->
                    <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                        <!--begin::Wrapper-->
                        <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                            <!--begin::Nav-->
                            <div class="stepper-nav">
                                <!--begin::Step 1-->
                               
                                <div class="stepper-item current" id="personals" data-kt-stepper-element="nav" data-kt-stepper-action="step">

                                
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px personal">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                        
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label personal">
                                        <h3 class="stepper-title">Personal Information</h3>
                                        <div class="stepper-desc fw-bold">Setup Your Personal Details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                               
                                <div class="stepper-item" id="addresss" data-kt-stepper-element="nav" data-kt-stepper-action="step">

                                
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px "></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px address">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label address">
                                        <h3 class="stepper-title">Address</h3>
                                        <div class="stepper-desc fw-bold">Add your correspondence info</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                               
                                <div class="stepper-item" id="languages" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px language">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label language">
                                        <h3 class="stepper-title">Language Score</h3>
                                        <div class="stepper-desc fw-bold">Your TOEFL, IELTS etc info</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                
                               <div class="stepper-item" id="gpas" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px gpa">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label gpa">
                                        <h3 class="stepper-title">GPA Score</h3>
                                        <div class="stepper-desc fw-bold">Set Your GPA scale and score</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 4-->

                                <!--begin::Step 5-->
                               
                                <div class="stepper-item" id="academics" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                               
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px academic">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label academic">
                                        <h3 class="stepper-title">Academic Information</h3>
                                        <div class="stepper-desc fw-bold">Provide Your Education History</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->



                                <!--begin::Step 6-->
                                
                                <div class="stepper-item " id="contacts" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                               
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px emergency">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">6</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label emergency">
                                        <h3 class="stepper-title">Emergency Contact</h3>
                                        <div class="stepper-desc fw-bold">Your emergency contact person name</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 6-->

                                <!--begin::Step 7-->
                                
                             <div class="stepper-item " id="documentss" data-kt-stepper-element="nav" data-kt-stepper-action="step">

                                
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px documents">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">7</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label documents">
                                        <h3 class="stepper-title">Upload Documents</h3>
                                        <div class="stepper-desc fw-bold">Your CV/Resume/Work Experience</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
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
                        

                       
                        <div class="current"  data-kt-stepper-element="content" id="personal_info">
                       
                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('student/update')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                          @csrf
                            <input type="hidden" name="id" value="{{$student->id}}">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Personal Information</h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-bold fs-6">Please enter your infomation and proceed to next step so we can build your account

                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">First Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="first_name" id="first_name" readonly class="form-control form-control-lg form-control-solid" value="{{$student->first_name}}" />
                                       @error('first_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Last Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="last_name" id="last_name" readonly class="form-control form-control-lg form-control-solid" value="{{$student->last_name}}" />
                                        @error('last_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" id="email" readonly class="form-control form-control-lg form-control-solid" value="{{$student->email}}" />
                                    @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->

                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Phone Number</span>
                                    </label>
                                    <!--end::Label-->
                                   
                                       
                                            <input type="text" name="phone" readonly id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$student->phone}}" />
                                      @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                        
                                    </div>
                               
                            </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                  

                                    <div class="col-6">
                                    <!--end::Label-->
                                    <label class="form-label required">Gender</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="gender" aria-label="Gender" readonly data-control="select2" data-placeholder="Gender" class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Gender</option>
                                        <?php if($student->gender == 'male') { ?>
                                        <option value="male" selected>
                                            Male
                                        </option>
                                         <?php } else{ ?>
                                     <option value="male">
                                            Male
                                        </option>
                                          <?php } ?> 
                                        <?php if($student->gender == 'female') { ?>
                                        <option value="female" selected>
                                            Female
                                        </option>
                                         <?php } else{ ?>
                                      <option value="female">
                                            Female
                                        </option>
                                             <?php } ?> 
                                       <?php if($student->gender == 'others') { ?>
                                        <option value="others" selected>
                                            Others
                                        </option>
                                         <?php } else{ ?>
                                           <option value="others">
                                            Others
                                        </option>
                                        <?php } ?> 
                                    </select>
                                    @error('gender')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->
                                    </div>
                                    
                              
                              </div>
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Date of Birth</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <?php if($student->dob !='') {  ?> 
                 <input type="date" id="ab_datepicker_dob" readonly name="dob" placeholder="Select a date" class="form-control mb-2" value="{{$student->dob}}" />

                                        <?php } else { ?>
    <input type="date" id="ab_datepicker_dob" name="dob" readonly placeholder="Select a date" class="form-control mb-2" value="" />
   @error('dob')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                         <?php } ?>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Birth Place and Country</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <?php if($student->country !='') { ?> 
                                        <input type="text" id="birth_place_country" readonly name="country" placeholder="Enter the Birth Place Country" class="form-control mb-2" value="{{$student->country}}" />
                                         <?php } else { ?>
                                <input type="text" id="birth_place_country" readonly name="country" placeholder="Enter the Birth Place Country" class="form-control mb-2" value="" />
                                      @error('country')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                              <?php } ?>
                                        <!--end::Input-->
                                    </div>
                                </div>

                                                                
                                <!--begin::Input group-->
                                <div class="fv-row">

                                    <!--begin::Label-->
    <label class="form-label required">Upload Profile Image</label><br>
                                    

       
 <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentImage/'.$student->student_img)}}" alt="Simply Easy Learning" width="200"
         height="80">
                    @error('student_img')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                        
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                    
                                        
                                    
                                    <!--end::Dropzone-->
                                </div>
                                <!--end::Input group-->



                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="mr-2">
                                   
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                  
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                               
                                <!--end::Wrapper-->
                            </div>
                            </form>
                            <!--end::Wrapper-->
                        </div>


                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                       
                            <div id="address_info" data-kt-stepper-element="content">
                           
                            <!--begin::Wrapper-->
                            @if($address)
                             <form method="POST" action="{{url('student/updateAddress')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                            @csrf
                            <input type="hidden" name="tab" value="address">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Your Contact Address</h2>
                                </div>


                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Country</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
             <input name="id" type="hidden" id="street_name" readonly class="" value="{{$student->id}}" />


                                    <select name="countries_id" readonly id="countries_id" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select a Country...</option>
                                        @foreach($countries as $country)
                            <option  value="{{ $country->id }}" {{ ( $country->id == $address->country) ? 'selected' : '' }}>{{$country->country_name}}</option>
                                
                                    @endforeach                                                
                                            </select>
                                             @error('countries_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->

                                </div>

                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Street Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="street_name" readonly id="street_name" class="form-control form-control-lg form-control-solid" value="{{$address->street_name}}" />
                            @error('street_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">City</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="city_name" id="city_name" readonly class="form-control form-control-lg form-control-solid" value="{{$address->city}}" />
                                        <!--end::Input-->
                                         @error('city_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Province / State</label>
                                       <input name="province_state" readonly id="province_state" class="form-control form-control-lg form-control-solid" value="{{$address->state}}" />
                                        <!--end::Input-->
                                         @error('province_state')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Zip Code</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="zip_code" id="zip_code" readonly class="form-control form-control-lg form-control-solid" value="{{$address->zipcode}}" />
                                        <!--end::Input-->
                                         @error('zip_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                               
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                               
                                <!--end::Wrapper-->
                            </div>
                            </form>

                            @endif
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        
                         <div id="language_info" data-kt-stepper-element="content">
                            
                            <!--begin::Wrapper-->
                           @if($language)
                       <form method="POST" action="{{url('student/updateLanguageScore')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                           @csrf
                            <input type="hidden" value="{{$language->student_id}}" readonly name="id" value="language_score">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Language Score</h2>
                                    <div class="text-muted fw-bold fs-6">Setup your Language Score

                                    </div>
                                </div>


                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                                    <span class="required">Latest English Exam Type
                                                    </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select readonly  name="exam_type" id="knowledge_skill_exam_id" aria-label="Select one" data-control="select2" data-placeholder="Select language score type ...." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option disabled value="">Select language score type ...</option>
                                        <option value="Other" >I donot have ...</option>
                                        @if($language->exam_type == 'IELTS')
                                        <option value="IELTS" selected>IELTS</option>
                                        @else
                                        <option value="IELTS">IELTS</option>
                                        @endif
                                         @if($language->exam_type == 'Pearson')
                                        <option value="Pearson" selected >Pearson</option>
                                         @else
                                         <option value="Pearson" >Pearson</option>
                                          @endif
                                           @if($language->exam_type == 'Duolingo')
                                        <option value="Duolingo" selected>Duolingo</option>
                                         @else
                                         <option value="Duolingo" >Duolingo</option>
                                         @endif
                                         </select>
                                         @error('exam_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->

                                </div>

                                <div class="knowledge_skill_exam_id">
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Speaking Score</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="speaking_score" readonly  id="speaking_score" class="form-control form-control-lg form-control-solid" value="{{$language->speaking_score}}" onkeyup="return averageScoreCheck();" />
                                        <!--end::Input-->
                                        @error('speaking_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Reading Score</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="reading_score" readonly id="reading_score" class="form-control form-control-lg form-control-solid" value="{{$language->reading_score}}" onkeyup="return averageScoreCheck();" />
                                        <!--end::Input-->
                                        @error('reading_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Writing Score</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="writing_score" readonly  id="writing_score" class="form-control form-control-lg form-control-solid" value="{{$language->writing_score}}" onkeyup="return averageScoreCheck();" />
                                        <!--end::Input-->
                                        @error('writing_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Listening Score</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="listening_score" readonly id="listening_score" class="form-control form-control-lg form-control-solid" value="{{$language->listening_score}}" onkeyup="return averageScoreCheck();" />
                                        <!--end::Input-->
                                        @error('listening_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">Average Score</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="average_score" readonly id="average_score" class="form-control form-control-lg form-control-solid" value="{{$language->average_score}}" />
                                        <!--end::Input-->
                                        @error('average_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Exam Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="ab_datepicker_examdate" readonly name="exam_date" placeholder="Select a date" class="form-control mb-2" value="{{$language->exam_date}}" />
                                        <!--end::Input-->
                                        @error('exam_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->
                                </div>



                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                            
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                               
                                <!--end::Wrapper-->
                            </div>
                            </form>
                         
                             @endif
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                      
                        <div id="gpa_info" data-kt-stepper-element="content">
                        
                            <!--begin::Wrapper-->
                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('student/updateGpaScore')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                           @csrf
                            <input type="hidden" name="tab" value="gpa_score">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">GPA Score</h2>
                                    <div class="text-muted fw-bold fs-6">Setup your GPA Score

                                    </div>
                                </div>


                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                                    <span class="required">GPA Scale
                                                    </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="hidden" name="country_id[]" id="country_id" value="1">
                                    <select name="gpa_scale" readonly id="gpa_id" aria-label="Select scale" data-control="select2" data-placeholder="Select scale ...." class="form-select form-select-solid form-select-lg fw-bold">
                                        <option disabled value="">Select scale ...</option>
                                         @if($student->gpa_scale == '0-4')                                                                                           <option value="1" >1-100</option>
                                     <option value="0-4" selected>0-4</option>
                                     @else
                                    <option value="0-4">0-4</option>
                                     @endif

                                     @if($student->gpa_scale == 'F to A +') 
                                    <option value="F to A +" selected>F to A +</option>
                                    @else
                                    <option value="F to A +" >F to A +</option>
                                     @endif                                                                              </select>

                                     @error('gpa_scale')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->

                                </div>

                                <!--begin::Input group-->
                                <div class=" fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label required">GPA Score</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="gpa_score" readonly id="gpa_total" class="form-control form-control-lg form-control-solid" value="{{$student->gpa_score}}" />
                                    @error('gpa_score')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    <!--end::Input-->

                                </div>
                                <!--end::Input group-->




                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->
                            </div>
                            </form>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                         
                        <div id="academic_info" data-kt-stepper-element="content">
                       
                            <!--begin::Wrapper-->
                            @if(count($academics) != 0)
                            <form method="POST" action="{{url('student/updateacademic')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                            @csrf
                            <input type="hidden" name="tab" value="academic_info">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Academic Information
                                    </h2>
                                    <div class="text-muted fw-bold fs-6">Set up your Academic Information
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h2 class="fw-bolder text-dark">Educational History

                                        </h2>
                                        <div class="text-muted fw-bold fs-6">Add more school / college information by clicking add button


                                        </div>
                                    </div>

                                    <div id="ed_info_repeater">
                                        <div class="form-group bg-light-warning rounded border-primary border border-dashed p-6">
                                            <div class="form-row">
                                                <div class="form-flex">
                                                    <div class="form-group">
                                                        <h2>Educational History</h2>
                                                        <h4 class="text-danger">Please Fill All The Fields</h4>
                                                        <div class="table-repsonsive">
                                                            <span id="error"></span>
                                                            <table class="table" id="item_table">
                                                                <tr>
                                                                    <th>
                                                                    <button type="button" id="addschool" data-repeater-create class="btn btn-primary add_button_diploma">
                                                                            Add New School Info
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </table>

                                                            <div class="field_wrapper_diploma"
                                                                id="multi_cat_subcat_diploma">
                                                                @foreach($academics as $academic)
                                                                     <div class="group_cat_sub_cat group_diploma">
                                                                        <div class="form-group">
                                                                            <table class="table"
                                                                                id="edu_history_table">
                                                                                <tr>
                                                                                    <td>School Name : <input type="text" readonly value="{{$academic->school_name}}"
                                                                                            name="school_name[]"
                                                                                            placeholder="School name"
                                                                                            class="form-control edu_school_name"/>
                                                                                    </td>
                                                                                    <td>Street Name : <input type="text" readonly value="{{$academic->street_name}}"
                                                                                            name="street_name[]"
                                                                                            placeholder="Street Name"
                                                                                            class="form-control edu_street_name"/>
                                                                                    </td>
                                                                                    <td>Country : 
                                                                                        <select readonly name="country[]"
                                                                                                id="edu_country_id_1"
                                                                                                class="form-control edu_country_id"
                                                                                                >
                                                                                            <option value="">-Select
                                                                                                Country-
                                                                                            </option>
                                                                                       @foreach($countries as $country)
                            <option  value="{{ $country->id }}" {{ ( $country->id == $academic->country) ? 'selected' : '' }}>{{$country->country_name}}</option>
                                
                                    @endforeach    
                                                                                                           
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Province : <input type="text" readonly value="{{$academic->province_state}}"
                                                                                            name="province_state[]"
                                                                                            placeholder="Province"
                                                                                            class="form-control edu_province_name"/>
                                                                                    </td>
                                                                                    <td>Zip Code : 
                                                                                        <input type="text" readonly value="{{$academic->zipcode}}"
                                                                                            name="zipcode[]"
                                                                                            placeholder="Zip code"
                                                                                            class="form-control edu_zipcode"/>
                                                                                    </td>
                                                                                    <td>City Name : 
                                                                                        <input type="text" readonly value="{{$academic->city}}" name="city[]" placeholder="City Name" class="form-control edu_city_name"/>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Passed Year : 
                                                                                        
                                                                                     <input id="ab_datepicker_examdate" readonly name="passed_year[]" placeholder="Select a date" class="form-control mb-2 flatpickr-input active flat_datepicker" value="{{$academic->passed_year}}" />
                                                                                    </td>
                                                                                    <td>Level of study :
                                                                                        <select readonly  name="level_of_study[]"
                                                                                                class="form-control edu_program_study_id" style="width: 210px;">
                                                                                            <option value="">-Select Level of study-</option>
                                                                                            @if($academic->level_of_study == 'English Program' )
                                                                                            <option value="English Program" selected>English Program</option>
                                                                                            @else
                                                                                            <option value="English Program">English Program</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'High School' )
                                                                                            <option value="High School" selected>High School</option>
                                                                                            @else
                                                                                            <option value="High School">High School</option>
                                                                                            @endif
                                                                                           @if($academic->level_of_study == 'Diploma' )
                                                                                            <option value="Diploma" selected>Diploma</option>
                                                                                            @else
                                                                                            <option value="Diploma">Diploma</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'Bachelors Degree' )
                                                                                            <option value="Bachelors Degree" selected>Bachelors Degree</option>
                                                                                            @else
                                                                                            <option value="Bachelors Degree">Bachelors Degree</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'Masters Degree' )
                                                                                            <option value="Masters Degree" selected>Masters Degree</option>
                                                                                            @else
                                                                                            <option value="Masters Degree">Masters Degree</option>
                                                                                            @endif
                                                                                             @if($academic->level_of_study == 'Advance Diploma' )
                                                                                            <option value="Advance Diploma" selected>Advance Diploma</option>
                                                                                            @else
                                                                                            <option value="Advance Diploma">Advance Diploma</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'Graduate Diploma' )
                                                                                            <option value="Graduate Diploma" selected>Graduate Diploma</option>
                                                                                            @else
                                                                                            <option value="Graduate Diploma">Graduate Diploma</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'Pathway Degree' )
                                                                                            <option value="Pathway Degree" selected>Pathway Degree</option>
                                                                                            @else
                                                                                            <option value="Pathway Degree">Pathway Degree</option>
                                                                                            @endif
                                                                                            @if($academic->level_of_study == 'Pathway Degree' )
                                                                                            <option value="Associate Degree" selected>Associate Degree</option>
                                                                                            @else
                                                                                            <option value="Associate Degree">Associate Degree</option>
                                                                                            @endif
                                                                                         </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                    @endforeach


                                                                    <div id="accc" style="display:none;" class="group_cat_sub_cat group_diploma">
                                                                        <div class="form-group">
                                                                            <table class="table"
                                                                                id="edu_history_table">
                                                                                <tr>
                                                                                    <td>School Name : <input type="text" value=""
                                                                                            name="school_name[]"
                                                                                            placeholder="School name"
                                                                                            class="form-control edu_school_name"/>
                                                                                    </td>
                                                                                    <td>Street Name : <input type="text" value=""
                                                                                            name="street_name[]"
                                                                                            placeholder="Street Name"
                                                                                            class="form-control edu_street_name"/>
                                                                                    </td>
                                                                                    <td>Country : 
                                                                                        <select name="country[]"
                                                                                                id="edu_country_id_1"
                                                                                                class="form-control edu_country_id"
                                                                                               >
                                                                                            <option value="">-Select
                                                                                                Country-
                                                                                            </option>
                                                                                        @foreach($countries as $country)
                                                                             <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                                                @endforeach  
                                                                                                           
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Province : <input type="text" value=""
                                                                                            name="province_state[]"
                                                                                            placeholder="Province"
                                                                                            class="form-control edu_province_name"/>
                                                                                    </td>
                                                                                    <td>Zip Code : 
                                                                                        <input type="text" value=""
                                                                                            name="zipcode[]"
                                                                                            placeholder="Zip code"
                                                                                            class="form-control edu_zipcode"/>
                                                                                    </td>
                                                                                    <td>City Name : 
                                                                                        <input type="text" value="" name="city[]" placeholder="City Name" class="form-control edu_city_name"/>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Passed Year : 
                                                                                        
                                                                                     <input id="ab_datepicker_examdate" name="passed_year[]" placeholder="Select a date" class="form-control mb-2 flatpickr-input active flat_datepicker" value="" />
                                                                                    </td>
                                                                                    <td>Level of study :
                                                                                        <select name="level_of_study[]"
                                                                                                class="form-control edu_program_study_id" style="width: 210px;">
                                                                                            <option value="">-Select Level of study-</option>
                                                                                            <option value="English Program">English Program</option>
                                                                                            <option value="High School">High School</option>
                                                                                            <option value="Diploma">Diploma</option>
                                                                                            <option value="Bachelors Degree">Bachelors Degree</option>
                                                                                            <option value="Masters Degree">Masters Degree</option>
                                                                                            <option value="Advance Diploma">Advance Diploma</option>
                                                                                            <option value="Graduate Diploma">Graduate Diploma</option>
                                                                                            <option value="Pathway Degree">Pathway Degree</option>
                                                                                            <option value="Associate Degree">Associate Degree</option>
                                                                                         </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <hr>
                                                                    </div>


                                                                    </div>
                                                            <input type="hidden" name="diploma_xCount"
                                                                id="diploma_xCount" value="">
                                                            <input type="hidden" name="diploma_divCount"
                                                                id="diploma_divCount" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    


                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                              
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->
                            </div>
                            </form>

                            @endif
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Step 6 - emergency contact-->
                      
                         <div id="emergency_info"  data-kt-stepper-element="content">
                           
                            <!--begin::Wrapper-->
                            <!--begin::Wrapper-->
                            @if($contact)
 <form method="POST" action="{{url('student/updateContact')}}" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                             @csrf
                            <input type="hidden" name="id" value="{{$contact->student_id}}">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Emergency Contact Person Information
                                    </h2>
                                    <div class="text-muted fw-bold fs-6">Please provide you Emergency Contact Person Information here

                                    </div>
                                </div>


                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Contact Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_name" readonly id="e_contact_name" class="form-control form-control-lg form-control-solid" value="{{$contact->contact_name}}" />
                                        <!--end::Input-->
                                          @error('contact_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Relationship</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="relationship" readonly  id="e_relationship" class="form-control form-control-lg form-control-solid" value="{{$contact->relationship}}" />
                                        <!--end::Input-->
                                          @error('relationship')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Telephone Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_phone" readonly id="e_contact_phone" class="form-control form-control-lg form-control-solid" value="{{$contact->phone_number}}" />
                                        <!--end::Input-->
                                          @error('contact_phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="contact_email" readonly id="e_contact_email" class="form-control form-control-lg form-control-solid" value="{{$contact->email}}" />
                                        <!--end::Input-->
                                          @error('contact_email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->



                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                              
                                <!--end::Wrapper-->
                            </div>
                            </form>
                            
                            @endif
                                    <!--end::Wrapper-->
                        </div>
                        <!--end::Step 6-->
                        <!--begin::Step 7 - professional Information-->
                       
                       <div id="documents_info" data-kt-stepper-element="content">
                           
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
                                            <label for="images" class="drop-container">
                                         <div class="dropzone" id="dropzone_passport">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                     
                                                        </div>
                                                 </div>
                                                </div><br>
                                                @if(count($passportimage) != '0')
                                                 @foreach($passportimage as $passportimages)
                            <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter"  src="{{asset('public/StudentPassportImage/'.$passportimages->image)}}"  width="100" height="100">
                            <a href="{{url('student/delete-passport/'.$passportimages->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </label>

                                            </div>
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <label class="form-label">English Language Proficiency Certificate</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
<label for="images" class="drop-container">
                                                <div class="dropzone" id="dropzone_language">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload</h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div><br>
                                         <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentEnglishCertificate/'.$student->english_certificate)}}" width="100" height="100">
                                            </label>


                                        </div>
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
                                    <label class="form-label">Marksheets (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">

                                        <div class="col-lg-12">
                                            <label for="images" class="drop-container">

                                                <div class="dropzone" id="dropzone_marksheet">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div><br>
                                                 @if(count($marksheet) != '0')
                                                  @foreach($marksheet as $marksheets)
                            <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentMarksheetImage/'.$marksheets->marksheet)}}" width="100" height="100">
                            <a href="{{url('student/delete-marksheet/'.$marksheets->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label">CV/ Resume</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                            <label for="images" class="drop-container">
                                            <div class="dropzone" id="dropzone_cv">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload</h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div><br>
                                             <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentResume/'.$student->resume)}}" width="100" height="100">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label">Recommendations (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                            <label for="images" class="drop-container">
                                                                                            <div class="dropzone" id="dropzone_recommendation">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <br>
                                                @if(count($recommendation) != '0')
                                                 @foreach($recommendation as $recommendations)
                            <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentRecommandation/'.$recommendations->recommand)}}" width="100" height="100">
                            <a href="{{url('student/delete-recommendations/'.$recommendations->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label">Financial Documents (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                            <label for="images" class="drop-container">
                                                                                            <div class="dropzone" id="dropzone_finance">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                         </div><br>
                                                @if(count($financial) != '0')
                                                @foreach($financial as $financials)
                            <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentFinanicalImage/'.$financials->financial_images )}}" width="100" height="100">
                            <a href="{{url('student/delete-financials/'.$financials->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label">Other attachment (Choose Multiple)</label>
                                    <div class="form-group row rounded border p-10">
                                        <div class="col-lg-12">
                                             <label for="images" class="drop-container">
                                                    <div class="dropzone" id="dropzone_other">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload</h3>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                         </div><br>
                                                 @if(count($other) != '0')
                                @foreach($other as $others)
                            <img onclick="onClick(this)" data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('public/StudentOther/'.$others->other_image)}}" width="100" height="100">
                            <a href="{{url('student/delete-other/'.$others->id)}}" id="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endforeach
                            @endif
                                            </label>
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
                                
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                               
                                <!--end::Wrapper-->
                            </div>
                            </form>
                            <!--end::Input group-->
                        </div>
                        <!--end::Step 7-->
                        <!--begin::Step 8 - Consent and Signature-->
                      
             
                        <!--end::Step 8-->



                        <!-- final step -->
                             
                        <div class="" data-kt-stepper-element="content">


                            <form method="POST" action="#" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
                            <input type="hidden" name="tab" value="completed">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Your application update journey has been completed successfully.
                                    </h2>
                                    <div class="text-muted fw-bold fs-6">If anything is missing you can hit back button and update accordingly.

                                    </div>
                                </div>

                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="mr-2">
                                    <a href="#">Back</a>
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">Back</button>
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <!--end::Wrapper-->
                            </div>
                            </form>
                        </div>


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

<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 50%;height: 250px;">
     
        
        
      
      
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="cress">&times;</span>
        </button>
      <img id="img01">

      </div>
     

    </div>
  </div>
</div>




<!--begin::Scrolltop-->

<!--end::Scrolltop-->
<!--end::Main-->

<script src="{{asset('/assets/js/click.js')}}" ></script>
<script src="{{asset('assets/js/toggle.js')}}"></script>


<!--end::Page Custom Javascript-->

<!--end::Javascript-->

    <script>
        $('#addVideosBtn').click(function() {
  $(this).parents().find('#addVideosInput').click();
});

document.getElementById('addVideosInput').onchange = e => {
  const file = e.target.files[0];
  const url = URL.createObjectURL(file);
  const li = ` <li> <video controls="controls" src=" ${url} " type="video/mp4" width="400px" height="200px"></video>
       <span><i class="fa fa-trash"></i></span>
   </li>`
  $('.video-list ul').append(li);
};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.0.js"> </script>
     <script>

   <script>

jQuery(document).ready(function(){
    jQuery('.personal').on('click', function(event) {
      
      jQuery('#personal_info').show();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
});

jQuery(document).ready(function(){
    jQuery('.address').on('click', function(event) {
      
      jQuery('#personal_info').hide();
      jQuery('#address_info').show();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.add("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");

  });
  });
jQuery(document).ready(function(){
    jQuery('.language').on('click', function(event) {
     
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').show();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.add("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
  });
jQuery(document).ready(function(){
    jQuery('.gpa').on('click', function(event) {
     
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').show();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.add("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
  });
jQuery(document).ready(function(){
    jQuery('.academic').on('click', function(event) {
     
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').show();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();
      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.add("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
  });
jQuery(document).ready(function(){
    jQuery('.emergency').on('click', function(event) {
     
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').show();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').hide();
      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.add("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
  });
jQuery(document).ready(function(){
    jQuery('.documents').on('click', function(event) {
      
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').show();
      jQuery('#signature_info').hide();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.add("current");
      var signss = document.getElementById("signss");
      signss.classList.remove("current");
  });
  });
jQuery(document).ready(function(){
    jQuery('.signature').on('click', function(event) {
      
      jQuery('#personal_info').hide();
      jQuery('#address_info').hide();
      jQuery('#language_info').hide();
      jQuery('#gpa_info').hide();
      jQuery('#academic_info').hide();
      jQuery('#emergency_info').hide();
      jQuery('#documents_info').hide();
      jQuery('#signature_info').show();

      var personals = document.getElementById("personals");
      personals.classList.remove("current");
      var addresss = document.getElementById("addresss");
      addresss.classList.remove("current");
      var languages = document.getElementById("languages");
      languages.classList.remove("current");
      var gpas = document.getElementById("gpas");
      gpas.classList.remove("current");
      var academics = document.getElementById("academics");
      academics.classList.remove("current");
      var contacts = document.getElementById("contacts");
      contacts.classList.remove("current");
      var documentss = document.getElementById("documentss");
      documentss.classList.remove("current");
      var signss = document.getElementById("signss");
      signss.classList.add("current");
  });
  });

setTimeout(function() {
  $('.text-danger').fadeOut('fast');
}, 5000); // <-- time in milliseconds

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    setTimeout(function() {
    $('#savestudent').fadeOut('fast');
}, 5000);
    
$(document).ready(function(){
  $("#addschool").click(function(){
    var res = $('#accc').html();
   
   $('#multi_cat_subcat_diploma').append(res);
  });
});


function onClick(element) {
          
           document.getElementById("img01").src = element.src;
           document.getElementById("exampleModalCenter").style.display = "block";
     }

</script>




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
