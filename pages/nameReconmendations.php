<?php

    // session_start();
    // $con = mysqli_connect('localhost','root','');
    // mysqli_select_db($con, 'userregistration');

    // $sql = "SELECT * FROM usertable";
    // $query = mysqli_query($con, $sql);

    // while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    //     $existingNames = $row['user'];
    // }

    $existingNames = ['Amazon', 'A.Anderson', 'Apple', 'Google'];

    if (isset($_POST['suggestion'])) {
        $name = $_POST['suggestion'];

        if (!empty($name)) {
            foreach ($existingNames as $existingName) {
                if (strpos($existingName, $name) !== false) {
                    echo $existingName;
                    echo "<br>";
                }
            }
        }

       
    }
    
?>