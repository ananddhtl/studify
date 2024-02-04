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
                                            <th id="main">Insitution Name</th>
                                            <th id="main">Name</th>
                                            <th id="main">Email</th>
                                            <th>Image</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                       @foreach ($data as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->institution_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>

                                        @php 
                                         $insitutionDetail = App\Models\addInstitution::where(['institution_id' => $user->id])->first();
                                       @endphp
                                          @if($insitutionDetail->univ_img !='')
                                        <td> <img  data-toggle="modal" data-target="#exampleModalCenter" onclick="onClick(this)" src="{{asset('/public/InstitutionImage/'.$insitutionDetail->univ_img)}}" width="100" height="100" class="thumb-lg img-circle" alt="">

                                      @else
                                      <td><img src="{{asset('/public/StudentImage/no-image.png')}}" alt="Site Logo" width="50" height="50"></td>

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