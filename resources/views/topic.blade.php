<!DOCTYPE html>
<html lang="en">

<head>
    <title>Study-in-Australia page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="60x60"
        href="{{ asset('assets/images/fav.png') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="96x96"
        href="{{ asset('assets/images/fav.png') }}">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="60x60"
        href="{{ asset('assets/images/fav.png') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<style>
  input#couponcode {
    width: 100%;
    border: 1px solid #ccc;
    padding: 8px 3px;
    border-radius: 3px;
}
span.det {
    float: left;
    color: #101010;
    font-size: 16px;
    font-weight: 600;
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


@media screen and (max-width: 860px) {
    .card {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    p.paysel {
    font-size: 18px !important;
    color: #000;
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
.card-cont {
    display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 13px 18px;
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
p.paysel {
    font-size: 20px;
    color: #000;
}
</style>
</head>
<body class="institute-modal">
<main class="page-wrapper position-relative">

@include('layout.header')

<section class="container mt-md-4 py-lg-5 pt-5 pb-sm-5 pb-4 px-0 px-sm-3" id="couresall">
        
    </section>
    <section class="container mt-md-4" id="couresall">
      <div class="button-cen">
      @php
            $student_id = Session::get('student_iddd');
               $topicsss = App\Models\studentCourse::where(['course_id' => $course->id])->where(['member_id' => $student_id])->where(['payment_status' =>'1'])->first();
            @endphp

              @if ($topicsss)
        <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a href="{{ url('/student/get-course-topic/' . $id) }}">View Course</a></button></h6>
        @else
            @if (Session::get('login') != '')
                         @if (Session::get('login') == 'student')
                         <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a data-toggle="modal" data-target="#applycoupon" style="color: #fff;">Buy Now</a></button></h6>

          <!-- <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a href="{{ url('/course-payment/' . $course->id) }}" style="color: #fff;">Buy Now</a></button></h6> -->
                   @else
                   <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a data-toggle="modal" data-target="#exampleModalCenter" style="color: #fff;">Buy Now</a></button></h6>
          @endif  
        @else
        <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a data-toggle="modal" data-target="#exampleModalCenter" style="color: #fff;">Buy Now</a></button></h6>
       @endif

       @endif
      </div>
        

     
        <div class="row align-items-center">
          
         <div class="col-lg-8 p-2" id="coureslist">

              <ul class="m-d expand-list">
                @php $i = 1;  @endphp
                @foreach ($topic as $topics)
  <li onclick="myFunction('topic','1')"  data-md-content="200">
    <label name="tab" for="tab1"  tabindex="-1" class="tab_lab" role="tab">Topic {{ $i++ }}: {{ $topics->topic_name }}</label>
    <input type="checkbox"  class="tab" id="tab1" tabindex="0" />
    <span class="open-close-icon">
      <i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-minus" aria-hidden="true"></i>
    </span>
    <div class="content">
           <ul class="courelist2">
            @php 
             $chapter = App\Models\addCourseChapter::where(['topic_id' => $topics->id])->get();
            @endphp
            @php
            $j = '1';
            @endphp 
            @foreach ($chapter as $chapters)
          <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Lesson  {{ $j++ }}: <a >{{ $chapters->chapter_name }}</a></li> @endforeach
              </ul>
        </div>
    </li>
  @endforeach
   </ul>
</div>
  </div>
</section>
<div class="modal
        fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content1" style="width: 100%;">
            <div class="modal-content" id="widthtop" style="width: 80%; margin-left: 10%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <form method="POST" action="#" accept-charset="UTF-8"
                    class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                    id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="w-100" id="top">
                        <div class="row fv-row">
                            <div class="row">

                                <div class="col-sm-6">
                                    <a href="{{ url('/member/login') }}" class="packge">Login</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ url('/member/register') }}" class="coureslogin">Register</a>
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

    <div class="modal fade" id="applycoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content1" style="width: 100%;">
                <div class="modal-content" id="widthtop" style="width: 100%; margin-left: 10%;">
                    <div class="modal-header">
                        Apply Coupon

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form action="{{ url('/course-payment/' . $course->id) }}" accept-charset="UTF-8"
                        class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework"
                        id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="w-100" id="top">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label><b>Enter Coupon Code</b></label>
                                </div>
                                <div class="col-sm-6"></div>

                                <div class="col-sm-8"><input type="text" name="couponcode" value="Enter Coupon Code"
                                        id="couponcode"><br>
                                    @if ($errors->has('couponcode'))
                                        <div class="error">{{ $errors->first('couponcode') }}</div>
                                    @endif
                                    <input type="hidden" name="course_id" value="{{ $course->id }}"
                                        id="couponcodeid">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="package">Apply Coupon</button>
                                </div>

                                @foreach ($allcoupon as $allcoupons)
                                    <div class="col-sm-12"
                                        onclick="doWithThisElement('{{ $allcoupons->coupon_code }}')">
                                        <a>
                                            <article id="couponclass{{ $allcoupons->id }}"
                                                onclick="activecoupon({{ $allcoupons->id }})" class="couponclass">
                                                <section class="date">
                                                    <time datetime="23th feb">
                                                        @if ($allcoupons->coupon_discount_type == 'Percentage(%)')
                                                            <span>{{ $allcoupons->coupon_amount }}% OFF</span>
                                                        @else
                                                            <span>AUD{{ $allcoupons->coupon_amount }} Flat </span>
                                                        @endif
                                                    </time>
                                                </section>
                                                <section class="card-cont">
                                                    <h2>{{ $allcoupons->coupon_code }}</h2>
                                                    <div class="even-date">
                                                        <span class="det">Duration:-</span>
                                                        <br>

                                                        <time>
                                                            @if ($allcoupons->coupon_duration == 'all_time_free')
                                                                <span>All Time Free</span>
                                                                <span></span>
                                                            @else
                                                                <span>Start Date: {{ $allcoupons->start_date }}</span>
                                                                <span>End Date: {{ $allcoupons->end_date }}</span>
                                                            @endif
                                                        </time>
                                                    </div>


                                                </section>
                                            </article>
                                        </a>
                                    </div>
                                @endforeach

                            </div>

                            <!-- <h6 class="h2 mb-2 pb-3"><span class="font-weight-600">{{ $course->course_name }}</span><button class="coure"><a href="{{ url('/course-payment/' . $course->id) }}" style="color: #fff;">Buy Now</a></button></h6> -->

                            <p class="paysel">If you dont have any coupon code than, select the payment type<br>
                                <button type="submit" class="package"><a
                                        href="{{ url('/course-payment/' . $course->id) }}" style="color:white;"
                                        class="package">Stripe</a></button><button type="submit" class="package"><a
                                        href="{{ url('/course-payment/' . $course->id) }}" style="color:white;"
                                        class="package">Stripe</a></button> </p>
                        </div>
                        <br>
                </div> <br>
                </form>
            </div>
        </div>
    </div>




    </div>


    @include('layout.footer')

    <script src="{{ asset('assets/js/script.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/polyfills.min.js') }}"></script>

    <!-- Main theme script-->



    <script>
        function doWithThisElement(id) {

            $('input[name="couponcode"]').val(id);
        }


        function activecoupon(id) {

            var idd = "#couponclass" + id;
            $(".couponclass").removeClass('active');
            $(idd).addClass('active');
        }


        function myFunction(t, n) {
            var g = t + n;
            // get all Divs
            document.getElementById("g").style.display = 'block';

        }

        $(document).ready(function() {
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
    </script>


    </body>

</html>
