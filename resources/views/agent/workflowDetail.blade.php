@include('agent.header')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Workflow</strong>

                                @if (Session::has('msg'))
   <div class="alert alert-info">{{ Session::get('msg') }}</div>
@endif
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

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
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-check-circle-o" aria-hidden="true" id="work"></i></a></li>
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
                                          <a href="{{url('/agent/workflow-reject/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-times-circle-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Approval
                                          <br>
                                          <a href="{{url('/agent/workflow-complete/'.$workflows->id.'/'.$id)}}"><i class="fa fa-check-circle-o" aria-hidden="true" id="work" style="color: green;"></i></a></li>
                                    </ul> 


                                    @endif
                                @else
                                <ul class="show1">
                                       <li>Pending<br>
                                       <a href="{{url('/agent/workflow-pending/'.$workflows->id.'/'.$id)}}"> <i class="fa fa-clock-o" aria-hidden="true" id="work"></i></a></li>
                                        <li>Reject
                                          <br>
                                          <i class="fa fa-times-circle-o" aria-hidden="true" id="work"></i></li>
                                        <li>Approval
                                          <br>
                                          <i class="fa fa-check-circle-o" aria-hidden="true" id="work"></i></li>
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
            