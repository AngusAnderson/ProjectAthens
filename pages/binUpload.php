<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');
    $email = $_SESSION['email'];

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
        $background = $rowLight['background'];
        $profPicStyle = $rowLight['ProfPicStyle'];
        $profileIMG = $rowLight['profileImage'];
        $username = $rowLight['user'];
    }

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['description'])){
        $description = $_POST['description'];
        // echo $description;
    }
    if(isset($_POST['submit'])){
        $file2 = $_FILES['file']['name'];
    }
    if(isset($_POST['lang'])){
        $lang = $_POST['lang'];
    }
    if(isset($_POST['code'])){
        $code = $_POST['code'];
        $tmp_code = htmlspecialchars($_POST['code']);
    }
    if(isset($_POST['CSS'])){
        $css = $_POST['CSS'];
    }
    $dateTime = date("Y-m-d H:i:s");
    $binBags = 0;
    $file = uniqid() . $file2;
    $target_dir = "thumbnail/";
    $target_file = $target_dir . basename($file);
    $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    if (!in_array($ext, ["jpg", "png", "webp", "gif"])) {
        echo "Wrong file type";
        // header('location:inTheBin.php');
    } else {
        if($lang == "PHP" or $lang == "Php" or $lang == "php"or $lang == "pHp"or $lang == "phP"){
            // header('location:inTheBin.php');
        } else {
            $insert = "INSERT INTO binprojects (title, description1, thumbnail, language1, code, tmp_code, CSS, email, binBags, postedTime) VALUES ('$name', '$description', '$file', '$lang', '$code', '$tmp_code', '$css', '$email', '$binBags', '$dateTime')";
            $query = mysqli_query($con2, $insert);
            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
    
            if($query){
                echo "success";
            } else {
                echo "fail";
            }
    
            // header('location:inTheBin.php');
        }
    }
?>