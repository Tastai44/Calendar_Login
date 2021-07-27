<?php include('identity.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Weeks</title>
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
        $D = date('j', strtotime($_POST['date']));
        $week = date('N', strtotime($_POST['date']));
        $days = date('t', strtotime($_POST['date'])); 
        $title = $_POST['title'];
        $details = $_POST['details'];// use for keep details.
        $dates = date('Y-m-d', strtotime($_POST['date'])); // use for keep input date.
        $today = date('d');
        $daytoday = date('D', strtotime($_POST['date'])); // date with name
        $todaymonth = date('m');
        $daymonth = date('F', strtotime($_POST['date'])); // month with name
        $todayyear = date('Y');
        $prevMonth = date('Y-m-d',strtotime('-1 month', $nmonth));
        $nextMonth = date('Y-m-d',strtotime('+1 month', $nmonth));
        $II; // use for day's number of week.
        if(!empty($title)){
            include("database.php");
        }
    ?>    

        
    <p class="col2"><?php echo " ".$daymonth. " " .$year;?> AD 
    <button onclick="window.location.href="?date=<?php echo $prevMonth;?>;"> < </button> 
        <button onclick="window.location.href='month.php';">Month </button> 
        <button onclick="window.location.href='week.php';"> Weeks </button>
        <button onclick="window.location.href='day.php';"> Days </button>
        <button onclick="window.location.href="?date=<?php echo $nextMonth;?>;" >></button>
    </p>
    
    
    <!-- <div class="box2"> 
        <div class="week">0</div>   
        <div class="week">1</div> <div class="week">2</div> 
        <div class="week">3</div> <div class="week">4</div> 
        <div class="week">5</div> <div class="week">6</div>
        <div class="week">7</div> <div class="week">8</div>
        
        <div class="week">9</div> <div class="week">10</div>
        
        <div class="week">11</div> <div class="week">12</div>
        
        <div class="week">13</div> <div class="week">14</div>
        
        <div class="week">15</div>  <div class="week">16</div>
       
        <div class="week">17</div> <div class="week">18</div>
        
        <div class="week">19</div> <div class="week">20</div>
        
        <div class="week">21</div> <div class="week">22</div>
        <div class="week">23</div> 
    </div>     -->
    <div class="calendar"> 
        <div class="days">Sunday</div> <div class="days">Monday</div> 
        <div class="days">Tuesday</div> <div class="days">Wednesday</div> 
        <div class="days">Thursday</div> <div class="days">Friday</div>
        <div class="days">Saturday</div>
        <div class="calendarweek"> 
        <?php
            if($firstday == 7) {
                $II = 0;
            }
            elseif($firstday == 6){
                $II = 1;
            }elseif($firstday == 5) {
                $II = 2;
            }elseif($firstday == 4) {
                $II = 3;
            }elseif($firstday == 3) {
                $II = 4;
            }elseif($firstday == 2) {
                $II = 5;
            }elseif($firstday == 1) {
                $II = 6;
            }
                for($k=$D; $k<$D+7; $k++){
                    if($k>=32){
                        break;
                    }
                    echo '<div class="dateweek';
                    if ($today == $k && $todaymonth==$month && $todayyear == $year) {
                    echo ' today'; 
                    }
                    echo '">'.$k.'<br>';
                    
                    if($day==$k){
                        echo $title;
                        
                    }
                    echo '</div>'; }     
                       
        ?>
        </div>
    <!-- </div> -->
</body>
</html>
