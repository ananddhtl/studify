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
                                <strong class="card-title">Group List</strong>
                                 <button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Group
</button>
                            </div>
                            
                            
                            <div class="card-body">
  <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Sr No.</th>
                                            <th>Group Name</th>
                                            <th>Group Description</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    
                                      <?php $i = 1; ?>
                                      @foreach($group as $groups)
                                       <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{$groups->group_name}}</td>
                                       <td>{{$groups->group_description}}</td>
                                       <td>{{$groups->type}}</td>
                                       <td><a href="{{url('/agent/add-group-members/'.$groups->id)}}" title="Add Members"><i style="color:green;" class="fa fa-users" aria-hidden="true"></i></a></td>
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

     <div style="display:none;" class="modal fade show in"  data-backdrop="false" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="width8">
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
       
            <form method="POST" action="{{url('/agent/add-group')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                                <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Group Name:</label><br>
                            <input type="text" name="group_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

<br>
</div>
                     <div class="row fv-row mb-12">
                                <div class="row">
                                <div class="col-12">
                              <label class="form-label required">Group Description:</label><br>
                              <textarea name="group_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                           </div>
                         </div>

                         <div class="row fv-row">
                                <div class="row">
                                <div class="col-12">
                              <label class="form-label required">Group Type:</label><br>
                              <select class="form-select form-control form-control-lg form-control-solid" name="type" aria-label="Default select example">
                                <option selected>Select member type</option>
                                
                                <option value="agent">Agent</option>
                                <option value="insitution">Insitution</option>
                                <option value="student">Student</option>

                                </select>
                              </div>
                           </div>
                         </div>
                         
                    </div>
                    <br>
                      <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
  </div>
</div>




    </div><!-- /#right-panel -->

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
    $(document).ready(function () {
      $('#exampleModal').hide();
        $('#kt_applied_application_table').DataTable();
    });
</script>