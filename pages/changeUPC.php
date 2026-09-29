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

        $UPCF = $_POST['UPC'];

        $UPC = mysqli_real_escape_string($con, htmlspecialchars($UPCF));

        echo $UPC;
        
        $num = 2;

        if($num != 1)
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET UPC = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $UPC, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        else
        {
            $_SESSION['status'] = "error :(";
            
        }
    }

    header("location: accountSettings.php");
?>