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

$email2 = $_SESSION['email'];


$stmt = $con->prepare(
    "SELECT * FROM usertable WHERE email = ?"
);
$stmt->bind_param("s", $email2);
$stmt->execute();
$result = $stmt->get_result();
$x = $result->fetch_array();

$followerid = $x["code"];
$_SESSION['code'] = $followerid;
$user = $x['user'];

if(isset($_GET['name'])){
    $username = $_GET['name'];
    $email2 = $_SESSION['email'];

    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE user = ?"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) != 1){
        echo "<script> location.replace('conceptForIndex.php'); </script>";
        die();
    }
    $row = $result->fetch_assoc();
    $userid = $row['code'];
    $email = $row['email'];
    $name = $row['user'];
    $bio = $row['userBio'];
    $folName2 = $row['followerName'];
    $profileImage = $row['profileImage'];
    $privacy = $row['UserPrivacy'];
    $boder = $row['border'];

    if($username != $name){
        echo "<script> location.replace('conceptForIndex.php'); </script>";
    }

    $tmp_userid = 0;
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_userid ='$userid' WHERE email = ?"
    );
    $stmt->bind_param("s", $email2);
    $stmt->execute();
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_user = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $name, $email2);
    $stmt->execute();
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_prof_img = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $profileImage, $email2);
    $stmt->execute();
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_bio = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $bio, $email2);
    $stmt->execute();
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_email = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $email, $email2);
    $stmt->execute();
    $stmt = $con->prepare(
        "UPDATE usertable SET tmp_fol_name = ? WHERE email = ?"
    );
    $stmt->bind_param("ss", $folName2, $email2);
    $stmt->execute();

    $_SESSION['tmp_userid'] = $tmp_userid;

} else {
    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email2);
    $stmt->execute();
    $result = $stmt->get_result();
    $x = $result->fetch_array();

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
$stmt = $con->prepare(
    "SELECT * FROM usertable WHERE code = ?"
);
$stmt->bind_param("i", $code);
$stmt->execute();
$result = $stmt->get_result();
$num3 = mysqli_num_rows($result);

