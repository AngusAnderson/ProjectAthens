<?php

    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');

    $min = 1;
    $max = 100000000;

    $code = random_int($min, $max);
    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE code = ?"
    );
    $stmt->bind_param("i", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $num3 = mysqli_num_rows($result);

    while($num3 == 1){
        $code = random_int($min, $max);
        $stmt = $con->prepare(
            "SELECT * FROM usertable WHERE code = ?"
        );
        $stmt->bind_param("i", $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $num3 = mysqli_num_rows($result);
    }

    $code2 = random_int($min, $max);
    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE code = ?"
    );
    $stmt->bind_param("i", $code2);
    $stmt->execute();
    $result = $stmt->get_result();
    $num4 = mysqli_num_rows($result);

    while($num4 == 1){
        $code2 = random_int($min, $max);
        $stmt = $con->prepare(
            "SELECT * FROM usertable WHERE code = ?"
        );
        $stmt->bind_param("i", $code2);
        $stmt->execute();
        $result = $stmt->get_result();
        $num4 = mysqli_num_rows($result);
    }



    
    $text2 = $_POST['textmessage'];
    $private =  mysqli_real_escape_string($con ,htmlspecialchars($_POST['UPC']));
    $COMLIK =  mysqli_real_escape_string($con ,htmlspecialchars($_POST['COMLIK']));
    $image = mysqli_real_escape_string($con, htmlspecialchars($_FILES['file']['name']));

    $image2 = uniqid() . $image;

    $email = $_SESSION['email'];
    $text = mysqli_real_escape_string($con ,htmlspecialchars($_POST['textmessage']));
    $likes = 0;
    date_default_timezone_set("Europe/London");
    $dateTime = date("Y-m-d H:i:s");
    $likes = 0;

    $target_dir = "image/";
    $target_file = $target_dir . basename($image2);

    $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

    if (str_contains($text, '*')) {
        $strArray = explode('*',$text);
        $name = $strArray[1];
        $something = $strArray[2];

        $stmt = $con->prepare(
            "SELECT * FROM usertable WHERE user = ?"
        );
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowLight = $result->fetch_array();
        $email_user = $rowLight['email'];
        $code_user = $rowLight['code'];
        $numero = mysqli_num_rows($result);

        if ($numero == 1) {
            $stmt = $con->prepare(
                "INSERT INTO declarations (user_email, follower_email, user_id, postcode) VALUES (?, ?, ?, ?)"
            );
            $stmt->bind_param("ssii", $email_user, $email, $code_user, $code2);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }

    // "mp4", "mov", "m4v"
    if (!in_array($ext, ["jpg", "png", "webp", "gif", "jpeg" ])) {
        echo "Wrong file type";
    } else {
        
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

        $stmt = $con->prepare(
            "insert into pictures (picCode, picture, email) values (?, ?, ?) "
        );
        $stmt->bind_param("iss", $code, $image2, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['profilePic'] = $image2;
    }
    if ($image){
        $stmt = $con->prepare(
            "insert into usertext(postcode, email, postedTime, textmessage, likes, picCode, private, comlik) values (?, ?,?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("isssiiss", $code2, $email, $dateTime, $text, $likes, $code, $private, $COMLIK);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $stmt = $con->prepare(
            "insert into usertext(postcode, email, postedTime, textmessage, likes, private, comlik) values ( ?,?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("isssiss", $code2, $email, $dateTime, $text, $likes, $private, $COMLIK);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    
    // header('location:conceptForIndex.php');
?>