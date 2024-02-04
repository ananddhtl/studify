@include('institution.header')


@if(session()->has('delete'))
    <div class="alert alert-success">
        {{ session()->get('delete') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Invoice List</strong>
                            </div>
                            <tr> <div class="card-header">

                            </div></tr>
                            
                            <div class="card-body">
                                <div class="table-responsive">

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Student Name</th>
                                            <th>University Name</th>
                                            <th>Course Name</th>
                                            <th>Tution Fees</th>
                                            <th>Comission</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                              <tbody>
                              <?php $i = 0; ?>
                                @foreach($invoice as $invoices)
                                     <tr>
                                    <td>{{ ++$i }}</td> 
                                    @php 
                                        $student = App\Models\StudentModel::where(['id' => $invoices->student_id])->first();
                                        @endphp
                                        @if($student)
                                        <td>{{ $student->first_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif  
                                        @php 
                                        $univ = App\Models\addInstitution::where(['id' => $invoices->insitution_id])->first();
                                        @endphp
                                        @if($univ)
                                        <td>{{ $univ->universirty_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                  
                                        @php 
                                        $course = App\Models\addCoursesModel::where(['id' => $invoices->course_id])->where(['institution_detail_id' => $invoices->insitution_id])->first();
                                        @endphp
                                        @if($course)
                                        <td>{{ $course->c_name }}</td>
                                        @else
                                        <td>--</td>
                                        @endif


                                        @php 
                                        $fees = App\Models\addFees::where(['institution_detail_id' => $invoices->insitution_id])->where(['course_id' => $invoices->course_id])->where(['type' => $course->type])->first();
                                        @endphp
                                        @if($fees)
                                        <td>${{ $fees->tution_fees }}</td>
                                        @else
                                        <td>--</td>
                                        @endif

                                        <input type="hidden" value="{{ $invoices->id }}" class="id">

                                        @php 
                                        $commission = App\Models\addCommission::where(['institution_id' => $invoices->insitution_id])->where(['degree' => $course->type])->first();
                                        @endphp
                                        @if($commission)
                                        <td>{{ $commission->commission }}%</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                   
                                    <td style="color:green;">
                                  Paid
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

</div>



      
    </div>
  </div>
  
</div>
 

    </div><!-- /#right-panel -->

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });

  
</script>