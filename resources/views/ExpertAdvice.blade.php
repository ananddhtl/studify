<!DOCTYPE html>
<html lang="en">
<head>
  <title>Expert support page</title>
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
    <!-- Hero-->
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
    <!--faq section -->
    <section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <img src="{{asset('assets/images/expet1.png')}}" alt="" class="mb-5">
                <h2 class="h2 mb-4 pb-lg-3 text-md-start text-sm-center">Studify's recruitment experts are there to support you every step of the way.</h2>
                <p class="display-6 text-md-start text-sm-center">Studify holds your hands and provides swift application guidance and suggestions to students and easy walkthroughs through various mediums like online chat, one-to-one calls as well workshops via Zoom. </p>
                
                <p class="display-6 text-md-start text-sm-center">Right from finding the programs that suits you, all the way to the visa applications. </p>
               
            </div>
            <div class="col-lg-6 col-md-12 me-auto mb-md-0 mb-4 pb-md-0 pb-3 ap-form ">
                <h3 class="mb-4">Get in touch for support!</h3>
                    <form method="POST" action="#" accept-charset="UTF-8" class="needs-validation" novalidate><input name="_token" type="hidden" value="oubsBy5iJE1lR0GOSZRgZBT4jccIxu7vclsnlCLN">
                                                            <div class="form-group first">
                        <label for="firstname">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="" placeholder="First Name" class="form-control" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter your first name!
                        </div>
                    </div>
                    <div class="form-group first">
                        <label for="firstname">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="" placeholder="Last Name" class="form-control" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter your last name!
                        </div>
                    </div>
                    <div class="form-group first">
                        <label for="username">Email</label>
                        <input type="email" name="email" id="email" value="" placeholder="your-email@gmail.com" class="form-control" required>
                        <div class="valid-feedback">
                            Email is valid. Thanks
                        </div>
                        <div class="invalid-feedback">
                            Email is required
                        </div>
                    </div>
                    <div class="form-group first">
                        <label for="firstname">Phone</label>
                        <input type="text" name="phone" id="phone" value="" placeholder="Your Phone No." class="form-control" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter your phone!
                        </div>
                    </div>

                    <div class="form-group first">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" name="message" id="message" placeholder="write your message here" required></textarea>
                        <div class="valid-feedback">
                            Message is fine and good
                        </div>
                        <div class="invalid-feedback">
                            Please enter a short message
                        </div>
                    </div>
                    <div class="form-group first">
                        <label for="message">Enter Security Answer:</label>
                                                <span>0 + 8 = ?</span>
                        <input type="hidden" name="security_sum" value="8">
                        <input type="text" name="security_answer" value="" placeholder="Enter Security Answer" required="" class="form-control">
                        <div class="valid-feedback">
                            Security code good
                        </div>
                        <div class="invalid-feedback">
                            Please solve above question
                        </div>
                    </div>
                    <input type="submit" value="Contact Studify" class="btn btn-primary rounded-pill submit px-5 mt-5">
                </form>
            </div>
        </div>
    </section>

</main>

@include('layout.footer')

<!-- Vendor scripts: js libraries and plugins-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main theme script-->

</body>
</html>