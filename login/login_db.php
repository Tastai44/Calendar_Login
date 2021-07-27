<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Please type your Username <br /><br />");
        }

        if (empty($password)) {
            array_push($errors, "Please type your Passwords <br /><br />");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                header("location: ../Calendar/month.php");
            } else {
                // array_push($errors, "Wrong Username or Password <br /><br />");
                $_SESSION['error'] = "Wrong Username or Password <br /><br />";
                header("location: validate.php");
            }
        } else {
            include("validate.php");
        }
    }

?>
