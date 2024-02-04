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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Source</th>
                                            <th>Notes</th>
                                            
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                      <?php $i = 0; ?>
                                       @foreach ($leads as $lead)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $lead->first_name}} {{ $lead->last_name}}</td>
                                        <input type="hidden" value="{{ $lead->id }}" class="id">
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>{{ $lead->source }}</td>
                                        <td>{{ $lead->comment }}</td>
                                        <td style="color:green;">Completed </td>
                                        <td>
                                         <button type="button" id="buttton" class=""><img style="width:32px" src="{{asset('assets/admin/images/notuse.png')}}" id="icon3"></button>
                                           </td>
                                    
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

        
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script>
$(function() {
    $('#buttton').on('click', function() {
        if (confirm("Are you sure?")) {
        // your deletion code
        return false;
    }
    return true;

        var status = '0';
        var user_id = $(".id").val();
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/leadchangeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true);
            }
        });
    })
  })

  $(document).ready(function () {
      
        $('#kt_applied_application_table').DataTable();
    });
        </script>