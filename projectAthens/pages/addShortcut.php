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

        $titleF = $_POST['title'];
        $hyperlinkF = $_POST['hyperlink'];

        $title = mysqli_real_escape_string($con, htmlspecialchars($titleF));
        $hyperlink = mysqli_real_escape_string($con, htmlspecialchars($hyperlinkF));

        $image= mysqli_real_escape_string($con, htmlspecialchars($_FILES['file']['name']));
        $image2 = uniqid() . $image;


        $target_dir = "image/";
        $target_file = $target_dir . basename($image2);

        $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, ["svg"])) {
            echo "Wrong file type";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

            $stmt = $con->prepare(
                "insert into shortcuts (email, svg, title, hyperlink) values (?, ?, ?, ?)"
            );
            $stmt->bind_param("ssss", $email, $image2, $title, $hyperlink);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }

    header("location: shortcuts.php");
?>