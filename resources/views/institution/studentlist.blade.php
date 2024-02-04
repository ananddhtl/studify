@include('institution.header')

      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Student Manage</strong>
                                @if(session()->has('delete'))
    <div id="comm" class="alert alert-success">
        {{ session()->get('delete') }}
    </div>
@endif
        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                              <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($student as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        
                                        @php
                                        $coursename = '';
                                        $course =  App\Models\universityCoursePayment::where(['insitution_id' => $idd])->where(['student_id' => $user->id])->first(); 
                                        if($course){
                                        $coursename =  App\Models\addCoursesModel::where(['id' => $course->course_id])->first();
                                        }
                                          @endphp
                                          @if($coursename)
                                          <td>{{ $coursename->c_name }}</td>
                                          @else
                                          <td>--</td>
                                          @endif
                                        <td>{{ $user->created_at }}</td>
                                        <td> <form action="{{ URL('admin/student/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                      <a class="" title="View this application" href="{{url('/institution/check-application/'.$user->id)}}"><i class="fa fa-eye" aria-hidden="true" id="eye"></i></a>
   
                    @csrf
                    
      
                    <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                </form></td>
                                      </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>



    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
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


 setTimeout(function(){
    $('#comm').hide()
}, 5000) 

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });

    $(function() {
    $('#buttton').on('click', function() {
       
        var status = '0';
        var user_id = $(".id").val();
       alert(user_id)
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/institution/leadchangeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true);
            }
        });
    })
  })

</script>