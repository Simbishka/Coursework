<?php
session_start();
require "../server/config.php";
if(isset($_SESSION['id']))
{
    if(isset($_POST['sub'])) {
        if(!empty($_POST['commentadd'])){
            $comment=$_POST['commentadd'];
            $id_user=$_SESSION['id'];
            $id_theme=$_POST['idtheme'];

            $comment_insert=mysqli_query($db, "INSERT INTO `comments`(`topicid`, `userid`, `commenttext`) 
            VALUES ($id_theme, $id_user, '$comment')");

            if($comment_insert){
                header("Location: ../modules/themeshow.php?id=".$id_theme);
            }
            else {
            header("Location: ../modules/themeshow.php?id=".$id_theme."&emf=2");
            }
    }
    else {
    $id_theme=$_POST['idtheme'];
    header("Location: ../modules/themeshow.php?id=".$id_theme."&emf=1");
    }
}
else {
    header("Location: ".$site_url);  
 }
}
?>