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
@if(session()->has('delete'))
    <div class="alert alert-success">
        {{ session()->get('delete') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Task Borad</strong>
                            <a href=""  style="float: right;" data-toggle="modal" data-target="#Mymodal" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Task</a>

                            </div>
                           
                            <div class="card-body">

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Task</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Priority</th>
                                            <th>Assigned To</th>
                                            <th>Message</th>
                                            <th>Cancel Message</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       <?php $i=1;?>
                                        @foreach($task as $tasks)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$tasks->task_name}}</td>

                                            @php
                                            \Carbon\Carbon::setLocale('ru');
                                            @endphp
                                            <td>{{ \Carbon\Carbon::parse($tasks->start_date)->format('d F Y') }}</td>

                                        <td>{{ \Carbon\Carbon::parse($tasks->end_date)->format('d F Y') }}</td>

                                        

                                        @if($tasks->priority == 'low')
                                        <td>Low</td>
                                        @elseif($tasks->priority == 'medium')
                                        <td>Medium</td>
                                        @else
                                        <td>High</td>
                                        @endif


                                         @if($tasks->assign_id != '0')
                                        @php
                                        $values = App\Models\addRole::where(['id' => $tasks->assign_id])->where(['type' => 'admin'])->first();
                                       if($values){
                                        $names = $values->name;
                                       }else{
                                        $names='';
                                       }
                                        @endphp
                                        <td>{{$names}}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        @if($tasks->task_description !='')
                                        <td>{{$tasks->task_description}} </td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        @if($tasks->cancelMessage !='')
                                        <td>{{$tasks->cancelMessage}} </td>
                                        @else
                                        <td>--</td>
                                        @endif

                                        @if($tasks->status == '0')
                                        <td><span class="Notifica">Not Started</span></td>
                                        @elseif($tasks->status == '1')
                                        <td><span class="Notifica1">Cancel</span></td>
                                        @else
                                        <td><span class="Notifica2">Completed</span></td>
                                        @endif

                                        <td> 
                                       
                                        
                                        <form action="{{ URL('/admin/delete-task/'.$tasks->id )}}" method="POST"
                                          class="kjkj">
                                            @csrf
                                             <a class="" href="{{url('/admin/edit-task/'.$tasks->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                    <button onclick="return confirm('Are you sure you want to delete this ?');" type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                                   
                                </form></td>
                
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

</div>



      
    </div>
  </div>
  
</div>
 

    </div><!-- /#right-panel -->

    <div class="modal fade" id="Mymodal">
	<div class="modal-dialog">
		<div class="modal-content" >
			<div class="modal-header">
                <h3> Add Task </h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button> 
				                                                             
			</div> 
			      <form method="POST" action="{{url('admin/add-task')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                  @csrf            
                  <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="task_title" id="first_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Enter Title">
                                                                                <!--end::Input-->
                                    </div>

                                    <div class="col-6">
                                   <label class="form-label required">Members</label>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                   <select class="form-control form-control-lg form-control-solid form-select" id="Crd" name="staff" aria-label="Default select example">
        <option selected="">Select Member</option>
        @foreach($staff as $staffs)
                <option value="{{$staffs->id}}">{{$staffs->name}}</option>
                @endforeach
                </select>           
                                     </div>
                                </div>
                                   <div class="row fv-row mb-10">
                                       <div class="col-6">
                                        <label class="form-label required">Start Date</label>
                                        <input type="date" id="birthday" name="start_date"class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">End Date</label>
                                    </label>
                                   <input type="date" id="birthday" name="end_date" class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                     </div>
                                </div>
                                <div class="row fv-row mb-10">
                                       
                                        <label class="form-label required">Add Priority</label>
                                        <select class="form-control form-control-lg form-control-solid form-select" name="priority" aria-label="Default select example">
                                            <option selected>Select Priority</option>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            </select>                                                                                <!--end::Input-->
                                                                            
                                    
                                  
                                </div>
                                <div class="row fv-row mb-10">
                                    <!--begin::Label-->
                                    <div class="col-8">
                                    <label class="d-flex align-items-center form-label">
                                        <span class="required">Message</span>
                                    </label>
                                    <textarea rows="4" cols="50" id="description" name="description" form="usrform" class="form-control form-control-lg form-control-solid description">
                                        </textarea>
                                        <input type="hidden" name="comment" id="comment" value="">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
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

$('#description').keyup(function() {
        var dInput = this.value;
     $("#comment").val( dInput );
});
</script>
