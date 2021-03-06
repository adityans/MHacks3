<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png"> <!-- icon -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

    <title>taskwal</title>

    <!-- Bootstrap core CSS -->
    <link href="FrontEnd/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="FrontEnd/taskwal.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

<script>

function checkForm(form)
{

	if(form.schoolChoice.value == "none")
	{
		alert("Please Select a School");
		return false;
	}

	var emailExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!emailExp.test(form.email.value))
	{
		alert("Please Enter a valid .edu Email Address")
		return false;
	}
	var emailAddress = form.email.value;
	var length = emailAddress.length;
	var eduPart = emailAddress.substring(length - 4, length);
	if(eduPart != ".edu")
	{
		alert("Please Enter a valid .edu Email Address")
		return false;
	}

	var schoolChoice = form.schoolChoice.value;


	var schoolExp = new RegExp(schoolChoice);


	if(!schoolExp.test(emailAddress))
	{
		alert("Please Enter a valid .edu Email Address")
		return false;
	}

	return true;

}
</script>

 <body>
 	<!--Header -->
    <div class="container">
      <div class="header">
       <h2 class="text-muted"><a href="listings.php">taskwal</a></h2>
       <h6 class="text-muted text-under">Peersourced Task Completion</h6>
   </div>
<form name = "emailForm" action = "processEmail.php" method = "post"
		<form name = "email" action = "processEmail.php" method = "post"
	onsubmit = "return checkForm(this);">
	<select name = "schoolChoice"> 
		<option value = "none">Please Select Your School</option>
		<option value = "umich">University of Michigan</option>
		<option value = "mit">Massachusetts Institute of Technology</option>
		<option value = "illinois">University of Illinois</option>
		<option value = "purdue">Purdue University</option>
		<option value = "osu">Ohio State University</option>
		<option value = "msu">Michigan State University</option>
		<option value = "iu">Indiana Unviersity</option>
        <option value = "gatech">Georigia Tech University</option>
        <option value = "vt">Virginia Tech Univesrity</option>
        <option value = "msu">Carnegie Mellon University</option>
        <option value = "upenn">University of Pennsylvania</option>
        <option value = "umd">University of Maryland</option>
        <option value = "Yale">Yale University</option>
	</select>
	<div class="form-group">
		<label for="InputEmail">Email Address</label>
		<input name = "email" type="text" class="form-control" id="InputEmail" placeholder ="Enter Email">
	</div>
	<button type ="submit" value ="Enter" class="btn btn-default">Submit</button>
</form>
<<<<<<< HEAD
</div>
</br>

<div class="footer">
=======
		<div class="footer">
>>>>>>> 7ebc859b50f74d5f7331ee2203b7559af5f94f9c
        <ul class="footer-links group">
            <li class="list-item"><a href="/info/product" >About</a></li>
            <li class="list-item"><a href="/info/fees" >Fees & FAQ</a></li>
            <li class="list-item"><a href="/info/about" >Team</a></li>
            <li class="list-item"><a href="/info/press" >Press</a></li>
            <li class="list-item"><a href="/info/jobs" >Jobs</a></li>
            <li class="list-item"><a href="/info/legal" >Legal</a></li>
            <li class="list-item"><a href="https://help.venmo.com" >Help Center</a></li>
            <li class="list-item"><a href="/info/contact" >Contact</a></li>
        </ul>
        <div class="copyright">Copyright &copy; 2014 taskwal Inc. All Rights Reserved</div>
        <div id="social-buttons">       
            <a href="https://twitter.com/taskwal" class="twitter-follow-button" data-show-count="false">Follow @vtaskwal</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
      </div>
    </div> <!-- /container -->
</body>
</html>



