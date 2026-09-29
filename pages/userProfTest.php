<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');
    $email = $_SESSION['email'];

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
        $background = $rowLight['background'];
        $profPicStyle = $rowLight['ProfPicStyle'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept for profile</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .popup2 .overlay2
        {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vh;
            height: 100vh;
            z-index: 10;
            display: none;
        }
        .popup2 .content2
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: #fff;
            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            border: .5px black solid;
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
        .popup2.active .overlay
        {
            display: block;
        }
        .popup2.active .content2
        {
            transition: all 800ms ease-in-out;
            transform: translate(-50%, -50%) scale(1);
        }

        .popup3 .overlay2
        {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vh;
            height: 100vh;
            z-index: 10;
            display: none;
        }
        .popup3 .content2
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: #fff;
            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            border: .5px black solid;
        }
        .popup3 .close-btn2
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
        .popup3.active .overlay
        {
            display: block;
        }
        .popup3.active .content2
        {
            transition: all 800ms ease-in-out;
            transform: translate(-50%, -50%) scale(1);
        }

        /* header stuff */
        
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
            flex-wrap: wrap;
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

        /* fixed header */
        
        .links2
        {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 10px;
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
            width: 150px;
            border-radius: <?php echo $profPicStyle; ?>;
            background: #fff;
            padding: 6px;
            margin-top: 40px;
        }
        .time
        {
            color: #999;
            position: relative;
            top: 15px;
            font-size: small;
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

        /* small */
        @media only screen and (min-width: 800px)
        {
            .profile-bottom
            {
                background: #fff;
                color: #999;
                padding: 60px 10px 60px 10px;
                margin-right: -90px;
                margin-left: -90px;
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
                /* height: 10rem; */
                margin-bottom: 20px;
                z-index: 10;
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
                color: #E6E6E6;
                
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
                color: #E6E6E6;
            }
            
        }

        /* large */
        /* @media only screen and (min-width: 800px)
        {
            .navbar
            {
                top: 0;
                width: 10rem;
                height: 100vh;
                transition: width 200ms ease;
            }
            .navbar:hover .link-text
            {
                display: inline;
            }
            .navbar:hover .link-text
            {
                display: block;
            }
            .navbar:hover
            {
                width: 20rem;
            }
            .t
            {
                display: none;
            }
        } */


        /* @media only screen and (min-width: 601px)
        {
            
        } */

        @media only screen and (max-width: 850px)
        {
            .profile-bottom
            {
                background: #fff;
                color: #999;
                padding: 60px 10px 60px 10px;
                margin-right: -90px;
                margin-left: -90px;
                margin-bottom: -40px;
                border-radius: 20px;
                margin-top: -10px;
                width: 500px;
                
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
                margin-top: 420px;
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
            .navbar
            {
                bottom: 0;
                width: 100vw;
                z-index: 10;
                height: -50px;
            }
            .navbar-nav
            {
                flex-direction: row;
                opacity: 1;
                transition: 500ms ease-in-out;
            }
            .okmk2
            {
                justify-content: center;
                color: <?php echo $accentColour; ?>;
                height: 3rem;
                background: #E6E6E6;
            }
            .mk3
            {
                color: <?php echo $accentColour; ?>;
            }

            /* Fixed setting */
            .navbar-2
            {
                bottom: 0;
                width: 100vw;
                bottom: -3rem;
                z-index: 10;
                background: #E6E6E6;
            }
            .navbar-nav-2
            {
                flex-direction: row;
                opacity: 1;
                transition: 500ms ease-in-out;
                bottom: -1rem;
            }
            .okmk2-2
            {
                justify-content: center;
                color: <?php echo $accentColour; ?>;
                bottom: -1rem;
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
                color: #E6E6E6;
            }
        }

        

        /* floor class */
        #like
        {
            color: black;
            /* position: relative;
            right: 30px; */
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

        /* .constant
        {
            width: 100%;
            height: 235vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            left: 0;
        }

        .container
        {
            
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        } */
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
    </script>

    <?php
        $con2 = mysqli_connect('localhost','root','');
        mysqli_select_db($con2, 'userregistration');
        $email = $_SESSION['email'];

        $carpet3 = "SELECT * FROM usertable WHERE email = '$email'";
        $s = mysqli_query($con2, $carpet3);

        while($row = mysqli_fetch_array($s, MYSQLI_ASSOC)){
            $folName2 = $row['followerName'];
            $folCount = $row['followerCount'];
            $profileIMG = $row['profileImage'];
            $accent = $row['AccentColour'];
            $navbar = $row['navbar'];
            $header = $row['header'];
            $followerCount = $row['followerCount'];
            $followingCount = $row['followingCount'];
        }
        

        if($folCount == 0){
            $supremeCount = "No ". $folName2;
        } else {
            $supremeCount = $folCount . ' ' . $folName2;
        }

        if($navbar == "hidden"){
            echo  "<nav class='navbar'>
            
            
                <ul class='navbar-nav'>
                <li class='nav-item'>
                    <div class='okmk2'>
                        <svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-people-fill' viewBox='0 0 16 16'>
                                <path d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                                <path fill-rule='evenodd' d='M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z'/>
                                <path d='M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z'/>
                        </svg>
                    </div>
                </li>

                <li class='nav-item'>
                    <div class='okmk2'>
                        <a class='logout' href='ElArchive.php'><svg class='mk2' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-collection-fill' viewBox='0 0 16 16'>
                            <path d='M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z'/>
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
                    <div class='okmk2-2'>
                        <svg class='mk1' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-people-fill' viewBox='0 0 16 16'>
                                <path d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                                <path fill-rule='evenodd' d='M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z'/>
                                <path d='M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z'/>
                        </svg>
                    </div>
                </li>

                <li class='nav-item-2'>
                    <div class='okmk2-2'>
                        <a class='logout' href='ElArchive.php'><svg class='mk2' xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-collection-fill' viewBox='0 0 16 16'>
                            <path d='M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z'/>
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
                <li><a class="inactive" href="#">Helios</a></li>
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
        </header>';
        } else {
            echo '<header class="header">
            <ul class="links2">
                <li><a href="conceptForIndex.php" style="color: black;">Home</a></li>
                <li><a href="userProfileConcept.php" style="color: #E6023b;">Profile</a></li>
                <li><a href="#" style="color: black;">Helios</a></li>
            </ul>
            <div class="searchFunction2">
                <form action="profile.php" method="GET">
                        <input type="text" id="name" name="name" placeholder="Search P.Athens">
                </form>
                <div class="searchIcon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </div>
            </div>
        </header>';
        }
        

    ?>
    
    <div class="constant">
        <div class="container" id="Oka">
            <div class="profile-box">
                <div class="menu-icon">
                <svg onclick = "ShowFol()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                </div>
                <div class="setting-icon">
                    <a href="conceptForEditAccount2.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                        <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                    </svg></a>
                </div>

                <?php
                    echo "<img onclick = 'hideFol()' class='profile-pic' src='image/$profileIMG'>";
                ?>
                
                

                <?php
                    $username = $_SESSION['username'];
                ?>
                <div class="text">
                    <h3><?php echo $_SESSION['username']; ?> </h3>
                    <p class="bio"><?php echo $_SESSION['bio']; ?></p>
                    <br>
                    <p class = "Fol" id="fol" style="color: <?php echo $background; ?>"><?php echo $followerCount; echo " ";?><span onclick="showCount()" onclick="blur()"><?php echo $folName2; ?></span> and <span onclick="showCount2()"> following</span><?php echo " "; echo $followingCount;?></p>
                    <div class="popup2" id="popup-2">
                        <div class="overlay2"></div>
                        <div class="content2">
                            <div class="close-btn2" onclick="showCount()">&times;</div>
                            <h1 class="pop-1-h1">The <?php echo $folName2; ?> are...</h1>
                            <p>You have been stopped.</p>
                        </div>
                    </div>
                    <div class="popup3" id="popup-3">
                        <div class="overlay2"></div>
                        <div class="content2">
                            <div class="close-btn2" onclick="showCount2()">&times;</div>
                            <h1><?php echo $username; ?> is following...</h1>
                            <p>Oka</p>
                        </div>
                    </div>

                <script>
                    function showCount(){
                        document.getElementById("popup-2").classList.toggle("active");
                    }
                    function showCount2(){
                        document.getElementById("popup-3").classList.toggle("active");
                    }
                </script>
                </div>
                <br>
                <div class="button">
                    
                    
                    <button class="folName" type="button"><?php echo $_SESSION['folName']; ?></button>
                </div>
                <div class="profile-bottom" id="prof-bot">
                    <?php
                        $followerid = $_SESSION['code'];
                        $email = $_SESSION['email'];
                        $message = 0;
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'usertextposts');
                        $email = $_SESSION['email'];
                        $s = "SELECT textmessage FROM usertext where email = '$email'";
                        $result = mysqli_query($con, $s);
                        $num = mysqli_num_rows($result);
                        if($result){
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $message = $row['textmessage'];
                            }
                        }
                        if($message = 0){
                            $message = "No posts yet";
                        }

                        
                        // if ($num >= 1) {
                        //     $distToTop = strval($num * 1.455) . "%";
                        //     echo $distToTop;
                        //     echo $num . ' ';

                        //     $distToBottom = strval($num * 1.33). "%";
                        //     echo $distToBottom;
                        // } if ($num >=12) {
                        //     $distToTop = strval(($num * 1.455) + 5) . "%";

                        //     $distToBottom = strval($num * 1.33). "%";
                        // } else {
                        //     $distToTop = "5%";
                        //     $distToBottom = "5%";
                        // }


                    ?>

                    <!-- <head>
                        <style>
                            @media only screen and (min-width: 800px)
                            {
                                .constant
                                {
                                    margin-top: <?php echo $distToTop; ?>;
                                    margin-bottom: <?php echo $distToBottom; ?>;
                                }
                            }
                        </style>
                    </head> -->

                    

                    <!-- Original 'liking' system image. A non smile turning into a smile changed as it may not be underestood as well as the standard 'thumb up' (and looked a bit liked amazons smile). -->

                    <?php
                        $email = $_SESSION['email'];
                        $followerid = $_SESSION['code'];
                        $query = " SELECT * FROM usertext WHERE email = '$email' ORDER BY postcode DESC";
                        $result2 = mysqli_query($con, $query);

                        $g = "SELECT postedTime FROM usertext where email = '$email'";
                        $result3 = mysqli_query($con, $g);

                        while($row2 = mysqli_fetch_array($result2)){ ?>
                            <div class="post">

                                <?php
                                    $h = " select * from likes where user = '$followerid' && postcode =".$row2['postcode']."";
                                    $result5 = mysqli_query($con, $h);
                                    $num2 = mysqli_num_rows($result5);
                                    if ($num2 == 1) { ?>
                                    <a href='like.php?username=$username&postcode=".$row2['postcode']."'><svg class="alreadyLiked" id="alreadyLiked" onclick="ok" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                    </svg></a><br>
                                <?php } else { ?>
                                    

                                <?php
                                
                                $postedTime = "Posted at ";
                                if(isset($_GET['postid'])){
                                    $extra = " select * from likes where user = '$email' && postcode =".$_GET['postid']."";
                                    $USD = mysqli_query($con, $extra);
                                    $num4 = mysqli_num_rows($USD);
                                    if($num4 != 1){
                                        $book['postcode'] = array(':postid'=>$_GET['postid']);
                                        $carpet = "UPDATE usertext SET likes=likes+1 WHERE postcode=".$_GET['postid']."";
                                        $tube = mysqli_query($con, $carpet);
        
                                        $carpetmk2 = "insert into likes(user, postcode) values ('$email', ".$_GET['postid'].")";
                                        $light = mysqli_query($con, $carpetmk2);
                                    } else {
                                        $b = "delete from likes where user = '$email' && postcode = ".$_GET['postid']."";
                                        $result10 = mysqli_query($con, $b);

                                        $carpet = "UPDATE usertext SET likes=likes-1 WHERE postcode=".$_GET['postid']."";
                                        $tube = mysqli_query($con, $carpet);
                                    }

                                    echo "<script> location.replace('userProfileConcept.php'); </script>";
                                    
                                }?>


                                <?php foreach($result2 as $mouse){?>
                                    <div class='time'>
                                        <?php echo $postedTime, $mouse['postedTime'];?>
                                    </div>
                                    <?php
                                        $extra2 = " select * from likes where user = '$email' && postcode =".$mouse['postcode']."";
                                        $USDmk2 = mysqli_query($con, $extra2);
                                        $num4mk2 = mysqli_num_rows($USDmk2);
                                        if($num4mk2 != 1){
                                            echo "<br>".$mouse['textmessage'].
                                            "
                                            <form action='userProfileConcept.php?username=$username&postid=".$mouse['postcode']."' method='post'>
                                                <button type='submit' class='likeSystem'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                            </svg></button>
                                            </form>
                                            "
                                            .$mouse['likes'];
                                        } else {
                                            echo "<br>".$mouse['textmessage'].
                                            "
                                            <form action='userProfileConcept.php?username=$username&postid=".$mouse['postcode']."' method='post'>
                                                <button type='submit' class='like'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                            </svg></button>
                                            </form>
                                            "
                                            .$mouse['likes'];
                                        }
                                    
                                }

                                ?>
                                <?php } ?>


                            </div>
                        <?php } ?>
                    
                </div>
            </div>

        </div>
    </div>
    
    <!-- <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br>        <br><br><br><br><br><br>                            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br>                            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br>                            <br><br><br>
                                                                                      <br><br><br>            <br><br><br>
                                                                                      <br><br><br>            <br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>

    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br> -->

</body>
</html>