@include('institution.header')

      <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Commission</strong>
                                @if(session()->has('delete'))
    <div id="comm" class="alert alert-success">
        {{ session()->get('delete') }}
    </div>
@endif
                                
            <!-- <button style="float: right;" data-toggle="modal" data-target="#myModal" class="add"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Package</button> -->
           <button type="button"  style="float: right;" class="add" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Commission
</button>


                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                              <table id="kt_applied_application_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Degree</th>
                                            <th>Commission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                         @foreach($allcommission as $allcommissions)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td><div class="cours">
                                        	<ul class="astimet1"> 
                                        	<li>{{$allcommissions->degree}}
                                        	</li>
                                        </ul>
                                    </div></td>
                                     <td>
                              <div class="cours">
                                        	<ul class="astimet"> 
                                        	<li>{{$allcommissions->commission_type}}
                                </ul>
                                <ul class="astimet"> 
                                    @if($allcommissions->commission_type == 'Percentage')
                                <li><span class="per">{{$allcommissions->commission}}%</span></li>
                                @else
                                 <li><span class="per">{{$allcommissions->commission}}/</span></li>
                                @endif
                                  </ul>
                                    </div>
                                    </td>
                                    <td>
                                    <!-- <a class="" data-toggle="modal" data-target="#exampleModals" ><i class="fa fa-pencil" aria-hidden="true" id="icn"></i></a> -->
                                    <a class="" href="{{url('institution/delete-commission/'.$allcommissions->id)}}"><i class="fa fa-trash" aria-hidden="true" id="del"></i></a>
                                    </td>
                                    
                                      </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                            
                        </div>
<!-- 
@if($editcommission)
                        <div class="modal fade show in"  data-backdrop="false" id="exampleModals" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content" id="width">
        <div class="modal-header">
          <h4 class="modal-title">Update Commission</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('institution/update-commission')}}" accept-charset="UTF-8" class="card-body py-20 w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100" id="top">
                               
                                <div class="row fv-row mb-10">

                                   <div class="col-10">
                              <label class="form-label required">Select Degree:</label><br>

                              
                               <select name="degree" class="form-select form-select-solid form-select-lg fw-bold"> 
                            @if($editcommission->degree == 'Certificates')
                              <option value="Certificates" selected> Certificates </option>
                              @else
                                 <option value="Certificates"> Certificates </option>
                              @endif
                               @if($editcommission->degree == 'Diploma')
                              <option value="Diploma" selected> Diploma</option>
                              @else
                              <option value="Diploma"> Diploma</option>
                              @endif
                              @if($editcommission->degree == 'Bachelor')
                              <option value="Bachelor" selected> Bachelor  </option>
                              @else
                              <option value="Bachelor"> Bachelor  </option>
                              @endif
                              @if($editcommission->degree == 'Master')
                              <option value="Master"> Master</option>
                              @else
                              <option value="Master"> Master</option>
                              @endif
                              @if($editcommission->degree == 'Master')
                              <option value="PHD" selected> PHD  </option>
                              @else
                              <option value="PHD"> PHD  </option>
                              @endif
                              
                           </select>
                          </div>
                         <div class="col-2">
                       </div>
                    </div>
                                
                                <div class="row fv-row mb-10">
                                    
                                    <div class="col-10">
              @if($editcommission->commission_type == 'Percentage')                    
<input type="radio" name="commission_type" value="Percentage" onclick="show1();"  checked/>
percentage
@else
<input type="radio" name="commission_type" value="Percentage" onclick="show1();" />
percentage
@endif
@if($editcommission->commission_type == 'Flat')
<input type="radio" name="commission_type" value="Flat" onclick="show2();" checked/> Flat
@else
<input type="radio" name="commission_type" value="Flat" onclick="show2();" /> Flat
@endif

<div id="div" class="">
  <hr><label class="form-label required">Enter percentage </label><br>
<input type="text" name="commission_percentage" value="" class="form-control form-control-lg form-control-solid">
<div class="hh"><p class="bb">%</p></div>
</div>


<div id="div1" class="hide">
  <hr><label class="form-label required">Enter Flat </label><br>
<input type="text" name="commission_flat" class="form-control form-control-lg form-control-solid">
<div class="hh1"><p class="bb">USD</p></div>
</div>
                                     </div>
                                 <div class="col-6">
                                    </div>
                                </div>
                             
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
                        </div>
                    </div>
            @endif -->


     <div class="modal fade show in"  data-backdrop="false" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
   
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Commission</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('institution/add-commission')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                              
                                <div class="row fv-row mb-10">

                                   <div class="col-10">
                              <label class="form-label required">Select Degree:</label><br>

                              
                               <select name="degree" class="form-select form-select-solid form-select-lg fw-bold"> 

                              <option value="Certificates"> Certificates   </option>
                              <option value="Diploma"> Diploma</option>
                              <option value="Bachelor"> Bachelor  </option>
                              <option value="Master"> Master</option>
                              <option value="PHD"> PHD  </option>
                              
                           </select>
                          </div>
                         <div class="col-2">
                       </div>
                    </div>
                              
                                <div class="row fv-row mb-10">
                                   
                                    <div class="col-10">
                                  
<input type="radio" name="commission_type" value="Percentage" onclick="show1();"  checked/>
percentage
<input type="radio" name="commission_type" value="Flat" onclick="show2();" /> Flat
<div id="div" class="">
  <hr><label class="form-label required">Enter percentage </label><br>
<input type="text" name="commission_percentage" class="form-control form-control-lg form-control-solid">
<div class="hh"><p class="bb">%</p></div>
</div>


<div id="div1" class="hide">
  <hr><label class="form-label required">Enter Flat </label><br>
<input type="text" name="commission_flat" class="form-control form-control-lg form-control-solid">
<div class="hh1"><p class="bb">USD</p></div>
</div>
                                     </div>
                                 <div class="col-6">
                                    </div>
                                </div>
                             
                                <div class="row fv-row mb-10">
                                   <div class="col-6">
                                  <button type="submit" class="Package">submit</button>
                                </div>
                              </div>
                            </div> <br>
                            </form>
                          </div>
                        </div>
                    </div> 


                </div>
            </div>
        </div>


 <script src="{{asset('assets/js/toggle.js')}}"></script>

</body>

</html>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script >
    
 function show2() {
 $("#div").addClass("hide");
 $("#div1").removeClass("hide");
 }

 function show1() {
 $("#div").removeClass("hide");
 $("#div1").addClass("hide");

 }


 setTimeout(function(){
    $('#comm').hide()
}, 5000) 

$(document).ready(function () {
  $('#exampleModal').hide();
})
</script>