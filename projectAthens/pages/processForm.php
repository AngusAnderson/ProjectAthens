<?php 

    //session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

?>

<?php

    if (isset($_POST['save user']))
    {
        echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";
        
        $email = $_SESSION['email'];

        $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
        $bio = $_POST['bio'];

        $target = 'images/' . $profileImageName;

        move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
    
    }

?>
