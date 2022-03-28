<?php
session_start();
require "../server/config.php";
if(isset($_SESSION['id'])) {
    if(isset($_POST['sub'])) {
        $topicname=$_POST['topicname'];
        $text=$_POST['topictext'];
        $id_section=$_POST['idsect'];
        $myid=$_SESSION['id'];

        if(!empty($topicname) & !empty($text)) {
            $insert_text=mysqli_query($db, "INSERT INTO `themes`(`iduser`, `section`, `name`, `message`) 
                            VALUES ($myid,$id_section,'$topicname','$text')");

            if ($insert_text) {
                header("Location: ../modules/themeadd.php?id=$id_section&done=1");
            }
            else {
                header("Location: ../modules/themeadd.php?id=$id_section&error=1");
            }
        }
        else {
            header("Location: ../modules/themeadd.php?id=$id_section&error=1");
        }

        
    }

    if(isset($_POST['submit'])) {
        $razdelname=$_POST['razdel_title'];
        if(strlen($razdelname)>0) {
            $insert_razdel=mysqli_query($db, "INSERT INTO `topics`(`name`) VALUE ('$razdelname')");
            var_dump($insert_razdel);
        }
        else {
            print "Возникла ошибка";
        }
    }



    else {
     header("Location:".$site_url);
    }
}
else {
    header("Location:".$site_url);
}    
?>