 @include('institution.header')
 @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container">
<div class="row">
	<div class="pb-10 pb-lg-12">
  <h2 class="sem">Get more SMS please click on this link.<a href="{{url('institution/sms-package')}}" style="color: blue"> Get More?</a></h2>

<div class="box">
<div class="col-sm-6" id="sms">
   <h1 style="font-size: 18px; padding: 10px;"> Sending SMS</h1>
   @if(count($smsprofile) != '0')
 @foreach($smsprofile as $smsprofiles)
<div class="use">
<div class="list">
    @if($smsprofiles->member_type == 'Agent')
    @php
   $data = App\Models\AgentModel::where(['phone' => $smsprofiles->reciever])->first();
@endphp 
@if($data)
<img src="{{asset('/public/AgentImage/'.$data->agent_image )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
  @if($data)
    <span><b>{{$data->first_name}}</b></span>
    @else
    <span><b>No Name</b></span>
    @endif
    
    <span>{!!$smsprofiles->message!!}</span>
    <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($smsprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>
  @elseif($smsprofiles->member_type == 'Insitution')
  @php
   $data = App\Models\InstitutionModel::where(['phone' => $smsprofiles->reciever])->first();
   $datas = App\Models\addInstitution::where(['institution_id' => $data->id])->first();
@endphp 
@if($datas)
<img src="{{asset('/public/InstitutionImage/'.$datas->univ_img)}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">
@endif
</div>
<div class="text">
  <p class="list1">
  @if($datas)
    <span><b>{{$datas->universirty_name}}</b></span>
    @else
    <span><b>No Name</b></span>
    @endif
    <span>{!!$smsprofiles->message!!}</span>
    <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($smsprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>

  @else
  @php
   $data = App\Models\StudentModel::where(['phone' => $smsprofiles->reciever])->first();
@endphp 
@if($data)
<img src="{{asset('/public/StudentImage/'.$data->student_img )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
    @if($data)
    <span><b>{{$data->first_name}}</b></span>
    @else
    <span><b>No Name</b></span>
    @endif
    <span>{!!$smsprofiles->message!!}</span>
    <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($smsprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>
  
  @endif
  </div>
  @endforeach
  @else
  <div class="use">
<div style="padding:5px;" class="list">
<span> No SMS Send </span>
</div>
</div>
  @endif
</div>
<div class="col-sm-6" id="sms1">

                                  <h1 style="font-size: 18px; padding: 10px;"> Send SMS</h1>
<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" id="firstbutton">Send SMS</button>
  <button class="w3-bar-item w3-button" id="secondbutton">Group SMS</button>
 
</div>


<form id="First" method="POST" action="{{url('/institution/send-sms')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
@csrf                          
<div class="w-100">
                                
                          <div class="row fv-row mb-10">
                                    <div class="col-12">
                                <label class="form-label required">Select Member Type</label>
                                        <select class="form-select form-control form-control-lg form-control-solid" id="membertype" name="membertype" aria-label="Default select example">
                                        <option selected>Select Type</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Student">Student</option>
                                        </select> 
                                     </div>
                                 </div>

                       <div class="row fv-row mb-6">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">From</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$insitutionProfile->phone}}">
                                                                                <!--end::Input-->
                                    </div>
                                 <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">To</span>
                                    </label>
                                    <select class="form-select form-control form-control-lg form-control-solid " id="member" name="member" aria-label="Default select example">
                                        <option selected>Select Contact</option>
                                        
                                        </select> 
 
                                   </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                 
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">SMS Template</span>
                                    </label>
                                   <div class="selectBox">
                                   <select class="form-select form-control form-control-lg form-control-solid " id="template"  name="template" aria-label="Default select example" >
                                   <option>Select Template</option>
                                      @foreach($template as $templates)
                                    <option value="{{$templates->id}}"> {{$templates->name}} </option>
                                    @endforeach
                                   </select> 
    </div>
                                  
                             
</div>

                       <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                   <div class="col-10">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Message</span>
                                    </label>
                                 <textarea id="myTextarea" class="ckeditor form-control" name="message"></textarea>         
                                
                                </div>
                                
                              
                                </div>
                                    
                                <br>
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <a href=""><button type="submit" class="Package">Submit</button></a>
                                </div>
                              </div>
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
                           
                            </form>


<form id="Second" method="POST" action="{{url('/institution/send-group-smss')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
      @csrf
                  <div class="w-100">
                                
                                
<div class="row fv-row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">From</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="{{$insitutionProfile->phone}}">
                                                                                <!--end::Input-->
                                    </div>
                                 <div class="col-6">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">To</span>
                                    </label>
                                    <select class="form-select form-control form-control-lg form-control-solid" name="group" aria-label="Default select example"  >
                                    <option>Select Group </option>       
                                    @foreach($group as $groups)
                                            <option value="{{$groups->id}}">{{$groups->group_name}}</option>
                                            @endforeach
                                            </select> 
                                   </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">SMS Template</span>
                                    </label>
                                   <div class="selectBox" >
                                   <select class="form-select form-control form-control-lg form-control-solid " id="templates"  name="template" aria-label="Default select example" >
                                   <option>Select Template</option>
                                      @foreach($template as $templates)
                                    <option value="{{$templates->id}}"> {{$templates->name}} </option>
                                    @endforeach
                                   </select> 
    </div>
                                 
                             </div>
                          
                             <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                   <div class="col-10">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Message</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <textarea id="myTextarea1" class="ckeditor form-control" name="message"></textarea>
                                  
                                  </div>
                                
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    
                             
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                </div>
                                    
                                <br>
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <a href=""><button type="submit" class="Package">Submit</button></a>
                                </div>
                              </div>
                            </div>
                                <!--end::Input group-->

                                
                                                                
                                <!--begin::Input group-->
                                <br>
                     
                                <!--end::Input group-->
                     


                           
                           
                            </form>
</div>

</div>


</div>
</div>
</div>

 <script src="{{asset('assets/js/toggle.js')}}"></script>

</body>

</html>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    $(function() { 

    $('#template').on('change', function() {
    
           var product_id = this.value;  
           $.ajax({ 
         type: "GET", 
               dataType: "json", 
               url: '/institution/get-template-data', 
               data: {'product_id': product_id}, 
               success: function(data){ 
                console.log(data.description)
                CKEDITOR.instances['myTextarea'].setData(data.description);
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
               url: '/institution/get-template-data', 
               data: {'product_id': product_id}, 
               success: function(data){ 
                console.log(data.description)
                CKEDITOR.instances['myTextarea1'].setData(data.description)
               

              
            } 
         }); 
      }) 
   }); 


</script>
<script>
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
          
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/status/update', 
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
<script>
  var expanded = false;
  function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}</script>


<script>
  var expanded = false;
  function showCheckboxes1() {
  var checkboxes1 = document.getElementById("checkboxes1");
  if (!expanded) {
    checkboxes1.style.display = "block";
    expanded = true;
  } else {
    checkboxes1.style.display = "none";
    expanded = false;
  }
}</script>
<script>
  var expanded = false;
  function showCheckboxes2() {
  var checkboxes2 = document.getElementById("checkboxes2");
  if (!expanded) {
    checkboxes2.style.display = "block";
    expanded = true;
  } else {
    checkboxes2.style.display = "none";
    expanded = false;
  }
}</script>
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

$('#membertype').on('change', function () {
                var type = this.value;
              if(type == 'Staff'){
                $("#member").html('');
                $.ajax({
                    url: "{{url('/institution/get-member')}}",
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
                                .phone + '">' + value.name + '</option>');
                        });
                    }
                });
              }else{
                $("#member").html('');
                $.ajax({
                    url: "{{url('/institution/get-member')}}",
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
                                .phone + '">' + value.first_name + '</option>');
                        });
                    }
                });
            }
            });

</script>

