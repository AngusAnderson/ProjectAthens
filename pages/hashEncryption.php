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
    $passF = mysqli_real_escape_string($con,  htmlspecialchars($_POST['password']));
    $age = mysqli_real_escape_string($con, htmlspecialchars($_POST['age']));

    

    if ($age < 17){
        echo "<script> location.replace('login.php'); </script>";
    } else {
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

        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $pass = substr($pass, 0, 60);

        echo $name;
        echo "<br>";
        echo password_verify($nameF, $name);

        $s = " select * from usertable where user = '$name'";
        $e = " select * from usertable where email = '$email'";

        $result = mysqli_query($con, $s);
        $result2 = mysqli_query($con, $e);

        $num = mysqli_num_rows($result);
        $num2 = mysqli_num_rows($result2);

        if ($num == 1 and $num2 == 1){
            $_SESSION['message'] = "That username and email is already in use. However you can change your username, so it may be avaliable in the future.";
            header('location:login.php');
        } elseif($num == 1){
            $_SESSION['message'] = "That username is already in use. However you can change your username, so it may be avaliable in the future.";
            header('location:login.php');
        } elseif ($num2 == 1) {
            $_SESSION['message'] = "That email is already in use.";
            header('location:login.php');
        } else{
            $reg = " insert into usertable(code, email, user, userPassword, userBio, profileImage,followerName, navbar, header, AccentColour, isRandom, background, isRandom2, ProfPicStyle, UserPrivacy, notifactions, age) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $reg)){
                echo "SQL error";
            } else {
                mysqli_stmt_bind_param($stmt, "isssssssssssssssi", $code, $email, $name, $pass, $bio, $profileImage, $folName, $navbar, $header, $accent, $random, $background, $random, $profPicStyle, $privacy, $noti, $age);
                mysqli_stmt_execute($stmt);
            }

            echo" Registration Successful";
            header('location:login.php');
            $_SESSION['bio'] = $userBio;
        }
    }


    
?>