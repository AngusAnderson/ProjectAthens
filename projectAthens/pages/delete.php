<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caleb is like a lamp</title>
</head>
<body>
    <?php

        $a = rand(0,25);
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $randomLetter = $alphabet[$a];
        
        if ($randomLetter == "s"){
            echo("We have lift off");
        } else {
            echo("No way hosay!");
        }
    ?>
</body>
</html>