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
        $code = $rowLight['code'];
        $username = $rowLight['user'];
    }

    $postcode = $_GET['postcode'];
    if (isset($_GET['data'])) {
        $data = $_GET['data'];

        echo $postcode;

        $stmt = $con2->prepare(
            "SELECT * FROM usertext WHERE id = ?"
        );
        $stmt->bind_param("i", $postcode);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCinco = $result->fetch_array();

        $id = $rowCinco['postcode'];

        echo $id;


        $stmt = $con2->prepare(
            "DELETE FROM declarations WHERE user_email = ? AND postcode = ?"
        );
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    
    $stmt = $con2->prepare(
        "SELECT usertable.code, followers.follower_id, followers.user_email, usertext.email, usertext.id FROM usertable, followers, usertext
        WHERE usertable.code = ?
        AND usertable.code = followers.follower_id
        AND followers.user_email = usertext.email
        AND usertext.id = ?;"
    );
    $stmt->bind_param("ii", $code, $postcode);
    $stmt->execute();
    $result2 = $stmt->get_result();

    $stmt = $con2->prepare(
        "SELECT * FROM usertext WHERE id =?"
    );
    $stmt->bind_param("i", $postcode);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowDark = $result->fetch_array();

    $Uemail = $rowDark['email'];

    $stmt = $con2->prepare(
        "SELECT * FROM usertable WHERE email =?"
    );
    $stmt->bind_param("s", $Uemail);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowDark1 = $result->fetch_array();

    $privacy = $rowDark1['UserPrivacy'];
    $user = $rowDark1['user'];

    if ($email != $Uemail) {
        if ($privacy == "private") {
            if (mysqli_num_rows($result2) == 0) {
                echo "<script> location.replace('profile.php?name=$user'); </script>";
            }
        }
    }
    


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept for Comments</title>
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
        a
        {
            text-decoration: none;
        }
        .time a {
            color: #999;
        }
        .time a:hover
        {
            color: #999;
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
        .likeSystem
        {
            color: #cccccc;
            background-color: #E6E6E6;
            border: none;
            outline: none;
            cursor: pointer;
            transition: ease 200ms;
            padding: 0 20px 0 20px;
            display: inline-block;

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
        .time
        {
            color: #999;
            position: relative;
            top: 15px;
            font-size: small;
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

        /* Icons for the user to use and abuse ;) */
        
        
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
                "text"
                "pict";

                /* grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr; */

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                /* justify-items: left; */
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 100%; padding: 10px;}
            .userSubmit2 {grid-area: pict;  height: 50%; width: 100%;}
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
            background: #fff;
            width: 450px;
            /* height: 220px; */
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            border: #000000 .5px solid;
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
        .ok
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
            padding: 0 20px 0 20px;
            display: inline-block;
        }
        .unlike:hover
        {
            color: <?php echo $accentColour; ?>;
            padding: 0 20px 0 20px;
            display: inline-block;
        }
        .like
        {
            color: #cccccc;
        }
        .like:hover
        {
            color: #cccccc;
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

    </style>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a class="inactive" href="P.Pericles.php">Parliament</a></li>
            <li><a class="inactive" href="Helios.php">SP.Helios</a></li>
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
                <form class="form1" action="comments.php?postcode=<?php echo $postcode; ?>" method="post" enctype="multipart/form-data" value="30000">
                    
                    <textarea class="userPost" name="textmessage" placeholder="Express yourself..." required maxlength="500"></textarea>
                    
        
                    <input type="submit" class="userSubmit2" value="Enthral the readers">
                    
                </form>
            </div>
            
            
            <?php
                $followerid = $_SESSION['code'];
                $email = $_SESSION['email'];
                $message = 0;
                $postedTime = " posted this at ";

            ?>

            <div class="content">
                <?php

                    $query = "SELECT usertext.postcode, usertext.email, usertable.email FROM usertext, usertable
                    WHERE usertext.email = usertable.email
                    AND usertext.id = $postcode;";
                    $queryResult = mysqli_query($con2, $query);

                    while ($row = mysqli_fetch_array($queryResult)) {
                        if ($row['email'] == $row['email']) {
                            $water = ("SELECT usertext.textmessage, usertext.likes, usertext.postedTime,  usertable.user, usertext.picCode, usertext.postcode, usertext.private FROM usertable, usertext
                            WHERE usertable.email = usertext.email
                            and usertext.id = '$postcode'
                            ORDER BY usertext.id DESC;");

                            $waterQuery = mysqli_query($con2, $water);

                            while ($post = mysqli_fetch_array($waterQuery)) {

                                $private = $post['private'];
                                $Uuser = $post['user'];

                                $text = $post['textmessage'];
                                if (str_contains($text, '*')) {
                                    $strArray = explode('*',$text);
                                    $name = $strArray[1];
                                }

                                if ($private == "No") {
                                    if ($post['picCode'] == 0) {
                                        echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                        echo $text."<br><br><br><br>"."<br>";
            
                                        
                                    } else {
                                        $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                        $quickResult = mysqli_query($con2, $quickQuery);
                                        while ($quick = mysqli_fetch_array($quickResult)) {
                                            $picture = $quick['picture'];
            
                                            echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                            echo $post['textmessage'];
                                            echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                        }
            
                                        
                                    }
                                } elseif ($private == "Yes") {
                                    if ($username != $name) {
                                        if ($username != $Uuser) {
                                            echo "<script> location.replace('conceptForindex.php'); </script>";
                                        } else {
                                            if ($post['picCode'] == 0) {
                                                echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                echo $text."<br><br><br><br>"."<br>";
                    
                                                
                                            } else {
                                                $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                                $quickResult = mysqli_query($con2, $quickQuery);
                                                while ($quick = mysqli_fetch_array($quickResult)) {
                                                    $picture = $quick['picture'];
                    
                                                    echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                    echo $post['textmessage'];
                                                    echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                                }
                    
                                                
                                            }
                                        }
                                        
                                    } else {
                                        if ($post['picCode'] == 0) {
                                            echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                            echo $text."<br><br><br><br>"."<br>";
                
                                            
                                        } else {
                                            $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                            $quickResult = mysqli_query($con2, $quickQuery);
                                            while ($quick = mysqli_fetch_array($quickResult)) {
                                                $picture = $quick['picture'];
                
                                                echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                echo $post['textmessage'];
                                                echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                            }
                
                                            
                                        }
                                    }
                                }

                                
        
                                
        
                                
                            }
                        } else {
                            $water = ("SELECT usertext.textmessage, usertext.likes, usertext.postedTime,  usertable.user, usertext.picCode, usertext.postcode, usertext.private FROM usertable, usertext, followers
                            WHERE usertext.email = followers.user_email
                            AND usertable.email = usertext.email
                            AND follower_id = '$followerid'
                            and usertext.id = '$postcode'
                            ORDER BY usertext.id DESC;");

                            $waterQuery = mysqli_query($con2, $water);
                            while ($post = mysqli_fetch_array($waterQuery)) {

                                $private = $post['private'];
                                $Uuser = $post['user'];

                                $text = $post['textmessage'];
                                if (str_contains($text, '*')) {
                                    $strArray = explode('*',$text);
                                    $name = $strArray[1];
                                }

                                if ($private == "No") {
                                    if ($post['picCode'] == 0) {
                                        echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                        echo $post['textmessage']."<br><br><br><br>"."<br>";
            
                                        
                                    } else {
                                        $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                        $quickResult = mysqli_query($con2, $quickQuery);
                                        while ($quick = mysqli_fetch_array($quickResult)) {
                                            $picture = $quick['picture'];
            
                                            echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                            echo $post['textmessage'];
                                            echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                        }
            
                                        
                                    }
                                } elseif ($private == "Yes") {
                                    if ($username != $name) {
                                        if ($username != $Uuser) {
                                            echo "<script> location.replace('conceptForindex.php'); </script>";
                                        } else {
                                            if ($post['picCode'] == 0) {
                                                echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                echo $text."<br><br><br><br>"."<br>";
                    
                                                
                                            } else {
                                                $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                                $quickResult = mysqli_query($con2, $quickQuery);
                                                while ($quick = mysqli_fetch_array($quickResult)) {
                                                    $picture = $quick['picture'];
                    
                                                    echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                    echo $post['textmessage'];
                                                    echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                                }
                    
                                                
                                            }
                                        }
                                        
                                    } else {
                                        if ($post['picCode'] == 0) {
                                            echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                            echo $text."<br><br><br><br>"."<br>";
                
                                            
                                        } else {
                                            $quickQuery = "select * from pictures where picCode = ".$post['picCode']."";
                                            $quickResult = mysqli_query($con2, $quickQuery);
                                            while ($quick = mysqli_fetch_array($quickResult)) {
                                                $picture = $quick['picture'];
                
                                                echo "<div class='time'>".$post['user'].$postedTime.$post['postedTime']."</div>"."<br>";
                                                echo $post['textmessage'];
                                                echo "<img class='picture2' src='image/$picture'>"."<br><br><br><br>"."<br>";
                                            }
                
                                            
                                        }
                                    }
                                }
                            }
                        }
                    }

                    
                    
                    
                    $fast = "SELECT comments.Comment, comments.likes, comments.email, comments.id, comments.postcode, usertable.user, usertext.postcode FROM comments, usertext, usertable
                    WHERE comments.postcode = usertext.postcode
                    AND usertext.postcode = '$postcode'
                    AND usertable.email = comments.email
                    ORDER BY comments.likes DESC;";

                    $query = mysqli_query($con2, $fast);

                    $num = mysqli_num_rows($query);

                    if ($num == 0){
                        echo "<br>"."<p class='time'>Empty...</p><br>";
                    } else {
                        foreach ($query as $comm) {
                            $user = $comm['user'];
                            echo "<br><div class='time'>"."<a href='profile.php?name=$user'>$user</a>"."</div>";
                            echo "<br>".$comm['Comment']."<br>";
                            
    
                            $postcode = $comm['id'];
                            $likeCount = $comm['likes'];
    
                            $result = "SELECT * FROM commentlikes WHERE email ='$email' AND postcode = '$postcode'";
                            $queryResult = mysqli_query($con2, $result);
    
                            if (mysqli_num_rows($queryResult) == 1) {
                                echo $likeCount."
                                <a href='' class='unlike'  id='$postcode' ><svg  id='unlike' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                </svg></a>"."<br>";
                                
                            } else {
                                echo $likeCount."
                                <a href='' class='like' id='$postcode' ><svg  id='thumb-1' onclick='swap_1()' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                </svg></a>"."<br>";
                            }
                        }
                    }

                    
                    

                ?>
            </div>
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
                                'Comliked': 1,
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
                                'Comunliked': 1,
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                



                
        </div>
    </div>
</body>
</html>