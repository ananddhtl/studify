<!DOCTYPE html>
<html lang="en">
<head>
  <title>Packge-subscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
    .boxacntainer p {
    line-height: 20px;
    font-size: 16px;
}</style>
</head>

<body>
<div class="sectionemail">
<div class="container">
<div class="row">
<h3> Course Subscription details </h3>
<img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}" style="width: 200px;">
<div class="boxacntainer">
<p>Dear admin,</p>

<b>Course Subscription details</b><br>
<br>
<b>{{$details['name']}} have subscribed to the {{$details['coursename']}}({{$details['type']}}) Course.</b><br><br>
<br><br>
We value your business and are committed to providing you with the best possible service. Thank you for choosing STUDIFY.<br><br>
Watch this video explaining the steps to getting started on the Studify.au platform.
<span style="text-align: center;">Get Started on STUDIFY Platform!</span>
</p>
<br>
<div class="bestr">
<span>Best regards,<br>
Studify,<br>
System Administrator</span></div>
</div>
</div>
</div>
</div>
</body>
</html>