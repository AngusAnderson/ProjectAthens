<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');
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
    $UPC = $rowLight['UPC'];
    

    $dollar = "SELECT email FROM usertable";
    $dolQuery = mysqli_query($con2, $dollar);
    $accounts = mysqli_num_rows($dolQuery);

    
    
?>



    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept for profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        var width = screen.width;

        function jst()
        {
            var i = 0;
            i = <?php echo json_encode($UPC); ?>;

            if (screen.width > 1200) {
                if (i == "UPC 2") {
                    location.replace('UPC.php');
                }
            }
        }

        jst();

        if( /iPad/i.test(navigator.userAgent) ) {
            alert("IPAD");
        }
    

        
    </script>
    
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        .comment {
            color: black;
            display: inline-block;
        }
        .name1
        {
            color: #000;
            display: inline-block;
            padding-right: 20px;
        }
        .time
        {
            display: inline-block;
            color: #00000075;
        }
        .like
        {
            color: <?php echo $accentColour; ?>;
            background-color: #E6E6E6;
            border: none;
            outline: none;
            cursor: pointer;
            transition: ease 200ms;
        }
        .unlike
        {
            color: <?php echo $accentColour; ?>;
            display: inline-block;
            padding: 0 20px 0 20px;
        }
        .unlike:hover
        {
            color: <?php echo $accentColour; ?>;
            display: inline-block;
            padding: 0 20px 0 20px;
        }
        .like
        {
            color: #cccccc;
        }
        .like:hover
        {
            color: #cccccc;
        }

        .unlike.thumb-Active
        {
            color: #cccccc;
        }
        .unlike.thumb-Active:hover
        {
            color: #cccccc;
        }

        .like.thumb-1-Active
        {
            color: <?php echo $accentColour; ?>;
        }
        .like.thumb-1-Active:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .content22
        {
            
            display: none;
            
        }

        .content22.now-active
        {

            display: grid;
            grid-template-areas: 
            "left   right";
            width: 100%;

            
        }
        .content22.now-active h1
        {
            color: <?php echo $accentColour; ?>;
        }

        .name {grid-area: left; height: 100%; width: 100%; text-align:center;  border-radius: 20px;}

        /* The 'x' is because it could not begin with a '0'. */
        .x-01010100-01100001-01100010-01101100-01100101-00111111 {grid-area: right; height: 100%; width: 100%; text-align:center;  border-radius: 20px;}
        
        
        #popup2
        {
            display: flex;
            justify-content: center;
        }
        .content2
        {
            transition: all 500ms ease-in-out;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0); 
            

            width: 600px;
            background: #fff;

            
        }
        .popup2 .close-btn2
        {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 25px;
            text-align: center;
            border-radius: 50%;
        }
        .theOverall
        {
            background: #fff;
            text-align: center;
            border-radius: 20px;
            border: 1px black;
            

            width: 600px;
            
            padding: 20px;
            margin: 8% auto;
            z-index: 10;
        }
        .PrePopup
        {
            width: 600px;
            height: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            z-index: -5;
        }
        .popup2.active .content2
        {
            transition: all 500ms ease-in-out;
            transform: translate(-50%, -50%) scale(1);
            
        }
        
        .Fol
        {
            font-size: 13.5px;
        }
        .active
        {
            color: <?php echo $accentColour; ?>;
        }
        /* .active:hover
        {
            color: <?php echo $accentColour; ?>;
        } */
        .inactive
        {
            color: black;
        }
        .inactive:hover
        {
            color: #bfbfbf;
        }
        .setting-icon:hover
        {
            animation: spin 2s linear infinite;
            
        }
        @keyframes spin 
        {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


        .header2:hover
        {
            opacity: 1;
            transition: 500ms ease-in-out;
        }
        .links
        {
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 0 10px;
        }
        .links li
        {
            list-style: none;
            margin: 0 10px;
        }
        .links li a
        {
            text-decoration: none;
            font-weight: normal;
            letter-spacing: .25px;
        }
        .searchFunction
        {
            position: relative;
            width: 300px;
            height: 40px;
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
            top: 55%;
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
        .links2 li
        {
            list-style: none;
            margin: 0 10px;
        }
        .links2 li a
        {
            text-decoration: none;
            font-weight: normal;
            letter-spacing: .25px;
        }
        .header .searchFunction2
        {
            position: relative;
            width: 300px;
            height: 40px;
        }
        .searchFunction2 input
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
        .searchFunction2 input::placeholder
        {
            color: #000000;
        }
        .searchFunction2 .searchIcon2
        {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
        }


        body
        {
            background: <?php echo $background; ?>;
            margin: 0;
            padding: 0;
        }
        
        .post
        {
            color: black;
            word-wrap: break-word;
        }

        .text
        {
            color: <?php echo $accentColour; ?>;
        }
        .menu-icon
        {
            width: 25px;
            position: absolute;
            left: 40px;
            top: 40px;
            color: <?php echo $accentColour; ?>;
        }
        
        .setting-icon
        {
            width: 25px;
            position: absolute;
            right: 40px;
            top: 40px;
            text-decoration: none;
            color: <?php echo $accentColour; ?>;
        }
        .profile-pic
        {
            width: 300px;
            height: 300px;
            border-radius: <?php echo $profPicStyle; ?>;
            background: <?php echo $border; ?>;
            padding: 6px;
            margin-top: 40px;
        }
        .profile-bottom p
        {
            color: black;
        }
        .profile-bottom svg
        {
            width: 15px;
            margin-top: 15px;
            cursor: pointer;
        }
        .folName
        {
            background-color: <?php echo $background; ?>;
            color: <?php echo $accentColour; ?>;
            border: none;
            outline: none;
            box-shadow: 0 5px 10px <?php echo $accentColour."70";?>;
            padding: 15px 60px;
            cursor: pointer;
            border-radius: 30px;
            margin-bottom: -50px;
            font-weight: 600;
        }
        /* .links a:hover
        {   
            color: #bfbfbf;
        } */
        .likeSystem
        {
            color: #cccccc;
            background-color: white;
            border: none;
            outline: none;
            cursor: pointer;
            display: inline-block;
            padding: 0 20px 0 20px;

        }
        .profile-box h3
        {
            font-size: 22px;
            margin-top: 20px;
            font-weight: 500;
        }
        .setting-icon.bi-bi-list
        {
            text-decoration: none;
            color: <?php echo $accentColour; ?>;
        }
        .setting-icon a
        {
            text-decoration: none;
            color: <?php echo $accentColour; ?>;
        }
        .link-to-home a
        {
            text-decoration: none;
            color: <?php echo $accentColour; ?>;
        }
        .link-to-home
        {
            margin-right: -90px;
            margin-left: -90px;
            margin-bottom: -40px;
            margin-top: -40px;
        }

        /* navbar */


        .navbar
        {
            
            position: fixed;
            
            /* background-color: #E6023b; */
        }
        .navbar-nav
        {
            list-style: none;
            padding: 0;
            /* margin-top: 430px; */
            display: flex;
            flex-direction: column;
            align-items: center;
            
            
        }
        .okmk2
        {
            display: flex;
            align-items: center;

            height: 6rem;
            
        }
        .link-text
        {
            display: none;
            margin-left: 1rem;
        }
        .nav-item
        {
            width: 100%;
        }
        .nav-item svg 
        {
            min-width: 2rem;
            margin: 0 1.5rem;
            
        }

        /* Fixed setting */
        .navbar-2
        {
            
            position: fixed;
            
            /* background-color: #E6023b; */
        }
        .navbar-nav-2
        {
            list-style: none;
            padding: 0;
            /* margin-top: 430px; */
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }
        .okmk2-2
        {
            display: flex;
            align-items: center;
            
            height: 10rem;
        }
        .link-text
        {
            display: none;
            margin-left: 1rem;
        }
        .nav-item-2
        {
            width: 100%;
        }
        .nav-item-2 svg 
        {
            min-width: 2rem;
            margin: 0 1.5rem;
        }

        /* general */

        .mk1:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .mk2:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .mk3:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .mk4:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .pseudo.active-now
        {
            display: none;
        }
        header .links
        {
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 0 47% 0 53%;
        }
        header .links li
        {
            list-style: none;
            margin: 0 5% 0 5%;
        }
        header .links2
        {
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 0 47% 0 53%;
        }
        header .links2 li
        {
            list-style: none;
            margin: 0 5% 0 5%;
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
            header .links2
            {
                display: flex;
                justify-content: center;
                text-align: center;
                margin: 0 49% 0 51%;
            }
            header .links2 li
            {
                list-style: none;
                margin: 0 5% 0 5%;
            }
        }

        /* large */
        @media only screen and (min-width: 601px)
        {
            
            .picture
            {
                height: 500px;
                width: 500px;
            }
            .profile-box
            {
                background: transparent;
                text-align: center;
                color: #fff;
                border-radius: 20px;
                border: 1px black;
                

                width: 600px;
                /* height: 1000px; */
                padding: 20px;
                margin: 8% auto;
                z-index: 10;
            }
            .profile-bottom
            {
                background: #fff;
                color: #999;
                padding: 60px 10px 60px 10px;
                margin-right: -90px;
                margin-left: -70px;
                margin-bottom: -40px;
                margin-top: -10px;
                width: 700px;
                border-radius: 20px;
            }
            
            .header2
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
                opacity: 0;
                transition: 500ms ease-in-out;
            }
            .header
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
            /* hidden setting */
            .navbar
            {
                bottom: 0;
                width: 100vw;
                /* height: 10rem; */
                z-index: 10;
                background: <?php echo $background; ?>;
            }
            .navbar-nav
            {
                flex-direction: row;
                opacity: 0;
                transition: 500ms ease-in-out;
            }
            .okmk2
            {
                justify-content: center;
                color: <?php echo $accentColour; ?>;
                
            }
            .like
            {
                color: <?php echo $accentColour; ?>;
                background-color: white;
                border: none;
                outline: none;
                cursor: pointer;
                position: relative;

            }

            /* Fixed setting */
            .navbar-2
            {
                bottom: 0;
                width: 100vw;
                z-index: 10;
                background: <?php echo $background; ?>;
                height: 5rem;
            }
            .navbar-nav-2
            {
                flex-direction: row;
                opacity: 1;
                transition: 500ms ease-in-out;
            }
            .okmk2-2
            {
                justify-content: center;
                color: <?php echo $accentColour; ?>;
                height: 5.5rem;
                
            }
            .mk1
            {
                color: <?php echo $accentColour; ?>;
            }
            .mk1-1
            {
                color: <?php echo $accentColour; ?>;
                position: absolute;
                top: 0;
            }
            .mk2
            {
                color: <?php echo $accentColour; ?>;
            }
            .mk4
            {
                color: <?php echo $accentColour; ?>;
            }

            .mk3
            {
                color: <?php echo $accentColour; ?>;
            }
            .mk1:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk2:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk3:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk4:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .navbar-nav:hover
            {
                opacity: 1;
                transition: 500ms ease-in-out;
            }
            .navbar:hover
            {
                height: 6rem;
                opacity: 1;
            }
            a
            {
                text-decoration: none;
                color: <?php echo $accentColour; ?>;
            }
            .mk1-noti
            {
                color: <?php echo $accentColour."70"; ?>;
            }
            
        }

        /* Small screen */
        @media only screen and (max-width: 600px)
        {
            html,body
            {
                overflow-x: hidden;
                overflow-y: auto;
            }

            .links2
            {
                margin: 0 0 0 35%;
            }
            .links2 li
            {
                margin: 0 10px 0 10px;
            }
            
            .picture
            {
                width: 300px;
                height: 300px;
            }
            .profile-box
            {
                background: transparent;
                text-align: center;
                color: #fff;
                border-radius: 20px;
                border: 1px black;
                

                width: 100%;
                /* height: 1000px; */
                padding: 20px;
                margin: 8% auto;
                z-index: 10;
            }
            .profile-bottom
            {
                background: #fff;
                color: #999;
                padding: 60px 10px 60px 10px;
                margin: -10px 0 -40px 0px;
                border-radius: 20px;
                width: 100%;
                display: flex;
                justify-content: center;
            }
            *
            {
                font-family: 'Poppins', sans-serif;
            }
            body
            {
                height: 200%;
                background: <?php echo $background; ?>;
            }
            .header2
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
                font-family: 'Poppins', sans-serif;
                opacity: 0;
                transition: 500ms ease-in-out;
            }
            .header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
                font-family: 'Poppins', sans-serif;
            }
            .header2
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
            }
            .header2 .searchFunction
            {
                position: relative;
                width: 410px;
                height: 40px;
                left: 50px;
            }
            .header .searchFunction
            {
                position: relative;
                width: 410px;
                height: 40px;
                left: 50px;
            }
        
            .container
            {
                margin-top: 100px;
            }
            .like
            {
                color: <?php echo $accentColour; ?>;
                background-color: white;
                border: none;
                outline: none;
                cursor: pointer;
                position: relative;

            }
            .navbar, .navbar-2
            {
                bottom: 0;
                width: 100vw;
                z-index: 10;
                height: -50px;
            }
            .navbar-nav, .navbar-nav-2
            {
                flex-direction: row;
                opacity: 1;
                transition: 500ms ease-in-out;
            }
            .okmk2, .okmk2-2
            {
                justify-content: center;
                color: <?php echo $accentColour; ?>;
                height: 3rem;
                background: #E6E6E6;
            }
            .mk1
            {
                color: <?php echo $accentColour; ?>;
            }
            
            .mk2
            {
                color: <?php echo $accentColour; ?>;
            }
            .mk4
            {
                color: <?php echo $accentColour; ?>;
            }

            .mk3
            {
                color: <?php echo $accentColour; ?>;
            }
            .mk1:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk2:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk3:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk4:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }

            .mk1:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk2:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk3:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            .mk4:hover
            {
                color: <?php echo $accentColour."80"; ?>;
            }
            a
            {
                text-decoration: none;
                color: <?php echo $accentColour; ?>;
            }
            .mk1-noti
            {
                color: <?php echo $accentColour."70"; ?>;
            }

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
            header .links2
            {
                display: flex;
                justify-content: center;
                margin: 0 10px 0 0;
            }
            header .links2 li
            {
                list-style: none;
                margin: 0 10px 0 0;
            }
        }

        

        /* floor class */
        #like
        {
            color: black;
        }
        #alreadyLiked
        {
            color: #E6023b;
        }
        #award
        {
            color: black;
            margin-left: 5px;
        }
        a
        {
            text-decoration: none;
        }

        .InteranlCSSIsBetter
        {
            color: <?php echo $accentColour; ?>;
            margin: 20px;
        }
    </style>
