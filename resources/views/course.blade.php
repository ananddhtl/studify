<!DOCTYPE html>
<html lang="en">
<head>
  <title>Academy page</title>
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

<section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3" id="couresall">
        
    </section>
    <section class="container mt-md-4" id="couresall">
        <h2 class="h2 mb-2 pb-3 text-center"><span class="font-weight-400">Studify Courses</span></h2>
        <div class="row align-items-center">

        @foreach($course as  $courses)
            <div class="col-lg-4 col-md-4 col-sm-12 col-12  p-2" id="boxcoures">
              <div class="fix-img">
                <img src="{{asset('/public/CourseImage/'.$courses->image)}}" alt="" class="img-fluid mb-31">
              </div>
                
                <p class="showpp"><span class="price3"><b class="back">{{$courses->course_name}}</b></span>


                  <span class="price1">
                  
                    <b style="color: red;">${{$courses->discount_prize}}</b><br>
                    <b style="color: #000; font-size: 10px;"><s>${{$courses->course_prize}}</s></b>
                </span>
                </p>
                
                
                

                    <p class="kk"><?php $text = strip_tags($courses->course_description); $desc = Str::limit($text, 100); ?>
{{$desc}}</p>
                </p>
                 <div class="mainprice">
                

                  <div class="dis1">
                  <span class="price">

                    <p>  <i class="fa fa-book" aria-hidden="true"></i> Topics:
    @php
               $topic = App\Models\addCourseTopic::where(['course_id' => $courses->id])->get();
               $topics = $topic->count();
    @endphp
    @if($topics)
                    <b>{{$topics}}</b>
                    @else
                    <b>0</b>
                    @endif

                  </p>
                  </span>
                </div>
                 <div class="trainer-rank d-flex">
                 @php
               $coursebuy = App\Models\studentCourse::where(['course_id' => $courses->id])->where(['payment_status' =>'1'])->get();
               $count = $coursebuy->count();
               @endphp
         @if($count)
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{$count}}
                    &nbsp;&nbsp;
                    @else
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;0
                    &nbsp;&nbsp;
                    @endif
                  <i class="fa fa-heart" aria-hidden="true"></i>&nbsp;65
                  </div>
            </div>
            <a href="{{url('/course/topic/'.$courses->id)}}" class="btn btn-primary rounded-pill mx-sm-auto"  id="cenbuy">View Topics</a>
         
            </div>
            @endforeach
    </div>
    </section>



</main>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content1" style="width: 100%;">
    <div class="modal-content" id="widthtop" style="width: 80%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="#" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                  <div class="row fv-row">
                                <div class="row">
                              
                              <div class="col-sm-6">
                              <a href="{{url('/member/login')}}" class="packge">Login</a>
                            </div>
<div class="col-sm-6">
                                <a href="{{url('/member/register')}}" class="coureslogin">Register</a>
                              </div>
                              </div>
                           </div>
                      </div>
                      <br>
                  </div> <br>
                            </form>
                          </div>
  </div>
</div>




    </div><!-- /#right-panel -->



@include('layout.footer')

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
});</script>
</body>
</html>   
   