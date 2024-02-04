@include('layout.admin.header')
<style>
.error{
    color:red;
}
    </style>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Topics List</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Topics List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@if(session()->has('topic'))
    <div class="alert alert-success">
        {{ session()->get('topic') }}
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
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Section
</a>
                            </div>
                            <div class="card-body">
                          
                       @foreach($topic as $topics)
                       <div class="col-sm-3">
                    <div class="boxcoures" style="position: relative;
    width: 100%;
    background: white;
    text-align: center;
    box-shadow: 6px 6px 6px 6px rgb(178 178 178 / 20%);
    height: auto;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
    line-height: 0px; 
    padding: 30px 0px;
    height: 170px;"><a href="{{url('/admin/get-chapter/'.$topics->id)}}">
  <h5 class="cour">{{$topics->topic_name}}</h5>
  <div class="overlay">
    <div class="text" style="width: 100%;
    padding-top: 0px;"><a id="{{$topics->id}}" class="editIcon" data-toggle="modal" data-target="#exampleModalCenter1"><i class="fa fa-pencil" aria-hidden="true" id="icn" style="background-color: #fff; padding: 3px;"></i></a>
    <a  href="{{url('/admin/delete-topic/'.$topics->id)}}"><i class="fa fa-trash" aria-hidden="true" id="del" style="background-color: #fff; padding: 3px;"></i></a></div>
  </div>
</a></div>
</div>
            @endforeach


                            </div>
                        </div>
                    </div>
                  </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content" id="widthtop">
        <div class="modal-header">
          <h4 class="modal-title">Add Section</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('admin/add-course-topic')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$id}}" class="form-control form-control-lg form-control-solid">
<br><br>
                              <label class="form-label required">Topic Name:</label><br>
                            <input type="text" name="topic_name" class="form-control form-control-lg form-control-solid">
                            @if($errors->has('topic_name'))
    <div class="error">{{ $errors->first('topic_name') }}</div>
@endif      
<br><br>
                        </div>
                           </div>
                           <br>

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

            <!-- ////edit topic // -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content" id="widthtop">
        <div class="modal-header">
          <h4 class="modal-title">Add Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('admin/update-course-topic')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row">
                                <div class="row">
                        <input type="hidden" id="topicid" name="topicid"  class="form-control form-control-lg form-control-solid">

                              <label class="form-label required">Topic Name:</label><br>
                            <input type="text" id="topic_name" name="topic_name" class="form-control form-control-lg form-control-solid">
                            @if($errors->has('topic_name'))
    <div class="error">{{ $errors->first('topic_name') }}</div>
@endif      
                        </div>
                           </div>
                           <br>

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

 @include('layout.admin.footer')
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
          url: '{{ url('/admin/edit-topic') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
          
            $("#topicid").val(response.id);
            $("#topic_name").val(response.topic_name);
            $("#topic_subtitle").val(response.topic_subtitle);
            $("#topic_description").val(response.topic_description);
           $("#image").html(
              `<img src="https://studify.au/public/CourseImage/${response.image}" width="100" height="100">`);
            
          }
        });
      });


    })
</script>
