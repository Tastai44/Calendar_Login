<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "Please type your Username <br /><br />");
            
        }elseif(strlen($Username) < 5) {
            array_push($errors, "Username must have at least 5 alphabet characters <br /><br />");
        }

        if (empty($email)) {
            array_push($errors, "Please type your Email <br /><br />");
            
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            array_push($errors, "Must be in the form abc@def.com <br /><br />");
        } 

        if (empty($password_1)) {
            array_push($errors, "Please type your Passwords <br /><br />");
            
        }elseif(strlen($password_1) < 8 || strlen($password_2) < 8) {
            array_push($errors, "Must have at least 8 alphabet characters <br /><br />");
            
        } elseif(!preg_match("#[0-9]+#",$password_1)) {
            array_push($errors, "Your Password Must Contain At Least 1 Number! <br /><br />");
            
        } elseif (!preg_match("#[A-Z]+#",$password_1)){
            array_push($errors, "Must contain Upper and Lower case letter <br /><br />");
            
        } elseif (!preg_match("#[a-z]+#",$password_1)){
            array_push($errors, "Must contain Upper and Lower case letter <br /><br />");
           
        } elseif(!preg_match("#[\W]+#",$password_1)) {
            array_push($errors, "Your Password Must Contain At Least 1 Special Character <br /><br />");
            
        } elseif (strcmp($password_1, $password_2) !== 0) {
            array_push($errors, "Passwords must match <br /><br />");
            
        } 

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }
        
        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            header('location: login.php');
        } else {
            include("validate.php");
        }
    }

?>
