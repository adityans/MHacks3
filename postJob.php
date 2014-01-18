<html>
	
	<h1> Post A New Task! </h1>
	<form name = "task" action = "processJob.php" method = "post">
		Title: <input type = "text" name = "title" /> <br>
		Price: $<input type = "text" name = "price" /> <br>
		When do you need it by?: <input type = "datetime" name = "date"/> <br>
		Description: <textarea cols = "40" rows = "5" name = "description"> description </textarea> <br>
		<input type = "submit" value = "Submit" />

</html>