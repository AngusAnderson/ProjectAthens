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

        $navbarFAKE = $_POST['navbar'];

        $navbar = mysqli_real_escape_string($con, htmlspecialchars($navbarFAKE));

        if($navbar == "fixed" or $navbar == "Fixed" or $navbar == "hidden" or $navbar == "Hidden")
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET navbar = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $navbar, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            
        }
        if($query_run)
        {
            $_SESSION['status'] = "Navbar style changed :)";
            
            $_SESSION['navbar'] = $navbar;
        }
        else
        {
            
            $_SESSION['status'] = "Neither 'fixed' nor 'hidden' was inputed";
        }
    }

    header('location:pers.php');
?>