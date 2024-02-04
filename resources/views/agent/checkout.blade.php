<!DOCTYPE html>
<html lang="en">
<head>
  <title> Checkout page</title>
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
<main class="page-wrapper position-relative">

@include('layout.header')
<section class="First-top">
<div class="container">

  <div class="col-sm-12" id="center" style="margin-top: 5%;">
    <h2 class="h2 mb-2 pb-3 text-center">Check Out</h2>

<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">Package</th>
      <th scope="col">Duration</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">First</th>
      <td>***</td>
      <td><b>1</b></td>
      <td><b>100</b></td>
    </tr>
   
  </tbody>
</table> -->
<div class="check-main">
<div class="col-sm-3">
  <h4 class="check-text">Package</h4>
</div>
<div class="col-sm-3">
  <h4 class="check-text">Duration</h4>
</div>
<div class="col-sm-3">
  <h4 class="check-text">Quantity</h4>
</div>
<div class="col-sm-3">
  <h4 class="check-text">Price</h4>
</div>
</div>
<div class="check-main1">
<div class="col-sm-3">
  <h4 class="check-text">{{$package->package_name}}</h4>
</div>
<div class="col-sm-3">
  <?php   
    $newDate = date('dS M Y', strtotime($agent->package_start_date)); 
    $enddate =  date('dS M Y', strtotime($agent->package_end_date));   ?>
  <h4 class="check-text">{{$newDate}}- {{$enddate}}</h4>
</div>
<div class="col-sm-3">
  <h4 class="check-text">1</h4>
</div>
<div class="col-sm-3">
  <h4 class="check-text">${{$package->package_monthly}}</h4>
</div>
</div>
<div class="part">
<div class="col-sm-6" id="table-left">
 
<input type="text" id="code" name="couponcode" placeholder="">
<button id="couponcode"  class="pay2">Apply</button>


  </div>
  <div class="col-sm-6" id="table-right">
      <div class="col-sm-6">
    <label for="text" class="col-sm-4 col-form-label" id="ll"><b>Price-</b></label><br>
    <label for="text" class="col-sm-4 col-form-label" id="ll"><b>Discount-</b></label><br>
    <label for="text" class="col-sm-4 col-form-label" id="ll"><b>Total-</b></label>
     
     <br>
    </div>
  <div class="col-sm-6" style="text-align: left;">
  <label for="text" class="col-sm-4 col-form-label" id="ll1">$100</label><br>
    <label for="text" class="col-sm-4 col-form-label" id="ll1">2.85%</label>
    <br>
    <label for="text" class="col-sm-4 col-form-label" id="ll1">****</label>
  </div>
   
   
  </div>

  </div>

</div>
</div>
<div class="button-pay">
<form action="https://studify.au/agent/package-status" method="post">
  <input type="hidden" name="_token" value="OoYhaP0cyO2k0SjIqyNoQwaWarA9J1NYu82hTLOC">
  <input type="hidden" value="16" id="package_idss" name="package_id">
<button type="submit" class="pay">Proceed To Pay</button>
</form>
</div>
</div>
</section>
</main>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>