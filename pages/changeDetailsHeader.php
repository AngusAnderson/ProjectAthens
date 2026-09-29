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

        $headerFAKE = $_POST['header'];

        $header = mysqli_real_escape_string($con, htmlspecialchars($headerFAKE));

        if($header == "fixed" or $header == "Fixed" or $header == "hidden" or $header == "Hidden")
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET header = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $header, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            
        }
        if($query_run)
        {
            $_SESSION['status'] = "Navbar style changed :)";
            
            $_SESSION['header'] = $header;
        }
    }

    header('location: pers.php');
?>