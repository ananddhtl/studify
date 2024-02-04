@include('institution.header');
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Reminders</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>
  
<div class="container">
    <div id='calendar'></div>
</div>

</div>
                        </div>
                    </div>
                    </div> 


                </div>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
            // put your options and callbacks here
            events : [
                @foreach($tasks as $task)
                @php 
                $assign = App\Models\addRole::where(['id' => $task->assign_id])->where(['type' => 'insitution'])->first();
                if($assign){
                    $name = $assign->name;
                }else{
                    $name = '';
                }
                @endphp
                {
                    title : '{{ $task->task_name }}({{$name}})',
                    start : '{{ $task->start_date }}',
                    end : '{{ $task->end_date }}'
                   
                },
                @endforeach
            ]
        })
    });
</script>
  
</body>
</html>