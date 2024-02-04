@include('agent.header');
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
<div id="kt_content_container" class="container-xxl">


            <!--begin::Table-->
            <div class="card card-flush" id="width1">
                 
                             <div class="card-header">
                                <strong class="card-title">Add Support</strong>
                            </div>
                            
                                                         <div class="card-body">
                                 
                                <form action="{{url('agent/add-support-data')}}" method="POST" class="form-inline py-3" id="bbb">
                                @csrf

                            <div class="row fv-row mb-10">
                              <div class="col-10">
                              <label for="pwd">Subject:</label><br>
                              
                              <input type="text" name="subject" value="" class="form-control form-control-lg form-control-solid"><br>
                          </div>
                           
                       </div>
<div class="row fv-row mb-10">
                           <div class="col-10">
                              <label for="pwd">Notes:</label><br>
                             <textarea name="comment" class="form-control form-control-lg form-control-solid">Notes</textarea><br>
                          </div>
                          
                      </div>


                           <div class="col-sm-6" id="dwon">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                            </form>
                                                    </div>
                        </div>
                   

                    </div>
                </div>
       

            