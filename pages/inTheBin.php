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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload to the bin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        *
        {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body
        {
            width: 495px;
            margin: auto;
        }
        .h1-1
        {
            text-align: center;
            color: <?php echo $accentColour; ?>;
        }
        textarea
        {
            resize: none;
        }
        ::selection {
            background: <?php echo $accentColour; ?>;
        }
        ::-webkit-scrollbar 
        {
            width: 8px;
        }

        ::-webkit-scrollbar-track 
        {
            background: white;
        }

        ::-webkit-scrollbar-thumb 
        {
            background: <?php echo $accentColour; ?>;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover 
        {
            background: <?php echo $accentColour."99"; ?>;
        }
        .test-button a
        {
            position: relative;
            padding: 10px 30px;
            margin: 0 10px;
            color: <?php echo $accentColour; ?>;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 1px;
            overflow: hidden;
            transition: 0.5s;
        }
        .test-button a:hover
        {
            background: <?php echo $accentColour; ?>;
            color: <?php echo $background; ?>;
            box-shadow: 0 0 50px <?php echo $accentColour; ?>;
            transition-delay: 0.5s;
        }
        .test-button a::before
        {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-top: 2px solid <?php echo $accentColour; ?>;
            border-left: 2px solid <?php echo $accentColour; ?>;
            transition: 0.5s;
        }
        .test-button a:hover::before
        {
            width: 0%;
            height: 0%;
        }
        .test-button a::after
        {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border-bottom: 2px solid <?php echo $accentColour; ?>;
            border-right: 2px solid <?php echo $accentColour; ?>;
            transition: 0.5s;
        }
        .test-button a:hover::after
        {
            width: 0%;
            height: 0%;
        }
        
    </style>
</head>
<body>
    <h1 class="h1-1">Upload to the bin</h1><br><br>

    <form class="Upload" action="binUpload.php" method="POST" enctype="multipart/form-data" value="999999999999999">
        <input class="form-control" type="text" name="name" id="name"  required placeholder="Name of the project" maxlength="20"><br>
        <textarea class="form-control" rows="5" cols="10" maxlength="300" placeholder="Description of project   -    the file is the image/cover for the project" required name="description" enctype="multipart/form-data" value="999999999"></textarea><br>
        <input required type="file" name="file" class="form-control"><br>
        <input class="form-control" type="text" name="lang" id="lang"  required placeholder="Language the project is written in" maxlength="30"><br>
        <textarea class="form-control" rows="20" cols="10" placeholder="CSS of the project" required name="CSS" enctype="multipart/form-data" value="999999999"></textarea><br>
        <textarea class="form-control" rows="20" cols="10" placeholder="main body of the project" required name="code" enctype="multipart/form-data" maxlength="9999999999999" value="999999999"></textarea><br>

        <button type="submit" class="btn btn-primary" name="submit" id="submit">Upload for review</button>
    </form><br><br><br>

    <div class="test-button">
        <a href="TheBin.php">Return to the bin</a>
    </div>
</body>
</html>