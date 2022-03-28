<?php
session_start();
require "../server/config.php";
if(!$_SESSION['id']) {
    header("Location: ".$site_url);
}
$id_topic=$_GET['id'];
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
<br> <br> <br> <br> <br> <br> <br> <br> <br>  <br> <br> 

<?php


$topic_shows=mysqli_query($db, "SELECT * FROM `topics` WHERE `id`=$id_topic");
$topic_show=mysqli_fetch_assoc($topic_shows);
print_r($topic_show['name']);
print "<br/>";

if (isset($_GET['id']) & is_numeric($_GET['id'])) {
    
    //print $id_topic;
    $topic_select=mysqli_query($db, "SELECT * FROM `themes` WHERE `section`=$id_topic");
    print "<a href='themeadd.php?id=$id_topic'>Создать новую тему </a>";
    if(mysqli_num_rows($topic_select)>0){
        while ($ctg=mysqli_fetch_assoc($topic_select)){
            $id=$ctg['id'];
            $id_user=$ctg['iduser'];
            $id_section=$ctg['section'];
            $theme_name=$ctg['name'];
            $message=$ctg['message'];
            ?>
            <div class="themewrap">
                <div class="themename"><a href="themeshow.php?id=<?=$id;?>"><?=$theme_name;?></a></div>
                <div class="themetime"> </div>
                <div class="themecomment"> </div>
                <div class="themeseen"> </div>
            </div>
            
            <?php
        }
    }
}


else {
    header("Location: ../forum_click.php");
}
?>
<br />
<a href="../forum_click.php"> Назад </a>

<footer class="Footer">
      <br><br>
      <p class="footer_par">© Панфилов Б.А., 2021<p>   
      </footer>

</body>
</html>
   