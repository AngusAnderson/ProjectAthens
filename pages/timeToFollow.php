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
    
    $email2 = $_SESSION['email'];

    $p = "select * from usertable where email = '$email2'";
    $good = mysqli_query($con ,$p);
    while($x =mysqli_fetch_array($good)) {
        $userid = $x["tmp_userid"];
        $name = $x["tmp_user"];
        $username = $x["tmp_user"];
        $email = $x["tmp_email"];
        $bio = $x["tmp_bio"];
        $folName2 = $x["tmp_fol_name"];
        $profileImage = $x["tmp_prof_img"];
        $email2 = $x['email'];
        $followerid = $x["code"];
    }

    $quick = "SELECT * FROM usertable WHERE code = '$userid'";
    $quick_result = mysqli_query($con, $quick);
    while($okay = mysqli_fetch_array($quick_result)) {
        $user_email = $okay['email'];
    }

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

    // echo $userid;

    if (isset($_POST['follow'])){
        $i = "select * from followers where follower_id = '$followerid'";
        $result5 = mysqli_query($con, $i);
        $num = mysqli_num_rows($result5);
        if ($num == 1){
            echo "Already following";
        } else {
            $ok = "insert into followers (id, user_id, follower_id) values ('$code', '$userid', '$followerid')";
            mysqli_query($con, $ok);
        }
    }

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
        $background = $rowLight['background'];
        $followerCount = $rowLight['followerCount'];
        $followingCount = $rowLight['followingCount'];
        $profPicStyle = $rowLight['ProfPicStyle'];
    }

    $carbon = "select * from followrequests where follower_id = '$followerid' && user_id = '$userid'";
    $oxygen = mysqli_query($con, $carbon);
    $number = mysqli_num_rows($oxygen);
    
    if ($number == 0){
        $s = "insert into followrequests ( user_id, user_email, followerEmail, follower_id) values (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $s)){
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($stmt, "sssi", $userid, $email, $email2, $followerid);
            mysqli_stmt_execute($stmt);
        }
    }

    $carpet8 = "SELECT * FROM followrequests WHERE user_email = '$user_email'";
    $c8 = mysqli_query($con2, $carpet8);
    $c8_1 = mysqli_num_rows($c8);
    $yes = "yes";
    $no = "no";
    if ($c8_1 != 0){
        $carpet28 = "UPDATE usertable SET notifactions = '$yes' WHERE email = '$user_email'";
        $car28pet = mysqli_query($con2, $carpet28);
    } else {
        $carpet28 = "UPDATE usertable SET notifactions = '$no' WHERE email = '$user_email'";
        $car28pet = mysqli_query($con2, $carpet28);
    }


    echo "<script> location.replace('conceptForIndex.php'); </script>";
?>