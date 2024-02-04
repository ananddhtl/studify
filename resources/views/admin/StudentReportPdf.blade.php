<!DOCTYPE html>
<html>
<head>
    <title>Student-Report-PDF</title>
  
</head>
<body>
   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <strong class="card-title"></strong>
                            </div> -->
                          
                            <div class="card-body">
<table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Student Info</th>
                                            
                                            <th>Image</th>
                                            <th>University Name</th>
                                            <th>Process Status</th>
                                            <th>Payment Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($data as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>Name:-{{ $user->first_name }}<br>
                                        Email:-{{ $user->email }}
                                        </td>
                                       @if($user->student_img !='')
                                        <td> <img  data-toggle="modal" data-target="#exampleModalCenter" onclick="onClick(this)" src="{{asset('/public/StudentImage/'.$user->student_img)}}" width="100" height="100" class="thumb-lg img-circle" alt="">
</td>
                                      @else
                                      <td><img src="{{asset('/public/StudentImage/no-image.png')}}" alt="Site Logo" width="50" height="50"></td>

                                      @endif

                                      @php 
                                     $university = App\Models\addInstitution::where(['id' => $user->insitution_id])->first();

                                      @endphp
                                      @if($university)
                                      <td>{{$university->universirty_name}}</td>
                                      @else
                                      <td>--</td>
                                      @endif
                                      
                                        @if($user->student_status == '4')
                                       <td style="color:green;">Complete</td>
                                       @else
                                       <td style="color:red;">Pending</td>
                                       @endif

                                        @if($user->payment_status == '0')
                                       <td style="color:red;">Pending</td>
                                       @else
                                       <td style="color:green;">Pending</td>
                                       @endif
                                      </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</body>
</html>