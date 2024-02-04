@include('agent.header');
            <span id="message_container_display"></span>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" style="margin-bottom: 5%;">
           <div class="card card-flush mt-6 mt-xl-9">
      
                        <div class="card">
                            <div class="card-header mt-5">
                              <div class="card-title flex-column">
                                <strong class="card-title">Storage package</strong>
                              </div>
                              
 

                            </div>

                            
                            <div class="card-body pt-0">
                               
                            @foreach($storagepackage as $storagepackages )
        	<div class="col-md-6 col-xl-4 mt-lg-5 d-flex justify-content-center">
                        <div class="featured-codebox">
                            <a href="">

                            </a><div class="col-12 pr-0" style="margin-left: -6px;
    margin-top: 8px;
    margin-bottom: 8px;"><a href="">
                                <div class="fix1"><h5 class="coupon_name" style="font-size:24px; margin:5px 0px 0px 0px;">{{$storagepackages->package_name}}</h5>
                                <p style="font-size:14px; margin:0px;">One-Year Sam�s Club Membership</p>
                                <p style="font-size:13px; margin:0px;">
                                    <i style="font-size:12px" class="fas"></i>
                                    Storage Limit: {{$storagepackages->storage_limit}}                                 </p>
                               
                                    <p style="font-size:26px; margin:0px; color:green; font-weight: 700;">AUD{{$storagepackages->package_price}}</p>
                                   

                                <p style="font-size:13px; margin:0px;font-weight: 500;">

                                {{$storagepackages->message}}                               </p>
                              </div>

                                </a><div class="fix"><a href="{{url('/agent/storage-package/payment/'.$storagepackages->id)}}"></a><a class="serach-btn" href="{{url('/agent/storage-package/payment/'.$storagepackages->id)}}" style="border: 0px; margin-top: 5px; display: block; padding: 10px;" id="nw-add">Buy Now</a>

</div>

                            </div>
                        
                        </div>
                    </div>
                    @endforeach
                
                   
                </div>
            </div>
    

   
    </div>

  </div>
</div>
            </div>
            <!-- .animated -->
       <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Copyright © Studify</a>
            </li>

        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>

