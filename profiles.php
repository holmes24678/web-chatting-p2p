<?php/*
	this will be posted to chatting.php
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Profile</title>
	<style type="text/css">
		input[type=submit]{
			border :none;
			background-color: white;
			text-color:black;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<center><h3 style="margin-top: 3%;">Chatting Application</h3>
<h4>Welcome, <?php echo $name;?></h4></center>
<form action="chatting.php" method="POST">
	<fieldset  style="border-color:skyblue;width: 35%;height: 200px;padding-top: 12px;padding-left: 3%; margin-left: 30%;border-style: solid;border-width: 1px;">
		<legend>Friends</legend>
			<?php
			$list= array("larry page","robert","sherlock","emilia clarke","tom cruise");
			 for ($i=0; $i<=4 ; $i++) { 
	echo "<input type='submit' name='sub' value='" . $list[$i] . "'/><br>";
	} ?>
	</fieldset>
</form>
</body>
</html>
