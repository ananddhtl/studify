<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog page</title>
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

<!-- first-section-->
    <!-- Hero-->
   <section class="jarallax d-flex align-items-stretch overflow-hidden pt-5 ab-home-banner-bg" data-jarallax="" data-speed="0.5">
        
        <div class="container d-flex flex-column justify-content-around pt-5 pt-sm-5">
            <div class="row ">
                <div class="col-lg-6 col-md-5 text-md-start text-center my-auto pt-sm-5">

                    <h2 class="mb-lg-5 mb-4 pb-2  display-1 text-light"><span class="text-primary font-weight-700"><a href="#">Studify </a></span>Blog</h2>
                    <h6 class="mb-5">Tips, advice, and updates to help you across every step of the study abroad journey.</h6>
                    <!-- <a href="#" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View All Articles</a> -->
                </div>
                <div class="col-lg-6 col-md-7 pb-3 text-end">
                    <img src="{{asset('assets/images/blogfinal2.png')}}" alt="Layer" height="300" width="300" id="blogrightimg">
                </div>
            </div>
        </div>
</section>
<section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3">
        <h2 class="display-5 font-weight-700 text-center">Recent Articles</h2>
    <div class="section13">
    <div class="container">
      <div class="row">

        @foreach($blog as $blogs)
        <div class="col-sm-4">
          <div class="box-12">
            <img src="{{asset('public/BlogImage/'.$blogs->blog_image)}}" class="mgng1">
            <p class="Easter">{{$blogs->blog_heading}}</p>
            <p class="desigmn">{{$blogs->created_at->format('d M, Y')}}</p>
            @php 
                                  $title =  str_replace(' ', '-', $blogs->blog_heading);
                                    @endphp
            <a href="{{url('blog-details/'.$title)}}" class="ancer1">Read More</a>             
           <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </div>
        </div>
        @endforeach
         
      </div>
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