<?php

    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    


    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'userregistration');

    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');

    $email = mysqli_real_escape_string($con, htmlspecialchars( $_SESSION['email']));
    $text = mysqli_real_escape_string($con, htmlspecialchars($_POST['textmessage']));
    $postcode = $_GET['postcode'];
    $dateTime = date("Y-m-d H:i:s");
    $likes = 0;


    $s = "insert into comments( email, Comment, likes, postcode) values (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $s)){
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "ssii", $email, $text, $likes, $postcode);
        mysqli_stmt_execute($stmt);
    }
    $queryRun = mysqli_query($con, $s);
    
    
    echo "<script> location.replace('conceptForComments.php?postcode=$postcode'); </script>";
?>

<!-- Hello universe -->