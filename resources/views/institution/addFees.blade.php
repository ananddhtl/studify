 @include('institution.header')

@if(session()->has('deletestudent'))
    <div class="alert alert-success">
        {{ session()->get('deletestudent') }}
    </div>
@endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
<div id="kt_content_container" class="container-xxl">


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <?php if($fees !=''){ ?> 
                            <div class="card-header">
                                <strong class="card-title">Update Fees</strong>
                            </div>
                            <?php } else { ?> 
                             <div class="card-header">
                                <strong class="card-title">Add Fees</strong>
                            </div>
                            <?php } ?>

                            @if(session()->has('courseexit'))
    <div id="alertMessage" class="alert alert-danger">
        {{ session()->get('courseexit') }}
    </div>
@endif
                            <div class="card-body">
                                <?php if($fees !=''){ ?> 
                              

                            <form action="{{url('/fees/update')}}" method="post" class="form-inline py-3" id="bbb">
                              @csrf
                               <input type="hidden" name="id" value="{{$fees->id}}" class="form-control"/>
                          
                          <div class="row fv-row mb-10">
                                <div class="col-6">
                                    <label for="pwd">Selected Course:</label><br>
                                
                               <select class="form-control form-control-lg form-control-solid" name="category" id="category"> 
                               @foreach($course as $category)
                                <option value="{{ $category->id }}" {{$fees->course_id == $category->id  ? 'selected' : ''}}>{{ $category->c_name}}</option>
                               @endforeach
                             </select>
                          </div>

                         <div class="col-6">
                              <label for="pwd">Application Fees:</label><br>
                             
                              <input type="text" name="application" value="{{$fees->application_fees}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                               

                      </div>
                                <div class="row fv-row mb-10">

                              <div class="col-6">
                              <label for="pwd">Tution Fees:</label><br>
                              
                              <input type="text" name="tutionfee" value="{{$fees->tution_fees}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Accomodation & Other Fees:</label><br>
                             
                              <input type="text" name="other" value="{{$fees->acc_other_fees}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                      </div>

                      

                           <div class="col-sm-6" id="dwon">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>


                            </form>

                            <?php }  else { ?> 

                                <form action="{{url('institution/addFees')}}" method="post" class="form-inline py-3" id="bbb">
                              @csrf
                              
                               <div class="row fv-row mb-10">

                               <div class="col-6">
                                    <label for="pwd">Select Course:</label><br>
                                
                               <select class="form-select form-select-solid form-select-lg fw-bold" name="category" id="category"> 
                               @foreach($course as $category)
                                <option value="{{ $category->id }}">{{ $category->c_name}}</option>
                               @endforeach
                               </select>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Application Fees:</label><br>
                             
                              <input type="text" name="application" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>


                             
                   </div>

                            <div class="row fv-row mb-10">

                              <div class="col-6">
                              <label for="pwd">Tution Fees:</label><br>
                              
                              <input type="text" name="tutionfee" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Accomodation & Other Fees:</label><br>
                             
                              <input type="text" name="other" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                      </div>

                      

                           <div class="col-sm-6" id="dwon">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                            </form>
                        <?php } ?>
                            </div>
                        </div>
                   

                    </div>
                </div>
            </div>
            
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
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <script src="{{asset('assets/js/toggle.js')}}"></script>
</body>

</html>
<script>
   $(function() { 
           $('.toggle-class').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  

           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/status/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

setTimeout(function(){
        $("#alertMessage").hide();
        }, 5000);

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>