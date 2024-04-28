<!DOCTYPE html>
<html lang="en">

<head>
    <title>Find & Explorebest agent page</title>
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
            <!-- search Hero-->
 <section class=" overflow-hidden pt-5" style="margin-top: 100px;">
        <section class="container" style="margin-bottom: 100px;">
            <h1 class="h2 font-weight-400 text-center">Find & Explore best agent on <span
                        class="font-weight-700">Studify</span></h1>
                         <div class="col-md-12 main-search-input">
                <form method="get" action="{{ url('/agent/search') }}" accept-charset="UTF-8" class="" id="">
                  
                <div class="search"><i class="ri-search-line"></i>
                    <input type="text" name="agent_search" value="{{ $name }}" class="form-control rounded-pill"
                           placeholder="Search your agent" id="search-selector">
                    <button class="btn btn-primary rounded-pill" type="submit">Search</button>
                </div>
                </form>
            </div>
        
          </section>
                    <div class="container-fluid bg-blue-light border" id="best2">
            <nav class="filter-navbar pt-3">
                <div class="row">
                    <!-- <div class="col-lg-2 col-md-2 col-12">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="toggler-icon"><i class="ri-equalizer-fill"></i> Advanced Search</span>
                        </button>
                    </div> -->

                    <div class="col-lg-12 col-md-12 col-12 hori-form" >
                      <div class="col-lg-3 col-md-6 ">
                        <div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" id="firstbutton"> Advanced Search</button>
   <button class="w3-bar-item w3-button" id="secondbutton"> Advanced Search</button>

