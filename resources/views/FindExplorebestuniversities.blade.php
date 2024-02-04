
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find & Explorebest universities page</title>
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

            <!-- search Hero-->
 <section class=" overflow-hidden pt-5" style="margin-top: 100px;">
        <section class="container">
            <h1 class="h2 font-weight-400 text-center">Find & Explore best universities on <span
                        class="font-weight-700">Studify</span></h1>
            <!-- <div class="input-group mb-3 rounded-pill home-subscription-block">
                    <input type="text" class="form-control p-3 main-search-input" placeholder="Your Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Subscribe Now</button>
                </div> -->
            <div class="col-md-12 main-search-input">
                <form method="get" action="{{url('/university/search')}}" accept-charset="UTF-8" class="" id="">
                <div class="search"><i class="ri-search-line"></i>
                    <input type="text" name="university_name" value="{{$search}}" class="form-control rounded-pill"
                           placeholder="Search your dream university" id="search-selector">
                    <button class="btn btn-primary rounded-pill" type="submit">Search</button>
                </div>
                </form>
            </div>
            <div class="mt-3">

            </div>
                        <!-- <div class="search-tag-section mt-3"> -->
                <!-- <h5><span class="font-weight-700"> Search by tags (optional)</span> -
                    <small>Click on the tags below to find relevant schools</small>

                </h5> -->
                <!-- <div class="mt-3 ab-tag-cloud mb-3">
                  
                    @foreach($course as $courses)
                                        <a class="btn btn-secondary btn-sm mb-3 text-center rounded-pill me-3" role="button" aria-disabled="true" href="{{url('university/search?key='.$courses->c_name)}}">{{$courses->c_name}}</a>
                   @endforeach
                  
                                    </div> -->
            <!-- </div> -->
                        </section>

        <!-- first-section-->
        <div class="container-fluid bg-blue-light border">
            <nav class="filter-navbar pt-3">
                <div class="row">
                    <!-- <div class="col-lg-2 col-md-2 col-12">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="toggler-icon"><i class="ri-equalizer-fill"></i> Advanced Search</span>
                        </button>
                    </div> -->

                    <div class="col-lg-12 col-md-12 col-12 hori-form">
                        <form method="get" action="{{url('/university/search')}}" accept-charset="UTF-8" >
                        <div class="row">
                           <div class="col-lg-3 col-md-6 ">
                                <div class="form-group rounded-pill">
                                    <select class="intake-select" id="q_country_id" name="country_id">
                                        <option value="0">-Country-</option>
                                        <?php if($country == 'Australia'){ ?> 
                                         <option value="Australia" selected>Australia</option>
                                     <?php } else{ ?>
                                     <option value="Australia" >Australia</option>
                                      <?php } ?>  

                                         <?php if($country == 'Canada'){ ?> 
                                         <option value="Canada" selected>Canada</option>
                                     <?php } else{ ?>
                                     <option value="Canada" >Canada</option>
                                      <?php } ?>  
                                      <?php if($country == 'United States'){ ?> 
                                        <option value="United States" selected >United States</option>
                                        <?php } else{ ?>
                                         <option value="United States" >United States</option>
                                            <?php } ?> 
                                      <?php if($country == 'United Kingdom'){ ?> 
                                        <option value="United Kingdom" selected >United Kingdom</option>
                                        <?php } else{ ?>
                                         <option value="United Kingdom" >United Kingdom</option>
                                            <?php } ?> 
                                            
                                          

                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">

                                    <select class="intake-select" id="q_intakes_id" name="intakes_id">
                                        <option value="0">-Select Intakes-</option>
                                        <?php if($intake == 'Fall(Aug/Sept)'){ ?>
                                        <option value="Fall(Aug/Sept)" selected>Fall( Aug/Sept)</option>
                                        <?php } else{ ?>
                                            <option value="Fall(Aug/Sept)">Fall( Aug/Sept)</option>
                                        <?php } ?>
                                         <?php if($intake == 'Spring(Jan/Feb)'){ ?>
                                        <option value="Spring(Jan/Feb)" selected>Spring(Jan/Feb)</option>
                                       <?php } else{ ?>
                                        <option value="Spring(Jan/Feb)">Spring(Jan/Feb)</option>
                                        <?php } ?>
                                          <?php if($intake == 'Summer(May/June)'){ ?>
                                        <option value="Summer(May/June)" selected>Summer(May/June)</option>
                                        <?php } else{ ?>
                                           <option value="Summer(May/June)">Summer(May/June)</option>
                                             <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select class="program-select" id="q_post_sec_discipline_id"
                                            name="post_sec_discipline_id">
                                        <option value="0">-Discipline-</option>
                                        <option value="1" >I do not know</option>
                                        <?php if($aof == 'Accounting'){ ?>
                                        <option value="Accounting" selected>Accounting</option>
                                        <?php } else{ ?>
                                       <option value="Accounting" >Accounting</option>
                                        <?php } ?>

                                        <?php if($aof == 'Banking&Finance'){ ?>
                                        <option value="Banking&Finance" selected >Banking & Finance</option>
                                        <?php } else{ ?>
                                            <option value="Banking&Finance" >Banking & Finance</option>
                                        <?php } ?>


                                        <?php if($aof == 'Business&Management'){ ?>
                                        <option value="Business&Management" selected>Business & Management</option>
                                        <?php } else{ ?>
                                      <option value="Business&Management" >Business & Management</option>
                                             <?php } ?>

                                        <?php if($aof == 'Engineering&Technology'){ ?>
                                        <option value="Engineering&Technology" selected>Engineering & Technology</option>
                                        <?php } else{ ?>
                                       <option value="Engineering&Technology" >Engineering & Technology</option>
                                             <?php } ?>

                                        <?php if($aof == 'Healthcare'){ ?>
                                        <option value="Healthcare" selected>Healthcare</option>
                                        <?php } else{ ?>
                                          <option value="Healthcare" >Healthcare</option>
                                             <?php } ?>

                                        <?php if($aof == 'Engineering, Science and Technology'){ ?>
                                        <option value="Law" selected >Law</option>
                                        <?php } else{ ?>
                                       <option value="Law" >Law</option>
                                        <?php } ?>

                                       


                                      <!--  -->

                                      </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <select class="major-select" id="q_post_sec_discipline_sub_cat_id"
                                            name="level_of_study">
                                        <option value="0">-Level of Study-</option>
                                        @if($levelofstudy == 'English')
                                        <option value="English" selected >English</option>
                                        @else
                                        <option value="English">English</option>
                                        @endif
                                        @if($levelofstudy == 'Certificates')
                                        <option value="Certificates" selected>Certificates</option>
                                        @else
                                         <option value="Certificates">Certificates</option>
                                        @endif
                                        @if($levelofstudy == 'Diploma')
                                        <option value="Diploma" selected>Diploma</option>
                                        @else
                                        <option value="Diploma" >Diploma</option>
                                        @endif
                                        @if($levelofstudy == 'Bachelor')
                                        <option value="Bachelor" selected>Bachelor’s Degree</option>
                                        @else
                                        <option value="Bachelor" >Bachelor’s Degree</option>
                                        @endif
                                        @if($levelofstudy == 'Master')
                                        <option value="Master" selected >Master’s Degree</option>
                                        @else
                                        <option value="Master">Master’s Degree</option>
                                        @endif
                                        @if($levelofstudy == 'Phd')
                                        <option value="Phd" selected>Doctoral/PhD</option>
                                        @else
                                        <option value="Phd" >Doctoral/PhD</option>
                                        @endif
                                     </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6">
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
                        <a href="#"
                           class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                            <span class="fs-5 font-weight-700"><i class="ri-equalizer-fill color-blue"></i> Filter Your Search Results</span>
                        </a>
                        <form method="GET" action="https://www.applybridge.com/university/search" accept-charset="UTF-8" class="" id="">
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
                                            <input class="form-check-input" type="checkbox" name="valid_study_permit_visa_id" value="1" role="switch" id="flexSwitchCheckDefault" >
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes / No</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#country-collapse" aria-expanded="false">
                                    Education Country
                                </div>
                                <div class="collapse p-3 " id="country-collapse">
                                    <select class="form-group countries-select select2" name="education_country_id">
                                        <option value="">Select Country Your are from</option>
                                        <option value="1" >Afghanistan</option>
                                        <option value="2" >Albania</option>
                                        <option value="3" >Algeria</option>
                                        <option value="4" >American Samoa</option>
                                        <option value="5" >Andorra</option>
                                        <option value="6" >Angola</option>
                                        <option value="7" >Anguilla</option>
                                        <option value="8" >Antarctica</option>
                                      </select>
                                </div>
                            </li>
                                                                                    <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#ed-level-collapse"
                                     aria-expanded="false">
                                    Education Level
                                </div>
                                <div class="collapse " id="ed-level-collapse">
                                    <div class="form-group p-3">

                                        <select class="ed-level-select" name="education_level_id">
                                            <option value="">Select Your Current Education Level</option>
                                            <option value="7" >High School</option>
                                            <option value="4" >Diploma</option>
                                            <option value="11" >Associate&#039;s Degree</option>
                                            <option value="3" >Bachelor&#039;s Degree</option>
                                            <option value="5" >Master&#039;s Degree</option>
                                            <option value="6" >Doctoral Degree</option>
                                           </select>
                                    </div>
                                </div>
                            </li>
                                                            <!-- education level -->
                                                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#country-study-collapse"
                                     aria-expanded="false">
                                    Country of Study
                                </div>
                                <div class="collapse " id="country-study-collapse">
                                    <div class="form-group p-3">
                                        <select class="country-study-select" name="country_id" id="country_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="">Country of Study</option>
                                            <option value="2" >Canada</option>
                                            <option value="4" >United States</option>
                                         </select>
                                    </div>
                                </div>
                            </li>
                                                                <!-- provice states -->
                                                                            <li class="mb-3">
                                            <div class="btn btn-toggle align-items-center rounded collapsed"
                                                 data-bs-toggle="collapse" data-bs-target="#province-state-collapse"
                                                 aria-expanded="false">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#english-exam-type"
                                     aria-expanded="false">
                                    English Exam Type
                                </div>
                                <div class="collapse " id="english-exam-type">
                                    <div class="form-group p-3">
                                        <select class="english-exam-type" name="english_exam_type_id" id="english_exam_type_id" data-style="btn-primary btn-outline">
                                            <option value="">I have not taken any english exam type</option>
                                            <option value="15" >I donot have</option>
                                            <option value="2" >I graduated from a country where English is the official language</option>
                                            <option value="3" >TOEFL</option>
                                            <option value="4" >IELTS</option>
                                            <option value="5" >Pearson</option>
                                            <option value="6" >Duolingo</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                                            <li class="mb-3 english_exam" style="display: none;">
                                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                                     data-bs-toggle="collapse" data-bs-target="#english-exam-type-score" aria-expanded="false">
                                                    English Exam Type Score
                                                </div>
                                                <div class="collapse " id="english-exam-type-score">
                                                    <div class="form-group p-3">
                                                        <input type="float" name="english_exam_total_score" id="english_exam_total_score" value=""
                                                               placeholder="English Exam Type Score" class="form-control">
                                                    </div>
                                                </div>
                                            </li>
                                                                        <!-- score -->
                            
                                
                                     
                                    
                                
                                
                                    

                                        
                                               
                                    
                                
                            
                            <!-- gpa scale -->

                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#gpa-scale" aria-expanded="false">
                                    GPA Scale
                                </div>
                                <div class="collapse " id="gpa-scale">
                                    <div class="form-group p-3">
                                        <select class="select2-container form-control select2" name="gpa_id" id="gpa_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                            <option value="1" >1-100</option>
                                            <option value="2" >0-4</option>
                                            <option value="3" >F to A +</option>
                                         </select>
                                    </div>
                                </div>
                            </li>
                            <!-- gpa score -->
                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#gpa-score" aria-expanded="false">
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
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#gpa-calculation" aria-expanded="false">
                                    GPA Calculation
                                </div>
                                <div class="collapse " id="gpa-calculation">
                                    <div class="form-group p-3">
                                        <input type="text" name="gpa_total" id="gpa_total" value=""
                                               placeholder="GPA Calculation" class="form-control" readonly>
                                    </div>
                                </div>
                            </li>
                            <!-- knowledge skill exam-->
                                                        <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#knowledge-skill" aria-expanded="false">
                                    Knowledge and Skill Exam
                                </div>
                                <div class="collapse " id="knowledge-skill">
                                    <div class="form-group p-3">
                                        <select class="kse" name="knowledge_skill_exam_id" id="knowledge_skill_exam_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="1001">I have not taken any knowledge and skill exam</option>
                                            <option value="16" >I donot have</option>
                                            <option value="17" >SAT</option>
                                            <option value="12" >GRE</option>
                                            <option value="13" >GMAT</option>
                                            </select>
                                    </div>
                                </div>
                            </li>
                            <!-- knowledge skill exam-->
                            <li class="mb-3 knowledge_skill" style="display: none">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#knowledge-score" aria-expanded="false">
                                    Knowledge & Skill Exam Score
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
                        <h3 class=" btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#program-collapse"
                            aria-expanded="false">Program</h3>
                        <ul class="collapsed list-unstyled p-3 bg-white rounded collapse" id="program-collapse">

                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#institute-type" aria-expanded="false">
                                    Institute Type
                                </div>
                                <div class="collapse " id="institute-type">
                                    <div class="form-group p-3">
                                        <select class="form-control" name="type_id" id="stateTypeData"
                                                data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                             <option value="3" >College</option>
                                            </select>
                                    </div>
                                </div>
                            </li>
                            <!-- program level type -->
                                <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#program-levels" aria-expanded="false">
                                    Program Levels
                                </div>
                                <div class="collapse " id="program-levels">
                                    <div class="form-group p-3">
                                        <select class="select2-container form-control select2" name="program_level_id"
                                                id="program_level_id" data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                            <option value="10" >High School</option>
                                            <option value="5" >Diploma</option>
                                            <option value="2" >Bachelor&#039;s Degree</option>
                                            <option value="3" >Master&#039;s Degree</option>
                                    </select>
                                    </div>
                                </div>
                            </li>
                                                            <!-- program level type -->
                                                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#intakes" aria-expanded="false">
                                    Intakes
                                </div>
                                <div class="collapse " id="intakes">
                                    <div class="form-group p-3">
                            <select class="select2-container form-control select2" name="intakes_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                             <option value="1" >Fall( Aug/Sept)</option>
                            <option value="3" >Spring (Jan/Feb)</option>
                            <option value="2" >Summer (May/June)</option>
                        </select>
                                    </div>
                                </div>
                            </li>
                                                                <!-- program level type -->
                                                                <li class="mb-3 not_display_in_high_school">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#areaofstudy" aria-expanded="false">
                                    Area of Study
                                </div>
                                <div class="collapse " id="areaofstudy">
                                    <div class="form-group p-3">
                                        <select class="area-of-study" name="post_sec_discipline_id" id="post_sec_discipline_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                            <option value="1" >I do not know</option>
                                            <option value="21" >Aeronautics</option>
                                            <option value="4" >Architecture</option>
                                            <option value="25" >Agriculture</option>
                                            <option value="6" >Business and Management</option>
                                            <option value="8" >Education and Sports</option>
                                            <option value="9" >Engineering, Science and Technology</option>
                                            <option value="10" >Forestry</option>
                                            <option value="11" >Health Science, Public Health , Medicine and Pharmacy</option>
                                            <option value="12" >Hospitality and Tourism Management</option>
                                            <option value="5" >Liberal Arts ,Social Sciences and Communication</option>
                                            <option value="17" >Law, Public Safety and International Affairs</option>
                                            <option value="15" >Public Affairs and International Policy</option>
                                            <option value="20" >Veterinary Science</option>
                                            <option value="26" >Pathway Programs</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                                                        <!-- program level type -->
                                                        <li class="mb-3 not_display_in_high_school">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#select-major" aria-expanded="false">
                                    Select Major
                                </div>
                                <div class="collapse " id="select-major">
                                    <div class="form-group p-3">
                                        <select class="major-select" name="post_sec_discipline_sub_cat_id"
                                                id="post_sec_discipline_sub_cat_id"
                                                data-style="btn-primary btn-outline">
                                            <option value="">-Select One-</option>
                                            <option value="1231" >Accelerated BSN</option>
                                            <option value="320" >Accounting</option>
                                            <option value="321" >Accounting &amp; Information Systems</option>
                                            <option value="464" >Acoustical Engineering</option>
                                            <option value="1448" >Acting</option>
                                           </select>
                                    </div>
                                </div>
                            </li>
                                                         <!-- range slider -->
                            <li class="mb-3">
                                <div class="btn btn-toggle align-items-center rounded collapsed"
                                     data-bs-toggle="collapse" data-bs-target="#tution-range-collapse"
                                     aria-expanded="false">
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
            <div class="d-flex search-info mb-5">
                <div class="search-number">

                </div>
                <div class="name-filter-button">
                        <span class="d-inline-block align-middle pb-3 font-weight-700"><i class="ri-sort-asc"></i>
                             Sort By</span>
                    <div class="d-inline-block form-group rounded-pill">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>

                        <select class="form-control" name="sorting" id="u_sorting_order" >
                            <option value="">Select Sorting</option>
                            <?php if($sort =='asc') { ?> 
                         <option value="asc" selected>Institute Name, A to Z</option>
                            <?php } else{ ?> <option value="asc">Institute Name, A to Z</option> <?php } ?> 
                             <?php if($sort =='desc') { ?>
                            <option value="desc" selected>Institute Name, Z to A</option>
                             <?php } else{ ?>
                                <option value="desc">Institute Name, Z to A</option>
                                <?php } ?> 
                        </select>

                    </div>
                </div>
            </div>
            
            <div class="ab-search-result mb-5 ">
                @if(count($allinstitution) > 0)
                <div class="row row-cols-sm-2 row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
         
           @foreach($allinstitution as $institution) 
                    <div class="col">
                        <div class="card border-7 inst-card h-100">
                            <div class="card-logo ">
                                <a href="#">
<img src="{{asset('public/InstitutionImage/'.$institution->univ_img)}} " class="card-img-top">
                                                         </a>
                            </div>
                            <div class="card-body bg-blue-light ">
                                
                                <h5 class="card-title ">
                                    

                                    {{$institution->universirty_name}}
                                </h5>
                                    <span class="d-block uni-location "><i class="ri-map-pin-fill color-red "></i>
                                       {{$institution->location}}</span>
                                <p class="card-text ">
                                <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        University Type
                                        <span class="badge bg-primary rounded-pill ">{{$institution->univ_type}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        Founded
                                        <span class="badge bg-primary rounded-pill ">{{$institution->founded}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        International Student
                                        <span class="badge bg-primary rounded-pill ">{{$institution->international_student}}+</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                                        Type
                                        <span class="badge bg-primary rounded-pill ">{{$institution->type}}</span>
                                    </li>
                                </ul>
                                </p>
                                <a class="ab-button " href="{{url('universitiesdetails/'.$institution->id)}}" role="button "><i
                                            class="ri-arrow-right-line "></i>
                                    Learn More</a>
                            </div>
                        </div>
                    </div>

                       @endforeach 
                                                                                                                                                                                                       
       </div>
       @else
        <div class="row row-cols-lg-12">
            <h2 style="text-align: center;">No university found</h2> </div>
                    @endif

 <div class="d-flex justify-content-center">
    
</div>
        
            </div>

        
        </section>
    </section>

</main>



@include('layout.footer')

<!-- / Main content: .page-wrapper -->
<!-- Footer -->


<!-- Start of HubSpot code snippet -->

 <script type="text/javascript">
        $("#u_sorting_order").change(function(){
          
         var sort = ($(this).val());
             window.location.href = "https://studify.au/university/searchs/"+sort;
            
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">

</script>

</body>
</html>   