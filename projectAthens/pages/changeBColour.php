<?php

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    if(isset($_POST['updateData']))
    {
        $email = $_SESSION['email'];

        $borderFAKE = $_POST['border'];

        $border = mysqli_real_escape_string($con, htmlspecialchars($borderFAKE));
        


        if(preg_match('/^#[a-f0-9]{6}$/i', $border))
        {
            $query = "UPDATE usertable SET border = ? WHERE email = ? ";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $query)){
                echo "SQL error";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $border, $email);
                mysqli_stmt_execute($stmt);
            }
        } 
        

        elseif(preg_match('/^[a-f0-9]{6}$/i', $border))
        {
            $border2 = '#' . $border;
            $stmt = $con->prepare(
                "UPDATE usertable SET border = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $border2, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        
    }
    header("location: accountSettings.php");
?>