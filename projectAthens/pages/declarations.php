<?php 

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');

    }
?>
<?php
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con2 = new mysqli('localhost', 'root', '', 'userregistration');
    $con2->set_charset('utf8mb4');

    $email = $_SESSION['email'];
    $doItDoItNow = "ExecuteOrder66";

    $stmt = $con2->prepare(
        "SELECT * FROM usertable WHERE email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowLight = $result->fetch_array();
        $accentColour = $rowLight['AccentColour'];
        $folname = $rowLight['followerName'];
        $background = $rowLight['background'];
        $x = $rowLight['x'];
    
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
    <title>Declartions of <?php echo $x; ?> </title>
    <style>
        *
        {
            margin: 0;
            border: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
            background: <?php echo $background; ?>;
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
        
        /* Desktop - The intended way to view the site */
        @media only screen and (min-width: 601px) {
            .box1
            {
                width: 600px;
                /* height: 1000px; */
                background: white;
                padding: 20px;
                margin: 8% auto;
                margin-top: 10%;
                text-align: center;
                border-radius: 5px;
                z-index: 10;
                color: <?php echo $accentColour; ?>;
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
        /* Mobile - The non non intended way to visit the site */
        @media only screen and (max-width: 601px) {
            .box1
            {
                width: 100%;
                /* height: 1000px; */
                background: white;
                padding: 20px;
                margin: 8% auto;
                margin-top: 20%;
                text-align: center;
                border-radius: 5px;
                z-index: 10;
                color: <?php echo $accentColour; ?>;
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

        .a-1
        {
            text-decoration: none;
            color: <?php echo $accentColour; ?>;

            font-size: 12px;
        }
        .a-1:hover
        {
            color: <?php echo $accentColour; ?>;
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
    </header>
    <div class="userContent">
        <div class="box1">
            <?php
                $followerid = $_SESSION['code'];
                $email = $_SESSION['email'];

                $followerid = intval( $_SESSION['code']);
                $request = " has requested to join the ";
                $request2 = ", ";
                $request3 = " OR ";

                $stmt = $con->prepare(
                    "SELECT * FROM declarations WHERE user_email = ?"
                );
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $c8_1 = mysqli_num_rows($result);
                $yes = "yes";
                $no = "no";
                if ($c8_1 != 0){
                    $stmt = $con->prepare(
                        "UPDATE usertable SET notifactions = ? WHERE email = ?"
                    );
                    $stmt->bind_param("ss", $yes, $email);
                    $stmt->execute();
                } else {
                    $stmt = $con->prepare(
                        "UPDATE usertable SET notifactions = ? WHERE email = ?"
                    );
                    $stmt->bind_param("ss", $no, $email);
                    $stmt->execute();
                }

                if ($c8_1 != 0) {

                    $stmt = $con->prepare(
                        "SELECT * FROM declarations WHERE user_email = ?"
                    );
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                        $row = $result->fetch_array();#
                        
                                ?>
                                <div class="post">
                                    <?php
                                    
                                    foreach($result as $mouse){

                                        $user_email = $mouse["follower_email"];
                                        $user_id = $mouse['user_id'];
                                        $id = $mouse['id'];
                                        $postcode = $mouse['postcode'];

                                        $stmt = $con->prepare(
                                            "SELECT * FROM usertable WHERE email = ?"
                                        );
                                        $stmt->bind_param("s", $user_email);
                                        $stmt->execute();
                                        $result2 = $stmt->get_result();
                                        foreach($result2 as $mouse3) {
                                            echo "<br>",$mouse3['user'] , " has sent you a declaration of ". $x, "<a class='comment' href='conceptForComments.php?postcode=$id&data=$doItDoItNow' id='$postcode'> here</a><br>";
                                        }
                                    }?>
                                </div>
                            <?php
                } else {
                    echo "<br>", "You do not have any declarations of ". $x, "<br>";
                }

                echo "<br><br><a class='a-1' href='conceptForEditAccount2.php'>Back to settings</a>";
            ?>
                
        </div>
    </div>
</body>
</html>