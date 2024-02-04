<!DOCTYPE html>
<html lang="en">
<head>
  <title>sign-up</title>
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
  <h3>Your Login Creditionals</h3>
<img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}" style="width: 200px;">
<div class="boxacntainer">
<p>Dear {{$details['name']}},</p>
<p>CONGRATULATIONS! <br>
<br>
Please use this Creditionals Email : {{$details['email']}} and Password : {{$details['password']}} and Complete your Role 
<br>
 
Please visit our Contact Us page for more details.<br><br>
Good luck with your application!</p>
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