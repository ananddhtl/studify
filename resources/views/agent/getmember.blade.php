@include('agent.header')
 <span id="message_container_display"></span>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

        @if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <!--begin::Card header-->
                
                <div class="card-header mt-5">

                    <!--begin::Card title-->
                    <div class="card-title flex-column">

                        <h3 class="fw-bolder mb-1">List of Recent Students</h3>



                    </div>



                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->

                    <div class="card-toolbar my-1">
                        <!--begin::Select-->
                        <div class="me-6 my-1" style="display: none;">
                            <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible" data-select2-id="select2-data-kt_filter_year" tabindex="-1" aria-hidden="true">
                                    <option value="All" selected="selected" data-select2-id="select2-data-2-o38j">All time</option>
                                    <option value="thisyear">This year</option>
                                    <option value="thismonth">This month</option>
                                    <option value="lastmonth">Last month</option>
                                    <option value="last90days">Last 90 days</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-1-38te" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-kt_filter_year-container" aria-controls="select2-kt_filter_year-container"><span class="select2-selection__rendered" id="select2-kt_filter_year-container" role="textbox" aria-readonly="true" title="All time">All time</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <!--end::Select-->
                        <!--begin::Select-->
                        <div class="me-4 my-1" style="display: none;">
                            <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible" data-select2-id="select2-data-kt_filter_orders" tabindex="-1" aria-hidden="true">
                                    <option value="All" selected="selected" data-select2-id="select2-data-4-ph97">All Status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Declined">Declined</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="In Transit">In Transit</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-3-84nm" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-kt_filter_orders-container" aria-controls="select2-kt_filter_orders-container"><span class="select2-selection__rendered" id="select2-kt_filter_orders-container" role="textbox" aria-readonly="true" title="All Status">All Status</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <!--end::Select-->
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                             </div>
                        <!--end::Search-->
                    </div>
                     <div class="card-title flex-column">

                         <a href="{{url('agent/new/member/add')}}" class="btn btn-primary" id="add">Add New Student</a>
                        


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
                                    <th class="250px ">Photo</th>
                                    <th class="150px">Full Name / Email</th>
                                    <th class="90px ">Phone</th>
                                    <th class="50px">Status</th>
                                    <th class="50px text-end ">Action</th>
                                </tr>
                            </thead>
                            <!--end::Head-->
                            <!--begin::Body-->
                            <tbody class="fs-6 ">
                                @foreach($member as $members)
                             <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-block ">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative ">
                                                <!--begin::Avatar-->
                                                <a href="#">
                                                <div class="symbol symbol-65px symbol-circle ">
<img src="{{asset('public/StudentImage/'.$members->student_img)}}" class="img-responsive" alt="" style="width: 184px; height: 138px;">


                                            </a>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Wrapper-->

                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>
                                        <!--begin::Info-->
                                        <div class="">
                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary d-block ">{{$members->first_name}}</a>

                                            <p class="text-muted fw-normal d-block">{{$members->email}}</p>

                                        </div>
                                        <!--end::Info-->
                                    </td>
                                    <td>{{$members->phone}}</td>
                                    @php
                                        $values = App\Models\studentWorkflow::where(['student_id' => $members->id])->where(['status' => '2'])->orderBy('id', 'DESC')->first();;
                                        if($values !=''){
                                            if($values){
                                            $workflow = App\Models\workflow::where(['id' => $values->workflow_id])->first();
                                        if($workflow){
                                        $names =  $workflow->stage_name;
                                        }else{
                                            $names = '--';  
                                        }
                                    }else{
                                        $names = '--'; 
                                    }
                                    }else{
                                        $names = '--'; 
                                    }
                                        @endphp
                                     <td>
                                       {{$names}}                                                                             
                                    </td>

                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        
 <div class="dropdown">
 <div class="dropdown">
    <button class="btn btn-primary dropdown" type="button" data-toggle="dropdown" style="color: #009EF7;
    border-color: #F1FAFF;
    background-color: #F1FAFF !important;
}">Actions<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                                </svg>
    <span class="caret"></span></button>
    <ul class="dropdown-menu"style="top: 40px !important;" id="mee">
      <li><a href="#">History</a></li>
      <li><a href="{{url('/agent/student-view/'.$members->id)}}">View</a></li>
      <li><a href="{{url('/agent/check-application/'.$members->id)}}">Edit</a></li>
      <li><a href="{{url('/agent/student/delete/'.$members->id)}}">Delete</a></li>
    </ul>
  </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->

                                </tr>
                                    @endforeach                                                            

                                

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
</div>
</div>

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
</a>
</div>
</div></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>
<!-- <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
$(document).ready(function(){
  $('.dropbtn').click(function(){
    
    $('#myDropdown').show();
  });
  $('.dropbtn,.close').click(function(e){
    e.preventDefault();
    $('#myDropdown').hide();
  })
})
</script> -->