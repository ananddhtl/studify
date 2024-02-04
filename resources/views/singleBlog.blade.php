<!DOCTYPE html>
<html lang="en">
<head>
  <title>Studify</title>
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
<!-- Main content-->
<!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
<main class="page-wrapper position-relative">

@include('layout.header')

        <!-- blog page starts -->
   <section class="bg-secondary py-3 py-sm-grid-gutter blog-header">
        <div class="container py-grid-gutter">
            <ul class="nav nav-muted mb-2">
                <li class="nav-item me-2">
                    <a class="nav-link d-inline-block me-2 p-0 fw-normal" href="javascript:void(0);">
                        Learning
                    </a>
                    <span class="text-border">|</span>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link d-inline-block me-2 p-0 fw-normal" href="javascript:void(0);">
                      @if($blogDetail)
                       {{$blogDetail->created_at->format('d M, Y')}}
                       @endif
                      
                    </a>
                </li>
            </ul>  @if($blogDetail)
            <h1 class="col-lg-8 col-md-10 mb-3 px-0 pb-1">{{$blogDetail->blog_heading}}</h1>
            @else
            <h1 class="col-lg-8 col-md-10 mb-3 px-0 pb-1">--</h1>

            @endif
        </div>
    </section>
    <!-- main blog single article section -->
    <section class="container mt-grid-gutter mb-lg-6 mb-5 py-2 pb-lg-0 pt-sm-grid-gutter">
        <div class="row">

            <!-- Content -->
            <div class="col-lg-8">
            @if($blogDetail)
              <img class="mb-sm-5 mb-grid-gutter rounded" src="{{asset('public/BlogImage/'.$blogDetail->blog_image)}}">
              @else
              --
              @endif
                <div class="d-flex justify-content-between mt-grid-gutter pt-sm-grid-gutter">
                    <div class="widget">
                    @if($blogDetail)
                     {!!$blogDetail->blog_description!!}    
                     @else
--
                     @endif

                    <div style="float: right;" class="icon-dropdown icon-dropstart mb-sm-0 mb-2">
                        <a class="btn-social bs-outline rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Share">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </a>
                        <ul class="icon-drop-menu bg-light">
                            <li class="icon-drop-item">
                                <a href="#" class="btn-social bs-outline rounded-circle">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="icon-drop-item">
                                <a href="#" target="_blank" class="btn-social bs-outline rounded-circle">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="icon-drop-item">
                                <a href="#" target="_blank" class="btn-social bs-outline rounded-circle">
                                     <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="icon-drop-item">
                                <a href="#" target="_blank" class="btn-social bs-outline rounded-circle">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="col-lg-4">
                <div class="offcanvas offcanvas-collapse offcanvas-end ps-lg-4 ps-xl-5" id="blog-sidebar">

                    <div class="offcanvas-body pt-4 pt-lg-0" data-simplebar="init" data-simplebar-auto-hide="true">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                        <div class="simplebar-content" style="padding: 0px;">

                                            <!-- Search -->
                                            
                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                            

                                            <!-- Widget: Author -->
                                            <div class="widget mb-sm-grid-gutter mb-4 pb-2 pb-lg-grid-gutter">
                                                <h3 class="h3 mb-4 color-blue">Author</h3>
                                                <div class="d-flex align-items-start">
                                                    <img class="d-inline-block rounded-circle me-1 mb-3" src="{{asset('assets/images/fav.png')}}" width="100">
                                                    <div class="ps-3">
                                                        <h4 class="h5 mb-1">Studify</h4>
                                                        <p class="mb-3 fs-sm text-muted">Admin</p>
                                                        <a class="btn-social bs-solid rounded-circle me-2 mb-2" href="#" target="_blank">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                        </a>
                                                        <a class="btn-social bs-solid rounded-circle me-2 mb-2" href="#" target="_blank">
                                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                                        </a>
                                                        <a class="btn-social bs-solid rounded-circle me-2 mb-2" href="#" target="_blank">
                                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" class="btn-social bs-solid rounded-circle me-2 mb-2" target="_blank">
                                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                                        </a>
                                                        <a class="btn-social bs-solid rounded-circle mb-2" href="#" target="_blank">
                                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Widget: Featured entries list -->
                                            <div class="widget  mb-4 pb-2 ">
                                                <h3 class="h3 mb-4 color-blue">Featured posts</h3>

                                                <ul class="list-unstyled">
                                                    

                                               @foreach($allblog as $allblogs)
                                                     <li class="row gx-0 mb-4">
                                                        <div class="col-6 img-squareRound">
                                                            <a class="flex-shrink-0 me-3" href="#">
                                                             <img src="{{asset('public/BlogImage/'.$allblogs->blog_image)}}" >
                                                              </a>
                                                        </div>
                                                        <div class="col-6 ps-1 ms-3">
                                                            <span class="d-block mb-1 fs-sm text-muted">{{$allblogs->created_at->format('d M, Y')}}</span>
                                                            <h4 class="h6 mb-1 nav-dark fs-6">
                                                                @php
                                                             $title = str_replace(' ', '-', $allblogs->blog_heading);
                                                                @endphp
                                                                <a class="nav-link fw-bold" href="{{url('blog-details/'.$title)}}">{{$allblogs->blog_heading}}</a>
                                                            </h4>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                                                                         
                                                                                                                                                            </ul>
                                            </div>
                                            <!-- Widget: Social buttons -->
                                            <div class="widget mb-sm-grid-gutter mb-4 pb-2 pb-lg-grid-gutter">
                                                <h3 class="h3 mb-4 color-blue">Social media</h3>
                                                <a href="#" class="btn-social bs-solid rounded-circle me-2">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn-social bs-solid rounded-circle me-2">
                                                      <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn-social bs-solid rounded-circle me-2">
                                                     <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                                <a href="3" class="btn-social bs-solid rounded-circle me-2">
                                                   <i class="fa fa-youtube" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn-social bs-solid rounded-circle me-2">
                                                   <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: auto;"></div>
                        </div>


                    </div>
                </div>
            </aside>
            <!--  / Sidebar -->
        </div>
        <!--  / row -->
    </section>
    <!-- blog section ends here -->

</main>
@include('layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main theme script-->
</body>
</html>