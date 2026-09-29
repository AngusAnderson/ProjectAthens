<?php

    session_Start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');
    $email = $_SESSION['email'];

    if(isset($_POST['submit'])) {
        $image= mysqli_real_escape_string($con, htmlspecialchars($_FILES['file']['name']));
        $email = $_SESSION['email'];

        $image2 = uniqid() . $image;


        $target_dir = "image/";
        $target_file = $target_dir . basename($image2);

        $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, ["jpg", "png", "webp", "gif", "jpeg"])) {
            echo "Wrong file type";
        } else {
            
            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
            $stmt = $con->prepare(
                "UPDATE usertable SET profileImage = ? WHERE email = ?"
            );
            $stmt->bind_param("ss", $image2, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $_SESSION['profilePic'] = $image2;
        }
    }

    

    header("location: accountSettings.php");

?>