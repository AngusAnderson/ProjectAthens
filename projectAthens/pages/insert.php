<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($email))  !empty($name) || !empty($username) || !empty($password)
    {
        $host = "localhost";
        $dbUsername = "root";
        $dpPassword = "";
        $dpName = "userregisterinformation";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dpPassword, $dpName);

        if (mysqli_connect_error()) {
            die('Connect error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT email From register Where email = ? Limit 1";
            $INSERT = "INSERT Into register (email, name, useranme, password) values(?, ? ,? ,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum==0) {
                $stmt->close();
                
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssss", $email, $name, $username, $password);
                $stmt->execute();
                echo "New record inserted successfully";
            } else {
                echo "Someone already signed up using this email and or username";
            }
            $stmt->close();
            $conn->close();
        }
    }
?>