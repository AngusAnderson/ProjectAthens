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

    $sql = "SELECT * FROM usertext WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    echo $result->num_rows;


?>