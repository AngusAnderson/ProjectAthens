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

        $userBioFAKE = $_POST['userBio'];

        $userBio = mysqli_real_escape_string($con, htmlspecialchars($userBioFAKE));
        
        $num = 2;

        if($num != 1)
        {
            $query = " ";
            $stmt = $con->prepare(
                "UPDATE usertable SET userBio = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $userBio, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $_SESSION['bio'] = $userBio;
        }
        if($query_run)
        {
            $_SESSION['status'] = "bio changed :)";
            $_SESSION['bio'] = $userBio;
        }
        else
        {
            $_SESSION['status'] = "error :(";
            
        }
    }

    header("location: pers.php");
?>