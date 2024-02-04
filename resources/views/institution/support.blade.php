@include('institution.header');
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Supprot List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>

                            
                            <div class="card-body">
                            	<!-- <input type="text" class="search-input h-20px" name="key" value="" placeholder="Search" data-kt-search-element="input"> -->
                                <a href="https://studify.au/institution/add-support"><button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Ticket
</button></a><br>

                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                           <th>Sr No.</th>
                                            <th>Subject</th>
                                            <th>Notes</th>
                                            <th>Status </th>
                                            
                                            
                                        </tr>

                                    </thead>
                                    @if($support!='')
                                      <?php $i = 0; ?>
                                       @foreach ($support as $supports)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       
                                        <td>{{ $supports->subject }}</td>
                                        <td>{{ $supports->comment }}</td>
                                        @if($supports->status == '0')
                                        <td style="color:red;">Pending</td>
                                        @else
                                        <td>Complete</td>
                                        @endif
                                      
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
                </div>
            </div><!-- .animated -->
        </div>
        <script src="{{asset('assets/js/toggle.js')}}"></script>

</body>

</html>

<!-- .content -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>
      