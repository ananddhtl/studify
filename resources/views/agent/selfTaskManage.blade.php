@include('agent.header');


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
                                <strong class="card-title">Task Board</strong>
                            </div>
                           
                            
                            <div class="card-body">
 
<div class="table-responsive">
                                  <a href="#" ><button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#Mymodal"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Task</button></a>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Task</th>
                                            <th>Due Date</th>
                                            <th>Priority</th>
                                            <th>Assigned To</th>
                                            <th>Message</th>
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

                                        <td>{{ \Carbon\Carbon::parse($tasks->end_date)->format('d F Y') }}</td>

                                        <input type="hidden" value="{{ $tasks->id }}" class="id">


                                        @if($tasks->priority == 'low')
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg3.png')}}" class="flag"></td>
                                        @elseif($tasks->priority == 'medium')
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @else
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @endif


                                         @if($tasks->assign_id != '0')
                                        @php
                                        $values = App\Models\addRole::where(['id' => $tasks->assign_id])->where(['type' => 'agent'])->first();
                                        
                                        if($values){
                                            $names = $values->name;
                                        }else{
                                            $names ='--';
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

                                        @if($tasks->status == '0')
                                        <td><span class="Notifica">Not Started</span></td>
                                        @elseif($tasks->status == '1')
                                        <td><span class="Notifica1">Cancel</span></td>
                                        @else
                                        <td><span class="Notifica2">Completed</span></td>
                                        @endif
                                        
                                        <td> 
                                        <select style="border:none; background:none;" name="supportstatus" class="support" id="support">
                                        <option  value="0">Pending</option>
                                        <option value="1">Cancel</option>
                                        <option value="2">Complete</option>
                                       </select>

                                        <form action="{{ URL('/admin/delete-task/'.$tasks->id )}}" method="POST"
                                          class="kjkj">
                                            @csrf
                                            <a  id="{{$tasks->id}}" class="editicon" data-toggle="modal" data-target="#Mymodal1"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                    <button onclick="return confirm('Are you sure you want to delete this?');" type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                                   
                                </form></td>
                
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
</div>
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
		<div class="modal-content" id="taskbody">
			<div class="modal-header">
                 <h4 class="modal-title">Add Task</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button> 
				                                                             
			</div> 
			      <form method="POST" action="{{url('/agent/add-agent-task')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
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

                                  
                                </div>
                                   <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Start Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" id="birthday" name="start_date"class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">End Date</label>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                  <input type="date" id="birthday" name="end_date" class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                     </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
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
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <textarea rows="4" cols="50" id="description" name="description" form="usrform" class="form-control form-control-lg form-control-solid description">
                                        </textarea>
                                        <input type="hidden" name="comment" id="comment" value="">
                                     </div>
                                
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    
                             
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    <div class="col-2">
                                    <!--end::Label-->
                                   
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                      
                                                                       
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <br>
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
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


<div class="modal fade" id="Mymodal1">
	<div class="modal-dialog">
		<div class="modal-content" id="taskbody">
			<div class="modal-header">
                 <h4 class="modal-title">Add Task</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button> 
				                                                             
			</div> 
			      <form method="POST" action="{{url('agent/self-update-task')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                  @csrf            
                  <div class="w-100">
                    <input type="hidden" value="" id="id" name="id">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="task_title" id="task_title" class="form-control form-control-lg form-control-solid" value="" placeholder="Enter Title">
                                                                                <!--end::Input-->
                                    </div>

                                   
                                </div>
                                   <div class="row fv-row mb-10">

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label required">Start Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" id="start_date" name="start_date"class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                                                                <!--end::Input-->
                                    </div>
                                    
                                    <div class="col-6">
                                   <label class="form-label required">End Date</label>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                  <input type="date" id="end_date" name="end_date" class="form-control form-control-lg form-control-solid" value="" placeholder="Package number">
                                     </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-10">
                                       
                                        <label class="form-label required">Add Priority</label>
                                        <select class="form-control form-control-lg form-control-solid form-select" id="priority" name="priority" aria-label="Default select example">
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
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                
                                    <textarea rows="4" cols="50" id="descriptions" name="description" form="usrform" class="form-control form-control-lg form-control-solid description">
                                        </textarea>
                                        <input type="hidden" name="comment" id="comments" value="">
                                     </div>
                                
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    
                             
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                
                                    <div class="col-2">
                                    <!--end::Label-->
                                   
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                      
                                                                       
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <br>
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });

    $('#description').keyup(function() {
        var dInput = this.value;
     $("#comment").val( dInput );
});
</script>

<script>
     $(function() {
$(document).on('click', '.editicon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        
        $.ajax({
          url: '{{ url('/agent/edit-task') }}',
          method: 'get',
          data: {
             id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
           console.log(response)
            $("#id").val(response.id);
           $("#task_title").val(response.task_name);
           $("#start_date").val(response.start_date);
           $("#end_date").val(response.end_date);
           $("#descriptions").val(response.task_description);
           document.getElementById('staff').value = response.assign_id;
           document.getElementById('priority').value = response.priority;
           $('#descriptions').keyup(function() {
        var dInput = this.value;
        alert(dInput);
     $("#comments").val(dInput);
});
  }
        });
      });


    })


    $(function() {
    $('.support').on('change', function() {
     
        var status = $(this).val();
        var user_id = $(".id").val();
        alert(status)
      alert(user_id)
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/agent/changeTaskStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true); 
            }
        });
    })
  })



   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
