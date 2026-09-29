<?php 
    // Encrypt
    $clearpass = "test";
    $hash = password_hash($clearpass, PASSWORD_DEFAULT);
    // echo "Encrypted pass:" . $hash . "<br>";


    // Decrypt
    $loginpass = "test";
    $verified = password_verify($loginpass, $hash);
    // echo $verified ? "Ok" : "Wrong passcode";

    if (password_verify($loginpass, $hash)) {
        echo "success";
    } else {
        echo "fail";
    }

?>