<?php 

    session_start();
    if(!isset($_SESSION['email'])){
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
    }
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
            body
            {
                background: #E6E6E6;
            }
            .container
            {
                background-color: #e6023b;
                width: 100%;
                height: 100vh;
                /* display: flex;
                align-items: center;
                justify-content: center; */
                background: transparent;
            }
            .box
            {
                top: -10%;
                background: #E6E6E6;
                text-align: center;
                padding: 30px 90px;
                color: #fff;
                position: relative;
                border-radius: 20px;
                border: none;
                background: transparent;
            }
            .box h1
            {
                display: grid;
                place-items: center;
            }
            h1
            {
                font-size: larger;
                color: <?php echo $accentColour; ?>;
            }
            h2
            {
                color: <?php echo $accentColour; ?>;
            }
            .box a 
            {
                text-decoration: none;
                color: <?php echo $accentColour; ?>;
            }
            .box a:hover
            {
                text-decoration: none;
                color: <?php echo $accentColour; ?>;
            }
            .form-group.mb-3
            {
                color: <?php echo $accentColour; ?>;
            }
            .credit
            {
                position: relative;
                top: 200px;
                color: <?php echo $accentColour; ?>;
            }
            .link
            {
                position: relative;
                top: 1000px;
            }
            .ok
            {
                font-size: small;
                color: <?php echo $accentColour; ?>;
            }
            .ok2
            {
                font-size: small;
                color: <?php echo $accentColour; ?>;
                position: relative;
                top: -15px;
            }
            .ok3
            {
                font-size: small;
                color: <?php echo $accentColour; ?>;
                position: relative;
                top: -30px;
            }
            .ok4
            {
                font-size: small;
                color: <?php echo $accentColour; ?>;
                position: relative;
                top: -45px;
            }
            
            main
            {
                display: inline;
            }
            .sec-1
            {
                float: left;
                width: 500px;
            }
            .sec-1 h3
            {
                color: <?php echo $accentColour; ?>;
            }

            .sec-2
            {
                float: right;
                width: 500px;
            }
            .sec-2 h3
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
           
        </style>
    </head>
    <body>
        <div class="container">
            <div class="box">
                <br><br>
                <br>
                <br>
                <br>
                <br>

                <h2>Edit Account</h2>
                <main>
                    <section class="sec-1">
                        <h3><b>Personalization</b></h3><br><br><br>

                        <form action="changeDetailsBio.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>Bio</b></label>
                                <input type="text" name="userBio" class="form-control" maxlength="300" placeholder="Edit personal description" style="text-align: center;" style="height: 200px;">
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change bio</button>
                            </div>
                        </form><br>

                        <form action="changeDetailsFolName.php" method="POST">
                            <div class="form-group mb-3">
                                <label for=""><b>Follower name</b></label>
                                <input type="text" name="folName" class="form-control" maxlength="30" placeholder="Edit name for followers" style="text-align: center;" style="height: 200px;">
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
                                <p class="ok4" >The default colour hexadecimal is '#E6023b' or enter 'Athens red' or 'random' for it to be random.</p>
                                <input type="text" name="background" class="form-control" maxlength="30" placeholder="Enter colour hexadecimal" style="text-align: center;" style="height: 200px;">
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Change colour</button>
                            </div>
                        </form><br>
                        
                    </section>

                    <section class="sec-2">
                        <h3>Account settings</h3><br><br><br>
                        <form action="changeDetails.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text" name="user" class="form-control" placeholder="Change username" style="text-align: center;" required>
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" name="updateData" class="btn btn-primary">Change username</button>
                            </div>
                        </form>
                        <br>
                        <form action="changeDetailsPassword.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Password</label>
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
                                <label for="">Profile image</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <p><br></p>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                            </div>
                        </form>
                    </section>
                </main>
                
                <div class="link">
                    <a href="userProfileConcept.php">Back to account</a>
                </div>
            </div>
        </div>
    </body>
</html>