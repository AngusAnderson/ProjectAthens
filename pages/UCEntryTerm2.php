<?php

    session_start();

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'userregistration');

    $email = $_SESSION['email'];

    $passcode = mysqli_real_escape_string($con,  htmlspecialchars($_POST['passcode']));
    $wall =  mysqli_real_escape_string($con,  htmlspecialchars($_POST['wall']));
    $tech =  mysqli_real_escape_string($con, htmlspecialchars($_POST['tech']));
    $keys =  mysqli_real_escape_string($con, htmlspecialchars($_POST['keys']));
    $Earth =  mysqli_real_escape_string($con, htmlspecialchars($_POST['Earth']));

    $pass1 = false;
    $pass2 = false;
    $pass3 = false;
    $pass4 = false;
    $pass5 = false;

    if ($passcode == 'TheCalculatorFellDownTheF35TheMouseHad') {
        $pass1 = true;
    }
    if ($wall == 'AppleMacintosh1984') {
        $pass2 = true;
    }
    if ($tech == 'CasioFx85GrandTouringPlus') {
        $pass3 = true;
    }
    if ($keys == 'ShiftAltFnDown') {
        $pass4 = true;
    }
    if ($Earth == "TheCreatorDesktop") {
        $pass5 = true;
    }


    if ($pass1 == true and $pass2 == true and $pass3 == true and $pass4 == true and $pass5 == true) {

        $grantedQuery = "UPDATE usertable SET access = 'yes' WHERE email = '$email'";
        $grantedQueryResult = mysqli_query($con, $grantedQuery);

        echo "<script> location.replace('TheBin.php'); </script>";
    } else {
        $grantedQuery = "UPDATE usertable SET access = 'no' WHERE email = '$email'";
        $grantedQueryResult = mysqli_query($con, $grantedQuery);

        echo "<script> location.replace('userProfileConcept.php'); </script>";
    }

    
?>
