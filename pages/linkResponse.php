<?php

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

    if(!is_file('count.txt')){
        file_put_contents('count.txt', 0);
    }

    $count = file_get_contents('count.txt');
    file_put_contents('count.txt', ++$count);

    header('location:userProfileConcept.html');

?>