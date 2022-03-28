<?php 
require "server/config.php";
session_start();
if($_SESSION['id']) {
  header("Location: forum_click.php");
}
else {
  header("Location: modules/auth.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy English</title>
      <link rel="stylesheet" type="text/css" href="css.css">     
  </head>
  <body>   
<header class="header">
  <a href="index.html" class="logo"><img src="images/face.svg"></a>
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

<h2 class="content_title"> Форум </h2>

<a href="modules/logout.php"> Выйти </a>

<br> <br>
<section class="forum_index">
<div class="search_field"><p>
<input type="search" name="q" placeholder="Ключевые слова"> 
<input type="submit" value="Найти"></p>
</div>

<br>
<div class="table_title">
<p>Тема</p>
<p>Последнее сообщение</p>
<p>Ответов</p>
</div>

<div class="table_forum">
    <div class="topics">
    <p><a href="forum_click.php"> Тема 1 </a></p>
    <p><a href="forum_click.html"> Тема 2 </a></p>
    <p><a href="forum_click.html"> Тема 3 </a></p>
    <p><a href="forum_click.html"> Тема 4 </a></p>
    <p><a href="forum_click.html"> Тема 5 </a></p>
    <p><a href="forum_click.html"> Тема 6 </a></p>
    </div>

    <div class="last_message">
    <p> 3ч 31 мин. назад от  Username 1 </p>
    <p> 3ч 31 мин. назад от  Username 2 </p>
    <p> 3ч 31 мин. назад от  Username 3 </p>
    <p> 3ч 31 мин. назад от  Username 4 </p>
    <p> 3ч 31 мин. назад от  Username 5 </p>
    <p> 3ч 31 мин. назад от  Username 6 </p>
    </div>

    <div class="replies">
    <p> 31 </p>
    <p> 31 </p>
    <p> 31 </p>
    <p> 31 </p>
    <p> 31 </p>
    <p> 31 </p>
    </div>
  </div>

</section>

<footer class="Footer">
      <br><br>
      <p class="footer_par">© Панфилов Б.А., 2021<p>   
      </footer>

</body>
</html>