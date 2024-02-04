@include('layout.admin.header')
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
                               
                                <div class="stepper-item current" id="personal_info" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    
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
                               
                                      <div class="stepper-item" id="about_info" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                   
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
                               
                                <div class="stepper-item"  id="glance_info" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                  
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
                               
                                <div class="stepper-item" id="video_info" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                   
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
                              
                              <div class="stepper-item" id="gallery_info" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                    
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
                        

                       
                        <div class="current" id="personal" data-kt-stepper-element="content">
                           
                           
                            <?php if ($institution){ ?>
                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('admin/institution/updateinstitutioninfo')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tab" value="personal_info">
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
                                         <label class="form-label required">University Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="universirty_name" id="first_name" class="form-control form-control-lg form-control-solid" value="{{$institution->universirty_name}}" /><br>


                                        <label class="form-label required">University Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                         <input type="hidden" name="id" value="{{$institution->id}}" />


                                        <input name="univ_type" id="univ_type" class="form-control form-control-lg form-control-solid" value="{{$institution->univ_type}}" /><br>
                                        <!--end::Input-->
                                        <label class="form-label required">International Student</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="international_student" id="international_student" class="form-control form-control-lg form-control-solid" value="{{$institution->international_student}}" /><br>
                                        <label class="form-label required">Location</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="location" id="location" class="form-control form-control-lg form-control-solid" value="{{$institution->location}}" /><br>
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Founded</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->

                                        <input name="founded" id="founded" class="form-control form-control-lg form-control-solid" value="{{$institution->founded}}" /><br>
                                        <!--end::Input-->
                                       
                                        <label class="form-label required">Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="type" id="type" class="form-control form-control-lg form-control-solid" value="{{$institution->type}}" /><br>
                                    </div>
                                </div>
                                
                                
                                <!--end::Input group-->


                                                                
                                <!--begin::Input group-->
                                <div class="fv-row">

                                    <label for="avatar">Choose a University
                                     picture:</label>
        <img src="{{asset('public/InstitutionImage/'.$institution->univ_img)}}"  width="200"
         height="80">


  <!--end::Dropzone-->
                                </div><br>

                                <div class="fv-row">

                                    <label for="avatar">Choose a Thumbnail
                                     picture:</label>
        <img src="{{asset('public/InstitutionImage/'.$institution->thumbnail)}}"  width="200"
         height="80">


  <!--end::Dropzone-->
                                </div><br>

                                <!--end::Input group-->


                            </div>
                         
                            </form>
                        <?php }  ?>
                        
                        </div>


                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                       
                        <div class="" id="about" data-kt-stepper-element="content">
                      
                            <!--begin::Wrapper-->

                             <?php if ($institution){ ?>

                            <form method="POST" action="{{url('admin/institution/aboutInfo')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
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
     <label class="form-label required">Universities Heading</label>
     <br>                               
  <input type="text" placeholder="Enter heading" id="username" name="aboutheading" value="{{$institution->about_heading}}" class="collhead" >
<br>
<label class="form-label required">Universities Description</label><br>
<textarea id="freeform" name="aboutparagraph" value="{{$institution->about_paragraph}}" rows="6" cols="80">
{{$institution->about_paragraph}}
</textarea>
<br>

                                    <!--begin::Label-->
                                    
</div>
                                

                            </div>
                            
                            </form>

                        <?php } ?>  
                       </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                       
                        <div class="" id="glance" data-kt-stepper-element="content">
                          
                            <!--begin::Wrapper-->

                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('admin/glance/update')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                            <input type="hidden" name="tab" value="language_score">
                             @csrf
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Glance</h2>
                                    <div class="text-muted fw-bold fs-6">Add your glances
                                   
                                    </div><br>
                            @if($glance!='') 
<table class="table" id="dynamicAddRemove">  
<tr>
<th>Glance</th>
<th>Action</th>
</tr>
@foreach($glance as $glances)
<tr>  
<td><input type="text" name="moreFields[0]" placeholder="Enter glance" class="form-control" value="{{$glances->glance}}" /></td>  
  
</tr> 
@endforeach 
</table> 
     
@endif

                                </div>
                  
                                <!--begin::Input group-->
                                
                              



                            </div>
                            
                            </form>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        
                        <div class="" id="video" data-kt-stepper-element="content">
                            
                            <!--begin::Wrapper-->
                            <!--begin::Wrapper-->
                            <form method="POST" action="{{url('admin/institution/updatevideo')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                @csrf
                            <input type="hidden" name="id" value="{{$institution->id}}">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Video  </h2>
                                    <div class="text-muted fw-bold fs-6">Add your video 

                                    </div>

                                </div>


                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                     <label class="form-label required">Enter Embed Video Url</label>
                         <?php if ($institution){ ?>
                                    <input type="text"
       id="avatar" name="univ_video" value="{{$institution->video}}" class="form-control form-control-lg form-control-solid"
       accept="image/png, image/jpeg">
                   <?php } else{ ?>
 <input type="text"
       id="avatar" name="univ_video" class="form-control form-control-lg form-control-solid"
       accept="image/png, image/jpeg">
                    <?php } ?>                                                        
</div>




                                <!--begin::Input group-->
                               
                                <!--end::Input group-->




                            </div>
                           
                            </form>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        
                         <div class="" id="gallery"   data-kt-stepper-element="content">
                           
                            <!--begin::Wrapper-->
                            <form method="POST" action="#" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                                @csrf

                            <input type="hidden" name="tab" value="academic_info">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Photo Gallery
                                    </h2>
                                    <div class="text-muted fw-bold fs-6">Add Multiple photos
                                    </div>
                                </div>


                                <div class="fv-row mb-10">
            @foreach($images as $image)
<img src="{{asset('/public/InstitutionImage/'.$image->image)}}" alt="Simply Easy Learning" width="200"
         height="140">

@endforeach

  <form action="/action_page.php">
    <br><br>
 
</form>
                                    


                                </div>
                                <!--end::Wrapper-->
                            </div>
                            
                            </form>
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Step 6 - emergency contact-->
                      
                        <!--end::Step 6-->
                        <!--begin::Step 7 - professional Information-->
                      
                        <!--end::Step 7-->
                        <!--begin::Step 8 - Consent and Signature-->
                        <div class="" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <!--begin::Wrapper-->
                            <form method="POST" action="#" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data"><input name="_token" type="hidden" value="tPmnvV6qvFnZ5PIT401Rz9XwTSBsb8ute5hA7yqp">
                            <input type="hidden" name="tab" value="consent_signature">
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-12">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">Consent and Signature</h2>
                                    <div class="text-muted fw-bold fs-6">Setup your Consent and Signature

                                    </div>
                                </div>


                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center form-label">
                                                    <span class="">I verify that the above information is correct to the best of my knowledge. I will be responsible for any errors that I have made in the
completion of this form.
                                                    </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="checkbox" name="consent_signature" value="1" >
                                    <!--end::Input-->

                                </div>

                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="mr-2">
                                    <a href="#" class="btn btn-lg btn-light-primary me-3">Back</a>
                                    
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            </form>
                                    <!--end::Input group-->
                        </div>
                        <!--end::Step 8-->



                        <!-- final step -->

                       


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


 
<script>
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
         
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/institutionstatus/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>

<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>
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
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+']" placeholder="Enter title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.0.js"> </script>
     <script>
  jQuery(document).ready(function(){
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

jQuery(document).ready(function(){
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
jQuery(document).ready(function(){
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
jQuery(document).ready(function(){
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
jQuery(document).ready(function(){
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