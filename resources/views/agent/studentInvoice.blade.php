@include('agent.header')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Invoice List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                          </div>
                            <div class="card-body">
                              <div class="table-responsive">

                                <table id="kt_applied_application_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Stuent Name</th>
                                            <th>University Name</th>
                                            <th>Course Name</th>
                                            <th>Tution Fees</th>
                                            <th>Comission</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($studentPayment as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       
                                        @php 
                                        $student = App\Models\StudentModel::where(['id' => $user->student_id])->first();
                                        @endphp
                                        @if($student)
                                        <td>{{ $student->first_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        @php 
                                        $univ = App\Models\addInstitution::where(['id' => $user->insitution_id])->first();
                                        @endphp
                                        @if($univ)
                                        <td>{{ $univ->universirty_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif

                                        @php 
                                        $course = App\Models\addCoursesModel::where(['id' => $user->course_id])->where(['institution_detail_id' => $user->insitution_id])->first();
                                        @endphp
                                        @if($course)
                                        <td>{{ $course->c_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif

                                       
                                        @php 
                                        $fees = App\Models\addFees::where(['institution_detail_id' => $user->insitution_id])->where(['course_id' => $user->course_id])->where(['type' => $course->type])->first();
                                        @endphp
                                        @if($fees)
                                        <td>${{ $fees->tution_fees }}</td>
                                        @else
                                        <td>--</td>
                                        @endif


                                        @php 
                                        $commission = App\Models\addCommission::where(['institution_id' => $user->insitution_id])->where(['degree' => $course->type])->first();
                                        @endphp
                                        @if($commission)
                                        <td>{{ $commission->commission }}%</td>
                                        @else
                                        <td>--</td>
                                        @endif



                                        <td><input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch" {{ $user->status == 1 ? 'checked' : '' }}></td>
                                        <td>
                                    <a class="" href="#"><i class="fa fa-file" aria-hidden="true" id="icn"></i></a>
                                    <a class="" href="#"><i class="fa fa-eye" aria-hidden="true" id="icn"></i></a>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>