@include('layout.admin.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Support List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Pending Support List</li>
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
                        <select class="form-select supportdata" id="supportdata" name="supporttable" aria-label="Default select example">
        <option>Select Category</option>

        @if(Session::get('typee') == 'agent')
        <option value="agent" selected>Counselor</option>
        @else
        <option value="agent">Counselor</option>
        @endif
        @if(Session::get('typee') == 'insitution')
        <option value="insitution" selected>Insitution</option>
        @else
        <option value="insitution">Insitution</option>
        @endif



        </select>

                            <!-- <div class="card-header">
                                <strong class="card-title"></strong>
                            </div> -->
                            <div class="card-body">

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                             <th>Sr No.</th>
                                             <th>Name</th>
                                            <th>Subject</th>
                                            <th>Notes</th>
                                            <th>Assign To</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @if($support!='')
                                      <?php $i = 0;?>
                                       @foreach ($support as $supports)
                                      <tr>
                                        <?php $name = '';?>

                                        @if($supports->type == 'agent')
                                        @php
                                        $value = App\Models\AgentModel::where(['id' => $supports->agent_id])->first();
                                        if($value){
                                        $name = $value->first_name;
                                        }else{
                                            $name = '--';
                                        }
                                        @endphp
                                        @else
                                        @php
                                        $value = App\Models\addInstitution::where(['id' => $supports->insitution_id])->first();
                                        if($value){
                                            $name = $value->universirty_name;
                                        }else{
                                            $name = '--';
                                        }

                                        @endphp
                                        @endif

                                        <td>{{ ++$i }}</td>
                                        <td>{{$name}}</td>
                                        <td>{{ $supports->subject }}</td>
                                        <td>{{ $supports->comment }}</td>
                                        @if($supports->assign_to != '0')
                                        @php
                                        $values = App\Models\addRole::where(['id' => $supports->assign_to])->first();
                                        if($values){
                                        $names = $values->name;
                                        }else{
                                            $names='';
                                        }
                                        @endphp
                                        <td>{{$names}}</td>
                                        @else
                                        <td>--</td>
                                        @endif
                                        <td>{{ $supports->created_at }}</td>
                                        <input type="hidden" value="{{ $supports->id }}" class="id">
                                       <td>
                                       <select style="border:none; background:none;" name="supportstatus" class="support" id="support">
                                        <option  value="0">Pending</option>
                                        <option value="1">Complete</option>
                                       </select>
                                       @if($supports->assign_to == '0')
                                       <a  data-id="{{$supports->id}}"  class="getid" data-toggle="modal" data-target="#exampleModalCenter"><img src="{{asset('assets/admin/images/Screenshot (20).png')}}" id="icon3"></a>
                                       @endif
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


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 80%;height: 300px;">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Assign Tickt To Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <label style="font-size:16px;">Select Member </label>
      <select class="form-select" id="Crd" name="agent" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($staff as $staffs)
        <option value="{{$staffs->id}}">{{$staffs->name}}</option>
        @endforeach
        </select>
        <input type="hidden" name="bookId" id="bookId" value=""/>
      </div>
      <div class="modal-footer">

        <button type="button" id="buttton" class="btn btn-primary">Submit</button>
      </div>

    </div>
  </div>
</div>

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
</script>
<script>
  $(function() {
    $('.support').on('change', function() {
        var status = $(this).val();
        var user_id = $(".id").val();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true);
            }
        });
    })
  })

  $(function() {
    $('#buttton').on('click', function() {
        var agent_id = $('#Crd').val();
        var support_id = $("#bookId").val();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/assign-ticket',
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

$('.supportdata').on('change', function() {
        var sort = ($(this).val());
             window.location.href = "https://studify.au/admin/support/"+sort;

})

</script>