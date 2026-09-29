<?php
    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<?php
    $con2 = mysqli_connect('localhost','root','');
    mysqli_select_db($con2, 'userregistration');
    $email = $_SESSION['email'];

    $carpet7 = "SELECT * FROM usertable WHERE email = '$email'";
    $i = mysqli_query($con2, $carpet7);
    while($rowLight = mysqli_fetch_array($i, MYSQLI_ASSOC)){
        $accentColour = $rowLight['AccentColour'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept for home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            var postsCount = 2;
            $("#button-finale").click(function () {
                postsCount = postsCount + 2;
                $("#posts").load("load-posts-dos.php", {
                    postsNewCount: postsCount
                });
            });
        });
    </script>
    
    <style>
        *
        {
            margin: 0;
            border: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .bigFile
        {
            color: black;
        }
        
        .post-1
        {
            color: black;
            word-wrap: break-word;
            
        }
        .picture2
        {
            height: 500px;
            width: 500px;
            padding: 0;
            margin: 0;

            position: relative;
            top: .00000000000000000000000000000000000000000000000000001%;
        }
        .active
        {
            color: <?php echo $accentColour; ?>;
        }
        .active:hover
        {
            color: <?php echo $accentColour; ?>;
        }
        .inactive
        {
            color: black;
        }
        .inactive:hover
        {
            color: #bfbfbf;
        }
        ::selection {
            background: <?php echo $accentColour; ?>;
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
        
        header .links
        {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 10px;
        }
        header .links li
        {
            list-style: none;
            margin: 0 10px;
        }
        header .links li a
        {
            text-decoration: none;
            font-weight: normal;
            letter-spacing: .25px;
        }
        a
        {
            text-decoration: none;
            font-weight: normal;
            letter-spacing: .25px;
        }
        .searchFunction
        {
            position: relative;
            width: 300px;
            height: 40px;
        }
        header .searchFunction input
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #000000;
            outline: none;
            border: 1px solid #000000;
            box-sizing: border-box;
            border-radius: 4px;
            padding: 0 10px 0 45px;
        }
        header .searchFunction input::placeholder
        {
            color: #000000;
        }
        header .searchFunction .searchIcon
        {
            position: absolute;
            top: 55%;
            transform: translateY(-50%);
            left: 10px;
        }
        /* .userContent
        {
            display: grid;
            align-items: center;
            margin: 8% auto;
            padding: 20px;
        } */
        .likeSystem
        {
            color: #cccccc;
            background-color: #E6E6E6;
            border: none;
            outline: none;
            cursor: pointer;
            transition: ease 200ms;

        }
        .like
        {
            color: <?php echo $accentColour; ?>;
            background-color: #E6E6E6;
            border: none;
            outline: none;
            cursor: pointer;
            transition: ease 200ms;
        }
        .time
        {
            color: #999;
            position: relative;
            top: 15px;
            font-size: small;
        }
        
        
        .box1 .userShallSPEAK2
        {
            /* display: flex;
            justify-content: left; */
            width: 600px;
            height: 200px;
            position: relative;
            left: -20px;
            top: -20px;
            /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); */
            background: #E6E6E6;
            padding: 20px;
            padding-top: 20px;
            /* margin: 8% auto; */
            text-align: center;
            border-radius: 5px;
        }
        
        .userShallSPEAK2 .userPost::placeholder
        {
            color: #000000;
        }
        
        img
        {
            
            width: 300px;
            cursor: pointer;
            position: relative;
            top: -800px;
            margin-left: 150px;
        }
        .logo
        {
            z-index: 1;
        }

        /* Icons for the user to use and abuse ;) */
        
        
        /* .at
        {
            position: relative;
            top: 27px;
            right: 360px;
        } */


        @media only screen and (min-width: 851px)
        {
            #picture
            {
                width: 100px;
                height: 37px;
                position: absolute;
                right: 0;
                margin: 10px;
            }

            .userSubmit2
            {
                background: <?php echo $accentColour; ?>;
                color: #E6E6E6;
            }

            .userShallSPEAK2
            {
                display: grid;
                grid-template-areas: 
                "text   submit"
                "pict   at";

                grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr;

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                /* justify-items: left; */
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 100%;}
            .userSubmit2 {grid-area: submit;  height: 50%; width: 100%;}
            .image {grid-area: submit; position: absolute; top: 0; left: 0; padding: 10px;}
            .at {grid-area: submit;  padding: 10px; justify-content: space-around;}

            .box1
            {
                width: 600px;
                background: #E6E6E6;
                padding: 20px;
                margin: 8% auto;
                text-align: center;
                border-radius: 5px;
                z-index: 10;

                
            }
            
            header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                border: 1px solid rgba(0, 0, 0, 0.4);
            }
            header .searchFunction
            {
                position: relative;
                width: 300px;
                height: 40px;
            }
            /* .image
            {
                position: relative;
                top: 27px;
                right: 365px;
            } */
            /* .cycle
            {
                position: relative;
                left: 250px;
            } */
            .userShallSPEAK2 input
            {
                border-radius: 4px;
            }
            .userShallSPEAK2 .userPost
            {
                background: #E6E6E6;
                border-radius: 4px;
            }
        }

        @media only screen and (max-width: 850px)
        {
            .userShallSPEAK2
            {
                display: grid;
                grid-template-areas: 
                "text   submit"
                "pict   at";

                grid-template-columns: 3fr 1fr;
                grid-template-rows: 2fr 2fr;

                /* grid-template-rows: 50px auto 70px; */
                /* gap: 50px; */
                /* justify-items: left; */
                /* padding: 10px; */
            }

            .userPost {grid-area: text; height: 100%; width: 100%;}
            .userSubmit2 {grid-area: submit; height: 50%; width: 100%;}
            .image {grid-area: submit; position: absolute; top: 0; left: 0; padding: 10px;}
            .at {grid-area: submit;  padding: 10px; justify-content: space-around;}

            body
            {
                background: #E6E6E6;
            }
            .box1
            {
                width: 100%;
                /* height: 1000px; */
                background: #E6E6E6;
                padding: 20px;
                margin: 85px auto;
                text-align: center;
                border-radius: 5px;
                z-index: 10;
            }
            header
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                padding: 15px 100px;
                padding-left: 10px;
                z-index: 10;
                background: #E6E6E6;
                
            }
            header .searchFunction
            {
                position: relative;
                width: 400px;
                height: 40px;
                left: 50px;
            }
            .image
            {
                position: absolute;
                padding: 35px 30px 30px 30px;
                left: 0;
            }
            .cycle
            {
                display: none;
            }
            .userShallSPEAK2
            {
                overflow: hidden;
            }
            .userShallSPEAK2 input
            {
                background: #E6023b;
                color: #E6E6E6;
                border-radius: 4px;
                padding-top: 8px;
            }
            .userShallSPEAK2 .userPost
            {
                background: #E6E6E6;
                border-radius: 4px;
                padding-top: 6px;
            }
            .form1
            {
                width: 100%;
            }
        }

        .userPost
        {
            resize: none;
        }
        .post
        {
            color: black;
            word-wrap: break-word;
            display: block;
        }
        .popup2
        {
            display: none;
        }
        .popup2 .overlay2
        {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vh;
            height: 100vh;
            z-index: 10;
            display: none;
        }
        .popup2 .content2
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: #fff;
            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            border: #000000 .5px solid;
        }
        .popup2 .close-btn2
        {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 25px;
            text-align: center;
            border-radius: 50%;
        }
        .popup2.active .overlay
        {
            display: block;
        }
        .popup2.active .content2
        {
            transition: all 800ms ease-in-out;
            transform: translate(-50%, -50%) scale(1);
        }
        .ok
        {
            color: #999;
            font-size: small;
        }

    </style>
