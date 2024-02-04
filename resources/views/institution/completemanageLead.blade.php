@include('institution.header')

      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Leads</strong>
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
                                            
                                            <th>Source</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if($leads!='')
                                      <?php $i = 0; ?>
                                       @foreach ($leads as $lead)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       
                                        <td>{{ $lead->source }}</td>
                                        <td>{{ $lead->comment }}</td>
                                       <input type="hidden" value="{{ $lead->id }}" class="id">
                                       <td style="color:green;"> Complete  </td>
                                        <td>
                                    <a title="Resolve this lead" type="button" id="buttton" class=""><img style="width:20%;" src="{{asset('assets/admin/images/notuse.png')}}" id="icon3"></a>
                                        </td>
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