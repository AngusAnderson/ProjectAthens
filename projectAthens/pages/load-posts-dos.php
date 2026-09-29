<?php
    include 'dbh.php';

    session_Start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

    $followerid = $_SESSION['code'];
                
                $con2 = mysqli_connect('localhost','root','');
                mysqli_select_db($con2, 'userregistration');
                    

                $bigQuery = " SELECT * FROM followers WHERE follower_id = '$followerid'";
                $result4 =  mysqli_query($con2, $bigQuery);

                if($result4){
                    while($row3 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                        $user_email = $row3["user_email"];
                        $user_id = $row3['user_id'];
                        
                        $queryDB = " SELECT * FROM usertext WHERE email = '$user_email' ORDER BY postcode DESC LIMIT 10";
                        $mysqli_query = mysqli_query($con, $queryDB);

                        

                        $bigStuff = " SELECT * FROM usertable WHERE email = '$user_email'";
                        $mysqli_query_mk2 = mysqli_query($con2, $bigStuff);

                        while($rowOkay = mysqli_fetch_array($mysqli_query_mk2)){
                            while($row33 = mysqli_fetch_array($mysqli_query)) { ?>
                                <div class="post-1">
    
                                    <?php foreach($mysqli_query as $mouse3){ ?>
                                        

                                        
                                            <div class='time'>
                                                <?php echo $rowOkay["user"], ' ', $postedTime, $mouse3['postedTime'];?>
                                            </div>
                                            <?php

                                                if ($mouse3['picCode'] == 0) {

                                                    $extra2 = " select * from likes where user = '$email' && postcode =".$mouse3['postcode']."";
                                                    $USDmk2 = mysqli_query($con, $extra2);
                                                    $num4mk2 = mysqli_num_rows($USDmk2);
                                                    if($num4mk2 != 1){
                                                        echo "<br>".$mouse3['textmessage'].
                                                        "
                                                        <form id='formid' name='formid' action='likeIndex.php?postcode=".$mouse3['postcode']."' method='post'>
                                                            <button type='submit' id='unlike' name='unlike' class='likeSystem' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                            <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                                            </svg></button>
                                                        </form>
                                                        <span>".$mouse3['likes']."</span>"
                                                        ;
                                                        $postcode34 = $mouse3['postcode'];
                                                        echo $postcode34;
                                                        
                                                    } else {
                                                        echo "<br>".$mouse3['textmessage'].
                                                        "
                                                        <form id='formid2' name='formid2' action='likeIndex2.php?postid=".$mouse3['postcode']."' method='post'>
                                                            <button type='submit' id='like2' name='like2' class='like' onclick='spicy(this)'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                            <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                                        </svg></button>
                                                        </form>
                                                        <span>".$mouse3['likes']."</span>
                                                        ";
                                                        echo $mouse3['postcode'];
                                                        
                                                    }
                                                } else {

                                                    $extra2 = " select * from likes where user = '$email' && postcode =".$mouse3['postcode']."";
                                                    $USDmk2 = mysqli_query($con, $extra2);
                                                    $num4mk2 = mysqli_num_rows($USDmk2);

                                                    $quickQuery = "select * from pictures where picCode = ".$mouse3['picCode']."";
                                                    $quickResult = mysqli_query($con, $quickQuery);

                                                    while ($quick = mysqli_fetch_array($quickResult)) {

                                                        $picture = $quick['picture'];
                                                        if($num4mk2 != 1){
                                                            echo "<br>".$mouse3['textmessage']."<br>".
                                                            "
                                                            <img class='picture2' src='image/$picture'>".
                                                            "<form id='formid' name='formid' action='likeIndex.php?postcode=".$mouse3['postcode']."' method='post'>
                                                                <button type='submit' id='unlike' name='unlike' class='likeSystem' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                                            </svg></button>
                                                            </form>
                                                            <span>".$mouse3['likes']."</span>"
                                                            ;
                                                            $postcode34 = $mouse3['postcode'];
                                                            echo $postcode34;

                                                        } else {
                                                            echo "<br>".$mouse3['textmessage']."<br>".
                                                            "
                                                            <img class='picture2' src='image/$picture'>".
                                                            "<form id='formid2' name='formid2' action='likeIndex2.php?postid=".$mouse3['postcode']."' method='post'>
                                                                <button type='submit' id='like2' name='like2' class='like'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                                                                <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                                                            </svg></button>
                                                            </form>
                                                            
                                                            <span>".$mouse3['likes']."</span>
                                                            ";
                                                            echo $mouse3['postcode'];
                                                            
                                                        }

                                                    }

                                                }
                                            
                                            } ?>
                                        
                                        <script>
                                            $(document).ready(function(){
                                                $('#formid').submit(function(event){
                                                    event.preventDefault()

                                                    var unlike = document.getElementById('unlike').value

                                                    $.post("likeIndex.php?postcode=<?php echo $postcode34; ?>", {unlike: unlike}, function(data){
                                                            console.log(data)
                                                    })
                                                })
                                            })

                                            // function spicy(ElSpice) {
                                            //     ElSpice.style.color = insert accent colour 
                                            //     ElSpice.style.background = 0xE6E6E6
                                            //     ElSpice.style.border = none
                                            //     ElSpice.style.outline = none
                                            //     ElSpice.style.cursor = pointer
                                            // }

                                        
                                            $(document).ready(function(){
                                                $("#formid2").submit(function(event){
                                                    event.preventDefault()

                                                    var like2 = document.getElementById("like2").value

                                                    $.post("likeIndex2.php?postid=<?php echo $mouse3['postcode']; ?>", {like2: like2}, function(data){
                                                        console.log(data)
                                                    })
                                                })
                                            })
                                        </script>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        
                    

                    
                        
                    
                <?php } ?>

?>