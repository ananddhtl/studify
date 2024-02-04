
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Registration packages page</title>
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

<style>
  input#couponcode {
    width: 100%;
    border: 1px solid #ccc;
    padding: 8px 3px;
    border-radius: 3px;
}
.date {
    display: table-cell;
    width: 25%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6;
    background: #93b452;
}
button.package {
  padding: 7px 24px;
    border: 1px solid;
    background: #93b452;
    color: #fff;
    border-radius: 4px;
}
.fl-left {
    float: left
}

.fl-right {
    float: right
}

h1 {
    text-transform: uppercase;
    font-weight: 900;
    border-left: 10px solid #fec500;
    padding-left: 10px;
    margin-bottom: 30px
}

.row {
    overflow: hidden
}

.card {
    display: table-row;
    width: 49%;
    background-color: #fff;
    color: #989898;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    position: relative
}

.card+.card {
    margin-left: 2%
}

.date {
    display: table-cell;
    width: 25%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6
}



.date:after {
    top: auto;
    bottom: -15px
}

.date time {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.date time span {
    display: block
}

.date time span:first-child {
    color: #2b2b2b;
    font-weight: 600;
    font-size: 250%
}

.date time span:last-child {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
}

.card-cont {
   display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 13px 40px;
}

.card-cont h3 {
    color: #3C3C3C;
    font-size: 130%
}

.row:last-child .card:last-of-type .card-cont h3 {
    text-decoration: line-through
}

.card-cont>div {
    display: table-row
}

.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p {
    display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i {
    padding: 6% 5% 0 0
}

.card-cont .even-info p {
    padding: 30px 50px 0 0
}

.card-cont .even-date time span {
    display: block;
    margin-left: 7px;
    margin-top: -2px;
    font-weight: 600;
}

.card-cont a {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #D8DDE0;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
}

.row:last-child .card:first-child .card-cont a {
    background-color: #037FDD
}

.row:last-child .card:last-child .card-cont a {
    background-color: #F8504C
}
article.card.fl-left {
    width: 100%;
    background: #f3f3f3;
    margin: 10px 0px;
}
p.paysel {
    font-size: 20px;
    color: #000;
}

p.paysel a {
    margin: 10px;
    background: #93b452;
    color: #fff;
    padding: 8px 20px;
    border-radius: 5px;
    font-size: 16px;
}
@media screen and (max-width: 860px) {
    .card {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    .card+.card {
        margin-left: 0
    }
    .card-cont .even-date,
    .card-cont .even-info {
        font-size: 75%
    }
    button.package {
    margin: 5px 0px;
}
    
}
.active {
    border: 1px solid #93b452 !important;
    border-radius: 5px;
    margin: 10px 0px;
}

section.date {
    font-size: 8px;
}

article.couponclass {
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px 0px;
}
</style>


               <body class="institute-modal">
<main class="page-wrapper position-relative">

@include('layout.header')
@if(session()->has('message'))
    <div id="successMessage" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<section class="top">
<h2 class="h2 mb-2 pb-3 text-center">Select Package</h2>
<p class="title-1">Our pricing plans are designed to support all different sized agencies, from enterprise-level to startup.</p>

<div class="container">
 <!--  <div class="row">
 <div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" id="firstbutton">Bill Monthly </button>
  <button class="w3-bar-item w3-button" id="secondbutton">Bill Annually </button>
 
</div>
  
</div> -->

  <div class="switches-container">
    <input type="radio" id="switchMonthly" name="switchPlan" value="Monthly" checked="checked" />
    <input type="radio" id="switchYearly" name="switchPlan" value="Yearly" />
    <label for="switchMonthly">Bill Monthly </label>
    <label for="switchYearly">Bill Annually</label>
    <div class="switch-wrapper">
      <div class="switch">
        <div>Bill Monthly </div>
        <div>Bill Annually</div>
      </div>
    </div>
  </div>
 
<div id="First">
 <div data-v-7c4fa3d1="" class="mt-3 flex justify-center items-end text-grey-darkest"><div data-v-7c4fa3d1=""><span data-v-7c4fa3d1=""> * You saved </span><span data-v-7c4fa3d1="" class="mx-1 bg-teal-default text-white px-1 rounded"> 30% </span> on Annual Plan </div></div>

 <div class="col-sm-12" id="Package-box">

  <!-- first package div -->
  @foreach($packages as $package)
  <div class="col-sm-4" onclick="doWithThisElement({{$package->id}})">
    <div id="activepackage{{$package->id}}"  onclick="div2({{$package->id}})" class="Package1" >
      <span class="tik tik{{$package->id}}" id="tik"><img class="click-tik" src="{{asset('assets/images/5291024.png')}}"></span>
      <h3 data-v-7c4fa3d1="" class="uppercase text-primary-700 text-sm font-bold" style="letter-spacing: 0.1em;">{{$packages[0]->package_name}}</h3>
      <h4 class="subtitle"> {{$package->package_title}}</h4>
<p data-v-7c4fa3d1="" class="text-sm">{{$package->package_subtitle}}</p>
    <h1 data-v-7c4fa3d1="" class="font-extrabold text-2xl ag-price relative pl-2">
      <span data-v-7c4fa3d1="" class="text-base absolute top-0 left-0">AUD</span>
      <span data-v-7c4fa3d1="" id="monthly"  class="pl-7 monthly">{{$package->package_monthly}}</span>
        <span data-v-7c4fa3d1="" id="yearly" class="pl-7 yearly">{{$package->package_yearly}}</span>
        <!----></h1>
      <p data-v-7c4fa3d1="" id="usemonth" class="text-primary-500 text-xs usemonth">/ User per month</p>
      <p data-v-7c4fa3d1="" id="useyear" class="text-primary-500 text-xs useyear">/ User per year</p>

   <?php $packagefeature = App\Models\addPackage::where(['package_id' => $package->id])->where(['type' => '2'])->get();  ?>
  
<ul class="check-element">
  @foreach($packagefeature as $packagefeatures)
        @if($packagefeatures->package_feature == 'sms')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">SMS Integration</span></li>
        @endif
         @if($packagefeatures->package_feature == 'email')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Email Integration</span></li>
        @endif
         @if($packagefeatures->package_feature == 'calender')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Calendar</span></li>
        @endif
         @if($packagefeatures->package_feature == 'task')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Tasks</span></li>
         @endif
         @if($packagefeatures->package_feature == 'rolePermission')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Role &amp; Permission</span></li>
        @endif

        @if($packagefeatures->package_feature == 'leadManage')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Lead Manger</span></li>
        @endif

        @if($packagefeatures->package_feature == 'documentManage')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Document-Management</span></li>
        @endif

        @if($packagefeatures->package_feature == 'application')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Applications</span></li>
        @endif
        @if($packagefeatures->package_feature == 'workflow')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">Workflow</span></li>
        @endif
        @if($packagefeatures->package_feature == 'news')
        <li><i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span data-v-7c4fa3d1="" class="ml-3">News</span></li>
        @endif

        @endforeach
      </ul>
    </div>
  </div>


@endforeach


</div>
</div>


<div class="button-pay">
<form action="{{url('agent/payment')}}" method="post" >
  @csrf
    <input type="hidden" value="" id="duration" name="duration">

  <input type="hidden" value="" id="package_idss" name="package_id">
<a data-toggle="modal" data-target="#applycoupon" id="buttonpay" class="pay">Proceed To Pay</a>
</form>
</div>
                          </div>



	</section>
  
  <div class="modal fade" id="applycoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content" id="widthtop" style="width: 100%; margin-left: 10%;">
        <div class="modal-header">
      Apply Coupon

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form action="{{url('agent/payment')}}" method="post" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                 
                                <div class="row">
                                  <div class="col-sm-6">
                       <label><b>Enter Coupon Code</b></label></div>
                       <div class="col-sm-6"></div>

                       <div class="col-sm-8">
                       <input type="hidden" value="" id="duration" name="duration">

<input type="hidden" value="" id="package_idss" name="package_id"> 
                       <input type="text" name="couponcode" value="Enter Coupon Code" id="couponcode"><br>
                       @if($errors->has('couponcode'))
    <div class="error">{{ $errors->first('couponcode') }}</div>
@endif
</div>
                     
                      <div class="col-sm-4">
      <button type="submit" class="package" >Apply Coupon</button>
                            </div>

@foreach($allcoupon as $allcoupons)
                            <div class="col-sm-12" onclick="doWithThisElements('{{$allcoupons->coupon_code}}')" >
                            <a ><article id="couponclass{{$allcoupons->id}}" onclick="activecoupon({{$allcoupons->id}})" class="couponclass">
      <section class="date">
        <time datetime="23th feb">
          @if($allcoupons->coupon_discount_type == 'Percentage(%)')
          <span>{{$allcoupons->coupon_amount}}% OFF</span>
          @else
          <span>AUD{{$allcoupons->coupon_amount}} Flat </span>
          @endif
        </time>
      </section>
      <section class="card-cont">
      <h2>{{$allcoupons->coupon_code}}</h2>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
       
         <time>
       @if($allcoupons->start_date != 0)

           <span>{{$allcoupons->start_date}} / {{$allcoupons->end_date}}</span>
         
           @else
 <span>All Time Free</span>

           @endif
         </time>
        </div>
       
       
      </section>
    </article>
</a>
 </div>
 @endforeach

<div class="col-sm-12">


  <form action="{{url('agent/payment')}}" method="post" >
  @csrf
  <input type="hidden" value="" id="duration" name="duration">

<input type="hidden" value="" id="package_idss" name="package_id"> 
<p class="paysel">if you don't have a coupon code <button type="submit" class="package" >Click Here</button></p>

  </form>
</div>



                              </div>
                           
                      </div>
                      <br>
                  </div> <br>
                            </form>
                          </div>
  </div>
</div>
 </div>

<script>
  
// Add active class to the current button (highlight it)
var header = document.getElementById("Package-box");
var btns = header.getElementsByClassName("Package1");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active1");
  current[0].className = current[0].className.replace(" active1", "");
  this.className += " active1";
  });
}
</script>
<script>
var header = document.getElementById("Package-box1");
var btns = header.getElementsByClassName("Package2");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active1");
  current[0].className = current[0].className.replace(" active1", "");
  this.className += " active1";
  });
}
</script>
 

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
});

