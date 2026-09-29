<!DOCTYPE html>
<html lang="en">
<head>
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="802cca3b-31cb-41ff-ac83-08a70d5cce8b" data-blockingmode="auto" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>P.Athens . Registration</title>
    <style>
        *
        {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        @media only screen and (min-width: 601px) {
            .InternalCSSIsBetter-me
            {
                width: 100%;
                height: 100%;
                background:#E6E6E6;
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        .container
        {
            height: 100vh;
            width: 100vh;
            
        }
        html, body
        {
            height: 100vh;
            background: #E6E6E6;
        }
        
        .content
        {
            max-width: 700px;
            float: none;
            background: #E6E6E6;
            border-radius: 20px;
            margin-top: -50px;
            background: transparent;
        }
        #register
        {
            width: 100%;
            background: #E6023b;
            border: 0;
            height: 50px;
            color: #E6E6E6;
        }
        .h2-1
        {
            text-align: center;
        }
        a
        {
            text-decoration: none;
            font-weight: normal;
        }
        .login
        {
            color: #000000;
        }
        .login:hover
        {
            color: #bab8b8;
        }
        .form-message {
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            font-family: Arial;
        }
        .form-error
        {
            color: red;
        }
        .form-success
        {
            color: green;
        }
        .input-error
        {
            box-shadow: 0 0 5px red;
        }
        

        @media only screen and (max-width: 600px) {
            body
            {
                overflow-x: hidden;
            }
            .InternalCSSIsBetter-me
            {
                margin: 0 0 0 4%;
                width: 100%;
                height: 100%;
                background:#E6E6E6;
                background-size: cover;
                background-position: center;
                display: flex;
                justify-content: left;
                align-items: center;
            }
        }
        @media only screen and (max-height: 600px) and (orientation: landscape) {
            .InternalCSSIsBetter-me
            {
                margin: 7% 60% 20% 7%;
                width: 100%;
                height: 100%;
                background:#E6E6E6;
                background-size: cover;
                background-position: center;
                display: flex;
                justify-content: left;
                align-items: center;
            }
        }
        
    </style>
    <script>
        $(document).ready(function () {
            $("#register-form").submit(function(event) {
                event.preventDefault();
                var email = $("#email-reg").val();
                var name = $("#name-reg").val();
                var password = $("#password-reg").val();
                var age = $("#age-reg").val();
                var check = $("#check-reg").val();
                var submit = $("#register").val();
                $(".form-message").load("mail.php", {
                    email: email,
                    name: name,
                    password: password,
                    age: age,
                    check: check,
                    submit: submit
                })
            })
        })
</script>
</head>
<body>
    <div class="container">
        <div class="InternalCSSIsBetter-me">
            <div class="content">
            <div class="context">
            <div class="YeahISaidIt">
                <h2 class="h2-1">Register</h2>
                <form action="mail.php" method="POST" id="register-form">
                    <div class="form-group">
                        <input type="text" name="email" id='email-reg' class="form-control"  maxlength="200" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="user" id='name-reg' class="form-control"  maxlength="30" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id='password-reg' class="form-control"  maxlength="100" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="number" class ="form-control" id='age-reg' name="age" min="1" max="360"  placeholder="Age">
                    </div>
                    <div class="termsOfService">
                    
                        <p><span><input type="checkbox" name='checkbox' id="check-reg" required></span> The site uses cookies, do you consent to this.</p>

                        <p><span><input type="checkbox" name='checkbox' id="check-reg" required></span> Do you agree with the <a href="privacypolicy.php" target="_blank">Privacy Policy</a></p>
                    </div>
                    <div class="form-group">
                        <a class="login" href="login.php">Click here to login</p></a>
                    </div>
                    <br>
                    <button id="register" type="submit" name='submit'>Register</button>

                    <p class="form-message"></p>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>