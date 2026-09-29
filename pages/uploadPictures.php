<?php

session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}

    $msg = "";

    if(isset($_POST['upload']))
    {
        $target = "images/".basename($_FILES['image']['name']);

        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'userpictures');
        

        $image = $_FILES['image']['name'];
        $text = $_POST['text'];

        $sql = "INSERT INTO images (image, text) VALUES ( '$image', '$text')";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
            $msg = "Image uploaded";
        }
        else
        {
            $msg = "There was a problem uploading image";
        }
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Athens . Upload images</title>
    <link rel="styleSheet" type="text/css" href="styleSheetForUploadingImages.css">
</head>
<body>
    <div id="content">
<?php
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'userpictures');
    $sql = "SELECT * FROM images";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        echo "<div id='img_div'>";
            echo "<img src='".$row['image']."'>";
            echo "<p>".$row['text']."</p>";
        echo "</div>";
    }


?>
        <form method="POST" action="uploadPictures.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image" required>
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="provide a sufficient context for this masterpiece" required></textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="Upload Image">
            </div>
        </form>
    </div>
</body>
</html>