@include('layout.admin.header')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Blogs List</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">Blogs List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if(session()->has('blog'))
<div class="alert alert-success">
    {{ session()->get('blog') }}
</div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <a style="float: right;" href="{{url('admin/add-blog')}}" class="add"> <i class="fa fa-plus"
                                aria-hidden="true" id="icn"></i>Add blog </a>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Blog heading</th>
                                    <th>Blog description</th>
                                    <th>Blog image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($blog as $blogs)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td style="width:20%;">{{$blogs->blog_heading}}</td>
                                    <?php $bloog = Str::limit($blogs->blog_description, 100, '...'); ?>
                                    <td style="width:20%;">{!!$bloog!!}</td>
                                    <td style="width:20%;"><img src="{{asset('BlogImage/'.$blogs->blog_image)}}"
                                            style="width: 300px; height: 150px"></td>
                                    <td>


                                        <a class="" href="{{url('admin/edit-blog/'.$blogs->id)}}"><i
                                                class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                        <a class="" href="{{url('admin/view-blog/'.$blogs->id)}}"><i class="fa fa-eye"
                                                aria-hidden="true" id="eye"></i></a>
                                        <a href="{{url('admin/blog/delete/'.$blogs->id)}}"><i class="fa fa-trash"
                                                aria-hidden="true" id="del"></i></a>
                                        <!--  </form> -->
                                    </td>
                                </tr>
                                @endforeach
                                <!--  -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


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
$(function() {
    $('.js-switch').change(function() {

        var status = $(this).prop('checked') == true ? 1 : 0;
        var product_id = $(this).data('id');

        $.ajax({

            type: "GET",
            dataType: "json",
            url: 'admin/status/update',
            data: {
                'status': status,
                'product_id': product_id
            },
            success: function(data) {
                alert(data.success)
            }
        });
    })
});

setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html, {
        size: 'small'
    });
});
</script>