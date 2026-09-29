<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    $email2 = $_SESSION['email'];

    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email2);
    $stmt->execute();
    $result = $stmt->get_result();
    $begin = $result->fetch_array();
    
    $tmp_email = $begin['tmp_email'];
    $tmp_userid = $begin['tmp_userid'];
    $followerid = $begin['code'];
    

    if ($email2 == $tmp_email) {
        echo "<script> location.replace('profile.php'); </script>";
    } else {
        if(isset($_GET['name'])){
            $username = $_GET['name'];
    
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $con = new mysqli('localhost', 'root', '', 'userregistration');
            $con->set_charset('utf8mb4');
    
            $stmt = $con->prepare(
                "SELECT * FROM usertable WHERE user = ?"
            );
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) != 1){
                header('location:conceptForIndex.html');
            }
            while($row = mysqli_fetch_array($result)){
                $userid = $row['code'];
                $email = $row['email'];
                $name = $row['user'];
                $bio = $row['userBio'];
                $folName2 = $row['followerName'];
            }
            if($username != $name){
                die ("An error has occured");
            }
        }
    

        $stmt = $con->prepare(
            "select email from usertable where code = ?"
        );
        $stmt->bind_param("i", $tmp_userid);
        $stmt->execute();
        $result = $stmt->get_result();
        while($b =mysqli_fetch_array($result)) {
            $user_email = $b['email'];
        }
    
        $min = 1;
        $max = 100000000;
    
        $code = random_int($min, $max);
        $stmt = $con->prepare(
            "select id from followers where id = ?"
        );
        $stmt->bind_param("i", $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $num3 = mysqli_num_rows($result);
    
        while($num3 == 1){
            $code = random_int($min, $max);
            $stmt = $con->prepare(
                "select id from followers where id = ?"
            );
            $stmt->bind_param("i", $code);
            $stmt->execute();
            $result = $stmt->get_result();
            $num3 = mysqli_num_rows($result);
        }
    
        if (isset($_POST['follow'])){
            $stmt = $con->prepare(
                "SELECT * FROM followers WHERE follower_id = ? AND user_id = ?"
            );
            $stmt->bind_param("ii",$followerid, $tmp_userid);
            $stmt->execute();
            $result = $stmt->get_result();
            $num = mysqli_num_rows($result);

            if ($num == 1){
                echo "unfollow";
                $stmt = $con->prepare(
                    "delete from followers where follower_id = ? && user_id = ?"
                );
                $stmt->bind_param("ii",$followerid, $tmp_userid);
                $stmt->execute();
                $result = $stmt->get_result();
    

                $stmt = $con->prepare(
                    "UPDATE usertable SET followingCount=followingCount-1 WHERE email = ?"
                );
                $stmt->bind_param("s",$email2);
                $stmt->execute();
                $result = $stmt->get_result();

    
                $stmt = $con->prepare(
                    "UPDATE usertable SET followerCount=followerCount-1 WHERE code = ?"
                );
                $stmt->bind_param("i",$tmp_userid);
                $stmt->execute();
                $result = $stmt->get_result();
    
            } else {
                echo "follow ".$code.$user_email.$tmp_userid.' '.$followerid;
                $stmt = $con->prepare(
                    "INSERT INTO followers (id, user_id, user_email, follower_id) VALUES (?, ?, ?, ?)"
                );
                $stmt->bind_param("iisi",$code, $tmp_userid, $user_email, $followerid);
                $stmt->execute();
                $result = $stmt->get_result();
    

                $stmt = $con->prepare(
                    "UPDATE usertable SET followingCount=followingCount+1 WHERE email = ?"
                );
                $stmt->bind_param("s", $email2);
                $stmt->execute();
                $result = $stmt->get_result();
    

                $stmt = $con->prepare(
                    "UPDATE usertable SET followerCount=followerCount+1 WHERE code = ?"
                );
                $stmt->bind_param("i", $tmp_userid);
                $stmt->execute();
                $result = $stmt->get_result();
            }
        }
    }

    echo "<script> location.replace('profile.php'); </script>";

    
?>