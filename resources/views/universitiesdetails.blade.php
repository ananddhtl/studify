<!DOCTYPE html>
<html lang="en">

<head>
    <title>universities-details page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="60x60"
        href="{{ asset('assets/images/fav.png') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="96x96"
        href="{{ asset('assets/images/fav.png') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="60x60"
        href="{{ asset('assets/images/fav.png') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


</head>
<body class="institute-modal">
<main class="page-wrapper position-relative">

@include('layout.header')

<!-- first-section-->
    
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    
    <section class="py-3 py-sm-grid-gutter position-relative inst-header"
             style="
                     margin-top: 0 !important;
                     height: 550px;
                      background-color: #10236B;
                     background-image: url(http://67.202.42.167/public/InstitutionImage/{{ $institution->thumbnail }}); 
                     background-size: cover;
                     padding: 10px;
                     "
    >

        <div class="upper-bg-mask"></div>
        <div class="lower-bg-mask"></div>
        <div class="container py-grid-gutter position-relative h-100">

                        <div class="institute-name-block position-absolute w-100">
                <div class="uni-carousel inst-page-logo">
                    <img src="{{ asset('public/InstitutionImage/' . $institution->univ_img) }}" alt="Long Island University Post"></div>
                <h1 class="col-lg-8 col-md-10 mb-3 px-0 pb-1 color-white">{{ $institution->universirty_name }}</h1>

                <ul class="inst-header-info ps-0">
                    <li class="d-inline-block color-white me-3">
                        <i class="fa fa-calendar color-red" aria-hidden="true"></i> Established: <span
                                class="font-weight-700"> {{ $institution->founded }}</span>
                    </li>
                    <li class="d-inline-block color-white me-3">
                        <i class="fa fa-bank color-green" aria-hidden="true"></i> Type: <span
                                class="font-weight-700"> {{ $institution->univ_type }} <img src="{{ asset('assets/images/us.png') }}" alt="Long Island University Post" title="Long Island University Post"></span>
                    </li>

                    <li class="d-inline-block color-white me-3">
                        <i class="fa fa-users color-blue" aria-hidden="true"></i> Total Students: <span
                                class="font-weight-700">{{ $institution->international_student }}</span>
                    </li>
                </ul>

            </div>
        </div>
    </section>


    <!-- main university content section section -->

    <section class="container-fluid bg-secondary pe-0 ps-0">

        <nav id="navbar-example2" class="container-fluid  detail-inst navbar bg-light border-bottom-blue">
            <ul class="container nav nav-pills2" id="inst-main-pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-about-tab" data-bs-toggle="pill"
                       data-bs-target="#scrollspyHeading1" role="tab" aria-controls="pills-home"
                       aria-selected="true">About</a>
                </li>
                                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-glance-tab" data-bs-toggle="pill"
                           data-bs-target="#scrollspyHeading2" role="tab" aria-controls="pills-about"
                           aria-selected="true">At a Glance</a>
                    </li>
                  <li class="nav-item" role="presentation"><a class="nav-link" id="pills-video-tab" data-bs-toggle="pill"
                                                            data-bs-target="#scrollspyHeading3" role="tab"
                                                            aria-controls="pills-video" aria-selected="true">Video
                        Tour</a></li>


                <li class="nav-item" role="presentation"><a class="nav-link" id="pills-gallery-tab"
                                                            data-bs-toggle="pill" data-bs-target="#scrollspyHeading4"
                                                            role="tab" aria-controls="pills-gallery"
                                                            aria-selected="true">Gallery</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" id="pills-courses-tab"
                                                                data-bs-toggle="pill"
                                                                data-bs-target="#scrollspyHeading5"
                                                                role="tab" aria-controls="pills-courses"
                                                                aria-selected="true">Courses Offered</a></li>
                

                <li class="nav-item" role="presentation"><a class="nav-link" id="pills-tution-tab" data-bs-toggle="pill"
                                                            data-bs-target="#scrollspyHeading6" role="tab"
                                                            aria-controls="pills-tution"
                                                            aria-selected="true">Finance</a></li>

                                                            
                    <li class="nav-item" role="presentation"><a class="nav-link" id="pills-requirement-tab" data-bs-toggle="pill"
                                                                data-bs-target="#scrollspyHeading7" role="tab"
                                                                aria-controls="pills-requirement"
                                                                aria-selected="true">Requirement</a></li>
                
            </ul>
        </nav>
        <section class="container">
            <div class="row">

                <!-- Content -->
                <div class="col-lg-8 main-inst-content pt-5 pb-5 pe-lg-5">


                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active about-main-content" role="tabpanel"
                             aria-labelledby="pills-about-tab" id="scrollspyHeading1">
                            <h3 class="h3 mb-2 pb-3 color-blue">{{ $institution->about_heading }}</h3>
                           {{ $institution->about_paragraph }}
                            </div>
                                                    <div class="tab-pane fade show" role="tabpanel" aria-labelledby="pills-glance-tab"
                                 id="scrollspyHeading2">

                                <h3 class="h3 mb-2 pb-3 color-blue">At a Glance</h3>


                                <div class="border-15 border-blue bg-blue-light shadow-blue p-3 mb-5">
                                <?php   if(count($glance) != '0') { ?>
                                    <ul>
                                        @foreach ($glance as $glances)
                                
                                        <li>{{ $glances->glance }}</li> @endforeach
</ul>

                                 <?php } else { ?>
                                    
    <p>No glance found</p>

    
<?php } ?>
                                </div>

                            </div>
                            <div class="tab-pane
        fade show mb-5" role="tabpanel" aria-labelledby="pills-gallery-tab" id="scrollspyHeading3">
    @if ($institution->video != '')
        @php
            $str = $institution->video;
            $reg =
                '/(?im)\b(?:https?:\/\/)?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/(?:(?:\??v=?i?=?\/?)|watch\?vi?=|watch\?.*?&v=|embed\/|)([A-Z0-9_-]{11})\S*(?=\s|$)/';
            preg_match($reg, $str, $matches);
            $uu = 'https://www.youtube.com/embed/' . $matches[1];
        @endphp


        <iframe width="420" height="345" src="{{ $uu }}"></iframe>
    @else
        <h1 class="color-blue"> No video found
    @endif
    </div>



    <div class="tab-pane fade show mb-5" role="tabpanel" aria-labelledby="pills-gallery-tab" id="scrollspyHeading4">
        <h3 class="h3 mb-2 pb-3 color-blue">Photo Gallery</h3>

        <div class="inst-photo-gallery gallery product-gallery">














            @foreach ($images as $image)
                <a class="gallery-item" href="{{ asset('public/InstitutionImage/' . $image->image) }}"
                    data-sub-html='<h6 class="text-light">{{ $institution->universirty_name }}</h6>'>
                    <img class="rounded" src="{{ asset('public/InstitutionImage/' . $image->image) }}"
                        alt="Long Island University Post">
                    <span class="gallery-caption">{{ $institution->universirty_name }}</span>
                </a>
            @endforeach













        </div>

    </div>

    <div class="tab-pane fade show mb-5 courses-offered-content" role="tabpanel" aria-labelledby="pills-courses-tab"
        id="scrollspyHeading5">
        <h3 class="h3 mb-2 pb-3 color-blue">Courses Offered</h3>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @if (count($course) != 0)
                <li class="nav-item rand" role="presentation">
                    <button class="nav-link active" id="bachelor-degree-tab" data-bs-toggle="pill"
                        data-bs-target="#bachelor-degree" type="button" role="tab" aria-controls="bachelor-degree"
                        aria-selected="false">Bachelor's
                        Degree
                    </button>
                </li>
            @endif
            @if (count($master) != 0)
                <li class="nav-item rand" role="presentation">
                    <button class="nav-link" id="master-degree-tab" data-bs-toggle="pill"
                        data-bs-target="#master-degree" type="button" role="tab" aria-controls="master-degree"
                        aria-selected="true">Master's Degree
                    </button>
                </li>
            @endif
            @if (count($diploma) != 0)
                <li class="nav-item rand" role="presentation">
                    <button class="nav-link" id="diploma-tab" data-bs-toggle="pill" data-bs-target="#diploma"
                        type="button" role="tab" aria-controls="master-degree" aria-selected="true">Diploma
                    </button>
                </li>
            @endif

            @if (count($phd) != 0)
                <li class="nav-item rand" role="presentation">
                    <button class="nav-link" id="phd-tab" data-bs-toggle="pill" data-bs-target="#phdss" type="button"
                        role="tab" aria-controls="master-degree" aria-selected="true">PHD
                    </button>
                </li>
            @endif

            @if (count($certificates) != 0)
                <li class="nav-item rand" role="presentation">
                    <button class="nav-link" id="phd-tab" data-bs-toggle="pill" data-bs-target="#certificates"
                        type="button" role="tab" aria-controls="master-degree" aria-selected="true">PHD
                    </button>
                </li>
            @endif

        </ul>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="bachelor-degree" role="tabpanel"
                aria-labelledby="bachelor-degree-tab">
                <div id="bachelor-degree-block">
                    <?php    if($course){  ?>
                    @foreach ($course as $courses)
                        <div class="position-relative border-15 border-grey bg-white shadow-grey p-3 mb-5 pb-5">

                            <h4>{{ $courses->c_name }}</h4>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 d-lg-inline-block d-md-block me-3">Area of Study</span>
                                <span class="major-sub-name bg-white px-3 py-1 border-blue rounded-pill">

                                    {{ $courses->AOS }}


                                </span>
                            </div>
                            @php
                                $value = App\Models\addFees::where(['course_id' => $courses->id])->first();
                            @endphp

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 d-lg-inline-block d-md-block me-3">Total Fees</span>
                                @if ($value)
                                    <span class="major-sub-name bg-white">
                                        ${{ $value->tution_fees }}
                                    </span>
                                @else
                                    <span class="major-sub-name bg-white">
                                        --
                                    </span>
                                @endif

                            </div>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 d-lg-inline-block d-md-block me-3">Course Duration</span>

                                <span class="major-sub-name bg-white">
                                    {{ $courses->duration }}
                                </span>

                            </div>

                            <div class="intake">
                                <img src="{{ asset('assets/images/intake-card.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 me-3">Intake</span>
                                <ul class="intake-info d-inline-block ps-0">
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/fall-leaf.png') }}" alt="">
                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/summer-sun.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Summer (May/June)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/spring-flower.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Spring (Jan/Feb)</span>

                                    </li>
                                </ul>
                            </div>

                            <div class="applied-btn position-absolute">


                                @if (Session::get('login') != '')
                                    @if (Session::get('login') == 'student')
                                        @php
                                            $studentid = Session::get('student_id');
                                            $exit = App\Models\universityCoursePayment::where('insitution_id', $id)
                                                ->where('course_id', $courses->id)
                                                ->where('student_id', $studentid)
                                                ->where('payment_status', '1')
                                                ->first();
                                        @endphp
                                        @if ($exit)
                                            <a href="#" class="btn btn-primary rounded-pill">Applied</a>
                                        @else
                                            <a href="{{ url('/univeristy-apply/' . $id . '/' . $courses->id) }}"
                                                class="btn btn-primary rounded-pill">Apply Now</a>
                                        @endif
                                    @else
                                        <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                    @endif
                                @else
                                    <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                @endif


                            </div>
                            <div class="modal fade" id="staticBackdrop_72446" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title color-blue font-weight-700"
                                                id="staticBackdropLabel">Do you want to
                                                apply for Accounting<span class="major"></span> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ap-form">
                                            <div class="form-group first has-validation">
                                                <label for="firstname">You need to login
                                                    as as a student or as an agent to
                                                    apply.</label>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="{{ url('/member/login') }}"
                                                    class="btn btn-primary rounded-pill">Login
                                                    as a Student</a>
                                                <a href="{{ url('/member/register') }}"
                                                    class="btn btn-primary rounded-pill">Login
                                                    as an Agent</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <?php } else { ?>
                    <div>
                        No course found
                    </div>

                    <?php }  ?>
                </div>

                <div id="loader" style="display: none;"><img src="{{ asset('assets/images/loading.gif') }}"
                        alt="Loading..."></div>
                <div id="load_more_bachelor_block">
                    <input type="hidden" name="loadmoreBachelorPagination" id="loadmoreBachelorPagination"
                        value="10">
                    <a href="javascript:void(0)" onclick="javascript:loadmoreBachelor();"
                        class="btn btn-primary rounded-pill">Load more bachelor</a>
                </div>

            </div>


            <div class="tab-pane fade" id="master-degree" role="tabpanel" aria-labelledby="master-degree-tab">
                <div id="master-degree-block">
                    <?php    if($master){  ?>
                    @foreach ($master as $coursess)
                        <div class="position-relative border-15 border-grey bg-white shadow-grey p-3 mb-5 pb-5">

                            <h4>{{ $coursess->c_name }}</h4>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3"> <span
                                    class="font-weight-700 d-lg-inline-block d-md-block me-3">Area of Study</span>
                                <span class="major-sub-name bg-white px-3 py-1 border-blue rounded-pill">

                                    {{ $coursess->AOS }}
                                </span>
                            </div>
                            @php
                                $value = App\Models\addFees::where(['course_id' => $coursess->id])->first();
                            @endphp

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 d-lg-inline-block d-md-block me-3">Total Fees</span>
                                @if ($value)
                                    <span class="major-sub-name bg-white">
                                        ${{ $value->tution_fees }}
                                    </span>
                                @else
                                    <span class="major-sub-name bg-white">
                                        --
                                    </span>
                                @endif

                            </div>

                            <div class="intake">
                                <img src="{{ asset('assets/images/intake-card.png') }}" alt=""
                                    class="me-3">

                                <span class="font-weight-700 me-3">Intake</span>

                                <ul class="intake-info d-inline-block ps-0">
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/fall-leaf.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Fall( Aug/Sept)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/summer-sun.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Summer (May/June)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/spring-flower.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Spring (Jan/Feb)</span>

                                    </li>
                                </ul>
                            </div>

                            <div class="applied-btn position-absolute">
                                @if (Session::get('login') != '')
                                    @if (Session::get('login') == 'student')
                                        @php
                                            $studentid = Session::get('student_id');
                                            $exit = App\Models\universityCoursePayment::where('insitution_id', $id)
                                                ->where('course_id', $coursess->id)
                                                ->where('student_id', $studentid)
                                                ->where('payment_status', '1')
                                                ->first();
                                        @endphp
                                        @if ($exit)
                                            <a href="#" class="btn btn-primary rounded-pill">Applied</a>
                                        @else
                                            <a href="{{ url('/univeristy-apply/' . $id . '/' . $coursess->id) }}"
                                                class="btn btn-primary rounded-pill">Apply Now</a>
                                        @endif
                                    @else
                                        <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                    @endif
                                @else
                                    <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                @endif
                            </div>
                            <div class="modal fade" id="staticBackdrop_72478" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title color-blue font-weight-700"
                                                id="staticBackdropLabel">Do you want to
                                                apply for Accounting<span class="major"></span> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ap-form">
                                            <div class="form-group first has-validation">
                                                <label for="firstname">You need to login
                                                    as as a student or as an agent to
                                                    apply.</label>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as a Student</a>
                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as an Agent</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <?php } else {  ?>
                    <h1> No course found </h1>

                    <?php }  ?>
                </div>

                <div id="loader" style="display: none;"><img src="images/loading.gif" alt="Loading..."></div>
                <div id="load_more_master_block">
                    <input type="hidden" name="loadmoreMasterPagination" id="loadmoreMasterPagination"
                        value="10">
                    <a href="javascript:void(0)" onclick="javascript:loadmoreMaster();"
                        class="btn btn-primary rounded-pill">Load more master</a>
                </div>
            </div>

            <div class="tab-pane fade" id="diploma" role="tabpanel" aria-labelledby="master-degree-tab">
                <div id="master-degree-block">
                    <?php    if($diploma){  ?>
                    @foreach ($diploma as $diplomas)
                        <div class="position-relative border-15 border-grey bg-white shadow-grey p-3 mb-5 pb-5">

                            <h4>{{ $diplomas->c_name }}</h4>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3"> <span
                                    class="font-weight-700 d-lg-inline-block d-md-block me-3">Area of Study</span>
                                <span class="major-sub-name bg-white px-3 py-1 border-blue rounded-pill">

                                    {{ $diplomas->AOS }}
                                </span>
                            </div>

                            @php
                                $value = App\Models\addFees::where(['course_id' => $diplomas->id])->first();
                            @endphp

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3">
                                <span class="font-weight-700 d-lg-inline-block d-md-block me-3">Total Fees</span>
                                @if ($value)
                                    <span class="major-sub-name bg-white">
                                        ${{ $value->tution_fees }}
                                    </span>
                                @else
                                    <span class="major-sub-name bg-white">
                                        --
                                    </span>
                                @endif

                            </div>

                            <div class="intake">
                                <img src="{{ asset('assets/images/intake-card.png') }}" alt=""
                                    class="me-3"> <span class="font-weight-700 me-3">Intake</span>
                                <ul class="intake-info d-inline-block ps-0">
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/fall-leaf.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Fall( Aug/Sept)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/summer-sun.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Summer (May/June)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/spring-flower.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Spring (Jan/Feb)</span>

                                    </li>
                                </ul>
                            </div>

                            <div class="applied-btn position-absolute">
                                @if (Session::get('login') != '')
                                    @if (Session::get('login') == 'student')
                                        @php
                                            $studentid = Session::get('student_id');
                                            $exit = App\Models\universityCoursePayment::where('insitution_id', $id)
                                                ->where('course_id', $diplomas->id)
                                                ->where('student_id', $studentid)
                                                ->where('payment_status', '1')
                                                ->first();
                                        @endphp
                                        @if ($exit)
                                            <a href="#" class="btn btn-primary rounded-pill">Applied</a>
                                        @else
                                            <a href="{{ url('/univeristy-apply/' . $id . '/' . $diplomas->id) }}"
                                                class="btn btn-primary rounded-pill">Apply Now</a>
                                        @endif
                                    @else
                                        <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                    @endif
                                @else
                                    <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop_72446">Apply Now</a>
                                @endif
                            </div>
                            <div class="modal fade" id="staticBackdrop_72478" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title color-blue font-weight-700"
                                                id="staticBackdropLabel">Do you want to
                                                apply for Accounting<span class="major"></span> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ap-form">
                                            <div class="form-group first has-validation">
                                                <label for="firstname">You need to login
                                                    as as a student or as an agent to
                                                    apply.</label>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as a Student</a>
                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as an Agent</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <?php } else {  ?>
                    <h1> No course found </h1>

                    <?php }  ?>
                </div>

                <div id="loader" style="display: none;"><img src="images/loading.gif" alt="Loading..."></div>
                <div id="load_more_master_block">
                    <input type="hidden" name="loadmoreMasterPagination" id="loadmoreMasterPagination"
                        value="10">
                    <a href="javascript:void(0)" onclick="javascript:loadmoreMaster();"
                        class="btn btn-primary rounded-pill">Load more master</a>
                </div>
            </div>

            <!-- phd  -->
            <div class="tab-pane fade" id="phdss" role="tabpanel" aria-labelledby="master-degree-tab">
                <div id="master-degree-block">
                    <?php    if($phd){  ?>
                    @foreach ($phd as $phds)
                        <div class="position-relative border-15 border-grey bg-white shadow-grey p-3 mb-5 pb-5">

                            <h4>{{ $phds->c_name }}</h4>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3"> <span
                                    class="font-weight-700 d-lg-inline-block d-md-block me-3">Area of Study</span>
                                <span class="major-sub-name bg-white px-3 py-1 border-blue rounded-pill">

                                    {{ $phds->AOS }}
                                </span>
                            </div>

                            <div class="intake">
                                <img src="{{ asset('assets/images/intake-card.png') }}" alt=""
                                    class="me-3"> <span class="font-weight-700 me-3">Intake</span>
                                <ul class="intake-info d-inline-block ps-0">
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/fall-leaf.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Fall( Aug/Sept)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/summer-sun.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Summer (May/June)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/spring-flower.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Spring (Jan/Feb)</span>

                                    </li>
                                </ul>
                            </div>

                            <div class="applied-btn position-absolute"><a href="#"
                                    class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop_72478">Apply Now</a>
                            </div>
                            <div class="modal fade" id="staticBackdrop_72478" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title color-blue font-weight-700"
                                                id="staticBackdropLabel">Do you want to
                                                apply for Accounting<span class="major"></span> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ap-form">
                                            <div class="form-group first has-validation">
                                                <label for="firstname">You need to login
                                                    as as a student or as an agent to
                                                    apply.</label>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as a Student</a>
                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as an Agent</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <?php } else {  ?>
                    <h1> No course found </h1>

                    <?php }  ?>
                </div>

                <div id="loader" style="display: none;"><img src="images/loading.gif" alt="Loading..."></div>
                <div id="load_more_master_block">
                    <input type="hidden" name="loadmoreMasterPagination" id="loadmoreMasterPagination"
                        value="10">
                    <a href="javascript:void(0)" onclick="javascript:loadmoreMaster();"
                        class="btn btn-primary rounded-pill">Load more master</a>
                </div>
            </div>

            <div class="tab-pane fade" id="certificates" role="tabpanel" aria-labelledby="master-degree-tab">
                <div id="master-degree-block">
                    <?php    if($certificates){  ?>
                    @foreach ($certificates as $certificatess)
                        <div class="position-relative border-15 border-grey bg-white shadow-grey p-3 mb-5 pb-5">

                            <h4>{{ $certificatess->c_name }}</h4>

                            <div class="area-of-study mb-3">
                                <img src="{{ asset('assets/images/study-student-icon.png') }}" alt=""
                                    class="me-3"> <span
                                    class="font-weight-700 d-lg-inline-block d-md-block me-3">Area of Study</span>
                                <span class="major-sub-name bg-white px-3 py-1 border-blue rounded-pill">

                                    {{ $certificatess->AOS }}
                                </span>
                            </div>

                            <div class="intake">
                                <img src="{{ asset('assets/images/intake-card.png') }}" alt=""
                                    class="me-3"> <span class="font-weight-700 me-3">Intake</span>
                                <ul class="intake-info d-inline-block ps-0">
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/fall-leaf.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Fall( Aug/Sept)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/summer-sun.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Summer (May/June)</span>

                                    </li>
                                    <li class="d-inline-block me-3">
                                        <img src="{{ asset('assets/images/spring-flower.png') }}" alt="">
                                        <span class="fall-text-title font-weight-700">Spring (Jan/Feb)</span>

                                    </li>
                                </ul>
                            </div>

                            <div class="applied-btn position-absolute"><a href="#"
                                    class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop_72478">Apply Now</a>
                            </div>
                            <div class="modal fade" id="staticBackdrop_72478" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title color-blue font-weight-700"
                                                id="staticBackdropLabel">Do you want to
                                                apply for Accounting<span class="major"></span> ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ap-form">
                                            <div class="form-group first has-validation">
                                                <label for="firstname">You need to login
                                                    as as a student or as an agent to
                                                    apply.</label>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as a Student</a>
                                                <a href="#" class="btn btn-primary rounded-pill">Login
                                                    as an Agent</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <?php } else {  ?>
                    <h1> No course found </h1>

                    <?php }  ?>
                </div>

                <div id="loader" style="display: none;"><img src="images/loading.gif" alt="Loading..."></div>
                <div id="load_more_master_block">
                    <input type="hidden" name="loadmoreMasterPagination" id="loadmoreMasterPagination"
                        value="10">
                    <a href="javascript:void(0)" onclick="javascript:loadmoreMaster();"
                        class="btn btn-primary rounded-pill">Load more master</a>
                </div>
            </div>

            <div class="tab-pane fade" id="pathway-degree" role="tabpanel" aria-labelledby="pathway-degree-tab">
                <div id="pathway-degree-block">
                </div>
            </div>
            <div class="tab-pane fade" id="associate-degree" role="tabpanel" aria-labelledby="associate-degree-tab">
                <div id="associate_degree-block">


                </div>
            </div>
        </div>


    </div>

    <div class="tab-pane fade show mb-5 fee-section" role="tabpanel" aria-labelledby="pills-tution-tab"
        id="scrollspyHeading6">
        <h3 class="h3 mb-2 pb-3 color-blue">Estimated Tution and Other Fees</h3>

        <div class="row">

            @foreach ($feesbachelor as $feesbachelors)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="border-15 border-grey bg-white shadow-grey p-3 mb-5">
                        <h4 class="tf-heading color-green">{{ $feesbachelors->c_name }}</h4>
                        <dl class="row">
                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Tution
                                Fee
                            </dt>
                            <?php if($feesbachelors != '') { ?>
                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">
                                ${{ $feesbachelors->tution_fees }}</dd>
                            <?php } else { ?><dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>
                            <?php } ?>
                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">
                                Accomodation &
                                Other Fees
                            </dt>
                            <?php if($feesbachelors != '') { ?>
                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">
                                ${{ $feesbachelors->acc_other_fees }}</dd>
                            <?php } else { ?>
                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>
                            <?php } ?>
                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">
                                Application Fees
                            </dt>

                            <?php if($feesbachelors != '') { ?>
                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">
                                ${{ $feesbachelors->application_fees }}</dd>
                            <?php } else { ?>
                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">- -</dd>
                            <?php } ?>

                            <dt class="col-sm-8 col-8  font-weight-700 mt-1">Total</dt>
                            <?php if($feesbachelors != '') { ?>
                            <dd class=" col-sm-4 col-4  font-weight-700 mt-1">$<?php $z = $feesbachelors->tution_fees + $feesbachelors->acc_other_fees + $feesbachelors->application_fees;
                            echo $z; ?></dd>
                            <?php } else { ?>
                            <dd class=" col-sm-4 col-4  font-weight-700 mt-1">--</dd>

                            <?php } ?>
                        </dl>
                    </div>
                </div>
            @endforeach



        </div>


    </div>

    <div class="tab-pane fade show mb-5 fee-section" role="tabpanel" aria-labelledby="pills-requirement-tab"
        id="scrollspyHeading7">
        <h3 class="h3 mb-2 pb-3 color-blue">Requirements</h3>

        <div class="row">

            @foreach ($reqbachelor as $reqbachelors)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="border-15 border-grey bg-white shadow-grey p-3 mb-5">
                        <h4 class="tf-heading color-green">{{ $reqbachelors->c_name }}</h4>
                        <dl class="row">
                            <?php if($reqbachelors != '') { ?>
                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum GPA
                                Total
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->min_gpa }}
                            </dd>


                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">
                                Minimum level of Education
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->education }}
                            </dd>


                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum TOEFL
                            </dt>


                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->TOEFL }}</dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum IELTS
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->IELTS }}</dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum Pearson
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->Pearson }}
                            </dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum Duolingo
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">{{ $reqbachelors->Duolingo }}
                            </dd>
                            <?php } else { ?>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum GPA
                                Total
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>


                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">
                                Minimum level of Education
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>


                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum TOEFL
                            </dt>


                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum IELTS
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum Pearson
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>

                            <dt class="border-bottom col-sm-8 col-8  font-weight-700">Minimum Duolingo
                            </dt>

                            <dd class="border-bottom col-sm-4 col-4  font-weight-700">--</dd>

                            <?php } ?>
                        </dl>
                    </div>
                </div>
            @endforeach



        </div>

    </div>


    </div>


    </div>


    <!-- Sidebar -->
    <aside class="col-lg-4 inst-sidebar  border-15 p-3">

        <div class="inst-map">
            <h6 class="mb-3 font-weight-700"><i class="ri-map-pin-2-fill color-red pe-1"></i> University
                Location</h6>


            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3019.4883962920376!2d-73.59226248459187!3d40.81723487932056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c28670227f87b1%3A0xc66e8187e8128a37!2sLIU%20Post!5e0!3m2!1sen!2sus!4v1643402755531!5m2!1sen!2sus"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="inst-address mt-5">
            <h6 class="font-weight-700">
                Address
            </h6>
            <p>
                {{ $institution->location }}

            </p>
        </div>

        <div class="inst-social mt-5">
            <h6 class="color-blue font-weight-700 mb-3">
                Share {{ $institution->universirty_name }}
            </h6>

            <a href="#" target="_blank"
                class="btn-social bs-solid rounded-circle bs-light me-2 mb-2 mt-md-0 mt-sm-1">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>




            <a href="#" target="_blank"
                class="btn-social bs-solid rounded-circle bs-light me-2 mb-2 mt-md-0 mt-sm-1">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="#" target="_blank"
                class="btn-social bs-solid rounded-circle bs-light me-2 mb-2 mt-md-0 mt-sm-1">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>

        </div>

    </aside>
    <!--  / Sidebar -->
    </div>


    <!--  / row -->
    </section>
    </section>


    <!-- similar universities -->
    <section class="container-fluid pt-5 pb-5 bg-secondary">
        <div class="container ab-search-result mb-5 ">

            <h2 class="h2 mb-2 pb-3 color-blue">Similar Universities</h2>

            <div class="row row-cols-sm-2 row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach ($allinstitution as $allinstitutions)
                    <div class="col">
                        <div class="card border-7 inst-card h-100">
                            <div class="card-logo ">
                                <a class="ab-button " href="#">
                                    <img src="{{ asset('public/InstitutionImage/' . $allinstitutions->univ_img) }}"
                                        alt="Hult International Business School- New York"
                                        title="Hult International Business School- New York" class="card-img-top">
                                </a>
                            </div>
                            <div class="card-body bg-blue-light">
                                <h5 class="card-title"> {{ $institution->universirty_name }}</h5>
                                <span class="d-block uni-location "><i class="ri-map-pin-fill color-red "></i>
                                    {{ $institution->location }}</span>
                                <p class="card-text ">
                                <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        University Type
                                        <span
                                            class="badge bg-primary rounded-pill ">{{ $allinstitutions->univ_type }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        Founded
                                        <span
                                            class="badge bg-primary rounded-pill ">{{ $allinstitutions->founded }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        International Students
                                        <span
                                            class="badge bg-primary rounded-pill ">{{ $allinstitutions->international_student }}+</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        Type
                                        <span
                                            class="badge bg-primary rounded-pill ">{{ $allinstitutions->type }}</span>
                                    </li>
                                </ul>
                                </p>
                                <a class="ab-button" href="{{ url('universitiesdetails/' . $allinstitutions->id) }}"
                                    role="button"><i class="ri-arrow-right-line"></i>
                                    Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- blog section ends here -->

    <!-- newsletter form -->
    <!-- newsletter form -->
    <section class="container-fluid  ab-home-banner-bg">
        <section class="container py-lg-5 pt-5 pb-sm-5 pb-4 px-0">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-12 text-sm-center text-md-start">
                    <h6 class=" color-light-blue">Stay up to date</h6>
                    <h3 class="h2  color-light-blue">Subscribe to our Newsletter!</h3>
                </div>

                <div class="col-md-6 col-sm-12 col-12 home-subscription-block my-auto">
                    <form method="POST" action="#" accept-charset="UTF-8"
                        class="subscribe-block needs-validation position-relative" novalidate><input name="_token"
                            type="hidden" value="jG9NMTI1P7LJhFsVFIjpakGuLbtIQABLVidSG05G">
                        <div class="input-group mb-3 ">
                            <input type="email" name="email" class="form-control" placeholder="Your Valid Email"
                                aria-label="Recipient 's email" aria-describedby="button-addon2" required>
                            <span class="invalid-feedback position-absolute" style="top:50px; left: 0;">
                                Valid Email is required
                            </span>
                            <button class=" btn btn-primary" type="submit" id="button-addon2 ">Subscribe
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>


    </main>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
