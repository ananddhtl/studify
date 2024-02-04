@include('layout.admin.header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Coupon</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    @if($editCoupon!='')
                    <li class="active">Edit Coupon</li>
                    @else
                    <li class="active">Add Coupon</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-sm-10" id="sms">
                <h1 style="font-size: 18px; padding: 10px;">Coupon Info</h1>
                @if($editCoupon!='')
                <form method="POST" action="{{url('admin/update-coupon-detail')}}" accept-charset="UTF-8"
                    class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                    id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$editCoupon->id}}">
                    <div class="w-100">
                        <!--begin::Heading-->

                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-10">

                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="form-label required">Coupon Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="coupon_name" id="first_name"
                                    class="form-control form-control-lg form-control-solid"
                                    value="{{$editCoupon->coupon_name}}" placeholder="Name">
                                <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <!--begin::Label-->
                                <label class="form-label required">Coupon Duration</label>
                                <br>



                                @if($editCoupon->coupon_duration == 'all_time_free')
                                <input type="radio" name="coupon_duration" value="all_time_free" onclick="show1();"
                                    checked />
                                All Time
                                @else
                                <input type="radio" name="coupon_duration" value="all_time_free" onclick="show1();" />
                                All Time
                                @endif
                                @if($editCoupon->coupon_duration == 'limited_time')
                                <input type="radio" name="coupon_duration" value="limited_time" onclick="show2();"
                                    checked /> Limited Time
                                @else
                                <input type="radio" name="coupon_duration" value="limited_time" onclick="show2();" />
                                Limited Time

                                @endif


                                <div id="div" class="">

                                </div>

                                @if($editCoupon->coupon_duration == 'limited_time')
                                <div id="div1" class="">
                                    <div class="time-add">
                                        <hr><label class="form-label required">Start</label><br>
                                        <input type="text" name="start_date" value="{{$editCoupon->start_date}}"
                                            class="form-control form-control-lg form-control-solid">
                                        <label class="form-label required">End</label><br>
                                        <input type="text" name="end_date" value="{{$editCoupon->end_date}}"
                                            class="form-control form-control-lg form-control-solid">
                                    </div>
                                </div>
                                @else
                                <div id="div1" class="hide">
                                    <div class="time-add">
                                        <hr><label class="form-label required">Start</label><br>
                                        <input type="date" name="start_date" value="{{$editCoupon->start_date}}"
                                            class="form-control form-control-lg form-control-solid">
                                        <label class="form-label required">End</label><br>
                                        <input type="date" name="end_date" value="{{$editCoupon->end_date}}"
                                            class="form-control form-control-lg form-control-solid">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row fv-row mb-10">

                            <div class="col-6">
                                <label class="form-label required">Coupon Amount</label>
                                <br>
                                @if($editCoupon->coupon_discount_type == 'Percentage')
                                <input type="radio" name="coupon_discount" value="Percentage" checked />Percentage
                                @else
                                <input type="radio" name="coupon_discount" value="Percentage" />Percentage
                                @endif
                                @if($editCoupon->coupon_discount_type == 'Flat')
                                <input type="radio" name="coupon_discount" value="Flat" checked /> Flat
                                @else
                                <input type="radio" name="coupon_discount" value="Flat" /> Flat
                                @endif
                                <div id="div" class="">

                                </div>


                                <div id="div1" class="hide">
                                    <div class="time-flex">
                                        <hr><label class="form-label required">Time</label>
                                        <input type="date" name="commission_flat"
                                            class="form-control form-control-lg form-control-solid">


                                    </div>
                                </div>

                                <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <!--begin::Label-->

                                <label id="percentage" class="form-label required">Coupon Percentage</label>
                                <label id="flat" class="form-label required">Coupon Amount</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="amount" id="first_name"
                                    class="form-control form-control-lg form-control-solid"
                                    value="{{$editCoupon->coupon_amount}}" placeholder="Enter Amount">
                                <!--end::Input-->
                            </div>
                            <div class="col-6">
                                <label class="d-flex align-items-center form-label">
                                    <span class="required">Coupon Type</span>
                                </label>

                                <select name="coupon_type" aria-label="Coupan For Singup" readonly=""
                                    data-control="select2" data-placeholder="Coupan For Singup"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    @if($editCoupon->coupon_type == 'signup')
                                    <option value="Signup" selected>Coupan For Signup</option>
                                    @else
                                    <option value="Signup">Coupan For Signup</option>
                                    @endif
                                    @if($editCoupon->coupon_type == 'academic')
                                    <option value="Academic" selected>
                                        Coupon For Academy
                                    </option>
                                    @else
                                    <option value="Academic">
                                        Coupon For Academy
                                    </option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-10">
                                <button type="submit" class="add-coupan">Submit</button>
                            </div>
                        </div>
                    </div>
            </div>



            </form>

            @else
            <form method="POST" action="{{url('admin/add-coupon-detail')}}" accept-charset="UTF-8"
                class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="">
                <div class="w-100">
                    <!--begin::Heading-->

                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Coupon Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input name="coupon_name" id="first_name"
                                class="form-control form-control-lg form-control-solid" value="" placeholder="Name">
                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <!--begin::Label-->
                            <label class="form-label required">Coupon Duration</label>
                            <br>




                            <input type="radio" name="coupon_duration" value="all_time_free" onclick="show1();"
                                checked />
                            All Time

                            <input type="radio" name="coupon_duration" value="limited_time" onclick="show2();" />
                            Limited Time



                            <div id="div" class="">

                            </div>


                            <div id="div1" class="hide">
                                <div class="time-add">
                                    <hr><label class="form-label required">Start</label><br>
                                    <input type="date" name="start_date"
                                        class="form-control form-control-lg form-control-solid">
                                    <label class="form-label required">End</label><br>
                                    <input type="date" name="end_date"
                                        class="form-control form-control-lg form-control-solid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row fv-row mb-10">

                        <div class="col-6">
                            <label class="form-label required">Coupon Amount</label>
                            <br>
                            <input type="radio" name="coupon_discount" value="Percentage(%)" checked />Percentage(%)

                            <input type="radio" name="coupon_discount" value="Flat" /> Flat
                            <div id="div" class="">

                            </div>


                            <div id="div1" class="hide">
                                <div class="time-flex">
                                    <hr><label class="form-label required">Time</label>
                                    <input type="date" name="commission_flat"
                                        class="form-control form-control-lg form-control-solid">


                                </div>
                            </div>

                            <!--end::Input-->
                        </div>
                        <div class="col-6">
                            <!--begin::Label-->
                            <label id="percentage" class="form-label required">Coupon Percentage(%)</label>
                            <label id="flat" class="form-label required">Coupon Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input name="amount" id="first_name" class="form-control form-control-lg form-control-solid"
                                value="" placeholder="Enter Amount">
                            <!--end::Input-->
                        </div>

                        <br>
                        <div class="col-6">
                            <label class="d-flex align-items-center form-label">
                                <span class="required">Coupon Type</span>
                            </label>

                            <select name="coupon_type" aria-label="Coupan For Singup" readonly="" data-control="select2"
                                data-placeholder="Coupan For Singup"
                                class="form-select form-select-solid form-select-lg fw-bold">
                                <option value="Signup">Coupon For Signup</option>

                                <option value="Academic">
                                    Coupon For Academy
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <button type="submit" class="add-coupan">Submit</button>
                        </div>
                    </div>
                </div>



            </form>
            @endif
        </div>
    </div>
</div>

<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/main.js')}}"></script>


<script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
</script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}">
</script>
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function show2() {
    $("#div").addClass("hide");
    $("#div1").removeClass("hide");
}

function show1() {
    $("#div").removeClass("hide");
    $("#div1").addClass("hide");

}

$(document).ready(function() {
    $('#flat').hide();
    $('input[name="coupon_discount"]').on("click", function() {
        var car = $('input[name="coupon_discount"]:checked').val();
        if (car == 'Percentage') {
            $('#percentage').show();
            $('#flat').hide();
        } else {
            $('#percentage').hide();
            $('#flat').show();
        }

    });

})

setTimeout(function() {
    $('#comm').hide()
}, 5000)
</script>