<?php 

    session_start();
    if(!isset($_SESSION['email'])){
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
    $username = $rowLight['user'];
    $privacy = $rowLight['UserPrivacy'];
    $border = $rowLight['border'];
    $background = $rowLight['background'];
    $code = $rowLight['code'];
    
?>

<html>
    <head>
        <title>Project Athens . Edit Account</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">

        <style>
             *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .ok
            {
                font-weight: lighter;
                font-size: small;
            }
            .ok-2
            {
                font-weight: lighter;
                font-size: small;
            }
            .profile-box
            {
                width: 100%;
                background: #E6E6E6;
                padding: 20px;
                margin: 50px 0 50px 0 ;
                text-align: center;
                border-radius: 5px;
                z-index: 10;

                display: flex;
                justify-content: center;
            }
            .profile-bottom
            {
                background: #fff;
                color: black;
                padding: 60px 10px 40px 10px;
                margin-right: -90px;
                margin-left: -90px;
                margin-bottom: -40px;
                border-radius: 20px;
                margin-top: -10px;
                width: 500px;
            }
            a
            {
                text-decoration: none;
                color: <?php echo $accentColour; ?>;
            }
            a:hover
            {
                color: <?php echo $accentColour; ?>;
            }
            body
            {
                background: #E6E6E6;
            }
            .sec-1 h1
            {
                color: <?php echo $accentColour; ?>;
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
            .content
            {
                background: rgba(1, 0, 28, 0.2);
                border-radius: 5px;
                padding: 7px 0 10px 20px;
                margin: 10px 0 10px 0;
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
                color: #ffffff80;
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
           
        </style>
    </head>
    <body>
        <div class="container">
            <div class="profile-box">
                <div class="profile-bottom">
                    <main>
                        <Section class="sec-1">
                            <h1><u>All followers</u></h1>
                            <br><br>
                            <?php
                                $stmt = $con2->prepare(
                                    "SELECT followers.follower_id, followers.user_email, usertable.code, usertable.profileImage, usertable.user, usertable.email FROM followers, usertable
                                    WHERE followers.follower_id = usertable.code
                                    AND followers.user_email = ?"
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
                            <br><br>
                            <a href="UPC.php">Back to UPC</a>
                        </Section>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>