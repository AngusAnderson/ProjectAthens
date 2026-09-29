<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');

    $email = $_SESSION['email'];

    $stmt = $con2->prepare(
        "SELECT * FROM usertable WHERE email=?"
    );
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();

    $accentColour = $rowLight['AccentColour'];
    $background = $rowLight['background'];
    $profPicStyle = $rowLight['ProfPicStyle'];
    $noti = $rowLight['notifactions'];
    $userid = $rowLight['code'];
    $logins = $rowLight['NoOfLogins'];
    

    $stmt = $con2->prepare(
        "SELECT * FROM followrequests WHERE user_email = ?"
    );
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $c8_1 = mysqli_num_rows($result);
    $yes = "yes";
    $no = "no";
    if ($c8_1 != 0){
        $carpet28 = "";
        $stmt = $con2->prepare(
            "UPDATE usertable SET notifactions = ? WHERE email = ?"
        );
        $stmt->bind_param("ss",$yes ,$email);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $stmt = $con2->prepare(
            "UPDATE usertable SET notifactions = ? WHERE email = ?"
        );
        $stmt->bind_param("ss",$no ,$email);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="802cca3b-31cb-41ff-ac83-08a70d5cce8b" data-blockingmode="auto" type="text/javascript"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>

    <style>
        body
        {
            background: <?php echo $background; ?>;
        }
        *
        {
            margin: 0; 
            padding: 0;
            overflow: hidden;
        }
        .heading
        {
            color: <?php echo $accentColour; ?>;
            text-align: center;
            width: 100%;
        }
        
        .container {
            
            height: 220px;
            width: 455px;
            /* position: absolute; */
            margin: auto;
            /* top: 0;
            bottom: 0;
            left: 0;
            right: 0; */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn {
            border: 2px solid white;
            height: 30px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.8s;
            
        }
        a {
            color: <?php echo $background; ?>;
            font-size: 30px;
            text-transform: capitalize;
            text-decoration: none;
        }
        .b1 {
            background: -webkit-linear-gradient(0deg, transparent 50%, <?php echo $accentColour; ?> 50%);
            background-size: 400px 80px;
        }
        .b1:hover {
            background-position: 200px 0;
        }

        .The-void
        {
            color: <?php echo $background; ?>;
        }
        .row {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        #consent-popup
        {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2em;
            display: block;
            background-color: #fff;
            transition: opacity .8s ease;
        }
        .hidden
        {
            display: none;
        }
        
        
    </style>
    <script>
        const cookieStorage = {
            getItem: (key) => {
                const cookies = document.cookie
                    .split(';')
                    .map(cookie => cookie.split('='))
                    .reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value}), {});
                return cookies[key];
            },
            setItem: (key, value) => {
                document.cookie = '${key}=${value}';
            },
        };
        
        

        const storageType = cookieStorage;
        const consentPropertyName = 'PAthensConsent';

        const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
        const saveToStorage = () => storageType.setItem(consentPropertyName, true);

        function WriteCookie() {
            var now = new Date();
            now.setTime(now.getTime() + 1 * 3600 * 1000);
            cookievalue = escape(document.myform.customer.value) + ";"

            document.cookie="name=" + cookievalue;
            document.cookie = "expires=" + now.toUTCString() + ";"
            document.write ("Setting Cookies : " + "name=" + cookievalue );
        }

        window.onload = () => {
            const consentPopup = document.getElementById("consent-popup");
            const acceptBtn = document.getElementById("accept");

            const acceptFn = event => {
                saveToStorage(storageType);
                consentPopup.classList.add("hidden");
            };

            acceptBtn.addEventListener("click", acceptFn);

            if (shouldShowPopup()) {
                setTimeout(() => {
                    consentPopup.classList.remove("hidden");
                }, 2000);
                
            }
        }
    </script>
</head>
<body>
    <?php

        $Lead = random_int(1, 100000000000000);
        if ($Lead == 123456789){
            $WhatAreTheOdds = "no-sadfjasfdlkasjflj4itlk45j980j8989GFDJASFJASDLJFLkjl21j4l34j523jl5j34lvbxcbvkk453j534jjdfgvjvjldjlrtjl43jjgdf.php";
        } else {
            $WhatAreTheOdds = "conceptForIndex.php";
        }
        $stmt = $con2->prepare(
            "UPDATE usertable SET NoOfLogins=NoOfLogins+1 WHERE email = ?"
        );
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        
    ?>

    <div class="container">
        <div class="row">
            <h2 class="heading">Welcome <?php echo $_SESSION['username']; ?></h2><br><br>
            <div class="btn b1">
                <a href="<?php echo $WhatAreTheOdds; ?>">Advance</a>
            </div>
        </div>
    </div>
    <div class="hidden" id="consent-popup" >
        <p>By using this site you agree to our <a href="#">Terms and condtions</a>.
        Please <a id="accept" href="#">Accept</a> these before using P.Athens.</p>
        <form name="myform" action="">
         Enter name: <input type="text" name="customer"/>
         <input type="button" value="Set Cookie" onclick="WriteCookie()"/>
      </form>
    </div>
</body>
</html>