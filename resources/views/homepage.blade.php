<!DOCTYPE html>
<html lang="en">
<head>
  <title>Studify</title>
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
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


</head>
<body class="institute-modal">
<main class="page-wrapper position-relative">

@include('layout.header')

<!-- first-section-->

<section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax="" data-speed="0.5">
        
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center my-auto pt-sm-5">
                    <h2 class="mb-lg-5 mb-4 pb-2  display-1 text-light">One stop shop solutions for your study abroad journey with <span class="text-primary font-weight-700"><a href="#">Studify</a></span></h2>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 col-md-12">
                            <div class="parallax mb-md-0 mb-4" style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <div class="parallax-layer" data-depth="-0.19" style="z-index: 3; transform: translate3d(-10.6px, 7.6px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                    <img src="{{asset('assets/images/banner-1.svg')}}" alt="Layer">
                                </div>
                                <div class="parallax-layer" data-depth="-0.35" style="z-index: 4; transform: translate3d(-19.5px, 14px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                                    <img src="{{asset('assets/images/image1.svg')}}" alt="Layer">
                                </div>
                                <div class="parallax-layer" data-depth="-0.25" style="z-index: 2; transform: translate3d(-13.9px, 10px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                                    <img src="{{asset('assets/images/image-2.svg')}}" alt="Layer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;"><div class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1349px; height: 390.133px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: -63.0664px; transform: translate3d(0px, 63.0664px, 0px);"></div></div></section>
    <!-- second section-->

<section class="container-fluid bg-blue-dark mt-n4 pt-3 pb-3" style="position: relative;">
        <section class="container home-below-banner">
            <div class="row text-sm-center">
                <div class=" col-lg-3 col-md-12 col-sm-12 mb-md-3 mb-sm-3">
                    <h3 class="h3 text-light-C0CCF9 my-auto">Door to your future </h3>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-4 col-4 px-0 text-md-end text-sm-center">
                    <a href="{{url('student')}}" class="stake-cta student-cta">
                        <img src="{{asset('assets/images/student-icon-circle.svg')}}" alt="Student" class="me-1 d-inline-block">
                        <h5 class="mb-0 text-light d-inline-block align-middle">Student <i class="ri-arrow-right-line  align-middle"></i>
                        </h5>
                    </a>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-4 col-4 px-0">
                    <a href="{{url('agent')}}" class="stake-cta counsellor-cta">
                        <img src="{{asset('assets/images/counselor-icon-circle.svg')}}" alt="Counselor" class="me-1 d-inline-block">
                        <h5 class="mb-0 text-light d-inline-block  align-middle">Counselor <i class="ri-arrow-right-line  align-middle"></i>
                        </h5>
                    </a>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-4 col-4 px-0 text-md-start  text-sm-center">
                    <a href="{{url('institution')}}" class="stake-cta institute-cta">
                        <img src="{{asset('assets/images/university-icon-circle.svg')}}" alt="university" class="me-1 d-inline-block">
                        <h5 class="mb-0 text-light d-inline-block align-middle">Institution <i class="ri-arrow-right-line  align-middle"></i>
                        </h5>
                    </a>
                </div>
            </div>
        </section>
    </section>


