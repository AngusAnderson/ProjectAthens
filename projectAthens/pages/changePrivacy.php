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

        $privacyFAKE = $_POST['privacy'];

        $privacy = mysqli_real_escape_string($con, htmlspecialchars($privacyFAKE));

        if($privacy == "private" or $privacy == "Private" or $privacy == "public" or $privacy == "Public")
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET UserPrivacy = ? WHERE email = ?"
            );
            $stmt->bind_param("ss", $privacy, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            
        }
        if($query_run)
        {
            $_SESSION['status'] = "Privacy setting changed :)";
            
            $_SESSION['privacy'] = $privacy;
        }
        else
        {
            $_SESSION['status'] = "Error, input only 'Private' or 'Public'";
        }
    }

    header('location:accountSettings.php');
?>