while($num3 == 1){
    $code = random_int($min, $max);
    $stmt = $con->prepare(
        "SELECT * FROM usertable WHERE code = ?"
    );
    $stmt->bind_param("i", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $num3 = mysqli_num_rows($result);
}

if (isset($_POST['follow'])){
    $stmt = $con->prepare(
        "SELECT * FROM followers WHERE follower_id = ?"
    );
    $stmt->bind_param("i", $followerid);
    $stmt->execute();
    $result = $stmt->get_result();

    $num = mysqli_num_rows($result);
    if ($num == 1){
        echo "Already following";
    } else {
        $stmt = $con->prepare(
            "insert into followers (id, user_id, follower_id) values (?, ?, ?)"
        );
        $stmt->bind_param("iii", $code, $userid, $followerid);
        $stmt->execute();
        $result = $stmt->get_result();
    }
}

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
$privacy = $rowLight['UserPrivacy'];
$border = $rowLight['border'];

?>

<html>
    <head>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $name; ?>'s account</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <style>
            *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            a
            {
                text-decoration: none;
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
            .comment
            {
                color: black;
            }
            .comment:hover
            {
                color: black;
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
            
            body
            {
                background: <?php echo $background; ?>;
            }
            .Fol
            {
                font-size: 13.5px;
            }
            .lock
            {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: <?php echo $accentColour; ?>;
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

            .links
            {
                display: flex;
                justify-content: center;
                margin: 0 0 0 10%;
                
            }
            @media only screen and (min-width: 1100px)
            {
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
            .athensPass
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
            .post
            {
                color: black;
                word-wrap: break-word;
            }
            .like2
            {
                color: <?php echo $accentColour; ?>;
                background-color: white;
                border: none;
                outline: none;
                cursor: pointer;
            }
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
            .time2
            {
                color: #999;
                font-size: small;
            }

            
            

            @media only screen and (min-width: 601px) {
                .profile-box
                {
                    background: transparent;
                    text-align: center;
                    color: #fff;
                    border-radius: 20px;
                    border: 1px black;
                    

                    width: 600px;
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
                .picture
                {
                    width: 500px;
                    height: 500px;
                }
                .folName-2
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
                    position: relative;
                    top: 10px;
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
            }

            @media only screen and (max-width: 600px) {
                .profile-box
                {
                    background: transparent;
                    text-align: center;
                    color: #fff;
                    border-radius: 20px;
                    border: 1px black;
                    

                    width: 100%;
                    padding: 20px;
                    margin: 8% auto;
                    z-index: 10;
                }
                .profile-bottom
                {
                    background: #fff;
                    color: #999;
                    padding: 60px 10px 60px 10px;
                    margin: -20px 0 -40px 0px;
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
                .container
                {
                    margin-top: 100px;
                }
                a
                {
                    text-decoration: none;
                    color: #E6E6E6;
                }
                /* The Scottish Scam - Where one copy's an entire page of colourful lines and then paste it in a completely new file if it proves to be that of an advantage. */
                .picture
                {
                    width: 300px;
                    height: 300px;
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
                .like
                {
                    color: <?php echo $accentColour; ?>;
                    background-color: white;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    position: relative;

                }
                .folName-2
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
                .links
                {
                    margin: 0 0 0 35%;
                }
                .links li
                {
                    margin: 0 10px 0 10px;
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
            }

            @media only screen and (max-width: 400px) {
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
                    margin: -30px 0 -40px 0px;
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
                .container
                {
                    margin-top: 100px;
                }
                a
                {
                    text-decoration: none;
                    color: #E6E6E6;
                }
                .picture
                {
                    width: 300px;
                    height: 300px;
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
                .like
                {
                    color: <?php echo $accentColour; ?>;
                    background-color: white;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    position: relative;

                }
                .folName-2
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
        </style>
    </head>
    <body>

    <script>
        function ShowFol(){
            document.getElementById("fol").style.display = "inline";
        }
        function hideFol(){
            document.getElementById("fol").style.display = "none";
        }


        // function swapLike(){
        //     document.getElementById('thumb').classList.toggle("swapTheColour");
        // }
        // function swapLike2(){
        //     document.getElementById('thumb2').classList.toggle("swapTheColour2");
        // }
        
        function swapLike3(){
            document.getElementById('thumb3').classList.toggle("swapTheColour3");
        }
        function swapLike4(){
            document.getElementById('thumb23').classList.toggle("swapTheColour4");
        }

        function swapLike5(){
            document.getElementById('thumb4').classList.toggle("swapTheColour5");
        }
        function swapLike6(){
            document.getElementById('thumb24').classList.toggle("swapTheColour6");
        }

        function swapLike7(){
            document.getElementById('thumb5').classList.toggle("swapTheColour7");
        }
        function swapLike8(){
            document.getElementById('thumb25').classList.toggle("swapTheColour8");
        }

        function swapLike9(){
            document.getElementById('thumb6').classList.toggle("swapTheColour9");
        }
        function swapLike10(){
            document.getElementById('thumb26').classList.toggle("swapTheColour10");
        }
        function swapLike9(){
            document.getElementById('thumb7').classList.toggle("swapTheColour9");
        }
        function swapLike10(){
            document.getElementById('thumb27').classList.toggle("swapTheColour10");
        }
        
    </script>

    <?php

        if ($followerid != $userid) {
            if ($privacy == "private" or $privacy == "Private"){
                $query = "";
                $stmt = $con->prepare(
                    "SELECT * FROM followers WHERE follower_id = ? AND user_id = ?"
                );
                $stmt->bind_param("ii", $followerid, $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $nim = mysqli_num_rows($result);
                if($nim == 0){
                    echo "<script> location.replace('private.php'); </script>";
                }
            }
        }
        
    ?>


    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="inactive">Home</a></li>
            <li><a href="userProfileConcept.php" class="active">Profile</a></li>
            <li><a class="inactive" href="P.Pericles.php">Parliament</a></li>
            <li><a class="inactive" href="Helios.php">SP.Helios</a></li>
        </ul>
    </header>

<div class="container">
        <div class="profile-box">
            <div class="menu-icon">
            <svg onclick="ShowFol()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"> 
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
            </div>
            
            <?php
                echo "<img class='profile-pic' src='image/$profileImage'>";
            ?>
            <div class="text">
                <h3><?php echo $name; ?> </h3>
                <p><?php echo $bio; ?></p><br>
                
                <p onclick="hideFol()" class = "Fol" id="fol" style="display:none;"><?php echo $followerCount; echo " ";?>followers and following<?php echo " "; echo $followingCount;?></p>
            </div>
            <br>
            <div class="button">
                <form action="profie2.php" method="post">
                    <?php
                        $t = "";
                        
                        $stmt = $con->prepare(
                            "SELECT * FROM followers WHERE follower_id = ? AND user_id = ?"
                        );
                        $stmt->bind_param("ii", $followerid, $userid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $num2 = mysqli_num_rows($result);

                       
                        if($num2 == 1){
                            $bigOne = "Betray the";
                        }
                        elseif($followerid == $userid){
                            $bigOne = "";
                        }
                        else
                        {
                            $bigOne = "Join the";
                        }

                    ?>

                    <button class = 'folName-2' name="follow"><?php echo $bigOne,' ', $folName2; ?></button>


                </form>
            </div>        
            <br>
            <br>
            
            <div class="profile-bottom">
                <?php
                    $message2 = 0;
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
                    $con2->set_charset('utf8mb4');
                    $stmt = $con->prepare(
                        "SELECT * FROM usertext where email = ? ORDER BY id DESC"
                    );
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $row2 = $result->fetch_array();

                        echo "<div class='post'>";

                                $postedTime = "Posted at ";

                                if(isset($_GET['id'])){
                                    $stmt = $con->prepare(
                                        "SELECT * FROM usertext where id = ?"
                                    );
                                    $stmt->bind_param("s", $_GET['id']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $a = $result->fetch_array();
                                        $likes = $a["likes"];
                                        
                                        $stmt = $con->prepare(
                                            "SELECT * FROM likes where user = ? AND id = ? ORDER BY id DESC"
                                        );
                                        $stmt->bind_param("si", $email2, $_GET['id']);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $num4 = mysqli_num_rows($result);
                                        if($num4 != 1){
                                            $book['postcode'] = array(':postid'=>$_GET['postcode']);
                                            $stmt = $con->prepare(
                                                "INSERT INTO likes (user, postcode) VALUES (?, ?)"
                                            );
                                            $stmt->bind_param("si", $email2, $_GET['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if($result){
                                                $stmt = $con->prepare(
                                                    "UPDATE usertext SET likes=?+1 WHERE postcode=?"
                                                );
                                                $stmt->bind_param("ii", $likes, $_GET['postcode']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                            } 

                                            
                                        } else {
                                            $stmt = $con->prepare(
                                                "delete from likes where user = ? && postcode = ?"
                                            );
                                            $stmt->bind_param("si", $email2, $_GET['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            if($result){
                                                $stmt = $con->prepare(
                                                    "UPDATE usertext SET likes=?-1 WHERE postcode=?"
                                                );
                                                $stmt->bind_param("ii", $likes, $_GET['postcode']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                            }

                                            
                                        }
                                    }

                                    
                                    
                                
                            ?>


                            <?php foreach($result as $mouse){?>
                                
                                <?php
                                    $uniqueCode = uniqid();
                                    $id = $mouse['id'];
                                    $postcode = $mouse['postcode'];
                                    $picCode = $mouse['picCode'];
                                    $private = $mouse['private'];

                                    $text = $mouse['textmessage'];

                                    if (str_contains($text, '*')) {
                                        $strArray = explode('*',$text);
                                        $name = $strArray[1];
                                    }

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

                                    if ($private == "No") {?>

                                        <div class="name1">
                                            <b><?php echo $name; ?></b>
                                        </div>
                                        <div class='time'>
                                            <?php echo $mouse['postedTime'];?>
                                        </div><br><?php

                                        if ($mouse['picCode'] == 0) {
                                            
                                            $stmt = $con->prepare(
                                                "select * from likes where user = ? && postcode =?"
                                            );
                                            $stmt->bind_param("si", $email2, $mouse['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $num4mk2 = mysqli_num_rows($result);

                                            
                                            
                                            
                                            
                                            if($num4mk2 != 1){
                                                
                                                echo $mouse['textmessage']."<br>".
                                                "".$mouse['likes']."
                                                <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                            } else {
                                                echo $mouse['textmessage']."<br>".
                                                "".$mouse['likes']."
                                                <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                            }
                                        } else {

                                            
                                            $stmt = $con->prepare(
                                                "select * from likes where user = ? && postcode =?"
                                            );
                                            $stmt->bind_param("si", $email2, $mouse['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $num4mk2 = mysqli_num_rows($result);

                                            
                                            $stmt = $con->prepare(
                                                "select picture from pictures where picCode = ?"
                                            );
                                            $stmt->bind_param("i", $picCode);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $quick = $result->fetch_array();

                                            
                                            
                                                $picture = $quick['picture'];
                                                
                                                
                                                

                                                if (!str_contains($picture, "MOV")) {
                                                    if($num4mk2 != 1){
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <img class='picture' src='image/$picture'><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                    } else {
                                                        
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <img class='picture' src='image/$picture'><br><br>".$mouse['likes']."
                                                        <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                    }
                                                } else {

                                                    echo "One video to rule them all";

                                                    if($num4mk2 != 1){
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <video controls>
                                                        <source src='image/$picture' type='video/MOV'>
                                                        Your browser does not support the video tag.
                                                        </video><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                    } else {
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <video controls>
                                                        <source src='image/$picture' type='video/MOV'>
                                                        Your browser does not support the video tag.
                                                        </video><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                                    }
                                                
                                            }

                                                

                                            
                                            
                                        }
                                    } elseif ($user == $name AND $private == "Yes") {
                                        ?>

                                        <div class="name1">
                                            <b><?php echo $name; ?></b>
                                        </div>
                                        <div class='time'>
                                            <?php echo $mouse['postedTime'];?>
                                        </div><br><?php

                                        if ($mouse['picCode'] == 0) {
                                            
                                            $stmt = $con->prepare(
                                                "select * from likes where user = ? && postcode =?"
                                            );
                                            $stmt->bind_param("si", $email2, $mouse['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $num4mk2 = mysqli_num_rows($result);
                                            
                                            if($num4mk2 != 1){
                                                
                                                echo $mouse['textmessage']."<br>".
                                                "".$mouse['likes']."
                                                <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                            } else {
                                                echo $mouse['textmessage']."<br>".
                                                "".$mouse['likes']."
                                                <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br><br>";
                                            }
                                        } else {

                                            
                                            $stmt = $con->prepare(
                                                "select * from likes where user = ? && postcode =?"
                                            );
                                            $stmt->bind_param("si", $email2, $mouse['postcode']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $num4mk2 = mysqli_num_rows($result);

                                            $stmt = $con->prepare(
                                                "select picture from pictures where picCode = ?"
                                            );
                                            $stmt->bind_param("i", $picCode);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $quick = $result->fetch_array();

                                            
                                            
                                                $picture = $quick['picture'];
                                                
                                                
                                                

                                                if (!str_contains($picture, "MOV")) {
                                                    if($num4mk2 != 1){
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <img class='picture' src='image/$picture'><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br>";
                                                    } else {
                                                        
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <img class='picture' src='image/$picture'><br><br>".$mouse['likes']."
                                                        <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br>";
                                                    }
                                                } else {

                                                    echo "One video to rule them all";

                                                    if($num4mk2 != 1){
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <video controls>
                                                        <source src='image/$picture' type='video/MOV'>
                                                        Your browser does not support the video tag.
                                                        </video><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='likeSystem' id='$postcode' onclick='swapLikee$uniqueCode()'><svg id='$postcode-1' class='like1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br>";
                                                    } else {
                                                        echo $mouse['textmessage']."<br>".
                                                        "
                                                        <video controls>
                                                        <source src='image/$picture' type='video/MOV'>
                                                        Your browser does not support the video tag.
                                                        </video><br><br>
                                                        ".$mouse['likes']."
                                                        <a href='' class='unlike' id='$postcode' onclick='swapLikee2$uniqueCode()'><svg id='$postcode-1-2' class='unlike1$uniqueCode' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                    <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                    </svg></a>
                                                        <a class='comment' target='_blank' href='conceptForComments.php?postcode=$id' id='$id'>//</a><br>";
                                                    }
                                                }
                                            }
                                        
                                    }
                                
                            }

                            ?>


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