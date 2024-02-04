<!DOCTYPE html>
<html lang="en">
<head>
  <title> Disclaimer Page</title>
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
 
<section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax data-speed="0.5">
        <div class="jarallax-img"></div>
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center">
                    <h1 class=" mt-lg-5 pb-2  display-1 text-light">Disclaimer</h1>
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5 mb-5 p-5 shadow-sm">
        <p class="lead fw-bold">DISCLAIMER</p>


        <p class="mb-sm-5 mb-grid-gutter">The information contained in this website is for general information purposes only. The information is provided by Studify and while we Endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.</p>
        <p class="mb-sm-5 mb-grid-gutter">In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits are arising out of, or in connection with, the use of this website.</p>
        <p class="mb-sm-5 mb-grid-gutter">Through this website you are able to link to other websites which are not under the control of Studify. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</p>
        <p class="mb-sm-5 mb-grid-gutter">Every effort is made to keep the website up and running smoothly. However, Studify takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</p>
        <p class="mb-sm-5 mb-grid-gutter">The Duplication of the information provided on our website is strongly forbidden. We do not in any way endorse any of the advertisers on our web pages. Please verify the authenticity of all information on your own before undertaking any reliance.</p>
        <p class="mb-sm-5 mb-grid-gutter">The linked sites are not under our control and we are not responsible for the contents of any linked site or any link contained in a linked site, or any changes or updates to such sites. We are providing these links to you only as a convenience, and the inclusion of any link does not imply endorsement by us of the site.</p>
        <p class="mb-sm-5 mb-grid-gutter">Do not assume that the external sites will abide by the same Privacy Policy to which "Studify" adheres to. It is the responsibility of the user to examine the copyright and licensing restrictions of linked pages and to secure all necessary permissions. For site security purposes, as well as to ensure that this service remains available to all users, we use software programs to monitor traffic and to identify unauthorized attempts to upload or change information or otherwise cause damage.</p>

        
    </section>

</main>
<!-- / Main content: .page-wrapper -->
<!-- Footer -->

@include('layout.footer')





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>