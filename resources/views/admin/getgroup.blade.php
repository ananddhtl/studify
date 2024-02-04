@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Group List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Group List</li>
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
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Group
</a>
                            </div>
                            <div class="card-body">
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
                                       <td><a href="{{url('/admin/add-group-members/'.$groups->id)}}" title="Add Members"><i style="color:green;" class="fa fa-users" aria-hidden="true"></i></a>
                                       <a class="editIcon" data-toggle="modal" data-target="#exampleModalCenter1" id="{{$groups->id}}" title="Add Members"><i style="color:green;" class="fa fa-pencil" aria-hidden="true"></i></a>

                                       <a href="{{url('/admin/delete-email-group/'.$groups->id)}}" title="Add Members"><i style="color:red;" class="fa fa-trash" aria-hidden="true"></i></a>

                                    </td>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
    <div class="modal-content" id="width8" >
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/add-group')}}" accept-charset="UTF-8" class="card-body2 x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
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
                                <option value="student">Student</option>
                                <option value="agent">Agent</option>
                                <option value="insitution">Insitution</option>
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

 <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
    <div class="modal-content" id="width8" >
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/update-email-group')}}" accept-charset="UTF-8" class="card-body2 x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Group Name:</label><br>
                            <input type="text" name="group_name" id="group_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

<br>
</div>

<input type="hidden" id="id" name="id">


                     <div class="row fv-row mb-12">
                                <div class="row">
                                <div class="col-12">
                              <label class="form-label required">Group Description:</label><br>
                              <textarea name="group_description" id="group_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
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


</body>

</html>
<script>

$(function() {
$(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        
        $.ajax({
          url: '{{ url('/admin/edit-email-group') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
          console.log(response)
            $("#id").val(response.id);
           $("#group_name").val(response.group_name);
           $("#group_description").val(response.group_description);

         
          }
        });
      });


    })


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