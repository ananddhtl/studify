@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Student List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Student List</li>
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
                            <!-- <div class="card-header">
                                <strong class="card-title"></strong>
                            </div> -->
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            
                                            <th>Student Name</th>
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
                                    <a class="" href="{{url('admin/student/inovice/'.$user->id)}}"><i class="fa fa-file" aria-hidden="true" id="icn"></i></a>

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
});</script>