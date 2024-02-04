@include('agent.header');
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Transcations List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>

                            
                            <div class="card-body">
                            	<!-- <input type="text" class="search-input h-20px" name="key" value="" placeholder="Search" data-kt-search-element="input"> -->
                               
                                <div class="table-responsive">
                                  
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Package For</th>
                                            <th>Package Name</th>
                                            <th>Package Price</th>
                                            <th>Date</th>
                                            <th>Transcation Id</th>
                                            
                                            
                                        </tr>

                                    </thead>
                                    @if($allTranscation!='')
                                      <?php $i = 0; ?>
                                       @foreach ($allTranscation as $allTranscations)
                                       @foreach ($allTranscations as $allTranscationsq)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                       @if($allTranscationsq->balance_email)
                                       @php
                                       $vallue = App\Models\email_package::where(['id' =>$allTranscationsq->package_id])->first();
                                       $naam = '--';
                                       if($vallue){
                                        $naam = $vallue->package_name;
                                       }else{
                                        $naam = '--';
                                       }
                                       @endphp
                                       <td>Emails</td>
                                        <td>{{$naam }}</td>
                                        
                                        @else
                                        @php
                                       $vallue = App\Models\smsPackage::where(['id' =>$allTranscationsq->package_id])->first();
                                       $naam = '--';
                                       if($vallue){
                                        $naam = $vallue->package_name;
                                       }else{
                                        $naam = '--';
                                       }
                                       @endphp
                                       <td>SMS</td>
                                       <td>{{$naam }}</td>
                                        @endif
                                       
                                        <td>${{ $allTranscationsq->package_price }}</td>
                                        <td>{{ $allTranscationsq->created_at }}</td>
                                        <td>{{ $allTranscationsq->transcation_id }}</td>
                                       
                                 </tr>
                                       @endforeach
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
      