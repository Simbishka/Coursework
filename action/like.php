<?php
session_start();
require "../server/config.php";
$id=$_SESSION['id'];
$id_article = $_POST['id_article'];
if ($_POST['like']) {
    $q = mysqli_query($db,"SELECT * FROM `likes` WHERE id_user='$id' AND id_article='$id_article'");
    $r = mysqli_fetch_array($q);
    if ($r['id']==0 OR $q==false) {
        $q2 = mysqli_query($db,"INSERT INTO `likes` SET id_user='$id', id_article='$id_article'");
    }
    header("location: ../modules/themeshow.php?id=".$id_article);
}


if ($_POST['dislike']) {
    $q = mysqli_query($db,"SELECT * FROM `likes` WHERE id_user='$id' AND id_article='$id_article'");
    $r = mysqli_fetch_array($q);
    if ($r['id']==1 OR $q==true) {
        $q2 = mysqli_query($db,"DELETE FROM `likes` WHERE id_user='$id' AND id_article='$id_article'");
    }
    header("location: ../modules/themeshow.php?id=".$id_article);
}

?>