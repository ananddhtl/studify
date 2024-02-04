@include('layout.admin.header')


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Agent List</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">Agent List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if(session()->has('deleteagent'))
<div class="alert alert-success">
    {{ session()->get('deleteagent') }}
</div>
@endif

@if(session()->has('updateagent'))
<div class="alert alert-success">
    {{ session()->get('updateagent') }}
</div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                                <strong class="card-title">Agent List</strong>
                            </div> -->
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th id="main">Sr No.</th>
                                    <th id="main">Company Name</th>

                                    <th id="main">Name</th>
                                    <th id="main">Email</th>
                                    <th id="main">Package Name</th>
                                    <th id="main">Package Duration</th>
                                    <th id="main">Status</th>
                                    <th id="main">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;?>
                                @foreach ($agent as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->company_name }}</td>

                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @php
                                    $agentpackage = App\Models\addPackage::where(['id' => $user->package_id])->first();
                                    @endphp
                                    @if($agentpackage)
                                    <td>{{$agentpackage->package_name}}</td>
                                    @else
                                    <td>--</td>
                                    @endif

                                    <td>{{$user->package_start_date}} / {{$user->package_end_date}}</td>
                                    <td><input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch"
                                            {{ $user->status == 1 ? 'checked' : '' }}></td>

                                    <td>
                                        <form action="{{ URL('admin/agent/delete/'.$user->id )}}" method="POST">
                                            <!-- <a class="btn btn-info" href="">Show</a> -->
                                            <a class="" href="{{ URL('admin/agent-edit/'.$user->id )}}"><i
                                                    class="fa fa-pencil" aria-hidden="true" id="icn"></i></a>

                                            <a class="" href="{{url('admin/agent-detail/'.$user->id)}}"><i
                                                    class="fa fa-eye" aria-hidden="true" id="eye"></i></a>

                                            @csrf


                                            <button type="submit" class=""><i class="fa fa-trash" aria-hidden="true"
                                                    id="del"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
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
            url: '/admin/agentstatus/update',
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