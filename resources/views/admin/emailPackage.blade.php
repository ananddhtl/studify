@include('layout.admin.header')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Email Packages</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">SMS List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if(session()->has('package'))
<div class="alert alert-success">
    {{ session()->get('package') }}
</div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <button style="float: right;" data-toggle="modal" data-target="#myModal" class="add"><i
                                class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Package</button>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Package Name</th>
                                    <th>Package Price</th>
                                    <th>Email Limited</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($emailpackage)
                                @php
                                $i = '1';
                                @endphp
                                @foreach($emailpackage as $emailpackages)
                                <tr>
                                    <td>{{$i++}} </td>
                                    <td>{{$emailpackages->package_name}}</td>
                                    <td>{{$emailpackages->package_price}}</td>
                                    <td>{{$emailpackages->email_limit}}</td>
                                    <td>{{$emailpackages->country}}</td>
                                    <td>
                                        <!-- <a class="btn btn-info" href="">Show</a> -->
                                        <!-- <a class="" href="#"><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>
                                    <a class="" href="#"><i class="fa fa-eye" aria-hidden="true" id="eye"></i></a> -->
                                        <a id="{{$emailpackages->id}}" class="editicon" data-toggle="modal"
                                            data-target="#Mymodal1"><i class="fa fa-pencil" aria-hidden="true"
                                                id="icn"></i></a>
                                        <a href="{{url('/admin/email-package-delete/'.$emailpackages->id)}}" class=""><i
                                                class="fa fa-trash" aria-hidden="true" id="del"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>No record found</tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="width">
            <div class="modal-header">
                <h4 class="modal-title">Select Packages</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form method="POST" action="{{url('/admin/add-email-package')}}" accept-charset="UTF-8"
                class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="w-100">
                    <!--begin::Heading-->

                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Package Name</label>
                            <input name="package_name" id="first_name"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Package number">
                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Package Price</label>
                            <input name="package_price" id="last_name"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Package Price">
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <label class="form-label required">Email Limit</label>
                            <input name="sms_limit" id="first_name"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Sms Limit">
                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <label class="form-label required">Country</label>
                            <select class="form-select" name="country" aria-label="Default select example">
                                <option selected>Select Country</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Other">Other</option>
                            </select>
                            <!--end::Input-->
                        </div>

                    </div>
                    <div class="row fv-row mb-10">
                        <div class="col-6">
                            <label class="d-flex align-items-center form-label">
                                <span class="required">Message</span>
                            </label>
                            <input type="hidden" name="comment" id="comment"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Sms Limit">

                            <textarea rows="4" cols="50" id="message" name="message" form="usrform"
                                class="form-control form-control-lg form-control-solid">
Enter text here...</textarea>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                    <br>
                    <div class="row fv-row mb-10">
                        <div class="col-6">
                            <button type="submit" class="Package">submit</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div><!-- /#right-panel -->

<!-- /////update email package/// -->
<div class="modal fade" id="Mymodal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" id="width">
            <div class="modal-header">
                <h4 class="modal-title">Select Packages</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form method="POST" action="{{url('/admin/update-email-package')}}" accept-charset="UTF-8"
                class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="w-100">
                    <!--begin::Heading-->

                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Package Name</label>
                            <input name="package_name" id="package_name"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Package number">
                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Package Price</label>
                            <input name="package_price" id="package_price"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Package Price">
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <label class="form-label required">Email Limit</label>
                            <input name="email_limit" id="email_limit"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Sms Limit">
                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <label class="form-label required">Country</label>
                            <select class="form-select" name="country" aria-label="Default select example">
                                <option selected>Select Country</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Other">Other</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <input type="hidden" value="" id="id" name="id">
                    </div>
                    <div class="row fv-row mb-10">
                        <div class="col-6">
                            <label class="d-flex align-items-center form-label">
                                <span class="required">Message</span>
                            </label>
                            <input type="hidden" name="comment" id="comments"
                                class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Sms Limit">

                            <textarea rows="4" cols="50" id="myTextarea" name="message" form="usrform"
                                class="form-control form-control-lg form-control-solid">
Enter text here...</textarea>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                    <br>
                    <div class="row fv-row mb-10">
                        <div class="col-6">
                            <button type="submit" class="Package">submit</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<script>
$(function() {
    $(document).on('click', '.editicon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');

        $.ajax({
            url: '{{ url(' / admin / edit - email - package ') }}',
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response)
                $("#id").val(response.id);
                $("#package_name").val(response.package_name);
                $("#package_price").val(response.package_price);
                $("#email_limit").val(response.email_limit);
                $("#myTextarea").val(response.message);
                $("#comments").val(response.message);

                document.getElementById('country').value = response.country;

                $('#myTextarea').keyup(function() {
                    var keyed = $(this).val().replace(/\n/g, '<br/>');
                    $("#comments").val(keyed);
                });
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
            url: '/admin/status/update',
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

$('#message').keyup(function() {
    var keyed = $(this).val().replace(/\n/g, '<br/>');
    $("#comment").val(keyed);
});
</script>