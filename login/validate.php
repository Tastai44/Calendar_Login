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
       <title>Error</title>
   </head>
   <body>
    <div class="container">
            <div class="card">
                <?php
                    foreach ($errors as $error) :
                        echo $error;
                    endforeach;
                    if (empty($errors)){
                        echo $_SESSION['error'];
                    }
                    echo "<br /><a href='register.php'>Register</a> / <a href='login.php'>Login</a>";
                ?>
            </div>
        </div>
   </body>
</html>

   


