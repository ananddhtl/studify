@include('agent.header');


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
                                <strong class="card-title">Complete Task Board</strong>
                            </div>
                           
                            
                            <div class="card-body">
                                <div class="table-responsive">

                                <!-- <a href="#" ><button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#Mymodal"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Task</button></a> -->

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Task</th>
                                            <th>Due Date</th>
                                            <th>Priority</th>
                                            <th>Assigner</th>
                                            <th>Message for assigner</th>
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
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg3.png')}}" class="flag"></td>
                                        @elseif($tasks->priority == 'medium')
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @else
                                        <td><img style="width: 34px;" src="{{asset('assets/admin/images/flg1.png')}}" class="flag"></td>
                                        @endif

                                        <input type="hidden" value="{{ $tasks->id }}" class="id">

                                         @if($tasks->assign_id != '0')
                                        @php
                                        $values = App\Models\addRole::where(['id' => $tasks->assign_id])->where(['type' => 'agent'])->first();
                                        $names = '--';
                                        if($values){
                                        $names = $values->name;
                                       }
                                        else{
                                        $names = '--';
                                        }
                                        @endphp
                                        <td>{{$names}}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        @if($tasks->cancelMessage !='')
                                        <td>{{$tasks->cancelMessage}} </td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        <td ><span style="background-color:green; color:white; padding:5px;" class="Notifica2">Completed</span></td>
                                        <td>
                                        <select style="border:none; background:none;" name="supportstatus" class="support" id="support">
                                        <option  value="0">Pending</option>
                                        <option value="1">Cancel</option>
                                        <option value="2">Complete</option>
                                       </select>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>

$(function() {
    $('.support').on('change', function() {
     
        var status = $(this).val();
        var user_id = $(".id").val();
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/agent/changeTaskStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true); 
            }
        });
    })
  })



    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>