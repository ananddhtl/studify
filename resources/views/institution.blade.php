<!DOCTYPE html>
<html lang="en">
<head>
  <title>institution page</title>
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
                    <h2 class="mb-lg-5 mb-4 pb-2  display-1 text-light">Access<span class="text-primary font-weight-700"><a href="#"> Global Market</a></span></h2>
                    <h6 class="mb-5">Increase your global presence and the number of qualified students from a single, easy-to-use platform.</h6>
                    <a href="{{url('institution/register')}}" class="btn btn-primary rounded-pill" >Join Us Today!</a>
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                    <img src="{{asset('assets/images/institution_header.png')}}" alt="Layer" height="300">
                </div>
            </div>
        </div>
</section>
    <!-- second section-->

    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <h2 class="h2 mb-2 pb-3 text-center">Why Institutions Choose Studify?</h2>
        <h6 class="h6 mb-lg-4 mb-2 pb-3 text-center">Attract Quality Students Across the Globe </h6>
        <div class="row align-items-center pt-lg-5 pb-lg-0">

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose6.png')}}" alt="" class="mb-5" id="choos">

                <p><b>Vetted application</b><br>Studify reviews all applications from students to ensure they are accurate and complete.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose2.png')}}" alt="" class="mb-5" id="choos">

                <p><b>Document Verification</b><br>We check and ensure whether all required documents are verified and included with the applications.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose1.png')}}" alt="" class="mb-5" id="choos">

                <p><b>Your Success</b><br>You simply sit back, relax and attract more quality students from the global platform.</p>
            </div>

        
          <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose3.png')}}" alt="" class="mb-5" id="choos">

               <p><b>Diversity</b><br>Enrich your institute with student diversity from around the globe.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose4.png')}}" alt="" class="mb-5" id="choos">

               <p><b>Trusted Brand</b><br>We’re partnered with an Australian institution, our brand is tested and trusted by the leading universities Globally.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/Choose5.png')}}" alt="" class="mb-5" id="choos">

               <p><b>Marketing Solutions</b><br>Maximize your market reach through events& online webinar campaigns, and enhance your brand visibility.</p>
            </div>

        </div>

        <div class="row align-items-center pt-lg-5 pb-lg-0">
            <div class="position-relative  bg-repeat-0 rounded overflow-hidden text-center py-6">
                <h2 class="display-5 font-weight-700">Best-in-class Insitution Experience</h2>
                <h4 class="h6">See how Studify how level up your students recruitment</h4>
                <div class="position-relative zindex-2 pt-5">
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
<section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-blue-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12  my-auto">
                    <h2 class="h2 mb-4 pb-lg-3 text-md-start text-sm-center"><span class="font-weight-400">Associate with</span> Studify</h2>
                    <p class="display-6 text-md-start text-sm-center">Discover how Studify can assist you to meet your international students recruitment goals.

                    </p>

                    <a href="{{url('institution/register')}}" class="btn btn-primary rounded-pill mx-sm-auto" data-bs-toggle="modal" >Join Us Today!</a>
                </div>
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ">
                    <img src="{{asset('assets/images/institution_body.png')}}" alt="About " class="d-block mx-auto my-auto ">

                </div>

            </div>
        </div>
    </section>
   
 <!-- forth section -->


<section class="container-fluid bg-white-light">
<div class="container">
  <h2 class="h2 mb-2 pb-3 text-center">Trusted by the World Ranking Institutions Globally</h2>
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
                    <form method="POST" action="https://www.applybridge.com/subscribe" accept-charset="UTF-8" class="subscribe-block needs-validation position-relative" novalidate="" data-hs-cf-bound="true"><input name="_token" type="hidden" value="fCNGacmy6ahl5haQneuCxq2Nan6oKwUuJ3VBp2pX">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>  
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
