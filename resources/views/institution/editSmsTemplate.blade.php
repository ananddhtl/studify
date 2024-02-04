@include('institution.header')
<!-- <div class="breadcrumbs">
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
                            <li><a href="#">Table</a></li> 
                            <li class="active">Edit Sms Template</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>-->
    
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" style="font-size: 18px;">Edit Sms Template</strong>
                            </div>
                            <div class="card-body">
                            	<form method="post" action="{{url('/institution/update-sms-template')}}" enctype="multipart/form-data">
                                    @csrf
 <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row fv-row mb-12">
                                <div class="row fv-row" id="linehi">
                              <input type="hidden" value="{{$addSmsTemplate->id}}" name="id">
                              <label class="form-label required">Template Name:</label><br>
                            <input type="text" name="template_name" value="{{$addSmsTemplate->name}}" class="form-control form-control-lg form-control-solid">
                            

                               <label class="form-label required">Template Description:</label><br>
                               <textarea class="ckeditor form-control"  value="{{$addSmsTemplate->description}}" name="template_description">{{$addSmsTemplate->description}}</textarea>                                          </div>
                          
                              <div class="row fv-row mb-10">
                                   <div class="col-6" id="leftmor">
                                  <button type="submit" class="Package">Update</button>
                                </div>
                              </div>
                              </div>
                            
                    </div> 


                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
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

  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

  setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
