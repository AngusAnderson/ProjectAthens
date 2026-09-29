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
            .left-radio
            {
                padding: 0 20px 0 0;
                display: inline-block;
            }

            @media only screen and (max-width: 600px)
            {
                .profile-bottom
                {
                    width: 100%;
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
                            <h1><u>Account settings</u></h1>
                            <br><br>
                            <form action="changeDetails.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>Username</b></label>
                                <p class="ok-2">The current is - <?php echo $username; ?></p>
                                <input type="text" name="user" class="form-control" placeholder="Change username" style="text-align: center;" maxlength="30" required>
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change username</button>
                            </div>
                            </form>
                            <br>
                            <form action="changeDetailsPassword.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for=""><b>Password</b></label>
                                    <input type="text" name="password" class="form-control" placeholder="Change password" style="text-align: center;" required>
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change password</button>
                                </div>
                            </form>
                            <br>
                            <form action="uploadProfileImage.php" method="POST" enctype="multipart/form-data" value="30000">
                                <div class="form-group mb-3">
                                    <label for=""><b>Profile image</b></label>
                                    <p class="ok">Accepted formats include 'gif', 'png', 'jpg', 'jpeg' and 'webp'</p>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                                </div>
                            </form>
                            <br><form action="changePrivacy.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>Privacy</b></label>
                                <p class="ok-2">'Private' or 'Public'</p>
                                <p class="ok-2">The current is - <?php echo $privacy; ?></p>
                                <input type="text" name="privacy" class="form-control" placeholder="Change privacy settings" style="text-align: center;" required>
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change privacy</button>
                            </div>
                            </form>
                            <br><form action="changeBColour.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>Change border colour</b></label>
                                <p class="ok-2">Changes the border colour of the profile picture</p>
                                <p class="ok-2">For the border to be invisible set the border to - <?php echo $background; ?></p>
                                <p class="ok-2">The current is - <?php echo $border; ?></p>
                                <input type="text" name="border" class="form-control" placeholder="Change border colour" style="text-align: center;" required>
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change border colour</button>
                            </div>
                            </form>
                            <br><form action="changeUPC.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>User Profile Concept</b></label>
                                <p class="ok-2">Choose between UPC 1 or 2</p>
                                <p class="ok-2">UPC 2 is only avaliable on desktop. Accent colour is only used for liking on UPC 2 - its not used nearly as much as UPC 1</p>
                                <div class="left-radio">
                                    <input type="radio" name="UPC" checked value="UPC 1">UPC 1
                                </div>
                                
					            <input type="radio" name="UPC"  value="UPC 2">UPC 2

                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change UPC</button>
                            </div>
                            </form>
                            <br><br>
                            <a href="conceptForEditAccount2.php">Back to settings</a>
                        </Section>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>