<!-- third section-->
    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3" id="cont">
        <h2 class="h2 mb-2 pb-3 text-center">One stop solution for your study abroad</h2>
        <h6 class="h6 mb-lg-4 mb-2 pb-3 text-center">Studify <span class="font-weight-700">simplifies</span> the entire
            <span class="font-weight-700">process</span> of studying abroad and connects the best institutions. </h6>
        <div class="row align-items-center pt-lg-5 pb-lg-0">
            <div class="col-lg-5 col-md-7 order-md-1 my-auto">
                <!-- Images binded to accordion -->
                <div class="binded-content">
                    <div id="identity" class="binded-item active">
                        <img class="d-block" src="{{asset('assets/images/1EB0FF3F-53BD-4B2D-A778-EDE4BA9A7F5F.jpeg')}}" alt="Identity Design &amp; Illustration">
                    </div>
                    <div id="web" class="binded-item">
                        <img class="d-block" src="{{asset('assets/images/student-login-illustration.png')}}" alt="UX / UI Design">
                    </div>
                    <div id="photography" class="binded-item">
                        <img class="d-block" src="{{asset('assets/images/student-login-illustration.png')}}" alt="Photography &amp; Video Production">
                    </div>
                </div>
            </div>
            <div class="col-md-7 order-md-1 order-sm-2">
                <!-- Accordion -->
                <div class="accordion home-accordion" id="accordionServices">
                    <!-- Item -->
                    <div class="accordion-item active">
                        <h3 class="accordion-header" id="servicesHeading-1">
                            <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-binded-content="#identity" data-bs-target="#servicesCollapse-1" aria-expanded="true" aria-controls="servicesCollapse-1">Spend less time completing your profile and applications
                            </button>
                        </h3>
                        <div class="accordion-collapse border-0 collapse show" id="servicesCollapse-1" aria-labelledby="servicesHeading-1" data-bs-parent="#accordionServices">
                            <div class="accordion-body">The Studify team reviews your profile and application to 
                              ensure they are fully completed and required documents are uploaded to avoid any delays.
                            </div>
                            <div class="d-block align-items-left">
                                <!-- <a class="ab-button" href="#" role="button"><i class="ri-arrow-right-line"></i>
                                    Learn More</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="servicesHeading-2">
                            <button class="accordion-button border-0 collapsed" type="button" data-bs-toggle="collapse" data-binded-content="#web" data-bs-target="#servicesCollapse-2" aria-expanded="false" aria-controls="servicesCollapse-2">Access the Global institutions at your fingertip
                            </button>
                        </h3>
                        <div class="accordion-collapse border-0 collapse" id="servicesCollapse-2" aria-labelledby="servicesHeading-2" data-bs-parent="#accordionServices">
                            <div class="accordion-body">Open your mind to a whole new world, experience world-class education, and develop a global perspective.
                            </div>
                            <div class="d-block align-items-left">
                                <!-- <a class="ab-button" href="#" role="button"><i class="ri-arrow-right-line"></i>
                                    Learn More</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="servicesHeading-3">
                            <button class="accordion-button border-0 collapsed" type="button" data-bs-toggle="collapse" data-binded-content="#photography" data-bs-target="#servicesCollapse-3" aria-expanded="false" aria-controls="servicesCollapse-3">Tools to organise your institutions search
                            </button>
                        </h3>
                        <div class="accordion-collapse border-0 collapse" id="servicesCollapse-3" aria-labelledby="servicesHeading-3" data-bs-parent="#accordionServices">
                            <div class="accordion-body">Simply search your desired courses at your desired location with lowest tuition fees
                            </div>
                            <div class="d-block align-items-left">
                                <!-- <a class="ab-button" href="#" role="button"><i class="ri-arrow-right-line"></i>
                                    Learn More</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="servicesHeading-4">
                            <button class="accordion-button border-0 collapsed" type="button" data-bs-toggle="collapse" data-binded-content="#photography" data-bs-target="#servicesCollapse-4" aria-expanded="false" aria-controls="servicesCollapse-4">we are the one stop shop solution for all your overseas education needs.
                            </button>
                        </h3>
                        <div class="accordion-collapse border-0 collapse" id="servicesCollapse-4" aria-labelledby="servicesHeading-4" data-bs-parent="#accordionServices">
                            <div class="accordion-body">10. Your most trusted and reliable overseas education facilitator
                            </div>
                            <div class="d-block align-items-left">
                                <!-- <a class="ab-button" href="#" role="button"><i class="ri-arrow-right-line"></i>
                                    Learn More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


     <!-- forth section -->
