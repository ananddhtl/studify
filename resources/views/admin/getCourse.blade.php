@include('layout.admin.header')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Courses List</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Courses List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('course'))
    <div class="alert alert-success">
        {{ session()->get('course') }}
    </div>
@endif


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                                <a href=""  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Course
</a>
                            </div>
                            <div class="card-body">
                              <div class="row">
                          
                
                       <div class="col-sm-3">
                    <div class="boxcoures">
                      <i class="fa fa-link" aria-hidden="true"></i><br>
                      @php
               $activeCourse = App\Models\addShortCourse::where(['status' => '1'])->get();
               $activeCourse = $activeCourse->count();
    @endphp
    @if($activeCourse)
                      <span><b>{{$activeCourse}}</b></span><br>
                      @else
                      <span><b>0</b></span><br>
                      @endif
                      <span>Active Coures</span>
</div>
</div>
 <div class="col-sm-3">
                    <div class="boxcoures">
                      <i class="fa fa-chain-broken" aria-hidden="true"></i><br>
                      @php
               $inactiveCourse = App\Models\addShortCourse::where(['status' => '0'])->get();
               $inactiveCourse = $inactiveCourse->count();
    @endphp
    @if($inactiveCourse)
                      <span><b>{{$inactiveCourse}}</b></span><br>
                      @else
                      <span><b>0</b></span><br>
                      @endif
                      <span>Pending Coures</span>
</div>
</div>
 <div class="col-sm-3">
                    <div class="boxcoures">
                     <i class="fa fa-star" aria-hidden="true"></i><br>
                     @php
               $freeCourse = App\Models\addShortCourse::where(['course_prize' => '0'])->get();
               $freeCourse = $freeCourse->count();
    @endphp
    @if($freeCourse)
                      <span><b>{{$freeCourse}}</b></span><br>
                      @else
                      <span><b>0</b></span><br>
                      @endif
                      <span>Free Coures</span>
</div>
</div>
 <div class="col-sm-3">
                    <div class="boxcoures">
                      <i class="fa fa-tags" aria-hidden="true"></i><br>
                      @php
               $paidCourse = App\Models\addShortCourse::where('course_prize','!=','0')->get();
               $paidCourse = $paidCourse->count();
    @endphp
    @if($paidCourse)
                      <span><b>{{$paidCourse}}</b></span><br>
                      @else
                      <span><b>0</b></span><br>
                      @endif
                      <span>Paid Coures</span>
</div>
</div>
<div class="col-sm-12" style="margin-top: 3%;">
  <table id="bootstrap-data-table-export" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
     <th scope="col">Lesson & Section</th>
      <th scope="col">Enrolled Student</th>
      <th scope="col">Course Prize</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($course as $courses)
  <tr>
      <th scope="row">3</th>
      <td><span class="blue4"><a href="{{url('/admin/get-course-topic/'.$courses->id)}}">{{$courses->course_name}}</span><br>
      @php $desc = $courses->course_description; 
       $description = substr($desc, 0, 25) . '...'; @endphp
      <span style="font-size: 12px;">{{$description}}</span></td>
     
      @php
       $topic = App\Models\addCourseTopic::where(['course_id' => $courses->id])->get();
       $topics = $topic->count();
    @endphp
    @if($topics)
   
      <td><span>Total Section: {{$topics}}</span><br>
      @else
      <td><span>Total Section: 0</span><br>
      @endif
     
      @php
               $student = App\Models\studentCourse::where(['course_id' => $courses->id])->where(['payment_status' => '1'])->get();
               $student = $student->count();
    @endphp
    @if($student)

      <td><span>Total enrolment: {{$student}}</span></td>
      @else
      <td><span>Total enrolment: 0</span></td>

      @endif
      <td><span class="">${{$courses->course_prize}}</span></td>

      <td><input type="checkbox" data-id="{{ $courses->id }}" name="status" class="js-switch" {{ $courses->status == 1 ? 'checked' : '' }}></td>


      <td>
      <a id="{{$courses->id}}" class="editIcon" data-toggle="modal" data-target="#exampleModalCenter1"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>       
      <a class="" href="{{url('/admin/delete-course/'.$courses->id)}}"><i class="fa fa-trash" aria-hidden="true" id="del"></i></a>
    </td>
    </tr>
    @endforeach


  </tbody>
</table>
  </div>


                            </div>
                        </div>
                    </div>
                  </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/add-course')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row">
                                <div class="row">
                                   
                              <label class="form-label required">Course Title:</label><br>
                            <input type="text" name="course_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row">
                                <div class="row">
                                  
                              <label class="form-label required">Course Image:</label><br>
                            <input type="file" name="image" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Prize:</label><br>
                            <input type="text" id="course_prize" name="course_prize" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Discount Prize:</label><br>
                            <input type="text" id="discount_prize" name="discount_prize" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>
                         </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Sub Title:</label><br>
                            <input type="text" name="course_subtitle" class="form-control form-control-lg form-control-solid">
                          </div>
                           </div>
           <div class="row fv-row">
                                <div class="row">
                              
                              <label class="form-label required">Course Description:</label><br>
                              <textarea name="course_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                           </div>
                           <br>
                  <div class="row fv-row">
                                   <div class="row">
                                  <button type="submit" class="Packagecoures">submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
  </div>
</div>




    </div><!-- /#right-panel -->


    <!-- ///edit model box -->
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content" id="widthtop" >
        <div class="modal-header">
          <h4 class="modal-title">Edit Course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/update-course')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row">
                                <div class="row">

                                   <input type="hidden" id="courseid" name="courseid">

                              <label class="form-label required">Course Name:</label><br>
                            <input type="text" id="course_name" name="course_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row">
                                <div class="row">
                                  
                              <label class="form-label required">Course Image:</label><br>
                            <input type="file" id="image" name="image" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Sub Title:</label><br>
                            <input type="text" id="course_subtitle" name="course_subtitle" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>
           <div class="row fv-row">
                                <div class="row">
                              
                              <label class="form-label required">Course Description:</label><br>
                              <textarea id="course_description" name="course_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                           </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Prize:</label><br>
                            <input type="text" id="course_prize" name="course_prize" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row ">
                                <div class="row">
                                  
                              <label class="form-label required">Course Discount Prize:</label><br>
                            <input type="text" id="discount_prize" name="discount_prize" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>
                         </div>

                        <br>
                  
                      <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div>
                            </form>
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


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>

    $(function() {
$(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        
        $.ajax({
          url: '{{ url('/admin/edit-course') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
           
            $("#courseid").val(response.id);
            $("#course_name").val(response.course_name);
            $("#course_subtitle").val(response.course_subtitle);
            $("#course_description").val(response.course_description);
            $("#course_prize").val(response.course_prize);
            $("#discount_prize").val(response.discount_prize);
           $("#image").html(
              `<img src="https://studify.au/public/CourseImage/${response.image}" width="100" height="100">`);
            
          }
        });
      });


    })

 
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
          
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/short-course/status', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

</script>