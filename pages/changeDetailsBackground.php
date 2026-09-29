<?php

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli('localhost', 'root', '', 'userregistration');
    $con->set_charset('utf8mb4');

    if(isset($_POST['updateData']))
    {
        $email = $_SESSION['email'];

        $backgroundFake = $_POST['background'];

        $background = mysqli_real_escape_string($con, htmlspecialchars($backgroundFake));

        if($background == "Athens red" or $background == "athens red")
        {
            $background = "#E6023b";
            $stmt = $con->prepare(
                "UPDATE usertable SET AccentColour = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $background, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            $boot = "no";

            $stmt = $con->prepare(
                "UPDATE usertable SET isRandom = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $boot, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        } elseif($background == "random" or $background == "Random"){

            function rand_colour() {
                return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
            
            $randColour = rand_colour();

            $stmt = $con->prepare(
                "UPDATE usertable SET AccentColour = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $background, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            $boot = "yes";

            $stmt = $con->prepare(
                "UPDATE usertable SET isRandom = ? WHERE email = ? "
            );
            $stmt->bind_param("ss", $boot, $email);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {

            if(preg_match('/^#[a-f0-9]{6}$/i', $background))
            {
                $stmt = $con->prepare(
                    "UPDATE usertable SET AccentColour = ? WHERE email = ? "
                );
                $stmt->bind_param("ss", $background, $email);
                $stmt->execute();
                $result = $stmt->get_result();

                $boot = "no";

                $stmt = $con->prepare(
                    "UPDATE usertable SET isRandom = ? WHERE email = ? "
                );
                $stmt->bind_param("ss", $boot, $email);
                $stmt->execute();
                $result = $stmt->get_result();
            } 
            

            elseif(preg_match('/^[a-f0-9]{6}$/i', $background))
            {
                $background2 = '#' . $background;

                $stmt = $con->prepare(
                    "UPDATE usertable SET AccentColour = ? WHERE email = ? "
                );
                $stmt->bind_param("ss", $background, $email);
                $stmt->execute();
                $result = $stmt->get_result();

                $boot = "no";

                $stmt = $con->prepare(
                    "UPDATE usertable SET isRandom = ? WHERE email = ? "
                );
                $stmt->bind_param("ss", $boot, $email);
                $stmt->execute();
                $result = $stmt->get_result();
            }

            

            
        }
    }

    header('location: pers.php');
?>