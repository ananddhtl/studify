@include('layout.admin.header')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Task List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('complete'))
    <div class="alert alert-success">
        {{ session()->get('complete') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Task Borad</strong>
                            </div>
                            <tr> <div class="card-header">

                            </div></tr>
                            
                            <div class="card-body">

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Task</th>
                                            <th>End Date</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       <?php $i=1;?>
                                        @foreach($task as $tasks)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$tasks->task_name}}</td>

                                            @php
                                            \Carbon\Carbon::setLocale('ru');
                                            @endphp

                                        <td>{{ \Carbon\Carbon::parse($tasks->edn_date)->format('d F Y') }}</td>

                                         @if($tasks->priority == 'low')
                                        <td><img src="{{asset('assets/admin/images/flg3.png')}}" class="flag"></td>
                                        @elseif($tasks->priority == 'medium')
                                        <td><img src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @else
                                        <td><img src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @endif
                                        
                                        @if($tasks->status == '0')
                                        <td><span class="Notifica1">Not Started</span></td>
                                        @elseif($tasks->status == '1')
                                        <td><span class="Notifica">In Progress</span></td>
                                        @else
                                        <td><span class="Notifica2">Completed</span></td>
                                        @endif
                                    <td> 
                                    <a href="{{url('admin/complete-task/'.$tasks->id)}}"><i  style="color:green;" class="fa fa-check" aria-hidden="true"></i></a>

                                     <a data-id="{{$tasks->id}}"  class="getid" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      
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

</div>



      
    </div>
  </div>
  
</div>
 

    </div><!-- /#right-panel -->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 80%;height: 300px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <label style="font-size:16px;">Enter comment</label>
        <textarea rows="4" cols="50" id="cancelcomment" name="comment" form="usrform" class="form-control form-control-lg form-control-solid">
                                        </textarea>
        <input type="hidden" name="bookId" id="bookId" value=""/>
      </div>
      <div class="modal-footer">
       
        <button type="button" id="buttton" class="btn btn-primary">Submit</button>
      </div>

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

  $(function() {
    $('#buttton').on('click', function() {
        var status = $("#cancelcomment").val();
        var user_id = $("#bookId").val();
        alert(status)
        alert(user_id)
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/cancelstatus',
            data: {'status': status, 'user_id': user_id},
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

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