<section class="container mt-md-4 py-lg-6 pt-5 pb-sm-5 px-sm-3 pb-4 px-0 color-bg">
        <div class="row" id="cont1">
            <!-- for students -->
            <div class="col-lg-4 col-sm-6 col-12 mb-sm-grid-gutter mb-3">
                <div class="card card-hover border-15 border-red shadow-red h-100 py-2 text-center">
                    <div class="card-header pb-0 border-0 text-center">
                        <img src="{{asset('assets/images/student-block-icon.svg')}}" alt="">
                        <h4 class="h3 mb-1 mt-3">Students</h4>
                    </div>
                    <div class="card-body">
                        <p>Choose your preferred course, destination &amp; institution at your fingertip with Studify.</p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="{{url('member/register')}}" class="btn btn-outline-danger btn-hover-shadow rounded-pill d-block w-100">Register Now</a>
                    </div>
                </div>
            </div>
            <!-- for Counselor -->
            <div class="col-lg-4 col-sm-6 col-12 mb-sm-grid-gutter mb-3">
                <div class="card card-hover border-15 border-green shadow-green h-100 py-2 text-center">
                    <div class="card-header pb-0 border-0 text-center">
                        <img src="{{asset('assets/images/counselor-block-icon.svg')}}" alt="">
                        <h4 class="h3 mb-1 mt-3">Agents &amp; Counselor</h4>
                    </div>
                    <div class="card-body">
                        <p>Studify simplifies your entire application process and communication with your students</p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="{{url('agent')}}" class="btn btn-outline-success btn-hover-shadow rounded-pill d-block w-100">How we can assist you…</a>
                    </div>
                </div>
            </div>
            <!-- for institutions -->
            <div class="col-lg-4 col-sm-12 col-12 mb-sm-grid-gutter mb-3">
                <div class="card card-hover border-15 border-blue shadow-blue h-100 py-2 text-center">
                    <div class="card-header pb-0 border-0 text-center">
                        <img src="{{asset('assets/images/univerity-block-icon.svg')}}" alt="">
                        <h4 class="h3 mb-1 mt-3">Institutions</h4>
                    </div>
                    <div class="card-body">
                        <p>Join one of the largest platform and promote your institute to the world.</p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="{{url('institution')}}" class="btn btn-outline-primary btn-hover-shadow rounded-pill d-block w-100">Access
                            How we assist institutes…</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- fift section -->

<section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3">
                    <img src="{{asset('assets/images/5CBA9E98-2238-4408-B697-71132C6963D6.jpeg')}}" alt="About" class="d-block mx-auto">
                    <div class="expert-cta mt-5 mx-auto text-center">
                        <p class="display-6">Have a Questions? <a href="{{url('contact')}}" class="btn btn-primary rounded-pill">Contact our
                                Support Team</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <h2 class="h2 pb-lg-3 text-md-start text-sm-center">Studify – Simplifies the entire process at your fingertip</h2>
                    <p class="display-6 text-md-start text-sm-center">Studify provides a transparent and efficient service network to our students, agents and institutions. We will provide an easy walkthrough entire process of finding the right institutions to the offer letter and much more. </p>
                    <ul class="list-unstyled mb-5 mt-3">
                        <li class="d-flex mb-3 pb-1">
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>We provide one stop solutions for agents to find the right course at right 
                            location with low tuition fees for their students. 
                        </li>
                        <li class="d-flex mb-3 pb-1">
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i> We provide global access to the institution where 
                            students can find the right course and connect with the institution.
                        </li>
                    </ul>
                    <div class="d-block mt-3 align-items-left">
                        <a class="ab-button" href="{{url('contact')}}" role="button"><i class="ri-arrow-right-line"></i>
                            Other remains the same</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- six section -->

