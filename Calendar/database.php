<?php
    //connect to database
    $mysqli = new mysqli('localhost','Tastai','253741Thai','calendar');

    if(!empty($title)){
        $qry3 = "INSERT INTO APM(date, title, details) VALUE('$dates', '$title', '$details')";
        $mysqli->query($qry3);
    }
    
    $All_date = []; // use for stored all appointments.
    $All_title = [];
    $All_details = [];
    $All_days = [];
    // $dayy = date('d', strtotime($_POST['date']));
    // array_push($All_days,$dayy);
    
    // Write query for all calendar
    $qry = 'SELECT * FROM APM';

    //Make query and result
    $result=$mysqli->query($qry);

    //Fetch the resulting rows as an array.
    while ($row=$result->fetch_assoc()){
        $All_date[] = $row['date'];
        $All_title[] = $row['title'];
        $All_details[] = $row['details'];
    }
    
    $mysqli->close();
?>