setTimeout(function() {
        $("#successMessage").hide('blind', {}, 500)
    }, 5000);

</script>

<script type="text/javascript">
 $(document).ready(function () {
  $('input[name="duration"]').val('Monthly');
  $( ".tik" ).hide();
  $( ".tik1" ).hide();
  $( ".tik2" ).hide();
   $(".yearly").hide();
   $(".useyear").hide();
 $check  = $('input[type=radio][name="switchPlan"]').change(function() {
           if($(this).val() == 'Yearly'){
              $('input[name="duration"]').val($(this).val());
             $(".monthly").hide();
             $(".yearly").show();
              $(".useyear").show();
               $(".usemonth").hide();
           }else{
           
            $('input[name="duration"]').val('Monthly');
               $(".monthly").show();
             $(".yearly").hide();
              $(".useyear").hide();
              $(".usemonth").show();
           }
      
    });
 
  })

  function doWithThisElement (id) {
  
   $('input[name="package_id"]').val(id);
    }

    

     function div2 (id) {
     var idd = "#activepackage"+id;
     var tikid = ".tik"+id;
     $( ".Package1" ).removeClass( 'active1');
     $(idd).addClass( 'active1');
      $(".tik").hide();
      $(tikid).show();

    }

    function doWithThisElements (id) {
 
 $('input[name="couponcode"]').val(id);
  }


  function activecoupon (id) {
  
   var idd = "#couponclass"+id;
   $(".couponclass" ).removeClass( 'active');
    $(idd).addClass( 'active');
 }





</script>

</body>
</html>