@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Offline Course Payments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Offline Course Payments</li>
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
                               
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                             <th>Sr No.</th>
                                            <th>Student Name</th>
                                            <th>Institution Name</th>
                                            <th>Course Name</th>
                                            <th>Transcation Image</th>
                                            <th>Fees Amount</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                      @if($offline!='')
                                      <?php $i = 0; ?>
                                       @foreach ($offline as $offlines)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        @php
                                                       $value = App\Models\StudentModel::where(['id' =>$offlines->student_id])->first();
                                                       @endphp
                                                       @if($value)
                                                       <td>{{ $value->first_name}} {{ $value->last_name}}</td>
                                                       @else                               
                                        <td>--</td>
                                        @endif
                                       
                                        @php
                                                       $values = App\Models\addInstitution::where(['id' =>$offlines->insitution_id])->first();
                                                       @endphp
                                                       @if($values)
                                                       @if($values->universirty_name)
                                                       <td>{{ $values->universirty_name }}</td>
                                                       @else
                                        <td>--</td>
                                        @endif   
                                        @else
                                        <td>--</td>
                                        @endif
                                        
                                        @php
                                                $values = App\Models\addCoursesModel::where(['id' =>$offlines->course_id])->first();
                                                       @endphp
                                                       @if($values)
                                                       @if($values->c_name)
                                                       <td>{{ $values->c_name }}</td>
                                                       @else
                                        <td>--</td>
                                        @endif   
                                        @else
                                        <td>--</td>
                                        @endif   

                                        <td><img src="{{asset('/public/OfflineUniversityPayment/'.$offlines->image)}}" class="css-class" alt="alt text">
</td>
                                        <td>${{ $offlines->fees_amount }}</td>
                                        
                                      
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




</script>