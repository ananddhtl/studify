@include('institution.header')
<span id="message_container_display"></span>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
           <div class="card card-flush mt-6 mt-xl-9">
      
                        <div class="card">
                            <div class="card-header mt-5">
                              <div class="card-title flex-column">
                                <strong class="card-title">Document Manage</strong>
                              </div>
                              <a href="#" ><button type="button"  style="float: right;
    border-radius: 5px;
    font-size: 14px; margin-top: 2px;" class="add" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true" id="icn"></i>Create Folder</button></a>

 

                            </div>

                            
                            <div class="card-body pt-0">
                               
                                <div class="table-responsive">
                               

                                  
                             
                          
                           
                            <div class="sectiondoument">
                              <div class="row">
      <form class="example" action="/action_page.php" style="margin: auto;
    max-width: 300px;
    margin-top: 0%;
    margin-bottom: 15px;
    margin-left: 2%;" id="topsapce">

  <input type="text" placeholder="Search.." name="search2">

  <button type="submit"><i class="fa fa-search"></i></button>
</form>


</div>

    <div class="col-sm-8">
      @foreach($getfile as $getfiles)
      @if($getfiles->filename != '')
      @php
                                        $key = 'institution/institution_'.$id.'/'.$getfiles->filename;
                                        $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
                                        $bucket = 'studifynewbucket';
                                        
                                        $command = $client->getCommand('GetObject', [
                                            'Bucket' => $bucket,
                                            'Key' => $key
                                        ]);
                                        $request = $client->createPresignedRequest($command, '+20 minutes');
                                        $presignedUrl = (string)$request->getUri();
       @endphp
                                      

    <div class="col-sm-4">  @php $ext = pathinfo($getfiles->filename, PATHINFO_EXTENSION); @endphp
    @if($ext == 'pdf')
    <div class="imag-boxf"><iframe src="{{$presignedUrl}}" width="100" height="150">{{$getfiles->filename}}</iframe>
    @else
      <div class="imag-boxf"><img class="doucmentimg" src="{{$presignedUrl}}" width="100" height="100" />
      @endif
    </div>
  </div>
  @endif
@endforeach
    </div>
    <div class="col-sm-4">
    
  <form method="POST" action="{{url('/institution/create-folder-file')}}" accept-charset="UTF-8" class="hhhh" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
        <div class="doc1">
            <div class="form-group">
       <label class="filelabel">
    
    <span class="title">
     <i class="fa fa-download" aria-hidden="true"></i><br>
        Add File
        <input class="FileUpload1" name="file" id="file" name="booking_attachment" type="file"/ style="visibility: hidden;">
    </span>
    
</label>

    </div>
        </div>
</form>
</div>
<div class="table-responsive">
    <table id="kt_applied_application_table" class="table table-striped" style="width: 99%;
    margin: 30px 6px;">
  <thead>
    <tr>
      <th scope="col">Folder/File</th>
      <th scope="col">Name</th>
      <th scope="col">Last modified</th>
      <th scope="col">File Size</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($folder)
    @foreach($folder as $folders)
    <tr>
      <th scope="row">
        @if($folders->foldername != '')
      <i class="fa fa-folder" aria-hidden="true" id="icn"></i>
      @else
      <i class="fa fa-file" aria-hidden="true" id="icn"></i></th>
      @endif
      @if($folders->foldername != '')
      <td><a href="{{url('/institution/get-document/'.$folders->id)}}">{{$folders->foldername}}</a></td>
      @else
      <td>{{$folders->filename}}</td>

      @endif
      <td>{{$folders->created_at}}</td>
     @if($folders->filename != '')
      @php
                                        $key = 'institution/institution_'.$id.'/'.$folders->filename;
                                        $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
                                        $bucket = 'studifynewbucket';
                                        
                                        $command = $client->getCommand('GetObject', [
                                            'Bucket' => $bucket,
                                            'Key' => $key
                                        ]);

                                        $request = $client->createPresignedRequest($command, '+20 minutes');
                                        $presignedUrl = (string)$request->getUri();
                                        if ( Storage::disk('s3')->exists('institution/institution_'.$id.'/'.$folders->filename))
                                     {
                                        $sizee = Storage::disk('s3')->size('/institution/institution_'.$id.'/'.$folders->filename);
                                        $format = round($sizee/1024, 1);
                                     }else{
                                      $format = 0;
                                     }
                                    
                                       
                                        
      @endphp
      <td>{{  $format}}Kb</td>
      @else
      <td>0Kb</td>
      @php $presignedUrl =''; @endphp
      @endif
    
    <td>
    @php $ext = pathinfo($folders->filename, PATHINFO_EXTENSION); @endphp
    @if($ext == 'pdf')
    <a href="#" ><button type="button"  style="
    border-radius: 5px;
    font-size: 14px; margin-top: 2px; background: transparent !important" class="add editfile"  id="{{$folders->id}}" data-toggle="modal"  onclick="getRoleDetails('pdf', '{{$presignedUrl}}');" data-target="#exampleModal3"> <svg viewBox="0 0 20 20" focusable="false" class=" Ma-SdkFre-qd c-qd a-s-fa-Ha-pa BMAFpd" width="20px" height="20px" fill="currentColor"><path fill="none" d="M0 0h20v20H0V0z"></path><path d="M10 6c.82 0 1.5-.68 1.5-1.5S10.82 3 10 3s-1.5.67-1.5 1.5S9.18 6 10 6zm0 5.5c.82 0 1.5-.68 1.5-1.5s-.68-1.5-1.5-1.5-1.5.68-1.5 1.5.68 1.5 1.5 1.5zm0 5.5c.82 0 1.5-.67 1.5-1.5 0-.82-.68-1.5-1.5-1.5s-1.5.68-1.5 1.5c0 .83.68 1.5 1.5 1.5z"></path></svg>
    </a>
