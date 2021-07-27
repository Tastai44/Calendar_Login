<?php include('identity.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Month</title>
</head>
<body>

    <div class = "col1">
    Appointment 
        <form action="" method="post">
            <input placeholder="Date" type="date" name="date"><br />
            <input placeholder="Title" type="text" name="title" /><br />
            <input placeholder="Details" type="text" name="details" /><br />
            <input class="enter_button" type="submit" value="Go">
        </form>
        <button onclick="window.location.href='All_appointment.php';">All appointments</button>
        <button onclick="window.location.href='month.php?logout=1 ';">Logout</button>
    </div>

    <?php
        $day = date('d', strtotime($_POST['date']));
        $month = date('m', strtotime($_POST['date']));
        $year = date('Y', strtotime($_POST['date']));
        $d = $year."-".$month."-01";
        $firstday = date('N', strtotime($d));
        $days = date('t', strtotime($_POST['date'])); 
        $title = $_POST['title'];
        $details = $_POST['details'];
        $today = date('d');
        $daytoday = date('D', strtotime($_POST['date'])); // date with name
        $todaymonth = date('m');
        $daymonth = date('F', strtotime($_POST['date'])); // month with name
        $todayyear = date('Y');
        $dates = date("Y-m-d");
        //the month (e.g. 0 for Sun)
        $nmonth = strtotime(date("Y-m-d"));
        $prevMonth = date('Y-m-d',strtotime('-1 month', $nmonth));
        $nextMonth = date('Y-m-d',strtotime('+1 month', $nmonth));
        if(!empty($title)){
        include("database.php");
        }
        // print_r($All_days);
    ?>

    <p class = "col2">
        <?php echo " ".$daymonth. " " .$year;?> AD 
        <button onclick="window.location.href="?date=<?php echo $prevMonth;?>;"> < </button> 
        <button onclick="window.location.href='month.php';">Month </button> 
        <button onclick="window.location.href='week.php';"> Weeks </button>
        <button onclick="window.location.href='day.php';"> Days </button>
        <button onclick="window.location.href="?date=<?php echo $nextMonth;?>;" >></button>
  
    </p>
        <div class="calendar"> 
        <div class="days">Sunday</div> <div class="days">Monday</div> 
        <div class="days">Tuesday</div> <div class="days">Wednesday</div> 
        <div class="days">Thursday</div> <div class="days">Friday</div>
        <div class="days">Saturday</div>
        <?php
            for($i=1; $i<=$firstday; $i++) {
                echo '<div class="date blankday"></div>'; 
            }
        ?>
        <?php
            for($i=1; $i<=$days; $i++) {
                echo '<div class="date';
                if ($today == $i && $todaymonth==$month && $todayyear == $year) {
                echo ' today'; 
            }
            echo '">'.$i.'<br>'; 
            if($day==$i){
                echo $title;
            }
            // if($All_days[$i] == $i) {
            //     for($i=0; $i<sizeof($All_date); $i++){
            //         echo $All_title[$i]." ".$All_details[$i];
            //         echo '<br>';
            //         }
            // }
            echo '</div>'; }
        ?>
        <?php
            $daysleft = 7-(($days + $firstday)%7); 
            if($daysleft<7){
                for($i=1; $i<=$daysleft; $i++) {
                echo '<div class="date blankday"></div>'; }
        }?>
        </div>

        
</body>
</html>
