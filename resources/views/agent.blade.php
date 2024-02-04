<!DOCTYPE html>
<html lang="en">
<head>
  <title>Counselor page</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{asset('assets/style.css')}}">
   <link rel="icon" type="{{asset('assets/image/png')}}" sizes="60x60" href="{{asset('assets/images/fav.png')}}">
<link rel="icon" type="{{asset('assets/image/png')}}" sizes="96x96" href="{{asset('assets/images/fav.png')}}">
<link rel="icon" type="{{asset('assets/image/png')}}" sizes="60x60" href="{{asset('assets/images/fav.png')}}">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
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
 
<section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax="" data-speed="0.5">
        
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center my-auto pt-sm-5">

                    <h2 class="mb-lg-5 mb-4 pb-2  display-1 text-light">Your<span class="text-primary font-weight-700"><a href="#"> Success is Our Success</a></span> Recruit Students Globally.</h2>
                    <h6 class="mb-5">Studify is more than a platform. Use our high-end technology, global tie-ups, decades of expertise, extensive student resources, and help as many students as possible fulfil their international education dreams. Agent Dashboard allows our counselors to manage all their students applications and get attractive commissions.</h6>
                    <a href="{{url('agent/register')}}" class="btn btn-primary rounded-pill">Join Us Today!</a>
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                    <img src="{{asset('assets/images/banner-counsellor.png')}}" alt="Layer" height="300">
                </div>
            </div>
        </div>
</section>
<section class=" overflow-hidden pt-5" style="margin-top: 10px; margin-bottom: 15px;">
        <section class="container">
            <h1 class="h2 font-weight-400 text-center">Find & Explore best agents on <span
                        class="font-weight-700">Studify</span></h1>
            <!-- <div class="input-group mb-3 rounded-pill home-subscription-block">
                    <input type="text" class="form-control p-3 main-search-input" placeholder="Your Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Subscribe Now</button>
                </div> -->
            <div class="col-md-12 main-search-input">
                <form method="get" action="{{url('/agent/search')}}" accept-charset="UTF-8" class="" id="">
                <div class="search"><i class="ri-search-line"></i>
                    <input type="text" name="agent_search" value="" class="form-control rounded-pill"
                           placeholder="Search your Agent" id="search-selector">
                    <button class="btn btn-primary rounded-pill" type="submit">Search</button>
                </div>
                </form>
            </div>
            </section>
          </section>
          <div class="container-fluid bg-blue-light border" id="best1">
            <nav class="filter-navbar pt-3">
                <div class="row">
                    <!-- <div class="col-lg-2 col-md-2 col-12">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="toggler-icon"><i class="ri-equalizer-fill"></i> Advanced Search</span>
                        </button>
                    </div> -->

                    <div class="col-lg-12 col-md-12 col-12 hori-form">
                      <div class="col-lg-3 col-md-6 ">
                        <div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" id="firstbutton"> Advanced Search</button>
   <button class="w3-bar-item w3-button" id="secondbutton"> Advanced Search</button>