@else
 <a href="#" ><button type="button"  style="
    border-radius: 5px;
    font-size: 14px; margin-top: 2px; background: transparent !important" class="add editfile"  id="{{$folders->id}}" data-toggle="modal"  onclick="getRoleDetails('img', '{{$presignedUrl}}');" data-target="#exampleModal3"> <svg viewBox="0 0 20 20" focusable="false" class=" Ma-SdkFre-qd c-qd a-s-fa-Ha-pa BMAFpd" width="20px" height="20px" fill="currentColor"><path fill="none" d="M0 0h20v20H0V0z"></path><path d="M10 6c.82 0 1.5-.68 1.5-1.5S10.82 3 10 3s-1.5.67-1.5 1.5S9.18 6 10 6zm0 5.5c.82 0 1.5-.68 1.5-1.5s-.68-1.5-1.5-1.5-1.5.68-1.5 1.5.68 1.5 1.5 1.5zm0 5.5c.82 0 1.5-.67 1.5-1.5 0-.82-.68-1.5-1.5-1.5s-1.5.68-1.5 1.5c0 .83.68 1.5 1.5 1.5z"></path></svg>
    </a>
    @endif

</td>
    </tr>

   @endforeach
   @else
    <tr>
      <th scope="row"><i class="fa fa-folder"></i></th>
      <p> No Folder Found</p>
    </tr>
    @endif
  </tbody>
</table>
</div>
  </div>
</div>


</div>
    </div>
    

   
    </div>

  </div>
</div>
            </div><!-- .animated -->
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
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>


        <div style="display:none;" class="modal fade show in"  data-backdrop="false" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="width5">
        <div class="modal-header">
          <h4 class="modal-title">Document Manage</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/institution/create-document-folder')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                            <div class="row fv-row mb-12">
                                <div class="row">

                                    <input type="hidden" id="id" name="agent_id" value="{{$id}}" >
                              <label class="form-label required">Folder Name</label><br>
                              <input type="text" id="folder_name" name="folder_name" placeholder="Enter the name">
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


                    <!-- ///////update folder name  -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rename File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('/institution/update-document-folder')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="extensiontype" name="type" value="" >

      <input type="hidden" id="idd" name="id" value="{{$id}}" >
                              <label class="form-label required">Folder Name</label><br>
                              <input type="text" id="folder_names" name="folder_name" placeholder="Enter the name">
      </div>
      <div class="modal-footer">
      <button type="submit" class="Package">submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- //////////////////// -->

        <div style="display:none;" class="modal fade show in"  data-backdrop="false" id="exampleModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="googledrive">
        <div class="modal-header">
          <h4 class="modal-title">Document Manage</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <form method="POST" action="{{url('/agent/create-document-sub-folder')}}" accept-charset="UTF-8" class="card-body w-100 w-xl-700px x-9 fv-plugins-bootstrap5 fv-plugins-framework" id="application_manager_form" novalidate="novalidate" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="" name="id" id="id">
                               <div class="w-100">
                                <!--begin::Heading-->
                                
                                <!--end::Heading-->
                                <!--begin::Input group-->
                            <div class="row fv-row mb-12">
                                <ul class="googlemenu">
  <li class="list"> <a class="open" data-toggle="modal" data-target="#exampleModalCenter1"><i class="fa fa-arrows-alt" aria-hidden="true" id="icn"></i>Open</a></li>
  <li class="list"><a class="copy" id="copy" onclick="withJquery();"><i class="fa fa-share-square-o" aria-hidden="true" id="icn"></i>Copy Link</a></li>
  <li class="list"><a class="editicon" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil-square-o" aria-hidden="true" id="icn"></i>Rename</a></li>
  <li class="list"><a class="deletefile" href="#"><i class="fa fa-trash" aria-hidden="true" id="icn"></i>Delete </a></li>
  
