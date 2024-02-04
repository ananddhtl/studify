@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Workflow</strong>
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
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                      <?php $i = 0; ?>
                                       @foreach ($students as $student)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $student->first_name}} {{ $student->last_name}}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                     <td> 
                                      <a href="{{url('agent/workflow-detail/'.$student->id)}}" class="assignn"  type="button">
                                      <img class="ll" src="{{asset('assets/images/Screenshot (20).png')}}" class="ll" style="width: 30px ;"></a>
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

           
       
<!-- /// -->


        
      
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script>
$(document).ready(function(){
  $('.exampleModal1').hide();

});


$(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>