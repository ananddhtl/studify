@include('layout.admin.header')


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Agent Report List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Agent Report List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('deleteagent'))
    <div class="alert alert-success">
        {{ session()->get('deleteagent') }}
    </div>
@endif

@if(session()->has('updateagent'))
    <div class="alert alert-success">
        {{ session()->get('updateagent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                                 <a style="float: right;" href="{{url('/admin/agent-report/generate-pdf')}}" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Export to PDF</a>
                            </div>
                            <div class="card-body">
                           
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="main">Sr No.</th>
                                            <th id="main">Company Name</th>
                                            <th id="main">Name</th>
                                            <th id="main">Email</th>
                                            <th>Image</th>
                                            
                                            <th>Payment Status</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($agent as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->company_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                          @if($user->agent_image !='')
                                        <td> <img  data-toggle="modal" data-target="#exampleModalCenter" onclick="onClick(this)" src="{{asset('/public/AgentImage/'.$user->agent_image)}}" width="100" height="100" class="thumb-lg img-circle" alt="">

                                      @else
                                      <td><img src="{{asset('/public/StudentImage/no-image.png')}}" alt="Site Logo" width="50" height="50"></td>

                                      @endif
                                      
                                      
                                        @if($user->payment_status == '0')
                                       <td style="color:red;">Pending</td>
                                       @else
                                       <td style="color:green;">Complete</td>
                                       @endif
                                       <td> {{$user->created_at->format('d-m-Y');}}</td>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 80%;height: 300px;">
     
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
      
      <div class="modal-body">
      <img id="img01" width="200" height="300">

      </div>
      <div class="modal-footer">
       
        
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
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
         
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/agentstatus/update', 
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

function onClick(element) {
           
           document.getElementById("img01").src = element.src;
         
           document.getElementById("exampleModalCenter").style.display = "block";
         }

</script>