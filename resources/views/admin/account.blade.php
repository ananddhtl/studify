@include('layout.admin.header')
<div class="sectionemail">
<div class="container">
<div class="row">
  <div class="col-sm-10" id="main">
    <div class="row" id="border">
    <div class="col-sm-6">
      <div class="left-box">
      <img src="{{asset('assets/admin/images/logo.png')}}" style="width: 200px;">
    </div>
    </div>
    <div class="col-sm-6">
      <div class="right-box">
      <h1 class="right">Invoice</h1>
    </div>
    </div>

  </div>
  <div class="row" id="border">
    <div class="col-sm-6">
      <div class="left-box1">
      <p class="text-date"><b>Date:</b> 05/12/2020</p>
    </div>
    </div>
    <div class="col-sm-6">
      <div class="right-box1">
      <p class="text-date"><b>Invoice No:</b> 16835</p>
    </div>
    </div>

  </div>
   <div class="row" id="">
    <div class="col-sm-6">
      <div class="left-box1">
      <p class="text-date"><b>Invoiced To:</b></p>
      <address class="showall">
      @php 
                                        $univ = App\Models\addInstitution::where(['id' => $studentPayment->insitution_id])->first();
                                        @endphp
                                        @if($univ)
                                        <b>{{ $univ->universirty_name }}</b><br>
                                        @else
                                        Insitution Name<br>
                                        @endif
      15 Hodges Mews, High Wycombe<br>
      HP12 3JL<br>
      @if($univ)
                                        {{ $univ->location }}<br>
                                        @else
                                        Insitution Location<br>
                                        @endif
      </address>
    </div>
    </div>
    <div class="col-sm-6">
      <div class="right-box1">
      <p class="text-date"><b>Pay To:</b></p>
     <address class="showall">
      Koice Inc<br>
      2705 N. Enterprise St<br>
      Orange, CA 92865<br>
    contact@koiceinc.com
      </address>
    </div>
    </div>

  </div>
  <form action ="{{url('/admin/student_invoice')}}" method="post" >
    @csrf