</div>
                      </div>
                        <form id="First" method="get" action="{{ url('/agent/search') }}" accept-charset="UTF-8">
                       @csrf
                        <div class="row" id="#firstbutton">
                           <div class="col-lg-3 col-md-6 " id="coun">
                                <div class="form-group rounded-pill">
                                    <select name="country" id="country" class="intake-select">
                    <option value="">Select Country</option>
                    @foreach ($allcountry as $value)
                    <option value="{{ $value->id }}">{{ $value->country_name }}</option> @endforeach
                     </select>  
                                </div>
                            </div>
                            <div class="col-lg-3
        col-md-6" id="coun">
    <div class="form-group">

        <select class="intake-select.intakes_id" id="state-dd" name="state">
            <option value="">-Select States-</option>
        </select>
    </div>
    </div>
    <div class="col-lg-3 col-md-6" id="coun1">
        <div class="form-group">
            <select class="program-select" id="city-dd" name="city">
                <option value="0">-Select City-</option>


            </select>
        </div>
    </div>

    <div class="col-lg-1 col-md-6" id="coun">
        <div class="form-group">
            <button id="search-filter" type="submit" class="btn-info">Search</button>
        </div>
    </div>

    </div>
    </form>
    </div>

    </div>
    <!-- offcanvas filter starts here -->
    <div class="offcanvas offcanvas-start overflow-auto bg-blue-light" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="flex-shrink-0 p-3 filter-scroller">
            <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <span class="fs-5 font-weight-700"><i class="ri-equalizer-fill color-blue"></i> Filter Your Search
                    Results</span>
            </a>
            <form method="GET" action="https://www.applybridge.com/university/search" accept-charset="UTF-8"
                class="" id="">
                <!-- search by eligibility -->
                <h3 class=" btn-toggle " data-bs-toggle="collapse" data-bs-target="#eligibility-collapse"
                    aria-expanded="true">Eligibility</h3>
                <ul class=" list-unstyled p-3 bg-white rounded collapse show" id="eligibility-collapse">
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed font-weight-700"
                            data-bs-toggle="collapse" data-bs-target="#visa-collapse" aria-expanded="false">
                            Do you have a valid study permit / visa?
                        </div>
                        <div class="collapse " id="visa-collapse">
                            <div class="form-group rounded-pill p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="valid_study_permit_visa_id"
                                        value="1" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Yes / No</label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#country-collapse" aria-expanded="false">
                            Education Country
                        </div>
                        <div class="collapse p-3 " id="country-collapse">
                            <select class="form-group countries-select select2" name="education_country_id">
                                <option value="">Select Country Your are from</option>
                                <option value="1">Afghanistan</option>
                                <option value="2">Albania</option>
                                <option value="3">Algeria</option>
                                <option value="4">American Samoa</option>
                                <option value="5">Andorra</option>
                                <option value="6">Angola</option>
                                <option value="7">Anguilla</option>
                                <option value="8">Antarctica</option>
                            </select>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#ed-level-collapse" aria-expanded="false">
                            Education Level
                        </div>
                        <div class="collapse " id="ed-level-collapse">
                            <div class="form-group p-3">

                                <select class="ed-level-select" name="education_level_id">
                                    <option value="">Select Your Current Education Level</option>
                                    <option value="7">High School</option>
                                    <option value="4">Diploma</option>
                                    <option value="11">Associate's Degree</option>
                                    <option value="3">Bachelor's Degree</option>
                                    <option value="5">Master's Degree</option>
                                    <option value="6">Doctoral Degree</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- education level -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#country-study-collapse" aria-expanded="false">
                            Country of Study
                        </div>
                        <div class="collapse " id="country-study-collapse">
                            <div class="form-group p-3">
                                <select class="country-study-select" name="country_id" id="country_id"
                                    data-style="btn-primary btn-outline">
                                    <option value="">Country of Study</option>
                                    <option value="2">Canada</option>
                                    <option value="4">United States</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- provice states -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#province-state-collapse" aria-expanded="false">
                            Province / States
                        </div>
                        <div class="collapse" id="province-state-collapse">
                            <div class="form-group p-3">

                                <select class="province-state-select" name="state_id" id="stateData"
                                    data-style="btn-primary btn-outline">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- english exam type -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#english-exam-type" aria-expanded="false">
                            English Exam Type
                        </div>
                        <div class="collapse " id="english-exam-type">
                            <div class="form-group p-3">
                                <select class="english-exam-type" name="english_exam_type_id"
                                    id="english_exam_type_id" data-style="btn-primary btn-outline">
                                    <option value="">I have not taken any english exam type</option>
                                    <option value="15">I donot have</option>
                                    <option value="2">I graduated from a country where English is the official
                                        language</option>
                                    <option value="3">TOEFL</option>
                                    <option value="4">IELTS</option>
                                    <option value="5">Pearson</option>
                                    <option value="6">Duolingo</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3 english_exam" style="display: none;">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#english-exam-type-score" aria-expanded="false">
                            English Exam Type Score
                        </div>
                        <div class="collapse " id="english-exam-type-score">
                            <div class="form-group p-3">
                                <input type="float" name="english_exam_total_score" id="english_exam_total_score"
                                    value="" placeholder="English Exam Type Score" class="form-control">
                            </div>
                        </div>
                    </li>
                    <!-- score -->













                    <!-- gpa scale -->

                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#gpa-scale" aria-expanded="false">
                            GPA Scale
                        </div>
                        <div class="collapse " id="gpa-scale">
                            <div class="form-group p-3">
                                <select class="select2-container form-control select2" name="gpa_id" id="gpa_id"
                                    data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="1">1-100</option>
                                    <option value="2">0-4</option>
                                    <option value="3">F to A +</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- gpa score -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#gpa-score" aria-expanded="false">
                            GPA Score
                        </div>
                        <div class="collapse " id="gpa-score">
                            <div class="form-group p-3">
                                <select class="select2-container form-control select2" name="gpa_score"
                                    id="gpa_score" data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- gpa calculation -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#gpa-calculation" aria-expanded="false">
                            GPA Calculation
                        </div>
                        <div class="collapse " id="gpa-calculation">
                            <div class="form-group p-3">
                                <input type="text" name="gpa_total" id="gpa_total" value=""
                                    placeholder="GPA Calculation" class="form-control" readonly="">
                            </div>
                        </div>
                    </li>
                    <!-- knowledge skill exam-->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#knowledge-skill" aria-expanded="false">
                            Knowledge and Skill Exam
                        </div>
                        <div class="collapse " id="knowledge-skill">
                            <div class="form-group p-3">
                                <select class="kse" name="knowledge_skill_exam_id" id="knowledge_skill_exam_id"
                                    data-style="btn-primary btn-outline">
                                    <option value="1001">I have not taken any knowledge and skill exam</option>
                                    <option value="16">I donot have</option>
                                    <option value="17">SAT</option>
                                    <option value="12">GRE</option>
                                    <option value="13">GMAT</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- knowledge skill exam-->
                    <li class="mb-3 knowledge_skill" style="display: none">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#knowledge-score" aria-expanded="false">
                            Knowledge &amp; Skill Exam Score
                        </div>
                        <div class="collapse " id="knowledge-score">
                            <div class="form-group p-3">
                                <input type="float" name="knowledge_skill_exam_total_score" value=""
                                    placeholder="Score" class="form-control">
                            </div>
                        </div>
                    </li>

                </ul>

                <!-- search by location -->
                <!-- search by program  -->
                <h3 class=" btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#program-collapse"
                    aria-expanded="false">Program</h3>
                <ul class="collapsed list-unstyled p-3 bg-white rounded collapse" id="program-collapse">

                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#institute-type" aria-expanded="false">
                            Institute Type
                        </div>
                        <div class="collapse " id="institute-type">
                            <div class="form-group p-3">
                                <select class="form-control" name="type_id" id="stateTypeData"
                                    data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="3">College</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- program level type -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#program-levels" aria-expanded="false">
                            Program Levels
                        </div>
                        <div class="collapse " id="program-levels">
                            <div class="form-group p-3">
                                <select class="select2-container form-control select2" name="program_level_id"
                                    id="program_level_id" data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="10">High School</option>
                                    <option value="5">Diploma</option>
                                    <option value="2">Bachelor's Degree</option>
                                    <option value="3">Master's Degree</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- program level type -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#intakes" aria-expanded="false">
                            Intakes
                        </div>
                        <div class="collapse " id="intakes">
                            <div class="form-group p-3">
                                <select class="select2-container form-control select2" name="intakes_id"
                                    data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="1">Fall( Aug/Sept)</option>
                                    <option value="3">Spring (Jan/Feb)</option>
                                    <option value="2">Summer (May/June)</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- program level type -->
                    <li class="mb-3 not_display_in_high_school">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#areaofstudy" aria-expanded="false">
                            Area of Study
                        </div>
                        <div class="collapse " id="areaofstudy">
                            <div class="form-group p-3">
                                <select class="area-of-study" name="post_sec_discipline_id"
                                    id="post_sec_discipline_id" data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="1">I do not know</option>
                                    <option value="21">Aeronautics</option>
                                    <option value="4">Architecture</option>
                                    <option value="25">Agriculture</option>
                                    <option value="6">Business and Management</option>
                                    <option value="8">Education and Sports</option>
                                    <option value="9">Engineering, Science and Technology</option>
                                    <option value="10">Forestry</option>
                                    <option value="11">Health Science, Public Health , Medicine and Pharmacy
                                    </option>
                                    <option value="12">Hospitality and Tourism Management</option>
                                    <option value="5">Liberal Arts ,Social Sciences and Communication</option>
                                    <option value="17">Law, Public Safety and International Affairs</option>
                                    <option value="15">Public Affairs and International Policy</option>
                                    <option value="20">Veterinary Science</option>
                                    <option value="26">Pathway Programs</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- program level type -->
                    <li class="mb-3 not_display_in_high_school">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#select-major" aria-expanded="false">
                            Select Major
                        </div>
                        <div class="collapse " id="select-major">
                            <div class="form-group p-3">
                                <select class="major-select" name="post_sec_discipline_sub_cat_id"
                                    id="post_sec_discipline_sub_cat_id" data-style="btn-primary btn-outline">
                                    <option value="">-Select One-</option>
                                    <option value="1231">Accelerated BSN</option>
                                    <option value="320">Accounting</option>
                                    <option value="321">Accounting &amp; Information Systems</option>
                                    <option value="464">Acoustical Engineering</option>
                                    <option value="1448">Acting</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <!-- range slider -->
                    <li class="mb-3">
                        <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#tution-range-collapse" aria-expanded="false">
                            Tution Fees
                        </div>
                        <div class="collapse " id="tution-range-collapse">
                            <div class="form-group p-3">
                                <input type="text" name="min_tution_fees" id="min_tution_fees" value=""
                                    placeholder="$ (minimum)" class="form-control w-45 me-1 float-start">
                                <input type="text" name="max_tution_fees" id="max_tution_fees" value=""
                                    placeholder="$ (maximum)" class="form-control w-45 float-end">
                            </div>
                        </div>
                    </li>

                </ul>
                <div class="side-filter-btn text-end">
                    <button type="button" class="btn btn-secondary  rounded-pill pe-3 ps-3 show"
                        data-bs-dismiss="offcanvas">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill">Apply Filter</button>
                </div>
            </form>
        </div>
    </div>
    </nav>
    </div>

    <section class="search-body p-5">


        <div class="ab-search-result mb-5 ">
            @if (count($agent) != 0)
                <div class="row row-cols-sm-2 row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                    @foreach ($agent as $agents)
                        <div class="col">
                            <div class="card border-7 inst-card h-100">
                                <div class="card-logo ">
                                    <a href="#">
                                        @if ($agents->agent_image)
                                            <img src="{{ asset('public/AgentImage/' . $agents->agent_image) }}"
                                                class="card-img-top">
                                        @else
                                            <img src="{{ asset('public/AgentImage/noImage.webp') }}"
                                                class="card-img-top">
                                        @endif
                                    </a>
                                </div>
                                <div class="card-body bg-blue-light ">

                                    <h5 class="card-title ">
                                        {{ $agents->first_name }} {{ $agents->last_name }}
                                    </h5>

                                    <p class="card-text ">
                                    <ul class="list-group ">
                                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                                            Email
                                            <span class="badge bg-primary rounded-pill ">{{ $agents->email }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                                            Contact
                                            <span class="badge bg-primary rounded-pill ">{{ $agents->phone }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                                            Address
                                            <span
                                                class="badge bg-primary rounded-pill ">{{ $agents->agent_address }}</span>
                                        </li>

                                    </ul>
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h1 style="color: green; text-align: center;"> No agent found </h1>

            @endif





        </div>
        <div class="d-flex justify-content-center">
            <p> {!! $agent->links() !!}</p>
        </div>

    </section>

    </section>


    </main>


    @include('layout.footer')
    <script type="text/javascript">
        $("#u_sorting_order").change(function() {

            var sort = ($(this).val());
            window.location.href = "https://studify.au/university/searchs/" + sort;

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#firstbutton").show();
            $("#First").hide();
            $("#secondbutton").hide();
            $("#firstbutton").click(function() {
                $("#First").show();
                $("#secondbutton").show();
                $("#firstbutton").hide();
            });



            $("#secondbutton").click(function() {
                $("#First").hide();
                $("#secondbutton").hide();
                $("#firstbutton").show();
            });

        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var idCountry = this.value;

                $("#state-dd").html('');

                $.ajax({
                    url: "{{ url('agent/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {

                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });

            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('agent/get-cities-by-state') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
