@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Email Templates</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->
 

                            </div>
                            @if(session()->has('template'))
    <div class="alert alert-success">
        {{ session()->get('template') }}
    </div>
@endif
                            
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                  <a href="#" ><button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Template</button></a>
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                              <thead>
                                        <tr>

                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i='1' @endphp
                                    @foreach($addEmailTemplate as $addEmailTemplates)
                                    <tr>
                                <td>{{$i++}}</td>
                                  <td>{{$addEmailTemplates->name}}</td>
                                  <td>{!!$addEmailTemplates->description!!}</td>
                                  <td> 
                                  <a  id="{{$addEmailTemplates->id}}" class="editicon" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>

                             <a class=""  onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('/agent/delete-email-template/'.$addEmailTemplates->id)}}"><i  style="color:red" class="fa fa-trash" aria-hidden="true" id="icn"></i></a>   </td>

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

        <!-- update email template  -->
        <div style="display:none;"  class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
          <h4 class="modal-title">Add Template</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/agent/update-email-template')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data" style="margin-top: 10%;">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                <input type="hidden" name="id" id="id" value="">
                              <label class="form-label required">Template Name:</label><br>
                            <input type="text" name="template_name" id="template_name" class="form-control form-control-lg form-control-solid">
                            <br><br>

                               <label class="form-label required">Template Description:</label><br>
                              <textarea class="ckeditor form-control" id="myTextareaa"  name="template_description"></textarea>                                     </div>
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

 <div style="display:none;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
          <h4 class="modal-title">Add Template</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/agent/add-email-template')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data" style="margin-top: 10%;">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                              
                              <label class="form-label required">Template Name:</label><br>
                            <input type="text" name="template_name" class="form-control form-control-lg form-control-solid">
                            <br><br>

                               <label class="form-label required">Template Description:</label><br>
                              <textarea class="ckeditor form-control" id="template_description" name="template_description"></textarea>                                     </div>
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


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                   <script>
$(document).ready(function(){
  $('#exampleModal1').hide();
  $('#exampleModal').hide();
    $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
       $("#assign_id").val(dataId);
        
    });
});


$(function() {
$(document).on('click', '.editicon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
       
        $.ajax({
          url: '{{ url('/agent/edit-email-template') }}',
          method: 'get',
          data: {
             id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
           
            $("#id").val(response.id);
           $("#template_name").val(response.name);
           CKEDITOR.instances['myTextareaa'].setData(response.description)

 }
        });
      });


    })

    

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

  $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
$(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>