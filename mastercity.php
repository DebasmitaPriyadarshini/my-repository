<?php 
 include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master City</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>City</h2>
	</div>
	
	<form method="post" action="mastercity.php">
	<div class="input-group">
			<label>City Name</label>
			<input type="text" name="city" id='city'/>
	</div>
	<div class="input-group">
			<button type="submit" class="btn" name="Submit" id="insert">Input City</button>
	</div>
	</form>
	</body></html>