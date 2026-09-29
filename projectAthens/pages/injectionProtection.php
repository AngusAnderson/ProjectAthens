<?php

    session_start();
    

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'userregistration');

    $min = 1;
    $max = 100000000;

    $code = random_int($min, $max);
    $c = "select * from usertable where code = '$code'";
    $result3 = mysqli_query($con, $c);
    $num3 = mysqli_num_rows($result3);

    while($num3 == 1){
        $code = random_int($min, $max);
        $c = "select * from usertable where code = '$code'";
        $result3 = mysqli_query($con, $c);
        $num3 = mysqli_num_rows($result3);
    }

    $email = mysqli_real_escape_string($con,  htmlspecialchars($_POST['email']));
    $name = mysqli_real_escape_string($con,  htmlspecialchars($_POST['user']));
    $pass = mysqli_real_escape_string($con,  htmlspecialchars($_POST['password']));
    $bio = "empty...";
    $folName = "alliance";
    $navbar = "fixed";
    $profileImage = "IMG_0149.jpg";
    $header = "fixed";
    $accent = "#E6023b";
    $background = "#E6E6E6";
    $random = "no";
    $profPicStyle = "50%";
    $privacy = "private";
    $noti = "no";

    $s = " select * from usertable where user = '$name'";
    $e = " select * from usertable where email = '$email'";

    $result = mysqli_query($con, $s);
    $result2 = mysqli_query($con, $e);

    $num = mysqli_num_rows($result);
    $num2 = mysqli_num_rows($result2);

    if($num == 1 or $num2 == 1){
        echo" Username or Email Already Taken";
        header('location:Apollo.php');
    }else{
        $reg = " insert into usertable(code, email, user, userPassword, userBio, profileImage,followerName, navbar, header, AccentColour, isRandom, background, isRandom2, ProfPicStyle, UserPrivacy, notifactions) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $reg)){
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($stmt, "isssssssssssssss", $code, $email, $name, $pass, $bio, $profileImage, $folName, $navbar, $header, $accent, $random, $background, $random, $profPicStyle, $privacy, $noti);
            mysqli_stmt_execute($stmt);
        }

        echo" Registration Successful";
        header('location:login.php');
        $_SESSION['bio'] = $userBio;
    }
?>