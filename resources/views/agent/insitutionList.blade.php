@include('agent.header');
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Institution</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                            <th>Sr No. </th>
                                            <th>Institution Image</th>
                                            <th>Institution Name</th>
                                            
                                            <th>Commission</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i= 1; ?>
                                        @foreach($allinsitution as $allinsitutions)
                                      <tr>
                                        <td> {{$i++}}</td>
                                        <td><div class="d-block ">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative ">
                                                <!--begin::Avatar-->
                                                <a href="#">
                                                <div class="symbol symbol-65px symbol-circle ">
<img src="{{asset('InstitutionImage/'.$allinsitutions->univ_img)}}" class="img-responsive" alt="" style="width: 100px; height: 80px;">


                                            </a>
                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::Wrapper-->

                                        </div></td>
                                        <td><p class="text-muted fw-normal d-block">{{$allinsitutions->universirty_name}}</p></td>
                                         
                                        <td>
                            @php 
$value = App\Models\addCommission::where(['institution_id' => $allinsitutions->id])->get();
@endphp
                                   <div class="cours">

                                        	<ul class="astimet"> 
                       @foreach($value as $values)
                                           	<li>{{$values->degree}}</li>
                       @endforeach
                                            </ul>
<ul class="astimet"> 
     @foreach($value as $values)
     @if($values->commission_type == 'Percentage')
     <li><span class="per">{{$values->commission}}%</span></li>
                                            @else
                                            <li><span class="per">{{$values->commission}}</span></li>
                                            @endif
@endforeach

                                        </ul>

                                    </div>
                                        
                                    </td>
                             <td> <form action="#" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                   
                                    <a class="" href="{{url('/agent/student-list/'.$allinsitutions->id)}}"><i class="fa fa-eye" aria-hidden="true" id="eye"></i></a>
                                    <!-- <a class="" href="#"><i class="fa fa-money" aria-hidden="true"id="icn"></i></a> -->
                        </form></td>
                                      </tr>
                                      @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        
                          