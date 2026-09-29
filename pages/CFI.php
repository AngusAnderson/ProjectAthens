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

    $stmt = $con2->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();
    
    $accentColour = $rowLight['AccentColour'];
    $user = $rowLight['user'];
    


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept for home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    

    
    
    <style>
        *
        {
            margin: 0;
            border: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .comment {
            color: black;
        }
        .form-message {
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            font-family: Arial;
        }
        .form-error
        {
            color: red;
        }
        .form-success
        {
            color: green;
        }
        .input-error
        {
            box-shadow: 0 0 5px red;
        }
        .bigFile
        {
            color: black;
        }
        
        .post-1
        {
            color: black;
            word-wrap: break-word;
            
        }
        .picture2
        {
            height: 500px;
            width: 500px;
            padding: 0;
            margin: 0;

            position: relative;
            top: .00000000000000000000000000000000000000000000000000001%;
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
        a
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
            top: 55%;
            transform: translateY(-50%);
            left: 10px;
        }
        /* .userContent
        {
            display: grid;
            align-items: center;
            margin: 8% auto;
            padding: 20px;
        } */
        
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
        
        
        .box1 .userShallSPEAK2
        {
            /* display: flex;
            justify-content: left; */
            width: 600px;
            height: 200px;
            position: relative;
            left: -20px;
            top: -20px;
            /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); */
            background: #E6E6E6;
            padding: 20px;
            padding-top: 20px;
            /* margin: 8% auto; */
            text-align: center;
            border-radius: 5px;
        }
        
        .userShallSPEAK2 .userPost::placeholder
        {
            color: #000000;
        }
        
        img
        {
            
            width: 300px;
            cursor: pointer;
            position: relative;
            top: -800px;
            margin-left: 150px;
        }
        .logo
        {
            z-index: 1;
        }
        
        
        /* .at
        {
            position: relative;
            top: 27px;
            right: 360px;
        } */


        @media only screen and (min-width: 851px)
        {
            #picture
            {
                width: 100px;
                height: 37px;
                position: absolute;
                right: 0;
                margin: 10px;
            }

            .userSubmit2
            {
                background: <?php echo $accentColour; ?>;
                color: #E6E6E6;
            }

            .userShallSPEAK2
            {
                display: grid;
                grid-template-areas: 
                "text   submit"
                "pict   at";

                grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr;

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                /* justify-items: left; */
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 100%; padding: 10px;}
            .userSubmit2 {grid-area: submit;  height: 60%; width: 100%;}
            .image {grid-area: submit; position: absolute; top: 0; left: 0; padding: 10px;}
            .at {grid-area: submit;  padding: 10px; justify-content: space-around;}

            .box1
            {
                width: 600px;
                background: #E6E6E6;
                padding: 20px;
                margin: 8% auto;
                text-align: center;
                border-radius: 5px;
                z-index: 10;

                
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
            }
            header .searchFunction
            {
                position: relative;
                width: 300px;
                height: 40px;
            }
            /* .image
            {
                position: relative;
                top: 27px;
                right: 365px;
            } */
            /* .cycle
            {
                position: relative;
                left: 250px;
            } */
            .userShallSPEAK2 input
            {
                border-radius: 4px;
            }
            .userShallSPEAK2 .userPost
            {
                background: #E6E6E6;
                border-radius: 4px;
            }
        }

        @media only screen and (max-width: 850px)
        {
            body {
                overflow-x: hidden;
            }
            .userShallSPEAK2
            {
                display: grid;
                grid-template-areas: 
                "text"
                "pict";

                grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr;

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                /* justify-items: left; */
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 100%;}
            .userSubmit2 {grid-area: pict; height: 50%; width: 100%;}
            .image {grid-area: submit; position: absolute; top: 0; left: 0; padding: 10px; display: none;}
            .at {grid-area: submit;  padding: 10px; justify-content: space-around; display: none;}

            body
            {
                background: #E6E6E6;
            }
            .box1
            {
                width: 100%;
                /* height: 1000px; */
                background: #E6E6E6;
                padding: 20px;
                margin: 85px auto;
                text-align: center;
                border-radius: 5px;
                z-index: 10;
            }
            header
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
                
            }
            header .searchFunction
            {
                position: relative;
                width: 400px;
                height: 40px;
                left: 50px;
            }
            .image
            {
                position: absolute;
                padding: 35px 30px 30px 30px;
                left: 0;
            }
            .cycle
            {
                display: none;
            }
            .userShallSPEAK2
            {
                overflow: hidden;
            }
            .userShallSPEAK2 input
            {
                background: #E6023b;
                color: #E6E6E6;
                border-radius: 4px;
                padding-top: 8px;
            }
            .userShallSPEAK2 .userPost
            {
                background: #E6E6E6;
                border-radius: 4px;
                padding-top: 6px;
            }
            .form1
            {
                width: 100%;
            }
        }
        @media only screen and (max-width: 400px)
        {

            body 
            {
                overflow-x: hidden;
            }
            
            .userShallSPEAK2
            {
                display: grid;
                grid-template-areas: 
                "text extra"
                "pict extra2";

                /* grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr; */

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                justify-items: left;
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 75%; padding: 0; margin: 0; position: relative; right: 50px;}
            .userSubmit2 {grid-area: pict; height: 50%; width: 75%; padding: 0; margin: 0; position: relative; right: 50px;}
            .image {grid-area: extra; position: absolute; top: 0; left: 0; padding: 10px; }
            .at {grid-area: pict;  padding: 10px; justify-content: space-around; }

            body
            {
                background: #E6E6E6;
            }
            .box1
            {
                width: 100%;
                /* height: 1000px; */
                background: #E6E6E6;
                padding: 20px;
                margin: 85px auto;
                text-align: center;
                border-radius: 5px;
                z-index: 10;
            }
            header
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
                
            }
            header .searchFunction
            {
                position: relative;
                width: 400px;
                height: 40px;
                left: 50px;
            }
            .image
            {
                position: absolute;
                padding: 35px 30px 30px 30px;
                left: 0;
            }
            .cycle
            {
                display: none;
            }
            .userShallSPEAK2
            {
                overflow: hidden;
            }
            .userShallSPEAK2 input
            {
                background: #E6023b;
                color: #E6E6E6;
                border-radius: 4px;
                padding-top: 8px;
            }
            .userShallSPEAK2 .userPost
            {
                background: #E6E6E6;
                border-radius: 4px;
                padding-top: 6px;
            }
            .form1
            {
                width: 100%;
            }
        }

        /* error code 1314 - The user is trying to pull a fast one */

        .userPost
        {
            resize: none;  
        }
        .post
        {
            color: black;
            word-wrap: break-word;
            display: block;
        }
        .popup2
        {
            display: none;
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
            transition: all 400ms ease-in-out;

            width: 450px;
            background: #E6E6E6;
            padding: 20px;
            
            

            text-align: center;
            border-radius: 5px;
            z-index: 10;
            background: transparent;
            margin-top: 100px;
        }
        .container .close-btn2
        {
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 0;
            margin: 6% 10% 94% 90%;
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
            transition: all 400ms ease-in-out;
            transform: translate(-50%, -50%) scale(1);
        }
        .ok,.ok-2
        {
            color: #999;
            font-size: small;
        }

        a 
        {
            text-decoration: none;
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

        #unlike.thumb-2-Active
        {
            color: #cccccc;
        }
        #unlike.thumb-2-Active:hover
        {
            color:  #cccccc;
        }
        #thumb-1.thumb-1-Active
        {
            color: <?php echo $accentColour; ?>;
        }
        #thumb-1.thumb-1-Active:hover
        {
            color: <?php echo $accentColour; ?>;
        }

        #unlike.thumb-2-Active
        {
            color: #cccccc;
        }
        #unlike.thumb-2-Active:hover
        {
            color: #cccccc;
        }

        .ok
        {
            display: none;
        }


        #caret-1-2, #caret-2-2, #caret-2-3, #caret-2-4, #caret-2-5
        {
            display: none;
        }

        .container
        {
            background: #fff;
            color: black;
            padding: 60px 10px 40px 10px;
            border-radius: 20px;
            margin: -20px 0 -600% 0;
            width: 400px;
            border: 1px solid #000;
        }
        .left-radio, .middle-radio, .right-radio
        {
            padding: 0 20px 0 0;
            display: inline-block;
        }



        .unlike,.like,.unlike-1,.like-1
        {
            background-color: #E6E6E6;
            border: none;
            outline: none;
            cursor: pointer;
            transition: ease 200ms;
            display: inline-block;
            padding: 0 20px 0 20px;
        }


        .unlike, .unlike2
        {
            color: <?php echo $accentColour; ?>;
        }
        .like, .like2
        {
            color: #cccccc;
        }

        


        

    </style>

    <script>

        // The great wall of functions becuase this is the easiest way to do this. All that has to be done is highlight then shift + alt + fn + down arrow. The fn is becuase it is a 60% keyboard.

        function img(){
            document.getElementById("ok-1").style.display = "block";
            document.getElementById("caret-1").style.display = "none";
            document.getElementById("caret-1-2").style.display = "inline-block";
        }
        function antiImg(){
            document.getElementById("ok-1").style.display = "none";
            document.getElementById("caret-1").style.display = "inline-block";
            document.getElementById("caret-1-2").style.display = "none";
        }

        function declaration(){
            document.getElementById("ok-2").style.display = "block";
            document.getElementById("caret-2").style.display = "none";
            document.getElementById("caret-2-2").style.display = "inline-block";
        }
        function antiDeclaration(){
            document.getElementById("ok-2").style.display = "none";
            document.getElementById("caret-2").style.display = "inline-block";
            document.getElementById("caret-2-2").style.display = "none";
        }

        function PPost(){
            document.getElementById("ok-3").style.display = "block";
            document.getElementById("caret-3").style.display = "none";
            document.getElementById("caret-2-3").style.display = "inline-block";
        }
        function AntiPPost(){
            document.getElementById("ok-3").style.display = "none";
            document.getElementById("caret-3").style.display = "inline-block";
            document.getElementById("caret-2-3").style.display = "none";
        }

        function COMKE(){
            document.getElementById("ok-5").style.display = "block";
            document.getElementById("caret-5").style.display = "none";
            document.getElementById("caret-2-5").style.display = "inline-block";
        }
        function HowIsThyCOMKE(){
            document.getElementById("ok-5").style.display = "none";
            document.getElementById("caret-5").style.display = "inline-block";
            document.getElementById("caret-2-5").style.display = "none";
        }

        

    </script>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="active">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a href="P.Pericles.php" class="inactive">Parliament</a></li>
            <li><a href="Helios.php" class="inactive">SP.Helios</a></li>
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

    <?php
        $followerid = $_SESSION['code'];
    ?>



    

    <div class="userContent">
        <div class="box1">
            <div class="userShallSPEAK2">
                <form class="form1" action="textPosts.php" method="post" enctype="multipart/form-data" value="30000">
                    
                    <textarea class="userPost" name="textmessage" placeholder="Express yourself..." required maxlength="500"></textarea>

                    <div class="popup2" id="popup-2">
                        <div class="constant">
                            

                            <div class="overlay2"></div>
                            <div class="content2">
                                <div class="container">
                                    <div class="close-btn2" onclick="togglePopup()">&times;</div>
                                    <h1 class="h1-1">Options for post</h1><br>

                                    <h3 class="h1-1">Attach images<svg onclick="img()" id="caret-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg><svg onclick="antiImg()" id="caret-1-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg></h3>
                                    <div class="ok" id="ok-1">
                                        <p class="ok-1" >Accepted formats include 'gif', 'png', 'jpg', 'jpeg' and 'webp'. Moreover, it is displayed as 500px by 500px on screens that have a width of over 600px. It is displayed as 300px by 300px when less than 601px.</p>
                                        <input class="bigFile" type="file" name="file" class="form-control">
                                    </div><br>

                                    <h3 class="h1-1">Declaration<svg onclick="declaration()" id="caret-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg><svg onclick="antiDeclaration()" id="caret-2-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg></h3>
                                    <div class="ok" id="ok-2">
                                        <p class="ok-1" >'Declarations' are P.Athens's form of linking someone to a post - tagging. To do this you would put an asterisk (*) at the start and end of the username. I.e. *Project Athens*. It currently only works with one person.</p>
                                    </div><br>

                                    <h3 class="h1-1">Private post<svg onclick="PPost()" id="caret-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg><svg onclick="AntiPPost()" id="caret-2-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg></h3>
                                    <div class="ok" id="ok-3">
                                        <p class="ok-1" >Private posts are only avaliable to users that are declared in the post.</p>
                                        <div class="left-radio">
                                            <input type="radio" name="UPC" checked value="No"> Not private
                                        </div>

                                        <input type="radio" name="UPC"  value="Yes"> Private
                                    </div><br>

                                    <h3 class="h1-1">Comments & Likes<svg onclick="COMKE()" id="caret-5" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg><svg onclick="HowIsThyCOMKE()" id="caret-2-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg></h3>
                                    <div class="ok" id="ok-5">
                                        <p class="ok-1" >Here you can disable comments and or likes on this post.</p>
                                        <div class="left-radio">
                                            <input type="radio" name="COMLIK" checked value="None"> None
                                        </div>
                                        <div class="middle-radio">
                                            <input type="radio" name="COMLIK"  value="Comments"> Comments
                                        </div>
                                        <div class="right-radio">
                                            <input type="radio" name="COMLIK"  value="Likes"> Likes
                                        </div>

                                        <input type="radio" name="COMLIK"  value="Both"> Both
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
        
                    <input type="submit" class="userSubmit2" value="Enthral the world">
                    
                </form>
                
                <!-- all scalable vector graphics from bootsrap -->
                <div class="at">
                        <svg onclick= "togglePopup()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                </div>
            </div>
            
            
            <?php
                $followerid = $_SESSION['code'];
                $email = $_SESSION['email'];
                $message = 0;
                $postedTime = " posted this at ";

            ?>

                

            <?php

                $followerid = $_SESSION['code'];
                $stmt = $con2->prepare(
                    "SELECT usertext.textmessage, usertext.likes, usertext.postedTime, usertext.id,  usertable.user, usertext.picCode, usertext.private, usertext.postcode FROM usertable, usertext, followers
                    WHERE usertext.email = followers.user_email
                    AND usertable.email = usertext.email
                    AND followers.follower_id = ?
                    ORDER BY usertext.id DESC"
                );
                $stmt->bind_param("i", $followerid);
                $stmt->execute();
                $result = $stmt->get_result();
            
                foreach($result as $post) {
                

                    $postcode = $post['postcode'];
                    $id = $post['id'];
                    $likes = $post['likes'];
                    $private = $post['private'];

                    $text = $post['textmessage'];

                    if (str_contains($text, '*')) {
                        $strArray = explode('*',$text);
                        $name = $strArray[1];
                    }

                    
                
                    if ($private == "No"){
                        if ($post['picCode'] == 0) {?>
                            <div class="name1">
                                <b><?php echo $post['user']; ?></b>
                            </div>
                            <div class='time'>
                                <?php echo $post['postedTime'];?>
                            </div><br>
                            <?php
                            echo $post['textmessage']."<br>"."<br>";?>
    
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT * FROM likes WHERE user = ? AND postcode = ?"
                                );
                                $stmt->bind_param("si", $email, $postcode);
                                $stmt->execute();
                                $result = $stmt->get_result();?>

                                <!-- <script>
                                    function like1() {
                                        document.getElementsByClassName("like").style.display = "inline-block";
                                        document.getElementsByClassName("unlike").style.display = "none";
                                    }
                                    function unlike1() {
                                        document.getElementsByClassName("like").style.display = "none";
                                        document.getElementsByClassName("unlike").style.display = "inline-block";
                                    }

                                    function like2() {
                                        document.getElementsByClassName("like2").style.display = "none";
                                        document.getElementsByClassName("unlike2").style.display = "inline-block";
                                    }
                                    function unlike2() {
                                        document.getElementsByClassName("like2").style.display = "inline-block";
                                        document.getElementsByClassName("unlike2").style.display = "none";
                                    }
                                </script> -->
    
                                <?php if (mysqli_num_rows($result) == 1) {
                                    echo $likes."
                                    <a href='' class='unlike' id='$postcode' onclick='unlike1()'><svg id='thumb-40' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a href='' class='like' id='$postcode' onclick='like1()' style = 'display: none;'><svg id='thumb-30' onlclick='swap_2()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                    
                                } else {
                                    echo $likes."
                                    <a href='' class='like2' id='$postcode' onclick='like2()' ><svg id='thumb-3' onlclick='swap_2()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a href='' class='unlike2' id='$postcode' onclick='unlike2()' style = 'display: none;'><svg id='thumb-4' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                }
    
                            ?>
                            
                        <?php } else {
                            $stmt = $con2->prepare(
                                "select * from pictures where picCode = ?"
                            );
                            $stmt->bind_param("i", $post['picCode']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $quick = $result->fetch_array();
    
                            $picture = $quick['picture'];?>

                            <div class="name1">
                                <b><?php echo $post['user']; ?></b>
                            </div>
                            <div class='time'>
                                <?php echo $post['postedTime'];?>
                            </div><br>

                            <?php echo $post['textmessage'];
                            echo "<img class='picture2' src='image/$picture'>"."<br>"."<br>";
                            $stmt = $con2->prepare(
                                "SELECT * FROM likes WHERE user = ? AND postcode = ?"
                            );
                            $stmt->bind_param("si", $email, $postcode);
                            $stmt->execute();
                            $result = $stmt->get_result();
    
                            if (mysqli_num_rows($result) == 1) {
                                echo $likes."
                                <a href='' class='unlike-1' id='$postcode' ><svg  id='unlike' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                </svg></a>
                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                            } else {
                                echo $likes."
                                <a href='' class='like' id='$postcode' onclick='like1()' ><svg id='thumb-3' onlclick='swap_2()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a href='' class='unlike-1' id='$postcode' onclick='antiLike1()'><svg id='thumb-4' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                            }
                            
                        }
                    } elseif ($name == $user AND $private == "Yes") {


                        if ($post['picCode'] == 0) {?>
                        
                            <div class="name1">
                                <b><?php echo $post['user']; ?></b>
                            </div>
                            <div class='time'>
                                <?php echo $post['postedTime'];?>
                            </div><br><?php
                            echo $post['textmessage']."<br>"."<br>";?>
    
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT * FROM likes WHERE user = ? AND postcode = ?"
                                );
                                $stmt->bind_param("si", $email, $postcode);
                                $stmt->execute();
                                $result = $stmt->get_result();
    
                                if (mysqli_num_rows($result) == 1) {
                                    echo $likes."
                                    <a href='' class='unlike'  id='$postcode' ><svg  id='unlike' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                    
                                } else {
                                    echo $likes."
                                    <a href='' class='like' id='$postcode' onclick='like1()' ><svg id='thumb-3' onlclick='swap_2()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a href='' class='unlike-1' id='$postcode' onclick='antiLike1()'><svg id='thumb-4' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                }
    
                            ?>
                            
                        <?php
                    
                         } else {
                            $stmt = $con2->prepare(
                                "select * from pictures where picCode = ?"
                            );
                            $stmt->bind_param("i", $post['picCode']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $quick = $result->fetch_array();
    
                            $picture = $quick['picture'];?>
                            <div class="name1">
                                <b><?php echo $post['user']; ?></b>
                            </div>
                            <div class='time'>
                                <?php echo $post['postedTime'];?>
                            </div><br><?php
                            echo $post['textmessage'];
                            echo "<img class='picture2' src='image/$picture'>"."<br>"."<br>";
                            $stmt = $con2->prepare(
                                "SELECT * FROM likes WHERE user = ? AND postcode = ?"
                            );
                            $stmt->bind_param("si", $email, $postcode);
                            $stmt->execute();
                            $result = $stmt->get_result();
    
                            if (mysqli_num_rows($result) == 1) {
                                echo $likes."
                                <a href='' class='unlike' id='$postcode' ><svg  id='unlike' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                </svg></a>
                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                            } else {
                                echo $likes."
                                <a href='' class='like' id='$postcode' onclick='like1()' ><svg id='thumb-3' onlclick='swap_2()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                    <a href='' class='unlike-1' id='$postcode' onclick='antiLike1()'><svg id='thumb-4' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                            }
                        }
                    }
                    
                    

                }

            ?>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            
                
                <script>
                    $(document).ready(function() {
                        $('.like').click(function(event) {
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

                    
                    function swap_1(){
                        document.getElementById('thumb-1').classList.toggle("thumb-1-Active");
                    }
                    function swap_2(){
                        document.getElementById('unlike').classList.toggle("thumb-2-Active");
                    }
                </script>
                



                
        </div>
    </div>

    <script>
        function togglePopup(){
            document.getElementById("popup-2").classList.toggle("active");
            document.getElementById("popup-2").style.display="block";
        }
        
    </script>

    


</body>
</html>