 @include('institution.header')

                <div class="toolbar">
                    <!--begin::Toolbar-->
                    <div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column me-5">
                            <!--begin::Title-->
                            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Institution Dashboard</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="https://www.advisebridge.com" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-dark">Dashboard</li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Action group-->
                        <div class="d-flex align-items-center overflow-hidden pt-3 pt-lg-0">

                            <!--begin::Action wrapper-->
                            <div class="d-flex align-items-center">


                                <!--begin::Search-->
                                <div id="kt_header_search" class="d-flex align-items-center">
                                    <!--begin::Form-->
                                    
                                    <form method="GET" action="#" accept-charset="UTF-8" role="search" class="w-100 position-relative" id="single_filter" data-kt-search-element="form" autocomplete="off">

                                            <!--begin::Hidden input(Added to disable form autocomplete)-->
                                    <input type="hidden" name="filter" value="4">
                                    <!--end::Hidden input-->
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-2 search-icon position-absolute top-50 translate-middle-y ms-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                              transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                              fill="currentColor"/>
                                    </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Input-->
                                    <input type="text" class="search-input form-control ps-13 fs-7 h-40px" name="key"
                                           value="" placeholder="Search course" data-kt-search-element="input"/>
                                    <!--end::Input-->


                                    </form>
                                            <!--end::Form-->

                                </div>
                                <!--end::Search-->
                                <!--begin::Separartor-->
                                <div class="bullet bg-secondary h-35px w-1px mx-5"></div>
                                <!--end::Separartor-->
                            </div>
                            <!--end::Action wrapper-->
                            <!--begin::Action wrapper-->
                            <div class="d-flex align-items-center">


                                <!--begin::Actions-->
                                <div class="d-flex">


                                    <!--begin::User menu-->
                                    <div class="me-n2">
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                           data-kt-menu-overflow="true">
                                            <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-1">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                              d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                              fill="currentColor"/>
                                                        <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                              fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                             data-kt-menu="true">


                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="https://www.advisebridge.com/member/profile" class="menu-link px-5">My
                                                    Profile</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                    <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            
                                            
                                            
                                                    <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                            
                                            
                                            
                                                    <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="https://www.advisebridge.com/member/logout" class="menu-link px-5">Sign Out</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Action-->
                                    </div>
                                    <!--end::User menu-->


                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Action wrapper-->
                        </div>
                        <!--end::Action group-->
                    </div>
                    <!--end::Toolbar-->
                </div>
            </div>
            <!--end::Header--><style>
    p.name {
    margin: 5px;    
}
img.img-responsive1 {
    width: 50px !important;
}
/* a.btn.btn-danger.cancel {
    width: 70% !important;
} */
</style>
@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
<div id="kt_content_container" class="container-xxl">


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                            <div class="card-header">
                                <strong class="card-title">Fees List</strong>
                                <a href="{{url('/institution/add-fees')}}" class="add-courses">Add Fees</a>
                            </div>

                            @if(session()->has('feesdelete'))
    <div class="alert alert-success">
        {{ session()->get('feesdelete') }}
    </div>
@endif

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Institution Name</th>
                                            <th>Type</th>
                                            <th>Tution Fees</th>
                                            <th>Other Fees</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <?php $i = 0; ?>
                                       @foreach ($fees as $user)
                                      <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->universirty_name }}</td>
                                         <td>{{ $user->type }}</td>
                                        <td>{{ $user->tution_fees }}</td>
                                         <td>{{ $user->acc_other_fees }}</td>
                                        
                                        <td> <form action="{{ URL('/fees/delete/'.$user->id )}}" method="POST">
                                      <!-- <a class="btn btn-info" href="">Show</a> -->
                                    <a class="btn btn-primary" href="{{ URL('/fees/edit/'.$user->id )}}">Edit</a>
                              @csrf
                     <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
                                    
                                      </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Copyright © Studify</a>
            </li>

        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <script src="{{asset('assets/js/toggle.js')}}"></script>
</body>

</html>
<script>
   $(function() { 
           $('.toggle-class').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var course_id = $(this).data('id');  
           alert(course_id);
           alert(status);

           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/courseStatus/update', 
               data: {'status': status, 'course_id': course_id}, 
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