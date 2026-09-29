<?php

    session_start();
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'userregistration');

    $email = $_SESSION['email'];

    // Posts liking

    if(isset($_POST['liked'])) {
        $postcode = $_POST['postid'];
        
        $sql = "SELECT * FROM likes WHERE user = '$email' AND postcode = '$postcode'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);

        if ($num == 0) {
            $b2 = "INSERT INTO likes(user, postcode) VALUES ('$email', '$postcode')";
            $result102 = mysqli_query($con, $b2);

            $carpet2 = "UPDATE usertext SET likes=likes+1 WHERE postcode= '$postcode'";
            $tube2 = mysqli_query($con, $carpet2);
        } else {
            $b = "DELETE FROM likes WHERE user = '$email' AND postcode = '$postcode'";
            $result10 = mysqli_query($con, $b);

            $carpet = "UPDATE usertext SET likes=likes-1 WHERE postcode= '$postcode'";
            $tube = mysqli_query($con, $carpet);
        }

        
    
    }
    if (isset($_POST['unliked'])) {
        
        $postcode = $_POST['postid'];

        $sql = "SELECT * FROM likes WHERE user = '$email' AND postcode = '$postcode'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);

        if ($num == 1) {
            $b = "DELETE FROM likes WHERE user = '$email' AND postcode = '$postcode'";
            $result10 = mysqli_query($con, $b);

            $carpet = "UPDATE usertext SET likes=likes-1 WHERE postcode= '$postcode'";
            $tube = mysqli_query($con, $carpet);
        } else {
            $b2 = "INSERT INTO likes(user, postcode) VALUES ('$email', '$postcode')";
            $result102 = mysqli_query($con, $b2);

            $carpet2 = "UPDATE usertext SET likes=likes+1 WHERE postcode= '$postcode'";
            $tube2 = mysqli_query($con, $carpet2);
        }

        
        

    }


    // Comments liking

    if(isset($_POST['Comliked'])) {
        $postcode = $_POST['postid'];

        echo $postcode;
        
        $sql = "SELECT * FROM commentlikes WHERE email = '$email' AND postcode = '$postcode'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);

        if ($num == 0) {
            $b2 = "INSERT INTO commentlikes(email, postcode) VALUES ('$email', '$postcode')";
            $result102 = mysqli_query($con, $b2);

            $carpet2 = "UPDATE comments SET likes=likes+1 WHERE id= '$postcode'";
            $tube2 = mysqli_query($con, $carpet2);
        } else {
            $b = "DELETE FROM commentlikes WHERE email = '$email' AND postcode = '$postcode'";
            $result10 = mysqli_query($con, $b);

            $carpet = "UPDATE comments SET likes=likes-1 WHERE id= '$postcode'";
            $tube = mysqli_query($con, $carpet);
        }

        
    
    }
    if (isset($_POST['Comunliked'])) {
        
        $postcode = $_POST['postid'];

        $sql = "SELECT * FROM commentlikes WHERE email = '$email' AND postcode = '$postcode'";
        $query = mysqli_query($con, $sql);
        $num = mysqli_num_rows($query);

        if ($num == 1) {
            $b = "DELETE FROM commentlikes WHERE email = '$email' AND postcode = '$postcode'";
            $result10 = mysqli_query($con, $b);

            $carpet = "UPDATE comments SET likes=likes-1 WHERE id= '$postcode'";
            $tube = mysqli_query($con, $carpet);
        } else {
            $b2 = "INSERT INTO commentlikes(email, postcode) VALUES ('$email', '$postcode')";
            $result102 = mysqli_query($con, $b2);

            $carpet2 = "UPDATE comments SET likes=likes+1 WHERE id= '$postcode'";
            $tube2 = mysqli_query($con, $carpet2);
        }

        
        

    }
    

    // swap picture dimensions

    if (isset($_POST['swapDime'])) {

        $sql = "SELECT * FROM usertable WHERE email = '$email'";
        $query = mysqli_query($con, $sql);

        while ($dimensions = mysqli_fetch_array($query)) {
            $width = $dimensions['width'];

            $Vwidth = "400";
            $Vheight = "600";

            $Hwidth = "500";
            $Hheight = "300";

            if ($width == "500") {
                $carpet2 = "UPDATE usertable SET width = '$Vwidth' WHERE email = '$email'";
                $tube2 = mysqli_query($con, $carpet2);
            } else {
                $carpet2 = "UPDATE usertable SET width = '$Hwidth' WHERE email = '$email'";
                $tube2 = mysqli_query($con, $carpet2);
            }
        }
    }
    

?>