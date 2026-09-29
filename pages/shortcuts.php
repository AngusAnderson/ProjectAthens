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
        <title>Project Athens . Shortcuts</title>
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
            textarea
            {
                resize: none;
                height: 200px;
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
                        <!-- I should of titled these 'bookmarks'. -->
                        <Section class="sec-1">
                            <h1><u>Shortcuts</u></h1>
                            <br><br>
                            <form action="addShortcut.php" method="POST" enctype="multipart/form-data" value="30000">
                                <div class="form-group mb-3">
                                    <label for=""><b>Add a shortcut to the taskbar</b></label>
                                    <p class="ok-2">The first input is where a SVG file is entered.</p>
                                    <p class="ok-2">The second input is where a title for the shortcut would be entered.</p>
                                    <p class="ok-2">The final input is where a hyperlink - URL - would be entered.</p>
                                    <input type="file" name="file" class="form-control"><br>
                                    <input type="text" name="title" class="form-control" placeholder="Title" style="text-align: center;" required maxlength="30"><br>
                                    <input type="text" name="hyperlink" class="form-control" placeholder="Hyperlink" style="text-align: center;" required><br>
                                </div>
                                <p><br></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="updateData" class="btn btn-primary">Add shortcut</button>
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