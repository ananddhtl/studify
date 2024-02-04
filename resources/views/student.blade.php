<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student page</title>
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
<!-- Main content-->
<!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
<main class="page-wrapper position-relative">

<!-- Navbar -->
<!-- Remove .navbar-sticky class to detach .navbar from page scroll -->
@include('layout.header')

     <section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax
             data-speed="0.5">
        <div class="jarallax-img"></div>
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center">
                    <h1 class=" mt-lg-5 pb-2  display-1 text-light">They <span class="text-primary font-weight-700">Easiest Way</span>

                        Study Abroad.</h1>
                    <h6 class="mb-5">Discover right programs and providers, get matched to the best options, and easily submit your applications. From research and admission to visa and arrival at your dream institution, we guide you at every step of the way!</h6>
                    <a href="{{url('university/search')}}" class="btn btn-primary rounded-pill">Start Your Search!</a>
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                    <video class="video" poster="{{asset('assets/images/Screenshot44.png')}}" controls="aap" id="rightvideo"> 
        <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="vedio/mp4">
                                                            <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="video/ogg">
                                                            <source src="{{asset('assets/images/production ID_4497323.m4v')}}" type="video/mp4">
    </video>
                </div>
            </div>
        </div>
    </section>

   <!-- second section-->
     <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <h2 class="h2 mb-2 pb-3 text-center"><span class="font-weight-400">Studify is the One Stop Shop Solutions To Study Abroad </span></h2>
        <div class="row align-items-center pt-lg-5 pb-lg-0">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/Application_Documents.svg')}}" alt="" class="img-fluid mb-3">
                
                <p>FAST<br>

                    <b>Save Time</b><br>
                    Find matching programs and top-ranking institutions in seconds.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 bg-blue-light border-15 p-3 text-center">
                <img src="{{asset('assets/images/Acceptance_Letter1.svg')}}" alt="" class="img-fluid mb-3">
                <p>BEST VALUE<br>

                    <b>Save Money</b><br>
                   Students spend half the time, and money to get their offer letter.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/Application_Approved.webp')}}" alt="" class="img-fluid mb-3" id="99">
                <p>CONVENIENCE<br>

                    <b>Save Deals</b><br>
                    With Studify, discover exclusive deals on tests, flights, advice, and more.
                </p>
            </div>
        </div>
    </section>
     <!-- third section -->
    <section class="container-fluid  mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">
        <div class="container  hiw">

            <h2 class="h2 mb-2 pb-3 text-center"><span class="font-weight-4

                00">Why </span> Choose <span
                        class="font-weight-400">Studify? </span></h2>
                        <div class="row align-items-center pt-lg-5 pb-lg-0">
                       <video class="video" poster="{{asset('assets/images/Screenshot44.png')}}" controls="aap" id="cent"> 
        <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="vedio/mp4">
                                                            <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="video/ogg">
                                                            <source src="{{asset('assets/images/production ID_4497323.m4v')}}" type="video/mp4">
    </video>
</div>
                        <div class="row align-items-center pt-lg-5 pb-lg-0">

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_simple_application_icon2.webp')}}" alt="" class="img-fluid mb-3">
                
                <p><b>Fast Applications</b><br>

                    Create a profile in minutes, apply to multiple institutions and programs in seconds.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 bg-blue-light border-15 p-3 text-center">
                <img src="{{asset('assets/images/students_admission_counselling.webp')}}" alt="" class="img-fluid mb-3">
                <p><b>Admission Counselling</b><br>

                    Get expert advice on institutions, program selection, visa, and travel.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_schools_icon2.webp')}}" alt="" class="img-fluid mb-3" >
                <p><b>Accommodation Guidance</b><br>

                    Choose the right accommodation that suits you the best.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_financial_guidance_icon2.webp')}}" alt="" class="img-fluid mb-3" >
               <p><b>Financial Guidance</b><br>

                    Get exclusive scholarships and explore the financial support options.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_visa_assistance_icon2.webp')}}" alt="" class="img-fluid mb-3">
                <p><b>Visa Assistance</b><br>

                    Studify Simplifies the application and visa process.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-5">
                <img src="{{asset('assets/images/students_continuous_support.webp')}}" alt="" class="img-fluid mb-3" >
                <p><b>Continuous Support</b><br>

                    Get 1-on-1 support from Studify's certified experts.
                </p>
            </div>
        </div>

            
            <!--first section-->
            
        </div>
    </section>
    


    <section class="container-fluid mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 course-list-block bg-white">
        <div class="container student-faq">
            <h2 class="h2 mb-2 pb-3 text-center"> Student Services FAQ</h2>
            <ul class="m-d expand-list">
  <li data-md-content="200">
    <label name="tab" for="tab1" tabindex="-1" class="tab_lab" role="tab">What is the cost of studying abroad?</label>
    <input type="checkbox" checked class="tab" id="tab1" tabindex="0" />
    <span class="open-close-icon">
      <i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i>
    </span>
    <div class="content">
            The cost of studying abroad depends upon the country, university and course you choose. Every country has different fees structure and that totally depends upon you what you want to choose.
        </div>
    </li>
    <li data-md-content="300">
      <label name="tab" for="tab2" tabindex="-1" class="tab_lab" role="tab">What are the money saving options while studying abroad?</label>
      <input type="checkbox" class="tab" id="tab2" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        You can save a good amount of money while studying abroad. That totally depends on you that which lifestyle you choose and what are your expenses. If you make balance between your earning and expense saving a good amount is not a big deal.
        </div>
    </li>
    <li data-md-content="600">
      <label name="tab" for="tab3" tabindex="-1" class="tab_lab" role="tab">                                   Am I eligible for scholarship?
