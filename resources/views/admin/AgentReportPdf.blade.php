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
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="main">Sr No.</th>
                                            <th id="main">Company Name</th>
                                            <th id="main">Name</th>
                                            <th id="main">Email</th>
                                            <th>Image</th>
                                            
                                            <th>Payment Status</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($data as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->company_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                          @if($user->agent_image !='')
                                        <td> <img  data-toggle="modal" data-target="#exampleModalCenter" onclick="onClick(this)" src="{{asset('/public/AgentImage/'.$user->agent_image)}}" width="100" height="100" class="thumb-lg img-circle" alt="">

                                      @else
                                      <td><img src="{{asset('/public/StudentImage/no-image.png')}}" alt="Site Logo" width="50" height="50"></td>

                                      @endif
                                      
                                      
                                        @if($user->payment_status == '0')
                                       <td style="color:red;">Pending</td>
                                       @else
                                       <td style="color:green;">Complete</td>
                                       @endif
                                       <td> {{$user->created_at->format('d-m-Y');}}</td>
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