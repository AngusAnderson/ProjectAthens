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
        $granted = $rowLight['access'];
    }

    $number = random_int(1, 10);

    if($number == 1){
        $msg = "Where the worst ideas become a reality";
    } elseif ($number == 2){
        $msg = "Table?";
    } elseif ($number == 3) {
        $msg = "Bin material";
    } elseif ($number == 4) {
        $msg = "Significant is Significant";
    } elseif ($number == 5) {
        $msg = "Ah, table?";
    } elseif ($number == 6) {
        $msg = "Bishop take A1";
    } elseif ($number == 7) {
        $msg = "Why?";
    } elseif ($number == 8) {
        $msg = "writing why? while thinking why? while writing this thinking...";
    } elseif ($number == 9) {
        $msg = "This took too long to make";
    } elseif ($number == 10) {
        $msg = "Ripping off the app store, exclusively that.";
    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The bin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        *
        {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            box-sizing: border-box;
        }
        .likeSystem
        {
            color: #cccccc;
            background-color: <?php echo $background; ?>;
            border: none;
            outline: none;
            cursor: pointer;
        }
        .like
        {
            color: <?php echo $accentColour; ?>;
            background-color: <?php echo $background; ?>;
            border: none;
            outline: none;
            cursor: pointer;
            position: relative;
        }
        .h1-1
        {
            
            display: grid;
            place-items: center;
            transition: 200ms ease;
        }
        .h2-1
        {
            opacity: 0;
            transition: opacity 1000ms ease;
            text-align: center;
            font-size: medium;
            font-weight: 50;
        }
        .h2-1:hover
        {
            opacity: 1;
            transition: opacity 1000ms ease;
        }
        body
        {
            background: <?php echo $background; ?>;
            width: 1200px;
            margin: auto;
        }

        .searchFunction
        {
            position: relative;
            width: 300px;
            height: 40px;
            margin: 20px;
        }
        .searchFunction input
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #000000;
            outline: none;
            border: 1px solid #000000;
            box-sizing: border-box;
            border-radius: 4px;
            padding: 0 10px 0 45px;
        }
        .searchFunction input::placeholder
        {
            color: #000000;
        }
        .searchFunction .searchIcon
        {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
        }
        .binAccount
        {
            margin: 20px;
            color: <?php echo $accentColour; ?>;
            display: inline-block;
        }
        .Profile
        {
            position: relative;
            /* width: 250px; */
            top: -15px;
            margin: 0 30px;
            padding: 10px 30px;
            text-align: right;
        }
        .name
        {
            position: absolute;
            top: 50%;
            /* transform: translateY(-50%); */
            right: 140px;
            font-size: x-large;
        }
        .profile-pic
        {
            width: 100px;
            border-radius: <?php echo $profPicStyle; ?>;
            background: #fff;
            padding: 6px;
            margin-top: 40px;
        }
        .bin-pic
        {
            width: 190px;
            border-radius: 5px;
        }
        .AddButton
        {
            position: relative;
            width: 300px;
            height: 40px;
            margin: 20px;
        }
        .test-button a
        {
            position: relative;
            padding: 10px 30px;
            margin: 0 10px;
            top: -150px;
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
            width: 10px;
            height: 10px;
            border-top: 2px solid <?php echo $accentColour; ?>;
            border-left: 2px solid <?php echo $accentColour; ?>;
            transition: 0.5s;
        }
        .test-button a:hover::before
        {
            width: 100%;
            height: 100%;
        }
        .test-button a::after
        {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            border-bottom: 2px solid <?php echo $accentColour; ?>;
            border-right: 2px solid <?php echo $accentColour; ?>;
            transition: 0.5s;
        }
        .test-button a:hover::after
        {
            width: 100%;
            height: 100%;
        }

        .saved-1
        {
            position: relative;
            /* padding: 10px 30px; */
            padding: 0 5px 0 5px;
            margin: 10px 10px ;
            /* white-space: nowrap; */
            display: inline-block;
            color: <?php echo $accentColour; ?>;
            text-align: center;
            /* height: 500px;
            width: 100%; */
        }
        .saved-items-1
        {
            /* display: inline-block; */
            /* white-space: nowrap; */
            /* float: left; */
            margin: 10px 0 0 10px;
            height: 250px;
            width: 200px;
            text-align: center;
            border-radius: 10px;
            border: 2px solid <?php echo $accentColour; ?>;
        }
        #saved-id-1
        {
            border-radius: 10px;
            border: 2px solid <?php echo $accentColour; ?>;
        }
        .h3-1
        {
            text-align: left;
            border-radius: 0;
            border: 0;
        }
        .saved
        {
            position: relative;
            padding: 10px 30px;
            margin: 10px 10px;
            color: <?php echo $accentColour; ?>;
        }
        .saved-items
        {
            height: 250px;
            width: 200px;
            text-align: center;
            border-radius: 10px;
            border: 2px solid <?php echo $accentColour; ?>;
        }
        .placeholder-2
        {
            position: relative;
            top: 170px;
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
            background: <?php echo $background; ?>;
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
        .hyperlink
        {
            color: <?php echo $accentColour; ?>;
            text-decoration: none;
        }
        .hyperlink:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .searchFunction
        {
            position: relative;
            width: 300px;
            height: 40px;
        }
        .chess
        {
            width: 100%;
            height: 100%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php
        if ($granted != 'yes'){
            echo "<script> location.replace('UCEntryGatewayTerminal1.php'); </script>";
        }

       
    ?>

    <div class="Intro">
        <h1 class="h1-1" id="h1-1">The bin</h1>
        <h2 class="h2-1" id="h2-1" ><?php echo $msg; ?></h2>
        <h1 class="h1-1" id="h1-1"><a href="userProfileConcept.php">Link back to UPC</a></h1>
    </div>
    <div class="searchFunction">
        <form action="#" method="GET">
                <input type="text" id="name" name="name" placeholder="Search through the bin">
        </form>
        <div class="searchIcon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
    </div>

    <div class="Profile">
        <?php
            echo "<img class='profile-pic' src='image/$profileIMG'>"; 
            // echo "<p class = 'name'>$username</p>";
        ?>
    </div>

    <br><br>

    <div class="test-button">
        <a href="inTheBin.php">Put something in the bin</a>
    </div>

    <div class="chess">
        <?php
            $email = $_SESSION['email'];
            $query = " SELECT * FROM binprojects WHERE email = '$email' ORDER BY binCode DESC LIMIT 5";
            $result = mysqli_query($con2, $query);

            while($row = mysqli_fetch_array($result)){?>
                <div class="saved-1">
                    <h3 class="h3-1">Your projects</h3>
                    <!-- <div class="saved-items-1"> -->
                        <?php
                                    if(isset($_GET['binCode'])){
                                        $extra = " select * from binbags where email = '$email' && binCode =".$_GET['binCode']."";
                                        $USD = mysqli_query($con2, $extra);
                                        $num4 = mysqli_num_rows($USD);
                                        if($num4 != 1){
                                            $book['binCode'] = array(':binCode'=>$_GET['binCode']);
                                            $carpet = "UPDATE binprojects SET binBags=binBags+1 WHERE binCode=".$_GET['binCode']."";
                                            $tube = mysqli_query($con2, $carpet);
            
                                            $carpetmk2 = "insert into binbags(email, binCode) values ('$email', ".$_GET['binCode'].")";
                                            $light = mysqli_query($con2, $carpetmk2);
                                        } else {
                                            $b = "delete from binbags where email = '$email' && binCode = ".$_GET['binCode']."";
                                            $result10 = mysqli_query($con2, $b);

                                            $carpet = "UPDATE binprojects SET binBags=binBags-1 WHERE binCode=".$_GET['binCode']."";
                                            $tube = mysqli_query($con2, $carpet);
                                        }

                                        echo "<script> location.replace('TheBin.php'); </script>";
                                        
                                    }
                            foreach($result as $mouse){?>
                                        <div class="saved-1" id="saved-id-1">
                                            <?php
                                                $extra2 = " select * from binbags where email = '$email' && binCode =".$mouse['binCode']."";
                                                $USDmk2 = mysqli_query($con2, $extra2);
                                                $num4mk2 = mysqli_num_rows($USDmk2);
                                                $img = $mouse['thumbnail'];
                                                if($num4mk2 != 1){
                                                    echo "<br><a class='hyperlink' href='binProject.php?binCode=".$mouse['binCode']."' method='GET' name='bin' id='bin'><img class='bin-pic' src='thumbnail/$img'></a><br>".$mouse['title'].
                                                    "
                                                    <form action='TheBin.php?username=$username&binCode=".$mouse['binCode']."' method='post'>
                                                        <button type='submit' class='likeSystem'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                    </svg></button>
                                                    </form>
                                                    "
                                                    .$mouse['binBags'];
                                                } else {
                                                    echo "<br><a class='hyperlink' href='binProject.php?binCode=".$mouse['binCode']."' method='GET' name='bin' id='bin'><img class='bin-pic' src='thumbnail/$img'></a><br>".$mouse['title'].
                                                    "
                                                    <form action='TheBin.php?username=$username&binCode=".$mouse['binCode']."' method='post'>
                                                        <button type='submit' class='like'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                    </svg></button>
                                                    </form>
                                                    "
                                                    .$mouse['binBags'];
                                                }?>
                                        </div>
                                        
                        <?php }?>
                    <!-- </div> -->
                </div>
            <?php } ?>
            <br><br>
    </div>

    <!-- <div class="saved">
        <h3>Your projects</h3><br><br>
        <div class="saved-items">
        <a class="hyperlink" href="#"><p class="placeholder-1">Thumbnail</p></a>
            <p class="placeholder-2">Title</p>
        </div>
    </div><br><br> -->

    <div class="saved">
        <h3>Top of the day</h3><br><br>
        <div class="saved-items">
            <a class="hyperlink" href="#"><p class="placeholder-1">Thumbnail</p></a>
            <p class="placeholder-2">Title</p>
        </div>
    </div><br><br>

    <?php
        $email = $_SESSION['email'];
        $query = " SELECT * FROM binprojects ORDER BY binBags DESC LIMIT 5";
        $result = mysqli_query($con2, $query);

        while($row = mysqli_fetch_array($result)){?>
            <div class="saved-1">
                <h3 class="h3-1">Top of all time</h3>
                <!-- <div class="saved-items-1"> -->
                    <?php
                                if(isset($_GET['binCode2'])){
                                    $extra = " select * from binbags where email = '$email' && binCode =".$_GET['binCode2']."";
                                    $USD = mysqli_query($con2, $extra);
                                    $num4 = mysqli_num_rows($USD);
                                    if($num4 != 1){
                                        $book['binCode'] = array(':binCode'=>$_GET['binCode']);
                                        $carpet = "UPDATE binprojects SET binBags=binBags+1 WHERE binCode=".$_GET['binCode2']."";
                                        $tube = mysqli_query($con2, $carpet);
        
                                        $carpetmk2 = "insert into binbags(email, binCode) values ('$email', ".$_GET['binCode2'].")";
                                        $light = mysqli_query($con2, $carpetmk2);
                                    } else {
                                        $b = "delete from binbags where email = '$email' && binCode = ".$_GET['binCode2']."";
                                        $result10 = mysqli_query($con2, $b);

                                        $carpet = "UPDATE binprojects SET binBags=binBags-1 WHERE binCode=".$_GET['binCode2']."";
                                        $tube = mysqli_query($con2, $carpet);
                                    }

                                    echo "<script> location.replace('TheBin.php'); </script>";
                                    
                                }
                        foreach($result as $mouse){?>
                                    <div class="saved-1" id="saved-id-1">
                                        <?php
                                            $extra2 = " select * from binbags where binCode =".$mouse['binCode']."";
                                            $USDmk2 = mysqli_query($con2, $extra2);
                                            $num4mk2 = mysqli_num_rows($USDmk2);
                                            $img = $mouse['thumbnail'];
                                            if($num4mk2 != 1){
                                                echo "<br><a class='hyperlink' href='binProject.php?binCode=".$mouse['binCode']."' method='GET' name='bin' id='bin'><img class='bin-pic' src='thumbnail/$img'></a><br>".$mouse['title'].
                                                "
                                                <form action='TheBin.php?username=$username&binCode2=".$mouse['binCode']."' method='post'>
                                                    <button type='submit' class='likeSystem'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                </svg></button>
                                                </form>
                                                "
                                                .$mouse['binBags'];
                                            } else {
                                                echo "<br><a class='hyperlink' href='binProject.php?binCode=".$mouse['binCode']."' method='GET' name='bin' id='bin'><img class='bin-pic' src='thumbnail/$img'></a><br>".$mouse['title'].
                                                "
                                                <form action='TheBin.php?username=$username&binCode2=".$mouse['binCode']."' method='post'>
                                                    <button type='submit' class='like'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                </svg></button>
                                                </form>
                                                "
                                                .$mouse['binBags'];
                                            }?>
                                    </div>
                                    
                    <?php }?>
                <!-- </div> -->
            </div>
        <?php } ?>

    <!-- <div class="saved">
        <h3>Top of all time</h3><br><br>
        <div class="saved-items">
            <a class="hyperlink" href="#"><p class="placeholder-1">Thumbnail</p></a>
            <p class="placeholder-2">Title</p>
        </div>
    </div> -->
</body>
</html>