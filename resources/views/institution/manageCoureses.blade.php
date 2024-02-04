 @include('institution.header')
                <!--end::Brand-->
    
<section class="container-fluid mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 course-list-block bg-blue-light">
        <div class="container student-faq">
<div id="exTab3" class="container"> 
<ul  class="nav nav-pills">
@if(request()->session()->get('state') == 'branch')
     <li class="active" ><a href="#branch" data-toggle="tab"><span><i class="fa fa-compass" aria-hidden="true" id="tap"></i></span>Branch</a>
      </li>
      @else
      <li ><a href="#branch" data-toggle="tab"><span><i class="fa fa-compass" aria-hidden="true" id="tap"></i></span>Branch</a>
      </li>
      @endif
 
      @if(request()->session()->get('state') == 'coursessss')
      <li class="active">
        <a  href="#kt_content_container" data-toggle="tab"><span><i class="fa fa-book" aria-hidden="true" id="tap"></i></span>Course</a>
      </li>
      @else
      <li >
        <a  href="#kt_content_container" data-toggle="tab"><span><i class="fa fa-book" aria-hidden="true" id="tap"></i></span>Course</a>
      </li>
      @endif

      @if(request()->session()->get('state') == 'fees') 
      <li class="active"><a href="#2b" data-toggle="tab">
<span><i class="fa fa-money" aria-hidden="true" id="tap"></i></span>Fees</a>
      </li>
      @else
      <li><a href="#2b" data-toggle="tab">
<span><i class="fa fa-money" aria-hidden="true" id="tap"></i></span>Fees</a>
      </li>
      @endif
      @if(request()->session()->get('state') == 'requirements')
      <li class="active"><a href="#3b" data-toggle="tab"><span><i class="fa fa-list" aria-hidden="true"id="tap"></i></span>Requirements</a>
      </li>
      @else
      <li><a href="#3b" data-toggle="tab"><span><i class="fa fa-list" aria-hidden="true"id="tap"></i></span>Requirements</a>
      </li>
      @endif
      
     
    </ul>



    
    

      <div class="tab-content clearfix">
      @if(request()->session()->get('state') == 'coursessss')  
        <div class="tab-pane active" id="kt_content_container">

        @else
        <div class="tab-pane" id="kt_content_container">

    @endif

@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
<div id="kt_content_container" class="container-xxl">
   


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Courses List</strong>
                                <a href="{{url('/institution/add-courses')}}" class="add-courses"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Courses</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Area of Study</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php if($course!=''){ ?> 
                                      
                                        <?php $i = 0; ?>
                                       @foreach ($course as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->c_name }}</td>
                                        <td>{{ $user->AOS }}</td>
                                        @php $branchss = App\Models\addBranch::where(['id' => $user->branch_id])->first();    @endphp
                                        <td>  
                                          @if($branchss)     
                                      {{$branchss->branch_name}}
                                      @else
                                        --
                                      @endif

                                     </td>
                                        <td> <input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch" {{ $user->status == 1 ? 'checked' : '' }}>