</ul>
                    </div>

                                
                            </div> 
                            </form>


                            
       <div style="display:none;" class="modal fade show in"  data-backdrop="false" id="exampleModalCenter1" role="dialog"> 
        <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <input type="hidden" value="" id="imgsrc" >
      <input type="hidden" value="" id="pdfsrc" >
      <input type="hidden" value="" id="copylink" >
     
      <div class="modal-body">
      <iframe id="techimgs" style="
    width: 100%; height:400px;
" frameborder="0"></iframe>
    
      <img id="imggg" style="
    width: 100%;  height:400px;
" >
      </div>
    </div>
  </div>
</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                   <script>

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  
  var name = document.getElementById("file").files[0].name;
 
  var form_data = new FormData();
  var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    
  form_data.append("file", document.getElementById('file').files[0]);
  form_data.append("_token", CSRF_TOKEN);

   $.ajax({
    url: '/institution/create-folder-file',
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false, 
    success: function(data){
     alert(data.success)
     location.reload(true); 
          
    }
   });

 })

})

function withJquery(){
  console.time('time1');
  let id = $("#copylink").val();
 
	var temp = $("<input>");
  $("body").append(temp);
 temp.val(id).select();
  document.execCommand("copy");
  temp.remove();
    console.timeEnd('time1');
    alert('Copy Link Successfully')
}

function getRoleDetails (roleId, roleName) {
 
  $("#copylink").val(roleName);

  if(roleId == 'pdf'){
    $('#imgsrc').val("");
    $("#pdfsrc").val(roleName);
    }else{
      $('#pdfsrc').val("");
     $("#imgsrc").val(roleName);
    }
}


$(function() {
$(document).on('click', '.open', function(e) {
   e.preventDefault();
        $("#exampleModal3").hide();
       // let id = $("#id").val();
        let imgsrc = $("#imgsrc").val();
        let pdfsrc = $("#pdfsrc").val();
    
      if(pdfsrc != ''){
        $("#imggg").attr("src", '');
       $("#techimgs").attr("src", pdfsrc);

     }else{
      $("#techimgs").attr("src", '');
     $("#imggg").attr("src", imgsrc);
     document.getElementById('techimgs').style.display = 'none';

      }
})

})

$(document).ready(function(){
  $('#exampleModal1').hide();
  $('#exampleModal').hide();
  $('#exampleModal3').hide();
    $(".assignn").on("click", function(){
        var dataId = $(this).attr("data-id");
       $("#assign_id").val(dataId);
        
    });
});

$(function() {
$(document).on('click', '.editfile', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $("#id").val(id);

})
})

$(function() {
$(document).on('click', '.deletefile', function(e) {
        e.preventDefault();
        let id = $("#id").val();
         
        $.ajax({
          url: '{{ url('/institution/deletefile') }}',
          method: 'get',
          data: {
             id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            alert(response.delete)
            location.reload(true); 
          }
        });
       

})
})


$(function() {
$(document).on('click', '.editicon', function(e) {
  $("#exampleModal3").hide();
  e.preventDefault();
        let id = $("#id").val();
       
        $.ajax({
          url: '{{ url('/institution/edit-file') }}',
          method: 'get',
          data: {
             id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
           console.log(response)
            $("#idd").val(response.id);
            if(response.filename == ''){
              $("#extensiontype").val('folder');
           $("#folder_names").val(response.foldername);
          
            }else{
              $("#extensiontype").val('file');
              $("#folder_names").val(response.filename);
            }

          }
        });
      });


    })


$(function() {
    $('.support').on('change', function() {
     
        var status = $(this).val();
        var user_id = $(".id").val();
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/agent/changeLeadStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
             alert(data.success)
             location.reload(true); 
            }
        });
    })
  })


$(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>