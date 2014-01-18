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

<form name = "email" action = "processEmail.php" method = "post"
	onsubmit = "return checkForm(this);">
	<select name = "schoolChoice">
		<option value = "none">Please Select Your School</option>
		<option value = "umich">University of Michigan</option>
		<option value = "mit">MIT</option>
		<option value = "illinois">University of Illinois</option>
		<option value = "purdue">Purdue University</option>
		<option value = "osu">Ohio State University</option>
		<option value = "msu">Michigan State University</option>
		<option value = "iu">Indiana Unviersity</option>
	</select>
	<br />
	<span>Please Enter your .edu email address</span><br />
	<input type = "text" name = "email"><br />
	<input type = "submit" value = "Enter">
</form>