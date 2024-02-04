<!DOCTYPE html>
<html lang="en">
<head>
  <title>universitiesApplyCouresPayment page</title>
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
    <body class="institute-modal">
<main class="page-wrapper position-relative">
@include('layout.header')
<section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3" id="couresall">
        
    </section>
    <section class="container mt-md-4" id="couresall">
<div class="row align-items-center pb-lg-0">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-left">
              
                
                    <b>UNIVERSITIES</b>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                

                   <b>APPLIED PROGRAMS</b>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                
                    <b>APPLICATION FEES</b>
            </div>
            <hr class="bottm">
        </div>

<div class="row align-items-center pb-lg-0 pt-3" style="
margin-top: 10px;">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-left">
              
                <img src="https://studify.au/assets/images/university-icon-circle.svg" alt="university" class="me-1 d-inline-block" style="padding: 10px;
    width: 60px;">
                <br>
                @php
                $univertisyname = App\Models\addInstitution::where(['id' => $insitutionid])->first();
                @endphp

                    <b>{{$univertisyname->universirty_name}}</b>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
            @php
                $course = App\Models\addCoursesModel::where(['id' => $courseid])->first();
                @endphp

                   <b>{{$course->c_name}}</b>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                
                    <b>Application Fees(USD):${{$fees}}</b>
            </div>
            <hr class="bottm">
        </div>
        <div class="row align-items-center pb-lg-0 pt-3" style="
margin-top: 10px;">
<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-left">
<strong>Payment Methods</strong>
<br>
<div class="form-check" id="mm"><a href="{{url('university-course-fees/'.$insitutionid.'/'.$courseid)}}">
<input type="checkbox" id="stripe" name="tab" value="igotnone" checked onclick="show1();" />
 <i class="fa fa-credit-card"></i>  Stripe Payment</a>
 <br>
</div>
<div class="form-check" id="nn">
<input type="checkbox" id="offline"  name="tab" value="igottwo" onclick="show2();" />
 <i class="fa fa-credit-card"></i>  Offline Payment
<div id="div1" class="hide">
  <hr><p><span>Name:aaaaaaaa</span><br>
  <span>Account No:111111111111</span><br>
  <span>Bank Name:xxxxxxxxx</span>
  <form method="POST" action="{{url('offline-university-fees')}}" accept-charset="UTF-8"  novalidate="novalidate" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="insitutionid" value="{{$insitutionid}}" >
  <input type="hidden" name="courseid" value="{{$courseid}}" >
  <input type="hidden" name="price" value="{{$fees}}" >

  <label for="myfile">Upload Your Payment Slip and Connect to Administrator:</label>
  <input type="file" id="myfile" name="myfile" multiple><br><br>
  @if ($errors->has('myfile'))
                            <span class="text-danger">{{ $errors->first('myfile') }}</span><br><br>
                        @endif
  <button class="but" type="submit" value="Submit">Submit</button>
</form>



</div>


</div>
</div>
</section>
</main>



@include('layout.footer')

<!-- / Main content: .page-wrapper -->
<!-- Footer -->


<!-- Start of HubSpot code snippet -->

 <script type="text/javascript">
        $("#u_sorting_order").change(function(){
          
         var sort = ($(this).val());
             window.location.href = "https://studify.au/university/searchs/"+sort;
            
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">

</script>

</body>
</html>   
   <script type="text/javascript">function show1(){
     $('#offline').prop('checked', false);
  document.getElementById('div1').style.display ='none';
}
function show2(){
  $('#stripe').prop('checked', false);
  document.getElementById('div1').style.display = 'block';
 
}</script>