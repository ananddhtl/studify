@include('layout.admin.header')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container">
<div class="row">
<div class="box">

<div class="col-sm-6" id="sms1">

 <h1 style="font-size: 18px; padding: 10px;"> Add Group Members</h1>
<div class="w3-bar w3-black">
  
</div>


<form id="First" method="POST" action="{{url('admin/add-sms-members')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
    
<input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
@csrf                         
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                
                                 <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <input type="hidden" value="{{$id}}" name="id">
                                        <!--begin::Label-->
                                        <label class="form-label required">Select Member Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-control form-control-lg form-control-solid" id="membertype" name="membertype" aria-label="Default select example">
                                        <option selected>Select Type</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Insitution">Insitution</option>
                                        <option value="Student">Student</option>
                                        </select>                                                                                  <!--end::Input-->
                                    </div>
                                
                                </div>

                                <div class="row fv-row mb-10">
                                    <div class="col-12">
                                        <!--begin::Label-->
                                        <label class="form-label required">Select Member</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-control form-control-lg form-control-solid " id="member" name="member[]" aria-label="Default select example" >
                                        <option selected>Select Member</option>
                                        
                                        </select>                                                                                <!--end::Input-->
                                    </div>
                                
                                </div>
                             <br>

                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <a href=""><button type="submit" class="Package">Submit</button></a>
                                </div>
                              </div>
                           
                             <br>
                      </form>
</div>

<div class="col-sm-6" id="sms">
   <h1 style="font-size: 18px; padding: 10px;"> Group Members</h1>
   @if(count($smsprofile) != '0')
 @foreach($smsprofile as $smsprofiles)
<div class="use">
<div class="list">
    @if($smsprofiles->type == 'Agent')
    @php
   $data = App\Models\AgentModel::where(['id' => $smsprofiles->member_id])->first();
@endphp 
@if($data->agent_image)
<img src="{{asset('/public/AgentImage/'.$data->agent_image )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
    <b>{{$data->first_name}}</b>
    <br>
    <span>{!!$smsprofiles->message!!}</span>
    <br>
    @php
    \Carbon\Carbon::setLocale('ru');
      @endphp
 <span>{{ \Carbon\Carbon::parse($smsprofiles->created_at)->format('d F Y') }}</span>
  </p>
  </div>
  @elseif($smsprofiles->type == 'Insitution')
  @php
   $data = App\Models\InstitutionModel::where(['id' => $smsprofiles->member_id])->first();
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
    <b>{{$datas->universirty_name}}</b>
    <br>
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
   $data = App\Models\StudentModel::where(['id' => $smsprofiles->member_id])->first();
@endphp 
@if($data->student_img)
<img src="{{asset('/public/StudentImage/'.$data->student_img )}}" alt="Logo" style="width: 100px;">
@else
<img src="{{asset('/public/AgentImage/noImage.webp')}}" alt="Logo" style="width: 100px;">

@endif
</div>
<div class="text">
  <p class="list1">
    <b>{{$data->first_name}}</b>
    <br>
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
<span> No Email Send </span>
</div>
</div>
  @endif

</div>

</div>


</div>
</div>



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



<script>
   
   $('#membertype').on('change', function () {
                var type = this.value;
                
              if(type == 'Insitution'){
                $("#member").html('');
                $.ajax({
                    url: "{{url('/admin/get-member')}}",
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
                                .id + '">' + value.	institution_name + '</option>');
                        });
                    }
                });
              }else{
                $("#member").html('');
                $.ajax({
                    url: "{{url('/admin/get-member')}}",
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
                                .id + '">' + value.first_name + '</option>');
                        });
                    }
                });
            }
            });
      


   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>



