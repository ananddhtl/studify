<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faq page</title>
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
                    <h1 class=" mt-lg-5 pb-2  display-1 text-light">FAQ</h1>
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                </div>
            </div>
        </div>
    </section>
     <!-- <section class="container-fluid mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 course-list-block bg-blue-light">
        <div class="container student-faq">
           
            
  <div class="tabsContainer" style="display: contents;">
  <a href="#demo1" class="btn btn-info"  data-toggle="collapse" id="show" style="padding: 10px;"> Student Services FAQ
    <img class="icon-right"  id="shows" src="{{asset('assets/images/82_Add-512.webp')}}">
     <img class="icon-right"  id="hide" src="{{asset('assets/images/free-minus-icon-3108-thumb.png')}}">
 </a>
 
  <div id="demo1" class="collapse">
   <div class="accordion-body"><p>ApplyBridge is a one-stop solution&nbsp;for all your queries related to studying abroad search. You can find the best educational opportunities using our AI and Machine learning search engine. You can visit&nbsp;our website (<a href="index.html">index.html</a>)&nbsp; and click on the search menu or AppyBridge to learn more.</p>

<p>&nbsp;</p>
                                </div>
      
 </div>
</div>
<div class="tabsContainer" style="display: contents;">
  <a href="#demo2" class="btn btn-info" data-toggle="collapse" id="show" style="padding: 10px;"> Counselor FAQ
     <img class="icon-right"  id="shows1" src="{{asset('assets/images/82_Add-512.webp')}}">
     <img class="icon-right"  id="hide1" src="{{asset('assets/images/free-minus-icon-3108-thumb.png')}}" >
 </a>
  <div id="demo2" class="collapse">
    <div class="accordion-body"><p>ApplyBridge is a one-stop solution&nbsp;for all your queries related to studying abroad search. You can find the best educational opportunities using our AI and Machine learning search engine. You can visit&nbsp;our website (<a href="index.html">index.html</a>)&nbsp; and click on the search menu or AppyBridge to learn more.</p>

<p>&nbsp;</p>
                                </div>
      
 </div>
</div>
<div class="tabsContainer" style="display: contents;">
  <a href="#demo3" class="btn btn-info" data-toggle="collapse" id="show" style="padding: 10px;">Institution FAQ
    <img class="icon-right"  id="shows2" src="{{asset('assets/images/82_Add-512.webp')}}">
     <img class="icon-right"  id="hide2" src="{{asset('assets/images/free-minus-icon-3108-thumb.png')}}">
 </a>
  <div id="demo3" class="collapse">
   <div class="accordion-body"><p>ApplyBridge is a one-stop solution&nbsp;for all your queries related to studying abroad search. You can find the best educational opportunities using our AI and Machine learning search engine. You can visit&nbsp;our website (<a href="index.html">index.html</a>)&nbsp; and click on the search menu or AppyBridge to learn more.</p>

<p>&nbsp;</p>
                                </div>
      
 </div>
</div>


</div>


</section> -->
<section class="container-fluid py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3 course-list-block bg-blue-light">
        <div class="container student-faq">
<div id="exTab3" class="container"> 
<ul  class="nav nav-pills">
      <li class="active">
        <a  href="#1b" data-toggle="tab">Students</a>
      </li>
      <li><a href="#2b" data-toggle="tab">Agents</a>
      </li>
      <li><a href="#3b" data-toggle="tab">Institutions</a>
      </li>
     
    </ul>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">
<ul class="m-d expand-list">
  <li data-md-content="200">
    <label name="tab" for="tab1" tabindex="-1" class="tab_lab" role="tab">What is the cost of studying abroad?</label>
    <input type="checkbox" checked class="tab" id="tab1" tabindex="0" />
    <span class="open-close-icon">
      <i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i>
    </span>
    <div class="content">
            The cost of studying abroad depends upon the country, university and course you choose. Every country has different fees structure and that totally depends upon you what you want to choose.
        </div>
    </li>
    <li data-md-content="300">
      <label name="tab" for="tab2" tabindex="-1" class="tab_lab" role="tab">What are the money saving options while studying abroad?</label>
      <input type="checkbox" class="tab" id="tab2" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        You can save a good amount of money while studying abroad. That totally depends on you that which lifestyle you choose and what are your expenses. If you make balance between your earning and expense saving a good amount is not a big deal.
        </div>
    </li>
    <li data-md-content="600">
      <label name="tab" for="tab3" tabindex="-1" class="tab_lab" role="tab">                                   Am I eligible for scholarship?
</label>
      <input type="checkbox" class="tab" id="tab3" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        There are many scholarship programs in different collages. Globally approximately millions dollar worth of scholarship is awarded. It depends upon the country and the collage you choose to study.
      </div>
    </li>
    <li data-md-content="600">
      <label name="tab" for="tab4" tabindex="-1" class="tab_lab" role="tab">                                   What is the duration of courses in abroad?
</label>
      <input type="checkbox" class="tab" id="tab4" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        The duration of courses depends upon the type of program you like to choose if it is a undergraduate program it may be of three to four years. Post-graduation program is of 1.5 to 2.5 years and PHD programs are of 3.5 years.
      </div>
    </li>
