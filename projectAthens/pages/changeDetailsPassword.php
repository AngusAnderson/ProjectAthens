<?php

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    // mysqli_select_db($con, 'usertextposts');

    if(isset($_POST['updateData']))
    {
        $email = $_SESSION['email'];

        $passF = mysqli_real_escape_string($con,  htmlspecialchars($_POST['password']));
        $passE = password_hash($passF, PASSWORD_DEFAULT);
        $pass = substr($passE, 0, 60);
        
        $query = "UPDATE usertable SET userPassword = ? WHERE email = ? ";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $query)){
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $pass, $email);
            mysqli_stmt_execute($stmt);
        }
        $query_run = mysqli_query($con, $query);

        echo $pass;

        if($query_run)
        {
            $_SESSION['status'] = "Password changed :)";
            header("location: accountSettings.php");
            
        } else {
            header("location: accountSettings.php");
        }
    }
?>