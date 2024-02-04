@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Applications List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Applications List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <strong class="card-title"></strong>
                            </div> -->
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Institution</th>
                                            <!-- <th>Course</th>
                                            <th>Intake</th>
                                            <th>Course Fees</th>
                                            <th>Date</th> -->
                                            <th> Status </th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($application as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @php $inst = App\Models\addInstitution::where(['id' => $user->insitution_id])->first();
                                        if($inst){
                                            $instname = $inst->universirty_name;
                                        }else{
                                            $instname = '--';
                                        }
                                        @endphp
                                      <td>{{$instname}}</td>
                                      @php $workflow = App\Models\studentWorkflow::where(['student_id' => $user->id])->where(['status' => '2'])->orderBy('id', 'DESC')->first();
                                      $studentworkflow = App\Models\workflow::where(['id' => $workflow->workflow_id])->first();
                                      $status = $studentworkflow->stage_name;
                                      @endphp
                                      <td> {{$status}} </td>
                                        <td> 
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a class="" title="Application edit" href="{{url('admin/student-edit/'.$user->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                    <a class="" title="View Application" href="{{url('admin/student-detail/'.$user->id)}}"><i class="fa fa-eye" aria-hidden="true" id="eye"></i></a>
                                    <a href="" title="Assign Application" class="assignn" data-id="{{$user->id}}" type="button"    data-toggle="modal" data-target="#myModal">
                                        <img class="ll" src="{{asset('assets/images/Screenshot (20).png')}}" class="ll" style="width: 30px ;">
                                        
</a>
              </td>
                                      </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    
    
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
    <div class="modal-content" id="width5">
        <div class="modal-header">
          <h4 class="modal-title">Assign To Staff</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('admin/assign-staff')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                            <div class="row fv-row mb-12">
                                <div class="row">
                                    <input type="hidden" id="assign_id" name="assign_id" value="" >
                              <label class="form-label required">Staff List</label><br>
                              <select class="form-select" id="Crd" name="agent" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($staff as $staffs)
        <option value="{{$staffs->id}}">{{$staffs->first_name}}{{$staffs->last_name}}</option>
        @endforeach
        </select>                             
                     </div>
                         
                    </div>
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

    <script>
    $(document).ready(function(){
      $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
       
        $("#assign_id").val(dataId);
       
      });

    });


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


</body>

</html>
