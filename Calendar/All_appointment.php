<?php include('identity.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class = "box_head">My Appointments</div>
    <div class = "box3">
        <?php
            include("database.php");
            echo '<br>';
            for($i=0; $i<sizeof($All_date); $i++){
            echo " ".$All_date[$i]." ".$All_title[$i]." ".$All_details[$i];
            echo '<div class="new4">'; 
            echo '<br>';
            }
        ?>    
    </div>
    <button onclick="window.location.href='month.php';">Back to Month </button>
</body>
</html>

