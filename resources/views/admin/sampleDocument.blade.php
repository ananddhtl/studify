@include('layout.admin.header')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Upload Documents</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">Uploaded Document List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if(session()->has('category'))
<div class="alert alert-success">
    {{ session()->get('category') }}
</div>
@endif


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <a href="" style="float: right;" class="add" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Documents
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>Sr No.</th>
                                    <th>Catgeory</th>
                                    <th>Sub Catgeory</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($document!='')
                                <?php $i = 0; ?>
                                @foreach ($document as $documents)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    @php $categoryss = App\Models\addSampleDocument::where(['id' =>
                                    $documents->category])->first(); @endphp
                                    @if($categoryss)
                                    <td>{{ $categoryss->category }}</td>
                                    @else
                                    <td>--</td>
                                    @endif
                                    @php $subcategoryss = App\Models\addSampleDocument::where(['id' =>
                                    $documents->sub_category])->first(); @endphp
                                    @if($subcategoryss)
                                    <td>{{ $subcategoryss->sub_category}}</td>
                                    @else
                                    <td>--</td>
                                    @endif
                                    <td>{{ $documents->title}}</td>
                                    <td>{{ $documents->description}}</td>
                                    @php
                                    $key = 'images/'.$documents->document;
                                    $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
                                    $bucket = 'studifynewbucket';

                                    $command = $client->getCommand('GetObject', [
                                    'Bucket' => $bucket,
                                    'Key' => $key
                                    ]);
                                    $request = $client->createPresignedRequest($command, '+20 minutes');
                                    $presignedUrl = (string)$request->getUri();
                                    @endphp
                                    <td><img src="{{asset('/public/SampleDocument/'.$documents->document)}}" /></td>


                                    <td>
                                        <a id="{{$documents->id}}" class="editIcon" data-toggle="modal"
                                            data-target="#exampleModalCenter1"><i class="fa fa-pencil"
                                                aria-hidden="true" id="icn"></i></a>
                                        <a class="" href="{{url('/admin/delete-sample-document/'.$documents->id)}}"><i
                                                class="fa fa-trash" style="color:red" aria-hidden="true"
                                                id="icn"></i></a>
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
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 100%;">
            <div class="modal-content" id="width">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <form method="POST" action="{{url('/admin/add-sample-document')}}" accept-charset="UTF-8"
                    class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                    id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="w-100" id="top">
                        <!--begin::Heading-->

                        <!--end::Heading-->
                        <!--begin::Input group-->

                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Category</label><br>
                                <select class="form-select" id="category" name="category"
                                    aria-label="Default select example">
                                    <option selected>select category</option>
                                    @foreach($category as $categorys)
                                    <option value="{{$categorys->id}}">{{$categorys->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Sub Category</label><br>
                                <select class="form-select" id="subcategory" name="subcategory"
                                    aria-label="Default select example">
                                    <option selected>select category</option>

                                </select>
                            </div>
                        </div>

                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Title</label><br>
                                <input type="text" name="title" class="form-control form-control-lg form-control-solid">

                            </div>
                        </div>
                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Description</label><br>
                                <input type="text" name="description"
                                    class="form-control form-control-lg form-control-solid">
                            </div>
                        </div>
                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Upload Document</label><br>
                                <input type="file" name="document"
                                    class="form-control form-control-lg form-control-solid">
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

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 100%;">
            <div class="modal-content" id="width">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <form method="POST" action="{{url('/admin/update-sample-document')}}" accept-charset="UTF-8"
                    class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                    id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="w-100" id="top">
                        <!--begin::Heading-->

                        <!--end::Heading-->
                        <!--begin::Input group-->

                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Category</label><br>
                                <select class="form-select" id="categoryss" name="category"
                                    aria-label="Default select example">
                                    <option selected>select category</option>
                                    @foreach($category as $categorys)
                                    <option value="{{$categorys->id}}">{{$categorys->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Sub Category</label><br>
                                <select class="form-select" id="subcategoryss" name="subcategory"
                                    aria-label="Default select example">
                                    <option selected>select category</option>
                                    @foreach($subcategory as $subcategorys)
                                    <option value="{{$subcategorys->id}}">{{$subcategorys->sub_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row fv-row mb-12">
                            <div class="row">
                                <input type="hidden" id="id" name="id"
                                    class="form-control form-control-lg form-control-solid">

                                <label class="form-label required">Title</label><br>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-lg form-control-solid">

                            </div>
                        </div>
                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Description</label><br>
                                <input type="text" id="description" name="description"
                                    class="form-control form-control-lg form-control-solid">
                            </div>
                        </div>
                        <div class="row fv-row mb-12">
                            <div class="row">

                                <label class="form-label required">Upload Document</label><br>
                                <input type="file" id="image" name="document"
                                    class="form-control form-control-lg form-control-solid">
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
$(document).ready(function() {
    $('#category').on('change', function() {

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
            success: function(result) {

                $('#subcategory').html('<option value="">Select Sub Category</option>');
                $.each(result.subcategory, function(key, value) {
                    $("#subcategory").append('<option value="' + value
                        .id + '">' + value.sub_category + '</option>');
                });

            }
        });
    });
})

$(function() {
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');

        $.ajax({
            url: '{{ url(' / admin / edit - sample - document ') }}',
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response)
                $("#id").val(response.id);
                $("#title").val(response.title);
                $("#description").val(response.description);
                document.getElementById('categoryss').value = response.category;
                document.getElementById('subcategoryss').value = response.sub_category;

            }
        });
    });


})



setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>