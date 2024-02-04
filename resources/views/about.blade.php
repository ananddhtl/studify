<!DOCTYPE html>
<html lang="en">
<head>
  <title> Company page</title>
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
                    <h1 class=" mt-lg-5 pb-2  display-1 text-light">About<span class="text-primary font-weight-700"><span class="text-primary font-weight-700"><a href="#"> Studify</a></span></h1>
                    <h6 class="mb-5">It's a google for courses and studying abroad!

With headquarters based in Sydney, Australia, we’ve positions ourselves as global ed-tech company. Our ultimate goal is to match all students with the great career and academic programs for study abroad. 
 
Studify's helps student to find their best courses, career and institutions throughout the World. A trusted and advanced study abroad portal in the world. 
  
Studify is one of the leading destination for thousands of students to discover career, courses, universities, admission guidelines and scholarships.
   
Studify provides admission assistance to prospective student seeking admission abroad's universities and colleges. From identifying the right college and gaining admission, and apply for a student visa, Studify's handles the whole process to ensure the prospective student has the highest chance to gain admission and obtain his or her visa.

                    </h6>
                </div>
               <div class="col-lg-6 col-md-7 pb-3 text-end">
                    <img src="{{asset('assets/images/companyheader2.png')}}" alt="Layer" height="400" style="padding-top: 15%;">
                </div>
            </div>
        </div>
    </section>
    <!--faq section -->
    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3"id="mmm">
        <h2 class="h2 mb-2 pb-3 text-center"> Mission, Vision and Values</h2>
        <div class="row align-items-center pt-lg-5 pb-lg-0 mission-block">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/mission-icon.png')}}" alt="" class="mb-5">
                <h3 class="h3 color-blue mb-3  text-center">Our Mission</h3>
                <p>Our mission is to connect students, agents, and counsellor where they choosethe right course and career. With the most up to date information, we have created EdTech portal that helps the students in every way in making his/her decision better and easier, and provide the complete educational eco-system.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/success-icon.png')}}" alt="" class="mb-5">
                <h3 class="h3 color-blue mb-3  text-center">Vision</h3>
                <p>We envision a world where our EdTech platform canfulfill a vision of empowering students with knowledge so that they make an informed and wiser decision while choosing their right course and career.we aspire to be the top education portalsby connecting institutions, recruiters, and students across the globe.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center p-3">
                <img src="{{asset('assets/images/history-icon.png')}}" alt="" class="mb-5" style="margin-top: 0px;">
                <h3 class="h3 color-blue mb-3  text-center">Our Values</h3>
                <p><b>Student first </b>- We are committed to the students. <b>Integrity </b>– towards our commitment. <b>Impact </b>- we exist to accelerate equitable outcomes for students. Diversity - we actively advance a fair and inclusive future.
                    <br>
                    <br></p>
            </div>
        </div>
    </section>

<section class="mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 bg-white">
        <div class="container">
            <div class="row">
                 <h2 class="h2 mb-2 pb-3 text-center">Your Success is Our Success</h2>
                <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ">
                    <img src="{{asset('assets/images/team.png')}}" alt="About " class="d-block mx-auto my-auto " id="team1">
                    <h2 class="name">Shamim Anwar<br>
Founder & CEO
</h2>

                </div>

                <div class="col-lg-6 col-md-12  my-auto">
                    <p class="display-6 text-md-start text-sm-center">After facing many challenges and obstacles on his own study abroad journeys in Australia, he then saw an opportunity to break down barriers and democratize education that connects institutions, recruiters, and students across the globe.</p>

<p class="display-6 text-md-start text-sm-center">Shamim has developed an online platform to simplify the entire study abroad experience for the students, universities and agencies across the globe. </p>

<p class="display-6 text-md-start text-sm-center">Shamim Anwar is a driven with his passion for counselling, financial planning, investments and startups. He’s a certified QEAC education and career counsellor, business & leadership coach and motivational speaker.</p>

<p class="display-6 text-md-start text-sm-center">He's driven by his passion for bringing positive change in individual growths and he does by attending events likes of world-renowned life/businesscoach and entrepreneurs like Tony Robins, Richard Branson, Robert Kiyosaki, Dr John Demartini, Dr VivekBindraand dozens more. </p>


                    
                </div>
                

            </div>
        </div>
    </section>




    <!-- <div class="team-section">
        <div class="inner-width">
      <h2>Meet our team </h2>
            <div class="pers">
                

                <div class="pe">
                    <img src="https://pbs.twimg.com/profile_images/969390093411774465/uJ5LaoyJ_400x400.jpg" alt="rafeh">
                    <div class="p-name">Rafeh Qazi</div>
                    <div class="p-des">Designer</div>
                    <div class="p-sm">
                          <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="pe">
                    <img src="https://pbs.twimg.com/profile_images/969390093411774465/uJ5LaoyJ_400x400.jpg" alt="rafeh">
                    <div class="p-name">Dev Tenzin</div>
                    <div class="p-des">Developer</div>
                    <div class="p-sm">
                    
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="pe">
                    <img src="https://pbs.twimg.com/profile_images/969390093411774465/uJ5LaoyJ_400x400.jpg" alt="rafeh">
                    <div class="p-name">Darrel wilson</div>
                    <div class="p-des">Director</div>
                    <div class="p-sm">
                         <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </div> -->
</main>
<!-- / Main content: .page-wrapper -->
<!-- Footer -->
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main theme script-->
</body>
</html>