@include('institution.header')

      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Leads</strong>
                                @if(session()->has('delete'))
    <div id="comm" class="alert alert-success">
        {{ session()->get('delete') }}
    </div>
@endif
                                
            <!-- <button style="float: right;" data-toggle="modal" data-target="#myModal" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Package</button> -->
           <button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Leads
</button>


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
                                            <th> Assign To Staff</th>
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
                                        <input type="hidden" value="{{ $lead->id }}" class="id">

                                        @if($lead->staff_assign_id == '0')
                                       <td>--</td>
                                       @else
                                       @php
                                        $values = App\Models\addRole::where(['id' => $lead->staff_assign_id])->first();
                                        if($values){
                                        $names = $values->name;
                                        }else{
                                          $names = '--';
                                        }
                                        @endphp
                                       <td>{{$names}}</td>
                                       @endif
                                        <td> 
                                        <select style="border:none; background:none;" name="supportstatus" class="support" id="support">
                                        <option  value="0">Pending</option>
                                        <option value="1">Complete</option>
                                       </select>
                                       <a href="" class="assignn" data-id="{{$lead->id}}" type="button"   data-toggle="modal" data-target="#exampleModal1">
                                      <img class="ll" src="{{asset('assets/images/Screenshot (20).png')}}" class="ll" style="width: 30px ;"></a>

                                       <form action="{{ URL('/institution/delete-lead/'.$lead->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                              @csrf
                     <button onclick="return confirm('Are you sure you want to delete this ?');" type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                </form></td>
                                    
                                      </tr>
                                       @endforeach
                                   @else 
                                  <tr> no data found</tr>
                                    @endif

                                  </tbody>
                                </table>
                            </div>
                            
                        </div>



     <div class="modal fade show in"  data-backdrop="false" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Leads</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('institution/add-lead')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
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
                              <select class="form-select" id="Crd" name="insitution_staff_id" aria-label="Default select example">
        <option value="0">Open this select menu</option>
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


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div style="display:none;"  class="modal fade show in"  data-backdrop="false" id="exampleModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="width5">
        <div class="modal-header">
          <h4 class="modal-title">Add Leads</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('institution/assign-staff')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                            <div class="row fv-row mb-12">
                                <div class="row">
                                    <input type="hidden" id="assign_id" name="assign_id" value="" >
                              <label class="form-label required">Assign To Staff</label><br>
                              <select class="form-select" id="Crd" name="agent" aria-label="Default select example">
        <option >Open this select menu</option>
        @foreach($staff as $staffs)
        <option value="{{$staffs->id}}">{{$staffs->name}}</option>
        @endforeach
        </select>                             
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
<!-- /// -->



 <script src="{{asset('assets/js/toggle.js')}}"></script>

</body>

</html>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script >
    
 function show2() {
 $("#div").addClass("hide");
 $("#div1").removeClass("hide");
 }

 function show1() {
 $("#div").removeClass("hide");
 $("#div1").addClass("hide");

 }
 $(document).ready(function(){
  $('#exampleModal1').hide();
  $('#exampleModal').hide();
    $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
       $("#assign_id").val(dataId);
        
    });
});

 setTimeout(function(){
    $('#comm').hide()
}, 5000) 

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
      $('#exampleModal').hide();
        $('#kt_applied_application_table').DataTable();
    });

    $(function() {
    $('.support').on('change', function() {
     
        var status = $(this).val();
        var user_id = $(".id").val();
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/institution/changeLeadStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true); 
            }
        });
    })
  })

</script>