</head>
<body>
    <header>
        <ul class="links">
            <li><a href="conceptForIndex.php" class="active">Home</a></li>
            <li><a href="userProfileConcept.php" class="inactive">Profile</a></li>
            <li><a href="#" class="inactive">Helios</a></li>
        </ul>
        <div class="searchFunction">
            <form action="profile.php" method="GET">
                    <input type="text" id="name" name="name" placeholder="Search P.Athens">
            </form> 
            <div class="searchIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
        </div>
    </header>

    <?php
        $followerid = $_SESSION['code'];
    ?>

    <script>
        // function ajaxgo(){

        //     var data = new FormData();
        //     data.append("submit1", document.getElementById("id1"))

        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "likeIndex.php");
        //     xhr.onload = function(){
        //         console.log(this.response);
        //         if(this.response == "OK"){
        //             document.getElementById("big").reset();
        //             alert("ok");
        //         } else {
        //             alert("error");
        //         }
        //     };
        //     xhr.send(data);

        //     return false;
        // // }

        // function ajaxgo2(){
        //     var data = new FormData();
        //     data.append("submit2", document.getElementById("id2"))

        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "likeIndex2.php");
        //     xhr.onload = function(){
        //         console.log(this.response);
        //     };
        //     xhr.send(data);

        //     return false;
        // }

        // function submitText(q){
        //     var url = "likeIndex2.php?postid='.$mouse3['postcode'].'";
        //     var xhr = new XMLHttpRequest();
        //     xhr.open('GET', url, false);
        //     xhr.send();

        //     var response = xhr.response;

        // }


    </script>

    

    <div class="userContent">
        <div class="box1">
            <div class="userShallSPEAK2">
                <form class="form1" action="textPosts.php" method="post" enctype="multipart/form-data" value="30000">
                    
                    <textarea class="userPost" name="textmessage" placeholder="Express yourself..." required maxlength="200"></textarea>

                    <div class="popup2" id="popup-2">
                        <div class="overlay2"></div>
                        <div class="content2">
                            <div class="close-btn2" onclick="togglePopup()">&times;</div>
                            <h1 class="h1-1">Attach files</h1>
                            <p class="ok">Accepted formats include '.gif', '.png', 'jpg' and 'webp'. Moreover, it is displayed as 500px by 500px.</p>
                            <input class="bigFile" type="file" name="file" class="form-control">
                        </div>
                    </div>
                    
        
                    <input type="submit" class="userSubmit2" value="Enthral the world">
                    
                </form>
                
                <!-- all scalable vector graphics from bootsrap -->
                <div class="at">
                        <svg onclick= "togglePopup()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                        </svg>
                </div>
                <!-- <div class="at">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
                        <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
                    </svg>
                </div> -->
            </div>
            <div class="popup2" id="popup-2">
                <div class="overlay2"></div>
                <div class="content2">
                    <div class="close-btn2" onclick="togglePopup()">&times;</div>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            
            <?php
                $followerid = $_SESSION['code'];
                $email = $_SESSION['email'];
                $message = 0;
                $postedTime = "posted this at ";

                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con, 'usertextposts');

            ?>

                

            <?php

                $followerid = $_SESSION['code'];
                
                $con2 = mysqli_connect('localhost','root','');
                mysqli_select_db($con2, 'userregistration');

                $water = ("SELECT usertext.textmessage, usertext.likes, usertable.user FROM usertable, usertext, followers 
                WHERE usertext.email = followers.user_email
                AND usertable.email = usertext.email
                AND follower_id = '$followerid'
                ORDER BY usertext.postcode DESC;");

                $waterQuery = mysqli_query($con2, $water);
                
                foreach($waterQuery as $post) {
                    echo $post['textmessage']. " - ".$post['user']."<hr />";
                }

            ?>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

            
                

                



                <script type="text/javascript">



                    // function ajaxpost(){
                    //     var data = new FormData(document.getElementById("formid"));

                    //     var xhr = new XMLHttpRequest();
                    //     xhr.open("POST", "likeIndex.php");
                    //     xhr.onload = function(){
                    //         console.log(this.response);
                    //     };
                    //     xhr.send(data);

                    //     return false;
                    // };


                    // function clickButton2(){
                    //     var name=document.getElementById('unlike').value;
                    //     $.ajax({
                    //         type:"post",
                    //         url:"likeIndex.php",
                    //         data:
                    //         {  
                    //             'unlike' :name
                    //         },
                    //         cache:false

                    //         // ,
                    //         // success: function (html) 
                    //         // {
                    //         // alert('Data Send');
                    //         // }
                    //     });
                    //     // 'return false' is stopping any data from passing through to likeIndex.php
                    //     return false;
                    // }

                    // function clickButton(){
                    //     var unlike=document.getElementById('unlike').value;
                    //     $.ajax({
                    //         type:"post",
                    //         url:"likeIndex.php",
                    //         data: 
                    //         {  
                    //         'unlike' :unlike
                    //         },
                    //         cache:false,
                    //         success: function (html) 
                    //         {
                    //         alert('Data Send');
                    //         $('#msg').html(html);
                    //         }
                    //     });
                    //     return false;
                    // }

                    $( "#formid" ).submit(function( e ) {
                        e.preventDefault();
                        $.ajax({
                            url: likeIndex.php,
                            type:'POST',
                            data:
                            {
                                unlike: $('#unlike').val()
                            },
                            success: function(msg)
                            {

                                alert('Email Sent');
                            }               
                        });
                    });



                    // $(document).ready(function () {
                    // // Listen to click event on the submit button
                    // $('#unlike').click(function (e) {

                    //     e.preventDefault();

                    //     var name = $("#name").val();

                    //     $.ajax({
                    //         type:"post",
                    //         url:"likeIndex.php",
                    //         data: 
                    //         {  
                    //         'name' :unlike
                    //         },
                        
                    //     }).complete(function() {
                    //         console.log("Success");
                    //     });
                    // });
                    // });
                </script>

            <!-- <script>
                $('#unlike').click(function() {
                $.ajax({
                    url: 'likeIndex.php?',
                    type: 'POST',
                    data: {
                        email: '',
                        message: ''
                    },
                    success: function(msg) {
                        alert('Email Sent');
                    }               
                });
            });
            </script> -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- <script type="text/javascript">
                function formSubmit(){
                    $.ajax({
                        type:'POST',
                        url:'likeIndex.php',
                        data:$('#frmBox').serialize()
                    });
                    var form = document.getElementById('frmBox').reset();
                    return false;
                }

                // $(function(){

                    // function sendData($form){
                    //     let dataString = $form.serialize();
                    //     $.ajax({

                    //     })
                    // }

                //     $('form').vaidate();
                //     $('form').on('unlike', function(e){
                //         e.preventDefault();

                //         let dataString = $(this).serialize();

                //         $.ajax({
                //             type: 'POST',
                //             url: 'likeIndex.php',
                //             data: dataString
                //         });
                //     });
                // })

                function ajaxgomk2(){
                    var data = new FormData();
                    data.append("submit1", document.getElementById("unlike"));

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "likeIndex.php?postcode='.$mouse3['postcode'].'");
                    xhr.onload = function(){
                        console.log(this.response);
                        if(this.response == "OK"){
                            document.getElementById("frmBox").reset();
                            alert("ok");
                        } else {
                            alert("error");
                        }
                    };
                    xhr.send(data);

                    return false;
                }

                function ajaxgomk3(){
                    // var data = new FormData;
                    var data = new FormData();
                    data.append("submit2", document.getElementById("like"));

                    var xhr = new XMLHttpRequest();
                    // xhr.open("GET", "likeIndex.php?" + data.toString());
                    xhr.open("POST", "likeIndex2.php");
                    xhr.onload = function(){
                        console.log(this.response);
                        if(this.response == "OK"){
                            document.getElementById("frmBox2").reset();
                            alert("ok");
                        } else {
                            alert("error");
                        }
                    };
                    xhr.send(data);

                    return false;
                }
            </script> -->

            
            <button id="button-finale" class="userSubmit2" style="margin-top: 100px;">Load more</button>
                
        </div>
    </div>
    <script>

            // $("#formid").submit(function(e) {

            // var url = "likeIndex.php"; // the script where you handle the form input.

            // $.ajax({
            //     type: "POST",
            //     url: url,
            //     data: $("#formid").serialize(), // serializes the form's elements.
            //     success: function(data)
            //     {
            //         alert(data); // show response from the php script.
            //     }
            //     });

            // e.preventDefault(); // avoid to execute the actual submit of the form.
            // });

            function validateForm() {
                var x = document.forms["formid"]["formid"].value;
                if (x == "") {
                    alert("Name must be filled out");
                    return false;
                }

                var url = $('#formid').attr('action');
                var data = $('#formid').serialize();
                $.post(url, data);
            }
    </script>

<script>
    function togglePopup(){
        document.getElementById("popup-2").classList.toggle("active");
        document.getElementById("popup-2").style.display="block";
    }
</script>
    
    <!-- <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br><br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>                             <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br>            <br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>     <br><br><br><br><br><br><br><br><br>      <br><br><br>            <br><br><br>                    <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br>        <br><br><br><br><br><br>                            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br>                            <br><br><br>
    <br><br><br>            <br><br><br>     <br><br><br>            <br><br><br>                             <br><br><br>      <br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br>                            <br><br><br>
                                                                                      <br><br><br>            <br><br><br>
                                                                                      <br><br><br>            <br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>
                                                                                      <br><br><br><br><br><br><br><br><br>

    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br>
    <br><br><br>            <br><br><br> -->


</body>
</html>