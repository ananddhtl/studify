@include('agent.header')
      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Document List</strong>
                                <!-- <a href="{{url('admin/role-manage')}}"><button style="float: right;" data-toggle="modal" data-target="#" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Role</button></a> -->

                            </div>
                            @if(session()->has('message'))
    <div id="message" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                            
                            <div class="card-body">
                              <form method="POST" action="{{url('/agent/search-sample-document')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data" style="margin-top: -33px;
    margin-bottom: -29px;">
                                <input name="_token" type="hidden" value="1AQUWWOQc2CvYMkwUfJPFLsEQiMaWaFKtyrMdcmb">
@csrf
<ul class="drop">
<li>

                                    <!--end::Label-->
                                    <label class="form-label required">Select Category</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @if($searchcategory !='')
                                    <select name="category" id="category" aria-label="Gender" data-control="select2" data-placeholder="Gender" class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Category</option>
                                 @foreach($category as $categorys)
                                <option value="{{$categorys->id}}" {{$searchcategory->id == $categorys->id  ? 'selected' : ''}} >{{$categorys->category}}</option>
                                @endforeach
                                
                                    </select>
                                    @else
                                    <select name="category" id="category" aria-label="Gender" data-control="select2" data-placeholder="Gender" class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Category</option>
                                 @foreach($category as $categorys)
                                <option value="{{$categorys->id}}">{{$categorys->category}}</option>
                                @endforeach
                                
                                    </select>

                                    @endif
                                                                       
                                    <!--end::Input-->
                                   
</li>
<li>
 <label class="form-label required">Select Sub Category</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @if($searchsubcategoryss !='')
 <select name="subcategory" id="subcategoryss" aria-label="Gender" data-control="select2" data-placeholder="Gender" class="form-select form-select-solid form-select-lg fw-bold">
                                        <option value="">Select Category</option>
                                 @foreach($subcategory as $subcategorys)
                                <option value="{{$subcategorys->id}}" {{$searchsubcategoryss->id == $subcategorys->id  ? 'selected' : ''}} >{{$subcategorys->sub_category}}</option>
                                @endforeach
                                
                                    </select>
                                 @else
                                    <select name="subcategory" id="subcategory" aria-label="Gender" data-control="select2" data-placeholder="Gender" class="form-select form-select-solid form-select-lg fw-bold">
                                      
                                      <option selected>select category</option>
                                    
                                  </select>
                                    @endif
</li>
<li>
 <button typee="submit" class="dwon">Search</button>
</li>
</ul>
</form>


                               
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                           <th>Sr No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Document</th>
                                            <th>Download</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if($document!='')
                                      <?php $i = 0; ?>
                                       @foreach ($document as $documents)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $documents->title}}</td>
                                        <td>{{ $documents->description }}</td>
                                        <td>{{ $documents->document }}</td>
                                        <td>
                                       <a title="" href="{{url('/agent/sample-pdf/'.$documents->id)}}">
                                          <i class="fa fa-download" aria-hidden="true" id="icn"></i></a>
                                    </a>
                                    <a title="" href="{{url('/agent/view-sample-pdf/'.$documents->id)}}">
                                          <i class="fa fa-eye" aria-hidden="true" id="icn"></i></a>
                                    </a>
                                </td>
                                    </tr>
                                       @endforeach
                                   @else 
                                  <tr> no data found</tr>
                                    @endif  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div> 


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->    
        
        <script type="text/javascript"> 
      $(document).ready( function() {
        $('#message').delay(5000).fadeOut();
      });
    </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function () {
            $('#category').on('change', function () {
               
                var category_id = this.value;
                $("#subcategory").html('');
                $.ajax({
                    url: "{{url('agent/fetch-subcategory')}}",
                    type: "POST",
                    data: {
                        category_id: category_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                       
                        $('#subcategory').html('<option value="">Select Sub Category</option>');
                        $.each(result.subcategory, function (key, value) {
                            $("#subcategory").append('<option value="' + value
                                .id + '">' + value.sub_category + '</option>');
                        
                        });
                      
                    }
                });
            });
})


    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>

   <!-- <script>
$(document).ready(function(){
  $('#exampleModal1').hide();
  $('#exampleModal').hide();
    $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
        alert(dataId)
        $("#assign_id").val(dataId);
        
    });
});
</script> -->




