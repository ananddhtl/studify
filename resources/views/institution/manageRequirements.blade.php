 @include('institution.header')

            
        
            <!--end::Header--><style>
    p.name {
    margin: 5px;    
}
img.img-responsive1 {
    width: 50px !important;
}
/* a.btn.btn-danger.cancel {
    width: 70% !important;
} */
</style>
@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
<div id="kt_content_container" class="container-xxl">


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Requirements List</strong>
                                <a href="{{url('/institution/add-requirements')}}" class="add-courses">Add Requirements</a>
                            </div>

                            @if(session()->has('requirementdelete'))
    <div class="alert alert-success">
        {{ session()->get('requirementdelete') }}
    </div>
@endif

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Institution Name</th>
                                            <th>Minimum GPA</th>
                                            <th>Education</th>
                                            <th>TOEFL</th>
                                            <th>IELTS</th>
                                            <th>Pearson</th>
                                            <th>Duolingo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        <?php $i = 0; ?>
                                       @foreach ($requirement as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->universirty_name }}</td>
                                        <td>{{ $user->min_gpa }}</td>
                                         <td>{{ $user->education }}</td>
                                         <td>{{ $user->TOEFL }}</td>
                                         <td>{{ $user->IELTS }}</td>
                                         <td>{{ $user->Pearson }}</td>
                                         <td>{{ $user->Duolingo }}</td>
                                        <td> <form action="{{ URL('/requirement/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a class="btn btn-primary" href="{{ URL('/requirement/edit/'.$user->id )}}">Edit</a>
                              @csrf
                     <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
                                    
                                      </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Copyright © Studify</a>
            </li>

        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
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
           $('.toggle-class').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var course_id = $(this).data('id');  
           alert(course_id);
           alert(status);

           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/courseStatus/update', 
               data: {'status': status, 'course_id': course_id}, 
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