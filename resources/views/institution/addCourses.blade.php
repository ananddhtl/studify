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
                <?php if($course !=''){ ?>
                            <div class="card-header">
                                <strong class="card-title">Update Courses</strong>
                            </div>

                        <?php } else { ?> 
                        <div class="card-header">
                                <strong class="card-title">Add Courses</strong>
                            </div>
                        <?php } ?>
                           
                           @if(session()->has('courseexit'))
    <div class="alert alert-danger" style="border: none; margin-left:10px;">
        {{ session()->get('courseexit') }}
    </div>
@endif

                            <div class="card-body">
                                <?php if($course !=''){ ?> 
                              

                             <form action="{{url('/course/update')}}" method="post" class="form-inline py-3" id="bbb" style="padding: 10px;">
                              @csrf

                            <input type="hidden" name="id"  value="{{$course->id}}" class="form-control"/>

                              <div class="row fv-row mb-10">

                               <div class="col-6">
                              <label class="form-label required">Select Intakes:</label><br>
                              @php
                        $languages = [
                            'Janaury',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                       ];

                
                    @endphp 
                              
                               <select name="intakes[]" class="form-select form-select-solid form-select-lg fw-bold " multiple=""  > 
                               <option> Select Month</option>
                          
                               @foreach($languages as $supplier)
                               
                                <option value="{{$supplier}}">{{$supplier}}</option>
                               
                               
                                @endforeach

                           
                           </select>
                          </div>


                               <div class="col-6">
                              <label class="form-label required">Select Branch:</label><br>
                             
                               <select  name="branch_id" class="form-select form-select-solid form-select-lg fw-bold"> 
                               @foreach($branch as $category)
                                <option value="{{ $category->id }}" {{$course->branch_id == $category->id  ? 'selected' : ''}}>{{ $category->branch_name}}</option>
                               @endforeach
          </select>
                          </div>
</div>
<div class="row fv-row mb-10">
                               <div class="col-6">
                                    <label for="pwd">Level of Study:</label>
                                
                               <select class="form-control form-control-lg form-control-solid" name="type" id="category"> 

                                 <?php if($course->type == "English"){ ?>
                                <option value="English" selected>English</option>
                            <?php } else { ?> 
                              <option value="English">English</option>
                          <?php   } ?>


                              <?php if($course->type == "Bachelor"){ ?>
                                <option value="Bachelor" selected>Bachelor</option>
                            <?php } else { ?> 
                              <option value="Bachelor">Bachelor</option>
                          <?php   } ?>
                           <?php if($course->type == "Master"){ ?>
                                <option value="Master" selected>Master</option>
                            <?php } else { ?> 
                              <option value="Master">Master</option>
                          <?php   } ?>

                          <?php if($course->type == "Diploma"){ ?>
                                <option value="Diploma" selected>Diploma</option>
                            <?php } else { ?> 
                              <option value="Diploma">Diploma</option>
                          <?php   } ?>

                           <?php if($course->type == "AdvDiploma"){ ?>
                                <option value="AdvDiploma" selected>Adv. Diploma</option>
                            <?php } else { ?> 
                              <option value="AdvDiploma">Adv. Diploma</option>
                          <?php   } ?>

                          <?php if($course->type == "Phd"){ ?>
                                <option value="Phd" selected>Doctoral/PHD</option>
                            <?php } else { ?> 
                              <option value="Phd">Doctoral/PHD</option>
                          <?php   } ?>

                          <?php if($course->type == "Certificates"){ ?>
                                <option value="Certificates" selected>Certificates</option>
                            <?php } else { ?> 
                              <option value="Certificates">Certificates</option>
                          <?php   } ?>
                           </select>
                          </div>

                            <div class="col-6">
                                    <label for="pwd">Duration:</label>
                                
                                <input type="text" name="duration"  class="form-control form-control-lg form-control-solid" value="{{$course->duration}}"/></div>

                          </div>

                              
                              
                              <div class="row fv-row mb-10">

                                <div class="col-6">
                              <label for="form-label required">Course Name:</label><br>

                              <input type="text" name="c_name" value="{{$course->c_name}}" class="form-control form-control-lg form-control-solid"/></div>

                               <div class="col-6">
                              <label for="pwd">Discipline</label><br>
                               <select name="aos" class="form-select form-select-solid form-select-lg fw-bold" > 
                               @if($course->AOS == "Accounting")
                               <option  value='Accounting' selected>Accounting</option>
                               @else
                                <option  value='Accounting'>Accounting</option>
                               @endif
                                @if($course->AOS == "Banking&Finance")
                                <option value='Banking&Finance' selected>Banking & Finance</option>
                                @else
                                <option value='Banking&Finance'>Banking & Finance</option>
                                @endif
                                @if($course->AOS == "Business&Management")
                                <option value='Business&Management' selected>Business & Management</option>
                                @else
                                <option value='Business&Management'>Business & Management</option>
                                @endif
                                @if($course->AOS == "Engineering&Technology")
                                <option value='Engineering&Technology' selected>Engineering & Technology</option>
                                @else
                                <option value='Engineering&Technology'>Engineering & Technology</option>
                                @endif
                                @if($course->AOS == "Healthcare")
                                <option value='Healthcare'>Nursing, Healthcare, Medicine</option>
                                @else
                                <option value='Healthcare'>Nursing, Healthcare, Medicine</option>
                                @endif
                                @if($course->AOS == "Law")
                                <option value='Law' selected>Law, Community</option>
                                @else
                                <option value='Law'>Law, Community</option>
                                @endif
                               
                          </select>
                            </div>
                          </div>
                          <div class="row fv-row mb-10">

                              <div class="col-6">
                              <button type="submit" class="btn btn-primary" id="summ">Submit</button>
                            </div>
                          </div>
                            </form>

                        <?php }  else { ?> 
                                <form action="{{url('institution/addCourses')}}" method="post" class="form-inline py-3" id="bbb" style="padding: 10px;">
                              @csrf
                              <div class="row fv-row mb-10">

                               <div class="col-6">
                              <label class="form-label required">Select Intakes:</label><br>

                              
                               <select name="intakes[]" class="form-select form-select-solid form-select-lg fw-bold chosen-select" multiple=""> 
                                <option  value='Janaury'>Janaury</option>
                                <option value='February'>February</option>
                                <option value='March'>March</option>
                                <option value='April'>April</option>
                                <option value='May'>May</option>
                                <option value='June'>June</option>
                                <option value='July'>July</option>
                                <option value='August'>August</option>
                                <option value='September'>September</option>
                                <option value='October'>October</option>
                                <option value='November'>November</option>
                                <option value='December'>December</option><br><br>
                            
                          </select>
                          </div>


                               <div class="col-6">
                              <label class="form-label required">Select Branch:</label><br>
                             
                               <select  name="branch_id" class="form-select form-select-solid form-select-lg fw-bold"> 
                               @foreach($branch as $category)
                                 <option value="{{$category->id}}">{{$category->branch_name}}</option>
                               @endforeach
          </select>
                          </div>
</div>
<div class="row fv-row mb-10">
                                <div class="col-6">
                              <label for="pwd">Level of Study:</label><br>
                              <select class="form-control form-control-lg form-control-solid" name="type" id="category"> 
                                <option value="English">English</option>
                                  <option value="Certificates">Certificates</option>
                                 <option value="Diploma">Diploma</option>
                                 <option value="AdvDiploma">Adv. Diploma</option>
                                 <option value="Bachelor">Bachelor’s Degree</option>
                                 <option value="Master">Master’s Degree</option>
                                 <option value="phd">Doctoral/PHD</option>
                             </select>
                          </div>

                          <div class="col-6">
                                    <label for="pwd">Duration:</label>
                                
                               <input type="text" name="duration"  class="form-control form-control-lg form-control-solid" value=""/>
                          </div>

                             
</div><div class="row fv-row mb-10">

     <div class="col-6">
                              <label for="form-label required">Course Name:</label><br>

                              <input type="text" name="c_name"  class="form-control form-control-lg form-control-solid"/></div>

                               <div class="col-6">
                              <label for="pwd">Discipline</label><br>
                               <select name="aos" class="form-select form-select-solid form-select-lg fw-bold" > 

                             <option selected value='Accounting'>Accounting</option>
                                <option value='Banking&Finance'>Banking & Finance</option>
                                <option value='Business&Management'>Business & Management</option>
                                <option value='Engineering&Technology'>Engineering & Technology</option>
                                <option value='Healthcare'>Nursing, Healthcare, Medicine</option>
                                <option value='Law'>Law, Community</option>
                               
                          </select>
                            </div>
                          </div>
                          <div class="row fv-row mb-10">

                              <div class="col-6">
                              <button type="submit" class="btn btn-primary" id="summ">Submit</button>
                            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

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

setTimeout(function() {
    $('.alert-danger').fadeOut('fast');
}, 5000); // <-- time in milliseconds

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds

$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})

</script>