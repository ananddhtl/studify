@include('agent.header')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Role & Permission</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->
 </div>
 @if(session()->has('emailsend'))
    <div class="alert alert-success">
        {{ session()->get('emailsend') }}
    </div>
@endif

                            <div class="card-body">
                              <div class="table-responsive">
                                 <a href="{{url('agent/add-role')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a>
                                <table id="kt_applied_application_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                 @foreach($allrole as $allroles)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$allroles->name}}</td>
                                        <td>{{$allroles->email}}</td>
                                        <td>{{$allroles->phone}}</td>
                                        <td>{{$allroles->role}}</td>
                                        <td> <form action="{{url('agent/role/delete/'.$allroles->id)}}" method="">
                                           
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a class="" href="{{url('agent/edit-role/'.$allroles->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                    
                     <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
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
}, 15000); // <-- time in milliseconds
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>