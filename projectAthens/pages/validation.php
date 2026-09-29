<?php

    session_start();

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    $email = mysqli_real_escape_string($con,  htmlspecialchars($_POST['email']));
    $name =  mysqli_real_escape_string($con,  htmlspecialchars($_POST['user']));
    $loginpass =  mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));

    if ($con) {
        $stmt = $con->prepare(
            "SELECT * FROM usertable WHERE user=? AND email=?"
        );
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $num = mysqli_num_rows($result);
        if ($num == 0){
            die();
        }


        $data = $result->fetch_array();
        
    
        $folName = $data['followerName'];
        if (empty($folName)) {
            echo "<script> location.replace('login.php'); </script>";
        }
        $granted = $data['access'];
        $isRandom = $data["isRandom"];
        $isRandom2 = $data['isRandom2'];
        $tmp_userid = $data["tmp_userid"];
        $user_id = $data["code"];
        $userBio = $data["userBio"];
        $_SESSION['tmp_userid'] = $tmp_userid;
        $_SESSION['code'] = $user_id;
        $_SESSION['folName'] = $folName;
        $_SESSION['bio'] = $userBio;
        $border = '#ffffff';
    
        $hash = $data['userPassword'];
    
        if($isRandom == "yes"){
            function rand_colour() {
                return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
            
            $randColour = rand_colour();

            $stmt2 = $con->prepare(
                "UPDATE usertable SET AccentColour =? WHERE email =?"
            );
            $stmt2->bind_param("ss", $randColour, $email);
            $stmt2->execute();
        }
        if($isRandom2 == "yes"){
            function rand_colour2() {
                return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
            
            $randColour2 = rand_colour2();

            $stmt3 = $con->prepare(
                "UPDATE usertable SET background =? WHERE email =?"
            );
            $stmt3->bind_param("ss", $randColour2, $email);
            $stmt3->execute();
        }

        $no = 'no';

        $stmt4 = $con->prepare(
            "UPDATE usertable SET access =? WHERE email =?"
        );
        $stmt4->bind_param("ss", $no, $email);
        $stmt4->execute();

        // $msg = "First line of text\nSecond line of text";
        // $msg = wordwrap($msg,70);
        // mail($email,"My subject",$msg);

        echo "test";

        if (password_verify(strval($loginpass), $data['userPassword'])) {
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            header('location:intro.php');
        } else {
            echo "<script> location.replace('login.php'); </script>";
        }
    } else {
        echo "<script> location.replace('login.php'); </script>";
    }

?>