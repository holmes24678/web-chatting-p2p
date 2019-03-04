<?php
if(isset($_POST['logout'])&&!empty($_POST['logout'])){
    session_start();
    session_destroy();
    echo '<script type="text/javascript">';
        echo 'alert("logout Succesful")';
        echo '</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
 <center>
     <h3 style="margin-top: 2%;">Chatting Application</h3></center>
     <br>
        <div>
         <form action="auth.php" method="POST">
             <fieldset style="border-color:skyblue;width: 35%;height: 200px;padding-top: 10px;padding-left: 3%; margin-left: 30%;border-style: solid;border-width: 1px;">
                <legend style="margin-left: 2%;">Log In</legend>
         <input style="width: 80%;" type="text" name="name" placeholder="enter name" required><br>
         <input style="margin-top: 10px;width: 80%;" type="password" name="password" placeholder="enter password" required><br><br>
         <input type="submit" name="login" value="submit">
     </form></fieldset></div>
</body>
</html>
