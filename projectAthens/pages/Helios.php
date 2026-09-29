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

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');
    
    $email = $_SESSION['email'];

    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE email=?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();

    $accentColour = $rowLight['AccentColour'];
    $background = $rowLight['background'];
    

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redacted&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Project Helios</title>
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
        .SPH
        {
            display: flex;
            justify-content: center;
        }
        .big-Sun
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
            width: 368px;
           
        }
            header .links
            {
                display: flex;
                justify-content: center;
                /* flex-wrap: wrap; */
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
        a
        {
            text-decoration: none;
        }
        .veryGood
        {
            display: none;
        }

        @media only screen and (min-width: 1100px) {
            header .links
            {
                display: flex;
                justify-content: center;
                text-align: center;
                margin: 0 49% 0 51%;
            }
            header .links li
            {
                list-style: none;
                margin: 0 5% 0 5%;
            }
        }
        @media only screen and (min-width: 601px) {
            header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
            }
        }
        @media only screen and (max-width: 601px) {
            header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
            }
            

            header .links
            {
                display: flex;
                justify-content: center;
                margin: 0 10px 0 0;
            }
            header .links li
            {
                list-style: none;
                margin: 0 10px 0 0;
            }
        }

        .redacted
        {
            font-family: 'Redacted', cursive;
        }
    </style>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a href="P.Pericles.php" class="inactive">Parliament</a></li>
            <li><a href="Helios.php" class="active">SP.Helios</a></li>
        </ul>
    </header>
    <div class="big-Sun">
        <svg class='Helios-1' xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg>
    </div>
    <div class="oka-big">
        <p class="oka">Helios is a (Sub) Project that I am working on. It is a <span class="redacted">------- ---------</span> I am creating in <span class='redacted'>This is clearly hidden for a reason stop inspecting this.</span>, and was last used in Project
             Pi - it was a <span class="redacted">Not on my watch. Thou shall not know what this is.</span> I created. I intend to integrate (Sub) Project Helios into Project Athens.</p>
        <p class="oka">
            It is under non-vital implementation.
        </p>
    </div>
    <span class="redacted">
    </span>
</body>
</html>