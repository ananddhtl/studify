 @include('institution.header')

 <span id="message_container_display"></span>

 <!--begin::Content-->
 <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
     <!--begin::Post-->
     <div class="post d-flex flex-column-fluid" id="kt_post">
         <!--begin::Container-->
         <div id="kt_content_container" class="container-xxl">

             <!--begin::Stepper-->
             <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                 id="application_manager_stepper">
                 <!--begin::Aside-->
                 <div
                     class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                     <!--begin::Wrapper-->
                     <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                         <!--begin::Nav-->
                         <div class="stepper-nav">
                             <!--begin::Step 1-->
                             @if(request()->session()->get('status') == 'personal')
                             <div class="stepper-item current" id="personal_info" data-kt-stepper-element="nav"
                                 data-kt-stepper-action="step">
                                 @else
                                 <div class="stepper-item" id="personal_info" data-kt-stepper-element="nav"
                                     data-kt-stepper-action="step">
                                     @endif
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
                                 @if(request()->session()->get('status') == 'about')
                                 <div class="stepper-item current" id="about_info" data-kt-stepper-element="nav"
                                     data-kt-stepper-action="step">
                                     @else
                                     <div class="stepper-item" id="about_info" data-kt-stepper-element="nav"
                                         data-kt-stepper-action="step">
                                         @endif
                                         <!--begin::Line-->
                                         <div class="stepper-line w-40px"></div>
                                         <!--end::Line-->
                                         <!--begin::Icon-->
                                         <div class="stepper-icon w-40px h-40px about">
                                             <i class="stepper-check fas fa-check"></i>
                                             <span class="stepper-number">2</span>
                                         </div>
                                         <!--end::Icon-->
                                         <!--begin::Label-->
                                         <div class="stepper-label about">
                                             <h3 class="stepper-title">About</h3>
                                             <div class="stepper-desc fw-bold">Add your correspondence info</div>
                                         </div>
                                         <!--end::Label-->
                                     </div>
                                     <!--end::Step 2-->
                                     <!--begin::Step 3-->
                                     @if(request()->session()->get('status') == 'glance')
                                     <div class="stepper-item current" id="glance_info" data-kt-stepper-element="nav"
                                         data-kt-stepper-action="step">
                                         @else
                                         <div class="stepper-item" id="glance_info" data-kt-stepper-element="nav"
                                             data-kt-stepper-action="step">
                                             @endif
                                             <!--begin::Line-->
                                             <div class="stepper-line w-40px"></div>
                                             <!--end::Line-->
                                             <!--begin::Icon-->
                                             <div class="stepper-icon w-40px h-40px glance">
                                                 <i class="stepper-check fas fa-check"></i>
                                                 <span class="stepper-number">3</span>
                                             </div>
                                             <!--end::Icon-->
                                             <!--begin::Label-->
                                             <div class="stepper-label glance">
                                                 <h3 class="stepper-title">At a Glance</h3>
                                                 <div class="stepper-desc fw-bold">Add your Glance info</div>
                                             </div>
                                             <!--end::Label-->
                                         </div>
                                         <!--end::Step 3-->
                                         <!--begin::Step 4-->
                                         @if(request()->session()->get('status') == 'video')
                                         <div class="stepper-item current" id="video_info" data-kt-stepper-element="nav"
                                             data-kt-stepper-action="step">
                                             @else
                                             <div class="stepper-item" id="video_info" data-kt-stepper-element="nav"
                                                 data-kt-stepper-action="step">
                                                 @endif
                                                 <!--begin::Line-->
                                                 <div class="stepper-line w-40px"></div>
                                                 <!--end::Line-->
                                                 <!--begin::Icon-->
                                                 <div class="stepper-icon w-40px h-40px video">
                                                     <i class="stepper-check fas fa-check"></i>
                                                     <span class="stepper-number">4</span>
                                                 </div>
                                                 <!--end::Icon-->
                                                 <!--begin::Label-->
                                                 <div class="stepper-label video">
                                                     <h3 class="stepper-title">Video Tour</h3>
                                                     <div class="stepper-desc fw-bold">Add your Video Tour</div>
                                                 </div>
                                                 <!--end::Label-->
                                             </div>
                                             <!--end::Step 4-->

                                             <!--begin::Step 5-->
                                             @if(request()->session()->get('status') == 'gallery')
                                             <div class="stepper-item current" id="gallery_info"
                                                 data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                                 @else
                                                 <div class="stepper-item" id="gallery_info"
                                                     data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                                     @endif
                                                     <!--begin::Line-->
                                                     <div class="stepper-line w-40px"></div>
                                                     <!--end::Line-->
                                                     <!--begin::Icon-->
                                                     <div class="stepper-icon w-40px h-40px gallery">
                                                         <i class="stepper-check fas fa-check"></i>
                                                         <span class="stepper-number">5</span>
                                                     </div>
                                                     <!--end::Icon-->
                                                     <!--begin::Label-->
                                                     <div class="stepper-label gallery">
                                                         <h3 class="stepper-title">Gallery</h3>
                                                         <div class="stepper-desc fw-bold">Photo Gallery</div>
                                                     </div>
                                                     <!--end::Label-->
                                                 </div>

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
                                         @if(request()->session()->get('status') == 'personal')
                                         <div class="current" id="personal" data-kt-stepper-element="content">
                                             @else
                                             <div class="" id="personal" data-kt-stepper-element="content">
                                                 @endif

                                                 <?php if ($institution){ ?>
                                                 <!--begin::Wrapper-->
                                                 <form method="POST"
                                                     action="{{url('/institution/updateinstitutioninfo')}}"
                                                     accept-charset="UTF-8"
                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                     id="application_manager_form" novalidate="novalidate"
                                                     enctype="multipart/form-data"><input name="_token" type="hidden"
                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp"
                                                         enctype="multipart/form-data">
                                                     @csrf
                                                     <input type="hidden" name="tab" value="personal_info">
                                                     <div class="w-100">

                                                         <!--begin::Heading-->
                                                         <div class="pb-10 pb-lg-12">
                                                             <!--begin::Title-->
                                                             <h2 class="fw-bolder text-dark">Personal Information</h2>
                                                             <!--end::Title-->
                                                             <!--begin::Notice-->
                                                             <div class="text-muted fw-bold fs-6">Please enter your
                                                                 infomation and proceed to next step so we can build
                                                                 your account

                                                             </div>
                                                             <!--end::Notice-->
                                                         </div>
                                                         <!--end::Heading-->
                                                         <!--begin::Input group-->
                                                         <div class="row fv-row mb-10">

                                                             <div class="col-6">
                                                                 <!--begin::Label-->
                                                                 <label class="form-label required">University
                                                                     Name</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="universirty_name" id="first_name"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->universirty_name}}" /><br>


                                                                 <label class="form-label required">University
                                                                     Type</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input type="hidden" name="id"
                                                                     value="{{$institution->id}}" />


                                                                 <input name="univ_type" id="univ_type"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->univ_type}}" /><br>
                                                                 <!--end::Input-->
                                                                 <label class="form-label required">International
                                                                     Student</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="international_student"
                                                                     id="international_student"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->international_student}}" /><br>
                                                                 <label class="form-label required">Location</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="location" id="location"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->location}}" /><br>
                                                             </div>
                                                             <div class="col-6">
                                                                 <!--begin::Label-->
                                                                 <label class="form-label required">Founded</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->

                                                                 <input name="founded" id="founded"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->founded}}" /><br>
                                                                 <!--end::Input-->

                                                                 <label class="form-label required">Type</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="type" id="type"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="{{$institution->type}}" /><br>
                                                                 <label class="form-label required">Location</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <select class="form-select" name="country"
                                                                     aria-label="Default select example">
                                                                     <option selected>Open this select country</option>
                                                                     @foreach($country as $countrys)
                                                                     <option value="{{$countrys->country_name}}"
                                                                         {{$institution->country == $countrys->country_name  ? 'selected' : ''}}>
                                                                         {{$countrys->country_name}}</option>
                                                                     @endforeach
                                                                 </select>

                                                             </div>
                                                         </div>


                                                         <!--end::Input group-->



                                                         <!--begin::Input group-->
                                                         <div class="fv-row">

                                                             <label for="avatar">Choose a University
                                                                 picture:</label>
                                                             <br>
                                                             <img src="{{asset('public/InstitutionImage/'.$institution->univ_img)}}"
                                                                 width="200" height="80">
                                                             <br><br>
                                                             <input type="file" id="avatar" name="univ_img"
                                                                 accept="image/png, image/jpeg">
                                                             <!--end::Dropzone-->
                                                         </div><br>

                                                         <div class="fv-row">

                                                             <label for="avatar">Choose a Thumbnail
                                                                 picture:</label><br>
                                                             <img src="{{asset('public/InstitutionImage/'.$institution->thumbnail)}}"
                                                                 width="200" height="80">
                                                             <br><br>
                                                             <input type="file" id="avatar" name="thumbnail"
                                                                 accept="image/png, image/jpeg">
                                                             <!--end::Dropzone-->
                                                         </div><br>

                                                         <!--end::Input group-->
                                                         <button type="submit" class="submit">Update</button>


                                                     </div>

                                                 </form>
                                                 <?php } else { ?>
                                                 <form method="POST" action="{{url('/institution/addinstitution')}}"
                                                     accept-charset="UTF-8"
                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                     id="application_manager_form" novalidate="novalidate"
                                                     enctype="multipart/form-data"><input name="_token" type="hidden"
                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp"
                                                         enctype="multipart/form-data">
                                                     @csrf
                                                     <input type="hidden" name="tab" value="personal_info">
                                                     <div class="w-100">
                                                         <!--begin::Heading-->
                                                         <div class="pb-10 pb-lg-12">
                                                             <!--begin::Title-->
                                                             <h2 class="fw-bolder text-dark">Personal Information</h2>
                                                             <!--end::Title-->
                                                             <!--begin::Notice-->
                                                             <div class="text-muted fw-bold fs-6">Please enter your
                                                                 infomation and proceed to next step so we can build
                                                                 your account

                                                             </div>
                                                             <!--end::Notice-->
                                                         </div>
                                                         <!--end::Heading-->
                                                         <!--begin::Input group-->
                                                         <div class="row fv-row mb-10">

                                                             <div class="col-6">
                                                                 <!--begin::Label-->
                                                                 <label class="form-label required">University
                                                                     Name</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="universirty_name" id="first_name"
                                                                     value="{{Session::get('institution_name')}}"
                                                                     class="form-control form-control-lg form-control-solid" />


                                                                 <label class="form-label required">University
                                                                     Type</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="univ_type" id="univ_type"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="" />
                                                                 <!--end::Input-->
                                                                 <label class="form-label required">International
                                                                     Student</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="international_student"
                                                                     id="international_student"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="" />
                                                                 <label class="form-label required">Location</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="location" id="location"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="" />
                                                             </div>
                                                             <div class="col-6">
                                                                 <!--begin::Label-->
                                                                 <label class="form-label required">Founded</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->

                                                                 <input name="founded" id="founded"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="" />
                                                                 <!--end::Input-->

                                                                 <label class="form-label required">Type</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <input name="type" id="type"
                                                                     class="form-control form-control-lg form-control-solid"
                                                                     value="" />

                                                                 <label class="form-label required">Location</label>
                                                                 <!--end::Label-->
                                                                 <!--begin::Input-->
                                                                 <select class="form-select" name="country"
                                                                     aria-label="Default select example">
                                                                     <option selected>Open this select country</option>
                                                                     @foreach($country as $countrys)
                                                                     <option value="{{$countrys->country_name}}">
                                                                         {{$countrys->country_name}}</option>
                                                                     @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>


                                                         <!--end::Input group-->



                                                         <!--begin::Input group-->
                                                         <div class="fv-row">

                                                             <label for="avatar">Choose a University
                                                                 picture:</label>



                                                             <input type="file" id="avatar" name="univ_img"
                                                                 accept="image/png, image/jpeg">
                                                             <!--end::Dropzone-->
                                                         </div><br>

                                                         <div class="fv-row">

                                                             <label for="avatar">Choose a Thumbnail
                                                                 picture:</label>

                                                             <input type="file" id="avatar" name="thumbnail"
                                                                 accept="image/png, image/jpeg">
                                                             <!--end::Dropzone-->
                                                         </div>

                                                         <!--end::Input group-->
                                                         <button type="submit" class="submit">Next</button>


                                                     </div>

                                                 </form>
                                                 <?php } ?>
                                                 <!--end::Wrapper-->

                                             </div>


                                             <!--end::Step 1-->
                                             <!--begin::Step 2-->
                                             @if(request()->session()->get('status') == 'about')
                                             <div class="current" id="about" data-kt-stepper-element="content">
                                                 @else
                                                 <div class="" id="about" data-kt-stepper-element="content">
                                                     @endif
                                                     <!--begin::Wrapper-->

                                                     <?php if ($institution){ ?>

                                                     <form method="POST" action="{{url('/institution/aboutInfo')}}"
                                                         accept-charset="UTF-8"
                                                         class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                         id="application_manager_form" novalidate="novalidate"
                                                         enctype="multipart/form-data"><input name="_token"
                                                             type="hidden"
                                                             value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                         @csrf
                                                         <input type="hidden" name="id" value="{{$institution->id}}" />
                                                         <input type="hidden" name="tab" value="address">
                                                         <div class="w-100">
                                                             <!--begin::Heading-->
                                                             <div class="pb-10 pb-lg-12">
                                                                 <!--begin::Title-->
                                                                 <h2 class="fw-bolder text-dark">About</h2>
                                                             </div>


                                                             <!--begin::Input group-->
                                                             <div class="fv-row mb-10">
                                                                 <label class="form-label required">Universities
                                                                     Heading</label>
                                                                 <br>
                                                                 <input type="text" placeholder="Enter heading"
                                                                     id="username" name="aboutheading"
                                                                     value="{{$institution->about_heading}}"
                                                                     class="collhead">
                                                                 <br>
                                                                 <label class="form-label required">Universities
                                                                     Description</label><br>
                                                                 <textarea id="freeform" name="aboutparagraph"
                                                                     value="{{$institution->about_paragraph}}" rows="6"
                                                                     cols="80">
{{$institution->about_paragraph}}
</textarea>
                                                                 <br>
                                                                 <button type="submit" class="submit">Update</button>
                                                                 <!--begin::Label-->

                                                             </div>


                                                         </div>

                                                     </form>

                                                     <?php } else{ ?>
                                                     <form method="POST" action="{{url('/institution/aboutInfo')}}"
                                                         accept-charset="UTF-8"
                                                         class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                         id="application_manager_form" novalidate="novalidate"
                                                         enctype="multipart/form-data"><input name="_token"
                                                             type="hidden"
                                                             value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                         @csrf

                                                         <input type="hidden" name="tab" value="address">
                                                         <div class="w-100">
                                                             <!--begin::Heading-->
                                                             <div class="pb-10 pb-lg-12">
                                                                 <!--begin::Title-->
                                                                 <h2 class="fw-bolder text-dark">About</h2>
                                                             </div>


                                                             <!--begin::Input group-->
                                                             <div class="fv-row mb-10">

                                                                 <input type="text" id="username" name="aboutheading"
                                                                     value="Heading" class="collhead">
                                                                 <br>

                                                                 <textarea id="freeform" name="aboutparagraph" rows="6"
                                                                     cols="80">
Enter text here...
</textarea>
                                                                 <button type="submit" class="submit">Next</button>
                                                                 <!--begin::Label-->

                                                             </div>


                                                         </div>

                                                     </form>
                                                     <?php } ?>
                                                     <!--end::Wrapper-->

                                                 </div>
                                                 <!--end::Step 2-->
                                                 <!--begin::Step 3-->
                                                 @if(request()->session()->get('status') == 'glance')
                                                 <div class="current" id="glance" data-kt-stepper-element="content">
                                                     @else
                                                     <div class="" id="glance" data-kt-stepper-element="content">
                                                         @endif
                                                         <!--begin::Wrapper-->

                                                         <!--begin::Wrapper-->
                                                         <form method="POST" action="{{url('/glance/update')}}"
                                                             accept-charset="UTF-8"
                                                             class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                             id="application_manager_form" novalidate="novalidate"
                                                             enctype="multipart/form-data"><input name="_token"
                                                                 type="hidden"
                                                                 value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                             <input type="hidden" name="tab" value="language_score">
                                                             @csrf
                                                             <div class="w-100">
                                                                 <!--begin::Heading-->
                                                                 <div class="pb-10 pb-lg-12">
                                                                     <!--begin::Title-->
                                                                     <h2 class="fw-bolder text-dark">Glance</h2>
                                                                     <div class="text-muted fw-bold fs-6">Add your
                                                                         glances

                                                                     </div><br>
                                                                     @if($glance!='')
                                                                     <table class="table" id="dynamicAddRemove">
                                                                         <tr>
                                                                             <th>Glance</th>
                                                                             <th>Action</th>
                                                                         </tr>
                                                                         @foreach($glance as $glances)
                                                                         <tr>
                                                                             <td><input type="text" name="moreFields[]"
                                                                                     placeholder="Enter glance"
                                                                                     class="form-control"
                                                                                     value="{{$glances->glance}}" />
                                                                             </td>
                                                                             <td><button type="button" name="add"
                                                                                     class="btn btn-danger"><a
                                                                                         href="{{url('glance/delete/'.$glances->id)}}"
                                                                                         style="color:#fff;">Delete</a></button>
                                                                             </td>
                                                                         </tr>
                                                                         @endforeach
                                                                     </table>
                                                                     <button type="button" name="add" id="add-btn"
                                                                         class="btn btn-success">Add More</button>
                                                                     @else
                                                                     <table class="table table" id="dynamicAddRemove">
                                                                         <tr>
                                                                             <th>Glance</th>
                                                                             <th>Action</th>
                                                                         </tr>
                                                                         <tr>
                                                                             <td><input type="text" name="moreFields[0]"
                                                                                     placeholder="Enter glance" value=""
                                                                                     class="form-control" /></td>
                                                                             <td><button type="button" name="add"
                                                                                     id="add-btn"
                                                                                     class="btn btn-success">Add
                                                                                     More</button></td>
                                                                         </tr>
                                                                     </table>
                                                                     @endif
                                                                     <button type="submit"
                                                                         class="btn btn-success">Save</button>
                                                                 </div>

                                                                 <!--begin::Input group-->





                                                             </div>

                                                         </form>
                                                         <!--end::Wrapper-->
                                                     </div>
                                                     <!--end::Step 3-->
                                                     <!--begin::Step 4-->
                                                     @if(request()->session()->get('status') == 'video')
                                                     <div class="current" id="video" data-kt-stepper-element="content">
                                                         @else
                                                         <div class="" id="video" data-kt-stepper-element="content">
                                                             @endif
                                                             <!--begin::Wrapper-->
                                                             <!--begin::Wrapper-->
                                                             <form method="POST"
                                                                 action="{{url('/institution/updatevideo')}}"
                                                                 accept-charset="UTF-8"
                                                                 class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                 id="application_manager_form" novalidate="novalidate"
                                                                 enctype="multipart/form-data"><input name="_token"
                                                                     type="hidden"
                                                                     value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                 @csrf
                                                                 <input type="hidden" name="tab" value="gpa_score">
                                                                 <div class="w-100">
                                                                     <!--begin::Heading-->
                                                                     <div class="pb-10 pb-lg-12">
                                                                         <!--begin::Title-->
                                                                         <h2 class="fw-bolder text-dark">Video </h2>
                                                                         <div class="text-muted fw-bold fs-6">Add your
                                                                             video

                                                                         </div>

                                                                     </div>


                                                                     <!--begin::Input group-->
                                                                     <div class="fv-row mb-10">
                                                                         <label class="form-label required">Enter Embed
                                                                             Video Url</label>
                                                                         <?php if ($institution){ ?>
                                                                         <input type="text" id="avatar"
                                                                             name="univ_video"
                                                                             value="{{$institution->video}}"
                                                                             class="form-control form-control-lg form-control-solid"
                                                                             accept="image/png, image/jpeg">
                                                                         <?php } else { ?>
                                                                         <input type="text" id="avatar"
                                                                             name="univ_video"
                                                                             class="form-control form-control-lg form-control-solid"
                                                                             accept="image/png, image/jpeg">
                                                                         <?php } ?>
                                                                     </div>
                                                                     <button type="submit" class="submit">Next</button>



                                                                     <!--begin::Input group-->

                                                                     <!--end::Input group-->




                                                                 </div>

                                                             </form>
                                                             <!--end::Wrapper-->
                                                         </div>
                                                         <!--end::Step 4-->
                                                         <!--begin::Step 5-->
                                                         @if(request()->session()->get('status') == 'gallery')
                                                         <div class="current" id="gallery"
                                                             data-kt-stepper-element="content">
                                                             @else
                                                             <div class="" id="gallery"
                                                                 data-kt-stepper-element="content">
                                                                 @endif
                                                                 <!--begin::Wrapper-->
                                                                 <form method="POST"
                                                                     action="{{url('/institution/uploadmultipleimage')}}"
                                                                     accept-charset="UTF-8"
                                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                     id="application_manager_form"
                                                                     novalidate="novalidate"
                                                                     enctype="multipart/form-data"><input name="_token"
                                                                         type="hidden"
                                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                     @csrf

                                                                     <input type="hidden" name="tab"
                                                                         value="academic_info">
                                                                     <div class="w-100">
                                                                         <!--begin::Heading-->
                                                                         <div class="pb-10 pb-lg-12">
                                                                             <!--begin::Title-->
                                                                             <h2 class="fw-bolder text-dark">Photo
                                                                                 Gallery
                                                                             </h2>
                                                                             <div class="text-muted fw-bold fs-6">Add
                                                                                 Multiple photos
                                                                             </div>
                                                                         </div>


                                                                         <div class="fv-row mb-10">
                                                                             @foreach($images as $image)
                                                                             <img src="{{asset('/public/InstitutionImage/'.$image->image)}}"
                                                                                 alt="Simply Easy Learning" width="200"
                                                                                 height="140">

                                                                             @endforeach

                                                                             <form action="/action_page.php">
                                                                                 <br><br>
                                                                                 <input type="file" id="myFile"
                                                                                     name="multipleimages[]"
                                                                                     multiple><br><br>
                                                                                 <button type="submit"
                                                                                     class="submit">Submit</button>
                                                                             </form>



                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                     </div>

                                                                 </form>
                                                             </div>
                                                             <!--end::Step 5-->
                                                             <!--begin::Step 6 - emergency contact-->
                                                             <div class="" data-kt-stepper-element="content">
                                                                 <!--begin::Wrapper-->
                                                                 <!--begin::Wrapper-->
                                                                 <form method="POST" action="#" accept-charset="UTF-8"
                                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                     id="application_manager_form"
                                                                     novalidate="novalidate"
                                                                     enctype="multipart/form-data"><input name="_token"
                                                                         type="hidden"
                                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                     <input type="hidden" name="tab"
                                                                         value="emergency_contact">
                                                                     <div class="w-100">
                                                                         <!--begin::Heading-->
                                                                         <div class="pb-10 pb-lg-12">
                                                                             <!--begin::Title-->
                                                                             <h2 class="fw-bolder text-dark">Emergency
                                                                                 Contact Person Information
                                                                             </h2>
                                                                             <div class="text-muted fw-bold fs-6">Please
                                                                                 provide you Emergency Contact Person
                                                                                 Information here

                                                                             </div>
                                                                         </div>


                                                                         <!--begin::Input group-->
                                                                         <div class="row fv-row mb-10">

                                                                             <div class="col-6">
                                                                                 <!--begin::Label-->
                                                                                 <label
                                                                                     class="form-label required">Contact
                                                                                     Name</label>
                                                                                 <!--end::Label-->
                                                                                 <!--begin::Input-->
                                                                                 <input name="e_contact_name"
                                                                                     id="e_contact_name"
                                                                                     class="form-control form-control-lg form-control-solid"
                                                                                     value="" />
                                                                                 <!--end::Input-->
                                                                             </div>
                                                                             <div class="col-6">
                                                                                 <!--begin::Label-->
                                                                                 <label
                                                                                     class="form-label required">Relationship</label>
                                                                                 <!--end::Label-->
                                                                                 <!--begin::Input-->
                                                                                 <input name="e_relationship"
                                                                                     id="e_relationship"
                                                                                     class="form-control form-control-lg form-control-solid"
                                                                                     value="" />
                                                                                 <!--end::Input-->
                                                                             </div>
                                                                         </div>
                                                                         <!--end::Input group-->

                                                                         <!--begin::Input group-->
                                                                         <div class="row fv-row mb-10">

                                                                             <div class="col-6">
                                                                                 <!--begin::Label-->
                                                                                 <label
                                                                                     class="form-label required">Telephone
                                                                                     Number</label>
                                                                                 <!--end::Label-->
                                                                                 <!--begin::Input-->
                                                                                 <input name="e_contact_phone"
                                                                                     id="e_contact_phone"
                                                                                     class="form-control form-control-lg form-control-solid"
                                                                                     value="" />
                                                                                 <!--end::Input-->
                                                                             </div>
                                                                             <div class="col-6">
                                                                                 <!--begin::Label-->
                                                                                 <label
                                                                                     class="form-label required">Email</label>
                                                                                 <!--end::Label-->
                                                                                 <!--begin::Input-->
                                                                                 <input name="e_contact_email"
                                                                                     id="e_contact_email"
                                                                                     class="form-control form-control-lg form-control-solid"
                                                                                     value="" />
                                                                                 <!--end::Input-->
                                                                             </div>
                                                                         </div>
                                                                         <!--end::Input group-->



                                                                     </div>
                                                                     <div class="d-flex flex-stack pt-10">
                                                                         <!--begin::Wrapper-->
                                                                         <div class="mr-2">
                                                                             <a href="#"
                                                                                 class="btn btn-lg btn-light-primary me-3">Back</a>

                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                         <!--begin::Wrapper-->
                                                                         <div>
                                                                             <button type="submit"
                                                                                 class="btn btn-lg btn-primary">Continue</button>
                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                     </div>
                                                                 </form>
                                                                 <!--end::Wrapper-->
                                                             </div>
                                                             <!--end::Step 6-->
                                                             <!--begin::Step 7 - professional Information-->
                                                             <div class="" data-kt-stepper-element="content">
                                                                 <!--begin::Wrapper-->
                                                                 <!--begin::Wrapper-->
                                                                 <form method="POST" action="#" accept-charset="UTF-8"
                                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework form-image-passporter"
                                                                     id="application_manager_form"
                                                                     novalidate="novalidate"
                                                                     enctype="multipart/form-data"><input name="_token"
                                                                         type="hidden"
                                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                     <input type="hidden" name="tab"
                                                                         value="professional_info">
                                                                     <div class="w-100">
                                                                         <!--begin::Heading-->
                                                                         <div class="pb-10 pb-lg-12">
                                                                             <!--begin::Title-->
                                                                             <h2 class="fw-bolder text-dark">
                                                                                 Professional Information
                                                                             </h2>
                                                                             <div class="text-muted fw-bold fs-6">Add
                                                                                 all your Professional Information
                                                                             </div>
                                                                         </div>


                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label required">Passport
                                                                                 (PNG,JPG,PDF) (Choose Multiple)</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_passport">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop files here or
                                                                                                     click to upload
                                                                                                     your passport image
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>

















                                                                                 </div>
                                                                             </div>
                                                                         </div>


                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">English Language
                                                                                 Proficiency Certificate</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">

                                                                                     <div class="dropzone"
                                                                                         id="dropzone_language">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop file here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>


                                                                                 </div>
                                                                             </div>
                                                                         </div>


                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">Marksheets
                                                                                 (Choose Multiple)</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_marksheet">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop files here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">CV/
                                                                                 Resume</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_cv">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop file here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">Recommendations
                                                                                 (Choose Multiple)</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_recommendation">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop files here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">Financial
                                                                                 Documents (Choose Multiple)</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_finance">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop files here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>

                                                                         <div class="fv-row mb-10">
                                                                             <label class="form-label">Other attachment
                                                                                 (Choose Multiple)</label>
                                                                             <div
                                                                                 class="form-group row rounded border p-10">
                                                                                 <div class="col-lg-12">
                                                                                     <div class="dropzone"
                                                                                         id="dropzone_other">
                                                                                         <!--begin::Message-->
                                                                                         <div
                                                                                             class="dz-message needsclick">
                                                                                             <!--begin::Icon-->
                                                                                             <i
                                                                                                 class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                                                             <!--end::Icon-->
                                                                                             <!--begin::Info-->
                                                                                             <div class="ms-4">
                                                                                                 <h3
                                                                                                     class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                                                     Drop files here or
                                                                                                     click to upload
                                                                                                 </h3>
                                                                                                 <span
                                                                                                     class="fs-7 fw-bold text-gray-400">Upload
                                                                                                     image file</span>
                                                                                             </div>
                                                                                             <!--end::Info-->
                                                                                         </div>
                                                                                     </div>
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
                                                                             <a href="#"
                                                                                 class="btn btn-lg btn-light-primary me-3">Back</a>

                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                         <!--begin::Wrapper-->
                                                                         <div>
                                                                             <button type="button" id="docUpload"
                                                                                 class="btn btn-lg btn-primary">Continue</button>
                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                     </div>
                                                                 </form>
                                                                 <!--end::Input group-->
                                                             </div>
                                                             <!--end::Step 7-->
                                                             <!--begin::Step 8 - Consent and Signature-->
                                                             <div class="" data-kt-stepper-element="content">
                                                                 <!--begin::Wrapper-->
                                                                 <!--begin::Wrapper-->
                                                                 <form method="POST" action="#" accept-charset="UTF-8"
                                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                     id="application_manager_form"
                                                                     novalidate="novalidate"
                                                                     enctype="multipart/form-data"><input name="_token"
                                                                         type="hidden"
                                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                     <input type="hidden" name="tab"
                                                                         value="consent_signature">
                                                                     <div class="w-100">
                                                                         <!--begin::Heading-->
                                                                         <div class="pb-10 pb-lg-12">
                                                                             <!--begin::Title-->
                                                                             <h2 class="fw-bolder text-dark">Consent and
                                                                                 Signature</h2>
                                                                             <div class="text-muted fw-bold fs-6">Setup
                                                                                 your Consent and Signature

                                                                             </div>
                                                                         </div>


                                                                         <!--begin::Input group-->
                                                                         <div class="fv-row mb-10">
                                                                             <!--begin::Label-->
                                                                             <label
                                                                                 class="d-flex align-items-center form-label">
                                                                                 <span class="">I verify that the above
                                                                                     information is correct to the best
                                                                                     of my knowledge. I will be
                                                                                     responsible for any errors that I
                                                                                     have made in the
                                                                                     completion of this form.
                                                                                 </span>
                                                                             </label>
                                                                             <!--end::Label-->
                                                                             <!--begin::Input-->
                                                                             <input type="checkbox"
                                                                                 name="consent_signature" value="1">
                                                                             <!--end::Input-->

                                                                         </div>

                                                                     </div>
                                                                     <div class="d-flex flex-stack pt-10">
                                                                         <!--begin::Wrapper-->
                                                                         <div class="mr-2">
                                                                             <a href="#"
                                                                                 class="btn btn-lg btn-light-primary me-3">Back</a>

                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                         <!--begin::Wrapper-->
                                                                         <div>
                                                                             <button type="submit"
                                                                                 class="btn btn-lg btn-primary">Submit</button>
                                                                         </div>
                                                                         <!--end::Wrapper-->
                                                                     </div>
                                                                 </form>
                                                                 <!--end::Input group-->
                                                             </div>
                                                             <!--end::Step 8-->



                                                             <!-- final step -->

                                                             <div class="" data-kt-stepper-element="content">


                                                                 <form method="POST" action="" accept-charset="UTF-8"
                                                                     class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                     id="application_manager_form"
                                                                     novalidate="novalidate"
                                                                     enctype="multipart/form-data"><input name="_token"
                                                                         type="hidden"
                                                                         value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                                                     <input type="hidden" name="tab" value="completed">
                                                                     <div class="w-100">
                                                                         <!--begin::Heading-->
                                                                         <div class="pb-10 pb-lg-12">
                                                                             <!--begin::Title-->
                                                                             <h2 class="fw-bolder text-dark">Your
                                                                                 application update journey has been
                                                                                 completed successfully.
                                                                             </h2>
                                                                             <div class="text-muted fw-bold fs-6">If
                                                                                 anything is missing you can hit back
                                                                                 button and update accordingly.

                                                                             </div>
                                                                         </div>

                                                                     </div>
                                                                     <div class="d-flex flex-stack pt-10">
                                                                         <!--begin::Wrapper-->
                                                                         <div class="mr-2">
                                                                             <a href="#"
                                                                                 class="btn btn-lg btn-light-primary me-3">Back</a>
                                                                             <button type="button"
                                                                                 class="btn btn-lg btn-light-primary me-3"
                                                                                 data-kt-stepper-action="previous">Back</button>
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
                                         <div class="modal fade bs-modal-sm" id="warning_modal" tabindex="-1"
                                             role="dialog" aria-hidden="true">
                                             <div class="modal-dialog modal-sm">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal"
                                                             aria-hidden="true"></button>
                                                         <h4 class="modal-title"><i class="fa fa-info-circle"
                                                                 style="color: #F9E491;"></i> <span
                                                                 class="warning_title"></span>
                                                         </h4>
                                                     </div>
                                                     <div class="modal-body"><span class="warning_desc"></span></div>
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn dark btn-outline"
                                                             data-dismiss="modal"><i class="icon-check"></i>
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
                                             <div
                                                 class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

                                                 <!--begin::Menu-->
                                                 <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                                                     <li class="menu-item">
                                                         <a href="#" target="_blank" class="menu-link px-2">Copyright ©
                                                             Studify</a>
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
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                         <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                             transform="rotate(90 13 6)" fill="currentColor" />
                                         <path
                                             d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                             fill="currentColor" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </div>
                             <!--end::Scrolltop-->
                             <!--end::Main-->


                             <script src="{{asset('assets/js/toggle.js')}}"></script>
                             <script src="{{asset('/assets/js/click.js')}}"></script>




                             </body>

                             </html>
                             <script type="text/javascript">
                             var i = 0;
                             $("#add-btn").click(function() {
                                 ++i;
                                 $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields[' +
                                     i +
                                     ']" placeholder="Enter title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                                     );
                             });
                             $(document).on('click', '.remove-tr', function() {
                                 $(this).parents('tr').remove();
                             });
                             </script>

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
                             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
                             </script>
                             <script src="https://code.jquery.com/jquery-3.5.0.js"> </script>
                             <script>
                             jQuery(document).ready(function() {
                                 jQuery('.personal').on('click', function(event) {
                                     jQuery('#personal').show();
                                     jQuery('#about').hide();
                                     jQuery('#glance').hide();
                                     jQuery('#video').hide();
                                     jQuery('#gallery').hide();


                                     var personal = document.getElementById("personal_info");
                                     personal.classList.add("current");
                                     var about = document.getElementById("about_info");
                                     about.classList.remove("current");
                                     var glance = document.getElementById("glance_info");
                                     glance.classList.remove("current");
                                     var video = document.getElementById("video_info");
                                     video.classList.remove("current");
                                     var gallery = document.getElementById("gallery_info");
                                     gallery.classList.remove("current");

                                 });
                             });

                             jQuery(document).ready(function() {
                                 jQuery('.about').on('click', function(event) {
                                     jQuery('#personal').hide();
                                     jQuery('#about').show();
                                     jQuery('#glance').hide();
                                     jQuery('#video').hide();
                                     jQuery('#gallery').hide();

                                     var about = document.getElementById("about_info");
                                     about.classList.add("current");
                                     var personal = document.getElementById("personal_info");
                                     personal.classList.remove("current");
                                     var glance = document.getElementById("glance_info");
                                     personal.classList.remove("current");
                                     var video = document.getElementById("video_info");
                                     video.classList.remove("current");
                                     var gallery = document.getElementById("gallery_info");
                                     gallery.classList.remove("current");

                                 });
                             });
                             jQuery(document).ready(function() {
                                 jQuery('.glance').on('click', function(event) {
                                     jQuery('#personal').hide();
                                     jQuery('#about').hide();
                                     jQuery('#glance').show();
                                     jQuery('#video').hide();
                                     jQuery('#gallery').hide();

                                     var about = document.getElementById("about_info");
                                     about.classList.remove("current");
                                     var personal = document.getElementById("personal_info");
                                     personal.classList.remove("current");
                                     var glance = document.getElementById("glance_info");
                                     glance.classList.add("current");
                                     var video = document.getElementById("video_info");
                                     video.classList.remove("current");
                                     var gallery = document.getElementById("gallery_info");
                                     gallery.classList.remove("current");
                                 });
                             });
                             jQuery(document).ready(function() {
                                 jQuery('.video').on('click', function(event) {

                                     jQuery('#personal').hide();
                                     jQuery('#about').hide();
                                     jQuery('#glance').hide();
                                     jQuery('#video').show();
                                     jQuery('#gallery').hide();

                                     var video = document.getElementById("video_info");
                                     video.classList.add("current");
                                     var about = document.getElementById("about_info");
                                     about.classList.remove("current");
                                     var personal = document.getElementById("personal_info");
                                     personal.classList.remove("current");
                                     var glance = document.getElementById("glance_info");
                                     glance.classList.remove("current");
                                     var gallery = document.getElementById("gallery_info");
                                     gallery.classList.remove("current");
                                 });
                             });
                             jQuery(document).ready(function() {
                                 jQuery('.gallery').on('click', function(event) {

                                     jQuery('#personal').hide();
                                     jQuery('#about').hide();
                                     jQuery('#glance').hide();
                                     jQuery('#video').hide();
                                     jQuery('#gallery').show();

                                     var gallery = document.getElementById("gallery_info");
                                     gallery.classList.add("current");
                                     var about = document.getElementById("about_info");
                                     about.classList.remove("current");
                                     var personal = document.getElementById("personal_info");
                                     personal.classList.remove("current");
                                     var glance = document.getElementById("glance_info");
                                     glance.classList.remove("current");
                                     var video = document.getElementById("video_info");
                                     video.classList.remove("current");

                                 });
                             });



                             setTimeout(function() {
                                 $('.alert-success').fadeOut('fast');
                             }, 5000); // <-- time in milliseconds

                             setTimeout(function() {
                                 $('.text-danger').fadeOut('fast');
                             }, 5000); // <-- time in milliseconds
                             </script>