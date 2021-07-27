<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
<div class="container">
    <div class="card">
    <div class="img_container"><img src="images/2.png"></div>
    
    <form action="login_db.php" method="post"> 

        <input placeholder="Username" type="text" name="username"><br />
        
        <input placeholder="Password" type="password" name="password"><br />
       
        <input class="enter_button" type="submit" value="Login" name="login_user">
    </form>
    <br /><button onclick="window.location.href='register.php';">Register </button>
    </div>
</div>
</body>
</html>