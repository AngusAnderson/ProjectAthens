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

        $folNameFAKE = $_POST['folName'];

        $folName = htmlspecialchars($folNameFAKE);

        $num = 2;

        if($num != 1)
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET followerName = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $folName, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
           
        }
        if($query_run)
        {
            $_SESSION['status'] = "Follower name changed :)";
            
            $_SESSION['folName'] = $folName;
        }
        else
        {
            
            $_SESSION['status'] = "Error :(";
        }
    }

    header('location:pers.php');
?>