</div>
                      </div>
                        <form id="First" method="get" action="{{url('/agent/search')}}" accept-charset="UTF-8">
                       @csrf
                        <div class="row" id="#firstbutton">
                           <div class="col-lg-3 col-md-6 " id="coun">
                                <div class="form-group rounded-pill">
                                    <select name="country" id="country" class="intake-select">
                    <option value="">Select Country</option>
                    <!-- @foreach($country as  $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach -->
                    <option value="13">Australia</option>
                    <option value="38">Canada</option>
                    <option value="230">UK</option>
                    <option value="231">USA</option>
                    <option value="101">India</option>
                    <option value="153">Nepal</option>
                    <option value="18">Bangladesh</option>
                    <option value="166">Pakistan</option>
                   
                     </select>  
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" id="coun">
                                <div class="form-group">

                        <select class="intake-select.intakes_id" id="state-dd" name="state" vlaue="">
                           <option value="">-Select States-</option>
                                 </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" id="coun">
                                <div class="form-group">
                                    <select class="program-select" id="q_post_sec_discipline_id" name="post_sec_discipline_id">
                                        <option value="">-Select City-</option>
                                        
                                             

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
                    <div class="offcanvas offcanvas-start overflow-auto bg-blue-light" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="flex-shrink-0 p-3 filter-scroller">
                        <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                            <span class="fs-5 font-weight-700"><i class="ri-equalizer-fill color-blue"></i> Filter Your Search Results</span>
                        </a>
                        <form method="GET" action="https://www.applybridge.com/university/search" accept-charset="UTF-8" class="" id="">
                                <!-- search by eligibility -->
                        <h3 class=" btn-toggle " data-bs-toggle="collapse" data-bs-target="#eligibility-collapse" aria-expanded="true">Eligibility</h3>
                        <ul class=" list-unstyled p-3 bg-white rounded collapse show" id="eligibility-collapse">
                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed font-weight-700" data-bs-toggle="collapse" data-bs-target="#visa-collapse" aria-expanded="false">
                                    Do you have a valid study permit / visa?
                                </div>
                                <div class="collapse " id="visa-collapse">
                                    <div class="form-group rounded-pill p-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="valid_study_permit_visa_id" value="1" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes / No</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#country-collapse" aria-expanded="false">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#ed-level-collapse" aria-expanded="false">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#country-study-collapse" aria-expanded="false">
                                    Country of Study
                                </div>
                                <div class="collapse " id="country-study-collapse">
                                    <div class="form-group p-3">
                                        <select class="country-study-select" name="country_id" id="country_id" data-style="btn-primary btn-outline">
                                            <option value="">Country of Study</option>
                                            <option value="2">Canada</option>
                                            <option value="4">United States</option>
                                         </select>
                                    </div>
                                </div>
                            </li>
                                                                <!-- provice states -->
                                                                            <li class="mb-3">
                                            <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#province-state-collapse" aria-expanded="false">
                                                Province / States
                                            </div>
                                            <div class="collapse" id="province-state-collapse">
                                                <div class="form-group p-3">

                                                    <select class="province-state-select" name="state_id" id="stateData" data-style="btn-primary btn-outline">
                                                        <option value="">Select State</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                                                    <!-- english exam type -->
                                                                    <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#english-exam-type" aria-expanded="false">
                                    English Exam Type
                                </div>
                                <div class="collapse " id="english-exam-type">
                                    <div class="form-group p-3">
                                        <select class="english-exam-type" name="english_exam_type_id" id="english_exam_type_id" data-style="btn-primary btn-outline">
                                            <option value="">I have not taken any english exam type</option>
                                            <option value="15">I donot have</option>
                                            <option value="2">I graduated from a country where English is the official language</option>
                                            <option value="3">TOEFL</option>
                                            <option value="4">IELTS</option>
                                            <option value="5">Pearson</option>
                                            <option value="6">Duolingo</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                                            <li class="mb-3 english_exam" style="display: none;">
                                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#english-exam-type-score" aria-expanded="false">
                                                    English Exam Type Score
                                                </div>
                                                <div class="collapse " id="english-exam-type-score">
                                                    <div class="form-group p-3">
                                                        <input type="float" name="english_exam_total_score" id="english_exam_total_score" value="" placeholder="English Exam Type Score" class="form-control">
                                                    </div>
                                                </div>
                                            </li>
                                                                        <!-- score -->
                            
                                
                                     
                                    
                                
                                
                                    

                                        
                                               
                                    
                                
                            
                            <!-- gpa scale -->

                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gpa-scale" aria-expanded="false">
                                    GPA Scale
                                </div>
                                <div class="collapse " id="gpa-scale">
                                    <div class="form-group p-3">
                                        <select class="select2-container form-control select2" name="gpa_id" id="gpa_id" data-style="btn-primary btn-outline">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gpa-score" aria-expanded="false">
                                    GPA Score
                                </div>
                                <div class="collapse " id="gpa-score">
                                    <div class="form-group p-3">
                                        <select class="select2-container form-control select2" name="gpa_score" id="gpa_score" data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                                                                                                                                                                </select>
                                    </div>
                                </div>
                            </li>
                            <!-- gpa calculation -->
                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gpa-calculation" aria-expanded="false">
                                    GPA Calculation
                                </div>
                                <div class="collapse " id="gpa-calculation">
                                    <div class="form-group p-3">
                                        <input type="text" name="gpa_total" id="gpa_total" value="" placeholder="GPA Calculation" class="form-control" readonly="">
                                    </div>
                                </div>
                            </li>
                            <!-- knowledge skill exam-->
                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#knowledge-skill" aria-expanded="false">
                                    Knowledge and Skill Exam
                                </div>
                                <div class="collapse " id="knowledge-skill">
                                    <div class="form-group p-3">
                                        <select class="kse" name="knowledge_skill_exam_id" id="knowledge_skill_exam_id" data-style="btn-primary btn-outline">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#knowledge-score" aria-expanded="false">
                                    Knowledge &amp; Skill Exam Score
                                </div>
                                <div class="collapse " id="knowledge-score">
                                    <div class="form-group p-3">
                                        <input type="float" name="knowledge_skill_exam_total_score" value="" placeholder="Score" class="form-control">
                                    </div>
                                </div>
                            </li>
                             
                        </ul>

                        <!-- search by location -->
                                                <!-- search by program  -->
                        <h3 class=" btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#program-collapse" aria-expanded="false">Program</h3>
                        <ul class="collapsed list-unstyled p-3 bg-white rounded collapse" id="program-collapse">

                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#institute-type" aria-expanded="false">
                                    Institute Type
                                </div>
                                <div class="collapse " id="institute-type">
                                    <div class="form-group p-3">
                                        <select class="form-control" name="type_id" id="stateTypeData" data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                             <option value="3">College</option>
                                            </select>
                                    </div>
                                </div>
                            </li>
                            <!-- program level type -->
                                <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#program-levels" aria-expanded="false">
                                    Program Levels
                                </div>
                                <div class="collapse " id="program-levels">
                                    <div class="form-group p-3">
                                        <select class="select2-container form-control select2" name="program_level_id" id="program_level_id" data-style="btn-primary btn-outline">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#intakes" aria-expanded="false">
                                    Intakes
                                </div>
                                <div class="collapse " id="intakes">
                                    <div class="form-group p-3">
                            <select class="select2-container form-control select2" name="intakes_id" data-style="btn-primary btn-outline">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#areaofstudy" aria-expanded="false">
                                    Area of Study
                                </div>
                                <div class="collapse " id="areaofstudy">
                                    <div class="form-group p-3">
                                        <select class="area-of-study" name="post_sec_discipline_id" id="post_sec_discipline_id" data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                            <option value="1">I do not know</option>
                                            <option value="21">Aeronautics</option>
                                            <option value="4">Architecture</option>
                                            <option value="25">Agriculture</option>
                                            <option value="6">Business and Management</option>
                                            <option value="8">Education and Sports</option>
                                            <option value="9">Engineering, Science and Technology</option>
                                            <option value="10">Forestry</option>
                                            <option value="11">Health Science, Public Health , Medicine and Pharmacy</option>
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#select-major" aria-expanded="false">
                                    Select Major
                                </div>
                                <div class="collapse " id="select-major">
                                    <div class="form-group p-3">
                                        <select class="major-select" name="post_sec_discipline_sub_cat_id" id="post_sec_discipline_sub_cat_id" data-style="btn-primary btn-outline">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#tution-range-collapse" aria-expanded="false">
                                    Tution Fees
                                </div>
                                <div class="collapse " id="tution-range-collapse">
                                    <div class="form-group p-3">
                                        <input type="text" name="min_tution_fees" id="min_tution_fees" value="" placeholder="$ (minimum)" class="form-control w-45 me-1 float-start">
                                        <input type="text" name="max_tution_fees" id="max_tution_fees" value="" placeholder="$ (maximum)" class="form-control w-45 float-end">
                                    </div>
                                </div>
                            </li>

                                                    </ul>
                        <div class="side-filter-btn text-end">
                            <button type="button" class="btn btn-secondary  rounded-pill pe-3 ps-3 show" data-bs-dismiss="offcanvas">Cancel
                            </button>
                            <button type="submit" class="btn btn-primary rounded-pill">Apply Filter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>





    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <h2 class="display-5 font-weight-700 text-center">Why Studify?</h2>
        <div class="row align-items-center pt-lg-5 pb-lg-0" id="cont">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5" >
                <img src="{{asset('assets/images/students_schools_icon2.webp')}}" alt="" class="img-fluid mb-3">
                
                <p><br>

                    <b>Access Institutions Globally</b><br>
                    100s of educational institutions globally at your fingertip.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 bg-blue-light border-15 p-3 text-center">
                <img src="{{asset('assets/images/support-icon.png')}}" alt="" class="img-fluid mb-3">
                <p><br>

                    <b>Grow with Lower Cost</b><br>
                   Best in class tools to save you time and money and process fast applications.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_schools_icon88.png')}}" alt="" class="img-fluid mb-3">
                <p><br>

                    <b>Assured Payout</b><br>
                    Get faster and higher commission with complete transparency.
                </p>
            </div>
        </div>
    </section>
 <section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">

        <div class="row align-items-center pt-lg-5 pb-lg-0">
            <div class="position-relative  bg-repeat-0 rounded overflow-hidden text-center py-6">
                <h2 class="display-5 font-weight-700">Best-in-Class Counselor Experience</h2>
                <h4 class="h6">Watch how Studify best service helps agents</h4>
        
                <div class="row align-items-center pt-lg-5 pb-lg-0">
                       <video class="video" poster="{{asset('assets/images/Screenshot44.png')}}" controls="aap" id="cent"> 
        <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="vedio/mp4">
                                                            <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="video/ogg">
                                                            <source src="{{asset('assets/images/production ID_4497323.m4v')}}" type="video/mp4">
    </video>
</div>
            </div>
        </div>

         </section>

     <!-- third section -->

 <!-- forth section -->
<section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-white">
        <div class="container">
            <div class="row">
                 <h2 class="h2 mb-2 pb-3 text-center">Your Success is Our Success</h2>
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ">
                    <img src="{{asset('assets/images/consol1.png')}}" alt="About " class="d-block mx-auto my-auto ">

                </div>

                <div class="col-lg-6 col-md-12  my-auto">
                    <h2 class="h2 mb-4 pb-lg-3 text-md-start text-sm-center"><span class="font-weight-400">Commissions</span></h2>
                    <p class="display-6 text-md-start text-sm-center"><b>Get faster and higher commission with complete transparency.
                    </b></p>

                    <p class="display-6 text-md-start text-sm-center">
                        
•   Fast sharing of the commissions as soon as they are paid by the universities 

                    </p>

                    <p class="display-6 text-md-start text-sm-center">
                       
•   Prompt response to your commissions queries
                    </p>
                    <p class="display-6 text-md-start text-sm-center">
                        
•   On-going promotions for bonus payments, application fee waivers and more
                    </p>
                </div>
                

            </div>
        </div>
    </section>

<section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">
        <div class="container">
            <div class="row">
 <h2 class="h2 mb-2 pb-3 text-center">Technological Capabilities</h2>
                <div class="col-lg-6 col-md-12  my-auto">
                    <h2 class="h2 mb-4 pb-lg-3 text-md-start text-sm-center"><span class="font-weight-400">Technology</span></h2>
                    <p class="display-6 text-md-start text-sm-center"><b>Access a tech-driven platform to search courses, scholarships, commissions, submit applications, discounts & waivers, get real time support, earn extra commissions, and do a lot more.</b>
                    </p>

                    <p class="display-6 text-md-start text-sm-center">
                        • An easy to use platform that connects you to the institutions globally

                    </p>

                    <p class="display-6 text-md-start text-sm-center">
                        •   Expand your knowledge and stay ahead of your competitors with guided online courses and certificates.
                    </p>
                    <p class="display-6 text-md-start text-sm-center">
                        •   One application for Apply to multiple universities and programs
                    </p>
                    <p class="display-6 text-md-start text-sm-center">
                        •    Explore 1,000+ courses; filter, shortlist and compare universities, courses and scholarships in no time
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ">
                    <img src="{{asset('assets/images/consol2.png')}}" alt="About " class="d-block mx-auto my-auto ">

                </div>

            </div>
        </div>
    </section>



    <section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ">
                    <img src="{{asset('assets/images/consal3.png')}}" alt="About " class="d-block mx-auto my-auto ">

                </div>

                <div class="col-lg-6 col-md-12  my-auto">
                    <h2 class="h2 mb-4 pb-lg-3 text-md-start text-sm-center"><span class="font-weight-400">Supports</span></h2>
                    <p class="display-6 text-md-start text-sm-center"><b>Studify's recruitment experts are there to support you every step of the way.</b>
                    </p>

                    <p class="display-6 text-md-start text-sm-center">
                       •    Regular online webinars, training, and events to keep you updated on the latest trends.

                    </p>

                    <p class="display-6 text-md-start text-sm-center">
                        •   A comprehensive library of rich product knowledge - visa and application guides, materials, and much more.
                    </p>
                    <p class="display-6 text-md-start text-sm-center">
                        •   Industry leading insights and knowledge that helps you plan, expand, and achieve your goals.
                    </p>
                    <p class="display-6 text-md-start text-sm-center">
                        •   Rich library of sample documents.
                    </p>
                </div>

                

            </div>
        </div>
    </section>
     <section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">
        <div class="container">
            <div class="row">
        <h2 class="h2 mb-2 pb-3 text-center"><span class="font-weight-400">3 easy steps to grow your business</span></h2>
        
        <div class="row align-items-center pt-lg-5 pb-lg-0">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5 bg-white" id="pp">
               <span id="mm"></span>
                
                <p> <b><span style="color: #1271ff">STEP1</b></span><br>

                    <b>Sign up as our Partner Associate</b>
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5 bg-white" id="pp">
               <span id="mm"></span>
                <p><b><span style="color: #1271ff">STEP2</b></span><br>

                    <b>Sign up as our recruitment partner</b>
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5 bg-white" id="pp">
                <span id="mm"></span>
                <p><b><span style="color: #1271ff">STEP3</b></span><br>

                    <b>Increase your revenue</b>
                </p>
            </div>
        </div>
    </div>
</div>
    </section> 
    <section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <div class="container">
            <div class="row">
                <div class="row align-items-center pt-lg-5 pb-lg-0 id=jjj">
                    <div class="col-lg-6">
                         <h5 id="hh">Associate with us to grow your business faster
and reach your goal faster with our smart-tech
</h5>
                    </div>
            
            <div class="col-lg-6">
            <div class="d-flex order-3" id="rri">
                <button class="yy"><a href="{{url('contact')}}">Enquire Now</a></button>
                <button class="yy1"><a href="#"></a>Patner With Us</button>
            
            </div>
        </div>
           
        </div>
        </div>
    </section>
     <section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
         <div class="container">
            <div class="row">
    <h2 class="h2 mb-2 pb-3 text-center"><span class="font-weight-400">TESTIMONIALS</span></h2>
  <div class="col-lg-10 offset-lg-1 pt-5 pb-5  text-drak">
  <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active text-center p-4">
        <blockquote class="blockquote text-center">
          
          
          <p class="mb-0"><i class="fa fa-quote-left">
          </i> <b>Studify’s Institutions Partners.</b>
          </p>
          <footer class="blockquote-footer"><cite title="Source Title"><img class="navbar-brand-static1 " src="{{asset('assets/images/image27.jpeg')}}"
                  width="100"></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
           <i class="fa fa-star" aria-hidden="true"></i>
           <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
             <i class="fa fa-star" aria-hidden="true"></i>
          </p>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> <b>Studify’s Institutions Partners.</b>
          </p>
          <footer class="blockquote-footer"><cite title="Source Title"><img class="navbar-brand-static1 " src="{{asset('assets/images/image26.png')}}"
                 width="100"></cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
           <i class="fa fa-star" aria-hidden="true"></i>
           <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
             <i class="fa fa-star" aria-hidden="true"></i>
          </p>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> <b>Studify’s Institutions Partners.</b>
          </p>
          <footer class="blockquote-footer"><cite title="Source Title"><img class="navbar-brand-static1 " src="{{asset('assets/images/image23.jpeg')}}"
                  width="100"></cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
            <i class="fa fa-star" aria-hidden="true"></i>
             <i class="fa fa-star" aria-hidden="true"></i>
           <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </p>
        </blockquote>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
    </ol>
  </div>
</div>
</div>
</div>
</section>
</main>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
<script type="text/javascript">
$(document).ready(function () {
  $("#firstbutton").show();
  $("#First").hide();
  $("#secondbutton").hide();
    $("#firstbutton").click(function () {
        $("#First").show();
        $("#secondbutton").show();
         $("#firstbutton").hide();
    });

  
  
    $("#secondbutton").click(function () {
        $("#First").hide();
        $("#secondbutton").hide();
         $("#firstbutton").show();
    });
        
});

        $(document).ready(function () {
            $('#country').on('change', function () {
                var idCountry = this.value;
              
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('agent/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                       
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                
                $("#q_post_sec_discipline_id").html('');
                $.ajax({
                    url: "{{url('agent/get-cities-by-state')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                       
                        $('#q_post_sec_discipline_id').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#q_post_sec_discipline_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            
        });
    </script>