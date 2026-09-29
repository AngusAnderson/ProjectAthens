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

    if(isset($_GET['binCode'])){
        $binCode = $_GET['binCode'];
        
        $q = "select * from binprojects where binCode = '$binCode'";
        $result = mysqli_query($con2, $q);
        if(mysqli_num_rows($result) != 1){
            echo "<script> location.replace('TheBin.php'); </script>";
        }
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $title = $row['title'];
            $description = $row['description1'];
            $thumbnail = $row['thumbnail'];
            $language = $row['language1'];
            $code = $row['tmp_code'];
            $css = $row['CSS'];
            $email2 = $row['email'];
            $likes = $row['binBags'];
            $date = $row['postedTime'];
        }

        //user who uploaded project info

        $carpet72 = "SELECT * FROM usertable WHERE email = '$email2'";
        $i2 = mysqli_query($con2, $carpet72);
        while($rowLight2 = mysqli_fetch_array($i2, MYSQLI_ASSOC)){
            $accentColour2 = $rowLight2['AccentColour'];
            $background2 = $rowLight2['background'];
            $profPicStyle2 = $rowLight2['ProfPicStyle'];
            $profileIMG2 = $rowLight2['profileImage'];
            $username2 = $rowLight2['user'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bin Project <?php echo $title;?></title>
    <style>
        *
        {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
            background: <?php echo $background; ?>;
            width: 1200px;
            margin: auto;
        }
        .projectTitle
        {
            margin-top: 100px;
            display: grid;
            place-items: left;
        }
        .h1-1
        {
            display: inline;
            color: <?php echo $accentColour; ?>;
        }
        .BEHIND_YOU
        {
            margin-top: 40px;
            display: inline-block;
        }
        .h3-1
        {
            display: inline;
            font-size: 20px;
            font-weight: 50;
            color: <?php echo $accentColour; ?>;
        }
        .made_you_look
        {
            margin-top: 100px;
            margin-right: 30px;
        }
        .p-1
        {
            display: inline;
            color: <?php echo $accentColour; ?>;
        }
        .about
        {
            display: inline-block;
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
            width: 350px;
            margin-right: 20px;
            height: 205px;
        }
        .about-col1
        {
            display: inline-block;
        }
        .about-col2
        {
            padding-left: 40px;
            display: inline-block;
        }
        .description
        {
            margin-top: 20px;
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
            word-wrap: break-word;
            width: 350px;
        }
        .testClass
        {
            width: 300px;
            border: 2px solid black;
            border-radius: 5px;
        }
        .testClass p
        {
            width: 300px;
            text-align: center;
        }
        .semi-overall
        {
            display: inline;
        }
        .user_code
        {
            border: 2px solid black;
            float: right;
            border-radius: 5px;
            padding: 5px;
            width: 780px;
            margin-right: 20px;
            word-wrap: break-word;
            /* height: 700px; */
        }
        .hyperlink
        {
            color: <?php echo $accentColour; ?>;
            text-decoration: none;
        }
        .hyperlink:hover
        {
            color: <?php echo $accentColour; ?>;
        }
    </style>
</head>
<body>
    <div class="projectTitle">
        <h1 class="h1-1"><b><?php echo $title; ?></b></h1>
    </div>

    <div class="BEHIND_YOU">
        <h3 class="h3-1"><?php echo $username2; ?> • </h3>
        <h3 class="h3-1"><?php echo $language; ?> • </h3>
        <p class="p-1"><?php echo $likes; ?> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
        </svg></p>
    </div>

    <div class="made_you_look">
        <div class="semi-overall">
            <div class="spicy">
                <div class="about">
                    <h5>About</h5>
                    <div class="about-col1">
                        <p><b>Developed by</b></p>
                        <p><?php echo $username2; ?></p>

                        <p><b>Release date</b></p>
                        <p><?php echo $date; ?></p>
                    </div>
                    <div class="about-col2">
                        <p><b>Bins</b></p>
                        <p><?php echo $likes; ?></p>

                        <p><b>Language</b></p>
                        <p><?php echo $language; ?></p>
                    </div>
                </div>
                <div class="user_code">
                    <h5>Code</h5>
                    <p><?php echo $css; ?></p>
                    <p><?php echo $code; ?></p>
                </div>
            </div>

            <div class="description">
                <h5>Description</h5>
                <div class="desc-col1">
                    <p><?php echo $description; ?></p>
                </div>
            </div><br>

            <div class="run">
                <a class="hyperlink" href='runProject.php?binCode=<?php echo $binCode; ?>'>Run code</a>
            </div>

        </div>
    </div>
</body>
</html>