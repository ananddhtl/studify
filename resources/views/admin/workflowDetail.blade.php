@include('layout.admin.header')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Workflow</strong>

                                @if (Session::has('msg'))
   <div id="statusmessage" class="alert alert-success">{{ Session::get('msg') }}</div>
@endif                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>
                
                            <div class="row">
                <div class="main-cc">
                <?php $i = '1'; ?>
                            @foreach($workflow as $workflows)
                            	<div class="col-sm-6" id="bord">
                            		<ul class="show">
                                 
                                 <li><h4 style="font-size: 15px; font-weight: 300;">{{$i++}}</h4></li>
                            			<li><h4 style="font-size: 15px; font-weight: 300;">{{$workflows->stage_name}}</h4></li>
                                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pulvinar pulvinar metus quis consectetur.</li>
                                 
                            			
                            		</ul>
                                <span class="dot"><i class="fa fa-book" aria-hidden="true"></i></span>
                                    
                            	</div>
                                <div class="col-sm-6">
                                  @php
                                $status = App\Models\studentWorkflow::where(['workflow_id' => $workflows->id])->where(['student_id' => $id])->first();
                                @endphp

                                @if($status)
                                @if($status->status == '0')
                                   <ul class="show1">
                                       <li>Pending<br>
                                       <a href="{{url('/agent/workflow-pending/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-clock-o" aria-hidden="true" id="work" style="color: red;"></i></a></li>
                                        <li>Reject
                                          <br>
                                          <a href="{{url('/agent/workflow-reject/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-times-circle-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Approval
                                          <br>
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}"><i class="fa fa-check-circle-o" aria-hidden="true" id="work"></i></a></li>
                                    </ul>  
                                    @elseif($status->status == '1') 
                                    <ul class="show1">
                                       <li>Pending<br>
                                       <a href="{{url('/agent/workflow-pending/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-clock-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Reject
                                          <br>
                                          <a href="{{url('/agent/workflow-reject/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-times-circle-o" aria-hidden="true" id="work" style="color: red;"></i></a></li>
                                        <li>Approval
                                          <br>
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}">  <i class="fa fa-check-circle-o" aria-hidden="true" id="work"></i></a></li>
                                    </ul> 

                                    @else
                                    <ul class="show1">
                                       <li>Pending<br>
                                       <a href="{{url('/agent/workflow-pending/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-clock-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Reject
                                          <br>
                                          <a href="{{url('/agent/workflow-reject/'.$workflows->id.'/'.$id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Approval
                                          <br>
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-check-circle-o" aria-hidden="true" id="work" style="color: green;"></i></a></li>
                                    </ul> 


                                    @endif
                                @else
                                <ul class="show1">
                                       <li>Pending<br>
                                       <a href="{{url('/agent/workflow-pending/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-clock-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Reject
                                          <br>
                                          <a href="{{url('/agent/workflow-reject/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-times-circle-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Approval
                                          <br>
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}"><i class="fa fa-check-circle-o" aria-hidden="true" id="work"></i></a></li>
                                    </ul> 
                                @endif
                                  </div>
                              @endforeach
          
                           
                            </div>

                        

                            
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <script type="text/javascript"> 
      $(document).ready( function() {
        $('#statusmessage').delay(5000).fadeOut();
      });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
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