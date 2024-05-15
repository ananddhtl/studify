@include('student.header')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" style="max-width: 100% !important">



            <!-- activity history section -->





            <!-- activity history section -->





            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9" style="overflow: hidden;">
                <!--begin::Card header-->
                <div class="card-header mt-5">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bolder mb-1">Applied Applications</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" style="overflow: auto hidden !important; width: auto">
                    <div style="overflow: auto hidden; min-width: 943px !important;">
                        <!--begin::Table container-->
                        <div class="table-responsive" style="height: 220px;
}">
                            <!--begin::Table-->
                            <table id="kt_applied_application_table"
                                class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                <!--begin::Head-->
                                <thead class="fs-7 text-gray-400 text-uppercase">
                                    <tr>
                                        <th class="250px ">Universities</th>
                                        <th class="150px">Applied Programs</th>
                                        <th class="90px ">Applied Date</th>
                                        <th class="90px">Modified Date</th>
                                        <th class="50px ">Fees</th>

                                        <th class="50px">Payment Mode</th>
                                        <th class="50px">Payment Status</th>
                                        <th class="50px text-end ">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6 ">
                                    @if (count($appliedCourse) != '0')

                                        @foreach ($appliedCourse as $appliedCourses)
                                            <tr>
                                                @php
                                                    $university = App\Models\addInstitution::where([
                                                        'id' => $appliedCourses->insitution_id,
                                                    ])->first();
                                                @endphp
                                                @if ($university)
                                                    <td><a href="https://studify.au/public/InstitutionImage/167576484322.jpg"
                                                            class="fs-6 text-gray-800 text-hover-primary "><img
                                                                src="https://studify.au/public/InstitutionImage/167576484322.jpg"
                                                                style="width: 100px;"><br>{{ $university->universirty_name }}</a>
                                                    </td>
                                                @else
                                                    <td>--</td>
                                                @endif
                                                @php
                                                    $course = App\Models\addCoursesModel::where([
                                                        'id' => $appliedCourses->course_id,
                                                    ])->first();
                                                @endphp
                                                @if ($course)
                                                    <td>{{ $course->c_name }}</td>
                                                @else
                                                    <td>--</td>
                                                @endif
                                                <td>{{ $appliedCourses->created_at }}</td>
                                                <td>{{ $appliedCourses->updated_at }}</td>

                                                @php
                                                    $fees = App\Models\addFees::where([
                                                        'course_id' => $appliedCourses->course_id,
                                                    ])
                                                        ->where([
                                                            'institution_detail_id' => $appliedCourses->insitution_id,
                                                        ])
                                                        ->where(['type' => $course->type])
                                                        ->first();
                                                @endphp
                                                @if ($fees)
                                                    <td>Application Fees : {{ $fees->application_fees }}<br>
                                                        Tution Fees : {{ $fees->tution_fees }}<br>
                                                        Accomdation and Other Fees: {{ $fees->acc_other_fees }}
                                                    </td>
                                                @else
                                                    <td>AUD 0</td>
                                                @endif
                                                <td>{{ $appliedCourses->mode }}</td>
                                                @if ($appliedCourses->payment_status == '0')
                                                    <td style="color:red;">Unpaid</td>
                                                @else
                                                    <td style="color:green;">Paid</td>
                                                    <td style="color:green;">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown" type="button"
                                                                data-toggle="dropdown"
                                                                style="color: #009EF7;
    border-color: #F1FAFF;
    background-color: #F1FAFF !important;
}">Actions<svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                                <span class="caret"></span></button>
                                                            <ul class="dropdown-menu"style="top: 40px !important;"
                                                                id="mee">
                                                                <li><a href="#">History</a></li>
                                                                <li><a
                                                                        href="{{ url('/universitiesdetails/' . $appliedCourses->insitution_id) }}">View</a>
                                                                </li>
                                                                <li><a
                                                                        href="{{ url('/student/university-course-delete/' . $appliedCourses->id) }}">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr> No record found </tr>
                                    @endif

                                </tbody>
                                <!--end::Body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
        </div>

        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


<div class="dasbord"></div>
<!--begin::Footer-->
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
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->






<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                fill="currentColor" />
            <path
                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
