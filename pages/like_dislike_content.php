<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'usertextposts');

    

?>