<?php
/*if (isset($_POST[$name])) {
	define('auth', TRUE);
}
else if(!defined('auth')){
	exit('error');
}*/ session_start();
	$name = $_SESSION['name'];
	$_SESSION['chatter'] = $_POST['sub'];
	$chatter = $_SESSION['chatter'];
	$table  = $name.$chatter;
	$table1 = $chatter.$name;
if (isset($_POST['sub'])&&!empty($_POST['sub'])){
    $connection  = mysqli_connect('localhost','root','','chatlist');
    $create   = "CREATE TABLE `$table` ( ID int NOT NULL 
    			AUTO_INCREMENT, user text(200), message text(200),PRIMARY KEY(ID))";
    $query = mysqli_query($connection,$create);
    $create1 = "CREATE TABLE `$table1` ( ID int NOT NULL 
    			AUTO_INCREMENT, user text(200), message text(200),PRIMARY KEY(ID))";
    $query1 = mysqli_query($connection,$create1);		
    }
  ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<body>
<script>
 window.onload = setInterval(function(){
 var ajax = new XMLHttpRequest();
 var method = "GET";
 var url = "get.php";
 var asynchronous = true;
 ajax.open(method , url , asynchronous);
 ajax.send();
 ajax.onreadystatechange = function(){
 	if(this.readyState == 4 && this.status ==200){
 		var data = JSON.parse(this.responseText);
 		var html ="";
 		for(var i=0;i<data.length;i++){
 			var user = data[i].user;
 			var msg  = data[i].message;
 			html+="<tr>";
 			html+="<td> "+ user + "</td>";
 			html+="<td>" + msg + "</td>";
 			html+="</tr>"
 			document.getElementById('demo').innerHTML=html;
 		}
 	}
 }
},100);
function send(){
 var ajax = new XMLHttpRequest();
 var method = "GET";
 var url = "get.php";
 var asynchronous = true;
 ajax.open(method , url , asynchronous);
 ajax.send();
 ajax.onreadystatechange = function(){
 	if(this.readyState == 4 && this.status ==200){
 	}
 }
 var message =document.getElementById('message').value;
 var name = "<?php echo $name;?> "
 if(message!=''){
 	var ajax = new XMLHttpRequest();
 ajax.onreadystatechange = function(){
 	if(ajax.readyState == 4){
 	}
 }
 var queryString = "?name=" + name + "&message=" + message;
 ajax.open("GET","insert.php" + queryString,true);
 ajax.send(null);
 //document.getElementById('sent').innerHTML=message;
 var name = "<?php echo $name ?>";
 //document.getElementById('name').innerHTML=name;
 document.getElementById('text').reset();
 }
 
}


</script>
</body>
<center><h3 style="margin-top:2%;">Chatting Application</h3></center>
<center><h4>Welcome ,<?php echo $name?></h4></center>
<center><form action="login.php" method="POST">
	<input type="submit" name="logout" value="Log Out">
</form></center>
<div style="overflow-y:scroll;overflow-x:none;margin-top:2%;padding-left:2%;margin-left:30%;border-color:2px solid 99e6ff;width:40%;height:450px;background-color: #f5f5f0;color: #1f1f14;">
	
<table>
	<tr>
		<td id="name"></td>
		<td id="sent"></td>
	</tr>
</table>
<table id="demo">
	<tr>
		<td>
			
		</td>
	</tr>
</table>
</div>
<div style="margin-left:30%;border:2px solid 99e6ff;width:40%;height:35px;background-color: #f5f5f0;color: #1f1f14;">
<form id="text">
	<input type="text" style="margin-left:3%;width:79%;" id="message" required>
	<snap><input type="submit" value="send" onclick="send()" return false></snap>
</form>
</div><br>
<br>
<center><footer>Note:Best viewed in Desktop Version</footer></center>
</html>