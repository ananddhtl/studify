@include('agent.header');
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container">
<div class="row">
	<div class="pb-10 pb-lg-12">
    <h2 class="sem">Get more Email please click on this link.<a href="{{url('agent/email-package')}}" style="color: blue"> Get More?</a></h2>
<div class="box">
<div class="col-sm-6" id="sms">
   <h1 style="font-size: 18px; padding: 10px;"> Sending Email</h1>

   @if(count($emailprofile) != '0')
 @foreach($emailprofile as $emailprofiles)
<div class="use">
<div class="list">

    @if($emailprofiles->member_type == 'Agent')
    @php
   $data = App\Models\AgentModel::where(['email' => $emailprofiles->reciever])->first();
@endphp 
@if($data->agent_image)
<img src="{{asset('/public/AgentImage/'.$data->agent_image )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
    
     <span><b>{{$data->first_name}}</b></span>
    
    <span>{!!$emailprofiles->message!!}</span>
   <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($emailprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>
  @elseif($emailprofiles->member_type == 'Insitution')
  @php
   $data = App\Models\InstitutionModel::where(['email' => $emailprofiles->reciever])->first();
   $datas = App\Models\addInstitution::where(['institution_id' => $data->id])->first();
@endphp 
@if($datas->univ_img)
<img src="{{asset('/public/InstitutionImage/'.$datas->univ_img)}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">
@endif
</div>
<div class="text">
  <p class="list1">
    <span><b>{{$datas->universirty_name}}</b></span>
  
    <span>{!!$emailprofiles->message!!}</span>
  <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($emailprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>

  @else
  @php
   $data = App\Models\StudentModel::where(['email' => $emailprofiles->reciever])->first();
@endphp 
@if($data)
@if($data->student_img)
<img src="{{asset('/public/StudentImage/'.$data->student_img )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
  @if($emailprofiles->member_type == 'Student')
    @php
   $datass = App\Models\StudentModel::where(['email' => $emailprofiles->reciever])->first();
@endphp 
    <span><b>{{$datass->first_name}}</b></span>
    @else
    @php
   $datass = App\Models\addRole::where(['email' => $emailprofiles->reciever])->first();
@endphp 
    <span><b>--</b></span>
    @endif
    
    <span>{!!$emailprofiles->message!!}</span>
    <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($emailprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>
  
  @endif
  </div>
  @endforeach
  @else
  <div class="use">
<div style="padding:5px;" class="list">
<span> No Email Send </span>
</div>
</div>
  @endif

</div>
<div class="col-sm-6" id="sms1">

                                  <h1 style="font-size: 18px; padding: 10px;"> Send Email</h1>
<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" id="firstbutton">Send Email</button>
  <button class="w3-bar-item w3-button" id="secondbutton">Group Email</button>
 
</div>


<form id="First" method="POST" action="{{url('agent/email')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
    
<input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
@csrf                         
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <div class="col-12">
                                <label class="form-label required">Select Member Type</label>
                                <select class="form-select form-control form-control-lg form-control-solid" id="membertype" name="membertype" aria-label="Default select example">
                                        <option selected>Select Type</option>
                                        <option value="Staff">Staff</option>
                                       <option value="Student">Student</option>
                                        </select> 

                                        </div>
                                
                                </div>

                                 <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">From</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="senderEmail" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Email" value="info@studify.au">
                                   <!--end::Input-->
                                    </div>
                                
                                </div>

                                <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">To</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-control form-control-lg form-control-solid " id="member" name="member" aria-label="Default select example">
                                        <option selected>Select Email</option>
                                        
                                        </select>                                                                                <!--end::Input-->
                                    </div>
                                
                                </div>

                                


                                <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">Subject</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="subject" id="subject" class="form-control form-control-lg form-control-solid" placeholder="Enter Subject" value="">
                                                                                <!--end::Input-->
                                    </div>
                                
                                </div>
           
                                <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">Select Template</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-control form-control-lg form-control-solid " id="template"  name="template" aria-label="Default select example" >
                                   <option>Select Template</option>
                                      @foreach($template as $templates)
                                    <option value="{{$templates->id}}"> {{$templates->name}} </option>
                                    @endforeach
                                   </select>                                                                               <!--end::Input-->
                                    </div>
                                
                                </div>

                            <div class="row fv-row mb-10">
                                   <div class="col-12">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Message</span>
                                    </label>
                                    <textarea class="ckeditor form-control"  id="myTextarea" name="message"></textarea>
                                     </div>
                                  </div>
                               

                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <a href=""><button type="submit" class="Package">Submit</button></a>
                                </div>
                              </div>
                           
                             <br>
                      </form>


    <form id="Second" method="POST" action="{{url('agent/send-email-group')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
    
    <input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
    @csrf                         
                                    <!--begin::Heading-->
                                    
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    
                                     <div class="row fv-row mb-10">
                                        <div class="col-12">
                                            <!--begin::Label-->
                                            <label class="form-label required">From</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="senderEmail" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Email" value="info@studify.au">
                                                                                    <!--end::Input-->
                                        </div>
                                    
                                    </div>
    
                                    <div class="row fv-row mb-10">
                                        <div class="col-12">
                                            <!--begin::Label-->
                                            <label class="form-label required">To</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-control form-control-lg form-control-solid chosen-select" name="group" aria-label="Default select example" multiple="" >
                                           @foreach($group as $groups)
                                            <option value="{{$groups->id}}">{{$groups->group_name}}</option>
                                            @endforeach
                                            </select>                                                                               <!--end::Input-->
                                        </div>
                                    
                                    </div>
    
                                    <div class="row fv-row mb-10">
                                        <div class="col-12">
                                            <!--begin::Label-->
                                            <label class="form-label required">Subject</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="subject" id="subject" class="form-control form-control-lg form-control-solid" placeholder="Enter Subject" value="">
                                                                                    <!--end::Input-->
                                        </div>
                                    
                                    </div>

                                    <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">Select Template</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-control form-control-lg form-control-solid " id="templates"  name="template" aria-label="Default select example" >
                                   <option>Select Template</option>
                                      @foreach($template as $templates)
                                    <option value="{{$templates->id}}"> {{$templates->name}} </option>
                                    @endforeach
                                   </select>                                                                               <!--end::Input-->
                                    </div>
                                
                                </div>

               
                                <div class="row fv-row mb-10">
                                       <div class="col-12">
                                        <label class="d-flex align-items-center form-label">
                                            <span class="required">Message</span>
                                        </label>
                                        <textarea class="ckeditor form-control" id="myTextareaa"  name="message"></textarea>
                                         </div>
                                      </div>
                                   
                                    <div class="row fv-row mb-10">
                                       <div class="col-6">
                                      <a href=""><button type="submit" class="Package">Submit</button></a>
                                    </div>
                                  </div>
                               
                                 <br>
                          </form>

</div>

</div>


</div>
</div>
</div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

</body>

</html>
<script>

$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})

   $('#membertype').on('change', function () {
                var type = this.value;
              if(type == 'Staff'){
                
                $("#member").html('');
                $.ajax({
                    url: "{{url('/agent/get-member')}}",
                    type: "POST",
                    data: {
                        type: type,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        console.log(res.members)
                        $('#member').html('<option value="">Select Members</option>');
                        $.each(res.members, function (key, value) {
                           
                            $("#member").append('<option value="' + value
                                .email + '">' + value.name + '</option>');
                        });
                    }
                });
              }else{
                $("#member").html('');
                $.ajax({
                    url: "{{url('/agent/get-member')}}",
                    type: "POST",
                    data: {
                        type: type,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                       
                        $('#member').html('<option value="">Select Members</option>');
                        $.each(res.members, function (key, value) {
                           $("#member").append('<option value="' + value
                                .email + '">' + value.first_name + '</option>');
                        });
                    }
                });
            }
            });


   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>

<script type="text/javascript">
$(document).ready(function () {
  $("#Second").hide();
    $("#firstbutton").click(function () {
        $("#First").show();
         $("#Second").hide();
    });
});

$(document).ready(function () {
 $("#secondbutton").click(function () {
  $("#Second").show();
        $("#First").hide();
         
    });
});

$(function() { 
    $('#template').on('change', function() {
           var product_id = this.value;  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/agent/get-email-template-data', 
               data: {'product_id': product_id}, 
               success: function(data){ 
                console.log(data.description)
                CKEDITOR.instances['myTextarea'].setData(data.description)
             } 
         }); 
      }) 
   }); 

   $(function() { 
    $('#templates').on('change', function() {
           var product_id = this.value;  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/agent/get-email-template-data', 
               data: {'product_id': product_id}, 
               success: function(data){ 
                console.log(data.description)
                CKEDITOR.instances['myTextareaa'].setData(data.description)
               

              
            } 
         }); 
      }) 
   }); 

</script>

