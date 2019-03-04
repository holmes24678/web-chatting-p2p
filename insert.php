<?php
session_start();
    $name =$_SESSION['name'];
    $chatter = $_SESSION['chatter'];
    $table  = $name.$chatter;
$conn  = mysqli_connect('localhost','root','','chatlist');
$name = $_GET['name'];
$message = $_GET['message'];
$insert = "INSERT INTO `$table` (`user`,`message`) VALUES('$name','$message')";
 $iquery = mysqli_query($conn,$insert);

 mysqli_close($conn);
?>