<section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <div class="row">
            <!-- video -->
            <div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-lg-1 order-md-1 mt-sm-3">
                <h3 class="h3 color-blue"><i class="ri-youtube-fill color-red align-middle"></i> Video Demos &amp;
                    Walkthroughs</h3>
                <div class="row">
                    <div class="col-md-12 col-12">
                        
                        <video class="video" poster="{{asset('assets/images/Screenshot44.png')}}" controls="aap" id="homecent"> 
        <source src="http://54.83.117.81/assets/images/production ID_4497323.mp4" type="vedio/mp4">
                                                            <source src="{{asset('assets/images/production ID_4497323.mp4')}}" type="video/ogg">
                                                            <source src="{{asset('assets/images/production ID_4497323.m4v')}}" type="video/mp4">
    </video>
                    </div>
                    </div>
            </div>
            <!-- blog -->

            <div class="col-lg-5 offset-lg-1 col-md-6 col-sm-12 order-sm-1 mt-sm-3 mb-sm-5" id="top-images">
                <img src="{{asset('assets/images/Screenshot.png')}}" alt="About " class="d-block mx-auto my-auto">
            </div>


        </div>
                        <div class="row align-items-center pt-lg-5 pb-lg-0" id="cont">
                        <h3 class="h3 color-blue"><i class="ri-article-fill color-green align-middle"></i> Latest News and Blog </h3>

           

            <div class="row">
                 @foreach($blog as $blogs)
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <ul class="list-unstyled" id="topblog">
   <li class="row gx-0 mb-4">
                                <div class="col-6 img-squareRound">
                                    <a class="flex-shrink-0 me-3" style="width: 100px;" href="#">
                                <img src="{{asset('public/BlogImage/'.$blogs->blog_image)}}"  alt="A Guide to Securing your US Student Visa Successfully 2022">
                                                                            </a>
                                </div>
                                <div class="col-8 ps-1 ms-3">
                                    <h4 class="h6 mb-1 nav-dark fs-6">
                                        <a class="nav-link fw-bold" href="#">{{$blogs->blog_heading}}</a>
                                    </h4>
                                    <?php $bloog = Str::limit($blogs->blog_description, 150, '...'); ?>
                           {!!$bloog!!}        
                                    <span class="d-block mb-1 fs-sm text-muted">Published on {{$blogs->created_at->format('d M, Y')}}</span>

                                    @php 
                                  $title =  str_replace(' ', '-', $blogs->blog_heading);
                                    @endphp
                                    <a href="{{url('blog-details/'.$title)}}" class="mt-1 mb-1">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                                </div>
                            </li>

                                                   


               </ul>
            </div>
             @endforeach
        </div>
           
           
            
           
            

            
            <!--first section-->
            
        </div>
    </section>
    <section class="container-fluid bg-blue-light">
    <section class="container  pt-5 pb-sm-5 pb-4 px-0 px-sm-3" id="cont">
        <div class="row">
        <h2 class="h2 mb-2 pb-3 text-center">Our Record</h2>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="employees">
                    <p class="counter-count">{{ $student->count() }}</p>
                    <p class="employee-p">Total Student</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="customer">
                    <p class="counter-count">{{ $agent->count() }}</p>
                    <p class="customer-p">Total Agents</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="design">
                    <p class="counter-count">{{ $institution->count() }}</p>
                    <p class="design-p">Total Institutions</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="order">
                    <p class="counter-count">{{ $course->count() }}</p>
                    <p class="order-p">Total Courses</p>
                </div>
            </div>
        </div>
    </div>
    </section>
</section>
    
<section class="container-fluid">
        <div class="container">
  <h2 class="h2 mb-2 pb-3 text-center">Our  Partners</h2>
   <section class="customer-logos slider">
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image23.jpeg')}}"
                  width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image24.jpg')}}" width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image25.png')}}"
                 
                 width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image26.png')}}"
                 width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image27.jpeg')}}"
                  width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image26.png')}}"
                 width="200"></div>
      <div class="slide"><img class="navbar-brand-static1 " src="{{asset('assets/images/image22.png')}}"
                  width="200"></div>
     
   </section>
</div>
    </section>






<section class="container-fluid  ab-home-banner-bg">
    <section class="container py-lg-5 pt-5 pb-sm-5 pb-4 px-0">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12 text-sm-center text-md-start">
                <h6 class=" color-light-blue">Stay up to date</h6>
                <h3 class="h2  color-light-blue">Subscribe to our Newsletter!</h3>
            </div>

            <div class="col-md-6 col-sm-12 col-12 home-subscription-block my-auto">
                    <form  action="#" accept-charset="UTF-8" class="subscribe-block needs-validation position-relative" novalidate="" data-hs-cf-bound="true"><input name="_token" type="hidden" value="fCNGacmy6ahl5haQneuCxq2Nan6oKwUuJ3VBp2pX">
                    <div class="input-group mb-3 ">
                        <input type="email" name="email" class="form-control" placeholder="Your Valid Email" aria-label="Recipient 's email" aria-describedby="button-addon2" required="">
                                <span class="invalid-feedback position-absolute" style="top:50px; left: 0;">
                                    Valid Email is required
                                </span>
                        <button class=" btn btn-primary" type="submit" id="button-addon2 ">Subscribe Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@include('layout.footer')

<script src="{{asset('assets/js/script.bundle.js')}}"></script>
<script src="{{asset('assets/js/polyfills.min.js')}}"></script>

<!-- Main theme script-->



<script>$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});</script>
</body>
</html>   
   