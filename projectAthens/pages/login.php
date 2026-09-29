<html>
<head>
    <title> Project Athens . Login </title>
    <link rel="stylesheet" type="text/css" href="styleSheetForLogin.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

        *
        {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
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
        @media only screen and (max-width: 600px) {
            body
            {
                overflow-x: hidden;
            }
            .InternalCSSIsBetter-me
            {
                margin: 0 0 0 15%;
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
        @media only screen and (max-width: 600px) and (orientation: landscape) {
            .InternalCSSIsBetter-me
            {
                margin: 25% 0 0 25%;
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

    
</head>
<body>

    
    

    <div class="container">
        <div class="InternalCSSIsBetter-me">

        
            <div class="content">
            <div class="context">
            <div class="YeahISaidIt">
                <h2 class="h2-1">Login</h2>
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <a class="login" href="register.php">Click here to register</p></a>
                    </div>
                    <br>
                    <button id="register" type="submit" class="btn btn-primary">Login</button>

                    <p class="form-message"></p>
                </form>
                

            </div>
            </div>
            </div>
        </div>
    </div>

</body>
</html>