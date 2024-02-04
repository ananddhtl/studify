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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <!-- <li><a href="#">Table</a></li> -->
                            <li class="active">Add Chapter</li>
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
                                <strong class="card-title">Add Chapter</strong>
                            </div>
                            <div class="card-body">

                            @if($chapter)
                            <form method="post" action="{{url('admin/update-chapter')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$chapter->id}}" >
                        <div class="form-group">
                         <label class="form-label required">Select Topic</label>
                         <select class="form-select" name="topic_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach($topic as $topics)
                        <option value="{{ $topics->id }}" {{$chapter->topic_id == $topics->id  ? 'selected' : ''}}>{{ $topics->topic_name}}</option>
                       @endforeach
                        </select>
                        @if($errors->has('topic_id'))
    <div class="error">{{ $errors->first('topic_id') }}</div>
@endif
                       </div>


                       <div class="form-group">
                        	<label class="form-label">Chapter Image</label>
                            <input type="file" class="" name="chapter_image">
                            <img src="{{asset('/public/ChapterImage/'.$chapter->image)}}" alt="Girl in a jacket" style="width: 100px;height: 70px; padding-top:10px; ">

                            @if($errors->has('chapter_image'))
    <div class="error">{{ $errors->first('chapter_image') }}</div>
@endif
                        </div><br>

                 <div class="form-group">
                         <label class="form-label required">Chapter Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="chapter_name" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$chapter->chapter_name}}">
                                        @if($errors->has('chapter_name'))
    <div class="error">{{ $errors->first('chapter_name') }}</div>
@endif
                                    </div>

                       <div class="form-group">
                         <label class="form-label">Chapter Sub Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="chapter_subtitle" id="last_name" class="form-control form-control-lg form-control-solid" value="{{$chapter->chapter_subtitle}}">
                                        @if($errors->has('chapter_subtitle'))
    <div class="error">{{ $errors->first('chapter_subtitle') }}</div>
@endif
                                    </div>

                       

                     <div class="form-group">
                        	<label class="form-label"> Upload PDF</label>
                            <input type="file" name="pdf" accept="application/pdf" />
                    </div><br>


                        <div class="form-group">
                        	<label class="form-label required">Chapter Description</label>
                            <textarea class="ckeditor form-control" value="{{$chapter->chapter_description}}" name="chapter_description">{{$chapter->chapter_description}}</textarea>
                            @if($errors->has('chapter_description'))
    <div class="error">{{ $errors->first('chapter_description') }}</div>
@endif
                        </div><br>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                        @else
                        <form method="post" action="{{url('admin/add-chapter-data')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                         <label class="form-label required">Select Topic</label>
                         <select class="form-select" name="topic_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach($topic as $topics)
                        <option value="{{$topics->id}}">{{$topics->topic_name}}</option>
                       @endforeach
                        </select>
                        @if($errors->has('topic_id'))
    <div class="error">{{ $errors->first('topic_id') }}</div>
@endif
                       </div>

                       <div class="form-group">
                        	<label class="form-label">Chapter Image</label>
                            <input type="file" class="" name="chapter_image">
                            @if($errors->has('chapter_image'))
    <div class="error">{{ $errors->first('chapter_image') }}</div>
@endif
                        </div><br>

                 <div class="form-group">
                         <label class="form-label required">Chapter Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="chapter_name" id="last_name" class="form-control form-control-lg form-control-solid" value="">
                                        @if($errors->has('chapter_name'))
    <div class="error">{{ $errors->first('chapter_name') }}</div>
@endif
                                    </div>

                       <div class="form-group">
                         <label class="form-label">Chapter Sub Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="chapter_subtitle" id="last_name" class="form-control form-control-lg form-control-solid" value="">
                                        @if($errors->has('chapter_subtitle'))
    <div class="error">{{ $errors->first('chapter_subtitle') }}</div>
@endif
                                    </div>

                       

                     <div class="form-group">
                        	<label class="form-label"> Upload PDF</label>
                            <input type="file" name="pdf" accept="application/pdf" />
                    </div><br>


                        <div class="form-group">
                        	<label class="form-label required">Chapter Description</label>
                            <textarea class="ckeditor form-control" name="chapter_description"></textarea>
                            @if($errors->has('chapter_description'))
    <div class="error">{{ $errors->first('chapter_description') }}</div>
@endif
                        </div><br>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
@endif
                                
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

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
<script>
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  

           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/status/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>