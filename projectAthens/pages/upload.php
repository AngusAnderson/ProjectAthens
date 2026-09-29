<?php

    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $con = mysqli_connect('localhost','root','');
    $email = $_SESSION['email'];

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 100000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "INSERT INTO usertable SET profileImage = $fileActualExt, email = '$email'";
                    if(mysqli_query($con, $sql)) {
                        header("location: ConceptForUploadingImages.php?uploadSuccess");
                    }
                } else {
                    echo "Your file is to big";
                }
            } else {
                echo "There was an error uploading the file";
            }
        } else {
            echo "You cannot upload files of this type";
        }
    }


    //$query = "UPDATE usertable SET profileImage = '$profilePic' WHERE email = '$email' ";
    //$query_run = mysqli_query($con, $query);
    //$_SESSION['profilePic'] = $profilePic;