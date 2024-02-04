@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lead List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>

                            
                            <div class="card-body">
                               
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                           <th>Sr No.</th>
                                            
                                            <th>Source</th>
                                            <th>Notes</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if($leads!='')
                                      <?php $i = 0; ?>
                                       @foreach ($leads as $lead)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       
                                        <td>{{ $lead->source }}</td>
                                        <td>{{ $lead->comment }}</td>
                                        <td>
                                        <input type="hidden" value="{{ $lead->id }}" class="id">

                                       <select style="border:none; background:none;" name="supportstatus" class="support" id="support">
                                        <option  value="0">Pending</option>
                                        <option value="1">Complete</option>
                                       </select>
                                                                       
                                    </td>
                                     </tr>
                                       @endforeach
                                   @else 
                                  <tr> no data found</tr>
                                    @endif  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div> 


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        
        <div class="modal fade show in"  data-backdrop="false" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="width">
        <div class="modal-header">
          <h4 class="modal-title">Add Leads</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('agent/add-lead')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-6">
                              <label class="form-label required">First Name:</label><br>
                            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid">
                              </div>

                              <div class="col-6">
                              <label class="form-label required">Last Name:</label><br>
                            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid">
                              </div>
                              
                          </div>
                         
                    </div>


                     <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-6">
                              <label class="form-label required">Email:</label><br>
                            <input type="text" name="email" class="form-control form-control-lg form-control-solid">
                              </div>

                              <div class="col-6">
                              <label class="form-label required">Contact:</label><br>
                            <input type="text" name="phone" class="form-control form-control-lg form-control-solid">
                              </div>
                              
                          </div>
                         
                    </div>

                      <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-6">
                              <label class="form-label required">Location:</label><br>
                            <input type="text" name="location" class="form-control form-control-lg form-control-solid">
                              </div>

                              <div class="col-6">
                              <label class="form-label required">Source:</label><br>
                            <input type="text" name="source" class="form-control form-control-lg form-control-solid">
                              </div>
                              
                          </div>
                         
                    </div>

                    <div class="row fv-row mb-12">
                                <div class="row">
                                    
                              <label class="form-label required">Assign To Staff</label><br>
                              <select class="form-select" id="Crd" name="agent" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($staff as $staffs)
        <option value="{{$staffs->id}}">{{$staffs->name}}</option>
        @endforeach
        </select>                             
                              
                          </div>
                         
                    </div>

                     <div class="row fv-row mb-12">
                                <div class="row">
                                    
                              <label class="form-label required">Notes:</label><br>
                            <textarea name="comment" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                      </div> <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
                        </div>
                    </div> 
        <script>
$(function() {
    $('.support').on('change', function() {
        var status = $(this).val();
        var user_id = $(".id").val();
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/agent/changeLeadStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true); 
            }
        });
    })
  })
 </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
      $('#exampleModal').hide();
        $('#kt_applied_application_table').DataTable();
    });
</script>