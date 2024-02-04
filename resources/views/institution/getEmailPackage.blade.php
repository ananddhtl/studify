@include('institution.header')
<div class="allmain">
<div class="container" id="serc">
                <div class="row">
                   
    <div class="col-md-12">
      <p class="category">Please select country for package</p>
      <!-- Nav tabs -->
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item" id="tab-sms">
              <a class="nav-link active" data-toggle="tab" id="nepal" href="#profile" role="tab">
                <i class="now-ui-icons objects_umbrella-13"></i> Nepal
              </a>
            </li>
            <li class="nav-item" id="tab-sms">
              <a class="nav-link" data-toggle="tab" id="other" href="#home" role="tab">
                <i class="now-ui-icons shopping_cart-simple"></i> Other
              </a>
            </li>
           
          </ul>
        </div>
        <div class="card-body">
          <!-- Tab panes -->
          <div class="tab-content text-center">
            <div class="tab-pane active" id="home" role="tabpanel">
@foreach($package as $packages)
              <div class="col-md-6 col-xl-4 mt-lg-5 d-flex justify-content-center">
                        <div class="featured-codebox">
                            <a href="">

                            <div class="col-12 pr-0" style="margin-left: -6px;
    margin-top: 8px;
    margin-bottom: 8px;">
                                <div class="fix1"><h5 class="coupon_name" style="font-size:24px; margin:5px 0px 0px 0px;">{{$packages->package_name}}</h5>
                                <p style="font-size:14px; margin:0px;">One-Year Sam�s Club Membership</p>
                                <p style="font-size:13px; margin:0px;">
                                    <i style="font-size:12px" class="fas"></i>
                                    Emails Limit: {{$packages->email_limit}}                                </p>
                               
                                    <p style="font-size:26px; margin:0px; color:green; font-weight: 700;">${{$packages->package_price}}</p>
                                    
                                

                                <p style="font-size:13px; margin:0px;font-weight: 500;">

                                    $90 One-Year Sam�s Club Membership with Auto-Renew                                </p>
                              </div>

                                <div class="fix"><a class="serach-btn" href="{{url('/agent/email-package/payment/'.$packages->id)}}" style="border: 0px; margin-top: 5px; display: block; padding: 10px;" id="nw-add">Buy</a>

</div>

                            </div>
                        </a>
                        </div>
                    </div>


                    @endforeach
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
            @foreach($nepalpackage as $nepalpackages)
              <div class="col-md-6 col-xl-4 mt-lg-5 d-flex justify-content-center">
                        <div class="featured-codebox">
                            <a href="">

                            <div class="col-12 pr-0" style="margin-left: -6px;
    margin-top: 8px;
    margin-bottom: 8px;">
                                <div class="fix1"><h5 class="coupon_name" style="font-size:24px; margin:5px 0px 0px 0px;">{{$nepalpackages->package_name}}</h5>
                                <p style="font-size:14px; margin:0px;">One-Year Sam�s Club Membership</p>
                                <p style="font-size:13px; margin:0px;">
                                    <i style="font-size:12px" class="fas"></i>
                                  Emails Limit: {{$nepalpackages->email_limit}}                                 </p>
                               
                                    <p style="font-size:26px; margin:0px; color:green; font-weight: 700;">${{$nepalpackages->package_price}}</p>
                                   

                                <p style="font-size:13px; margin:0px;font-weight: 500;">

                                {{$nepalpackages->message}}                                </p>
                              </div>

                                <div class="fix"><a class="serach-btn" href="{{url('/institution/email-package/payment/'.$nepalpackages->id)}}" style="border: 0px; margin-top: 5px; display: block; padding: 10px;" id="nw-add">Buy</a>

</div>

                            </div>
                        </a>
                        </div>
                    </div>


                    @endforeach
            </div>
           
           
          </div>
        </div>
      </div>
    </div>


                </div>
            </div>
        </div>

<script>
  $( document ).ready(function() {
    $("#profile").show();
$("#nepal").click(function(){
    $("#profile").show();
    $("#home").hide();
})

$("#other").click(function(){
    $("#profile").hide();
    $("#home").show();
})

  })
  </script>
                