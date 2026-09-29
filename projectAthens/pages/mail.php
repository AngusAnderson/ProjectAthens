<?php 

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $check = $_POST['check'];

        $errorEmpty = false;
        $errorEmail = false;

        if (empty($name) or empty($email) or empty($password) or empty($age) or empty($check)){
            echo "<span class='form-error'>Fill in all fields</span>";
            $errorEmpty = true;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='form-error'>Write a valid email address</span>";
            $errorEmail = true;
        } elseif ($age < 17) {
            echo "<span class='form-error'>The minimum age is 17</span>";
        } 

        if ($errorEmail == false and $errorEmail == false and $age > 16){

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $con = new mysqli('localhost', 'root', '', 'userregistration');
            $con->set_charset('utf8mb4');

            $min = 1;
            $max = 100000000;

            $code = random_int($min, $max);
            $c = "select * from usertable where code = '$code'";
            $result3 = mysqli_query($con, $c);
            $num3 = mysqli_num_rows($result3);

            while($num3 == 1){
                $code = random_int($min, $max);
                $c = "select * from usertable where code = '$code'";
                $result3 = mysqli_query($con, $c);
                $num3 = mysqli_num_rows($result3);
            }

            $email = mysqli_real_escape_string($con,  htmlspecialchars($_POST['email']));
            $name = mysqli_real_escape_string($con,  htmlspecialchars($_POST['name']));
            $passF = mysqli_real_escape_string($con,  htmlspecialchars($_POST['password']));
            $age = mysqli_real_escape_string($con, htmlspecialchars($_POST['age']));

            if (!(str_contains($name, 'drop table usertable'))) {
                if (!(str_contains($name, 'DROP TABLE usertable'))) {
                    if (!(str_contains($name, 'DROP TABLE'))) {
                        if (!(str_contains($name, 'drop table'))){
                            $bio = "empty...";
                            $folName = "alliance";
                            $navbar = "fixed";
                            $profileImage = "IMG_0149.jpg";
                            $header = "fixed";
                            $accent = "#E6023b";
                            $background = "#E6E6E6";
                            $random = "no";
                            $profPicStyle = "50%";
                            $privacy = "private";
                            $noti = "no";
                            $granted = "no";
                            $border = "#ffffff";
                            $height = "500";
                            $width = "300";
                            $UPC = "UPC 1";
                            $x = "the table";
                
                            $pass = password_hash($passF, PASSWORD_DEFAULT);
                            $pass = substr($pass, 0, 60);

                            $stmt = $con->prepare(
                                "SELECT * FROM usertable WHERE user = ?"
                            );
                            $stmt->bind_param("s", $name);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $stmt = $con->prepare(
                                "SELECT * FROM usertable WHERE email = ?"
                            );
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result2 = $stmt->get_result();
                
                            $num = mysqli_num_rows($result);
                            $num2 = mysqli_num_rows($result2);
                
                            if ($num==1 and $num2==1) {
                                echo "<span class='form-error'>That username and email is already in use</span>";
                            } elseif ($num ==1) {
                                echo "<span class='form-error'>That usename is already in use</span>";
                            } elseif ($num2 ==1) {
                                echo "<span class='form-error'>That email is already in use</span>";
                            } else {
                                $reg = " insert into usertable(code, email, user, userPassword, userBio, profileImage,followerName, navbar, header, AccentColour, isRandom, background, isRandom2, ProfPicStyle, UserPrivacy, notifactions, age, access, border, width, UPC, x) values (?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $reg)){
                                    echo "There was an error";
                                } else {
                                    mysqli_stmt_bind_param($stmt, "isssssssssssssssississ", $code, $email, $name, $pass, $bio, $profileImage, $folName, $navbar, $header, $accent, $random, $background, $random, $profPicStyle, $privacy, $noti, $age, $granted, $border, $width, $UPC, $x);
                                    mysqli_stmt_execute($stmt);
                                    echo "<span class='form-success'>Success</span>";
                                }
                            }
                        } else {
                            echo "<span class='form-error'>Nice try</span>";
                        }
                    } else {
                        echo "<span class='form-error'>Nice try</span>";
                    }
                } else {
                    echo "<span class='form-error'>Nice try</span>";
                }
            } else {
                echo "<span class='form-error'>Nice try</span>";
            }

            

            
            
            
        } else {
            
            echo "There was an error";
        }

    } 

?>

<script>

    $("#email-reg, #name-reg, #password-reg, #age-reg, #check-reg").removeClass("input-error");

    
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $("#email-reg, #name-reg, #password-reg, #age-reg, #check-reg").addClass("input-error");
    } 
    if (errorEmail == ture) {
        $("#email-reg").addClass("input-error");
    } 
    if (errorEmpty == false && errorEmail == false) {
        $("#email-reg, #name-reg, #password-reg, #age-reg, #check-reg").val("");
    }
</script>