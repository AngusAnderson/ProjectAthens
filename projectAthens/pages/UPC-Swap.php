<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');

    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    $email = $_SESSION['email'];


    $stmt = $con2->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();

    $accentColour = $rowLight['AccentColour'];
    $background = $rowLight['background'];
    $profPicStyle = $rowLight['ProfPicStyle'];
    $border = $rowLight['border'];
    $profileImage = $rowLight['profileImage'];
    $username = $rowLight['user'];
    $bio = $rowLight['userBio'];
    $folname = $rowLight['followerName'];
    $code = $rowLight['code'];
    $width = $rowLight['width'];
    $UPC = $rowLight['UPC'];
    $noti = $rowLight['notifactions'];

    
    $stmt = $con2->prepare(
        "SELECT * FROM followrequests WHERE user_email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $num_P = mysqli_num_rows($result);

    $stmt = $con2->prepare(
        "SELECT * FROM declarations WHERE user_email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_Pr = mysqli_num_rows($result);

    $num = $num_P + $num_Pr;



    if ($width == "500") {
        $height = "300";
    } else {
        $height = "600";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>User profile concept</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        @media only screen and (min-width: 601px)
        {
            :root {
            --settingsWidth: calc(1fr * .75) ;
            }
            body
            {
                background: <?php echo $background; ?>;
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
                width: 100vw;
                height: 100%;
                overflow-x: hidden;
            }
            .container
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 20%;
                height: 100%;
                background: #fff;
            }
            .areas
            {
                display: grid;
                grid-template-areas: 
                "left main right";

                grid-template-columns: 1fr 3fr 1fr;
                padding: 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
            }
            .options
            {
                background: rgba(44, 47, 72, 0.5);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
                grid-area: left;
            }
            .main
            {
                grid-area: main;
                background: rgba(1, 0, 28, 0.3);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
            }
            .right
            {
                grid-area: right;
                background: rgba(1, 0, 28, 0.4);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
            }
            .h1-1
            {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 700;
                font-size: 30px;
                margin: 10px 10% 0 10%;
                padding: 0 0 0 10px;
                color: #fff;
            }
            .settings
            {
                margin-top: 45px;
                /* display: inline; */
                transition: .5s ease;
                border-radius: 5px;
                width: 80%;
                margin: 20px 10% 0 10%;
                padding: 0 0 0 10px;
                height: 30px;
            }
            .settings:hover
            {
                background: rgba(0, 0, 0, 0.5);
                transition: .5s ease;
            }
            .settings-svg
            {
                color: #fff;
                background: transparent;
                display: inline-block;
            }
            .settings p
            {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 400;
                font-size: 10px;
                line-height: 12px;
                display: inline-block;
                padding-left: 20px;
                

                color: rgba(255, 255, 255, 0.75);
            }
            .destroyerOfWorlds
            {
                float: right;
                margin: 10px 20px 0 0;
            }
            .hold-the-phone
            {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 400;
                font-size: 10px;
                line-height: 12px;
                display: inline-block;
                padding-left: 20px;
                

                color: rgba(255, 255, 255, 1);
            }
            a
            {
                text-decoration: none;
                font-weight: normal;
            }
            
            .searchFunction input
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: transparent;
                outline: none;
                border: 1px solid #fff;
                box-sizing: border-box;
                border-radius: 5px;
                padding: 0 10px 0 45px;
                text-align: center;
                color: #fff;
            }
            #name::placeholder
            {
                color: #fff;
                text-align: center;
            }
            .searchFunction .searchIcon
            {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateY(-50%, -10%);
                color: #fff;
            }
            .searchFunction
            {
                position: relative;
                width: 60%;
                margin: 10px 20% 0 20%;
                height: 30px;
                border: .5px solid #fff;
                border-radius: 5px;
            }
            .image
            {
                display: flex;
                justify-content: center;
            }
            
            .nameAndBio
            {
                color: #fff;
                margin: 36px 10% 0 10%;
                width: 80%;
                text-align: center;
            }
            .followers
            {
                width: 80%;
                margin: 25px 10% 0 10%;
            }
            .p-1
            {
                padding: 0;
                margin: 0;
                display: inline-block;
                color: rgba(255, 255, 255, 0.75);
                font-family: 'Inter';
                font-style: normal;
            }
            .p-2
            {
                float: right;
                transition: .5s ease;
                color: rgba(255, 255, 255, 0.3);
                font-family: 'Inter';
                font-style: normal;
            }
            .p-3
            {
                color: #fff;
                font-family: 'Inter';
                font-style: normal;
                display: inline-block;
                padding: 13px 86px 13px 94px;
            }
            .p-3:hover
            {
                color: #fff;
            }
            .img-the-second
            {
                display: inline-block;
                width: 50px;
                height: 50px;
                background-position: 50% 50%;
                background-size: cover;
                border-radius: 50%;
                margin-top: 5px;
            }
            .content
            {
                background: rgba(1, 0, 28, 0.4);
                border-radius: 5px;
                padding: 7px 0 10px 20px;
                margin: 10px 0 10px 0;
            }
            .post
            {
                margin: 20% 0 0 20%;
            }
            .name
            {
                color: #fff;
                display: inline-block;
            }
            .time
            {
                display: inline-block;
                color: rgba(204, 204, 204, 0.75);
            }
            .unlike
            {
                color: <?php echo $accentColour; ?>;
                background: transparent;
                border: none;
                outline: none;
                cursor: pointer;
                display: inline-block;
                padding: 0 20px 0 20px;

            }
            .likeSystem
            {
                color: #ffffff;
                background-color: transparent;
                border: none;
                outline: none;
                cursor: pointer;
                display: inline-block;
                padding: 0 20px 0 20px;

            }

            .unlike:hover
            {
                color: <?php echo $accentColour; ?>;
            }
            .likeSystem:hover
            {
                color: #fff;
            }
            .comment 
            {
                color: #fff;
                padding-right: 20px;
            }
            .comment:hover
            {
                color: #fff;
            }
            .textPost
            {
                font-size: 24px;
                color: #fff;

            }
            
            .post
            {
                color: #fff;
            }
            .swap
            {
                color: #fff;
            }
            .swap:hover
            {
                color: #fff;
            }
            /* width */
            ::-webkit-scrollbar {
            width: 12px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: rgba(1, 0, 28, 0.4);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: rgba(1, 0, 28, 0.3);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: rgba(1, 0, 28, 0.1);
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
            }

            .svg
            {
                filter: invert(1) hue-rotate(.5turn);
            }
            .no {
                display: none;
            }

            
            
            
        }
        a
        {
            text-decoration: none;
        }
        .p-2:hover
        {
            transition: .5s ease;
            color: rgba(255, 255, 255, 0.5);
        }

        @media only screen and (max-width: 1200px) {
            body
            {
                background: <?php echo $background; ?>;
            }
            .no {
                display: block;
                
            }
            .container
            {
                display: none;
            }
        }

        @media only screen and (min-width: 1501px) {
            .img-1
            {
                margin: 50px 0 0 0;
                border-radius: 50%;
                width: 400px;
                height: 400;
                display: inline-block;
                background-position: 50% 50%;
                background-size: cover;
            }

        }


        @media only screen and (max-width: 1500px) {
            .img-1
            {
                margin: 50px 0 0 0;
                border-radius: 50%;
                width: 200px;
                height: 200px;
                display: inline-block;
                background-position: 50% 50%;
                background-size: cover;
            }

        }

        
        
    </style>
    <!-- <script>
        function makeLong() {
            document.getElementById("paper").classList.toggle("makeLong");
        }
    </script> -->
    <script>
        var width = screen.width;
    

        if (width < 1200) {
            location.replace('userProfileConcept.php');
        }
    </script>
    <?php 
        if ($UPC == 'UPC 1') {
            echo "<script> location.replace('userProfileConcept.php'); </script>";
        }
    ?>
</head>
<body>
    <div class="no">
        <h1>Error code 1314</h1>
        <p>Your screen does not meet the requirements for UPC 2. Despite putting in conditions to prevent you from seeing this. <a target="_blank" href="ConceptFix.php">This link will fix the screen.</a></p>
    </div>
    <div class="container">
        <div class="areas">
            <div class="options">
                <div class="title">
                    <h1 class="h1-1">User profile concept</h1>
                </div>
                <a href="conceptForIndex.php" class="Home-a"><div class="settings">
                    <img class="svg" src="bank.svg">
                    <p>Home</p>
                </div></a>
                <a href="UCEntryGatewayTerminal2.php" class="Messages-a"><div class="settings">
                    <img src="chat-fill.svg" class="svg"/>
                    <p>Messages</p>
                </div></a>
                <a href="shortcuts.php" class="Widgets-a"><div class="settings">
                    <img src="app-indicator.svg" class="svg"/>
                    </svg>
                    <p>Shortcuts</p>
                </div></a>
                <a href="logout.php" class="Logout-a"><div class="settings">
                    <img src="backspace-reverse-fill.svg" class="svg"/>
                    <p>Logout</p>
                </div></a>
                <?php 
                    if ($noti == "yes") {
                        echo '<a href="conceptForEditAccount2.php" class="Settings-a"><div class="settings">
                        <img src="gear-wide-connected.svg" class="svg"/>
                        <p><b>Settings</b></p>
                        <p class="destroyerOfWorlds">'; echo $num; echo'</p>
                        </div></a>';
                    } else {
                        echo '<a href="conceptForEditAccount2.php" class="Settings-a"><div class="settings">
                        <img src="gear-wide-connected.svg" class="svg"/>
                        <p>Settings</p>
                        </div></a>';
                    }
                ?>
                

                <?php
                    $stmt = $con2->prepare(
                        "SELECT * FROM shortcuts WHERE email = ?"
                    );
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    foreach($result as $vector) {
                                    

                        $svg = strval($vector['svg']);
                        $title = strval($vector['title']);
                        $hyperlink = strval($vector['hyperlink']);

                        
                        echo "<a href='$hyperlink' class='These-classes-do-not-even-get-used'><div class='settings'>
                            <img src='image/$svg' class='svg'/>
                            </svg>
                            <p>$title</p>
                            </div></a>";
                    }

                ?>
                
            </div>
            <div class="main">
                <div class="search">
                    <div class="searchFunction">
                        <form action="profile.php">
                            <input type="text" id="name" name="name" placeholder="Search P.Athens">
                        </form>
                    </div>
                </div>
                <div class="userPosts">
                    <?php
                        $email = $_SESSION['email'];
                        $followerid = $_SESSION['code'];

                        $stmt = $con2->prepare(
                            "SELECT * FROM pictures WHERE email = ?"
                        );
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        $stmt = $con2->prepare(
                            "SELECT * FROM usertext WHERE email = ? ORDER BY id DESC"
                        );
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result2 = $stmt->get_result();
                        
                            $row2 = $result2->fetch_array();?>
                                <div class="post">

                                    

                                    
                                    <?php foreach($result2 as $mouse){
                                        $uniqueCode = uniqid();
                                        $postcode = $mouse['postcode'];
                                        echo "<style>

                                        .like1$uniqueCode
                                        {
                                            color: #ffffff;
                                        }
                                        .like1$uniqueCode.no
                                        {
                                            color: $accentColour;
                                            display: inline-block;
                                        }

                                        .unlike1$uniqueCode
                                        {
                                            color: $accentColour;
                                        }
                                        .unlike1$uniqueCode.no2
                                        {
                                            color: #ffffff;
                                        }

                                        
 
                                     </style>";
 
                                     echo "<script>
                                        function swapLikee$uniqueCode(){
                                            document.getElementById('$postcode-1').classList.toggle('no');
                                        }
                                        function swapLikee2$uniqueCode(){
                                            document.getElementById('$postcode-1-2').classList.toggle('no2');
                                        }
                                        
                                     </script>";?>
                                        <div class="name">
                                            <b><?php echo $username; ?></b>
                                        </div>
                                        <div class='time'>
                                            <?php echo $mouse['postedTime'];?>
                                        </div>
                                        <?php
                                            if ($mouse['picCode'] == 0) {
                                                $stmt = $con2->prepare(
                                                    " select * from likes where user = ? and postcode =?"
                                                );
                                                $stmt->bind_param("si", $email, $mouse['postcode']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $num4mk2 = mysqli_num_rows($result);

                                                $postcode = $mouse['postcode'];
                                                $id = $mouse['id'];

                                                if($num4mk2 != 1){
                                                    echo "<br><p class='textPost'><b>".$mouse['textmessage']."</b></p>".
                                                    "".$mouse['likes']."
                                                    <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br><br><br>";
                                                    
                                                } else {
                                                    echo "<br><p class='textPost'><b>".$mouse['textmessage']."</b></p>".
                                                    "".$mouse['likes']."
                                                    <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br><br><br>";
                                                }
                                            } else {
                                                echo "<style>
                                                    .picture$uniqueCode
                                                    {
                                                        border-radius: 8px;
                                                        width: 450px;
                                                        height: 500px;
                                                    }
                                                    .picture$uniqueCode.makeLong
                                                    {
                                                        width: 500px;
                                                        height: 300px;
                                                    }
                                                </style>";


                                                echo "<script>
                                                    function makeLong$uniqueCode(){
                                                        document.getElementById('paper$uniqueCode').classList.toggle('makeLong');
                                                    }
                                                </script>";


                                                $stmt = $con2->prepare(
                                                    " select * from likes where user = ? and postcode =?"
                                                );
                                                $stmt->bind_param("si", $email, $mouse['postcode']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $num4mk2 = mysqli_num_rows($result);

                                                $postcode = $mouse['postcode'];
                                                $id = $mouse['id'];

                                                $quickQuery = "select * from pictures where picCode = ".$mouse['picCode']."";
                                                $quickResult = mysqli_query($con2, $quickQuery);

                                                while ($quick = mysqli_fetch_array($quickResult)) {

                                                    $picture = $quick['picture'];
                                                    if($num4mk2 != 1){
                                                        echo "<br><p class='textPost'><b>".$mouse['textmessage']."</b></p>".
                                                        "
                                                        <img class='picture$uniqueCode' id='paper$uniqueCode' src='image/$picture'><br><br>".$mouse['likes']."
                                                        <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a>

                                                        <svg class='swap' id='swap' onclick='makeLong$uniqueCode()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-shuffle' viewBox='0 0 16 16'>
                                                        <path fill-rule='evenodd' d='M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z'/>
                                                        <path d='M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z'/>
                                                        </svg><br><br><br><br>";
                                                    } else {
                                                        echo "<br><p class='textPost'><b>".$mouse['textmessage']."</b></p>".
                                                        "
                                                        <img class='picture$uniqueCode' id='paper$uniqueCode' src='image/$picture'><br><br>".$mouse['likes']."
                                                        <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a>
                                                        <svg class='swap' id='swap' onclick='makeLong$uniqueCode()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-shuffle' viewBox='0 0 16 16'>
                                                        <path fill-rule='evenodd' d='M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5z'/>
                                                        <path d='M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z'/>
                                                        </svg><br><br><br><br>";
                                                    }
                                                }  
                                            }
                                        
                                    }
                                    
                    ?>
                                </div>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <img class="img-1" src="image/<?php echo $profileImage; ?>">
                </div>
                <div class="nameAndBio">
                    <h1><?php echo $username; ?></h1>
                    <p><?php echo $bio; ?></p>
                </div>
                <div class="followers">
                    <div class="topbar">
                        <p class="p-1"><?php echo $folname; ?></p>
                        <a class="p-2" href="UPC-Followers.php">See all</a>
                    </div>
                    <div class="folMain">
                        <div class="mainContent">
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT followers.follower_id, followers.user_email, usertable.code, usertable.profileImage, usertable.user, usertable.email FROM followers, usertable
                                    WHERE followers.follower_id = usertable.code
                                    AND followers.user_email = ?
                                    LIMIT 3"
                                );
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                foreach($result as $person) {

                                    $nameTheSecond = $person['user'];
                                    $imgTheSecond = $person['profileImage'];

                                    echo "<div class='content'>
                                    <img class='img-the-second' src='image/$imgTheSecond'>
                                    <a class='p-3' href='profile.php?name=$nameTheSecond'>$nameTheSecond</a>
                                    </div>";
                                    
                                }


                                

                            ?>


                            
                            
                        </div>
                    </div>
                </div>
                <div class="followers">
                    <div class="topbar">
                        <p class="p-1">Following</p>
                        <a class="p-2" href="UPC-Following.php">See all</a>
                    </div>
                    <div class="folMain">
                        <div class="mainContent">
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT followers.follower_id, followers.user_id, usertable.code, usertable.user, usertable.profileImage, usertable.email FROM followers, usertable
                                    WHERE followers.user_id = usertable.code
                                    AND followers.follower_id = ?
                                    LIMIT 3"
                                );
                                $stmt->bind_param("i", $code);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                foreach($result as $vector) {
                                    

                                    $nameTheSecond = strval($vector['user']);
                                    $imgTheSecond = $vector['profileImage'];

                                    
                                    echo "<div class='content'>
                                    <img class='img-the-second' src='image/$imgTheSecond'>
                                    <a class='p-3' href='profile.php?name=$nameTheSecond'>$nameTheSecond</a>
                                    </div>";
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.likeSystem').click(function(event) {
                    event.preventDefault();
                    var postid = $(this).attr('id');
                    $.ajax({
                        url: 'CFlike.php',
                        type: 'post',
                        async: false,
                        data:{
                            'liked': 1,
                            'postid': postid
                        },
                        success: function() {

                        }
                    });
                });

                $('.unlike').click(function(event) {
                    event.preventDefault();
                    var postid = $(this).attr('id');
                    $.ajax({
                        url: 'CFlike.php',
                        type: 'post',
                        async: false,
                        data:{
                            'unliked': 1,
                            'postid': postid
                        },
                        success: function() {

                        }
                    });
                });
            })
        </script>
    </div>
</body>
</html>