@include('student.header')
<br><br>

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
                            <li>/Courses List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('course'))
    <div id="coursebuy" class="alert alert-success">
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
                                
                            </div>
                            <div class="card-body">
                        <?php if(count($course) != '0'){ ?> 
                       @foreach($course as $courses)
                       @php
                       $coursess = App\Models\addShortCourse::where(['id' => $courses->course_id])->first();
                     @endphp
                    
                     <div class="col-sm-3">
                    <div class="boxcoures">
                      <a href="{{url('/student/get-course-topic/'.$coursess->id)}}">
  <img src="{{asset('public/CourseImage/'.$coursess->image)}}" alt="" class="image"><br>
  <div class="coures-chap">
  <h5 class="cour">{{$coursess->course_subtitle}}</h5>
  <?php $text = strip_tags($coursess->course_description);
   $desc = Str::limit($text, 100);
    ?>
   
  @php
               $topic = App\Models\addCourseTopic::where(['course_id' => $courses->course_id])->get();
               $topics = $topic->count();
    @endphp
    @if($topics)
              

                    <p class="textcoure">  <i class="fa fa-book" aria-hidden="true" style="color: #928d8d;"></i> Topics:
                            <b>{{$topics}}</b>
                    
                  </p>
                  
                
@else

                

                    <p class="textcoure">  <i class="fa fa-book" aria-hidden="true" style="color: #928d8d;"></i> Topics:
                            <b>0</b>
                    
                  </p>
                  

@endif
 <p class="textcoure" >{{$desc}}</p>
      </a>
    </div>
      </div>
           


                            </div>
                             @endforeach
                           <?php } else { ?>
                             <div class="col-sm-3" style="color: #a4c553; font-size: 28px;">No Course Found   </div>
                           <?php } ?>
                        </div>
                    </div>
                  </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 100%;">
    <div class="modal-content" id="width">
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/add-course')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Name:</label><br>
                            <input type="text" name="course_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Image:</label><br>
                            <input type="file" name="image" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Sub Title:</label><br>
                            <input type="text" name="course_subtitle" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>
           <div class="row fv-row mb-12">
                                <div class="row">
                                <div class="col-12">
                              <label class="form-label required">Course Description:</label><br>
                              <textarea name="course_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                           </div>
                         </div>

                        
                         
                    </div>
                      <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
  </div>
</div>




    </div><!-- /#right-panel -->


    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 100%;">
    <div class="modal-content" id="width">
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/admin/add-course')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Name:</label><br>
                            <input type="text" name="course_name" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Image:</label><br>
                            <input type="file" name="image" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>

                           <div class="row fv-row mb-12">
                                <div class="row">
                                    <div class="col-12">
                              <label class="form-label required">Course Sub Title:</label><br>
                            <input type="text" name="course_subtitle" class="form-control form-control-lg form-control-solid">
                              </div>
                           </div>
           <div class="row fv-row mb-12">
                                <div class="row">
                                <div class="col-12">
                              <label class="form-label required">Course Description:</label><br>
                              <textarea name="course_description" class="form-control form-control-lg form-control-solid">Notes</textarea>
                              </div>
                           </div>
                         </div>

                        
                         
                    </div>
                      <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
  </div>
</div>




    </div><!-- /#right-panel -->
<script>
$(function() {
setTimeout(function() { $("#coursebuy").fadeOut(1500); }, 5000)

})
  </script>