@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Candidate All Courses</li>
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
                                             <th>Transcation Id</th>
                                            <th>Course Name</th>
                                            <th>Student Name</th>
                                            <th>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                      @if($course!='')
                                      <?php $i = 1; ?>
                                       @foreach ($course as $courses)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$courses->transcation_id}}</td>
                                        @php 
                                     $coursename = App\Models\addShortCourse::where(['id' => $courses->course_id])->first();
                                        @endphp
                                       
                                       <td>{{$coursename->course_name}} </td>

                                       @php 
                                     $studentname = App\Models\StudentModel::where(['id' => $courses->member_id])->first();
                                        @endphp
                                       
                                       <td>{{$studentname->first_name}} {{$studentname->last_name}} </td>
                                        <td>${{$courses->amount}}</td>
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
        alert(agent_id);
        alert(support_id)
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