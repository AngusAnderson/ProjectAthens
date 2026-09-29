<?php 

    session_start();
    if(!isset($_SESSION['email'])){
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
    $user = $rowLight['user'];
    $accentColour = $rowLight['AccentColour'];
    $bio = $rowLight['userBio'];
    $folname = $rowLight['followerName'];
    $navbar = $rowLight['navbar'];
    $header = $rowLight['header'];
    $background = $rowLight['background'];
    $PPS_U = $rowLight['ProfPicStyle'];
    $x = $rowLight['x'];
    
    
    if ($PPS_U == '50%') {
        $PPS = 'Circle';
    } elseif ($PPS_U == '10px') {
        $PPS = 'Rounded square';
    } else {
        $PPS = 'Square';
    }

?>

<html>
    <head>
        <title>Project Athens . Edit Account</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
             *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            html,body
            {
                overflow-x: hidden;
                overflow-y: auto;
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
            .ok
            {
                font-weight: lighter;
                font-size: small;
            }
            .ok2
            {
                font-weight: lighter;
                font-size: small;
            }
            .ok3
            {
                font-weight: lighter;
                font-size: small;
            }
            .ok4
            {
                font-weight: lighter;
                font-size: small;
            }
            @media only screen and (max-width: 600px)
            {
                .profile-bottom
                {
                    width: 100%;
                }
                input::placeholder
                {
                    font-size: 12px;
                }
            }
           
        </style>
    </head>
    <body>
        <div class="container">
            <div class="profile-box">
                <div class="profile-bottom">
                    <main>
                        <Section class="sec-1">
                            <h1><u>Personalisation</u></h1>
                            <br><br>
                            <form action="changeDetailsBio.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Bio</b></label>
                                    <p class="ok">The current is - <?php echo $bio; ?></p>
                                    <input type="text" name="userBio" class="form-control" maxlength="300" placeholder="Edit personal description" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change bio</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsx.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Declaration of x</b></label>
                                    <p class="ok">Where 'x' is defined by the user.</p>
                                    <p class="ok">This is what it is called when someone puts @<?php echo $user; ?> in their post. They and yourself will be notified upon the declaration</p>
                                    <p class="ok">The current value for 'x' is - <?php echo $x; ?></p>
                                    <input type="text" name="Dname" class="form-control" maxlength="50" placeholder="Change x" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change x</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsFolName.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Follower name</b></label>
                                    <p class="ok">The current is - <?php echo $folname; ?></p>
                                    <input type="text" name="folName" class="form-control" maxlength="30" placeholder="Edit name for followers" required style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change follower name</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsNavbar.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Navbar layout/style</b></label><br><br>
                                    <p class="ok">'fixed' - means a fixed navbar (it is the default navbar).</p>
                                    <p class="ok2">'hidden' - means a navbar which only appears when the user hovers over it.</p>
                                    <p class="ok3">NOTE - for mobile the navbar is always fixed.</p>
                                    <p class="ok">The current is - <?php echo $navbar; ?></p>
                                    <input type="text" name="navbar" class="form-control" placeholder="Enter 'fixed' or 'hidden'" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                        <button type="submit" name="updateData" class="btn btn-primary">Change navbar</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsHeader.php" method="POST">
                                <div class="form-group mb-3">
                                    <label  for=""><b>Header layout/style</b></label><br><br>
                                    <p class="ok" >'fixed' - means a fixed header (it is the default header).</p>
                                    <p class="ok2" >'hidden' - means a header which only appears when the user hovers over it.</p>
                                    <p class="ok3">NOTE - that changing this setting will not change the header on the home page, in addition if the main device that you use Athens for is mobile phone fixed is recommended to avoid leaving space at top.</p>
                                    <p class="ok">The current is - <?php echo $header; ?></p>
                                    <input type="text" name="header" class="form-control" placeholder="Enter 'fixed' or 'hidden'" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                        <button type="submit" name="updateData" class="btn btn-primary">Change header</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsBackground.php" method="POST">
                                <div class="form-group mb-3">
                                    <label  for=""><b>Accent colour</b></label><br><br>
                                    <p class="ok">This will change the element colours of Athens</p>
                                    <p class="ok2" >To accomplish this enter the hexadecimal value of the colour including the '#' at start.</p>
                                    <p class="ok3" >To find a colour for you search for a hexadecimal colour picker.</p>
                                    <p class="ok4" >The default colour hexadecimal is '#E6023b' or enter 'Athens red'</p>
                                    <p class="ok">The current is - <?php echo $accentColour; ?></p>
                                    <input type="text" name="background" class="form-control" maxlength="30" placeholder="Enter colour hexadecimal" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                        <button type="submit" name="updateData" class="btn btn-primary">Change accent</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsBackground2.php" method="POST">
                                <div class="form-group mb-3">
                                    <label  for=""><b>Background colour</b></label><br><br>
                                    <p class="ok">This will change the background colours of your profile</p>
                                    <p class="ok2" >To accomplish this enter the hexadecimal value of the colour including the '#' at start.</p>
                                    <p class="ok3" >To find a colour for you search for a hexadecimal colour picker.</p>
                                    <p class="ok4" >The default colour hexadecimal is '#E6E6E6' or enter 'Dull'</p>
                                    <p class="ok">The current is - <?php echo $background; ?></p>
                                    <input type="text" name="background" class="form-control" maxlength="30" placeholder="Enter colour hexadecimal" style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                        <button type="submit" name="updateData" class="btn btn-primary">Change background</button>
                                </div>
                            </form><br>

                            <form action="changeDetailsProfPicStyle.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Profile picture style</b></label>
                                    <p class="ok">Enter 'circle', 'square' or 'Rounded square' for circle, square or a rounded sqaure profile picture.</p>
                                    <p class="ok">The current is - <?php echo $PPS; ?></p>
                                    <input type="text" name="ProfPicStyle" class="form-control" maxlength="30" placeholder="Edit name style of profile picture frame" required style="text-align: center;" style="height: 200px;">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change style</button>
                                </div>
                            </form><br>

                            
                            <br><br>
                            <a href="conceptForEditAccount2.php">Back to settings</a>
                        </Section>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>