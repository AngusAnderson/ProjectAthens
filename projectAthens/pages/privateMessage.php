<?php

    session_start();

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'usermessages');

    $userA = $_POST['userA'];
    $userB = $_POST['userB'];
    $userAmessage = $_POST['userAmessage'];
    $userBmessage = $_POST['userBmessage'];
    $id = $_POST['ID'];

    $r = " select * from usermessages where name = '$id'";
    
    $result = mysqli_query($con, $r);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo" Id is already taken";
    } else{
        $mess = " insert into usermessages(userA, userB, userAmessage, userBmessage, ID) values ('$userA', '$userB', '$userAmessage', '$userBmessage', '$id')";
        mysqli_query($con, $mess);
        echo" Message successful";
    }
?>