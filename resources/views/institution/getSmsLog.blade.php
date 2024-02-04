@include('institution.header');
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">SMS Logs</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>

                            
                            <div class="card-body">
                            	<!-- <input type="text" class="search-input h-20px" name="key" value="" placeholder="Search" data-kt-search-element="input"> -->
                               
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                           <th>Sr No.</th>
                                            <th>Sender</th>
                                            <th>Reciever</th>
                                            <th>Date</th>
                                            <th>Message </th>
                                            
                                        </tr>

                                    </thead>
                                    @if($sms!='')
                                      <?php $i = 0; ?>
                                       @foreach ($sms as $emails)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       
                                        <td>{{ $emails->sender }}</td>
                                        <td>{{ $emails->reciever }}</td>
                                        <td>{{ $emails->created_at }}</td>
                                        <td>{!!$emails->message!!}</td>
                                      
                                      
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
        </div><!-- .content -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>
      