</head>
<body>



    <script>
        function ShowFol(){
            document.getElementById("fol").style.color = "<?php echo $accentColour; ?>";
            document.getElementById("fol").style.transition = "1s";
        }
        function hideFol(){
            document.getElementById("fol").style.color = "<?php echo $background; ?>";
            document.getElementById("fol").style.transition = "1s";
        }

        var screenWidth = window.screen.width;
    </script>

    <?php
        $email = $_SESSION['email'];

        $stmt = $con2->prepare(
            "SELECT * FROM usertable WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        $code = $row['code'];
        $username = $row['user'];
        $folName2 = $row['followerName'];
        $folCount = $row['followerCount'];
        $profileIMG = $row['profileImage'];
        $accent = $row['AccentColour'];
        $navbar = $row['navbar'];
        $header = $row['header'];
        $followerCount = $row['followerCount'];
        $followingCount = $row['followingCount'];
        $noti = $row['notifactions'];
        

        $stmt = $con2->prepare(
            "SELECT * FROM followrequests WHERE user_email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $c8_1 = $result->num_rows;
        $yes = "yes";
        $no = "no";
        if ($c8_1 != 0){
            $stmt = $con2->prepare(
                "UPDATE usertable SET notifactions = ? WHERE email = ?"
            );
            $stmt->bind_param("ss", $yes, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $stmt = $con2->prepare(
                "UPDATE usertable SET notifactions = ? WHERE email = ?"
            );
            $stmt->bind_param("ss", $no, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        

        if($folCount == 0){
            $supremeCount = "No ". $folName2;
        } else {
            $supremeCount = $folCount . ' ' . $folName2;
        }

        echo '<script>var size = parseInt(window.screen.width);</script>';
        $prematureBigSize = '<script>document.write(size)</script>';

        $bigSize = intval(strval($prematureBigSize));
        


        if($navbar == "hidden"){
            echo  "<nav class='navbar'>
            
            
                <ul class='navbar-nav'>
                <li class='nav-item'>
                    <div class='okmk2'>";
                    if ($bigSize > 600){

                        echo "<a href='conceptForEditAccount2.php'><svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                        <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                        </svg></a>";

                        if ($noti == "yes"){
                            echo "<svg class = 'mk1-1' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-circle-fill' viewBox='0 0 16 16'>
                            <circle cx='8' cy='8' r='8'/>
                            </svg>";
                        }
                    }
                    elseif ($bigSize < 601) {
                        if ($noti == "yes" ) {
                            echo "<a href='conceptForEditAccount2.php'><svg class='mk1-noti' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                        <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                        </svg></a>";
                        } else {
                            echo "<a href='conceptForEditAccount2.php'><svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                            <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                            </svg></a>";
                        }
                        
                        
                    }

                    echo "</div>
                </li>

                <li class='nav-item'>
                    <div class='okmk2'>
                        <a class='logout' href='UCEntryGatewayTerminal2.php'><svg class='mk2' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-chat-fill' viewBox='0 0 16 16'>
                        <path d='M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z'/>
                      </svg></a>
                    </div>
                </li>

                <li class='nav-item'>
                    <div class='okmk2'>
                        <a class='logout' href='TheBin.php'><svg class='mk3' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg></a>
                    </div>
                </li>

                <li class='nav-item-2'>
                    <div class='okmk2'>
                        <a class='logout' href='logout.php'><svg class='mk3' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-door-open-fill' viewBox='0 0 16 16'>
                            <path d='M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/>
                        </svg></a>
                    </div>
                </li>
            </ul>
            
            </nav>";
           
        
        } else {
            echo  "<nav class='navbar-2'>
            
            
                <ul class='navbar-nav-2'>
                <li class='nav-item-2'>
                    <div class='okmk2-2'>";

                    if ($bigSize > 600){

                        echo "<a href='conceptForEditAccount2.php'><svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                        <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                        </svg></a>";

                        if ($noti == "yes"){
                            echo "<svg class = 'mk1-1' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-circle-fill' viewBox='0 0 16 16'>
                            <circle cx='8' cy='8' r='8'/>
                            </svg>";
                        }
                    }
                    elseif ($bigSize < 601) {
                        if ($noti == "yes" ) {
                            echo "<a href='conceptForEditAccount2.php'><svg class='mk1-noti' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                        <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                        </svg></a>";
                        } else {
                            echo "<a href='conceptForEditAccount2.php'><svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-gear-wide-connected' viewBox='0 0 16 16'>
                            <path d='M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z'/>
                            </svg></a>";
                        }
                        
                        
                    }
                    echo "</div>
                </li>

                <li class='nav-item-2'>
                    <div class='okmk2-2'>
                        <a class='logout' href='UCEntryGatewayTerminal2.php'><svg class='mk2' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-chat-fill' viewBox='0 0 16 16'>
                        <path d='M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z'/>
                    </svg></a>
                    </div>
                </li>


                <li class='nav-item-2'>
                    <div class='okmk2-2'>
                        <a class='logout' href='TheBin.php'><svg class='mk3' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg></a>
                    </div>
                </li>

                <li class='nav-item-2'>
                    <div class='okmk2-2'>
                        <a class='logout' href='logout.php'><svg class='mk3' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-door-open-fill' viewBox='0 0 16 16'>
                            <path d='M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/>
                        </svg></a>
                    </div>
                </li>
            </ul>
            
            </nav>";
        }

        if($header == "hidden"){
            echo '<header class="header2">
            <ul class="links">
                <li><a class="inactive" href="conceptForIndex.php" >Home</a></li>
                <li><a class="active" href="userProfileConcept.php">Profile</a></li>
                <li><a class="inactive" href="P.Pericles.php">Parliament</a></li>
                <li><a class="inactive" href="Helios.php">SP.Helios</a></li>
            </ul>
        </header>';
        } else {
            echo '<header class="header">
            <ul class="links2">
                <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
                <li><a href="userProfileConcept.php" class="active">Profile</a></li>
                <li><a class="inactive" href="P.Pericles.php">Parliament</a></li>
                <li><a class="inactive" href="Helios.php">SP.Helios</a></li>
            </ul>
        </header>';
        }
        

    ?>
    <div class="overall" id="overall">
        <div class="constant">
            <div class="container" id="Oka">
                <div class="profile-box">
                    
                    <?php
                        echo "<img class='profile-pic' src='image/$profileIMG'>";
                    ?>

                    
                    
                    

                    <?php
                        $username = $_SESSION['username'];
                    ?>
                    <div class="text">
                        <h3><?php echo $_SESSION['username']; ?> </h3>
                        <p class="bio"><?php echo $_SESSION['bio']; ?></p>
                        <br>
                    </div>
                    <br>
                    <div class="button">
                        <button  onclick= "swapFol()" class="folName" type="button"><?php echo $_SESSION['folName']; ?></button>
                    </div>
                    <div class="profile-bottom" id="prof-bot">
                    <div class="content22" id="22content">
                        <div class="name">
                            <h2><?php echo $folName2; ?></h2><br>
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT followers.follower_id, followers.user_email, usertable.code, usertable.user, usertable.email FROM followers, usertable
                                    WHERE followers.follower_id = usertable.code
                                    AND followers.user_email = ?"
                                );
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                foreach($result as $person) {

                                    $nameTheSecond = $person['user'];



                                    echo "<a class='InteranlCSSIsBetter-Me' name ='name' id = 'name' href='profile.php?name=$nameTheSecond'>$nameTheSecond</a>"."<br>";
                                }


                            ?>
                        </div>
                        <div class="x-01010100-01100001-01100010-01101100-01100101-00111111">
                            <h2>Following</h2><br>
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT followers.follower_id, followers.user_id, usertable.code, usertable.user, usertable.email FROM followers, usertable
                                    WHERE followers.user_id = usertable.code
                                    AND followers.follower_id = ?"
                                );
                                $stmt->bind_param("i", $code);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                foreach($result as $vector) {
                                    

                                    $name = strval($vector['user']);

                                    
                                    echo "<a class='InteranlCSSIsBetter-Me' name ='name' id = 'name' href='profile.php?name=$name'>$name</a>"."<br>";
                                }

                            ?>
                        </div>
                    </div>
                        <div class="pseudo" id="dosentAddUp">
                            <?php
                                $followerid = $_SESSION['code'];
                                $email = $_SESSION['email'];
                                $message = 0;
                                $email = $_SESSION['email'];
                                
                                $stmt = $con2->prepare(
                                    "SELECT textmessage FROM usertext where email = ?"
                                );
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $num = mysqli_num_rows($result);
                                if($result){
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        $message = $row['textmessage'];
                                    }
                                }
                                if($message = 0){
                                    $message = "No posts yet";
                                }


                            ?>

                            

                            <!-- Original 'liking' system image. A non smile turning into a smile changed as it may not be underestood as well as the standard 'thumb up' (and looked a bit liked amazon's smile). -->

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
                                            
                                                

                                            <?php
                                                $postedTime = "Posted at ";
                                                
                                            ?>

                                            

                                            
                                                <?php foreach($result2 as $mouse){
                                                    $uniqueCode = uniqid();
                                                    $postcode = $mouse['postcode'];
                                                     echo "<style>

                                                     .like1$uniqueCode
                                                     {
                                                         color: #cccccc;
                                                     }
                                                     .like1$uniqueCode.no
                                                     {
                                                         color: $accentColour;
                                                     }
             
                                                     .unlike1$uniqueCode
                                                     {
                                                         color: $accentColour;
                                                     }
                                                     .unlike1$uniqueCode.no2
                                                     {
                                                         color: #cccccc;
                                                     }
             
                                                 </style>";
             
                                                 echo "<script>
                                                     function swapLikee$uniqueCode(){
                                                         document.getElementById('$postcode-1').classList.toggle('no');
                                                     }
                                                     function swapLikee2$uniqueCode(){
                                                         document.getElementById('$postcode-1-2').classList.toggle('no2');
                                                     }
                                                 </script>";
                                                 
                                                    ?>
                                                    <div class="name1">
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

                                                            
                                                            $id = $mouse['id'];

                                                            if($num4mk2 != 1){
                                                                echo "<br>".$mouse['textmessage']."<br>".
                                                                "".$mouse['likes']."
                                                                <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                                
                                                            } else {
                                                                echo "<br>".$mouse['textmessage']."<br>".
                                                                "".$mouse['likes']."
                                                                <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                            }
                                                        } else {
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
                                                                    echo "<br>".$mouse['textmessage']."<br>".
                                                                    "
                                                                    <img class='picture' src='image/$picture'><br><br>".$mouse['likes']."
                                                                    <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                                } else {
                                                                    echo "<br>".$mouse['textmessage']."<br>".
                                                                    "
                                                                    <img class='picture' src='image/$picture'><br><br>".$mouse['likes']."
                                                                    <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                                }
                                                            }


                                                            
                                                        }
                                                        
                                                    
                                                }
                                            
                                            ?>


                                        </div>
                        </div>
                            
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="PrePopup">
        <div class="popup2" id="popup-2">
            <div class="overlay2"></div>
            <div class="overallTheScam">
                <div class="TheOVERALL">
                    <div class="content2">
                        <div class="close-btn2" onclick="togglePopup()">&times;</div>
                        
                        
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

    

    <script>
        var eight = "8px";

        function togglePopup(){
            document.getElementById("popup-2").classList.toggle("active");
            document.getElementById("overall").style.filter = blur(eight);
            document.getElementById("overall").style[-webkit-filter] = blur(eight);
        }

        function swapFol(){
            document.getElementById("dosentAddUp").classList.toggle("active-now");
            document.getElementById("22content").classList.toggle("now-active");
        }
    </script>
</body>
</html>