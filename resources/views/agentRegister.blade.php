
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
            <a href="{{url('member/register')}}" class="btn btn-outline-danger btn-hover-shadow rounded-pill position-fixed login-right-button">Register as Student</a>

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3 class="mb-4">Counselor <span class="font-weight-400"> Registration</span></h3>
                        @if(Session::has('password'))
                        <p class="alert alert-danger">{{ Session('password') }}</p>
                        @endif

                        @if(session()->has('emailexit'))
    <div class="alert alert-danger">
        {{ session()->get('emailexit') }}
    </div>
@endif

@if(session()->has('verifymessage'))
    <div class="alert alert-success" id="mass">
        {{ session()->get('verifymessage') }}
    </div>
@endif

                        <form action="{{ route('agentregister') }}" method="POST">
                           @csrf

                        <div class="form-group first float-start  w-100">
                                <label for="firstname">Company Name<span style="color: red;">*</span></label>
                                <input type="text" name="company_name" value="" class="form-control" placeholder="Company Name" id="company_name" >
                                @error('company_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                             <div class="form-group first float-start  w-100">
                                <label for="firstname">First Name<span style="color: red;">*</span></label>
                                <input type="text" name="first_name" value="" class="form-control" placeholder="First Name" id="company_name" >
                                @error('first_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                             <div class="form-group first float-start  w-100">
                                <label for="firstname">Last Name<span style="color: red;">*</span></label>
                                <input type="text" name="last_name" value="" class="form-control" placeholder="Last Name" id="company_name" >
                                @error('last_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                            <div class="form-group first float-start w-100">
                                <label for="username">Email<span style="color: red;">*</span></label>
                                <input type="email" name="email" value="" class="form-control" placeholder="your-email@gmail.com" id="email" >
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                             <div class="form-group first float-start w-100">
                                <label for="username">Phone No<span style="color: red;">*</span></label>
                               <div class="conid">
                                <select name="countrycode" class="form-select1" aria-label="Default select example">
                                    @foreach($country_code as $country_codes)
  <option data-countryCode="Aus" value="+{{$country_codes->phonecode}}" Selected>+{{$country_codes->phonecode}}</option>
  @endforeach
</select>
<input type="text" name="phone" value="" class="form-control" placeholder="12345678" id="email" >
</div>


                            </div>

                            <div class="form-group first float-start w-100">
                                <label for="username">Country<span style="color: red;">*</span></label>
                                <select name="country" class="form-select" aria-label="Default select example">
                                <option selected>Select Country</option>
                                @foreach($country as $countrys)
                                <option value="{{$countrys->country_name}}">{{$countrys->country_name}}</option>
                                @endforeach
                               </select>
                                  @error('country')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group first float-start w-100">
                                <label for="password">Password<span style="color: red;">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" >
                                @error('password')
                                <span class="text-danger">Password should be atleast 10 characters</span>
                                @enderror
                            </div>

                            <div class="form-group first float-start w-100">
                                <label for="password">Confirm Password<span style="color: red;">*</span></label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Your Password" id="c-password" >
                                @error('confirm_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


 <!-- <div class="form-group first float-start w-100" id="pack">
<div class="col-sm-6" id="33">
       <div class="vv"></div>
                <table class="packk" style="width:100%">
   <tr>
    <th class="head-1">package price:</th>
    <td class="data">Rs.50,00</td>
  </tr>
  <tr>
    <th class="head-1">Total views:</th>
    <td class="data">Total views</td>
  </tr>
  <tr>
    <th class="head-1">view per day</th>
    <td class="data"> views/day</td>
  </tr>
</table>


</div>
<div class="col-sm-6" id="33">
    <div class="vv"></div>

                <table class="packk" style="width:100%">
   <tr>
    <th class="head-1">package price:</th>
    <td class="data">Rs.50,00</td>
  </tr>
  <tr>
    <th class="head-1">Total views:</th>
    <td class="data">Total views</td>
  </tr>
  <tr>
    <th class="head-1">view per day</th>
    <td class="data"> views/day</td>
  </tr>
</table>

    </div>


 </div> -->


                            <div class="form-group last mb-3">
                                <input id="checkbox" type="checkbox" required/>
  <label for="checkbox"> I agree to these <a href="https://studify.au/terms-conditions">Terms and Conditions</a>.</label>
  <br>

                  <button type="submit" value="" class="btn btn-primary rounded-pill submit px-5">Register as Counselor</button>


                   <div class="seperate mt-3"><span> + </span></div>
                        <p class="already mt-3 mb-0">Already Registered? <a href="{{url('/agent/login')}}">Login Here</a></p>
 </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>
</html>
