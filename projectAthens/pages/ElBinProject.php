<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');
    $email = $_SESSION['email'];

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
        $background = $rowLight['background'];
        $profPicStyle = $rowLight['ProfPicStyle'];
        $profileIMG = $rowLight['profileImage'];
        $username = $rowLight['user'];
    }

    if(isset($_GET['binCode'])){
        $binCode = $_GET['binCode'];
        
        $q = "select * from binprojects where binCode = '$binCode'";
        $result = mysqli_query($con2, $q);
        if(mysqli_num_rows($result) != 1){
            echo "<script> location.replace('TheBin.php'); </script>";
        }
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $title = $row['title'];
            $description = $row['description1'];
            $thumbnail = $row['thumbnail'];
            $language = $row['language1'];
            $code = $row['code'];
            $email2 = $row['email'];
            $likes = $row['binBags'];
            $date = $row['postedTime'];
        }

        //user who uploaded project info

        $carpet72 = "SELECT * FROM usertable WHERE email = '$email2'";
        $i2 = mysqli_query($con2, $carpet72);
        while($rowLight2 = mysqli_fetch_array($i2, MYSQLI_ASSOC)){
            $accentColour2 = $rowLight2['AccentColour'];
            $background2 = $rowLight2['background'];
            $profPicStyle2 = $rowLight2['ProfPicStyle'];
            $profileIMG2 = $rowLight2['profileImage'];
            $username2 = $rowLight2['user'];
        }
    }

    echo $code;
?>