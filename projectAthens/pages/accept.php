<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php

    $email = $_SESSION['email'];
    if(isset($_GET['id'])){
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
        $email = mysqli_real_escape_string($con, htmlspecialchars($_SESSION['email']));
        $id = $_GET['id'];
        $getLikes = "SELECT * FROM followrequests WHERE id = '$id'";
        $query = mysqli_query($con, $getLikes);
        while ($row = mysqli_fetch_array($query)){
            $userid = $row['user_id'];
            $user_email = $row['user_email'];
            $followerEmail = $row['followerEmail'];
            $followerid = $row['follower_id'];

            $search = "insert into followers (id, user_id, user_email, follower_id) values ('$code', '$userid', '$user_email', '$followerid')";
            $query2 = mysqli_query($con, $search);

            $carpet = "UPDATE usertable SET followingCount=followingCount+1 WHERE email = '$followerEmail'";
            $f = mysqli_query($con, $carpet);

            $carpet4 = "UPDATE usertable SET followerCount=followerCount+1 WHERE email = '$email'";
            $fg = mysqli_query($con, $carpet4);

            $delete = "DELETE FROM followrequests WHERE id = '$id'";
            $query3 = mysqli_query($con, $delete);

            echo "<script> location.replace('requests.php'); </script>";
        }
    }
?>