</td>

                                        <td> <form action="{{ URL('/course/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a href="{{ URL('/course/edit/'.$user->id )}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                              @csrf
                     <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                </form></td>
                                    
                                      </tr>
                                       @endforeach
                                   <?php } else { ?>
                                  <tr> no data found</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>


                    </div>

        </div>
    </div>
</div>
</div>

   <!-- fees table div  -->
   @if(request()->session()->get('state') == 'fees')
        <div class="tab-pane active" id="2b">
            @else
            <div class="tab-pane" id="2b">
            @endif
<div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Fees List</strong>
                                <a href="{{url('/institution/add-fees')}}" class="add-courses"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Fees</a>
                            </div>

                            @if(session()->has('feesdelete'))
    <div class="alert alert-success">
        {{ session()->get('feesdelete') }}
    </div>
@endif

                            <div class="card-body">
                               <div class="table-responsive">
                                <table id="" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Institution Name</th>
                                            <th>Course Name</th>
                                            <th>Type</th>
                                            <th>Tution Fees</th>
                                            <th>Other Fees</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($fees!=''){ ?>
                                      <tr>
                                        <?php $i = 0; ?>
                                       @foreach ($fees as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->universirty_name }}</td>
                                        @php 
          $course = App\Models\addCoursesModel::where(['id' => $user->course_id])->first();
         
          @endphp
                                       <td>{{ $course->c_name }}</td>
                                         <td>{{ $course->type }}</td>
                                        <td>{{ $user->tution_fees }}</td>
                                         <td>{{ $user->acc_other_fees }}</td>
                                        
                                        <td> <form action="{{ URL('/fees/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a href="{{ URL('/fees/edit/'.$user->id )}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                              @csrf
                     <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                </form></td>
                
                                    
                                      </tr>
                                       @endforeach
                                       <?php } else { ?>
                                  <tr> no data found</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

</div>

        </div>

        <!-- requirement table div  -->
        @if(request()->session()->get('state') == 'requirements')
        <div class="tab-pane active" id="3b">
            @else
            <div class="tab-pane" id="3b">
            @endif
      <div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Requirements List</strong>
                                <a href="{{url('/institution/add-requirements')}}" class="add-courses"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Requirements</a>
                            </div>

                            @if(session()->has('requirementdelete'))
    <div class="alert alert-success">
        {{ session()->get('requirementdelete') }}
    </div>
@endif

                            <div class="card-body">
                               <div class="table-responsive">
                                <table id="requirement12" class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Institution Name</th>
                                            <th>Minimum GPA</th>
                                            <th>Education</th>
                                            <th>TOEFL</th>
                                            <th>IELTS</th>
                                            <th>Pearson</th>
                                            <th>Duolingo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if($requirement!=''){ ?>
                                      <tr>
                                        <?php $i = 0; ?>
                                       @foreach ($requirement as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->universirty_name }}</td>
                                        <td>{{ $user->min_gpa }}</td>
                                         <td>{{ $user->education }}</td>
                                         <td>{{ $user->TOEFL }}</td>
                                         <td>{{ $user->IELTS }}</td>
                                         <td>{{ $user->Pearson }}</td>
                                         <td>{{ $user->Duolingo }}</td>
                                        <td> <form action="{{ URL('/requirement/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a href="{{ URL('/requirement/edit/'.$user->id )}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                              @csrf
                     <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true" id="del"></i></button>
                </form></td>
                                    
                                      </tr>
                                       @endforeach
                                         <?php } else { ?>
                                  <tr> no data found</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

          </div>
      </div>


    <!-- branch tableee -->
    @if(request()->session()->get('state') == 'branch')
 <div class="tab-pane active" id="branch">
    @else
    <div class="tab-pane" id="branch">
    @endif
      <div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Branch List</strong>
                                <a href="{{url('/institution/add-branch')}}" class="add-courses"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Branch</a>
                            </div>

                            @if(session()->has('requirementdelete'))
    <div class="alert alert-success">
        {{ session()->get('requirementdelete') }}
    </div>
@endif

                            <div class="card-body">
                               <div class="table-responsive">
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Branch Name</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if($branch!=''){ ?>
                                      <tr>
                                        <?php $i = 0; ?>
                                       @foreach ($branch as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->branch_name }}</td>
                                        <td>{{ $user->location }}</td>
                                        <td> 
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a href="{{ URL('/branch/edit/'.$user->id )}}"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                              @csrf
                              <a  href="{{ URL('/institution/delete-branch/'.$user->id )}}"><i  style="color:red;" class="fa fa-trash" aria-hidden="true" id="icn"></i></a>
                </td>
                                    
                                      </tr>
                                       @endforeach
                                       <?php } else { ?>
                                  <tr> no data found</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

          
      </div>


  </div>

</div>

                </div>
           
      </section>
    
    

    <script src="{{asset('assets/js/toggle.js')}}"></script>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

  $(function() {
    $('.js-switch').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var course_id = $(this).data('id'); 
    $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeCourseStatus',
            data: {'status': status, 'course_id': course_id},
            success: function(data){
              alert(data.success)
            }
        });
    })
  })

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>


<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>