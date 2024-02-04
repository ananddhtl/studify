<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">.boxacntainer p {
    line-height: 35px;
    font-size: 18px;
}

div#main {
    margin: 0 auto;
    background: #f9f9f9;
    padding: 20px;
    margin-top: 2%;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 2%;
    box-shadow: 3px 7px 8px 6px #ccc;
}
h1.right {
    text-align: right;
    font-size: 28px;
    padding: 20px;
    color: #6a6a6a;
}
div#border {
    border-bottom: 1px solid #ccc;
}
.left-box1 {
    padding-top: 20px;
    float: left;
    text-align: left;
}
.right-box1 {
    padding-top: 20px;
    float: right;
    text-align: right;
}
td.text-end {
    text-align: left;
}

strong.put {
    display: flex;
}
input#usr {
    width: 50%;
    padding: 12px;
    height: 25px;
    margin-left: 7px;
}
.text-left {
    text-align: right !important;
}
button#last {
    margin: 0 auto;
    text-align: center;
    /* padding: 0px; */
    margin: 10px;
    width: 42%;
    margin-left: 30%;
    background: #98ba40;
    border: none;
     font-size: 18px;
    border-radius: 5px;
}
div#round {
    border: 1px solid #ccc;
    border-radius: 5px;
    border-top: 3px solid #ccc;
   
}
td.text-end {
    text-align: left !important;
}
address.showall {
    line-height: 24px;
    font-size: 15px;
    color: #373737;
}
table.table.mb-0 tr {
    padding: 17px;
    line-height: 25px;
    border-bottom: 1px solid #ccc;
    font-size: 15px;
}
table.table.mb-0 tr td {
    padding: 10px;
}
@media screen and (max-width: 600px) {
.right-box1 {
    padding-top: 20px;
  float: left;
    text-align: left !important ;
}
.left-box {
    text-align: center;
}
.right-box {
    text-align: center;
}
h1.right {
    text-align: center;
    font-size: 28px;
    padding: 6px;
    color: #6a6a6a;
}
input#usr {
    width: 90%;
    padding: 12px;
    height: 25px;
    margin-left: 7px;
}
}
</style>
</head>
<body>

@include('agent.header')
<div class="sectionemail">
<div class="container">
<div class="row">
  <div class="col-sm-10" id="main">
    <div class="row" id="border">
    <div class="col-sm-6">
      <div class="left-box">
      <img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}" style="width: 200px;">
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
      Smith Rhodes<br>
      15 Hodges Mews, High Wycombe<br>
      HP12 3JL<br>
      United Kingdom
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
<div class="card" id="round">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table mb-0">
    <thead class="headeraccount" id="tt">
          <tr>
            <td class="col-3"><strong>Student Name</strong></td>
      <td class="col-4"><strong>Institution Name</strong></td>
            <td class="col-2 text-center"><strong>Coures Name</strong></td>
      <td class="col-1 text-center"><strong>Tuition Fee</strong></td>
            <td class="col-2 text-right"><strong>Commission</strong></td>
          </tr>
        </thead>
          <tbody>
            <tr>
              <td class="col-3">Design</td>
              <td class="col-3 text-1">Creating a website design</td>
              <td class="col-2 text-center">$50.00</td>
        <td class="col-2 text-center">10</td>
        <td class="col-2 text-right">$500.00</td>
            </tr>
            <tr>
              <td>Development</td>
              <td class="text-1">Website Development</td>
              <td class="text-center">$120.00</td>
        <td class="text-center">10</td>
        <td class="text-right">$1200.00</td>
            </tr>
      <tr>
              <td>SEO</td>
              <td class="text-1">Optimize the site for search engines (SEO)</td>
              <td class="text-center">$450.00</td>
        <td class="text-center">1</td>
        <td class="text-right">$450.00</td>
            </tr>
          </tbody>
      <tfoot class="card-footer" id="last">
      <tr>
        <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end"><strong>Sub Total:</strong></td>
              <td colspan="2" class="text-right">$2150.00</td>
            </tr>
            <tr>
              <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end"><strong class="put">Tax:  <input type="text" class="form-control" id="usr"></strong></td>
              <td colspan="2" class="text-right">$215.00</td>
            </tr>
      <tr>
        <td class="col-4"></td>
        <td class="col-4"></td>
              <td colspan="2" class="text-end border-bottom-0"><strong>Total:</strong></td>
              <td colspan="2" class="text-right border-bottom-0">$2365.00</td>
            </tr>
      </tfoot>
        </table>
      </div>
    </div>
  </div>
<button type="button" class="btn btn-lg btn-primary" id="last">Submit</button>

</div>

</div>
</div>
</div>
</body>
</html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_applied_application_table').DataTable();
    });
</script>
      