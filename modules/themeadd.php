<?php
session_start();
require "../server/config.php";
if(!$_SESSION['id']) {
  header("Location: ".$site_url);
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
    <li><a href="forum.php">Форум</a></li>
    <li><a href="index.php">Главная</a></li>
    <li><a href="page1.php">Фразовые глаголы, устойчивые выражения</a></li>
    <li><a href="page2.php">Времена в английском языке</a></li>
    <li><a href="page3.php">Топ  используемых слов </a></li>
  </ul>
</header>
<br> <br> <br> <br> <br> <br>  

<?php 
  $id_section=$_GET['id'];
    if(isset($_GET['error'])){
        print "Возникли проблемы! Пожалуйста, попробуйте снова";
    }
    if(isset($_GET['done'])){
        print "Ваша тема была успешно добавлена, вы можете увидеть её <a href='themes.php?id=$id_section'> здесь </a>";
    }
    if(isset($_GET['id']) & is_numeric($_GET['id'])) {
        
        ?>
    <br />
    <h2> Начните создавать свою тему </h2>
    <br />
    <form method="POST" action="../server/topicadd.php">
        <input type="text" name="topicname" placeholder="Напишите название темы!" /><br />
        <textarea name="topictext" placeholder="Напишите свой текст здесь!"></textarea><br />
        <input type="text" name="idsect" value="<?=$id_section;?>" />
        <input type="submit" value="Отправить" name="sub" />
    </form>
        <?php
    }
    else {
        print "Что-то пошло не так! Попробуйте снова! <br> ";
        print "<a href='$site_url'> Назад </a>";
    }
?>
<footer class="Footer">
      <br><br>
      <p class="footer_par">© Панфилов Б.А., 2021<p>   
      </footer>
</body>
</html>
 