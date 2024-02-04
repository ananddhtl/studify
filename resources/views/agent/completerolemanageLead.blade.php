@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Complete Lead List</strong>
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
                                            
                                            <th>Status</th>
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
                                        <td style="color:green;">Complete
                                        <input type="hidden" value="{{ $lead->id }}" class="id">

                                      
                                                                       
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

        
             <script>
$(function() {
    $('.support').on('change', function() {
        var status = $(this).val();
        var user_id = $(".id").val();
       alert(status);
       alert(user_id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/agent/changeLeadStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
            }
        });
    })
  })
 </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>