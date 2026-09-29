<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    $email = $_SESSION['email'];
    if(isset($_GET['postid'])){
        print_r($_GET['postid']);
        print_r("Success");
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'usertextposts');
        $email = $_SESSION['email'];
        $postid = $_GET['postid'];
        $getLikes = "SELECT * FROM likes WHERE user = '$email' && postcode = '$postid'";
        $getLikesQuery = mysqli_query($con, $getLikes);
        $getLikesNum = mysqli_num_rows($getLikesQuery);
        if($getLikesNum == 1){
            $updateLikes = " UPDATE usertext SET likes=likes-1 WHERE postcode = '$postid'";
            $insertLiker = "DELETE FROM likes WHERE user = '$email' && postcode = '$postid'";
            $tmp_query = mysqli_query($con, $insertLiker);
            $tmp_query2 = mysqli_query($con, $updateLikes);
        }
        print_r($postid);
        
        $name = isset($_GET['postid']) ? $_GET['postid'] : '';
        echo $name;
    }
?>