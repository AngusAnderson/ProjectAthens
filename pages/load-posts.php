<?php
    include 'dbh.php';

    $postsNewCount = $_POST['postsNewCount'];

    $sql = "SELECT * FROM usertext ORDER BY postcode DESC LIMIT $postsNewCount";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row['email'];
            echo "<br>";
            echo $row['textmessage'];
            echo "</p>";
        }
    }

?>