</label>
      <input type="checkbox" class="tab" id="tab3" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        There are many scholarship programs in different collages. Globally approximately millions dollar worth of scholarship is awarded. It depends upon the country and the collage you choose to study.
      </div>
    </li>
     <li data-md-content="600">
      <label name="tab" for="tab4" tabindex="-1" class="tab_lab" role="tab">                                 What is the duration of courses in abroad?
</label>
      <input type="checkbox" class="tab" id="tab4" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        The duration of courses depends upon the type of program you like to choose if it is a undergraduate program it may be of three to four years. Post-graduation program is of 1.5 to 2.5 years and PHD programs are of 3.5 years.
      </div>
    </li>
</ul>

     </div>   

</section>

    <!-- six section -->
    
    <!-- seven countries -->
    <section class="container mt-md-4 py-lg-6 py-5">
        <div class="row align-items-end mb-5 pb-md-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 class="h3 color-blue mb-0  text-center">Feautured Study Destinations</h3>
            </div>
        </div>
        <!-- countries -->
        <div class="row mt-5 mb-5">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <article class="mb-5 pt-2 pb-sm-3 pb-2">
                    
                    <a class="portfolio-card-slide" href="{{url('/university/search/country/Australia')}}">
                        <div class="portfolio-card-img">
                            <img src="{{asset('assets/images/photo-1624138784614-87fd1b6528f8.webp')}}"
                                 alt="Card image">
                        </div>
                        <div class="portfolio-card-body">
                            <h3 class="portfolio-card-title">Australia</h3>

                            <div class="btn btn-outline-primary rounded-pill">Search Australia</div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <article class="mb-5 pt-2 pb-sm-3 pb-2">

                    <a class="portfolio-card-slide" href="{{url('/university/search/country/Canada')}}">
                        <div class="portfolio-card-img">
                            <img src="{{asset('assets/images/photo-1588733103629-b77afe0425ce.webp')}}"
                                 alt="Card image">
                        </div>
                        <div class="portfolio-card-body">
                            <h3 class="portfolio-card-title">Canada</h3>

                            <div class="btn btn-outline-primary rounded-pill">Search Canada</div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <article class="mb-5 pt-2 pb-sm-3 pb-2">

                    <a class="portfolio-card-slide" href="{{url('/university/search/country/United Kingdom')}}">
                        <div class="portfolio-card-img">
                            <img src="{{asset('assets/images/photo-1454793147212-9e7e57e89a4f.webp')}}"
                                 alt="Card image">
                        </div>
                        <div class="portfolio-card-body">
                            <h3 class="portfolio-card-title">United Kingdom</h3>

                            <div class="btn btn-outline-primary rounded-pill">Search UK</div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <article class="mb-5 pt-2 pb-sm-3 pb-2">
                    <a class="portfolio-card-slide" href="{{url('/university/search/country/United States')}}">
                        <div class="portfolio-card-img">
                            <img src="{{asset('assets/images/photo-1545671953-0e564e4838a5.webp')}}"
                                 alt="Card image">
                        </div>
                        <div class="portfolio-card-body">
                            <h3 class="portfolio-card-title">United States</h3>

                            <div class="btn btn-outline-primary rounded-pill">Search USA</div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </section>
    
</main>

@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main theme script-->
<script>
  $(document).ready(function() {
    $("#hide").hide();
  $("#shows").click(function () {
    
    $("#shows").hide();
    $("#hide").show();
  })
})
 $("#hide").click(function () {
   $("#shows").show();
    $("#hide").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide1").hide();
  $("#shows1").click(function () {
    
    $("#shows1").hide();
    $("#hide1").show();
  })
})
 $("#hide1").click(function () {
   $("#shows1").show();
    $("#hide1").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide2").hide();
  $("#shows2").click(function () {
    
    $("#shows2").hide();
    $("#hide2").show();
  })
})
 $("#hide2").click(function () {
   $("#shows2").show();
    $("#hide2").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide3").hide();
  $("#shows3").click(function () {
    
    $("#shows3").hide();
    $("#hide3").show();
  })
})
 $("#hide3").click(function () {
   $("#shows3").show();
    $("#hide3").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide4").hide();
  $("#shows4").click(function () {
    
    $("#shows4").hide();
    $("#hide4").show();
  })
})
 $("#hide4").click(function () {
   $("#shows4").show();
    $("#hide4").hide();
})


  </script>
</body>
</html>