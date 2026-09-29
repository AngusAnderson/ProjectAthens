<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    $con = mysqli_connect('localhost','root','');
    $DB = mysqli_select_db($con, 'userregistration');
    
    $email2 = $_SESSION['email'];
    
    
    $goodStuff = "select code from usertable where email = '$email2'";
    $desk = mysqli_query($con, $goodStuff);
    while($x =mysqli_fetch_array($desk)) {
        $followerid = $x["code"];
        $_SESSION['code'] = $followerid;
    }

    $p = "select * from usertable where email = '$email2'";
    $good = mysqli_query($con ,$p);
    while($x =mysqli_fetch_array($good)) {
        $userid = $x["tmp_userid"];
        $name = $x["tmp_user"];
        $username = $x["tmp_user"];
        $email = $x["tmp_email"];
        $bio = $x["tmp_bio"];
        $folName2 = $x["tmp_fol_name"];
        $profileImage = $x["tmp_prof_img"];
        $email2 = $x['email'];
    }

    $min = 1;
    $max = 100000000;

    $code = random_int($min, $max);
    $c = "select * from usertable where code = '$code'";
    $result3 = mysqli_query($con, $c);
    $num3 = mysqli_num_rows($result3);

    while($num3 == 1){
        $code = random_int($min, $max);
        $c = "select * from usertable where code = '$code'";
        $result3 = mysqli_query($con, $c);
        $num3 = mysqli_num_rows($result3);
    }

    // echo $userid;

    if (isset($_POST['follow'])){
        $i = "select * from followers where follower_id = '$followerid'";
        $result5 = mysqli_query($con, $i);
        $num = mysqli_num_rows($result5);
        if ($num == 1){
            echo "Already following";
        } else {
            $ok = "insert into followers (id, user_id, follower_id) values ('$code', '$userid', '$followerid')";
            mysqli_query($con, $ok);
            echo "success";
        }
    }

    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
        $background = $rowLight['background'];
        $followerCount = $rowLight['followerCount'];
        $followingCount = $rowLight['followingCount'];
        $profPicStyle = $rowLight['ProfPicStyle'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Private account</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
            background: <?php echo $background; ?>;
        }
        a
        {
            text-decoration: none;
        }
        .inactive
        {
            color: black;
        }
        .inactive:hover
        {
            color: #bfbfbf;
        }
        .big-lock
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: <?php echo $accentColour; ?>;
        }
        .oka-big
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 120px;
            color: <?php echo $accentColour; ?>;
        }
        .oka
        {
            padding-top: 100px;
        }

        header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
                font-family: 'Poppins', sans-serif;
            }
            header .links
            {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                margin: 0 10px;
            }
            header .links li
            {
                list-style: none;
                margin: 0 10px;
            }
            header .links li a
            {
                text-decoration: none;
                font-weight: normal;
                letter-spacing: .25px;
            }
            header .searchFunction
            {
                position: relative;
                width: 300px;
                height: 40px;
            }
            header .searchFunction input
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
            header .searchFunction input::placeholder
            {
                color: #000000;
            }
            header .searchFunction .searchIcon
            {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: 10px;
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
    </style>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a href="Helios.php" class="inactive">Helios</a></li>
        </ul>
        <div class="searchFunction">
            <form action="profile.php" method="GET">
                    <input type="text" id="name" name="name" placeholder="Search P.Athens">
            </form> 
            <div class="searchIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
        </div>
    </header>
    <div class="big-lock">
        <svg class = 'lock' xmlns='http://www.w3.org/2000/svg' width='64' height='64' fill='currentColor' class='bi bi-shield-lock-fill' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z'/>
        </svg>
    </div>
    <div class="oka-big">
        <p class="oka">This account is private, send the <?php echo $folName2; ?> a request <a href="timeToFollow.php">here</a></p>
    </div>
</body>
</html>