@include('student.header')
<br>
<style>
.error{
    color:red;
}
    </style>
<div class="breadcrumbs">
        <div class="content mt-3">
        @if($course)
                <p class="float-left" style="margin: 5px; font-size: 16px;">
<a href="#" style="color:black"  style="font-size: 18px;  font-weight: 500;">Academy / </a>
                    <a href="{{url('student/get-course')}}"><b style="color:black;  font-weight: 500;" >{{$course->course_name}} / </b></a><a href="{{url('student/get-course-topic/'.$course->id)}}"><b style="color:black;  font-weight: 500;">{{$topic->topic_name}}<b></a><b> / {{$chapter->chapter_name}}</b></p>
            </div>
        </div>
                @endif
            <div class="animated fadeIn" style="margin: 10px;">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                            </div>
                            <div class="card-body">
                       <h1 class="detailhead" style="text-align:left; font-size: 24px;"><b>{{$chapter->chapter_subtitle}}</b></h1><br>
                       <div class="pra" style="line-height: 22px;
    font-size: 14px;
    width: 100%;
    margin: 0 auto;
    text-align: justify;
    padding: 10px;
    font-weight: 400;">

    


                       <p style="font-weight: 400;font-size: 15px;">{!!$chapter->chapter_description!!}</p>

                        
                       <div class="form-group">
                        	
                            <button title="Download as PDF" class="btn btn-primary"> <a style="color:white;" href="{{url('student/get-course-topic/'.$course->id)}}">Back</a>
                            </button>                            
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
    <!-- .content -->
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Copyright © Studify</a>
            </li>

        </ul>
        <!--end::Menu-->
    </div>
</div>
    <!--end::Container-->
</div>



<!-- /#right-panel -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>