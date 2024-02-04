<html lang="en">
<head>
  <title>Forget Password</title>
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
<div class="boxacntainer" style="line-height: 40px;"> 
	<h3>Forgot password - Studify</h3>
	<img src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}" style="width: 200px;">
	<p> Hi Shamim, <br>
 
A request has been received to change the password for your STUDIFY account. <br>
 
<a href="{{ $details['url'] }}/{{ $details['email'] }}/{{ $details['token'] }}">Forgetpassword</a><br>

 
Or copy and paste the url into browser. <br>
 
If you did not initiate this request, please contact us immediately at info@studify.au <br>
 </p>
<div class="bestr">
<span>Best regards,<br>
Studify,<br>
System Administrator</span></div>
</div>

</div>
</div>
</div>
</div>
</body>
</html>
