 <?php
 session_start();
    $name =$_SESSION['name'];
    $chatter = $_SESSION['chatter'];
    $table  = $name.$chatter;
 $conn = mysqli_connect('localhost','root','','chatlist');
 $select = "SELECT * FROM `$table` ORDER BY ID DESC";
 $query = mysqli_query($conn,$select);
 $result = array();
 while ($row = mysqli_fetch_assoc($query)) {
 	$result[]=$row;
 }
 echo json_encode($result);

?>



