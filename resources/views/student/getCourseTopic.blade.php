@include('student.header')
<br>
<style>
.error{
    color:red;
}
    </style>
<div class="breadcrumbs">

            <div class="col-sm-4">
                <div class="page-header float-left">
                   <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#" style="font-size: 18px; color:black;   font-weight: 500;">Academy / </a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            @if($course)
                            <li>
                <p class="float-left" style="margin: 5px; font-size: 20px;
    font-weight: 900;"><a style="color:black"; href="{{url('student/get-course')}}">{{$course->course_name}}</a></p>
                @endif</li>
            </ol>


                    </div>



                </div>

                   
                </div>
            
          
            <div class="col-sm-8">
                <div class="page-header float-left" style="margin: 17px 16%;">
<h1 style="text-align: center;">Topics List</h1>
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
                        <div class="card" style="background: none !important">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                               
                            </div>
                            <div class="card-body">
                                <div class="box-pop111">
                                @php $i = 1 ; @endphp
                                @php $j = 0 ; @endphp
                                @php $k = 0 ; @endphp

@foreach($topic as $topics)

<div class="panel-group" id="accordionSingleOpen" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapseItemOpenOne{{ $i}}" aria-expanded="true" aria-controls="collapseItemOpenOne">
         Topic {{$i++}}: {{$topics->topic_name}}
         <?php $k++; ?>
        </a>
        <?php $j++; ?>
      </h4>
    </div>
    <div id="collapseItemOpenOne{{$k}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <ul class="courelist2">
        @php
               $chapter = App\Models\addCourseChapter::where(['topic_id' => $topics->id])->get();
    @endphp

    @php $j = 1 ; @endphp
    @if($chapter)
    @foreach($chapter as $chapters)

        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Lesson  {{$j++}}: <a href="{{url('/student/get-chapter-detail/'.$chapters->id)}}" class="topicstyle">{{$chapters->chapter_name}}</a></li>
        @endforeach
        @else
        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i> No Chapter Found</li>

        @endif
                         </ul>

      </div>
    </div>
  </div>
</div>

<hr>
@endforeach


</div>
</div>
                        </div>
                    </div>
                  </div>
            </div><!-- .animated -->
        </div>


       