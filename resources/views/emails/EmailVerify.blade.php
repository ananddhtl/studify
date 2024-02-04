<!DOCTYPE html>
<html lang="en">
<head>
  <title>Email-Verify</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">.boxacntainer p {
    line-height: 20px;
    font-size: 16px;
}</style>
</head>
<body>
<div class="sectionemail">
<div class="container">
<div class="row">
  <h3>Verify your email address for Studify </h3>
<img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}" style="width: 200px;">
<div class="boxacntainer">
<p>Dear {{$details['name']}},</p>
<p>Thank you for signing up for STUDIFY. We are excited to have you on board and look forward to providing you with our services. Before we can activate your account, we need to verify your email address.<br>
  <br>
 
To complete the verification process, please click on the following link: <a href="{{url('/student/email-verify/'.$details['id'])}}">Verify</a>. If the link does not work, copy and paste it into your web browser.<br>
 <br>
Please note that the verification link is valid for the next 24 hours. If you do not verify your email within this time frame, your account will not be activated, and you will need to sign up again.<br><br>
 
If you did not sign up for Studify, please disregard this email.<br><br>
Thank you for choosing Studify!
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