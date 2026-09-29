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
        <title>Project Athens . Why?</title>
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
                            <h1><u>Why Project Athens?</u></h1>
                            <br><br>
                            <h3>To put on a UCAS application</h3>
                            <p>This was partially made to put onto an application to Higher education. Partially. The writer of Athens believes that this will be beneficial to the application.</p>
                            <br><br>

                            <h3>Why title it 'Athens'</h3>
                            <p>
                                All of my Computing Projects are Greek titled. This was - and is - my biggest Project to date, so I thought it deserved a worthy title. Therefore leading to Project Athens. Although it should actually be EP Athens, due to the time taken to create.
                            </p>
                            <br><br>

                            <h3>To have someting to do</h3>
                            <p>Project Athens gave me something productive to do, as before the days of P.Athens (PPA - Pre P.Athens) I did school work then nothing. Now I have school work and alot of typing to do. I started P.Athens on the 1st of October 2020, I started P.Athens with only the knowledge of N5 web development. Only N5. To provide context N5 web develop is essentially put a paragraph element in a div then make the background of the div brown, it was always some shade of brown. When it came to H web developent I did not learn a single new thing becuase I had learnt it from P.Athens.</p>
                            <br><br>

                            <h3>To learn something new</h3>
                            <p>Athens was not my first project. Helios was my first project. I created Helios in 2019, but the problem with Helios was it used colourful lines that I already knew how to use. So therefore did not provide a challenge. Whereas with P.Athens most colourful lines were new,
                                 so I had to learn quite a bit as well as new languages PHP and JavaScript. I have not fully learnt JS as I chose to learn very specific things, such as JQuery and Ajax.</p>
                            <br><br>

                            <a href="conceptForEditAccount2.php">Back to settings</a>
                        </Section>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>