<div class="card" id="round">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table mb-0">
    <thead class="headeraccount" id="tt">
          <tr>
            <td class="col-3"><strong>Student Name</strong></td>
      <td class="col-4"><strong>Institution Name</strong></td>
            <td class="col-2 text-center"><strong>Coures Name</strong></td>
      <td class="col-1 text-center"><strong>Tution Fee</strong></td>
            <td class="col-2 text-right"><strong>Commission</strong></td>
          </tr>
        </thead>
          <tbody>
            <tr>
            @php 
                                        $student = App\Models\StudentModel::where(['id' => $studentPayment->student_id])->first();
                                        @endphp
                                        @if($student)
                                        <td class="col-3">{{ $student->first_name }}</td>
                                        <input type="hidden" value="{{$studentPayment->student_id}}" name="student_id" >
                                        <input type="hidden" value="{{$studentPayment->id}}" name="id" >

                                        @else
                                        <td class="col-3">--</td>
                                        @endif
                                        @php 
                                        $univ = App\Models\addInstitution::where(['id' => $studentPayment->insitution_id])->first();
                                        @endphp
                                        @if($univ)
                                        <td class="col-3 text-1">{{ $univ->universirty_name }}</td>
                                        <input type="hidden" value="{{$studentPayment->insitution_id}}" name="univeristy_id" >

                                        @else
                                        <td class="col-3 text-1">--</td>
                                        @endif
                                        @php 
                                        $course = App\Models\addCoursesModel::where(['id' => $studentPayment->course_id])->where(['institution_detail_id' => $studentPayment->insitution_id])->first();
                                        @endphp
                                        @if($course)
                                        <td class="col-2 text-center">{{ $course->c_name }}</td>
                                        <input type="hidden" value="{{$studentPayment->course_id}}" name="course_id" >

                                        @else
                                        <td class="col-2 text-center">--</td>
                                        @endif
                                        @php 
                                        $fees = App\Models\addFees::where(['institution_detail_id' => $studentPayment->insitution_id])->where(['course_id' => $studentPayment->course_id])->where(['type' => $course->type])->first();
                                        @endphp
                                        @if($fees)
                                        <td class="col-2 text-center">${{ $fees->tution_fees }}</td>
                                        <input type="hidden" value="{{$fees->tution_fees}}" name="course_tution_fees" >

                                        @else
                                        <td class="col-2 text-center">--</td>
                                        @endif
                                        @php 
                                        $commission = App\Models\addCommission::where(['institution_id' => $studentPayment->insitution_id])->where(['degree' => $course->type])->first();
                                        @endphp
                                        @if($commission)
                                        <td class="col-2 text-right">{{ $commission->commission }}%</td>
                                        <input type="hidden" value="{{$commission->commission}}" name="course_comission" >

                                        @else
                                        <td class="col-2 text-right">--</td>
                                        @endif
            </tr>
           
   
          </tbody>
      <tfoot class="card-footer" id="last">
      <tr>
        <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end"><strong>Sub Total:</strong></td>
              @php 
              $fees = App\Models\addFees::where(['institution_detail_id' => $studentPayment->insitution_id])->where(['course_id' => $studentPayment->course_id])->where(['type' => $course->type])->first();
              $commission = App\Models\addCommission::where(['institution_id' => $studentPayment->insitution_id])->where(['degree' => $course->type])->first();
              if($commission){
              $total = $fees->tution_fees /100 *  $commission->commission; 
              }else{
                $total = $fees->tution_fees;
              }
              @endphp
                                        @if($total)
                                        <td colspan="2" class="text-right">${{ $total }}</td>
                                        <input type="hidden" id="amount" value="{{ $total }}" name="price">
                                        @else
                                        <td colspan="2" class="text-right">--</td>
                                        @endif
            </tr>
            <tr>
              <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end"><strong class="put">Tax: <input type="text" class="form-control"  name="gst" onkeyup="showMe(this)" id="usr"></strong></td>
              <td colspan="2" id="total" class="text-right">$0</td>
              <input type="hidden" id="gst_amount" value="" name="gst_amount">

            </tr>
      <tr>
        <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end border-bottom-0"><strong>Total:</strong></td>
              <td colspan="2" id="alltotal" class="text-right border-bottom-0">$0</td>
              <input type="hidden" id="all_total" value="" name="all_total">

              
            </tr>
      </tfoot>
        </table>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-lg btn-primary" id="last">Submit</button>

</form>

</div>

</div>
</div>
</div>
<script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/main.js')}}"></script>


    <script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>


</body>

</html>
<script>
   $(function() { 
           $('.js-switch').change(function() { 

           var status = $(this).prop('checked') == true ? 1 : 0;  
           var product_id = $(this).data('id');  
          
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/admin/status/update', 
               data: {'status': status, 'product_id': product_id}, 
               success: function(data){ 
               alert(data.success) 
            } 
         }); 
      }) 
   }); 

   setTimeout(function() {
    $('.alert-success').fadeOut('fast');
}, 5000); // <-- time in milliseconds
</script>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small' });
});</script>
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

$(document).ready(function(){
    $('#flat').hide();
  $('input[name="coupon_discount"]').on("click", function() {
  var car = $('input[name="coupon_discount"]:checked').val();
       if(car == 'Percentage'){
        $('#percentage').show();
        $('#flat').hide();
       }else{
        $('#percentage').hide();
        $('#flat').show();
       }

        });

})

function showMe(e) {
// i am spammy!
 var gst = e.value;
 var amount = $("#amount").val();
 var total = amount/100 * gst;
 document.getElementById('total').innerHTML = total;
 var all = parseInt(amount) + parseInt(total);
 document.getElementById('alltotal').innerHTML = all;

 $("#all_total").val(all)
 $("#gst_amount").val(total)

}


 setTimeout(function(){
    $('#comm').hide()
}, 5000) 

</script>
