@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Application List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>
                            @if(session()->has('message'))
    <div id="message" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                            
                            <div class="card-body">
                               
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                           <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if($application!='')
                                      <?php $i = 0; ?>
                                       @foreach ($application as $applications)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $applications->first_name}} {{ $applications->last_name}}</td>
                                        <td>{{ $applications->email }}</td>
                                        <td>{{ $applications->phone }}</td>
                                        @if($applications->status == '0')
                                        <td>Pending</td>
                                        @else
                                        <td>Complete</td>
                                        @endif
                                        <td><a title="Edit Apllication"  type="button" href="{{url('agent/check-application/'.$applications->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i>
                                      <a title="Send to admin" href="{{url('agent/checked-application/'.$applications->id)}}">  <i class="fa fa-send-o" aria-hidden="true" id="icn"></i></a>
                                    </a>
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
        
        <script type="text/javascript"> 
      $(document).ready( function() {
        $('#message').delay(5000).fadeOut();
      });
    </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>

   <!-- <script>
$(document).ready(function(){
  $('#exampleModal1').hide();
  $('#exampleModal').hide();
    $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
        alert(dataId)
        $("#assign_id").val(dataId);
        
    });
});
</script> -->