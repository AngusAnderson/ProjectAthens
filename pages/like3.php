<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $con = mysqli_connect('localhost','root','');
    $DB = mysqli_select_db($con, 'usertextposts');

    $email = $_SESSION['email'];

    if($con->connect_error){
        die("connection terminated: " . $conn->connect_error);
    }

    // $sql = "SELECT * FROM usertext WHERE email = '$email'";
    // $result = mysqli_query($con, $sql);

    // while($x =mysqli_fetch_array($result)) {
    //     $likes = $x["likes"];

    if(isset($_GET['postid'])){
        $postid = $_GET['postid'];

        $likeSearch = "SELECT * FROM usertext WHERE postcode = '$postid'";
        $likeQuery = mysqli_query($con, $likeSearch);
        while($y = mysqli_fetch_array($likeQuery)){
            $likes = $y["likes"];
        }
        
        echo $postid;
        echo "   ";
        echo $likes;
        

    }




?>