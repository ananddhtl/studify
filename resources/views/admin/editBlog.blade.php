@include('layout.admin.header')


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
                    <li class="active">Edit Blog</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if (session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Edit blogs</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/update-blog/' . $blogDetail->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label required">Blog Heading</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="blog_heading" id="last_name"
                                    class="form-control form-control-lg form-control-solid"
                                    value="{{ $blogDetail->blog_heading }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Blog Image</label>
                                <input type="file" name="blog_image">
                                <img src="{{ asset('BlogImage/' . $blogDetail->blog_image) }}"
                                    style="width: 300px; height: 150px; padding: 5px;">
                            </div><br>


                            <div class="form-group">
                                <label class="form-label required">Blog Details</label>
                                <textarea class="ckeditor form-control" value="{{ $blogDetail->blog_description }}" name="blog_description">{{ $blogDetail->blog_description }}</textarea>
                            </div><br>

                            <div class="center">
                                <button type="submit" class="btn btn-primary"><a
                                        href="{{ url('admin/manage-blog') }}">Back </a> </button>
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>


<script src="{{ asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>


</body>

</html>
<script></script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
</script>