</ul>


        </div>
        <div class="tab-pane" id="2b">
   <ul class="m-d expand-list">
  <li data-md-content="200">
    <label name="tab" for="tab1" tabindex="-1" class="tab_lab" role="tab"> What are your setup costs?</label>
    <input type="checkbox" checked class="tab" id="tab1" tabindex="0" />
    <span class="open-close-icon">
      <i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i>
    </span>
    <div class="content">
           There are no setup costs. You will be able to set up your own company and fully customise it to suit your agency by following our complete instructional guide.
        </div>
    </li>
    <li data-md-content="300">
      <label name="tab" for="tab2" tabindex="-1" class="tab_lab" role="tab">                                  How do I sign up to Studify
</label>
      <input type="checkbox" class="tab" id="tab2" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        Click the ‘Registration’ button in the top right corner of the screen. This will take you to a page where you can select a plan and complete the registration.
        </div>
    </li>
    <li data-md-content="300">
      <label name="tab" for="tab3" tabindex="-1" class="tab_lab" role="tab">                                 How long does it takes for our agency to start processing enquiries after payment?
</label>
      <input type="checkbox" class="tab" id="tab3" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
       Our fully automated and rapid setup gets you up and running in hours.
        </div>
    </li>
    <li data-md-content="300">
      <label name="tab" for="tab4" tabindex="-1" class="tab_lab" role="tab">                                  Where is your company located?
</label>
      <input type="checkbox" class="tab" id="tab4" tabindex="0" />
      <span class="open-close-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i></span>
      <div class="content">
        We are in Sydney, Australia
        </div>
    </li>
    
</ul>

        </div>
        <div class="tab-pane" id="3b">
      <ul class="m-d expand-list">
  <li data-md-content="200">
    <label name="tab" for="tab1" tabindex="-1" class="tab_lab" role="tab">What are your setup costs?</label>
    <input type="checkbox" checked class="tab" id="tab1" tabindex="0" />
    <span class="open-close-icon">
      <i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i>
    </span>
    <div class="content">
           There are no setup costs. You will be able to set up your own company and fully customise it to suit your institution by following our complete instructional guide.
        </div>
    </li>
    
    
</ul>

          
      </div>
  </div>


  </div>


  
</section>




</main>

<!-- / Main content: .page-wrapper -->
<!-- Footer -->
@include('layout.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main theme script-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $("#hide").hide();
  $("#shows").click(function () {
    
    $("#shows").hide();
    $("#hide").show();
  })
})
 $("#hide").click(function () {
   $("#shows").show();
    $("#hide").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide1").hide();
  $("#shows1").click(function () {
    
    $("#shows1").hide();
    $("#hide1").show();
  })
})
 $("#hide1").click(function () {
   $("#shows1").show();
    $("#hide1").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide2").hide();
  $("#shows2").click(function () {
    
    $("#shows2").hide();
    $("#hide2").show();
  })
})
 $("#hide2").click(function () {
   $("#shows2").show();
    $("#hide2").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide3").hide();
  $("#shows3").click(function () {
    
    $("#shows3").hide();
    $("#hide3").show();
  })
})
 $("#hide3").click(function () {
   $("#shows3").show();
    $("#hide3").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide4").hide();
  $("#shows4").click(function () {
    
    $("#shows4").hide();
    $("#hide4").show();
  })
})
 $("#hide4").click(function () {
   $("#shows4").show();
    $("#hide4").hide();
})


  </script>
   <script>
  $(document).ready(function() {
    $("#hide5").hide();
  $("#shows5").click(function () {
    
    $("#shows5").hide();
    $("#hide5").show();
  })
})
 $("#hide5").click(function () {
   $("#shows5").show();
    $("#hide5").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide6").hide();
  $("#shows6").click(function () {
    
    $("#shows6").hide();
    $("#hide6").show();
  })
})
 $("#hide6").click(function () {
   $("#shows6").show();
    $("#hide6").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide7").hide();
  $("#shows7").click(function () {
    
    $("#shows7").hide();
    $("#hide7").show();
  })
})
 $("#hide7").click(function () {
   $("#shows7").show();
    $("#hide7").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide8").hide();
  $("#shows8").click(function () {
    
    $("#shows8").hide();
    $("#hide8").show();
  })
})
 $("#hide8").click(function () {
   $("#shows8").show();
    $("#hide8").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide9").hide();
  $("#shows9").click(function () {
    
    $("#shows9").hide();
    $("#hide9").show();
  })
})
 $("#hide9").click(function () {
   $("#shows9").show();
    $("#hide9").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide10").hide();
  $("#shows10").click(function () {
    
    $("#shows10").hide();
    $("#hide10").show();
  })
})
 $("#hide10").click(function () {
   $("#shows10").show();
    $("#hide10").hide();
})


  </script>
  <script>
  $(document).ready(function() {
    $("#hide11").hide();
  $("#shows11").click(function () {
    
    $("#shows11").hide();
    $("#hide11").show();
  })
})
 $("#hide11").click(function () {
   $("#shows11").show();
    $("#hide11").hide();
})


  </script>
</body>
</html>