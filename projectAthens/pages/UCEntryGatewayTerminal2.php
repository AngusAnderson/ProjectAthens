<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');
    
    $email = $_SESSION['email'];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');

    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();

    $accentColour = $rowLight['AccentColour'];
    $background = $rowLight['background'];
    $followerCount = $rowLight['followerCount'];
    $followingCount = $rowLight['followingCount'];
    $profPicStyle = $rowLight['ProfPicStyle'];
    

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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
    <title>Under construction</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .active
        {
            color: <?php echo $accentColour; ?>;
        }
        .active:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .inactive
        {
            color: black;
        }
        .inactive:hover
        {
            color: #bfbfbf;
        }
        .oka
        {
            padding-top: 100px;
        }

        .container
        {
            height: 100%;
            width: 100%;
            
        }
        html, body
        {
            height: 100vh;
            background: #E6E6E6;
        }
        .InternalCSSIsBetter-me
        {
            width: 100%;
            height: 100%;
            background:#E6E6E6;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content
        {
            width: 700px;
            float: none;
            background: #E6E6E6;
            border-radius: 20px;
            margin-top: -50px;
            background: transparent;
        }
        #register-DidYouNoticeThatThisIsVerySimilarToTheRegistrationForm-ItsAlmostIfTheCreatorJustPulledTheScottishScam
        {
            width: 100%;
            background: #E6023b;
            border: 0;
            height: 50px;
            color: #E6E6E6;
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
                text-align: center;
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
            .p1-1
            {
                text-align: center;
            }
    </style>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a href="P.Pericles.php" class="inactive">Parliament</a></li>
            <li><a href="Helios.php" class="inactive">SP.Helios</a></li>
        </ul>
    </header>
    <div class="container">
        <div class="InternalCSSIsBetter-me">
            <div class="content">
            <div class="context">
            <div class="YeahISaidIt">
            <form class="form-1" action="UCEntry.php" method="POST">
                <h1 class="h1-1" style="text-align: center;">UCEntry Gateway  ||  Terminal 2</h1>

                <p class="p1-1">This is under non-vital construction</p>
            </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>