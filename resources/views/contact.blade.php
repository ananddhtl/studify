<!DOCTYPE html>
<html lang="en">
<head>
  <title> Countactus Page</title>
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
<!-- Body-->
<body class="institute-modal">
<!-- Main content-->
<!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
<main class="page-wrapper position-relative">

<!-- Navbar -->
<!-- Remove .navbar-sticky class to detach .navbar from page scroll -->
@include('layout.header')


<section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax data-speed="0.5">
        <div class="jarallax-img"></div>
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center">
                    
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                </div>
            </div>
        </div>
    </section>
    <!-- bridging educational opportunities -->
    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <h2 class="h2 mb-2 pb-3 text-center"> <span class="font-weight-400">Contact Us </span></h2>
        <h6 class="h6 mb-lg-4 mb-2 pb-3 text-center">We’re here to help. Don’t hesitate to get in touch with our expert support team who can help answer all of your questions.</h6>
        <div class="row align-items-center pt-lg-5 pb-lg-0">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center p-3">
                <div id="contact-social">
                <img src="{{asset('assets/images/inst-icon-1.svg')}}" alt="">

                <p><b><u>Email</u></b></p>
                <p><a style="color: #0064e1;" href="mailto:info@studify.au">info@studify.au</a></p>
                <p>Please email us with your inquiries.</p>
            </div>
</div>

            

            

        </div>

        <div class="row align-items-center">
            <div class="position-relative  bg-repeat-0 rounded overflow-hidden text-center py-6">
                <div class="position-relative zindex-2">
                    If you are an existing customer and have a question, please contact your Account Representative for assistance. For questions about a student application, please leave a message in the Notes section of the application and our Customer Experience team will be in touch.
                </div>
            </div>
        </div>




        <div class="row align-items-center pt-lg-12 pb-lg-0" >
            <div class="col-lg-12 col-md-12 col-sm-12 order-md-12 order-sm-12 order-12 mb-md-0 mb-4" style="text-align: center !important;
    margin-top: 20px;">
                <a href="#" class="btn-social1 bs-solid rounded-circle me-4 me-4 mt-md-0 mt-sm-1 fb-icon" target="_blank">
                   <i class="fa fa-facebook" aria-hidden="true" id="big"></i>
                </a>
                <a href="#" class="btn-social1 bs-solid rounded-circle me-4 me-4 mt-md-0 mt-sm-1 insta-icon" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true" id="big"></i>
                </a>
                <a href="#" class="btn-social1 bs-solid rounded-circle me-4 me-4 mt-md-0 mt-sm-1 twitter-icon" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true" id="big"></i>
                </a>
                <a href="#" class="btn-social1 bs-solid rounded-circle me-4 me-4 mt-md-0 mt-sm-1 youtube-icon" target="_blank">
                    <i class="fa fa-youtube" aria-hidden="true" id="big"></i>
                </a>
                <a href="#" class="btn-social1 bs-solid rounded-circle me-4 me-4 mt-md-0 mt-sm-1 linkedin-icon" target="_blank">
                    <i class="fa fa-linkedin" aria-hidden="true" id="big"></i>
                </a>

            </div>
        </div>

            <div class="position-relative  bg-repeat-0 rounded overflow-hidden text-center py-6">
                <div class="position-relative zindex-2 pt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.080555603317!2d151.08191681478186!3d-33.9647689314766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b90e77a9324b%3A0xcf8cb4d5caa181d3!2s10-12%20Nelson%20St%2C%20Penshurst%20NSW%202222%2C%20Australia!5e0!3m2!1sen!2sin!4v1672740445263!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        


    </section>

</main>
<!-- / Main content: .page-wrapper -->
<!-- Footer -->
@include('layout.footer')



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-232487980-1"></script>

</main>
</body>
</html>