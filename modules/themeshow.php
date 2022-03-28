<?php
session_start();
require "../server/config.php";

if(!$_SESSION['id']) {
    header("Location: ".$site_url);
}

$id = $_GET['id'];
$q2 = mysqli_query($db, "SELECT * FROM `likes` WHERE id_article='$id'");
$counter = 0;
while ($res = mysqli_fetch_array($q2)) {
    if($res['id']) $counter++;
}
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy English</title>
      <link rel="stylesheet" type="text/css" href="../css.css">         
  </head>
  <body>   
<header class="header">
  <a href="index.html" class="logo"><img src="../images/face.svg"></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <li class="site_title">Lazy English</li>
  <ul class="menu">
    <li><a href="../forum.php">Форум</a></li>
    <li><a href="../index.php">Главная</a></li>
    <li><a href="../page1.php">Фразовые глаголы, устойчивые выражения</a></li>
    <li><a href="../page2.php">Времена в английском языке</a></li>
    <li><a href="../page3.php">Топ  используемых слов </a></li>
  </ul>
</header>
<br> <br> <br> <br> <br> <br>  

<?php

if (isset($_GET['id']) & is_numeric($_GET['id'])) {
    $id_topic=$_GET['id'];
    //print $id_topic;
    $topic_select=mysqli_query($db, "SELECT * FROM `themes` WHERE `id`=$id_topic LIMIT 1");
    while($ctg=mysqli_fetch_assoc($topic_select)) {
            $id=$ctg['id'];
            $id_user=$ctg['iduser'];
            $id_section=$ctg['section'];
            $theme_name=$ctg['name'];
            $message=$ctg['message'];

            ?>
            <div class="topicshow">
                <div class="topicuser"> 
                
                    <?php
                        $user_output = mysqli_query($db, "SELECT * FROM `users` WHERE `id`=$id_user LIMIT 1");
                        if (mysqli_num_rows($user_output)>0) {
                            $u=mysqli_fetch_assoc($user_output);
                            $user_id=$u['id'];
                            $user_avatar=$u['photo'];
                            $user_gender=$u['gender'];
                            $user_name=$u['name'];
                            $user_email=$u['email'];

                            if(!empty($user_avatar)) {
                            echo "<img src=../images/user.png>";
                            }
                            else {
                                
                                if($user_gender=="male") {
                                    
                                    ?>
                                        <img src="../images/male.jpg" class="avatar">
                                    <?php
                                }
                                else {
                                    ?>
                                        <img src="../images/female.jpg" class="avatar">
                                    <?php
                                    
                                }
                            }
                            ?> <br />
                                Name: <?=$user_name;?> <br />
                                Gender: <?=$user_gender;?> <br />
                                E-mail: <?=$user_email;?> <br />

                            <?php
                        }
                    ?>
                
                </div>
                <div class="topicmessage">
                    <?php
                        print "<h1>".$theme_name."</h1>";
                        
                    ?>
                    <span class="span1"> <?=$message;?> </span>
                    
                    <form class="likes_form" action="../action/like.php" method="post">
                <input type="hidden" value="<?php echo $id;?>" name="id_article">
                <input type="submit" value="👍🏻" name="like">
                <input type="submit" value="👎🏻" name="dislike">
            </form>
        <div class="likes"> Количество лайков: <?=$counter;?>  </div>
                </div>
            </div>
            <?php
    }
    ?>
    <br />
    <?php
        $comment_output = mysqli_query($db, "SELECT * FROM `comments` WHERE `topicid`=$id_topic");
        if(mysqli_num_rows($comment_output)>0) {
            while($ctg=mysqli_fetch_assoc($comment_output)) {
                $comment_user_id = $ctg['userid'];
                $comment=$ctg['commenttext'];
                ?>
                    <div class="commentshow">
                <div class="commentuser"> 
                
                    <?php
                        $users_output = mysqli_query($db, "SELECT * FROM `users` WHERE `id`=$comment_user_id");
                        if(mysqli_num_rows($users_output)>0) {
                            $com=mysqli_fetch_assoc($users_output);
                            $comment_user_id=$com['id'];
                            $comment_user_avatar=$com['photo'];
                            $comment_user_gender=$com['gender'];
                            $comment_user_email=$com['email'];
                            $comment_user_name=$com['name'];

                            if(!empty($comment_user_avatar)) {
                                echo "<img src=../images/user.png>";  
                            }
                            else {

                                if($comment_user_gender=='male') {
                                    ?>
                                        <img class="avatar" src="../images/male.jpg" />
                                    <?php
                                }
                                else {
                                    ?>
                                        <img class="avatar"  src="../images/female.jpg"  />
                                    <?php
                                    
                                }
                            }
                            ?>
                                <br />
                                Name: <?=$comment_user_name;?> <br />
                                Gender:<?=$comment_user_gender;?> <br />
                                E-mail:<?=$comment_user_email;?> <br />
                            <?php
                        }
                        else {
                            print "Пользователь не найден";
                        }
                    ?>

                </div>
                <div class="commentmessage">
                    <?php
                     
                    ?>
                    <span class="span1"> <?=$comment;?> </span>
                </div>
            </div>
                <?php
            }
        }
        else {
            print "Нет комментариев, вы можете быть первым, кто напишет комментарий";
        }
    ?>

    <br />
    <div>
        <?php
            if(isset($_GET['emf'])){
                if($_GET['emf']==1) {
                    print "Пожалуйста, заполните все поля";
                }
                if($_GET['emf']==2) {
                    print "Возникли проблемы, пожалуйста попробуйте снова";
                }
            }
        ?>
    </div>
    <br />
    <form method="POST" action="../server/commentadd.php"> 
        <textarea name="commentadd" placeholder="Напишите свой комментарий"></textarea><br />
        <input type="hidden" name="idtheme" value="<?=$id_topic;?>" />
        <input type="submit" name="sub" value="Отправить" />
    </form>

    <?php
}
?>

<footer class="Footer">
      <br><br>
      <p class="footer_par">© Панфилов Б.А., 2021<p>   
      </footer>

</body>
</html>
   