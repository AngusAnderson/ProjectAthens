<?php 

    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');

    }
?>

<?php include 'processForm.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Project Athens . Picture and bio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styleSheetForProfileBio.css">

    <style>
        .skittles
        {
            position: relative;
            left: 50%;

        }
        a{
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form action="profileBio.php" method="post" enctype="multipart/form-data">

                <h3 class="text-center">Create profile</h3>

                    <div class="form-group">
                        <label for="profileImage">Profile Image</label>
                        <input type="file" name="profileImage" id="profileImage" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save-user" class="btn btn-primary btn-block">Save user</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="skittles">
                        <a href="index.html">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
