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
                <?php if($requirement !=''){ ?> 
                            <div class="card-header">
                                <strong class="card-title">Update Requirements</strong>
                            </div>
                            <?php } else { ?> 
                             <div class="card-header">
                                <strong class="card-title">Add Requirements</strong>
                            </div>
                            <?php } ?>

                             @if(session()->has('courseexit'))
    <div id="alertMessage" class="alert alert-danger">
        {{ session()->get('courseexit') }}
    </div>
@endif
                            <div class="card-body">
                                <?php if($requirement !=''){ ?> 
                              

                            <form action="{{url('/requirement/update')}}" method="post" class="form-inline py-3" id="bbb">
                              @csrf
                               <input type="hidden" name="id" value="{{$requirement->id}}" class="form-control"/>
                              
                              <div class="row fv-row mb-10">
                               <div class="col-6">
                               <label for="pwd">Selected Course:</label>
                                
                               <select name="category" class="form-select form-select-solid form-select-lg fw-bold" id="category"> 
                               @foreach($course as $category)
                                <option value="{{ $category->id }}" {{$requirement->course_id == $category->id  ? 'selected' : ''}}>{{ $category->c_name}}</option>
                               @endforeach
                              </select>
                          </div>

                           <div class="col-6">
                                    <label for="pwd">Selected Degree Type:</label>
                                
                               <select name="type" class="form-select form-select-solid form-select-lg fw-bold"  id="category"> 
                              <?php if($requirement->type == "Bachelor"){ ?>
                                <option value="Bachelor" selected>Bachelor</option>
                            <?php } else { ?> 
                              <option value="Bachelor">Bachelor</option>
                          <?php   } ?>
                           <?php if($requirement->type == "Master"){ ?>
                                <option value="Master" selected>Master</option>
                            <?php } else { ?> 
                              <option value="Master">Master</option>
                          <?php   } ?>

                          <?php if($requirement->type == "Diploma"){ ?>
                                <option value="Diploma" selected>Diploma</option>
                            <?php } else { ?> 
                              <option value="Diploma">Diploma</option>
                          <?php   } ?>
                          <?php if($requirement->type == "Phd"){ ?>
                                <option value="Phd" selected>Phd</option>
                            <?php } else { ?> 
                              <option value="Phd">Phd</option>
                          <?php   } ?>

                          <?php if($requirement->type == "Certificates"){ ?>
                                <option value="Certificates" selected>Certificates</option>
                            <?php } else { ?> 
                              <option value="Certificates">Certificates</option>
                          <?php   } ?>
                           </select>
                          </div>
                      </div>

                               <div class="row fv-row mb-10">
                              <div class="col-6">
                              <label for="pwd">Minimum GPA:</label>
                              
                              <input type="text" name="mini_gpa" value="{{$requirement->min_gpa}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Education:</label>
                              
                              <input type="text" name="education" value="{{$requirement->education}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>
                      </div>

                            <div class="row fv-row mb-10">
                             <div class="col-6">
                              <label for="pwd">TOEFL:</label>
                              
                              <input type="text" name="toefl" value="{{$requirement->TOEFL}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>


                              <div class="col-6">
                              <label for="pwd">IELTS:</label>
                              
                              <input type="text" name="ielts" value="{{$requirement->IELTS}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>
                      </div>

                      <div class="row fv-row mb-10">

                           <div class="col-6">
                              <label for="pwd"> Pearson:</label>
                              
                              <input type="text" name="pearson" value="{{$requirement->Pearson}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd"> Duolingo:</label>
                              
                              <input type="text" name="duolingo" value="{{$requirement->Duolingo}}" class="form-control form-control-lg form-control-solid"/><br>
                          </div>
                      </div>

                           <div class="col-sm-6" id="dwon">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                            </form>

                            <?php }  else { ?> 
                                <form action="{{url('institution/addrequirements')}}" method="post" class="form-inline py-3" id="bbb">
                              @csrf
                              
                              <div class="row fv-row mb-10">
                            <div class="col-6">
                                    <label for="pwd">Select Course:</label><br>
                               <select name="category" class="form-select form-select-solid form-select-lg fw-bold" id="category"> 
                               @foreach($course as $category)
                                <option value="{{ $category->id }}">{{$category->c_name}}</option>
                               @endforeach
                             </select>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Select Degree Type:</label><br>
                              <select name="type" class="form-select form-select-solid form-select-lg fw-bold"  id="category"> 
                                  <option value="Certificates">Certificates</option>
                                 <option value="Diploma">Diploma</option>
                                 <option value="Bachelor">Bachelor</option>
                                 <option value="Master">Master</option>
                                 <option value="phd">Phd</option>
                             </select>
                          </div>
                      </div>


                            <div class="row fv-row mb-10">
                              <div class="col-6">
                              <label for="pwd">Minimum GPA:</label><br>
                              
                              <input type="text" name="mini_gpa" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd">Education:</label><br>
                             
                              <input type="text" name="education" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>
                      </div>

                      <div class="row fv-row mb-10">

                           <div class="col-6">
                              <label for="pwd">TOEFL:</label><br>
                              <input type="text" name="toefl" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>


                              <div class="col-6">
                              <label for="pwd">IELTS:</label><br>
                              <input type="text" name="ielts" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>
                      </div>

                            <div class="row fv-row mb-10">
                              <div class="col-6">
                              <label for="pwd"> Pearson:</label><br>
                              <input type="text" name="pearson" value="" class="form-control form-control-lg form-control-solid"/><br>
                          </div>

                           <div class="col-6">
                              <label for="pwd"> Duolingo:</label><br>
                              
                              <input type="text" name="duolingo" value="" class="form-control form-control-lg form-control-solid"/><br>
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