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

        $nameFAKE = $_POST['user'];

        $name = mysqli_real_escape_string($con,  htmlspecialchars($nameFAKE));

        $stmt = $con->prepare(
            "SELECT * FROM usertable WHERE user = ?"
        );
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);

        if($num == 0)
        {
            $stmt = $con->prepare(
                "UPDATE usertable SET user = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
                    
            echo "Username already taken :(";
            header("location: accountSettings.php");
        }
            
            if($query_run){
                echo "Username changed :)";
            
                $_SESSION['username'] = $name;
                header("location: accountSettings.php");
            } else {
                
                echo "Username already taken :(";
                header("location: accountSettings.php");
            }
            
        
        
        

        
        
        
    }
?>