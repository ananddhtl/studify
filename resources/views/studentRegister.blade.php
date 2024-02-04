<!DOCTYPE html>
<html lang="en">
<head>
  <title> Registration Login page</title>
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
<body>


<a href="{{url('/')}}" class="btn btn-outline-info rounded-pill position-fixed login-left-button">Back to Homepage</a>

    <div class="d-lg-flex half ap-form">
        <div class="bg order-2 order-md-1 vh-100 position-relative dark-blue-gradient">

            <div class="mx-auto p-5 mt-5 text-center">
                <img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A2.png')}}" alt="" class="img-fluid">

                <h6 class="ps-5 pe-5 text-white">Our web application will help you to search thousands of courses and monitor each activity regarding your applications course shortlist, documents upload and verification, offer letter, paying tuition fees directly to institutions, etc. Our Studify’s expert help with your visa application along with pre and post departure briefing and arrangements.!
                </h6>
            </div>
            <div class="st-login-bg">
                <img src="{{asset('assets/images/student_login_registration.png')}}" class="img-fluid mx-auto" alt="">
            </div>
        </div>
        <div class="contents order-1 order-md-2 position-relative">
            <a href="{{url('agent/register')}}" class="btn btn-outline-success btn-hover-shadow rounded-pill position-fixed login-right-button">Register as Counselor</a>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7" id="toppp">
                        <h3 class="mb-4">Student <span class="font-weight-400"> Registration</span></h3>
                         @if(Session::has('password'))
                        <p class="alert alert-danger">{{ Session('password') }}</p>
                        @endif

                        @if(Session::has('emailexit'))
                        <p class="alert alert-danger">{{ Session('emailexit') }}</p>
                        @endif

                        <form action="{{ route('studentregister') }}" method="POST">
                           @csrf                                                    <div class="form-group first">
                                <label for="firstname">First Name<span style="color: red;">*</span></label>
                                <input type="text" name="first_name" value="" class="form-control" placeholder="First Name" id="firstname" >
                                @error('first_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group first">
                                <label for="firstname">Last Name<span style="color: red;">*</span></label>
                                <input type="text" name="last_name" value="" class="form-control" placeholder="Last Name" id="lastname" >
                                @error('last_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group first">
                                <label for="firstname">Phone No<span style="color: red;">*</span></label>

 <div class="conid">
                                <select name="countrycode" class="form-select1" aria-label="Default select example">
                                    @foreach($country_code as $country_codes)
  <option data-countryCode="Aus" value="+{{$country_codes->phonecode}}" Selected>+{{$country_codes->phonecode}}</option>
  @endforeach
</select>
<input type="text" name="phone" value="" class="form-control" placeholder="12345678" id="email" >
</div>
                                @error('phone')
                                <span class="text-danger">Phone no should be atleast 10 characters</span>
                                @enderror
                            </div>

                            <div class="form-group first">
                                <label for="username">Email<span style="color: red;">*</span></label>
                                <input type="text" name="email" value="" class="form-control" placeholder="your-email@gmail.com" id="username" >
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password<span style="color: red;">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" >
                                @error('password')
                                <span class="text-danger">Password should be atleast 8 characters</span>
                                @enderror
                            </div>

                            <div class="form-group last mb-3">
                                <label for="password">Confirm Password<span style="color: red;">*</span></label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Your Password" id="password" >
                                @error('confirm_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <input id="checkbox" type="checkbox" required />
  <label for="checkbox"> I agree to these <a href="https://studify.au/terms-conditions">Terms and Conditions</a>.</label>
                            </div>
                            
                            <button type="submit" value="" class="btn btn-primary rounded-pill submit px-5">Register as Student</button>

                        </form>

                    <div class="seperate mt-3"><span> + </span></div>
                        <p class="already mt-3 mb-0">Already Registered? <a href="{{url('/member/login')}}">Login Here</a></p>

                    </div>
                </div>
            </div>
        </div>


    </div>





</body>
</html>