if(isset($_GET['postid____2'])){

$Fanta = " select * from usertext where postcode =".$_GET['postid']."";
$fantaQuery = mysqli_query($con, $Fanta);
while($a =mysqli_fetch_array($fantaQuery)){
    $likes = $a["likes"];

    $extra = " select * from likes where user = '$email' && postcode =".$_GET['postid']."";
    $USD = mysqli_query($con, $extra);
    $num4 = mysqli_num_rows($USD);

    if($num4 != 1){
        $book['postcode'] = array(':postid'=>$_GET['postid']);
        

        $carpetmk2 = "INSERT INTO likes(user, postcode) VALUES ('$email', ".$_GET['postid'].")";
        $light = mysqli_query($con, $carpetmk2);

        if($light){
            $carpet = "UPDATE usertext SET likes=$likes+1 WHERE postcode=".$_GET['postid']."";
            $tube = mysqli_query($con, $carpet);
        }
    } else {

        $b = "DELETE FROM likes WHERE user = '$email' && postcode = ".$_GET['postid']."";
        $result10 = mysqli_query($con, $b);

        $carpet = "UPDATE usertext SET likes=$likes-1 WHERE postcode=".$_GET['postid']."";
        $tube = mysqli_query($con, $carpet);
    }

    
}
}


$followingPosts = 'SELECT usertext.textmessage, usertable.user FROM usertable, usertext, followers
                        WHERE usertext.email = followers.user_email
                        AND usertable.email = usertext.email
                        AND followers_id = -1;';
                        $folPostsQuery = mysqli_query($con2, $followingPosts);
                        print_r($folPostsQuery);