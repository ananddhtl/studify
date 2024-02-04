
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Login as Counselor Forget-password page</title>
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
<body>



<a href="{{url('/')}}" class="btn btn-outline-info rounded-pill position-fixed login-left-button">Back to Homepage</a>


<div class="d-lg-flex half ap-form">
    <div class="bg order-2 order-md-1 vh-100 position-relative dark-green-gradient">

        <div class="mx-auto p-5 mt-5 text-center">
            <img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A2.png')}}" alt="" class="img-fluid">
            <h6 class="ps-5 pe-5 text-white">Our Agent Dashboard allows you to manage all your students applications. Studify’s offer attractive commissions to agents who wish to process aapplication though us and commission will be credited to agent once the student is enrolled. You can do much more than student’s application.
            </h6>
        </div>
        <div class="st-login-bg">
            <img src="{{asset('assets/images/counselor_login_registration.png')}}" class="img-fluid mx-auto" alt="">
        </div>
    </div>
    <div class="contents order-1 order-md-2 position-relative">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7" id="forget">
                    <h3 class="mb-4">Reset Your Password</h3>
                    @if(Session::has('fail'))
                        <p class="alert alert-danger">{{ Session('fail') }}</p>
                        @endif


                    <form method="POST" action="{{url('/agent/forgot_email_check')}}" accept-charset="UTF-8" class="log__form" id="forgotpassword"><input name="_token" type="hidden" value="lAUnX8Kii7fhBeMvpLW4aFg16uAyf92CgbNEQQEs">
                    @csrf                            
                    <div class="form-group first">
                            <label for="username">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com" id="email" required="">
                            @if(Session::has('email'))
                        <p class="alert alert-danger">{{ Session('email') }}</p>
                        @endif
                        </div>
                        <button type="submit" value="Reset your password" class="btn btn-primary rounded-pill submit px-5">Reset your password</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>


