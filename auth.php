<?php
if (isset($_POST['login'])) {
	define('auth', TRUE);
}
if (isset($_POST['signup'])) {
	define('auth', TRUE);
}
else if(!defined('auth')){
	exit('error');
}
session_start();
$_SESSION['name']=$_POST['name'];
$name = $_SESSION['name'];
if (isset($_POST['login'])&&!empty($_POST['login'])) {
	$password = $_POST['password'];
	//connection to database
	$connection = mysqli_connect('localhost','root','','chatlist');
	$select = "SELECT * FROM list WHERE name='$name' AND password='$password'"; 
	$query = mysqli_query($connection,$select);
	$rows = mysqli_num_rows($query);
	if($rows == 0){
		echo '<script type="text/javascript">';
		echo 'alert("Authentication Failure")';
		echo '</script>';
		include 'login.php';
	}
	else{
		include'profiles.php';
	}
	mysqli_close($connection);
}
else if (isset($_POST['signup'])&&!empty($_POST['signup'])) {
	$password = $_POST['password'];
	//connection to database
	$connection = mysqli_connect('localhost','root','','chatlist');
	$create = "CREATE TABLE $name( ID int NOT NULL AUTO_INCREMENT , message text(1000) , PRIMARY KEY(ID))";
	$query = mysqli_query($connection,$create);
	$insert = "INSERT INTO list (`name`,`password`) VALUES('$name','$password')";
	$insquery  = mysqli_query($connection,$insert);
		echo '<script>';
		echo 'alert("Registration Succesfull")';
		echo '</script>';
	include 'newprofile.php';
}
else{
	
}
?>
