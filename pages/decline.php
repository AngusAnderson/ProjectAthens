<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    $email = $_SESSION['email'];
    if(isset($_GET['id'])){
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'userregistration');
        $email = $_SESSION['email'];
        $id = $_GET['id'];
        $getLikes = "DELETE FROM followrequests WHERE id = '$id'";
        $query = mysqli_query($con, $getLikes);
        echo "<script> location.replace('requests.php'); </script>";
    }
?>