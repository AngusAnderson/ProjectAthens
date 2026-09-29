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

        $folNameFAKE = $_POST['ProfPicStyle'];

        $folName = mysqli_real_escape_string($con, htmlspecialchars($folNameFAKE));

        if($folName == "circle" or $folName == "Circle")
        {
            $folName = "50%";
            $stmt = $con->prepare(
                "UPDATE usertable SET profPicStyle = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $folName, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        elseif($folName == "Rounded square" or $folName == "rounded square")
        {
            $folName = "10px";
            $stmt = $con->prepare(
                "UPDATE usertable SET profPicStyle = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $folName, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        else
        {
            $folName = "0%";
            $stmt = $con->prepare(
                "UPDATE usertable SET profPicStyle = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $folName, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }

    header('location:pers.php');
?>