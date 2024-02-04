@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Lead List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Pending Lead List</li>
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
                            <div class="card-header">
                                <strong class="card-title"></strong>
                                <a href=""  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Leads
</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                             <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Source</th>
                                            <th>Comment</th>
                                            <th>Assign To</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                      @if($leads!='')
                                      <?php $i = 0; ?>
                                       @foreach ($leads as $lead)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $lead->first_name}} {{ $lead->last_name}}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>{{ $lead->source }}</td>
                                        <td>{{ $lead->comment }}</td>
                                        @if($lead->lead_assign_id != '0' )
                                        @php
                                        $values = App\Models\AgentModel::where(['id' => $lead->lead_assign_id])->first();
                                        if($values){
                                        $names = $values->first_name;
                                        $namess = $values->last_name;
                                        }else{
                                        $names = '-';
                                        $namess = '-';
                                        }
                                        @endphp
                                        <td>{{$names}} {{$namess}}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        
                                        <td style="color:red;"> Pending</td>
                                         <td>
                                         <form action="{{ URL('/admin/delete-lead/'.$lead->id )}}" method="POST"
                                          class="kjkj">
                                            @csrf
                                    <!-- <a class="" href="{{url('/admin/edit-lead/'.$lead->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a> -->
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this ?');" class="" style="margin-left: 20%;"><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                                      <a class="" href="{{url('/admin/edit-lead/'.$lead->id)}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                   
                                </form>
                                  

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
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 100%;">
    <div class="modal-content" id="width">
        <div class="modal-header">
          <h4 class="modal-title">Add Leads</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/add-lead')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
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
        <option value="{{$staffs->id}}">{{$staffs->first_name}} </option>
        @endforeach
        </select>                             
                              
                          </div>
                         
                    </div>

                     <div class="row fv-row mb-12">
                                <div class="row">
                                    
                              <label class="form-label required">Notes:</label><br>
                            <textarea name="comment" class="form-control form-control-lg form-control-solid">Notes</textarea>
                             
                              
                          </div>
                         
                    </div>
                                
                             
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
</script>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});

$(function() {
    $('#buttton').on('click', function() {
        var agent_id = $('#Crd').val();
        var support_id = $("#bookId").val();
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/assign-lead',
            data: {'agent_id': agent_id, 'support_id': support_id},
            success: function(data){
             alert(data.success)
             location.reload(true);
            }
        });
    })
  })



$('.getid').on('click', function() {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});

</script>