@include('layout.admin.header')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Task List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Task Borad</strong>
                            </div>
                          
                            
                            <div class="card-body">
  <form method="POST" action="{{url('admin/update-lead')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                       @csrf      
  <input type="hidden"  value="{{$leads->id}}" name="id">
                  <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                       <div class="col-6">
                                        <label class="form-label required">First Name</label>
                                        <input type="text" id="birthday" name="first_name"class="form-control form-control-lg form-control-solid" value="{{$leads->first_name}}" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">Last Name</label>
                                    </label>
                                   <input type="text" id="birthday" name="last_name" class="form-control form-control-lg form-control-solid" value="{{$leads->last_name}}" placeholder="Package number">
                                     </div>
                                </div>


                                <div class="row fv-row mb-10">
                                       <div class="col-6">
                                        <label class="form-label required">Email</label>
                                        <input type="text" id="birthday" name="email"class="form-control form-control-lg form-control-solid" value="{{$leads->email}}" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">Contact</label>
                                    </label>
                                   <input type="text" id="birthday" name="phone" class="form-control form-control-lg form-control-solid" value="{{$leads->phone}}" placeholder="Package number">
                                     </div>
                                </div>

                                <div class="row fv-row mb-10">
                                       <div class="col-6">
                                        <label class="form-label required">Location</label>
                                        <input type="text" id="birthday" name="location"class="form-control form-control-lg form-control-solid" value="{{$leads->location}}" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">Source</label>
                                    </label>
                                   <input type="text" id="birthday" name="source" class="form-control form-control-lg form-control-solid" value="{{$leads->source}}" placeholder="Package number">
                                     </div>
                                </div>


                                <div class="row fv-row mb-10">
                                  <label class="form-label required">Members</label>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                   <select class="form-control form-control-lg form-control-solid form-select" id="Crd" name="agent" aria-label="Default select example">
        <option selected="">Select Member</option>
       @foreach($staff as $staffs)
                <option value="{{$staffs->id}}" {{$staffs->id == $leads->lead_assign_id  ? 'selected' : ''}}>{{$staffs->first_name}}</option>
               @endforeach 
                </select>           
                                   
                                </div>
                                  
                               
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-8">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Message</span>
                                    </label>
                                    <textarea rows="4" cols="50" value="{{$leads->comment}}" id="description" name="description" form="usrform" class="form-control form-control-lg form-control-solid description">
                                       {{$leads->comment}} </textarea>
                                      <input type="hidden" value="" id="comment" name="comment">
                                     </div>
                                   <div class="col-2">
                                   </div>
                                </div>
                                <br>
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div>
                  </form>
                                
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

        <script>
$( document ).ready(function() {
   var dInput = $("#description").val();
     $("#comment").val( dInput );
});

$('#description').keyup(function() {
        var dInput = this.value;
     $("#comment").val( dInput );
});

            </script>